<?php
/**
 * The detail view file of view module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     view 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include $app->appRoot . 'common/view/header.html.php';?>
<?php js::set('mode', $mode);?>
<div class='row-table'>
  <div class='col-main'>
    <div class='panel'>
      <div class='panel-heading'>
        <strong><?php echo $lang->payable->desc;?></strong>
      </div>
      <div class='panel-body'>
        <p><?php echo $payable->desc;?></p>
      </div>
    </div>
    <?php echo $this->fetch('action', 'history', "objectType=$payable->type&objectID=$payable->id");?>
    <div class='page-actions'>
      <div class='btn-group'>
        <?php 
        if($payable->deserved > $payable->actual)
        {
            commonModel::printLink('payable', 'pay',  "payableID=$payable->id", $lang->payable->pay, "class='btn btn-default' data-toggle='modal' data-width='500'"); 
        }
        else
        {
            echo html::a('###', $lang->payable->pay, "class='btn' disabled='disabled'");
        }
        commonModel::printLink('payable', 'edit', "payableID=$payable->id", $lang->edit, "class='btn btn-default' data-toggle='modal'");
        commonModel::printLink('payable', 'delete', "payableID=$payable->id", $lang->delete, "class='btn btn-default deleter'");
        ?>
      </div>
      <?php echo html::backButton();?>
    </div>
  </div>
  <div class='col-side'>
    <div class='panel'>
      <div class='panel-heading'>
        <strong><?php echo $lang->payable->basicInfo;?></strong>
      </div>
      <div class='panel-body'>
        <table class='table table-info'>
          <tr>
            <th class='w-80px'><?php echo $lang->payable->id;?></th>
            <td><?php echo $payable->id;?></td>
          </tr>
          <tr>
            <th><?php echo $lang->payable->trader;?></th>
            <td>
              <?php 
              if(!empty($customer->name))
              {
                  if(!commonModel::printLink('crm.provider', 'view', "providerID=$payable->trader", $customer->name)) echo $customer->name;
              }
              else
              {
                  echo $payable->trader ? $payable->trader : '';
              }
              ?>
            </td>
          </tr>
          <tr>
            <th><?php echo $lang->payable->origin;?></th>
            <td><?php echo zget($lang->payable->originList, $payable->origin);?></td>
          </tr>
          <tr>
            <th><?php echo $lang->payable->contract;?></th>
            <td>
              <?php 
              if(!empty($contract->name)) 
              {
                  if(!commonModel::printLink('crm.contract', 'view', "contractID=$payable->contract", $contract->name)) echo $contract->name;
              }
              else
              {
                  echo $payable->contract ? $payable->contract : '';
              }
              ?>
            </td>
          </tr>
          <tr>
            <th><?php echo $lang->payable->order;?></th>
            <td>
              <?php 
              if(!empty($order->orderNo))
              {
                  if(!commonModel::printLink("psi.sale", 'detail', "orderID=$payable->order", $order->orderNo)) echo $order->orderNo;
              }
              else
              {
                  echo $payable->order ? $payable->order : '';
              }
              ?>
            </td>
          </tr>
          <tr>
            <th><?php echo $lang->payable->batch;?></th>
            <td>
              <?php 
              if(!empty($batch->batchNo))
              {
                  if(!commonModel::printLink('psi.batch', 'detail', "batchID=$payable->batch", $batch->batchNo, "class='notOpenEntry' data-toggle='modal'")) echo $batch->batchNo;
              }
              else
              {
                  echo $payable->batch ? $payable->batch : '';
              }
              ?>
            </td>
          </tr>
          <tr>
            <th><?php echo $lang->payable->deserved;?></th>
            <td><?php echo $payable->deserved;?></td>
          </tr>
          <tr>
            <th><?php echo $lang->payable->actual;?></th>
            <td><?php echo $payable->actual;?></td>
          </tr>
          <tr>
            <th><?php echo $lang->payable->balance;?></th>
            <td><?php echo $payable->balance;?></td>
          </tr>
          <tr>
            <th><?php echo $lang->payable->createdBy;?></th>
            <td><?php echo zget($users, $payable->createdBy, '');?></td>
          </tr>
          <tr>
            <th><?php echo $lang->payable->createdDate;?></th>
            <td><?php echo formatTime($payable->createdDate, DT_DATE1);?></td>
          </tr>
          <tr>
            <th><?php echo $lang->payable->editedBy;?></th>
            <td><?php echo zget($users, $payable->editedBy, '');?></td>
          </tr>
          <tr>
            <th><?php echo $lang->payable->editedDate;?></th>
            <td><?php echo formatTime($payable->editedDate, DT_DATE1);?></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>
<?php include $app->appRoot . 'common/view/footer.html.php';?>
