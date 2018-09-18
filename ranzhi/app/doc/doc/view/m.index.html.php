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

<section id='page' class='section list-with-actions list-with-pager'>
  <?php $refreshUrl = $this->createLink('doc', 'index');?>

  <div class='tiles' data-refresh-url='<?php echo $refreshUrl;?>'>
    <?php if(empty($projects) and empty($customLibs)):?>
    <a title='<?php echo $lang->doc->createLib;?>' data-display='modal' data-placement='bottom' data-remote='<?php echo $this->createLink('doc', 'createlib');?>' class='btn block shadow-2 has-margin-sm btn-lg primary'><i class='icon icon-plus'></i>&nbsp;&nbsp;<?php echo $lang->doc->createLib;?></a>
    <?php endif;?>

    <?php if(!empty($projects)):?>
    <?php $i = 1;?>
    <?php foreach($projects as $project):?>
    <div data-id='<?php echo $project->id;?>' class='section'>
      <div class='heading'>
        <strong class='title gray'><?php echo html::a(inlink('projectLibs', "projectID={$project->id}"), $project->name);?></strong>
        <?php if($i == 1):?>
        <nav class='nav'>
           <a data-display='modal' data-placement='bottom' data-remote='<?php echo $this->createLink('doc', 'createlib');?>' class='btn shadow-2 primary'><i class='icon icon-plus'></i> &nbsp;&nbsp;<?php echo $lang->doc->createLib;?></a>
        </nav>
        <?php endif;?>
      </div>
      <?php if(isset($subLibs[$project->id])):?>
      <div class='row'>     
        <?php foreach($subLibs[$project->id] as $libID => $libName):?>
        <?php
        $libLink = inlink('browse', "libID=$libID&moduleID=&projectID={$project->id}");
        if($libID == 'project') $libLink = inlink('allLibs', "type=project");
        if($libID == 'files')   $libLink = inlink('showFiles', "projectID=$project->id");
        ?>
        <div class='cell-6'>
          <a class='tile' data-id='<?php echo $libID;?>' href='<?php echo $libLink;?>'>
            <i class='icon icon-folder-open-alt'> </i><?php echo $libName;?>
          </a>
        </div>
        <?php endforeach;?>
        <?php endif;?>
      </div>
    </div>
    <?php $i++;?>
    <?php endforeach;?>
    <?php endif;?>

    <?php if(!empty($customLibs)):?>
    <div data-id='custom' class='section'>
      <div class='heading'>
        <strong class='title gray'><?php echo html::a(inlink('allLibs', "type=custom"), $lang->doc->customLibs);?></strong>
        <?php if(empty($projects)):?>
        <nav class='nav'>
           <a data-display='modal' data-placement='bottom' data-remote='<?php echo $this->createLink('doc', 'createlib');?>' class='btn shadow-2 primary'><i class='icon icon-plus'></i> &nbsp;&nbsp;<?php echo $lang->doc->createLib;?></a>
        </nav>
        <?php endif;?>
      </div>
      <div class='row'>
        <?php foreach($customLibs as $libID => $libName):?>
        <div class='cell-6'>
          <a data-id='<?php echo $libID;?>' class='tile' href='<?php echo inlink('browse', "libID=$libID")?>'>
            <i class='icon-folder-open-alt'> </i><?php echo $libName;?>
          </a>
        </div>
        <?php endforeach;?>
      </div>
    </div>
    <?php endif;?>
  </div>
</section>

<script>
  $('#appnav > a').removeClass('active').filter('[href="<?php echo $this->createLink('doc.doc', 'index');?>"]').addClass('active');
</script>
<?php include $app->getModuleRoot() . "common/view/m.footer.html.php"; ?>
