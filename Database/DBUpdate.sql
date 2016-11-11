DROP DATABASE IF EXISTS cs123;
CREATE DATABASE cs123;
USE cs123;

-------------------------------------------------------------------- User

DROP TABLE IF EXISTS users;
CREATE TABLE users(
id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
email varchar(255) NOT NULL ,
password varchar(255) NOT NULL,
first_name varchar(255),
last_name varchar(255),
age int,
remember_token varchar(100),
updated_at TIMESTAMP,
created_at TIMESTAMP
);

DROP TABLE IF EXISTS availPref;
CREATE TABLE availPref(
id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
preference_id int,
FOREIGN KEY(preference_id) REFERENCES preferences(id),
time_stamped TIMESTAMP,
updated_at TIMESTAMP,
created_at TIMESTAMP
);

DROP TABLE IF EXISTS categories;
CREATE TABLE categories(
id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
name varchar(255),
updated_at TIMESTAMP,
created_at TIMESTAMP
);

DROP TABLE IF EXISTS preferences;
CREATE TABLE preferences(
id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
name varchar(255),
category_id int,
FOREIGN KEY(category_id) REFERENCES categories(id)
updated_at TIMESTAMP,
created_at TIMESTAMP
);

---------------------------------------------------------------------- Suggestions

DROP TABLE IF EXISTS suggestions;
CREATE TABLE suggestions(
id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
name varchar(255),
rating int,
description varchar(255),
popularity int,
updated_at TIMESTAMP,
created_at TIMESTAMP
);

DROP TABLE IF EXISTS preferenceSuggestion;
CREATE TABLE preferenceSuggestions(
id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
preference_id int,
FOREIGN KEY(preference_id) REFERENCES preferences(id),
suggestion_id int,
FOREIGN KEY(suggestion_id) REFERENCES suggestions(id),
updated_at TIMESTAMP,
created_at TIMESTAMP,
);

DROP TABLE IF EXISTS userCreates;
CREATE TABLE userCreates(
id int NOT NULL PRIMARY KEY AUTO_INCREMENT REFERENCES suggestions (id),
created_by varchar(255),
updated_at TIMESTAMP,
created_at TIMESTAMP
);

DROP TABLE IF EXISTS comments;
CREATE TABLE comments(
id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
content varchar(255),
updated_at TIMESTAMP,
created_at TIMESTAMP
);

DROP TABLE IF EXISTS bookmarks;
CREATE TABLE bookmarks(
id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
account_id int,
FOREIGN KEY(account_id) REFERENCES accounts(id),
category_id int,
FOREIGN KEY(category_id) REFERENCES categories(id)
updated_at TIMESTAMP,
created_at TIMESTAMP
);
