<?php
/**
 * The create mobile view file of leads module of RanZhi.
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
  <div class='title'><i class='icon-plus muted'></i> <strong><?php echo $lang->leads->create ?></strong></div>
  <nav class='nav'>
    <a data-dismiss='display'><i class='icon-remove muted'></i></a>
  </nav>
</div>

<form class='content box' data-form-refresh='#page' method='post' id='createLeadsForm' action='<?php echo $this->createLink('leads', 'create')?>'>
  <div class='control'>
    <label for='realname'><?php echo $lang->contact->realname;?></label>
    <?php echo html::input('realname', '', "class='input' placeholder='{$lang->required}'");?>
  </div>
  <div class='control'>
    <label for='origin'><?php echo $lang->contact->origin;?></label>
    <?php echo html::input('origin', '', "class='input' placeholder='{$lang->required}'");?>
  </div>
  <div class='control'>
    <label for='company'><?php echo $lang->contact->company;?></label>
    <?php echo html::input('company', '', "class='input'");?>
  </div>
  <div class='control'>
    <label for='customer'><?php echo $lang->contact->gender;?></label>
    <div class='select'><?php unset($lang->genderList->u); echo html::select('gender', $lang->genderList);?></div>
  </div>
  <div class='control'>
    <label for='desc'><?php echo $lang->contact->desc;?></label>
    <?php echo html::textarea('desc', '', "rows='2' class='textarea'");?>
  </div>
  <div class='space'></div>
  <div class='heading gray'>
    <div class='title text-important'><?php echo $lang->contact->contactInfo; ?></div>
  </div>
  <div class='control'>
    <label for='email'><?php echo $lang->contact->email;?></label>
    <input type='email' id='emial' name='email' class='input'>
  </div>
  <div class='control'>
    <label for='mobile'><?php echo $lang->contact->mobile;?></label>
    <?php echo html::input('mobile', '', "class='input'");?>
  </div>
  <div class='control'>
    <label for='phone'><?php echo $lang->contact->phone;?></label>
    <?php echo html::input('phone', '', "class='input'");?>
  </div>
  <div class='control'>
    <label for='qq'><?php echo $lang->contact->qq;?></label>
    <?php echo html::input('qq', '', "class='input'");?>
  </div>
  <div class='control'>
    <label for='fax'><?php echo $lang->contact->fax;?></label>
    <?php echo html::input('fax', '', "class='input'");?>
  </div>
</form>

<div class='footer has-padding'>
  <button type='button' data-submit='#createLeadsForm' class='btn primary'><?php echo $lang->save ?></button>
</div>

<script>
$(function()
{
    $('#createLeadsForm').modalForm().listenScroll({container: 'parent'});
});
</script>
