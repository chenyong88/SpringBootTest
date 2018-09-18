<?php
/**
 * The print files mobile view file of file module of RanZhi.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     file 
 * @version     $Id: buildform.html.php 7417 2013-12-23 07:51:50Z wwccss $
 * @link        http://www.ranzhico.com
 */


include "../../common/view/m.format.html.php";

$sessionString  = $config->requestType == 'PATH_INFO' ? '?' : '&';
$sessionString .= session_name() . '=' . session_id();
?>
<?php if($fieldset == 'true'):?>
<?php $filesUID = 'files-' . uniqid(); ?>
<div class='heading'>
  <div class='title'><i class='icon icon-file-text-o muted'></i> <strong><?php echo $lang->file->common;?></strong></div>
</div>
<div class='list files' id='#<?php echo $filesUID ?>'>
<?php endif;?>
  <?php foreach ($files as $file):?>
  <div class='item item-file with-avatar multi-lines' data-file-id='<?php echo $file->id ?>'>
    <?php if($file->isImage): ?>
    <div class='avatar avatar-no-fix outline' style='background-image: url("<?php echo $file->smallURL; ?>")'></div>
    <?php else: ?>
    <div class='avatar avatar-no-fix text-tint align-start justify-end' data-skin='@<?php echo $file->extension?>'><small>.<?php echo $file->extension?></small></div>
    <?php endif; ?>
    <div class='content'>
      <div class='title'>
        <span class='text-link'><?php echo $file->title ?></span>
      </div>
      <div class='small'>
        <?php if($file->downloads): ?>
        <span class='text-yellow'><i class='icon icon-download-alt'></i> <?php echo $file->downloads ?></span> &nbsp; 
        <?php endif; ?>
        <span class='muted'><?php echo formatBytes($file->size)?> &nbsp; 
        <?php echo $file->createdDate?></span>
      </div>
    </div>
    <a class='btn edit-file' data-stop-propagation='true' data-placement='bottom' data-display='modal' data-remote='<?php echo $this->createLink('file', 'edit', "fileID=$file->id") ?>'><i class='icon-pencil text-link'></i></a>
    <a class='btn delete-file text-danger' data-trigger='click' data-remote='<?php echo $this->createLink('file', 'delete', "fileID=$file->id") ?>' data-display='ajaxAction' data-ajax-delete='.item-file[data-file-id="<?php echo $file->id ?>"]'><i class='icon-trash'></i></a>
  </div>
  <?php endforeach;?>
<?php if($fieldset == 'true'):?>
</div>
<script>
$(function()
{
    var $files = $('#<?php echo $filesUID ?>');
    if($files.parent().hasClass('modal'))
    {
        $files.listenScroll({container: 'parent'}).prev('.heading').addClass('divider').find('.nav').append('<a data-dismiss="display"><i class="icon icon-remove muted"></i></a>');
    }
});
</script>
<?php endif;?>
<script>
$(function()
{
    var $document = $(document);
    if(!$document.data('bindDownloadFile'))
    {
        $document.on($.TapName, '.item-file[data-file-id] > .avatar, .item-file[data-file-id] > .content', function()
        {
            var url = '<?php echo $this->createLink('file', 'download', "fileID={0}&mouse=left"). $sessionString;?>';
            window.open($.format(url, $(this).parent().data('fileId')), '_blank');
        }).data('bindDownloadFile', true);
    }
});
</script>
