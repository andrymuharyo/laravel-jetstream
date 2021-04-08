@extends('layouts/front')
@section('content')
@push('bottom.script')
    <script>
        $('select[name="video_category"]').on('change',function() {
            var thisId = $(this).find('option:selected').val();
            window.location = "?category=" + thisId;
        });
    </script>
    <style>
        .choices__list.choices__list--single {
            min-width: 250px;
        }
    </style>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css"/>  
    <script src="//cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script> 
    <script type="application/javascript">
        const element = document.querySelector('.js-choices');
        const choices = new Choices(element);
    </script>
@endpush
    <div class="breadcrumbs-container">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('menu.home.name') }}</a></li>
                        <li class="breadcrumb-item"><a href="#">{{ (app()->getLocale() == 'en') ? $sidebar->title : $sidebar->title_id }}</a></li>
                        @if(count($sidebar->children()) <> 0)
                            @foreach($sidebar->children() as $key => $sidebarChild)
                                @if($key == 0)
                                    <li class="breadcrumb-item"><a href="#">{{ (app()->getLocale() == 'en') ? $sidebarChild->title : $sidebarChild->title_id }}</a></li>
                                @endif
                            @endforeach
                        @endif
                        <li class="breadcrumb-item active" aria-current="page">{{ __('menu.videos.name') }}</li>
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
                        <h1 class="title">{{ __('menu.videos.name') }}</h1>
                        <div class="media-container">
                            <form class="form-inline">
                                <div class="form-group mb-2">
                                    <label for="staticEmail2">{{ __('menu.categories.name') }}</label>
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <select class="form-control form-control-sm js-choices" name="video_category">
                                        @foreach($videoCategories as $videoCategory)
                                            <option @if(request('category') && $videoCategory->id == request('category')) selected @endif value="{{ $videoCategory->id }}">{{ $videoCategory->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                            <div class="row">

                                @foreach($videos as $video)
                                    <div class="col-md-6">
                                        <div class="media">
                                            <a class="media-content popup-youtube" href="{{ $video->url }}">
                                                @if($video && $video->hasImage('image'))
                                                    <div class="media-image" style="background-image: url({{ $video->getImage('image') }});background-size: 100% 250px;background-repeat:no-repeat;">
                                                        <img src="{{ asset('frontend/images/news-thumb.png') }}" alt="{{ $video->caption }}">
                                                        <img class="play-icon" src="{{ asset('frontend/images/play-video-ico.png') }}" />
                                                    </div>
                                                @endif
                                                <div class="media-image-text">
                                                    <h2>{{ $video->title }}</h2>
                                                    <h4>{{ $video->description }}</h4>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
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
                                    <li @if(count($sidebarChild->children()) <> 0) class="has-child" @endif>
                                        <a 
                                            href="{{ $sidebarChild->typeUrl }}" target="{{ $sidebarChild->target }}">
                                            {{ (app()->getLocale() == 'en') ? $sidebarChild->title : $sidebarChild->title_id }}
                                        </a>
                                        @if(count($sidebarChild->children()) <> 0)
                                            <ul>
                                                @foreach($sidebarChild->children() as $sidebarChildSub)
                                                    <li>
                                                        <a @if(mb_strtolower($sidebarChildSub->activeUrl) == '/'.request()->path()) class="text-dark font-weight-bold" @endif
                                                            href="{{ $sidebarChildSub->typeUrl }}" target="{{ $sidebarChildSub->target }}">
                                                            {{ (app()->getLocale() == 'en') ? $sidebarChildSub->title : $sidebarChildSub->title_id }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
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