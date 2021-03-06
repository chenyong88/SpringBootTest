DROP TABLE IF EXISTS `ameba_budget`;
DROP TABLE IF EXISTS `ameba_category`;
DROP TABLE IF EXISTS `ameba_deal`;
DROP TABLE IF EXISTS `ameba_fee`;
DROP TABLE IF EXISTS `ameba_rule`;
DROP TABLE IF EXISTS `ameba_sharefee`;
DROP TABLE IF EXISTS `ameba_statement`;
DROP TABLE IF EXISTS `ameba_dept`;
DROP TABLE IF EXISTS `ameba_user`;
DROP TABLE IF EXISTS `ameba_setting`;
DROP TABLE IF EXISTS `cash_fund`;
DROP TABLE IF EXISTS `cash_invoice`;
DROP TABLE IF EXISTS `cash_invoicedetail`;
DROP TABLE IF EXISTS `crm_orderaction`;
DROP TABLE IF EXISTS `crm_orderfield`;
DROP TABLE IF EXISTS `crm_customerinvoice`;
DROP TABLE IF EXISTS `hr_salary`;
DROP TABLE IF EXISTS `hr_salarydetail`;
DROP TABLE IF EXISTS `hr_salarycommission`;
DROP TABLE IF EXISTS `hr_tradecommission`;
DROP TABLE IF EXISTS `hr_commissionrule`;
DROP TABLE IF EXISTS `psi_batch`;
DROP TABLE IF EXISTS `psi_batchproduct`;
DROP TABLE IF EXISTS `psi_order`;
DROP TABLE IF EXISTS `psi_orderproduct`;
DROP TABLE IF EXISTS `psi_purchaseproduct`;
DROP TABLE IF EXISTS `sys_company`;
DROP TABLE IF EXISTS `sys_issue`;
DROP TABLE IF EXISTS `sys_searchdict`;
DROP TABLE IF EXISTS `sys_searchindex`;
DROP TABLE IF EXISTS `sys_store`;
DROP TABLE IF EXISTS `sys_weekly`;
DROP TABLE IF EXISTS `sys_workflow`;
DROP TABLE IF EXISTS `sys_workflowaction`;
DROP TABLE IF EXISTS `sys_workflowdatasource`;
DROP TABLE IF EXISTS `sys_workflowfield`;
DROP TABLE IF EXISTS `sys_workflowlayout`;
DROP TABLE IF EXISTS `sys_workflowmenu`;
DROP TABLE IF EXISTS `sys_workflowrule`;
DROP TABLE IF EXISTS `sys_workflowsql`;
DROP TABLE IF EXISTS `sys_workflowversion`;
DROP TABLE IF EXISTS `sys_effort`;
DROP TABLE IF EXISTS `sys_oauth`;
DROP TABLE IF EXISTS `flow_car`;
DROP TABLE IF EXISTS `flow_carbooking`;
DROP TABLE IF EXISTS `flow_collect`;
DROP TABLE IF EXISTS `flow_meetingroom`;
DROP TABLE IF EXISTS `flow_meetingroombooking`;
DROP TABLE IF EXISTS `flow_buy`;
DROP TABLE IF EXISTS `flow_stamp`;

ALTER TABLE `cash_trade`     DROP `commission`;
ALTER TABLE `cash_trade`     DROP `alipayTradeNo`;
ALTER TABLE `cash_trade`     DROP `shareStatus`;
ALTER TABLE `cash_trade`     DROP `sharedDate`;
ALTER TABLE `cash_depositor` DROP `company`;
ALTER TABLE `crm_contact`    DROP `register`;
ALTER TABLE `crm_contact`    DROP `last`;
ALTER TABLE `crm_contact`    DROP `visits`;
ALTER TABLE `crm_contact`    DROP `ip`;
ALTER TABLE `crm_contract`   DROP `fund`;
ALTER TABLE `crm_contract`   DROP `company`;
ALTER TABLE `oa_leave`       DROP `level`;
ALTER TABLE `oa_leave`       DROP `assignedTo`;
ALTER TABLE `oa_leave`       DROP `reviewers`;
ALTER TABLE `oa_leave`       DROP `backReviewers`;
ALTER TABLE `oa_lieu`        DROP `level`;
ALTER TABLE `oa_lieu`        DROP `assignedTo`;
ALTER TABLE `oa_lieu`        DROP `reviewers`;
ALTER TABLE `oa_overtime`    DROP `level`;
ALTER TABLE `oa_overtime`    DROP `assignedTo`;
ALTER TABLE `oa_overtime`    DROP `reviewers`;
ALTER TABLE `oa_refund`      DROP `level`;
ALTER TABLE `oa_refund`      DROP `assignedTo`;
ALTER TABLE `oa_refund`      DROP `reviewers`;
ALTER TABLE `sys_action`     DROP `origin`;
ALTER TABLE `sys_action`     DROP `efforted`;
ALTER TABLE `sys_category`   DROP `wechatDept`;
ALTER TABLE `sys_category`   DROP `isAmebaDept`;
ALTER TABLE `sys_category`   DROP `amebaDept`;
ALTER TABLE `sys_product`    DROP `roles`;
ALTER TABLE `sys_product`    DROP `pinyin`;
ALTER TABLE `sys_product`    DROP `model`;
ALTER TABLE `sys_product`    DROP `unit`;
ALTER TABLE `sys_product`    DROP `barcode`;
ALTER TABLE `sys_product`    DROP `brand`;
ALTER TABLE `sys_product`    DROP `store`;
ALTER TABLE `sys_product`    DROP `price`;
ALTER TABLE `sys_product`    DROP `amount`;
ALTER TABLE `sys_user`       DROP `parent`;
ALTER TABLE `sys_user`       DROP `unofficial`;

DELETE FROM `sys_category` WHERE `type` = 'amebaAccount';
DELETE FROM `sys_category` WHERE `type` = 'amebaAccount';
DELETE FROM `sys_category` WHERE `type` = 'amebaAccount';
DELETE FROM `sys_category` WHERE `type` = 'amebaAccount';
DELETE FROM `sys_category` WHERE `type` = 'amebaAccount';
DELETE FROM `sys_category` WHERE `type` = 'amebaAccount';
DELETE FROM `sys_category` WHERE `type` = 'amebaAccount';

DELETE FROM `sys_config` WHERE `owner` = 'system' AND `app` = 'psi' AND `module` = 'order' AND `section` = 'orderNo';

DELETE FROM `sys_cron` WHERE `command` = 'appName=crm&moduleName=leads&methodName=sync';
DELETE FROM `sys_cron` WHERE `command` = 'appName=cash&moduleName=trade&methodName=syncAlipay';
DELETE FROM `sys_cron` WHERE `command` = 'appName=ameba&moduleName=deal&methodName=batchShare';
DELETE FROM `sys_cron` WHERE `command` = 'appName=ameba&moduleName=amebareport&methodName=updateStatement';

DELETE FROM `sys_entry` WHERE `code` = 'hr';
DELETE FROM `sys_entry` WHERE `code` = 'psi';
DELETE FROM `sys_entry` WHERE `code` = 'flow';
DELETE FROM `sys_entry` WHERE `code` = 'ameba';

DELETE FROM `sys_grouppriv` WHERE `module` = 'amebareport';
DELETE FROM `sys_grouppriv` WHERE `module` = 'budget';
DELETE FROM `sys_grouppriv` WHERE `module` = 'deal';
DELETE FROM `sys_grouppriv` WHERE `module` = 'fee';
DELETE FROM `sys_grouppriv` WHERE `module` = 'rule';
DELETE FROM `sys_grouppriv` WHERE `module` = 'batch';
DELETE FROM `sys_grouppriv` WHERE `module` = 'commission';
DELETE FROM `sys_grouppriv` WHERE `module` = 'feedback';
DELETE FROM `sys_grouppriv` WHERE `module` = 'payable';
DELETE FROM `sys_grouppriv` WHERE `module` = 'purchase';
DELETE FROM `sys_grouppriv` WHERE `module` = 'receivable';
DELETE FROM `sys_grouppriv` WHERE `module` = 'salary';
DELETE FROM `sys_grouppriv` WHERE `module` = 'sale';
DELETE FROM `sys_grouppriv` WHERE `module` = 'store';
DELETE FROM `sys_grouppriv` WHERE `module` = 'workflow';
DELETE FROM `sys_grouppriv` WHERE `module` = 'car';
DELETE FROM `sys_grouppriv` WHERE `module` = 'carbooking';
DELETE FROM `sys_grouppriv` WHERE `module` = 'collect';
DELETE FROM `sys_grouppriv` WHERE `module` = 'meetingroom';
DELETE FROM `sys_grouppriv` WHERE `module` = 'meetingroombooking';
DELETE FROM `sys_grouppriv` WHERE `module` = 'buy';
DELETE FROM `sys_grouppriv` WHERE `module` = 'stamp';

DELETE FROM `sys_grouppriv` WHERE `module` = 'apppriv'  AND `method` = 'flow';
DELETE FROM `sys_grouppriv` WHERE `module` = 'apppriv'  AND `method` = 'hr';
DELETE FROM `sys_grouppriv` WHERE `module` = 'apppriv'  AND `method` = 'psi';
DELETE FROM `sys_grouppriv` WHERE `module` = 'apppriv'  AND `method` = 'ameba';

DELETE FROM `sys_grouppriv` WHERE `module` = 'contract' AND `method` = 'expense';
DELETE FROM `sys_grouppriv` WHERE `module` = 'contract' AND `method` = 'setting';
DELETE FROM `sys_grouppriv` WHERE `module` = 'customer' AND `method` = 'exportTemplate';
DELETE FROM `sys_grouppriv` WHERE `module` = 'customer' AND `method` = 'import';
DELETE FROM `sys_grouppriv` WHERE `module` = 'leads'    AND `method` = 'adminSites';
DELETE FROM `sys_grouppriv` WHERE `module` = 'leads'    AND `method` = 'createSite';
DELETE FROM `sys_grouppriv` WHERE `module` = 'leads'    AND `method` = 'deleteSite';
DELETE FROM `sys_grouppriv` WHERE `module` = 'leads'    AND `method` = 'editSite';
DELETE FROM `sys_grouppriv` WHERE `module` = 'leads'    AND `method` = 'sync';
DELETE FROM `sys_grouppriv` WHERE `module` = 'my'       AND `method` = 'deptSalary';
DELETE FROM `sys_grouppriv` WHERE `module` = 'order'    AND `method` = 'team';
DELETE FROM `sys_grouppriv` WHERE `module` = 'product'  AND `method` = 'actionconditions';
DELETE FROM `sys_grouppriv` WHERE `module` = 'product'  AND `method` = 'actioninputs';
DELETE FROM `sys_grouppriv` WHERE `module` = 'product'  AND `method` = 'actionresults';
DELETE FROM `sys_grouppriv` WHERE `module` = 'product'  AND `method` = 'actiontasks';
DELETE FROM `sys_grouppriv` WHERE `module` = 'product'  AND `method` = 'adminaction';
DELETE FROM `sys_grouppriv` WHERE `module` = 'product'  AND `method` = 'adminfield';
DELETE FROM `sys_grouppriv` WHERE `module` = 'product'  AND `method` = 'adminroles';
DELETE FROM `sys_grouppriv` WHERE `module` = 'product'  AND `method` = 'batchCreate';
DELETE FROM `sys_grouppriv` WHERE `module` = 'product'  AND `method` = 'batchCreateProperties';
DELETE FROM `sys_grouppriv` WHERE `module` = 'product'  AND `method` = 'browseProperties';
DELETE FROM `sys_grouppriv` WHERE `module` = 'product'  AND `method` = 'copy';
DELETE FROM `sys_grouppriv` WHERE `module` = 'product'  AND `method` = 'createaction';
DELETE FROM `sys_grouppriv` WHERE `module` = 'product'  AND `method` = 'createfield';
DELETE FROM `sys_grouppriv` WHERE `module` = 'product'  AND `method` = 'createresult';
DELETE FROM `sys_grouppriv` WHERE `module` = 'product'  AND `method` = 'createFromOrder';
DELETE FROM `sys_grouppriv` WHERE `module` = 'product'  AND `method` = 'createProperty';
DELETE FROM `sys_grouppriv` WHERE `module` = 'product'  AND `method` = 'deleteaction';
DELETE FROM `sys_grouppriv` WHERE `module` = 'product'  AND `method` = 'deletefield';
DELETE FROM `sys_grouppriv` WHERE `module` = 'product'  AND `method` = 'deleteProperty';
DELETE FROM `sys_grouppriv` WHERE `module` = 'product'  AND `method` = 'deleteresult';
DELETE FROM `sys_grouppriv` WHERE `module` = 'product'  AND `method` = 'editaction';
DELETE FROM `sys_grouppriv` WHERE `module` = 'product'  AND `method` = 'editfield';
DELETE FROM `sys_grouppriv` WHERE `module` = 'product'  AND `method` = 'editProperty';
DELETE FROM `sys_grouppriv` WHERE `module` = 'product'  AND `method` = 'editresult';
DELETE FROM `sys_grouppriv` WHERE `module` = 'trade'    AND `method` = 'share';
DELETE FROM `sys_grouppriv` WHERE `module` = 'trade'    AND `method` = 'syncAlipay';
DELETE FROM `sys_grouppriv` WHERE `module` = 'user'     AND `method` = 'importLDAP';
