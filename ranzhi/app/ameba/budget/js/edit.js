$(document).ready(function()
{
    $('#amebaAccount').change(function()
    {
        if($(this).val() == 'externalIncome' || $(this).val() == 'internalIncome') 
        {
            $('#line').before("<div class='required required-wrapper'></div>");
        }
        else
        {
            $('#line').prev('.required-wrapper').remove();
        }
    });

    $('#year, #dept, #amebaAccount, #line, #category').change(function()
    {
        var year         = $('#year').val();
        var dept         = $('#dept').val();
        var amebaAccount = $('#amebaAccount').val();
        var line         = $('#line').val();
        var category     = $('#category').val();

        $.get(createLink('budget', 'ajaxGetMoney', 'year=' + year + '&dept=' + dept + '&amebaAccount=' + amebaAccount + '&line=' + line + '&category=' + category), function(money)
        {
            $('#lastMoney').val(money);
        });
    });
    
    $('#amebaAccount').change();
});
