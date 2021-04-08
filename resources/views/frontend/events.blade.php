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
                        <li class="breadcrumb-item active" aria-current="page">{{ __('menu.events.'.$type) }}</li>
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
						<h1 class="title">{{ __('menu.events.'.$type) }}</h1>
                        <div class="events">
                            @foreach($events as $event)
                                <div class="event-item">
                                    <h1>{{ $event->title }}</h1>
                                    {!! $event->description !!}
                                    <p><i class="far fa-calendar-alt"></i> {{ ($event->from_at) ? $event->from_at->toFormattedDateString() : null }} - {{ ($event->to_at) ? $event->to_at->toFormattedDateString() : null }}<br>
                                    <i class="fas fa-map-marked-alt"></i> {{ $event->address }}</p>
                                </div>
                            @endforeach
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