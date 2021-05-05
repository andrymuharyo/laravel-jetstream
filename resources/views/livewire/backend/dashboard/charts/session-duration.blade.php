<script>
    /* session duration */
    var sessionDuration = Highcharts.chart('session-duration', {
        chart: {
            type: "line",
            scrollablePlotArea: {
                minWidth: 700
            },
            marginTop: 0,
            marginRight: 0,
            marginLeft: 0,
            // marginBottom: 0,
            fontFamily: 'Barlow'
        },
        legend: {
            enabled: false,
        },
        xAxis: {
            categories: [
                @foreach($sessionDurationsData as $sessionDuration)
                    '{{ $sessionDuration['name'] }}',
                @endforeach
            ],
        },
        yAxis: {
            startOnTick: true,
            
        },
        tooltip: {
            shared: true,
            headerFormat: '',
            pointFormatter: function() {
                return '<span style="background-color:' + this.color + ';  display:inline-block; width:12px; height:12px; border-radius:4px; margin-right:0px;"></span>' +
                '<span style="margin-left:10px; margin-right:20px; display:inline-block;">' + this.name + '</span>' +
                '<span>' + this.return + '</span><br/>';
            },
            useHTML: true,
        },
        plotOptions: {
            line: {
                lineWidth: 2,
                states: {
                    hover: {
                        lineWidth: 2
                    }
                },
            },
            series: {
                marker: {
                    enabled: false
                },
                states: {
                    hover: {
                    enabled: true,
                    }
                }
            },
        },
        series: [
            {
                name: '{{ __("label.analytic.tabs.session_duration.title") }}',
                data: 
                    {!! json_encode($sessionDurationsData) !!}
                ,
            }
        ],
    });
</script>