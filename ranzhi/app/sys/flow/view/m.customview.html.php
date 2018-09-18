<?php
/**
 * The view mobile view file of flow module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     flow 
 * @version     $Id: index.html.php 3830 2016-05-18 09:34:17Z liugang $
 * @link        http://www.ranzhico.com
 */

$browseLink = !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $this->createLink('flow', 'displayLayout', "module={$currentModule->module}&method=browse");
?>

<div id='page' class='list-with-actions'>
  <div class='section'>
    <div class='heading divider primary-pale'>
      <div class='title'><i class='icon-calendar'> </i><?php echo $currentModule->name;?> #<?php echo $data->id ?></div>
      <nav class='nav'>
        <a href='<?php echo $browseLink;?>' class='btn primary'><?php echo $lang->goback;?></a>
      </nav>
    </div>
    <table class='table bordered table-detail'>
      <?php foreach($fields as $field):?>
      <?php if(is_numeric($field->field) or $field->field == 'id') continue;?>
      <tr>
        <?php $value = isset($data->{$field->field}) ? $data->{$field->field} : '';?>
        <?php if($value && $field->control && strpos('datetime,date,time', $field->control) !== false) $value = formatTime($value);?>
        <?php if(!$value) continue;?>
        <td class='w-90px'><?php echo $field->name;?></td>
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
      <?php if(!empty($data->files)): ?>
      <tr>
        <td><?php echo $lang->file->common;?></td>
        <td><?php echo $this->fetch('file', 'printFiles', array('files' => $data->files, 'fieldset' => 'false'))?></td>
      </tr>
      <?php endif;?>

      <?php
      if(is_numeric($field->field))
      {
          $childrenDatas  = isset($childDatas[$field->field]) ? $childDatas[$field->field] : array();
          $childrenFields = isset($childFields[$field->field]) ? $childFields[$field->field] : array();
          $childName      = $field->name;
      }
      ?>

      <?php if(!empty($childrenDatas)):?>
      <tr>
        <table class='table'>
          <thead>
            <th colspan=<?php echo count($childrenFields);?>><?php echo $childName;?></th>
          </thead>
          <tbody>
            <tr class='text-center'>
              <?php foreach($childrenFields as $childField):?>
              <?php if($childField->mobileShow and $childField->field != 'file'):?>
              <th class='text-center'><?php echo $childField->name;?></th>
              <?php endif;?>
              <?php endforeach;?>
            </tr>
            <?php foreach($childrenDatas as $childData):?>
            <tr class='text-center'>
              <?php foreach($childrenFields as $childField):?>
              <?php if($childField->mobileShow and $childField->field != 'file'):?>
              <td><?php echo $childData->{$childField->field};?></td>
              <?php endif;?>
              <?php endforeach;?>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table>
      </tr>
      <?php endif;?>
    </table>
  </div>

  <div class='section' id='history'>
    <?php echo $this->fetch('action', 'history', "objectType={$currentModule->module}&objectID={$data->id}");?>
  </div>

  <nav class='nav affix dock-bottom nav-auto footer-actions'>
    <?php echo $this->workflow->buildOperateMenu($currentModule, $data, $type = 'view');?>
  </nav>
</div>
