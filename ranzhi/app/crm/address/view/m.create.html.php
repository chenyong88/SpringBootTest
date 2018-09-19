<?php
/**
 * The create mobile view file of address module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     address 
 * @version     $Id: index.html.php 3830 2016-05-18 09:34:17Z liugang $
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>

<div class='heading divider'>
  <div class='title'><i class='icon-plus muted'></i> <strong><?php echo $lang->address->create ?></strong></div>
  <nav class='nav'><a data-dismiss='display'><i class='icon-remove muted'></i></a></nav>
</div>

<form class='content box' data-display-from='addressesModal' method='post' id='createAddressForm' action='<?php echo $this->createLink('address', 'create', "objectType=$objectType&objectID=$objectID")?>'>
  <div class='control'>
    <label for='title'><?php echo $lang->address->title;?></label>
    <?php echo html::input('title', '', "class='input' placeholder='{$lang->required}'");?>
  </div>
  <div class='control'>
    <label for='area'><?php echo $lang->address->area;?></label>
    <div class='select'><?php echo html::select('area', $areas, '')?></div>
  </div>
  <div class='control'>
    <label for='location'><?php echo $lang->address->location;?></label>
    <?php echo html::input('location', '', "class='input' placeholder='{$lang->required}'");?>
  </div>
</form>

<div class='footer has-padding'>
  <button type='button' data-submit='#createAddressForm' class='btn primary'><?php echo $lang->save ?></button>
</div>

<script>
$(function()
{
    $('#createAddressForm').modalForm().listenScroll({container: 'parent'});
});
</script>
