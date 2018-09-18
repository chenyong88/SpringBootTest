<?php
/**
 * The delivery mobile view file of contract module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     contract 
 * @version     $Id: index.html.php 3830 2016-05-18 09:34:17Z liugang $
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>

<div class='heading divider'>
  <div class='title'><strong><?php echo $lang->contract->delivery ?></strong></div>
  <nav class='nav'><a data-dismiss='display'><i class='icon-remove muted'></i></a></nav>
</div>

<form class='content box' data-form-refresh='#page' method='post' id='deliveryContractForm' action='<?php echo $this->createLink('contract', 'delivery', "contractID=$contract->id")?>'>
  <div class='control'>
    <div class='checkbox pull-right'>
      <input type='checkbox' id='finish' name='finish' value='1'>
      <label for='finish'><?php echo $lang->contract->completeDelivery;?></label>
    </div>
    <label for='deliveredBy'><?php echo $lang->contract->deliveredBy;?></label>
    <div class='select'>
      <?php echo html::select('deliveredBy', $users, $this->app->user->account);?>
    </div>
  </div>
  <div class='control'>
    <label for='deliveredDate'><?php echo $lang->contract->deliveredDate;?></label>
    <input type='date' id='deliveredDate' name='deliveredDate' class='input' value='<?php echo date('Y-m-d') ?>'>
  </div>
  <div class='control'>
    <label for='handlers[]'><?php echo $lang->contract->handlers;?></label>
    <div class='select'>
      <?php echo html::select('handlers[]', $users, $contract->handlers, 'multiple');?>
    </div>
  </div>
  <div class='control'>
    <label for='comment'><?php echo $lang->comment;?></label>
    <?php echo html::textarea('comment', '', "class='textarea' rows='2'");?>
  </div>
</form>

<div class='footer has-padding'>
  <button type='button' data-submit='#deliveryContractForm' class='btn primary'><?php echo $lang->save ?></button>
</div>

<script>
$(function()
{
    $('#deliveryContractForm').modalForm().listenScroll({container: 'parent'});
});
</script>
