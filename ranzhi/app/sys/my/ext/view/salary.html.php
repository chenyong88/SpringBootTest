<?php
/**
 * The browse view file of my module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     my 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php $viewable = $this->session->viewlimit > time();?>
<?php if(!empty($this->config->salary->password->{$this->app->user->account}) and !$viewable):?>
<?php include './checkpassword.html.php';?>
<?php js::set('viewable', $viewable);?>
<?php else:?>
<?php include $app->getModuleRoot() . 'my/view/header.html.php';?>
<?php include '../../../../sys/common/view/treeview.html.php';?>
<?php js::set('type', $type);?>
<?php js::set('viewable', $viewable);?>
<?php if(commonModel::hasPriv('my', 'deptSalary')):?>
<li class='dept'>
  <?php echo html::a(inlink('salary', 'type=dept'), $lang->my->salary->deptSalary);?>
</li>
<?php endif;?>
<li class='password'><?php echo html::a(inlink('setPassword'), $lang->my->salary->setPassword, "data-toggle='modal'");?></li>
<div class='with-side'>
  <div class='side'>
    <div class='panel panel-sm'>
      <div class='panel-body'>
        <ul class='tree' data-collapsed='true'>
          <?php foreach($yearList as $year):?>
          <li class='<?php echo $year == $currentYear ? 'active' : ''?>'>
            <?php commonModel::printLink('my', 'salary', "type=$type&month=$year", $year);?>
            <?php if($type != 'personal'):?>
            <ul>
              <?php foreach(array_reverse($monthList[$year]) as $month):?>
              <li class='<?php echo ($year == $currentYear and $month == $currentMonth) ? 'active' : ''?>'>
                <?php commonModel::printLink('my', 'salary', "type=$type&month=$year$month", $year . $month);?>
              </li>
              <?php endforeach;?>
            </ul>
            <?php endif;?>
          </li>
          <?php endforeach;?>
        </ul>
      </div>
    </div>
  </div>
  <div class='main'>
    <div class='panel'>
      <form id='ajaxForm' method='post'>
        <table class='table table-data table-hover text-center table-fixed tablesorter'>
          <thead>
            <tr class='text-center'>
              <?php $vars = $type == 'personal' ? "&month={$currentYear}&orderBy=%s" : "&month=$currentYear$currentMonth&orderBy=%s";?>
              <th class='w-60px'><?php commonModel::printOrderLink('id', $orderBy, $vars, $lang->salary->id);?></th>
              <?php if($type == 'personal'):?>
              <th class='w-80px'><?php commonModel::printOrderLink('month', $orderBy, $vars, $lang->salary->month);?></th>
              <?php endif;?>
              <th class='w-80px'><?php echo $lang->user->realname;?></th>
              <th class='w-60px'><?php echo $lang->user->dept;?></th>
              <th class='w-80px'><?php echo $lang->salary->basic;?></th>
              <th class='w-80px'><?php echo $lang->salary->benefit;?></th>
              <th class='w-80px'><?php echo $lang->salary->bonus;?></th>
              <th class='w-60px'><?php echo $lang->salary->allowance;?></th>
              <th class='w-60px'><?php echo $lang->salary->deduction;?></th>
              <th class='w-80px'><?php echo $lang->salary->deserved;?></th>
              <th class='w-80px'><?php echo $lang->salary->actual;?></th>
              <th class='w-80px'><?php echo $lang->salary->companyPay;?></th>
              <th><?php echo $lang->salary->desc;?></th>
              <th class='w-60px'><?php echo $lang->salary->status;?></th>
              <th class='w-150px'><?php echo $lang->actions;?></th>
            </tr>
          </thead>
          <?php foreach($salaryList as $salary):?>
          <tr>
            <td>
              <?php if($type == 'company'):?>
              <label class='checkbox-inline'><input type='checkbox' name='salaryIDList[]' value='<?php echo $salary->id;?>'/> <?php echo $salary->id;?></label>
              <?php else:?>
              <?php echo $salary->id;?>
              <?php endif;?>
            </td>
            <?php if($type == 'personal'):?>
            <td class='w-80px'><?php echo (int)substr($salary->month, 4, 2);?></td>
            <?php endif;?>
            <td><?php echo zget($users, $salary->account);?></td>
            <td><?php echo zget($deptList, $salary->dept, ' ');?></td>
            <td><?php echo $salary->basic;?></td>
            <td><?php echo $salary->benefit;?></td>
            <td><?php echo $salary->bonus;?></td>
            <td><?php echo $salary->allowance;?></td>
            <td><?php echo $salary->deduction;?></td>
            <td><?php echo $salary->deserved;?></td>
            <td><?php echo $salary->actual;?></td>
            <td><?php echo $salary->companySSF + $salary->companyHPF;?></td>
            <td title='<?php echo $salary->desc;?>'><?php echo $salary->desc;?></td>
            <td class='salary-<?php echo $salary->status;?>'><?php echo zget($this->lang->salary->statusList, $salary->status);?></td>
            <td><?php echo html::a(inlink('viewSalary', "id={$salary->id}&type={$type}"), $lang->view);?></td>
          </tr>
          <?php endforeach;?>
        </table>
        <div class='table-footer'>
          <div class='pull-left'>
            <?php if($salaryList):?>
            <strong><span class='text-danger'><?php $this->salary->countMoney($salaryList);?></span></strong>
            <?php endif;?>
          </div>
          <?php $pager->show();?>
        </div>
      </form>
    </div>
  </div>
</div>
<?php include $app->getModuleRoot() . 'common/view/footer.html.php';?>
<?php endif;?>
