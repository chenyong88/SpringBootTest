<?php
/**
 * The edit mobile view file of feedback module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     feedback 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>

<div class='heading divider'>
  <div class='title'><i class='icon-pencil muted'></i> <strong><?php echo $lang->feedback->edit;?></strong></div>
  <nav class='nav'>
    <a class='text-primary' data-display='modal' data-remote='<?php echo $this->createLink('action', 'history', "objectType=feedback&objectID={$issue->id}") ?>' data-placement='bottom'><i class='icon-history'></i>&nbsp;<?php echo $lang->history ?></a>
    <a data-dismiss='display'><i class='icon-remove muted'></i></a>
  </nav>
</div>

<form method='post' id='editFeedbackForm' class='content has-padding modal-form listen-scroll' data-container='parent' action='<?php echo $this->createLink('feedback', 'edit', "issueID=$issue->id") ?>' data-form-refresh='#page'>
  <div class='control'>
    <label for='product'><?php echo $lang->feedback->product;?></label>
    <div class='select'><?php echo html::select('product', $products, $issue->product);?></div>
  </div>
  <div class='control'>
    <label for='customer'><?php echo $lang->feedback->customer;?></label>
    <div class='select'><?php echo html::select('customer', $customers, $issue->customer);?></div>
  </div>
  <div class='control'>
    <label for='contact'><?php echo $lang->feedback->contact;?></label>
    <div class='select'><?php echo html::select('contact', $contacts, $issue->contact);?></div>
  </div>
  <div class='control'>
    <label for='assignedTo'><?php echo $lang->feedback->assignedTo;?></label>
    <div class='select'><?php echo html::select('assignedTo', $users, $issue->assignedTo);?></div>
  </div>
  <div class='control'>
    <label for='status'><?php echo $lang->feedback->status;?></label>
    <div class='select'><?php echo html::select('status', $lang->feedback->statusList, $issue->status);?></div>
  </div>
  <div class='control'>
    <label for='closedReason'><?php echo $lang->feedback->closedReason;?></label>
    <div class='select'><?php echo html::select('closedReason', $lang->feedback->closedReasonList, $issue->closedReason);?></div>
  </div>
  <div class='row'>
    <div class='cell-9'>
      <div class='control'>
        <label for='title'><?php echo $lang->feedback->title;?></label>
        <?php echo html::input('title', $issue->title, "class='input' placeholder='{$lang->required}'");?>
      </div>
    </div>
    <div class='cell-3'>
      <div class='control'>
        <label for='pri'><?php echo $lang->feedback->pri;?></label>
        <div class='select'><?php echo html::select('pri', $lang->feedback->priList, $issue->pri);?></div>
      </div>
    </div>
  </div>
  <div class='control'>
    <label for='desc'><?php echo $lang->feedback->desc;?></label>
    <?php echo html::textarea('desc', $issue->desc, "rews='5' class='textarea'");?>
  </div>
</form>

<div class='footer has-padding'>
  <button type='button' data-submit='#editFeedbackForm' class='btn primary'><?php echo $lang->save ?></button>
</div>

<script>
$(function()
{
    $('#editFeedbackForm').modalForm().listenScroll({container: 'parent'});

    $('#status').change(function(){$('#closedReason').parents('.control').toggle($(this).val() == 'closed');})
    $('#status').change();

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
