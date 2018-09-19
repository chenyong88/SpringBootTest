ALTER TABLE `cash_trade` ADD `alipayTradeNo` varchar(50) NOT NULL AFTER `category`;

ALTER TABLE `hr_salary` ADD `exemption` decimal(12,2) NOT NULL DEFAULT 0.00 AFTER `allowance`;

ALTER TABLE `hr_salarydetail` CHANGE `item` `item` enum('bonus', 'allowance', 'exemption', 'deduction') NOT NULL;

UPDATE `sys_action` SET `action` = 'createorderproduct'  WHERE `action` = 'createdorderproduct';
UPDATE `sys_action` SET `action` = 'editorderproduct'    WHERE `action` = 'editedorderproduct';
UPDATE `sys_action` SET `action` = 'deletorderproduct'   WHERE `action` = 'deletedorderproduct';
UPDATE `sys_action` SET `action` = 'editproductinpick'   WHERE `action` = 'editedproductinpick';
UPDATE `sys_action` SET `action` = 'editproductinrecive' WHERE `action` = 'editedproductinrecive';

UPDATE `sys_grouppriv` SET `method` = 'exportTemplate' WHERE `module` = 'customer' AND `method` = 'exportTemplet';

UPDATE `sys_product` SET `line` = '' WHERE `line` = 'default'; 

INSERT INTO `sys_cron` (`m`, `h`, `dom`, `mon`, `dow`, `command`, `remark`, `type`, `buildin`, `status`, `lastTime`) VALUES
('1', '1', '*', '*', '*', 'appName=cash&moduleName=trade&methodName=syncAlipay', '支付宝同步任务', 'ranzhi', 1, 'normal', '0000-00-00 00:00:00');

-- DROP TABLE IF EXISTS `ameba_budget`;
CREATE TABLE IF NOT EXISTS `ameba_budget` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `year` smallint(5) unsigned NOT NULL,
  `dept` mediumint(8) unsigned NOT NULL,
  `amebaAccount` varchar(30) NOT NULL,
  `category` varchar(30) NOT NULL,
  `money` decimal(12,2) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `createdBy` varchar(30) NOT NULL,
  `createdDate` datetime NOT NULL,
  `editedBy` varchar(30) NOT NULL,
  `editedDate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `deptCategory` (`year`, `dept`, `category`),
  KEY `year` (`year`),
  KEY `dept` (`dept`),
  KEY `category` (`category`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `ameba_category`;
CREATE TABLE IF NOT EXISTS `ameba_category` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `root` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `parent` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `path` char(255) NOT NULL DEFAULT '',
  `grade` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `order` smallint(5) unsigned NOT NULL DEFAULT '0',
  `type` char(30) NOT NULL DEFAULT 'amebaAccount',
  `amebaAccount` varchar(30) NOT NULL,
  `category` mediumint(8) unsigned NOT NULL,
  `desc` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`),
  KEY `path` (`path`),
  KEY `grade` (`grade`),
  KEY `order` (`order`),
  KEY `type` (`type`),
  KEY `category` (`category`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `ameba_deal`;
CREATE TABLE IF NOT EXISTS `ameba_deal` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `from` mediumint(8) unsigned NOT NULL,
  `date` date NOT NULL,
  `amebaAccount` varchar(30) NOT NULL,
  `dept` mediumint(8) unsigned NOT NULL,
  `category` mediumint(8) unsigned NOT NULL,
  `product` mediumint(8) unsigned NOT NULL,
  `type` varchar(30) NOT NULL,
  `trade` mediumint(8) unsigned NOT NULL,
  `contract` mediumint(8) unsigned NOT NULL,
  `money` decimal(12,2) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `status` enum('wait', 'normal') NOT NULL DEFAULT 'wait',
  `createdBy` varchar(30) NOT NULL,
  `createdDate` datetime NOT NULL,
  `editedBy` varchar(30) NOT NULL,
  `editedDate` datetime NOT NULL,
  `confirmedBy` varchar(30) NOT NULL,
  `confirmedDate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `date` (`date`),
  KEY `amebaAccount` (`amebaAccount`),
  KEY `dept` (`dept`),
  KEY `category` (`category`),
  KEY `type` (`type`),
  KEY `contract` (`contract`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `ameba_fee`;
CREATE TABLE IF NOT EXISTS `ameba_fee` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `month` char(6) NOT NULL,
  `type` varchar(20) NOT NULL,
  `category` varchar(30) NOT NULL,
  `dept` mediumint(8) unsigned NOT NULL,
  `period` varchar(10) NOT NULL DEFAULT 'month',
  `shareType` varchar(30) NOT NULL DEFAULT 'person',
  `money` decimal(12,2) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `createdBy` varchar(30) NOT NULL,
  `createdDate` datetime NOT NULL,
  `editedBy` varchar(30) NOT NULL,
  `editedDate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `deptCategory` (`month`, `category`, `dept`),
  KEY `month` (`month`),
  KEY `type` (`type`),
  KEY `category` (`category`),
  KEY `dept` (`dept`),
  KEY `period` (`period`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `ameba_rule`;
CREATE TABLE IF NOT EXISTS `ameba_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `parent` mediumint(8) unsigned NOT NULL,
  `month` char(6) NOT NULL,
  `product` mediumint(8) unsigned NOT NULL,
  `category` mediumint(8) unsigned NOT NULL,
  `from` mediumint(8) unsigned NOT NULL,
  `fromCategory` mediumint(8) unsigned NOT NULL,
  `to` mediumint(8) unsigned NOT NULL,
  `toCategory` mediumint(8) unsigned NOT NULL,
  `rate` decimal(6,2) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `createdBy` varchar(30) NOT NULL,
  `createdDate` datetime NOT NULL,
  `editedBy` varchar(30) NOT NULL,
  `editedDate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `productCategory` (`parent`, `month`, `product`, `category`, `to`),
  KEY `month` (`month`),
  KEY `product` (`product`),
  KEY `category` (`category`),
  KEY `to` (`to`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `ameba_sharefee`;
CREATE TABLE IF NOT EXISTS `ameba_sharefee` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `fee` mediumint(8) unsigned NOT NULL,
  `month` char(6) NOT NULL,
  `dept` mediumint(8) unsigned NOT NULL,
  `rate` decimal(6,2) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `createdBy` varchar(30) NOT NULL,
  `createdDate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `feeDept` (`fee`, `dept`),
  KEY `fee` (`fee`),
  KEY `month` (`month`),
  KEY `dept` (`dept`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `ameba_statement`;
CREATE TABLE IF NOT EXISTS `ameba_statement` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `month` char(6) NOT NULL,
  `dept` mediumint(8) unsigned NOT NULL,
  `type` varchar(30) NOT NULL,
  `amebaAccount` varchar(30) NOT NULL,
  `category` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `expect` decimal(12,2) NOT NULL,
  `actual` decimal(12,2) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `createdBy` varchar(30) NOT NULL,
  `createdDate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `productCategory` (`month`, `dept`, `type`, `amebaAccount`, `category`, `date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

ALTER TABLE `cash_trade`   ADD `shareStatus` varchar(10) NOT NULL DEFAULT 'wait';
ALTER TABLE `sys_category` ADD `isAmebaDept` enum('0', '1') NOT NULL DEFAULT '0';
ALTER TABLE `sys_category` ADD `amebaDept` varchar(10) NOT NUll;
ALTER TABLE `sys_user`     ADD `parent` varchar(30) NOT NULL AFTER `id`;

INSERT INTO `ameba_category` (`id`, `parent`, `path`, `grade`, `order`, `type`, `amebaAccount`, `category`) VALUES
(1, 0, ',1,',   1, 1, 'amebaAccount', 'income',          830001),
(2, 1, ',1,2,', 2, 1, 'amebaAccount', 'externalIncome',  830002),
(3, 1, ',1,3,', 2, 2, 'amebaAccount', 'internalIncome',  830003),
(4, 0, ',4,',   1, 2, 'amebaAccount', 'expense',         830004),
(5, 4, ',4,5,', 2, 1, 'amebaAccount', 'internalDeal',    830005),
(6, 4, ',4,6,', 2, 2, 'amebaAccount', 'internalExpense', 830006),
(7, 4, ',4,7,', 2, 3, 'amebaAccount', 'shareExpense',    830007);

INSERT INTO `sys_category` (`id`, `name`, `type`) VALUES
(830001, '收入',     'amebaAccount'),
(830002, '外部收入', 'amebaAccount'),
(830003, '内部收入', 'amebaAccount'),
(830004, '支出',     'amebaAccount'),
(830005, '巴巴交易', 'amebaAccount'),
(830006, '巴内支出', 'amebaAccount'),
(830007, '公摊费用', 'amebaAccount');

INSERT INTO `sys_entry` (`name`, `abbr`, `code`, `buildin`, `integration`, `open`, `key`, `ip`, `logo`, `login`, `control`, `size`, `position`, `visible`, `order`) VALUES
('阿米巴', '阿米巴', 'ameba', 1, 1, 'iframe', 'c73507819a054358b6f45f3f522bd8d3', '*', 'theme/default/images/ips/app-ameba.png', '../ameba', 'simple', 'max', 'default', 1, 100);

INSERT INTO `sys_cron` (`m`, `h`, `dom`, `mon`, `dow`, `command`, `remark`, `type`, `buildin`, `status`, `lastTime`) VALUES
('1', '1', '*', '*', '*', 'appName=ameba&moduleName=deal&methodName=batchShare', '分配收入/分摊支出', 'ranzhi', 1, 'normal', '0000-00-00 00:00:00'),
('1', '1', '*', '*', '*', 'appName=ameba&moduleName=amebareport&methodName=updateStatement', '更新阿米巴核算表', 'ranzhi', 1, 'normal', '0000-00-00 00:00:00');

INSERT INTO `sys_grouppriv` (`group`, `module`, `method`) VALUES
(1,'apppriv','ameba'),
(1,'amebareport','dailyReport'),
(1,'amebareport','weeklyReport'),
(1,'amebareport','updateStatement'),
(1,'budget','browse'),
(1,'budget','create'),
(1,'budget','batchCreate'),
(1,'budget','edit'),
(1,'budget','view'),
(1,'budget','delete'),
(1,'budget','report'),
(1,'deal','browse'),
(1,'deal','browseWait'),
(1,'deal','browseIncome'),
(1,'deal','browseExpense'),
(1,'deal','create'),
(1,'deal','edit'),
(1,'deal','view'),
(1,'deal','delete'),
(1,'deal','confirm'),
(1,'deal','switchTradeStatus'),
(1,'deal','batchShare'),
(1,'fee','browse'),
(1,'fee','create'),
(1,'fee','edit'),
(1,'fee','view'),
(1,'fee','delete'),
(1,'fee','share'),
(1,'rule','browse'),
(1,'rule','create'),
(1,'rule','edit'),
(1,'rule','view'),
(1,'rule','delete'),
(1,'rule','share');
