<?php
/**
 * The mail file of flow module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     flow
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php $link = commonModel::getSysURL() . $this->createLink("{$module->app}.flow", 'displayLayout', "module={$module->module}&method=view&id={$data->id}");?>
<?php $mailTitle = $module->name . $method->name . '#' . $data->id . ' ' . zget($users, $data->createdBy);?>
<?php include '../../../sys/common/view/mail.header.html.php';?>
<tr>
  <td style='padding: 10px; background-color: #F8FAFE; border: none; font-size: 14px; font-weight: 500; border-bottom: 1px solid #e5e5e5;'><?php echo html::a($link, $mailTitle, "target='_blank'");?></td>
</tr>
<tr>
  <td style='padding: 10px; border: none;'>
    <fieldset style='border: 1px solid #e5e5e5'>
      <div style='padding:5px;'>
        <table class='table table-info'>
        <?php foreach($fields as $field):?>
        <?php if(isset($config->workflow->defaultFields[$field->field])) continue;?>
        <?php
        if(is_numeric($field->field))
        {
            $childrenDatas  = isset($childDatas[$field->field]) ? $childDatas[$field->field] : array();
            $childrenFields = isset($childFields[$field->field]) ? $childFields[$field->field] : array();
            $childName      = $field->name;
            continue;
        }
        ?>
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
                echo zget($field->options, $data->{$field->field});
            }
            ?>
          </td>
        </tr>
        <?php endforeach;?>
        </table>

        <?php if(!empty($childrenDatas)):?>
        <p><?php echo $childName;?></p>
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
            <?php if(isset($config->workflow->defaultFields[$childField->field])) continue;?>
            <?php if($childField->show):?>
            <td><?php echo $childData->{$childField->field};?></td>
            <?php endif;?>
            <?php endforeach;?>
          </tr>
          <?php endforeach;?>
        </table>
        <?php endif;?>
      </div>
    </fieldset>
  </td>
</tr>
<?php include '../../../sys/common/view/mail.footer.html.php';?>
