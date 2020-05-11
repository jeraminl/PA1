CREATE TABLE IF NOT EXISTS orders(
  id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  firstName varchar(20) NOT NULL,
  lastName varchar(20) NOT NULL,
  email varchar(20) NOT NULL,
  phone varchar(12) NOT NULL,
  address varchar(50) NOT NULL,
  city varchar(20) NOT NULL,
  state varchar(2) NOT NULL,
  zip varchar(10) NOT NULL,
  productID int(6) UNSIGNED,
  ship enum('overnight', '2-days', '6-days'),
  units INT(2) NOT NULL,
  total varchar(10) NOT NULL,
  FOREIGN KEY (productID) REFERENCES products(id)
);