$(document).ready(function()
{
    $(':radio').click(function()
    {
        if($(this).val() == 'multistep')
        {
            $('#stepRuleTR').show();
        }
        else
        {
            $('#stepRuleTR').hide();
        }
    });

    $(document).on('change', '.start', function()
    {
        $(this).parent().parent().prev().find('.end').val($(this).val());
    });

    $(document).on('change', '.end', function()
    {
        $(this).parent().parent().next().find('.start').val($(this).val());
    });
})
