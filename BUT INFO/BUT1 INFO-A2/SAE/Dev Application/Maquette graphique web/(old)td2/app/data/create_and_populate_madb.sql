CREATE TABLE IF NOT EXISTS product (
id INTEGER PRIMARY KEY,
name TEXT NOT NULL UNIQUE,
price FLOAT NOT NULL,
quantity INTEGER NOT NULL DEFAULT 0
);
INSERT OR REPLACE INTO product (id,name,price, quantity) VALUES (1,'p1',10.0,1);
INSERT OR REPLACE INTO product (id,name,price, quantity) VALUES (2,'p2',20.0,1);