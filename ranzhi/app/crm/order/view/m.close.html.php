<?php
/**
 * The close mobile view file of order module of RanZhi.
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
  <div class='title'><strong><?php echo $lang->order->close ?></strong></div>
  <nav class='nav'><a data-dismiss='display'><i class='icon-remove muted'></i></a></nav>
</div>

<form class='content box listen-scroll modal-form' data-container='parent' data-form-refresh='#page' method='post' id='closeOrderForm' action='<?php echo $this->createLink('order', 'close', "orderID=$orderID")?>'>
  <div class='control'>
    <label for='closedReason'><?php echo $lang->order->closedReason?></label>
    <div class='select'>
      <?php echo html::select('closedReason', $lang->order->closedReasonList, '')?>
    </div>
  </div>
  <div class='control'>
    <label for='closedNote'><?php echo $lang->order->closedNote;?></label>
    <?php echo html::textarea('closedNote', '', "class='textarea' rows='2'");?>
  </div>
</form>

<div class='footer has-padding'>
  <button type='button' data-submit='#closeOrderForm' class='btn primary'><?php echo $lang->save ?></button>
</div>
