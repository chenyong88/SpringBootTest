<?php
/**
 * The set notice view file of workflow module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     workflow 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../sys/common/view/header.modal.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?>
<form id='ajaxForm' method='post' action='<?php echo inlink('setNotice', "actionID={$action->id}");?>'>
  <table class='table table-form'>
    <tr>
      <th class='w-70px text-right'><?php echo $lang->workflowaction->toList;?></th>
      <td>
        <div class='input-group'>
          <?php echo html::select('toList[]', $users, $action->toList, "class='form-control chosen' data-placeholder='{$lang->chooseUserToMail}' multiple");?>
          <?php echo $this->fetch('usercontact', 'buildContactList');?>
        </div>
      </td>
    </tr>
    <tr>
      <th></th>
      <td><?php echo html::submitButton();?></td>
    </tr>
  </table>
</form>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
