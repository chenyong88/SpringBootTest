$(function()
{
    $('#menu li').removeClass('active').find('[href*=' + v.type + ']').parent().addClass('active');

    /* Toggle the line of closedReason. */
    $('#status').change(function(){$('#closedReason').parents('tr').toggle($(this).val() == 'closed');})
    $('#status').change();

    $('#customer').change(function()
    {
        if($(this).val() == '') return;

        var link    = createLink('feedback', 'ajaxGetContacts', 'customer=' + $(this).val());
        var contact = $('#contact').val();
        $('#contact').load(link ,function()
        {
            $('#contact').val(contact);
            $('#contact').trigger('chosen:updated');
        });
    });
})
