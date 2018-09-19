<?php
/**
 * The edit action view file of workflow module of RanZhi.
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
<form id='ajaxForm' method='post' action='<?php echo inlink('editAction', "id={$action->id}");?>'>
  <table class='table table-form w-p90'>
    <?php $disabled = $action->action != 'view' && in_array($action->action, $config->workflow->defaultActions) ? "disabled='disabled'" : '';?>
    <tr>
      <th class='w-80px'><?php echo $lang->workflowaction->name;?></th>
      <td>
        <div class='input-group'>
          <?php echo html::input('name', $action->name, "class='form-control'");?>
          <span class='input-group-addon fix-border'><?php echo $lang->workflowaction->open;?></span>
          <?php echo html::select('open', $lang->workflowaction->openList, $action->open, "class='form-control' $disabled");?>
        </div>
      </td><td></td>
    </tr>
    <?php $disabled = in_array($action->action, $config->workflow->defaultActions) ? "disabled='disabled'" : '';?>
    <tr>
      <th><?php echo $lang->workflowaction->common;?></th>
      <td><?php echo html::input('action', $action->action, "class='form-control' placeholder='{$lang->workflow->placeholder->code}' $disabled");?></td><td></td>
    </tr>
    <tr>
      <th><?php echo $lang->workflowaction->position;?></th>
      <td><?php echo html::select('position', $lang->workflowaction->positionList, $action->action == 'browse' ? '' : $action->position, "class='form-control' $disabled");?></td>
      <td class='w-40px'><a data-toggle='tooltip' data-tip-class='tooltip-primary' title='<?php echo $lang->workflow->tips->actionPosition;?>'><i class='icon-question-sign'></i></a></td>
    </tr>
    <tr>
      <th><?php echo $lang->workflowaction->show;?></th>
      <td><?php echo html::select('show', $lang->workflowaction->showList, $action->show, "class='form-control' $disabled");?></td>
      <td class='w-40px'><a data-toggle='tooltip' data-tip-class='tooltip-primary' title='<?php echo $lang->workflow->tips->actionShow;?>'><i class='icon-question-sign'></i></a></td>
    </tr>
    <tr>
      <th><?php echo $lang->workflowaction->desc;?></th>
      <td><?php echo html::textarea('desc', $action->desc, "rows='1' class='form-control'");?></td><td></td>
    </tr>
    <tr>
      <th></th>
      <td>
        <?php echo html::hidden('module', $action->module);?>
        <?php echo html::submitButton();?>
      </td><td></td>
    </tr>
  </table>
</form>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
