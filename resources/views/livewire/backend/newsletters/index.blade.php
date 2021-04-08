<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('menu.'.mb_strtolower($pageName).'.name') }}
    </h2>
</x-slot>
<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <div class="shadow overflow-hidden sm:rounded-md">
        <div class="bg-gray-50 pt-3 pb-0 px-4">
            <div class="flex justify-between">
                <div class="hidden sm:inline-flex">
                    <div class="flex mb-4">
                        <div>
                            <x:backend.dropdown :withSearch="true" wire:model.defer="sortBy" name="sortBy" :options="$sort" wire:change="sortBy($event.target.value)">
                                <option value="">{{ __('label.sort.placeholder') }}</option>
                            </x:backend.dropdown>
                        </div>
                        <div class="pl-5">
                            <x:backend.dropdown :withSearch="false" wire:model.defer="showDataTotal" name="showDataTotal" :options="$show" wire:change="showDataTotal($event.target.value)">
                                <option value="">{{ __('label.show.placeholder') }}</option>
                            </x:backend.dropdown>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white">
            <div class="flex justify-between">
                <div class="py-3 px-6 inline-flex">
                    <x-jet-button wire:click="export()" class="button-large w-full bg-green-500 hover:bg-green-600 focus:bg-green-600 active:bg-green-600 text-center py-2.5 px-4 mb-4">
                        <div class="w-full" wire:loading.remove wire:target="export"><x-heroicon-o-download class="h-4 text-white pr-5 inline"/> {{ __('action.export.name',array('attribute' => 'excel')) }}</div>
                        <div class="w-full" wire:loading wire:target="export">{{ __('action.export.loading') }} </div>
                    </x-jet-button>
                </div>
                <div class="py-3 px-6 inline-flex">
                    <div class="relative">
                        <x-jet-input id="search" type="text" class="flex pr-10 w-full" wire:model="search" placeholder="{{ __('label.search.placeholder',array('attribute'=> __('menu.'.mb_strtolower($pageName).'.name'))) }}" />
                        @if($search)
                            <span class="absolute top-0 right-0 py-3 px-3 cursor-pointer z-10 " wire:click="searchClear()">
                                <x-heroicon-o-x class="text-gray-500 h-4 bg-white" />
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="px-2 py-4 bg-white sm:px-6">
            @if(count($newsletters) > 0)
                <table class="table-fixed w-full border-2 border-gray-200 sm:border-0">
                    <thead>
                        <tr class="bg-gray-50 text-left">
                            <th class="border-b-2 border-gray-200 px-4 py-2 w-20 hidden sm:table-cell">{{ __('label.no.name') }}</th>
                            <th class="border-b-2 border-gray-200 px-4 py-2">{{ __('label.name.name') }}</th>
                            <th class="border-b-2 border-gray-200 px-4 py-2">{{ __('label.email.name') }}</th>
                            <th class="border-b-2 border-gray-200 px-4 py-2 hidden sm:table-cell">{{ __('label.created.name') }} / {{ __('label.updated.name') }}</th>
                            <th class="border-b-2 border-gray-200 px-4 py-2 text-center">{{ __('label.action.name') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($newsletters as $newsletter)
                        <tr>
                            <td class="align-top border-b-2 border-gray-100 px-4 py-2 hidden sm:table-cell">{{ $newsletter->no }}</td>
                            <td class="align-top border-b-2 border-gray-100 px-4 py-2">{{ $newsletter->firstname }} {{ $newsletter->lastname }}</td>
                            <td class="align-top border-b-2 border-gray-100 px-4 py-2">
                                <span class="break-all">{{ $newsletter->email }}</span>
                            </td>
                            <td class="align-top border-b-2 border-gray-100 px-4 py-2 hidden sm:table-cell">
                                {{ ($newsletter->created_at) ? $newsletter->created_at->toFormattedDateString() : null }}
                                <br/>
                                {{ ($newsletter->updated_at) ? $newsletter->updated_at->toFormattedDateString() : null }}
                            </td>
                            <td class="align-top border-b-2 border-gray-100 px-4 py-2 text-center">
                                <span class="mb-3">
                                    @if($confirmDestroy === $newsletter->id)
                                        <x-jet-danger-button class="animate-pulse mb-3 button-small text-xs px-2 mt-0 bg-gray-300 hover:bg-gray-400 focus:bg-gray-400 active:bg-gray-400 border-gray-400 border-0 hover:border-0 focus:border-0 active:border-0" 
                                        wire:click="cancelDestroy()">
                                            <x-heroicon-o-x-circle class="h-4 text-white"/>
                                        </x-jet-danger-button>
                                        <x-jet-danger-button class="animate-pulse button-small text-xs px-2 mt-0 bg-green-500 hover:bg-green-700 focus:bg-green-700 active:bg-green-700 border-0 hover:border-0 focus:border-0 active:border-0" 
                                        wire:click="destroy({{ $newsletter->id }})">
                                            <x-heroicon-o-check class="h-4 text-white"/>
                                        </x-jet-danger-button>
                                    @else
                                        {{-- Delete --}}
                                        <x-jet-danger-button class="mb-3 button-small" wire:click="confirmDestroy({{ $newsletter->id }})" title="{{ __('action.delete.name') }}">
                                            <x-heroicon-o-trash class="h-4 text-white"/>
                                        </x-jet-danger-button>
                                    @endif
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if($newsletters->hasPages())
                    <div class="grid sm:grid-flow-col gap-4 mt-5">
                        <div class="col-span-12 sm:col-span-6">
                            <input type="text" class="form-input" placeholder="{{ __('pagination.go_to_page') }}" wire:model="page">
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            {!! $newsletters->withQueryString()->links() !!}
                        </div>
                    </div>
                @endif
            @else
                <div class="bg-gray-100 p-3 rounded-lg">
                    @if($this->tab == 'index')
                        <h3 class="text-center">{{ __('pagination.no_data',array('attribute'=> __('menu.'.mb_strtolower($pageName).'.name'))) }}</h3>
                    @else
                        <h3 class="text-center">{{ __('pagination.no_data',array('attribute'=> __('action.archive.name'))) }}</h3>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>