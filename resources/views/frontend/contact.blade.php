
@extends('layouts/front')
@section('content')
    <div class="breadcrumbs-container">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('menu.home.name') }}</a></li>
                        <li class="breadcrumb-item"><a href="#">{{ (app()->getLocale() == 'en') ? $sidebar->title : $sidebar->title_id }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('front.contents.contact.title') }}</li>
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
                        <h1 class="title">{{ __('front.contents.contact.title') }}</h1>
                        <h3>{{ __('front.contents.contact.location') }}</h3>
                        @if($contact->embed)
                            {!! $contact->embed !!}
                        @endif
                        <h3>{{ __('front.contents.contact.office') }}</h3>
                        {!! $contact->description !!}
                        <form role="form" method="POST" action="{{ route('frontend.contact.post') }}" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <x-jet-label for="firstname" value="{{ __('label.firstname.name') }} *" />
                                        <input id="firstname" type="text" class="form-control" name="firstname" placeholder="{{ __('label.firstname.placeholder') }}" />
                                        @error('firstname') <span class="error text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <x-jet-label for="lastname" value="{{ __('label.lastname.name') }}" />
                                        <input id="lastname" type="text" class="form-control" name="lastname" placeholder="{{ __('label.lastname.placeholder') }}" />
                                        @error('lastname') <span class="error text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <x-jet-label for="phone" value="{{ __('label.phone.name') }}" />
                                        <input id="phone" type="text" class="form-control" name="phone" placeholder="{{ __('label.phone.placeholder') }}" />
                                        @error('phone') <span class="error text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <x-jet-label for="email" value="{{ __('label.email.name') }} *" />
                                        <input id="email" type="email" class="form-control" name="email" placeholder="{{ __('label.email.placeholder') }}" />
                                        @error('email') <span class="error text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <x-jet-label for="subject" value="{{ __('label.subject.name') }} *" />
                                        <input id="subject" type="text" class="form-control" name="subject" placeholder="{{ __('label.subject.placeholder') }}" />
                                        @error('subject') <span class="error text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <x-jet-label for="message" value="{{ __('label.message.name') }} *" />
                                        <textarea id="message" type="text" class="form-control" name="message" placeholder="{{ __('label.message.placeholder') }}" rows="3"></textarea>
                                        @error('message') <span class="error text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                    <button type="submit" id="submitSend" class="btn btn-success">
                                        {{ __('action.submit.name') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="side-nav">
                        <h4>{{ (app()->getLocale() == 'en') ? $sidebar->title : $sidebar->title_id }}</h4>
                        @if(count($sidebar->children()) <> 0)
                            <ul>
                                @foreach($sidebar->children() as $sidebarChild)
                                    <li>
                                        <a @if($sidebarChild->activeUrl == '/contact' ) class="active" @endif
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