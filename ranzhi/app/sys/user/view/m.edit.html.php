<header class='heading divider'>
  <div class='title'><strong><?php echo $lang->user->editProfile ?></strong></div>
  <nav class='nav'>
    <a data-dismiss='display'><i class='icon-remove muted'></i></a>
  </nav>
</header>

<form class='has-padding content' method='post' id='userEditForm' action="<?php echo inlink('edit', "account={$user->account}");?>">
  <div class='heading gray'>
    <div class='title text-important'><?php echo $lang->user->basicInfo; ?></div>
  </div>
  <div class="control">
    <label for='account'><?php echo $lang->user->account;?></label>
    <?php echo html::input('account', $user->account, "class='input disabled' disabled='disabled'");?>
  </div>
  <div class="control">
    <label for='realname'><?php echo $lang->user->realname;?></label>
    <?php echo html::input('realname', $user->realname, "class='input' placeholder='$lang->required'");?>
  </div>
  <div class="control">
    <label for='gender'><?php echo $lang->user->gender;?></label>
    <div class='select'>
      <?php unset($lang->user->genderList->u); echo html::select('gender', $lang->user->genderList, $user->gender);?>
    </div>
  </div>
  <?php if($this->app->user->admin == 'super'):?>
  <div class="control">
    <label for='dept'><?php echo $lang->user->dept;?></label>
    <div class='select'>
      <?php echo html::select('dept', $depts, $user->dept);?>
    </div>
  </div>
  <div class="control">
    <label for='role'><?php echo $lang->user->role;?></label>
    <div class='select'>
      <?php echo html::select('role', $lang->user->roleList, $user->role);?>
    </div>
  </div>
  <?php endif;?>
  <div class="control">
    <label for='password'><?php echo $lang->user->password;?></label>
    <?php echo html::password('password', $user->password, "class='input'");?>
  </div>
  <div class="control">
    <label for='password2'><?php echo $lang->user->password2;?></label>
    <?php echo html::password('password2', $user->password2, "class='input'");?>
  </div>
  <hr class='space'>
  <div class='heading gray'>
    <div class='title text-important'><?php echo $lang->user->contactInfo; ?></div>
  </div>
  <div class="control">
    <label for='email'><?php echo $lang->user->email;?></label>
    <?php echo html::input('email', $user->email, "class='input' placeholder='$lang->required'");?>
  </div>
  <div class="control">
    <label for='zipcode'><?php echo $lang->user->zipcode;?></label>
    <?php echo html::input('zipcode', $user->zipcode, "class='input'");?>
  </div>
  <div class="control">
    <label for='mobile'><?php echo $lang->user->mobile;?></label>
    <?php echo html::input('mobile', $user->mobile, "class='input'");?>
  </div>
  <div class="control">
    <label for='qq'><?php echo $lang->user->qq;?></label>
    <?php echo html::input('qq', $user->qq, "class='input'");?>
  </div>
  <div class="control">
    <label for='gtalk'><?php echo $lang->user->gtalk;?></label>
    <?php echo html::input('gtalk', $user->gtalk, "class='input'");?>
  </div>
  <div class="control">
    <label for='address'><?php echo $lang->user->address;?></label>
    <?php echo html::input('address', $user->address, "class='input'");?>
  </div>
</form>

<div class='footer has-padding'>
  <button type='button' data-submit='#userEditForm' class='btn primary'><?php echo $lang->save ?></button>
</div>

<?php js::execute($pageJS);?>
