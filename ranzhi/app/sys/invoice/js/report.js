$(function()
{
    if(v.companies)
    {
        var labels = [];
        for(var i in v.companies)
        {
            if(v.company && i != v.company) continue;

            labels.push(v.companies[i]);
        }
    }
    else
    {
        var labels = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
        if(v.month)
        {
            var labels = [v.month];
        }
    }

    $('[id^=barChart-]').each(function()
    {
        var $barChart   = $(this);
        var datasets    = [];
        var chartLabels = [];

        for(var i in v.status)
        {
            var status = v.status[i];
            var color  = v.colors[status];
            datasets[i] = {label: $barChart.find('thead .chart-label-' + status).text(), color: color, data: []};

            $barChart.find('.chart-color-dot-' + status).css('color', color);
        }
        
        $barChart.find('tbody .chart-label').each(function(){ chartLabels.push($(this).text()); });

        $.each(labels, function(key, value)
        {
            if($.inArray(value, chartLabels) != -1)
            {
                for(var i in v.status)
                {
                    var status = v.status[i];
                    $barChart.find('tbody .chart-value-' + status).each(function()
                    {
                        if($(this).parent('tr').find('.chart-label').text() == value)
                        {
                            datasets[i].data.push(parseFloat($(this).text() != '' ? $(this).text() : 0));
                        }
                    })
                }
            }
            else
            {
                for(var i in v.status)
                {
                    datasets[i].data.push(parseFloat(0));
                }
            }
        })
        
        var data = {labels: labels, datasets: datasets};
        
        var options = {multiTooltipTemplate: "<%= datasetLabel %> <%= value %>"};
        chart = $barChart.parents('table').find('[id^=chart-]').barChart(data, options);
    });
})
