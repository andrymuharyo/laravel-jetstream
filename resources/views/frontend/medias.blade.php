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
                        <li class="breadcrumb-item active" aria-current="page">{{ __('menu.medias.name') }}</li>
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
                        <h1 class="title">{{ __('menu.medias.name') }}</h1>
                        @if(count($datas) <> 0)
                            <div class="accordion" id="accordionExample">
                                @foreach($datas as $data)
                                    <div class="card">
                                        <div class="card-header" id="heading{{ $loop->iteration }}">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block text-left @if(!$loop->first) collapsed @endif" type="button" data-toggle="collapse" data-target="#collapse{{ $loop->iteration }}" aria-expanded="@if($loop->first) true @else false @endif" aria-controls="collapseOne">
                                                    <i class="fas fa-plus-circle"></i> {{ $data->title }}
                                                </button>
                                            </h2>
                                        </div>
                                        
                                        <div id="collapse{{ $loop->iteration }}" class="collapse @if($loop->first) show @endif" aria-labelledby="heading{{ $loop->iteration }}" data-parent="#accordionExample">
                                            <div class="card-body">
                                                @if(count($data->children()) <> 0)
                                                <ul>
                                                    @foreach($data->children() as $dataChild)
                                                        <li><a href="{{ $dataChild->typeUrl }}" target="_blank" @if($dataChild->attachment == 'file') download @endif><i class="fas fa-angle-right"></i> {{ $dataChild->title }}</a></li>
                                                    @endforeach
                                                </ul>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-center mb-0">{{ __('pagination.no_data',array('attribute'=> __('menu.'.mb_strtolower($module).'.name'))) }}</h5>
                                </div>
                            </div>
                        @endif
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