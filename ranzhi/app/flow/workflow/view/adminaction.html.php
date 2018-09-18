<?php
/**
 * The admin action view file of workflow module of RanZhi.
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
<ul id='menuTitle'>
  <li><?php echo html::a(inlink('browse', "parent=all&type={$module->type}"), $lang->workflow->browse);?></li>
  <li class='divider angle'></li>
  <li><?php echo html::a(inlink('adminField', "module={$module->module}"), $module->name);?></li>
  <li class='divider angle'></li>
  <li class='title'><?php echo str_replace('-', '', $title);?></li>
</ul>
<div id='menuActions'>
  <?php echo html::a("javascript:;", "<i class='icon icon-th-large'></i>", "data-mode='card' class='mode-toggle btn'");?>
  <?php echo html::a("javascript:;", "<i class='icon icon-list'></i>", "data-mode='list' class='mode-toggle btn'");?>
  <?php commonModel::printLink('workflow', 'createAction', "module=$module->module", "<i class='icon-plus'> </i>" . $lang->workflow->createAction, "class='btn btn-primary' data-toggle='modal' data-width='600'");?>
</div>
<?php $class = $this->cookie->actionViewType == 'card' ? '' : 'hide';?>
<div class='row <?php echo $class;?>' id='cardMode'>
  <?php foreach($actions as $id => $action):?>
  <div class='col-md-3 col-sm-6'>
    <div class='panel flow-block'>
      <div class='panel-heading'>
        <strong><?php echo $action->name . ' - ' . $action->action;?></strong>
        <div class="panel-actions pull-right">
          <div class="dropdown">
            <button class="btn btn-mini" data-toggle="dropdown"><span class="caret"></span></button>
            <ul class="dropdown-menu pull-right">
              <?php 
              commonModel::printLink('workflow', 'editAction', "actionID={$id}", $lang->edit, "data-toggle='modal' data-width='600'", '', '', 'li');
              commonModel::printLink('workflow', 'viewAction', "actionID={$id}", $lang->view, '', '', '', 'li');
              $isDefault = in_array($action->action, $config->workflow->defaultActions);
              if(!$isDefault)
              {
                  commonModel::printLink('workflow', 'deleteAction', "actionID={$id}", $lang->delete, "class='deleter'", '', '', 'li');
              }
              ?>
            </ul>
          </div>
        </div>
      </div>
      <div class='panel-body'>
        <div class='info'>
          <div><strong><?php echo $lang->workflowfield->desc;?></strong>&nbsp;&nbsp;<span class='text-important'><?php echo $action->desc;?></span></div>
        </div>
        <div class='footerbar'>
          <?php
          if($isDefault)
          {
              echo html::a('#', $lang->workflowaction->condition->common, "disabled='disabled'");
          }
          else
          {
              commonModel::printLink('workflow', 'adminCondition', "actionID={$id}", $lang->workflowaction->condition->common, "data-toggle='modal'");
          }
          if($action->action == 'delete' or $action->open == 'none') 
          {
              echo html::a('#', $lang->workflowaction->layout->common, "disabled='disabled'");
          }
          else
          {
              commonModel::printLink('workflow', 'adminLayout', "actionID={$id}", $lang->workflowaction->layout->common);
          }
          if($action->action == 'browse' or $action->action == 'view')
          {
              echo html::a('#', $lang->workflow->verification, "disabled='disabled'");
              echo html::a('#', $lang->workflowaction->result->common, "disabled='disabled'");
              echo html::a('#', $lang->workflow->setNotice, "disabled='disabled'");
          }
          else
          {
              if($action->open == 'none' or $action->action == 'delete')
              {
                  echo html::a('#', $lang->workflow->verification, "disabled='disabled'");
              }
              else
              {
                  commonModel::printLink('workflow', 'verification', "actionID={$id}", $lang->workflow->verification);
              }
              commonModel::printLink('workflow', 'adminResult',  "actionID={$id}", $lang->workflowaction->result->common);
              commonModel::printLink('workflow', 'setNotice',  "actionID={$id}", $lang->workflow->setNotice, "data-toggle='modal'");
          }
          ?>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach;?>
</div>
<?php $class = $this->cookie->actionViewType == 'list' ? '' : 'hide';?>
<div class='panel <?php echo $class;?>' id='listMode'>
  <table class='table table-condensed tablesorter table-fixed'>
    <thead>
      <tr>
        <?php $vars="&module={$module->module}&orderBy=%s";?>
        <th class='w-60px'> <?php commonModel::printOrderLink('id', $orderBy, $vars, $lang->workflow->id);?></th>
        <th class='w-150px'><?php commonModel::printOrderLink('name', $orderBy, $vars, $lang->workflowaction->name);?></th>
        <th class='w-150px'><?php commonModel::printOrderLink('action', $orderBy, $vars, $lang->workflowaction->common);?></th>
        <th><?php echo $lang->workflow->desc;?></th>
        <?php $class = $this->app->clientLang == 'en' ? 'w-400px' : 'w-350px';?>
        <th class='<?php echo $class;?>'><?php echo $lang->actions;?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($actions as $id => $action):?>
      <tr>
        <td><?php echo $id;?></td>
        <td><?php echo $action->name;?></td>
        <td><?php echo $action->action;?></td>
        <td title='<?php echo $action->desc;?>'><?php echo $action->desc;?></td>
        <td>
          <?php 
          $isDefault = in_array($action->action, $config->workflow->defaultActions);
          commonModel::printLink('workflow', 'editAction', "actionID={$id}", $lang->edit, "data-toggle='modal' data-width='600'");
          commonModel::printLink('workflow', 'viewAction', "actionID={$id}", $lang->view);
          if($isDefault)
          {
              echo html::a('#', $lang->workflowaction->condition->common, "disabled='disabled'");
          }
          else
          {
              commonModel::printLink('workflow', 'adminCondition', "actionID={$id}", $lang->workflowaction->condition->common, "data-toggle='modal'");
          }
          if($action->action == 'delete' or $action->open == 'none') 
          {
              echo html::a('#', $lang->workflowaction->layout->common, "disabled='disabled'");
          }
          else
          {
              commonModel::printLink('workflow', 'adminLayout', "actionID={$id}", $lang->workflowaction->layout->common);
          }
          if($action->action == 'browse' or $action->action == 'view')
          {
              echo html::a('#', $lang->workflow->verification, "disabled='disabled'");
              echo html::a('#', $lang->workflowaction->result->common, "disabled='disabled'");
              echo html::a('#', $lang->workflow->setNotice, "disabled='disabled'");
          }
          else
          {
              if($action->open == 'none' or $action->action == 'delete')
              {
                  echo html::a('#', $lang->workflow->verification, "disabled='disabled'");
              }
              else
              {
                  commonModel::printLink('workflow', 'verification', "actionID={$id}", $lang->workflow->verification);
              }
              commonModel::printLink('workflow', 'adminResult',  "actionID={$id}", $lang->workflowaction->result->common);
              commonModel::printLink('workflow', 'setNotice',  "actionID={$id}", $lang->workflow->setNotice, "data-toggle='modal'");
          }
          if($isDefault)
          {
              echo html::a('#', $lang->delete, "disabled='disabled'");
          }
          else
          {
              commonModel::printLink('workflow', 'deleteAction', "actionID={$id}", $lang->delete, "class='deleter'");
          }
          ?>
        </td>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</div>
<div class='page-actions'><?php echo html::backButton();?></div>
<?php include '../../common/view/footer.html.php';?>
