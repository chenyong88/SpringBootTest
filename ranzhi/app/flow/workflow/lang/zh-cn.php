<?php
if(!isset($lang->workflow)) $lang->workflow = new stdclass();
$lang->workflow->common       = '流程';
$lang->workflow->browse       = '流程列表';
$lang->workflow->create       = '新增流程';
$lang->workflow->edit         = '编辑流程';
$lang->workflow->view         = '流程详情';
$lang->workflow->delete       = '删除流程';
$lang->workflow->backup       = '备份';
$lang->workflow->setSubModule = '设置子流程';

$lang->workflow->id            = '编号';
$lang->workflow->app           = '所属应用';
$lang->workflow->module        = '代号';
$lang->workflow->name          = '流程名';
$lang->workflow->order         = '顺序';
$lang->workflow->desc          = '描述';
$lang->workflow->version       = '版本';
$lang->workflow->createdBy     = '由谁创建';
$lang->workflow->createdDate   = '创建时间';
$lang->workflow->editedBy      = '由谁编辑';
$lang->workflow->editedDate    = '编辑时间';
$lang->workflow->width         = '宽度';
$lang->workflow->position      = '位置';
$lang->workflow->order         = '排序';
$lang->workflow->defaultValue  = '默认显示值';
$lang->workflow->show          = '显示';
$lang->workflow->hide          = '隐藏';
$lang->workflow->mobile        = '移动页面';
$lang->workflow->custom        = '自定义';
$lang->workflow->subModule     = '子流程';
$lang->workflow->subTables     = '明细表';
$lang->workflow->modules       = '流程';
$lang->workflow->users         = '授权用户';
$lang->workflow->groups        = '授权分组';
$lang->workflow->total         = '合计';

$lang->workflow->upgrade = new stdclass();
$lang->workflow->upgrade->common         = '升级';
$lang->workflow->upgrade->backup         = '备份';
$lang->workflow->upgrade->backupSuccess  = '备份成功';
$lang->workflow->upgrade->newVersion     = '发现新版本！';
$lang->workflow->upgrade->clickme        = '点击升级';
$lang->workflow->upgrade->start          = '开始升级';
$lang->workflow->upgrade->currentVersion = '当前版本';
$lang->workflow->upgrade->selectVersion  = '选择版本';
$lang->workflow->upgrade->confirm        = '确认要执行的SQL语句';
$lang->workflow->upgrade->upgrade        = '升级现有模块';
$lang->workflow->upgrade->upgradeFail    = '升级失败';
$lang->workflow->upgrade->upgradeSuccess = '升级成功';
$lang->workflow->upgrade->install        = '安装一个新模块';
$lang->workflow->upgrade->installFail    = '安装失败';
$lang->workflow->upgrade->installSuccess = '安装成功';

$lang->workflow->browseTable = '浏览表';
$lang->workflow->createTable = '新增表';
$lang->workflow->editTable   = '编辑表';
$lang->workflow->viewTable   = '表详情';
$lang->workflow->deleteTable = '删除表';

$lang->workflowtable = new stdclass();
$lang->workflowtable->common = '明细表';
$lang->workflowtable->name   = '表名';

$lang->workflowtable->edit   = '编辑表';
$lang->workflowtable->delete = '删除表';

/* Field */
$lang->workflow->adminField  = '字段列表';
$lang->workflow->createField = '添加字段';
$lang->workflow->editField   = '编辑字段';
$lang->workflow->deleteField = '删除字段';
$lang->workflow->exportField = '导出设置';

$lang->workflowfield = new stdclass();
$lang->workflowfield->common       = '字段';
$lang->workflowfield->name         = '名称';
$lang->workflowfield->field        = '字段';
$lang->workflowfield->type         = '类型';
$lang->workflowfield->length       = '长度';
$lang->workflowfield->options      = '选项';
$lang->workflowfield->control      = '控件';
$lang->workflowfield->default      = '默认值';
$lang->workflowfield->rules        = '验证规则';
$lang->workflowfield->desc         = '描述';
$lang->workflowfield->placeholder  = '提示文字';
$lang->workflowfield->position     = '位于';
$lang->workflowfield->dataSource   = '数据源';
$lang->workflowfield->sql          = 'SQL';
$lang->workflowfield->vars         = '变量';
$lang->workflowfield->addVar       = '添加变量';
$lang->workflowfield->varName      = '变量名称';
$lang->workflowfield->showName     = '显示名称';
$lang->workflowfield->requestType  = '输入方式';
$lang->workflowfield->optionValue  = '选项的代码，字母和数字的组合';
$lang->workflowfield->optionText   = '选项的文字说明';
$lang->workflowfield->canExport    = '能否导出';
$lang->workflowfield->canSearch    = '能否检索';
$lang->workflowfield->foreignKey   = '外键';
$lang->workflowfield->isForeignKey = '是否外键';
$lang->workflowfield->isKeyValue   = '是否键值';

$lang->workflowfield->typeGroup['number'] = '数字';
$lang->workflowfield->typeGroup['date']   = '日期时间';
$lang->workflowfield->typeGroup['string'] = '字符串';

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

$lang->workflowfield->exportList[1] = '可以导出';
$lang->workflowfield->exportList[0] = '不能导出';

$lang->workflowfield->searchList[1] = '可以检索';
$lang->workflowfield->searchList[0] = '不能检索';

$lang->workflowfield->foreignKeyList[1] = '是';
$lang->workflowfield->foreignKeyList[0] = '否';

$lang->workflowfield->keyValueList['key']   = '键';
$lang->workflowfield->keyValueList['value'] = '值';

$lang->workflowfield->uniqueList[1] = '是';
$lang->workflowfield->uniqueList[0] = '否';

$lang->workflowfield->controlTypeList['label']    = '标签';
$lang->workflowfield->controlTypeList['input']    = '文本框';
$lang->workflowfield->controlTypeList['textarea'] = '富文本';
$lang->workflowfield->controlTypeList['date']     = '日期';
$lang->workflowfield->controlTypeList['datetime'] = '时间';
$lang->workflowfield->controlTypeList['select']   = '下拉菜单';
$lang->workflowfield->controlTypeList['radio']    = '单选按钮';
$lang->workflowfield->controlTypeList['checkbox'] = '复选框';

$lang->workflowfield->optionTypeList['user']      = '用户';
$lang->workflowfield->optionTypeList['dept']      = '部门';
$lang->workflowfield->optionTypeList['custom']    = '自定义';
$lang->workflowfield->optionTypeList['sql']       = '自定义SQL';
$lang->workflowfield->optionTypeList['submodule'] = '子流程';

$lang->workflowfield->requestTypeList['input']  = '文本框';
$lang->workflowfield->requestTypeList['date']   = '日期';
$lang->workflowfield->requestTypeList['select'] = '下拉菜单';

$lang->workflowfield->rulesList['notempty'] = '必填';
$lang->workflowfield->rulesList['date']     = '日期';
$lang->workflowfield->rulesList['email']    = 'email';
$lang->workflowfield->rulesList['float']    = '数字';
$lang->workflowfield->rulesList['phone']    = '电话';
$lang->workflowfield->rulesList['ip']       = 'IP';

$lang->workflowfield->positionList['before'] = '之前';
$lang->workflowfield->positionList['after']  = '之后';

$lang->workflowfield->optionsPlaceholder = '多个值之间用空格或逗号隔开';
$lang->workflowfield->lengthNotice       = '该类型修改可能会造成数据丢失，请慎重使用！';
$lang->workflowfield->unique             = '选择的模块已有该字段';
$lang->workflowfield->defaultValue       = '默认值的长度不应该超过%s';
$lang->workflowfield->textDefaultValue   = 'text类型字段不能设置默认值';
$lang->workflowfield->positionTips       = '基本信息是右边侧栏位置，详细信息是左侧主栏位置';

$lang->workflowfield->defaultFields['id']          = '编号';
$lang->workflowfield->defaultFields['parent']      = '父流程ID';
$lang->workflowfield->defaultFields['createdBy']   = '由谁创建';
$lang->workflowfield->defaultFields['createdDate'] = '创建日期';
$lang->workflowfield->defaultFields['editedBy']    = '由谁编辑';
$lang->workflowfield->defaultFields['editedDate']  = '编辑日期';
$lang->workflowfield->defaultFields['deleted']     = '是否删除';

$lang->workflowfield->defaultOptions = new stdclass();
$lang->workflowfield->defaultOptions->deleted['0'] = '未删除';
$lang->workflowfield->defaultOptions->deleted['1'] = '已删除';

/* Action */
$lang->workflow->adminAction  = '动作列表';
$lang->workflow->createAction = '添加动作';
$lang->workflow->editAction   = '编辑动作';
$lang->workflow->viewAction   = '动作详情';
$lang->workflow->deleteAction = '删除动作';
$lang->workflow->verification = '数据校验';
$lang->workflow->setNotice    = '设置提醒';

$lang->workflowaction = new stdclass();
$lang->workflowaction->common   = '动作';
$lang->workflowaction->name     = '名称';
$lang->workflowaction->action   = '动作';
$lang->workflowaction->open     = '打开方式';
$lang->workflowaction->position = '显示位置';
$lang->workflowaction->show     = '显示方式';
$lang->workflowaction->desc     = '描述';
$lang->workflowaction->toList   = '发送给';

$lang->workflowaction->openList['normal'] = '普通页面';
$lang->workflowaction->openList['modal']  = '弹窗页面';
$lang->workflowaction->openList['none']   = '无页面';

$lang->workflowaction->positionList['menu']          = '菜单栏';
$lang->workflowaction->positionList['browse']        = '列表页';
$lang->workflowaction->positionList['view']          = '详情页';
$lang->workflowaction->positionList['browseandview'] = '列表页和详情页';

$lang->workflowaction->showList['dropdownlist'] = '显示在下拉菜单中';
$lang->workflowaction->showList['direct']       = '直接显示在页面上';

$lang->workflowaction->defaultActions['browse'] = '浏览列表';
$lang->workflowaction->defaultActions['create'] = '新建';
$lang->workflowaction->defaultActions['edit']   = '编辑';
$lang->workflowaction->defaultActions['view']   = '查看详情';
$lang->workflowaction->defaultActions['delete'] = '删除';

$lang->workflowaction->operatorList['equal']    = '=';
$lang->workflowaction->operatorList['notequal'] = '!=';
$lang->workflowaction->operatorList['gt']       = '>';
$lang->workflowaction->operatorList['ge']       = '>=';
$lang->workflowaction->operatorList['lt']       = '<';
$lang->workflowaction->operatorList['le']       = '<=';

$lang->workflowaction->verification = new stdclass();
$lang->workflowaction->verification->type   = '校验类型';
$lang->workflowaction->verification->result = '校验结果';

$lang->workflowaction->verification->types['data'] = '以数据作为校验方式';
$lang->workflowaction->verification->types['sql']  = '以SQL语句作为校验方式';

$lang->workflowaction->verification->sqlResult['empty']    = '查询结果为空或0时通过校验';
$lang->workflowaction->verification->sqlResult['notempty'] = '查询结果不为空和0时通过校验';

/* Condition */
$lang->workflow->adminCondition = '动作条件';

$lang->workflowaction->condition = new stdclass();
$lang->workflowaction->condition->common   = '触发条件';
$lang->workflowaction->condition->operator = '条件';
$lang->workflowaction->condition->param    = '参数';

$lang->workflowaction->condition->sqlResult['empty']    = '查询结果为空或0时执行动作';
$lang->workflowaction->condition->sqlResult['notempty'] = '查询结果不为空和0时执行动作';

/* Layout */
$lang->workflow->adminLayout = '维护界面';

$lang->workflowaction->layout = new stdclass();
$lang->workflowaction->layout->common  = '界面';
$lang->workflowaction->layout->require = '必选';
$lang->workflowaction->layout->disable = '不可选';

$lang->workflowaction->layout->positionList['browse']['left']   = '居左';
$lang->workflowaction->layout->positionList['browse']['center'] = '居中';
$lang->workflowaction->layout->positionList['browse']['right']  = '居右';

$lang->workflowaction->layout->positionList['view']['basic'] = '基本信息';
$lang->workflowaction->layout->positionList['view']['info']  = '详细信息';

$lang->workflowaction->layout->defaultUser['currentUser'] = '当前用户';
$lang->workflowaction->layout->defaultUser['deptManager'] = '部门经理';
$lang->workflowaction->layout->defaultDept['currentDept'] = '当前部门';
$lang->workflowaction->layout->defaultTime['currentTime'] = '当前时间';

$lang->workflowaction->layout->mobileList[1] = '显示';
$lang->workflowaction->layout->mobileList[0] = '不显示';

$lang->workflowaction->layout->totalList[1] = '显示';
$lang->workflowaction->layout->totalList[0] = '不显示';

/* Result */
$lang->workflow->adminResult  = '扩展动作列表';
$lang->workflow->createResult = '添加扩展动作';
$lang->workflow->editResult   = '编辑扩展动作';
$lang->workflow->deleteResult = '删除扩展动作';

$lang->workflowaction->result = new stdclass();
$lang->workflowaction->result->common          = '扩展动作';
$lang->workflowaction->result->table           = '表';
$lang->workflowaction->result->value           = '值';
$lang->workflowaction->result->where           = 'where';
$lang->workflowaction->result->conditionType   = '条件类型';
$lang->workflowaction->result->conditionResult = '条件结果';
$lang->workflowaction->result->message         = '提示信息';

$lang->workflowaction->result->conditionTypes['data'] = '以数据作为触发条件';
$lang->workflowaction->result->conditionTypes['sql']  = '以SQL语句作为触发条件';

$lang->workflowaction->result->sqlResult['empty']    = '查询结果为空或0时执行扩展动作';
$lang->workflowaction->result->sqlResult['notempty'] = '查询结果不为空和0时执行扩展动作';

$lang->workflowaction->result->logicalOperators['and'] = '并且';
$lang->workflowaction->result->logicalOperators['or']  = '或者';

$lang->workflowaction->result->options['user']        = '用户';
$lang->workflowaction->result->options['dept']        = '部门';
$lang->workflowaction->result->options['deptManager'] = '部门经理';
$lang->workflowaction->result->options['today']       = '操作日期';
$lang->workflowaction->result->options['now']         = '操作时间';
$lang->workflowaction->result->options['actor']       = '操作人';
$lang->workflowaction->result->options['form']        = '表单数据';
$lang->workflowaction->result->options['record']      = '当前数据';
$lang->workflowaction->result->options['custom']      = '自定义';

$lang->workflowaction->result->actions['insert'] = '新增';
$lang->workflowaction->result->actions['update'] = '修改';
$lang->workflowaction->result->actions['delete'] = '删除';

$lang->workflowaction->result->tables['order']     = '订单';
$lang->workflowaction->result->tables['contract']  = '合同';
$lang->workflowaction->result->tables['customer']  = '客户';
$lang->workflowaction->result->tables['provider']  = '供应商';
$lang->workflowaction->result->tables['contact']   = '联系人';
$lang->workflowaction->result->tables['product']   = '产品';
$lang->workflowaction->result->tables['user']      = '用户';
$lang->workflowaction->result->tables['project']   = '项目';
$lang->workflowaction->result->tables['task']      = '任务';
$lang->workflowaction->result->tables['todo']      = '待办';
$lang->workflowaction->result->tables['article']   = '博客';
$lang->workflowaction->result->tables['doc']       = '文档';
$lang->workflowaction->result->tables['doclib']    = '文档库';
$lang->workflowaction->result->tables['refund']    = '报销';
$lang->workflowaction->result->tables['announce']  = '公告';
$lang->workflowaction->result->tables['holiday']   = '假期';
$lang->workflowaction->result->tables['attend']    = '考勤';
$lang->workflowaction->result->tables['leave']     = '请假';
$lang->workflowaction->result->tables['lieu']      = '调休';
$lang->workflowaction->result->tables['overtime']  = '加班';
$lang->workflowaction->result->tables['trip']      = '出差';
$lang->workflowaction->result->tables['depositor'] = '账户';
$lang->workflowaction->result->tables['trade']     = '账目';
$lang->workflowaction->result->tables['balance']   = '余额';
$lang->workflowaction->result->tables['thread']    = '帖子';
$lang->workflowaction->result->tables['reply']     = '回帖';

$lang->workflowmenu = new stdclass();
$lang->workflowmenu->common = '列表标签';
$lang->workflowmenu->label  = '标签';
$lang->workflowmenu->params = '参数';

$lang->workflowmenu->default['all'] = '所有';

$lang->workflow->adminDatasource  = '浏览数据源';
$lang->workflow->createDatasource = '添加数据源';
$lang->workflow->editDatasource   = '编辑数据源';
$lang->workflow->viewDatasource   = '数据源详情';
$lang->workflow->deleteDatasource = '删除数据源';

$lang->workflowdatasource = new stdclass();
$lang->workflowdatasource->common      = '数据源';
$lang->workflowdatasource->type        = '类别';
$lang->workflowdatasource->name        = '名称';
$lang->workflowdatasource->datasource  = '数据源';
$lang->workflowdatasource->optionValue = '选项的代码，字母和数字的组合';
$lang->workflowdatasource->optionText  = '选项的文字说明';
$lang->workflowdatasource->app         = '所属应用';
$lang->workflowdatasource->module      = '所属模块';
$lang->workflowdatasource->method      = '方法';
$lang->workflowdatasource->param       = '参数';
$lang->workflowdatasource->paramType   = '类型';
$lang->workflowdatasource->paramValue  = '值';
$lang->workflowdatasource->sql         = 'SQL语句';

$lang->workflowdatasource->typeList['system'] = '系统函数';
$lang->workflowdatasource->typeList['sql']    = '自定义SQL';
//$lang->workflowdatasource->typeList['func']   = '自定义函数';
$lang->workflowdatasource->typeList['option'] = '选项列表';
$lang->workflowdatasource->typeList['lang']   = '系统语言';

$lang->workflowdatasource->langList['productStatus']  = '产品状态';
$lang->workflowdatasource->langList['productLine']    = '产品线';
$lang->workflowdatasource->langList['customerType']   = '客户类型';
$lang->workflowdatasource->langList['customerSize']   = '客户规模';
$lang->workflowdatasource->langList['customerLevel']  = '客户级别';
$lang->workflowdatasource->langList['customerStatus'] = '客户状态';
$lang->workflowdatasource->langList['currency']       = '货币类型';
$lang->workflowdatasource->langList['role']           = '角色';

$lang->workflow->adminRule  = '浏览规则';
$lang->workflow->createRule = '添加规则';
$lang->workflow->editRule   = '编辑规则';
$lang->workflow->viewRule   = '规则详情';
$lang->workflow->deleteRule = '删除规则';

$lang->workflowrule = new stdclass();
$lang->workflowrule->common = '验证规则';
$lang->workflowrule->type   = '类别';
$lang->workflowrule->name   = '名称';
$lang->workflowrule->rule   = '规则';

$lang->workflowrule->typeList['system'] = '系统函数';
$lang->workflowrule->typeList['regex']  = '正则表达式';
$lang->workflowrule->typeList['func']   = '函数';

$lang->workflow->adminModuleMenu  = '标签列表';
$lang->workflow->createModuleMenu = '创建标签';
$lang->workflow->editModuleMenu   = '编辑标签';
$lang->workflow->deleteModuleMenu = '删除标签';

/* Title */
$lang->workflow->title = new stdclass();
$lang->workflow->title->subModule = '该流程是其他流程的子流程，不能为自己设置子流程';

/* Tips */
$lang->workflow->tips = new stdclass();
$lang->workflow->tips->subModule      = '<strong>子流程</strong>在主流程下的二级菜单中，显示在主流程的菜单之后。';
$lang->workflow->tips->keyValue       = '<strong>键值对</strong>在其他流程调用本流程数据时作为实际值和显示值。<br /><strong>键</strong>只能有一个，设置为键的字段必须添加唯一验证，默认使用id作为键。<br /><strong>值</strong>可以有多个，多个值在显示的时候拼接显示。';
$lang->workflow->tips->foreignKey     = '<strong>外键</strong>用来关联显示子流程的数据，外键只能有一个。设为外键的字段应该使用下拉菜单或者单选按钮作为控件，如果设为外键的字段控件不是下拉菜单或者单选按钮，系统将默认更新控件为下拉菜单并选择数据源为子流程。';
$lang->workflow->tips->actionPosition = '菜单栏位置会显示在二级菜单右侧，列表页会显示在列表操作列，详情页会显示在底部的操作按钮组。';
$lang->workflow->tips->actionShow     = '如果动作操作比较多可以把相对不常用的放到下拉菜单，反之直接显示在列表页面的操作列';
$lang->workflow->tips->table          = '明细表用来存储%s记录的明细';
$lang->workflow->tips->notice         = '发送提醒给所选择的用户';

/* Placeholder */
$lang->workflow->placeholder = new stdclass();
$lang->workflow->placeholder->code      = '只能包含英文字母';
$lang->workflow->placeholder->module    = '只能包含英文字母，保存后不可更改';
$lang->workflow->placeholder->sql       = '直接写入一条SQL查询语句，只能进行查询操作，禁止其他SQL操作。查询结果是键值对。查询语句的第一个字段作为键，第二个字段作为值，其它字段会被忽略。如果只有一个字段，这个字段同时作为键和值。';
$lang->workflow->placeholder->options   = '所选方法应该返回合理的键值对，否则无法显示数据。';
$lang->workflow->placeholder->resultSql = '直接写入一条SQL查询语句，只能进行查询操作。';
$lang->workflow->placeholder->verify    = '校验不通过时显示的提示信息';

/* Error */
$lang->workflow->error = new stdclass();
$lang->workflow->error->createTableFail   = '自定义流程数据表创建失败。';
$lang->workflow->error->renameTableFail   = '自定义流程数据表改名失败。';
$lang->workflow->error->buildInModule     = '不能使用系统内置模块作为流程代号。';
$lang->workflow->error->notFound          = '数据未找到。';
$lang->workflow->error->emptyOptions      = '请输入选项的<strong>代码</strong>和<strong>文字说明</strong>。';
$lang->workflow->error->emptyParams       = '参数不能为空！';
$lang->workflow->error->wrongCode         = '<strong> %s </strong>只能包含英文字母。';
$lang->workflow->error->wrongParams       = '缺少必要的参数，请求失败。';
$lang->workflow->error->wrongSQL          = 'SQL语句有错！错误：';
$lang->workflow->error->wrongRegex        = '正则表达式有错！错误：';
$lang->workflow->error->notunique         = '必须添加唯一验证';
$lang->workflow->error->wrongDecimal      = '<strong>长度</strong>格式为<strong>(M,D)，其中M(0~65)，D(0~30)，且M >= D</strong><br />';
$lang->workflow->error->wrongChar         = '<strong>长度</strong>应为0~255';
$lang->workflow->error->wrongVarchar      = '<strong>长度</strong>应为0~21844';
$lang->workflow->error->selectVersion     = '请选择一个版本';
$lang->workflow->error->mobileShow        = '移动web列表页面最多显示5个字段';
$lang->workflow->error->emptyLayoutFields = "请前往 『{$lang->workflow->common}』 => 『%s』 => 『{$lang->workflowaction->common}』 => 『%s』 => 『{$lang->workflowaction->layout->common}』 设置界面显示的内容。";
$lang->workflow->error->emptyCustomFields = "请前往 『{$lang->workflow->common}』 => 『%s』 => 『{$lang->workflowfield->common}』 添加字段。";
