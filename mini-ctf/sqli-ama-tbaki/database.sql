USE supersqli;

DROP TABLE IF EXISTS `words`;

CREATE TABLE `words` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

LOCK TABLES `words` WRITE;

INSERT INTO `words` VALUES (1, 'Hack the Planet!');
INSERT INTO `words` VALUES (2, 'Boot Up or Shut Up!');

UNLOCK TABLES;


DROP TABLE IF EXISTS `f8bfef214dd55919bd72ddee388c9b71`;

CREATE TABLE `f8bfef214dd55919bd72ddee388c9b71` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `flag` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

LOCK TABLES `f8bfef214dd55919bd72ddee388c9b71` WRITE;
INSERT INTO `f8bfef214dd55919bd72ddee388c9b71` VALUES (1, 'securinets{soufflet_joumhouria_x_w_hata_l_croissant_keka_wbara}');
UNLOCK TABLES;

GRANT SELECT on supersqli.* to supersqli@'%' identified by 'supersqli';
FLUSH PRIVILEGES;