<?php
/**
 * The custom view detail view file of workflow module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     workflow 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<div class='row-table'>
  <div class='col-main'>
    <div class='panel'>
      <div class='panel-heading'><strong><?php echo $lang->workflowaction->layout->positionList['view']['info'];?></strong></div>
      <div class='panel-body'>
        <?php foreach($fields as $field):?>
        <?php
        if(isset($childFields[$field->field]))
        {
            $childrenDatas  = isset($childDatas[$field->field]) ? $childDatas[$field->field] : array();
            $childrenFields = isset($childFields[$field->field]) ? $childFields[$field->field] : array();
            $childName      = $field->name;
            continue;
        }
        ?>
        <?php if($field->position != 'info') continue;?>
        <?php if($field->field == 'file'):?>
        <p><?php echo $this->fetch('file', 'printFiles', array('files' => $data->files, 'fieldset' => 'false'))?></p>
        <?php else:?>
        <p>
          <?php echo $field->name . $lang->colon;?>
          <?php
          if(is_array($data->{$field->field}))
          {
              foreach($data->{$field->field} as $value) echo zget($field->options, $value) . ' ';
          }
          else
          {
              echo zget($field->options, $data->{$field->field});
          }
          ?>
        </p>
        <?php endif;?>
        <?php endforeach;?>
      </div> 
    </div> 

    <?php if(!empty($childrenDatas)):?>
    <div class='panel'>
      <div class='panel-heading'><strong><?php echo $childName;?></strong></div>
      <div class='panel-body no-padding'>
        <table class='table table-hover table-fixed table-center'>
          <tr>
          <?php foreach($childrenFields as $childField):?>
          <?php if($childField->show):?>
          <th style='width: <?php echo $childField->width;?>px'><?php echo $childField->name;?></th>
          <?php endif;?>
          <?php endforeach;?>
          </tr>
          <?php foreach($childrenDatas as $childData):?>
          <tr>
            <?php foreach($childrenFields as $childField):?>
            <?php if($childField->show):?>
            <td>
              <?php 
              if(strpos(',date,datetime,', ",$childField->control,") !== false)
              {
                  echo formatTime($childData->{$childField->field});
              }
              else
              {
                  echo $childData->{$childField->field};
              }
              ?>
            </td>
            <?php endif;?>
            <?php endforeach;?>
          </tr>
          <?php endforeach;?>
        </table>
      </div>
    </div>
    <?php endif;?>

    <?php echo $this->fetch('action', 'history', "objectType={$currentModule->module}&objectID={$data->id}");?>
    <div class='page-actions'>
      <?php
      echo $this->workflow->buildOperateMenu($currentModule, $data, $type = 'view');
      echo html::a(inlink('displayLayout', "module=$currentModule->module&method=browse"), $lang->goback, "class='btn btn-default'");
      ?>
    </div>
  </div>
  <div class='col-side'>
    <div class='panel'>
      <div class='panel-heading'><strong><i class='icon-file-text-alt'></i> <?php echo $lang->workflowaction->layout->positionList['view']['basic'];?></strong></div>
      <div class='panel-body'>
        <table class='table table-info'>
        <?php foreach($fields as $field):?>
        <?php if($field->position != 'basic' or isset($childFields[$field->field])) continue;?>
        <tr>
          <th class='w-80px'><?php echo $field->name;?></th>
          <td>
            <?php 
            if($field->field == 'file')
            {
                echo $this->fetch('file', 'printFiles', array('files' => $data->files, 'fieldset' => 'false'));
            }
            elseif(is_array($data->{$field->field}))
            {
                foreach($data->{$field->field} as $value) echo zget($field->options, $value) . ' ';
            }
            else
            {
                if(strpos(',date,datetime,', ",$field->control,") !== false)
                {
                    echo formatTime($data->{$field->field});
                }
                else
                {
                    echo zget($field->options, $data->{$field->field});
                }
            }
            ?>
          </td>
        </tr>
        <?php endforeach;?>
        </table>
      </div>
    </div>
  </div>
</div>
