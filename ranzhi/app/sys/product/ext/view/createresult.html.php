<?php 
/**
 * The create result view file of product module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     product 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../common/view/header.modal.html.php';?>
<form method='post' id='ajaxForm' action='<?php echo inlink('createResult', "actionID={$action->id}");?>'>
  <table class='table table-form'>
    <tr>
      <th class='w-60px'><?php echo $lang->product->field->field;?></th>
      <td><?php echo html::select("field", $inputFields, '', "class='form-control'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->product->action->conditions;?></th>
      <td>
        <div class='input-group'>
          <?php echo html::hidden("conditions[logicalOperator][]", '', "class='hide'");?>
          <?php echo html::select("conditions[field][]", $conditionFields, '', "class='form-control'");?>
          <span class='input-group-addon fix-border fix-padding'></span>
          <?php echo html::select("conditions[operater][]", $lang->order->operaterList, '', "class='form-control'");?>
          <span class='input-group-addon fix-border fix-padding'></span>
          <?php echo html::input("conditions[param][]", '', "class='form-control'");?>
          <span class="input-group-btn">
            <a href='#' class='btn btn-default'><i class="icon-plus"></i></a>
            <a href='#' class='btn btn-default'><i class="icon-remove"></i></a>
          </span >
        </div>
      </td>
    </tr>
    <tr>
      <th><?php echo $lang->product->action->results;?></th>
      <td>
        <div class='input-group'> 
          <?php echo html::select("result", $lang->order->resultsOptions, '', "class='form-control'");?>
          <span class='input-group-addon fix-border fix-padding' style='display: none'></span>
          <?php echo html::input('resultValue', '', "class='form-control' style='display: none'");?>
        <div>
      </td>
    </tr>
    <tr>
      <td></td>
      <td><?php echo html::submitButton();?></td>
    </tr>
  </table>
</form>
<?php /* Hidden condation group. */ ?>
<div id='conditionGroup' class='hide'>
  <div class='input-group'>
    <?php echo html::select("conditions[logicalOperator][key]", $lang->order->logicalOperators, '', "id='logicalOperatorkey' class='form-control'");?>
    <span class='input-group-addon fix-border fix-padding'></span>
    <?php echo html::select("conditions[field][key]", $conditionFields, '', "class='form-control'");?>
    <span class='input-group-addon fix-border fix-padding'></span>
    <?php echo html::select("conditions[operater][key]", $lang->order->operaterList, '', "class='form-control'");?>
    <span class='input-group-addon fix-border fix-padding'></span>
    <?php echo html::input("conditions[param][key]", '', "class='form-control'");?>
    <span class="input-group-btn">
      <a href='#' class='btn btn-default'><i class="icon-plus"></i></a>
      <a href='#' class='btn btn-default'><i class="icon-remove"></i></a>
    </span>
  </div>
</div>
<?php js::set('key', 1);?>
<?php include '../../../common/view/footer.modal.html.php';?>
