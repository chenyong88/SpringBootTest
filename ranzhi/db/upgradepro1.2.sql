ALTER TABLE `sys_issue` ADD `activatedBy` char(30) NOT NULL AFTER `closedReason`;
ALTER TABLE `sys_issue` ADD `activatedDate` datetime NOT NULL AFTER `activatedBy`;
ALTER TABLE `sys_workflowaction` ADD `show` enum('dropdownlist', 'direct') NOT NULL DEFAULT 'dropdownlist' AFTER `position`;

UPDATE `sys_workflowaction` SET `show` = 'direct' WHERE `action` IN ('browse', 'create', 'edit', 'view');
UPDATE `sys_workflowaction` SET `position` = 'menu' WHERE `action` IN ('browse', 'create');
UPDATE `sys_workflowaction` SET `position` = 'browseandview' WHERE `action` IN ('edit', 'delete');
UPDATE `sys_workflowaction` SET `position` = 'browse' WHERE `action` = 'view';
