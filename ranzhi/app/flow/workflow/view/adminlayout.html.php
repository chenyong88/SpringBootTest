<?php
/**
 * The admin ui view file of workflow module of RanZhi.
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
<?php include '../../../sys/common/view/chosen.html.php';?>
<?php include '../../../sys/common/view/datepicker.html.php';?>
<?php js::set('action', $action->id);?>
<ul id='menuTitle'>
  <li><?php if(!commonModel::printLink('workflow', 'browse', "parent=all&type={$module->type}", $lang->workflow->browse)) echo $lang->workflow->browse;?></li>
  <li class='divider angle'></li>
  <li><?php if(!commonModel::printLink('workflow', 'adminAction', "module={$module->module}", $module->name)) echo $module->name;?></li>
  <li class='divider angle'></li>
  <li><?php echo html::a(inlink('adminLayout', "actionID={$action->id}"), $action->name);?></li>
  <li class='divider angle'></li>
  <li class='title'><?php echo str_replace('-', '', $title);?></li>
</ul>
<div class='with-side'>
  <div class='side panel'>
    <div class='panel-heading'>
      <strong><?php echo $lang->workflowaction->common;?></strong>
    </div>
    <div class='panel-body'>
      <ul class='tree treeview'>
        <?php
        foreach($actions as $id => $currentAction)
        {
            if($currentAction->action != 'delete' && $currentAction->open != 'none')
            {
                echo '<li>' . html::a(inlink('adminLayout', "actionID={$id}"), $currentAction->name) . '</li>';
            }
        }
        ?>
      </ul>
      <div class='text-right'><?php commonModel::printLink('workflow', 'adminAction', "module={$module->module}", $lang->workflow->adminAction, "class='btn btn-primary'");?></div>
    </div>
  </div>
  <div class='main'>
    <form id='ajaxForm' method='post'>
      <div id='colsFixedEnabled' class='cols-list'>
        <div class='panel-heading'>
          <i class='icon-ok'></i> <span class='title'><span class='title-bar'><strong><?php echo $lang->workflow->common . $lang->colon . $module->name;?></strong></span></span>
        </div>
      </div>
      <div id='colsFixedRequired' class='cols-list'></div>
      <div class='cols-list cols-list-origin'>
        <?php $i = 1;?>
        <?php foreach($fields as $key => $field):?>
        <?php if(!$edit && !$field->show) continue;?>
        <?php $disabledFields = in_array($action->action, $config->workflow->defaultActions) ? $config->workflow->disabledFields[$action->action] : $config->workflow->disabledFields['custom'];?>
        <?php if(strpos($disabledFields, $key) !== false) continue;?>
        <?php $required = $key == 'actions';?>
        <?php $fixed    = $required ? 'required' : 'enabled';?>
        <?php $show     = $field->show == '1';?>
        <?php $child    = isset($children[$key]);?>
        <div class='clearfix col <?php echo (!$show ? ' disabled' : '') . ($required ? ' required' : '') . (' fixed-' . $fixed) . ($child ? " module-{$key}" : '');?>' <?php echo $child ? "data-child={$key}" : '';?> data-fixed='<?php echo $fixed;?>'  data-key='<?php echo $key;?>'>
          <i class='icon-ok'></i> <?php if($edit):?><span class='title'><span class='title-bar'><strong><?php echo $field->name;?></strong><i class='icon-move'></i></span></span><?php else:?><strong><?php echo $field->name;?></strong><?php endif;?>
          <div class='actions pull-right'>
            <?php if($required):?>
            <span class='text-muted'><?php echo '(' . $lang->workflowaction->layout->require . ')';?></span>
            <?php endif;?>
            <?php if($action->action != 'browse' && $action->action != 'view' && $key != 'file' && !is_numeric($key)):?>
            <span>
              <span class='text-muted'><?php echo $lang->workflowfield->rules;?></span>
              <?php echo html::select("layoutRules[$key][]", $rules, $field->layoutRules, "class='form-control chosen' multiple='multiple'");?>
              <?php
              $checked = '';
              $controlList     = array('select', 'checkbox', 'radio', 'date', 'datetime');
              $dateControlList = array('date', 'datetime');
              if(!in_array($field->control, $controlList)) $checked = "checked='checked'";
              if(in_array($field->control, $dateControlList) && !empty($field->defaultValue) && !isset($field->options[$field->defaultValue])) $checked = "checked='checked'";
              ?>
              <span class='text-muted'><?php echo $lang->workflow->defaultValue;?></span>
              <?php
              if($field->control == 'checkbox')
              {
                  echo html::select("defaultValue[$key][]", $field->options, $field->defaultValue, "class='form-control chosen' multiple='multiple'");
              }
              else
              {
                  echo html::select("defaultValue[$key]", array('' => '') + $field->options, $field->defaultValue, "class='form-control chosen'");
              }
              if(in_array($field->control, $dateControlList))
              {
                  $disabled = '';
                  $class    = 'form-' . $field->control;
                  echo html::input("defaultValue[$key]", ($field->defaultValue && $field->defaultValue != 'currentTime') ? $field->defaultValue : '', "class='form-control $class'");
              }
              else
              {
                  $disabled = "disabled='disabled'";
                  echo html::input("defaultValue[$key]", ($field->defaultValue && strpos(',currentUser,currentDept,currentTime,', ",$field->defaultValue,") === false) ? $field->defaultValue : '', "class='form-control'");
              }
              ?>
              <input type='checkbox' name="custom[<?php echo $key;?>]" value='1' <?php echo "$checked $disabled";?>/> <?php echo $lang->workflow->custom;?>
            </span>
            <?php endif;?>
            <?php if($action->action == 'browse'):?>
            <?php if(in_array($field->type, array_keys($lang->workflowfield->typeList['number'])) && $field->field != 'id'):?>
            <span>
              <span class='text-muted'><?php echo $lang->workflow->total;?></span>
              <?php if($edit):?>
              <?php echo html::select("totalShow[$key]", $lang->workflowaction->layout->totalList, !empty($field->totalShow) ? $field->totalShow : 0, "class='form-control'" . ($edit ? '' : 'disabled'));?>
              <?php else:?>
              <?php echo $lang->workflowaction->layout->totalList[!empty($field->totalShow) ? $field->totalShow : 0];?>
              <?php endif;?>
            </span>
            <?php endif;?>
            <span>
              <span class='text-muted'><?php echo $lang->workflow->width;?></span>
              <?php if($edit):?>
              <input name="width[<?php echo $key;?>]" type='text' class='form-control' value='<?php echo $field->width;?>'/>
              <?php else:?>
              <?php echo $field->width . ($field->width == 'auto' ? '' : 'px');?>
              <?php endif;?>
            </span>
            <span>
              <span class='text-muted'><?php echo $lang->workflow->mobile;?></span>
              <?php if($edit):?>
              <?php echo html::select("mobileShow[$key]", $lang->workflowaction->layout->mobileList, !empty($field->mobileShow) ? $field->mobileShow : 0, "class='form-control'");?>
              <?php else:?>
              <?php if($field->mobileShow) echo '&nbsp;&nbsp;&nbsp;';?>
              <?php echo $lang->workflowaction->layout->mobileList[!empty($field->mobileShow) ? $field->mobileShow : 0];?>
              <?php endif;?>
            </span>
            <?php endif;?>
            <?php if($action->action == 'view' or $action->action == 'browse'):?>
            <span>
              <span class='text-muted'><?php echo $lang->workflow->position;?></span>
              <?php if($action->action == 'view' and $i == 1):?>
              <a data-toggle='tooltip' class='position-tips' title='<?php echo $lang->workflowfield->positionTips;?>'><i class='icon-question-sign'></i></a>
              <?php endif;?>
              <?php if($edit):?>
              <?php echo html::select("position[$key]", $lang->workflowaction->layout->positionList[$action->action], !empty($field->position) ? $field->position : '', "class='form-control'");?>
              <?php else:?>
              <?php echo zget($lang->workflowaction->layout->positionList[$action->action], !empty($field->position) ? $field->position : 'left');?>
              <?php endif;?>
            </span>
            <?php endif;?>
            <?php if($edit):?>
            <button type='button' class='btn btn-link show-hide'>
              <span class='label-show'><?php echo $lang->workflow->show?></span>
              <span class='text-muted'>/</span>
              <span class='label-hide'><?php echo $lang->workflow->hide?></span>
            </button>
            <?php else:?>
            <?php echo $show ? $lang->workflow->show : $lang->workflow->hide;?>
            <?php endif;?>
          </div>
          <?php echo html::hidden("show[$key]",  $show ? '1' : '0');?>
        </div>
        <?php $i++;?>
        <?php endforeach;?>
      </div>

      <?php if($action->action != 'browse'):?>
      <div id='children-list'>
        <?php foreach($children as $childModule => $childFields):?>
        <div class='child cols-list child-<?php echo $childModule;?>' data-module="<?php echo $childModule;?>">
          <div class='panel-heading'>
            <i class='icon-ok'></i> <span class='title'><span class='title-bar'><strong><?php echo $lang->workflow->subTables . $lang->colon . zget($childModules, $childModule);?></strong><i class='icon-move'></i></span></span>
          </div>
          <?php foreach($childFields as $key => $field):?>
          <?php $disabledFields = $config->workflow->disabledFields['children'];?>
          <?php if($action->action != 'view' && strpos(",{$disabledFields},", ",{$key},") !== false) continue;?>
          <?php $show = $field->show == '1';?>
          <div class='clearfix col <?php echo ($show ? '' : ' disabled');?>' data-fixed='<?php echo $fixed;?>' data-key='<?php echo $key;?>'>
            <i class='icon-ok'></i> <span class='title'><span class='title-bar'><strong><?php echo $field->name;?></strong><i class='icon-move'></i></span></span>
            <div class='actions pull-right'>
              <?php if($required):?>
              <span class='text-muted'><?php echo '(' . $lang->workflowaction->layout->require . ')';?></span>
              <?php endif;?>
              <?php if($action->action == 'view'):?>
              <span>
                <span class='text-muted'><?php echo $lang->workflow->width;?></span>
                <input name="children[<?php echo $childModule;?>][width][<?php echo $key;?>]" type='text' class='form-control' value='<?php echo $field->width;?>'>
              </span>
              <span>
                <span class='text-muted'><?php echo $lang->workflow->mobile;?></span>
                <?php echo html::select("children[$childModule][mobileShow][$key]", $lang->workflowaction->layout->mobileList, !empty($field->mobileShow) ? $field->mobileShow : 0, "class='form-control'");?>
              </span>
              <?php endif;?>
              <?php if($key != 'file' and !is_numeric($key) and $action->action != 'view'):?>
              <span>
                <span class='text-muted'><?php echo $lang->workflowfield->rules;?></span>
                <?php echo html::select("children[$childModule][layoutRules][$key][]", $rules, $field->layoutRules, "id='layoutRules' class='form-control chosen' multiple='multiple'");?>
                <?php
                $checked = '';
                $controlList     = array('select', 'checkbox', 'radio', 'date', 'datetime');
                $dateControlList = array('date', 'datetime');
                if(!in_array($field->control, $controlList)) $checked = "checked='checked'";
                if(in_array($field->control, $dateControlList) && !empty($field->defaultValue) && !isset($field->options[$field->defaultValue])) $checked = "checked='checked'";
                ?>
                <span class='text-muted'><?php echo $lang->workflow->defaultValue;?></span>
                <?php
                if($field->control == 'checkbox')
                {
                    echo html::select("children[$childModule][defaultValue][$key][]", $field->options, $field->defaultValue, "id='defaultValue' class='form-control chosen' multiple='multiple'");
                }
                else
                {
                    echo html::select("children[$childModule][defaultValue][$key]", array('' => '') + $field->options, $field->defaultValue, "id='defaultValue' class='form-control chosen'");
                }
                if(in_array($field->control, $dateControlList))
                {
                    $disabled = '';
                    $class    = 'form-' . $field->control;
                    echo html::input("children[$childModule][defaultValue][$key]", ($field->defaultValue && $field->defaultValue != 'currentTime') ? $field->defaultValue : '', "id='defaultValue' class='form-control $class'");
                }
                else
                {
                    $disabled = "disabled='disabled'";
                    echo html::input("children[$childModule][defaultValue][$key]", ($field->defaultValue && strpos(',currentUser,currentDept,currentTime,', ",$field->defaultValue,") === false) ? $field->defaultValue : '', "id='defaultValue' class='form-control'");
                }
                ?>
                <input type='checkbox' name="children[<?php echo $childModule;?>][custom][<?php echo $key;?>]" value='1' <?php echo "$checked $disabled";?>/> <?php echo $lang->workflow->custom;?>
              </span>
              <?php endif;?>
              <button type='button' class='btn btn-link show-hide'>
                <span class='label-show'><?php echo $lang->workflow->show?></span>
                <span class='text-muted'>/</span>
                <span class='label-hide'><?php echo $lang->workflow->hide?></span>
              </button>
            </div>
            <?php echo html::hidden("children[$childModule][show][$key]",  $show ? '1' : '0');?>
          </div>
          <?php endforeach;?>
        </div>
        <?php endforeach;?>
      </div>
      <?php endif;?>
      <div class='actions text-center'>
        <?php if($edit):?>
        <?php echo html::selectButton() . html::submitButton();?>
        <?php else:?>
        <?php commonModel::printLink('workflow', 'adminLayout', "actionID={$action->id}&edit=1", $lang->edit, "class='btn btn-primary'");?>
        <?php endif;?>
        <?php echo html::backButton();?>
      </div>
    </form>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
