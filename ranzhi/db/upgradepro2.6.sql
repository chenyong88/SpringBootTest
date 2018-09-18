ALTER TABLE `sys_workflowlayout` ADD `totalShow` ENUM('0','1') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' AFTER `mobileShow`;
ALTER TABLE `sys_workflowfield` ADD `canExport` enum('0', '1') NOT NULL DEFAULT '1' AFTER `placeholder`;

ALTER TABLE `sys_workflowlayout` CHANGE `mobileShow` `mobileShow` enum('0', '1') NOT NULL DEFAULT '1';

UPDATE `cash_invoice` SET `sendway` = 'weixin' WHERE `sendway` = 'wechat';
