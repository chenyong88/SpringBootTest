<?php
/**
 * The side view file of commission module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     commission 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<div class='side'>
  <nav class='menu leftmenu affix'>
    <ul class='nav nav-primary nav-stacked'>
      <?php foreach($lang->commission->modeList as $key => $value):?>
      <li class="<?php echo $mode == $key ? 'active' : '';?>"><?php echo html::a(inlink('setting', "mode={$key}"), $value);?></li>
      <?php endforeach;?>
    </ul>
  </nav>
</div>
