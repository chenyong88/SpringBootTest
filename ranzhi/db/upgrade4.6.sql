INSERT INTO `sys_category` (`type`, `name`, `alias`, `parent`, `grade`) SELECT 'product', `value`, `key`, 0, 1 FROM `sys_lang` WHERE `module` = 'product' AND `section` = 'lineList';

UPDATE `sys_category` SET `path` = concat(',', id , ',') WHERE `type` = 'product' AND `path` = '';
UPDATE `sys_product`, `sys_category` SET `sys_product`.line = `sys_category`.id WHERE `sys_product`.line = `sys_category`.alias AND `sys_category`.type = 'product' AND `sys_category`.alias != '';

ALTER TABLE `sys_product` ADD `order` smallint(5) UNSIGNED NOT NULL DEFAULT 0;
