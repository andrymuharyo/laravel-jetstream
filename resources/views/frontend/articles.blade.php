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
                    <li class="breadcrumb-item active" aria-current="page">{{ __('menu.articles.name') }}</li>
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
                    <h1 class="title">{{ __('menu.articles.name') }}</h1>
                    <div class="latest-news">
                        @foreach($articles as $article)
                            <article class="news-item">
                                <a href="{{ route('frontend.articles.view',$article->slug) }}">
                                    <div class="row">
                                        <div class="col-5 col-md-3">
                                            @if($article->image && $article->hasImage('image'))
                                                <div class="news-thumb" style="background-image: url({{ $article->getImage('image') }})">
                                                    <img src="{{ asset('frontend/images/news-thumb.png') }}" alt="{{ $article->caption }}">
                                                </div>
                                            @else
                                                <div class="news-thumb">
                                                    <img src="{{ asset('frontend/images/news-thumb.png') }}" alt="{{ $article->caption }}">
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-7 col-md-9">
                                            <div class="news-content">
                                                <p><span class="date">{{ ($article->submitted_at) ? $article->submitted_at->toFormattedDateString() : null }}</span></p>
                                                <h1>{{ $article->title }}</h1>
                                                <p>{{ $article->intro }}
                                                    <em><strong>{{ __('front.home.news.more') }}</strong></em>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </article>
                        @endforeach
                    </div>

                    {!! $articles->links() !!}
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
                                                    <a @if(mb_strtolower($sidebarChildSub->activeUrl) == '/'.$module) class="text-dark font-weight-bold" @endif
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