<?php
/**
 * The edit mobile view file of announce module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     announce 
 * @version     $Id
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>

<div class='heading divider'>
  <div class='title'><i class='icon-plus muted'></i> <strong><?php echo $lang->announce->edit;?></strong></div>
  <nav class='nav'><a data-dismiss='display'><i class='icon-remove muted'></i></a></nav>
</div>

<form class='content box' data-form-refresh='#page' method='post' id='editAnnounceForm' action='<?php echo $this->createLink('announce', 'edit', "announceID=$article->id");?>'>
  <div class='control'>
    <label for='categories'><?php echo $lang->article->category;?></label>
    <div class='select multiple'><?php echo html::select('categories[]', $categories, array_keys($article->categories), 'multiple')?></div>
  </div>
  <div class='control'>
    <label for='title'><?php echo $lang->article->title;?></label>
    <?php echo html::input('title', $article->title, "class='input' placeholder='{$lang->required}'");?>
  </div>
  <div class='control'>
    <label for='content'><?php echo $lang->article->content;?></label>
    <?php echo html::textarea('content', $article->content, "class='textarea' rows='5' placeholder='{$lang->required}'");?>
  </div>
</form>

<div class='footer has-padding'>
  <button type='button' data-submit='#editAnnounceForm' class='btn primary'><?php echo $lang->save;?></button>
</div>

<script>
$(function()
{
    $('#editAnnounceForm').modalForm().listenScroll({container:'parent'});
})
