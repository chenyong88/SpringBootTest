<div class='heading divider'>
  <div class='title'><i class='icon-cog muted'></i> <strong><?php echo $lang->my->salary->setPassword;?></strong></div>
  <nav class='nav'><a data-dismiss='display'><i class='icon icon-remove muted'></i></a></nav>
</div>
<form class='content box' data-form-refresh='#page' method='post' id='setPasswordForm' action='<?php echo $this->createLink('sys.my', 'setPassword');?>'>
  <div class='control'>
    <label for='password'><?php echo $lang->password;?></label>
    <?php echo html::password('password', '', "class='input'");?>
  </div>
</form>

<div class='footer has-padding'>
  <button type='button' data-submit='#setPasswordForm' class='btn primary'><?php echo $lang->save;?></button>
</div>

<script>
$(function()
{
    $('#setPasswordForm').modalForm().listenScroll({container: 'parent'});
});
</script>

