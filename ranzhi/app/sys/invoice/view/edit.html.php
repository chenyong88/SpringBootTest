<?php
/**
 * The edit view file of invoice module of RanZhi.
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
<?php include '../../common/view/chosen.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<?php js::set('moneyTip', $lang->invoice->placeholder->money);?>
<?php js::set('invoiceID', $invoice->id);?>
<ul id='menuTitle'>
  <li><?php commonModel::printLink('invoice', 'browse', '', $lang->invoice->browse);?></li>
  <li class='divider angle'></li>
  <li><?php commonModel::printLink('invoice', 'view', "invoiceID={$invoice->id}", $lang->invoice->view);?></li>
  <li class='divider angle'></li>
  <li class='title'><?php echo $lang->invoice->edit?></li>
</ul>
<form method='post' id='ajaxForm'>
  <div class='row-table'>
    <div class='col-main'>
      <div class='panel'>
        <div class='panel-body'>
          <table class='table table-form'>
            <tr>
              <th class='w-60px'><?php echo $lang->invoice->sn;?></th>
              <td>
                <div class='input-group'>
                  <?php echo html::input('sn', $invoice->sn, "class='form-control'");?>
                  <span class='input-group-addon fix-border'><?php echo $lang->invoice->invoiceType;?></span>
                  <?php echo html::select('invoiceType', $lang->invoice->invoiceTypeList, $invoice->invoiceType, "class='form-control'");?>
                </div>
              </td>
              <th class='w-60px'><?php echo $lang->invoice->status;?></th>
              <td class='w-300px'><?php echo html::select('status', $lang->invoice->statusList, $invoice->status, "class='form-control'");?></td>
            </tr>
            <tr>
              <th><?php echo $lang->invoice->type;?></th>
              <td>
                <div class='input-group'>
                  <?php echo html::select('type', $lang->invoice->typeList, $invoice->type, "class='form-control'");?>
                  <span class='input-group-addon fix-border'><?php echo $lang->invoice->taxRate;?></span>
                  <?php echo html::input('taxRate', $invoice->taxRate, "class='form-control'");?>
                  <span class='input-group-addon'><?php echo $lang->percent;?></span>
                </div>
              </td>
              <th><?php echo $lang->invoice->money;?></th>
              <td><?php echo html::input('money', $invoice->money, "class='form-control' readonly='readonly'");?></td>
            </tr>
            <tr>
              <th><?php echo $lang->invoice->invoiceTitle;?></th>
              <td><?php echo html::input('invoiceTitle', $invoice->invoiceTitle, "class='form-control'");?></td>
              <th><?php echo $lang->invoice->taxNumber;?></th>
              <td><?php echo html::input('taxNumber', $invoice->taxNumber, "class='form-control'");?></td>
            </tr>
            <tr>
              <th><?php echo $lang->invoice->registedAddress;?></th>
              <td>
                <div class='required required-wrapper'></div>
                <?php echo html::input('registedAddress', $invoice->registedAddress, "class='form-control'");?>
              </td>
              <th><?php echo $lang->invoice->phone;?></th>
              <td>
                <div class='required required-wrapper'></div>
                <?php echo html::input('phone', $invoice->phone, "class='form-control'");?>
              </td>
            </tr>
            <tr>
              <th><?php echo $lang->invoice->bankName;?></th>
              <td>
                <div class='required required-wrapper'></div>
                <?php echo html::input('bankName', $invoice->bankName, "class='form-control'");?>
              </td>
              <th><?php echo $lang->invoice->bankAccount;?></th>
              <td>
                <div class='required required-wrapper'></div>
                <?php echo html::input('bankAccount', $invoice->bankAccount, "class='form-control'");?>
              </td>
            </tr>
            <tr>
              <th class='orderTH'><?php echo $lang->invoice->detail;?></th>
              <td colspan='3' id='detailBox'>
                <table class='table table-detail'>
                  <?php foreach($invoice->details as $detail):?>
                  <tr>
                    <td>
                      <?php echo html::hidden('idList[]', $detail->id)?>
                      <?php echo html::input('itemList[]', zget($itemList, $detail->item), "class='form-control' placeholder='{$lang->invoice->item}'");?>
                    </td>
                    <td class='w-140px'><?php echo html::input('modelList[]', $detail->model, "class='form-control' placeholder='{$lang->invoice->model}'");?></td>
                    <td class='w-120px'><?php echo html::input('unitList[]', $detail->unit, "class='form-control' placeholder='{$lang->invoice->unit}'");?></td>
                    <td class='w-80px'><?php echo html::input('amountList[]', $detail->amount, "class='form-control' placeholder='{$lang->invoice->amount}'");?></td>
                    <td class='w-140px'><?php echo html::input('priceList[]', $detail->price, "class='form-control' placeholder='{$lang->invoice->price}'");?></td>
                    <td class='w-140px'><?php echo html::input('moneyList[]', $detail->money, "class='form-control' placeholder='{$lang->invoice->money}' readonly='readonly'");?></td>
                    <td class='w-60px'><i class='btn btn-mini icon-plus'></i>&nbsp;&nbsp;<i class='btn btn-mini icon-remove'></i></td>
                  </tr>
                  <?php endforeach;?>
                  <tr>
                    <td><?php echo html::select('itemList[]', $itemList, '', "class='form-control chosen' placeholder='{$lang->invoice->item}'");?></td>
                    <td class='w-140px'><?php echo html::input('modelList[]', '', "class='form-control' placeholder='{$lang->invoice->model}'");?></td>
                    <td class='w-120px'><?php echo html::input('unitList[]', '', "class='form-control' placeholder='{$lang->invoice->unit}'");?></td>
                    <td class='w-80px'><?php echo html::input('amountList[]', '', "class='form-control' placeholder='{$lang->invoice->amount}'");?></td>
                    <td class='w-140px'><?php echo html::input('priceList[]', '', "class='form-control' placeholder='{$lang->invoice->price}'");?></td>
                    <td class='w-140px'><?php echo html::input('moneyList[]', '', "class='form-control' placeholder='{$lang->invoice->money}' readonly='readonly'");?></td>
                    <td class='w-60px'><i class='btn btn-mini icon-plus'></i>&nbsp;&nbsp;<i class='btn btn-mini icon-remove'></i></td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <th><?php echo $lang->invoice->desc;?></th>
              <td colspan='3'><?php echo html::textarea('desc', $invoice->desc, "class='form-control'");?></td>
            </tr>
            <?php if(commonModel::hasPriv('file', 'upload')):?>
            <tr>
              <th><?php echo $lang->invoice->file;?></th>
              <td colspan='3'><?php echo $this->fetch('file', 'buildForm', 'filecount=1');?></td>
            </tr>
            <?php endif;?>
          </table>
        </div>
      </div>
      <?php echo $this->fetch('action', 'history', "objectType=invoice&objectID={$invoice->id}")?>
      <div class='page-actions'><?php echo html::submitButton() . ' ' . html::backButton();?></div>
    </div>
    <div class='col-side'>
      <div class='panel'>
        <div class='panel-heading'>
          <strong><?php echo $lang->basicInfo;?></strong>
        </div>
        <div class='panel-body'>
          <table class='table table-form'>
            <?php if(count($companies) > 1):?>
            <tr>
              <th class='w-70px'><?php echo $lang->invoice->company;?></th>
              <td><?php echo html::select('company', $companies, $invoice->company, "class='form-control chosen'");?></td>
            </tr>
            <?php else:?>
            <tr><td colspan='2'><?php echo html::hidden('company', (!empty($companies) ? key($companies) : 0));?></td></tr>
            <?php endif;?>
            <tr>
              <th class='w-70px'><?php echo $lang->invoice->customer;?></th>
              <td><?php echo html::input('customer', isset($customer->name) ? $customer->name : '', "class='form-control' disabled");?></td>
            </tr>
            <tr>
              <th><?php echo $lang->invoice->contract;?></th>
              <td><?php echo html::select('contract', $contracts, $invoice->contract, "class='form-control'");?></td>
            </tr>
            <tr>
              <th><?php echo $lang->invoice->contact;?></th>
              <td><?php echo html::select('contact', $contacts, $invoice->contact, "class='form-control'");?></td>
            </tr>
            <tr class='paper'>
              <th><?php echo $lang->invoice->express;?></th>
              <td><?php echo html::input('express', $invoice->express, "class='form-control'");?></td>
            </tr>
            <tr class='paper'>
              <th><?php echo $lang->invoice->waybill;?></th>
              <td><?php echo html::input('waybill', $invoice->waybill, "class='form-control'");?></td>
            </tr>
            <tr class='paper'>
              <th><?php echo $lang->invoice->address;?></th>
              <td><?php echo html::select('address', $addresses, $invoice->address, "class='form-control'");?></td>
            </tr>
            <tr class='digital'>
              <th><?php echo $lang->invoice->sendway;?></th>
              <td><?php echo html::select('sendway', $lang->invoice->sendwayList, $invoice->sendway, "class='form-control'");?></td>
            </tr>
            <tr class='digital'>
              <th><?php echo $lang->invoice->sendAccount;?></th>
              <td><?php echo html::input('sendAccount', $invoice->sendAccount, "class='form-control'");?></td>
            </tr>
          </table>
        </div>
      </div>
      <div class='panel'>
        <div class='panel-heading'>
          <strong><?php echo $lang->invoice->lifetime;?></strong>
        </div>
        <div class='panel-body'>
          <table class='table table-form table-data' id='invoiceLife'>
            <tr>
              <th class='w-70px'><?php echo $lang->invoice->createdBy;?></th>
              <td><?php echo zget($users, $invoice->createdBy);?></td>
            </tr>
            <tr>
              <th><?php echo $lang->invoice->receivedBy;?></th>
              <td><?php echo html::select('receivedBy', $users, $invoice->receivedBy, "class='form-control chosen'");?></td>
            </tr>
            <tr>
              <th><?php echo $lang->invoice->receivedDate;?></th>
              <td><?php echo html::input('receivedDate', formatTime($invoice->receivedDate), "class='form-control form-date'");?></td>
            </tr>
            <tr>
              <th><?php echo $lang->invoice->checkedBy;?></th>
              <td><?php echo html::select('checkedBy', $users, $invoice->checkedBy, "class='form-control chosen'");?></td>
            </tr>
            <tr>
              <th><?php echo $lang->invoice->checkedDate;?></th>
              <td><?php echo html::input('checkedDate', formatTime($invoice->checkedDate), "class='form-control form-date'");?></td>
            </tr>
            <tr>
              <th><?php echo $lang->invoice->drawnBy;?></th>
              <td><?php echo html::select('drawnBy', $users, $invoice->drawnBy, "class='form-control chosen'");?></td>
            </tr>
            <tr>
              <th><?php echo $lang->invoice->drawnDate;?></th>
              <td><?php echo html::input('drawnDate', formatTime($invoice->drawnDate), "class='form-control form-date'");?></td>
            </tr>
            <tr>
              <th><?php echo $invoice->invoiceType == 'paper' ? $lang->invoice->expressedBy : $lang->invoice->sentBy;?></th>
              <td><?php echo html::select('expressedBy', $users, $invoice->expressedBy, "class='form-control chosen'");?></td>
            </tr>
            <tr>
              <th><?php echo $invoice->invoiceType == 'paper' ? $lang->invoice->expressedDate : $lang->invoice->sentDate;?></th>
              <td><?php echo html::input('expressedDate', formatTime($invoice->expressedDate), "class='form-control form-date'");?></td>
            </tr>
            <tr>
              <th><?php echo $lang->invoice->taxRefundedBy;?></th>
              <td><?php echo html::select('taxRefundedBy', $users, $invoice->taxRefundedBy, "class='form-control chosen'");?></td>
            </tr>
            <tr>
              <th><?php echo $lang->invoice->taxRefundedDate;?></th>
              <td><?php echo html::input('taxRefundedDate', formatTime($invoice->taxRefundedDate), "class='form-control form-date'");?></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</form>

<script type='text/template' id='detailTpl'>
<tr>
  <td><?php echo html::select('itemList[]', $itemList, '', "class='form-control chosen' placeholder='{$lang->invoice->item}'");?></td>
  <td class='w-140px'><?php echo html::input('modelList[]', '', "class='form-control' placeholder='{$lang->invoice->model}'");?></td>
  <td class='w-120px'><?php echo html::input('unitList[]', '', "class='form-control' placeholder='{$lang->invoice->unit}'");?></td>
  <td class='w-80px'><?php echo html::input('amountList[]', '', "class='form-control' placeholder='{$lang->invoice->amount}'");?></td>
  <td class='w-140px'><?php echo html::input('priceList[]', '', "class='form-control' placeholder='{$lang->invoice->price}'");?></td>
  <td class='w-140px'><?php echo html::input('moneyList[]', '', "class='form-control' placeholder='{$lang->invoice->money}' readonly='readonly'");?></td>
  <td class='w-60px'><i class='btn btn-mini icon-plus'></i>&nbsp;&nbsp;<i class='btn btn-mini icon-remove'></i></td>
</tr>
</script>
<?php include $app->getAppRoot() . 'common/view/footer.html.php';?>
