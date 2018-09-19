<?php
/**
 * The create weekly view file of effort module of RanZhi.
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
<div class='panel'>
  <div class='panel-heading'>
    <strong><?php echo $lang->effort->weekly->create;?></strong>
  </div>
  <div class='panel-body'>
    <div class='row'>
      <div class='col-md-9'>
        <form id='ajaxForm' method='post' action='<?php echo $this->createLink('effort', 'createWeekly');?>'>
          <table class='table table-form'>
            <tr>
              <th class='w-80px'><?php echo $lang->effort->weekly->dateRange;?></th>
              <td class='w-p45'>
                <div class='input-group'>
                  <?php echo html::input('begin', $begin, "class='form-control form-date'");?>
                  <span class='input-group-addon fix-border'><?php echo $lang->minus;?></span>
                  <?php echo html::input('end', $end, "class='form-control form-date'");?>
                </div>
              </td>
              <td></td>
            </tr>
            <tr>
              <th class='w-80px'><?php echo $lang->effort->weekly->title;?></th>
              <td colspan='2'><?php echo html::input('title', '', "class='form-control'");?></td>
            </tr>
            <tr>
              <th><?php echo $lang->effort->weekly->summary;?></th>
              <td colspan='2'><?php echo html::textarea('summary', '', "class='form-control' rows='3'");?></td>
            </tr>
            <tr>
              <th><?php echo $lang->effort->weekly->content;?></th>
              <td colspan='2'><?php echo html::textarea('content', '', "class='form-control' rows='15'");?></td>
            </tr>
            <tr>
              <th><?php echo $lang->effort->weekly->status;?></th>
              <td><?php echo html::radio('status', $lang->effort->weekly->statusList, 'normal');?></td>
              <td></td>
            </tr>
            <tr>
              <th></th>
              <td colspan='2'><?php echo html::submitButton();?></td>
            </tr>
          </table>
        </form>
      </div>
      <div class='col-md-3'>
        <div class='panel'>
          <div class='panel-heading'><?php echo $lang->effort->common;?></div>
          <div class='panel-body' style='height: 400px; overflow-y: scroll;'>
            <ol>
              <?php foreach($efforts as $effort):?>
              <li><?php echo $effort->work;?></li>
              <?php endforeach;?>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include '../../../sys/common/view/footer.html.php';?>
