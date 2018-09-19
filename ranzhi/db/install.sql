-- DROP TABLE IF EXISTS `ameba_budget`;
CREATE TABLE IF NOT EXISTS `ameba_budget` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `year` smallint(5) unsigned NOT NULL,
  `dept` mediumint(8) unsigned NOT NULL,
  `amebaAccount` varchar(30) NOT NULL,
  `line` varchar(60) NOT NULL,
  `category` varchar(30) NOT NULL,
  `money` decimal(12,2) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `createdBy` varchar(30) NOT NULL,
  `createdDate` datetime NOT NULL,
  `editedBy` varchar(30) NOT NULL,
  `editedDate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `amebaBudget` (`year`, `dept`, `category`),
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
  `desc` text NOT NULL,
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
  UNIQUE KEY `amebaFee` (`month`, `category`, `dept`),
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
  UNIQUE KEY `amebaRule` (`parent`, `month`, `product`, `category`, `to`),
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
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `archived` enum('0', '1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `amebaStatement` (`month`, `dept`, `type`, `amebaAccount`, `category`, `date`),
  KEY `month` (`month`),
  KEY `dept` (`dept`),
  KEY `type` (`type`),
  KEY `amebaAccount` (`amebaAccount`),
  KEY `category` (`category`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `ameba_dept`;
CREATE TABLE IF NOT EXISTS `ameba_dept` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `dept` mediumint(8) unsigned NOT NULL,
  `month` char(6) NOT NULL,
  `name` char(30) NOT NULL,
  `root` mediumint(8) unsigned NOT NULL,
  `parent` mediumint(8) unsigned NOT NULL,
  `path` char(255) NOT NULL,
  `grade` tinyint(3) unsigned NOT NULL,
  `order` smallint(5) unsigned NOT NULL,
  `moderators` varchar(255) NOT NULL,
  `isAmebaDept` enum('0', '1') NOT NULL DEFAULT '0',
  `amebaDept` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `deptMonth` (`dept`, `month`),
  KEY `dept` (`dept`),
  KEY `month` (`month`),
  KEY `parent` (`parent`),
  KEY `path` (`path`),
  KEY `grade` (`grade`),
  KEY `order` (`order`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `ameba_user`;
CREATE TABLE IF NOT EXISTS `ameba_user` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `month` char(6) NOT NULL,
  `parent` varchar(30) NOT NULL,
  `unofficial` enum('0', '1') NOT NULL DEFAULT '0',
  `dept` mediumint(8) unsigned NOT NULL,
  `account` char(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `monthAccount` (`month`, `account`),
  KEY `parent` (`parent`),
  KEY `dept` (`dept`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `ameba_setting`;
CREATE TABLE IF NOT EXISTS `ameba_setting` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `month` char(6) NOT NULL,
  `taxRate` decimal(5, 2) NOT NULL,
  `shareDepts` varchar(255) NOT NULL,
  `excludeCategories` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `month` (`month`)
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

-- DROP TABLE IF EXISTS `cash_invoice`;
CREATE TABLE IF NOT EXISTS `cash_invoice` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `sn` varchar(20) NOT NULL,
  `company` mediumint(8) unsigned NOT NULL,
  `customer` mediumint(8) unsigned NOT NULL,
  `contract` mediumint(8) unsigned NOT NULL,
  `contact` mediumint(8) unsigned NOT NULL,
  `address` mediumint(8) unsigned NOT NULL,
  `money` decimal(12,2) NOT NULL,
  `type` varchar(30) NOT NULL,
  `taxRate` tinyint(3) NOT NULL,
  `invoiceType` varchar(30) NOT NULL,
  `invoiceTitle` char(100) NOT NULL,
  `taxNumber` char(20) NOT NULL,
  `registedAddress` char(90) NOT NULL,
  `phone` char(20) NOT NULL,
  `bankName` char(100) NOT NULL,
  `bankAccount` char(30) NOT NULL,
  `express` char(30) NOT NULL,
  `waybill` char(30) NOT NULL,
  `sendway` char(30) NOT NULL,
  `sendAccount` varchar(100) NOT NULL,
  `status` char(30) NOT NULL,
  `desc` text NOT NULL,
  `createdBy` char(30) NOT NULL,
  `createdDate` datetime NOT NULL,
  `editedBy` char(30) NOT NULL,
  `editedDate` datetime NOT NULL,
  `receivedBy` char(30) NOT NULL,
  `receivedDate` datetime NOT NULL,
  `checkedBy` char(30) NOT NULL,
  `checkedDate` datetime NOT NULL,
  `drawnBy` char(30) NOT NULL,
  `drawnDate` datetime NOT NULL,
  `expressedBy` char(30) NOT NULL,
  `expressedDate` datetime NOT NULL,
  `taxRefundedBy` char(30) NOT NULL,
  `taxRefundedDate` datetime NOT NULL,
  `deleted` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `customer` (`customer`),
  KEY `contract` (`contract`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `cash_invoicedetail`;
CREATE TABLE IF NOT EXISTS `cash_invoicedetail` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `invoice` mediumint(8) unsigned NOT NULL,
  `item` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `money` decimal(12,2) NOT NULL,
  `taxRate` tinyint(3) NOT NULL,
  `taxMoney` decimal(12,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `invoice` (`invoice`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `crm_orderaction`;
CREATE TABLE IF NOT EXISTS `crm_orderaction` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `product` mediumint(8) unsigned NOT NULL,
  `action` char(30) NOT NULL,
  `name` char(100) NOT NULL,
  `conditions` text NOT NULL,
  `inputs` text NOT NULL,
  `results` text NOT NULL,
  `tasks` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product` (`product`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `crm_orderfield`;
CREATE TABLE IF NOT EXISTS `crm_orderfield` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `product` mediumint(8) unsigned NOT NULL,
  `field` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `order` tinyint(3) NOT NULL,
  `control` varchar(10) NOT NULL,
  `options` text NOT NULL,
  `default` varchar(100) NOT NULL,
  `rules` varchar(255) NOT NULL,
  `placeholder` varchar(100) NOT NULL,
  `desc` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product` (`product`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `crm_customerinvoice`;
CREATE TABLE IF NOT EXISTS `crm_customerinvoice` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `customer` mediumint(8) unsigned NOT NULL,
  `invoiceTitle` char(100) NOT NULL,
  `taxNumber` char(20) NOT NULL,
  `registedAddress` varchar(255) NOT NULL,
  `phone` char(20) NOT NULL,
  `bankName` char(30) NOT NULL,
  `bankAccount` char(90) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `taxNumber` (`customer`, `taxNumber`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `hr_salary`;
CREATE TABLE IF NOT EXISTS `hr_salary` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `month` char(10) NOT NULL,
  `account` char(30) NOT NULL,
  `dept` mediumint(8) NOT NULL,
  `basic` decimal(12,2) NOT NULL,
  `benefit` decimal(12,2) NOT NULL,
  `bonus` decimal(12,2) NOT NULL,
  `allowance` decimal(12,2) NOT NULL,
  `exemption` decimal(12,2) NOT NULL,
  `deduction` decimal(12,2) NOT NULL,
  `deserved` decimal(12,2) NOT NULL,
  `actual` decimal(12,2) NOT NULL,
  `companySSF` decimal(12,2) NOT NULL,
  `companyHPF` decimal(12,2) NOT NULL,
  `createdBy` char(30) NOT NULL,
  `createdDate` datetime NOT NULL,
  `editedBy` char(30) NOT NULL,
  `editedDate` datetime NOT NULL,
  `desc` text NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'wait',
  PRIMARY KEY (`id`),
  KEY `month` (`month`),
  KEY `account` (`account`),
  KEY `dept` (`dept`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `hr_salarydetail`;
CREATE TABLE IF NOT EXISTS `hr_salarydetail` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `salary` mediumint(8) NOT NULL,
  `item` enum('bonus', 'allowance', 'exemption', 'deduction') NOT NULL,
  `type` varchar(100) NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `desc` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `salary` (`salary`),
  KEY `item` (`item`),
  KEY `type` (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `hr_salarycommission`;
CREATE TABLE IF NOT EXISTS `hr_salarycommission` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `salary` mediumint(8) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'sale',
  `line` varchar(60) NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `rate` decimal(12,2) NOT NULL,
  `commission` decimal(12,2) NOT NULL,
  `desc` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `salarycommission` (`salary`, `type`, `line`),
  KEY `salary` (`salary`),
  KEY `line` (`line`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `hr_tradecommission`;
CREATE TABLE IF NOT EXISTS `hr_tradecommission` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(10) NOT NULL DEFAULT 'sale',
  `trade` mediumint(8) NOT NULL,
  `account` char(30) NOT NULL,
  `contribution` decimal(12,2) NOT NULL,
  `rate` decimal(12,2) NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `desc` text NOT NULL,
  `createdBy` char(30) NOT NULL,
  `createdDate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `account` (`account`),
  KEY `trade` (`trade`),
  UNIQUE KEY `tradecommission` (`type`, `trade`,`account`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `hr_commissionrule`;
CREATE TABLE IF NOT EXISTS `hr_commissionrule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `month` char(10) NOT NULL,
  `account` char(30) NOT NULL,
  `sale` text NOT NULL,
  `line` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `month` (`month`),
  KEY `account` (`account`),
  UNIQUE KEY `monthaccount` (`month`, `account`)
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

CREATE TABLE IF NOT EXISTS `sys_company` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(30) NOT NULL,
  `major` enum('0','1') NOT NULL DEFAULT '0',
  `content` text NOT NULL,
  `taxNumber` char(20) NOT NULL,
  `registedAddress` varchar(255) NOT NULL,
  `phone` char(20) NOT NULL,
  `bankName` char(30) NOT NULL,
  `bankAccount` char(90) NOT NULL,
  `status` char(90) NOT NULL,
  `createdBy` char(30) NOT NULL,
  `createdDate` datetime NOT NULL,
  `editedBy` char(30) NOT NULL,
  `editedDate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `sys_issue`;
CREATE TABLE IF NOT EXISTS `sys_issue` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `product` mediumint(8) unsigned NOT NULL,
  `category` mediumint(8) unsigned NOT NULL,
  `customer` mediumint(8) NOT NULL,
  `contact` mediumint(8) NOT NULL,
  `pri` tinyint(3) unsigned DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `type` varchar(30) NOT NULL,
  `addedBy` char(30) NOT NULL,
  `addedDate` datetime NOT NULL,
  `viewedDate` datetime NOT NULL,
  `assignedTo` char(30) NOT NULL,
  `assignedBy` char(30) NOT NULL,
  `assignedDate` datetime NOT NULL,
  `repliedBy` char(30) NOT NULL,
  `repliedDate` datetime NOT NULL,
  `transferedBy` char(30) NOT NULL,
  `transferedDate` datetime NOT NULL,
  `editedBy` char(30) NOT NULL,
  `editedDate` datetime NOT NULL,
  `closedBy` char(30) NOT NULL,
  `closedDate` datetime NOT NULL,
  `closedReason` varchar(30) NOT NULL,
  `activatedBy` char(30) NOT NULL,
  `activatedDate` datetime NOT NULL,
  `toObjectType` varchar(30) NOT NULL,
  `toObjectID` mediumint(8) unsigned NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `sys_searchdict`;
CREATE TABLE IF NOT EXISTS `sys_searchdict` (
  `key` smallint(5) unsigned NOT NULL,
  `value` char(3) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `sys_searchindex`;
CREATE TABLE IF NOT EXISTS `sys_searchindex` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `objectType` char(20) NOT NULL,
  `objectID` mediumint(9) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `addedDate` datetime NOT NULL,
  `editedDate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `object` (`objectType`,`objectID`),
  KEY `addedDate` (`addedDate`),
  FULLTEXT KEY `content` (`title`,`content`)
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

-- DROP TABLE IF EXISTS `sys_workflow`;
CREATE TABLE IF NOT EXISTS `sys_workflow` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `parent` varchar(30) NOT NULL, 
  `child` varchar(30) NOT NULL, 
  `type` varchar(10) NOT NULL DEFAULT 'flow',
  `app` varchar(20) NOT NULL,
  `position` varchar(30) NOT NULL,
  `module` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `order` smallint(5) unsigned NOT NULL,
  `administrator` text NOT NULL,
  `desc` text NOT NULL,
  `version` varchar(10) NOT NULL DEFAULT '1.0',
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

-- DROP TABLE IF EXISTS `sys_workflowaction`;
CREATE TABLE IF NOT EXISTS `sys_workflowaction` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `module` varchar(30) NOT NULL,
  `action` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `open` varchar(20) NOT NULL,
  `position` enum('menu', 'browseandview', 'browse', 'view') NOT NULL DEFAULT 'browseandview',
  `show` enum('dropdownlist', 'direct') NOT NULL DEFAULT 'dropdownlist',
  `order` smallint(5) unsigned NOT NULL,
  `conditions` text NOT NULL,
  `verifications` text NOT NULL,
  `results` text NOT NULL,
  `toList` char(255) NOT NULL,
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

-- DROP TABLE IF EXISTS `sys_workflowdatasource`;
CREATE TABLE IF NOT EXISTS `sys_workflowdatasource` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('system', 'sql', 'func', 'option', 'lang') NOT NULL DEFAULT 'option',
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

-- DROP TABLE IF EXISTS `sys_workflowfield`;
CREATE TABLE IF NOT EXISTS `sys_workflowfield` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `module` varchar(30) NOT NULL,
  `field`  varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'varchar',
  `length` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `control` varchar(10) NOT NULL,
  `options` text NOT NULL,
  `default` varchar(100) NOT NULL,
  `rules` varchar(255) NOT NULL,
  `placeholder` varchar(100) NOT NULL,
  `canExport` enum('0', '1') NOT NULL DEFAULT '1',
  `canSearch` enum('0', '1') NOT NULL DEFAULT '1',
  `isForeignKey` enum('0', '1') NOT NULL DEFAULT '0',
  `isKey` enum('0', '1') NOT NULL DEFAULT '0',
  `isValue` enum('0', '1') NOT NULL DEFAULT '0',
  `order` smallint(5) unsigned NOT NULL,
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

-- DROP TABLE IF EXISTS `sys_workflowlayout`;
CREATE TABLE IF NOT EXISTS `sys_workflowlayout` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `module` varchar(30) NOT NULL,
  `action` varchar(50) NOT NULL,
  `field`  varchar(50) NOT NULL,
  `order` smallint(5) unsigned NOT NULL,
  `width` smallint(5) NOT NULL,
  `position` text NOT NULL,
  `mobileShow` enum('0', '1') NOT NULL DEFAULT '1',
  `totalShow` enum('0', '1') NOT NULL DEFAULT '0',
  `defaultValue` text NOT NULL,
  `layoutRules` varchar(255) NOT NULL,
  PRIMARY KEY `id` (`id`),
  KEY `module` (`module`),
  KEY `action` (`action`),
  KEY `order` (`order`),
  UNIQUE KEY `unique` (`module`, `action`, `field`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `sys_workflowmenu`;
CREATE TABLE IF NOT EXISTS `sys_workflowmenu` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `module` varchar(30) NOT NULL,
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

-- DROP TABLE IF EXISTS `sys_workflowrule`;
CREATE TABLE IF NOT EXISTS `sys_workflowrule` (
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

-- DROP TABLE IF EXISTS `sys_workflowsql`;
CREATE TABLE IF NOT EXISTS `sys_workflowsql` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `module` varchar(30) NOT NULL,
  `field` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL,
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

-- DROP TABLE IF EXISTS `sys_workflowversion`;
CREATE TABLE IF NOT EXISTS `sys_workflowversion` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `module` varchar(30) NOT NULL,
  `version` varchar(10) NOT NULL,
  `fields` text NOT NULL,
  `actions` text NOT NULL,
  `layouts` text NOT NULL,
  `sqls` text NOT NULL,
  `menus` text NOT NULL,
  `table` text NOT NULL,
  `datas` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `moduleversion` (`module`, `version`),
  KEY `module` (`module`),
  KEY `version` (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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

-- DROP TABLE IF EXISTS `sys_oauth`;
CREATE TABLE IF NOT EXISTS `sys_oauth` (
  `account` varchar(30) NOT NULL,
  `provider` varchar(30) NOT NULL,
  `openID` varchar(60) NOT NULL,
  UNIQUE KEY `account` (`account`,`provider`,`openID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

ALTER TABLE `cash_trade`     ADD `commission` decimal(12,2) NOT NULL AFTER `money`;
ALTER TABLE `cash_trade`     ADD `alipayTradeNo` varchar(50) NOT NULL AFTER `category`;
ALTER TABLE `cash_trade`     ADD `shareStatus` varchar(10) NOT NULL DEFAULT 'wait';
ALTER TABLE `cash_trade`     ADD `sharedDate` datetime NOT NULL AFTER `shareStatus`;
ALTER TABLE `cash_depositor` ADD `company` mediumint(8) unsigned NOT NULL AFTER `id`;
ALTER TABLE `crm_contact`    ADD `register` datetime NOT NULL;
ALTER TABLE `crm_contact`    ADD `last` datetime NOT NULL;
ALTER TABLE `crm_contact`    ADD `visits` mediumint(8) NOT NULL;
ALTER TABLE `crm_contact`    ADD `ip` char(50) NOT NULL;
ALTER TABLE `crm_contract`   ADD `fund` mediumint(8) unsigned NOT NULL AFTER `contact`;
ALTER TABLE `crm_contract`   ADD `company` mediumint(8) unsigned NOT NULL AFTER `id`;
ALTER TABLE `oa_leave`       ADD `level` tinyint(3) NOT NULL;
ALTER TABLE `oa_leave`       ADD `assignedTo` varchar(30) NOT NULL;
ALTER TABLE `oa_leave`       ADD `reviewers` text NOT NULL;
ALTER TABLE `oa_leave`       ADD `backReviewers` text NOT NULL;
ALTER TABLE `oa_lieu`        ADD `level` tinyint(3) NOT NULL;
ALTER TABLE `oa_lieu`        ADD `assignedTo` varchar(30) NOT NULL;
ALTER TABLE `oa_lieu`        ADD `reviewers` text NOT NULL;
ALTER TABLE `oa_overtime`    ADD `level` tinyint(3) NOT NULL;
ALTER TABLE `oa_overtime`    ADD `assignedTo` varchar(30) NOT NULL;
ALTER TABLE `oa_overtime`    ADD `reviewers` text NOT NULL;
ALTER TABLE `oa_refund`      ADD `level` tinyint(3) NOT NULL;
ALTER TABLE `oa_refund`      ADD `assignedTo` varchar(30) NOT NULL;
ALTER TABLE `oa_refund`      ADD `reviewers` text NOT NULL;
ALTER TABLE `sys_action`     ADD `origin` varchar(256) NOT NULL;
ALTER TABLE `sys_action`     ADD `efforted` BOOL NOT NULL DEFAULT  '0';
ALTER TABLE `sys_category`   ADD `wechatDept` varchar(100) NOT NULL AFTER `id`;
ALTER TABLE `sys_category`   ADD `isAmebaDept` enum('0', '1') NOT NULL DEFAULT '0';
ALTER TABLE `sys_category`   ADD `amebaDept` varchar(10) NOT NUll;
ALTER TABLE `sys_product`    ADD `roles` varchar(255) NOT NULL;
ALTER TABLE `sys_product`    ADD `pinyin` char(200) NOT NULL AFTER `category`;
ALTER TABLE `sys_product`    ADD `model` char(30) NOT NULL AFTER `pinyin`;
ALTER TABLE `sys_product`    ADD `unit` char(30) NOT NULL AFTER `model`;
ALTER TABLE `sys_product`    ADD `barcode` char(30) NOT NULL AFTER `unit`;
ALTER TABLE `sys_product`    ADD `brand` varchar(100) NOT NULL AFTER `barcode`;
ALTER TABLE `sys_product`    ADD `store` smallint(5) unsigned NOT NULL AFTER `brand`;
ALTER TABLE `sys_product`    ADD `price` decimal(15,2) NOT NULL AFTER `store`;
ALTER TABLE `sys_product`    ADD `amount` decimal(15,2) NOT NULL AFTER `price`;
ALTER TABLE `sys_user`       ADD `parent` varchar(30) NOT NULL AFTER `id`;
ALTER TABLE `sys_user`       ADD `unofficial` enum('0', '1') NOT NULL DEFAULT '0' AFTER `parent`;

ALTER TABLE `sys_action` CHANGE `action` `action` varchar(80) NOT NULL DEFAULT '';
ALTER TABLE `sys_action` CHANGE `extra` `extra` text;
ALTER TABLE `sys_file`   CHANGE `objectType` `objectType` char(30) NOT NULL;

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

INSERT INTO `sys_config` (`owner`, `app`, `module`, `section`, `key`, `value`) VALUES ('system','psi','order','orderNo','sale','[{\"type\":\"fixed\",\"fixed\":\"SO\",\"yearLength\":\"\",\"AILength\":\"\",\"AIClearType\":\"\"},{\"type\":\"year\",\"fixed\":\"\",\"yearLength\":\"4\",\"AILength\":\"\",\"AIClearType\":\"\"},{\"type\":\"month\",\"fixed\":\"\",\"yearLength\":\"\",\"AILength\":\"\",\"AIClearType\":\"\"},{\"type\":\"day\",\"fixed\":\"\",\"yearLength\":\"\",\"AILength\":\"\",\"AIClearType\":\"\"},{\"type\":\"AI\",\"fixed\":\"\",\"yearLength\":\"\",\"AILength\":\"3\",\"AIClearType\":\"day\"}]'),('system','psi','order','orderNo','purchase','[{\"type\":\"fixed\",\"fixed\":\"PI\",\"yearLength\":\"\",\"AILength\":\"\",\"AIClearType\":\"\"},{\"type\":\"year\",\"fixed\":\"\",\"yearLength\":\"4\",\"AILength\":\"\",\"AIClearType\":\"\"},{\"type\":\"month\",\"fixed\":\"\",\"yearLength\":\"\",\"AILength\":\"\",\"AIClearType\":\"\"},{\"type\":\"day\",\"fixed\":\"\",\"yearLength\":\"\",\"AILength\":\"\",\"AIClearType\":\"\"},{\"type\":\"AI\",\"fixed\":\"\",\"yearLength\":\"\",\"AILength\":\"3\",\"AIClearType\":\"day\"}]'),('system','psi','order','orderNo','out','[{\"type\":\"fixed\",\"fixed\":\"IO\",\"yearLength\":\"\",\"AILength\":\"\",\"AIClearType\":\"\"},{\"type\":\"year\",\"fixed\":\"\",\"yearLength\":\"4\",\"AILength\":\"\",\"AIClearType\":\"\"},{\"type\":\"month\",\"fixed\":\"\",\"yearLength\":\"\",\"AILength\":\"\",\"AIClearType\":\"\"},{\"type\":\"day\",\"fixed\":\"\",\"yearLength\":\"\",\"AILength\":\"\",\"AIClearType\":\"\"},{\"type\":\"AI\",\"fixed\":\"\",\"yearLength\":\"\",\"AILength\":\"3\",\"AIClearType\":\"day\"}]'),('system','psi','order','orderNo','in','[{\"type\":\"fixed\",\"fixed\":\"II\",\"yearLength\":\"\",\"AILength\":\"\",\"AIClearType\":\"\"},{\"type\":\"year\",\"fixed\":\"\",\"yearLength\":\"4\",\"AILength\":\"\",\"AIClearType\":\"\"},{\"type\":\"month\",\"fixed\":\"\",\"yearLength\":\"\",\"AILength\":\"\",\"AIClearType\":\"\"},{\"type\":\"day\",\"fixed\":\"\",\"yearLength\":\"\",\"AILength\":\"\",\"AIClearType\":\"\"},{\"type\":\"AI\",\"fixed\":\"\",\"yearLength\":\"\",\"AILength\":\"3\",\"AIClearType\":\"day\"}]');

INSERT INTO `sys_cron` (`m`, `h`, `dom`, `mon`, `dow`, `command`, `remark`, `type`, `buildin`, `status`, `lastTime`) VALUES
('1', '1', '*', '*', '*', 'appName=crm&moduleName=leads&methodName=sync',                    '名单同步任务',      'ranzhi', 1, 'normal', '0000-00-00 00:00:00'),
('1', '1', '*', '*', '*', 'appName=cash&moduleName=trade&methodName=syncAlipay',             '支付宝同步任务',    'ranzhi', 1, 'normal', '0000-00-00 00:00:00'),
('1', '1', '*', '*', '*', 'appName=ameba&moduleName=deal&methodName=batchShare',             '分配收入/分摊支出', 'ranzhi', 1, 'normal', '0000-00-00 00:00:00'),
('1', '1', '*', '*', '*', 'appName=ameba&moduleName=amebareport&methodName=updateStatement', '更新阿米巴核算表',  'ranzhi', 1, 'normal', '0000-00-00 00:00:00');

INSERT INTO `sys_entry` (`name`, `abbr`, `code`, `buildin`, `integration`, `open`, `key`, `ip`, `logo`, `login`, `control`, `size`, `position`, `visible`, `order`) VALUES
('人力资源', '人资',   'hr',    1, 1, 'iframe', '70a4ec7bf82d831b09578f554141eed0', '*', 'theme/default/images/ips/app-hr.png',    '../hr',    'simple', 'max', 'default', 1, 70),
('进销存',   '进销存', 'psi',   1, 1, 'iframe', 'be546d3fbb91fa8236b53a8c5fa90884', '*', 'theme/default/images/ips/app-psi.png',   '../psi',   'simple', 'max', 'default', 1, 80),
('工作流',   '工作流', 'flow',  1, 1, 'iframe', '68149a7806b73b5b0e16bc0a42bfcf43', '*', 'theme/default/images/ips/app-flow.png',  '../flow',  'simple', 'max', 'default', 1, 90),
('阿米巴',   '阿米巴', 'ameba', 1, 1, 'iframe', 'c73507819a054358b6f45f3f522bd8d3', '*', 'theme/default/images/ips/app-ameba.png', '../ameba', 'simple', 'max', 'default', 1, 100);

INSERT INTO `sys_grouppriv` (`group`, `module`, `method`) VALUES
(1,'apppriv','flow'),
(1,'apppriv','hr'),
(1,'apppriv','psi'),
(1,'apppriv','ameba'),
(1,'amebareport','dailyReport'),
(1,'amebareport','weeklyReport'),
(1,'amebareport','monthlyReport'),
(1,'amebareport','updateStatement'),
(1,'amebareport','showDetail'),
(1,'amebareport','archive'),
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
(1,'rule','share'),
(1,'batch','browse'),
(1,'batch','browsePurchaseOrders'),
(1,'batch','browseFinished'),
(1,'batch','detail'),
(1,'batch','deliver'),
(1,'batch','editDeliver'),
(1,'batch','receive'),
(1,'batch','editReceive'),
(1,'batch','editPick'),
(1,'batch','printBatch'),
(1,'commission','batchSwitchIgnore'),
(1,'commission','browse'),
(1,'commission','create'),
(1,'commission','export'),
(1,'commission','report'),
(1,'commission','setCategory'),
(1,'commission','setLineCommission'),
(1,'commission','setSaleCommission'),
(1,'commission','setting'),
(1,'commission','switchIgnore'),
(1,'contract','expense'),
(1,'contract','setting'),
(1,'customer','exportTemplate'),
(1,'customer','import'),
(1,'feedback','activate'),
(1,'feedback','assignTo'),
(1,'feedback','close'),
(1,'feedback','company'),
(1,'feedback','create'),
(1,'feedback','delete'),
(1,'feedback','doubt'),
(1,'feedback','edit'),
(1,'feedback','reply'),
(1,'feedback','transfer'),
(1,'feedback','view'),
(1,'leads','adminSites'),
(1,'leads','createSite'),
(1,'leads','deleteSite'),
(1,'leads','editSite'),
(1,'leads','sync'),
(1,'my','deptSalary'),
(1,'order','team'),
(1,'payable','payable'),
(1,'payable','paid'),
(1,'payable','create'),
(1,'payable','edit'),
(1,'payable','delete'),
(1,'payable','view'),
(1,'payable','pay'),
(1,'product','actionconditions'),
(1,'product','actioninputs'),
(1,'product','actionresults'),
(1,'product','actiontasks'),
(1,'product','adminaction'),
(1,'product','adminfield'),
(1,'product','adminroles'),
(1,'product','batchCreate'),
(1,'product','batchCreateProperties'),
(1,'product','browseProperties'),
(1,'product','copy'),
(1,'product','createaction'),
(1,'product','createfield'),
(1,'product','createresult'),
(1,'product','createFromOrder'),
(1,'product','createProperty'),
(1,'product','deleteaction'),
(1,'product','deletefield'),
(1,'product','deleteProperty'),
(1,'product','deleteresult'),
(1,'product','editaction'),
(1,'product','editfield'),
(1,'product','editProperty'),
(1,'product','editresult'),
(1,'purchase','browse'),
(1,'purchase','create'),
(1,'purchase','edit'),
(1,'purchase','delete'),
(1,'purchase','detail'),
(1,'purchase','cancel'),
(1,'purchase','activate'),
(1,'purchase','finish'),
(1,'purchase','purchase'),
(1,'purchase','sendMail'),
(1,'purchase','printOrder'),
(1,'purchase','report'),
(1,'receivable','receivable'),
(1,'receivable','received'),
(1,'receivable','create'),
(1,'receivable','edit'),
(1,'receivable','delete'),
(1,'receivable','view'),
(1,'receivable','receive'),
(1,'salary','batchConfirm'),
(1,'salary','batchCreate'),
(1,'salary','batchDelete'),
(1,'salary','batchEdit'),
(1,'salary','company'),
(1,'salary','confirm'),
(1,'salary','delete'),
(1,'salary','dept'),
(1,'salary','edit'),
(1,'salary','export'),
(1,'salary','report'),
(1,'salary','setAllowance'),
(1,'salary','setBasic'),
(1,'salary','setBonus'),
(1,'salary','setExemption'),
(1,'salary','setSSF'),
(1,'sale','browse'),
(1,'sale','create'),
(1,'sale','edit'),
(1,'sale','delete'),
(1,'sale','detail'),
(1,'sale','cancel'),
(1,'sale','activate'),
(1,'sale','finish'),
(1,'sale','assignToPick'),
(1,'sale','assignToPurchase'),
(1,'sale','printOrder'),
(1,'sale','report'),
(1,'store','browse'),
(1,'store','create'),
(1,'store','edit'),
(1,'store','delete'),
(1,'trade','share'),
(1,'trade','syncAlipay'),
(1,'user','importLDAP'),
(1,'workflow','adminAction'),
(1,'workflow','adminCondition'),
(1,'workflow','adminDatasource'),
(1,'workflow','adminField'),
(1,'workflow','adminLayout'),
(1,'workflow','adminModuleMenu'),
(1,'workflow','adminResult'),
(1,'workflow','adminRule'),
(1,'workflow','backup'),
(1,'workflow','browse'),
(1,'workflow','browseTable'),
(1,'workflow','create'),
(1,'workflow','createAction'),
(1,'workflow','createDatasource'),
(1,'workflow','createField'),
(1,'workflow','createModuleMenu'),
(1,'workflow','createResult'),
(1,'workflow','createRule'),
(1,'workflow','delete'),
(1,'workflow','deleteAction'),
(1,'workflow','deleteDatasource'),
(1,'workflow','deleteField'),
(1,'workflow','deleteModuleMenu'),
(1,'workflow','deleteResult'),
(1,'workflow','deleteRule'),
(1,'workflow','edit'),
(1,'workflow','editAction'),
(1,'workflow','editDatasource'),
(1,'workflow','editField'),
(1,'workflow','editModuleMenu'),
(1,'workflow','editResult'),
(1,'workflow','editRule'),
(1,'workflow','setNotice'),
(1,'workflow','setSubModule'),
(1,'workflow','upgrade'),
(1,'workflow','verification'),
(1,'workflow','view'),
(1,'workflow','viewRule'),
(2,'apppriv','hr'),
(2,'salary','dept'),
(2,'salary','company'),
(2,'salary','batchCreate'),
(2,'salary', 'batchEdit'),
(2,'salary','export'),
(2,'salary','edit'),
(2,'salary','confirm'),
(2,'salary','batchConfirm'),
(2,'salary','delete'),
(2,'salary','batchDelete'),
(2,'salary','setBasic'),
(2,'salary','setBonus'),
(2,'salary','setAllowance'),
(2,'salary','setSSF'),
(2,'salary','report'),
(2,'trade','share'),
(2,'trade','syncAlipay'),
(2,'commission','browse'),
(2,'commission','create'),
(2,'commission','batchCreate'),
(2,'commission','report'),
(2,'commission','setting'),
(2,'commission','setSaleCommission'),
(2,'commission','setLineCommission'),
(2,'commission','setCategory'),
(2,'commission','switchIgnore'),
(2,'commission','batchSwitchIgnore'),
(3,'customer','exportTemplate'),
(3,'customer','import'),
(3,'feedback','company'),
(3,'feedback','create'),
(3,'feedback','edit'),
(3,'feedback','view'),
(3,'feedback','reply'),
(3,'feedback','doubt'),
(3,'feedback','transfer'),
(3,'feedback','assignTo'),
(3,'feedback','close'),
(3,'feedback','delete'),
(3,'leads','adminSites'),
(3,'leads','createSite'),
(3,'leads','deleteSite'),
(3,'leads','editSite'),
(3,'leads','sync'),
(3,'order','team'),
(3,'product','actionconditions'),
(3,'product','actioninputs'),
(3,'product','actionresults'),
(3,'product','actiontasks'),
(3,'product','adminaction'),
(3,'product','adminfield'),
(3,'product','adminroles'),
(3,'product','copy'),
(3,'product','createaction'),
(3,'product','createfield'),
(3,'product','createresult'),
(3,'product','deleteaction'),
(3,'product','deletefield'),
(3,'product','deleteresult'),
(3,'product','editaction'),
(3,'product','editfield'),
(3,'product','editresult'),
(4,'feedback','company'),
(4,'feedback','create'),
(4,'feedback','edit'),
(4,'feedback','view'),
(4,'feedback','reply'),
(4,'feedback','doubt'),
(4,'feedback','transfer'),
(4,'feedback','assignTo');

-- DROP TABLE IF EXISTS `flow_car`;
CREATE TABLE IF NOT EXISTS `flow_car` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(200) NOT NULL,
  `code` varchar(200) NOT NULL,
  `driver` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `buyDate` date NOT NULL,
  `price` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'normal',
  `parent` mediumint(8) unsigned NOT NULL,
  `createdBy` varchar(30) NOT NULL,
  `createdDate` datetime NOT NULL,
  `editedBy` varchar(30) NOT NULL,
  `editedDate` datetime NOT NULL,
  `deleted` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `flow_carbooking`;
CREATE TABLE IF NOT EXISTS `flow_carbooking` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `appliedBy` varchar(200) NOT NULL,
  `appliedDate` datetime NOT NULL,
  `car` varchar(200) NOT NULL,
  `begin` datetime NOT NULL,
  `end` datetime NOT NULL,
  `reason` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'wait',
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

-- DROP TABLE IF EXISTS `flow_collect`;
CREATE TABLE IF NOT EXISTS `flow_collect` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `appliedBy` varchar(200) NOT NULL,
  `appliedDate` datetime NOT NULL,
  `money` varchar(200) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'wait',
  `reviewedBy` varchar(200) NOT NULL,
  `reviewedDate` datetime NOT NULL,
  `depositor` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `parent` mediumint(8) unsigned NOT NULL,
  `createdBy` varchar(30) NOT NULL,
  `createdDate` datetime NOT NULL,
  `editedBy` varchar(30) NOT NULL,
  `editedDate` datetime NOT NULL,
  `deleted` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `flow_meetingroom`;
CREATE TABLE IF NOT EXISTS `flow_meetingroom` (
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
CREATE TABLE IF NOT EXISTS `flow_meetingroombooking` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `room` varchar(200) NOT NULL,
  `begin` datetime NOT NULL,
  `end` datetime NOT NULL,
  `orderedBy` varchar(200) NOT NULL,
  `orderedDate` datetime NOT NULL,
  `desc` varchar(200) NOT NULL,
  `parent` mediumint(8) unsigned NOT NULL,
  `createdBy` varchar(30) NOT NULL,
  `createdDate` datetime NOT NULL,
  `editedBy` varchar(30) NOT NULL,
  `editedDate` datetime NOT NULL,
  `deleted` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `flow_buy`;
CREATE TABLE IF NOT EXISTS `flow_buy` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `provider` varchar(200) NOT NULL,
  `goods` varchar(200) NOT NULL,
  `money` varchar(200) NOT NULL,
  `desc` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `depositor` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `parent` mediumint(8) unsigned NOT NULL,
  `createdBy` varchar(30) NOT NULL,
  `createdDate` datetime NOT NULL,
  `editedBy` varchar(30) NOT NULL,
  `editedDate` datetime NOT NULL,
  `deleted` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `flow_stamp`;
CREATE TABLE IF NOT EXISTS `flow_stamp` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `proposer` varchar(200) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `begin` datetime NOT NULL,
  `end` datetime NOT NULL,
  `type` varchar(200) NOT NULL,
  `desc` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'wait',
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

INSERT INTO `sys_workflow` VALUES (1,'meetingroombooking','','flow','flow','','meetingroom','会议室',0,'{\"users\":[],\"groups\":[]}','','1.0','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(2,'','meetingroom','flow','flow','','meetingroombooking','会议室预订',0,'{\"users\":[],\"groups\":[]}','','1.0','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(3,'','','flow','flow','','stamp','印章申请',0,'{\"users\":[],\"groups\":[]}','','1.0','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(4,'carbooking','','flow','flow','','car','车辆信息',0,'{\"users\":[],\"groups\":[]}','','1.0','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(5,'','car','flow','flow','','carbooking','车辆预订',0,'{\"users\":[],\"groups\":[]}','','1.0','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(6,'','','flow','flow','','collect','请款',0,'{\"users\":[],\"groups\":[]}','','1.0','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(7,'','','flow','flow','','buy','采购',0,'{\"users\":[],\"groups\":[]}','','1.0','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0');
INSERT INTO `sys_workflowaction` VALUES (1,'meetingroom','browse','浏览列表','','menu','direct',0,'[]','','[]','','','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(2,'meetingroom','create','新建','','menu','direct',0,'[]','','[]','','','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(3,'meetingroom','edit','编辑','','browseandview','direct',0,'[]','','[]','','','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(4,'meetingroom','view','查看详情','normal','browse','direct',0,'[]','','[]','','','admin','2018-08-13 13:05:20','admin','2016-11-23 11:13:08','0'),(5,'meetingroom','delete','删除','','browseandview','dropdownlist',0,'[]','','[]','','','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(6,'meetingroombooking','browse','浏览列表','','menu','direct',0,'[]','','[]','','','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(7,'meetingroombooking','create','新建','','menu','direct',0,'[]','{\"type\":\"sql\",\"message\":\"\\u8be5\\u65f6\\u95f4\\u6bb5\\u5df2\\u88ab\\u9884\\u8ba2\",\"sql\":\"select * from flow_meetingroombooking where deleted=\'0\' and room=\'$room\' and ((begin >= \'$begin\' and end <= \'$end\') or (begin <= \'$begin\' and end >= \'$end\') or (begin > \'$begin\' and begin < \'$end\') or (end > \'$begin\' and end < \'$end\'))\",\"sqlVars\":[{\"varName\":\"room\",\"paramType\":\"form\",\"param\":\"room\"},{\"varName\":\"begin\",\"paramType\":\"form\",\"param\":\"begin\"},{\"varName\":\"end\",\"paramType\":\"form\",\"param\":\"end\"}],\"sqlResult\":\"empty\"}','[]','','','admin','2018-08-13 13:05:20','admin','2016-11-23 10:49:48','0'),(8,'meetingroombooking','edit','编辑','','browseandview','direct',0,'[]','{\"type\":\"sql\",\"message\":\"\\u8be5\\u65f6\\u95f4\\u6bb5\\u5df2\\u88ab\\u9884\\u8ba2\",\"sql\":\"select * from flow_meetingroombooking where deleted=\'0\' and room=\'$room\' and id != \'$id\' and ((begin >= \'$begin\' and end <= \'$end\') or (begin <= \'$begin\' and end >= \'$end\') or (begin > \'$begin\' and begin < \'$end\') or (end > \'$begin\' and end < \'$end\'))\",\"sqlVars\":[{\"varName\":\"room\",\"paramType\":\"form\",\"param\":\"room\"},{\"varName\":\"begin\",\"paramType\":\"form\",\"param\":\"begin\"},{\"varName\":\"end\",\"paramType\":\"form\",\"param\":\"end\"},{\"varName\":\"id\",\"paramType\":\"record\",\"param\":\"id\"}],\"sqlResult\":\"empty\"}','[]','','','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(9,'meetingroombooking','view','查看详情','normal','browse','direct',0,'[]','','[]','','','admin','2018-08-13 13:05:20','admin','2016-11-23 11:14:53','0'),(10,'meetingroombooking','delete','删除','','browseandview','dropdownlist',0,'[]','','[]','','','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(11,'stamp','browse','浏览列表','','menu','direct',0,'[]','','[]','','','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(12,'stamp','create','新建','','menu','direct',0,'[]','','[]','','','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(13,'stamp','edit','编辑','','browseandview','direct',0,'[]','','[]','','','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(14,'stamp','view','查看详情','','browse','direct',0,'[]','','[]','','','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(15,'stamp','delete','删除','','browseandview','dropdownlist',0,'[]','','[]','','','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(16,'stamp','revoke','撤销','none','browseandview','direct',0,'{\"conditionType\":\"data\",\"fields\":[{\"field\":\"deleted\",\"operator\":\"equal\",\"param\":\"0\"},{\"field\":\"proposer\",\"operator\":\"equal\",\"param\":\"currentUser\"},{\"field\":\"status\",\"operator\":\"equal\",\"param\":\"wait\"}],\"sql\":\"\",\"sqlResult\":\"empty\"}','','[{\"action\":\"update\",\"table\":\"stamp\",\"conditionType\":\"data\",\"message\":\"\",\"fields\":[{\"field\":\"status\",\"paramType\":\"custom\",\"param\":\"draft\"}],\"conditions\":[],\"wheres\":[{\"field\":\"id\",\"logicalOperator\":\"and\",\"operator\":\"equal\",\"paramType\":\"record\",\"param\":\"id\"}],\"sql\":\"UPDATE ranzhip266.ranzhip27.`flow_stamp`  SET  `status` = \'draft\' WHERE 1 AND (1  AND `id` = \'@id\' )\",\"sqlVars\":[],\"formVars\":[],\"recordVars\":{\"id\":\"id\"}}]','','','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(17,'stamp','submit','提交','none','browseandview','direct',0,'{\"conditionType\":\"data\",\"fields\":[{\"field\":\"status\",\"operator\":\"equal\",\"param\":\"draft\"},{\"field\":\"deleted\",\"operator\":\"equal\",\"param\":\"0\"},{\"field\":\"proposer\",\"operator\":\"equal\",\"param\":\"currentUser\"}],\"sql\":\"\",\"sqlResult\":\"empty\"}','','[{\"action\":\"update\",\"table\":\"stamp\",\"conditionType\":\"data\",\"message\":\"\",\"fields\":[{\"field\":\"status\",\"paramType\":\"custom\",\"param\":\"wait\"}],\"conditions\":[],\"wheres\":[{\"field\":\"id\",\"logicalOperator\":\"and\",\"operator\":\"equal\",\"paramType\":\"record\",\"param\":\"id\"}],\"sql\":\"UPDATE ranzhip266.ranzhip27.`flow_stamp`  SET  `status` = \'wait\' WHERE 1 AND (1  AND `id` = \'@id\' )\",\"sqlVars\":[],\"formVars\":[],\"recordVars\":{\"id\":\"id\"}}]','','','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(18,'stamp','pass','通过','none','browseandview','direct',0,'{\"conditionType\":\"data\",\"fields\":[{\"field\":\"deleted\",\"operator\":\"equal\",\"param\":\"0\"},{\"field\":\"status\",\"operator\":\"equal\",\"param\":\"wait\"}],\"sql\":\"\",\"sqlResult\":\"empty\"}','','[{\"action\":\"update\",\"table\":\"stamp\",\"conditionType\":\"data\",\"message\":\"\",\"fields\":[{\"field\":\"status\",\"paramType\":\"custom\",\"param\":\"pass\"},{\"field\":\"reviewedBy\",\"paramType\":\"actor\",\"param\":\"actor\"},{\"field\":\"reviewedDate\",\"paramType\":\"now\",\"param\":\"now\"}],\"conditions\":[],\"wheres\":[{\"field\":\"id\",\"logicalOperator\":\"and\",\"operator\":\"equal\",\"paramType\":\"record\",\"param\":\"id\"}],\"sql\":\"UPDATE ranzhip266.ranzhip27.`flow_stamp`  SET  `status` = \'pass\',  `reviewedBy` = \'$actor\',  `reviewedDate` = \'$now\' WHERE 1 AND (1  AND `id` = \'@id\' )\",\"sqlVars\":{\"reviewedBy\":\"actor\",\"reviewedDate\":\"now\"},\"formVars\":[],\"recordVars\":{\"id\":\"id\"}}]','','','admin','2018-08-13 13:05:20','admin','2016-11-23 14:09:09','0'),(19,'stamp','reject','拒绝','none','browseandview','direct',0,'{\"conditionType\":\"data\",\"fields\":[{\"field\":\"status\",\"operator\":\"equal\",\"param\":\"wait\"},{\"field\":\"deleted\",\"operator\":\"equal\",\"param\":\"0\"}],\"sql\":\"\",\"sqlResult\":\"empty\"}','','[{\"action\":\"update\",\"table\":\"stamp\",\"conditionType\":\"data\",\"message\":\"\",\"fields\":[{\"field\":\"status\",\"paramType\":\"custom\",\"param\":\"reject\"},{\"field\":\"reviewedBy\",\"paramType\":\"actor\",\"param\":\"actor\"},{\"field\":\"reviewedDate\",\"paramType\":\"now\",\"param\":\"now\"}],\"conditions\":[],\"wheres\":[{\"field\":\"id\",\"logicalOperator\":\"and\",\"operator\":\"equal\",\"paramType\":\"record\",\"param\":\"id\"}],\"sql\":\"UPDATE ranzhip266.ranzhip27.`flow_stamp`  SET  `status` = \'reject\',  `reviewedBy` = \'$actor\',  `reviewedDate` = \'$now\' WHERE 1 AND (1  AND `id` = \'@id\' )\",\"sqlVars\":{\"reviewedBy\":\"actor\",\"reviewedDate\":\"now\"},\"formVars\":[],\"recordVars\":{\"id\":\"id\"}}]','','','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(20,'car','browse','浏览列表','','menu','direct',0,'[]','','[]','','','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(21,'car','create','新建','','menu','direct',0,'[]','','[]','','','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(22,'car','edit','编辑','','browseandview','direct',0,'[]','','[]','','','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(23,'car','view','查看详情','normal','browse','direct',0,'[]','','[]','','','admin','2018-08-13 13:05:20','admin','2016-11-23 13:18:22','0'),(24,'car','delete','删除','','browseandview','dropdownlist',0,'[]','','[]','','','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(25,'carbooking','browse','浏览列表','','menu','direct',0,'[]','','[]','','','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(26,'carbooking','create','新建','','menu','direct',0,'[]','{\"type\":\"sql\",\"message\":\"\\u8be5\\u65f6\\u95f4\\u6bb5\\u5df2\\u88ab\\u9884\\u8ba2\",\"sql\":\"select * from flow_carbooking where deleted=\'0\' and car=\'$car\' and ((begin >= \'$begin\' and end <= \'$end\') or (begin <= \'$begin\' and end >= \'$end\') or (begin > \'$begin\' and begin < \'$end\') or (end > \'$begin\' and end < \'$end\'))\",\"sqlVars\":[{\"varName\":\"car\",\"paramType\":\"form\",\"param\":\"car\"},{\"varName\":\"begin\",\"paramType\":\"form\",\"param\":\"begin\"},{\"varName\":\"end\",\"paramType\":\"form\",\"param\":\"end\"}],\"sqlResult\":\"empty\"}','[]','','','admin','2018-08-13 13:05:20','admin','2016-11-23 13:36:02','0'),(27,'carbooking','edit','编辑','','browseandview','direct',0,'[]','{\"type\":\"sql\",\"message\":\"\\u8be5\\u65f6\\u95f4\\u6bb5\\u5df2\\u88ab\\u9884\\u8ba2\",\"sql\":\"select * from flow_carbooking where deleted=\'0\' and car = \'$car\' and id != \'$id\' and  ((begin >= \'$begin\' and end <= \'$end\') or (begin <= \'$begin\' and end >= \'$end\') or (begin > \'$begin\' and begin < \'$end\') or (end > \'$begin\' and end < \'$end\'))\",\"sqlVars\":[{\"varName\":\"car\",\"paramType\":\"form\",\"param\":\"car\"},{\"varName\":\"begin\",\"paramType\":\"form\",\"param\":\"begin\"},{\"varName\":\"end\",\"paramType\":\"form\",\"param\":\"end\"},{\"varName\":\"id\",\"paramType\":\"record\",\"param\":\"id\"}],\"sqlResult\":\"empty\"}','[]','','','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(28,'carbooking','view','查看详情','normal','browse','direct',0,'[]','','[]','','','admin','2018-08-13 13:05:20','admin','2016-11-23 13:25:59','0'),(29,'carbooking','delete','删除','','browseandview','dropdownlist',0,'[]','','[]','','','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(30,'carbooking','pass','通过','none','browseandview','direct',0,'{\"conditionType\":\"data\",\"fields\":[{\"field\":\"deleted\",\"operator\":\"equal\",\"param\":\"0\"},{\"field\":\"status\",\"operator\":\"equal\",\"param\":\"wait\"}],\"sql\":\"\",\"sqlResult\":\"empty\"}','','[{\"action\":\"update\",\"table\":\"carbooking\",\"conditionType\":\"data\",\"message\":\"\",\"fields\":[{\"field\":\"status\",\"paramType\":\"custom\",\"param\":\"pass\"}],\"conditions\":[],\"wheres\":[{\"field\":\"id\",\"logicalOperator\":\"and\",\"operator\":\"equal\",\"paramType\":\"record\",\"param\":\"id\"}],\"sql\":\"UPDATE ranzhip266.ranzhip27.`flow_carbooking`  SET  `status` = \'pass\' WHERE 1 AND (1  AND `id` = \'@id\' )\",\"sqlVars\":[],\"formVars\":[],\"recordVars\":{\"id\":\"id\"}}]','','','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(31,'carbooking','reject','拒绝','none','browseandview','direct',0,'{\"conditionType\":\"data\",\"fields\":[{\"field\":\"deleted\",\"operator\":\"equal\",\"param\":\"0\"},{\"field\":\"status\",\"operator\":\"equal\",\"param\":\"wait\"}],\"sql\":\"\",\"sqlResult\":\"empty\"}','','[{\"action\":\"update\",\"table\":\"carbooking\",\"conditionType\":\"data\",\"message\":\"\",\"fields\":[{\"field\":\"status\",\"paramType\":\"custom\",\"param\":\"reject\"}],\"conditions\":[],\"wheres\":[{\"field\":\"id\",\"logicalOperator\":\"and\",\"operator\":\"equal\",\"paramType\":\"record\",\"param\":\"id\"}],\"sql\":\"UPDATE ranzhip266.ranzhip27.`flow_carbooking`  SET  `status` = \'reject\' WHERE 1 AND (1  AND `id` = \'@id\' )\",\"sqlVars\":[],\"formVars\":[],\"recordVars\":{\"id\":\"id\"}}]','','','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(32,'collect','browse','浏览列表','','menu','direct',0,'[]','','[]','','','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(33,'collect','create','新建','','menu','direct',0,'[]','','[]','','','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(34,'collect','edit','编辑','','browseandview','direct',0,'[]','','[]','','','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(35,'collect','view','查看详情','normal','browse','direct',0,'[]','','[]','','','admin','2018-08-13 13:05:20','admin','2016-11-23 14:00:40','0'),(36,'collect','delete','删除','','browseandview','dropdownlist',0,'[]','','[]','','','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(37,'collect','pass','通过','none','browseandview','direct',0,'{\"conditionType\":\"data\",\"fields\":[{\"field\":\"status\",\"operator\":\"equal\",\"param\":\"wait\"},{\"field\":\"deleted\",\"operator\":\"equal\",\"param\":\"0\"}],\"sql\":\"\",\"sqlResult\":\"empty\"}','','[{\"action\":\"update\",\"table\":\"collect\",\"conditionType\":\"data\",\"message\":\"\",\"fields\":[{\"field\":\"status\",\"paramType\":\"custom\",\"param\":\"pass\"},{\"field\":\"reviewedBy\",\"paramType\":\"actor\",\"param\":\"actor\"},{\"field\":\"reviewedDate\",\"paramType\":\"now\",\"param\":\"now\"}],\"conditions\":[],\"wheres\":[{\"field\":\"id\",\"logicalOperator\":\"and\",\"operator\":\"equal\",\"paramType\":\"record\",\"param\":\"id\"}],\"sql\":\"UPDATE ranzhip266.ranzhip27.`flow_collect`  SET  `status` = \'pass\',  `reviewedBy` = \'$actor\',  `reviewedDate` = \'$now\' WHERE 1 AND (1  AND `id` = \'@id\' )\",\"sqlVars\":{\"reviewedBy\":\"actor\",\"reviewedDate\":\"now\"},\"formVars\":[],\"recordVars\":{\"id\":\"id\"}}]','','','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(38,'collect','reject','拒绝','none','browseandview','direct',0,'{\"conditionType\":\"data\",\"fields\":[{\"field\":\"deleted\",\"operator\":\"equal\",\"param\":\"0\"},{\"field\":\"status\",\"operator\":\"equal\",\"param\":\"wait\"}],\"sql\":\"\",\"sqlResult\":\"empty\"}','','[{\"action\":\"update\",\"table\":\"collect\",\"conditionType\":\"data\",\"message\":\"\",\"fields\":[{\"field\":\"status\",\"paramType\":\"custom\",\"param\":\"reject\"},{\"field\":\"reviewedBy\",\"paramType\":\"actor\",\"param\":\"actor\"},{\"field\":\"reviewedDate\",\"paramType\":\"now\",\"param\":\"now\"}],\"conditions\":[],\"wheres\":[{\"field\":\"id\",\"logicalOperator\":\"and\",\"operator\":\"equal\",\"paramType\":\"record\",\"param\":\"id\"}],\"sql\":\"UPDATE ranzhip266.ranzhip27.`flow_collect`  SET  `status` = \'reject\',  `reviewedBy` = \'$actor\',  `reviewedDate` = \'$now\' WHERE 1 AND (1  AND `id` = \'@id\' )\",\"sqlVars\":{\"reviewedBy\":\"actor\",\"reviewedDate\":\"now\"},\"formVars\":[],\"recordVars\":{\"id\":\"id\"}}]','','','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(39,'collect','pay','付款','modal','browseandview','direct',0,'{\"conditionType\":\"data\",\"fields\":[{\"field\":\"status\",\"operator\":\"equal\",\"param\":\"pass\"},{\"field\":\"deleted\",\"operator\":\"equal\",\"param\":\"0\"}],\"sql\":\"\",\"sqlResult\":\"empty\"}','','[{\"action\":\"update\",\"table\":\"collect\",\"conditionType\":\"data\",\"message\":\"\",\"fields\":[{\"field\":\"status\",\"paramType\":\"custom\",\"param\":\"closed\"}],\"conditions\":[],\"wheres\":[{\"field\":\"id\",\"logicalOperator\":\"and\",\"operator\":\"equal\",\"paramType\":\"record\",\"param\":\"id\"}],\"sql\":\"UPDATE ranzhip266.ranzhip27.`flow_collect`  SET  `status` = \'closed\' WHERE 1 AND (1  AND `id` = \'@id\' )\",\"sqlVars\":[],\"formVars\":[],\"recordVars\":{\"id\":\"id\"}},{\"action\":\"insert\",\"table\":\"trade\",\"conditionType\":\"data\",\"message\":\"\",\"fields\":[{\"field\":\"depositor\",\"paramType\":\"form\",\"param\":\"depositor\"},{\"field\":\"category\",\"paramType\":\"form\",\"param\":\"category\"},{\"field\":\"type\",\"paramType\":\"custom\",\"param\":\"out\"},{\"field\":\"desc\",\"paramType\":\"record\",\"param\":\"reason\"},{\"field\":\"money\",\"paramType\":\"record\",\"param\":\"money\"},{\"field\":\"handlers\",\"paramType\":\"actor\",\"param\":\"actor\"},{\"field\":\"date\",\"paramType\":\"today\",\"param\":\"today\"},{\"field\":\"createdBy\",\"paramType\":\"actor\",\"param\":\"actor\"},{\"field\":\"createdDate\",\"paramType\":\"now\",\"param\":\"now\"}],\"conditions\":[],\"wheres\":[],\"sql\":\"INSERT INTO ranzhip266.ranzhip27.`cash_trade` (`depositor`, `category`, `type`, `desc`, `money`, `handlers`, `date`, `createdBy`, `createdDate`) VALUES (\'#depositor\', \'#category\', \'out\', \'@reason\', \'@money\', \'$actor\', \'$today\', \'$actor\', \'$now\') \",\"sqlVars\":{\"handlers\":\"actor\",\"date\":\"today\",\"createdBy\":\"actor\",\"createdDate\":\"now\"},\"formVars\":{\"depositor\":\"depositor\",\"category\":\"category\"},\"recordVars\":{\"desc\":\"reason\",\"money\":\"money\"}}]','','','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(40,'buy','browse','浏览列表','','menu','direct',0,'[]','','[]','','','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(41,'buy','create','新建','','menu','direct',0,'[]','','[]','','','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(42,'buy','edit','编辑','','browseandview','direct',0,'[]','','[]','','','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(43,'buy','view','查看详情','','browse','direct',0,'[]','','[]','','','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(44,'buy','delete','删除','','browseandview','dropdownlist',0,'[]','','[]','','','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(45,'buy','pay','付款','modal','browseandview','direct',0,'{\"conditionType\":\"data\",\"fields\":[{\"field\":\"deleted\",\"operator\":\"equal\",\"param\":\"0\"},{\"field\":\"status\",\"operator\":\"equal\",\"param\":\"unpaid\"}],\"sql\":\"\",\"sqlResult\":\"empty\"}','','[{\"action\":\"update\",\"table\":\"buy\",\"conditionType\":\"data\",\"message\":\"\",\"fields\":[{\"field\":\"status\",\"paramType\":\"custom\",\"param\":\"paid\"}],\"conditions\":[],\"wheres\":[{\"field\":\"id\",\"logicalOperator\":\"and\",\"operator\":\"equal\",\"paramType\":\"record\",\"param\":\"id\"}],\"sql\":\"UPDATE ranzhip266.ranzhip27.`flow_buy`  SET  `status` = \'paid\' WHERE 1 AND (1  AND `id` = \'@id\' )\",\"sqlVars\":[],\"formVars\":[],\"recordVars\":{\"id\":\"id\"}},{\"action\":\"insert\",\"table\":\"trade\",\"conditionType\":\"data\",\"message\":\"\",\"fields\":[{\"field\":\"depositor\",\"paramType\":\"form\",\"param\":\"depositor\"},{\"field\":\"category\",\"paramType\":\"form\",\"param\":\"category\"},{\"field\":\"trader\",\"paramType\":\"record\",\"param\":\"provider\"},{\"field\":\"type\",\"paramType\":\"custom\",\"param\":\"out\"},{\"field\":\"handlers\",\"paramType\":\"actor\",\"param\":\"actor\"},{\"field\":\"desc\",\"paramType\":\"record\",\"param\":\"desc\"},{\"field\":\"money\",\"paramType\":\"record\",\"param\":\"money\"},{\"field\":\"date\",\"paramType\":\"today\",\"param\":\"today\"},{\"field\":\"createdBy\",\"paramType\":\"actor\",\"param\":\"actor\"},{\"field\":\"createdDate\",\"paramType\":\"now\",\"param\":\"now\"}],\"conditions\":[],\"wheres\":[],\"sql\":\"INSERT INTO ranzhip266.ranzhip27.`cash_trade` (`depositor`, `category`, `trader`, `type`, `handlers`, `desc`, `money`, `date`, `createdBy`, `createdDate`) VALUES (\'#depositor\', \'#category\', \'@provider\', \'out\', \'$actor\', \'@desc\', \'@money\', \'$today\', \'$actor\', \'$now\') \",\"sqlVars\":{\"handlers\":\"actor\",\"date\":\"today\",\"createdBy\":\"actor\",\"createdDate\":\"now\"},\"formVars\":{\"depositor\":\"depositor\",\"category\":\"category\"},\"recordVars\":{\"trader\":\"provider\",\"desc\":\"desc\",\"money\":\"money\"}}]','','','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0');
INSERT INTO `sys_workflowdatasource` VALUES (1,'system','订单','{\"app\":\"crm\",\"module\":\"order\",\"method\":\"getPairs\",\"methodDesc\":\"Get order pairs.\",\"params\":[{\"name\":\"customer\",\"type\":\"int\",\"desc\":\"\",\"value\":\"0\"},{\"name\":\"status\",\"type\":\"string\",\"desc\":\"\",\"value\":\"\"}]}','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(2,'system','合同','{\"app\":\"crm\",\"module\":\"contract\",\"method\":\"getPairs\",\"methodDesc\":\"Get contract pairs.\",\"params\":[{\"name\":\"customerID\",\"type\":\"int\",\"desc\":\"\",\"value\":\"0\"}]}','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(3,'system','客户','{\"app\":\"crm\",\"module\":\"customer\",\"method\":\"getPairs\",\"methodDesc\":\"Get customer pairs.\",\"params\":[{\"name\":\"relation\",\"type\":\"string\",\"desc\":\"\",\"value\":\"customer\"},{\"name\":\"emptyOption\",\"type\":\"bool\",\"desc\":\"\",\"value\":\"1\"}]}','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(4,'system','供应商','{\"app\":\"crm\",\"module\":\"customer\",\"method\":\"getPairs\",\"methodDesc\":\"Get customer pairs.\",\"params\":[{\"name\":\"relation\",\"type\":\"string\",\"desc\":\"\",\"value\":\"provider\"},{\"name\":\"emptyOption\",\"type\":\"bool\",\"desc\":\"\",\"value\":\"1\"}]}','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(5,'system','联系人','{\"app\":\"crm\",\"module\":\"contact\",\"method\":\"getPairs\",\"methodDesc\":\"Get common selecter of contact.\",\"params\":[{\"name\":\"customer\",\"type\":\"int\",\"desc\":\"\",\"value\":\"0\"},{\"name\":\"emptyOption\",\"type\":\"bool\",\"desc\":\"\",\"value\":\"1\"},{\"name\":\"status\",\"type\":\"string\",\"desc\":\"\",\"value\":\"normal\"}]}','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(6,'system','产品','{\"app\":\"crm\",\"module\":\"product\",\"method\":\"getPairs\",\"methodDesc\":\"Get product pairs.\",\"params\":[{\"name\":\"status\",\"type\":\"string\",\"desc\":\"\",\"value\":\"\"},{\"name\":\"orderBy\",\"type\":\"string\",\"desc\":\"\",\"value\":\"id_desc\"}]}','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(7,'sql','会议室','select id, name from flow_meetingroom where deleted = \'0\'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(8,'option','设备','{\"computer\":\"\\u7535\\u8111\",\"projector\":\"\\u6295\\u5f71\\u4eea\",\"micphone\":\"\\u9ea6\\u514b\\u98ce\",\"audio\":\"\\u97f3\\u54cd\",\"whiteboard\":\"\\u767d\\u677f\"}','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(9,'option','工作日','{\"1\":\"\\u5468\\u4e00\",\"2\":\"\\u5468\\u4e8c\",\"3\":\"\\u5468\\u4e09\",\"4\":\"\\u5468\\u56db\",\"5\":\"\\u5468\\u4e94\",\"6\":\"\\u5468\\u516d\",\"7\":\"\\u5468\\u65e5\"}','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(10,'system','账号','{\"app\":\"cash\",\"module\":\"depositor\",\"method\":\"getPairs\",\"methodDesc\":\"Get depositor option menu.\",\"params\":[]}','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(11,'system','支出科目','{\"app\":\"sys\",\"module\":\"tree\",\"method\":\"getPairs\",\"methodDesc\":\"Get the id => name pairs of some categories.\",\"params\":[{\"name\":\"categories\",\"type\":\"string\",\"desc\":\"the category lists\",\"value\":\"\"},{\"name\":\"type\",\"type\":\"string\",\"desc\":\"the type\",\"value\":\"out\"}]}','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0');
INSERT INTO `sys_workflowfield` VALUES (1,'meetingroom','id','mediumint','8','编号','label','[]','','unique','','1','1','0','1','0',1,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(2,'meetingroom','parent','mediumint','8','父流程ID','label','[]','0','','','1','1','0','0','0',9,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(3,'meetingroom','createdBy','varchar','30','由谁创建','select','user','','','','1','1','0','0','0',11,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(4,'meetingroom','createdDate','datetime','','创建日期','datetime','[]','','','','1','1','0','0','0',12,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(5,'meetingroom','editedBy','varchar','30','由谁编辑','select','user','','','','1','1','0','0','0',13,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(6,'meetingroom','editedDate','datetime','','编辑日期','datetime','[]','','','','1','1','0','0','0',20,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(7,'meetingroom','deleted','varchar','200','是否删除','radio','[\"\\u672a\\u5220\\u9664\",\"\\u5df2\\u5220\\u9664\"]','0','','','1','0','0','0','0',21,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(8,'meetingroom','name','varchar','200','名称','input','[]','','notempty','','1','1','0','0','1',3,'','admin','2018-08-13 13:05:20','admin','2016-11-23 11:14:10'),(9,'meetingroom','position','varchar','200','位置','select','{\"1\":\"\\u4e00\\u697c\",\"2\":\"\\u4e8c\\u697c\",\"3\":\"\\u4e09\\u697c\",\"4\":\"\\u56db\\u697c\",\"5\":\"\\u4e94\\u697c\"}','','notempty','','1','1','0','0','0',4,'','admin','2018-08-13 13:05:20','admin','2016-11-23 10:24:40'),(10,'meetingroom','seats','int','200','容纳人数','input','[]','','notempty','','1','1','0','0','0',5,'','admin','2018-08-13 13:05:20','admin','2018-08-13 10:05:40'),(11,'meetingroom','equipment','varchar','200','设备','checkbox','8','','notempty','','1','1','0','0','0',6,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(12,'meetingroom','workday','varchar','200','开放时间','checkbox','9','','notempty','','1','1','0','0','0',7,'','admin','2018-08-13 13:05:20','admin','2016-11-23 10:39:48'),(13,'meetingroombooking','id','mediumint','8','编号','label','[]','','unique','','1','1','0','1','0',13,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(14,'meetingroombooking','parent','mediumint','8','父流程ID','label','[]','0','','','1','1','0','0','0',20,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(15,'meetingroombooking','createdBy','varchar','30','由谁创建','select','user','','','','1','1','0','0','0',21,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(16,'meetingroombooking','createdDate','datetime','','创建日期','datetime','[]','','','','1','1','0','0','0',22,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(17,'meetingroombooking','editedBy','varchar','30','由谁编辑','select','user','','','','1','1','0','0','0',23,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(18,'meetingroombooking','editedDate','datetime','','编辑日期','datetime','[]','','','','1','1','0','0','0',24,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(19,'meetingroombooking','deleted','varchar','200','是否删除','radio','[\"\\u672a\\u5220\\u9664\",\"\\u5df2\\u5220\\u9664\"]','0','','','1','0','0','0','0',25,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(20,'meetingroombooking','room','varchar','200','会议室','select','submodule','','notempty','','1','1','1','0','0',14,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(21,'meetingroombooking','begin','datetime','','开始时间','datetime','[]','','notempty,date','','1','1','0','0','0',15,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(22,'meetingroombooking','end','datetime','','结束时间','datetime','[]','','notempty,date','','1','1','0','0','0',16,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(23,'meetingroombooking','orderedBy','varchar','200','由谁预订','select','user','','notempty','','1','1','0','0','0',17,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(24,'meetingroombooking','orderedDate','datetime','','预订时间','datetime','[]','','notempty,date','','1','1','0','0','0',18,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(25,'meetingroombooking','desc','varchar','200','描述','input','[]','','','','1','1','0','0','0',19,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(26,'stamp','id','mediumint','8','编号','label','[]','','unique','','1','1','0','1','0',26,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(27,'stamp','parent','mediumint','8','父流程ID','label','[]','0','','','1','1','0','0','0',36,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(28,'stamp','createdBy','varchar','30','由谁创建','select','user','','','','1','1','0','0','0',37,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(29,'stamp','createdDate','datetime','','创建日期','datetime','[]','','','','1','1','0','0','0',38,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(30,'stamp','editedBy','varchar','30','由谁编辑','select','user','','','','1','1','0','0','0',39,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(31,'stamp','editedDate','datetime','','编辑日期','datetime','[]','','','','1','1','0','0','0',40,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(32,'stamp','deleted','varchar','200','是否删除','radio','[\"\\u672a\\u5220\\u9664\",\"\\u5df2\\u5220\\u9664\"]','0','','','1','0','0','0','0',41,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(33,'stamp','proposer','varchar','200','申请人','select','user','','notempty','','1','1','0','0','0',27,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(34,'stamp','reason','varchar','200','申请事由','input','[]','','notempty','','1','1','0','0','0',28,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(35,'stamp','begin','datetime','','开始时间','datetime','[]','','notempty','','1','1','0','0','0',29,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(36,'stamp','end','datetime','','结束时间','datetime','[]','','notempty','','1','1','0','0','0',30,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(37,'stamp','type','varchar','200','印章类型','checkbox','{\"1\":\"\\u516c\\u7ae0\",\"2\":\"\\u6cd5\\u4eba\\u7ae0\",\"3\":\"\\u5408\\u540c\\u7ae0\",\"4\":\"\\u8d22\\u52a1\\u7ae0\"}','','notempty','','1','1','0','0','0',31,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(38,'stamp','desc','varchar','200','备注','input','[]','','','','1','1','0','0','0',32,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(39,'stamp','status','varchar','200','状态','radio','{\"draft\":\"\\u8349\\u7a3f\",\"wait\":\"\\u5f85\\u5ba1\\u6279\",\"pass\":\"\\u901a\\u8fc7\",\"reject\":\"\\u62d2\\u7edd\"}','wait','notempty','','1','1','0','0','0',33,'','admin','2018-08-13 13:05:20','admin','2016-11-23 11:25:25'),(40,'stamp','reviewedBy','varchar','200','审批人','select','user','','notempty','','1','1','0','0','0',34,'','admin','2018-08-13 13:05:20','admin','2016-11-23 11:23:27'),(41,'stamp','reviewedDate','datetime','','审批时间','datetime','[]','','notempty','','1','1','0','0','0',35,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(42,'car','id','mediumint','8','编号','label','[]','','unique','','1','1','0','1','0',42,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(43,'car','parent','mediumint','8','父流程ID','label','[]','0','','','1','1','0','0','0',50,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(44,'car','createdBy','varchar','30','由谁创建','select','user','','','','1','1','0','0','0',51,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(45,'car','createdDate','datetime','','创建日期','datetime','[]','','','','1','1','0','0','0',52,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(46,'car','editedBy','varchar','30','由谁编辑','select','user','','','','1','1','0','0','0',53,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(47,'car','editedDate','datetime','','编辑日期','datetime','[]','','','','1','1','0','0','0',54,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(48,'car','deleted','varchar','200','是否删除','radio','[\"\\u672a\\u5220\\u9664\",\"\\u5df2\\u5220\\u9664\"]','0','','','1','0','0','0','0',55,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(49,'car','type','varchar','200','车辆类型','select','{\"audi\":\"\\u5965\\u8fea\",\"benz\":\"\\u5954\\u9a70\",\"vw\":\"\\u5927\\u4f17\"}','','notempty','','1','1','0','0','0',43,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(50,'car','code','varchar','200','车牌号','input','[]','','notempty','','1','1','0','0','1',44,'','admin','2018-08-13 13:05:20','admin','2016-11-23 13:40:14'),(51,'car','driver','varchar','200','司机','select','user','','','','1','1','0','0','0',45,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(52,'car','mobile','varchar','200','手机','input','[]','','float','','1','1','0','0','0',46,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(53,'car','buyDate','date','','购买日期','date','[]','','date','','1','1','0','0','0',47,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(54,'car','price','decimal','12,0','价格','input','[]','','','','1','1','0','0','0',48,'','admin','2018-08-13 13:05:20','admin','2018-08-13 10:04:51'),(55,'car','status','varchar','200','状态','select','{\"normal\":\"\\u6b63\\u5e38\",\"repairing\":\"\\u7ef4\\u4fee\\u4e2d\",\"broken\":\"\\u635f\\u574f\",\"scrapped\":\"\\u62a5\\u5e9f\"}','normal','notempty','','1','1','0','0','0',49,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(56,'carbooking','id','mediumint','8','编号','label','[]','','unique','','1','1','0','1','0',56,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(57,'carbooking','parent','mediumint','8','父流程ID','label','[]','0','','','1','1','0','0','0',66,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(58,'carbooking','createdBy','varchar','30','由谁创建','select','user','','','','1','1','0','0','0',67,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(59,'carbooking','createdDate','datetime','','创建日期','datetime','[]','','','','1','1','0','0','0',68,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(60,'carbooking','editedBy','varchar','30','由谁编辑','select','user','','','','1','1','0','0','0',69,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(61,'carbooking','editedDate','datetime','','编辑日期','datetime','[]','','','','1','1','0','0','0',70,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(62,'carbooking','deleted','varchar','200','是否删除','radio','[\"\\u672a\\u5220\\u9664\",\"\\u5df2\\u5220\\u9664\"]','0','','','1','0','0','0','0',71,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(63,'carbooking','appliedBy','varchar','200','申请人','select','user','','notempty','','1','1','0','0','0',57,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(64,'carbooking','appliedDate','datetime','','申请时间','datetime','[]','','notempty,date','','1','1','0','0','0',58,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(65,'carbooking','car','varchar','200','车辆','select','submodule','','notempty','','1','1','1','0','0',59,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(66,'carbooking','begin','datetime','','开始时间','datetime','[]','','notempty,date','','1','1','0','0','0',60,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(67,'carbooking','end','datetime','','结束时间','datetime','[]','','notempty,date','','1','1','0','0','0',61,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(68,'carbooking','reason','varchar','200','理由','input','[]','','','','1','1','0','0','0',62,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(69,'carbooking','status','varchar','200','状态','select','{\"wait\":\"\\u7b49\\u5f85\\u5ba1\\u6838\",\"pass\":\"\\u901a\\u8fc7\",\"reject\":\"\\u62d2\\u7edd\"}','wait','notempty','','1','1','0','0','0',63,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(70,'carbooking','reviewedBy','varchar','200','审核人','select','user','','','','1','1','0','0','0',64,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(71,'carbooking','reviewedDate','datetime','','审核时间','datetime','[]','','date','','1','1','0','0','0',65,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(72,'collect','id','mediumint','8','编号','label','[]','','unique','','1','1','0','1','0',72,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(73,'collect','parent','mediumint','8','父流程ID','label','[]','0','','','1','1','0','0','0',82,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(74,'collect','createdBy','varchar','30','由谁创建','select','user','','','','1','1','0','0','0',83,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(75,'collect','createdDate','datetime','','创建日期','datetime','[]','','','','1','1','0','0','0',84,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(76,'collect','editedBy','varchar','30','由谁编辑','select','user','','','','1','1','0','0','0',85,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(77,'collect','editedDate','datetime','','编辑日期','datetime','[]','','','','1','1','0','0','0',86,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(78,'collect','deleted','varchar','200','是否删除','radio','[\"\\u672a\\u5220\\u9664\",\"\\u5df2\\u5220\\u9664\"]','0','','','1','0','0','0','0',87,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(79,'collect','appliedBy','varchar','200','申请人','select','user','','notempty','','1','1','0','0','0',73,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(80,'collect','appliedDate','datetime','','申请时间','datetime','[]','','notempty,date','','1','1','0','0','0',74,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(81,'collect','money','decimal','12,0','金额','input','[]','','notempty','','1','1','0','0','0',75,'','admin','2018-08-13 13:05:20','admin','2018-08-13 10:04:16'),(82,'collect','reason','varchar','200','用途','input','[]','','','','1','1','0','0','0',76,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(83,'collect','status','varchar','200','状态','select','{\"wait\":\"\\u7b49\\u5f85\\u5ba1\\u6838\",\"pass\":\"\\u901a\\u8fc7\",\"reject\":\"\\u62d2\\u7edd\",\"closed\":\"\\u5df2\\u5b8c\\u6210\"}','wait','','','1','1','0','0','0',77,'','admin','2018-08-13 13:05:20','admin','2016-11-23 13:52:21'),(84,'collect','reviewedBy','varchar','200','由谁审核','select','user','','','','1','1','0','0','0',78,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(85,'collect','reviewedDate','datetime','','审核时间','datetime','[]','','date','','1','1','0','0','0',79,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(86,'collect','depositor','varchar','200','付款账号','select','10','','notempty','','1','1','0','0','0',80,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(87,'collect','category','varchar','200','支出科目','select','11','','notempty','','1','1','0','0','0',81,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(88,'buy','id','mediumint','8','编号','label','[]','','unique','','1','1','0','1','0',88,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(89,'buy','parent','mediumint','8','父流程ID','label','[]','0','','','1','1','0','0','0',96,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(90,'buy','createdBy','varchar','30','由谁创建','select','user','','','','1','1','0','0','0',97,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(91,'buy','createdDate','datetime','','创建日期','datetime','[]','','','','1','1','0','0','0',98,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(92,'buy','editedBy','varchar','30','由谁编辑','select','user','','','','1','1','0','0','0',99,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(93,'buy','editedDate','datetime','','编辑日期','datetime','[]','','','','1','1','0','0','0',100,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(94,'buy','deleted','varchar','200','是否删除','radio','[\"\\u672a\\u5220\\u9664\",\"\\u5df2\\u5220\\u9664\"]','0','','','1','0','0','0','0',101,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(95,'buy','provider','varchar','200','供应商','select','4','','notempty','','1','1','0','0','0',89,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(96,'buy','goods','varchar','200','商品','input','[]','','notempty','','1','1','0','0','0',90,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(97,'buy','money','decimal','12,0','金额','input','[]','','notempty','','1','1','0','0','0',91,'','admin','2018-08-13 13:05:20','admin','2018-08-13 10:03:37'),(98,'buy','desc','varchar','200','备注','input','[]','','','','1','1','0','0','0',92,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(99,'buy','status','varchar','200','状态','select','{\"unpaid\":\"\\u672a\\u652f\\u4ed8\",\"paid\":\"\\u5df2\\u652f\\u4ed8\"}','','','','1','1','0','0','0',93,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(100,'buy','depositor','varchar','200','付款账号','select','10','','notempty','','1','1','0','0','0',94,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00'),(101,'buy','category','varchar','200','支出科目','select','11','','notempty','','1','1','0','0','0',95,'','admin','2018-08-13 13:05:20','','0000-00-00 00:00:00');
INSERT INTO `sys_workflowlayout` VALUES (396,'meetingroom','browse','createdDate',8,0,'left','0','0','',''),(393,'meetingroom','browse','equipment',5,0,'left','1','0','',''),(392,'meetingroom','browse','seats',4,0,'left','0','0','',''),(390,'meetingroom','browse','name',2,0,'left','1','0','',''),(391,'meetingroom','browse','position',3,0,'left','0','0','',''),(10,'meetingroom','create','name',1,0,'','1','0','',''),(11,'meetingroom','create','position',2,0,'','1','0','',''),(12,'meetingroom','create','seats',3,0,'','1','0','',''),(13,'meetingroom','create','equipment',4,0,'','1','0','',''),(14,'meetingroom','create','workday',5,0,'','1','0','',''),(15,'meetingroom','edit','name',1,0,'','1','0','',''),(16,'meetingroom','edit','position',2,0,'','1','0','',''),(17,'meetingroom','edit','seats',3,0,'','1','0','',''),(18,'meetingroom','edit','equipment',4,0,'','1','0','',''),(19,'meetingroom','edit','workday',5,0,'','1','0','',''),(20,'meetingroom','view','id',1,0,'basic','1','0','',''),(21,'meetingroom','view','name',2,0,'basic','1','0','',''),(22,'meetingroom','view','position',3,0,'basic','1','0','',''),(23,'meetingroom','view','seats',4,0,'basic','1','0','',''),(24,'meetingroom','view','equipment',5,0,'basic','1','0','',''),(25,'meetingroom','view','workday',6,0,'basic','1','0','',''),(26,'meetingroom','view','createdBy',7,0,'basic','1','0','',''),(27,'meetingroom','view','createdDate',8,0,'basic','1','0','',''),(28,'meetingroom','view','editedBy',9,0,'basic','1','0','',''),(29,'meetingroom','view','editedDate',10,0,'basic','1','0','',''),(386,'meetingroombooking','browse','orderedDate',6,0,'left','0','0','',''),(381,'meetingroombooking','browse','id',1,0,'left','0','0','',''),(382,'meetingroombooking','browse','room',2,0,'left','1','0','',''),(385,'meetingroombooking','browse','orderedBy',5,0,'left','0','0','',''),(383,'meetingroombooking','browse','begin',3,0,'left','1','0','',''),(384,'meetingroombooking','browse','end',4,0,'left','1','0','',''),(47,'meetingroombooking','create','orderedBy',4,0,'','1','0','currentUser',''),(46,'meetingroombooking','create','end',3,0,'','1','0','',''),(45,'meetingroombooking','create','begin',2,0,'','1','0','',''),(44,'meetingroombooking','create','room',1,0,'','1','0','',''),(48,'meetingroombooking','create','orderedDate',5,0,'','1','0','currentTime',''),(49,'meetingroombooking','create','desc',6,0,'','1','0','',''),(50,'meetingroombooking','edit','room',1,0,'','1','0','',''),(51,'meetingroombooking','edit','begin',2,0,'','1','0','',''),(52,'meetingroombooking','edit','end',3,0,'','1','0','',''),(53,'meetingroombooking','edit','orderedBy',4,0,'','1','0','currentUser',''),(54,'meetingroombooking','edit','orderedDate',5,0,'','1','0','currentTime',''),(55,'meetingroombooking','edit','desc',6,0,'','1','0','',''),(74,'meetingroombooking','view','createdDate',8,0,'basic','1','0','',''),(73,'meetingroombooking','view','createdBy',7,0,'basic','1','0','',''),(72,'meetingroombooking','view','orderedDate',6,0,'basic','1','0','',''),(71,'meetingroombooking','view','orderedBy',5,0,'basic','1','0','',''),(70,'meetingroombooking','view','end',4,0,'basic','1','0','',''),(69,'meetingroombooking','view','begin',3,0,'basic','1','0','',''),(68,'meetingroombooking','view','room',2,0,'basic','1','0','',''),(67,'meetingroombooking','view','id',1,0,'basic','1','0','',''),(75,'meetingroombooking','view','editedBy',9,0,'basic','1','0','',''),(76,'meetingroombooking','view','editedDate',10,0,'basic','1','0','',''),(77,'meetingroombooking','view','desc',11,0,'info','1','0','',''),(394,'meetingroom','browse','workday',6,0,'left','1','0','',''),(389,'meetingroom','browse','id',1,0,'left','0','0','',''),(430,'stamp','browse','actions',11,120,'','0','0','',''),(429,'stamp','browse','reviewedDate',10,0,'left','0','0','',''),(427,'stamp','browse','status',8,0,'left','0','0','',''),(428,'stamp','browse','reviewedBy',9,0,'left','0','0','',''),(420,'stamp','browse','id',1,0,'left','0','0','',''),(421,'stamp','browse','proposer',2,0,'left','1','0','',''),(422,'stamp','browse','reason',3,0,'left','0','0','',''),(98,'stamp','create','proposer',1,0,'','1','0','currentUser',''),(99,'stamp','create','reason',2,0,'','1','0','',''),(100,'stamp','create','begin',3,0,'','1','0','',''),(101,'stamp','create','end',4,0,'','1','0','',''),(102,'stamp','create','type',5,0,'','1','0','',''),(103,'stamp','create','desc',6,0,'','1','0','',''),(113,'stamp','edit','end',4,0,'','1','0','',''),(112,'stamp','edit','begin',3,0,'','1','0','',''),(111,'stamp','edit','reason',2,0,'','1','0','',''),(110,'stamp','edit','proposer',1,0,'','1','0','currentUser',''),(114,'stamp','edit','type',5,0,'','1','0','',''),(115,'stamp','edit','desc',6,0,'','1','0','',''),(116,'stamp','view','id',1,0,'basic','1','0','',''),(117,'stamp','view','proposer',2,0,'basic','1','0','',''),(118,'stamp','view','reason',3,0,'info','1','0','',''),(119,'stamp','view','begin',4,0,'basic','1','0','',''),(120,'stamp','view','end',5,0,'basic','1','0','',''),(121,'stamp','view','type',6,0,'basic','1','0','',''),(122,'stamp','view','desc',7,0,'info','1','0','',''),(123,'stamp','view','status',8,0,'basic','1','0','',''),(124,'stamp','view','reviewedBy',9,0,'basic','1','0','',''),(125,'stamp','view','reviewedDate',10,0,'basic','1','0','',''),(126,'stamp','view','createdBy',11,0,'basic','1','0','',''),(127,'stamp','view','createdDate',12,0,'basic','1','0','',''),(128,'stamp','view','editedBy',13,0,'basic','1','0','',''),(129,'stamp','view','editedDate',14,0,'basic','1','0','',''),(468,'car','browse','actions',9,130,'','0','0','',''),(466,'car','browse','price',7,0,'left','0','1','',''),(465,'car','browse','buyDate',6,0,'left','0','0','',''),(139,'car','create','type',1,0,'','1','0','',''),(140,'car','create','code',2,0,'','1','0','',''),(141,'car','create','driver',3,0,'','1','0','',''),(142,'car','create','mobile',4,0,'','1','0','',''),(143,'car','create','buyDate',5,0,'','1','0','',''),(144,'car','create','price',6,0,'','1','0','',''),(145,'car','create','status',7,0,'','1','0','',''),(146,'car','edit','type',1,0,'','1','0','',''),(147,'car','edit','code',2,0,'','1','0','',''),(148,'car','edit','driver',3,0,'','1','0','',''),(149,'car','edit','mobile',4,0,'','1','0','',''),(150,'car','edit','buyDate',5,0,'','1','0','',''),(151,'car','edit','price',6,0,'','1','0','',''),(152,'car','edit','status',7,0,'','1','0','',''),(153,'car','view','id',1,0,'basic','1','0','',''),(154,'car','view','type',2,0,'basic','1','0','',''),(155,'car','view','code',3,0,'basic','1','0','',''),(156,'car','view','driver',4,0,'basic','1','0','',''),(157,'car','view','mobile',5,0,'basic','1','0','',''),(158,'car','view','buyDate',6,0,'basic','1','0','',''),(159,'car','view','price',7,0,'basic','1','0','',''),(160,'car','view','status',8,0,'basic','1','0','',''),(161,'car','view','createdBy',9,0,'basic','1','0','',''),(162,'car','view','createdDate',10,0,'basic','1','0','',''),(163,'car','view','editedBy',11,0,'basic','1','0','',''),(164,'car','view','editedDate',12,0,'basic','1','0','',''),(438,'carbooking','browse','appliedDate',8,0,'left','0','0','',''),(431,'carbooking','browse','id',1,0,'left','0','0','',''),(432,'carbooking','browse','appliedBy',2,0,'left','0','0','',''),(433,'carbooking','browse','car',3,0,'left','1','0','',''),(434,'carbooking','browse','begin',4,0,'left','1','0','',''),(183,'carbooking','create','appliedDate',2,0,'','1','0','currentTime',''),(182,'carbooking','create','appliedBy',1,0,'','1','0','currentUser',''),(184,'carbooking','create','car',3,0,'','1','0','',''),(185,'carbooking','create','begin',4,0,'','1','0','',''),(186,'carbooking','create','end',5,0,'','1','0','',''),(187,'carbooking','create','reason',6,0,'','1','0','',''),(188,'carbooking','edit','appliedBy',1,0,'','1','0','currentUser',''),(189,'carbooking','edit','appliedDate',2,0,'','1','0','currentTime',''),(190,'carbooking','edit','car',3,0,'','1','0','',''),(191,'carbooking','edit','begin',4,0,'','1','0','',''),(192,'carbooking','edit','end',5,0,'','1','0','',''),(193,'carbooking','edit','reason',6,0,'','1','0','',''),(194,'carbooking','view','id',1,0,'basic','1','0','',''),(195,'carbooking','view','appliedBy',2,0,'basic','1','0','',''),(196,'carbooking','view','appliedDate',3,0,'basic','1','0','',''),(197,'carbooking','view','car',4,0,'basic','1','0','',''),(198,'carbooking','view','begin',5,0,'basic','1','0','',''),(199,'carbooking','view','end',6,0,'basic','1','0','',''),(200,'carbooking','view','reason',7,0,'info','1','0','',''),(201,'carbooking','view','status',8,0,'basic','1','0','',''),(202,'carbooking','view','reviewedBy',9,0,'basic','1','0','',''),(203,'carbooking','view','reviewedDate',10,0,'basic','1','0','',''),(204,'carbooking','view','createdBy',11,0,'basic','1','0','',''),(205,'carbooking','view','createdDate',12,0,'basic','1','0','',''),(206,'carbooking','view','editedBy',13,0,'basic','1','0','',''),(207,'carbooking','view','editedDate',14,0,'basic','1','0','',''),(462,'car','browse','code',3,0,'left','1','0','',''),(435,'carbooking','browse','end',5,0,'left','1','0','',''),(436,'carbooking','browse','reason',6,0,'left','1','0','',''),(437,'carbooking','browse','status',7,0,'left','0','0','',''),(469,'collect','browse','id',1,0,'left','0','0','',''),(473,'collect','browse','status',5,0,'left','0','0','',''),(474,'collect','browse','appliedDate',6,0,'left','0','0','',''),(257,'collect','create','appliedDate',2,0,'','1','0','currentTime',''),(256,'collect','create','appliedBy',1,0,'','1','0','currentUser',''),(261,'collect','edit','appliedDate',2,0,'','1','0','currentTime',''),(260,'collect','edit','appliedBy',1,0,'','1','0','currentUser',''),(258,'collect','create','money',3,0,'','1','0','',''),(259,'collect','create','reason',4,0,'','1','0','',''),(262,'collect','edit','money',3,0,'','1','0','',''),(263,'collect','edit','reason',4,0,'','1','0','',''),(264,'collect','view','id',1,0,'basic','1','0','',''),(265,'collect','view','appliedBy',2,0,'basic','1','0','',''),(266,'collect','view','appliedDate',3,0,'basic','1','0','',''),(267,'collect','view','money',4,0,'basic','1','0','',''),(268,'collect','view','reason',5,0,'info','1','0','',''),(269,'collect','view','status',6,0,'basic','1','0','',''),(270,'collect','view','reviewedBy',7,0,'basic','1','0','',''),(271,'collect','view','reviewedDate',8,0,'basic','1','0','',''),(272,'collect','view','createdBy',9,0,'basic','1','0','',''),(273,'collect','view','createdDate',10,0,'basic','1','0','',''),(274,'collect','view','editedBy',11,0,'basic','1','0','',''),(275,'collect','view','editedDate',12,0,'basic','1','0','',''),(276,'collect','pay','depositor',1,0,'','1','0','',''),(277,'collect','pay','category',2,0,'','1','0','',''),(471,'collect','browse','money',3,0,'left','1','1','',''),(472,'collect','browse','reason',4,0,'left','1','0','',''),(520,'buy','browse','createdBy',7,0,'left','0','0','',''),(519,'buy','browse','status',6,0,'left','0','0','',''),(514,'buy','browse','id',1,0,'left','0','0','',''),(324,'buy','create','money',3,0,'','1','0','',''),(323,'buy','create','goods',2,0,'','1','0','',''),(322,'buy','create','provider',1,0,'','1','0','',''),(329,'buy','edit','money',3,0,'','1','0','',''),(328,'buy','edit','goods',2,0,'','1','0','',''),(327,'buy','edit','provider',1,0,'','1','0','',''),(325,'buy','create','desc',4,0,'','1','0','',''),(326,'buy','create','file',5,0,'','1','0','',''),(330,'buy','edit','desc',4,0,'','1','0','',''),(331,'buy','edit','file',5,0,'','1','0','',''),(332,'buy','view','id',1,0,'basic','1','0','',''),(333,'buy','view','provider',2,0,'basic','1','0','',''),(334,'buy','view','goods',3,0,'basic','1','0','',''),(335,'buy','view','money',4,0,'basic','1','0','',''),(336,'buy','view','desc',5,0,'info','1','0','',''),(337,'buy','view','status',6,0,'basic','1','0','',''),(338,'buy','view','createdBy',7,0,'basic','1','0','',''),(339,'buy','view','createdDate',8,0,'basic','1','0','',''),(340,'buy','view','editedBy',9,0,'basic','1','0','',''),(341,'buy','view','editedDate',10,0,'basic','1','0','',''),(342,'buy','view','file',11,0,'info','1','0','',''),(343,'buy','pay','depositor',1,0,'','1','0','',''),(344,'buy','pay','category',2,0,'','1','0','',''),(522,'buy','browse','actions',9,120,'','0','0','',''),(521,'buy','browse','createdDate',8,0,'left','0','0','',''),(517,'buy','browse','money',4,0,'left','1','1','',''),(470,'collect','browse','appliedBy',2,0,'left','1','0','',''),(463,'car','browse','driver',4,0,'left','1','0','',''),(464,'car','browse','mobile',5,0,'left','1','0','',''),(395,'meetingroom','browse','createdBy',7,0,'left','0','0','',''),(387,'meetingroombooking','browse','desc',7,0,'left','1','0','',''),(388,'meetingroombooking','browse','actions',8,120,'','0','0','',''),(397,'meetingroom','browse','actions',9,130,'','0','0','',''),(425,'stamp','browse','type',6,0,'left','1','0','',''),(426,'stamp','browse','desc',7,0,'left','0','0','',''),(423,'stamp','browse','begin',4,0,'left','1','0','',''),(424,'stamp','browse','end',5,0,'left','1','0','',''),(439,'carbooking','browse','reviewedBy',9,0,'left','0','0','',''),(440,'carbooking','browse','reviewedDate',10,0,'left','0','0','',''),(441,'carbooking','browse','actions',11,160,'','0','0','',''),(467,'car','browse','status',8,0,'left','1','0','',''),(460,'car','browse','id',1,0,'left','0','0','',''),(461,'car','browse','type',2,0,'left','0','0','',''),(475,'collect','browse','reviewedBy',7,0,'left','0','0','',''),(476,'collect','browse','reviewedDate',8,0,'left','0','0','',''),(477,'collect','browse','actions',9,180,'','0','0','',''),(518,'buy','browse','desc',5,0,'left','1','0','',''),(515,'buy','browse','provider',2,0,'left','1','0','',''),(516,'buy','browse','goods',3,0,'left','1','0','','');
INSERT INTO `sys_workflowmenu` VALUES (1,'meetingroom','所有会议室','[{\"key\":\"deleted\",\"operator\":\"equal\",\"value\":\"0\"}]',0,'admin','2018-08-13 13:05:20','admin','2016-11-23 10:48:04','0'),(2,'meetingroombooking','所有预订','[{\"key\":\"deleted\",\"operator\":\"equal\",\"value\":\"0\"}]',0,'admin','2018-08-13 13:05:20','admin','2016-11-23 11:07:32','0'),(3,'meetingroom','一楼会议室','[{\"key\":\"position\",\"operator\":\"equal\",\"value\":\"1\"}]',0,'admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(4,'meetingroom','二楼会议室','[{\"key\":\"position\",\"operator\":\"equal\",\"value\":\"2\"}]',0,'admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(5,'meetingroom','三楼会议室','[{\"key\":\"position\",\"operator\":\"equal\",\"value\":\"3\"}]',0,'admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(6,'meetingroombooking','我的预订','[{\"key\":\"orderedBy\",\"operator\":\"equal\",\"value\":\"currentUser\"}]',0,'admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(7,'stamp','所有','[{\"key\":\"deleted\",\"operator\":\"equal\",\"value\":\"0\"}]',0,'admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(8,'car','车辆列表','[{\"key\":\"deleted\",\"operator\":\"equal\",\"value\":\"0\"}]',0,'admin','2018-08-13 13:05:20','admin','2016-11-23 13:28:10','0'),(9,'carbooking','所有预订','[{\"key\":\"deleted\",\"operator\":\"equal\",\"value\":\"0\"}]',0,'admin','2018-08-13 13:05:20','admin','2016-11-23 13:29:07','0'),(10,'stamp','我的申请','[{\"key\":\"proposer\",\"operator\":\"equal\",\"value\":\"currentUser\"},{\"key\":\"deleted\",\"operator\":\"equal\",\"value\":\"0\"}]',0,'admin','2018-08-13 13:05:20','admin','2016-11-23 13:27:26','0'),(11,'stamp','我的审核','[{\"key\":\"status\",\"operator\":\"equal\",\"value\":\"wait\"},{\"key\":\"deleted\",\"operator\":\"equal\",\"value\":\"0\"}]',0,'admin','2018-08-13 13:05:20','admin','2016-11-24 13:56:12','0'),(12,'carbooking','我的预订','[{\"key\":\"deleted\",\"operator\":\"equal\",\"value\":\"0\"},{\"key\":\"appliedBy\",\"operator\":\"equal\",\"value\":\"currentUser\"}]',0,'admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(13,'carbooking','我的审核','[{\"key\":\"deleted\",\"operator\":\"equal\",\"value\":\"0\"},{\"key\":\"status\",\"operator\":\"equal\",\"value\":\"wait\"}]',0,'admin','2018-08-13 13:05:20','admin','2016-11-24 13:56:46','0'),(14,'collect','所有','[{\"key\":\"deleted\",\"operator\":\"equal\",\"value\":\"0\"}]',0,'admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(15,'collect','我的请款','[{\"key\":\"appliedBy\",\"operator\":\"equal\",\"value\":\"currentUser\"},{\"key\":\"deleted\",\"operator\":\"equal\",\"value\":\"0\"}]',0,'admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(16,'collect','我的审核','[{\"key\":\"status\",\"operator\":\"equal\",\"value\":\"wait\"},{\"key\":\"deleted\",\"operator\":\"equal\",\"value\":\"0\"}]',0,'admin','2018-08-13 13:05:20','admin','2016-11-24 14:02:10','0'),(17,'collect','待付款','[{\"key\":\"status\",\"operator\":\"equal\",\"value\":\"pass\"},{\"key\":\"deleted\",\"operator\":\"equal\",\"value\":\"0\"}]',0,'admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(18,'buy','所有','[{\"key\":\"deleted\",\"operator\":\"equal\",\"value\":\"0\"}]',0,'admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(19,'buy','待付款','[{\"key\":\"status\",\"operator\":\"equal\",\"value\":\"unpaid\"},{\"key\":\"deleted\",\"operator\":\"equal\",\"value\":\"0\"}]',0,'admin','2018-08-13 13:05:20','','0000-00-00 00:00:00','0'),(20,'buy','已付款','[{\"key\":\"status\",\"operator\":\"equal\",\"value\":\"paid\"},{\"key\":\"deleted\",\"operator\":\"equal\",\"value\":\"0\"}]',0,'admin','2018-08-13 13:05:20','admin','2016-11-23 14:22:20','0');

INSERT INTO `sys_grouppriv` (`group`, `module`, `method`) VALUES
(1, 'car', 'browse'),
(1, 'car', '8'),
(1, 'car', 'create'),
(1, 'car', 'edit'),
(1, 'car', 'view'),
(1, 'car', 'delete'),
(1, 'carbooking', 'browse'),
(1, 'carbooking', '9'),
(1, 'carbooking', '12'),
(1, 'carbooking', '13'),
(1, 'carbooking', 'create'),
(1, 'carbooking', 'edit'),
(1, 'carbooking', 'view'),
(1, 'carbooking', 'delete'),
(1, 'carbooking', 'pass'),
(1, 'carbooking', 'reject'),
(1, 'collect', 'browse'),
(1, 'collect', '14'),
(1, 'collect', '15'),
(1, 'collect', '16'),
(1, 'collect', '17'),
(1, 'collect', 'create'),
(1, 'collect', 'edit'),
(1, 'collect', 'view'),
(1, 'collect', 'delete'),
(1, 'collect', 'pass'),
(1, 'collect', 'reject'),
(1, 'collect', 'pay'),
(1, 'meetingroom', 'browse'),
(1, 'meetingroom', '1'),
(1, 'meetingroom', '3'),
(1, 'meetingroom', '4'),
(1, 'meetingroom', '5'),
(1, 'meetingroom', 'create'),
(1, 'meetingroom', 'edit'),
(1, 'meetingroom', 'view'),
(1, 'meetingroom', 'delete'),
(1, 'meetingroombooking', 'browse'),
(1, 'meetingroombooking', '2'),
(1, 'meetingroombooking', '6'),
(1, 'meetingroombooking', 'create'),
(1, 'meetingroombooking', 'edit'),
(1, 'meetingroombooking', 'view'),
(1, 'meetingroombooking', 'delete'),
(1, 'buy', 'browse'),
(1, 'buy', '18'),
(1, 'buy', '19'),
(1, 'buy', '20'),
(1, 'buy', 'create'),
(1, 'buy', 'edit'),
(1, 'buy', 'view'),
(1, 'buy', 'delete'),
(1, 'buy', 'pay'),
(1, 'stamp', 'browse'),
(1, 'stamp', '7'),
(1, 'stamp', '10'),
(1, 'stamp', '11'),
(1, 'stamp', 'create'),
(1, 'stamp', 'edit'),
(1, 'stamp', 'view'),
(1, 'stamp', 'delete'),
(1, 'stamp', 'revoke'),
(1, 'stamp', 'submit'),
(1, 'stamp', 'pass'),
(1, 'stamp', 'reject');
