<?php
/**
 * The edit view file of workflow module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     workflow 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../sys/common/view/header.modal.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?>
<?php js::set('currentModule', $module->module);?>
<form id='ajaxForm' method='post' action='<?php echo inlink('edit', "id={$module->id}");?>'>
  <table class='table table-form w-p90'>
    <?php if($module->type == 'flow'):?>
    <tr>
      <th class='w-80px'><?php echo $lang->workflow->app;?></th>
      <td><?php echo html::select('app', $apps, $module->app, "class='form-control chosen'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->workflow->position;?></th>
      <td>
        <div class='input-group'>
          <?php echo html::select('positionModule', $menus, $module->positionModule, "class='form-control'");?>
          <span class='input-group-addon fix-border'></span>
          <?php echo html::select('position', $lang->workflowfield->positionList, $module->position, "class='form-control'");?>
        </div>
      </td>
    </tr>
    <?php else:?>
    <?php echo html::hidden('app', $module->app);?>
    <?php endif;?>
    <tr>
      <th class='w-80px'><?php echo $lang->workflow->module;?></th>
      <td><?php echo html::input('module', $module->module, "class='form-control' disabled='disabled'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->workflow->name;?></th>
      <td><?php echo html::input('name', $module->name, "class='form-control'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->workflow->desc;?></th>
      <td><?php echo html::textarea('desc', $module->desc, "rows='1' class='form-control'");?></td>
    </tr>
    <?php if($module->type == 'flow'):?>
    <tr>
      <th><?php echo $lang->workflow->groups;?></th>
      <td><?php echo html::checkbox('groups', $groups, $module->groups);?></td>
    </tr>
    <tr>
      <th><?php echo $lang->workflow->users;?></th>
      <td><?php echo html::select('users[]', $users, $module->users, "class='form-control chosen' multiple");?></td>
    </tr>
    <?php endif;?>
    <tr>
      <th></th>
      <td>
        <?php echo html::hidden('parent', $module->parent);?>
        <?php echo html::hidden('type', $module->type);?>
        <?php echo html::submitButton();?>
      </td>
    </tr>
  </table>
</form>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
