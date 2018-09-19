$(document).ready(function()
{
    if(v.dept) $('#category' + v.dept).parent('li').addClass('active');

    if(v.mode == 'both') $('.typeHeader').css('width', (parseFloat($('.table-commission').css('width')) - parseFloat($('.accountHeader').css('width')) - parseFloat($('.actions').css('width'))) / 2);

    if(v.lineCount > 1) $('.line').css('width', (parseFloat($('.typeHeader').css('width')) / v.lineCount));
})
