$(function()
{
    $('[name*=amebaAccount]').change(function()
    {
        var category = $(this).parents('tr').find('[name*=category]');
        category.load(createLink('budget', 'ajaxGetCategory', 'amebaAccount=' + $(this).val()), function()
        {
            category.trigger('chosen:updated');
        })
    });

    $('[name^=year], [name^=dept], [name^=amebaAccount], [name^=line], [name^=category]').change(function()
    {
        var tr = $(this).parents('tr');
        var year         = tr.find('[name^=year]').val();
        var dept         = tr.find('[name^=dept]').val();
        var amebaAccount = tr.find('[name^=amebaAccount]').val();
        var line         = tr.find('[name^=line]').val();
        var category     = tr.find('[name^=category]').val();

        $.get(createLink('budget', 'ajaxGetMoney', 'year=' + year + '&dept=' + dept + '&amebaAccount=' + amebaAccount + '&line=' + line + '&category=' + category), function(money)
        {
            tr.find('[name^=lastMoney]').val(money);
        });
    });
})
