<?php
/**
 * The linkContact mobile view file of customer module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     customer 
 * @version     $Id: index.html.php 3830 2016-05-18 09:34:17Z liugang $
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>

<style>
#linkContactForm .sc-field {display: none}
#linkContactForm.show-sc .sc-field {display: block;}
#linkContactForm.show-sc .not-sc-field {display: none;}
</style>

<div class='heading divider'>
  <div class='title'><strong><?php echo $lang->customer->linkContact ?></strong></div>
  <nav class='nav'><a data-dismiss='display'><i class='icon-remove muted'></i></a></nav>
</div>

<form class='content box' data-display-from='customerContactsModal' method='post' id='linkContactForm' action='<?php echo $this->createLink('customer', 'linkContact', "customerID=$customerID")?>'>
  <div class='control'>
    <div class='checkbox pull-right'>
      <input type='checkbox' name='selectContact' id='selectContact' value='1'>
      <label for='selectContact'><?php echo $lang->customer->selectContact;?></label>
    </div>
    <label><?php echo $lang->customer->contact;?></label>
    <?php echo html::input('realname', '', "class='input not-sc-field'");?>
    <div class='select sc-field'><?php echo html::select('contact', $contacts);?></div>
  </div>
  <div class='not-sc-field'>
    <div class='control'>
      <label for='gender'><?php echo $lang->contact->gender;?></label>
      <div class='select'><?php echo html::select('gender', $lang->genderList);?></div>
    </div>
    <div class='control'>
      <label for='phone'><?php echo $lang->contact->phone;?></label>
      <?php echo html::input('phone', '', "class='input'");?>
    </div>
    <div class='control'>
      <label for='email'><?php echo $lang->contact->email;?></label>
      <input type='email' class='input' name='email' id='email'>
    </div>
    <div class='control'>
      <label for='qq'><?php echo $lang->contact->qq;?></label>
      <input type='text' class='input' name='qq' id='qq'>
    </div>
    <div class='control'>
      <label for='mobile'><?php echo $lang->contact->mobile;?></label>
      <?php echo html::input('mobile', '', "class='input'");?>
    </div>
  </div>
</form>

<div class='footer has-padding'>
  <button type='button' data-submit='#linkContactForm' class='btn primary'><?php echo $lang->save ?></button>
</div>

<script>
$(function()
{
    var $form = $('#linkContactForm').modalForm().listenScroll({container: 'parent'});

    $('#selectContact').on('change', function()
    {
        $form.toggleClass('show-sc', $(this).is(':checked'));
    });
});
</script>
