CREATE DATABASE task_force;

USE task_force;

CREATE TABLE users (
id INT AUTO_INCREMENT PRIMARY KEY,
user_name VARCHAR (128) NOT NULL,
email VARCHAR (128) NOT NULL UNIQUE,
password VARCHAR (128),
registration_date DATETIME DEFAULT CURRENT_TIMESTAMP,
city VARCHAR (128),
category_name_id INT
);

CREATE TABLE category (
id INT AUTO_INCREMENT PRIMARY KEY,
category_name VARCHAR(128)
);

CREATE TABLE tasks (
id INT AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255),
description VARCHAR (500),
dt_add DATETIME DEFAULT CURRENT_TIMESTAMP,
status VARCHAR (64),
url_file VARCHAR(500),
deadline DATE,
region VARCHAR (128),
budget INT,
user_worker_id INT,
users_id INT,
category_name_id INT,
city_id INT,
score INT
);

CREATE TABLE answer (
id INT AUTO_INCREMENT PRIMARY KEY,
comment VARCHAR (500),
price INT,
created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
users_id INT,
tasks_id INT
);

CREATE TABLE user_worker (
id INT AUTO_INCREMENT PRIMARY KEY,
users_id INT,
registration_date_id INT,
rating INT,
number_done_orders INT,
number_views INT
);
