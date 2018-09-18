<?php
/**
 * The assignedTo mobile view file of order module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     order 
 * @version     $Id: index.html.php 3830 2016-05-18 09:34:17Z liugang $
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>

<div class='heading divider'>
  <div class='title'><strong><?php echo $lang->order->assignedTo ?></strong></div>
  <nav class='nav'><a data-dismiss='display'><i class='icon-remove muted'></i></a></nav>
</div>

<form class='content box' data-form-refresh='#page' method='post' id='assignedToOrderForm' action='<?php echo $this->createLink('order', 'assign', "orderID=$orderID")?>'>
  <div class='control'>
    <label for='assignedTo'><?php echo $lang->order->assignedTo?></label>
    <div class='select'>
      <?php echo html::select('assignedTo', $members, '')?>
    </div>
  </div>
  <div class='control'>
    <label for='closedNote'><?php echo $lang->comment;?></label>
    <?php echo html::textarea('comment', '', "class='textarea' rows='2'");?>
  </div>
</form>

<div class='footer has-padding'>
  <button type='button' data-submit='#assignedToOrderForm' class='btn primary'><?php echo $lang->save ?></button>
</div>

<script>
$(function()
{
    $('#assignedToOrderForm').modalForm().listenScroll({container: 'parent'});
});
</script>
