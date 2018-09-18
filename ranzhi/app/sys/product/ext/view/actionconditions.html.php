<?php 
/**
 * The action conditions view file of product module of Ranzhi.
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
<form method='post' id='ajaxForm' action="<?php echo inlink('actionConditions', "actionID={$action->id}");?>">
  <table class='table table-form'>
    <tr class='text-center'>
      <th class='w-160px'><?php echo $lang->product->field->field;?></th>
      <th class='w-160px'><?php echo $lang->product->action->conditions;?></th>
      <th><?php echo $lang->product->action->param;?></th>
      <th class='w-50px'><?php echo $lang->actions;?></th>
    </tr>
    <?php
    foreach($action->conditions as $condition):
    ?>
    <tr>
      <td><?php echo html::select("field[]", $conditionFields, $condition->field, "class='form-control'");?></td>
      <td><?php echo html::select("operater[]", $lang->order->operaterList, $condition->operater, "class='form-control'");?></td>
      <td><?php echo html::input("param[]", $condition->param, "class='form-control'");?></td>
      <td class='text-center'>
        <?php echo html::a('javascript:;', "<i class='icon-plus icon-large'></i>");?>
        <?php echo html::a('javascript:;', "<i class='icon-remove icon-large'></i>");?>
      </td>
    </tr>
    <?php endforeach;?>
    <tr><td colspan='4'><?php echo html::submitButton();?></td></tr>
  </table>
</form>
<table class='hide'>
  <tr id='originTR'>
    <td><?php echo html::select('field[]', $conditionFields, '', "class='form-control'");?></td>
    <td><?php echo html::select("operater[]", $lang->order->operaterList, '', "class='form-control'");?></td>
    <td><?php echo html::input("param[]", '', "class='form-control'");?></td>
    <td class='text-center'>
      <?php echo html::a('javascript:;', "<i class='icon-plus icon-large'></i>");?>
      <?php echo html::a('javascript:;', "<i class='icon-remove icon-large'></i>");?>
    </td>
  </tr>
</table>
<?php include '../../../common/view/footer.modal.html.php';?>
