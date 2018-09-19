<?php
/**
 * The admin condition view file of workflow module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     workflow
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../sys/common/view/header.modal.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?>
<?php include '../../../sys/common/view/datepicker.html.php';?>
<?php js::set('module', $action->module);?>
<form id='ajaxForm' method='post' action='<?php echo inlink('adminCondition', "actionID={$action->id}");?>'>
  <table class='table table-condensed table-borderless table-condition'>
    <tr>
      <th class='w-80px text-right'><?php echo $lang->workflowaction->result->conditionType;?></th>
      <td colspan='4'><?php echo html::select('conditionType', $lang->workflowaction->result->conditionTypes, isset($action->conditions->conditionType) ? $action->conditions->conditionType : 'data', "class='form-control'");?></td>
    </tr>
    <tr class='sqlTR'>
      <th class='text-right'><?php echo $lang->workflowfield->sql;?></th>
      <td colspan='4'><?php echo html::textarea('sql', isset($action->conditions->sql) ? $action->conditions->sql : '', "rows='5' class='form-control' placeholder='{$lang->workflow->placeholder->resultSql}'");?></td>
    </tr>
    <tr class='sqlTR'>
      <th class='text-right'><?php echo $lang->workflowaction->result->conditionResult;?></th>
      <td colspan='4'><?php echo html::select('sqlResult', $lang->workflowaction->condition->sqlResult, isset($action->conditions->sqlResult) ? $action->conditions->sqlResult : 'empty', "class='form-control'");?></td>
    </tr>

    <?php if(!empty($action->conditions->fields)):?>
    <?php foreach($action->conditions->fields as $field):?>
    <tr class='dataTR'>
      <th class='text-right'><?php echo html::select('logicalOperator[]', $lang->workflowaction->result->logicalOperators, isset($field->logicalOperator) ? $field->logicalOperator : '', "class='form-control'");?></th>
      <td class='w-140px'><?php echo html::select("field[]", $fields, $field->field, "class='form-control chosen'");?></td>
      <td><?php echo html::select("operator[]", $lang->workflowaction->operatorList, $field->operator, "class='form-control'");?></td>
      <td id='paramTD'><?php $this->ajaxGetFieldControl($action->module, $field->field, $field->param, $elementName = base64_encode('param[]'), $elementID = 'param');?></td>
      <td class='text-center text-middle'>
        <?php echo html::a('javascript:;', "<i class='icon-plus icon-large'></i>");?>
        <?php echo html::a('javascript:;', "<i class='icon-remove icon-large'></i>");?>
      </td>
    </tr>
    <?php endforeach;?>
    <?php endif;?>
    <tr class='dataTR'>
      <th class='text-right'><?php echo html::select('logicalOperator[]', $lang->workflowaction->result->logicalOperators, '', "class='form-control'");?></th>
      <td class='w-140px'><?php echo html::select("field[]", $fields, '', "class='form-control chosen'");?></td>
      <td class='w-80px'><?php echo html::select("operator[]", $lang->workflowaction->operatorList, '', "class='form-control'");?></td>
      <td id='paramTD'><?php echo html::input("param[]", '', "class='form-control'");?></td>
      <td class='w-60px text-center text-middle'>
        <?php echo html::a('javascript:;', "<i class='icon-plus icon-large'></i>");?>
        <?php echo html::a('javascript:;', "<i class='icon-remove icon-large'></i>");?>
      </td>
    </tr>
    <tr>
      <th></th>
      <td colspan='4'><?php echo html::submitButton();?></td>
    </tr>
  </table>
</form>
<?php
$field         = html::select("field[]", $fields, '', "class='form-control chosen'");
$operator      = html::select("operator[]", $lang->workflowaction->operatorList, '', "class='form-control'");
$logicOperater = html::select('logicalOperator[]', $lang->workflowaction->result->logicalOperators, '', "class='form-control'");
$itemRow = <<<EOT
  <tr>
    <th>{$logicOperater}</th>
    <td>{$field}</td>
    <td>{$operator}</td>
    <td id='paramTD'><input type="text" value= "" name="param[]" id="param[]" class="form-control"></td>
    <td class='text-center text-middle'>
      <a href="javascript:;"><i class="icon-plus icon-large"></i></a>
      <a href="javascript:;"><i class="icon-remove icon-large"></i></a>
    </td>
  </tr>
EOT;
js::set('itemRow', $itemRow);
?>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
