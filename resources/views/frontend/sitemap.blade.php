
@extends('layouts/front')
@section('content')
    <div class="breadcrumbs-container">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('menu.home.name') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('front.home.sitemap') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="landing-overview base-padding">
            <div class="row">
                <div class="col-md-8 offset-sm-2">
                    <div class="content">
                        <h1 class="title">{{ __('front.home.sitemap') }}</h1>
                        <div class="nav nav-sitemap">
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
                    </div>
                </div>
            </div>
        </div>
    </div>	
@endsection