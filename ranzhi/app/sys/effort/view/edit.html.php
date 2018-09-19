<?php
/**
 * The edit view file of effort module of RanZhi.
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
<form class='form-condensed' method='post' id='ajaxForm' action='<?php echo $this->createLink('effort', 'edit', "id=$effort->id")?>'>
  <table class='table table-form'>
    <tr>
      <th class='rowhead w-80px'><?php echo $lang->effort->date;?></th>
      <td class='w-p45'><?php echo html::input('date', $effort->date, "class='form-date form-control'");?></td><td></td>
    </tr>
    <tr>
      <th class='rowhead'><?php echo $lang->effort->consumed;?></th>
      <td><?php echo html::input('consumed', $effort->consumed, "class='form-control'");?></td>
    </tr>
    <?php if($effort->objectType == 'task'):?>
    <tr>
      <th class='rowhead'><?php echo $lang->effort->left;?></th>
      <td><?php echo html::input('left', $effort->left, "class='form-control'");?></td>
    </tr>
    <?php endif;?>
    <?php if($effort->objectType != 'custom'):?>
    <tr>
      <th class='rowhead'><?php echo $lang->effort->objectType;?></th>
      <td>
        <div class='input-group'>
          <?php echo html::input('objectType', zget($lang->effort->objectTypeList, $effort->objectType), "class='form-control' disabled");?>
          <span class='input-group-addon fix-border'><?php echo $lang->effort->objectID;?></span>
          <?php echo html::input('objectID', $effort->objectID, "class='form-control' disabled");?>
        </div>
      </td>
    </tr>  
    <?php endif;?>
    <tr>
      <th class='rowhead'><?php echo $lang->effort->work;?></th>
      <td colspan='2'><?php echo html::input('work', $effort->work, "class='form-control'");?></td>
    </tr>  
    <tr>
      <th></th>
      <td colspan='2'><?php echo html::submitButton() . ' ' . html::backButton();?></td>
    </tr>
  </table>
</form>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
