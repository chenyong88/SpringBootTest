<?php
/**
 * The create mobile view file of resume module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     resume 
 * @version     $Id: index.html.php 3830 2016-05-18 09:34:17Z liugang $
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>

<style>
#createResumeForm .nc-field {display: none}
#createResumeForm.show-nc-field .nc-field {display: block}
#createResumeForm.show-nc-field .nc-field.row {display: flex;}
#createResumeForm.show-nc-field .not-nc-field {display: none}
#createResumeForm.show-nc-field .nc-section {background: #ebf2f9; padding: .5rem; margin-bottom: 0; margin-right: -.5rem; margin-left: -.5rem;}
#createResumeForm.show-nc-field .nc-section.row {padding: .5rem .25rem;}
</style>

<div class='heading divider'>
  <div class='title'><i class='icon-plus muted'></i> <strong><?php echo $lang->resume->create ?></strong></div>
  <nav class='nav'><a data-dismiss='display'><i class='icon-remove muted'></i></a></nav>
</div>

<form class='content box' data-display-from='resumesModal' method='post' id='createResumeForm' action='<?php echo inlink('create', "contactID=$contactID")?>'>
  <div class='control nc-section'>
    <div class='checkbox pull-right'>
      <input type='checkbox' name='newCustomer' id='newCustomer' value='1' />
      <label for='newCustomer'><?php echo $lang->contact->newCustomer?></label>
    </div>
    <label for='customer'><?php echo $lang->resume->customer;?></label>
    <?php echo html::input('name', '', "class='input nc-field' placeholder='{$lang->customer->name}'");?>
    <div class='select not-nc-field'><?php echo html::select('customer', $customers, !empty($customer) ? $customer : '');?></div>
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
  <div class='control'>
    <div class='checkbox'>
      <input type='checkbox' name='maker' id='maker' value='1'>
      <label for='maker'><?php echo $lang->resume->maker?></label>
    </div>
  </div>
  <div class='row'>
    <div class='cell-6'>
      <div class='control'>
        <label for='dept'><?php echo $lang->resume->dept;?></label>
        <?php echo html::input('dept', '', "class='input'");?>
      </div>
    </div>
    <div class='cell-6'>
      <div class='control'>
        <label for='title'><?php echo $lang->resume->title;?></label>
        <?php echo html::input('title', '', "class='input'");?>
      </div>
    </div>
    <div class='cell-6'>
      <div class='control'>
        <label for='join'><?php echo $lang->resume->join;?></label>
        <input type='date' id='join' name='join' class='input'>
      </div>
    </div>
    <div class='cell-6'>
      <div class='control'>
        <label for='left'><?php echo $lang->resume->left;?></label>
        <input type='date' id='left' name='left' class='input'>
      </div>
    </div>
  </div>
</form>

<div class='footer has-padding'>
  <button type='button' data-submit='#createResumeForm' class='btn primary'><?php echo $lang->save ?></button>
</div>

<script>
$(function()
{
    var $form = $('#createResumeForm').modalForm().listenScroll({container: 'parent'});

    $('#newCustomer').on('change', function()
    {
        $form.toggleClass('show-nc-field', $(this).is(':checked'));
    });
});
</script>
