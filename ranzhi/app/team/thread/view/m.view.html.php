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

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}
$moduleMenu = false;
$bodyClass  = 'with-nav-bottom';
$browseLink = !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $this->createLink('forum', 'board', "boardID=$board->id"); 
include "../../common/view/m.header.html.php";
?>

<div id='page' class='list-with-actions'>
  <div class='section'>
    <div class='heading gray'>
      <div class='title'><i class='icon-calendar'> </i><?php echo $lang->detail;?></div>
      <nav class='nav'><a class='btn primary' href='<?php echo $browseLink;?>'><?php echo $lang->goback ?></a></nav>
    </div>
    <div class='box'>
      <table class='table bordered table-detail'>
        <tr>
          <td class='w-80px'><?php echo $lang->thread->title;?></td>
          <td><?php echo $thread->title;?></td>
        </tr>
        <tr>
          <td><?php echo $lang->thread->content;?></td>
          <td><?php echo $thread->content;?></td>
        </tr>
        <tr>
          <td><?php echo $lang->thread->author;?></td>
          <td><?php echo isset($speakers[$thread->author]) ? $this->thread->printSpeaker($speakers[$thread->author]) : $thread->author;?></td>
        </tr>
        <tr>
          <td><?php echo $lang->thread->postedDate;?></td>
          <td><?php echo $thread->createdDate;?></td>
        </tr>
        <?php if(!empty($thread->files)): ?>
        <tr>
          <td colspan='3'>
            <div class='list'>
              <?php echo $this->fetch('file', 'printFiles', array('files' => $thread->files, 'fieldset' => 'false'))?>
            </div>
          </td>
        </tr>
        <?php endif; ?>
      </table>

      <?php if(!empty($replies)):?>
      <div class='heading gray'>
        <div class='title'><?php echo $lang->thread->replies;?></div>
      </div>
      <table class='table bordered'>
        <?php foreach($replies as $id => $reply):?>
        <tr>
          <td class='w-80px'><?php echo $reply->authorRealname;?></td>
          <td><?php echo $reply->content;?></td>
          <td class='w-60px'><?php echo substr($reply->createdDate, 5, 5);?></td>
        </tr>
        <?php if(!empty($reply->files)): ?>
        <tr>
          <td colspan='3'>
            <div class='list'>
              <?php echo $this->fetch('file', 'printFiles', array('files' => $reply->files, 'fieldset' => 'false'))?>
            </div>
          </td>
        </tr>
        <?php endif;?>
        <?php endforeach;?>
      </table>
      <?php endif;?>
    </div>
  </div>

  <nav class='nav affix dock-bottom nav-auto footer-actions'>
  <?php
    $canSwitchStatus = commonModel::hasPriv('thread', 'switchStatus');
    $canEdit         = commonModel::hasPriv('thread', 'edit');
    $canDelete       = commonModel::hasPriv('thread', 'delete');

    if($this->thread->canManage($board->id) and commonModel::hasPriv('thread', 'stick'))
    {
        foreach($lang->thread->sticks as $stick => $label)
        {
            if($thread->stick != $stick)
            {
                echo "<a data-remote='{$this->createLink('team.thread', 'stick', "thread=$thread->id&stick=$stick")}' data-display='ajaxAction'>{$label}</a>";
            }
        }
    }

    if($canSwitchStatus)
    {
        $menu = $thread->hidden ? $lang->thread->show : $lang->thread->hide;
        echo "<a data-remote='{$this->createLink('team.thread', 'switchStatus', "threadID=$thread->id")}' data-display='ajaxAction'>{$menu}</a>";
    }

    if($this->thread->canManage($board->id, $thread->author) and $canEdit) echo "<a data-remote='{$this->createLink('team.thread', 'edit', "threadID={$thread->id}")}' data-display='modal' data-placement='bottom'>{$lang->edit}</a>";
    if($canDelete) echo "<a data-remote='{$this->createLink('team.thread', 'delete', "threadID=$thread->id")}' class='danger' data-display='ajaxAction' data-ajax-delete='true' data-locate='{$this->createLink('team.forum', 'board', "boardID=$board->id")}'>{$lang->delete}</a>";
    if(!$thread->readonly) echo html::a('#replyBox', $lang->reply->common, "data-display data-backdrop='true' class='primary'");
  ?>
  </nav>
</div>

<div id='replyBox' class='hidden affix enter-from-bottom layer'>
  <div class='heading'>
    <div class="title"><?php echo $lang->reply->common;?></div>
    <nav class='nav'><a data-dismiss='display' class='muted'><i class='icon-remove'></i></a></nav>
  </div>
  <form id='replyForm' class='modal-form has-padding' data-form-refresh='#replyList' method='post' action='<?php echo $this->createLink('reply','post', "thread={$thread->id}")?>'>
    <div class='control'><?php echo html::textarea('content', '',"rows='5' class='textarea' data-default-val");?></div>
    <div class='control'><?php echo $this->fetch('file', 'buildForm', 'fileCount=1');?></div>
    <div class='control'><button type='submit' class='btn primary'><?php echo $lang->save;?></button></div>
    <?php 
    echo html::hidden('recTotal',   $pager->recTotal);
    echo html::hidden('recPerPage', $pager->recPerPage);
    echo html::hidden('pageID',     $pager->pageTotal);
    ?>
  </form>
</div>
