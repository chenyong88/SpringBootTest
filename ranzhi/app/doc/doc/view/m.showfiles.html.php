<?php
/**
 * The showfiles mobile view file of doc module of RanZhi.
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
<div id='page' class='section list-with-actions list-with-pager'>
  <div class='row imgs gutter-sm'>
    <?php foreach($files as $file):?>
    <?php if(in_array($file->extension, $config->file->imageExtensions)):?>
    <div class='cell-4'>
        <div class='tile text-center'>
          <a style='display:block; margin:3px 3px 0 3px;' data-display='modal' data-target-dismiss='true' data-placement='center' data-content="<img src='<?php echo $file->webPath;?>' alt='<?php echo $file->title;?>' class='no-margin'>"><img src="<?php echo $file->webPath;?>" alt="<?php echo $file->title;?>"></a>
          <div class='title'><?php echo html::a($this->createLink('proj.' . $file->objectType, 'view', "objectID=$file->objectID"), $file->title . '.' . $file->extension . ' [' . strtoupper($file->objectType) . ' #' . $file->objectID . ']');?></div>
      </div>
    </div>
    <?php endif;?>
    <?php endforeach;?>
  </div>

  <nav class='nav justify pager'>
    <?php $pager->show($align = 'justify');?>
  </nav>
</div>

<?php include "../../common/view/m.footer.html.php"; ?>
