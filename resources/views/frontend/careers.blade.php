@extends('layouts/front')
@section('content')
@push('bottom.script')
    <!-- Modal -->
    @foreach($careers as $career)
        <div class="modal fade" id="careerModal{{ $career->id }}" tabindex="-1" aria-labelledby="careerModal{{ $career->id }}Label" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="careerModal{{ $career->id }}Label">{{ $career->title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <p><span class="date">{{ ($career->submitted_at) ? $career->submitted_at->toFormattedDateString() : null }}</span></p>
                    {!! $career->description !!}
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('front.opportunities.careers.cancel') }}</button>
                <a href="{{ $career->url }}" target="_blank" class="btn btn-primary">{{ __('front.opportunities.careers.apply') }}</a>
                </div>
            </div>
            </div>
        </div>  
    @endforeach
@endpush
<div class="breadcrumbs-container">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('menu.home.name') }}</a></li>
                    <li class="breadcrumb-item"><a href="#">{{ (app()->getLocale() == 'en') ? $sidebar->title : $sidebar->title_id }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('menu.careers.name') }}</li>
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
                    <h1 class="title">{{ __('menu.careers.name') }}</h1>
                    <div class="events">
                        @foreach($careers as $career)
                            <div class="event-item">
                                <h1>{{ $career->title }}</h1>
                                <p>{{ $career->intro }}<br>
                                <a href="#" data-toggle="modal" data-target="#careerModal{{ $career->id }}"><em>{{ __('front.opportunities.careers.more') }}</em></a></p>
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
                                <li @if(mb_strtolower($sidebarChild->activeUrl) == '/'.request()->path()) class="has-child" @endif>
                                    <a
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