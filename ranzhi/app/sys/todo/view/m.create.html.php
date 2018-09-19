<?php
/**
 * The create mobile view file of todo module of RanZhi.
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
  <span class='title'><i class='icon-plus'></i> <strong><?php echo $lang->todo->create ?></strong></span>
  <nav class='nav'>
    <a data-dismiss='display'><i class='icon-remove muted'></i></a>
  </nav>
</div>

<form class='has-padding content' method='post' action='<?php echo $this->createLink('todo', 'create')?>' id='createForm' data-form-refresh='#page'>
  <div class='row'>
    <div class='cell'>
      <div class="control">
        <label for='pri'><?php echo $lang->todo->pri;?></label>
        <div class='select'>
          <?php echo html::select('pri', $lang->todo->priList, '3');?>
        </div>
      </div>
    </div>
    <div class='cell'>
      <div class="control">
        <label for='type'><?php echo $lang->todo->type;?></label>
        <div class='select'>
          <?php echo html::select('type', $lang->todo->typeList);?>
        </div>
      </div>
    </div>
  </div>
  <div class="control">
    <label for='name'><?php echo $lang->todo->name;?></label>
    <?php echo html::input('name', '', "class='input' placeholder='{$lang->required}'");?>
  </div>
  <div class="control" style='display: none'>
    <label for='idvalue'></label>
    <div class='select'>
      <?php echo html::select('idvalue', '');?>
    </div>
  </div>
  <div class="control">
    <label for='desc'><?php echo $lang->todo->desc;?></label>
    <?php echo html::textarea('desc', '', "rows=4 class='textarea'");?>
  </div>
  <div class="control">
    <label for='status'><?php echo $lang->todo->status;?></label>
    <div class='select'>
      <?php echo html::select('status', $lang->todo->statusList, 'wait');?>
    </div>
  </div>
  <div class='control'>
    <div class='checkbox'>
      <input type='checkbox' id='switchDate' checked>
      <label for='switchDate' class='strong'> <?php echo $lang->todo->date;?></label>
    </div>
    <input type="date" value='<?php echo $date ?>' name='date' id='date' class='input'>
  </div>
  <div class='row' id='beginAndEnd'>
    <div class='cell'>
      <div class='control'>
        <label for='begin'><?php echo $lang->todo->begin;?></label>
        <div class='select'>
          <?php echo html::select('begin', $times, date('Y-m-d') != $date ? key($times) : $time);?>
        </div>
      </div>
    </div>
    <div class='cell'>
      <div class='control'>
        <label for='end'><?php echo $lang->todo->end;?></label>
        <div class='select'>
          <?php echo html::select('end', $times, '');?>
        </div>
      </div>
    </div>
  </div>
  <div class='control'>
    <div class='checkbox'>
      <input type='checkbox' id='switchTime'>
      <label for='switchTime'> <?php echo $lang->todo->lblDisableDate;?></label>
    </div>
  </div>
  <div class='control'>
    <div class='checkbox'>
      <input type='checkbox' id='private' name='private' value='1'>
      <label for='private'> <?php echo $lang->todo->private;?></label>
    </div>
  </div>
</form>

<div class='footer has-padding'>
  <button type='button' data-submit='#createForm' class='btn primary'><?php echo $lang->save ?></button>
</div>

<?php js::set('account', $this->app->user->account);?>
<?php js::set('typeList', $lang->todo->typeList);?>
<?php js::execute($pageJS);?>
