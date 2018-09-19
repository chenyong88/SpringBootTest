<?php
/**
 * The drawn view file of invoice module of RanZhi.
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
<?php include '../../common/view/chosen.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<form method='post' id='ajaxForm' action='<?php echo inlink('drawn', "invoiceID=$invoiceID")?>'>
  <table class='table table-form'>
    <tr>
      <th class='w-80px'><?php echo $lang->invoice->sn;?></th>
      <td class='w-280px'><?php echo html::input('sn', '', "class='form-control'");?></td><td></td>
    </tr>
    <?php if(commonModel::hasPriv('file', 'upload')):?>
    <tr>
      <th><?php echo $lang->invoice->file;?></th>
      <td colspan='2'><?php echo $this->fetch('file', 'buildForm', 'filecount=1');?></td>
    </tr>
    <?php endif;?>
    <tr>
      <th></th>
      <td colspan='2'><?php echo html::submitButton();?></td>
    </tr>
  </table>
</form>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
