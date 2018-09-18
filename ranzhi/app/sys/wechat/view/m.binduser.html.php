<header class='heading divider'>
  <div class='title'><strong><?php echo $lang->wechat->bindUser;?></strong></div>
  <nav class='nav'>
    <a data-dismiss='display'><i class='icon-remove muted'></i></a>
  </nav>
</header>

<form class='has-padding content' method='post' id='bindUserForm' action="<?php echo $this->createLink('wechat', 'bindUser');?>">
  <div class='control'>
    <?php echo html::input('account', $this->app->user->account, "class='input hidden'");?>
    <label for='openID'><?php echo $lang->wechat->selectUser;?></label>
    <div class='select'><?php echo html::select('openID', $wechatUserList, '');?></div>
  </div>
</form>

<div class='footer has-padding'>
  <button type='button' data-submit='#bindUserForm' class='btn primary'><?php echo $lang->save;?></button>
</div>

<script>
$(function()
{
    $('#bindUserForm').modalForm().listenScroll({container: 'parent'});
});
</script>
