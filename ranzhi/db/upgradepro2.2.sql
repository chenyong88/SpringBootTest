ALTER TABLE `oa_leave` ADD `backReviewers` text NOT NULL AFTER `reviewers`;

ALTER TABLE `sys_workflow` CHANGE `position` `position` varchar(30) NOT NULL;

ALTER TABLE `sys_file` CHANGE `objectType` `objectType` char(30) NOT NULL;

DELETE FROM `sys_config` WHERE `owner` = 'system' AND `app` = 'hr' AND `module` = 'commission' AND `key` = 'closed';
DELETE FROM `hr_commissionrule` WHERE `account` = 'closed';
