<?php
/**
 * The edit weekly view file of effort module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     effort 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../sys/my/view/header.html.php';?>
<?php include '../../../sys/common/view/kindeditor.html.php';?>
<?php include '../../../sys/common/view/datepicker.html.php';?>
<?php js::set('id', $weekly->id);?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><?php echo $lang->effort->weekly->edit;?></strong>
  </div>
  <div class='panel-body'>
    <form id='ajaxForm' method='post'>
      <table class='table table-form'>
        <tr>
          <th class='w-80px'><?php echo $lang->effort->weekly->dateRange;?></th>
          <td class='w-p45'>
            <div class='input-group'>
              <?php echo html::input('begin', $weekly->begin, "class='form-control form-date'");?>
              <span class='input-group-addon fix-border'><?php echo $lang->minus;?></span>
              <?php echo html::input('end', $weekly->end, "class='form-control form-date'");?>
            </div>
          </td>
          <td></td>
        </tr>
        <tr>
          <th class='w-80px'><?php echo $lang->effort->weekly->title;?></th>
          <td colspan='2'><?php echo html::input('title', $weekly->title, "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->effort->weekly->summary;?></th>
          <td colspan='2'><?php echo html::textarea('summary', $weekly->summary, "class='form-control' rows='3'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->effort->weekly->content;?></th>
          <td colspan='2'><?php echo html::textarea('content', $weekly->content, "rows='10' class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->effort->weekly->status;?></th>
          <td colspan='2'><?php echo html::radio('status', $lang->effort->weekly->statusList, $weekly->status);?></td>
        </tr>
        <tr>
          <th></th>
          <td colspan='2'><?php echo html::submitButton();?></td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php include '../../../sys/common/view/footer.html.php';?>
