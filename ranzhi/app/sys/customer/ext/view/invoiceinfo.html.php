<?php
/**
 * The invoice browse file of customer module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     customer 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../common/view/header.modal.html.php';?>
<table class='table table-bordered table-data table-fixed'>
  <tr class='text-center'>
    <th class='w-50px'><?php echo $lang->customer->id;?></th>
    <th><?php echo $lang->customer->invoiceTitle;?></th>
    <th class='w-150px'><?php echo $lang->customer->taxNumber;?></th>
    <th class='w-160px'><?php echo $lang->customer->registedAddress;?></th>
    <th class='w-100px'><?php echo $lang->customer->phone;?></th>
    <th class='w-160px'><?php echo $lang->customer->bankName;?></th>
    <th class='w-150px'><?php echo $lang->customer->bankAccount;?></th>
    <th class='w-70px'><?php echo $lang->actions;?></th>
    <th class='w-70px text-middle' rowspan='<?php echo count($invoiceInfoList) + 1;?>'>
      <?php commonModel::printLink('customer', 'createInvoice', "customerID=$customerID", $lang->create, "class='loadInModal btn btn-primary'");?>
    </th>
  </tr>
  <?php foreach($invoiceInfoList as $invoice):?>
  <tr class='text-center'>
    <td><?php echo $invoice->id;?></td>
    <td title='<?php echo $invoice->invoiceTitle;?>'><?php echo $invoice->invoiceTitle;?></td>
    <td><?php echo $invoice->taxNumber;?></td>
    <td title='<?php echo $invoice->registedAddress;?>'><?php echo $invoice->registedAddress;?></td>
    <td><?php echo $invoice->phone;?></td>
    <td title='<?php echo $invoice->bankName;?>'><?php echo $invoice->bankName;?></td>
    <td><?php echo $invoice->bankAccount;?></td>
    <td>
      <?php commonModel::printLink('customer', 'editInvoice', "invoiceID=$invoice->id", $lang->edit, "class='loadInModal'");?>
      <?php commonModel::printLink('customer', 'deleteInvoice', "invoiceID=$invoice->id", $lang->delete, "class='deleter'");?>
    </td>
  </tr>
  <?php endforeach;?>
</table>
<?php include '../../../common/view/footer.modal.html.php';?>
