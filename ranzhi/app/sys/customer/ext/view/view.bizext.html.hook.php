<div id='basicDIV' class='hide'>
  <div class='panel-heading with-nav-tabs'>
    <ul class='nav nav-tabs'>
      <li class='active'><a data-toggle='tab' href='#basicTab'><?php echo $lang->customer->basicInfo;?></a></li>
      <li><a data-toggle='tab' href='#issueTab'><?php echo $lang->customer->feedback;?></a></li>
    </ul>
  </div>
  <div class='tab-content'>
    <div id='basicTab' class='panel-body tab-pane active'>
    </div>
    <div id='issueTab' class='tab-pane'>
      <table class='table table-hover table-fixed'>
        <tr>
          <th class='w-80px'><?php echo $lang->feedback->product;?></th>
          <th><?php echo $lang->feedback->title;?></th>
        </tr>
        <?php foreach($issues as $issue):?>
        <tr>
          <td><?php echo zget($products, $issue->product);?></td>
          <td title='<?php echo $issue->title;?>'><?php if(!commonModel::printLink('feedback', 'view', "issueID={$issue->id}", $issue->title)) echo $issue->title;?></td>
        </tr>
        <?php endforeach;?>
      </table>
    </div>
  </div>
</div>

<?php
js::set('customerID', $customer->id);
$invoiceInfoHtml = commonModel::printLink('customer', 'invoiceInfo', "customerID={$customer->id}", $lang->customer->invoiceInfo, "data-toggle='modal' data-width='80%' class='btn'", false);
$invoiceHtml     = commonModel::printLink('customer', 'invoice', "customerID={$customer->id}", $lang->customer->invoiceList, "class='invoice-list btn'", false);
?>
<script>
$('#basicDIV #basicTab').html($('.col-side div.panel:first .panel-body').html());
$('.col-side div.panel:first').html($('#basicDIV').html());

var invoiceInfoHtml = <?php echo json_encode($invoiceInfoHtml);?>;
var invoiceHtml     = <?php echo json_encode($invoiceHtml);?>;

if(invoiceHtml) $('.page-actions > .btn-group:first-child').append(invoiceHtml);
if(invoiceInfoHtml)
{
    $('.page-actions > .btn-group:first-child').append(invoiceInfoHtml);

    $.get(createLink('invoice', 'ajaxGetInvoiceCount', "customerID=" + v.customerID), function(invoiceCount)
    {
        if(invoiceCount == 0)
        {
            $('.invoice-list').attr('href', createLink('crm.invoice', 'create', "customerID=" + v.customerID));
        }
        else
        {
            $('.invoice-list').modalTrigger({width: '80%'});
        }
    });
}
</script>
