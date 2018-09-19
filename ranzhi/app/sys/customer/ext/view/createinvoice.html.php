<?php
/**
 * The create invoice view file of customer module of RanZhi.
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
<form id='invoiceForm' method='post' action='<?php echo inlink('createInvoice', "customerID=$customerID")?>'>
  <table class='table table-form'>
    <tr>
      <th class='w-60px'><?php echo $lang->customer->invoiceTitle;?></th>
      <td><?php echo html::input('invoiceTitle', '', "class='form-control'")?></td>
    </tr>
    <tr>
      <th><?php echo $lang->customer->taxNumber;?></th>
      <td><?php echo html::input('taxNumber', '', "class='form-control'")?></td>
    </tr>
    <tr>
      <th><?php echo $lang->customer->registedAddress;?></th>
      <td><?php echo html::input('registedAddress', '', "class='form-control'")?></td>
    </tr>
    <tr>
      <th><?php echo $lang->customer->phone;?></th>
      <td><?php echo html::input('phone', '', "class='form-control'")?></td>
    </tr>
    <tr>
      <th><?php echo $lang->customer->bankName;?></th>
      <td><?php echo html::input('bankName', '', "class='form-control'")?></td>
    </tr>
    <tr>
      <th><?php echo $lang->customer->bankAccount;?></th>
      <td><?php echo html::input('bankAccount', '', "class='form-control'")?></td>
    </tr>
    <tr>
      <th></th>
      <td><?php echo html::submitButton() . html::commonButton($lang->goback, 'reloadModal btn');?></td>
    </tr>
  </table>
</form>
<?php include '../../../common/view/footer.modal.html.php';?>
