<?php
/**
 * The set ssf view file of salary module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     salary 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php if($mode == 'list') include '../../../sys/common/view/treeview.html.php';?>
<?php if($mode == 'create' or $mode == 'edit') include '../../../sys/common/view/chosen.html.php';?>
<?php js::set('mode', $mode);?>
<div id='menuActions'>
  <?php if($mode == 'list') commonModel::printLink('salary', 'setSSF', 'mode=create&dept=&account=default', "<i class='icon icon-plus'> </i>" . $lang->salary->setSSF, "class='btn btn-primary btn-sm'");?>
</div>
<div class='main'>
  <?php if($mode == 'default'):?>
  <?php include 'form.ssf.html.php';?>
  <?php else:?>
  <div class='col-xs-2'>
    <div class='panel'>
      <div class='panel-heading'><strong><i class="icon-building"></i> <?php echo $lang->dept->common;?></strong></div>
      <div class='panel-body'>
        <div id='treeMenuBox'><?php echo $treeMenu;?></div>
      </div>
    </div>
  </div>
  <div class='col-xs-10'>
  <?php if($mode == 'list') include 'list.ssf.html.php';?>
  <?php if($mode == 'create' or $mode == 'edit') include 'form.ssf.html.php';?>
  </div>
  <?php endif;?>
</div>
<?php include '../../common/view/footer.html.php';?>
