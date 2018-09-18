<?php
/**
 * The create mobile view file of contact module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     contact 
 * @version     $Id: index.html.php 3830 2016-05-18 09:34:17Z liugang $
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>

<style>
#createContactForm .nc-field {display: none}
#createContactForm.show-nc-field .nc-field {display: block}
#createContactForm.show-nc-field .nc-field.row {display: flex;}
#createContactForm.show-nc-field .not-nc-field {display: none}
#createContactForm.show-nc-field .nc-section {background: #ebf2f9; padding: .5rem; margin-bottom: 0; margin-right: -.5rem; margin-left: -.5rem;}
#createContactForm.show-nc-field .nc-section.row {padding: .5rem .25rem;}
</style>

<div class='heading divider'>
  <div class='title'><i class='icon-plus muted'></i> <strong><?php echo $lang->contact->create ?></strong></div>
  <nav class='nav'><a data-dismiss='display'><i class='icon-remove muted'></i></a></nav>
</div>

<form class='content box' data-form-refresh='#page' method='post' id='createContactForm' action='<?php echo $this->createLink('contact', 'create')?>'>
  <div class='control'>
    <div class='checkbox pull-right'>
      <input type='checkbox' name='maker' id='maker' value='1' />
      <label for='public'><?php echo $lang->resume->maker;?></label>
    </div>
    <label for='realname'><?php echo $lang->contact->realname;?></label>
    <?php echo html::input('realname', '', "class='input' placeholder='{$lang->required}'");?>
  </div>
  <div class="control nc-section">
    <div class='checkbox pull-right'>
      <input type='checkbox' name='newCustomer' id='newCustomer' value='1' />
      <label for='newCustomer'><?php echo $lang->contact->newCustomer?></label>
    </div>
    <label for="customer"><?php echo $lang->contact->customer;?></label>
    <?php echo html::input('name', '', "class='input nc-field' placeholder='{$lang->customer->name}'");?>
    <div class='select not-nc-field'><?php echo html::select('customer', array('' => $lang->required) + $customers, !empty($customer) ? $customer : '');?></div>
  </div>
  <div class='nc-field row nc-section'>
    <div class='cell-6'>
      <div class='control'>
        <label for='type'><?php echo $lang->customer->type;?></label>
        <div class='select'><?php echo html::select('type', $lang->customer->typeList);?></div>
      </div>
    </div>
    <div class='cell-6'>
      <div class='control'>
        <label for='size'><?php echo $lang->customer->size;?></label>
        <div class='select'><?php echo html::select('size', $sizeList);?></div>
      </div>
    </div>
    <div class='cell-6'>
      <div class='control'>
        <label for='status'><?php echo $lang->customer->status;?></label>
        <div class='select'><?php echo html::select('status', $lang->customer->statusList);?></div>
      </div>
    </div>
    <div class='cell-6'>
      <div class='control'>
        <label for='level'><?php echo $lang->customer->level;?></label>
        <div class='select'><?php echo html::select('level', $levelList);?></div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="cell-6">
      <div class='control'>
        <label for='gender'><?php echo $lang->contact->gender;?></label>
        <div class='select'><?php unset($lang->genderList->u); echo html::select('gender', $lang->genderList, '');?></div>
      </div>
    </div>
    <div class="cell-6">
      <div class='control'>
        <label for='dept'><?php echo $lang->resume->dept;?></label>
        <?php echo html::input('dept', '', "class='input'");?>
      </div>
    </div>
    <div class="cell-6">
      <div class='control'>
        <label for='title'><?php echo $lang->resume->title;?></label>
        <?php echo html::input('title', '', "class='input'");?>
      </div>
    </div>
    <div class="cell-6">
      <div class='control'>
        <label for='join'><?php echo $lang->resume->join;?></label>
        <input type='date' id='join' name='join' class='input'>
      </div>
    </div>
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
    <label for='mobile'><?php echo $lang->contact->mobile;?></label>
    <?php echo html::input('mobile', '', "class='input'");?>
  </div>
  <div class='control'>
    <label for='fax'><?php echo $lang->contact->fax;?></label>
    <?php echo html::input('fax', '', "class='input'");?>
  </div>
  <div class='control'>
    <label for='qq'><?php echo $lang->contact->qq;?></label>
    <input type='text' class='input' name='qq' id='qq'>
  </div>
  <div class='control'>
    <label for='desc'><?php echo $lang->contact->desc;?></label>
    <?php echo html::textarea('desc', '', "rows='2' class='textarea'");?>
  </div>
</form>

<div class='footer has-padding'>
  <button type='button' data-submit='#createContactForm' class='btn primary'><?php echo $lang->save ?></button>
</div>

<script>
$(function()
{
    var $form = $('#createContactForm').modalForm().listenScroll({container: 'parent'});

    $('#newCustomer').on('change', function()
    {
        $form.toggleClass('show-nc-field', $(this).is(':checked'));
    });
});
</script>
