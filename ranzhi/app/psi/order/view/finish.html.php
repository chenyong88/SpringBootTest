<?php 
/**
 * The finish view of order module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     order 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../sys/common/view/header.modal.html.php';?>
<?php include '../../../sys/common/view/datepicker.html.php';?>
<?php include '../../../sys/common/view/kindeditor.html.php';?>
<form method='post' action="<?php echo inlink('finish', "id={$order->id}&status={$status}")?>" id='ajaxForm'>
  <table class='table table-form'>
    <tr>
      <th class='w-80px'><?php echo $lang->order->finishedDate;?></th>
      <td><?php echo html::input('finishedDate', $order->finishedDate, "class='form-control form-date'");?></td>
      <td class='w-30px'></td>
    </tr>
    <tr>
      <th><?php echo $lang->order->desc;?></th>
      <td><?php echo html::textarea('comment');?></td>
    </tr>
    <tr>
      <th></th>        
      <td><?php echo html::submitButton() . html::commonButton($lang->close, 'btn', "data-dismiss='modal'");?></td>   
    </tr>
  </table>
</form>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
