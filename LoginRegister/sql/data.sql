CREATE TABLE USER (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    gender VARCHAR(50),
    department VARCHAR(50),
    position VARCHAR(50),
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255),
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE employee (
    staff_id INT AUTO_INCREMENT PRIMARY KEY,
    product_category VARCHAR (50),
    product_type VARCHAR (50),
    product_des VARCHAR (500),
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    added_by INT,
    last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    last_updated_by INT,
    FOREIGN KEY (added_by) REFERENCES USER(user_id),
    FOREIGN KEY (last_updated_by) REFERENCES USER(user_id)
);

CREATE TABLE product (
    stock_id INT AUTO_INCREMENT PRIMARY KEY,
    item_name VARCHAR (50),
    item_shade TEXT,
    price InT,
    date_expired VARCHAR(50),
    staff_id INT,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    added_by INT,
    last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    last_updated_by INT,
    FOREIGN KEY (staff_id) REFERENCES employee(staff_id),
    FOREIGN KEY (added_by) REFERENCES USER(user_id),
    FOREIGN KEY (last_updated_by) REFERENCES USER(user_id)
);