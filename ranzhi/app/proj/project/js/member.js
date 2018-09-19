/* Disabled user who selected. */
function updateMember()
{
    $('[name^=member]').find('option').prop('disabled', '');
    $('[name^=member]').find('[value=' + v.manager + ']').prop('disabled', 'disabled');
    $('[name^=member]').each(function()
    {
        var value = $(this).val();
        $('[name^=member]').each(function()
        {
            $(this).find('[value=' + value + ']').prop('disabled', 'disabled');
        });
    });
    $('.chosen').trigger("chosen:updated");
}

$(document).ready(function()
{
    $.setAjaxForm('#teamForm');
    updateMember();
});
