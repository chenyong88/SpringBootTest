-- DROP TABLE IF EXISTS `ameba_user`;
CREATE TABLE IF NOT EXISTS `ameba_user` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `month` char(6) NOT NULL,
  `parent` varchar(30) NOT NULL,
  `dept` mediumint(8) unsigned NOT NULL,
  `account` char(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `monthAccount` (`month`, `account`),
  KEY `parent` (`parent`),
  KEY `dept` (`dept`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
