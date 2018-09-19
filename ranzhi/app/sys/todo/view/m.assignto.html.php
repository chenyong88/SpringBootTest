<?php
/**
 * The assignto mobile view file of todo module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     todo 
 * @version     $Id: index.html.php 3830 2016-05-18 09:34:17Z liugang $
 * @link        http://www.ranzhico.com
 */
?>

<div class='heading divider'>
  <span class='title'><i class='icon-hand-right'></i> <strong><?php echo $lang->todo->assignTo ?></strong> #<?php echo $todo->id ?></span>
  <nav class='nav'>
    <a data-dismiss='display'><i class='icon-remove muted'></i></a>
  </nav>
</div>

<form class='has-padding content' method='post' action='<?php echo $this->createLink('todo', 'assignTo', "id=$todo->id")?>' id='assignForm' data-form-refresh='#page'>
  <div class="control">
    <label for='pri'><?php echo $lang->todo->assignedTo;?></label>
    <div class='select'>
      <?php echo html::select('assignedTo', $users, $todo->assignedTo);?>
    </div>
  </div>
  <div class='control'>
    <?php $disabledDate = $todo->date === '00000000';?>
    <div class='checkbox'>
      <input type='checkbox' id='switchDate'<?php if(!$disabledDate) echo " checked" ?>>
      <label for='switchDate' class='strong'> <?php echo $lang->todo->date;?></label>
    </div>
    <input type="date" value='<?php echo $todo->date ?>' name='date' id='date' class='input'<?php if($disabledDate) echo " disabled" ?>>
  </div>
  <?php $disabledTime = $todo->begin == 2400;?>
  <div class='row<?php if($disabledTime) echo " disabled" ?>' id='beginAndEnd'>
    <div class='cell'>
      <div class='control'>
        <label for='begin'><?php echo $lang->todo->begin;?></label>
        <div class='select'>
          <?php echo html::select('begin', $times, $todo->begin);?>
        </div>
      </div>
    </div>
    <div class='cell'>
      <div class='control'>
        <label for='end'><?php echo $lang->todo->end;?></label>
        <div class='select'>
          <?php echo html::select('end', $times, $todo->end);?>
        </div>
      </div>
    </div>
  </div>
  <div class='control'>
    <div class='checkbox'>
      <input type='checkbox' id='switchTime'<?php if($disabledTime) echo " checked" ?>>
      <label for='switchTime'> <?php echo $lang->todo->lblDisableDate;?></label>
    </div>
  </div>
</form>

<div class='footer has-padding'>
  <button type='button' data-submit='#assignForm' class='btn primary'><?php echo $lang->save ?></button>
</div>

<?php js::execute($pageJS);?>
