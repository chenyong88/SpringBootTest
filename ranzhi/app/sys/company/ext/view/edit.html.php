<?php
/**
 * The edit file of company module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     company 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../../../sys/common/view/header.modal.html.php';?>
<?php include '../../../../sys/common/view/kindeditor.html.php';?>
<form method='post' id='ajaxForm' action="<?php echo inlink('edit', "companyID={$company->id}");?>">
  <table class='table table-form'>
    <tr>
      <th class='w-80px'><?php echo $lang->company->name;?></th>
      <td class='w-p50'><?php echo html::input('name', $company->name, "class='form-control'");?></td><td></td>
    </tr>
    <tr>
      <th><?php echo $lang->company->status;?></th>
      <td><?php echo html::select('status', $lang->company->statusList, $company->status, "class='form-control'");?></td><td></td>
    </tr>
    <tr>
      <th><?php echo $lang->company->taxNumber;?></th>
      <td><?php echo html::input('taxNumber', $company->taxNumber, "class='form-control'");?></td><td></td>
    </tr>
    <tr>
      <th><?php echo $lang->company->registedAddress;?></th>
      <td colspan='2'>
        <div class='input-group'>
          <?php echo html::input('registedAddress', $company->registedAddress, "class='form-control'");?>
          <span class='input-group-addon fix-border'><?php echo $lang->company->phone;?></span>
          <?php echo html::input('phone', $company->phone, "class='form-control'");?>
        </div>
      </td>
    </tr>
    <tr>
      <th><?php echo $lang->company->bankName;?></th>
      <td colspan='2'>
        <div class='input-group'>
          <?php echo html::input('bankName', $company->bankName, "class='form-control'");?>
          <span class='input-group-addon fix-border'><?php echo $lang->company->bankAccount;?></span>
          <?php echo html::input('bankAccount', $company->bankAccount, "class='form-control'");?>
        </div>
      </td>
    </tr>
    <tr>
      <th><?php echo $lang->company->content;?></th>
      <td colspan='2'><?php echo html::textarea('content', $company->content, "class='form-control' rows=5");?></td>
    </tr>
    <tr>
      <th></th>
      <td><?php echo html::submitButton();?></td>
    </tr>
  </table>
</form>
<?php include '../../../../sys/common/view/footer.modal.html.php';?>
