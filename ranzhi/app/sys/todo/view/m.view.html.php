<?php
/**
 * The browse mobile view file of todo module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     todo 
 * @version     $Id: index.html.php 3830 2016-05-18 09:34:17Z liugang $
 * @link        http://www.ranzhico.com
 */

$moduleMenu = false;
$bodyClass  = 'with-nav-bottom';
$browseLink = !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : inlink('browse', 'mode=all');
include "../../common/view/m.header.html.php";
?>

<div id='page' class='list-with-actions'>
  <div class='heading'>
    <div class='title'><i class='icon-calendar'> </i><?php echo $lang->todo->view;?></div>
    <nav class='nav'>
      <a href='<?php echo $browseLink;?>' class='btn primary'><?php echo $lang->goback;?></a>
    </nav>
  </div>
  <div class='section no-margin'> 
    <div class='box'>
      <table class='table bordered table-detail'>
        <tr>
          <td class='w-80px'><?php echo $lang->todo->name;?></td>
          <td><?php echo $todo->name;?></td>
        </tr>
        <tr>
          <td><?php echo $lang->todo->pri;?></td>
          <td><span class='label pri-<?php echo $todo->pri;?>'><?php echo zget($lang->todo->priList, $todo->pri);?></span></td>
        </tr>
        <?php if($todo->private): ?>
        <tr>
        <td></td>
        <td><?php echo $lang->todo->private ?></td>
        </tr>
        <?php endif; ?>
        <?php if($todo->desc):?>
        <tr>
          <td><?php echo $lang->todo->desc;?></td>
          <td><?php echo $todo->desc;?></td>
        </tr>
        <?php endif;?>
        <tr>
          <td><?php echo $lang->todo->type;?></td>
          <td><?php echo zget($lang->todo->typeList, $todo->type);?></td>
        </tr>
        <tr>
          <td><?php echo $lang->todo->status;?></td>
          <td><span class='label status-<?php echo $todo->status;?>'><?php echo zget($lang->todo->statusList, $todo->status);?></span></td>
        </tr>
        <tr>
          <td><?php echo $lang->todo->date;?></td>
          <td><?php echo $todo->date == '00000000' ? $lang->todo->periods['future'] : date(DT_DATE1, strtotime($todo->date));?></td>
        </tr>
        <?php if(isset($times[$todo->begin]) or isset($times[$todo->end])):?>
        <tr>
          <td><?php echo $lang->todo->beginAndEnd;?></td>
          <td><?php echo $times[$todo->begin] . ' ~ ' . $times[$todo->end];?></td>
        </tr>
        <?php endif;?>
        <tr>
          <td><?php echo $lang->todo->account;?></td>
          <td><?php echo zget($users, $todo->account);?></td>
        </tr>
        <?php if($todo->assignedBy):?>
        <tr>
          <td><?php echo $lang->todo->assignedBy;?></td>
          <td><?php echo zget($users, $todo->assignedBy);?></td>
        </tr>
        <?php endif;?>
        <?php if($todo->assignedTo):?>
        <tr>
          <td><?php echo $lang->todo->assignedTo;?></td>
          <td><?php echo zget($users, $todo->assignedTo) . $lang->at . $todo->assignedDate;?></td>
        </tr>
        <?php endif;?>
        <?php if($todo->finishedBy):?>
        <tr>
          <td><?php echo $lang->todo->finishedBy;?></td>
          <td><?php echo zget($users, $todo->finishedBy) . $lang->at . $todo->finishedDate;?></td>
        </tr>
        <?php endif;?>
        <?php if($todo->closedBy):?>
        <tr>
          <td><?php echo $lang->todo->closedBy;?></td>
          <td><?php echo zget($users, $todo->closedBy) . $lang->at . $todo->closedDate;?></td>
        </tr>
        <?php endif;?>
      </table>
    </div>
  </div>

  <div class='section' id='history'>
    <?php echo $this->fetch('action', 'history', "objectType=todo&objectID={$todo->id}");?>
  </div>

  <nav class='nav nav-auto affix dock-bottom footer-actions'>
  <?php
  if($this->todo->checkPriv($todo, 'finish') and $this->todo->isClickable($todo, 'finish')) echo "<a data-remote='{$this->createLink('todo', 'finish', "id=$todo->id")}' class='success strong' data-display='ajaxAction' data-refresh='#page'>{$lang->finish}</a>";

  if($this->todo->checkPriv($todo, 'assignTo')) echo "<a data-remote='{$this->createLink('todo', 'assignTo', "id=$todo->id")}' data-display='modal' data-placement='bottom'>{$lang->todo->assignTo}</a>";

  if($this->todo->checkPriv($todo, 'edit')) echo "<a data-remote='{$this->createLink('todo', 'edit', "id=$todo->id")}' data-display='modal' data-placement='bottom'>{$lang->edit}</a>";

  if($this->todo->checkPriv($todo, 'activate') and $this->todo->isClickable($todo, 'activate')) echo "<a data-remote='{$this->createLink('todo', 'activate', "id=$todo->id")}' data-display='ajaxAction' data-refresh='#page'>{$lang->activate}</a>";

  if($this->todo->checkPriv($todo, 'close') and $this->todo->isClickable($todo, 'close')) echo "<a data-remote='{$this->createLink('todo', 'close', "id=$todo->id")}' data-display='ajaxAction' data-refresh='#page'>{$lang->close}</a>";

  if($this->todo->checkPriv($todo, 'delete')) echo "<a data-remote='{$this->createLink('todo', 'delete', "id=$todo->id")}' class='danger' data-display='ajaxAction' data-ajax-delete='true' data-locate='{$this->createLink('todo', 'browse')}'>{$lang->delete}</a>";

  if($this->todo->checkPriv($todo, 'edit')) echo html::a('#commentBox', $this->lang->comment, "data-display data-backdrop='true'");
  ?>
  </nav>
</div>

<div id='commentBox' class='enter-from-bottom hidden affix layer'>
  <div class='heading'>
    <div class="title"><?php echo $lang->comment;?></div>
    <nav class='nav'><a data-dismiss='display' class='muted'><i class='icon-remove'></i></a></nav>
  </div>
  <form id='commentForm' class='modal-form has-padding' data-form-refresh='#history' method='post' action='<?php echo inlink('edit', "todoID=$todo->id&comment=true")?>'>
    <div class='control'><?php echo html::textarea('comment', '',"rows='5' class='textarea' data-default-val");?></div>
    <div class='control'><button type='submit' class='btn primary'><?php echo $lang->save ?></button></div>
  </form>
</div>
<?php include "../../common/view/m.footer.html.php"; ?>
