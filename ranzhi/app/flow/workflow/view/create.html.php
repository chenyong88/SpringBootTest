<?php
/**
 * The create view file of workflow module of RanZhi.
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
<?php js::set('currentModule', '');?>
<form id='ajaxForm' method='post' action='<?php echo inlink('create', "parent=$parent&type=$type&app=$app");?>'>
  <table class='table table-form w-p90'>
    <?php if($type == 'flow'):?>
    <tr>
      <th class='w-80px'><?php echo $lang->workflow->app;?></th>
      <td><?php echo html::select('app', $apps, $app, "class='form-control chosen'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->workflow->position;?></th>
      <td>
        <div class='input-group'>
          <select class='form-control' name='positionModule' id='positionModule'></select>
          <span class='input-group-addon fix-border'></span>
          <?php echo html::select('position', $lang->workflowfield->positionList, '', "class='form-control'");?>
        </div>
      </td>
    </tr>
    <?php endif;?>
    <tr>
      <th class='w-80px'><?php echo $lang->workflow->module;?></th>
      <td><?php echo html::input('module', '', "class='form-control' placeholder='{$lang->workflow->placeholder->module}'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->workflow->name;?></th>
      <td><?php echo html::input('name', '', "class='form-control'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->workflow->desc;?></th>
      <td><?php echo html::textarea('desc', '', "rows='1' class='form-control'");?></td>
    </tr>
    <?php if($type == 'flow'):?>
    <tr>
      <th><?php echo $lang->workflow->groups;?></th>
      <td><?php echo html::checkbox('groups', $groups, '');?></td>
    </tr>
    <tr>
      <th><?php echo $lang->workflow->users;?></th>
      <td><?php echo html::select('users[]', $users, '', "class='form-control chosen' multiple");?></td>
    </tr>
    <?php endif;?>
    <tr>
      <th></th>
      <td>
        <?php echo html::hidden('parent', $parent);?>
        <?php echo html::hidden('type', $type);?>
        <?php if($type == 'table') echo html::hidden('app', $app);?>
        <?php echo html::submitButton();?>
      </td>
    </tr>
  </table>
</form>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
