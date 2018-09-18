<?php
if(!isset($lang->workflow)) $lang->workflow = new stdclass();
$lang->workflow->common       = '流程';
$lang->workflow->browse       = '流程列表';
$lang->workflow->create       = '新增流程';
$lang->workflow->edit         = '編輯流程';
$lang->workflow->view         = '流程詳情';
$lang->workflow->delete       = '刪除流程';
$lang->workflow->backup       = '備份';
$lang->workflow->setSubModule = '設置子流程';

$lang->workflow->id            = '編號';
$lang->workflow->app           = '所屬應用';
$lang->workflow->module        = '代號';
$lang->workflow->name          = '流程名';
$lang->workflow->order         = '順序';
$lang->workflow->desc          = '描述';
$lang->workflow->version       = '版本';
$lang->workflow->createdBy     = '由誰創建';
$lang->workflow->createdDate   = '創建時間';
$lang->workflow->editedBy      = '由誰編輯';
$lang->workflow->editedDate    = '編輯時間';
$lang->workflow->width         = '寬度';
$lang->workflow->position      = '位置';
$lang->workflow->order         = '排序';
$lang->workflow->defaultValue  = '預設顯示值';
$lang->workflow->show          = '顯示';
$lang->workflow->hide          = '隱藏';
$lang->workflow->mobile        = '移動頁面';
$lang->workflow->custom        = '自定義';
$lang->workflow->subModule     = '子流程';
$lang->workflow->subTables     = '明細表';
$lang->workflow->modules       = '流程';
$lang->workflow->users         = '授權用戶';
$lang->workflow->groups        = '授權分組';
$lang->workflow->total         = '合計';

$lang->workflow->upgrade = new stdclass();
$lang->workflow->upgrade->common         = '升級';
$lang->workflow->upgrade->backup         = '備份';
$lang->workflow->upgrade->backupSuccess  = '備份成功';
$lang->workflow->upgrade->newVersion     = '發現新版本！';
$lang->workflow->upgrade->clickme        = '點擊升級';
$lang->workflow->upgrade->start          = '開始升級';
$lang->workflow->upgrade->currentVersion = '當前版本';
$lang->workflow->upgrade->selectVersion  = '選擇版本';
$lang->workflow->upgrade->confirm        = '確認要執行的SQL語句';
$lang->workflow->upgrade->upgrade        = '升級現有模組';
$lang->workflow->upgrade->upgradeFail    = '升級失敗';
$lang->workflow->upgrade->upgradeSuccess = '升級成功';
$lang->workflow->upgrade->install        = '安裝一個新模組';
$lang->workflow->upgrade->installFail    = '安裝失敗';
$lang->workflow->upgrade->installSuccess = '安裝成功';

$lang->workflow->browseTable = '瀏覽表';
$lang->workflow->createTable = '新增表';
$lang->workflow->editTable   = '編輯表';
$lang->workflow->viewTable   = '表詳情';
$lang->workflow->deleteTable = '刪除表';

$lang->workflowtable = new stdclass();
$lang->workflowtable->common = '明細表';
$lang->workflowtable->name   = '表名';

$lang->workflowtable->edit   = '編輯表';
$lang->workflowtable->delete = '刪除表';

/* Field */
$lang->workflow->adminField  = '欄位列表';
$lang->workflow->createField = '添加欄位';
$lang->workflow->editField   = '編輯欄位';
$lang->workflow->deleteField = '刪除欄位';
$lang->workflow->exportField = '導出設置';

$lang->workflowfield = new stdclass();
$lang->workflowfield->common       = '欄位';
$lang->workflowfield->name         = '名稱';
$lang->workflowfield->field        = '欄位';
$lang->workflowfield->type         = '類型';
$lang->workflowfield->length       = '長度';
$lang->workflowfield->options      = '選項';
$lang->workflowfield->control      = '控件';
$lang->workflowfield->default      = '預設值';
$lang->workflowfield->rules        = '驗證規則';
$lang->workflowfield->desc         = '描述';
$lang->workflowfield->placeholder  = '提示文字';
$lang->workflowfield->position     = '位於';
$lang->workflowfield->dataSource   = '數據源';
$lang->workflowfield->sql          = 'SQL';
$lang->workflowfield->vars         = '變數';
$lang->workflowfield->addVar       = '添加變數';
$lang->workflowfield->varName      = '變數名稱';
$lang->workflowfield->showName     = '顯示名稱';
$lang->workflowfield->requestType  = '輸入方式';
$lang->workflowfield->optionValue  = '選項的代碼，字母和數字的組合';
$lang->workflowfield->optionText   = '選項的文字說明';
$lang->workflowfield->canExport    = '能否導出';
$lang->workflowfield->canSearch    = '能否檢索';
$lang->workflowfield->foreignKey   = '外鍵';
$lang->workflowfield->isForeignKey = '是否外鍵';
$lang->workflowfield->isKeyValue   = '是否鍵值';

$lang->workflowfield->typeGroup['number'] = '數字';
$lang->workflowfield->typeGroup['date']   = '日期時間';
$lang->workflowfield->typeGroup['string'] = '字元串';

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

$lang->workflowfield->exportList[1] = '可以導出';
$lang->workflowfield->exportList[0] = '不能導出';

$lang->workflowfield->searchList[1] = '可以檢索';
$lang->workflowfield->searchList[0] = '不能檢索';

$lang->workflowfield->foreignKeyList[1] = '是';
$lang->workflowfield->foreignKeyList[0] = '否';

$lang->workflowfield->keyValueList['key']   = '鍵';
$lang->workflowfield->keyValueList['value'] = '值';

$lang->workflowfield->uniqueList[1] = '是';
$lang->workflowfield->uniqueList[0] = '否';

$lang->workflowfield->controlTypeList['label']    = '標籤';
$lang->workflowfield->controlTypeList['input']    = '文本框';
$lang->workflowfield->controlTypeList['textarea'] = '富文本';
$lang->workflowfield->controlTypeList['date']     = '日期';
$lang->workflowfield->controlTypeList['datetime'] = '時間';
$lang->workflowfield->controlTypeList['select']   = '下拉菜單';
$lang->workflowfield->controlTypeList['radio']    = '單選按鈕';
$lang->workflowfield->controlTypeList['checkbox'] = '複選框';

$lang->workflowfield->optionTypeList['user']      = '用戶';
$lang->workflowfield->optionTypeList['dept']      = '部門';
$lang->workflowfield->optionTypeList['custom']    = '自定義';
$lang->workflowfield->optionTypeList['sql']       = '自定義SQL';
$lang->workflowfield->optionTypeList['submodule'] = '子流程';

$lang->workflowfield->requestTypeList['input']  = '文本框';
$lang->workflowfield->requestTypeList['date']   = '日期';
$lang->workflowfield->requestTypeList['select'] = '下拉菜單';

$lang->workflowfield->rulesList['notempty'] = '必填';
$lang->workflowfield->rulesList['date']     = '日期';
$lang->workflowfield->rulesList['email']    = 'email';
$lang->workflowfield->rulesList['float']    = '數字';
$lang->workflowfield->rulesList['phone']    = '電話';
$lang->workflowfield->rulesList['ip']       = 'IP';

$lang->workflowfield->positionList['before'] = '之前';
$lang->workflowfield->positionList['after']  = '之後';

$lang->workflowfield->optionsPlaceholder = '多個值之間用空格或逗號隔開';
$lang->workflowfield->lengthNotice       = '該類型修改可能會造成數據丟失，請慎重使用！';
$lang->workflowfield->unique             = '選擇的模組已有該欄位';
$lang->workflowfield->defaultValue       = '預設值的長度不應該超過%s';
$lang->workflowfield->textDefaultValue   = 'text類型欄位不能設置預設值';
$lang->workflowfield->positionTips       = '基本信息是右邊側欄位置，詳細信息是左側主欄位置';

$lang->workflowfield->defaultFields['id']          = '編號';
$lang->workflowfield->defaultFields['parent']      = '父流程ID';
$lang->workflowfield->defaultFields['createdBy']   = '由誰創建';
$lang->workflowfield->defaultFields['createdDate'] = '創建日期';
$lang->workflowfield->defaultFields['editedBy']    = '由誰編輯';
$lang->workflowfield->defaultFields['editedDate']  = '編輯日期';
$lang->workflowfield->defaultFields['deleted']     = '是否刪除';

$lang->workflowfield->defaultOptions = new stdclass();
$lang->workflowfield->defaultOptions->deleted['0'] = '未刪除';
$lang->workflowfield->defaultOptions->deleted['1'] = '已刪除';

/* Action */
$lang->workflow->adminAction  = '動作列表';
$lang->workflow->createAction = '添加動作';
$lang->workflow->editAction   = '編輯動作';
$lang->workflow->viewAction   = '動作詳情';
$lang->workflow->deleteAction = '刪除動作';
$lang->workflow->verification = '數據校驗';
$lang->workflow->setNotice    = '設置提醒';

$lang->workflowaction = new stdclass();
$lang->workflowaction->common   = '動作';
$lang->workflowaction->name     = '名稱';
$lang->workflowaction->action   = '動作';
$lang->workflowaction->open     = '打開方式';
$lang->workflowaction->position = '顯示位置';
$lang->workflowaction->show     = '顯示方式';
$lang->workflowaction->desc     = '描述';
$lang->workflowaction->toList   = '發送給';

$lang->workflowaction->openList['normal'] = '普通頁面';
$lang->workflowaction->openList['modal']  = '彈窗頁面';
$lang->workflowaction->openList['none']   = '無頁面';

$lang->workflowaction->positionList['menu']          = '菜單欄';
$lang->workflowaction->positionList['browse']        = '列表頁';
$lang->workflowaction->positionList['view']          = '詳情頁';
$lang->workflowaction->positionList['browseandview'] = '列表頁和詳情頁';

$lang->workflowaction->showList['dropdownlist'] = '顯示在下拉菜單中';
$lang->workflowaction->showList['direct']       = '直接顯示在頁面上';

$lang->workflowaction->defaultActions['browse'] = '瀏覽列表';
$lang->workflowaction->defaultActions['create'] = '新建';
$lang->workflowaction->defaultActions['edit']   = '編輯';
$lang->workflowaction->defaultActions['view']   = '查看詳情';
$lang->workflowaction->defaultActions['delete'] = '刪除';

$lang->workflowaction->operatorList['equal']    = '=';
$lang->workflowaction->operatorList['notequal'] = '!=';
$lang->workflowaction->operatorList['gt']       = '>';
$lang->workflowaction->operatorList['ge']       = '>=';
$lang->workflowaction->operatorList['lt']       = '<';
$lang->workflowaction->operatorList['le']       = '<=';

$lang->workflowaction->verification = new stdclass();
$lang->workflowaction->verification->type   = '校驗類型';
$lang->workflowaction->verification->result = '校驗結果';

$lang->workflowaction->verification->types['data'] = '以數據作為校驗方式';
$lang->workflowaction->verification->types['sql']  = '以SQL語句作為校驗方式';

$lang->workflowaction->verification->sqlResult['empty']    = '查詢結果為空或0時通過校驗';
$lang->workflowaction->verification->sqlResult['notempty'] = '查詢結果不為空和0時通過校驗';

/* Condition */
$lang->workflow->adminCondition = '動作條件';

$lang->workflowaction->condition = new stdclass();
$lang->workflowaction->condition->common   = '觸發條件';
$lang->workflowaction->condition->operator = '條件';
$lang->workflowaction->condition->param    = '參數';

$lang->workflowaction->condition->sqlResult['empty']    = '查詢結果為空或0時執行動作';
$lang->workflowaction->condition->sqlResult['notempty'] = '查詢結果不為空和0時執行動作';

/* Layout */
$lang->workflow->adminLayout = '維護界面';

$lang->workflowaction->layout = new stdclass();
$lang->workflowaction->layout->common  = '界面';
$lang->workflowaction->layout->require = '必選';
$lang->workflowaction->layout->disable = '不可選';

$lang->workflowaction->layout->positionList['browse']['left']   = '居左';
$lang->workflowaction->layout->positionList['browse']['center'] = '居中';
$lang->workflowaction->layout->positionList['browse']['right']  = '居右';

$lang->workflowaction->layout->positionList['view']['basic'] = '基本信息';
$lang->workflowaction->layout->positionList['view']['info']  = '詳細信息';

$lang->workflowaction->layout->defaultUser['currentUser'] = '當前用戶';
$lang->workflowaction->layout->defaultUser['deptManager'] = '部門經理';
$lang->workflowaction->layout->defaultDept['currentDept'] = '當前部門';
$lang->workflowaction->layout->defaultTime['currentTime'] = '當前時間';

$lang->workflowaction->layout->mobileList[1] = '顯示';
$lang->workflowaction->layout->mobileList[0] = '不顯示';

$lang->workflowaction->layout->totalList[1] = '顯示';
$lang->workflowaction->layout->totalList[0] = '不顯示';

/* Result */
$lang->workflow->adminResult  = '擴展動作列表';
$lang->workflow->createResult = '添加擴展動作';
$lang->workflow->editResult   = '編輯擴展動作';
$lang->workflow->deleteResult = '刪除擴展動作';

$lang->workflowaction->result = new stdclass();
$lang->workflowaction->result->common          = '擴展動作';
$lang->workflowaction->result->table           = '表';
$lang->workflowaction->result->value           = '值';
$lang->workflowaction->result->where           = 'where';
$lang->workflowaction->result->conditionType   = '條件類型';
$lang->workflowaction->result->conditionResult = '條件結果';
$lang->workflowaction->result->message         = '提示信息';

$lang->workflowaction->result->conditionTypes['data'] = '以數據作為觸發條件';
$lang->workflowaction->result->conditionTypes['sql']  = '以SQL語句作為觸發條件';

$lang->workflowaction->result->sqlResult['empty']    = '查詢結果為空或0時執行擴展動作';
$lang->workflowaction->result->sqlResult['notempty'] = '查詢結果不為空和0時執行擴展動作';

$lang->workflowaction->result->logicalOperators['and'] = '並且';
$lang->workflowaction->result->logicalOperators['or']  = '或者';

$lang->workflowaction->result->options['user']        = '用戶';
$lang->workflowaction->result->options['dept']        = '部門';
$lang->workflowaction->result->options['deptManager'] = '部門經理';
$lang->workflowaction->result->options['today']       = '操作日期';
$lang->workflowaction->result->options['now']         = '操作時間';
$lang->workflowaction->result->options['actor']       = '操作人';
$lang->workflowaction->result->options['form']        = '表單數據';
$lang->workflowaction->result->options['record']      = '當前數據';
$lang->workflowaction->result->options['custom']      = '自定義';

$lang->workflowaction->result->actions['insert'] = '新增';
$lang->workflowaction->result->actions['update'] = '修改';
$lang->workflowaction->result->actions['delete'] = '刪除';

$lang->workflowaction->result->tables['order']     = '訂單';
$lang->workflowaction->result->tables['contract']  = '合同';
$lang->workflowaction->result->tables['customer']  = '客戶';
$lang->workflowaction->result->tables['provider']  = '供應商';
$lang->workflowaction->result->tables['contact']   = '聯繫人';
$lang->workflowaction->result->tables['product']   = '產品';
$lang->workflowaction->result->tables['user']      = '用戶';
$lang->workflowaction->result->tables['project']   = '項目';
$lang->workflowaction->result->tables['task']      = '任務';
$lang->workflowaction->result->tables['todo']      = '待辦';
$lang->workflowaction->result->tables['article']   = '博客';
$lang->workflowaction->result->tables['doc']       = '文檔';
$lang->workflowaction->result->tables['doclib']    = '文檔庫';
$lang->workflowaction->result->tables['refund']    = '報銷';
$lang->workflowaction->result->tables['announce']  = '公告';
$lang->workflowaction->result->tables['holiday']   = '假期';
$lang->workflowaction->result->tables['attend']    = '考勤';
$lang->workflowaction->result->tables['leave']     = '請假';
$lang->workflowaction->result->tables['lieu']      = '調休';
$lang->workflowaction->result->tables['overtime']  = '加班';
$lang->workflowaction->result->tables['trip']      = '出差';
$lang->workflowaction->result->tables['depositor'] = '賬戶';
$lang->workflowaction->result->tables['trade']     = '賬目';
$lang->workflowaction->result->tables['balance']   = '餘額';
$lang->workflowaction->result->tables['thread']    = '帖子';
$lang->workflowaction->result->tables['reply']     = '回帖';

$lang->workflowmenu = new stdclass();
$lang->workflowmenu->common = '列表標籤';
$lang->workflowmenu->label  = '標籤';
$lang->workflowmenu->params = '參數';

$lang->workflowmenu->default['all'] = '所有';

$lang->workflow->adminDatasource  = '瀏覽數據源';
$lang->workflow->createDatasource = '添加數據源';
$lang->workflow->editDatasource   = '編輯數據源';
$lang->workflow->viewDatasource   = '數據源詳情';
$lang->workflow->deleteDatasource = '刪除數據源';

$lang->workflowdatasource = new stdclass();
$lang->workflowdatasource->common      = '數據源';
$lang->workflowdatasource->type        = '類別';
$lang->workflowdatasource->name        = '名稱';
$lang->workflowdatasource->datasource  = '數據源';
$lang->workflowdatasource->optionValue = '選項的代碼，字母和數字的組合';
$lang->workflowdatasource->optionText  = '選項的文字說明';
$lang->workflowdatasource->app         = '所屬應用';
$lang->workflowdatasource->module      = '所屬模組';
$lang->workflowdatasource->method      = '方法';
$lang->workflowdatasource->param       = '參數';
$lang->workflowdatasource->paramType   = '類型';
$lang->workflowdatasource->paramValue  = '值';
$lang->workflowdatasource->sql         = 'SQL語句';

$lang->workflowdatasource->typeList['system'] = '系統函數';
$lang->workflowdatasource->typeList['sql']    = '自定義SQL';
//$lang->workflowdatasource->typeList['func']   = '自定義函數';
$lang->workflowdatasource->typeList['option'] = '選項列表';
$lang->workflowdatasource->typeList['lang']   = '系統語言';

$lang->workflowdatasource->langList['productStatus']  = '產品狀態';
$lang->workflowdatasource->langList['productLine']    = '產品綫';
$lang->workflowdatasource->langList['customerType']   = '客戶類型';
$lang->workflowdatasource->langList['customerSize']   = '客戶規模';
$lang->workflowdatasource->langList['customerLevel']  = '客戶級別';
$lang->workflowdatasource->langList['customerStatus'] = '客戶狀態';
$lang->workflowdatasource->langList['currency']       = '貨幣類型';
$lang->workflowdatasource->langList['role']           = '角色';

$lang->workflow->adminRule  = '瀏覽規則';
$lang->workflow->createRule = '添加規則';
$lang->workflow->editRule   = '編輯規則';
$lang->workflow->viewRule   = '規則詳情';
$lang->workflow->deleteRule = '刪除規則';

$lang->workflowrule = new stdclass();
$lang->workflowrule->common = '驗證規則';
$lang->workflowrule->type   = '類別';
$lang->workflowrule->name   = '名稱';
$lang->workflowrule->rule   = '規則';

$lang->workflowrule->typeList['system'] = '系統函數';
$lang->workflowrule->typeList['regex']  = '正則表達式';
$lang->workflowrule->typeList['func']   = '函數';

$lang->workflow->adminModuleMenu  = '標籤列表';
$lang->workflow->createModuleMenu = '創建標籤';
$lang->workflow->editModuleMenu   = '編輯標籤';
$lang->workflow->deleteModuleMenu = '刪除標籤';

/* Title */
$lang->workflow->title = new stdclass();
$lang->workflow->title->subModule = '該流程是其他流程的子流程，不能為自己設置子流程';

/* Tips */
$lang->workflow->tips = new stdclass();
$lang->workflow->tips->subModule      = '<strong>子流程</strong>在主流程下的二級菜單中，顯示在主流程的菜單之後。';
$lang->workflow->tips->keyValue       = '<strong>鍵值對</strong>在其他流程調用本流程數據時作為實際值和顯示值。<br /><strong>鍵</strong>只能有一個，設置為鍵的欄位必須添加唯一驗證，預設使用id作為鍵。<br /><strong>值</strong>可以有多個，多個值在顯示的時候拼接顯示。';
$lang->workflow->tips->foreignKey     = '<strong>外鍵</strong>用來關聯顯示子流程的數據，外鍵只能有一個。設為外鍵的欄位應該使用下拉菜單或者單選按鈕作為控件，如果設為外鍵的欄位控件不是下拉菜單或者單選按鈕，系統將預設更新控件為下拉菜單並選擇數據源為子流程。';
$lang->workflow->tips->actionPosition = '菜單欄位置會顯示在二級菜單右側，列表頁會顯示在列表操作列，詳情頁會顯示在底部的操作按鈕組。';
$lang->workflow->tips->actionShow     = '如果動作操作比較多可以把相對不常用的放到下拉菜單，反之直接顯示在列表頁面的操作列';
$lang->workflow->tips->table          = '明細表用來存儲%s記錄的明細';
$lang->workflow->tips->notice         = '發送提醒給所選擇的用戶';

/* Placeholder */
$lang->workflow->placeholder = new stdclass();
$lang->workflow->placeholder->code      = '只能包含英文字母';
$lang->workflow->placeholder->module    = '只能包含英文字母，保存後不可更改';
$lang->workflow->placeholder->sql       = '直接寫入一條SQL查詢語句，只能進行查詢操作，禁止其他SQL操作。查詢結果是鍵值對。查詢語句的第一個欄位作為鍵，第二個欄位作為值，其它欄位會被忽略。如果只有一個欄位，這個欄位同時作為鍵和值。';
$lang->workflow->placeholder->options   = '所選方法應該返回合理的鍵值對，否則無法顯示數據。';
$lang->workflow->placeholder->resultSql = '直接寫入一條SQL查詢語句，只能進行查詢操作。';
$lang->workflow->placeholder->verify    = '校驗不通過時顯示的提示信息';

/* Error */
$lang->workflow->error = new stdclass();
$lang->workflow->error->createTableFail   = '自定義流程數據表創建失敗。';
$lang->workflow->error->renameTableFail   = '自定義流程數據表改名失敗。';
$lang->workflow->error->buildInModule     = '不能使用系統內置模組作為流程代號。';
$lang->workflow->error->notFound          = '數據未找到。';
$lang->workflow->error->emptyOptions      = '請輸入選項的<strong>代碼</strong>和<strong>文字說明</strong>。';
$lang->workflow->error->emptyParams       = '參數不能為空！';
$lang->workflow->error->wrongCode         = '<strong> %s </strong>只能包含英文字母。';
$lang->workflow->error->wrongParams       = '缺少必要的參數，請求失敗。';
$lang->workflow->error->wrongSQL          = 'SQL語句有錯！錯誤：';
$lang->workflow->error->wrongRegex        = '正則表達式有錯！錯誤：';
$lang->workflow->error->notunique         = '必須添加唯一驗證';
$lang->workflow->error->wrongDecimal      = '<strong>長度</strong>格式為<strong>(M,D)，其中M(0~65)，D(0~30)，且M >= D</strong><br />';
$lang->workflow->error->wrongChar         = '<strong>長度</strong>應為0~255';
$lang->workflow->error->wrongVarchar      = '<strong>長度</strong>應為0~21844';
$lang->workflow->error->selectVersion     = '請選擇一個版本';
$lang->workflow->error->mobileShow        = '移動web列表頁面最多顯示5個欄位';
$lang->workflow->error->emptyLayoutFields = "請前往 『{$lang->workflow->common}』 => 『%s』 => 『{$lang->workflowaction->common}』 => 『%s』 => 『{$lang->workflowaction->layout->common}』 設置界面顯示的內容。";
$lang->workflow->error->emptyCustomFields = "請前往 『{$lang->workflow->common}』 => 『%s』 => 『{$lang->workflowfield->common}』 添加欄位。";
