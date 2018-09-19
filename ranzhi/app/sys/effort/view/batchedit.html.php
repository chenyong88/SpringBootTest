<?php
/**
 * The batch edit view file of effort module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     effort 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../sys/my/view/header.html.php';?>
<?php include '../../../sys/common/view/datepicker.html.php';?>
<form id='ajaxForm' class='form-condensed' method='post' action='<?php echo $this->createLink('effort', 'batchEdit', 'from=batchEdit')?>'>
  <div class='panel'>
    <table class='table table-bordered table-fixed' id='objectTable'>
      <thead>
        <?php if(!empty($efforts)):?>
        <tr>
          <th class='w-50px'><?php echo $lang->effort->id;?></th>
          <th class='w-120px'><?php echo $lang->effort->date;?></th>
          <th><?php echo $lang->effort->work;?></th>
          <th class='w-70px'><?php echo $lang->effort->consumed . '(' . $lang->effort->hour . ')';?></th>
          <th class='w-400px'><?php echo $lang->effort->objectType;?></th>
          <th class='w-70px'><?php echo $lang->effort->left . '(' . $lang->effort->hour . ')';?></th>
        </tr>  
        <?php endif;?>
      </thead>
      <?php foreach($efforts as $id =>$effort ):?>
      <tr class='text-center text-middle' id='row<?php echo $id?>'>
        <td><?php echo $id . html::hidden("id[$id]", $id) . html::hidden("objectID[$id]", $effort->objectID);?></td>
        <td><?php echo html::input("date[$id]", "$effort->date", "class='form-date form-control'");?></td>
        <td class='text-left'><?php echo html::input("work[$id]", "$effort->work", "class='form-control'");?></td>
        <td><?php echo html::input("consumed[$id]", $effort->consumed, 'autocomplete="off" class="form-control text-center"');?></td>
        <td><?php echo html::select("objectType[$id]", $typeList, "{$effort->objectType}_{$effort->objectID}", 'tabindex="9999" onchange=setLeftInput(this) class="form-control chosen"');?> 
        <td><?php $disabled = $effort->objectType == 'task' ? '' : 'disabled'; echo html::input("left[$id]", $effort->left, "autocomplete='off' class='$disabled form-control text-center' " . $disabled);?></td>
      </tr>  
      <?php endforeach;?>
      <tr>
        <td colspan='6' class='text-center'>
          <?php echo html::hidden('effortIDList', join(',', $_POST['effortIDList']));?>
          <?php echo html::submitButton('', 'btn btn-primary', "onclick='return checkTaskLeft(\"{$lang->effort->noticeFinish}\")'") . html::backButton();?>
        </td>
      </tr>
    </table>
  </div>
</form>
<?php include '../../../sys/common/view/footer.html.php';?>
