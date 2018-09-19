<?php
/**
 * The close view file of feedback module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     feedback
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../sys/common/view/header.modal.html.php';?>
<?php include '../../../sys/common/view/kindeditor.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?>
<form method='post' id='closeForm' action='<?php echo inlink('close', "issueID=$issueID")?>'>
  <table class='table table-form'>
    <tr>
      <th class='w-70px'><?php echo $lang->feedback->closedReason?></th>
      <td><?php echo html::select('closedReason', $lang->feedback->closedReasonList, '', "class='form-control'")?></td>
      <td class='w-50px'></td>
    </tr>
    <tr>
      <th><?php echo $lang->comment?></th>
      <td><?php echo html::textarea('comment')?></td>
    </tr>
    <tr>
      <th></th>
      <td><?php echo html::submitButton();?></td>
    </tr>
  </table>
</form>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
