$(document).ready(function()
{
    $(document).on('change', '#type', function()
    {
        $('#optionTR').toggle($(this).val() == 'option');
        $('#systemTR').toggle($(this).val() == 'system');
        $('#sqlTR').toggle($(this).val() == 'sql');
        $('#langTR').toggle($(this).val() == 'lang');
    });

    $(document).on('change', '#app', function()
    {
        if($(this).val()) 
        { 
            $('.methodDesc').hide();
            $('#method').empty();
            $('#paramsDIV').empty();
            $('#module').load(createLink('workflow', 'ajaxGetAppModules', 'app=' + $(this).val()));
        }
    });

    $(document).on('change', '#module', function()
    {
        if($('#app').val() && $(this).val())
        {
            $('#method').empty();
            $('.methodDesc').hide();
            $('#paramsDIV').empty();
            $.get(createLink('workflow', 'ajaxGetModuleMethods', 'app=' + $('#app').val() + '&module=' + $(this).val()), function(methods)
            {
                methods = JSON.parse(methods);
                $('#method').append('<option></option>');
                $.each(methods, function(i, item)
                {
                    $('#method').append("<option value='" + i + "'>" + item + "</option>");
                });
            });
        }
    });

    $(document).on('change', '#method', function()
    {
        if($('#app').val() && $('#module').val() && $(this).val())
        {
            var method = $(this).val();
            $.get(createLink('workflow', 'ajaxGetMethodComment', 'app=' + $('#app').val() + '&module=' + $('#module').val() + '&method=' + $(this).val()), function(data)
            {
                $('.methodDesc').show();
                $('#methodDesc').val(data).attr('title', data);
            });

            var link = createLink('workflow', 'ajaxGetMethodParams', 'app=' + $('#app').val() + '&module=' + $('#module').val() + '&method=' + $(this).val());
            $('#paramsDIV').load(link);
        }
    });

    /* Add a option. */
    $(document).on('click', '.addItem', function()
    {   
        $(this).parents('.input-group').after($('#optionGroup').html());
    }); 

    /* Delete a option. */
    $(document).on('click', '.delItem', function()
    {   
        if($(this).parents('td').find('div.input-group').size() == 1)
        {   
            $(this).parents('.input-group').find('input').val('');
        }   
        else
        {   
            $(this).parents('.input-group').remove();
        }   
    }); 
})
