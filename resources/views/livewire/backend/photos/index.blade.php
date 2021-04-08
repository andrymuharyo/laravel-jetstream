
@if($isForm)
@include('livewire.backend.'.mb_strtolower($pageName).'.form')
@else
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('menu.'.mb_strtolower($pageName).'.name') }} | {{ $this->categoryTitle }}
    </h2>
</x-slot>
<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <div class="flex justify-start relative">
        <div class="mb-4">
            <a href="{{ route('backend.'.mb_strtolower(str_replace('','s',$pageName)).'.categories' ) }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150 mr-2 inline-flex">
                <x-heroicon-o-chevron-left class="h-4 text-dark"/> {{ __('action.back.name') }}
            </a>
        </div>
    </div>
    <div class="shadow overflow-hidden sm:rounded-md">
        <div class="bg-gray-50 pt-3 pb-0 px-4">
            <div class="flex justify-between">
                <div class="hidden sm:inline-flex">
                    <div class="flex">
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
                <div class="justify-self-end mt-1">
                    <x-jet-button wire:click="create()" class="button-large py-2.5 px-4 mb-4"><x-heroicon-o-plus class="h-4 pr-3 text-white"/> {{ __('action.new.name',array('attribute'=> __('menu.'.mb_strtolower($pageName).'.name'))) }}</x-jet-button>
                </div>
            </div>
        </div>
        <div class="bg-white">
            <div class="flex justify-between">
                <div>
                    <nav class="flex sm:grid-flow-col">
                        <div class="col-span-12 sm:col-span-6" wire:click="gotoPage(1)">
                            <button wire:click="$set('tab', 'index')" class="inline sm:flex py-4 px-6 text-gray-700 hover:text-indigo-600 {{ $tab == 'index' ? 'border-b-2 border-indigo-400' : '' }} focus:outline-none">
                                <span class="inline-flex sm:hidden"><x-heroicon-o-collection class="text-gray-500 h-4" /></span>
                                <span class="hidden sm:inline-flex">{{ __('label.index.name') }}</span>
                            </button>
                        </div>
                        <div class="col-span-12 sm:col-span-6" wire:click="gotoPage(1)">
                            <button wire:click="$set('tab', 'archive')" class="inline sm:flex py-4 px-6 text-gray-700 hover:text-indigo-600 {{ $tab == 'archive' ? 'border-b-2 border-indigo-400' : '' }} focus:outline-none">
                                <span class="inline-flex sm:hidden"><x-heroicon-o-archive class="text-gray-500 h-4" /></span> 
                                <span class="hidden sm:inline-flex">{{ __('label.archive.name') }}</span>               
                            </button>
                        </div>
                    </nav>
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
            @if(count($photos) > 0)
                <table class="table-fixed w-full border-2 border-gray-200 sm:border-0">
                    <thead>
                        <tr class="bg-gray-50 text-left">
                            <th class="border-b-2 border-gray-200 px-4 py-2 w-20 hidden sm:table-cell">{{ __('label.no.name') }}</th>
                            <th class="border-b-2 border-gray-200 px-4 py-2 hidden sm:table-cell" width="10%">{{ __('label.image.name') }}</th>
                            <th class="border-b-2 border-gray-200 px-4 py-2">{{ __('label.title.name') }}</th>
                            <th class="border-b-2 border-gray-200 px-4 py-2">{{ __('label.status.name') }}</th>
                            <th class="border-b-2 border-gray-200 px-4 py-2 hidden sm:table-cell">{{ __('label.submitted.name') }}</th>
                            <th width="20%" class="border-b-2 border-gray-200 px-4 py-2 hidden sm:table-cell">{{ __('label.created.name') }} / {{ __('label.updated.name') }}</th>
                            <th class="border-b-2 border-gray-200 px-4 py-2 text-center">{{ __('label.action.name') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($photos as $photo)
                        <tr>
                            <td class="border-b-2 border-gray-100 px-4 py-2 hidden sm:table-cell">{{ $photo->no }}</td>
                            <td class="border-b-2 border-gray-100 px-4 py-2 hidden sm:table-cell">
                                @if($photo->image && $photo->hasImage('image'))
                                    <div class="bg-cover bg-center bg-auto border-solid border-white border-2 shadow-md w-full h-20" style="background-image:url({{ $photo->getImage('image') }});"></div>
                                @else
                                    <div class="bg-cover bg-center bg-auto border-solid border-white border-2 shadow-md w-full h-20" style="background-image:url({{ url('img/placeholder.jpg') }});"></div>
                                @endif
                            </td>
                            <td class="border-b-2 border-gray-100 px-4 py-2">{{ $photo->title }}</td>
                            <td class="border-b-2 border-gray-100 px-4 py-2">
                                @if($photo->active)
                                    <span class="rounded px-2 py-1 text-xs bg-indigo-500 text-white">{{ __('label.status.active') }}</span> 
                                @else
                                    <span class="rounded px-2 py-1 text-xs bg-gray-500 text-white">{{ __('label.status.draft') }}</span> 
                                @endif
                            </td>
                            <td class="border-b-2 border-gray-100 px-4 py-2 hidden sm:table-cell">{{ ($photo->submitted_at) ? $photo->submitted_at->toFormattedDateString() : null }}</td>
                            <td class="border-b-2 border-gray-100 px-4 py-2 hidden sm:table-cell">
                                {{ ($photo->created_at) ? $photo->created_at->toFormattedDateString() : null }}
                                <br/>
                                {{ ($photo->updated_at) ? $photo->updated_at->toFormattedDateString() : null }}
                            </td>
                            <td class="border-b-2 border-gray-100 px-4 py-2 text-center">
                                @include('components.backend.action',array('id' => $photo->id))
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if($photos->hasPages())
                    <div class="grid sm:grid-flow-col gap-4 mt-5">
                        <div class="col-span-12 sm:col-span-6">
                            <input type="text" class="form-input" placeholder="{{ __('pagination.go_to_page') }}" wire:model="page">
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            {!! $photos->withQueryString()->links() !!}
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
@endif