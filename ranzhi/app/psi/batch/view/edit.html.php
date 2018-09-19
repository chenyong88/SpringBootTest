<?php 
/**
 * The edit view file of batch module of Ranzhi.
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
<?php include '../../../sys/common/view/datepicker.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?>
<?php include '../../../sys/common/view/kindeditor.html.php';?>
<div class='panel editPanel'>
  <form id='ajaxForm' method='post' action=<?php echo inlink("{$editMethod}", "id={$batch->id}");?>>
    <?php if($mode != 'pick'):?>
    <table class='table table-form'>
      <?php if($mode == 'deliver'):?>
      <tr>
        <th><?php echo $lang->batch->pickedBy;?></th>
        <td><?php echo html::select('pickedBy', $users, $batch->pickedBy, "id='pickedBy' class='form-control chosen'");?></td>
        <th><?php echo $lang->batch->pickedDate;?></th>
        <td><?php echo html::input('pickedDate', $batch->pickedDate, "id='pickedDate' class='form-control form-date'");?></td>
      </tr>
      <?php endif;?>
      <tr>
        <th><?php echo $lang->batch->$mode->expressedBy;?></th>
        <td><?php echo html::select('expressedBy', $users, $batch->expressedBy, "id='expressedBy' class='form-control chosen'");?></td>
        <th><?php echo $lang->batch->$mode->expressedDate;?></th>
        <td><?php echo html::input('expressedDate', $batch->expressedDate, "id='expressedDate' class='form-control form-date'");?></td>
      </tr>
      <tr>
        <th class='w-80px'><?php echo $lang->batch->express;?></th>
        <td>
          <div class='input-group'>
            <?php echo html::select('express', $expresses, $batch->express, "class='form-control'");?>
            <?php echo html::input('newExpress', '', "class='form-control newProperty' style='display:none'");?>
            <span class='input-group-addon'>
              <?php echo html::checkbox('createExpress', $lang->batch->createExpress, '', "class='createProperty'");?>
            </span>
          </div>
        </td>
        <th class='w-80px'><?php echo $lang->batch->waybill;?></th>
        <td class='w-220px'><?php echo html::input('waybill', $batch->waybill, "class='form-control'");?></td>
      </tr>
      <?php if($mode == 'deliver' && $order->contract):?>
      <tr>
        <th><?php echo $lang->contract->deliveredBy;?></th>
        <td>
          <div class='input-group'>
            <?php echo html::select('deliveredBy', $users, $this->app->user->account, "class='form-control chosen'");?>
            <div class='input-group-addon'>
              <label class='checkbox-inline'><input type='checkbox' id='finish' name='finish' value='1'> <?php echo $lang->contract->completeDelivery;?></label>
            </div>
          </div>
        </td>
        <th><?php echo $lang->contract->deliveredDate;?></th>
        <td><?php echo html::input('deliveredDate', '', "class='form-control form-date'");?></td>
      </tr>
      <tr>
        <th><?php echo $lang->contract->handlers;?></th>
        <td colspan='3'><?php echo html::select('handlers[]', $users, $contract->handlers, "class='form-control chosen' multiple");?></td>
      </tr>
      <tr>
        <th><?php echo $lang->comment;?></th>
        <td colspan='3'><?php echo html::textarea('comment');?></td>
      </tr>
      <?php endif;?>
    </table>
    <?php endif;?>
    <table class='table table-condensed table-striped table-hover'>
      <tr class='text-center'>
        <th><?php echo $lang->batch->product;?></th>
        <th class='w-120px'><?php echo $lang->batch->unit;?></th>
        <th class='w-200px'><?php echo $lang->batch->amount;?></th>
      </tr>
      <?php foreach($batch->products as $batchProduct):?>
      <?php $product = zget($products, $batchProduct->product, ' ');?>
      <tr class='text-center text-middle'>
        <td><?php echo $product->name;?></td>
        <td><?php echo $product->unit;?></td>
        <td>
          <?php 
          if($mode == 'deliver')
          {
              echo $batchProduct->amount;
              echo html::hidden("newAmount[$product->id]", $batchProduct->amount);
          }
          else
          {
              echo html::input("newAmount[$product->id]", $batchProduct->amount, "id='newAmount{$product->id}' class='form-control'");
          }
          ?>
        </td>
      </tr>
      <?php endforeach;?>
      <tr>
        <td colspan='2' class='noPadding'></td>
        <td class='noPadding'><input type='hidden' id='emptyAmount1' value=''></td>
      </tr>
      <tr></tr>
      <tr>
        <td colspan='5' class='text-right'>
          <?php echo html::hidden('method', $editMethod);?>
          <?php echo html::submitButton() . html::commonButton($lang->close, 'btn', "data-dismiss='modal'");?>
        </td>
      </tr>
    </table>
  </form>
</div>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
