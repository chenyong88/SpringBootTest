<?php
/**
 * The create mobile view file of customer module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     customer 
 * @version     $Id: index.html.php 3830 2016-05-18 09:34:17Z liugang $
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>

<div class='heading divider'>
  <div class='title'><i class='icon-plus muted'></i> <strong><?php echo $lang->customer->create ?></strong></div>
  <nav class='nav'><a data-dismiss='display'><i class='icon-remove muted'></i></a></nav>
</div>

<form class='content box' data-form-refresh='#page' method='post' id='createCustomerForm' action='<?php echo $this->createLink('customer', 'create')?>'>
  <div class='control'>
    <div class='checkbox pull-right'>
      <input type='checkbox' id='public' name='public' value='1'>
      <label for='public'><?php echo $lang->customer->public;?></label>
    </div>
    <label for='name'><?php echo $lang->customer->name;?></label>
    <?php echo html::input('name', '', "class='input'");?>
  </div>
  <div class='control'>
    <label for='contact'><?php echo $lang->customer->contact;?></label>
    <?php echo html::input('contact', '', "class='input' placeholder='{$lang->required}'");?>
  </div>
  <div class='control'>
    <label for='phone'><?php echo $lang->customer->phone;?></label>
    <?php echo html::input('phone', '', "class='input'");?>
  </div>
  <div class='control'>
    <label for='email'><?php echo $lang->customer->email;?></label>
    <input type='email' class='input' name='email' id='email'>
  </div>
  <div class='control'>
    <label for='qq'><?php echo $lang->customer->qq;?></label>
    <input type='text' class='input' name='qq' id='qq'>
  </div>
  <div class='row'>
    <div class='cell-6'>
      <div class='control'>
        <label for='type'><?php echo $lang->customer->type;?></label>
        <div class='select'>
          <?php echo html::select('type', $lang->customer->typeList);?>
        </div>
      </div>
    </div>
    <div class='cell-6'>
      <div class='control'>
        <label for='size'><?php echo $lang->customer->size;?></label>
        <div class='select'>
          <?php echo html::select('size', $sizeList);?>
        </div>
      </div>
    </div>
    <div class='cell-6'>
      <div class='control'>
        <label for='status'><?php echo $lang->customer->status;?></label>
        <div class='select'>
          <?php echo html::select('status', $lang->customer->statusList);?>
        </div>
      </div>
    </div>
    <div class='cell-6'>
      <div class='control'>
        <label for='level'><?php echo $lang->customer->level;?></label>
        <div class='select'>
          <?php echo html::select('level', $levelList, 0);?>
        </div>
      </div>
    </div>
  </div>
  <div class='control'>
    <label for='intension'><?php echo $lang->customer->intension;?></label>
    <?php echo html::textarea('intension', '', "rows='2' class='textarea'");?>
  </div>
</form>

<div class='footer has-padding'>
  <button type='button' data-submit='#createCustomerForm' class='btn primary'><?php echo $lang->save ?></button>
</div>

<script>
$(function()
{
    $('#createCustomerForm').modalForm().listenScroll({container: 'parent'});
});
</script>
