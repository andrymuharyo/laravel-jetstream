
@extends('layouts/front')
@section('content')
    @push('bottom.script')
        <script src="{{ asset('frontend/js/jquery.flexslider.js') }}"></script>
        <script type="text/javascript">
            $(window).load(function() {
                $('.flexslider').flexslider({
                    animation: "slide"
                });
            });
        </script>
    @endpush
    <div>
        <div role="slider" class="flexslider">
            <ul class="slides">
                @foreach($slides as $slide)
                    <li>
                        @if($slide->copyright)
                            <span class="position-absolute top-5 right-10 text-xs text-white" style="text-shadow:1px 1px 1px rgba(0,0,0,0.5);">{{ $slide->copyright }}</span>
                        @endif 
                        @if($slide->image && $slide->hasImage('image'))
                            <img class="desktop" src="{{ $slide->getImage('image') }}" alt="{{ $slide->caption }}" />
                        @endif
                        @if($slide->image_mobile && $slide->hasImage('image_mobile'))
                            <img class="mobile" src="{{ $slide->getImage('image_mobile') }}" alt="{{ $slide->caption }}" />
                        @endif
                        <div class="flex-caption-container">
                            <div class="flex-caption">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-4"> 
                                            <h1>{{ $slide->title }}</h1>
                                            <p>{{ $slide->description }}</p>
                                            @if($slide->button)
                                                <a href="{{ $slide->url }}" class="button-default">
                                                    {{ $slide->button }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="container">
        <div class="landing-overview base-padding">
            <div class="row">
                <div class="col-md-6">
                    <div class="overview">
                        <h1 class="title">{{ $overview->title }}</h1>
                        {!! $overview->description !!}
                        @if($overview->button && $overview->url)
                            <a href="{{ $overview->url }}" class="button-default">{{ $overview->button }}</a>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="latest-news">
                        <h1 class="title">{{ __('front.home.news.title') }}</h1>
                        <a href="{{ route('frontend.articles') }}" class="view-all">{{ __('front.home.news.all') }}</a>
                        @foreach($latestArticles as $latestArticle)
                            <article class="news-item">
                                <a href="{{ route('frontend.articles.view',$latestArticle->slug) }}">
                                    <div class="row">
                                        @if($latestArticle->image && $latestArticle->hasImage('image'))
                                            <div class="col-5 col-md-4">
                                                <div class="news-thumb" style="background-image: url({{ $latestArticle->getImage('image') }})">
                                                    <img src="{{ asset('frontend/images/news-thumb.png') }}" alt="{{ (app()->getLocale() == 'en') ? $latestArticle->caption : $latestArticle->caption_id }}">
                                                </div>
                                            </div>
                                        @endif
                                        <div class="col-7 col-md-8">
                                            <div class="news-content">
                                                <p><span class="date">{{ ($latestArticle->submitted_at) ? $latestArticle->submitted_at->toFormattedDateString() : null }}</span></p>
                                                <h1>{{ $latestArticle->title }}</h1>
                                                <p>{{ $latestArticle->intro }}
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
            </div>
        </div>
    </div>	

    <div class="featured-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-box">
                        <div class="feature-title">
                            <h3 class="title">{{ __('front.home.publications.title') }}</h3>
                            <a href="#" class="view-all">{{ __('front.home.publications.title') }}</a>
                        </div>
                        <a class="feature-content" href="#">
                            @if($latestPublications->attachment == 'file')
                                @if($latestPublications && $latestPublications->hasFile('file'))
                                    <div class="bg-light position-relative">
                                        <div class="position-absolute w-100 py-5 px-3">
                                            <a href="{{ $latestPublications->getFile('file') }}" download class="mt-5 btn btn-block btn-success">
                                                {{ __('action.download.name') }}
                                            </a>
                                        </div>
                                        <img src="{{ asset('frontend/images/news-thumb.png') }}">
                                    </div>
                                @endif
                            @else
                                <div class="bg-light position-relative">
                                    <div class="position-absolute w-100 py-5 px-3">
                                        <a href="{{ $latestPublications->url }}" target="_blank" class="mt-5 btn btn-block btn-success">
                                            {{ __('action.view.name') }}
                                        </a>
                                    </div>
                                    <img src="{{ asset('frontend/images/news-thumb.png') }}">
                                </div>
                            @endif
                            <div class="feature-image-text">
                                <h4>{{ $latestPublications->title }}</h4>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-box">
                        <div class="feature-title">
                            <h3 class="title">{{ __('front.home.photos.title') }}</h3>
                            <a href="#" class="view-all">{{ __('front.home.photos.title') }}</a>
                        </div>
                        <a class="feature-content" href="#">
                            @if($latestPhotos && $latestPhotos->hasImage('image'))
                                <div class="feature-image" style="background-image: url({{ $latestPhotos->getImage('image') }})">
                                    <img src="{{ asset('frontend/images/news-thumb.png') }}" alt="{{ $latestPhotos->caption }}">
                                </div>
                            @endif
                            <div class="feature-image-text">
                                <h4>{{ $latestPhotos->title }}</h4>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-box">
                        <div class="feature-title">
                            <h3 class="title">{{ __('front.home.videos.title') }}</h3>
                            <a href="#" class="view-all">{{ __('front.home.videos.title') }}</a>
                        </div>
                            @if($latestVideos && $latestVideos->hasImage('image'))
                                <div class="feature-image" style="background-image: url({{ $latestVideos->getImage('image') }})">
                                    <img src="{{ asset('frontend/images/news-thumb.png') }}" alt="{{ $latestVideos->caption }}">
                                    <img class="play-icon" src="{{ asset('frontend/images/play-video-ico.png') }}" />
                                </div>
                            @endif
                            <div class="feature-image-text">
                                <h4>{{ $latestVideos->title }}</h4>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="subscribe-newsletter">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img src="{{ url('frontend/images/newsletter-icon.png') }}"/>
                </div>
                <div class="col-md-9">
                    <h3>{{ __('front.home.subscribe') }}</h3>
                    <form role="form" method="POST" action="{{ route('frontend.newsletter.post') }}" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <x-jet-label class="text-white" for="firstname" value="{{ __('label.firstname.name') }} *" />
                                    <input id="firstname" type="text" class="form-control" name="firstname" placeholder="{{ __('label.firstname.placeholder') }}" />
                                    @error('firstname') <span class="error text-danger small">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <x-jet-label class="text-white" for="lastname" value="{{ __('label.lastname.name') }}"/>
                                    <input id="lastname" type="text" class="form-control" name="lastname" placeholder="{{ __('label.lastname.placeholder') }}" />
                                    @error('lastname') <span class="error text-danger small">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <x-jet-label class="text-white" for="email" value="{{ __('label.email.name') }} *"/>
                                    <input id="email" type="email" class="form-control" name="email" placeholder="{{ __('label.email.placeholder') }}" />
                                    @error('email') <span class="error text-danger small">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mt-1">
                                    <button type="submit" id="submitSubscribe" class="btn btn-primary mt-4">
                                        {{ __('action.submit.name') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection