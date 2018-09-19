$(function()
{
    var switchDate = function(enable)
    {
        $('#switchDate').attr('checked', enable ? 'checked' : null);
        $('#date').attr('disabled', enable ? null : 'disabled');
        if(!enable) switchTime(false);
    };
    
    var switchTime = function(enable)
    {
        $('#switchTime').attr('checked', !enable ? 'checked' : null);
        $('#beginAndEnd').toggleClass('disabled', !enable);
        $('#begin, #end').attr('disabled', enable ? null : 'disabled');
        if(enable) switchDate(true);
    };

    $('#switchDate').on('change', function()
    {
        switchDate($(this).is(':checked'));
    });

    $('#switchTime').on('change', function()
    {
        switchTime(!$(this).is(':checked'));
    });

    $('#createForm').modalForm().listenScroll({container: 'parent'});

    $('#begin').on('change', function()
    {
        $('#end')[0].selectedIndex = $(this)[0].selectedIndex + 3;
    }).change();

    $('#type').on('change', function()
    {
        var type = $(this).val();
        if(type == 'custom')
        {
            $('#name').parents('div.control').show();
            $('#idvalue').parents('div.control').hide();
        }
        else
        {
            $('#name').parents('div.control').hide();
            $('#idvalue').parent().prev('label').html(v.typeList[type]);
            $('#idvalue').parents('div.control').show();

            var param = 'account=' + v.account + '&id=&type=json';

            if(type == 'task')
            {
                link = createLink('task', 'ajaxGetTodoList', param);
            }
            else if(type == 'order')
            {
                link = createLink('crm.order', 'ajaxGetTodoList', param);
            }
            else if(type == 'customer')
            {
                link = createLink('crm.customer', 'ajaxGetTodoList', param);
            }

            $('#idvalue').empty();
            $.get(link, function(data)
            {
                data = $.parseJSON(data);
                for(key in data) $('#idvalue').append("<option value='" + key + "'>" + data[key] + '</option>'); 
            });
        }
    });
});
