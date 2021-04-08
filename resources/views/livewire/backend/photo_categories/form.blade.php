
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('menu.'.mb_strtolower(str_replace('_categories','s',$pageName)).'.name') }} {{ __('menu.categories.name') }}
    </h2>
</x-slot>
<div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
    <div class="shadow overflow-hidden sm:rounded-md">
        <div class="bg-white">        
            <form enctype="multipart/form-data" wire:submit.prevent="store()">
                @csrf
                @if (config('app.bilingual') == true)
                    <div class="bg-gray-100">
                        <nav class="flex sm:grid-flow-col mb-3">
                            <div class="col-span-12 sm:col-span-6">
                                <button type="button" wire:click="$set('tabLang', 'en')" class="inline sm:flex py-4 px-6 text-gray-700 hover:text-indigo-600 {{ $tabLang == 'en' ? 'border-b-2 border-indigo-400' : '' }} focus:outline-none">
                                    <span class="inline-flex sm:hidden"><x-heroicon-o-collection class="text-gray-500 h-4" /></span>
                                    <span class="hidden sm:inline-flex">{{ __('language.en.name') }}</span>
                                </button>
                            </div>
                            <div class="col-span-12 sm:col-span-6">
                                <button type="button" wire:click="$set('tabLang', 'id')" class="inline sm:flex py-4 px-6 text-gray-700 hover:text-indigo-600 {{ $tabLang == 'id' ? 'border-b-2 border-indigo-400' : '' }} focus:outline-none">
                                    <span class="inline-flex sm:hidden"><x-heroicon-o-archive class="text-gray-500 h-4" /></span> 
                                    <span class="hidden sm:inline-flex">{{ __('language.id.name') }}</span>               
                                </button>
                            </div>
                        </nav>
                    </div>
                @endif
                <div class="bg-white px-4 pt-2 sm:pt-2 pb-4 sm:p-6 sm:pb-4">
                    <h5 class="font-semibold text-md text-indigo-500 leading-tight pb-4">
                        {{ __('label.method.'.mb_strtolower($this->method)) }} 
                    </h5>
                    <div class="grid sm:grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-4">
                            <div class="mb-4">
                                <x-jet-label for="submitted_at" value="{{ __('label.submitted.name') }}" wire:model="submitted_at" />
                                <x-backend.datepicker wire:model.defer="submitted_at" :id="'submitted-at-'.$this->photoCategoryId" name="submitted_at" value="{{ $this->submitted_at }}" ></x-backend-datepicker>
                                <x-jet-input-error for="submitted_at" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-8">
                            @if($this->tabLang == 'en')
                                <div class="mb-4">
                                    <x-jet-label for="title" value="{{ __('label.title.name') }} {{ (config('app.bilingual') == true) ? '('.__('language.en.alias').')' : '' }}" wire:model="title" />
                                    <x-jet-input id="title" type="text" class="mt-1 block w-full" wire:model="title" name="title" placeholder="{{ __('label.title.placeholder') }}" />
                                    <x-jet-input-error for="title" class="mt-2" />
                                </div>
                            @else
                                <div class="mb-4">
                                    <x-jet-label for="title_id" value="{{ __('label.title.name') }} {{ (config('app.bilingual') == true) ? '('.__('language.id.alias').')' : '' }}" wire:model="title_id" />
                                    <x-jet-input id="title_id" type="text" class="mt-1 block w-full" wire:model="title_id" name="title_id" placeholder="{{ __('label.title.placeholder') }}" />
                                    <x-jet-input-error for="title_id" class="mt-2" />
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 px-4 py-3 sm:px-6 grid sm:grid-flow-col gap-4 text-left">
                    <div class="pt-2">
                        <x-heroicon-o-calendar class="inline h-4 text-dark"/>
                        @if($this->updated_at) 
                            <span class="text-xs">{{ __('label.updated.name') }} : {{ $this->updated_at->toFormattedDateString() }}</span>
                        @else
                            <span class="text-xs">{{ __('label.created.name') }} : {{ now()->toFormattedDateString() }}</span>
                        @endif
                    </div>
                    <div class="mt-1">
                        <span class="inline w-full sm:mt-0 sm:w-auto">
                            <x-backend.toggle wire:model.defer="active" :id="'active-'.$this->photoCategoryId" name="active" value="active" label="{{ __('label.active.name') }}" />
                        </span>
                    </div>
                    <div class="mt-1 grid-flow-col sm:text-right">
                        <span class="inline w-full rounded-md shadow-sm sm:ml-3 w-50 sm:w-auto">
                            <x-jet-secondary-button wire:click="closeForm()" class="mr-2">
                                <div wire:loading.remove wire:target="closeForm()">{{ __('action.cancel.name') }}</div>
                                <div wire:loading wire:target="closeForm()">{{ __('action.cancel.loading') }} </div>
                            </x-jet-secondary-button>
                            <x-jet-button type="submit" class="mr-2 bg-yellow-300 hover:bg-yellow-500 focus:bg-yellow-500 active:bg-yellow-500" wire:click="onSave('stay')">
                                <div wire:loading.remove wire:target="store"><x-heroicon-o-save class="h-4 text-white inline-flex align-top"/> {{ __('action.save.name') }}</div>
                                <div wire:loading wire:target="store">{{ __('action.save.loading') }} </div>
                            </x-jet-button>
                            <x-jet-button type="submit" class="bg-indigo-500 hover:bg-indigo-600 focus:bg-indigo-600 active:bg-indigo-600" wire:click="onSave('exit')">
                                <div wire:loading.remove wire:target="store"><x-heroicon-o-save class="h-4 text-white inline-flex align-top"/> {{ __('action.save.exit') }}</div>
                                <div wire:loading wire:target="store">{{ __('action.save.loading') }} </div>
                            </x-jet-button>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

