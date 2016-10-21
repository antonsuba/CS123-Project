<?php
$error = '';

if(isset($_POST['login'])) {
  if(empty($_POST['username']) || empty($_POST['password'])){
    $error = 'Fill in all fields';
  } else{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $server = 'localhost';
    $server_user = 'root';
    $server_pass = '';
    $database_name = 'database'; #whatever the database name will be

    $db = new mysqli($server, $server_user, $server_pass, $database_name);

    if($db->connect_errno > 0){
      die('Unable to connect to database ['. $db->connect_error.']');
    }

    $username = mysqli_real_escape_string($db, stripslashes($username));
    $password = mysqli_real_escape_string($db, stripslashes($password));

    $verify_login = <<<SQL
      SELECT * FROM employees
      where username = '$username'
SQL;

    if(!$result = $db->query($verify_login)){
      die('Error retrieving information from database ['. $db->error.']');
    }

    //password verification w/o hashing
    if($result->num_rows == 1){
      //login successful
      $_SESSION['login_user'] = $username;
    } else{
      $error = "Invalid username or password";
    }

    //password verificatio w/o hashing
    $userAssoc = $result->fetch_all(MYSQLI_ASSOC);
    foreach($usserAssoc as $userRow){
      if(password_verify($password, $userRow['password'])){
        $_SESSION['login_user'] = $username;
      } else{
        $error = "Invalid username or password";
      }
    }

    $result->free();
    $db->close();
  }
} else if(isset($_POST['signup'])){
  $server = 'localhost';
  $server_user = 'root';
  $server_pass = '';
  $database_name = 'database'; #whatever the database name will be

  $db = new mysqli($server, $server_user, $server_pass, $database_name);

  if($db->connect_errno > 0){
    die('Unable to connect to database ['. $db->connect_error.']');
  }

  $username = mysqli_real_escape_string($db, stripslashes($username));
  $password = mysqli_real_escape_string($db, stripslashes($password));

  $getUsernames = $db->prepare("SELECT username FROM accounts WHERE username = ?");
  $getUsernames->bind_param('s', $username);
  $getUsernames->execute();
  $numrows = $getUsernames->num_rows;

  if(empty($_POST['username']) || empty($_POST['password'])){
    $error = "Please fill up all fields";
  } else if($numrows > 0){
    $error = "Username already exists";
  } else{
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $newAccount = $db->prepare("INSERT INTO accounts(username, password)");
    $newAccount->bind_param('ss', $username, $hashedPassword);
    $newAccount->execute();
    $newAccount->close();
  }

}

?>
