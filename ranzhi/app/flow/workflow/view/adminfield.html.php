<?php
/**
 * The admin fields view file of workflow module of RanZhi.
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
<?php js::set('moduleType', $module->type);?>
<ul id='menuTitle'>
  <li><?php echo html::a(inlink('browse', "parent=all&type={$module->type}"), $lang->workflow->browse);?></li>
  <?php if($module->type == 'table'):?>
  <?php if($parent):?>
  <li class='divider angle'></li>
  <li><?php echo html::a(inlink('browse', "parent={$parent->module}&type=table&app={$parent->app}"), $parent->name);?></li>
  <?php endif;?>
  <li class='divider angle'></li>
  <li><?php echo html::a(inlink('browse', "parent={$module->parent}&type={$module->type}"), $lang->workflowtable->common);?></li>
  <?php endif;?>

  <li class='divider angle'></li>
  <li>
    <?php if($module->type == 'flow'):?>
    <?php echo html::a(inlink('adminAction', "module={$module->module}"), $module->name);?>
    <?php else:?>
    <?php echo html::a('###', $module->module);?>
    <?php endif;?>
  </li>
  <li class='divider angle'></li>
  <li class='title'><?php echo str_replace('-', '', $title);?></li>
</ul>
<div id='menuActions'>
  <?php echo html::a("javascript:;", "<i class='icon icon-th-large'></i>", "data-mode='card' class='mode-toggle btn'");?>
  <?php echo html::a("javascript:;", "<i class='icon icon-list'></i>", "data-mode='list' class='mode-toggle btn'");?>
  <?php commonModel::printLink('workflow', 'exportField', "module={$module->module}", '<i class="icon-cog"> </i> ' . $lang->workflow->exportField, 'class="btn btn-primary" data-toggle="modal"');?>
  <?php commonModel::printLink('workflow', 'createField', "module={$module->module}", '<i class="icon-plus"> </i> ' . $lang->workflow->createField, 'class="btn btn-primary"');?>
</div>
<?php $class = $this->cookie->fieldViewType == 'card' ? '' : 'hide';?>
<div class='row <?php echo $class;?>' id='cardMode'>
  <?php foreach($fields as $field):?>
  <div class='col-md-2 col-sm-4'>
    <div class='panel flow-block'>
      <div class='panel-heading'>
        <strong><?php echo $field->name . ' - ' . $field->field;?></strong>
      </div>
      <div class='panel-body'>
        <div class='info'>
          <div><strong><?php echo $lang->workflowfield->control;?></strong>&nbsp;&nbsp;<span class='text-important'><?php echo zget($lang->workflowfield->controlTypeList, $field->control, '');?></span></div>
          <div>
            <strong><?php echo $lang->workflowfield->options;?></strong>&nbsp;&nbsp;
            <span class='text-important'>
              <?php 
              if($field->options == 'sql')
              {
                  echo $lang->workflowfield->optionTypeList[$field->options] . ' : ' . $field->sql;
              }
              elseif($field->options == 'user' || $field->options == 'dept')
              {
                  echo $lang->workflowfield->optionTypeList[$field->options];
              }
              elseif(is_array($field->options))
              {
                  $delimiter = '';
                  foreach($field->options as $text)
                  {
                      echo $delimiter . $text;
                      $delimiter = ', ';
                  }
              }
              else
              {
                  echo $lang->workflowdatasource->common . ' : ' . zget($datasources, $field->options);
              }
              ?>
            </span>
          </div>
          <div><strong><?php echo $lang->workflowfield->default;?></strong>&nbsp;&nbsp;<span class='text-important'><?php echo $field->default;?></span></div>
        </div>
        <div class='footerbar'>
          <?php
          if(in_array($field->field, array_keys($config->workflow->defaultFields)))
          {
              echo html::a('#', $lang->edit, "disabled='disabled'");
              echo html::a('#', $lang->delete, "disabled='disabled'");
          }
          else
          {
              commonModel::printLink('workflow', 'editField',   "fieldID={$field->id}", $lang->edit);
              commonModel::printLink('workflow', 'deleteField', "fieldID={$field->id}", $lang->delete, "class='deleter'");
          }
          ?>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach;?>
</div>
<?php $class = $this->cookie->fieldViewType == 'list' ? '' : 'hide';?>
<div class='panel <?php echo $class;?>' id='listMode'>
  <table class='table table-hover table-striped tablesorter table-fixedHeader'>
    <thead>
      <tr class='text-center'>
        <?php $vars="&module={$module->module}&orderBy=%s";?>
        <th class='w-60px'> <?php commonModel::printOrderLink('id', $orderBy, $vars, $lang->workflow->id);?></th>
        <th class='w-120px'><?php commonModel::printOrderLink('name', $orderBy, $vars, $lang->workflowfield->name);?></th>
        <th class='w-120px'><?php commonModel::printOrderLink('field', $orderBy, $vars, $lang->workflowfield->field);?></th>
        <th class='w-160px'><?php commonModel::printOrderLink('control', $orderBy, $vars, $lang->workflowfield->control);?></th>
        <th class='text-left'><?php commonModel::printOrderLink('options', $orderBy, $vars, $lang->workflowfield->options);?></th>
        <th class='w-200px'><?php commonModel::printOrderLink('default', $orderBy, $vars, $lang->workflowfield->default);?></th>
        <?php if($module->type == 'flow'):?>
        <th class='w-100px'><?php echo $lang->workflowfield->canExport;?></th>
        <th class='w-100px'><?php echo $lang->workflowfield->canSearch;?></th>
        <?php endif;?>
        <?php if($module->parent):?>
        <th class='w-100px'><?php echo $lang->workflowfield->isKeyValue;?></th>
        <?php else:?>
        <th class='w-100px'><?php echo $lang->workflowfield->isForeignKey;?></th>
        <?php endif;?>
        <th class='w-100px'><?php echo $lang->actions;?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($fields as $field):?>
      <tr class='text-center'>
        <td><?php echo $field->id;?></td>
        <td><?php echo $field->name;?></td>
        <td><?php echo $field->field;?></td>
        <td><?php echo $lang->workflowfield->controlTypeList[$field->control];?></td>
        <td class='text-left'>
          <?php
          if($field->options == 'sql')
          {
              echo $lang->workflowfield->optionTypeList[$field->options] . ' : ' . $field->sql;
          }
          elseif($field->options == 'user' || $field->options == 'dept' || $field->options == 'submodule')
          {
              echo $lang->workflowfield->optionTypeList[$field->options];
          }
          elseif(is_array($field->options))
          {
              $delimiter = '';
              foreach($field->options as $text)
              {
                  echo $delimiter . $text;
                  $delimiter = ', ';
              }
          }
          else
          {
              echo $lang->workflowdatasource->common . ' : ' . zget($datasources, $field->options);
          }
          ?>
        </td>
        <td><?php echo is_array($field->options) ? zget($field->options, $field->default) : $field->default;?></td>
        <?php if($module->type == 'flow'):?>
        <td class='exportStatus<?php echo $field->canExport;?>'><?php echo zget($lang->workflowfield->exportList, $field->canExport);?></td>
        <td class='searchStatus<?php echo $field->canSearch;?>'><?php echo zget($lang->workflowfield->searchList, $field->canSearch);?></td>
        <?php endif;?>
        <?php if($module->parent):?>
        <td>
          <?php if($field->isKey) echo $lang->workflowfield->keyValueList['key'] . '  ';?>
          <?php if($field->isValue) echo $lang->workflowfield->keyValueList['value'];?>
        </td>
        <?php else:?>
        <td class='foreignKeyStatus<?php echo $field->isForeignKey;?>'><?php echo zget($lang->workflowfield->foreignKeyList, $field->isForeignKey);?></td>
        <?php endif;?>
        <td>
          <?php
          if(in_array($field->field, array_keys($config->workflow->defaultFields)))
          {
              echo html::a('#', $lang->edit, "disabled='disabled'");
              echo html::a('#', $lang->delete, "disabled='disabled'");
          }
          else
          {
              commonModel::printLink('workflow', 'editField',   "fieldID={$field->id}", $lang->edit);
              commonModel::printLink('workflow', 'deleteField', "fieldID={$field->id}", $lang->delete, "class='deleter'");
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
