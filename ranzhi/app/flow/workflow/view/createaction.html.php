<?php
/**
 * The create action view file of workflow module of RanZhi.
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
<form id='ajaxForm' method='post' action='<?php echo inlink('createAction', "module=$module");?>'>
  <table class='table table-form w-p90'>
    <tr>
      <th class='w-80px'><?php echo $lang->workflowaction->name;?></th>
      <td>
        <div class='input-group'>
          <?php echo html::input('name', '', "class='form-control'");?>
          <span class='input-group-addon fix-border'><?php echo $lang->workflowaction->open;?></span>
          <?php echo html::select('open', $lang->workflowaction->openList, '', "class='form-control'");?>
        </div>
      </td><td></td>
    </tr>
    <tr>
      <th><?php echo $lang->workflowaction->common;?></th>
      <td><?php echo html::input('action', '', "class='form-control' placeholder='{$lang->workflow->placeholder->code}'");?></td><td></td>
    </tr>
    <tr>
      <th><?php echo $lang->workflowaction->position;?></th>
      <td><?php echo html::select('position', $lang->workflowaction->positionList, 'browseandview', "class='form-control'");?></td>
      <td class='w-40px'><a data-toggle='tooltip' data-tip-class='tooltip-primary' title='<?php echo $lang->workflow->tips->actionPosition;?>'><i class='icon-question-sign'></i></a></td>
    </tr>
    <tr>
      <th><?php echo $lang->workflowaction->show;?></th>
      <td><?php echo html::select('show', $lang->workflowaction->showList, '0', "class='form-control'");?></td>
      <td class='w-40px'><a data-toggle='tooltip' data-tip-class='tooltip-primary' title='<?php echo $lang->workflow->tips->actionShow;?>'><i class='icon-question-sign'></i></a></td>
    </tr>
    <tr>
      <th><?php echo $lang->workflowaction->desc;?></th>
      <td><?php echo html::textarea('desc', '', "rows='1' class='form-control'");?></td><td></td>
    </tr>
    <tr>
      <th></th>
      <td>
        <?php echo html::hidden('module', $module);?>
        <?php echo html::submitButton();?>
      </td><td></td>
    </tr>
  </table>
</form>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
