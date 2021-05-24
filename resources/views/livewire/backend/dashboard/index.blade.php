<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('menu.'.mb_strtolower($pageName).'.name') }}
    </h2>
</x-slot>
@if(count($analytics) <> 0)
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        @if($getRangeError)
            <div class="bg-red-500 w-full p-5 text-center shadow-md mb-4 text-white rounded-md">
                {{ __('validation.gt.numeric',array('attribute' => 'end date','value' => 'start date')) }}
            </div>
        @endif
        <form action="" method="get">
            <div class="grid sm:grid-cols-12 gap-4">
                <div class="col-span-12 sm:col-span-5">
                    <div class="mb-4">
                        <x-jet-label for="startDateRange" value="{{ __('label.submitted.name') }}" wire:model="startDateRange" />
                        <div class="datepicker-container">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <input class="form-input rounded-md shadow-sm mt-1 block w-full bg-white" readonly autocomplete="off"
                            id="startDateRange" 
                            type="text" 
                            name="startDateRange"
                            value="{{ request('startDateRange') ? request('startDateRange') : Carbon\Carbon::now()->subDays(7) }}"
                            ></input>
                        </div>
                        <x-jet-input-error for="startDateRange" class="mt-2" />
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-5">
                    <div class="mb-4">
                        <x-jet-label for="endDateRange" value="{{ __('label.submitted.name') }}" wire:model="endDateRange" />
                        <div class="datepicker-container">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <input class="form-input rounded-md shadow-sm mt-1 block w-full bg-white" readonly autocomplete="off"
                            id="endDateRange" 
                            type="text" 
                            name="endDateRange"
                            value="{{ request('endDateRange') ? request('endDateRange') : Carbon\Carbon::now() }}"
                            ></input>
                        </div>
                        <x-jet-input-error for="endDateRange" class="mt-2" />
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-2">
                    <x-jet-button type="submit" class="w-full mt-6 py-3 px-4">
                        <div wire:loading.remove wire:target="getRange"><x-heroicon-o-arrow-right class="h-4 text-white inline-flex align-top mr-2"/> {{ __('action.submit.name') }}</div>
                        <div wire:loading wire:target="getRange">{{ __('action.submit.loading') }} </div>
                    </x-jet-button>
                </div>
            </div>
        </form>
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-2 py-4 bg-white sm:px-6">
                <h3 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('label.analytic.tabs.users.title') }}</h3>
                <h3 class="block text-2xl text-indigo-500">{{ $this->tabUsersCount['return'] }}</h3>
                <div id="users" class="chart"></div>
            </div>
            <div class="px-2 py-4 bg-white sm:px-6">
                <h3 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('label.analytic.tabs.sessions.title') }}</h3>
                <h3 class="block text-2xl text-indigo-500">{{ $this->tabSessionsCount['return'] }}</h3>        
                <div id="sessions" class="chart"></div>
            </div>
            <div class="px-2 py-4 bg-white sm:px-6">
                <h3 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('label.analytic.tabs.bounce.title') }}</h3>
                <h3 class="block text-2xl text-indigo-500">{{ substr($this->tabBounceRateCount['return'],0,4) }} %</h3>
                <div id="bounce-rate" class="chart"></div>
            </div>
            <div class="px-2 py-4 bg-white sm:px-6">
                <h3 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('label.analytic.tabs.session_duration.title') }}</h3>
                <h3 class="block text-2xl text-indigo-500">{{ $this->tabSessionDurationCount }}</h3>    
                <div id="session-duration" class="chart"></div>
            </div>
        </div>
    </div>
    @push('bottom.script')
        <script src="//code.highcharts.com/highcharts.js"></script>
        <script src="//code.highcharts.com/highcharts-more.js"></script>
        <script src="//code.highcharts.com/maps/modules/map.js"></script>
        <script src="//code.highcharts.com/modules/heatmap.js"></script>
        <script src="//code.highcharts.com/modules/treemap.js"></script>
        <script src="//code.highcharts.com/modules/exporting.js"></script>
        <script src="//code.highcharts.com/modules/export-data.js"></script>
        <script src="//code.highcharts.com/modules/accessibility.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
        <script>

        var startPicker = new Pikaday({ field: document.getElementById('startDateRange') });
        var endPicker = new Pikaday({ field: document.getElementById('endDateRange') });

        /* setting global hightchart */
        Highcharts.setOptions({
            title: {
                text: null
            },
            subtitle: {
                text: null
            },
            exporting: {
                enabled: false
            },
            credits: {
                enabled: false
            },
            lang: {
            decimalPoint: ',',
            thousandsSep: '.'
            },
            xAxis: {
                labels: {
                    style: {
                        fontSize: '14px',
                        color: '#4a5568',
                    }
                }
            },
            yAxis: {
                min: 0, 
                minRange : 0.1,
                labels: {
                    style: {
                        fontSize: '14px',
                        color: '#4a5568',
                    }
                },
            },
            legend: {
                itemStyle: {
                    fontSize:'14px',
                    fontWeight: 'normal',
                    color: '#4a5568',
                    padding: 20,
                    cursor: 'default'
                },
                itemHoverStyle: {
                    color: '#4a5568',
                    cursor: 'default'
                },
                layout: 'horizontal',
                symbolRadius: 10,
                symbolHeight: 12,
                symbolWidth: 12,
            },
            tooltip: {
                shadow: true,
                borderWidth: 2,
                backgroundColor: '#fff',
                borderRadius: 10,
                padding: 20,
                style: {
                    fontSize: '14px',
                },
            },
            plotOptions: {
                series: {
                    events: {
                        legendItemClick: function() {
                            return false;
                        }
                    },
                    states: {
                        inactive: {
                            opacity: 1
                        },
                        hover: {
                            enabled: false,
                        }
                    }
                },
            },
            colors: [
                '#48bb78', '#00bcd4', '#fbcc49', '#cb4645', '#8085e9', '#f15c80', '#e4d354', '#2b908f', '#f45b5b', '#91e8e1'
            ],
        });
        </script>
        @include('livewire.backend.dashboard.charts.users')
        @include('livewire.backend.dashboard.charts.sessions')
        @include('livewire.backend.dashboard.charts.bounce-rate')
        @include('livewire.backend.dashboard.charts.session-duration')
    @endpush
@else
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div>
@endif