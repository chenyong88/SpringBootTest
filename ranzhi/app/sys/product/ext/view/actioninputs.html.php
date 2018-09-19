<?php 
/**
 * The action inputs view file of product module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     product 
 * @version     $Id $
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../common/view/header.modal.html.php';?>
<?php include '../../../common/view/chosen.html.php';?>
<form method='post' id='ajaxForm' action="<?php echo inlink('actionInputs', "actionID={$action->id}");?>">
  <table class='table table-form'>
    <tr class='text-center'>
      <th class='w-160px'><?php echo $lang->product->field->field;?></th>
      <th><?php echo $lang->product->field->rules;?></th>
      <th class='w-200px'><?php echo $lang->product->field->default;?></th>
      <th class='w-60px'><?php echo $lang->actions;?></th>
    </tr>
    <?php
    $i = 0;
    foreach($action->inputs as $field => $input):
    ?>
    <tr>
      <th><?php echo html::select("field[$i]", $inputFields, $field, "class='form-control'");?></th>
      <td><?php echo html::select("rules[$i][]", $lang->product->field->rulesList, $input->rules, "class='form-control chosen' multiple='multiple'");?></td>
      <td><?php echo html::input("default[$i]", $input->default, "class='form-control'");?></td>
      <td class='text-center'>
        <?php echo html::a('javascript:;', "<i class='icon-plus icon-large'></i>");?>
        <?php echo html::a('javascript:;', "<i class='icon-remove icon-large'></i>");?>
      </td>
    </tr>
    <?php $i++; endforeach;?>
    <?php js::set('key', $i);?>
    <tr><td colspan='4'><?php echo html::submitButton();?></td></tr>
  </table>
</form>
<table class='hide'>
  <tr id='originTR'>
    <th><?php echo html::select('field[key]', $inputFields, '', "class='form-control'");?></th>
    <td><?php echo html::select('rules[key][]', $lang->product->field->rulesList, '', "class='form-control rules' multiple='multiple'");?></td>
    <td><?php echo html::input('default[key]', '', "class='form-control'");?></td>
    <td class='text-center'>
      <?php echo html::a('javascript:;', "<i class='icon-plus icon-large'></i>");?>
      <?php echo html::a('javascript:;', "<i class='icon-remove icon-large'></i>");?>
    </td>
  </tr>
</table>
<?php include '../../../common/view/footer.modal.html.php';?>
