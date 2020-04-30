DROP DATABASE IF EXISTS store_db;

CREATE DATABASE store_db;

USE store_db;

CREATE TABLE IF NOT EXISTS products(
  id INT(6) UNSIGNED PRIMARY KEY,
  name varchar(50) NOT NULL,
  description varchar(100),
  size varchar(20),
  price decimal(10,2) NOT NULL,
  switch varchar(20),
  category varchar(20) NOT NULL
)

CREATE TABLE IF NOT EXISTS orders(
  id INT(10) UNSIGNED PRIMARY KEY,
  firstName varchar(20) NOT NULL,
  lastName varchar(20) NOT NULL,
  email varchar(20) NOT NULL,
  phone varchar(12) NOT NULL,
  address varchar(50) NOT NULL,
  city varchar(20) NOT NULL,
  state varchar(2) NOT NULL,
  zip varchar(10) NOT NULL,
  ship enum('overnight', '2-days', '6-days'),
  
)
