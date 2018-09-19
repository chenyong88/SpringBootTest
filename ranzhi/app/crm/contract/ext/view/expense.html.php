<?php
/**
 * The expense view file of contract module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     contract 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../../sys/common/view/header.modal.html.php';?>
<?php include '../../../../sys/common/view/datepicker.html.php';?>
<?php include '../../../../sys/common/view/chosen.html.php';?>
<form method='post' id='ajaxForm' action='<?php echo inlink('expense', "contractID={$contract->id}");?>'>
  <table class='table table-form'>
    <tr>
      <th class='w-70px'><?php echo $lang->trade->depositor;?></th>
      <td><?php echo html::select('depositor', $depositorList, '', "class='form-control'");?></td>
      <td class='w-30px'></td>
    </tr>
    <tr>
      <th><?php echo $lang->trade->category;?></th>
      <td><?php echo html::select('category', array('') + (array) $categories, '', "class='form-control'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->trade->customer;?></th>
     <td><?php echo html::select('trader', $customerList, $contract->customer, "class='form-control chosen'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->trade->money;?></th>
      <td><?php echo html::input('money', '', "class='form-control'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->trade->dept;?></th>
      <td><?php echo html::select('dept', $deptList, $this->app->user->dept, "class='form-control chosen'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->trade->handlers;?></th>
      <td><?php echo html::select('handlers[]', $users, $this->app->user->account, "class='form-control chosen' multiple");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->trade->product;?></th>
      <td><?php echo html::select('product', array('') + $productList, '', "class='form-control chosen'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->trade->date;?></th>
      <td><?php echo html::input('date', date('Y-m-d'), "class='form-control form-date'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->trade->desc;?></th>
      <td><?php echo html::textarea('desc','', "class='form-control' rows='3'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->trade->uploadFile;?></th>
      <td><?php echo $this->fetch('file', 'buildForm');?></td>
    </tr>
    <tr>
      <th></th>
      <td>
        <?php echo html::hidden('contract', $contract->id);?>
        <?php echo html::hidden('objectType[]', 'contract');?>
        <?php echo html::hidden('allCustomer', $contract->customer);?>
        <?php echo html::submitButton();?>
      </td>
    </tr>
  </table>
</form>
<?php include '../../../../sys/common/view/footer.modal.html.php';?>
