<?php if(!empty($expenses)):?>
<div id='expenseDIV' class='hide'>
  <div class='panel'>
    <div class='panel-heading'>
      <strong><?php echo $lang->contract->expenseDetail;?></strong>
    </div>
    <table class='table table-condensed table-striped table-hover'>
      <tr>
        <th class='w-80px'><?php echo $lang->trade->date;?></th>
        <th class='w-100px'><?php echo $lang->trade->handlers;?></th>
        <th class='w-200px'><?php echo $lang->trade->category;?></th>
        <th class='w-200px'><?php echo $lang->trade->trader;?></th>
        <th class='w-100px'><?php echo $lang->trade->product;?></th>
        <th class='w-80px text-right'><?php echo $lang->trade->money;?></th>
        <th><?php echo $lang->trade->desc;?></th>
        <?php if(commonModel::hasPriv('cash.trade', 'edit') or commonModel::hasPriv('cash.trade', 'delete')):?>
        <th class='w-80px'><?php echo $lang->actions;?></th>
        <?php endif;?>
      </tr>
      <?php foreach($expenses as $trade):?>
      <tr>
        <td><?php echo $trade->date;?></td>
        <td><?php foreach(explode(',', $trade->handlers) as $handler) echo zget($users, $handler, '') . ' ';?></td>
        <td title='<?php echo zget($categories, $trade->category, '');?>'><?php echo zget($categories, $trade->category, '');?></td>
        <td title='<?php echo zget($customers, $trade->trader, '');?>'><?php echo zget($customers, $trade->trader, '');?></td>
        <td title='<?php echo zget($products, $trade->product, '');?>'><?php echo zget($products, $trade->product, '');?></td>
        <td class='text-right'><?php echo formatMoney($trade->money);?></td>
        <td title='<?php echo $trade->desc;?>'><?php echo $trade->desc;?></td>
        <?php if(commonModel::hasPriv('cash.trade', 'edit') or commonModel::hasPriv('cash.trade', 'delete')):?>
        <td>
          <?php commonModel::printLink('cash.trade', 'edit',   "tradeID={$trade->id}", $lang->edit,   "class='expense'");?>
          <?php commonModel::printLink('cash.trade', 'delete', "tradeID={$trade->id}", $lang->delete, "class='deleter'");?>
        </td>
        <?php endif;?>
      </tr>
      <?php endforeach;?>
    </table>
  </div>
</div>
<?php endif;?>

<table class='companyInfo hide'>
  <tbody>
    <tr>
      <th><?php echo $lang->contract->company;?></th>
      <td><?php echo zget($companys, $contract->company, '');?></td>
    </tr>
  </tbody>
</table>

<?php
js::set('contractID', $contract->id);
$expenseBtn = '';
$psiBtns    = '';
if(commonModel::hasPriv('contract',     'expense')) $expenseBtn = html::a(inlink('expense', "contractID=$contract->id"), $lang->contract->expense, "class='btn' data-toggle='modal' data-width='600'");
if(commonModel::hasPriv('psi.sale',     'create'))  $psiBtns   .= html::a(helper::createLink('psi.sale', 'create', "status=assignedToMe&type=sale&contract=$contract->id"), $lang->contract->sale, "class='btn psiBtn'");
if(commonModel::hasPriv('psi.purchase', 'create'))  $psiBtns   .= html::a(helper::createLink('psi.purchase', 'create', "status=assignedToMe&type=purchase&contract=$contract->id"), $lang->contract->purchase, "class='btn psiBtn'");
if($psiBtns) $psiBtns = "<div class='btn-group'>$psiBtns</div>";

$invoiceHtml = commonModel::printLink('contract', 'invoice', "contractID={$contract->id}", $lang->contract->invoiceList, "class='invoice-list btn'", false);
?>
<script>
  //if($('#expenseDIV').length) $('.row-table .col-main div:first').after($('#expenseDIV').html());
  $('.page-actions .btn-group:first').find('[href*=createRecord]').after(<?php echo helper::jsonEncode($expenseBtn);?>);
  $('.page-actions').prepend(<?php echo helper::jsonEncode($psiBtns);?>);

  var invoiceHtml = <?php echo json_encode($invoiceHtml);?>;
  if(invoiceHtml)
  {
      $('.page-actions > .btn-group:first-child').append(invoiceHtml);

      $.get(createLink('invoice', 'ajaxGetInvoiceCount', "customerID=&contractID=" + v.contractID), function(invoiceCount)
      {
          if(invoiceCount == 0)
          {
              $('.invoice-list').attr('href', createLink('crm.invoice', 'create', "customerID=&contractID=" + v.contractID));
          }
          else
          {
              $('.invoice-list').modalTrigger({width: '80%'});
          }
      });
  }

  $('.col-side .table-info tr:first-child').after($('.companyInfo tbody').html());
</script>
