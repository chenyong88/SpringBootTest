$(document).ready(function()
{
    $.setAjaxForm('#batchCreateForm');

    /* show team menu. */
    $('[name^=multiple]').change(function()
    {
        var checkboxObj = $(this);
        var checked = checkboxObj.prop('checked');
        if(checked)
        {
            checkboxObj.parents('td').next('td').find('select').addClass('hidden');
            checkboxObj.parents('td').next('td').find('a').removeClass('hidden');
            checkboxObj.parents('td').next('td').find('input').removeClass('hidden');
            checkboxObj.parents('td').next('td').find('.input-group-addon').removeClass('hidden');
            checkboxObj.parents('tr').find('[id*=estimate]').attr('readonly', true);
        }
        else
        {
            checkboxObj.parents('td').next('td').find('select').removeClass('hidden');
            checkboxObj.parents('td').next('td').find('a').addClass('hidden');
            checkboxObj.parents('td').next('td').find('input').addClass('hidden');
            checkboxObj.parents('td').next('td').find('.input-group-addon').addClass('hidden');
            checkboxObj.parents('tr').find('[id*=estimate]').attr('readonly', false);
        }
    });

    /* update team title. */
    $('.modal-team .btn').click(function()
    {
        var modal = $(this).parents('.modal');
        var title = '';
        var time  = 0;
        modal.find('select[name^=team]').each(function()
        {
            if($(this).val() != '')
            {
                title += ' ' + $(this).find('option[value=' + $(this).val() + ']').text();
                estimate = parseFloat($(this).parents('td').next('td').next('td').find('[name*=teamEstimate]').val());
                if(!isNaN(estimate)) time += estimate;
            }
        })
        modal.closest('td').next('td').find('input[name*=teamMember]').attr('title', title).val(title);
        modal.closest('td').parent('tr').find('td:last input[name*=estimate]').val(time);
    });
});
