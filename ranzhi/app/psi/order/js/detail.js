$(document).ready(function()
{
    $('.toggle-self').click(function()
    {
         $(this).find('.toggle-body').toggleClass('change-show').toggleClass('change-hide');
         $(this).parents('.panel').find('.hide').toggle();
    });

    $(".label:empty").css('display', 'none');
});
