<?php
/**
 * The index mobile view file of index module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     index 
 * @version     $Id: index.html.php 3830 2016-05-18 09:34:17Z liugang $
 * @link        http://www.ranzhico.com
 */

include "../../common/view/m.header.html.php";
?>
<style>
#blocks > .section:last-child {margin-bottom: 40px;}
</style>
<div id='blocks' class='blocks'>
  <?php
  $index = 0;
  reset($blocks);
  ?>
  <?php foreach($blocks as $key => $block):?>
  <?php if($block->block == 'report') continue; ?>
  <?php $index = $key; ?>
  <div class='section' id='block<?php echo $block->id ?>' data-code='<?php echo $block->block ?>' data-id='<?php echo $index ?>' data-url='<?php echo $this->createLink('entry', 'printBlock', 'index=' . $index) ?>'>
    <?php if($block->block != 'attend' and $block->block != 'allEntries'): ?>
    <div class='heading'>
      <strong class='title <?php if(isset($block->params->color)) echo 'text-' . $block->params->color; else echo 'text-gray'?>'><?php echo $block->title ?></strong>
      <?php if(isset($block->moreLink)):?>
      <nav class='nav small hidden'>
        <?php echo html::a($block->moreLink, $lang->more . "&nbsp;<i class='icon-double-angle-right'></i>", "data-id='{$block->appid}'"); ?>
      </nav>
      <?php endif; ?>
    </div>
    <?php endif; ?>
    <div class='content listen-scroll<?php if($block->block == 'html') echo ' article has-padding'; ?>' data-display='self' data-remote='<?php echo $this->createLink('entry', 'printBlock', 'index=' . $index) ?>'>
    </div>
  </div>
  <?php endforeach; ?>
</div>
<?php include "../../common/view/m.footer.html.php"; ?>
