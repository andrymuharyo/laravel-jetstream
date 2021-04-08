
@extends('layouts/front')
@section('content')
    @push('bottom.script')
        <script type="text/javascript">
            var btn = $('#backtotop');

            $(window).scroll(function() {
            if ($(window).scrollTop() > 300) {
                btn.addClass('show');
            } else {
                btn.removeClass('show');
            }
            });

            btn.on('click', function(e) {
            e.preventDefault();
            $('html, body').animate({scrollTop:0}, '300');
            });
        </script>

        <script type="text/javascript">
            $('#sumatra, #sumatra2').hover( 
                function(){
                    $('#sumatra2').toggleClass('tooltiphover');
                },
                function(){
                    $('#sumatra2').toggleClass('tooltiphover');
                }
            );
            $('#java, #java2').hover( 
                function(){
                    $('#java2').toggleClass('tooltiphover');
                },
                function(){
                    $('#java2').toggleClass('tooltiphover');
                }
            );
            $('#kalimantan, #kalimantan2').hover( 
                function(){
                    $('#kalimantan2').toggleClass('tooltiphover');
                },
                function(){
                    $('#kalimantan2').toggleClass('tooltiphover');
                }
            );
            $('#sulawesi, #sulawesi2').hover( 
                function(){
                    $('#sulawesi2').toggleClass('tooltiphover');
                },
                function(){
                    $('#sulawesi2').toggleClass('tooltiphover');
                }
            );
            $('#bali, #bali2').hover( 
                function(){
                    $('#bali2').toggleClass('tooltiphover');
                },
                function(){
                    $('#bali2').toggleClass('tooltiphover');
                }
            );
            $('#ntb, #ntb2').hover( 
                function(){
                    $('#ntb2').toggleClass('tooltiphover');
                },
                function(){
                    $('#ntb2').toggleClass('tooltiphover');
                }
            );
            $('#ntt, #ntt2').hover( 
                function(){
                    $('#ntt2').toggleClass('tooltiphover');
                },
                function(){
                    $('#ntt2').toggleClass('tooltiphover');
                }
            );
            $('#papua, #papua2').hover( 
                function(){
                    $('#papua2').toggleClass('tooltiphover');
                },
                function(){
                    $('#papua2').toggleClass('tooltiphover');
                }
            );
            $('#maluku, #maluku2').hover( 
                function(){
                    $('#maluku2').toggleClass('tooltiphover');
                },
                function(){
                    $('#maluku2').toggleClass('tooltiphover');
                }
            );
            $('#jakarta, #jakarta2').hover( 
                function(){
                    $('#jakarta2').toggleClass('tooltiphover');
                },
                function(){
                    $('#jakarta2').toggleClass('tooltiphover');
                }
            );
        </script>

        <script type="text/javascript" src="{{ asset('frontend/js/jquery.rwdImageMaps.js') }}"></script>
        <script type="text/javascript">
            $(document).ready(function(e) {
                $('img[usemap]').rwdImageMaps();
            });
        </script>
    @endpush
    <div class="breadcrumbs-container">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('menu.home.name') }}</a></li>
                        <li class="breadcrumb-item"><a href="#">{{ (app()->getLocale() == 'en') ? $sidebar->title : $sidebar->title_id }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('front.contents.area.title') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="landing-overview base-padding">
            <div class="row">
                <div class="col-md-8">
                    <div class="content">
                        <h1 class="title">{{ __('front.contents.area.header') }}</h1>
                        <div class="map-container">
                            <div class="map">
                                <img src="{{ url('frontend/images/maps.png') }}" usemap="#Map" />
                                
                                <map name="Map" id="Map">
                                    <area alt="Sumatra" href="#" id="sumatra" shape="poly" coords="13,36,18,54,45,82,56,82,76,105,78,123,88,123,105,141,117,173,130,181,158,227,160,238,185,266,195,275,201,286,225,303,250,323,255,329,268,323,284,327,288,264,275,238,262,240,251,226,248,203,233,205,223,198,224,190,235,180,221,160,207,149,187,138,179,128,170,128,161,120,153,122,134,103,100,79,89,72,90,64,71,46,63,48,57,46,50,47,38,46,27,37" />
                                    <area alt="Java" title="" href="#" id="java" shape="poly" coords="276,351,291,331,299,332,304,344,312,343,321,333,346,340,353,343,357,351,403,355,415,343,439,353,454,356,462,356,467,372,478,377,493,374,507,380,502,392,510,401,474,391,459,393,429,391,397,383,357,373,349,378,303,367,301,357,289,350" />
                                    <area alt="Bali" href="#" id="bali" shape="poly" coords="509,386,510,392,522,401,537,394,531,385,519,389" />
                                    <area alt="West Nusa Tenggara" href="#" id="ntb" shape="poly" coords="547,393,542,401,557,406,577,410,592,409,612,404,626,403,623,392,607,390,595,384,586,386,583,394,556,388" />
                                    <area alt="East Nusa Tenggara" href="#" id="ntt" shape="poly" coords="667,433,651,440,623,422,641,398,657,389,674,393,692,396,713,392,724,388,744,388,760,386,778,386,779,393,761,393,776,419,756,440,726,453,693,451,656,438" />
                                    <area alt="Kalimantan" href="#" id="kalimantan" shape="poly" coords="379,128,364,147,364,165,372,179,368,190,376,203,391,211,393,224,397,249,413,259,438,251,440,268,461,264,471,256,486,264,507,269,513,282,536,273,544,269,547,280,555,269,550,259,556,242,562,235,555,223,560,212,577,202,588,196,583,182,585,169,594,158,615,155,611,146,594,131,586,122,599,122,592,112,581,95,592,77,571,67,541,66,533,79,533,94,522,111,520,123,515,138,497,142,481,145,463,141,452,143,451,150,431,152,409,153,394,143,387,136" />
                                    <area alt="Sulawesi" href="#" id="sulawesi" shape="poly" coords="659,319,648,320,639,324,632,314,637,297,635,275,635,267,627,267,620,263,619,247,626,237,632,220,637,202,641,188,647,168,658,157,669,147,690,151,717,156,742,157,758,154,776,138,779,145,766,159,762,165,733,169,727,165,690,164,670,166,664,164,653,172,649,186,654,200,660,203,670,213,678,214,685,206,691,204,719,196,733,192,736,198,733,205,726,201,718,206,711,212,690,224,697,241,704,256,709,262,705,273,716,283,727,283,728,297,725,306,721,320,716,322,706,318,697,314,689,296,688,283,673,267,676,258,679,241,652,252,658,266,658,283,658,301" />
                                    <area alt="Papua" href="#" id="papua" shape="poly" coords="963,188,940,199,920,201,932,216,951,220,962,234,978,234,997,234,1001,239,996,243,987,241,973,248,961,247,977,269,978,278,984,278,993,269,999,267,1009,280,1021,283,1039,292,1055,293,1088,306,1105,314,1118,330,1124,347,1128,364,1119,369,1105,380,1100,390,1119,390,1131,390,1144,383,1158,388,1171,399,1185,408,1185,359,1180,350,1183,337,1186,333,1186,244,1174,241,1158,239,1148,236,1141,232,1121,223,1104,216,1088,223,1089,228,1073,234,1064,236,1059,249,1050,260,1041,261,1028,260,1025,249,1020,242,1011,233,1008,220,1011,211,1004,201,979,190" />
                                    <area alt="Maluku" href="#" id="maluku" shape="poly" coords="923,274,908,267,881,263,870,267,862,274,853,277,843,269,837,267,831,271,822,277,809,274,802,262,813,260,825,259,833,248,838,233,837,223,832,210,833,193,828,182,833,160,836,140,843,130,851,120,861,114,868,111,872,116,869,125,858,129,853,136,854,143,870,137,872,144,871,150,861,156,863,161,872,161,878,170,867,173,859,168,850,168,852,180,856,190,864,201,875,211,880,233,884,246,895,251,904,254,910,252,919,259,925,269" />
                                    <area alt="Jakarta" href="#" id="jakarta" shape="poly" coords="292,329,295,341,302,341,309,334" />
                                </map>
                                
                                <div class="tool-tip2" id="sumatra2" style="top: 37.3%; left: 20.3%;">Sumatra</div>
                                <div class="tool-tip2" id="java2" style="top: 82.3%; left: 28.3%;">Java</div>
                                <div class="tool-tip2" id="kalimantan2" style="top: 22.3%; left: 33.3%;">Kalimantan</div>
                                <div class="tool-tip2" id="sulawesi2" style="top: 22.3%; left: 53.3%;">Sulawesi</div>
                                <div class="tool-tip2" id="bali2" style="top: 89.3%; left: 41.3%;">Bali</div>
                                <div class="tool-tip2" id="ntb2" style="top: 89.3%; left: 45.3%;">West Nusa Tenggara</div>
                                <div class="tool-tip2" id="ntt2" style="top: 89.3%; left: 49.3%;">East Nusa Tenggara</div>
                                <div class="tool-tip2" id="papua2" style="top: 68.3%; left: 86.3%;">Papua</div>
                                <div class="tool-tip2" id="maluku2" style="top: 62.3%; left: 68.3%;">Maluku</div>
                                <div class="tool-tip2" id="jakarta2" style="top: 64.3%; left: 24.3%;">Jakarta</div>
                                @foreach($maps as $map)
                                    <a href="#">
                                        <button style="top: {{ $map->coordinate_y }}%; left: {{ $map->coordinate_x }}%;" class="icon-fix">
                                            <i class="fas fa-map-pin"></i>
                                            <div class="tool-tip hidden-sm hidden-md hidden-lg">{{ $map->title }}</div>
                                        </button>
                                        <div class="pop-up hidden-xs">
                                            <h6><strong>{{ $map->title }}</strong></h6>
                                            <p>{{ $map->description }}</p>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="side-nav">
                        <h4>{{ (app()->getLocale() == 'en') ? $sidebar->title : $sidebar->title_id }}</h4>
                        @if(count($sidebar->children()) <> 0)
                            <ul>
                                @foreach($sidebar->children() as $sidebarChild)
                                    <li>
                                        <a @if($sidebarChild->activeUrl == '/area-profile' ) class="active" @endif
                                            href="{{ $sidebarChild->typeUrl }}" target="{{ $sidebarChild->target }}">
                                            {{ (app()->getLocale() == 'en') ? $sidebarChild->title : $sidebarChild->title_id }}
                                        </a>
                                    </li>
                                @endforeach
                                
                            </ul>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>	
@endsection