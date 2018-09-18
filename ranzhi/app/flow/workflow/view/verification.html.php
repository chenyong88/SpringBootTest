<?php
/**
 * The verification view file of workflow module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Tingting Dai <daitingting@xirangit.com>
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
  <li><?php echo html::a(inlink('verification', "actionID={$action->id}"), $action->name);?></li>
  <li class='divider angle'></li>
  <li class='title'><?php echo str_replace('-', '', $title);?></li>
</ul>
<form id='ajaxForm' method='post' action='<?php echo inlink('verification', "actionID={$action->id}");?>'>
  <div class='panel'>
    <div class='panel-heading'>
      <strong><?php echo $lang->workflow->verification;?></strong>
    </div>
    <table class='table table-form w-p60'>
      <tr>
        <th class='w-80px'><?php echo $lang->workflowaction->verification->type;?></th>
        <td colspan='4'><?php echo html::select('type', $lang->workflowaction->verification->types, !empty($action->verifications->type) ? $action->verifications->type : 'data', "class='form-control'");?></td>
      </tr>
      <tr class='sqlTR'>
        <th><?php echo $lang->workflowfield->sql;?></th>
        <td colspan='4'><?php echo html::textarea('sql', !empty($action->verifications->sql) ? $action->verifications->sql : '', "rows='5' class='form-control' placeholder='{$lang->workflow->placeholder->resultSql}'");?></td>
      </tr>
      <?php if(!empty($action->verifications->sqlVars)):?>
      <?php foreach($action->verifications->sqlVars as $sqlVar):?>
      <tr class='sqlTR'>
        <th><?php echo $lang->workflowfield->vars;?></th>
        <td class='w-160px'><?php echo html::input('varName[]', $sqlVar->varName, "id='varName' class='form-control' placeholder='{$lang->workflowfield->varName}'");?></td>
        <th class='w-20px'><?php echo $lang->workflowaction->result->value;?></th>
        <td class='w-200px nopaddingright'>
          <?php echo html::select('paramType[]', $datasources, $sqlVar->paramType, "id='paramType' class='form-control'");?>
        </td>
        <td class='nopaddingleft'>
          <?php echo html::input('param[]', $sqlVar->param, "id='param' class='form-control'");?>
          <span class='param'><?php echo html::select('param[]', array($sqlVar->param => ''), $sqlVar->param, "id='param' class='form-control chosen'");?></span>
        </td>
        <td class='w-60px nopaddingleft'>
          <a href='#'><i class='addVar icon-plus icon-large'></i></a>
          <a href='#'><i class='delVar icon-remove icon-large'></i></a>
        </td>
      </tr>
      <?php endforeach;?>
      <?php endif;?>
      <tr class='sqlTR'>
        <th><?php echo $lang->workflowfield->vars;?></th>
        <td class='w-160px'><?php echo html::input('varName[]', '', "id='varName' class='form-control' placeholder='{$lang->workflowfield->varName}'");?></td>
        <th class='w-20px'><?php echo $lang->workflowaction->result->value;?></th>
        <td class='w-200px nopaddingright'>
          <?php echo html::select('paramType[]', $datasources, $action->action == 'create' ? 'form' : 'record', "id='paramType' class='form-control'");?>
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
        <th><?php echo $lang->workflowaction->verification->result;?></th>
        <td colspan='4'><?php echo html::select('sqlResult', $lang->workflowaction->verification->sqlResult, isset($action->verifications->sqlResult) ? $action->verifications->sqlResult : 'empty', "class='form-control'");?></td>
      </tr>
      <?php if(!empty($action->verifications->fields)):?>
      <?php foreach($action->verifications->fields as $key => $verification):?>
      <tr class='dataTR'>
        <th class='w-80px'>
          <?php if($key == 0):?>
          <?php echo $lang->workflowfield->field;?>
          <?php echo html::hidden("verifications[logicalOperator][]", $verification->logicalOperator);?>
          <?php else:?>
          <?php echo html::select("verifications[logicalOperator][]", $lang->workflowaction->result->logicalOperators, $verification->logicalOperator, "class='form-control'");?>
          <?php endif;?>
        </th>
        <td class='w-160px'><?php echo html::select('verifications[field][]', $fields, $verification->field, "id='verificationsfield' class='form-control chosen'");?></td>
        <th class='w-20px'></th>
        <td class='w-200px nopaddingright'>
          <div class='input-group'>
            <?php $conditionDatasources = $datasources;?>
            <?php unset($conditionDatasources['form']);?>
            <?php unset($conditionDatasources['record']);?>
            <?php echo html::select('verifications[operator][]', $lang->workflowaction->operatorList, $verification->operator, "class='form-control'");?>
            <span class='input-group-addon fix-border fix-padding'></span>
            <?php echo html::select('verifications[paramType][]', $conditionDatasources, $verification->paramType, "id='paramType' class='form-control'");?>
          </div>
        </td>
        <td class='nopaddingleft'>
          <?php echo html::input('verifications[param][]', $verification->param, "id='param' class='form-control'");?>
          <span class='param'><?php echo html::select('verifications[param][]', array($verification->param => ''), $verification->param, "id='param' class='form-control chosen'");?></span>
        </td>
        <td class='w-60px nopaddingleft'>
          <a href='#'><i class='addVerification icon-plus icon-large'></i></a>
          <?php if($key > 0):?>
          <a href='#'><i class='delVerification icon-remove icon-large'></i></a>
          <?php endif;?>
        </td>
      </tr>
      <?php endforeach;?>
      <?php endif;?>
      <tr class='dataTR'>
        <th class='w-80px'>
          <?php echo $lang->workflowfield->field;?>
          <?php echo html::hidden("verifications[logicalOperator][]", 'and');?>
        </th>
        <td class='w-160px'><?php echo html::select('verifications[field][]', $fields, '', "id='verificationsfield' class='form-control chosen'");?></td>
        <th class='w-20px'></th>
        <td class='w-200px nopaddingright'>
          <div class='input-group'>
            <?php $conditionDatasources = $datasources;?>
            <?php unset($conditionDatasources['form']);?>
            <?php unset($conditionDatasources['record']);?>
            <?php echo html::select('verifications[operator][]', $lang->workflowaction->operatorList, 'equal', "class='form-control'");?>
            <span class='input-group-addon fix-border fix-padding'></span>
            <?php echo html::select('verifications[paramType][]', $conditionDatasources, 'custom', "id='paramType' class='form-control'");?>
          </div>
        </td>
        <td class='nopaddingleft'>
          <?php echo html::input('verifications[param][]', '', "id='param' class='form-control'");?>
          <span class='param'><?php echo html::select('verifications[param][]', '', '', "id='param' class='form-control chosen'");?></span>
        </td>
        <td class='w-60px nopaddingleft'>
          <a href='#'><i class='addVerification icon-plus icon-large'></i></a>
        </td>
      </tr>
      <tr>
        <th><?php echo $lang->workflowaction->result->message;?></th>
        <td colspan='4'><?php echo html::input('message', isset($action->verifications->message) ? $action->verifications->message : '', "class='form-control' placeholder='{$lang->workflow->placeholder->verify}'");?></td>
      </tr>
      <tr>
        <th></th>
        <td colspan='5'>
          <?php echo html::submitButton();?>
          <?php echo html::backButton();?>
        </td>
      </tr>
    </table>
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

$logicOperater = html::select('verifications[logicalOperator][]', $lang->workflowaction->result->logicalOperators, '', "class='form-control'");
$field         = html::select('verifications[field][]', $fields, '', "class='form-control chosen'");
$operator      = html::select('verifications[operator][]', $lang->workflowaction->operatorList, 'equal', "class='form-control'");
$paramType     = html::select('verifications[paramType][]', $conditionDatasources, 'custom', "id='paramType' class='form-control'");
$input         = html::input( 'verifications[param][]', '', "id='param' class='form-control'");
$select        = html::select('verifications[param][]', '', '', "id='param' class='form-control chosen'");
$verificationRow = <<<EOT
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
      <a href="#"><i class="addVerification icon-plus icon-large"></i></a>
      <a href="#"><i class="delVerification icon-remove icon-large"></i></a>
    </td>
  </tr>
EOT;
js::set('varRow', $varRow);
js::set('verificationRow', $verificationRow);
?>
<?php include '../../common/view/footer.html.php';?>
