ALTER TABLE `sys_workflowaction` ADD `verifications` text NOT NULL AFTER `conditions`;
ALTER TABLE `sys_workflowaction` ADD `toList` char(255) NOT NULL AFTER `results`;
ALTER TABLE `sys_workflow` ADD `administrator` char(255) NOT NULL AFTER `order`;
ALTER TABLE `sys_action` ADD `efforted` BOOL NOT NULL DEFAULT  '0';
ALTER TABLE `sys_workflowfield` ADD `isForeignKey` enum('0', '1') NOT NULL DEFAULT '0' AFTER `canSearch`;
ALTER TABLE `sys_workflowfield` ADD `isKey` enum('0', '1') NOT NULL DEFAULT '0' AFTER `isForeignKey`;
ALTER TABLE `sys_workflowfield` ADD `isValue` enum('0', '1') NOT NULL DEFAULT '0' AFTER `isKey`;

UPDATE `sys_workflow` SET `type`='table' WHERE `type`='';

-- DROP TABLE IF EXISTS `sys_effort`;
CREATE TABLE IF NOT EXISTS `sys_effort` (
  `id` MEDIUMINT( 8 ) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `objectType` VARCHAR( 30 ) NOT NULL,
  `objectID` SMALLINT( 8 ) UNSIGNED NOT NULL,
  `project` MEDIUMINT( 8 ) UNSIGNED NOT NULL,
  `account` VARCHAR( 30 ) NOT NULL,
  `work` VARCHAR( 255 ) NOT NULL,
  `date` DATE NOT NULL,
  `left` float NOT NULL,
  `consumed` float NOT NULL,
  `begin` SMALLINT( 4 ) UNSIGNED ZEROFILL NOT NULL,
  `end` SMALLINT( 4 ) UNSIGNED ZEROFILL NOT NULL,
  KEY `effort` (`project`,`objectID`,`date`,`account`)
) ENGINE = MYISAM CHARACTER SET utf8 COLLATE utf8_general_ci;

-- DROP TABLE IF EXISTS `sys_weekly`;
CREATE TABLE IF NOT EXISTS `sys_weekly` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `content` text NOT NULL,
  `begin` date NOT NULL,
  `end` date NOT NULL,
  `status` enum('draft', 'normal') NOT NULL DEFAULT 'normal',
  `createdBy` varchar(30) NOT NULL,
  `createdDate` datetime NOT NULL,
  `editedBy` varchar(30) NOT NULL,
  `editedDate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = MYISAM CHARACTER SET utf8 COLLATE utf8_general_ci;
