CREATE DATABASE IF NOT EXISTS gearlog_db;
USE gearlog_db;

CREATE TABLE IF NOT EXISTS categories (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS assets (
id INT AUTO_INCREMENT PRIMARY KEY,
serial_number VARCHAR(100) UNIQUE,
device_name VARCHAR(100),
price DECIMAL(10,2),
status ENUM('Not Available','Available','Deployed','Under Repair') DEFAULT 'Available',
category_id INT,
FOREIGN KEY (category_id) REFERENCES categories(id)
);

INSERT INTO categories (name) VALUES
('Laptop'),
('Monitor'),
('Server'),
('Accessories');