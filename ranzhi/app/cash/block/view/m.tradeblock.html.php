<?php
/**
 * The trade block mobile view file of block module of RanZhi.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php
$tradeIcons = array();
$tradeIcons['in']          = array('icon' => 'plus', 'color' => 'red');
$tradeIcons['out']         = array('icon' => 'minus', 'color' => 'green');
$tradeIcons['transferout'] = array('icon' => 'signout', 'color' => 'blue');
$tradeIcons['transferin']  = array('icon' => 'signin', 'color' => 'yellow');
$tradeIcons['inveset']     = array('icon' => 'lightbulb', 'color' => 'purple');
$tradeIcons['redeem']      = array('icon' => 'repeat', 'color' => 'brown');
?>

<div class='list with-divider'>
  <?php foreach($trades as $id => $trade):?>
  <div class='item with-avatar multi-lines'>
    <div class='avatar <?php echo $tradeIcons[$trade->type]['color'] ?>'><i class='icon icon-<?php echo $tradeIcons[$trade->type]['icon'] ?>'></i></div>
    <div class='content'>
      <div class='titlesub'><?php echo zget($depositorList, $trade->depositor);?></div>
      <div class='title'>
        <small class="muted"><?php echo zget($lang->trade->typeList, $trade->type);?></small> <strong class='text-<?php echo $tradeIcons[$trade->type]['color'] ?>'><?php echo zget($currencySign, $trade->currency) . $trade->money?></strong>
        <div class='pull-right muted small'><?php echo $trade->date;?></div>
      </div>
    </div>
  </div>
  <?php endforeach;?>
</div>
