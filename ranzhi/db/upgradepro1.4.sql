INSERT INTO `sys_entry` (`name`, `abbr`, `code`, `buildin`, `integration`, `open`, `key`, `ip`, `logo`, `login`, `control`, `size`, `position`, `visible`, `order`) VALUES
('进销存', '进销存', 'psi', 1, 1, 'iframe', 'be546d3fbb91fa8236b53a8c5fa90884', '*', 'theme/default/images/ips/app-psi.png', '../psi', 'simple', 'max', 'default', 1, 80);
INSERT INTO `sys_config` (`owner`, `app`, `module`, `section`, `key`, `value`) VALUES ('system','psi','order','orderNo','sale','[{\"type\":\"fixed\",\"fixed\":\"SO\",\"yearLength\":\"\",\"AILength\":\"\",\"AIClearType\":\"\"},{\"type\":\"year\",\"fixed\":\"\",\"yearLength\":\"4\",\"AILength\":\"\",\"AIClearType\":\"\"},{\"type\":\"month\",\"fixed\":\"\",\"yearLength\":\"\",\"AILength\":\"\",\"AIClearType\":\"\"},{\"type\":\"day\",\"fixed\":\"\",\"yearLength\":\"\",\"AILength\":\"\",\"AIClearType\":\"\"},{\"type\":\"AI\",\"fixed\":\"\",\"yearLength\":\"\",\"AILength\":\"3\",\"AIClearType\":\"day\"}]'),('system','psi','order','orderNo','purchase','[{\"type\":\"fixed\",\"fixed\":\"PI\",\"yearLength\":\"\",\"AILength\":\"\",\"AIClearType\":\"\"},{\"type\":\"year\",\"fixed\":\"\",\"yearLength\":\"4\",\"AILength\":\"\",\"AIClearType\":\"\"},{\"type\":\"month\",\"fixed\":\"\",\"yearLength\":\"\",\"AILength\":\"\",\"AIClearType\":\"\"},{\"type\":\"day\",\"fixed\":\"\",\"yearLength\":\"\",\"AILength\":\"\",\"AIClearType\":\"\"},{\"type\":\"AI\",\"fixed\":\"\",\"yearLength\":\"\",\"AILength\":\"3\",\"AIClearType\":\"day\"}]'),('system','psi','order','orderNo','out','[{\"type\":\"fixed\",\"fixed\":\"IO\",\"yearLength\":\"\",\"AILength\":\"\",\"AIClearType\":\"\"},{\"type\":\"year\",\"fixed\":\"\",\"yearLength\":\"4\",\"AILength\":\"\",\"AIClearType\":\"\"},{\"type\":\"month\",\"fixed\":\"\",\"yearLength\":\"\",\"AILength\":\"\",\"AIClearType\":\"\"},{\"type\":\"day\",\"fixed\":\"\",\"yearLength\":\"\",\"AILength\":\"\",\"AIClearType\":\"\"},{\"type\":\"AI\",\"fixed\":\"\",\"yearLength\":\"\",\"AILength\":\"3\",\"AIClearType\":\"day\"}]'),('system','psi','order','orderNo','in','[{\"type\":\"fixed\",\"fixed\":\"II\",\"yearLength\":\"\",\"AILength\":\"\",\"AIClearType\":\"\"},{\"type\":\"year\",\"fixed\":\"\",\"yearLength\":\"4\",\"AILength\":\"\",\"AIClearType\":\"\"},{\"type\":\"month\",\"fixed\":\"\",\"yearLength\":\"\",\"AILength\":\"\",\"AIClearType\":\"\"},{\"type\":\"day\",\"fixed\":\"\",\"yearLength\":\"\",\"AILength\":\"\",\"AIClearType\":\"\"},{\"type\":\"AI\",\"fixed\":\"\",\"yearLength\":\"\",\"AILength\":\"3\",\"AIClearType\":\"day\"}]');

ALTER TABLE `crm_contract` ADD `fund` mediumint(8) unsigned NOT NULL AFTER `contact`;
ALTER TABLE `sys_product`  ADD `category` mediumint(8) unsigned NOT NULL AFTER `type`;
ALTER TABLE `sys_product`  ADD `pinyin` char(200) NOT NULL AFTER `category`;
ALTER TABLE `sys_product`  ADD `model` char(30) NOT NULL AFTER `pinyin`;
ALTER TABLE `sys_product`  ADD `unit` char(30) NOT NULL AFTER `model`;
ALTER TABLE `sys_product`  ADD `barcode` char(30) NOT NULL AFTER `unit`;
ALTER TABLE `sys_product`  ADD `brand` varchar(100) NOT NULL AFTER `barcode`;
ALTER TABLE `sys_product`  ADD `store` smallint(5) unsigned NOT NULL AFTER `brand`;
ALTER TABLE `sys_product`  ADD `price` decimal(15,2) NOT NULL AFTER `store`;
ALTER TABLE `sys_product`  ADD `amount` decimal(15,2) NOT NULL AFTER `price`;

ALTER TABLE `sys_workflowfield` CHANGE `options` `options` text NOT NULL;
ALTER TABLE `sys_workflowdatasource` CHANGE `type` `type` enum('system', 'sql', 'func', 'option', 'lang') NOT NULL DEFAULT 'option';
ALTER TABLE `sys_workflow` ADD `position` varchar(20) NOT NULL AFTER `app`;
ALTER TABLE `sys_category` ADD `wechatDept` varchar(100) NOT NULL AFTER `id`;

RENAME TABLE `crm_orderAction` TO `crm_orderaction`;
RENAME TABLE `crm_orderField`  TO `crm_orderfield`;

-- DROP TABLE IF EXISTS `sys_oauth`;
CREATE TABLE IF NOT EXISTS `sys_oauth` (
  `account` varchar(30) NOT NULL,
  `provider` varchar(30) NOT NULL,
  `openID` varchar(60) NOT NULL,
  UNIQUE KEY `account` (`account`,`provider`,`openID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `cash_fund`;
CREATE TABLE IF NOT EXISTS `cash_fund` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL DEFAULT 'receivable',
  `origin` varchar(20) NOT NULL,
  `parent` mediumint(8) unsigned NOT NULL,
  `trader` mediumint(8) unsigned NOT NULL,
  `contract` mediumint(8) unsigned NOT NULL,
  `order` mediumint(8) unsigned NOT NULL,
  `batch` mediumint(8) unsigned NOT NULL,
  `deserved` decimal(15,2) NOT NULL,
  `actual` decimal(15,2) NOT NULL,
  `in` decimal(15,2) NOT NULL,
  `out` decimal(15,2) NOT NULL,
  `balance` decimal(15,2) NOT NULL,
  `desc` text NOT NULL,
  `createdBy` char(30) NOT NULL,
  `createdDate` datetime NOT NULL,
  `editedBy` char(30) NOT NULL,
  `editedDate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`),
  KEY `origin` (`origin`),
  KEY `parent` (`parent`),
  KEY `trader` (`trader`),
  KEY `order` (`order`),
  KEY `batch` (`batch`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `psi_batch`;
CREATE TABLE IF NOT EXISTS `psi_batch` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `batchNo` varchar(255) NOT NULL,
  `type` enum('in', 'out') NOT NULL DEFAULT 'in',
  `trader` mediumint(8) unsigned NOT NULL,
  `order` mediumint(8) unsigned NOT NULL,
  `fund` mediumint(8) unsigned NOT NULL,
  `money` decimal(15,2) NOT NULL,
  `pickedBy` char(30) NOT NULL,
  `pickedDate` datetime  NOT NULL,
  `expressedBy` char(30) NOT NULL,
  `expressedDate` datetime NOT NULL,
  `express` smallint(5) unsigned NOT NULL,
  `waybill` char(50) NOT NULL,
  `createdBy` char(30) NOT NULL,
  `createdDate` datetime NOT NULL,
  `assignedTo` char(30) NOT NULL,
  `assignedBy` char(30) NOT NULL,
  `assignedDate` datetime NOT NULL,
  `status` char(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order` (`order`),
  KEY `trader` (`trader`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `psi_batchproduct`;
CREATE TABLE IF NOT EXISTS `psi_batchproduct` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `order` mediumint(8) unsigned NOT NULL,
  `trader` mediumint(8) unsigned NOT NULL,
  `batch` mediumint(8) unsigned NOT NULL,
  `product` mediumint(8) unsigned NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `money` decimal(15,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `batch` (`batch`),
  KEY `order` (`order`),
  KEY `trader` (`trader`),
  KEY `product` (`product`),
  UNIQUE KEY `batchProduct` (`batch`,`product`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `psi_order`;
CREATE TABLE IF NOT EXISTS `psi_order` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `orderNo` varchar(255) NOT NULL,
  `type` enum('sale', 'purchase') NOT NULL DEFAULT 'sale',
  `trader` mediumint(8) unsigned NOT NULL,
  `contract` mediumint(8) unsigned NOT NULL,
  `money` decimal(15,2) NOT NULL,
  `taxed` enum('0', '1') NOT NULL DEFAULT '1',
  `settlement` char(30) NOT NULL,
  `desc` text NOT NULL,
  `createdBy` char(30) NOT NULL,
  `createdDate` datetime NOT NULL,
  `editedBy` char(30) NOT NULL,
  `editedDate` datetime NOT NULL,
  `assignedTo` char(30) NOT NULL,
  `assignedBy` char(30) NOT NULL,
  `assignedDate` datetime NOT NULL,
  `finishedDate` datetime NOT NULL,
  `status` char(20) NOT NULL,
  `deleted` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `trader` (`trader`),
  KEY `status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `psi_orderproduct`;
CREATE TABLE IF NOT EXISTS `psi_orderproduct` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `order` mediumint(8) unsigned NOT NULL,
  `trader` mediumint(8) unsigned NOT NULL,
  `product` mediumint(8) unsigned NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `money` decimal(15,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order` (`order`),
  KEY `trader` (`trader`),
  KEY `product` (`product`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `psi_purchaseproduct`;
CREATE TABLE IF NOT EXISTS `psi_purchaseproduct` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `order` mediumint(8) NOT NULL,
  `product` mediumint(8) unsigned NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `assignedTo` char(30) NOT NULL,
  `status` char(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order` (`order`),
  KEY `product` (`product`),
  UNIQUE KEY `orderProduct` (`order`,`product`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `sys_store`;
CREATE TABLE IF NOT EXISTS `sys_store` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `location` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `manager` varchar(100) NOT NULL,
  `deleted` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
