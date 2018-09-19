$(document).ready(function()
{
    $('#checkAll').change(function()
    {
        $('[name^=refundCategories]').prop('checked', $(this).prop('checked'));
    });

    $('.setExpense').click(function()
    {
        var href = $(this).prop('href');
        var app  = 'cash';
        $.openEntry(app, href);
        return false;
    });
});
