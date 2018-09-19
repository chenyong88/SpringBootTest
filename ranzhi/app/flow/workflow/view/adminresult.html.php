<?php
/**
 * The admin result view file of workflow module of RanZhi.
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
<?php js::set('action', $action->id);?>
<ul id='menuTitle'>
  <li><?php echo html::a(inlink('browse', "parent=all&type={$module->type}&app={$module->app}"), $lang->workflow->browse);?></li>
  <li class='divider angle'></li>
  <li><?php echo html::a(inlink('adminAction', "module={$module->module}"), $module->name);?></li>
  <li class='divider angle'></li>
  <li><?php echo html::a(inlink('adminResult', "actionID={$action->id}"), $action->name);?></li>
  <li class='divider angle'></li>
  <li class='title'><?php echo str_replace('-', '', $title);?></li>
</ul>
<div id='menuActions'>
  <?php commonModel::printLink('workflow', 'createResult', "actionID={$action->id}", "<i class='icon-plus'> </i>" . $lang->workflow->createResult, "class='btn btn-primary'");?>
</div>
<div class='with-side'>
  <div class='side panel'>
    <div class='panel-heading'>
      <strong><?php echo $lang->workflowaction->common;?></strong>
    </div>
    <div class='panel-body'>
      <ul class='tree treeview'>
        <?php foreach($actions as $id => $currentAction):?>
        <?php if($currentAction->action == 'delete' or $currentAction->action == 'browse' or $currentAction->action == 'view') continue;?>
        <?php echo '<li>' . html::a(inlink('adminResult', "actionID={$id}"), $currentAction->name) . '</li>';?>
        <?php endforeach;?>
      </ul>
      <div class='text-right'><?php commonModel::printLink('workflow', 'adminAction', "module={$module->module}", $lang->workflow->adminAction, "class='btn btn-primary'");?></div>
    </div>
  </div>
  <div class='main panel'>
    <table class='table table-condensed table-bordered table-fixed'>
      <thead>
        <tr class='text-center'>
          <th><?php echo $lang->workflowaction->condition->common;?></th>
          <th><?php echo $lang->workflowaction->result->common;?></th>
          <th class='w-180px'><?php echo $lang->comment;?></th>
          <th class='w-80px'><?php echo $lang->actions;?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($action->results as $key => $result):?>
        <tr class='text-left'>
          <?php $title = is_object($result->conditions) ? $result->conditions->sql : '';?>
          <td title="<?php echo $title;?>">
            <?php 
            if(is_object($result->conditions))
            {
                echo $result->conditions->sql;
            }
            elseif(is_array($result->conditions))
            {
                foreach($result->conditions as $k => $condition)
                {
                    if($k > 0) echo ' ' . $lang->workflowaction->result->logicalOperators[$condition->logicalOperator] . ' ';
                    echo zget($fields, $condition->field);
                    echo zget($lang->workflowaction->operatorList, $condition->operator);
                    if(strpos(',today,now,actor,', ",$condition->paramType,") === false)
                    {
                        echo $condition->param;
                    }
                    else
                    {
                        echo $lang->workflowaction->result->options[$condition->paramType];
                    }
                }
            }
            else
            {
                echo $result->conditions;
            }
            ?>
          </td>
          <td title="<?php echo $result->sql;?>"><?php echo $result->sql;?></td>
          <td title='<?php echo isset($result->comment) ? $result->comment : '';?>'><?php echo isset($result->comment) ? $result->comment : '';?></td>
          <td class='text-center'>
            <?php commonModel::printLink('workflow', 'editResult',   "actionID={$action->id}&key={$key}", $lang->edit);?>
            <?php commonModel::printLink('workflow', 'deleteResult', "actionID={$action->id}&key={$key}", $lang->delete, "class='deleter'");?>
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>
  </div>
</div>
<div class='page-actions'><?php commonModel::printLink('workflow', 'adminAction', "module={$module->module}", $lang->goback, "class='btn btn-default'");?></div>
<?php include '../../common/view/footer.html.php';?>
