$(document).ready(function()
{
    /* When checkbox of new model checked switch tags display. */
    if(!(v && v.isEventRegisted))
    {
        $(document).on('change', '.createProperty', function()
        {
            var parentRow      =$(this).parents('td');
            var $newExpress    = parentRow.find('.newProperty');
            var $selectExpress = parentRow.find('select');
            $selectExpress.val('');
            $newExpress.val('');
            $selectExpress.toggle();
            $newExpress.toggle();
            parentRow.find('.newProperty').css('border-color', '');
        });
        
        if(!v) v = new Object();
        v.isEventRegisted = true;
    }
});
