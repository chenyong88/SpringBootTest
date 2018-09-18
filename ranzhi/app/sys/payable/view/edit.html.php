<?php
/**
 * The edit view file of payable module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     payable 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../sys/common/view/header.modal.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?>
<form id='ajaxForm' method='post' action='<?php echo inlink('edit', "payableID=$payable->id");?>'>
  <table class='table table-form'>
    <tr>
      <th class='w-100px'><?php echo $lang->payable->trader;?></th>
      <td>
        <?php echo !empty($customer->name) ? $customer->name : '';?>
        <?php echo html::hidden('trader', $payable->trader);?>
      </td>
      <td class='w-40px'></td>
    </tr>
    <tr>
      <th><?php echo $lang->payable->type;?></th>
      <td><?php echo html::select('origin', $lang->payable->originList, $payable->origin, "class='form-control'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->payable->contract;?></th>
      <td>
        <div class='required required-wrapper'></div>
        <?php echo html::select('contract', $contracts, '', "class='form-control chosen'");?>
      </td>
    </tr>
    <tr>
      <th><?php echo $lang->payable->order;?></th>
      <td>
        <div class='required required-wrapper'></div>
        <?php echo html::select('order', '', '', "class='form-control chosen'");?>
      </td>
    </tr>
    <tr>
      <th><?php echo $lang->payable->batch;?></th>
      <td><?php echo html::select('batch', '', '', "class='form-control chosen'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->payable->deserved;?></th>
      <td><?php echo html::input('deserved', $payable->deserved, "class='form-control'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->payable->actual;?></th>
      <td><?php echo html::input('actual', $payable->actual, "class='form-control'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->payable->balance;?></th>
      <td><?php echo html::input('balance', $payable->balance, "class='form-control' readonly");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->payable->desc;?></th>
      <td>
        <div class='required required-wrapper'></div>
        <?php echo html::input('desc', $payable->desc, "class='form-control'");?>
      </td>
    </tr>
    <tr>
      <th></th>
      <td><?php echo html::submitButton();?></td>
    </tr>
  </table>
</form>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
