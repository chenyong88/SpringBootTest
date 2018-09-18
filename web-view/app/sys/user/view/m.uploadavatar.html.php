<div class='heading'>
  <div class='title'><i class='icon-picture'></i>&nbsp;<?php echo $lang->user->uploadAvatar ?></div>
  <nav class='nav'>
    <a data-dismiss='display'><i class='icon-remove muted'></i></a>
  </nav>
</div>

<form class='content box' data-display-from='userProfile' method='post' enctype='multipart/form-data' id='uploadAvatarForm' action='<?php echo inlink('uploadAvatar', "account={$user->account}");?>'>
  <div class='control'>
    <div class='box gray'><?php echo html::file('files');?></div>
  </div>
</form>

<div class='footer has-padding'>
  <button type='button' data-submit='#uploadAvatarForm' class='btn primary'><?php echo $lang->save ?></button>
</div>

<script>
$(function()
{
    $('#uploadAvatarForm').modalForm(
    {
        onSuccess: function(response)
        {
            var cropModal = new $.Display(
            {
                remote: response.locate,
                display: 'modal',
                placement: 'bottom'
            });
            $.Display.dismiss();
            $.Display.all.userProfile.show();
            response.locate = false;
            // cropModal.show();
        }
    }).listenScroll({container: 'parent'});
});
</script>
