-- DROP TABLE IF EXISTS `hr_commissionrule`;
CREATE TABLE `hr_commissionrule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `month` char(10) NOT NULL,
  `account` char(30) NOT NULL,
  `sale` text NOT NULL,
  `line` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `month` (`month`),
  KEY `account` (`account`),
  UNIQUE KEY `month_account` (`month`, `account`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `sys_workflowdatasource`;
CREATE TABLE `sys_workflowdatasource` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('system', 'sql', 'func', 'option') NOT NULL DEFAULT 'option',
  `name` varchar(30) NOT NULL,
  `datasource` text NOT NULL, 
  `createdBy` char(30) NOT NULL,
  `createdDate` datetime NOT NULL,
  `editedBy` char(30) NOT NULL,
  `editedDate` datetime NOT NULL,
  `deleted` enum('0', '1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `type` (`type`),
  KEY `deleted` (`deleted`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `sys_workflowrule`;
CREATE TABLE `sys_workflowrule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('regex', 'func') NOT NULL DEFAULT 'regex',
  `name` varchar(30) NOT NULL,
  `rule` text NOT NULL, 
  `createdBy` char(30) NOT NULL,
  `createdDate` datetime NOT NULL,
  `editedBy` char(30) NOT NULL,
  `editedDate` datetime NOT NULL,
  `deleted` enum('0', '1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `type` (`type`),
  KEY `deleted` (`deleted`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `sys_workflowmenu`;
CREATE TABLE `sys_workflowmenu` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `module` mediumint(8) unsigned NOT NULL,
  `label` varchar(255) NOT NULL,
  `params` text NOT NULL,
  `order` tinyint(3) NOT NULL,
  `createdBy` char(30) NOT NULL,
  `createdDate` datetime NOT NULL,
  `editedBy` char(30) NOT NULL,
  `editedDate` datetime NOT NULL,
  `deleted` enum('0', '1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `module` (`module`),
  KEY `deleted` (`deleted`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

ALTER TABLE `hr_tradecommission` ADD `type` char(10) NOT NULL DEFAULT 'sale' AFTER `id`;
ALTER TABLE `hr_tradecommission` DROP INDEX `commission`;
ALTER TABLE `hr_tradecommission` DROP INDEX `tradecommission`;
ALTER TABLE `hr_tradecommission` ADD UNIQUE `tradecommission` (`type`, `trade`, `account`);

ALTER TABLE `sys_workflow` ADD `parent` mediumint(8) unsigned NOT NULL AFTER `id`;

REPLACE INTO `sys_grouppriv` (`group`, `module`, `method`) VALUES
(1,'salary','report'),
(1,'commission','switchIgnore'),
(1,'commission','batchSwitchIgnore'),
(1,'workflow','adminDatasource'),
(1,'workflow','createDatasource'),
(1,'workflow','editDatasource'),
(1,'workflow','deleteDatasource'),
(1,'workflow','adminRule'),
(1,'workflow','createRule'),
(1,'workflow','editRule'),
(1,'workflow','viewRule'),
(1,'workflow','deleteRule'),
(1,'workflow','adminModuleMenu'),
(1,'workflow','createModuleMenu'),
(1,'workflow','editModuleMenu'),
(1,'workflow','deleteModuleMenu'),
(2,'salary','report'),
(2,'commission','switchIgnore'),
(2,'commission','batchSwitchIgnore');

-- DROP TABLE IF EXISTS `flow_stamp`;
CREATE TABLE `flow_stamp` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `proposer` varchar(200) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `begin` datetime NOT NULL,
  `end` datetime NOT NULL,
  `type` varchar(200) NOT NULL,
  `desc` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'draft',
  `reviewedBy` varchar(200) NOT NULL,
  `reviewedDate` datetime NOT NULL,
  `parent` mediumint(8) unsigned NOT NULL,
  `createdBy` varchar(30) NOT NULL,
  `createdDate` datetime NOT NULL,
  `editedBy` varchar(30) NOT NULL,
  `editedDate` datetime NOT NULL,
  `deleted` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `flow_meetingroom`;
CREATE TABLE `flow_meetingroom` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `position` varchar(200) NOT NULL,
  `seats` varchar(200) NOT NULL,
  `equipment` varchar(200) NOT NULL,
  `workday` varchar(200) NOT NULL,
  `parent` mediumint(8) unsigned NOT NULL,
  `createdBy` varchar(30) NOT NULL,
  `createdDate` datetime NOT NULL,
  `editedBy` varchar(30) NOT NULL,
  `editedDate` datetime NOT NULL,
  `deleted` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `flow_meetingroombooking`;
CREATE TABLE `flow_meetingroombooking` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `room` varchar(200) NOT NULL,
  `begin` datetime NOT NULL,
  `end` datetime NOT NULL,
  `orderedBy` varchar(200) NOT NULL,
  `orderedDate` datetime NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'draft',
  `desc` varchar(200) NOT NULL,
  `parent` mediumint(8) unsigned NOT NULL,
  `createdBy` varchar(30) NOT NULL,
  `createdDate` datetime NOT NULL,
  `editedBy` varchar(30) NOT NULL,
  `editedDate` datetime NOT NULL,
  `deleted` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
