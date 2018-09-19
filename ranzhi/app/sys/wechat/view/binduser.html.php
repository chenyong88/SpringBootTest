<?php
/**
 * The bind user view file of wechat module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     wechat 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../common/view/header.modal.html.php';?>
<form id='ajaxForm' method='post' action="<?php echo helper::createLink('wechat', 'bindUser');?>">
  <table class='table table-form'>
    <tr>
      <td class='w-300px'>
        <div class='input-group'>
          <?php echo html::input("account", $this->app->user->account, "class='hide'");?>
          <span class='input-group-addon'><?php echo $lang->wechat->selectUser;?></span>
          <?php echo html::select("openID", $wechatUserList, '', "class='form-control'");?>
        </div>
      </td>
      <td><?php echo html::submitButton();?></td>
    </tr>
  </table>
</form>
<?php include '../../common/view/footer.modal.html.php';?>
