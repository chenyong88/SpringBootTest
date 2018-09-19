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
    <th class='w-50px'><?php echo $lang->invoice->id;?></th>
    <th class='w-80px'><?php echo $lang->invoice->sn;?></th>
    <th><?php echo $lang->invoice->contract;?></th>
    <th class='w-80px'><?php echo $lang->invoice->money;?></th>
    <th class='w-150px'><?php echo $lang->invoice->type;?></th>
    <th class='w-80px'><?php echo $lang->invoice->status;?></th>
    <th><?php echo $lang->invoice->desc;?></th>
    <th class='w-100px text-middle' rowspan='<?php echo count($invoiceList) + 1;?>'>
      <?php commonModel::printLink('invoice', 'create', "customerID=$customerID", $lang->customer->applyInvoice, "class='btn btn-primary'");?>
    </th>
  </tr>
  <?php foreach($invoiceList as $invoice):?>
  <tr class='text-center'>
    <td><?php echo $invoice->id;?></td>
    <td><?php echo $invoice->sn;?></td>
    <td class='text-left' title='<?php echo zget($contracts, $invoice->contract, '');?>'><?php echo zget($contracts, $invoice->contract, '');?></td>
    <td class='text-right'><?php echo $invoice->money;?></td>
    <td><?php echo zget($lang->invoice->typeList, $invoice->type);?></td>
    <td><?php echo zget($lang->invoice->statusList, $invoice->status);?></td>
    <td class='text-left' title='<?php echo $invoice->desc;?>'><?php echo $invoice->desc;?></td>
  </tr>
  <?php endforeach;?>
</table>
<?php include '../../../common/view/footer.modal.html.php';?>
