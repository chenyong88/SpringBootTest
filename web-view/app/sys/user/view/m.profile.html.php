<?php include "../../common/view/m.avatar.html.php"; ?>
<header class='heading primary'>
  <div class='title muted'><strong><?php echo $lang->user->profile ?></strong></div>
  <nav class='nav'>
    <a data-dismiss='display'><i class='icon-remove muted'></i></a>
  </nav>
</header>

<section class='content'>
  <div class='has-padding primary flex flex-column flex-center'>
    <?php if(!empty($user->avatar)): ?>
    <div class='state' data-display='modal' data-target-dismiss='true' data-placement='center' data-content='<a class="dock dock-right dock-top btn"><i class="icon icon-remove muted"></i></a><img src="<?php echo $user->avatar . '?u=' . uniqid() ?>">'>
    <?php endif; ?>
    <?php printUserAvatar('circle avatar-xl', $user);?>
    <?php if(!empty($user->avatar)): ?>
    </div>
    <?php endif; ?>
    <div class='space-sm'></div>
    <h5 class='lead'>
    <?php
    if(empty($user->realname)) echo "@{$user->account}";
    else echo $user->realname;
    ?>
    </h5>
  </div>
  <div class='list'>
    <?php if(!empty($user->email)): ?>
    <div class='item multi-lines'>
      <div class='content'>
        <div class='subtitle'><?php echo $lang->user->email ?></div>
        <div class='title'><?php echo $user->email ?></div>
      </div>
    </div>
    <?php endif;?>
    <?php if(!empty($user->mobile)): ?>
    <div class='item multi-lines'>
      <div class='content'>
        <div class='subtitle'><?php echo $lang->user->mobile ?></div>
        <div class='title'><?php echo html::a("tel:$user->mobile", $user->mobile);?></div>
      </div>
    </div>
    <?php endif;?>
    <?php if(!empty($user->phone)): ?>
    <div class='item multi-lines'>
      <div class='content'>
        <div class='subtitle'><?php echo $lang->user->phone;?></div>
        <div class='title'><?php echo html::a("tel:$user->phone", $user->phone);?></div>
      </div>
    </div>
    <?php endif;?>
    <?php if(!empty($user->qq)): ?>
    <div class='item multi-lines'>
      <div class='content'>
        <div class='subtitle'><?php echo $lang->user->qq ?></div>
        <div class='title'><?php echo $user->qq ?></div>
      </div>
    </div>
    <?php endif;?>
    <?php if(!empty($user->address)): ?>
    <div class='item multi-lines'>
      <div class='content'>
        <div class='subtitle'><?php echo $lang->user->address ?></div>
        <div class='title'><?php echo $user->address ?></div>
      </div>
    </div>
    <?php endif;?>
    <?php if(!empty($user->zipcode)): ?>
    <div class='item multi-lines'>
      <div class='content'>
        <div class='subtitle'><?php echo $lang->user->zipcode ?></div>
        <div class='title'><?php echo $user->zipcode ?></div>
      </div>
    </div>
    <?php endif;?>
    <?php if(!empty($user->gtalk)): ?>
    <div class='item multi-lines'>
      <div class='content'>
        <div class='subtitle'><?php echo $lang->user->gtalk ?></div>
        <div class='title'><?php echo $user->gtalk ?></div>
      </div>
    </div>
    <?php endif;?>
  </div>
</section>

<nav class='footer nav justified'>
  <?php echo html::a(inlink('edit'), "<i class='icon-pencil'></i>&nbsp;" . $lang->user->editProfile, "data-display='modal' data-placement='bottom'");?>
  <a data-placement='bottom' data-display='modal' data-remote='<?php echo inlink('uploadAvatar', "account={$user->account}") ?>'><i class='icon-picture'></i>&nbsp;<?php echo $lang->user->uploadAvatar ?></a>
  <?php if($user->provider == 'wechat' and $user->openID) echo html::a($this->createLink('wechat', 'unbindUser', "account={$user->account}&provider={$user->provider}&openID={$user->openID}"), "<i class='icon icon-unlink'></i> " . $lang->user->unbind, "data-display='ajaxAction' data-locate='self'");?>
  <?php if(!$user->provider and !$user->openID) echo html::a($this->createLink('wechat', 'bindUser'), "<i class='icon icon-link'></i> " . $lang->user->bind, "class='bind' data-display='modal' data-placement='bottom'");?>
</nav>

<script>
$(function()
{
    $('.bind').click(function(){$('.nav .icon-remove').click();})
})
</script>
