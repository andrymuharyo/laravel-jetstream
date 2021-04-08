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
                    <li class="breadcrumb-item" aria-current="page">{{ __('menu.articles.name') }}</li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $article->title }}</li>
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
                    @if($article->image && $article->hasImage('image'))
                        <img class="main img-fluid" src="{{ $article->getImage('image') }}"/>
                    @endif
                    <p><span class="date">{{ ($article->submitted_at) ? $article->submitted_at->toFormattedDateString() : null }}</span></p>
                    <h1>{{ $article->title }}</h1>
                    <div class="description">
                        {!! $article->description !!}
                    </div>

                    <a href="{{ route('frontend.articles') }}" class="button-default">{{ __('front.news_publications.articles.back') }}</a>
                    
                    <p>&nbsp</p>
                    <p style="margin-bottom: 0">{{ __('front.news_publications.articles.share') }}</p>
                    <!-- AddToAny BEGIN -->
                    <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                    <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                    <a class="a2a_button_facebook"></a>
                    <a class="a2a_button_twitter"></a>
                    <a class="a2a_button_email"></a>
                    </div>
                    <script async src="https://static.addtoany.com/menu/page.js"></script>
                    <!-- AddToAny END -->

                    @if(count($relatedArticles) <> 0)
                    <hr>
                    <div class="related-articles">
                        <h2>{{ __('front.news_publications.articles.related') }}</h2>

                        <div class="row">
                            @foreach($relatedArticles as $relatedArticle)
                            <div class="col-md-4">
                                <div class="related-item">
                                    <a href="{{ route('frontend.articles.view',$relatedArticle->slug) }}">
                                        @if($relatedArticle->image && $relatedArticle->hasImage('image'))
                                        <div class="related-thumb" style="background-image: url({{ $relatedArticle->getImage('image') }})">
                                            <img src="{{ asset('frontend/images/news-thumb.png') }}" alt="{{ $relatedArticle->caption }}">
                                        </div>
                                        @else
                                            <div class="related-thumb">
                                                <img src="{{ asset('frontend/images/news-thumb.png') }}" alt="{{ $relatedArticle->caption }}">
                                            </div>
                                        @endif
                                        <div class="related-content">
                                            <p><span class="date">{{ ($relatedArticle->submitted_at) ? $relatedArticle->submitted_at->toFormattedDateString() : null }}</span></p>
                                            <h1>{{ $relatedArticle->title }}</h1>
                                            <p>{{ $relatedArticle->intro }}
                                                <em><strong>{{ __('front.home.news.more') }}</strong></em>
                                            </p>
                                         </div>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>	
@endsection