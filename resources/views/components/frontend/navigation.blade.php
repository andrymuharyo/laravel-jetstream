
@if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
            @if(auth()->user()->current_team_id == 1)
                <a href="{{ url('/webadmin/dashboard') }}" class="text-sm text-gray-700 underline">{{ __('menu.dashboard.name') }}</a>
            @endif
            <form method="POST" action="{{ route('logout') }}" class="ml-4 inline-flex text-center text-sm text-gray-700 underline">
                @csrf
                <x-jet-dropdown-link href="{{ route('logout') }}" class="p-0 sm:p-0" onclick="event.preventDefault(); this.closest('form').submit();">
                    {{ __('menu.logout.name') }}
                </x-jet-dropdown-link>
            </form>
        @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">{{ __('action.login.name') }}</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">{{ __('action.register.name') }}</a>
            @endif
        @endauth

        @if (config('app.bilingual') == true)
            @if(app()->getLocale() == 'en')
                <a class="ml-4 bg-indigo-500 hover:bg-indigo-600 text-white py-2 px-3 rounded-md" href="{{ route('config.language',__('language.id.alias')) }}">
                    {{ __('language.id.name') }}
                </a>
            @else
                <a class="ml-4 bg-indigo-500 hover:bg-indigo-600 text-white py-2 px-3 rounded-md" href="{{ route('config.language',__('language.en.alias')) }}">
                    {{ __('language.en.name') }}
                </a>
            @endif
        @endif
    </div>
@endif