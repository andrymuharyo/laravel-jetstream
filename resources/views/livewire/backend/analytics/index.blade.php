
@if($isForm)
    @include('livewire.backend.'.mb_strtolower($pageName).'.form')
@else
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('menu.'.mb_strtolower($pageName).'.name') }}
        </h2>
    </x-slot>
    <div class="max-w-2xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="bg-gray-50 pt-3 pb-0 px-4">
                @if(count($analytics) <> 0)
                    @foreach($analytics as $analytic)
                        <x-jet-button wire:click="edit({{ $analytic->id }})" class="mb-3 bg-indigo-500 w-full relative" title="{{ __('action.edit.name') }}">
                            <x-heroicon-o-pencil class="h-4 text-white pr-5"/> {{ $analytic->analytics_view_id }}
                            @if(!$analytic->active)
                                <span class="absolute rounded right-1.5 top-1 px-2 py-1 text-xs bg-gray-500 text-white">{{ __('label.status.draft') }}</span> 
                            @endif
                        </x-jet-button>
                    @endforeach
                @else
                    <div class="justify-self-end">
                        <x-jet-button wire:click="create()" class="button-large w-full text-center mx-auto py-2.5 px-4 mb-4"><x-heroicon-o-plus class="h-4 pr-3 text-white"/> {{ __('action.new.name',array('attribute'=> __('menu.'.mb_strtolower($pageName).'.name'))) }}</x-jet-button>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endif