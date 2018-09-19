<?php
/**
 * The detail view file of rule module of Ranzhi.
 *
 * @copyright   Copyright 2009-2017 青岛易软天创网络科技有限公司 
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     rule 
 * @version     $Id$
 * @link        http://www.ranzhi.org 
 */
?>
<?php include '../../common/view/header.html.php';?>
<div class='row-table'>
  <div class='col-main'>
    <div class='panel'>
      <div class='panel-heading'><strong><?php echo $lang->rule->desc;?></strong></div>
      <div class='panel-body'>
        <p><?php echo $rule->desc;?></p>
      </div> 
    </div> 
    <?php if($rule->sharedRules):?>
    <div class='panel'>
      <div class='panel-heading'><strong><?php echo $lang->rule->sharedRules;?></strong></div>
      <table class='table table-condensed table-bordered'>
        <tr class='text-center'> 
          <th class='w-200px'><?php echo $lang->rule->from;?></th> 
          <th class='w-200px'><?php echo $lang->rule->fromCategory;?></th> 
          <th class='w-200px'><?php echo $lang->rule->to;?></th> 
          <th class='w-200px'><?php echo $lang->rule->toCategory;?></th> 
          <th class='w-120px'><?php echo $lang->rule->rate;?></th> 
        </tr>
        <?php $totalRate = 0;?>
        <?php foreach($rule->sharedRules as $sharedRule):?>
        <?php $totalRate += $sharedRule->rate;?>
        <tr>
          <td><?php echo zget($deptList, $sharedRule->from);?></td>
          <td><?php echo zget($expenseList, $sharedRule->fromCategory);?></td>
          <td><?php echo zget($deptList, $sharedRule->to);?></td>
          <td><?php echo zget($incomeList, $sharedRule->toCategory);?></td>
          <td class='text-right'><?php echo $sharedRule->rate . '%';?></td>
        </tr>
        <?php endforeach;?>
        <tr>
          <th class='text-center'><?php echo $lang->rule->total;?></th>
          <td></td>
          <td></td>
          <td></td>
          <th class='text-right'><?php echo $totalRate . '%';?></th>
        </tr>
      </table>
    </div> 
    <?php endif;?>
    <?php echo $this->fetch('action', 'history', "objectType=rule&objectID=$rule->id");?>
    <div class='page-actions'>
      <div class='btn-group'>
        <?php commonModel::printLink('rule', 'edit',   "ruleID=$rule->id", $lang->edit, "class='btn btn-primary'");?>
        <?php commonModel::printLink('rule', 'delete', "ruleID=$rule->id", $lang->delete, "class='btn btn-primary deleter'");?>
      </div>
      <?php echo html::backButton();?>
    </div>
  </div>
  <div class='col-side'>
    <div class='panel'>
      <div class='panel-heading'>
        <strong><i class='icon-file-text-alt'></i> <?php echo $lang->rule->basic;?></strong>
      </div>
      <div class='panel-body'>
        <table class='table table-info'>
          <tr>
            <th class='w-80px'><?php echo $lang->rule->id;?></th>
            <td><?php echo $rule->id;?></td>
          </tr>
          <tr>
            <th><?php echo $lang->rule->year;?></th>
            <td><?php echo $rule->month;?></td>
          </tr>
          <tr>
            <th><?php echo $lang->rule->from;?></th>
            <td><?php echo zget($deptList, $rule->from, '');?></td>
          </tr>
          <tr>
            <th><?php echo $lang->rule->product;?></th>
            <td><?php echo zget($productList, $rule->product, '');?></td>
          </tr>
          <tr>
            <th><?php echo $lang->rule->category;?></th>
            <td><?php echo zget($categoryList, $rule->category, '');?></td>
          </tr>
          <tr>
            <th><?php echo $lang->rule->createdBy;?></th>
            <td><?php echo zget($userList, $rule->createdBy);?></td>
          </tr>
          <tr>
            <th><?php echo $lang->rule->createdDate;?></th>
            <td><?php echo formatTime($rule->createdDate, DT_DATE1);?></td>
          </tr>
          <tr>
            <th><?php echo $lang->rule->editedBy;?></th>
            <td><?php echo zget($userList, $rule->editedBy);?></td>
          </tr>
          <tr>
            <th><?php echo $lang->rule->editedDate;?></th>
            <td><?php echo formatTime($rule->editedDate, DT_DATE1);?></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
