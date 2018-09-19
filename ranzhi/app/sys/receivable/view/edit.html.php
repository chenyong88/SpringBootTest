<?php
/**
 * The edit view file of receivable module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     receivable 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../sys/common/view/header.modal.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?>
<form id='ajaxForm' method='post' action='<?php echo inlink('edit', "receivableID=$receivable->id");?>'>
  <table class='table table-form'>
    <tr>
      <th class='w-100px'><?php echo $lang->receivable->trader;?></th>
      <td>
        <?php echo !empty($customer->name) ? $customer->name : '';?>
        <?php echo html::hidden('trader', $receivable->trader);?>
      </td>
      <td class='w-40px'></td>
    </tr>
    <tr>
      <th><?php echo $lang->receivable->type;?></th>
      <td><?php echo html::select('origin', $lang->receivable->originList, $receivable->origin, "class='form-control'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->receivable->contract;?></th>
      <td>
        <div class='required required-wrapper'></div>
        <?php echo html::select('contract', '', '', "class='form-control chosen'");?>
      </td>
    </tr>
    <tr>
      <th><?php echo $lang->receivable->order;?></th>
      <td>
        <div class='required required-wrapper'></div>
        <?php echo html::select('order', '', '', "class='form-control chosen'");?>
      </td>
    </tr>
    <tr>
      <th><?php echo $lang->receivable->batch;?></th>
      <td><?php echo html::select('batch', '', '', "class='form-control chosen'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->receivable->deserved;?></th>
      <td><?php echo html::input('deserved', $receivable->deserved, "class='form-control'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->receivable->actual;?></th>
      <td><?php echo html::input('actual', $receivable->actual, "class='form-control'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->receivable->balance;?></th>
      <td><?php echo html::input('balance', $receivable->balance, "class='form-control' readonly");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->receivable->desc;?></th>
      <td>
        <div class='required required-wrapper'></div>
        <?php echo html::input('desc', $receivable->desc, "class='form-control'");?>
      </td>
    </tr>
    <tr>
      <th></th>
      <td><?php echo html::submitButton();?></td>
    </tr>
  </table>
</form>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
