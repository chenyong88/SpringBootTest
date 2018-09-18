<?php
/**
 * The product module zh-cn ext file of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     product
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
$lang->product->all    = '所有产品';
$lang->product->common = '产品';

$lang->product->settings    = '设置';
$lang->product->adminfield  = '属性设置';
$lang->product->createfield = '添加属性';
$lang->product->editfield   = '编辑属性';
$lang->product->deletefield = '删除属性';

$lang->product->adminroles       = '角色';
$lang->product->adminaction      = '流程';
$lang->product->createaction     = '添加动作';
$lang->product->editaction       = '编辑动作';
$lang->product->deleteaction     = '删除动作';
$lang->product->actionconditions = '动作条件';
$lang->product->actioninputs     = '动作输入项';
$lang->product->actionresults    = '动作结果';
$lang->product->actiontasks      = '动作触发任务设置';

$lang->product->adminresult  = '结果列表';
$lang->product->createresult = '添加结果';
$lang->product->editresult   = '编辑结果';
$lang->product->deleteresult = '删除结果';

$lang->product->copy = '复制产品';

$lang->product->field  = new stdclass();
$lang->product->field->name        = '名称';
$lang->product->field->field       = '字段名';
$lang->product->field->options     = '选项';
$lang->product->field->control     = '控件';
$lang->product->field->default     = '默认值';
$lang->product->field->rules       = '验证规则';
$lang->product->field->desc        = '描述';
$lang->product->field->placeholder = '提示文字';
$lang->product->field->optionValue = '选项值的代码，可以使用字母跟数字组合';
$lang->product->field->optionText  = '选项的文字说明';

$lang->product->field->admin  = '属性设置';
$lang->product->field->create = '添加属性';
$lang->product->field->edit   = '编辑属性';

$lang->product->field->controlTypeList = array();
$lang->product->field->controlTypeList['input']    = '文本框';
$lang->product->field->controlTypeList['textarea'] = '富文本';
$lang->product->field->controlTypeList['date']     = '日期';
$lang->product->field->controlTypeList['select']   = '下拉菜单';
$lang->product->field->controlTypeList['radio']    = '单选按钮';
$lang->product->field->controlTypeList['checkbox'] = '复选框';

$lang->product->field->rulesList = array();
$lang->product->field->rulesList['notempty'] = '必填';
$lang->product->field->rulesList['unique']   = '唯一';
$lang->product->field->rulesList['date']     = '日期';
$lang->product->field->rulesList['email']    = 'email';
$lang->product->field->rulesList['float']    = '数字';
$lang->product->field->rulesList['phone']    = '电话';
$lang->product->field->rulesList['ip']       = 'IP';

$lang->product->field->optionsPlaceholder = '多个值之间用空格或逗号隔开';
$lang->product->field->lengthNotice       = '该类型修改可能会造成数据丢失，请慎重使用！';
$lang->product->field->unique             = '选择的产品已有该属性';

$lang->product->action = new stdclass();
$lang->product->action->action     = '动作';
$lang->product->action->name       = '名称';
$lang->product->action->conditions = '条件';
$lang->product->action->param      = '参数';
$lang->product->action->inputs     = '输入';
$lang->product->action->results    = '结果';
$lang->product->action->tasks      = '任务';

$lang->product->action->admin           = '流程';
$lang->product->action->create          = '添加动作';
$lang->product->action->edit            = '编辑动作';
$lang->product->action->adminConditions = '动作条件';
$lang->product->action->createResult    = '添加结果';
$lang->product->action->editResult      = '编辑结果';
$lang->product->action->adminInputs     = '动作输入项';
$lang->product->action->adminResults    = '动作结果';
$lang->product->action->adminTasks      = '动作触发任务设置';

$lang->product->task = new stdclass();
$lang->product->task->role     = '角色';
$lang->product->task->name     = '名称';
$lang->product->task->desc     = '任务内容';
$lang->product->task->days     = '开始时间';
$lang->product->task->estimate = '预计消耗';

$lang->product->task->daysOptions = array();
$lang->product->task->daysOptions[0]  = '当天';
$lang->product->task->daysOptions[2]  = '两天内';
$lang->product->task->daysOptions[3]  = '三天内';
$lang->product->task->daysOptions[4]  = '四天内';
$lang->product->task->daysOptions[7]  = '一周内';
$lang->product->task->daysOptions[10] = '十天内';
$lang->product->task->daysOptions[15] = '半个月';
$lang->product->task->daysOptions[30] = '一个月';

$lang->product->roleCode = '角色代码，字母跟数字组合';
$lang->product->roleName = '角色名称';
$lang->product->copyTip  = '复制该产品的属性，流程，角色到选择的产品';

if(!isset($lang->product->error)) $lang->product->error = new stdclass();
$lang->product->error->createTableFail = '产品属性扩展表创建失败。';
$lang->product->error->renameTableFail = '产品属性扩展表改名失败。';
$lang->product->error->exist           = '已存在相同名称和规格的产品。';

$lang->product->createFromOrder       = '在订单中新增产品';
$lang->product->batchCreate           = '批量添加';
$lang->product->import                = '导入数据';
$lang->product->exportTemplate        = '下载模板';
$lang->product->browseProperties      = '浏览规格/单位';
$lang->product->batchCreateProperties = '批量添加规格/单位';
$lang->product->createProperty        = '添加规格/单位';
$lang->product->editProperty          = '编辑规格/单位';
$lang->product->deleteProperty        = '删除规格/单位';

$lang->product->pinyin  = '拼音码';
$lang->product->model   = '规格';
$lang->product->unit    = '单位';
$lang->product->barcode = '条形码';
$lang->product->brand   = '品牌';
$lang->product->store   = '仓库';
$lang->product->price   = '单价';
$lang->product->amount  = '数量';

$lang->product->models    = array();
$lang->product->units     = array();
$lang->product->expresses = array();

$lang->product->createCategory = '新建';
$lang->product->createModel    = '新建';
$lang->product->createUnit     = '新建';
$lang->product->input          = '请输入';
$lang->product->search         = '搜索';

$lang->product->property = new stdclass();
$lang->product->property->models    = '规格';
$lang->product->property->units     = '单位';
$lang->product->property->expresses = '快递';

$lang->product->placeholder->batchCreate = new stdclass();
$lang->product->placeholder->batchCreate->category = '类目为空的数据不会被保存';
$lang->product->placeholder->batchCreate->name     = '名称为空的数据不会被保存';
$lang->product->placeholder->batchCreate->code     = '代号为空的数据不会被保存';
