<?php
/**
 * The create mobile view file of feedback module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     feedback 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>

<style>
#createFeedbackForm .create-contact-fields {display: none}

#createFeedbackForm.create-contact .create-contact-fields {display: block;}
#createFeedbackForm.create-contact .select-contact-fields {display: none;}

#createFeedbackForm.create-contact .create-contact-field.control {background: #ebf2f9; padding: 0 .5rem .5rem; margin-right: -.5rem; margin-left: -.5rem;}
#createFeedbackForm.create-contact .create-contact-field.control {margin-bottom: 0; padding-top: .5rem}
</style>

<div class='heading divider'>
  <div class='title'><i class='icon-plus muted'></i> <strong><?php echo $lang->feedback->create;?></strong></div>
  <nav class='nav'><a data-dismiss='display'><i class='icon-remove muted'></i></a></nav>
</div>

<form class='content box' data-form-refresh='#page' method='post' id='createFeedbackForm' action='<?php echo $this->createLink('feedback', 'create')?>'>
  <div class='control'>
    <label for='product'><?php echo $lang->feedback->product;?></label>
    <div class='select'><?php echo html::select('product', array(0 => $lang->required) + $products);?></div>
  </div>

  <div class='control'>
    <label for='customer'><?php echo $lang->feedback->customer;?></label>
    <div class='select'><?php echo html::select('customer', array('' => $lang->required) + $customers);?></div>
  </div>

  <div class='control create-contact-field'>
    <div class='checkbox pull-right'>
      <input type='checkbox' name='createContact' id='createContact' value='1'>
      <label for='createContact' class='text-link'><?php echo $lang->create;?></label>
    </div>
    <label for='contact'><?php echo $lang->feedback->contact;?></label>
    <div class='select select-contact-fields'><?php echo html::select('contact', array(0 => $lang->required) + $contacts);?></div>
    <?php echo html::input('contactName', '', "class='input create-contact-fields' placeholder='{$lang->required}'");?>
  </div>

  <div class='control'>
    <label for='assignedTo'><?php echo $lang->feedback->assignedTo;?></label>
    <div class='select'><?php echo html::select('assignedTo', $users);?></div>
  </div>

  <div class='row'>
    <div class='cell-9'>
      <div class='control'>
        <label for='title'><?php echo $lang->feedback->title;?></label>
        <?php echo html::input('title', '', "class='input' placeholder='{$lang->required}'");?>
      </div>
    </div>
    <div class='cell-3'>
      <div class='control'>
        <label for='pri'><?php echo $lang->feedback->pri;?></label>
        <div class='select'><?php echo html::select('pri', $lang->feedback->priList);?></div>
      </div>
    </div>
  </div>

  <div class='control'>
    <label for='desc'><?php echo $lang->feedback->desc;?></label>
    <?php echo html::textarea('desc', '', "rews='5' class='textarea'");?>
  </div>
</form>

<div class='footer has-padding'>
  <button type='button' data-submit='#createFeedbackForm' class='btn primary'><?php echo $lang->save ?></button>
</div>

<script>
$(function()
{
    var $form = $('#createFeedbackForm').modalForm().listenScroll({container: 'parent'});

    $('#createContact').on('change', function()
    {
        $form.toggleClass('create-contact', $(this).is(':checked'));
    });

    $('#customer').change(function()
    {   
        if($(this).val() == '') return;
    
        var link    = createLink('feedback', 'ajaxGetContacts', 'customer=' + $(this).val());
        var contact = $('#contact').val();
        $('#contact').load(link ,function()
        {   
            $('#contact').val(contact);
            $('#contact').trigger('chosen:updated');
        }); 
    }); 
});
</script>
