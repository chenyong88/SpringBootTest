$(document).ready(function()
{
    var key = v.key;
    /* Add one task. */
    $(document).on('click', '.plus', function()
    {
        $(this).parents('tr').after("<tr>" + $('#originTR').html().replace(/key/g,  key ) + "</tr>");
        key++;
    });

    /* Delete a task. */
    $(document).on('click', '.condition-deleter', function(){ $(this).parents('tr').remove(); });
})
