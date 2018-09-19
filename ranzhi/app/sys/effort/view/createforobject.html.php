<?php
/**
 * The create for object view file of effort module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     effort 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../sys/common/view/header.modal.html.php';?>
<?php include '../../../sys/common/view/datepicker.html.php';?>
<?php js::set('noticeSaveRecord', $this->lang->effort->noticeSaveRecord);?>
<form id='ajaxForm' class='form-condensed' method='post' action='<?php echo $this->createLink('effort', 'createForObject', "objectType=$objectType&objectID=$objectID");?>'>
  <div class='panel'>
    <table class='table table-fixed' id='objectTable'>
      <thead>
        <tr>
          <th class='w-id'><?php echo $lang->effort->id;?></th>
          <th class='w-120px'><?php echo $lang->effort->date;?></th>
          <th class='w-60px'><?php echo $lang->effort->consumed;?></th>
          <?php if($objectType == 'task'):?>
          <th class='w-60px'><?php echo $lang->effort->left;?></th>
          <?php endif;?>
          <th><?php echo $lang->effort->work;?></th>
          <th class='w-80px'><?php echo $lang->actions;?></th>
        </tr>  
      </thead>
      <?php $key = 1;?>
      <?php foreach($efforts as $effort):?>
      <tr class='text-center'>
        <td><?php echo $key;?></td>
        <td><?php echo $effort->date?></td>
        <td><?php echo $effort->consumed?></td>
        <?php if($objectType == 'task'):?>
        <td><?php echo $effort->left;?></td>
        <?php endif;?>
        <td class='text-left'><?php echo $effort->work;?></td>
        <td class='actions'>
          <?php
          commonModel::printLink('effort', 'edit', "effortID=$effort->id", "<i class='icon icon-edit'></i>", "class='ajaxEdit'");
          commonModel::printLink('effort', 'delete', "effortID=$effort->id", "<i class='icon icon-remove'></i>", "class='deleter'");
          ?>
        </td>
      </tr>
      <?php $key ++;?>
      <?php endforeach;?>
      <?php $today = date(DT_DATE1);?>
      <?php for($i = 1; $i <= 5; $i++):?>
      <tr>
        <td class='text-middle text-center'><?php echo $key . html::hidden("id[$i]", $i);?></td>
        <td><?php echo html::input("dates[$i]", $today, "class='form-control form-date'");?></td>
        <td><?php echo html::input("consumed[$i]", '', "class='form-control' autocomplete='off'");?></td>
        <?php if($objectType == 'task'):?>
        <td><?php echo html::input("left[$i]", '', "class='form-control' autocomplete='off'");?></td>
        <?php endif;?>
        <td>
        <?php
        echo html::hidden("objectType[$i]", $objectType); 
        echo html::hidden("objectID[$i]", $objectID); 
        echo html::input("work[$i]", '', 'class=form-control');
        ?>
        </td>
        <td></td>
      </tr>  
      <?php $key ++;?>
      <?php endfor;?>
      <tr>
        <?php $cols = $objectType == 'task' ? 6 : 5;?>
        <td colspan='<?php echo $cols?>' class='text-center'>
          <?php echo html::submitButton('', 'btn btn-primary', "onclick='return checkTaskLeft(\"{$lang->effort->noticeFinish}\")'");?>
          <?php echo html::commonButton($lang->goback, 'btn btn-back', "data-dismiss='modal'");?>
        </td>
      </tr>
    </table>
  </div>
</form>
<?php include '../../../sys/common/view/footer.modal.html.php'?>
