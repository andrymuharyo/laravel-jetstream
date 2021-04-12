
@if($isForm)
@include('livewire.backend.slides.form')
@else
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('menu.'.mb_strtolower($pageName).'.name') }}
    </h2>
</x-slot>
<div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
    <div class="shadow overflow-hidden sm:rounded-md">
        <div class="bg-gray-50 pt-3 pb-0 px-4">
            <div class="flex justify-between">
                <div class="justify-self-start">
                    <x-jet-button wire:click="create()" class="button-large py-2.5 px-4 mb-4"><x-heroicon-o-plus class="h-4 pr-3 text-white"/> {{ __('action.new.name',array('attribute'=> __('menu.'.mb_strtolower($pageName).'.name'))) }}</x-jet-button>
                </div>
                <div class="justify-self-end">
                    <x-jet-button class="hidden button-large bg-pink-400 hover:bg-pink-500 focus:bg-pink-500 active:bg-pink-500 border-pink-400 hover:border-pink-500 focus:border-pink-500 active:border-pink-500 py-2.5 px-4 mb-4 expand-nestable">{{ __('label.open.name') }}</x-jet-button>
                    <x-jet-button class="button-large bg-pink-400 hover:bg-pink-500 focus:bg-pink-500 active:bg-pink-500 border-pink-400 hover:border-pink-500 focus:border-pink-500 active:border-pink-500 py-2.5 px-4 mb-4 collapse-nestable">{{ __('label.close.name') }}</x-jet-button>
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
            @if(count($slides) > 0)
            <div wire:sortable="reOrder" wire:sortable-group="reOrder" class="overflow-hidden">
                @foreach($slides as $key => $slide)
                    <section class="mb-4 draggable-section" wire:key="group-{{ $slide->id }}" wire:sortable.item="{{ $slide->id }}">
                        <div class="draggable-item bg-gray-100 rounded-md shadow">
                            <div class="relative py-3 px-5">
                                <div class="grid grid-cols-12 gap-2">
                                    <div wire:sortable.handle class="col-span-12 sm:col-span-1 text-gray-800 cursor-move">
                                        <x-heroicon-o-selector class="h-4 inline"/>
                                    </div>
                                    <div class="col-span-12 sm:col-span-4">
                                        <p class="overflow-ellipsis overflow-hidden truncate">{{ $slide->title }}</p>
                                    </div>
                                </div>
                                <span class="absolute top-2 left-96 hidden sm:flex">
                                    @if($slide->active)
                                        <span class="rounded relative top-1 px-2 py-1 text-xs bg-indigo-500 text-white">{{ __('label.status.active') }}</span> 
                                    @else
                                        <span class="rounded relative top-1 px-2 py-1 text-xs bg-gray-500 text-white">{{ __('label.status.draft') }}</span> 
                                    @endif
                                </span>
                                <span class="absolute top-2 right-2">
                                    @include('components.backend.action-nestable',array('id' => $slide->id,'create' => false))
                                </span>
                            </div>
                        </div>
                    </section>
                @endforeach
            </div>
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