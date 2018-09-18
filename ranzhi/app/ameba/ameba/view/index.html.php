<?php
/**
 * The ameba view file of ameba module of RanZhi.
 *
 * @copyright   Copyright 2009-2017 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     ameba 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php js::import($config->webRoot . 'js/zui/treemap/min.js');?>
<?php css::import($config->webRoot . 'js/zui/treemap/min.css');?>
<div id='menuActions'>
  <?php commonModel::printLink('sys.tree', 'browse', 'type=dept', $lang->ameba->dept, "class='btn btn-primary manageDept'");?>
</div>
<?php foreach($lang->ameba->typeList as $type => $label):?>
<?php echo html::a('###', $label, "class='btn btn-$type'");?>
<?php endforeach;?>
<?php echo html::a('###', $lang->ameba->moderators, "class='btn btn-primary'");?>
<div class="treemapMenu dropdown">
  <button class="btn btn-primary" type="button" data-toggle="dropdown"><?php echo $lang->ameba->showLevel;?><span class="caret"></span></button>
  <ul class="dropdown-menu" id="treemapLevelMenu"></ul>
</div>
<div id='companyTreemap' class='treemap'><?php echo $treemap;?></div>
<?php js::set('levelFormat', $lang->ameba->levelFormat);?>
<?php include '../../common/view/footer.html.php';?>
