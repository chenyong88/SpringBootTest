<?php
/**
 * The product module zh-tw ext file of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青島易軟天創網絡科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商業軟件，非開源軟件
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     product
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
$lang->product->all    = '所有產品';
$lang->product->common = '產品';

$lang->product->settings    = '設置';
$lang->product->adminfield  = '屬性設置';
$lang->product->createfield = '添加屬性';
$lang->product->editfield   = '編輯屬性';
$lang->product->deletefield = '刪除屬性';

$lang->product->adminroles       = '角色';
$lang->product->adminaction      = '流程';
$lang->product->createaction     = '添加動作';
$lang->product->editaction       = '編輯動作';
$lang->product->deleteaction     = '刪除動作';
$lang->product->actionconditions = '動作條件';
$lang->product->actioninputs     = '動作輸入項';
$lang->product->actionresults    = '動作結果';
$lang->product->actiontasks      = '動作觸發任務設置';

$lang->product->adminresult  = '結果列表';
$lang->product->createresult = '添加結果';
$lang->product->editresult   = '編輯結果';
$lang->product->deleteresult = '刪除結果';

$lang->product->copy = '複製產品';

$lang->product->field  = new stdclass();
$lang->product->field->name        = '名稱';
$lang->product->field->field       = '欄位名';
$lang->product->field->options     = '選項';
$lang->product->field->control     = '控件';
$lang->product->field->default     = '預設值';
$lang->product->field->rules       = '驗證規則';
$lang->product->field->desc        = '描述';
$lang->product->field->placeholder = '提示文字';
$lang->product->field->optionValue = '選項值的代碼，可以使用字母跟數字組合';
$lang->product->field->optionText  = '選項的文字說明';

$lang->product->field->admin  = '屬性設置';
$lang->product->field->create = '添加屬性';
$lang->product->field->edit   = '編輯屬性';

$lang->product->field->controlTypeList = array();
$lang->product->field->controlTypeList['input']    = '文本框';
$lang->product->field->controlTypeList['textarea'] = '富文本';
$lang->product->field->controlTypeList['date']     = '日期';
$lang->product->field->controlTypeList['select']   = '下拉菜單';
$lang->product->field->controlTypeList['radio']    = '單選按鈕';
$lang->product->field->controlTypeList['checkbox'] = '複選框';

$lang->product->field->rulesList = array();
$lang->product->field->rulesList['notempty'] = '必填';
$lang->product->field->rulesList['unique']   = '唯一';
$lang->product->field->rulesList['date']     = '日期';
$lang->product->field->rulesList['email']    = 'email';
$lang->product->field->rulesList['float']    = '數字';
$lang->product->field->rulesList['phone']    = '電話';
$lang->product->field->rulesList['ip']       = 'IP';

$lang->product->field->optionsPlaceholder = '多個值之間用空格或逗號隔開';
$lang->product->field->lengthNotice       = '該類型修改可能會造成數據丟失，請慎重使用！';
$lang->product->field->unique             = '選擇的產品已有該屬性';

$lang->product->action = new stdclass();
$lang->product->action->action     = '動作';
$lang->product->action->name       = '名稱';
$lang->product->action->conditions = '條件';
$lang->product->action->param      = '參數';
$lang->product->action->inputs     = '輸入';
$lang->product->action->results    = '結果';
$lang->product->action->tasks      = '任務';

$lang->product->action->admin           = '流程';
$lang->product->action->create          = '添加動作';
$lang->product->action->edit            = '編輯動作';
$lang->product->action->adminConditions = '動作條件';
$lang->product->action->createResult    = '添加結果';
$lang->product->action->editResult      = '編輯結果';
$lang->product->action->adminInputs     = '動作輸入項';
$lang->product->action->adminResults    = '動作結果';
$lang->product->action->adminTasks      = '動作觸發任務設置';

$lang->product->task = new stdclass();
$lang->product->task->role     = '角色';
$lang->product->task->name     = '名稱';
$lang->product->task->desc     = '任務內容';
$lang->product->task->days     = '開始時間';
$lang->product->task->estimate = '預計消耗';

$lang->product->task->daysOptions = array();
$lang->product->task->daysOptions[0]  = '當天';
$lang->product->task->daysOptions[2]  = '兩天內';
$lang->product->task->daysOptions[3]  = '三天內';
$lang->product->task->daysOptions[4]  = '四天內';
$lang->product->task->daysOptions[7]  = '一周內';
$lang->product->task->daysOptions[10] = '十天內';
$lang->product->task->daysOptions[15] = '半個月';
$lang->product->task->daysOptions[30] = '一個月';

$lang->product->roleCode = '角色代碼，字母跟數字組合';
$lang->product->roleName = '角色名稱';
$lang->product->copyTip  = '複製該產品的屬性，流程，角色到選擇的產品';

if(!isset($lang->product->error)) $lang->product->error = new stdclass();
$lang->product->error->createTableFail = '產品屬性擴展表創建失敗。';
$lang->product->error->renameTableFail = '產品屬性擴展表改名失敗。';
$lang->product->error->exist           = '已存在相同名稱和規格的產品。';

$lang->product->createFromOrder       = '在訂單中新增產品';
$lang->product->batchCreate           = '批量添加';
$lang->product->import                = '導入數據';
$lang->product->exportTemplate        = '下載模板';
$lang->product->browseProperties      = '瀏覽規格/單位';
$lang->product->batchCreateProperties = '批量添加規格/單位';
$lang->product->createProperty        = '添加規格/單位';
$lang->product->editProperty          = '編輯規格/單位';
$lang->product->deleteProperty        = '刪除規格/單位';

$lang->product->pinyin  = '拼音碼';
$lang->product->model   = '規格';
$lang->product->unit    = '單位';
$lang->product->barcode = '條形碼';
$lang->product->brand   = '品牌';
$lang->product->store   = '倉庫';
$lang->product->price   = '單價';
$lang->product->amount  = '數量';

$lang->product->models    = array();
$lang->product->units     = array();
$lang->product->expresses = array();

$lang->product->createCategory = '新建';
$lang->product->createModel    = '新建';
$lang->product->createUnit     = '新建';
$lang->product->input          = '請輸入';
$lang->product->search         = '搜索';

$lang->product->property = new stdclass();
$lang->product->property->models    = '規格';
$lang->product->property->units     = '單位';
$lang->product->property->expresses = '快遞';

$lang->product->placeholder->batchCreate = new stdclass();
$lang->product->placeholder->batchCreate->category = '類目為空的數據不會被保存';
$lang->product->placeholder->batchCreate->name     = '名稱為空的數據不會被保存';
$lang->product->placeholder->batchCreate->code     = '代號為空的數據不會被保存';
