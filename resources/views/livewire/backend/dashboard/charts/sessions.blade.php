<script>
        /* sessions */
        var sessions = Highcharts.chart('sessions', {
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
                    @foreach($sessionsData as $key => $session)
                        '{{ $session['name'] }}',
                    @endforeach
                ],
                tickmarkPlacement: 'on',
                title: {
                    enabled: false
                }
            },
            yAxis: {
                title: {
                    text: null
                },
                max : {{ $sessionsCount * 1.2 }}
            },
            tooltip: {
                shared: true,
                headerFormat: '',
                pointFormatter: function() {
                    return '<span style="background-color:' + this.color + ';  display:inline-block; width:12px; height:12px; border-radius:4px; margin-right:0px;"></span>' +
                    '<span style="margin-left:10px; margin-right:20px; display:inline-block;">' + this.name + '</span>' +
                    '<span>' + numeral(this.return).format('0,0') + '</span><br/>';
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
            series: [{
                    name: '{{ __("label.analytic.tabs.sessions.title") }}',
                    data:  
                        {!! json_encode($sessionsData) !!}
                    ,
                }
            ]
        });
</script>