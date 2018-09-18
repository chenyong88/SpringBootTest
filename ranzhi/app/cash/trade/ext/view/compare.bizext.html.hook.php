<div id='menuActions'>
  <?php commonModel::printLink('report', 'export', "module=trade&mode=compare", $lang->export, "class='btn btn-primary' data-toggle='modal'");?>
</div>
<?php $this->session->set('tradeCompareSelectYears', $selectYears);?>
<?php $this->session->set('tradeCompareCurrency', $currency);?>
<?php $this->session->set('tradeCompareUnit', $unit);?>
