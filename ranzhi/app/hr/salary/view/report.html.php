<?php
/**
 * The report view file of salary module of RanZhi.
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
<?php js::set('mode', 'report');?>
<div class='text-center'>
  <div class='dropdown pull-left'>
    <?php echo $lang->salary->report->selectYear . html::a('#', $year . ($this->app->clientLang != 'en' ? $lang->year : '') . "<span class='caret'></span>", "data-toggle='dropdown'");?>    
    <ul class='dropdown-menu pull-right'>
      <?php foreach($yearList as $currentYear):?>
      <li><?php echo html::a(inlink('report', "year={$currentYear}"), $currentYear . ($this->app->clientLang != 'en' ? $lang->year : ''));?></li>
      <?php endforeach;?>
    </ul>
  </div>
  <h3><?php echo $year . ($this->app->clientLang != 'en' ? $lang->year : '') . $lang->salary->report->common;?></h3>
</div>
<div class='panel'>
  <table id='reportTable' class='table table-condensed table-bordered table-striped table-hover'>
    <thead>
      <tr class='text-center'>
        <th><?php echo $lang->user->dept;?>
        <th><?php echo $lang->salary->account;?>
        <?php for($i = 1; $i <= 12; $i++):?>
        <th class='w-80px'><?php echo $i . ($this->app->clientLang != 'en' ? $lang->month : '');?></th>
        <?php ${"total$i"} = 0;?>
        <?php endfor;?>
        <th class='w-100px'><?php echo $lang->salary->total;?></th>
        <th class='w-80px'><?php echo $lang->salary->average;?></th>
      </tr>
    </thead>
    <?php $total = 0;?>
    <?php foreach($salaryList as $dept => $salarys):?>
    <?php $row = 1;?>
    <?php foreach($salarys as $account => $salary):?>
    <?php $rowTotal = 0;?>
    <tr>
      <?php if($row == 1):?>
      <th class='text-center text-middle' rowspan='<?php echo count($salarys);?>'><?php echo $dept;?></th>
      <?php endif;?>
      <th class='text-center'><?php echo zget($userList, $account);?></th>
      <?php $month = 0;?>
      <?php foreach(range(1, 12) as $i):?>
      <td class='text-right'>
        <?php
        if(isset($salary[$i]) && $salary[$i]['money'] != 0)
        {
            $month++;
            commonModel::printLink('salary', 'view', "id={$salary[$i]['id']}", formatMoney($salary[$i]['money']));
            $total       += $salary[$i]['money'];
            $rowTotal    += $salary[$i]['money'];
            ${"total$i"} += $salary[$i]['money'];
        }
        ?>
      </td>
      <?php endforeach;?>
      <td class='text-right'><?php echo formatMoney($rowTotal);?></td>
      <td class='text-right'><?php if($month > 0) echo formatMoney(round($rowTotal / $month, 2));?></td>
    </tr>
    <?php $row++;?>
    <?php endforeach;?>
    <?php endforeach;?>
  </table>
  <table class='table table-condensed table-bordered table-footer'>
    <tr>
      <th class='text-center'><?php echo $lang->salary->total;?></th>
      <th></th>
      <?php for($i = 1; $i <= 12; $i++):?>
      <td class='text-right'><?php echo formatMoney(${"total$i"});?></td>
      <?php endfor;?>
      <td class='text-right'><?php echo formatMoney($total);?></td>
      <td class='text-right'><?php echo formatMoney($total);?></td>
    </tr>
  </table>
</div>
<?php include '../../common/view/footer.html.php';?>
