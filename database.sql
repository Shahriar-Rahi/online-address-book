create database `addbook`;

use `addbook`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,  
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB;

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  CONSTRAINT FK_contacts_1
  FOREIGN KEY (user_id) REFERENCES users(id)
  ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;
