$(document).ready(function()
{
    $(document).on('click', '.icon-plus', function()
    {
        $(this).parents('tr').after('<tr>' + $('#originTR').html().replace(/key/g, v.key) + '</tr>');
        $(this).parents('tr').next().find('.rules').chosen({no_results_text: '<?php echo $lang->noResultsMatch;?>', placeholder_text:' ', disable_search_threshold: 10, width: '100%'});
        v.key++;
        return false;
    });

    $(document).on('click', '.icon-remove', function()
    { 
        if($('#ajaxForm .table .icon-remove').size() > 1)
        {
            $(this).parents('tr').remove(); 
        }
        else
        {
            $(this).parents('tr').find('input,select').val('');
        }
    });
})
