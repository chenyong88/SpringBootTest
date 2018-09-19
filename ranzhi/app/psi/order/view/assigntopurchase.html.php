<?php
/**
 * The assign to purchase view file of order module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     order
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../sys/common/view/header.modal.html.php';?>
<?php include '../../../sys/common/view/kindeditor.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?>
<?php js::set('checked', false);?>
<form method='post' id='ajaxForm' action='<?php echo inlink('assignToPurchase', "id={$order->id}");?>'>
  <table class='table table-condensed table-hover'>
    <thead>
      <tr class='text-middle'>
        <th><?php echo $lang->product->name;?></th>
        <th class='w-120px'><?php echo $lang->product->model;?></th>
        <th class='w-100px' ><?php echo $lang->product->unit;?></th>
        <th class='w-100px'><?php echo $lang->order->orderAmount;?></th>
        <th class='w-100px'><?php echo $lang->order->storeAmount;?></th>
        <th class='w-140px'><?php echo $lang->order->purchaseAmount;?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($order->products as $orderProduct):?>
      <tr class='text-middle'>
        <td><?php echo html::checkbox('products', array($orderProduct->product => $orderProduct->name), '', "class='checkbox-choose''");?></td>
        <td><?php echo $orderProduct->model;?></td>
        <td><?php echo $orderProduct->unit;?></td>
        <td><?php echo $orderProduct->amount;?></td>
        <td><?php echo $orderProduct->storeAmount;?></td>
        <td><?php echo html::input('amount[]', $orderProduct->purchaseAmount, "class='form-control'");?></td>
      </tr>
      <?php endforeach;?>
      <tr>
        <td colspan='4'></td>
        <th class='text-right text-middle'><?php echo $lang->order->assignedTo;?></th>
        <td><?php echo html::select('assignedTo', $users, '', "class='form-control chosen'");?></td>
      </tr>
    </tbody>
    <tfoot>
      <tr>
        <td colspan='4'>
          <?php echo html::selectButton();?>
          <?php echo html::hidden('notSelected');?>
        </td>
        <td colspan='2' class='text-right'>
          <?php echo html::submitButton($lang->order->assignToPurchase) . html::commonButton($lang->cancel, 'btn', "data-dismiss='modal'");?>
        </td>
      </tr>
    </tfoot>
  </table>
</form>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
