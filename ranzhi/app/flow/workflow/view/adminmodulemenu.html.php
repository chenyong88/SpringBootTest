<?php
/**
 * The admin module menu view file of workflow module of RanZhi.
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
<?php include '../../../sys/common/view/sortable.html.php';?>
<ul id='menuTitle'>
  <li><?php echo html::a(inlink('browse', "parent=all&type={$module->type}"), $lang->workflow->browse);?></li>
  <li class='divider angle'></li>
  <li><?php echo html::a(inlink('adminField', "module={$module->module}"), $module->name);?></li>
  <li class='divider angle'></li>
  <li class='title'><?php echo str_replace('-', '', $title);?></li>
</ul>
<div id='menuActions'>
  <?php commonModel::printLink('workflow', 'createModuleMenu', "module={$module->module}", "<i class='icon-plus'> </i>" . $lang->workflow->createModuleMenu, "class='btn btn-primary' data-toggle='modal' data-width='600'");?>
</div>
<div class='panel'>
  <table class='table'>
    <thead>
      <tr class='text-center'>
      <th class='w-60px'><?php echo $lang->sort;?></th>
        <th class='w-60px'><?php echo $lang->workflow->id;?></th>
        <th class='w-120px'><?php echo $lang->workflowmenu->label;?></th>
        <th><?php echo $lang->workflowmenu->params;?></th>
        <th class='w-120px'><?php echo $lang->actions;?></th>
      </tr>
    </thead>
    <tbody class='sortable' id='moduleMenuList'>
      <?php foreach($moduleMenuList as $moduleMenu):?>
      <tr class='text-center' data-id='<?php echo $moduleMenu->id;?>'>
        <td class='sort-handler'><i class='icon icon-move text-muted'></i></td>
        <td><?php echo $moduleMenu->id;?></td>
        <td><?php echo $moduleMenu->label;?></td>
        <td>
          <?php foreach($moduleMenu->params as $key => $param):?>
          <?php  echo $param['key'] . zget($lang->workflowaction->operatorList, $param['operator']) . $param['value'] . ' ';?>
          <?php endforeach;?>
        </td>
        <td>
          <?php commonModel::printLink('workflow', 'editModuleMenu', "id=$moduleMenu->id", $lang->edit, "data-toggle='modal' data-width='600'");?>
          <?php commonModel::printLink('workflow', 'deleteModuleMenu', "id=$moduleMenu->id", $lang->delete, "class='deleter'");?>
        </td>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</div>
<div class='page-actions'><?php commonModel::printLink('workflow', 'browse', "parent={$module->parent}&type={$module->type}&app={$module->app}", $lang->goback, "class='btn btn-default'");?></div>
<?php include '../../common/view/footer.html.php';?>
