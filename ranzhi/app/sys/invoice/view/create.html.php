<?php
/**
 * The create view file of invoice module of RanZhi.
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
<?php js::set('contractID', $contractID);?>
<?php js::set('moneyTip', $lang->invoice->placeholder->money);?>
<div class='panel'>
  <div class='panel-heading'><strong><i class='icon-plus'></i> <?php echo $lang->invoice->create;?></strong></div>
  <div class='panel-body'>
    <form method='post' id='ajaxForm'>
      <table class='table table-form'>
        <?php if(count($companies) > 1):?>
        <tr>
          <th class='w-80px'><?php echo $lang->invoice->company;?></th>
          <td colspan='3'><?php echo html::select('company', $companies, isset($company) ? $company : '', "class='form-control chosen'");?></td>
        </tr>
        <?php else:?>
        <tr><td colspan='4'><?php echo html::hidden('company', (!empty($companies) ? key($companies) : 0));?></td></tr>
        <?php endif;?>
        <tr>
          <th class='w-80px'><?php echo $lang->invoice->customer;?></th>
          <td class='w-300px'><?php echo html::select('customer', $customers, $customerID, "class='form-control chosen' data-no_results_text='" . $lang->searchMore . "'");?></td>
          <th class='w-80px'><?php echo $lang->invoice->titles;?></th>
          <td class='w-300px'><?php echo html::select('customerInvoice', '', '', "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->invoice->contract;?></th>
          <td class='contractTD' colspan='3'>
            <?php echo html::select('contract', '', '', "class='form-control'");?>
          </td>
        </tr>
        <tr>
          <th><?php echo $lang->invoice->type;?></th>
          <td>
            <div class='input-group'>
              <?php echo html::select('type', $lang->invoice->typeList, '', "class='form-control'");?>
              <span class='input-group-addon fix-border'><?php echo $lang->invoice->taxRate;?></span>
              <?php echo html::input('taxRate', '', "class='form-control'");?>
              <span class='input-group-addon'><?php echo $lang->percent;?></span>
            </div>
          </td>
          <th><?php echo $lang->invoice->invoiceType;?></th>
          <td><?php echo html::select('invoiceType', $lang->invoice->invoiceTypeList, 'paper', "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->invoice->invoiceTitle;?></th>
          <td><?php echo html::input('invoiceTitle', '', "class='form-control'");?></td>
          <th><?php echo $lang->invoice->taxNumber;?></th>
          <td><?php echo html::input('taxNumber', '', "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->invoice->registedAddress;?></th>
          <td>
            <div class='required required-wrapper'></div>
            <?php echo html::input('registedAddress', '', "class='form-control'");?>
          </td>
          <th><?php echo $lang->invoice->phone;?></th>
          <td>
            <div class='required required-wrapper'></div>
            <?php echo html::input('phone', '', "class='form-control'");?>
          </td>
        </tr>
        <tr>
          <th><?php echo $lang->invoice->bankName;?></th>
          <td>
            <div class='required required-wrapper'></div>
            <?php echo html::input('bankName', '', "class='form-control'");?>
          </td>
          <th><?php echo $lang->invoice->bankAccount;?></th>
          <td>
            <div class='required required-wrapper'></div>
            <?php echo html::input('bankAccount', '', "class='form-control'");?>
          </td>
        </tr>
        <tr>
          <th><?php echo $lang->invoice->detail;?></th>
          <td colspan='3' id='detailBox'>
            <table class='table table-detail'>
              <?php if(!empty($products)):?>
              <?php $amount = $price = $money = '';?>
              <?php if(count($products) == 1):?>
              <?php $amount = 1;?>
              <?php $price  = $money = $contractMoney;?>
              <?php endif;?>
              <?php foreach($products as $product):?>
              <tr>
                <td><?php echo html::select('itemList[]', $itemList, $product, "class='form-control chosen' placeholder='{$lang->invoice->item}'");?></td>
                <td class='w-100px'><?php echo html::input('modelList[]', '', "class='form-control' placeholder='{$lang->invoice->model}'");?></td>
                <td class='w-80px'><?php echo html::input('unitList[]', '', "class='form-control' placeholder='{$lang->invoice->unit}'");?></td>
                <td class='w-80px'><?php echo html::input('amountList[]', $amount, "class='form-control' placeholder='{$lang->invoice->amount}'");?></td>
                <td class='w-100px'><?php echo html::input('priceList[]', $price, "class='form-control' placeholder='{$lang->invoice->price}'");?></td>
                <td class='w-120px'><?php echo html::input('moneyList[]', $money, "class='form-control' placeholder='{$lang->invoice->money}' readonly='readonly'");?></td>
                <td class='w-70px'><i class='btn btn-mini icon-plus'></i>&nbsp;&nbsp;<i class='btn btn-mini icon-remove'></i></td>
              </tr>
              <?php endforeach;?>
              <?php endif;?>
              <tr>
                <td><?php echo html::select('itemList[]', $itemList, '', "class='form-control chosen' placeholder='{$lang->invoice->item}'");?></td>
                <td class='w-100px'><?php echo html::input('modelList[]', '', "class='form-control' placeholder='{$lang->invoice->model}'");?></td>
                <td class='w-80px'><?php echo html::input('unitList[]', '', "class='form-control' placeholder='{$lang->invoice->unit}'");?></td>
                <td class='w-80px'><?php echo html::input('amountList[]', '', "class='form-control' placeholder='{$lang->invoice->amount}'");?></td>
                <td class='w-100px'><?php echo html::input('priceList[]', '', "class='form-control' placeholder='{$lang->invoice->price}'");?></td>
                <td class='w-120px'><?php echo html::input('moneyList[]', '', "class='form-control' placeholder='{$lang->invoice->money}' readonly='readonly'");?></td>
                <td class='w-70px'><i class='btn btn-mini icon-plus'></i>&nbsp;&nbsp;<i class='btn btn-mini icon-remove'></i></td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <th><?php echo $lang->invoice->money;?></th>
          <td><?php echo html::input('money', '', "class='form-control' readonly='readonly'");?></td>
          <th><?php echo $lang->invoice->drawnMoney;?></th>
          <td><?php echo html::input('drawnMoney', '', "class='form-control' disabled='disabled'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->invoice->desc;?></th>
          <td colspan='3'><?php echo html::textarea('desc', '', "class='form-control' rows='3'");?></td><td></td>
        </tr>
        <?php if(commonModel::hasPriv('file', 'upload')):?>
        <tr>
          <th><?php echo $lang->invoice->file;?></th>
          <td colspan='3'><?php echo $this->fetch('file', 'buildForm', 'filecount=1');?></td>
        </tr>
        <?php endif;?>
        <tr>
          <th></th>
          <td colspan='3'>
            <?php echo html::submitButton() . '&nbsp;&nbsp;' . html::backButton();?>
            <div id='duplicateError' class='hide'></div>
          </td>
        </tr>
      </table>
    </form>
  </div>
</div>
<script type='text/template' id='detailTpl'>
<tr>
  <td><?php echo html::select('itemList[]', $itemList, '', "class='form-control chosen' placeholder='{$lang->invoice->item}'");?></td>
  <td class='w-100px'><?php echo html::input('modelList[]', '', "class='form-control' placeholder='{$lang->invoice->model}'");?></td>
  <td class='w-80px'><?php echo html::input('unitList[]', '', "class='form-control' placeholder='{$lang->invoice->unit}'");?></td>
  <td class='w-80px'><?php echo html::input('amountList[]', '', "class='form-control' placeholder='{$lang->invoice->amount}'");?></td>
  <td class='w-100px'><?php echo html::input('priceList[]', '', "class='form-control' placeholder='{$lang->invoice->price}'");?></td>
  <td class='w-120px'><?php echo html::input('moneyList[]', '', "class='form-control' placeholder='{$lang->invoice->money}' readonly='readonly'");?></td>
  <td class='w-70px'><i class='btn btn-mini icon-plus'></i>&nbsp;&nbsp;<i class='btn btn-mini icon-remove'></i></td>
</tr>
</script>
<?php include $app->getAppRoot() . 'common/view/footer.html.php';?>
