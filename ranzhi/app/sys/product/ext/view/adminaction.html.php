<?php 
/**
 * The admin action view file of product module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     product 
 * @version     $Id $
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../common/view/header.html.php';?>
<?php include 'bread.html.php';?>
<div id='menuActions'>
  <?php commonModel::printLink('product', 'createAction', "productID={$productID}", '<i class="icon-plus"></i> ' . $lang->product->action->create, "class='btn btn-primary' data-toggle='modal' data-width='400'");?>
</div>
<div class='panel'>
  <table class='table table-hover table-striped tablesorter'>
    <thead>
      <tr class='text-center'>
        <th class='w-200px'><?php echo $lang->product->action->action;?></th>
        <th><?php echo $lang->product->action->name;?></th>
        <th class='w-180px'><?php echo $lang->actions;?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($actions as $action):?>
      <tr>
        <td><?php echo $action->action;?></td>
        <td><?php echo $action->name;?></td>
        <td>
          <?php
          commonModel::printLink('product', 'editAction',       "actionID={$action->id}", $lang->edit, "class='editr' data-toggle='modal' data-width='400'");
          commonModel::printLink('product', 'actionConditions', "actionID={$action->id}", $lang->product->action->conditions, "data-toggle='modal'");
          commonModel::printLink('product', 'actionInputs',     "actionID={$action->id}", $lang->product->action->inputs, "data-toggle='modal'");
          commonModel::printLink('product', 'actionResults',    "actionID={$action->id}", $lang->product->action->results);
          commonModel::printLink('product', 'deleteAction',     "actionID={$action->id}", $lang->delete, "class='deleter'");
          ?>
        </td>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</div>
<div class='page-actions'><?php commonModel::printLink('product', 'browse', '', $lang->goback, "class='btn btn-default'");?></div>
<?php include '../../../common/view/footer.html.php';?>
