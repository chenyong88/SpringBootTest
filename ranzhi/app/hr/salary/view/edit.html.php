<?php
/**
 * The edit view file of salary module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     salary 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../common/view/header.html.php';?>
<ul id='menuTitle'>
  <li><?php if(!commonModel::printLink('salary', 'company', "mode=browse&month={$salary->month}", $lang->salary->common)) echo $lang->salary->common;?></li>
  <li class='divider angle'></li>
  <li class='title'><?php echo zget($users, $salary->account);?></li>
  <li class='divider angle'></li>
  <li class='title'><?php echo $lang->salary->edit;?></li>
</ul>
<form id='ajaxForm' method='post'>
  <div class='row'>
    <div class='itemGroup'>
      <div class='panel panel-basic'>
        <div class='panel-heading'>
          <strong><?php echo $lang->salary->basic;?></strong>
        </div>
        <div class='panel-body'>
          <?php foreach($config->salary->basicFields as $field):?>
          <div class='input-group'>
            <span class='input-group-addon'><?php echo $lang->salary->$field;?></span>
            <?php echo html::input($field, $salary->$field, "class='form-control'");?>
          </div>
          <?php endforeach;?>
        </div>
      </div>
    </div>
    <?php $hasTax = false;?>
    <?php foreach($config->salary->detailFields as $item):?>
    <div class='itemGroup'>
      <div class='panel panel-<?php echo $item;?>'>
        <div class='panel-heading'>
          <strong>
            <?php echo $lang->salary->$item . " <span class='total{$item}'>" . $salary->$item . '</span>';?>
            <?php echo html::hidden($item, $salary->$item, "class='total{$item}'");?>
          </strong>
        </div>
        <div class='panel-body'>
          <?php $itemList = $item . 'List';?>
          <?php foreach($salary->$itemList as $field):?>
          <?php if($field->type == $lang->salary->tax) $hasTax = true;?>
          <div class='input-group itemDiv'>
            <?php $name = isset($lang->salary->$itemList) ? zget($lang->salary->$itemList, $field->type) : $field->type;?>
            <span class='input-group-addon'><?php echo $name;?></span>
            <?php echo html::hidden("items[]", $item, "class='item'");?>
            <?php echo html::hidden("types[]", $field->type);?>
            <?php $class = $field->type == $lang->salary->tax ? 'tax' : '';?>
            <?php echo html::input("amounts[]", $field->amount, "class='form-control amount $item $class'");?>
            <span class='input-group-btn'>
              <?php if($name == $lang->salary->bonusList['commission'] && ($saleRule->rule || !empty($lineRule))):?>
              <?php echo html::a(inlink('setCommission', "salaryID={$salary->id}"), $lang->salary->detail, "class='btn btn-default' data-toggle='modal'");?>
              <?php echo html::hidden('commissionList');?>
              <?php endif;?>
              <a href='#' class='btn btn-default addItem'><i class='icon-plus'></i></a>
              <a href='#' class='btn btn-default delItem'><i class='icon-remove'></i></a>
            </span>
          </div>
          <?php endforeach;?>
          <?php if($item == 'deduction' && !$hasTax):?>
          <div class='input-group itemDiv' style='display:none'>
            <span class='input-group-addon'><?php echo $lang->salary->tax;?></span>
            <?php echo html::hidden("items[]", $item, "class='item'");?>
            <?php echo html::hidden("types[]", $lang->salary->tax);?>
            <?php echo html::input("amounts[]", 0.00, "class='form-control amount $item tax'");?>
            <span class='input-group-btn'>
              <a href='#' class='btn btn-default addItem'><i class='icon-plus'></i></a>
              <a href='#' class='btn btn-default delItem'><i class='icon-remove'></i></a>
            </span>
          </div>
          <?php endif;?>
          <div class='input-group itemDiv'>
            <?php echo html::hidden("items[]", $item, "class='item'");?>
            <?php echo html::input("types[]", '', "class='form-control' placeholder='{$lang->salary->name}'");?>
            <span class='input-group-addon fix-border'></span>
            <?php echo html::input("amounts[]", '', "class='form-control amount $item' placeholder='{$lang->salary->amount}'");?>
            <span class='input-group-btn'>
              <a href='#' class='btn btn-default addItem'><i class='icon-plus'></i></a>
              <a href='#' class='btn btn-default delItem'><i class='icon-remove'></i></a>
            </span>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach;?>
  </div>
  <div class='page-actions'><?php echo html::submitButton() . ' ' . html::backButton();?></div>
</form>
<?php
$itemDiv = <<<EOT
  <div class='input-group itemDiv'>
    <input type="hidden" value="itemValue" name="items[]" class='item'>
    <input type="text" value="" name="types[]" class="form-control" placeholder="{$lang->salary->name}">
    <span class='input-group-addon fix-border'></span>
    <input type="text" value="" name="amounts[]" class="form-control amount itemValue" placeholder="{$lang->salary->amount}">
    <span class='input-group-btn'>
      <a href='#' class='btn btn-default addItem'><i class='icon-plus'></i></a>
      <a href='#' class='btn btn-default delItem'><i class='icon-remove'></i></a>
    </span>
  </div>
EOT;
?>
<?php js::set('itemDiv', $itemDiv);?>
<?php include '../../common/view/footer.html.php';?>
