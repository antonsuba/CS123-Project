DROP DATABASE IF EXISTS DBFull;
CREATE DATABASE DBFull;
USE DBFull;

-------------------------------------------------------------------- User

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
first_name varchar(255),
last_name varchar(255),
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

---------------------------------------------------------------------- Suggestions

DROP TABLE IF EXISTS suggestions;
CREATE TABLE suggestions(
id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
name varchar(255),
rating int,
description varchar(255)
);

DROP TABLE IF EXISTS preferenceSuggestions;
CREATE TABLE preferenceSuggestions(
id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
preference_id int,
FOREIGN KEY(preference_id) REFERENCES preferences(id),
suggestion_id int,
FOREIGN KEY(suggestion_id) REFERENCES suggestions(id)
);

DROP TABLE IF EXISTS bases;
CREATE TABLE bases(
id int NOT NULL PRIMARY KEY AUTO_INCREMENT REFERENCES suggestions (id)
);

DROP TABLE IF EXISTS userCreates;
CREATE TABLE userCreates(
id int NOT NULL PRIMARY KEY AUTO_INCREMENT REFERENCES suggestions (id),
created_by varchar(255)
);

DROP TABLE IF EXISTS comments;
CREATE TABLE comments(
id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
content varchar(255)
);

