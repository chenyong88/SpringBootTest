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
<?php
$moduleMenu = false;
$bodyClass  = 'with-nav-bottom';
$browseLink = !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : inlink('browse', "libID=$doc->lib"); 

$typeIcons = array();
$typeIcons['url']  = array('icon' => 'icon-link', 'color' => 'red');
$typeIcons['text'] = array('icon' => 'icon-file-text', 'color' => 'green');
?>

<div id='page' class='list-with-actions'>
  <div class='heading'>
    <div class='title'><i class='icon-calendar'> </i><?php echo $lang->doc->view;?></div>
    <nav class='nav'><a class='btn primary' href='<?php echo $browseLink;?>'><?php echo $lang->goback ?></a></nav>
  </div>
  <div class='box'>
    <table class='table bordered table-detail'>
      <tr>
        <td class='w-100px'><?php echo $lang->doc->title;?></td>
        <td><?php echo $doc->title;?></td>
      <tr>
      <?php if(!empty($doc->digest)):?>
      <tr>
        <td><?php echo $lang->doc->digest;?></td>
        <td><?php echo $doc->digest;?></td>
      <tr>
      <?php endif;?>
      <?php if($doc->type == 'url'):?>
      <tr>
        <td><?php echo $lang->doc->url;?></td>
        <td><?php echo html::a(urldecode($doc->content), '', "target='_blank'");?></td>
      </tr>
      <?php endif;?>
      <?php if($doc->type == 'text'):?>
      <tr>
        <td><?php echo $lang->doc->content;?></td>
        <td><?php echo $doc->content;?></td>
      </tr>
      <?php endif;?>
      <?php if($doc->project):?>
      <tr>
        <td><?php echo $lang->doc->project;?></td>
        <td><?php echo zget($projects, $doc->project);?></td>
      </tr>
      <?php endif;?>
      <tr>
        <td><?php echo $lang->doc->lib;?></td>
        <td><?php echo $lib;?></td>
      </tr>
      <tr>
        <td><?php echo $lang->doc->category;?></td>
        <td><?php echo $doc->moduleName ? $doc->moduleName : '/';?></td>
      </tr>
      <tr>
        <td><?php echo $lang->doc->type;?></td>
        <td><?php echo $lang->doc->types[$doc->type];?></td>
      </tr>
      <?php if($doc->keywords):?>
      <tr>
        <td><?php echo $lang->doc->keywords;?></td>
        <td><?php echo $doc->keywords;?></td>
      </tr>
      <?php endif;?>
      <tr>
        <td><?php echo $lang->doc->createdBy;?></td>
        <td><?php echo $users[$doc->createdBy] . $lang->at . $doc->createdDate;?></td>
      </tr>
      <?php if($doc->editedBy):?>
      <tr>
        <td><?php echo $lang->doc->editedBy;?></td>
        <td><?php echo $users[$doc->editedBy] . $lang->at . $doc->editedDate;?></td>
      </tr>
      <?php endif;?>
    </table>

    <?php if(!empty($doc->files)):?>
    <div class='heading gray'>
      <div class='title'><i class='icon icon-file-text-o'> </i><?php echo $lang->file->common;?></div>
    </div>
    <div class='list'>
      <?php echo $this->fetch('file', 'printFiles', array('files' => $doc->files, 'fieldset' => 'false'))?>
    </div>
    <?php endif;?>
  </div>

  <div class='section' id='history'>
    <?php echo $this->fetch('action', 'history', "objectType=doc&objectID={$doc->id}");?>
  </div>

  <nav class='nav nav-auto affix dock-bottom footer-actions'>
    <?php
    $canEdit   = commonModel::hasPriv('doc', 'edit');
    $canDelete = commonModel::hasPriv('doc', 'delete');

    if($canEdit) echo "<a data-remote='{$this->createLink('doc', 'edit', "id=$doc->id")}' data-display='modal' data-placement='bottom'>{$lang->edit}</a>";
    if($canDelete) echo "<a data-remote='{$this->createLink('doc', 'delete', "id=$doc->id")}' class='text-danger' data-display='ajaxAction' data-ajax-delete='true' data-locate='{$this->createLink('doc', 'browse', "libID=$doc->lib")}'>{$lang->delete}</a>";
    ?>
  </nav>
</div>
<script>
$(function()
{
    $('#menu > a').removeClass('active');
    $("#menu > a[href*='" + <?php echo $doc->lib;?> + "']").addClass('active');
})
</script>
<?php include "../../common/view/m.footer.html.php"; ?>
