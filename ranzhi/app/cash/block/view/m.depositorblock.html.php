<?php
/**
 * The project list block mobile view file of block module of RanZhi.
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
$depositorIcons           = array();
$depositorIcons['cash']   = array('icon' => 'dollar', 'color' => 'red');
$depositorIcons['bank']   = array('icon' => 'credit', 'color' => 'blue');
$depositorIcons['online'] = array('icon' => 'bolt', 'color' => 'purple');;
?>
<style>
.depositors > .item {margin-top: 0!important}
</style>
<div class='list depositors'>
  <?php foreach($depositors as $id => $depositor):?>
  <?php $provider = $depositor->type == 'bank' ? $depositor->provider : $lang->depositor->providerList[$depositor->provider]; ?>
  <div class='has-margin-sm rounded shadow item with-avatar multi-lines <?php echo $depositorIcons[$depositor->type]['color'] ?>'>
    <div class='avatar rounded darken'><i class="icon icon-<?php echo $depositorIcons[$depositor->type]['icon'] ?>"></i></div>
    <div class='content'>
      <div class='title'>
        <small class='muted'><?php echo $provider;?></small>
        <div class='label rounded pull-right white text-<?php echo $depositorIcons[$depositor->type]['color'] ?>'><?php echo $lang->depositor->typeList[$depositor->type]?></div>
      </div>
      <div class='small'>
        <?php echo $depositor->title;?>
      </div>
      <div class='lead'><?php echo $depositor->account;?></div>
    </div>
  </div>
  <?php endforeach;?>
</div>
