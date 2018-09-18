<?php
/**
 * The admin workflow rules view file of workflow module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     workflow 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../common/view/header.html.php';?>
<div id='menuActions'>
  <?php commonModel::printLink('workflow', 'createRule', '', $lang->workflow->createRule, "class='btn btn-primary' data-toggle='modal'");?>
</div>
<div class='panel'>
  <table class='table table-condensed table-striped table-hover tablesorter'>
    <thead>
      <tr>
        <?php $vars="&orderBy=%s";?>
        <th><?php commonModel::printOrderLink('name', $orderBy, $vars, $lang->workflowrule->name);?></th>
        <th><?php echo $lang->workflowrule->rule;?></th>
        <th class='w-120px'><?php commonModel::printOrderLink('type', $orderBy, $vars, $lang->workflowrule->type);?></th>
        <th class='w-120px'><?php commonModel::printOrderLink('createdBy', $orderBy, $vars, $lang->workflow->createdBy);?></th>
        <th class='w-120px'><?php commonModel::printOrderLink('createdDate', $orderBy, $vars, $lang->workflow->createdDate);?></th>
        <th class='w-120px'><?php commonModel::printOrderLink('editedBy', $orderBy, $vars, $lang->workflow->editedBy);?></th>
        <th class='w-120px'><?php commonModel::printOrderLink('editedDate', $orderBy, $vars, $lang->workflow->editedDate);?></th>
        <th class='w-100px'><?php echo $lang->actions;?></th>
      </tr>
    </thead>
    <?php foreach($rules as $rule):?>
      <tr>
        <td><?php if($rule->type == 'system' || !commonModel::printLink('workflow', 'viewRule', "id={$rule->id}", $rule->name, "data-toggle='modal'")) echo $rule->name;?></td>
        <td><?php echo $rule->rule;?></td>
        <td><?php echo $lang->workflowrule->typeList[$rule->type];?></td>
        <td><?php echo zget($users, $rule->createdBy);?></td>
        <td><?php echo formatTime($rule->createdDate, DT_DATE1);?></td>
        <td><?php echo zget($users, $rule->editedBy);?></td>
        <td><?php echo formatTime($rule->editedDate, DT_DATE1);?></td>
        <td>
          <?php if($rule->type != 'system'):?>
          <?php commonModel::printLink('workflow', 'editRule', "ruleID={$rule->id}", $lang->edit, "data-toggle='modal'");?>
          <?php commonModel::printLink('workflow', 'deleteRule', "ruleID={$rule->id}", $lang->delete, "class='deleter'");?>
          <?php endif;?>
        </td>
      </tr>
    <?php endforeach;?>
  </table>
</div>
<?php include '../../common/view/footer.html.php';?>
