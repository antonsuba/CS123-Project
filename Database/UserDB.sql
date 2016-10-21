DROP DATABASE IF EXISTS UserDB;
CREATE DATABASE UserDB;
USE UserDB;

DROP TABLE IF EXISTS accounts;
CREATE TABLE accounts(
id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
username varchar(255) NOT NULL ,
password varchar(255) NOT NULL
);

DROP TABLE IF EXISTS profiles;
CREATE TABLE profiles(
id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
account_id int,
FOREIGN KEY(account_id) REFERENCES accounts(id),
name varchar(255),
age int,
email varchar(255)
);

DROP TABLE IF EXISTS preferences;
CREATE TABLE preferences(
id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
profile_id int,
FOREIGN KEY(profile_id) REFERENCES profiles(id),
name varchar(255)
);

DROP TABLE IF EXISTS categories;
CREATE TABLE categories(
id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
preference_id int,
FOREIGN KEY(preference_id) REFERENCES preferences(id),
name varchar(255)
);

DROP TABLE IF EXISTS profilePreferences;
CREATE TABLE profilePreferences(
id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
profile_id int,
FOREIGN KEY(profile_id) REFERENCES profiles(id),
preference_id int,
FOREIGN KEY(preference_id) REFERENCES preferences(id)
);
