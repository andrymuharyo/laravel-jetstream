@extends('layouts/front')
@section('content')
<div class="breadcrumbs-container">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('menu.home.name') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('front.layouts.header.search') }}</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="landing-overview base-padding">
        <h4 class="title mb-4 text-dark">{{ __('front.layouts.header.search') }} : {{ request('search') }}</h4>
        <div class="row">
            <div class="col-md-12">
                @if(count($articles) == 0 && count($practices) == 0 && count($eventsPrev) == 0 && count($eventsNext) == 0)
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center mb-0">{!! __('front.search.empty',array('attribute' => request('search'))) !!}</h5>
                        </div>
                    </div>
                @endif
                @if(count($articles) <> 0)
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
                    </div>
                @endif
                @if(count($practices) <> 0)
                    <div class="content my-5">
                        <h1 class="title">{{ __('menu.practices.name') }}</h1>
                        <div class="latest-news">
                            @foreach($practices as $practice)
                                <article class="news-item">
                                    <a href="{{ route('frontend.practices.view',$practice->slug) }}">
                                        <div class="row">
                                            <div class="col-5 col-md-3">
                                                @if($practice->image && $practice->hasImage('image'))
                                                    <div class="news-thumb" style="background-image: url({{ $practice->getImage('image') }})">
                                                        <img src="{{ asset('frontend/images/news-thumb.png') }}" alt="{{ $practice->caption }}">
                                                    </div>
                                                @else
                                                    <div class="news-thumb">
                                                        <img src="{{ asset('frontend/images/news-thumb.png') }}" alt="{{ $practice->caption }}">
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-7 col-md-9">
                                                <div class="news-content">
                                                    <p><span class="date">{{ ($practice->submitted_at) ? $practice->submitted_at->toFormattedDateString() : null }}</span></p>
                                                    <h1>{{ $practice->title }}</h1>
                                                    <p>{{ $practice->intro }}
                                                        <em><strong>{{ __('front.home.news.more') }}</strong></em>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </article>
                            @endforeach
                        </div>
                    </div>
                @endif
                @if(count($eventsPrev) <> 0)
                    <div class="content my-5">
                        <h1 class="title">{{ __('menu.events.prev') }}</h1>
                        <div class="events">
                            @foreach($eventsPrev as $event)
                                <div class="event-item">
                                    <h1>{{ $event->title }}</h1>
                                    {!! $event->description !!}
                                    <p><i class="far fa-calendar-alt"></i> {{ ($event->from_at) ? $event->from_at->toFormattedDateString() : null }} - {{ ($event->to_at) ? $event->to_at->toFormattedDateString() : null }}<br>
                                    <i class="fas fa-map-marked-alt"></i> {{ $event->address }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
                @if(count($eventsNext) <> 0)
                    <div class="content my-5">
                        <h1 class="title">{{ __('menu.events.next') }}</h1>
                        <div class="events">
                            @foreach($eventsNext as $event)
                                <div class="event-item">
                                    <h1>{{ $event->title }}</h1>
                                    {!! $event->description !!}
                                    <p><i class="far fa-calendar-alt"></i> {{ ($event->from_at) ? $event->from_at->toFormattedDateString() : null }} - {{ ($event->to_at) ? $event->to_at->toFormattedDateString() : null }}<br>
                                    <i class="fas fa-map-marked-alt"></i> {{ $event->address }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection