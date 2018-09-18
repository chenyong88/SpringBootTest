<?php
/**
 * The company file of my module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     my
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include $app->getModuleRoot() . 'my/view/header.html.php';?>
<?php include '../../../../sys/common/view/chosen.html.php';?>
<?php include '../../../../sys/common/view/datepicker.html.php';?>
<?php js::set('type', $type)?>
<div class='with-side'>
  <div class='panel side'>
    <div class='panel-heading'><?php echo $lang->my->company->$type;?></div>
    <div class='panel-body'>
      <div class='form-group'>
        <div class='input-group'>
          <span class='input-group-addon'><?php echo $lang->my->company->dept?></span>
          <?php echo html::select('dept', $deptList, $dept, "class='form-control chosen'")?>
        </div>
      </div>
      <div class='form-group'>
        <div class='input-group'>
          <span class='input-group-addon'><?php echo $lang->my->company->account?></span>
          <?php echo html::select('account', $users, $account, "class='form-control chosen'")?>
        </div>
      </div>
      <div class='form-group'>
        <div class='input-group'>
          <span class='input-group-addon'><?php echo $lang->my->company->begin?></span>
          <?php echo html::input('begin', $begin, "class='form-control form-date'")?>
        </div>
      </div>
      <div class='form-group'>
        <div class='input-group'>
          <span class='input-group-addon'><?php echo $lang->my->company->end?></span>
          <?php echo html::input('end', $end, "class='form-control form-date'")?>
        </div>
      </div>
      <div class='form-group'>
          <?php echo html::a('javascript:void(0)', $lang->my->company->view, "class='btn btn-primary submit'")?>
      </div>
    </div>
  </div>
  <div class='main'>
    <?php if($type == 'todo')   include './companytodo.html.php';?>
    <?php if($type == 'effort') include './companyeffort.html.php';?>
    <?php if($type == 'weekly') include './companyweekly.html.php';?>
  </div>
</div>
<?php include $app->getModuleRoot() . 'common/view/footer.html.php';?>
