<?php
/**
 * The activate mobile view file of feedback module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     feedback 
 * @version     $Id
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}
?>

<div class='heading divider'>
  <div class='title'><strong><?php echo $lang->feedback->activate;?></strong></div>
  <nav class='nav'><a data-dismiss='display'><i class='icon icon-remove muted'></i></a></nav>
</div>

<form class='content box' id='activateForm' data-form-refresh='#page' method='post' action='<?php echo $this->createLink('feedback', 'activate', "issueID=$issueID");?>'>
  <div class='control'>
    <label for='assignedTo'><?php echo $lang->feedback->assignedTo;?></label>
    <div class='select'><?php echo html::select('assignedTo', $users);?></div>
  </div>
  <div class='control'>
    <label for='comment'><?php echo $lang->comment;?></label>
    <?php echo html::textarea('comment', '', "rows='5' class='textarea'");?>
  </div>
</form>

<div class='footer has-padding'>
  <button class='btn primary' type='button' data-submit='#activateForm'><?php echo $lang->save;?></button>
</div>

<script>
$(function()
{
    $('#activateForm').modalForm().listenScroll({container: 'parent'});
});
</script>
