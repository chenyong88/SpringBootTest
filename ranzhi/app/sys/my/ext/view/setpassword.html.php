<?php
/**
 * The set password view file of commission module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     commission 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../common/view/header.modal.html.php';?>
<form id='ajaxForm' method='post' action='<?php echo inlink('setPassword');?>'>
  <table class='table table-form'>
    <tr class='text-middle'>
      <th class='w-60px'><?php echo $lang->password;?></th>
      <td><?php echo html::password('password', isset($this->config->salary->password->{$this->app->user->account}) ? $this->config->salary->password->{$this->app->user->account} : '', "class='form-control'")?></td>
      <td><?php echo html::submitButton();?></td>
    </tr>
  </table>
</form>
<?php include '../../../common/view/footer.modal.html.php';?>
