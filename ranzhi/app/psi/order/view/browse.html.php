<?php 
/**
 * The browse view of order module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     order 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php js::set('status', $status);?>
<div id='menuActions'>
  <?php //commonModel::printLink($moduleType, 'export', "status={$status}", "<i class='icon-download-alt'></i> " . $lang->export, "class='btn btn-primary export' data-toggle='modal'");?>
  <?php commonModel::printLink($moduleType, 'create', "status={$status}", '<i class="icon-plus"></i> ' . $lang->order->create, 'class="btn btn-primary"');?>
  <?php //commonModel::printLink($moduleType, 'createRefund', "status={$status}", '<i class="icon-plus"></i> ' . $lang->order->createRefund, 'class="btn btn-primary"');?>
</div>
<div class='panel'>
  <table class='table table-condensed table-hover table-striped tablesorter'>
    <thead>
      <tr>
        <?php $vars = "status={$status}&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}";?>
        <th class='w-100px'><?php commonModel::printOrderLink('orderNo', $orderBy, $vars, $lang->order->orderNo->common);?></th>
        <th><?php commonModel::printOrderLink('trader', $orderBy, $vars, $lang->order->trader[$moduleType]);?></th>
        <th class='w-100px'><?php commonModel::printOrderLink('createdBy', $orderBy, $vars, $lang->order->createdBy);?></th>
        <th class='w-100px'><?php commonModel::printOrderLink('createdDate', $orderBy, $vars, $lang->order->createdDate);?></th>
        <th class='w-110px'><?php commonModel::printOrderLink('finishedDate', $orderBy, $vars, $lang->order->finishedDate);?></th>
        <th class='w-100px'><?php commonModel::printOrderLink('money', $orderBy, $vars, $lang->order->money);?></th>
        <th class='w-100px'><?php commonModel::printOrderLink('status', $orderBy, $vars, $lang->order->status);?></th>
        <?php $class = 'w-260px';?>
        <?php if($moduleType == 'sale') $class = $this->app->clientLang == 'en' ? 'w-300px' : 'w-260px';?>
        <?php if($moduleType == 'purchase')  $class = $this->app->clientLang == 'en' ? 'w-180px' : 'w-150px';?>
        <th class='<?php echo $class;?> text-center'><?php echo $lang->actions;?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($orders as $id => $order):?>
      <?php $refundAppend = ($order->type == 'saleRefund' || $order->type == 'purchaseRefund') ? 'Refund' : '';?>
      <tr data-url='<?php echo inlink('detail', "id={$id}&status={$status}")?>'>
        <td><?php echo $order->orderNo;?></td>
        <td><?php echo zget($companies, $order->trader);?></td>
        <td><?php echo zget($users, $order->createdBy, ' ');?></td>
        <td><?php echo formatTime($order->createdDate, DT_DATE1);?></td>
        <td><?php echo formatTime($order->finishedDate, DT_DATE1);?></td>
        <td><?php echo $order->money;?></td>
        <td><?php echo zget($lang->order->statusList, $order->status, ' ');?></td>
        <td class='text-center'>
          <?php
          if($order->status == 'canceled' || $order->status == 'finished')
          {
              if($order->type == 'sale' || $order->type == 'purchaseRefund')
              {
                  echo html::a('###', $this->lang->order->pick, "disabled='disabled' class='disabled'");
                  if($order->type == 'sale') echo html::a('###', $this->lang->order->assignToPurchase, "disabled='disabled' class='disabled'");
              }
              echo html::a('###', $this->lang->finish, "disabled='disabled' class='disabled'");
          }
          else
          {
              if($order->type == 'sale' || $order->type == 'purchaseRefund')
              {
                  if(!commonModel::printLink($moduleType, 'assignToPick', "id={$order->id}&status={$status}", $this->lang->order->pick)) echo html::a('###', $this->lang->order->pick, "disabled='disabled' class='disabled'");

                  if($order->type == 'sale')
                  {
                      if(!commonModel::printLink($moduleType, 'assignToPurchase', "id={$order->id}", $this->lang->order->assignToPurchase, "data-toggle='modal'")) echo html::a('###', $this->lang->order->assignToPurchase, "disabled='disabled' class='disabled'");
                  }
              }
              elseif($order->type == 'saleRefund')
              {
                  echo html::a('###', $this->lang->order->pick, "disabled='disabled' class='disabled'");
                  echo html::a('###', $this->lang->order->assignToPurchase, "disabled='disabled' class='disabled'");
              }

              if(!commonModel::printLink($moduleType, 'finish', "id={$order->id}&status={$status}", $this->lang->finish, "data-toggle='modal'")) echo html::a('###', $this->lang->finish, "disabled='disabled' class='disabled'");
          }

          if(!commonModel::printLink($moduleType, 'printOrder', "id={$order->id}&status={$status}", $this->lang->order->print->common)) echo html::a('###', $this->lang->order->print->common, "disabled='disabled' class='disabled'");

          if(!commonModel::printLink($moduleType, 'detail', "id={$order->id}&status={$status}", $this->lang->detail)) echo html::a('###', $this->lang->detail, "disabled='disabled' class='disabled'");
          
          if($order->status == 'canceled' || $order->status == 'finished')
          {
              echo html::a('###', $this->lang->edit, "disabled='disabled' class='disabled'");
          }
          else
          {
              if(!commonModel::printLink($moduleType, 'edit' . $refundAppend, "id={$order->id}&status={$status}", $this->lang->edit)) echo html::a('###', $this->lang->edit, "disabled='disabled' class='disabled'");
          }
          ?>
        </td>
      </tr>
      <?php endforeach;?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan='8'>
          <?php $pager->show();?>
        </td>
      </tr>
    </tfoot>
  </table>
</div>
<?php include '../../common/view/footer.html.php';?>
