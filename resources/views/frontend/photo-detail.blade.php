@extends('layouts/front')
@section('content')
@push('bottom.script')
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
                        <li class="breadcrumb-item active" aria-current="page">{{ __('menu.photos.name') }}</li>
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
						<h1 class="title">{{ $photo->title }}</h1>
                        <p>{{ $photo->description }}</p>

                        <div class="media-container popup-gallery">
                            <div class="row">
                                @foreach($photo->items() as $gallery)
                                    @if($gallery->image)
                                        <div class="col-md-3">
                                            <div class="media">
                                                <a class="media-content" href="{{ Storage::disk('public')->url($photo->module.'/'.$gallery->image) }}" title="{{ $gallery->title }}" caption="{{ $gallery->caption }}">
                                                    <div class="media-image" style="background-image: url({{ Storage::disk('public')->url($photo->module.'/'.$gallery->image) }}">
                                                        <img src="{{ asset('frontend/images/news-thumb.png') }}" alt="{{ $gallery->caption }}">
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <a href="javascript:history.back()" class="button-default">{{ __('front.news_publications.photos.back') }}</a>
                        
                        <p>&nbsp</p>
                        <p style="margin-bottom: 0">{{ __('front.news_publications.photos.share') }}</p>
                        <!-- AddToAny BEGIN -->
                        <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                        <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                        <a class="a2a_button_facebook"></a>
                        <a class="a2a_button_twitter"></a>
                        <a class="a2a_button_email"></a>
                        </div>
                        <script async src="https://static.addtoany.com/menu/page.js"></script>
                        <!-- AddToAny END -->
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