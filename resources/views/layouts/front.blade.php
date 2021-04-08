<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ str_replace('_',' ',config('app.name')) }}</title>
    
        <!-- Favicon --> 
        <link rel="shortcut icon" href="{{ asset('frontend/images/favicon.png') }}">

        <!-- Styles -->
        <link href="//unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/flexslider.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/magnific-popup.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/smart-forms.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/black.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}" />

        <script src="//kit.fontawesome.com/e8a1296fb8.js" crossorigin="anonymous"></script>

        <!-- Font --> 
        <link rel="preconnect" href="//fonts.gstatic.com">
        <link href="//fonts.googleapis.com/css2?family=Dosis:wght@400;500;700&display=swap" rel="stylesheet">

        <!--[if IE]>
            <script type="text/javascript">
                var console = { log: function() {} };
            </script>
        <![endif]-->

    </head>
    <body>
        @include('frontend.components.alert')
        <main role="main">
            <div class="mobile-menu d-block d-lg-none">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <a class="mobile-link" data-toggle="modal" data-target="#mobile-menu"><i class="fa fa-bars"></i> {{ __('front.layouts.header.menu') }}</a>
                            
                            <div class="language-container mobile-language">
                                <ul>
                                    <li><a href="{{ route('frontend.language','en') }}" @if(app()->getLocale() == 'en') class="active" @endif>{{ mb_strtoupper(__('language.en.alias')) }}</a></li>
                                    <li><a href="{{ route('frontend.language','id') }}" @if(app()->getLocale() == 'id') class="active" @endif>{{ mb_strtoupper(__('language.id.alias')) }}</a></li>
                                </ul>
                            </div>
                            
                            <div class="search-box-container">
                                <div class="search-box">
                                    <form method="GET" class="search-container" action="{{ route('frontend.search') }}">
                                        @csrf
                                        <input id="search-box" type="text" class="search-box" name="search" required />
                                        <label for="search-box">
                                            <i class="fas fa-search"></i>
                                        </label>
                                        <input type="submit" id="search-submit" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <header role="banner">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="logo">
                                <a href="{{ route('frontend.home') }}"><img alt="Logo AIHSP" src="{{ url('frontend/images/aihsp_logo.png') }}"
                                    srcset='{{ url('frontend/images/aihsp_logo.png') }} 1x,
                                    {{ url('frontend/images/aihsp_logo.png') }} 2x'></a>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <ul class="logo-group">
                                <li>
                                    <a href="#"><img alt="Logo Kementan" src="{{ url('frontend/images/kemenpertanian-logo.png') }}"
                                        srcset='{{ url('frontend/images/kemenpertanian-logo.png') }} 1x,
                                        {{ url('frontend/images/kemenpertanian-logo.png') }} 2x'></a>
                                </li>
                                <li>
                                    <a href="#"><img alt="Logo Kementan" src="{{ url('frontend/images/kemenkes-logo.png') }}"
                                        srcset='{{ url('frontend/images/kemenkes-logo.png') }} 1x,
                                        {{ url('frontend/images/kemenkes-logo.png') }} 2x'></a>
                                </li>
                                <li>
                                    <a href="#"><img alt="Logo Kementan" src="{{ url('frontend/images/australian-government-logo.png') }}"
                                        srcset='{{ url('frontend/images/australian-government-logo.png') }} 1x,
                                        {{ url('frontend/images/australian-government-logo.png') }} 2x'></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>
        
            <nav role="navigation">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="nav-container">
                                <div class="site-nav">
                                    <ul>   
                                        @foreach($navigations as $navigation)
                                            <li 
                                            @if(count($navigation->children()) <> 0) 
                                                class="has-child @if($navigation->activeUrl == request()->path()) active @endif"
                                            @endif 
                                            @if($navigation->activeUrl == request()->path()) class="active" @endif
                                            >
                                                    @if(count($navigation->children()) <> 0)
                                                        <a href="#">{{ (app()->getLocale() == 'en') ? $navigation->title : $navigation->title_id }}</a>
                                                    @else
                                                        <a href="{{ $navigation->typeUrl }}" target="{{ $navigation->target }}">{{ (app()->getLocale() == 'en') ? $navigation->title : $navigation->title_id }}</a>
                                                    @endif
                                                @if(count($navigation->children()) <> 0)
                                                    <ul class="site-nav-child">
                                                        @foreach($navigation->children() as $navigationChild)
                                                            <li 
                                                            @if(count($navigationChild->children()) <> 0) 
                                                                class="has-child @if($navigationChild->activeUrl == request()->path()) active @endif"
                                                            @endif 
                                                            @if($navigation->activeUrl == request()->path()) class="active" @endif>
                                                                <a href="{{ $navigationChild->typeUrl }}" target="{{ $navigationChild->target }}">
                                                                    {{ (app()->getLocale() == 'en') ? $navigationChild->title : $navigationChild->title_id }}
                                                                </a>
                                                                @if(count($navigationChild->children()) <> 0)
                                                                    <ul class="site-nav-child">
                                                                        @foreach($navigationChild->children() as $navigationChildSub)
                                                                            <li>
                                                                                <a href="{{ $navigationChildSub->typeUrl }}" target="{{ $navigationChildSub->target }}">
                                                                                    {{ (app()->getLocale() == 'en') ? $navigationChildSub->title : $navigationChildSub->title_id }}
                                                                                </a>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                
                                <div class="search-box-container">
                                    <div class="search-box">
                                        <form method="GET" class="search-container" action="{{ route('frontend.search') }}">
                                            @csrf
                                            <input id="search-box" type="text" class="search-box" name="search" required />
                                            <label for="search-box">
                                                <i class="fas fa-search"></i>
                                            </label>
                                            <input type="submit" id="search-submit" />
                                        </form>
                                    </div>
                                </div>
            
                                <div class="language-container">
                                    <ul>
                                        <li><a href="{{ route('frontend.language','en') }}" @if(app()->getLocale() == 'en') class="active" @endif>{{ mb_strtoupper(__('language.en.alias')) }}</a></li>
                                        <li><a href="{{ route('frontend.language','id') }}" @if(app()->getLocale() == 'id') class="active" @endif>{{ mb_strtoupper(__('language.id.alias')) }}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        
            <div>
                @yield('content')
            </div>

        </main>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h1>{{ __('front.layouts.footer.contact') }}</h1>
                        <ul>
                            <li>
                                <div class="icon">
                                    <img src="{{ url('frontend/images/footer-icon-1.png') }}" />
                                </div>
                                <div class="icon-content">
                                    <p><strong>{{ __('front.layouts.footer.office') }}</strong></p>
                                    {!! $contact->address !!}
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <img src="{{ url('frontend/images/footer-icon-2.png') }}" />
                                </div>
                                <div class="icon-content">
                                    <p>{{ $contact->phone }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <img src="{{ url('frontend/images/footer-icon-3.png') }}" />
                                </div>
                                <div class="icon-content">
                                    <p>{{ $contact->email }}</p>
                                </div>
                            </li>
                        </ul>
                        <div class="cardno">
                            <p>{{ __('front.layouts.footer.supported') }} <img src="{{ url('frontend/images/cardno-logo.png') }}" /></p>
                        </div>
                    </div>
                    
                </div>
            </div>	
            <div role="copyright" class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <p><span>{!! __('front.layouts.footer.copyright',array('year' => date('Y'))) !!}</span></p>
                        </div>
                        <div class="col-md-6">
                            <ul>
                                @foreach($legals as $legal)
                                    <li><a href="{{ route('frontend.legal',$legal->slug) }}">{{ (app()->getLocale() == 'en') ? $legal->title : $legal->title_id }}</a></li>
                                @endforeach
                                <li><a href="{{ route('frontend.sitemap') }}">{{ __('front.layouts.footer.sitemap') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        
        <div class="modal fade" id="mobile-menu" tabindex="-1" role="dialog" aria-labelledby="mobile-menu" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('menu.navigations.name') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="accordion">
                            @foreach($navigations as $navigation)
                                <div class="card">
                                    <div class="card-header" id="label{{ $loop->iteration }}">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#menu{{ $loop->iteration }}" aria-expanded="true" aria-controls="menu{{ $loop->iteration }}">
                                                @if(count($navigation->children()) <> 0)
                                                    <a href="#">{{ (app()->getLocale() == 'en') ? $navigation->title : $navigation->title_id }}</a>
                                                @else
                                                    <a href="{{ $navigation->typeUrl }}" target="{{ $navigation->target }}">{{ (app()->getLocale() == 'en') ? $navigation->title : $navigation->title_id }}</a>
                                                @endif
                                            </button>
                                        </h5>
                                    </div>
                                </div>
                                @if(count($navigation->children()) <> 0)
                                    <div id="menu{{ $loop->iteration }}" class="collapse" aria-labelledby="menu{{ $loop->iteration }}" data-parent="#accordion">
                                        <div class="card-body">
                                            <ul>
                                                @foreach($navigation->children() as $navigationChild)
                                                    <li>
                                                        <a href="{{ $navigationChild->typeUrl }}" target="{{ $navigationChild->target }}">
                                                            {{ (app()->getLocale() == 'en') ? $navigationChild->title : $navigationChild->title_id }}
                                                        </a>
                                                    </li>
                                            @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="modal-footer"></div>
                </div>
            </div>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="{{ asset('frontend/js/popper.min.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
            
        <!-- Magnific Popup core JS file -->
        <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.popup-youtube').magnificPopup({
                    disableOn: 700,
                    type: 'iframe',
                    mainClass: 'mfp-fade',
                    removalDelay: 160,
                    preloader: false,

                    fixedContentPos: false
                });
                $('.popup-gallery').magnificPopup({
                    delegate: 'a',
                    type: 'image',
                    tLoading: 'Loading image #%curr%...',
                    mainClass: 'mfp-img-mobile',
                    gallery: {
                        enabled: true,
                        navigateByImgClick: true,
                        preload: [0,1] // Will preload 0 - before current, and 1 after the current image
                    },
                    image: {
                        tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                        titleSrc: function(item) {
                            return item.el.attr('title') + '<small>'+item.el.attr('caption')+'</small>';
                        }
                    }
                });
            });
        </script>
        
        @stack('bottom.script')

    </body>
</html>
