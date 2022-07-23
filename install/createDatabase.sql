CREATE DATABASE store;

USE store;

CREATE TABLE categories ( 
	id int NOT NULL AUTO_INCREMENT, 
    `name` varchar(150),

    PRIMARY KEY(id)
    );
CREATE TABLE products ( 
	id int NOT NULL AUTO_INCREMENT, 
    `name` varchar(150),
    model varchar(100),
    description varchar(1000),
    price float,
    category_id int NOT NULL,
    
    PRIMARY KEY(id),
    FOREIGN KEY(category_id)
    REFERENCES categories(id)
    );
    
CREATE TABLE comments ( 
	id int NOT NULL AUTO_INCREMENT, 
    `text` varchar(255),
    classification varchar(100),
    `name` varchar(150),
    product_id int NOT NULL,
    
    PRIMARY KEY(id),
    FOREIGN KEY(product_id)
    REFERENCES products(id)
    );
    
CREATE TABLE category_has_subcategory(
	id int NOT NULL AUTO_INCREMENT,
    category_id int NOT NULL,
    parent_id int NOT NULL,
    
    PRIMARY KEY(id)
);

CREATE TABLE orders(
	id int NOT NULL AUTO_INCREMENT,
    product_id int NOT NULL,
    quantity int NOT NULL,
    total_sale double NOT NULL,
    
    PRIMARY KEY(id),
    FOREIGN KEY(product_id)
    REFERENCES products(id)
);
    
    
    
insert into categories(`name`) 
values('Laptops'), ('Escritorio'),('Laptop Gamer'), ('CPUs'), ('All in One'),
	('Workstations'), ('PC Gamer'), ('Mini PC'), ('Servidores'), ('Reacondicionadas');
    
insert into category_has_subcategory(category_id, parent_id)
values(3,1),(5,1),(6,1),(6,2),(7,2),(8,2),(10,1),(10,2);

insert into products(name,model,description,price, category_id)
values('Laptop Dell Vostro 3400 - 14"', 'VT8MY', 'lksdmvlkmsdlkv', 15000,1),
('Laptop Dell Vostro 3400 - 14"', 'VT8MY', 'lksdmvlkmsdlkv', 15000,1),
('Laptop Dell XT-550"', '23DFE', 'sfw434r3fre', 17500,1),
('PC Dell BFH 16"', 'ER34', 'WEW$F#$Fsdf', 33000,2),
('PC HP', 'VT8MY', 'lksdmvlkmsdlkv', 11000,2),
('CPU', '!@@!CDF', 'lksdmvlkmsdlkv', 15000,3),
('Laptop Dell Vostro 3400 - 14"', 'VT8MY', 'lksdmvlkmsdlkv', 15000,1),
('Laptop Dell XT-550"', '23DFE', 'sfw434r3fre', 17500,1),
('PC Dell BFH 16"', 'ER34', 'WEW$F#$Fsdf', 33000,2),
('PC HP', 'VT8MY', 'lksdmvlkmsdlkv', 11000,2),
('CPU', '!@@!CDF', 'lksdmvlkmsdlkv', 15000,3),
('Laptop Dell Vostro 3400 - 14"', 'VT8MY', 'lksdmvlkmsdlkv', 15000,1),
('Laptop Dell XT-550"', '23DFE', 'sfw434r3fre', 17500,1),
('PC Dell BFH 16"', 'ER34', 'WEW$F#$Fsdf', 33000,2),
('PC HP', 'VT8MY', 'lksdmvlkmsdlkv', 11000,2),
('CPU', '!@@!CDF', 'lksdmvlkmsdlkv', 15000,3);

insert into comments(`text`, classification, `name`, product_id)
values('Buen producto', '3', 'Juan', 1),
('Buen producto', '1', 'Juan', 1),
('Todo bien con el producto', '1', 'Hector', 1),
('ok', '2', 'Raul', 2),
('Maloooo', '5', 'Romina', 2),
('Buen producto', '1', 'Lui', 4),
('Bueno', '1', 'Sam', 5);

insert into orders(product_id, quantity, total_sale)
values(1,3,100),(1,2,300),
(2,1,100),(4,2,300),(2,1,100),(1,2,300),
(3,2,100),(4,2,300),(2,1,100),(8,2,300),
(3,3,100),(5,2,300),(1,1,100),(1,2,300);
