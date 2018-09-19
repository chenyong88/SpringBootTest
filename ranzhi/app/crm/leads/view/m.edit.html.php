<?php
/**
 * The edit mobile view file of leads module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     leads 
 * @version     $Id: index.html.php 3830 2016-05-18 09:34:17Z liugang $
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>

<div class='heading divider'>
  <div class='title'><i class='icon-pencil muted'></i> <strong><?php echo $lang->leads->edit ?></strong></div>
  <nav class='nav'>
    <a class='text-primary' data-display='modal' data-remote='<?php echo $this->createLink('action', 'history', "objectType=contact&objectID={$contact->id}") ?>' data-placement='bottom'><i class='icon-history'></i>&nbsp;<?php echo $lang->history ?></a>
    <a data-dismiss='display'><i class='icon-remove muted'></i></a>
  </nav>
</div>

<form class='content box' data-form-refresh='#page' method='post' id='editLeadsForm' action='<?php echo $this->createLink('leads', 'edit', "contactID=$contact->id")?>'>
  <div class='control'>
    <label for='realname'><?php echo $lang->contact->realname;?></label>
    <?php echo html::input('realname', $contact->realname, "class='input'");?>
  </div>
  <div class='control'>
    <label for='company'><?php echo $lang->contact->company;?></label>
    <?php echo html::input('company', $contact->company, "class='input'");?>
  </div>
  <div class='row'>
    <div class='cell-6'>
      <div class='control'>
        <label for='join'><?php echo $lang->contact->birthday;?></label>
        <input type='date' value='<?php echo $contact->birthday ?>' id='birthday' name='birthday' class='input'>
      </div>
    </div>
    <div class='cell-6'>
      <div class='control'>
        <label for='customer'><?php echo $lang->contact->gender;?></label>
        <div class='select'><?php unset($lang->genderList->u); echo html::select('gender', $lang->genderList, $contact->gender);?></div>
      </div>
    </div>
  </div>
  <div class='control'>
    <label for='desc'><?php echo $lang->contact->desc;?></label>
    <?php echo html::textarea('desc', $contact->desc, "rows='2' class='textarea'");?>
  </div>
  <div class='space'></div>
  <div class='heading gray'>
    <div class='title text-important'><?php echo $lang->contact->contactInfo; ?></div>
  </div>
  <?php foreach($config->contact->contactWayList as $item):?>
  <div class="control">
    <label for="<?php echo $item; ?>"><?php echo $lang->contact->{$item};?></label>
    <?php
    $itemValue = $contact->$item;
    if($item == 'site' and empty($contact->$item)) $itemValue = 'http://';
    if($item == 'weibo' and empty($contact->$item)) $itemValue = 'http://weibo.com/';
    $placeholder = $item == 'email' ? "placeholder='{$lang->contact->emailTip}'" : '';
    echo html::input($item, $itemValue, "class='input' $placeholder");
    ?>
  </div>
  <?php endforeach;?>
</form>

<div class='footer has-padding'>
  <button type='button' data-submit='#editLeadsForm' class='btn primary'><?php echo $lang->save ?></button>
</div>

<script>
$(function()
{
    $('#editLeadsForm').modalForm().listenScroll({container: 'parent'});
});
</script>
