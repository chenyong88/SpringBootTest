<?php
/**
 * The report view file of commission module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     commission 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?>
<?php include '../../../sys/common/view/treeview.html.php';?>
<?php include '../../../sys/common/view/datepicker.html.php';?>
<div id='menuActions'>
  <?php if($mode == 'matrix'):?>
  <div id='matrixShowTypeDIV' class='pull-left'>
  <?php echo html::radio('matrixShowType', $lang->commission->matrixShowType, 'amount');?>
  </div>
  <?php endif;?>
  <ul class='nav pull-left'>
    <li id='viewBar' class='dropdown'><a href='javascript:;' id='groupButton' data-toggle='dropdown' class='dropdown-toggle'><i class='icon-table'></i> <?php echo $lang->commission->$mode;?><i class='icon-caret-down'></i></a>
      <ul class='dropdown-menu'>
        <li class="<?php echo $mode == 'default' ? 'active' : '';?>"><?php echo html::a(inlink('report', "month=$currentYear$currentMonth&mode=default"), "<i class='icon icon-table'></i> " . $lang->commission->default);?></li>
        <li class="<?php echo $mode == 'matrix'  ? 'active' : '';?>"><?php echo html::a(inlink('report', "month=$currentYear$currentMonth&mode=matrix"),  "<i class='icon icon-cube'></i> "  . $lang->commission->matrix);?></li>
      </ul>
    </li>
  </ul>
  <?php commonModel::printLink('commission', 'export', "month=$currentYear$currentMonth", "<i class='icon-upload-alt'> </i>" . $lang->export, "class='btn btn-primary iframe'");?>
</div>
<div class='with-side'>
  <div class='side'>
  <a class='side-handle'><i class='icon-caret-left'></i></a>
    <div class='panel side-body'>
      <div class='panel-heading'><strong><?php echo $currentYear . $lang->year . $lang->commission->report;?></strong></div>
      <div class='panel-body'>
      <?php 
        for($month = 1; $month <= date('m'); $month++)
        {
            $class = $currentYear == date('Y') && $month == $currentMonth ? 'btn-primary' : '';
            $month = $month < 10 ? '0' . $month : $month;
            echo "<div class='col-xs-3 monthDIV'>" . html::a(inlink('report', "month=$currentYear$month&mode=$mode"), $month . $lang->month, "class='btn btn-mini $class'") . '</div>';
        }
      ?>
      </div>
    </div>
    <div class='panel side-body'>
      <div class='panel-heading'><strong><?php echo $lang->commission->report;?></strong></div>
      <div class='panel-body'>
        <form id='searchForm' method='post' action='<?php echo inlink('report');?>'>
          <div class='form-group'>
            <div class='input-group'>
              <span class='input-group-addon'><?php echo $lang->commission->dept;?></span>
              <?php echo html::select('dept', $deptList, $dept, "class='form-control chosen'");?>
            </div>
          </div>
          <div class='form-group'>
            <div class='input-group'>
              <span class='input-group-addon'><?php echo $lang->commission->user;?></span>
              <?php echo html::select('account', $userList, $account, "class='form-control chosen'");?>
            </div>
          </div>
          <div class='form-group'>
            <div class='input-group'>
              <span class='input-group-addon'><?php echo $lang->commission->month;?></span>
              <?php echo html::input('month', date('Y-m-d', strtotime($currentYear . $currentMonth . '01')), "class='form-control form-month'");?>
            </div>
          </div>
          <div class='form-group'><?php echo html::hidden('mode', $mode) . html::submitButton($lang->commission->search);?></div>
        </form>
      </div>
    </div>
  </div>
  <div class='main'>
    <?php if($mode == 'default'):?>
    <?php include './default.html.php';?>
    <?php elseif($mode == 'matrix'):?>
    <?php include './matrix.html.php';?>
    <?php endif;?>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
