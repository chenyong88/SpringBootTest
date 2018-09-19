<?php
if(!isset($lang->workflow)) $lang->workflow = new stdclass();
$lang->workflow->common       = 'Flow';
$lang->workflow->browse       = 'Browse';
$lang->workflow->create       = 'Create';
$lang->workflow->edit         = 'Edit';
$lang->workflow->view         = 'View';
$lang->workflow->delete       = 'Delete';
$lang->workflow->backup       = 'Backup';
$lang->workflow->setSubModule = 'Set Sub Flow';

$lang->workflow->id           = 'ID';
$lang->workflow->app          = 'App';
$lang->workflow->module       = 'Module';
$lang->workflow->name         = 'Name';
$lang->workflow->order        = 'Order';
$lang->workflow->desc         = 'Description';
$lang->workflow->version      = 'Version';
$lang->workflow->createdBy    = 'Created By';
$lang->workflow->createdDate  = 'Created Date';
$lang->workflow->editedBy     = 'Edited By';
$lang->workflow->editedDate   = 'Edited Date';
$lang->workflow->width        = 'Width';
$lang->workflow->position     = 'Position';
$lang->workflow->order        = 'Order';
$lang->workflow->defaultValue = 'Default';
$lang->workflow->show         = 'Show';
$lang->workflow->hide         = 'Hide';
$lang->workflow->mobile       = 'Mobile Web';
$lang->workflow->custom       = 'Userdefined';
$lang->workflow->subModule    = 'Sub Flow';
$lang->workflow->subTables    = 'Sub Tables';
$lang->workflow->modules      = 'Flow';
$lang->workflow->users        = 'Users';
$lang->workflow->groups       = 'Groups';
$lang->workflow->total        = 'Total';

$lang->workflow->upgrade = new stdclass();
$lang->workflow->upgrade->common         = 'Upgrade';
$lang->workflow->upgrade->backup         = 'Backup';
$lang->workflow->upgrade->backupSuccess  = 'Upgrade Success';
$lang->workflow->upgrade->newVersion     = 'Get a new version.';
$lang->workflow->upgrade->clickme        = 'Click to Upgrade';
$lang->workflow->upgrade->start          = 'Start';
$lang->workflow->upgrade->currentVersion = 'Current Version';
$lang->workflow->upgrade->selectVersion  = 'New Version';
$lang->workflow->upgrade->confirm        = 'Confirm Upgrade SQL';
$lang->workflow->upgrade->upgrade        = 'Upgrade Current Module';
$lang->workflow->upgrade->upgradeFail    = 'Upgrade Fail';
$lang->workflow->upgrade->upgradeSuccess = 'Upgrade Success';
$lang->workflow->upgrade->install        = 'Install New Module';
$lang->workflow->upgrade->installFail    = 'Install Fail';
$lang->workflow->upgrade->installSuccess = 'Install Success';

$lang->workflow->browseTable = 'Browse Tables';
$lang->workflow->createTable = 'Create Table';
$lang->workflow->editTable   = 'Edit Table';
$lang->workflow->viewTable   = 'View Table';
$lang->workflow->deleteTable = 'Delete Table';

$lang->workflowtable = new stdclass();
$lang->workflowtable->common = 'Sub Tables';
$lang->workflowtable->name   = 'Name';

$lang->workflowtable->edit   = 'Edit Table';
$lang->workflowtable->delete = 'Delete Table';

/* Field */
$lang->workflow->adminField  = 'Browse Fields';
$lang->workflow->createField = 'Create Field';
$lang->workflow->editField   = 'Edit Field';
$lang->workflow->deleteField = 'Delete Field';
$lang->workflow->exportField = 'Export Settings';

$lang->workflowfield = new stdclass();
$lang->workflowfield->common       = 'Field';
$lang->workflowfield->name         = 'Name';
$lang->workflowfield->field        = 'Field';
$lang->workflowfield->type         = 'Type';
$lang->workflowfield->length       = 'Length';
$lang->workflowfield->options      = 'Options';
$lang->workflowfield->control      = 'Control';
$lang->workflowfield->default      = 'Default';
$lang->workflowfield->rules        = 'Rules';
$lang->workflowfield->desc         = 'Description';
$lang->workflowfield->placeholder  = 'Placeholder';
$lang->workflowfield->position     = 'Position';
$lang->workflowfield->dataSource   = 'DataSource';
$lang->workflowfield->sql          = 'SQL';
$lang->workflowfield->vars         = 'Vars';
$lang->workflowfield->addVar       = 'Add Var';
$lang->workflowfield->varName      = 'Var Name';
$lang->workflowfield->showName     = 'Show Name';
$lang->workflowfield->requestType  = 'Control';
$lang->workflowfield->optionValue  = 'Code of options, it should be english or digital.';
$lang->workflowfield->optionText   = 'Description of options.';
$lang->workflowfield->canExport    = 'Can Export';
$lang->workflowfield->canSearch    = 'Can Search';
$lang->workflowfield->foreignKey   = 'Foreign Key';
$lang->workflowfield->isForeignKey = 'Is Foreign Key';
$lang->workflowfield->isKeyValue   = 'Key-Value';

$lang->workflowfield->typeGroup['number'] = 'Numbers';
$lang->workflowfield->typeGroup['date']   = 'Date and Time';
$lang->workflowfield->typeGroup['string'] = 'Strings';

$lang->workflowfield->typeList['number']['tinyint']   = 'tinyint';
$lang->workflowfield->typeList['number']['smallint']  = 'smallint';
$lang->workflowfield->typeList['number']['mediumint'] = 'mediumint';
$lang->workflowfield->typeList['number']['int']       = 'int';
$lang->workflowfield->typeList['number']['decimal']   = 'decimal';
$lang->workflowfield->typeList['number']['float']     = 'float';
$lang->workflowfield->typeList['number']['double']    = 'double';

$lang->workflowfield->typeList['date']['date']      = 'date';
$lang->workflowfield->typeList['date']['datetime']  = 'datetime';
$lang->workflowfield->typeList['date']['timestamp'] = 'timestamp';

$lang->workflowfield->typeList['string']['char']    = 'char';
$lang->workflowfield->typeList['string']['varchar'] = 'varchar';
$lang->workflowfield->typeList['string']['text']    = 'text';

$lang->workflowfield->exportList[1] = 'Yes';
$lang->workflowfield->exportList[0] = 'No';

$lang->workflowfield->searchList[1] = 'Yes';
$lang->workflowfield->searchList[0] = 'No';

$lang->workflowfield->foreignKeyList[1] = 'Yes';
$lang->workflowfield->foreignKeyList[0] = 'No';

$lang->workflowfield->keyValueList['key']   = 'Key';
$lang->workflowfield->keyValueList['value'] = 'Value';

$lang->workflowfield->uniqueList[0] = 'No';
$lang->workflowfield->uniqueList[1] = 'Yes';

$lang->workflowfield->controlTypeList['label']    = 'Label';
$lang->workflowfield->controlTypeList['input']    = 'Text';
$lang->workflowfield->controlTypeList['textarea'] = 'Richtext';
$lang->workflowfield->controlTypeList['date']     = 'Date';
$lang->workflowfield->controlTypeList['datetime'] = 'Time';
$lang->workflowfield->controlTypeList['select']   = 'Dropdown Menu';
$lang->workflowfield->controlTypeList['radio']    = 'Radio';
$lang->workflowfield->controlTypeList['checkbox'] = 'Checkbox';

$lang->workflowfield->optionTypeList['user']      = 'User';
$lang->workflowfield->optionTypeList['dept']      = 'Dept';
$lang->workflowfield->optionTypeList['custom']    = 'Userdefined';
$lang->workflowfield->optionTypeList['sql']       = 'SQL';
$lang->workflowfield->optionTypeList['submodule'] = 'Sub Flow';

$lang->workflowfield->requestTypeList['input']   = 'Text';
$lang->workflowfield->requestTypeList['date']    = 'Date';
$lang->workflowfield->requestTypeList['select']  = 'Dropdown Menu';

$lang->workflowfield->rulesList['notempty'] = 'Required';
$lang->workflowfield->rulesList['date']     = 'Date';
$lang->workflowfield->rulesList['email']    = 'Email';
$lang->workflowfield->rulesList['float']    = 'Number';
$lang->workflowfield->rulesList['phone']    = 'Phone';
$lang->workflowfield->rulesList['ip']       = 'IP';

$lang->workflowfield->positionList['before'] = 'Before';
$lang->workflowfield->positionList['after']  = 'After';

$lang->workflowfield->optionsPlaceholder = 'Seperated by space or comma.';
$lang->workflowfield->lengthNotice       = 'Attention: the change will cause data lose.';
$lang->workflowfield->unique             = 'Field exists.';
$lang->workflowfield->defaultValue       = 'The default length should not exceed %s.';
$lang->workflowfield->textDefaultValue   = 'The text-field has no default value.';
$lang->workflowfield->positionTips       = 'Basic info display right in the page and detail info display left in the page.';

$lang->workflowfield->defaultFields['id']          = 'ID';
$lang->workflowfield->defaultFields['parent']      = 'Parent';
$lang->workflowfield->defaultFields['createdBy']   = 'Created By';
$lang->workflowfield->defaultFields['createdDate'] = 'Created Date';
$lang->workflowfield->defaultFields['editedBy']    = 'Edited By';
$lang->workflowfield->defaultFields['editedDate']  = 'Edited Date';
$lang->workflowfield->defaultFields['deleted']     = 'Deleted';

$lang->workflowfield->defaultOptions = new stdclass();
$lang->workflowfield->defaultOptions->deleted['0'] = 'Undeleted';
$lang->workflowfield->defaultOptions->deleted['1'] = 'Deleted';

/* Action */
$lang->workflow->adminAction  = 'Browse Actions';
$lang->workflow->createAction = 'Create Action';
$lang->workflow->editAction   = 'Edit Action';
$lang->workflow->viewAction   = 'View Action';
$lang->workflow->deleteAction = 'Delete Action';
$lang->workflow->verification = 'Verify Data';
$lang->workflow->setNotice    = 'Set Notice';

$lang->workflowaction = new stdclass();
$lang->workflowaction->common   = 'Action';
$lang->workflowaction->name     = 'Name';
$lang->workflowaction->action   = 'Action';
$lang->workflowaction->open     = 'Open Way';
$lang->workflowaction->position = 'Position';
$lang->workflowaction->show     = 'Show Way';
$lang->workflowaction->desc     = 'Description';
$lang->workflowaction->toList   = 'Send to';

$lang->workflowaction->openList['normal'] = 'Normal';
$lang->workflowaction->openList['modal']  = 'Modal';
$lang->workflowaction->openList['none']   = 'None';

$lang->workflowaction->positionList['menu']          = 'Menu';
$lang->workflowaction->positionList['browse']        = 'List Page';
$lang->workflowaction->positionList['view']          = 'View Page';
$lang->workflowaction->positionList['browseandview'] = 'Both List and View';

$lang->workflowaction->showList['dropdownlist'] = 'Show in dropdown list';
$lang->workflowaction->showList['direct']       = 'Show on page';

$lang->workflowaction->defaultActions['browse'] = 'Browse';
$lang->workflowaction->defaultActions['create'] = 'Create';
$lang->workflowaction->defaultActions['edit']   = 'Edite';
$lang->workflowaction->defaultActions['view']   = 'View';
$lang->workflowaction->defaultActions['delete'] = 'Delete';

$lang->workflowaction->operatorList['equal']    = '=';
$lang->workflowaction->operatorList['notequal'] = '!=';
$lang->workflowaction->operatorList['gt']       = '>';
$lang->workflowaction->operatorList['ge']       = '>=';
$lang->workflowaction->operatorList['lt']       = '<';
$lang->workflowaction->operatorList['le']       = '<=';

$lang->workflowaction->verification = new stdclass();
$lang->workflowaction->verification->type   = 'Type';
$lang->workflowaction->verification->result = 'Result';

$lang->workflowaction->verification->types['data'] = 'Data';
$lang->workflowaction->verification->types['sql']  = 'SQL';

$lang->workflowaction->verification->sqlResult['empty']    = 'Pass validation when result is empty or zero.';
$lang->workflowaction->verification->sqlResult['notempty'] = 'Pass validation when result is not empty and zero.';

/* Condition */
$lang->workflow->adminCondition = 'Conditions';

$lang->workflowaction->condition = new stdclass();
$lang->workflowaction->condition->common   = 'Condition';
$lang->workflowaction->condition->operator = 'Operator';
$lang->workflowaction->condition->param    = 'Param';

$lang->workflowaction->condition->sqlResult['empty']    = 'Execute action when result is empty or zero.';
$lang->workflowaction->condition->sqlResult['notempty'] = 'Execute action when result is not empty and zero.';

/* Layout */
$lang->workflow->adminLayout = 'Layouts';

$lang->workflowaction->layout = new stdclass();
$lang->workflowaction->layout->common  = 'Layout';
$lang->workflowaction->layout->require = 'Required';
$lang->workflowaction->layout->disable = 'Disabled';

$lang->workflowaction->layout->positionList['browse']['left']   = 'Align-Left';
$lang->workflowaction->layout->positionList['browse']['center'] = 'Align-Center';
$lang->workflowaction->layout->positionList['browse']['right']  = 'Align-Right';

$lang->workflowaction->layout->positionList['view']['basic'] = 'Basic Info';
$lang->workflowaction->layout->positionList['view']['info']  = 'Detail';

$lang->workflowaction->layout->defaultUser['currentUser'] = 'Current User';
$lang->workflowaction->layout->defaultUser['deptManager'] = 'Dept Manager';
$lang->workflowaction->layout->defaultDept['currentDept'] = 'Current Dept';
$lang->workflowaction->layout->defaultTime['currentTime'] = 'Current Time';

$lang->workflowaction->layout->mobileList[1] = 'Display';
$lang->workflowaction->layout->mobileList[0] = 'Hide';

$lang->workflowaction->layout->totalList[1] = 'Display';
$lang->workflowaction->layout->totalList[0] = 'Hide';

/* Result */
$lang->workflow->adminResult  = 'Browse Ext Actions';
$lang->workflow->createResult = 'Create Ext Action';
$lang->workflow->editResult   = 'Edit Ext Action';
$lang->workflow->deleteResult = 'Delete Ext Action';

$lang->workflowaction->result = new stdclass();
$lang->workflowaction->result->common          = 'Ext Action';
$lang->workflowaction->result->table           = 'Table';
$lang->workflowaction->result->value           = 'Value';
$lang->workflowaction->result->where           = 'Where';
$lang->workflowaction->result->conditionType   = 'Condition Type';
$lang->workflowaction->result->conditionResult = 'Condition Result';
$lang->workflowaction->result->message         = 'Message';

$lang->workflowaction->result->conditionTypes['data'] = 'Data as condition';
$lang->workflowaction->result->conditionTypes['sql']  = 'SQL as condition';

$lang->workflowaction->result->sqlResult['empty']    = 'Execute ext action when result is empty or zero.';
$lang->workflowaction->result->sqlResult['notempty'] = 'Execute ext action when result is not empty and zero.';

$lang->workflowaction->result->logicalOperators['and'] = 'And';
$lang->workflowaction->result->logicalOperators['or']  = 'Or';

$lang->workflowaction->result->options['user']        = 'User';
$lang->workflowaction->result->options['dept']        = 'Dept';
$lang->workflowaction->result->options['deptManager'] = 'Dept Manager';
$lang->workflowaction->result->options['today']       = 'Act Date';
$lang->workflowaction->result->options['now']         = 'Act Time';
$lang->workflowaction->result->options['actor']       = 'Actor';
$lang->workflowaction->result->options['form']        = 'Form Data';
$lang->workflowaction->result->options['record']      = 'Record Data';
$lang->workflowaction->result->options['custom']      = 'Userdefined';

$lang->workflowaction->result->actions['insert'] = 'Insert';
$lang->workflowaction->result->actions['update'] = 'Update';
$lang->workflowaction->result->actions['delete'] = 'Delete';

$lang->workflowaction->result->tables['order']     = 'Order';
$lang->workflowaction->result->tables['contract']  = 'Contract';
$lang->workflowaction->result->tables['customer']  = 'Customer';
$lang->workflowaction->result->tables['provider']  = 'Provider';
$lang->workflowaction->result->tables['contact']   = 'Contact';
$lang->workflowaction->result->tables['product']   = 'Product';
$lang->workflowaction->result->tables['user']      = 'User';
$lang->workflowaction->result->tables['project']   = 'Project';
$lang->workflowaction->result->tables['task']      = 'Task';
$lang->workflowaction->result->tables['todo']      = 'Todo';
$lang->workflowaction->result->tables['article']   = 'Article';
$lang->workflowaction->result->tables['doc']       = 'Document';
$lang->workflowaction->result->tables['doclib']    = 'Document Library';
$lang->workflowaction->result->tables['refund']    = 'Refund';
$lang->workflowaction->result->tables['announce']  = 'Announce';
$lang->workflowaction->result->tables['holiday']   = 'Holiday';
$lang->workflowaction->result->tables['attend']    = 'Attend';
$lang->workflowaction->result->tables['leave']     = 'Leave';
$lang->workflowaction->result->tables['lieu']      = 'Lieu';
$lang->workflowaction->result->tables['overtime']  = 'Overtime';
$lang->workflowaction->result->tables['trip']      = 'Trip';
$lang->workflowaction->result->tables['depositor'] = 'Depositor';
$lang->workflowaction->result->tables['trade']     = 'Trade';
$lang->workflowaction->result->tables['balance']   = 'Balance';
$lang->workflowaction->result->tables['thread']    = 'Thread';
$lang->workflowaction->result->tables['reply']     = 'Reply';

$lang->workflowmenu = new stdclass();
$lang->workflowmenu->common = 'Label';
$lang->workflowmenu->label  = 'Label';
$lang->workflowmenu->params = 'Params';

$lang->workflowmenu->default['all'] = 'All';

$lang->workflow->adminDatasource  = 'Browse Datasource';
$lang->workflow->createDatasource = 'Create Datasource';
$lang->workflow->editDatasource   = 'Edit Datasource';
$lang->workflow->viewDatasource   = 'View Datasource';
$lang->workflow->deleteDatasource = 'Delete Datasource';

$lang->workflowdatasource = new stdclass();
$lang->workflowdatasource->common      = 'Datasource';
$lang->workflowdatasource->type        = 'Type';
$lang->workflowdatasource->name        = 'Name';
$lang->workflowdatasource->datasource  = 'Datasource';
$lang->workflowdatasource->optionValue = 'Code of options, it should be english or digital.';
$lang->workflowdatasource->optionText  = 'Description of options.';
$lang->workflowdatasource->app         = 'App';
$lang->workflowdatasource->module      = 'Module';
$lang->workflowdatasource->method      = 'Method';
$lang->workflowdatasource->param       = 'Param';
$lang->workflowdatasource->paramType   = 'Type';
$lang->workflowdatasource->paramValue  = 'Value';
$lang->workflowdatasource->sql         = 'SQL';

$lang->workflowdatasource->typeList['system'] = 'System Function';
$lang->workflowdatasource->typeList['sql']    = 'SQL';
//$lang->workflowdatasource->typeList['func']   = 'Function';
$lang->workflowdatasource->typeList['option'] = 'Options';
$lang->workflowdatasource->typeList['lang']   = 'System Lang';

$lang->workflowdatasource->langList['productStatus']  = 'Product Status';
$lang->workflowdatasource->langList['productLine']    = 'Product Line';
$lang->workflowdatasource->langList['customerType']   = 'Customer Type';
$lang->workflowdatasource->langList['customerSize']   = 'Customer Size';
$lang->workflowdatasource->langList['customerLevel']  = 'Customer Level';
$lang->workflowdatasource->langList['customerStatus'] = 'Customer Status';
$lang->workflowdatasource->langList['currency']       = 'Currency';
$lang->workflowdatasource->langList['role']           = 'Role';

$lang->workflow->adminRule  = 'Browse Rule';
$lang->workflow->createRule = 'Create Rule';
$lang->workflow->editRule   = 'Edit Rule';
$lang->workflow->viewRule   = 'View Rule';
$lang->workflow->deleteRule = 'Delete Rule';

$lang->workflowrule = new stdclass();
$lang->workflowrule->common = 'Rule';
$lang->workflowrule->type   = 'Type';
$lang->workflowrule->name   = 'Name';
$lang->workflowrule->rule   = 'Rule';

$lang->workflowrule->typeList['system'] = 'System Function';
$lang->workflowrule->typeList['regex']  = 'Regular Expression';
$lang->workflowrule->typeList['func']   = 'Function';

$lang->workflow->adminModuleMenu  = 'Browse Menu';
$lang->workflow->createModuleMenu = 'Create Menu';
$lang->workflow->editModuleMenu   = 'Edit Menu';
$lang->workflow->deleteModuleMenu = 'Delete Menu';

/* Title */
$lang->workflow->title = new stdclass();
$lang->workflow->title->subModule = 'This flow is a sub flow of others, can not set sub flow for itself.';

/* Tips */
$lang->workflow->tips = new stdclass();
$lang->workflow->tips->subModule      = '<strong>Sub flow</strong> is displayed in the secondary menu under the parent flow, after the menu of parent flow.';
$lang->workflow->tips->keyValue       = '<strong>Key-Value Pairs</strong> is used as the actual value and the display value when the flow data is called by other flows.<br /><strong>Key</strong> can be set only one, and the field set to Key must set a unique rule, id is used as the Key by default.<br /><strong>Values</strong> can have more than one, and multiple values will be spliced together to display.';
$lang->workflow->tips->foreignKey     = '<strong>Foreign key</strong> used to display data associated with the sub flow, the foreign key can only have one. Fields set as foreign keys should use drop-down menus or radio buttons as controls. If the field control set to foreign key is not a drop-down menu or radio button, the system will default to update the control as a drop-down menu and select the data source as subflow.';
$lang->workflow->tips->actionPosition = 'The action will dock on right of the module menu if the show way is menu, dock on right of each record in table if the show way is list page, dock on the bottom of detail view if the show way is view page.';
$lang->workflow->tips->actionShow     = 'If there are lots of actions you can put the unusual used action into dropdown list. Otheswise display them in the list page.';
$lang->workflow->tips->table          = 'Sub tables used to record details of %s.';
$lang->workflow->tips->notice         = 'Send notice to selected users.';

/* Placeholder */
$lang->workflow->placeholder = new stdclass();
$lang->workflow->placeholder->code      = 'Should be english.';
$lang->workflow->placeholder->module    = 'Should be english, can not be changed after saved.';
$lang->workflow->placeholder->sql       = 'Direct write a SQL query. Only the query opration is allowed. Other SQL operations are prohibited. The query result is key-value pairs。The 1st field of query will be the key of result and the 2nd one be the value, other fields will be ignored. If there is only one field it will be the key and the value';
$lang->workflow->placeholder->options   = "Method should return proper key-value pairs, or the data won't display.";
$lang->workflow->placeholder->resultSql = 'Direct write a SQL query. Only the query opration is allowed.';
$lang->workflow->placeholder->verify    = 'The message to show when verify failed.';

/* Error */
$lang->workflow->error = new stdclass();
$lang->workflow->error->createTableFail   = 'Failed to create table.';
$lang->workflow->error->renameTableFail   = 'Failed to rename table.';
$lang->workflow->error->buildInModule     = 'The module can no be same as the system built-in module.';
$lang->workflow->error->notFound          = 'Not found.';
$lang->workflow->error->emptyOptions      = 'Empty code and description.';
$lang->workflow->error->emptyParams       = 'Empty params.';
$lang->workflow->error->wrongCode         = '<strong> %s </strong> should be english.';
$lang->workflow->error->wrongParams       = 'Wrong params.';
$lang->workflow->error->wrongSQL          = 'The SQL is wrong! Error: ';
$lang->workflow->error->wrongRegex        = 'The RegEx is wrong! Error: ';
$lang->workflow->error->notunique         = 'Muse set a unique rule.';
$lang->workflow->error->wrongDecimal      = "<strong>Length</strong>'s format is <strong>(M,D)，M(0~65)，D(0~30)，M >= D</strong><br />";
$lang->workflow->error->wrongChar         = '<strong>Length</strong> should be 0~255';
$lang->workflow->error->wrongVarchar      = '<strong>Length</strong> should be 0~21844';
$lang->workflow->error->selectVersion     = 'Select a version';
$lang->workflow->error->mobileShow        = 'There are up to 5 fields on web list page.';
$lang->workflow->error->emptyLayoutFields = "Go [{$lang->workflow->common}] => [%s] => [{$lang->workflowaction->common}] => [%s] => [{$lang->workflowaction->layout->common}] to set fields to display.";
$lang->workflow->error->emptyCustomFields = "Go [{$lang->workflow->common}] => [%s] => [{$lang->workflowfield->common}] to add fields.";
