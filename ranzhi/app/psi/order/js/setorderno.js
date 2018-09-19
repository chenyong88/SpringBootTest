$(document).ready(function()
{
    $(document).on('change', '[name*=type]', function()
    {
        $(this).parent().find('.fixed, .year, .AI').show().not('.' + $(this).val()).hide();
    });

    $(document).on('change', 'input, select', function()
    {
        var typeList        = $('[name*=type]');
        var fixedList       = $('[name*=fixed]');
        var yearLengthList  = $('[name*=yearLength]');
        var AILengthList    = $('[name*=AILength]');

        var date    = new Date();
        var orderNo = '';
        for(i = 0; i < typeList.size(); i++)
        {
            var code = '';
            switch(typeList[i].value)
            {
            case 'fixed':
                code = fixedList[i].value;
                if(code == '') code = 'SO';
                break;              
            case 'year':
                code = date.getFullYear().toString();
                if(yearLengthList[i].value == 2) code = code.substring(2); 
                break;              
            case 'month':
                code = date.getMonth() + 1;
                if(code < 10) code = '0' + code;
                break;              
            case 'day':
                code = date.getDate();
                if(code < 10) code = '0' + code;
                break;              
            case 'AI':
                for(j = 1; j < AILengthList[i].value; j++)
                {
                    code += '0';
                }
                code += '1';
                break;     
            }
            orderNo += code;
        }
        
        $('#orderNo').val(orderNo);
    })

    $(document).on('click', '.addType', function()
    {
        $(this).parents('.input-row').after("<div class='input-row'>" + $(this).parents('.input-row').html() + '</div>');
        $('[name*=type]:first').change();
    });

    $(document).on('click', '.delType', function()
    {
        if($('[name*=type]').length == 1) return;
        $(this).parents('.input-row').remove();
        $('[name*=type]:first').change();
    });

    $('[name*=type]').change();
})
