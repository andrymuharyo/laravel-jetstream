
@if($isForm)
    @include('livewire.backend.'.$pageName.'.form')
@else
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $pageName }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="bg-gray-50 p-3 px-5">
                <div class="flex justify-between">
                    <div class="hidden sm:inline-flex">
                        <div class="flex">
                            <div>
                                <x:backend.dropdown :withSearch="true" wire:model.defer="sortBy" name="sortBy" :options="$sort" wire:change="sortBy($event.target.value)">
                                    <option value="">sort by...</option>
                                </x:backend.dropdown>
                            </div>
                            <div class="pl-5">
                                <x:backend.dropdown :withSearch="false" wire:model.defer="showDataTotal" name="showDataTotal" :options="$show" wire:change="showDataTotal($event.target.value)">
                                    <option value="">show data total...</option>
                                </x:backend.dropdown>
                            </div>
                        </div>
                    </div>
                    <div class="justify-self-end">
                        <x-jet-button wire:click="create()" class="button-large py-2.5 px-4 mb-4">{{ __('label.new.name',array('attribute'=> mb_strtolower($pageName))) }}</x-jet-button>
                    </div>
                </div>
            </div>
            <div class="bg-white">
                <div class="flex justify-between">
                    <div>
                        <nav class="flex justify-start">
                            <div>
                                <button wire:click="$set('tab', 'index')" class="flex py-4 px-6 text-gray-700 hover:text-indigo-600 {{ $tab == 'index' ? 'border-b-2 border-indigo-400' : '' }} focus:outline-none">
                                    {{ __('label.index.name') }}
                                </button>
                            </div>
                            <div>
                                <button wire:click="$set('tab', 'archive')" class="flex py-4 px-6 text-gray-700 hover:text-indigo-600 {{ $tab == 'archive' ? 'border-b-2 border-indigo-400' : '' }} focus:outline-none">
                                    {{ __('label.archive.name') }}                                
                                </button>
                            </div>
                        </nav>
                    </div>
                    <div class="py-3 px-6 hidden sm:inline-flex">
                        <div class="relative mr-3">
                            
                        </div>
                        <div class="relative">
                            <x-jet-input id="search" type="text" class="flex pr-10" wire:model="search" placeholder="{{ __('label.search.placeholder',array('attribute'=> mb_strtolower($pageName))) }}" />
                            @if($search)
                                <span class="absolute top-0 right-0 py-3 px-3 cursor-pointer z-10 " wire:click="searchClear()">
                                    <x-heroicon-o-x class="text-gray-500 h-4 bg-white" />
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-4 py-4 bg-white sm:p-6">
                @if(count($articles) > 0)
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
                        @foreach($articles as $article)
                        <tr>
                            <td class="border-b-2 border-gray-100 px-4 py-2 hidden sm:table-cell">{{ $loop->iteration }}</td>
                            <td class="border-b-2 border-gray-100 px-4 py-2 hidden sm:table-cell">
                                @if($article->image && $article->hasImage('image'))
                                    <div class="bg-cover bg-center bg-auto border-solid border-white border-2 shadow-md w-full h-20" style="background-image:url({{ $article->getImage('image') }});"></div>
                                @else
                                    <div class="bg-cover bg-center bg-auto border-solid border-white border-2 shadow-md w-full h-20" style="background-image:url({{ url('img/placeholder.jpg') }});"></div>
                                @endif
                            </td>
                            <td class="border-b-2 border-gray-100 px-4 py-2">{{ $article->title }}</td>
                            <td class="border-b-2 border-gray-100 px-4 py-2">
                                @if($article->active)
                                    <span class="rounded px-2 py-1 text-xs bg-indigo-500 text-white">{{ __('label.status.active') }}</span> 
                                @else
                                    <span class="rounded px-2 py-1 text-xs bg-gray-500 text-white">{{ __('label.status.draft') }}</span> 
                                @endif
                            </td>
                            <td class="border-b-2 border-gray-100 px-4 py-2 hidden sm:table-cell">{{ ($article->submitted_at) ? $article->submitted_at->toFormattedDateString() : null }}</td>
                            <td class="border-b-2 border-gray-100 px-4 py-2 hidden sm:table-cell">
                                {{ ($article->created_at) ? $article->created_at->toFormattedDateString() : null }}
                                <br/>
                                {{ ($article->updated_at) ? $article->updated_at->toFormattedDateString() : null }}
                            </td>
                            <td class="border-b-2 border-gray-100 px-4 py-2 text-center">
                                @include('components.backend.action',array('id' => $article->id))
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-5">
                    {!! $articles->withQueryString()->links() !!}
                </div>
                @else
                    <div class="bg-gray-100 p-3 rounded-lg">
                        @if($this->tab == 'index')
                            <h3 class="text-center">{{ __('label.no_data',array('attribute'=> ucfirst($this->module))) }}</h3>
                        @else
                            <h3 class="text-center">{{ __('label.no_data',array('attribute'=> __('label.action.archive'))) }}</h3>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
@endif