-- DROP TABLE IF EXISTS `crm_dating`;
CREATE TABLE IF NOT EXISTS `crm_dating` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `objectType` varchar(30) NOT NULL,
  `objectID` mediumint(8) unsigned NOT NULL,
  `action` mediumint(8) unsigned NOT NULL,
  `contact` mediumint(8) unsigned NOT NULL,
  `account` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `desc` text NOT NULL,
  `status` enum('wait', 'done') NOT NULL DEFAULT 'wait',
  `createdBy` varchar(30) NOT NULL,
  `createdDate` datetime NOT NULL,
  `editedBy` varchar(30) NOT NULL,
  `editedDate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nextDate` (`status`, `objectType`, `objectID`, `date`, `account`, `contact`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
