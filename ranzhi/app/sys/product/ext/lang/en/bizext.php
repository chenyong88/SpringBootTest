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
$lang->product->all    = 'All';
$lang->product->common = 'Product';

$lang->product->settings    = 'Settings';
$lang->product->adminfield  = 'Admin Field';
$lang->product->createfield = 'Create Field';
$lang->product->editfield   = 'Edit Field';
$lang->product->deletefield = 'Delete Field';

$lang->product->adminroles       = 'Roles';
$lang->product->adminaction      = 'Actions';
$lang->product->createaction     = 'Create Action';
$lang->product->editaction       = 'Edit Action';
$lang->product->deleteaction     = 'Delete Action';
$lang->product->actionconditions = 'Action Conditions';
$lang->product->actioninputs     = 'Action Inputs';
$lang->product->actionresults    = 'Action Results';
$lang->product->actiontasks      = 'Action Tasks';

$lang->product->adminresult  = 'Results';
$lang->product->createresult = 'Create Result';
$lang->product->editresult   = 'Edit Result';
$lang->product->deleteresult = 'Delete Result';

$lang->product->copy = 'Copy';

$lang->product->field  = new stdclass();
$lang->product->field->name        = 'Name';
$lang->product->field->field       = 'Field';
$lang->product->field->options     = 'Options';
$lang->product->field->control     = 'Control';
$lang->product->field->default     = 'Default';
$lang->product->field->rules       = 'Rules';
$lang->product->field->desc        = 'Desc';
$lang->product->field->placeholder = 'Place Holder';
$lang->product->field->optionValue = 'Option code, it should be english or digital';
$lang->product->field->optionText  = 'Option Desc';

$lang->product->field->admin  = 'Fields';
$lang->product->field->create = 'Create Field';
$lang->product->field->edit   = 'Edit Field';

$lang->product->field->controlTypeList = array();
$lang->product->field->controlTypeList['input']    = 'Input';
$lang->product->field->controlTypeList['textarea'] = 'Textarea';
$lang->product->field->controlTypeList['date']     = 'Date';
$lang->product->field->controlTypeList['select']   = 'Select';
$lang->product->field->controlTypeList['radio']    = 'Radio';
$lang->product->field->controlTypeList['checkbox'] = 'Checkbox';

$lang->product->field->rulesList = array();
$lang->product->field->rulesList['notempty'] = 'Required';
$lang->product->field->rulesList['unique']   = 'Unique';
$lang->product->field->rulesList['date']     = 'Date';
$lang->product->field->rulesList['email']    = 'Email';
$lang->product->field->rulesList['float']    = 'Number';
$lang->product->field->rulesList['phone']    = 'Phone';
$lang->product->field->rulesList['ip']       = 'IP';

$lang->product->field->optionsPlaceholder = 'Seperated by space or comma.';
$lang->product->field->lengthNotice       = 'Attention, this kind of change may lose data!';
$lang->product->field->unique             = 'The selected product has same fields.';

$lang->product->action = new stdclass();
$lang->product->action->action     = 'Action';
$lang->product->action->name       = 'Name';
$lang->product->action->conditions = 'Conditions';
$lang->product->action->param      = 'Params';
$lang->product->action->inputs     = 'Inputs';
$lang->product->action->results    = 'Results';
$lang->product->action->tasks      = 'Tasks';

$lang->product->action->admin           = 'Actions';
$lang->product->action->create          = 'Create Action';
$lang->product->action->edit            = 'Edit Action';
$lang->product->action->adminConditions = 'Action Conditions';
$lang->product->action->createResult    = 'Create Result';
$lang->product->action->editResult      = 'Edit Result';
$lang->product->action->adminInputs     = 'Action Inputs';
$lang->product->action->adminResults    = 'Action Results';
$lang->product->action->adminTasks      = 'Action Tasks';

$lang->product->task = new stdclass();
$lang->product->task->role     = 'Role';
$lang->product->task->name     = 'Name';
$lang->product->task->desc     = 'Desc';
$lang->product->task->days     = 'Start';
$lang->product->task->estimate = 'Estimate';

$lang->product->task->daysOptions = array();
$lang->product->task->daysOptions[0]  = 'Today';
$lang->product->task->daysOptions[2]  = '2 Days';
$lang->product->task->daysOptions[3]  = '3 Days';
$lang->product->task->daysOptions[4]  = '4 Days';
$lang->product->task->daysOptions[7]  = 'A Week';
$lang->product->task->daysOptions[10] = '10 Days';
$lang->product->task->daysOptions[15] = 'Half Month';
$lang->product->task->daysOptions[30] = 'A Month';

$lang->product->roleCode = 'Role Code, it should be english or digital.';
$lang->product->roleName = 'Role Name';
$lang->product->copyTip  = 'Copy the fields, actions and roles of current product to the selected one.';

if(!isset($lang->product->error)) $lang->product->error = new stdclass();
$lang->product->error->createTableFail = 'Failed to create the extension table of product.';
$lang->product->error->renameTableFail = 'Failed to rename the extension table of product.';
$lang->product->error->exist           = 'Exist product with same name and spec.';

$lang->product->createFromOrder       = 'Create From Order';
$lang->product->batchCreate           = 'Batch Create';
$lang->product->import                = 'Import';
$lang->product->exportTemplate        = 'Export Template';
$lang->product->browseProperties      = 'Browse Spec & Unit';
$lang->product->batchCreateProperties = 'Batch Create Spec & Unit';
$lang->product->createProperty        = 'Create Spec & Unit';
$lang->product->editProperty          = 'Edit Spec & Unit';
$lang->product->deleteProperty        = 'Delete Spec & Unit';

$lang->product->category = 'Category';
$lang->product->pinyin   = 'Pinyin';
$lang->product->model    = 'Spec';
$lang->product->unit     = 'Unit';
$lang->product->barcode  = 'Barcode';
$lang->product->brand    = 'Brand';
$lang->product->store    = 'Stpre';
$lang->product->price    = 'Price';
$lang->product->amount   = 'Amount';

$lang->product->models    = array();
$lang->product->units     = array();
$lang->product->expresses = array();

$lang->product->createCategory = 'New';
$lang->product->createModel    = 'New';
$lang->product->createUnit     = 'New';
$lang->product->input          = 'Input';
$lang->product->search         = 'Search';

$lang->product->property = new stdclass();
$lang->product->property->models    = 'Specs';
$lang->product->property->units     = 'Units';
$lang->product->property->expresses = 'Expresses';

$lang->product->placeholder->batchCreate = new stdclass();
$lang->product->placeholder->batchCreate->category = 'The record with empty category will not be saved.';
$lang->product->placeholder->batchCreate->name     = 'The record with empty name will not be saved.';
$lang->product->placeholder->batchCreate->code     = 'The record with empty code not be saved.';
