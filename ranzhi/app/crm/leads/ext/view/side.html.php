<?php
/**
 * The side view file of leads module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     leads 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php if(commonModel::hasPriv('leads', 'sync')):?>
<li class='leads dropdown'>
  <a href='#' data-toggle='dropdown'><?php echo $lang->leads->sync;?> <span class='caret'></span></a>
  <ul aria-labelledby='dropdownMenu1' role='menu' class='dropdown-menu'>
    <?php if(!empty($config->leads->sites)):?>
    <li><?php commonModel::printLink('leads', 'sync', '', $lang->all);?></li>
    <?php foreach($config->leads->sites as $code => $site):?>
    <?php $site = json_decode($site);?>
    <li><?php commonModel::printLink('leads', 'sync', "origin=$code", $site->name);?></li>
    <?php endforeach;?>
    <?php else:?>
    <li><?php commonModel::printLink('leads', 'adminSites', '', $lang->leads->sites);?></li>
    <?php endif;?>
  </ul>
</li>
<?php endif;?>
<li id='bysearchTab' class='hidden'></li>
<div class='side'>
  <nav class='menu leftmenu affix'>
    <ul class='nav nav-primary nav-stacked'>
      <li class="<?php echo $type == 'site' ? 'active' : '';?>"><?php commonModel::printLink('leads', 'adminSites', '', $lang->leads->sites);?></li>
      <li class="<?php echo $type == 'sync' ? 'active' : '';?>"><?php commonModel::printLink('leads', 'setting', 'type=sync', $lang->leads->syncSetting);?></li>
      <li class="<?php echo $type == 'apply' ? 'active' : '';?>"><?php commonModel::printLink('leads', 'setting', 'type=apply', $lang->leads->applyRule);?></li>
    </ul>
  </nav>
</div>
