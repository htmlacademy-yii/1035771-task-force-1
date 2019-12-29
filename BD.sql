CREATE DATABASE task_force;

USE task_force;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR (128) NOT NULL,
    email VARCHAR (128) NOT NULL UNIQUE,
    password VARCHAR (128) NOT NULL,
    creation_time DATETIME DEFAULT CURRENT_TIMESTAMP,
    birthday DATETIME NULL,
    info TEXT NULL,
    avatar VARCHAR (500) NULL,
    phone VARCHAR (128) NULL,
    skype VARCHAR (128) NULL,
    other_contact VARCHAR (128) NULL,
    views INT NOT NULL DEFAULT 0,
    location_id INT NOT NULL,
    notification_new_message TINYINT NOT NULL DEFAULT 0,
    notification_task_action TINYINT NOT NULL DEFAULT 0,
    notification_review TINYINT NOT NULL DEFAULT 0,
    show_for_customers TINYINT NOT NULL DEFAULT 0
);

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(128) NOT NULL,
    icon VARCHAR(128) NOT NULL
);

CREATE TABLE users_categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    category_id INT NOT NULL
);

CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description VARCHAR (500) NOT NULL,
    creation_time DATETIME DEFAULT CURRENT_TIMESTAMP,
    status TINYINT NOT NULL DEFAULT 1,
    url_file VARCHAR(500) NULL,
    deadline DATETIME,
    budget INT NULL,
    customer_id INT NOT NULL,
    executor_id INT NULL,
    category_id INT NOT NULL,
    location_id INT NULL
);

CREATE TABLE task_files (
   id INT AUTO_INCREMENT PRIMARY KEY,
   file_id VARCHAR (500) NOT NULL,
   task_id INT NOT NULL
);

CREATE TABLE user_files (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_id VARCHAR (500) NOT NULL,
    user_id INT NOT NULL
);

CREATE TABLE files (
    id INT AUTO_INCREMENT PRIMARY KEY,
    url VARCHAR (500) NOT NULL
);

CREATE TABLE reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    creation_time DATETIME DEFAULT CURRENT_TIMESTAMP,
    task_id INT NOT NULL,
    score TINYINT NOT NULL,
    description TEXT NOT NULL
);

CREATE TABLE proposals (
    id INT AUTO_INCREMENT PRIMARY KEY,
    description VARCHAR (1000) NULL,
    budget INT NULL,
    creation_time DATETIME DEFAULT CURRENT_TIMESTAMP,
    executor_id INT NOT NULL,
    task_id INT NOT NULL
);

CREATE TABLE locations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    city VARCHAR (64) NOT NULL,
    lat DEC(10,7) NOT NULL,
    length DEC(10,7) NOT NULL,
    region VARCHAR (128) NULL,
    street VARCHAR (500) NULL,
    district VARCHAR (500) NULL
);

CREATE TABLE user_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    viewed TINYINT NOT NULL DEFAULT 0,
    sender_id INT NOT NULL,
    recipient_id INT NOT NULL,
    description TEXT NOT NULL,
    task_id INT NOT NULL,
    creation_time DATETIME DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE tasks
ADD FOREIGN KEY (customer_id) REFERENCES users(id)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE tasks
ADD FOREIGN KEY (executor_id) REFERENCES users(id)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE tasks
ADD FOREIGN KEY (category_id) REFERENCES categories(id)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE reviews
ADD FOREIGN KEY (task_id) REFERENCES tasks(id)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE proposals
ADD FOREIGN KEY (executor_id) REFERENCES users(id)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE proposals
ADD FOREIGN KEY (task_id) REFERENCES tasks(id)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE user_messages
ADD FOREIGN KEY (task_id) REFERENCES tasks(id)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE users_categories
ADD UNIQUE users_categories_user_id_category_id_udx (user_id, category_id);

ALTER TABLE task_files
ADD UNIQUE task_files_file_id_task_id_udx (file_id, task_id);

ALTER TABLE user_files
ADD UNIQUE user_files_file_id_user_id_udx (file_id, user_id);

ALTER TABLE user_messages
ADD UNIQUE user_messages_sender_id_recipient_id_udx (sender_id, recipient_id);

ALTER TABLE task_files
ADD FOREIGN KEY (file_id) REFERENCES files(id)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE user_files
ADD FOREIGN KEY (file_id) REFERENCES files(id)
ON DELETE CASCADE
ON UPDATE CASCADE;
