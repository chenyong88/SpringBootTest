<?php
/**
 * The create result view file of workflow module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     workflow 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?>
<?php include '../../../sys/common/view/datepicker.html.php';?>
<?php js::set('module', $module->module);?>
<ul id='menuTitle'>
  <li><?php echo html::a(inlink('browse', "parent=all&type={$module->type}&app={$module->app}"), $lang->workflow->browse);?></li>
  <li class='divider angle'></li>
  <li><?php echo html::a(inlink('adminAction', "module={$module->module}"), $module->name);?></li>
  <li class='divider angle'></li>
  <li><?php echo html::a(inlink('adminResult', "actionID={$action->id}"), $action->name);?></li>
  <li class='divider angle'></li>
  <li class='title'><?php echo str_replace('-', '', $title);?></li>
</ul>
<form id='ajaxForm' method='post' action='<?php echo inlink('createResult', "actionID={$action->id}");?>'>
  <div id='conditionDIV' class='panel hide'>
    <div class='panel-heading'>
      <strong><?php echo $lang->workflowaction->condition->common;?></strong>
    </div>
    <div class='panel-body'>
      <table class='table table-form w-p60'>
        <tr>
          <th class='w-80px'><?php echo $lang->workflowaction->result->conditionType;?></th>
          <td colspan='4'><?php echo html::select('conditionType', $lang->workflowaction->result->conditionTypes, 'data', "class='form-control'");?></td>
        </tr>
        <tr class='sqlTR'>
          <th><?php echo $lang->workflowfield->sql;?></th>
          <td colspan='4'><?php echo html::textarea('sql', '', "rows='5' class='form-control' placeholder='{$lang->workflow->placeholder->resultSql}'");?></td>
        </tr>
        <tr class='sqlTR'>
          <th><?php echo $lang->workflowfield->vars;?></th>
          <td class='w-160px'><?php echo html::input('varName[]', '', "id='varName' class='form-control' placeholder='{$lang->workflowfield->varName}'");?></td>
          <th class='w-20px'><?php echo $lang->workflowaction->result->value;?></th>
          <td class='w-200px nopaddingright'>
            <?php echo html::select('paramType[]', $datasources, 'custom', "id='paramType' class='form-control'");?>
          </td>
          <td class='nopaddingleft'>
            <?php echo html::input('param[]', '', "id='param' class='form-control'");?>
            <span class='param'><?php echo html::select('param[]', '', '', "id='param' class='form-control chosen'");?></span>
          </td>
          <td class='w-60px nopaddingleft'>
            <a href='#'><i class='addVar icon-plus icon-large'></i></a>
            <a href='#'><i class='delVar icon-remove icon-large'></i></a>
          </td>
        </tr>
        <tr class='sqlTR'>
          <th><?php echo $lang->workflowaction->result->conditionResult;?></th>
          <td colspan='4'><?php echo html::select('sqlResult', $lang->workflowaction->result->sqlResult, 'empty', "class='form-control'");?></td>
        </tr>
        <tr class='dataTR'>
          <th class='w-80px'>
            <?php echo $lang->workflowfield->field;?>
            <?php echo html::hidden("conditions[logicalOperator][]", 'and');?>
          </th>
          <td class='w-160px'><?php echo html::select('conditions[field][]', $fields, '', "id='conditionsfield' class='form-control chosen'");?></td>
          <th class='w-20px'></th>
          <td class='w-200px nopaddingright'>
            <div class='input-group'>
              <?php $conditionDatasources = $datasources;?>
              <?php unset($conditionDatasources['form']);?>
              <?php unset($conditionDatasources['record']);?>
              <?php echo html::select('conditions[operator][]', $lang->workflowaction->operatorList, 'equal', "class='form-control'");?>
              <span class='input-group-addon fix-border fix-padding'></span>
              <?php echo html::select('conditions[paramType][]', $conditionDatasources, 'custom', "id='paramType' class='form-control'");?>
            </div>
          </td>
          <td class='nopaddingleft'>
            <?php echo html::input('conditions[param][]', '', "id='param' class='form-control'");?>
            <span class='param'><?php echo html::select('conditions[param][]', '', '', "id='param' class='form-control chosen'");?></span>
          </td>
          <td class='w-60px nopaddingleft'>
            <a href='#'><i class='addCondition icon-plus icon-large'></i></a>
          </td>
        </tr>
      </table>
    </div>
  </div>
  <div class='panel'>
    <div class='panel-heading'>
      <strong><?php echo $lang->workflowaction->result->common;?></strong>
    </div>
    <div class='panel-body'>
      <table class='table table-form w-p60'>
        <tr>
          <th class='w-80px'><?php echo $lang->workflowaction->common;?></th>
          <td class='w-160px'><?php echo html::select('action', $lang->workflowaction->result->actions, 'update', "class='form-control'");?></td>
          <th class='w-20px'><?php echo $lang->workflowaction->result->table;?></th>
          <td class='w-200px nopaddingright'><?php echo html::select('table', $tables, $module->module, "class='form-control chosen'");?></td>
          <td></td>
          <td class='w-60px'></td>
        </tr>
        <tr class='fieldTR'>
          <th class='w-80px'><?php echo $lang->workflowfield->field;?></th>
          <td class='w-160px'><?php echo html::select('fields[field][]', $fields, '', "id='fieldsfield' class='form-control chosen field'");?></td>
          <th class='w-20px'><?php echo $lang->workflowaction->result->value;?></th>
          <td class='w-200px nopaddingright'>
            <?php echo html::select('fields[paramType][]', $datasources, 'custom', "id='paramType' class='form-control'");?>
          </td>
          <td class='nopaddingleft'>
            <?php echo html::input('fields[param][]', '', "id='param' class='form-control'");?>
            <span class='param'><?php echo html::select('fields[param][]', '', '', "id='param' class='form-control chosen'");?></span>
          </td>
          <td class='w-60px nopaddingleft'>
            <a href='#'><i class='addField icon-plus icon-large'></i></a>
          </td>
        </tr>
        <tr class='whereTR'>
          <th>
            <?php echo $lang->workflowaction->condition->operator;?>
            <?php echo html::hidden("wheres[logicalOperator][]", 'and');?>
          </th>
          <td><?php echo html::select('wheres[field][]', $fields, '', "id='wheresfield' class='form-control chosen field'");?></td>
          <th></th>
          <td class='nopaddingright'>
            <div class='input-group'>
              <?php echo html::select('wheres[operator][]', $lang->workflowaction->operatorList, 'equal', "class='form-control'");?>
              <span class='input-group-addon fix-border fix-padding'></span>
              <?php echo html::select('wheres[paramType][]', $datasources, 'custom', "id='paramType' class='form-control'");?>
            </div>
          </td>
          <td class='nopaddingleft'>
            <?php echo html::input('wheres[param][]', '', "id='param' class='form-control'");?>
            <span class='param'><?php echo html::select('wheres[param][]', '', '', "id='param' class='form-control chosen'");?></span>
          </td>
          <td class='nopaddingleft'>
            <a href='#'><i class='addWhere icon-plus icon-large'></i></a>
          </td>
        </tr>
        <tr id='defaultWhere'>
          <th>
            <?php echo $lang->workflowaction->condition->operator;?>
            <?php echo html::hidden("wheres[logicalOperator][]", 'and');?>
          </th>
          <td>
            <?php echo html::input('', zget($fields, 'id'), "class='form-control' disabled='disabled'");?>
            <?php echo html::hidden('wheres[field][]', 'id');?>
          </td>
          <th></th>
          <td class='nopaddingright'>
            <div class='input-group'>
              <?php echo html::input('', zget($lang->workflowaction->operatorList, 'equal'), "class='form-control' disabled='disabled'");?>
              <?php echo html::hidden('wheres[operator][]', 'equal');?>
              <span class='input-group-addon fix-border fix-padding'></span>
              <?php echo html::input('', zget($datasources, 'record'), "class='form-control' disabled='disabled'");?>
              <?php echo html::hidden('wheres[paramType][]', 'record');?>
            </div>
          </td>
          <td class='nopaddingleft'>
            <?php echo html::input('', zget($fields, 'id'), "class='form-control' disabled='disabled' style='border-radius: 0 4px 4px 0'");?>
            <?php echo html::hidden('wheres[param][]', 'id');?>
          </td>
          <td></td>
        </tr>
        <tr>
          <th><?php echo $lang->workflowaction->result->message;?></th>
          <td colspan='4'><?php echo html::input('message', '', "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->comment;?></th>
          <td colspan='4'><?php echo html::textarea('comment', '', "class='form-control' rows='3'");?></td>
        </tr>
      </table>
    </div>
  </div>
  <div class='w-p60 text-center'>
    <?php echo html::hidden('condition', 0);?>
    <?php echo html::a('#', $lang->workflowaction->condition->common, "class='btn btn-primary toggleCondition'");?>
    <?php echo html::submitButton();?>
  </div>
</form>

<div id='actionFieldsDIV' class='hide'>
  <option></option>
  <?php 
  foreach($actionFields as $field)
  {
      echo "<option value='{$field->field}'>{$field->name}</option>";
  }
  ?>
</div>
<div id='formFieldsDIV' class='hide'>
  <option></option>
  <?php 
  foreach($actionFields as $field)
  {
      if($field->show) echo "<option value='{$field->field}'>{$field->name}</option>";
  }
  ?>
</div>

<?php
$varName   = html::input('varName[]', '', "class='form-control' placeholder='{$lang->workflowfield->varName}'");
$paramType = html::select('paramType[]', $datasources, 'custom', "id='paramType' class='form-control'");
$input     = html::input('param[]', '', "id='param' class='form-control'");
$select    = html::select('param[]', '', '', "id='param' class='form-control chosen'");
$varRow = <<<EOT
  <tr class='sqlTR'>
    <th>{$lang->workflowfield->vars}</th>
    <td class='w-160px'>{$varName}</td>
    <th class='w-20px'>{$lang->workflowaction->result->value}</th>
    <td class='w-200px nopaddingright'>{$paramType}</td>
    <td class='nopaddingleft'>
      {$input}
      <span class='param'>{$select}</span>
    </td>
    <td class='w-60px nopaddingleft'>
      <a href='#'><i class='addVar icon-plus icon-large'></i></a>
      <a href='#'><i class='delVar icon-remove icon-large'></i></a>
    </td>
  </tr>
EOT;

$logicOperater = html::select('conditions[logicalOperator][]', $lang->workflowaction->result->logicalOperators, '', "class='form-control'");
$field         = html::select('conditions[field][]', $fields, '', "class='form-control chosen'");
$operator      = html::select('conditions[operator][]', $lang->workflowaction->operatorList, 'equal', "class='form-control'");
$paramType     = html::select('conditions[paramType][]', $conditionDatasources, 'custom', "id='paramType' class='form-control'");
$input         = html::input('conditions[param][]', '', "id='param' class='form-control'");
$select        = html::select('conditions[param][]', '', '', "id='param' class='form-control chosen'");
$conditionRow = <<<EOT
  <tr class="dataTR">
    <th>{$logicOperater}</th>
    <td>{$field}</td>
    <th></th>
    <td class="nopaddingright">
      <div class="input-group">
        {$operator}
        <span class="input-group-addon fix-border fix-padding"></span>
        {$paramType}
      </div>
    </td>
    <td class="nopaddingleft">
      {$input}
      <span class='param'>{$select}</span>
    </td>
    <td class="nopaddingleft">
      <a href="#"><i class="addCondition icon-plus icon-large"></i></a>
      <a href="#"><i class="delCondition icon-remove icon-large"></i></a>
    </td>
  </tr>
EOT;

$field     = html::select('fields[field][]', $fields, '', "class='form-control chosen field'");
$paramType = html::select('fields[paramType][]', $datasources, 'custom', "id='paramType' class='form-control'");
$input     = html::input('fields[param][]', '', "id='param' class='form-control'");
$select    = html::select('fields[param][]', '', '', "id='param' class='form-control chosen'");
$fieldRow  = <<<EOT
  <tr class="fieldTR">
    <th>{$lang->workflowfield->field}</th>
    <td>{$field}</td>
    <th>{$lang->workflowaction->result->value}</th>
    <td class='nopaddingright'>{$paramType}</td>
    <td class='nopaddingleft'>
      {$input}
      <span class='param'>{$select}</span>
    </td>
    <td class='nopaddingleft'>
      <a href='#'><i class="addField icon-plus icon-large"></i></a>
      <a href='#'><i class="delField icon-remove icon-large"></i></a>
    </td>
  </tr>
EOT;

$logicOperater = html::select('wheres[logicalOperator][]', $lang->workflowaction->result->logicalOperators, '', "class='form-control'");
$field         = html::select('wheres[field][]', $fields, '', "id='field' class='form-control field'");
$operator      = html::select('wheres[operator][]', $lang->workflowaction->operatorList, 'equal', "class='form-control'");
$paramType     = html::select('wheres[paramType][]', $datasources, 'custom', "id='paramType' class='form-control'");
$input         = html::input('wheres[param][]', '', "id='param' class='form-control'");
$select        = html::select('wheres[param][]', '', '', "id='param' class='form-control chosen'");
$whereRow = <<<EOT
  <tr class="whereTR">
    <th>{$logicOperater}</th>
    <td>{$field}</td>
    <th></th>
    <td class="nopaddingright">
      <div class="input-group">
        {$operator}
        <span class="input-group-addon fix-border fix-padding"></span>
        {$paramType}
      </div>
    </td>
    <td class="nopaddingleft">
      {$input}
      <span class='param'>{$select}</span>
    </td>
    <td class="nopaddingleft">
      <a href="#"><i class="addWhere icon-plus icon-large"></i></a>
      <a href="#"><i class="delWhere icon-remove icon-large"></i></a>
    </td>
  </tr>
EOT;

js::set('varRow', $varRow);
js::set('conditionRow', $conditionRow);
js::set('fieldRow', $fieldRow);
js::set('whereRow', $whereRow);
?>
<?php include '../../common/view/footer.html.php';?>
