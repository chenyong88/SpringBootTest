<?php
/**
 * The detail view file of budget module of Ranzhi.
 *
 * @copyright   Copyright 2009-2017 青岛易软天创网络科技有限公司 
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     budget 
 * @version     $Id$
 * @link        http://www.ranzhi.org 
 */
?>
<?php include '../../common/view/header.html.php';?>
<div class='row-table'>
  <div class='col-main'>
    <div class='panel'>
      <div class='panel-heading'><strong><?php echo $lang->budget->desc;?></strong></div>
      <div class='panel-body'>
        <p><?php echo $budget->desc;?></p>
      </div> 
    </div> 
    <?php echo $this->fetch('action', 'history', "objectType=budget&objectID=$budget->id");?>
    <div class='page-actions'>
      <div class='btn-group'>
        <?php commonModel::printLink('budget', 'edit',   "budgetID=$budget->id", $lang->edit, "class='btn btn-primary' data-toggle='modal'");?>
        <?php commonModel::printLink('budget', 'delete', "budgetID=$budget->id", $lang->delete, "class='btn btn-primary deleter'");?>
      </div>
      <?php echo html::backButton();?>
    </div>
  </div>
  <div class='col-side'>
    <div class='panel'>
      <div class='panel-heading'>
        <strong><i class='icon-file-text-alt'></i> <?php echo $lang->budget->basic;?></strong>
      </div>
      <div class='panel-body'>
        <table class='table table-info'>
          <tr>
            <th class='w-80px'><?php echo $lang->budget->id;?></th>
            <td><?php echo $budget->id;?></td>
          </tr>
          <tr>
            <th><?php echo $lang->budget->year;?></th>
            <td><?php echo $budget->year;?></td>
          </tr>
          <tr>
            <th><?php echo $lang->budget->dept;?></th>
            <td><?php echo zget($deptList, $budget->dept);?></td>
          </tr>
          <tr>
            <th><?php echo $lang->budget->amebaAccount;?></th>
            <td><?php echo zget($lang->budget->amebaAccountList, $budget->amebaAccount);?></td>
          </tr>
          <tr>
            <th><?php echo $lang->budget->line;?></th>
            <td><?php echo zget($productLines, $budget->line);?></td>
          </tr>
          <tr>
            <th><?php echo $lang->budget->category;?></th>
            <td><?php echo zget($categoryList, $budget->category);?></td>
          </tr>
          <tr>
            <th><?php echo $lang->budget->money;?></th>
            <td><?php echo $budget->money;?></td>
          </tr>
          <tr>
            <th><?php echo $lang->budget->createdBy;?></th>
            <td><?php echo zget($userList, $budget->createdBy);?></td>
          </tr>
          <tr>
            <th><?php echo $lang->budget->createdDate;?></th>
            <td><?php echo formatTime($budget->createdDate, DT_DATE1);?></td>
          </tr>
          <tr>
            <th><?php echo $lang->budget->editedBy;?></th>
            <td><?php echo zget($userList, $budget->editedBy);?></td>
          </tr>
          <tr>
            <th><?php echo $lang->budget->editedDate;?></th>
            <td><?php echo formatTime($budget->editedDate, DT_DATE1);?></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
