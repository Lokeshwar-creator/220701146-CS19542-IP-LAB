CREATE DATABASE banking_app;

USE banking_app;

-- CUSTOMER table to store customer details
CREATE TABLE CUSTOMER (
    CID INT PRIMARY KEY AUTO_INCREMENT,
    CNAME VARCHAR(100) NOT NULL
);

-- ACCOUNT table to store account details
CREATE TABLE ACCOUNT (
    ANO INT PRIMARY KEY AUTO_INCREMENT,
    ATYPE ENUM('S', 'C') NOT NULL,  -- 'S' for Savings, 'C' for Current
    BALANCE DECIMAL(10, 2) DEFAULT 0.0,
    CID INT,
    FOREIGN KEY (CID) REFERENCES CUSTOMER(CID)
);

-- TRANSACTION table to store transactions
CREATE TABLE TRANSACTION (
    TID INT PRIMARY KEY AUTO_INCREMENT,
    ANO INT,
    TTYPE ENUM('D', 'W') NOT NULL,  -- 'D' for Deposit, 'W' for Withdrawal
    TDATE DATE NOT NULL,
    TAMOUNT DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (ANO) REFERENCES ACCOUNT(ANO)
);
