/*--------------- Drop of old database --------------------*/
DROP DATABASE IF EXISTS AweSomeFitDB;
CREATE DATABASE AweSomeFitDB;

/*--------------- Creation of new tables ----------------*/

CREATE TABLE admin (
    admin_id INT NOT NULL AUTO_INCREMENT,
    admin_username VARCHAR(25) UNIQUE NOT NULL,
    admin_password VARCHAR(32) NOT NULL,
    PRIMARY KEY (admin_id)
);

CREATE TABLE costumer(
    costumer_id INT NOT NULL AUTO_INCREMENT,
    costumer_firstname VARCHAR(25) NOT NULL,
    costumer_lastname VARCHAR(20) NOT NULL,
    costumer_email VARCHAR(40) UNIQUE NOT NULL,
    costumer_password VARCHAR(32) NOT NULL,
    /*---- secret_code ?*/
    PRIMARY KEY (costumer_id)
);

CREATE TABLE address(
    address_id INT NOT NULL AUTO_INCREMENT,
    address_state VARCHAR(30) NOT NULL,
    address_city VARCHAR(45) NOT NULL,
    address_zip INT(10) NOT NULL,
    address_street VARCHAR(45) NOT NULL,
    address_civic_number INT DEFAULT '1',
    address_note VARCHAR(160) NOT NULL,
    PRIMARY KEY (address_id)
);

CREATE TABLE cart(
    cart_id INT NOT NULL AUTO_INCREMENT,
    /*---- cart_address, ?*/
    cart_address_id INT NOT NULL,
    cart_costumer_id INT NOT NULL,
    cart_ordered BOOLEAN DEFAULT '0',
    /* timestamp */
    cart_date TIMESTAMP NOT NULL DEFAULT NOW(),
    PRIMARY KEY (cart_id),
    FOREIGN KEY (cart_costumer_id) REFERENCES costumer(costumer_id) ON DELETE CASCADE,
    FOREIGN KEY (cart_address_id) REFERENCES address(address_id)
);

CREATE TABLE product(
    product_id INT NOT NULL AUTO_INCREMENT,
    product_name VARCHAR(45) NOT NULL,
    product_description VARCHAR(160) NOT NULL,
    product_gender ENUM('man', 'woman', 'unisex') NOT NULL,
    product_price FLOAT NOT NULL,
    /*product_type ENUM('pants', 'tshirt', 'jacket', 'hoodie', 'skirt', 'socks', 'shoes', 'underwear', 'bra', 'scarf', 'hat') NOT NULL,*/
    product_type VARCHAR(15) NOT NULL,
    /*---- product_image, --??--*/
    PRIMARY KEY (product_id)
);

CREATE TABLE product_detail(
    detail_id INT NOT NULL AUTO_INCREMENT,
    detail_product_id INT NOT NULL, /* non mi piace il nome*/
    detail_size VARCHAR(5) NOT NULL,
    /*---- product_color ?*/
    detail_quantity INT DEFAULT '1',
    PRIMARY KEY (detail_id),
    FOREIGN KEY (detail_product_id) REFERENCES product(product_id)
);

CREATE TABLE cart_element(
    element_cart_id INT NOT NULL,
    element_detail_id INT NOT NULL,
    element_quantity INT NOT NULL,
    PRIMARY KEY (element_cart_id, element_detail_id),
    FOREIGN KEY (element_cart_id) REFERENCES cart(cart_id),
    FOREIGN KEY (element_detail_id) REFERENCES product_detail(detail_id)
);

/*--------------- Insertions of some records in tables ----------------*/

bananas
