<?php
/**
 * The index mobile view file of project module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     project 
 * @version     $Id
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}
include "../../common/view/m.header.html.php";
?>
<style>
.tiles .tile {padding: .5rem .5rem .25rem 1rem; overflow: hidden;}
</style>
<?php
$typeIcons = array();
$typeIcons['url']  = 'icon-link';
$typeIcons['text'] = 'icon-file-text';
?>

<a data-display='modal' data-placement='bottom' data-remote='<?php echo $this->createLink('doc.doc', 'create', "libID=$libID&moduleID=$moduleID&projectID=$lib->project");?>' class='btn shadow-2 block btn-lg primary'><i class='icon icon-plus'></i> &nbsp;&nbsp;<?php echo $lang->doc->create;?></a>

<section id='page' class='section tiles list-with-actions list-with-pager'>
  <?php $refreshUrl = $this->createLink('doc', 'browse', "libID=$libID&moduleID=$moduleID&projectID=$projectID&browseType=$browseType&param=$param&orderBy=$orderBy&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}");?>
  <div class='row' data-page='<?php echo $pager->pageID;?>' data-refresh-url='<?php echo $refreshUrl;?>'>
    <?php foreach($modules as $module):?>
    <div class='cell-4'>
      <a class='tile' href='<?php echo inlink('browse', "libID=$libID&moduleID={$module->id}&projectID=$lib->project&browseType=$browseType&param=$param&orderBy=$orderBy");?>'>
        <div class='avatar avatar-xl gray space-xs'><i class='icon icon-folder-open-alt'></i></div>
        <div class='title small'><?php echo $module->name?></div>
      </a>
    </div>
    <?php endforeach;?>
    <?php foreach($docs as $doc):?>
    <div class='cell-4'>
      <a class='tile' href='<?php echo $this->createLink('doc.doc', 'view', "docID={$doc->id}");?>'>
        <div class='space-xs avatar avatar-xl gray'><i class='icon <?php echo $typeIcons[$doc->type];?>'></i></div>
        <div class='title small'><?php echo $doc->title;?></div>
      </a>
    </div>
    <?php endforeach;?>
  </div>
  <nav class='nav justify pager'>
    <?php $pager->show($align = 'justify');?>
  </nav>
</section>

<div class='list sort-panel hidden affix enter-from-bottom layer' id='sortPanel'>
  <?php
  $vars = "libID=$libID&moduleID=$moduleID&productID=$productID&projectID={$projectID}&mode={$mode}&param=$param&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}";
  $sortOrders = array('id', 'title', 'type', 'createdBy', 'createdDate');
  foreach($sortOrders as $doc)
  {
      commonModel::printOrderLink($doc, $orderBy, $vars, '<i class="icon icon-sort-indicator"></i>' . $lang->doc->{$doc});
  }
  ?>
</div>

<nav class='fab affix dock-bottom dock-right shadow-none dock-auto footer-actions'>
</nav>

<script>
$(function()
{
    var libID   = <?php echo $libID;?>;
    var project = <?php echo $lib->project;?> 
    if(project)
    {
        $('#appnav > a').removeClass('active');
        $("#appnav > a[href*='project']").addClass('active');
    }
    else
    {
        $('#appnav > a').removeClass('active');
        $("#appnav > a[href*='custom']").addClass('active');
    }

    if(typeof(libID) != undefined && $('#appnav').find("a[href*='" + libID + "']").length > 0)
    {
        $('#appnav > a').removeClass('active');
        if(config.requestType == 'GET')
        {   
            $("#appnav > a[href*='libID=" + libID + "']").addClass('active');
        }   
        else
        {   
            $("#appnav > a[href*='browse-" + libID + "-']").addClass('active');
        }   
    }
})
</script>
<?php include $app->getModuleRoot() . "common/view/m.footer.html.php"; ?>
