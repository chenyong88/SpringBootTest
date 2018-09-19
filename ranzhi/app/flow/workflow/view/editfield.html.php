<?php
/**
 * The edit field view file of wordflow module of RanZhi.
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
<?php include '../../../sys/common/view/chosen.html.php';?>
<?php include '../../../sys/common/view/datepicker.html.php';?>
<?php js::set('moduleType', $module->type);?>
<?php js::set('fieldID', $field->id);?>
<ul id='menuTitle'>
  <li><?php echo html::a(inlink('browse', "parent=all&type={$module->type}&app={$module->app}"), $module->type == 'flow' ? $lang->workflow->browse : $lang->workflowtable->common);?></li>
  <li class='divider angle'></li>
  <li><?php echo html::a(inlink('adminField', "module={$module->module}"), $module->type == 'flow' ? $module->name : $module->module);?></li>
  <li class='divider angle'></li>
  <li class='title'><?php echo str_replace('-', '', $title);?></li>
</ul>
<div class='panel'>
  <div class='panel-heading'>
    <strong><i class='icon-edit'></i> <?php echo $lang->workflow->editField;?></strong>
  </div>
  <div class='panel-body'>
    <form method='post' id='ajaxForm'>
      <table class='table table-form w-p60'>
        <tr>
          <th class='w-100px'><?php echo $lang->workflowfield->name;?></th>
          <td>
            <div class='input-group'>
              <?php echo html::input('name', $field->name, "class='form-control'");?>
              <span class='input-group-addon fix-border'><?php echo $lang->workflowfield->position;?></span>
              <?php echo html::select('order', $fields, $field->order, "class='form-control'");?>
              <?php echo html::hidden('oldOrder', $field->order);?>
              <span class='input-group-addon'><?php echo $lang->workflowfield->positionList['after'];?></span>
            </div>
          </td>
        </tr>
        <tr>
          <th><?php echo $lang->workflowfield->field;?></th>
          <td>
            <div class='input-group'>
              <?php echo html::input('field', $field->field, "class='form-control' placeholder='{$lang->workflow->placeholder->code}'");?>
              <span class='input-group-addon fix-border'><?php echo $lang->workflowfield->type;?></span>
              <select id='type' name='type' class='form-control'>
                <?php foreach($lang->workflowfield->typeGroup as $type => $group):?>
                <optgroup label='<?php echo $group;?>'>
                  <?php foreach($lang->workflowfield->typeList[$type] as $key => $value):?>
                  <option <?php if($key == $field->type) echo "selected";?> value='<?php echo $key;?>'><?php echo $value;?></option>
                  <?php endforeach;?>
                </optgroup>
                <?php endforeach;?>
              </select>
              <span class='input-group-addon fix-border length'><?php echo $lang->workflowfield->length;?></span>
              <?php echo html::input('length', $field->length, "class='form-control length'");?>
            </div>
          </td>
        </tr>
        <tr>
          <th><?php echo $lang->workflowfield->control;?></th>
          <td>
            <div class='input-group'>
              <?php $optionType = is_array($field->options) ? 'custom' : $field->options;?>
              <?php echo html::select('control', $lang->workflowfield->controlTypeList, $field->control, "class='form-control'");?>
              <span class='input-group-addon fix-border optionType'><?php echo $lang->workflowfield->dataSource;?></span>
              <?php echo html::select('optionType', $datasources, $optionType, "class='form-control optionType'");?>
            </div>
          </td>
        </tr>
        <tr class='sqlTR'>
          <th><?php echo $lang->workflowfield->sql;?></th>
          <td><?php echo html::textarea('sql', $field->sql, "rows='4' class='form-control' placeholder={$lang->workflow->placeholder->sql}");?></td>
        </tr>
        <tr class='hide' id='varsTR'>
          <th><?php echo $lang->workflowfield->vars;?></th>
          <td id='varsTD'>
            <?php foreach($field->sqlVars as $var):?>
            <div id='<?php echo $var->varName;?>' class='w-p45 varControl'>
              <div class='input-group'>
                <?php echo $this->fetch('workflow', 'buildVarControl', "varName={$var->varName}");?>
              </div>
            </div>
            <?php endforeach;?>
          </td>
        </tr>
        <tr class='hide'>
          <th></th>
          <td><?php echo html::a(inlink('addSqlVar'), $lang->workflowfield->addVar, "class='btn' data-toggle='modal'");?></td>
        </tr>
        <tr id='optionTR'>
          <th><?php echo $lang->workflowfield->options;?></th>
          <td>
            <?php $options = array('' => '');?>
            <?php if(is_array($field->options)) $options = $field->options + array('' => '');?>
            <?php foreach($options as $value => $text):?>
            <div class="input-group">
              <?php echo html::input('options[value][]', $value, "class='form-control' placeholder={$lang->workflowfield->optionValue}");?>
              <span class='input-group-addon fix-border'>:</span>
              <?php echo html::input('options[text][]', $text, "class='form-control' placeholder={$lang->workflowfield->optionText}");?>
              <span class='input-group-btn'>
                <a href='#' class='btn btn-default addItem'><i class='icon-plus'></i></a>
                <a href='#' class='btn btn-default delItem'><i class='icon-minus'></i></a>
              </span>
            </div> 
            <?php endforeach;?>
            <div id='optionsDIV'></div>
          </td>
        </tr>
        <tr>
          <th><?php echo $lang->workflowfield->default;?></th>
          <td><?php echo html::textarea('default', $field->default, "rows='2' placeholder='{$lang->workflowfield->optionsPlaceholder}' class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->workflowfield->rules;?></th>
          <td><?php echo html::select('rules[]', $rules, $field->rules, "multiple class='chosen form-control'");?></td>
        </tr>
        <?php if($module->type == 'flow'):?>
        <tr>
          <th><?php echo $lang->workflowfield->canExport;?></th>
          <td id='exportTD'><?php echo html::radio('canExport', $lang->workflowfield->exportList, $field->canExport);?></td>
        </tr>
        <tr>
          <th><?php echo $lang->workflowfield->canSearch;?></th>
          <td id='searchTD'><?php echo html::radio('canSearch', $lang->workflowfield->searchList, $field->canSearch);?></td>
        </tr>
        <?php endif;?>
        <?php if($module->parent):?>
        <tr>
          <th><?php echo $lang->workflowfield->isKeyValue;?></th>
          <td>
            <label class="checkbox-inline"><input type="checkbox" name="isKey" id="isKey" <?php if($field->isKey == 1) echo "checked='checked'";?> value="1"><?php echo $lang->workflowfield->keyValueList['key'];?></label>
            <label class="checkbox-inline"><input type="checkbox" name="isValue" id="isValue" <?php if($field->isValue == 1) echo "checked='checked'";?> value="1"><?php echo $lang->workflowfield->keyValueList['value'];?></label>
          </td>
        </tr>
        <tr>
          <th></th>
          <td><span class='text-important'><?php echo $lang->workflow->tips->keyValue;?></span></td>
        </tr>
        <?php else:?>
        <tr>
          <th><?php echo $lang->workflowfield->isForeignKey;?></th>
          <td><?php echo html::radio('isForeignKey', $lang->workflowfield->foreignKeyList, $field->isForeignKey);?></td>
        </tr>
        <tr>
          <th></th>
          <td><span class='text-important'><?php echo $lang->workflow->tips->foreignKey;?></span></td>
        </tr>
        <?php endif;?>
        <tr>
          <th></th>
          <td>
            <?php echo html::submitButton();?>
            <?php echo html::backButton();?>
          </td>
        </tr>
      </table>
    </form>
  </div>
</div>

<div id='optionGroup' class='hide'>
  <div class='input-group'>
    <?php echo html::input('options[value][]', '', "class='form-control' placeholder={$lang->workflowfield->optionValue}");?>
    <span class='input-group-addon fix-border'>:</span>
    <?php echo html::input('options[text][]', '', "class='form-control' placeholder={$lang->workflowfield->optionText}");?>
    <span class='input-group-btn'>
      <a href='#' class='btn btn-default addItem'><i class='icon-plus'></i></a>
      <a href='#' class='btn btn-default delItem'><i class='icon-minus'></i></a>
    </span>
  </div> 
</div>
<div id='varGroup' class='hide'>
  <div id='key' class='w-p45 varControl'>
    <div class='input-group'>
    </div>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
