$(function()
{
    $('input').not('#files, #delmiter').change(function()
    {
        $(this).val($(this).val().toUpperCase());
    });
})
