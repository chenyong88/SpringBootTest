<?php
/**
 * The alllibs mobile view file of doc module of RanZhi.
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

<section id='page' class='section list-with-actions list-with-pager'>
  <?php $refreshUrl = $this->createLink('doc', 'alllibs', "type=$type");?>
  <div class='tiles' data-refresh-url='<?php echo $refreshUrl;?>'>
    <?php if($type == 'project'):?>
    <?php if(empty($libs)):?>
    <a title='<?php echo $lang->doc->createLib;?>' data-display='modal' data-placement='bottom' data-remote='<?php echo $this->createLink('doc', 'createlib');?>' class='btn block shadow-2 btn-lg primary'><i class='icon icon-plus'></i>&nbsp;&nbsp;<?php echo $lang->doc->createLib;?></a>
    <?php endif;?>

    <?php $i = 1;?>
    <?php foreach($libs as $lib):?>
    <div data-id='<?php echo $lib->id;?>' class='section'>
      <div class='heading'>
        <strong class='title gray'><?php echo html::a(inlink('projectLibs', "projectID={$lib->id}"), $lib->name);?></strong>
        <?php if($i == 1):?>
        <nav class='nav'>
           <a data-display='modal' data-placement='bottom' data-remote='<?php echo $this->createLink('doc', 'createlib');?>' class='btn shadow-2 primary'><i class='icon icon-plus'></i> &nbsp;&nbsp;<?php echo $lang->doc->createLib;?></a>
        </nav>
        <?php endif;?>
      </div>
      <div class='heading'>
      <?php if(isset($subLibs[$lib->id])):?>
      <div class='row'>
        <?php foreach($subLibs[$lib->id] as $libID => $libName):?>
        <?php $libLink = ($libID == 'files') ? inlink('showFiles', "projectID=$lib->id") : inlink('browse', "libID=$libID&moduleID=&projectID=$lib->id");?>
        <div class='cell-6'>
          <a data-id='<?php echo $libID == 'files' ? 9999 : $libID;?>' class='tile' href='<?php echo $libLink;?>'>
            <i class='icon icon-folder-open-alt'> </i><?php echo $libName;?>
          </a>
        </div>
        <?php endforeach;?>
      </div>
      <?php endif;?>
    </div>
    <?php $i++;?>
    <?php endforeach;?>
    <?php else:?>
    <a title='<?php echo $lang->doc->createLib;?>' data-display='modal' data-placement='bottom' data-remote='<?php echo $this->createLink('doc', 'createlib');?>' class='btn block shadow-2 btn-lg primary'><i class='icon icon-plus'></i>&nbsp;&nbsp;<?php echo $lang->doc->createLib;?></a>
    <div class='row'>
      <?php foreach($libs as $lib):?>
      <div class='cell-6'> 
        <a data-id='<?php echo $lib->id;?>' class='tile' href='<?php echo inlink('browse', "libID=$lib->id")?>'>
          <i class='icon-folder-open-alt'> </i><?php echo $lib->name;?>
        </a>
      </div>
      <?php endforeach;?>
    </div>
    <?php endif;?>
  </div>
</section>

<script>
$('#appnav > a').removeClass('active').filter('[href*="<?php echo $type;?>"]').addClass('active');
</script>

<?php include $app->getModuleRoot() . "common/view/m.footer.html.php"; ?>
