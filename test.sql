DROP DATABASE IF EXISTS test;
CREATE DATABASE test;

DROP TABLE IF EXISTS accounts;
CREATE TABLE accounts(
id NOT NULL PRIMARY KEY AUTO_INCREMENT int,
username NOT NULL varchar(255),
password NOT NULL varchar(255)
);

DROP TABLE IF EXISTS profiles;
CREATE profiles(
id NOT NULL PRIMARY KEY AUTO_INCREMENT int,
account_id int,
FOREIGN KEY(account_id) REFERENCES accounts(id),
name varchar(255),
age int,
email varchar(255)
);

DROP TABLE IF EXISTS preferences;
CREATE preferences(
id NOT NULL PRIMARY KEY AUTO_INCREMENT int,
profile_id int,
FOREIGN KEY(profile_id) REFERENCES profiles(id),
name varchar(255)
);

DROP TABLE IF EXISTS categories;
CREATE preferences(
id NOT NULL PRIMARY KEY AUTO_INCREMENT int,
preference_id int,
FOREIGN KEY(preference_id) REFERENCES preferences(id),
name varchar(255)
);

DROP TABLE IF EXISTS profilePreferences;
CREATE preferences(
id NOT NULL PRIMARY KEY AUTO_INCREMENT int,
profile_id int,
FOREIGN KEY(profile_id) REFERENCES profiles(id),
preference_id int,
FOREIGN KEY(preference_id) REFERENCES preferences(id)
);
