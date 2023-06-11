CREATE DATABASE pizzaOrderDB;

USE pizzaOrderDB;

CREATE TABLE Orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    address VARCHAR(255),
    size VARCHAR(50),
    quantity INT
);