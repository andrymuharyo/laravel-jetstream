
@extends('layouts/front')
@section('content')
    <div class="breadcrumbs-container">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('menu.home.name') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $legal->title }}</li>
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
                        <h1 class="title">{{ $legal->title }}</h1>
                        {!! $legal->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>	
@endsection