@extends('layouts/front')
@section('content')
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
                    <li class="breadcrumb-item" aria-current="page">{{ __('menu.practices.name') }}</li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $practice->title }}</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="landing-overview base-padding">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="news-detail">
                    @if($practice->image && $practice->hasImage('image'))
                        <img class="main img-fluid" src="{{ $practice->getImage('image') }}"/>
                    @endif
                    <p><span class="date">{{ ($practice->submitted_at) ? $practice->submitted_at->toFormattedDateString() : null }}</span></p>
                    <h1>{{ $practice->title }}</h1>
                    <div class="description">
                        {!! $practice->description !!}
                    </div>

                    <a href="javascript:history.back()" class="button-default">{{ __('front.news_publications.practices.back') }}</a>
                    
                    <p>&nbsp</p>
                    <p style="margin-bottom: 0">{{ __('front.news_publications.practices.share') }}</p>
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
        </div>
    </div>
</div>	
@endsection