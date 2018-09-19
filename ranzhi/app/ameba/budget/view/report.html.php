<?php
/**
 * The report view file of budget module of RanZhi.
 *
 * @copyright   Copyright 2009-2017 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     budget 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../common/view/header.html.php';?>
<div id='menuActions'>
  <?php commonModel::printLink('budget', 'create', '', "<i class='icon icon-plus'> </i>" . $lang->budget->create, "class='btn btn-primary' data-toggle='modal'");?>
  <?php commonModel::printLink('budget', 'batchCreate', "year=$year&dept=$dept&method=report", "<i class='icon icon-sitemap'> </i>" . $lang->budget->batchCreate, "class='btn btn-primary'");?>
</div>
<?php
if($this->app->clientLang == 'en')
{
    $title = $year . ' ' . zget($deptPairs, $dept, '') . ' ' . $lang->budget->report;
}
else
{
    $title = $year . $lang->year . zget($deptPairs, $dept, '') . $lang->budget->report;
}
?>
<h1 class='text-center'><?php echo $title;?></h1>
<div class='panel budgetPanel'>
  <table class='table table-bordered table-striped table-hover'>
    <thead>
      <tr class='text-center'>
        <th class='w-80px'><?php echo $lang->budget->item;?></th>
        <?php $class = $this->app->clientLang == 'en' ? 'w-130px' : 'w-100px';?>
        <th class='<?php echo $class;?>'><?php echo $lang->budget->amebaAccount;?></th>
        <th class='w-100px'><?php echo $lang->budget->line;?></th>
        <th class='w-140px'><?php echo $lang->budget->category;?></th>
        <th class='w-150px'><?php echo ($year - 1) . ($this->app->clientLang != 'en' ? $lang->year : '');?></th>
        <th class='w-150px'><?php echo $year . ($this->app->clientLang != 'en' ? $lang->year : '');?></th>
        <?php $class = $this->app->clientLang == 'en' ? 'w-130px' : 'w-100px';?>
        <th class='<?php echo $class;?>'><?php echo $lang->budget->rate;?></th>
        <th><?php echo $lang->budget->desc;?></th>
      </tr>
    </thead>
    <tbody>
      <?php
      $incomeRowCount = $expenseRowCount = 0;
      foreach($reportData as $key => $data)
      {
          if($key == 'profit' or $key == 'profitRate') continue;
      
          foreach($data as $amebaAccount => $lines)
          {
              foreach($lines as $line => $budgets)
              {
                  ${$key . 'RowCount'} += count($budgets);
              }
          }
      }
      foreach($reportData as $key => $data)
      {
          $keyIndex = 0;
          foreach($data as $amebaAccount => $lines)
          {
              $amebaIndex     = 0;
              $amebaRowCount = 0;
              foreach($lines as $line => $budgets) $amebaRowCount += count($budgets);
              foreach($lines as $line => $budgets)
              {
                  $lineIndex = 0;
                  $lineRowCount = count($budgets);
                  foreach($budgets as $category => $budget)
                  {
                      echo "<tr class='text-center'>";
                      if($keyIndex == 0)
                      {
                          $colspan = ($key == 'profit' or $key == 'profitRate') ? "colspan='4'" : '';
                          $rowspan = ($key == 'profit' or $key == 'profitRate') ? '' : "rowspan='" . ${$key . 'RowCount'} . "'";
                          echo "<th class='text-middle' $colspan $rowspan>{$lang->budget->$key}</th>";
                      }
                      if($key == 'income' or $key == 'expense')
                      {
                          if($amebaIndex == 0)
                          {
                              $colspan = $amebaAccount == 'total' ? "colspan='3'" : '';
                              $label   = $lang->budget->amebaAccountList[$amebaAccount];
                              if($amebaAccount == 'total') $label = $lang->budget->$key . $label;
                              echo "<th class='text-middle' rowspan='$amebaRowCount' $colspan>" . $label . '</th>';
                          }
                          if($lineIndex == 0 && $line != 'line')
                          {
                              echo "<th class='text-middle' rowspan='{$lineRowCount}'>" . zget($productLines, $line) . '</th>';
                          }
                          if($amebaAccount !== 'total')
                          {
                              $colspan = $line == 'line' ? "colspan='2'" : '';
                              echo "<th $colspan>" . zget($categoryPairs, $category) . '</th>';
                          }
                      }

                      $lastYearBudget = isset($budget[$year - 1]) ? $budget[$year - 1] : '';
                      $thisYearBudget = isset($budget[$year])     ? $budget[$year]     : '';
                      if(($key == 'income' or $key == 'expense') && $amebaAccount != 'total')
                      {
                          $attr = $amebaAccount == 'shareExpense' ? ''    : "data-toggle='modal'";
                          echo "<td class='text-right'>{$lastYearBudget}</td>";
                          echo "<td class='text-right'>";
                          if($thisYearBudget)
                          {
                              echo "<div class='thisYear'>";
                              if(!commonModel::printLink('budget', 'view', "budgetID={$thisYearBudget->id}", $thisYearBudget->money)) echo $thisYearBudget->money;
                              echo "<div class='actions hide'>";
                              commonModel::printLink('budget', 'edit',   "budgetID={$thisYearBudget->id}", "<i class='icon icon-edit'></i>", $attr);
                              commonModel::printLink('budget', 'delete', "budgetID={$thisYearBudget->id}", "<i class='icon icon-remove'></i>", "class='deleter'");
                              echo "</div>";
                              echo "</div>";
                          }
                          echo '</td>';
                      }
                      else
                      {
                          echo "<td class='text-right paddingRight'>$lastYearBudget</td>";
                          echo "<td class='text-right paddingRight'>$thisYearBudget</td>";
                      }
                      echo "<td>{$budget['rate']}</td>";
                      echo "<td class='text-left'>" . (!empty($thisYearBudget->desc) ? $thisYearBudget->desc : '') . '</td>';
                      $keyIndex++;
                      $amebaIndex++;
                      $lineIndex++;
                  }
              }
          }
      }
      ?>
    </tbody>
  </table>
</div>
<?php include '../../common/view/footer.html.php';?>
