<?php 
/**
 * The action results view of product module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     product 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../common/view/header.html.php';?>
<?php include 'bread.html.php';?>
<div id='menuActions'><?php commonModel::printLink('product', 'createresult', "actionID={$action->id}", '<i class="icon-plus"></i> ' . $lang->product->action->createResult, "class='btn btn-primary' data-toggle='modal'");?></div>
<div class='panel'>
  <table class='table table-hover table-striped tablesorter table-data'>
    <thead>
      <tr class='text-center'>
        <th class='w-160px'><?php echo $lang->product->field->field;?></th>
        <th class='text-left'><?php echo $lang->product->action->conditions;?></th>
        <th class='w-200px'> <?php echo $lang->product->action->results;?></th>
        <th class='w-100px'><?php echo $lang->actions;?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($action->results as $key => $result):?>
      <tr class='text-center'>
        <td><?php echo $result->field;?></td>
        <td class='text-left'>
          <?php foreach($result->conditions as $condition):?>
          <?php echo $lang->order->logicalOperators[$condition->logicalOperator];?>
          <?php echo $fields[$condition->field];?>
          <?php echo $lang->order->operaterList[$condition->operator];?>
          <?php echo $condition->param;?>
          <?php endforeach;?>
        </td>
        <td><?php echo $result->result;?></td>
        <td>
          <?php
          echo html::a($this->createLink('product', 'editresult', "actionID={$action->id}&resultID=$key"), $lang->edit, "data-toggle='modal'");
          echo html::a($this->createLink('product', 'deleteresult', "actionID={$action->id}&resultID=$key"), $lang->delete, "class='deleter'");
          ?>
        </td>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</div>
<div class='page-actions'><?php commonModel::printLink('product', 'adminAction', "productID={$product->id}", $lang->goback, "class='btn btn-default'");?></div>
<?php include '../../../common/view/footer.html.php';?>
