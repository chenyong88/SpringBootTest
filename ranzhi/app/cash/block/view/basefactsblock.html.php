<?php
/**
 * The trade block view file of block module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<table class='table table-data table-hover block-contract table-fixed'>
  <?php $appid = ($this->get->app == 'sys' and isset($_GET['entry'])) ? "class='app-btn' data-id='{$this->get->entry}'" : ''?>
  <div style="overflow:auto;" class='table-wrapper'>
    <table id='barChart' class='table table-condensed table-hover table-striped table-bordered table-chart' data-chart='bar' data-target='#myBarChart' data-animation='false'>
      <thead>
        <tr class='text-center'>
          <th><?php echo $lang->trade->month;?></th>
          <th class='chart-label-in'><i class='chart-color-dot-in icon-circle text-green'></i> <?php echo $lang->trade->in . ' (' . zget($currencySign, $this->config->setting->mainCurrency) . ')';?></th>
          <th class='chart-label-out'><i class='chart-color-dot-out icon-circle text-red'></i> <?php echo $lang->trade->out . ' (' . zget($currencySign, $this->config->setting->mainCurrency) . ')';?></th>
          <th class='chart-label-profit'><?php echo $lang->trade->profit . '/' . $lang->trade->loss . ' (' . zget($currencySign, $this->config->setting->mainCurrency) . ')';?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($annualChartDatas as $month => $monthChartData):?>
        <tr>
          <td class='w-50px text-center'> <?php echo $month;?></td>
          <td class='w-100px text-center'><?php echo $monthChartData['in'];?></td>
          <td class='w-100px text-center'><?php echo $monthChartData['out'];?></td>
          <td class='w-100px text-center'><?php echo $monthChartData['profit'];?></td>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>
  </div>
</table>
