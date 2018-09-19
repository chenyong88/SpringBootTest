$(document).ready(function()
{
    $('.with-side .side .treeview li').removeClass('active');
    if(v.category != 0) $('li#category' + v.category).addClass('active');
    if(v.store != 0) $('li#store' + v.store).addClass('active');

    /* Add a item. */
    $(document).on('click', '.icon-plus', function()
    {
        $(this).parents('tr').after($('#roleTpl').html().replace(/key/g, v.key));
        v.key ++; 
        return false;
    });

    $('a.setting').click(function()
    {
        $.openEntry('crm', $(this).attr('href'));
        return false;
    })

    /* Remove a item. */
    $(document).on('click', '.icon-remove', function()
    {   
        if($('#ajaxForm table .icon-remove').size() > 1)
        {   
            $(this).parents('tr').remove();
        }   
        else
        {   
            $(this).parents('tr').find('input,select').val('');
        }   
        return false;
    }); 

    /* When checkbox of new model checked switch tags display. */
    $(document).on('change', '#createCategory, #createModel, #createUnit', function()
    {
        $(this).parents('td').find('.newProperty').toggle();
        $(this).parents('td').find('.chosen-container').toggle();
        if($(this).prop('checked')) $(this).parents('td').find('.newProperty').focus();
        /* Remove the batch check labels and css. */
        $(this).parents('td').find('.text-error').remove();
        $(this).parents('td').find('.newProperty').css('border-color', '');
    });
})
