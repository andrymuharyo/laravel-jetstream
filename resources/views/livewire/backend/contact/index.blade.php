
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
                @foreach($contact as $view)
                    <x-jet-button wire:click.defer="edit({{ $view->id }})" class="mb-3 bg-indigo-500 w-full" title="{{ __('action.edit.name') }}">
                        <x-heroicon-o-pencil class="h-4 text-white pr-5"/> {{ (app()->getLocale() == 'en') ? $view->title : $view->title_id }}
                    </x-jet-button>
                @endforeach
            </div>
        </div>
    </div>
@endif