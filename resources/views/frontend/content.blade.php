
@extends('layouts/front')
@section('content')
    <div class="breadcrumbs-container">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('menu.home.name') }}</a></li>
                        <li class="breadcrumb-item"><a href="#">{{ (app()->getLocale() == 'en') ? $sidebar->title : $sidebar->title_id }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ (app()->getLocale() == 'en') ? $content->title : $content->title_id }}</li>
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
                        <h1 class="title">{{ (app()->getLocale() == 'en') ? $content->title : $content->title_id }}</h1>
                        @if($content->image && $content->hasImage('image'))
                            <div class="mb-3">
                                <img class="img-fluid" src="{{ $content->getImage('image') }}" alt="{{ $content->caption }}" />
                            </div>
                        @endif
                        {!! $content->description !!}
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="side-nav">
                        <h4>{{ (app()->getLocale() == 'en') ? $sidebar->title : $sidebar->title_id }}</h4>
                        @if(count($sidebar->children()) <> 0)
                            <ul>
                                @foreach($sidebar->children() as $sidebarChild)
                                    <li>
                                        <a @if(str_replace(url('/content'),'',$sidebarChild->activeUrl) == '/'.$slug) class="active" @endif
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