<div class='heading divider'>
  <div class='title'><i class='icon-cog muted'></i> <strong><?php echo $lang->my->salary->checkPassword;?></strong></div>
  <nav class='nav'><a data-dismiss='display'><i class='icon icon-remove muted'></i></a></nav>
</div>
<form class='content box' data-form-refresh='#page' method='post' id='checkPasswordForm' action='<?php echo $this->createLink('sys.my', 'checkPassword');?>'>
  <div class='control'>
    <label for='password'><?php echo $lang->password;?></label>
    <?php echo html::password('password', '', "class='input'");?>
  </div>
</form>

<div class='footer has-padding'>
  <button type='button' data-submit='#checkPasswordForm' class='btn primary'><?php echo $lang->save;?></button>
</div>

<script>
$(function()
{
    $('#checkPasswordForm').modalForm({onResult: true}).listenScroll({container: 'parent'});
});
</script>

