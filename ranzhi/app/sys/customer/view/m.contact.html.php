<?php
/**
 * The contact mobile view file of customer module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     customer 
 * @version     $Id: index.html.php 3830 2016-05-18 09:34:17Z liugang $
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>

<div class='heading'>
  <div class='title'><i class='icon muted icon-group'></i> <strong><?php echo $lang->customer->contact ?></strong></div>
  <nav class='nav'><a data-dismiss='display'><i class='icon-remove muted'></i></a></nav>
</div>

<div class='list with-divider content' id='contactsList'>
  <?php foreach($contacts as $contact):?>
    <div data-contact-id='<?php echo $contact->id ?>' class='item item-contact with-avatar multi-lines'>
      <div class='avatar circle text-tint' data-skin='<?php echo $contact->id ?>'><?php echo $contact->realname ?></div>
      <div class='content'>
        <div class='title'>
          <?php echo $contact->realname ?>
          <?php if(!empty($contact->nickname)): ?>
          &nbsp; <small class='muted'>(<?php echo $contact->nickname ?>)</small>
          <?php endif; ?>
          <?php if($contact->gender == 'm' or $contact->gender == 'f'): ?>
          &nbsp; <i class='icon icon-<?php echo $contact->gender == 'm' ? 'mars text-blue' : 'venus text-red' ?>'></i>
          <?php endif; ?>
          <?php if($contact->maker): ?>
          <span class='label important pull-right'><?php echo $lang->resume->maker ?></span>
          <?php endif; ?>
        </div>
        <?php if(!empty($contact->dept) || !empty($contact->title)): ?>
        <div class='subtitle'>
          <i class='icon icon-user'></i>
          <?php if(!empty($contact->dept)) echo $lang->resume->dept . ': ' . $contact->dept . ' &nbsp; ' ?>
          <?php if(!empty($contact->title)) echo $lang->resume->title . ': ' . $contact->title?>
        </div>
        <?php endif; ?>
        <?php if(!empty($contact->phone)): ?>
        <div class='subtitle'><i class='icon icon-phone-sign'></i> <?php echo $lang->customer->phone . ': ' . html::a("tel:$contact->phone", $contact->phone);?></div>
        <?php endif; ?>
        <?php if(!empty($contact->email)): ?>
        <div class='subtitle'><i class='icon icon-envelope-alt'></i> <?php echo $lang->customer->email . ': ' . $contact->email?></div>
        <?php endif; ?>
        <?php if(!empty($contact->qq)): ?>
        <div class='subtitle'><i class='icon icon-qq'></i> <?php echo $lang->customer->qq . ': ' . $contact->qq?></div>
        <?php endif; ?>
        <div class='space-sm'></div>
        <div>
          <a class='btn info-pale text-tint' data-display='modal' data-target-dismiss='true' data-placement='center' data-content='<a class="dock dock-right dock-top btn"><i class="icon icon-remove muted"></i></a><img src="<?php echo $this->createLink('contact', 'vcard', "contactID={$contact->id}") ?>">'><i class='icon-qrcode'></i>&nbsp;vCard</a>
          <?php if(commonModel::hasPriv('contact', 'edit')):?>
          <a data-remote='<?php echo $this->createLink('crm.contact', 'edit', "contactID=$contact->id") ?>' class='gray btn' data-display='modal' data-placement='bottom'><?php echo $lang->edit ?></a>
          <?php endif;?>

          <?php if(commonModel::hasPriv('resume', 'leave')):?>
          <a data-remote='<?php echo $this->createLink('crm.resume', 'leave', "resumeID=$contact->resume") ?>' class='gray text-warning btn' data-display='ajaxAction' data-reset-locate='self'><?php echo $lang->resume->leave ?></a>
          <?php endif;?>
          <?php if(commonModel::hasPriv('contact', 'delete')):?>
          <a data-remote='<?php echo $this->createLink('crm.contact', 'delete', "contactID=$contact->id") ?>' class='text-danger gray btn'  data-display='ajaxAction' data-reset-locate='false' data-ajax-delete='.item-contact[data-contact-id="<?php echo $contact->id ?>"]'><?php echo $lang->delete ?></a>
          <?php endif;?>
        </div>
      </div>
    </div>
  <?php endforeach;?>
</div>

<div class='footer nav justified'>
  <a data-remote='<?php echo $this->createLink('customer', 'linkContact', "customerID=$customerID") ?>' data-display='modal' data-placement='bottom' class='strong text-link' title='{$lang->customer->linkContact}'><i class='icon-plus'></i>&nbsp;<?php echo $lang->customer->linkContact ?></a>
</div>

<script>
$(function()
{
    $('#contactsList .avatar').fixAvatar();
});
</script>
