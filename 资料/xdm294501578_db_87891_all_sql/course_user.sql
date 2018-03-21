SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS  `course_user`;
CREATE TABLE `course_user` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `Fname` varchar(1) NOT NULL,
  `Fpassword` varchar(32) NOT NULL,
  `FcreateTime` datetime NOT NULL,
  `Fmail` varchar(32) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

SET FOREIGN_KEY_CHECKS = 1;

