CREATE database doubtmaster;

use database doubtmaster;

CREATE TABLE `category` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `category_description` varchar(1000) NOT NULL,
  PRIMARY KEY (`category_id`)
);

CREATE TABLE `comment` (
  `comment_id` int NOT NULL AUTO_INCREMENT,
  `comment_content` varchar(2000) NOT NULL,
  `comment_time` datetime NOT NULL,
  `comment_by` int NOT NULL,
  `thread_id` int NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `thread_id` (`thread_id`),
  CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`thread_id`) REFERENCES `thread` (`thread_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
);

CREATE TABLE `thread` (
  `thread_id` int NOT NULL AUTO_INCREMENT,
  `thread_title` varchar(255) NOT NULL,
  `thread_desc` varchar(1000) NOT NULL,
  `thread_user_id` int NOT NULL,
  `thread_cat_id` int NOT NULL,
  `timestamp` datetime NOT NULL,
  PRIMARY KEY (`thread_id`),
  KEY `thread_user_id` (`thread_user_id`),
  CONSTRAINT `thread_ibfk_1` FOREIGN KEY (`thread_user_id`) REFERENCES `user` (`Sno`) ON DELETE RESTRICT ON UPDATE RESTRICT
);

CREATE TABLE `user` (
  `Sno` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL,
  PRIMARY KEY (`Sno`)
);

INSERT INTO `category` VALUES (1,'Python','Python is an interpreted high-level general-purpose programming language. Its design philosophy emphasizes code readability with its use of significant indentation. Its language constructs as well as its object-oriented approach aim to help programmers write clear, logical code for small and large-scale projects.'),(2,'C++','C++ is a general-purpose programming language created by Bjarne Stroustrup as an extension of the C programming language, or "C with Classes".');
