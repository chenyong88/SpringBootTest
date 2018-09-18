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
        <strong><?php echo $lang->receivable->desc;?></strong>
      </div>
      <div class='panel-body'>
        <p><?php echo $receivable->desc;?></p>
      </div>
    </div>
    <?php echo $this->fetch('action', 'history', "objectType=$receivable->type&objectID=$receivable->id");?>
    <div class='page-actions'>
      <div class='btn-group'>
        <?php 
        if($receivable->deserved > $receivable->actual)
        {
            commonModel::printLink('receivable', 'receive',  "receivableID=$receivable->id", $lang->receivable->receive, "class='btn btn-default' data-toggle='modal' data-width='500'"); 
        }
        else
        {
            echo html::a('###', $lang->receivable->receive, "class='btn' disabled='disabled'");
        }
        commonModel::printLink('receivable', 'edit', "receivableID=$receivable->id", $lang->edit, "class='btn btn-default' data-toggle='modal'");
        commonModel::printLink('receivable', 'delete', "receivableID=$receivable->id", $lang->delete, "class='btn btn-default deleter'");
        ?>
      </div>
      <?php echo html::backButton();?>
    </div>
  </div>
  <div class='col-side'>
    <div class='panel'>
      <div class='panel-heading'>
        <strong><?php echo $lang->receivable->basicInfo;?></strong>
      </div>
      <div class='panel-body'>
        <table class='table table-info'>
          <tr>
            <th class='w-80px'><?php echo $lang->receivable->id;?></th>
            <td><?php echo $receivable->id;?></td>
          </tr>
          <tr>
            <th><?php echo $lang->receivable->trader;?></th>
            <td>
              <?php 
              if(!empty($customer->name))
              {
                  if(!commonModel::printLink('crm.customer', 'view', "customerID=$receivable->trader", $customer->name)) echo $customer->name;
              }
              else
              {
                  echo $receivable->trader ? $receivable->trader : '';
              }
              ?>
            </td>
          </tr>
          <tr>
            <th><?php echo $lang->receivable->origin;?></th>
            <td><?php echo zget($lang->receivable->originList, $receivable->origin);?></td>
          </tr>
          <tr>
            <th><?php echo $lang->receivable->contract;?></th>
            <td>
              <?php 
              if(!empty($contract->name)) 
              {
                  commonModel::printLink('crm.contract', 'view', "contractID=$receivable->contract", $contract->name);
              }
              else
              {
                  echo $receivable->contract ? $receivable : '';
              }
              ?>
            </td>
          </tr>
          <tr>
            <th><?php echo $lang->receivable->order;?></th>
            <td>
              <?php 
              if(!empty($order->orderNo))
              {
                  commonModel::printLink("psi.sale", 'detail', "orderID=$receivable->order", $order->orderNo);
              }
              else
              {
                  echo $receivable->order ? $receivable->order : '';
              }
              ?>
            </td>
          </tr>
          <tr>
            <th><?php echo $lang->receivable->batch;?></th>
            <td>
              <?php 
              if(!empty($batch->batchNo))
              {
                  commonModel::printLink('psi.batch', 'detail', "batchID=$receivable->batch", $batch->batchNo, "class='notOpenEntry' data-toggle='modal'");
              }
              else
              {
                  echo $receivable->batch ? $receivable->batch : '';
              }
              ?>
            </td>
          </tr>
          <tr>
            <th><?php echo $lang->receivable->deserved;?></th>
            <td><?php echo $receivable->deserved;?></td>
          </tr>
          <tr>
            <th><?php echo $lang->receivable->actual;?></th>
            <td><?php echo $receivable->actual;?></td>
          </tr>
          <tr>
            <th><?php echo $lang->receivable->balance;?></th>
            <td><?php echo $receivable->balance;?></td>
          </tr>
          <tr>
            <th><?php echo $lang->receivable->createdBy;?></th>
            <td><?php echo zget($users, $receivable->createdBy, '');?></td>
          </tr>
          <tr>
            <th><?php echo $lang->receivable->createdDate;?></th>
            <td><?php echo formatTime($receivable->createdDate, DT_DATE1);?></td>
          </tr>
          <tr>
            <th><?php echo $lang->receivable->editedBy;?></th>
            <td><?php echo zget($users, $receivable->editedBy, '');?></td>
          </tr>
          <tr>
            <th><?php echo $lang->receivable->editedDate;?></th>
            <td><?php echo formatTime($receivable->editedDate, DT_DATE1);?></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>
<?php include $app->appRoot . 'common/view/footer.html.php';?>
