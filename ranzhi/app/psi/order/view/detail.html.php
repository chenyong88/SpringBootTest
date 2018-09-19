<?php 
/**
 * The detail view of order module of Ranzhi.
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
<ul id='menuTitle'>
  <li><?php if(!commonModel::printLink($moduleName, 'browse', "status={$status}", "<i class='icon-list-ul'></i> " . $lang->order->statusList[$status])) echo "<i class='icon-list-ul'></i> " . $lang->order->statusList[$status];?></li>
  <li class='divider angle'></li>
  <li class='title'><?php printf($lang->order->titleLBL, $company->name, $order->orderNo);?> <span class='label-success label'><?php echo $lang->order->statusList[$order->status];?></span></li>
</ul>
<div class='col-md-8'>
  <div class='panel'>
    <table class='table table-condensed table-hover table-striped table-fixed'>
      <tr class='text-center'>
        <th><?php echo $lang->orderProduct->product;?></th>
        <th class='w-60px'><?php echo $lang->orderProduct->unit;?></th>
        <th class='w-100px'><?php echo $lang->orderProduct->price;?></th>
        <th class='w-100px'><?php echo $lang->orderProduct->amount;?></th>
        <th class='w-100px'><?php echo $lang->order->money;?></th>
      </tr>
      <?php foreach($orderProducts as $orderProduct):?>
      <tr class='text-center'>
        <?php $product = zget($products, $orderProduct->product);?>
        <td title='<?php echo $product->name;?>'>
          <span class='label-success label'><?php echo $lang->order->statusList[$product->status];?></span>
          <?php if(!commonModel::printLink('product', 'view', "id={$product->id}", $product->name)) echo $product->name;?>
        </td>
        <td><?php if(isset($product->unit)) echo $product->unit;?></td>
        <td><?php echo $orderProduct->price;?></td>
        <td><?php echo $orderProduct->amount;?></td>
        <td><?php echo $orderProduct->money;?></td>
      </tr>
      <?php endforeach;?>
      <tr class='text-center'>
        <th colspan='3'></th>
        <th><?php echo $lang->order->total;?></th>
        <td><?php echo $order->money;?></td>
      </tr>
    </table>
  </div>
  <?php $i = 0;?>
  <?php foreach($batches as $id => $batch):?>
  <?php $i ++;?>
  <div class='panel'>
    <div class='panel-heading'>
      <strong><?php echo $lang->order->batch[$order->type];?>::<?php printf($lang->batch->batchInfo, $i);?></strong> <span class='label-success label'><?php echo $lang->batch->statusList[$batch->status];?></span>
      <div class='panel-actions pull-right'>
        <?php 
          if($order->type == 'sale' || $order->type == 'purchaseRefund') if(!commonModel::printLink('batch', 'printBatch', "id={$id}&module={$moduleName}&status={$status}", "<i class='icon-print'></i>", "class='btn btn-mini' title='{$lang->order->print->common}'")) echo html::a('#', "<i class='icon-print'></i>", "class='btn btn-mini disabled' disabled='disabled'");
          if(!commonModel::printLink('batch', "edit{$mode}", "id={$id}", "<i class='icon-pencil'></i>", "class='btn btn-mini' data-toggle='modal' title='{$lang->edit}'")) echo html::a('#', "<i class='icon-pencil'></i>", "class='btn btn-mini disabled' disabled='disabled'");
          echo "<span class='btn btn-mini hand toggle-self'><span title='{$lang->order->showProducts}' class='toggle-body change-show'></span></span>";
        ?>
      </div>
    </div>
    <table class='table table-condensed table-striped'>
      <?php if($order->type == 'sale' || $order->type == 'purchaseRefund'):?>
      <tr>
        <th class='w-80px text-right'><?php echo $lang->batch->pickedBy;?></th>
        <td class='w-320px'><?php echo zget($users, $batch->pickedBy, ' ');?></td>
        <th class='w-100px text-right'><?php echo $lang->batch->pickedDate;?></th>
        <td class='w-320px'><?php echo formatTime($batch->pickedDate);?></td>
      </tr>
      <?php endif;?>
      <tr>
        <th class='w-80px text-right'><?php echo $lang->batch->$mode->expressedBy;?></th>
        <td class='w-320px'><?php echo zget($users, $batch->expressedBy, ' ');?></td>
        <th class='w-100px text-right'><?php echo $lang->batch->$mode->expressedDate;?></th>
        <td class='w-320px'><?php echo formatTime($batch->expressedDate);?></td>
      </tr>
      <tr>
        <th class='text-right'><?php echo $lang->batch->express;?></th>
        <td><?php echo zget($expresses, $batch->express, ' ');?></td>
        <th class='text-right'><?php echo $lang->batch->waybill;?></th>
        <td><?php echo $batch->waybill;?></td>
      </tr>
      <tr class='hide text-center'>
        <th class='text-right text-middle'><?php echo $lang->batch->product;?></th>
        <td colspan='3' class='text-middle text-left'>
          <ol>
            <?php foreach($batch->batchProducts as $batchProduct):?>
            <?php $product = zget($products, $batchProduct->product, ' ');?>
            <li><?php if(!commonModel::printLink('product', 'view', "id={$product->id}", $product->name)) echo $product->name; echo ' : ' . $batchProduct->amount . ' ' . $product->unit;?></li>
            <?php endforeach;?>
          </ol>
        </td>
      </tr>
    </table>
  </div>
  <?php endforeach;?>
  <?php echo $this->fetch('action', 'history', "objectType=psiorder&objectID=$order->id")?>
  <div class='page-actions'>
    <?php
      if($order->status == 'canceled' || $order->status == 'finished')
      {
          if($order->type == 'sale' || $order->type == 'purchaseRefund')
          {
              echo "<div class='btn-group'>";
              echo html::a('#', $lang->order->pick, "disabled='disabled' class='disabled btn'");
              if($order->type == 'sale') echo html::a('#', $lang->order->assignToPurchase, "disabled='disabled' class='disabled btn'");
              echo "</div>";
          }

          echo "<div class='btn-group'>";
          echo html::a('#', $lang->finish, "disabled='disabled' class='disabled btn'");
      }
      else
      {
          if($order->type == 'sale' || $order->type == 'purchaseRefund')
          {
              echo "<div class='btn-group'>";
              if(!commonModel::printLink($moduleName, 'assignToPick', "id={$order->id}&status={$status}", $lang->order->pick, "class='btn'")) echo html::a('#', $lang->order->pick, "disabled='disabled' class='disabled btn'");
              if($order->type == 'sale') 
              {
                  if(!commonModel::printLink($moduleName, 'assignToPurchase', "id={$order->id}", $lang->order->assignToPurchase, "class='btn' data-toggle='modal'")) echo html::a('#', $lang->order->assignToPurchase, "disabled='disabled' class='disabled btn'");
              }
              echo "</div>";
          }

          echo "<div class='btn-group'>";
          if(!commonModel::printLink($moduleName, 'finish', "id={$order->id}&status={$status}", $lang->finish, "class='btn' data-toggle='modal'")) echo html::a('#', $lang->finish, "disabled='disabled' class='disabled btn'");
      }

      if(!commonModel::printLink($moduleName, 'printOrder', "id={$order->id}&status={$status}", $lang->order->print->common, "class='btn'")) echo html::a('#', $lang->print, "disabled='disabled' class='disabled btn'");

      if($order->status == 'canceled' || $order->status == 'finished')
      {
          echo html::a('#', $lang->edit, "disabled='disabled' class='disabled btn'");
      }
      else
      {
          if(!commonModel::printLink($moduleName, 'edit' . $refundAppend, "id={$order->id}&status={$status}", $lang->edit, "class='btn'")) echo html::a('#', $lang->edit, "disabled='disabled' class='disabled btn'");
      }
      echo "</div>";

      echo "<div class='btn-group'>";
      if($order->status == 'canceled' || $order->status == 'finished')
      {
          if(!commonModel::printLink($moduleName, 'activate', "id={$order->id}", $lang->activate, "class='btn' data-toggle='modal'")) echo html::a('#', $lang->activate, "disabled='disabled' class='disabled btn'");
      }
      else 
      {
          if(!commonModel::printLink($moduleName, 'cancel', "id={$order->id}&status={$status}", $lang->cancel, "class='btn' data-toggle='modal'")) echo html::a('#', $lang->cancel, "disabled='disabled' class='disabled btn'");
      }

      if($order->status == 'finished')
      {
          echo html::a('#', $lang->delete, "disabled='disabled' class='disabled btn'");
      }
      else
      {
          if(!commonModel::printLink($moduleName, 'delete', "id={$order->id}", $lang->delete, "class='btn deleter'")) echo html::a('#', $lang->delete, "disabled='disabled' class='disabled btn'");
      }

      if($order->type == 'purchase')
      {
          commonModel::printLink($moduleName, 'sendMail', "id={$order->id}", $lang->order->sendMail, "class='btn' data-toggle='modal' data-width='600'");
      }
      echo "</div>";
      echo html::backButton();
    ?>
  </div>
</div>
<div class='col-md-4'>
  <div class='panel'>
    <div class='panel-heading'>
      <strong><?php echo $lang->order->view;?></strong>
    </div>
    <div class='panel-body'>
      <table class='table table-info'>
        <tr>
          <th class='w-80px'><?php echo $lang->order->trader[$order->type];?></th>
          <td><?php if(!commonModel::printLink(strpos($order->type, 'sale') === 0 ? 'customer' : 'provider', 'view', "id={$company->id}", $company->name)) echo $company->name;?></td>
        </tr>
        <tr>
          <th><?php echo ($order->type == 'saleRefund' || $order->type == 'purchaseRefund') ? $lang->order->refundNo : $lang->order->orderNo->common;?></th>
          <td><?php echo $order->orderNo;?></td>
        </tr>
        <?php if(!empty($contract)):?>
        <th><?php echo $lang->order->contract;?></th>
        <td>
          <?php $label = $contract->code ? $contract->code : $contract->id;?>
          <?php if(!commonModel::printLink('crm.contract', 'view', "contractID=$contract->id", $label, "class='contract'")) echo $label;?>
        </td>
        <?php endif;?>
        <tr>
          <th><?php echo $lang->order->money;?></th>
          <td><?php echo $order->money;?></td>
        </tr>
        <tr>
          <th><?php echo $lang->order->createdBy;?></th>
          <td><?php echo zget($users, $order->createdBy, ' ');?></td>
        </tr>
        <tr>
          <th><?php echo $lang->order->createdDate;?></th>
          <td><?php echo $order->createdDate;?></td>
        </tr>
        <tr>
          <th><?php echo $lang->order->desc;?></th>
          <td><?php echo $order->desc;?></td>
        </tr>
        <tr>
          <th><?php echo ($order->type == 'saleRefund' || $order->type == 'purchaseRefund') ? $lang->order->refundStatus : $lang->order->status;?></th>
          <td><?php echo zget($lang->order->statusList, $order->status, ' ');?></td>
        </tr>
      </table>
    </div>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
