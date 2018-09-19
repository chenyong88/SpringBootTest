<?php if(commonModel::hasPriv('invoice', 'create')):?>
<?php $invoiceHtml = commonModel::printLink('contract', 'invoice', "contractID=CONTRACTID", $lang->contract->invoiceList, "class='invoice-list'", false, '', 'li');?>
<script language='Javascript'>
$(function()
{
    $('tr td.operate').each(function()
    {
        var $this = $(this);
        var invoiceHtml = <?php echo json_encode($invoiceHtml);?>;

        if(invoiceHtml)
        {
            var contractID  = $.trim($this.parent('tr').find('td:first').text());
            $this.find('.dropdown-menu > li:nth-child(1)').before(invoiceHtml.replace(/CONTRACTID/, contractID));

            $.get(createLink('invoice', 'ajaxGetInvoiceCount', "customerID=&contractID=" + contractID), function(invoiceCount)
            {
                if(invoiceCount == 0)
                {
                    $this.find('.invoice-list').attr('href', createLink('crm.invoice', 'create', "customerID=&contractID=" + contractID));
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
<?php endif;?>
