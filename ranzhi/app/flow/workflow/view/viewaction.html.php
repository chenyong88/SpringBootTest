<?php
/**
 * The view action view file of workflow module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     workflow 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../common/view/header.html.php';?>
<ul id='menuTitle'>
  <li><?php echo html::a(inlink('browse', "parent=all&type=flow"), $lang->workflow->browse);?></li>
  <li class='divider angle'></li>
  <li><?php echo html::a(inlink('adminAction', "module={$module->module}"), $module->name);?></li>
  <li class='divider angle'></li>
  <li><?php echo html::a(inlink('viewAction', "action={$action->id}"), $action->name);?></li>
  <li class='divider angle'></li>
  <li class='title'><?php echo str_replace('-', '', $title);?></li>
</ul>
<div class='row-table'>
  <div class='col-main'>
    <div class='panel'>
      <div class='panel-heading'><strong><?php echo $lang->workflowaction->desc;?></strong></div>
      <div class='panel-body'>
        <?php echo $action->desc;?>
      </div>
    </div>
    <div class='page-actions'>
      <div class='btn-group'>
        <?php $isDefault = in_array($action->action, $config->workflow->defaultActions);?>
        <?php commonModel::printLink('workflow', 'editAction', "actionID={$action->id}", $lang->edit, "data-toggle='modal' data-width='600' class='btn'");?>
        <?php commonModel::printLink('workflow', 'viewAction', "actionID={$action->id}", $lang->view, "class='btn'");?>
        <?php
        if($isDefault)
        {
            echo html::a('#', $lang->delete, "disabled='disabled' class='btn'");
        }
        else
        {
            commonModel::printLink('workflow', 'deleteAction', "actionID={$action->id}", $lang->delete, "class='deleter btn'");
        }
        ?>
      </div>
      <div class='btn-group'>
        <?php
        if($action->action == 'delete' or $action->open == 'none') 
        {
            echo html::a('#', $lang->workflowaction->layout->common, "disabled='disabled' class='btn'");
        }
        else
        {
            commonModel::printLink('workflow', 'adminLayout', "actionID={$action->id}", $lang->workflowaction->layout->common, "class='btn'");
        }

        if($action->action == 'browse' or $action->action == 'view')
        {
            echo html::a('#', $lang->workflow->verification, "disabled='disabled' class='btn'");
            echo html::a('#', $lang->workflowaction->result->common, "disabled='disabled' class='btn'");
            echo html::a('#', $lang->workflow->setNotice, "disabled='disabled' class='btn'");
        }
        else
        {
            if($action->open == 'none' or $action->action == 'delete')
            {
                echo html::a('#', $lang->workflow->verification, "disabled='disabled' class='btn'");
            }
            else
            {
                commonModel::printLink('workflow', 'verification', "actionID={$action->id}", $lang->workflow->verification, "class='btn'");
            }
            commonModel::printLink('workflow', 'adminResult',  "actionID={$action->id}", $lang->workflowaction->result->common, "class='btn'");
            commonModel::printLink('workflow', 'setNotice',  "actionID={$action->id}", $lang->workflow->setNotice, "data-toggle='modal' class='btn'");
        }
        ?>
      </div>
    </div>
  </div>
  <div class='col-side'>
    <div class='panel'>
      <div class='panel-heading'>
        <strong><?php echo $lang->basicInfo;?></strong>
      </div>
      <div class='panel-body'>
        <table class='table table-info'>
          <tr>
            <th class='w-70px'><?php echo $lang->workflowaction->name;?></th>
            <td><?php echo $action->name;?></td>
          </tr>
          <tr>
            <th><?php echo $lang->workflowaction->action;?></th>
            <td><?php echo $action->action;?></td>
          </tr>
          <?php if(!empty($action->open)):?>
          <tr>
            <th><?php echo $lang->workflowaction->open;?></th>
            <td><?php echo zget($lang->workflowaction->openList, $action->open);?></td>
          </tr>
          <?php endif;?>
          <?php if(!empty($action->position)):?>
          <tr>
            <th><?php echo $lang->workflowaction->position;?></th>
            <td><?php echo zget($lang->workflowaction->positionList, $action->position);?></td>
          </tr>
          <?php endif;?>
          <?php if(!empty($action->show)):?>
          <tr>
            <th><?php echo $lang->workflowaction->show;?></th>
            <td><?php echo zget($lang->workflowaction->showList, $action->show);?></td>
          </tr>
          <?php endif;?>
          <tr>
            <th><?php echo $lang->workflow->createdBy;?></th>
            <td><?php echo zget($users, $action->createdBy) . $lang->at . $action->createdDate;?></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
