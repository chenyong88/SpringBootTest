function switchDateList(number)
{
    if($('#switchDate' + number).prop('checked'))
    {
        $('[name=begins\\[' + number + '\\]]').attr('disabled', 'disabled');
        $('[name=ends\\[' + number + '\\]]').attr('disabled', 'disabled');
    }
    else
    {
        $('[name=begins\\[' + number + '\\]]').removeAttr('disabled');
        $('[name=ends\\[' + number + '\\]]').removeAttr('disabled');
    }
}

function switchDateAll(switcher)
{
    if(switcher.checked)
    {
        $('[name^=switchDate]:not(:checked)').click();
    }
    else
    {
        $('[name^=switchDate]:checked').click();
    }
}
