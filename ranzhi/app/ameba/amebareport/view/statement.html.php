<?php
/**
 * The amebareport view file of amebareport module of RanZhi.
 *
 * @copyright   Copyright 2009-2017 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     amebareport 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php js::set('month', $month);?>
<?php js::set('dept', $dept);?>
<?php $showDetail = commonModel::hasPriv('amebareport', 'showDetail');?>
<div id='menuActions'>
  <div class='btn-group currencyUnit'>
    <label><?php echo $lang->amebareport->currency;?></label>
    <?php echo html::radio('currencyUnit', $lang->amebareport->unit, '');?>
  </div>
  <?php if($showDetail):?>
  <label class='checkbox-inline showDetail'>
    <input type='checkbox' id='showDetail' name='showDetail' value='1'><?php echo $lang->amebareport->showDetail;?>
  </label>
  <?php endif;?>
  <?php if($period == 'day' or $period == 'week'):?>
  <?php if(!$archived) commonModel::printLink('amebareport', 'archive', "month=$month&dept=$dept", "<i class='icon icon-file-archive'> </i>" . $lang->amebareport->archive, "class='btn btn-primary archive'");?>
  <?php if($archived)  echo html::a('javascript:;', $lang->amebareport->archived, "class='btn' disabled");?>
  <?php endif;?>
</div>
<table class='table' id='statement'>
  <thead>
    <tr>
      <?php 
      $year  = substr($month, 0, 4);
      $month = strpos(',day,week,', ",{$period},") !== false ? substr($month, 4) : '';
      $dept  = zget($deptPairs, $dept, '');
      if($this->app->clientLang != 'en')
      {
          $year .= $lang->year;
          if($month) $month = (int)$month . $lang->month;
      }
      ?>
      <th data-col-class='no-padding' data-css-class='title' id='statementHeadLeft'>
        <span id='title'>
          <?php echo $year . $month . $dept . str_replace($lang->minus, '', $title) . '(';?>
          <?php foreach($lang->amebareport->unit as $key => $value):?>
          <span class='<?php echo $key;?>'><?php echo $value;?></span>
          <?php endforeach;?>
          <?php echo ')';?>
        </span>
      </th>
      <th data-col-class='no-padding' data-css-class='no-padding' class='flex-col' id='statementHeadCenter'>
        <table class='table table-condensed table-bordered'>
          <thead>
            <tr class='text-center'>
              <?php 
              $weekIndex  = 1;
              $width      = $period == 'week' ? 'w-100px' : 'w-80px';
              $colWidth   = $period == 'week' ? 200 : 160;
              $totalWidth = 'w-100px';
              $today      = $period == 'month' ? date('Ym') : date('Y-m-d');
              foreach($workingDates as $date) 
              {
                  if($date == 'total') continue;

                  if($period == 'day')
                  {
                      if($date > $today) continue;
                      echo "<th class='w-{$colWidth}px' colspan='2'>" . formatTime($date, DT_DATE4) . '</th>';
                  }
                  elseif($period == 'week')
                  {
                      echo "<th class='w-{$colWidth}px' colspan='2'>{$lang->amebareport->weekList[$weekIndex]}</th>";
                      $weekIndex++;
                  }
                  elseif($period == 'month')
                  {
                      if($month > $today) continue;

                      $month = substr($date, 4);
                      echo "<th class='w-{$colWidth}px' colspan='2'>" . zget($lang->amebareport->monthList, $month) . '</th>';
                  }
              }
              ?> 
            </tr>
            <tr class='text-center'>
              <?php 
              foreach($workingDates as $date)
              {
                  if($date == 'total') continue;
                  echo "<th class='{$width}'>{$lang->amebareport->expect}</th>";
                  echo "<th class='{$width}'>{$lang->amebareport->actual}</th>";
              }
              ?>
            </tr>
          </thead>
        </table>
      </th>
      <th data-col-class='no-padding' data-css-class='no-padding' id='statementHeadRight'>
        <table class='table table-condensed table-bordered'>
          <thead>
            <tr class='text-center'>
              <th class='w-200px' colspan='2'><?php echo $lang->amebareport->total;?></th>
            </tr>
            <tr class='text-center'>
              <th class='<?php echo $totalWidth;?>'><?php echo $lang->amebareport->expect;?></th>
              <th class='<?php echo $totalWidth;?>'><?php echo $lang->amebareport->actual;?></th>
            </tr>
          </thead>
        </table>
      </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        <table class='table table-condensed table-bordered table-striped'>
          <tbody>
            <?php 
            $incomeRowCount = $expenseRowCount = $profitRowCount = $targetRowCount = 0;
            foreach($statementList as $key => $statement)
            {
                ${$key . 'StatementCount'} = count($statement);
                foreach($statement as $rows)
                {
                    ${$key . 'RowCount'} += count($rows);

                    if(empty($rows)) ${$key . 'StatementCount'}--; 
                }
            }
            /* Display summary rows. */
            foreach($statementList as $key => $statement)
            {
                if($key != 'income' && $key != 'expense') continue;
                $i = 0;
                foreach($statement as $type => $rows)
                {
                    if(empty($rows)) continue;

                    echo "<tr class='text-center text-middle summary' data-row='{$key}{$type}'>";
                    if($i == 0) echo "<th class='w-60px primary-level text-middle' rowspan='" . ${$key . 'StatementCount'} . "'>{$lang->amebareport->$key}</th>";
                    $value = $lang->amebareport->typeList[$type];
                    if($type == 'total') $value = $lang->amebareport->$key . $value;
                    echo "<th class='{$key}{$type}' colspan='2'>{$value}</th>";
                    echo '</tr>';
                    $i++;
                }
            }
            if($showDetail)
            {
                /* Display detail rows. */
                foreach($statementList as $key => $statement)
                {
                    $i      = 0;
                    $detail = ($key == 'income' or $key == 'expense') ? 'detail' : '';
                    foreach($statement as $type => $rows)
                    {
                        if(empty($rows)) continue;

                        $j = 0;
                        $rowCount = count($rows);
                        foreach($rows as $category => $row)
                        {
                            echo "<tr class='text-center text-middle {$detail}' data-row='{$key}{$type}{$category}'>";
                            if($i == 0)
                            {
                                echo "<th class='w-60px primary-level' rowspan='" . ${$key . 'RowCount'} . "'>{$lang->amebareport->$key}</th>";
                            }
                            if($j == 0)
                            {
                                if($key == 'target')
                                {
                                    echo "<th class='{$key}{$type}{$category}' colspan='2'>{$lang->amebareport->typeList[$type]}</th>";
                                }
                                else
                                {
                                    $class   = ($key == 'profit' or $type == 'total') ? "class='{$key}{$type}{$category}'" : "class='w-80px'";
                                    $rowspan = $type != 'total' ? "rowspan='$rowCount'" : '';
                                    $colspan = ($type == 'total' or strpos(',grossProfit,netProfit,', ",$type,") !== false) ? "colspan='2'" : '';
                                    $value   = $lang->amebareport->typeList[$type];
                                    if($type == 'total') $value = $lang->amebareport->$key . $value;
                                    echo "<th {$class} {$rowspan} {$colspan}>{$value}</th>";
                                }
                            }
                            if($key == 'income' or $key == 'expense')
                            {
                                if($type != 'total')
                                {
                                    echo "<th class='{$key}{$type}{$category}'>" . zget($categoryList, $category) . '</th>';
                                }
                            }
                            echo '</tr>';
                            $i++;
                            $j++;
                        }
                    }
                }
            }
            ?>
          </tbody>
        </table>
      </td>
      <td>
        <table class='table table-condensed table-bordered table-striped mainTable'>
          <tbody>
            <?php 
            /* Display summary rows. */
            foreach($statementList as $key => $statement)
            {
                if($key != 'income' && $key != 'expense') continue;

                foreach($statement as $type => $rows)
                {
                    if(empty($rows)) continue;

                    echo "<tr class='text-right summary {$key}{$type}' data-row='{$key}{$type}'>";
                    foreach($workingDates as $date)
                    {
                        if($date == 'total') continue;

                        $expect = 0;
                        $actual = 0;
                        foreach($rows as $category => $row)
                        {
                            if($date > $today) continue;
                            if(empty($row[$date])) continue;

                            $expect += (float)zget($row[$date], 'expect', '');
                            $actual += (float)zget($row[$date], 'actual', '');
                        }
                        
                        $balance         = $actual - $expect;
                        $balanceFormated = formatMoney($balance, $formatUnit);
                        $expectFormated  = formatMoney($expect, $formatUnit);
                        $actualFormated  = formatMoney($actual, $formatUnit);

                        /* Set style to warning. */
                        $class = '';
                        if($actual > $expect) $class = 'profit';
                        if($actual < $expect) $class = 'loss';

                        /* To keep the height of the row. */
                        if(!$expect)         $expect         = '&nbsp;';
                        if(!$actual)         $actual         = '&nbsp;';
                        if(!$expectFormated) $expectFormated = '&nbsp;';
                        if(!$actualFormated) $actualFormated = '&nbsp;';
                        
                        echo "<td class='{$width}' data-origin='{$expect}' data-formated='{$expectFormated}'></td>";
                        echo "<td class='{$width} {$class}' data-origin='{$actual}' data-formated='{$actualFormated}' data-balance='{$balance}' data-balanceformated='{$balanceFormated}'></td>";
                    }
                    echo '</tr>';
                }
            }
            if($showDetail)
            {
                /* Display detail rows. */
                foreach($statementList as $key => $statement)
                {
                    $detail = ($key == 'income' or $key == 'expense') ? 'detail' : '';
                    foreach($statement as $type => $rows)
                    {
                        if(empty($rows)) continue;

                        foreach($rows as $category => $row)
                        {
                            echo "<tr class='text-right {$key}{$type}{$category} {$detail}' data-row='{$key}{$type}{$category}'>";
                            foreach($workingDates as $date)
                            {
                                if($date == 'total') continue;
                                if($date > $today) continue;

                                if(!empty($row[$date]))
                                {
                                    $expect  = (float)zget($row[$date], 'expect', '');
                                    $actual  = (float)zget($row[$date], 'actual', '');
                                    $balance = $actual - $expect;

                                    $expectFormated  = formatMoney($expect, $formatUnit);
                                    $actualFormated  = formatMoney($actual, $formatUnit);
                                    $balanceFormated = formatMoney($balance, $formatUnit);

                                    /* Set style to warning. */
                                    $class = '';
                                    if($actual > $expect) $class = 'profit';
                                    if($actual < $expect) $class = 'loss';

                                    if($key == 'target')
                                    {
                                        $expectFormated  = $expect;
                                        $actualFormated  = $actual;
                                        $balanceFormated = $balance;
                                    }

                                    if(strpos(',incomeSchedule,profitSchedule,efficiency,', ",{$type},") !== false)
                                    {
                                        if($expect)          $expect          .= '%';
                                        if($actual)          $actual          .= '%';
                                        if($balance)         $balance         .= '%';
                                        if($expectFormated)  $expectFormated  .= '%';
                                        if($actualFormated)  $actualFormated  .= '%';
                                        if($balanceFormated) $balanceFormated .= '%';
                                    }

                                    /* To keep the height of the row. */
                                    if(!$expect)         $expect         = '&nbsp;';
                                    if(!$actual)         $actual         = '&nbsp;';
                                    if(!$expectFormated) $expectFormated = '&nbsp;';
                                    if(!$actualFormated) $actualFormated = '&nbsp;';

                                    echo "<td class='{$width}' data-origin='{$expect}' data-formated='{$expectFormated}'></td>";
                                    echo "<td class='{$width} {$class}' data-origin='{$actual}' data-formated='{$actualFormated}' data-balance='{$balance}' data-balanceformated='{$balanceFormated}'></td>";
                                }
                                else
                                {
                                    echo "<td class='{$width}'>&nbsp;</td>";
                                    echo "<td class='{$width}'>&nbsp;</td>";
                                }
                            }
                            echo '</tr>';
                        }
                    }
                }
            }
            ?>
          </tbody>
        </table>
      </td>
      <td>
        <table class='table table-condensed table-bordered table-striped mainTable'>
          <tbody>
            <?php 
            /* Display summary rows. */
            foreach($statementList as $key => $statement)
            {
                if($key != 'income' && $key != 'expense') continue;

                $class = $key;
                foreach($statement as $type => $rows)
                {
                    if(empty($rows)) continue;

                    $expect = 0;
                    $actual = 0;
                    $date   = 'total';

                    echo "<tr class='text-right summary {$key}{$type}' data-row='{$key}{$type}'>";
                    foreach($rows as $category => $row)
                    {
                        if(empty($row[$date])) continue;

                        $expect += (float)zget($row[$date], 'expect', '');
                        $actual += (float)zget($row[$date], 'actual', '');
                    }

                    $balance         = $actual - $expect;
                    $balanceFormated = formatMoney($balance, $formatUnit);
                    $expectFormated  = formatMoney($expect, $formatUnit);
                    $actualFormated  = formatMoney($actual, $formatUnit);

                    /* Set style to warning. */
                    $class = '';
                    if($actual > $expect) $class = 'profit';
                    if($actual < $expect) $class = 'loss';

                    /* To keep the height of the row. */
                    if(!$expect)         $expect         = '&nbsp;';
                    if(!$actual)         $actual         = '&nbsp;';
                    if(!$expectFormated) $expectFormated = '&nbsp;';
                    if(!$actualFormated) $actualFormated = '&nbsp;';
                    
                    echo "<td class='{$totalWidth}' data-origin='{$expect}' data-formated='{$expectFormated}'></td>";
                    echo "<td class='{$totalWidth} {$class}' data-origin='{$actual}' data-formated='{$actualFormated}' data-balance='{$balance}' data-balanceformated='{$balanceFormated}'></td>";
                    echo '</tr>';
                }
            }
            if($showDetail)
            {
                /* Display detail rows. */
                foreach($statementList as $key => $statement)
                {
                    $detail = ($key == 'income' or $key == 'expense') ? 'detail' : '';
                    foreach($statement as $type => $rows)
                    {
                        if(empty($rows)) continue;

                        foreach($rows as $category => $row)
                        {
                            echo "<tr class='text-right {$key}{$type}{$category} {$detail}' data-row='{$key}{$type}{$category}'>";

                            $date = 'total';
                            if(!empty($row[$date]))
                            {
                                $expect  = (float)zget($row[$date], 'expect', '');
                                $actual  = (float)zget($row[$date], 'actual', '');
                                $balance = $actual - $expect;

                                $expectFormated  = formatMoney($expect, $formatUnit);
                                $actualFormated  = formatMoney($actual, $formatUnit);
                                $balanceFormated = formatMoney($balance, $formatUnit);

                                /* Set style to warning. */
                                $class = '';
                                if($actual > $expect) $class = 'profit';
                                if($actual < $expect) $class = 'loss';

                                if($key == 'target')
                                {
                                    $expectFormated  = $expect;
                                    $actualFormated  = $actual;
                                    $balanceFormated = $balance;
                                }

                                if(strpos(',incomeSchedule,profitSchedule,efficiency,', ",{$type},") !== false)
                                {
                                    if($expect)          $expect          .= '%';
                                    if($actual)          $actual          .= '%';
                                    if($balance)         $balance         .= '%';
                                    if($expectFormated)  $expectFormated  .= '%';
                                    if($actualFormated)  $actualFormated  .= '%';
                                    if($balanceFormated) $balanceFormated .= '%';
                                }

                                /* To keep the height of the row. */
                                if(!$expect)         $expect         = '&nbsp;';
                                if(!$actual)         $actual         = '&nbsp;';
                                if(!$expectFormated) $expectFormated = '&nbsp;';
                                if(!$actualFormated) $actualFormated = '&nbsp;';

                                echo "<td class='{$totalWidth}' data-origin='{$expect}' data-formated='{$expectFormated}'></td>";
                                echo "<td class='{$totalWidth} {$class}' data-origin='{$actual}' data-formated='{$actualFormated}' data-balance='{$balance}' data-balanceformated='{$balanceFormated}'></td>";
                            }
                            else
                            {
                                echo "<td class='{$totalWidth}'>&nbsp;</td>";
                                echo "<td class='{$totalWidth}'>&nbsp;</td>";
                            }
                            echo '</tr>';
                        }
                    }
                }
            }
            ?>
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>
<?php js::set('showDetail', $showDetail);?>
<?php js::set('leftWidth', 300);?>
<?php js::set('rightWidth', 200);?>
<?php js::set('colWidth', $colWidth);?>
<?php include '../../common/view/footer.html.php';?>
