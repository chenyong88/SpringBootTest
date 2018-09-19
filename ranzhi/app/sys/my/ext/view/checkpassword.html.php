<?php
/**
 * The check password view file of commission module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     commission 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../view/header.html.php';?>
<?php if(!helper::isAjaxRequest()):?>
<div class='modal' id='ajaxModal' ref="<?php echo $this->app->getURI();?>">
  <div class='modal-dialog' style='width: 750px'>
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>×</span><span class='sr-only'>X</span></button>
        <h4 class='modal-title'><?php echo $lang->my->salary->checkPassword;?></h4>
      </div>
      <div class='modal-body'>
<?php endif;?>
<form id='ajaxForm' method='post' action='<?php echo inlink('checkPassword');?>'>
  <table class='table table-form'>
    <tr class='text-middle'>
      <th class='w-60px'><?php echo $lang->password;?></th>
      <td><?php echo html::password('password', '', "class='form-control'")?></td>
      <td style='padding-left: 5px'><?php echo html::submitButton();?></td>
    </tr>
  </table>
</form>
<?php if(!helper::isAjaxRequest()):?>
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function()
{
    $('.clearfix').find('.panel').remove();
    $('#ajaxModal').modal('show', 'fit');
})
</script>
<?php endif;?>
<?php include '../../../common/view/footer.modal.html.php';?>
