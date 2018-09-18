$(function()
{
    $('#customer').change(function()
    {
        var customer = $(this).val();
        if(customer == '' || customer == 'showmore') return;

        var link    = createLink('feedback', 'ajaxGetContacts', 'customer=' + customer);
        var contact = $('#contact').val();
        $('#contact').load(link ,function()
        {
            $('#contact').val(contact);
            $('#contact').trigger('chosen:updated');
        });
    });

    /* Create contact when create a question. */
    $('#createContact').change(function()
    {
        if($(this).prop('checked')) 
        {
            $(this).parents('.input-group').find('select').val('').trigger('chosen:updated').hide();
            $('#contact_chosen').hide();
            $(this).parents('.input-group').find('input[type=text][id=contactName]').show().focus();
        }
        else
        {
            $('#contact_chosen').show();
            $(this).parents('.input-group').find('input[type=text][id=contactName]').val('').hide();
        }
        $(this).parents('td').find('#contactLabel').remove();
    })

    $('#contactName').change(function()
    {
        $(this).parents('td').find('#contactLabel').remove();
    })
})
