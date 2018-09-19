$(document).ready(function()
{
    /* expand active tree. */
    $('.tree li.active .hitarea').click();
});

function formatCurrency(number, precision, separator)
{
    number   = (Math.round(number * Math.pow(10, precision)) / Math.pow(10, precision)) . toString();
    parts    = number.split('.');
    parts[0] = parts[0].toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1' + (separator || ','));

    number = parts.join('.');
    if(parseFloat(number) == 0) return '';
    return number;
}

function formatFloat(val)
{
    val = Math.round(val * 100) / 100;
    parts = val.toString().split('.');

    if(typeof parts[1] == 'undefined') 
    { 
        parts[1] = '00';
    }
    else if(parts[1].length == 1)
    {
        parts[1] += '0'; 
    }

    return parts.join('.');
}
