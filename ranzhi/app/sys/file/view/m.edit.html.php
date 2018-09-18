<?php
/**
 * The edit mobile view file of file module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     file 
 * @version     $Id: index.html.php 3830 2016-05-18 09:34:17Z liugang $
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>

<div class='heading divider'>
  <?php if($file->isImage): ?>
  <div class='avatar avatar-no-fix outline' style='background-image: url("<?php echo $file->smallURL; ?>")'></div>
  <?php else: ?>
  <div class='avatar avatar-no-fix text-tint align-start justify-end' data-skin='@<?php echo $file->extension?>'><small>.<?php echo $file->extension?></small></div>
  <?php endif; ?>
  <div class='title'><strong><?php echo $lang->file->edit . ' ' . $file->title ?></strong></div>
  <nav class='nav'><a data-dismiss='display'><i class='icon-remove muted'></i></a></nav>
</div>

<form class='content box' data-form-refresh='#page' method='post' enctype='multipart/form-data' id='editFileForm' action='<?php echo $this->createLink('file', 'edit', "fileID=$file->id")?>'>
  <div class='control'>
    <label for='title'><?php echo $lang->file->title;?></label>
    <?php echo html::input('title', $file->title, "class='input'");?>
  </div>
  <div class='control'>
    <label for='upFile'><?php echo $lang->file->editFile;?></label>
    <div class='box gray'><?php echo html::file('upFile');?></div>
  </div>
</form>

<div class='footer has-padding'>
  <button type='button' data-submit='#editFileForm' class='btn primary'><?php echo $lang->save ?></button>
</div>

<script>
$(function()
{
    $('#editFileForm').modalForm().listenScroll({container: 'parent'});
});
</script>
