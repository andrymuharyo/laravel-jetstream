@extends('layouts/front')
@section('content')
<div class="breadcrumbs-container">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('menu.home.name') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('menu.links.name') }}</li>
                </ol>
            </div>
        </div>
    </div>
</div>



<div class="container">
    <div class="landing-overview base-padding">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="content">
                    <h1 class="title">{{ __('menu.links.name') }}</h1>
                    <ul class="links">
                        @foreach($links as $link)
                            <li><a href="{{ $link->url }}" target="_blank"><i class="fas fa-external-link-alt"></i>{{ $link->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>	
@endsection