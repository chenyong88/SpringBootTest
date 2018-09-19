<?php 
/**
 * The browse finished bateches view of batch module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      yaozeyuan<yaozeyuan@yidou.biz>
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
        <th class='w-140px'><?php echo $lang->batch->batchNo;?></th>
        <th class='w-140px'><?php echo $lang->order->orderNo->common;?></th>
        <th><?php echo $lang->batch->trader->common;?></th>
        <th class='w-120px'><?php echo $lang->order->finishedDate;?></th>
        <th class='w-80px'><?php echo $lang->batch->status;?></th>
        <th class='w-100px text-center'><?php echo $lang->actions;?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($batches as $id => $batch):?>
      <tr>
        <td><?php echo $id;?></td>
        <td><?php echo $batch->batchNo;?></td>
        <td>
          <?php $order = zget($orders, $batch->order);?>
          <?php if(!commonModel::printLink(str_replace('Refund', '', $order->type), 'detail', "id={$order->id}", $order->orderNo)) echo $order->orderNo;?>
        </td>
        <td><?php if(!commonModel::printLink(strpos($order->type, 'sale') === 0 ? 'customer' : 'provider', 'view', "id=$batch->trader", zget($customers, $batch->trader))) echo zget($customers, $batch->trader);?></td>
        <td><?php echo formatTime($order->finishedDate, DT_DATE1);?></td>
        <td><?php echo zget($lang->batch->statusList, $batch->status, ' ');?></td>
        <td class='text-center'><?php commonModel::printLink('batch', 'detail', "id={$id}", $lang->detail, "data-toggle='modal'");?></td>
      </tr>
      <?php endforeach;?>
    </tbody>
    <tfoot>
      <tr><td colspan='7'><?php $pager->show();?></td></tr>
    </tfoot>
  </table>
</div>
<?php include '../../common/view/footer.html.php';?>
