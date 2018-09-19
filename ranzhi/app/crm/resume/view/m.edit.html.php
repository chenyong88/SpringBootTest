<?php
/**
 * The edit mobile view file of resume module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     resume 
 * @version     $Id: index.html.php 3830 2016-05-18 09:34:17Z liugang $
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>

<div class='heading divider'>
  <div class='title'><i class='icon-pencil muted'></i> <strong><?php echo $lang->resume->edit ?></strong></div>
  <nav class='nav'><a data-dismiss='display'><i class='icon-remove muted'></i></a></nav>
</div>

  <div class='control nc-section'>
<form class='content box' data-display-from='resumesModal' method='post' id='editResumeForm' action='<?php echo inlink('edit', "resumeID=$resume->id")?>'>
  <div class='control nc-section'>
    <label for='customer'><?php echo $lang->resume->customer;?></label>
    <input type='text' value='<?php echo $customer->name ?>' disabled class='input'>
  </div>
  <div class='control'>
    <div class='checkbox'>
      <?php $checked = $resume->maker ? "checked='checked'" : '';?>
      <input type='checkbox' name='maker' id='maker' value='1' <?php echo $checked?>>
      <label for='maker'><?php echo $lang->resume->maker?></label>
    </div>
  </div>
  <div class='row'>
    <div class='cell-6'>
      <div class='control'>
        <label for='dept'><?php echo $lang->resume->dept;?></label>
        <?php echo html::input('dept', $resume->dept, "class='input'");?>
      </div>
    </div>
    <div class='cell-6'>
      <div class='control'>
        <label for='title'><?php echo $lang->resume->title;?></label>
        <?php echo html::input('title', $resume->title, "class='input'");?>
      </div>
    </div>
    <div class='cell-6'>
      <div class='control'>
        <label for='join'><?php echo $lang->resume->join;?></label>
        <input type='date' id='join' name='join' class='input' value='<?php echo $resume->join ?>'>
      </div>
    </div>
    <div class='cell-6'>
      <div class='control'>
        <label for='left'><?php echo $lang->resume->left;?></label>
        <input type='date' id='left' name='left' class='input' value='<?php echo $resume->left ?>'>
      </div>
    </div>
  </div>
</form>

<div class='footer has-padding'>
  <button type='button' data-submit='#editResumeForm' class='btn primary'><?php echo $lang->save ?></button>
</div>

<script>
$(function()
{
    $('#editResumeForm').modalForm().listenScroll({container: 'parent'});
});
</script>
