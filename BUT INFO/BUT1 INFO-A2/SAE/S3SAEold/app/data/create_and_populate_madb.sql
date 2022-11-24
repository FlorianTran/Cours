CREATE TABLE IF NOT EXISTS `product` (
`id` int(11) NOT NULL,
`name` varchar(32) NOT NULL,
`price` FLOAT NOT NULL,
`quantity` INT NOT NULL DEFAULT 0
) ENGINE = InnoDB DEFAULT CHARSET = utf8;
ALTER TABLE `product` ADD PRIMARY KEY(`id`);
ALTER TABLE `product` ADD UNIQUE KEY `uk_login`(`name`);
INSERT INTO `product` (`id`, `name`, `price`, `quantity`)
VALUES ('1', 'p1', '1', '1');
INSERT INTO `product` (`id`, `name`, `price`, `quantity`)
VALUES ('2', 'p2', '2', '2');
CREATE TABLE IF NOT EXISTS `user` (
pseudo varchar(255) PRIMARY KEY,
password varchar(255) NOT NULL,
status varchar(255) NOT NULL
CHECK ( status IN ('Administrator','Customer','Visitor'))
);
/* password = pass */
INSERT INTO user (pseudo,password,status)
VALUES ('Jojo',
'$2y$10$JMuuaDMCavASPKf9KBcD1eaMHJ0zkeD8eYs7HjecoD8QeUVRhKQq6',
'Visitor');
INSERT INTO user (pseudo,password,status)
VALUES ('Raoul',
'$2y$10$JMuuaDMCavASPKf9KBcD1eaMHJ0zkeD8eYs7HjecoD8QeUVRhKQq6',
'Customer');
INSERT INTO user (pseudo,password,status)
VALUES ('Romeo',
'$2y$10$JMuuaDMCavASPKf9KBcD1eaMHJ0zkeD8eYs7HjecoD8QeUVRhKQq6',
'Administrator');