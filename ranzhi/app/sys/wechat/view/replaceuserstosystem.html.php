<?php
/**
 * The replace user to system view file of wechat module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     wechat 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../common/view/header.html.php';?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><i class='icon-link'></i> <?php echo $lang->wechat->syncUserToSystem;?></strong>
  </div>
  <div class='panel-body'>
    <form id='ajaxForm' method='post'>
      <table class='table table-form w-p50'>
        <?php $i=1;?>
        <?php foreach($wechatUserList as $wechatUser):?>
        <?php if(isset($this->config->wechat->ignoreUsers) and strpos($this->config->wechat->ignoreUsers, $wechatUser->userid) !== false) continue;?>
        <tr>
          <th class='w-100px'><?php echo html::input("wechatUsers[$i]", $wechatUser->userid, "class='hide'");?> <?php echo $wechatUser->name;?></th>
          <td>
            <?php if(!empty($bindUserList[$wechatUser->userid])):?>
            <?php echo html::select("systemUsers[$i]", $systemUserList, $bindUserList[$wechatUser->userid], "class='form-control'");?>
            <?php else:?>
            <div class='input-group'>
              <?php echo html::select("systemUsers[$i]", $systemUserList, '', "class='form-control'");?>
              <span class='input-group-addon' style='border-left: 0'>
                <label class='checkbox-inline'><input type='checkbox' name="ignoreUsers[<?php echo $i;?>]" id='ignoreuser' value='1' /> <?php echo $lang->ignore;?></label>
              </span>
              <span class='input-group-addon'>
                <label class='checkbox-inline'><input type='checkbox' name="createUsers[<?php echo $i;?>]" id='createusers' value='1' /> <?php echo $lang->create;?></label>
              </span>
            </div>
            <?php endif;?>
          </td>
        </tr>
        <?php $i++;?> 
        <?php endforeach;?>

        <?php if(isset($this->config->wechat->ignoreUsers)):?>
        <?php foreach($wechatUserList as $wechatUser):?>
        <?php if(strpos($this->config->wechat->ignoreUsers, $wechatUser->userid) === false) continue;?>
        <tr>
          <th class='w-100px'><?php echo html::input("wechatUsers[$i]", $wechatUser->userid, "class='hide'");?> <?php echo $wechatUser->name;?></th>
          <td>
            <?php if(!empty($bindUserList[$wechatUser->userid])):?>
            <?php echo html::select("systemUsers[$i]", $systemUserList, $bindUserList[$wechatUser->userid], "class='form-control'");?>
            <?php else:?>
            <div class='input-group'>
              <?php echo html::select("systemUsers[$i]", $systemUserList, '', "class='form-control'");?>
              <span class='input-group-addon ignore'>
                <label class='checkbox-inline'><input type='checkbox' name="ignoreUsers[<?php echo $i;?>]" id='ignoreuser' value='1' checked='checked'/> <?php echo $lang->ignore;?></label>
              </span>
              <span class='input-group-addon'>
                <label class='checkbox-inline'><input type='checkbox' name="createUsers[<?php echo $i;?>]" id='createusers' value='1' /> <?php echo $lang->create;?></label>
              </span>
            </div>
            <?php endif;?>
          </td>
        </tr>
        <?php $i++;?> 
        <?php endforeach;?>
        <?php endif;?>
        <tr>
          <th></th><td><?php echo html::submitButton() . html::a($this->createLink('wechat', 'setting'), $lang->goback, "class='btn'");?></td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
