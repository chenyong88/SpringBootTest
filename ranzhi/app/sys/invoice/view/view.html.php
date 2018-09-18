<?php 
/**
 * The view file for the method of view of invoice module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     invoice 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include $app->getAppRoot() . 'common/view/header.html.php';?>
<ul id='menuTitle'>
  <li><?php commonModel::printLink('invoice', 'browse', '', $lang->invoice->browse);?></li>
  <li class='divider angle'></li>
  <li class='title'><?php echo $lang->invoice->view;?> </li>
</ul>
<div class='row-table'>
  <div class='col-main'>
    <div class='panel'>
      <div class='panel-heading'><strong><?php echo $lang->invoice->view;?></strong></div>
      <div class='panel-body'>
        <p><strong><?php echo $lang->invoice->type;?></strong> <?php echo zget($lang->invoice->invoiceTypeList, $invoice->invoiceType) . ' - ' . zget($lang->invoice->typeList, $invoice->type);?></p>
        <p><strong><?php echo $lang->invoice->money;?></strong> <?php echo $invoice->money;?></p>
        <p><strong><?php echo $lang->invoice->taxRate;?></strong> <?php echo $invoice->taxRate . '%';?></p>
        <p><strong><?php echo $lang->invoice->status;?></strong> <span class='<?php echo zget($config->invoice->colorList, $invoice->status);?>'><?php echo zget($lang->invoice->statusList, $invoice->status);?></span></p>
        <?php if($invoice->sn):?>
        <p><strong><?php echo $lang->invoice->sn;?></strong> <?php echo $invoice->sn;?></p>
        <?php endif;?>
        <p><strong><?php echo $lang->invoice->invoiceTitle;?></strong> <?php echo $invoice->invoiceTitle;?></p>
        <p><strong><?php echo $lang->invoice->taxNumber;?></strong> <?php echo $invoice->taxNumber;?></p>
        <?php if($invoice->registedAddress):?>
        <p><strong><?php echo $lang->invoice->registedAddress;?></strong> <?php echo $invoice->registedAddress;?></p>
        <?php endif;?>
        <?php if($invoice->phone):?>
        <p><strong><?php echo $lang->invoice->phone;?></strong> <?php echo $invoice->phone;?></p>
        <?php endif;?>
        <?php if($invoice->bankName):?>
        <p><strong><?php echo $lang->invoice->bankName;?></strong> <?php echo $invoice->bankName;?></p>
        <?php endif;?>
        <?php if($invoice->bankAccount):?>
        <p><strong><?php echo $lang->invoice->bankAccount;?></strong> <?php echo $invoice->bankAccount;?></p>
        <?php endif;?>
        <?php if(!empty($invoice->desc)):?>
        <p><?php echo $invoice->desc;?></p>
        <?php endif;?>
        <?php if(!empty($invoice->files)):?>
        <div><?php echo $this->fetch('file', 'printFiles', array('files' => $invoice->files, 'fieldset' => 'false'))?></div>
        <?php endif;?>
      </div>
    </div> 
    <?php if(!empty($invoice->details)):?>
    <div class='panel'>
      <div class='panel-heading'><strong><?php echo $lang->invoice->detail?></strong></div>
      <table class='table table-condensed table-bordered table-fixed table-hover'>
        <tr class='text-center'>
          <th class='w-50px'><?php echo $lang->invoice->id;?></th>
          <th class='text-left'><?php echo $lang->invoice->item;?></th>
          <th class='w-100px'><?php echo $lang->invoice->model;?></th>
          <th class='w-100px'><?php echo $lang->invoice->unit;?></th>
          <th class='w-100px text-right'><?php echo $lang->invoice->amount;?></th>
          <th class='w-100px text-right'><?php echo $lang->invoice->price;?></th>
          <th class='w-100px text-right'><?php echo $lang->invoice->money;?></th>
          <th class='w-100px text-right'><?php echo $lang->invoice->taxMoney;?></th>
        </tr>
        <?php foreach($invoice->details as $detail):?>
        <tr>
          <td class='text-center'><?php echo $detail->id;?></td>
          <td><?php echo $detail->item;?></td>
          <td><?php echo $detail->model;?></td>
          <td class='text-center'><?php echo $detail->unit;?></td>
          <td class='text-right'><?php echo $detail->amount;?></td>
          <td class='text-right'><?php echo $detail->price;?></span></td>
          <td class='text-right'><?php echo $detail->money;?></td>
          <td class='text-right'><?php echo $detail->taxMoney;?></td>
        </tr>
        <?php endforeach;?>
      </table>
    </div> 
    <?php endif;?>
    <?php echo $this->fetch('action', 'history', "objectType=invoice&objectID={$invoice->id}");?>
    <div class='page-actions'>
      <div class='btn-group'>
        <?php 
        if($invoice->status == 'wait')
        {
            commonModel::printLink('invoice', 'drawn', "invoiceID=$invoice->id", $lang->invoice->drawn, "class='btn' data-toggle='modal'");
        }
        else
        {
            echo html::a('javascript:;', $lang->invoice->drawn, "class='btn disabled'");
        }
        $expressLabel = $invoice->invoiceType == 'paper' ? $lang->invoice->express : $lang->invoice->send;
        if($invoice->status == 'normal')
        {
            if($invoice->expressedBy)
            {
                echo html::a('javascript:;', $expressLabel, "class='btn disabled'");
            }
            else
            {
                commonModel::printLink('invoice', 'express', "invoiceID=$invoice->id", $expressLabel, "class='btn' data-toggle='modal'");
            }
            commonModel::printLink('invoice', 'taxRefund', "invoiceID=$invoice->id&status=canceled", $lang->invoice->cancel, "class='btn' data-toggle='modal'");
            commonModel::printLink('invoice', 'taxRefund', "invoiceID=$invoice->id&status=red", $lang->invoice->red, "class='btn' data-toggle='modal'");
        }
        else
        {
            echo html::a('javascript:;', $expressLabel, "class='btn disabled'");
            echo html::a('javascript:;', $lang->invoice->cancel, "class='btn disabled'");
            echo html::a('javascript:;', $lang->invoice->red, "class='btn disabled'");
        }
        ?>
      </div>
      <?php
      echo "<div class='btn-group'>";
      commonModel::printLink('invoice', 'edit', "invoiceID=$invoice->id", $lang->edit, "class='btn btn-default'");
      commonModel::printLink('invoice', 'delete', "invoiceID=$invoice->id", $lang->delete, "class='btn btn-default deleter'");
      echo '</div>';
      $browseLink = $this->session->invoiceList ? $this->session->invoiceList : inlink('browse');
      commonModel::printRPN($browseLink, $preAndNext);
      ?>
    </div>
  </div>
  <div class='col-side'>
    <div class='panel'>
      <div class='panel-heading'><strong><i class='icon-file-text-alt'></i> <?php echo $lang->invoice->baseInfo;?></strong></div>
      <div class='panel-body'>
        <table class='table table-info'>
          <tr>
            <th class='w-70px'><?php echo $lang->invoice->company;?></th>
            <td><?php echo zget($companies, $invoice->company, '');?></td>
          </tr>
          <tr>
            <?php $customer = isset($customer->name) ? $customer->name : $invoice->customer;?>
            <th class='w-70px'><?php echo $lang->invoice->customer;?></th>
            <td>
              <?php if($invoice->customer):?>
              <?php if(!commonModel::printLink('crm.customer', 'view', "customerID=$invoice->customer", $customer)) echo $customer;?>
              <?php endif;?>
            </td>
          </tr>
          <tr>
            <?php $contract = isset($contract->name) ? $contract->name : $invoice->contract;?>
            <th><?php echo $lang->invoice->contract;?></th>
            <td>
              <?php if($invoice->contract):?>
              <?php if(!commonModel::printLink('crm.contract', 'view', "contractID=$invoice->contract", $contract)) echo $contract;?>
              <?php endif;?>
            </td>
          </tr>
          <tr>
            <?php $contact = isset($contact->realname) ? $contact->realname : $invoice->contact;?>
            <th><?php echo $lang->invoice->contact;?></th>
            <td>
              <?php if($invoice->contact):?>
              <?php if(!commonModel::printLink('crm.contact', 'view', "contactID=$invoice->contact", $contact)) echo $contact;?>
              <?php endif;?>
            </td>
          </tr>
          <?php if($invoice->invoiceType == 'paper'):?>
          <tr>
            <th><?php echo $lang->invoice->express;?></th>
            <td><?php echo $invoice->express;?></td>
          </tr>
          <tr>
            <th><?php echo $lang->invoice->waybill;?></th>
            <td><?php echo $invoice->waybill;?></td>
          </tr>
          <tr>
            <th><?php echo $lang->invoice->address;?></th>
            <td><?php echo isset($address->location) ? $address->location : '';?></td>
          </tr>
          <?php elseif($invoice->invoiceType == 'digital'):?>
          <tr>
            <th><?php echo $lang->invoice->sendway;?></th>
            <td><?php echo zget($lang->invoice->sendwayList, $invoice->sendway);?></td>
          </tr>
          <tr>
            <th><?php echo $lang->invoice->sendAccount;?></th>
            <td><?php echo $invoice->sendAccount;?></td>
          </tr>
          <?php endif;?>
        </table>
      </div>
    </div>
    <div class='panel'>
      <div class='panel-heading'><strong><i class='icon-file-text-alt'></i> <?php echo $lang->invoice->lifetime;?></strong></div>
      <div class='panel-body'>
        <table class='table table-info'>
          <tr>
            <th class='w-70px'><?php echo $lang->invoice->createdBy;?></th>
            <td><?php echo zget($users, $invoice->createdBy) . $lang->at . $invoice->createdDate;?></td>
          </tr>
          <?php if($invoice->editedBy):?>
          <tr>
            <th><?php echo $lang->invoice->editedBy;?></th>
            <td><?php echo zget($users, $invoice->editedBy) . $lang->at . $invoice->editedDate;?></td>
          </tr>
          <?php endif;?>
          <?php if($invoice->receivedBy):?>
          <tr>
            <th><?php echo $lang->invoice->receivedBy;?></th>
            <td><?php echo zget($users, $invoice->receivedBy) . $lang->at . $invoice->receivedDate;?></td>
          </tr>
          <?php endif;?>
          <?php if($invoice->checkedBy):?>
          <tr>
            <th><?php echo $lang->invoice->checkedBy;?></th>
            <td><?php echo zget($users, $invoice->checkedBy) . $lang->at . $invoice->checkedDate;?></td>
          </tr>
          <?php endif;?>
          <?php if($invoice->drawnBy):?>
          <tr>
            <th><?php echo $lang->invoice->drawnBy;?></th>
            <td><?php echo zget($users, $invoice->drawnBy) . $lang->at . $invoice->drawnDate;?></td>
          </tr>
          <?php endif;?>
          <?php if($invoice->expressedBy):?>
          <tr>
            <th><?php echo $lang->invoice->expressedBy;?></th>
            <td><?php echo zget($users, $invoice->expressedBy) . $lang->at . $invoice->expressedDate;?></td>
          </tr>
          <?php endif;?>
          <?php if($invoice->taxRefundedBy):?>
          <tr>
            <th>
              <?php if($invoice->status == 'canceled') echo $lang->invoice->canceledBy;?>
              <?php if($invoice->status == 'red') echo $lang->invoice->redBy;?>
              <?php if($invoice->status != 'canceled' && $invoice->status != 'red') echo $lang->invoice->taxRefundedBy;?>
            </th>
            <td><?php echo zget($users, $invoice->taxRefundedBy) . $lang->at . $invoice->taxRefundedDate;?></td>
          </tr>
          <?php endif;?>
        </table>
      </div>
    </div>
  </div>
</div>
<?php include $app->getAppRoot() . 'common/view/footer.html.php';?>
