<?php
/**
 * The taxRefund view file of invoice module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     invoice 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../common/view/header.modal.html.php';?>
<form method='post' id='ajaxForm' action='<?php echo inlink('taxRefund', "invoiceID=$invoiceID&status=$status");?>'>
  <table class='table table-form'>
    <tr>
      <th class='w-60px'><?php echo $lang->comment;?></th>
      <td>
        <div class='required required-wrapper'></div>
        <?php echo html::textarea('comment', '', "class='form-control' rows='3'");?>
      </td>
      <td class='w-40px'></td>
    </tr>
    <tr>
      <th></th>
      <td><?php echo html::submitButton();?></td>
      <td></td>
    </tr>
  </table>
</form>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
