<?php 
/**
 * The detail view file of batch module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      yaozeyuan<yaozeyuan@yidou.biz>
 * @package     batch 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../sys/common/view/header.modal.html.php';?>
<div class='panel'>
  <div class='panel-heading'>
      <strong><?php echo ($order->type == 'sale' || $order->type == 'buyRefund') ? $lang->batch->deliver->common . $lang->detail : $lang->batch->receive->common . $lang->detail;?></strong> <span class='label-success label'><?php echo $lang->batch->statusList[$batch->status];?></span>
    <div class='panel-actions pull-right'>
      <?php
        if($order->type == 'sale' || $order->type == 'buyRefund') if(!commonModel::printLink('batch', 'printBatch', "id={$batch->id}&module={$moduleName}&status={$batch->status}", "<i class='icon-print'></i>", "class='btn btn-mini' title='{$lang->order->print->common}'")) echo html::a('#', "<i class='icon-print'></i>", "class='btn btn-mini disabled' disabled='disabled'");
        if(!commonModel::printLink('batch', "edit{$mode}", "id={$batch->id}", "<i class='icon-pencil'></i>", "class='btn btn-mini loadInModal' title='{$lang->edit}'")) echo html::a('#', "<i class='icon-pencil'></i>", "class='btn btn-mini disabled' disabled='disabled'");
      ?>
    </div>
  </div>
  <table class='table table-condensed table-striped'>
    <?php if($order->type == 'sale' || $order->type == 'buyRefund'):?>
    <tr>
      <th class='w-80px text-right'><?php echo $lang->batch->pickedBy;?></th>
      <td class='w-320px'><?php echo zget($users, $batch->pickedBy, ' ');?></td>
      <th class='w-100px text-right'><?php echo $lang->batch->pickedDate;?></th>
      <td class='w-320px'><?php echo formatTime($batch->pickedDate);?></td>
    </tr>
    <?php endif;?>
    <tr>
      <th class='w-80px text-right'><?php echo $lang->batch->{$mode}->expressedBy;?></th>
      <td class='w-320px'><?php echo zget($users, $batch->expressedBy, ' ');?></td>
      <th class='w-100px text-right'><?php echo $lang->batch->{$mode}->expressedDate;?></th>
      <td class='w-320px'><?php echo formatTime($batch->expressedDate);?></td>
    </tr>
    <tr>
      <th class='text-right'><?php echo $lang->batch->express;?></th>
      <td><?php echo zget($expresses, $batch->express, ' ');?></td>
      <th class='text-right'><?php echo $lang->batch->waybill;?></th>
      <td><?php echo $batch->waybill;?></td>
    </tr>
    <tr class='text-center'>
      <th class='text-right text-middle'><?php echo $lang->batch->product;?></th>
      <td colspan='3' class='text-middle text-left'>
        <ol>
          <?php foreach($batch->products as $batchProduct):?>
          <?php $product = zget($products, $batchProduct->product, '');?>
          <li><?php if(!commonModel::printLink('product', 'view', "id={$product->id}", $product->name)) echo $product->name; echo ' : ' . $batchProduct->amount . ' ' . $product->unit;?></li>
          <?php endforeach;?>
        </ol>
      </td>
    </tr>
  </table>
</div>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
