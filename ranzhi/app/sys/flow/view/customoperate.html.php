<?php
/**
 * The custom operate view file of workflow module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     workflow 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php if(!empty($this->config->flow->editor)):?>
<?php include '../../common/view/kindeditor.html.php';?>
<?php endif;?>
<?php include '../../common/view/datepicker.html.php';?>
<?php include '../../common/view/chosen.html.php';?>
<?php js::set('module', $currentModule->parent ? $currentModule->parent : $currentModule->module);?>
<?php js::set('method', $currentMethod);?>
<style>
  .page-actions {text-align: left; margin-left: 85px;}
</style>
<?php if($action->open != 'modal' or $action->position == 'menu'):?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><?php echo str_replace('-', '', $title);?></strong>
  </div>
  <div class='panel-body'>
<?php endif;?>
    <form id='ajaxForm' method='post' action='<?php echo inlink('displayLayout', "module=$currentModule->module&method={$currentMethod}&id={$dataID}");?>'>
      <table class='table table-form'>
        <?php if($action->position == 'menu' && $action->action != 'create'):?>
        <tr>
          <th class='w-100px'><?php echo $currentModule->name;?></th>
          <td class='<?php echo $action->open == 'modal' && $action->position != 'menu' ? '' : 'w-p50';?>'><?php echo html::select('dataID', $dataPairs, $dataID, "class='form-control chosen'");?></td>
          <td></td>
        </tr>
        <?php endif;?>
        <?php if($action->action == 'create' || $dataID != 0):?>
        <?php $hasChildFields = false;?>
        <?php foreach($fields as $field):?>
        <?php $value = isset($data->{$field->field}) ? $data->{$field->field} : $field->defaultValue;?>
        <?php if($action->action == 'create' && $field->field == $foreignKey) $value = $foreignKeyValue;?>
        <?php if($field->show):?>
        <?php if($field->field == 'file'):?>
        <tr>
          <th class='w-100px'><?php echo $lang->files;?></th>
          <td><?php echo $this->fetch('file', 'buildForm');?></td>
          <td></td>
        </tr>
        <?php elseif(isset($childFields[$field->field])):?>
        <?php $hasChildFields = true;?>
        <tr>
          <th><?php echo $field->name;?></th>
          <td colspan='2' class='child'>
            <table class='table table-form table-child' data-child='<?php echo $field->field;?>'>
              <?php $datas = isset($childDatas[$field->field]) ? $childDatas[$field->field] : array('');?>
              <?php foreach($datas as $childData):?>
              <tr>
                <?php foreach($childFields[$field->field] as $childField):?>
                <?php $childValue = isset($childData->{$childField->field}) ? $childData->{$childField->field} : $childField->defaultValue;?>
                <?php if($childField->show):?>
                <td><?php echo $this->workflow->buildControl($childField, $childValue, $field->field);?></td>
                <?php endif;?>
                <?php endforeach;?>
                <td>
                  <a href='#' class='btn btn-default addItem'><i class='icon-plus'></i></a>
                  <a href='#' class='btn btn-default delItem'><i class='icon-remove'></i></a>
                </td>
                <td><?php echo html::hidden("children[{$field->field}][id][]", $childData->id);?></td>
              </tr>
              <?php endforeach;?>

              <tr>
                <?php foreach($childFields[$field->field] as $childField):?>
                <?php if($childField->show):?>
                <td><?php echo $this->workflow->buildControl($childField, '', $field->field, $emptyValue = true);?></td>
                <?php endif;?>
                <?php endforeach;?>
                <td>
                  <a href='#' class='btn btn-default addItem'><i class='icon-plus'></i></a>
                  <a href='#' class='btn btn-default delItem'><i class='icon-remove'></i></a>
                </td>
                <td><?php echo html::hidden("children[{$field->field}][id][]", '');?></td>
              </tr>
            </table>
          </td>
        </tr>
        <?php else:?>
        <tr>
          <th class='w-100px'><?php echo $field->name;?></th>
          <td class='<?php echo $action->open == 'modal' ? '' : 'w-p50';?>'><?php echo $this->workflow->buildControl($field, $value);?></td>
          <td></td>
        </tr>
        <?php endif;?>
        <?php endif;?>
        <?php endforeach;?>
        <?php endif;?>
        <tr>
          <th class='w-100px'><?php echo $lang->workflowaction->toList;?></th>
          <td class='<?php echo $action->open == 'modal' ? '' : 'w-p50';?>'>
            <div class='input-group'>
              <?php echo html::select('toList[]', $users, $action->toList, "class='form-control chosen' data-placeholder='{$lang->chooseUserToMail}' multiple");?>
              <?php echo $this->fetch('usercontact', 'buildContactList');?>
            </div>
          </td>
          <td class='text-important'><?php echo $lang->workflow->tips->notice;?></td>
        </tr>
      </table>

      <?php /* The table below is used to generate dom when click plus button. */?>
      <?php if($hasChildFields):?>
      <?php foreach($childFields as $childModule => $fields):?>
      <table class='table hide table-<?php echo $childModule;?>'>
        <tr>
          <?php foreach($fields as $field):?>
          <?php if($field->show):?>
          <td><?php echo $this->workflow->buildControl($field, $value, $childModule, $emptyValue = true);?></td>
          <?php endif;?>
          <?php endforeach;?>
          <td>
            <a href='#' class='btn btn-default addItem'><i class='icon-plus'></i></a>
            <a href='#' class='btn btn-default delItem'><i class='icon-remove'></i></a>
          </td>
          <td><?php echo html::hidden("children[{$childModule}][id][]", '');?></td>
        </tr>
      </table>
      <?php endforeach;?>
      <?php endif;?>

      <div class='page-actions'>
        <?php 
        echo html::submitButton();
        if($action->open == 'modal')
        {
            echo html::commonButton($lang->close, 'btn', "data-dismiss='modal'");
        }
        else
        {
            echo '&nbsp;&nbsp;' . html::backButton();
        }
        ?>
      </div>
    </form>
<?php if($action->open != 'modal'):?>
  </div>
</div>
<?php endif;?>
<script>
<?php if($action->open == 'modal'):?>
loadInModal();
<?php else:?>
toggleModal();
<?php endif;?>
</script>
