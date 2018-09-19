$(document).ready(function()
{
    $('#conditionType').change(function()
    {
        $('.sqlTR').toggle($(this).val() == 'sql');
        $('.dataTR').toggle($(this).val() == 'data');
    });

    $('#conditionType').change();
})
