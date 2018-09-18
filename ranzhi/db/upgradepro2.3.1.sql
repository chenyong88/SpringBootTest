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

-- DROP TABLE IF EXISTS `cash_invoice`;
CREATE TABLE IF NOT EXISTS `cash_invoice` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `sn` varchar(20) NOT NULL,
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

ALTER TABLE `ameba_statement` CHANGE `id` `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
