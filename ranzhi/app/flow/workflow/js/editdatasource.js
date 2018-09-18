$(document).ready(function()
{
    $('#type').change();
    $('.methodDesc').toggle($('#type').val() == 'system');
});
