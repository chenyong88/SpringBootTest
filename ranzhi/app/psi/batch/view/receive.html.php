<?php 
/**
 * The create view file of batch module of Ranzhi.
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
<?php include '../../../sys/common/view/datepicker.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?>
<?php js::set('status', $status);?>
<ul id='menuTitle'>
  <?php if($status == 'receive'):?>
  <li><?php if(!commonModel::printLink('batch', 'browsePurchaseOrders', '', "<i class='icon-list-ul'></i> " . $lang->batch->receive->common)) echo "<i class='icon-list-ul'></i> " . $lang->batch->receive->common;?></li>
  <?php else:?>
  <li><?php if(!commonModel::printLink(str_replace('Refund', '', $order->type), 'browse', "status={$status}", "<i class='icon-list-ul'></i> " . $lang->order->statusList[$status])) echo "<i class='icon-list-ul'></i> " . $lang->order->statusList[$status];?></li>
  <?php endif;?>
  <li class='divider angle'></li>
  <li class='title'><?php printf($lang->order->titleLBL, $company->name, $order->orderNo);?> <span class='label-success label'><?php echo $lang->order->statusList[$order->status];?></span></li>
</ul>
<div class='col-md-8'>
  <form method='post' id='ajaxForm'>
    <div class='panel'>
      <div class='panel-heading'>
        <strong><?php echo $lang->batch->$mode->info;?></strong>
      </div>
      <?php if($mode == 'receive'):?>
      <table class='table table-form'>
        <tr>
          <th ><?php echo $lang->batch->$mode->expressedBy;?></th>
          <td><?php echo html::select('expressedBy', $users, $this->app->user->account, "class='form-control chosen'");?></td>
          <th><?php echo $lang->batch->$mode->expressedDate;?></th>
          <td><?php echo html::input('expressedDate', helper::now(), "class='form-control form-date'");?></td>
        </tr>
        <tr>
          <th class='w-80px'><?php echo $lang->batch->express;?></th>
          <td>
            <div class='input-group'>
              <?php echo html::select('express', $expresses, '', "class='form-control'");?>             
              <?php echo html::input('newExpress', '', "class='form-control newProperty' style='display:none'");?>
              <span class='input-group-addon'><?php echo html::checkbox('createExpress', $lang->batch->createExpress, '', "class='createProperty'");?></span>
            </div>
          </td>
          <th class='w-80px'><?php echo $lang->batch->waybill;?></th>
          <td class='w-320px'><?php echo html::input('waybill', '', "class='form-control'");?></td>
        </tr>
      </table>
      <?php endif;?>
      <table class='table table-condensed table-striped'>
        <tr class='text-center'>
          <th><?php echo $lang->batch->product;?></th>
          <th class='w-60px' ><?php echo $lang->batch->unit;?></th>
          <th class='w-140px'><?php echo $lang->batch->orderAmount;?></th>
          <th class='w-140px'><?php echo $mode == 'receive' ? $lang->batch->receivedAmount : $lang->batch->pickedAmount;?></th>
          <th class='w-140px'><?php echo $lang->batch->$mode->amount;?></th>
          <?php if($mode == 'pick'):?>
          <th class='w-10px'></th>
          <?php endif;?>
        </tr>
        <?php 
          $i          = 1;
          $amount     = 0;
          $sentAmount = 0;
          foreach($order->products as $orderProduct):
          $amount     += $orderProduct->amount;
          $sentAmount += $orderProduct->sentAmount;
          $product     = zget($products, $orderProduct->product, '');
        ?>
        <tr class='text-center text-middle'>
          <td>
            <?php echo $product->name;?>
            <?php echo html::hidden("product[$i]", $orderProduct->product);?>
          </td>
          <td><?php echo $product->unit;?></td>
          <td>
            <?php echo $orderProduct->amount;?>
            <?php echo html::hidden("price[$i]", $orderProduct->price);?>
            <?php echo html::hidden("totalAmount[$i]", $orderProduct->amount);?>
          </td>
          <td>
            <?php echo $orderProduct->sentAmount;?>
            <?php echo html::hidden("sentAmount[$i]", $orderProduct->sentAmount, "id='sentAmount{$i}'");?>
          </td>
          <td><?php echo $orderProduct->amount > $orderProduct->sentAmount ? html::input("amount[$i]", $orderProduct->amount-$orderProduct->sentAmount, "id='amount{$i}' class='form-control'") : '';?></td>
          <?php if($mode == 'pick'):?>
          <td></td>
          <?php endif;?>
        </tr>
        <?php $i ++;?>
        <?php endforeach;?>
        <tr>
          <td colspan='4' class='noPadding'></td>
          <td colspan='2' class='noPadding'><input type='hidden' id='emptyAmount' value=''></td>
        </tr>
        <tr></tr>
        <?php if($mode == 'pick'):?>
        <tr>
          <td colspan='3'></td>
          <th class='text-right text-middle'><?php echo $lang->batch->pickedBy;?></th>
          <td>
            <?php echo html::select('pickedBy', $users, '', "class='form-control chosen'");?>
          </td>
          <td></td>
        </tr>
        <?php endif;?>
        <tr>
          <td colspan='5' class='text-right'>
            <?php 
              echo html::hidden('type', $mode == 'receive' ? 'in' : 'out');
              echo html::hidden('order', $order->id);
              echo html::hidden('trader', $order->trader);
              $buttonLBL = $mode == 'pick' ? $lang->order->pick : $lang->batch->receive->common;
              if($amount > $sentAmount) echo html::submitButton($buttonLBL);
              echo ' ' . html::backButton();
            ?>
          </td>
          <?php if($mode == 'pick'):?>
          <td></td>
          <?php endif;?>
        </tr>
      </table>
    </div>
  </form>
  <?php $i=0;?>
  <?php foreach($batches as $id => $batch):?>
  <?php $i++;?>
  <div class='panel'>
    <div class='panel-heading'>
      <strong><?php echo $lang->batch->$mode->common;?>::<?php printf($lang->batch->batchInfo, $i);?></strong> <span class='label-success label'><?php echo $lang->batch->statusList[$batch->status];?></span>
      <div class='panel-actions pull-right'>
      <?php 
        if($batch->type == 'out') if(!commonModel::printLink('batch', 'printBatch', "id={$id}&module=sale&status={$status}", "<i class='icon-print'></i>", "class='btn btn-mini' title='{$lang->order->print->common}'")) echo html::a('#', "<i class='icon-print'></i>", "class='btn btn-mini disabled' disabled='disabled'");
        if(!commonModel::printLink('batch', "edit{$mode}", "id={$id}", "<i class='icon-pencil'></i>", "class='btn btn-mini' data-toggle='modal' title='{$lang->edit}'")) echo html::a('#', "<i class='icon-pencil'></i>", "class='btn btn-mini disabled' disabled='disabled'");
        echo "<span class='btn btn-mini hand toggle-self'><span title='{$lang->order->showProducts}' class='toggle-body change-show'></span></span>";
      ?>
      </div>
    </div>
    <table class='table table-condensed table-striped'>
      <?php if($batch->type == 'out'):?>
      <tr>
        <th class='w-80px text-right'><?php echo $lang->batch->pickedBy;?></th>
        <td class='w-320px'><?php echo zget($users, $batch->pickedBy, ' ');?></td>
        <th class='w-100px text-right'><?php echo $lang->batch->pickedDate;?></th>
        <td class='w-320px'><?php echo formatTime($batch->pickedDate);?></td>
      </tr>
      <?php endif;?>
      <?php if($batch->status != 'picking'):?>
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
      <?php endif;?>
      <tr class='hide text-center'>
        <th class='text-right text-middle'><?php echo $lang->batch->product;?></th>
        <td colspan='3' class='text-left text-middle'>
          <ol>
            <?php foreach($batch->batchProducts as $batchProduct):?>
            <?php $product = zget($products, $batchProduct->product);?>
            <li><?php echo $product->name . ' : ' . $batchProduct->amount . ' ' . $product->unit;?></li>
            <?php endforeach;?>
          </ol>
        </td>
      </tr>
    </table>
  </div>
  <?php endforeach;?>
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
          <td>
            <?php if(!commonModel::printLink(strpos($order->type, 'sale') === 0 ? 'customer' : 'provider', 'view', "id={$company->id}", $company->name)) echo $company->name;?>
          </td>
        </tr>
        <tr>
          <th><?php echo $lang->order->orderNo->common;?></th>
          <td>
            <?php if($status == 'receive') $status = 'all';?>
            <?php if(!commonModel::printLink(str_replace('Refund', '', $order->type), 'detail', "id={$order->id}&status={$status}", $order->orderNo)) echo $order->orderNo;?>
          </td>
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
          <th><?php echo $lang->order->status;?></th>
          <td><?php echo zget($lang->order->statusList, $order->status, ' ');?></td>
        </tr>
      </table>
    </div>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
