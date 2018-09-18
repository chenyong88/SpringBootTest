ALTER TABLE `crm_customer` CHANGE `category` `category` mediumint(8) unsigned NOT NULL;

-- DROP TABLE IF EXISTS `sys_queue`;
CREATE TABLE `sys_queue` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `objectID` mediumint(8) unsigned NOT NULL,
  `action` mediumint(9) NOT NULL,
  `toList` varchar(255) NOT NULL,
  `ccList` text NOT NULL,
  `subject` varchar(255) DEFAULT '',
  `data` text DEFAULT NULL,
  `createdBy` char(30) NOT NULL,
  `createdDate` datetime NOT NULL,
  `sendTime` datetime NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'wait',
  `failReason` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `sys_cron` (`m`, `h`, `dom`, `mon`, `dow`, `command`, `remark`, `type`, `buildin`, `status`, `lastTime`) VALUES
('*/1', '*', '*', '*', '*', 'appName=sys&moduleName=queue&methodName=getqueue', '出队列', 'ranzhi', 0, 'normal', '0000-00-00 00:00:00'),
('*/10', '*', '*', '*', '*', 'appName=sys&moduleName=queue&methodName=additional', '检查是否添加待办', 'ranzhi', 0, 'normal', '0000-00-00 00:00:00');
