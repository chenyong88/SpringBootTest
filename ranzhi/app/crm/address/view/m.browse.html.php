<?php
/**
 * The browse mobile view file of address module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     address 
 * @version     $Id: index.html.php 3830 2016-05-18 09:34:17Z liugang $
 * @link        http://www.ranzhico.com
 */


if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>

<div class='heading'>
  <div class='title'><i class='icon muted icon-group'></i> <strong><?php echo $lang->address->browse ?></strong></div>
  <nav class='nav'><a data-dismiss='display'><i class='icon-remove muted'></i></a></nav>
</div>

<div class='list with-divider content' id='addresssList'>
  <?php foreach($addresses as $address):?>
    <div data-address-id='<?php echo $address->id ?>' class='item item-address multi-lines'>
      <div class='content'>
        <div class='subtitle'><?php echo $address->title ?></div>
        <div class='title'><?php echo $address->fullLocation;?></div>
        <div class='space-sm'></div>
        <div>
          <?php if($address->objectType == $objectType and $address->objectID == $objectID): ?>
          <a data-remote='<?php echo $this->createLink('address', 'edit', "addressID=$address->id")?>' class='btn gray' data-display='modal' data-placement='bottom'><?php echo $lang->edit ?></a>&nbsp;
          <a data-remote='<?php echo $this->createLink('address', 'delete', "addressID=$address->id") ?>' class='text-danger gray btn'  data-display='ajaxAction' data-reset-locate='false' data-ajax-delete='.item-address[data-address-id="<?php echo $address->id ?>"]'><?php echo $lang->delete ?></a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  <?php endforeach;?>
</div>

<div class='footer nav justified'>
  <a data-remote='<?php echo $this->createLink('address', 'create', "objectType=$objectType&objectID=$objectID") ?>' data-display='modal' data-placement='bottom' class='strong text-link' title='{$lang->address->create}'><i class='icon-plus'></i>&nbsp;<?php echo $lang->address->create ?></a>
</div>
