<?php
/**
 * The provider block mobile view file of block module of RanZhi.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
include "../../../sys/common/view/m.avatar.html.php";
?>
<div class='list with-divider'>
  <?php foreach($providers as $id => $provider):?>
  <div class='item multi-lines with-avatar' href='<?php echo $this->createLink('cash.provider', 'view', "id=$id");?>'>
    <?php printUserAvatar('circle', $provider) ?>
    <div class='content'>
      <div class='title'><?php echo $provider->name;?></div>
      <div>
        <small class='muted'><?php echo zget($areas, $provider->area);?></small>
        <div class="pull-right label text-tint outline" data-skin='<?php echo $provider->industry ?>' data-dark='true'><?php echo zget($industries, $provider->industry);?></div>
      </div>
    </div>
  </div>
  <?php endforeach;?>
</div>
