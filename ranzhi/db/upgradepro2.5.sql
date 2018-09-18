ALTER TABLE `sys_action` CHANGE `action` `action` varchar(80) NOT NULL DEFAULT '';

ALTER TABLE `ameba_user` ADD `unofficial` enum('0', '1') NOT NULL DEFAULT '0' AFTER `parent`;
