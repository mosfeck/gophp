DROP DATABASE IF EXISTS `test_db`;
CREATE DATABASE `test_db`;
USE `test_db`;

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(255) NULL,
  `post_content` text NULL,
  `post_created_at` datetime NULL,
  `post_updated_at` datetime NULL,
  `post_deleted_at` datetime NULL,
  PRIMARY KEY (`post_id`),
   INDEX (`post_id`)
) ENGINE=InnoDB;

commit;