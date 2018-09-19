<?php
/**
 * The reimburse view file of refund module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     refund 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../../sys/common/view/header.modal.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?>
<?php include '../../../sys/common/view/datepicker.html.php';?>
<form method='post' id='ajaxForm' action='<?php echo inlink('createtrade', "refundid={$refundID}")?>'>
  <table class='table table-form'>
    <tr>
      <th class='w-60px'><?php echo $lang->trade->depositor;?></th>
      <td>
        <div class='required required-wrapper'></div>
        <?php echo html::select('depositor', $depositorList, isset($this->config->refund->depositor) ? $this->config->refund->depositor : '', "class='form-control chosen'");?>
      </td>
      <td class='w-20px'></td>
    </tr>
    <tr>
      <th class='w-60px'><?php echo $lang->trade->category;?></th>
      <td>
        <div class='required required-wrapper'></div>
        <?php echo html::select('category', $categoryList, $refund->category, "class='form-control chosen'");?>
      </td>
    </tr>
    <tr>
      <th><?php echo $lang->trade->dept;?></th>
      <td>
        <div class='required required-wrapper'></div>
        <?php echo html::select('dept', $deptList, $refund->dept, "class='form-control chosen'");?>
      </td>
    </tr>
    <tr>
      <th><?php echo $lang->trade->handlers;?></th>
      <td>
        <div class='required required-wrapper'></div>
        <?php echo html::select('handlers[]', $userList, $refund->related, "class='form-control chosen' multiple");?>
      </td>
    </tr>
    <tr>
      <th></th>
      <td><?php echo html::submitButton();?></td>
    </tr>
  </table>
</form>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
