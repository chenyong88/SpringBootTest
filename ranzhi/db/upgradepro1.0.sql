-- DROP TABLE IF EXISTS `sys_workflow`;
CREATE TABLE `sys_workflow` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(10) NOT NULL DEFAULT 'flow',
  `app` varchar(20) NOT NULL,
  `module` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `order` smallint(5) unsigned NOT NULL DEFAULT 0,
  `desc` text NOT NULL,
  `createdBy` varchar(30) NOT NULL,
  `createdDate` datetime NOT NULL,
  `editedBy` varchar(30) NOT NULL,
  `editedDate` datetime NOT NULL,
  `deleted` enum('0', '1') NOT NULL DEFAULT '0',
  PRIMARY KEY `id` (`id`),
  KEY `type` (`type`),
  KEY `app` (`app`),
  KEY `module` (`module`),
  KEY `order` (`order`),
  UNIQUE KEY `unique` (`app`, `module`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `sys_workflowfield`;
CREATE TABLE `sys_workflowfield` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `module` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `field`  varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `control` varchar(10) NOT NULL,
  `options` varchar(255) NOT NULL,
  `default` varchar(100) NOT NULL,
  `rules` varchar(255) NOT NULL,
  `placeholder` varchar(100) NOT NULL,
  `canSearch` enum('0', '1') NOT NULL DEFAULT '1',
  `order` smallint(5) unsigned NOT NULL DEFAULT 0,
  `desc` text NOT NULL,
  `createdBy` varchar(30) NOT NULL,
  `createdDate` datetime NOT NULL,
  `editedBy` varchar(30) NOT NULL,
  `editedDate` datetime NOT NULL,
  PRIMARY KEY `id` (`id`),
  KEY `module` (`module`),
  KEY `field` (`field`),
  KEY `order` (`order`),
  UNIQUE KEY `unique` (`module`, `field`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `sys_workflowaction`;
CREATE TABLE `sys_workflowaction` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `module` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `action` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `open` varchar(20) NOT NULL,
  `position` enum('menu', 'browseandview', 'browse', 'view') NOT NULL DEFAULT 'browseandview',
  `order` smallint(5) unsigned NOT NULL DEFAULT 0,
  `conditions` text NOT NULL,
  `results` text NOT NULL,
  `desc` text NOT NULL,
  `createdBy` varchar(30) NOT NULL,
  `createdDate` datetime NOT NULL,
  `editedBy` varchar(30) NOT NULL,
  `editedDate` datetime NOT NULL,
  `deleted` enum('0', '1') NOT NULL DEFAULT '0',
  PRIMARY KEY `id` (`id`),
  KEY `module` (`module`),
  KEY `action` (`action`),
  KEY `order` (`order`),
  UNIQUE KEY `unique` (`module`, `action`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `sys_workflowlayout`;
CREATE TABLE `sys_workflowlayout` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `module` mediumint(8) NOT NULL,
  `action` mediumint(8) NOT NULL,
  `field`  varchar(50) NOT NULL,
  `order` smallint(5) unsigned NOT NULL DEFAULT 0,
  `width` smallint(5) NOT NULL,
  `position` text NOT NULL,
  `defaultValue` text NOT NULL,
  `layoutRules` varchar(255) NOT NULL,
  PRIMARY KEY `id` (`id`),
  KEY `module` (`module`),
  KEY `action` (`action`),
  KEY `order` (`order`),
  UNIQUE KEY `unique` (`module`, `action`, `field`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `sys_workflowsql`;
CREATE TABLE `sys_workflowsql` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `module` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `field` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `action` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `sql` text NOT NULL,
  `vars` text NOT NULL,
  `createdBy` varchar(30) NOT NULL,
  `createdDate` datetime NOT NULL,
  `editedBy` varchar(30) NOT NULL,
  `editedDate` datetime NOT NULL,
  PRIMARY KEY `id` (`id`),
  KEY `module` (`module`),
  KEY `field` (`field`),
  KEY `action` (`action`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `sys_grouppriv` (`group`, `module`, `method`) VALUES
(1,'apppriv','flow'),
(1,'workflow','browse'),
(1,'workflow','create'),
(1,'workflow','edit'),
(1,'workflow','delete'),
(1,'workflow','view'),
(1,'workflow','adminField'),
(1,'workflow','createField'),
(1,'workflow','editField'),
(1,'workflow','deleteField'),
(1,'workflow','adminAction'),
(1,'workflow','createAction'),
(1,'workflow','editAction'),
(1,'workflow','deleteAction'),
(1,'workflow','adminCondition'),
(1,'workflow','adminLayout'),
(1,'workflow','adminResult'),
(1,'workflow','createResult'),
(1,'workflow','editResult'),
(1,'workflow','deleteResult');

INSERT INTO `sys_entry` (`name`, `abbr`, `code`, `buildin`, `integration`, `open`, `key`, `ip`, `logo`, `login`, `control`, `size`, `position`, `visible`, `order`) VALUES
('工作流', '工作流', 'flow', 1, 1, 'iframe', '68149a7806b73b5b0e16bc0a42bfcf43', '*', 'theme/default/images/ips/app-flow.png', '../flow', 'simple', 'max', 'default', 1, 90);
