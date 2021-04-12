<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('menu.'.mb_strtolower($pageName).'.name') }}
    </h2>
</x-slot>
<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 mb-10">
<form enctype="multipart/form-data" wire:submit.prevent="store()">
@csrf
    <div class="shadow overflow-hidden sm:rounded-md">
        <div class="bg-white">
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
            <div class="bg-white px-4 sm:pt-3 pb-4 sm:p-6 sm:pb-4">
                <h5 class="font-semibold text-md text-indigo-500 leading-tight pb-4">
                    {{ __('label.method.'.mb_strtolower($this->method)) }} 
                </h5>
                <div class="grid sm:grid-cols-12 gap-4">
                    <div class="col-span-12 sm:col-span-4">
                        <div class="mb-4">
                            <x-jet-label for="copyright" value="{{ __('label.copyright.name') }}" wire:model="copyright" />
                            <x-jet-input id="copyright" type="text" class="mt-1 block w-full" wire:model="copyright" name="copyright" placeholder="{{ __('label.copyright.placeholder') }}" />
                            <x-jet-input-error for="copyright" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-backend.image wire:model.defer="image" :id="'image-'.$this->slideId" 
                                width="{{ $width }}"
                                height="{{ $height }}"
                                module="{{ $this->module }}" 
                                name="image" 
                                value="{{ $this->image }}" 
                                label="{{ __('label.image.name') }}" 
                                placeholder="{{ __('label.image.placeholder') }}" />
                        </div>
                        <div class="mb-4">
                            <x-backend.image wire:model.defer="image_mobile" :id="'image-mobile-'.$this->slideId" 
                                width="{{ $widthMobile }}"
                                height="{{ $heightMobile }}"
                                module="{{ $this->module }}" 
                                name="image_mobile" 
                                value="{{ $this->image_mobile }}" 
                                label="{{ __('label.image.name') }} {{ __('Mobile') }}" 
                                placeholder="{{ __('label.image.placeholder') }}" />
                        </div>
                        @if($this->tabLang == 'en')
                            <div class="mb-4">
                                <x-jet-label for="caption" value="{{ __('label.caption.name') }} {{ (config('app.bilingual') == true) ? '('.__('language.en.alias').')' : '' }}" wire:model="caption" />
                                <x-jet-input id="caption" type="text" class="mt-1 block w-full" wire:model="caption" name="caption" placeholder="{{ __('label.caption.placeholder') }}" />
                                <x-jet-input-error for="caption" class="mt-2" />
                            </div>
                        @else
                            <div class="mb-4">
                                <x-jet-label for="caption_id" value="{{ __('label.caption.name') }} {{ (config('app.bilingual') == true) ? '('.__('language.id.alias').')' : '' }}" wire:model="caption_id" />
                                <x-jet-input id="caption_id" type="text" class="mt-1 block w-full" wire:model="caption_id" name="caption_id" placeholder="{{ __('label.caption.placeholder') }}" />
                                <x-jet-input-error for="caption_id" class="mt-2" />
                            </div>
                        @endif
                    </div>
                    <div class="col-span-12 sm:col-span-8">
                        @if($this->tabLang == 'en')
                            <div class="mb-4">
                                <x-jet-label for="title" value="{{ __('label.title.name') }} {{ (config('app.bilingual') == true) ? '('.__('language.en.alias').')' : '' }}" wire:model="title" />
                                <x-jet-input id="title" type="text" class="mt-1 block w-full" wire:model="title" name="title" placeholder="{{ __('label.title.placeholder') }}" />
                                <x-jet-input-error for="title" class="mt-2" />
                            </div>
                            <div class="mb-4">
                                <x-jet-label for="description" value="{{ __('label.description.name') }} {{ (config('app.bilingual') == true) ? '('.__('language.en.alias').')' : '' }}" wire:model="description" />
                                <x:backend.textarea wire:model="description" name="description" placeholder="{{ __('label.description.placeholder') }}"/>
                                <x-jet-input-error for="description" class="mt-2" />
                            </div>
                            <div class="mb-4">
                                <x-jet-label for="button" value="{{ __('label.button.name') }} {{ (config('app.bilingual') == true) ? '('.__('language.en.alias').')' : '' }}" wire:model="button" />
                                <x-jet-input id="button" type="text" class="mt-1 block w-full" wire:model="button" name="button" placeholder="{{ __('label.button.placeholder') }}" />
                                <x-jet-input-error for="button" class="mt-2" />
                            </div>
                        @else
                            <div class="mb-4">
                                <x-jet-label for="title_id" value="{{ __('label.title.name') }} {{ (config('app.bilingual') == true) ? '('.__('language.id.alias').')' : '' }}" wire:model="title_id" />
                                <x-jet-input id="title_id" type="text" class="mt-1 block w-full" wire:model="title_id" name="title_id" placeholder="{{ __('label.title.placeholder') }}" />
                                <x-jet-input-error for="title_id" class="mt-2" />
                            </div>
                            <div class="mb-4">
                                <x-jet-label for="description_id" value="{{ __('label.description.name') }} {{ (config('app.bilingual') == true) ? '('.__('language.id.alias').')' : '' }}" wire:model="description_id" />
                                <x:backend.textarea wire:model="description_id" name="description_id" placeholder="{{ __('label.description.placeholder') }}"/>
                                <x-jet-input-error for="description_id" class="mt-2" />
                            </div>
                            <div class="mb-4">
                                <x-jet-label for="button_id" value="{{ __('label.button.name') }} {{ (config('app.bilingual') == true) ? '('.__('language.id.alias').')' : '' }}" wire:model="button_id" />
                                <x-jet-input id="button_id" type="text" class="mt-1 block w-full" wire:model="button_id" name="button_id" placeholder="{{ __('label.button.placeholder') }}" />
                                <x-jet-input-error for="button_id" class="mt-2" />
                            </div>
                        @endif
                        <div class="bg-gray-100 px-4 sm:pt-5 pb-4 sm:p-6 sm:pb-5 shadow rounded-md">
                            <div class="mb-4">
                                <x-jet-label for="url" value="{{ __('label.url.name') }}" wire:model="url" />
                                <x-jet-input id="url" type="text" class="mt-1 block w-full" wire:model="url" name="url" placeholder="{{ __('label.caption.placeholder') }}" />
                                <x-jet-input-error for="url" class="mt-2" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="shadow overflow-hidden fixed bottom-0 left-0 right-0">
        <div class="bg-indigo-100 px-4 py-3 sm:px-6 grid sm:grid-flow-col gap-4 text-left">
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
                    <x-backend.toggle wire:model.defer="active" :id="'active-'.$this->slideId" name="active" value="active" label="{{ __('label.active.name') }}" />
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
    </div>
    
</form>
</div>

