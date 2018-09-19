ALTER TABLE `sys_workflow` CHANGE `administrator` `administrator` text NOT NULL;

ALTER TABLE `oa_leave` ADD `level` tinyint(3) NOT NULL;
ALTER TABLE `oa_leave` ADD `assignedTo` varchar(30) NOT NULL;
ALTER TABLE `oa_leave` ADD `reviewers` text NOT NULL;

ALTER TABLE `oa_lieu` ADD `level` tinyint(3) NOT NULL;
ALTER TABLE `oa_lieu` ADD `assignedTo` varchar(30) NOT NULL;
ALTER TABLE `oa_lieu` ADD `reviewers` text NOT NULL;

ALTER TABLE `oa_overtime` ADD `level` tinyint(3) NOT NULL;
ALTER TABLE `oa_overtime` ADD `assignedTo` varchar(30) NOT NULL;
ALTER TABLE `oa_overtime` ADD `reviewers` text NOT NULL;

ALTER TABLE `oa_refund` ADD `level` tinyint(3) NOT NULL;
ALTER TABLE `oa_refund` ADD `assignedTo` varchar(30) NOT NULL;
ALTER TABLE `oa_refund` ADD `reviewers` text NOT NULL;
