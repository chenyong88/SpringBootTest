<?php 
/**
 * The browse view of batch module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     batch 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../common/view/header.html.php';?>
<div class='panel'>
  <table class='table table-condensed table-hover table-striped tablesorter'>
    <thead>
      <tr>
        <th class='w-60px'><?php echo $lang->batch->id;?></th>
        <?php if($method == 'browse'):?>
        <th class='w-140px'><?php echo $lang->batch->batchNoList[$type];?></th>
        <?php endif;?>
        <th class='w-140px'><?php echo $lang->order->orderNo->common;?></th>
        <th><?php echo $lang->batch->trader->$type;?></th>
        <th class='w-120px'><?php echo $lang->order->finishedDate;?></th>
        <th class='w-80px'><?php echo $lang->batch->status;?></th>
        <?php $class = $this->app->clientLang == 'en' ? 'w-120px' : 'w-100px';?>
        <th class='<?php echo $class;?> text-center'><?php echo $lang->actions;?></th>
      </tr>
    </thead>
    <tbody>
      <?php if($method == 'browse'):?>
      <?php foreach($batches as $id => $batch):?>
      <tr>
        <td><?php echo $id;?></td>
        <td><?php echo $batch->batchNo;?></td>
        <td>
          <?php $order = zget($orders, $batch->order);?>
          <?php if(!commonModel::printLink(str_replace('Refund', '', $order->type), 'detail', "id={$order->id}", $order->orderNo)) echo $order->orderNo;?>
        </td>
        <td><?php if(!commonModel::printLink(strpos($order->type, 'sale') === 0 ? 'customer' : 'provider', 'view', "id=$batch->trader", zget($customers, $batch->trader))) echo zget($customers, $Batch->trader);?></td>
        <td><?php echo formatTime($order->finishedDate, DT_DATE1);?></td>
        <td><?php echo zget($lang->batch->statusList, $batch->status, ' ');?></td>
        <td>
          <?php 
          commonModel::printLink('batch', 'deliver', "id={$id}", $lang->batch->deliver->common, "data-toggle='modal'");
          commonModel::printLink('batch', 'printBatch', "id={$id}&module=batch", $lang->order->print->common);
          commonModel::printLink('batch', 'editDeliver', "id={$id}", $lang->edit, "data-toggle='modal'");
          ?>
        </td>
      </tr>
      <?php endforeach;?>
      <?php endif;?>
      <?php if($method == 'browsePurchaseOrders'):?>
      <?php foreach($orders as $id => $order):?>
      <tr>
        <td><?php echo $id;?></td>
        <td><?php if(!commonModel::printLink(str_replace('Refund', '', $order->type), 'detail', "id={$order->id}", $order->orderNo)) echo $order->orderNo;?></td>
        <td><?php if(!commonModel::printLink(strpos($order->type, 'sale') === 0 ? 'customer' : 'provider', 'view', "id=$order->trader", zget($customers, $order->trader))) echo zget($customers, $order->trader);?></td>
        <td><?php echo formatTime($order->finishedDate, DT_DATE1);?></td>
        <td><?php echo zget($lang->order->statusList, $order->status, ' ');?></td>
        <td class='text-center'><?php if(!commonModel::printLink('batch', 'receive', "orderId={$id}&status=receive", $lang->batch->receive->common)) echo $lang->batch->receive->common;?></td>
      </tr>
      <?php endforeach;?>
      <?php endif;?>
    </tbody>
    <tfoot>
      <tr><td colspan='7'><?php $pager->show();?></td></tr>
    </tfoot>
  </table>
</div>
<?php include '../../common/view/footer.html.php';?>
