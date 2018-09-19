<?php
/**
 * The report view file of invoice module of RanZhi.
 *
 * @copyright   Copyright 2009-2017 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     invoice 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php include '../../../sys/common/view/chart.html.php';?>
<?php js::set('status', array_keys($lang->invoice->statusList));?>
<?php js::set('colors', $config->invoice->colorList);?>
<?php js::set('company', $company);?>
<?php js::set('month', $month);?>
<?php if($month) js::set('companies', $companies);?>
<div class='panel panel-sm'>
  <div class='panel-heading'>
    <div class='date dropdown'>
      <?php $monthTip = $month ? (int)$month . $lang->month : '';?>
      <button type='button' class='btn btn-sm btn-default dropdown-toggle' data-toggle='dropdown'><?php echo $year . $lang->year . $monthTip;?> <span class="caret"></span></button>
      <ul class='dropdown-menu'>
        <?php foreach($monthList as $currentYear => $months):?>
        <li class='dropdown-submenu'>
          <?php echo html::a(inlink('report', "company=$company&month=$currentYear&unit=$unit"), $year);?>
          <ul class='dropdown-menu'>
            <?php foreach($months as $currentMonth):?>
            <li><?php echo html::a(inlink('report', "company=$company&month=$currentYear$currentMonth&unit=$unit"), $currentMonth . $lang->month);?></li>
            <?php endforeach;?>
          </ul>
        </li>
        <?php endforeach;?>
      </ul>
    </div>
    <div class='company dropdown'>
      <button type='button' class='btn btn-sm btn-default dropdown-toggle' data-toggle='dropdown'><?php echo zget($companies, $company, $lang->invoice->company);?> <span class="caret"></span></button>
      <ul class='dropdown-menu'>
        <?php foreach($companies as $companyID => $currentCompany):?>
        <li><?php echo html::a(inlink('report', "company=$companyID&month=$year$month&unit=$unit"), $currentCompany);?></li>
        <?php endforeach;?>
      </ul>
    </div>
    <div class='unit dropdown'>
      <button type='button' class='btn btn-sm btn-default dropdown-toggle' data-toggle='dropdown'><?php echo zget($lang->invoice->report->unitList, $unit);?> <span class='caret'></span></button>
      <ul class='dropdown-menu'>
        <?php foreach($lang->invoice->report->unitList as $key => $currentUnit):?>
        <li><?php echo html::a(inlink('report', "company=$company&month=$year$month&unit=$key"), $currentUnit);?></li>
        <?php endforeach;?>
      </ul>
    </div>
  </div>
  <div class='panel-body'>
    <?php if($month):?>
    <?php foreach($data as $monthKey => $monthData):?>
    <table class='table active-disabled'>
      <tr>
        <td colspan='3' class='annual'>
          <div class='chart-wrapper text-center'>
            <h5><?php echo $year . $lang->year . ($monthKey ? (int)$monthKey . $lang->month : '') . zget($companies, $company, '') . $lang->invoice->report->title . '(' . zget($lang->invoice->report->unitList, $unit) . ')';?></h5>
            <div class='chart-canvas'><canvas height='260' width='800' id='chart-<?php echo $month;?>'></canvas></div>
          </div>
        </td>
        <td class='w-500px annual'>
          <div style="overflow:auto;" class='table-wrapper'>
            <table id='barChart-<?php echo $monthKey;?>' class='table table-condensed table-hover table-striped table-bordered table-chart table-fixed' data-chart='bar' data-target='#myBarChart' data-animation='false'>
              <thead>
                <tr class='text-center'>
                  <th class='w-200px'><?php echo $lang->invoice->company;?></th>
                  <?php foreach($lang->invoice->statusList as $status => $label):?>
                  <th class='chart-label-<?php echo $status;?>'><i class='chart-color-dot-<?php echo $status;?> icon-circle'></i> <?php echo $label;?></th>
                  <?php endforeach;?>
                </tr>
              </thead>
              <tbody>
              <?php foreach($monthData as $companyKey => $companyData):?>
              <tr class='text-center'>
                <td class='chart-label <?php if($companyKey != 'total') echo 'text-left';?>' title='<?php echo zget($companies, $companyKey, $lang->invoice->total);?>'><?php echo zget($companies, $companyKey, $lang->invoice->total);?></td>
                <?php foreach($lang->invoice->statusList as $status => $label):?>
                <td class='chart-value-<?php echo $status;?> text-right'><?php if(isset($companyData[$status])) echo $companyData[$status];?></td>
                <?php endforeach;?>
              </tr>
              <?php endforeach;?>
              </tbody>
            </table>
          </div>
        </td>
      </tr>
    </table>
    <?php endforeach;?>
    <?php else:?>
    <?php foreach($data as $companyKey => $companyData):?>
    <table class='table active-disabled'>
      <tr>
        <td colspan='3' class='annual'>
          <div class='chart-wrapper text-center'>
            <h5><?php echo $year . $lang->year . ($month ? (int)$month . $lang->month : '') . zget($companies, $companyKey) . $lang->invoice->report->title . '(' . zget($lang->invoice->report->unitList, $unit) . ')';?></h5>
            <div class='chart-canvas'><canvas height='260' width='800' id='chart-<?php echo $companyKey;?>'></canvas></div>
          </div>
        </td>
        <td class='w-400px annual'>
          <div style="overflow:auto;" class='table-wrapper'>
            <table id='barChart-<?php echo $companyKey;?>' class='table table-condensed table-hover table-striped table-bordered table-chart' data-chart='bar' data-target='#myBarChart' data-animation='false'>
              <thead>
                <tr class='text-center'>
                  <th><?php echo $lang->invoice->month;?></th>
                  <?php foreach($lang->invoice->statusList as $status => $label):?>
                  <th class='chart-label-<?php echo $status;?>'><i class='chart-color-dot-<?php echo $status;?> icon-circle'></i> <?php echo $label;?></th>
                  <?php endforeach;?>
                </tr>
              </thead>
              <tbody>
              <?php foreach($companyData as $monthKey => $monthData):?>
              <tr class='text-center'>
                <td class='chart-label'><?php echo $monthKey == 'total' ? $lang->invoice->total : $monthKey;?></td>
                <?php foreach($lang->invoice->statusList as $status => $label):?>
                <td class='chart-value-<?php echo $status;?> text-right'><?php if(isset($monthData[$status])) echo $monthData[$status];?></td>
                <?php endforeach;?>
              </tr>
              <?php endforeach;?>
              </tbody>
            </table>
          </div>
        </td>
      </tr>
    </table>
    <?php endforeach;?>
    <?php endif;?>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
