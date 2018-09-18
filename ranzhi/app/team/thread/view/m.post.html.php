<?php
/**
 * The post mobile view file of thread module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     thread 
 * @version     $Id
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>

<div class='heading divider'>
  <div class='title'><i class='icon-pencil muted'></i> <strong><?php echo $lang->thread->post ?></strong></div>
  <nav class='nav'><a data-dismiss='display'><i class='icon-remove muted'></i></a></nav>
</div>

<form class='content box' data-form-refresh='#page' method='post' id='postForm' action='<?php echo $this->createLink('thread', 'post', "boardID=$board->id")?>'>
  <div class='control'>
    <div class='checkbox pull-right'>
      <input type='checkbox' name='readonly' id='readonly' value='1'>
      <label for='readonly' class='text-link'><?php echo $lang->thread->readonly;?></label>
    </div>
    <label><?php echo $lang->thread->title;?></label>
    <?php echo html::input('title', '', "class='input' placeholder='{$lang->required}'");?>
  </div>
  <div class='control'>
    <label><?php echo $lang->thread->content;?></label>
    <?php echo html::textarea('content', '', "rows='5' class='textarea' placeholder='{$lang->required}'");?>
  </div>
  <div class='control'>
    <?php echo $this->fetch('file', 'buildForm', 'fileCount=1');?>
  </div>
</form>

<div class='footer has-padding'>
  <button type='button' data-submit='#postForm' class='btn primary'><?php echo $lang->save ?></button>
</div>

<script>
$(function()
{
    $('#postForm').modalForm().listenScroll({container: 'parent'});
})
</script>
