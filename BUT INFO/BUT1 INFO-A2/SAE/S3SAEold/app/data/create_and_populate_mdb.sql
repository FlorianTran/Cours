CREATE TABLE IF NOT EXISTS product (
id INTEGER PRIMARY KEY,
name TEXT NOT NULL UNIQUE,
price FLOAT NOT NULL,
quantity INTEGER NOT NULL DEFAULT 0
);
INSERT OR REPLACE INTO product (id,name,price, quantity) VALUES (1,'LUMIERE',99.6,1);
INSERT OR REPLACE INTO product (id,name,price, quantity) VALUES (2,'OMBRE',66.7,1);
INSERT OR REPLACE INTO product (id,name,price, quantity) VALUES (7,'Sheesh',89.0,1);
INSERT OR REPLACE INTO product (id,name,price, quantity) VALUES (85,'I',2.3,1);