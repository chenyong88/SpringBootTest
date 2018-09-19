ALTER TABLE `crm_customer` ADD `source` varchar(20) NOT NULL AFTER `relation`;
ALTER TABLE `crm_customer` ADD `sourceNote` varchar(255) NOT NULL AFTER `source`;

ALTER TABLE `cash_trade` ADD `project` mediumint(8) unsigned NOT NULL AFTER `contract`;
ALTER TABLE `cash_trade` ADD `deadline` date NOT NULL AFTER `date`;
ALTER TABLE `cash_trade` CHANGE `exchangeRate` `exchangeRate` decimal(12,4) NOT NULL DEFAULT 1;

ALTER TABLE `oa_refund` ADD `customer` mediumint(8) unsigned NOT NULL AFTER `id`;
ALTER TABLE `oa_refund` ADD `order` mediumint(8) unsigned NOT NULL AFTER `customer`;
ALTER TABLE `oa_refund` ADD `contract` mediumint(8) unsigned NOT NULL AFTER `order`;
ALTER TABLE `oa_refund` ADD `project` mediumint(8) unsigned NOT NULL AFTER `contract`;

ALTER TABLE `sys_product` CHANGE `line` `line` varchar(60) NOT NULL;

UPDATE `cash_trade` SET `exchangeRate` = 1 WHERE `currency` = (SELECT `value` FROM `sys_config` WHERE `owner` = 'system' AND `app` = 'sys' AND `module` = 'setting' AND `key` = 'mainCurrency');
UPDATE `sys_product` SET `line` = '' WHERE `line` = 'default';
