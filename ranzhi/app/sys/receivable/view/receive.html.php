<?php
/**
 * The receive view file of receivable module of RanZhi.
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
<?php include '../../../sys/common/view/datepicker.html.php';?>
<form id='ajaxForm' method='post' action='<?php echo inlink('receive', "receivableID=$receivable->id");?>'>
  <table class='table table-form'>
    <tr>
      <th class='w-80px'><?php echo $lang->trade->depositor;?></th>
      <td><?php echo html::select('depositor', $depositors, '', "class='form-control chosen'");?></td>
      <td class='w-40px'></td>
    </tr>
    <tr>
      <th><?php echo $lang->trade->category;?></th>
      <td><?php echo html::select('category', $categories, '', "class='form-control chosen'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->trade->money;?></th>
      <td>
        <div class='input-group'>
          <?php echo html::input('money', '', "class='form-control'");?>
          <div class='input-group-addon'>
            <label class='checkbox-inline'><input type='checkbox' id='finish' name='finish' value='1'> <?php echo $lang->receivable->completeReceive;?></label>
          </div>
        </div>
      </td>
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
      <td><?php echo html::select('product', $products, '', "class='form-control chosen'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->trade->date;?></th>
      <td><?php echo html::input('date', date('Y-m-d'), "class='form-control form-date'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->trade->desc;?></th>
      <td><?php echo html::textarea('desc', '', "rows='3' class='form-control'");?></td>
    </tr>
    <tr>
      <th></th>
      <td><?php echo html::submitButton();?></td>
    </tr>
  </table>
</form>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
