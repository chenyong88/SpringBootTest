<?php
/**
 * The index mobile view file of doc module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     doc 
 * @version     $Id
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}
include "../../common/view/m.header.html.php";
?>
<style>
.tiles .tile {padding: .5rem .5rem .25rem 1rem; overflow: hidden;}
</style>

<section id='page' class='section tiles'>
  <?php $refreshUrl = $this->createLink('doc', 'projectlibs', "projectID=$project->id");?>
  <div class='row' data-refresh-url='<?php echo $refreshUrl;?>'>
    <?php foreach($libs as $libID => $libName):?>
    <?php
    $libLink = inlink('browse', "libID=$libID&moduleID=&projectID={$project->id}");
    if($libID == 'project') $libLink = inlink('allLibs', "type=project");
    if($libID == 'files')   $libLink = inlink('showFiles', "projectID=$project->id");
    ?>
    <div class='cell-6'>
      <a data-id='<?php echo $libID == 'files' ? 9999 : $libID;?>' class='tile' href='<?php echo $libLink;?>'>
        <i class='icon icon-folder-open-alt'> </i><?php echo $libName;?>
      </a>
    </div>
    <?php endforeach;?>
  </div>
</section>

<?php if(commonModel::hasPriv('doc', 'createLib')):?>
<nav class='fab affix dock-bottom dock-right shadow-none dock-auto footer-actions'>
  <a title='<?php echo $lang->doc->createLib;?>' data-display='modal' data-placement='bottom' data-remote='<?php echo $this->createLink('doc', 'createLib', "type=project&projectID={$project->id}");?>' class='btn circle shadow-2 has-margin-sm btn-lg skin-<?php echo $entrySkin;?>'><i class='icon icon-plus'></i></a>
</nav>
<?php endif;?>

<script>
$('#appnav > a').removeClass('active').filter('[href*=project]').addClass('active');
</script>

<?php include $app->getModuleRoot() . "common/view/m.footer.html.php"; ?>
