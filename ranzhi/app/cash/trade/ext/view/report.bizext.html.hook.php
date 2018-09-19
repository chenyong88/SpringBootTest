<div id='menuActions'>
  <?php commonModel::printLink('report', 'export', "module=trade&mode=annual", $lang->export, "class='btn btn-primary' data-toggle='modal'");?>
</div>
<?php $this->session->set('tradeReportYear', $currentYear);?>
<?php $this->session->set('tradeReportMonth', $currentMonth);?>
<?php $this->session->set('tradeReportCurrency', $currentCurrency);?>
<?php $this->session->set('tradeReportUnit', $currentUnit);?>
