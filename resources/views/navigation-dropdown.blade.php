<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-jet-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-6 sm:-my-px sm:ml-10 sm:flex">
                    @foreach(config('menu') as $menu)
                        @if(empty($menu['children']))
                            <x-jet-nav-link href="{{ route($menu['route']) }}" :active="request()->routeIs($menu['route'])">
                                {{ __($menu['label']) }}
                            </x-jet-nav-link>
                        @else
                            <x-jet-dropdown align="left">
                                <x-slot name="trigger">
                                    <x-jet-nav-link class="cursor-pointer h-16 mt-0.5" :active="request()->routeIs($menu['route'])">
                                        {{ __($menu['label']) }} <x-heroicon-o-chevron-down class="h-3 pl-5 text-dark"/>
                                    </x-jet-nav-link>
                                </x-slot>
                                <x-slot name="content">
                                    <div class="p-3 pb-0">
                                        @foreach($menu['children'] as $children)
                                            <div class="flex w-full">
                                                <x-jet-nav-link class="inline-block w-auto pl-0 py-2 mb-2" href="{{ route($children['route']) }}" :active="request()->routeIs($children['route'])">
                                                    {{ __($children['label']) }}
                                                </x-jet-nav-link>
                                            </div>
                                        @endforeach
                                    </div>
                                </x-slot>
                            </x-jet-dropdown>
                        @endif
                    @endforeach
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <div class="flex justify-between">
                    <div class="px-5 @if (Laravel\Jetstream\Jetstream::managesProfilePhotos()) py-1.5 @else py-5 @endif">
                        <a href="{{ url('/') }}" target="_blank"><x-heroicon-o-globe-alt class="h-6 text-indigo-400 hover:text-indigo-500 focus:text-indigo-500"/></a>
                    </div>
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        <div class="hidden sm:flex sm:items-center mr-5">
                            <div class="ml-3 relative">
                                <x-jet-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                            <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                                <div>{{ __('team.menu.label') }}</div>
                
                                                <div class="ml-1">
                                                    <x-heroicon-o-chevron-down class="h-4"/>
                                                </div>
                                            </button>
                                    </x-slot>
                                    <x-slot name="content">
                                        <!-- Team Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('team.menu.label') }}
                                        </div>

                                        <!-- Team Settings -->
                                        <x-jet-dropdown-link href="{{ route('teams.show', auth()->user()->currentTeam->id) }}">
                                            {{ __('team.menu.setting') }}
                                        </x-jet-dropdown-link>
            
                                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                            <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                                {{ __('team.menu.create') }}
                                            </x-jet-dropdown-link>
                                        @endcan
            
                                        <div class="border-t border-gray-100"></div>
            
                                        <!-- Team Switcher -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('team.menu.switch') }}
                                        </div>
            
                                        @foreach (auth()->user()->allTeams() as $team)
                                            <x-jet-switchable-team :team="$team" />
                                        @endforeach
                                    </x-slot>
                                </x-jet-dropdown>
                            </div>
                        </div>
                    @endif
                    <div>
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                        <img class="h-8 w-8 rounded-full object-cover" src="{{ auth()->user()->profile_photo_url }}" alt="{{ auth()->user()->name }}" /> 
                                    </button>
                                @else
                                    <div class="py-5">
                                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                            <div>{{ auth()->user()->name }}</div>
            
                                            <div class="ml-1">
                                                <x-heroicon-o-chevron-down class="h-4"/>
                                            </div>
                                        </button>
                                    </div>
                                @endif
                            </x-slot>
        
                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('account.menu.label') }}
                                </div>
        
                                <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('account.menu.profile') }}
                                </x-jet-dropdown-link>
        
                                <x-jet-dropdown-link href="{{ route('backend.users') }}">
                                    {{ __('menu.users.name') }}
                                </x-jet-dropdown-link>
        
                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                        {{ __('api.menu.name') }}
                                    </x-jet-dropdown-link>
                                @endif
        
                                <div class="border-t border-gray-100"></div>

                                @if (config('app.bilingual') == true)
                                    @if(app()->getLocale() == 'en')
                                        <x-jet-dropdown-link href="{{ route('config.language',__('language.id.alias')) }}">
                                            <span class="flag-icon flag-icon-id mr-2"></span> {{ __('language.id.name') }}
                                        </x-jet-dropdown-link>
                                    @else
                                        <x-jet-dropdown-link href="{{ route('config.language',__('language.en.alias')) }}">
                                            <span class="flag-icon flag-icon-gb mr-2"></span> {{ __('language.en.name') }}
                                        </x-jet-dropdown-link>
                                    @endif
                                @endif
        
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                        {{ __('menu.logout.name') }}
                                    </x-jet-dropdown-link>
                                </form>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @foreach(config('menu') as $menu)
            @if(empty($menu['children']))
            <x-jet-responsive-nav-link href="{{ route($menu['route']) }}" :active="request()->routeIs($menu['route'])">
                {{ __($menu['label']) }}
            </x-jet-responsive-nav-link>
            @else
                <x-jet-dropdown align="left">
                    <x-slot name="trigger">
                        <x-jet-responsive-nav-link :active="request()->routeIs($menu['route'])">
                            {{ __($menu['label']) }}
                        </x-jet-responsive-nav-link>
                    </x-slot>
                    <x-slot name="content">
                        @foreach($menu['children'] as $children)
                            <x-jet-dropdown-link href="{{ route($children['route']) }}">
                                {{ __($children['label']) }}
                            </x-jet-dropdown-link>
                        @endforeach
                    </x-slot>
                </x-jet-dropdown>
            @endif
        @endforeach
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full" src="{{ auth()->user()->profile_photo_url }}" alt="{{ auth()->user()->name }}" />
                </div>

                <div class="ml-3">
                    <div class="font-medium text-base text-gray-800">{{ auth()->user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ auth()->user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('account.menu.label') }}
                </x-jet-responsive-nav-link>

                <x-jet-dropdown-link href="{{ route('backend.users') }}">
                    {{ __('menu.users.name') }}
                </x-jet-dropdown-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('menu.api.name') }}
                    </x-jet-responsive-nav-link>
                @endif

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('team.menu.label') }}
                    </div>

                    <!-- Team Settings -->
                    <x-jet-responsive-nav-link href="{{ route('teams.show', auth()->user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                        {{ __('team.menu.setting') }}
                    </x-jet-responsive-nav-link>

                    <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                        {{ __('team.menu.create') }}
                    </x-jet-responsive-nav-link>

                    <div class="border-t border-gray-200"></div>

                    <!-- Team Switcher -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('team.menu.switch') }}
                    </div>

                    @foreach (auth()->user()->allTeams() as $team)
                        <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                    @endforeach
                @endif
                
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-jet-responsive-nav-link href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('menu.logout.name') }}
                    </x-jet-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
