<?php
/**
 * The doubt view file of feedback module of RanZhi.
 *
 * @copyright   Copyright 2009-2017 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     feedback 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../../sys/common/view/header.modal.html.php';?>
<form id='doubtForm' method='post' action='<?php echo inlink('doubt', "issueID={$issueID}");?>'>
  <table class='table table-form'>
    <tr>
      <th class='w-80px'><?php echo $lang->feedback->doubt;?></th>
      <td><?php echo html::textarea('doubt', '', "rows='3' class='form-control'");?></td>
    </tr>
    <tr>
      <th></th>
      <td><?php echo html::submitButton();?></td>
    </tr>
  </table>
</form>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
