<div class='heading'>
  <div class='title'><i class='icon-picture'></i>&nbsp;<?php echo $lang->user->cropAvatar ?></div>
  <nav class='nav'>
    <a data-dismiss='display'><i class='icon-remove muted'></i></a>
  </nav>
</div>

<form class='content container modal-form' data-display-from='userProfile' method='post' enctype='multipart/form-data' id='cropAvatarForm' action='<?php echo inlink('cropavatar', "image={$image->id}");?>'>
  <?php
  if(empty($user->avatar))
  {
      echo html::image($image->fullURL);
  }
  else
  {
      echo html::image($user->avatar);
  }
  ?>
</form>

<div class='footer has-padding'>
  <button type='button' data-submit='#cropAvatarForm' class='btn primary'><?php echo $lang->save ?></button>
</div>
