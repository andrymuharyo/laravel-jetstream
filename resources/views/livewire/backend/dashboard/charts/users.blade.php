<script>
        /* users */
        var users = Highcharts.chart('users', {
            chart: {
                type: "line",
                scrollablePlotArea: {
                    minWidth: 700
                },
                marginTop: 0,
                marginRight: 0,
                marginLeft: 0,
                // marginBottom: 0,
            },
            legend: {
                enabled: false,
            },
            xAxis: {
                categories: [
                    @foreach($usersData as $user)
                        '{{ $user['name'] }}',
                    @endforeach
                ],
            },
            yAxis: {
                max: {{ $usersCount * 1.2 }},
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
            series: [
                {
                    name: '{{ __("label.analytic.tabs.users.title") }}',
                    size: '100%',
                    innerSize: '0%',
                    data: 
                        {!! json_encode($usersData) !!}
                    ,
                }
            ],
        });
</script>