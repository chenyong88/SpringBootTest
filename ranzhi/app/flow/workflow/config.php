<?php
if(!isset($config->workflow)) $config->workflow = new stdclass();

$config->workflow->variables = array('today', 'now', 'actor', 'currentUser', 'currentDept', 'currentTime', 'deptManager');

$config->workflow->require = new stdclass();
$config->workflow->require->create           = 'app, module, name';
$config->workflow->require->edit             = 'app, name';
$config->workflow->require->createtable      = 'module';
$config->workflow->require->edittable        = 'module';
$config->workflow->require->createaction     = 'action, name';
$config->workflow->require->editaction       = 'action, name';
$config->workflow->require->createDatasource = 'type, name, datasource';
$config->workflow->require->editDatasource   = 'type, name, datasource';
$config->workflow->require->createRules      = 'type, name, rule';
$config->workflow->require->editRules        = 'type, name, rule';
$config->workflow->require->createModuleMenu = 'label';
$config->workflow->require->editModuleMenu   = 'label';

$config->workflow->uniqueFields = 'module';

$config->workflow->defaultFields['id']          = 'mediumint(8) unsigned NOT NULL AUTO_INCREMENT';
$config->workflow->defaultFields['parent']      = 'mediumint(8) unsigned NOT NULL';
$config->workflow->defaultFields['createdBy']   = 'varchar(30) NOT NULL';
$config->workflow->defaultFields['createdDate'] = 'datetime NOT NULL';
$config->workflow->defaultFields['editedBy']    = 'varchar(30) NOT NULL';
$config->workflow->defaultFields['editedDate']  = 'datetime NOT NULL';
$config->workflow->defaultFields['deleted']     = "enum('0', '1') NOT NULL DEFAULT '0'";

$config->workflow->defaultFieldTypes['id']          = 'mediumint';
$config->workflow->defaultFieldTypes['parent']      = 'mediumint';
$config->workflow->defaultFieldTypes['createdBy']   = 'varchar';
$config->workflow->defaultFieldTypes['createdDate'] = 'datetime';
$config->workflow->defaultFieldTypes['editedBy']    = 'varchar';
$config->workflow->defaultFieldTypes['editedDate']  = 'datetime';
$config->workflow->defaultFieldTypes['deleted']     = "enum('0', '1')";

$config->workflow->defaultFieldLength['id']          = '8';
$config->workflow->defaultFieldLength['parent']      = '8';
$config->workflow->defaultFieldLength['createdBy']   = '30';
$config->workflow->defaultFieldLength['createdDate'] = '';
$config->workflow->defaultFieldLength['editedBy']    = '30';
$config->workflow->defaultFieldLength['editedDate']  = '';
$config->workflow->defaultFieldLength['deleted']     = '';

$config->workflow->defaultControls['id']          = 'label';
$config->workflow->defaultControls['parent']      = 'label';
$config->workflow->defaultControls['createdBy']   = 'select';
$config->workflow->defaultControls['createdDate'] = 'datetime';
$config->workflow->defaultControls['editedBy']    = 'select';
$config->workflow->defaultControls['editedDate']  = 'datetime';
$config->workflow->defaultControls['deleted']     = 'radio';

$config->workflow->defaultOptions['id']          = '[]';
$config->workflow->defaultOptions['parent']      = '[]';
$config->workflow->defaultOptions['createdBy']   = 'user';
$config->workflow->defaultOptions['createdDate'] = '[]';
$config->workflow->defaultOptions['editedBy']    = 'user';
$config->workflow->defaultOptions['editedDate']  = '[]';
$config->workflow->defaultOptions['deleted']     = $this->lang->workflowfield->defaultOptions->deleted;

$config->workflow->defaultValues['id']          = '';
$config->workflow->defaultValues['parent']      = '0';
$config->workflow->defaultValues['createdBy']   = '';
$config->workflow->defaultValues['createdDate'] = '';
$config->workflow->defaultValues['editedBy']    = '';
$config->workflow->defaultValues['editedDate']  = '';
$config->workflow->defaultValues['deleted']     = '0';

$config->workflow->disabledFields['view']     = 'parent,deleted';
$config->workflow->disabledFields['browse']   = 'parent,deleted';
$config->workflow->disabledFields['create']   = 'id,parent,createdBy,createdDate,editedBy,editedDate,deleted';
$config->workflow->disabledFields['edit']     = 'id,parent,createdBy,createdDate,editedBy,editedDate,deleted';
$config->workflow->disabledFields['custom']   = 'id,parent,createdBy,createdDate,editedBy,editedDate,deleted';
$config->workflow->disabledFields['children'] = 'id,parent,createdBy,createdDate,editedBy,editedDate,deleted,actions,files';

$config->workflow->defaultIndexes = 'PRIMARY KEY `id` (`id`)';

$config->workflow->defaultActions = array('browse', 'create', 'edit', 'view', 'delete');

$config->workflow->defaultPositions['browse'] = 'menu';
$config->workflow->defaultPositions['create'] = 'menu';
$config->workflow->defaultPositions['edit']   = 'browseandview';
$config->workflow->defaultPositions['view']   = 'browse';
$config->workflow->defaultPositions['delete'] = 'browseandview';

$config->workflowfield = new stdclass();
$config->workflowfield->require = new stdclass();
$config->workflowfield->require->create = 'name, field, module, control';
$config->workflowfield->require->edit   = 'name, field, control';

$config->workflowfield->controlTypeList = array();
$config->workflowfield->controlTypeList['label']    = 'varchar(200)';
$config->workflowfield->controlTypeList['input']    = 'varchar(200)';
$config->workflowfield->controlTypeList['textarea'] = 'text';
$config->workflowfield->controlTypeList['date']     = 'date';
$config->workflowfield->controlTypeList['datetime'] = 'datetime';
$config->workflowfield->controlTypeList['select']   = 'varchar(200)';
$config->workflowfield->controlTypeList['radio']    = 'varchar(200)';
$config->workflowfield->controlTypeList['checkbox'] = 'varchar(200)';

$config->workflowfield->lengthList[10]  = ',date,';
$config->workflowfield->lengthList[19]  = ',datetime,';
$config->workflowfield->lengthList[200] = ',input,select,radio,checkbox,';

$config->workflowaction = new stdclass();
$config->workflowaction->uniqueFields = 'action, name';

$config->workflowresult = new stdclass();
$config->workflowresult->tables['order']     = TABLE_ORDER;
$config->workflowresult->tables['contract']  = TABLE_CONTRACT;
$config->workflowresult->tables['customer']  = TABLE_CUSTOMER;
$config->workflowresult->tables['provider']  = TABLE_CUSTOMER;
$config->workflowresult->tables['contact']   = TABLE_CONTACT;
$config->workflowresult->tables['user']      = TABLE_USER;
$config->workflowresult->tables['product']   = TABLE_PRODUCT;
$config->workflowresult->tables['project']   = TABLE_PROJECT;
$config->workflowresult->tables['task']      = TABLE_TASK;
$config->workflowresult->tables['todo']      = TABLE_TODO;
$config->workflowresult->tables['article']   = TABLE_ARTICLE;
$config->workflowresult->tables['doc']       = TABLE_DOC;
$config->workflowresult->tables['doclib']    = TABLE_DOCLIB;
$config->workflowresult->tables['refund']    = TABLE_REFUND;
$config->workflowresult->tables['announce']  = TABLE_ARTICLE;
$config->workflowresult->tables['holiday']   = TABLE_HOLIDAY;
$config->workflowresult->tables['attend']    = TABLE_ATTEND;
$config->workflowresult->tables['leave']     = TABLE_LEAVE;
$config->workflowresult->tables['lieu']      = TABLE_LIEU;
$config->workflowresult->tables['overtime']  = TABLE_OVERTIME;
$config->workflowresult->tables['trip']      = TABLE_TRIP;
$config->workflowresult->tables['depositor'] = TABLE_DEPOSITOR;
$config->workflowresult->tables['balance']   = TABLE_BALANCE;
$config->workflowresult->tables['trade']     = TABLE_TRADE;
$config->workflowresult->tables['thread']    = TABLE_THREAD;
$config->workflowresult->tables['reply']     = TABLE_REPLY;

$config->workflowresult->apps['order']     = 'crm'; 
$config->workflowresult->apps['contract']  = 'crm'; 
$config->workflowresult->apps['customer']  = 'crm'; 
$config->workflowresult->apps['provider']  = 'cash'; 
$config->workflowresult->apps['contact']   = 'crm'; 
$config->workflowresult->apps['product']   = 'crm';
$config->workflowresult->apps['user']      = 'sys'; 
$config->workflowresult->apps['project']   = 'oa';
$config->workflowresult->apps['task']      = 'sys';
$config->workflowresult->apps['todo']      = 'sys';
$config->workflowresult->apps['article']   = 'sys';
$config->workflowresult->apps['doc']       = 'oa';
$config->workflowresult->apps['doclib']    = 'oa';
$config->workflowresult->apps['refund']    = 'oa';
$config->workflowresult->apps['announce']  = 'oa';
$config->workflowresult->apps['holiday']   = 'oa';
$config->workflowresult->apps['attend']    = 'oa';
$config->workflowresult->apps['leave']     = 'oa';
$config->workflowresult->apps['lieu']      = 'oa';
$config->workflowresult->apps['overtime']  = 'oa';
$config->workflowresult->apps['trip']      = 'oa';
$config->workflowresult->apps['depositor'] = 'cash';
$config->workflowresult->apps['balance']   = 'cash';
$config->workflowresult->apps['trade']     = 'cash';
$config->workflowresult->apps['thread']    = 'team';
$config->workflowresult->apps['reply']     = 'team';

$config->workflowdatasource = new stdclass();
$config->workflowdatasource->exclude['app'] = array('flow');
$config->workflowdatasource->exclude['crm'] = array('leads');
$config->workflowdatasource->exclude['sys'] = array('webapp', 'api', 'flow', 'sso', 'company', 'tag', 'upgrade', 'mail', 'admin', 'backup', 'install', 'cron', 'schema', 'my', 'report', 'package', 'search', 'ldap', 'attach', 'chat');

$config->workflowdatasource->langAppList['productStatus']   = 'sys';
$config->workflowdatasource->langAppList['customerType']    = 'sys';
$config->workflowdatasource->langAppList['customerSize']    = 'sys';
$config->workflowdatasource->langAppList['customerLevel']   = 'sys';
$config->workflowdatasource->langAppList['customerStatus']  = 'sys';
$config->workflowdatasource->langAppList['role']            = 'sys';

$config->workflowdatasource->langModuleList['productStatus']  = 'product';
$config->workflowdatasource->langModuleList['customerType']   = 'customer';
$config->workflowdatasource->langModuleList['customerSize']   = 'customer';
$config->workflowdatasource->langModuleList['customerLevel']  = 'customer';
$config->workflowdatasource->langModuleList['customerStatus'] = 'customer';
$config->workflowdatasource->langModuleList['role']           = 'user';

$config->workflowdatasource->langFieldList['productStatus']  = 'statusList';
$config->workflowdatasource->langFieldList['customerType']   = 'typeList';
$config->workflowdatasource->langFieldList['customerSize']   = 'sizeNameList';
$config->workflowdatasource->langFieldList['customerLevel']  = 'levelNameList';
$config->workflowdatasource->langFieldList['customerStatus'] = 'statusList';
$config->workflowdatasource->langFieldList['role']           = 'roleList';

$config->workflowmenu = new stdclass();
$config->workflowmenu->defaultParams['all']['field'][]    = 'deleted';
$config->workflowmenu->defaultParams['all']['operator'][] = 'equal';
$config->workflowmenu->defaultParams['all']['value'][]    = '0';
