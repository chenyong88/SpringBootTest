<?php
$linkHtml        = commonModel::printLink('customer', 'import', '', '<i class="icon-download-alt"></i> ' . $lang->customer->import, "class='btn btn-primary' data-toggle='modal'", false);
$exportHtml      = commonModel::printLink('customer', 'exportTemplate', '', $lang->customer->exportTemplate, "class='iframe' data-width='700'", false, false, 'li');
$invoiceHtml     = commonModel::printLink('customer', 'invoice', "customerID=CUSTOMERID", $lang->customer->invoiceList, "class='invoice-list'", false, '', 'li');
$invoiceInfoHtml = commonModel::printLink('customer', 'invoiceInfo', "customerID=CUSTOMERID", $lang->customer->invoiceInfo, "data-toggle='modal' data-width='80%'", false, '', 'li');
?>
<script language='Javascript'>
$(function()
{
    $('#menuActions').prepend(<?php echo helper::jsonEncode($linkHtml)?>);
    $('#exportActionMenu').append(<?php echo helper::jsonEncode($exportHtml)?>);

    $('tr td.actions').each(function()
    {
        var $this           = $(this);
        var customerID      = $.trim($this.parent('tr').find('td:first').text());
        var invoiceInfoHtml = <?php echo json_encode($invoiceInfoHtml);?>;
        var invoiceHtml     = <?php echo json_encode($invoiceHtml);?>;

        if(invoiceInfoHtml) $this.find('.dropdown-menu > li:nth-child(2)').after(invoiceInfoHtml.replace(/CUSTOMERID/, customerID));
        if(invoiceHtml)
        {
            $this.find('.dropdown-menu > li:nth-child(2)').after(invoiceHtml.replace(/CUSTOMERID/, customerID));

            $.get(createLink('invoice', 'ajaxGetInvoiceCount', "customerID=" + customerID), function(invoiceCount)
            {
                if(invoiceCount == 0)
                {
                    $this.find('.invoice-list').attr('href', createLink('crm.invoice', 'create', "customerID=" + customerID));
                }
                else
                {
                    $this.find('.invoice-list').modalTrigger({width: '80%'});
                }
            });
        }
    });
});
</script>
