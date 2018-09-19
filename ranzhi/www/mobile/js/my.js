$(function()
{
    $(document).on($.TapName, '.lang-menu > a', function()
    {
        selectLang($(this).data('value'));
    });

    initSortPanel();
    disableContextMenu();
    initListWithPager();
    fixAppnav();
    fixMenu();
});
