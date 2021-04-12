<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('menu.'.mb_strtolower($pageName).'.name') }}
    </h2>
</x-slot>
<div class="max-w-2xl mx-auto py-10 sm:px-6 lg:px-8 mb-10">  
    <form enctype="multipart/form-data" wire:submit.prevent="store()">
    @csrf
    <div class="shadow overflow-hidden sm:rounded-md">
        <div class="bg-white">   
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h5 class="font-semibold text-md text-indigo-500 leading-tight pb-4">
                        {{ __('label.method.'.mb_strtolower($this->method)) }} 
                    </h5>
                    <div class="grid sm:grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-12">
                            <div class="mb-4">
                                <x-jet-label for="title" value="{{ __('label.title.name') }}" wire:model="title" />
                                <x-jet-input id="title" type="text" class="mt-1 block w-full" wire:model="title" name="title" placeholder="{{ __('label.title.placeholder') }}" />
                                <x-jet-input-error for="title" class="mt-2" />
                            </div>
                            <div class="mb-4">
                                <x-jet-label for="author" value="{{ __('label.author.name') }}" wire:model="author" />
                                <x-jet-input id="author" type="text" class="mt-1 block w-full" wire:model="author" name="author" placeholder="{{ __('label.author.placeholder') }}" />
                                <x-jet-input-error for="author" class="mt-2" />
                            </div>
                            <div class="mb-4">
                                <x-jet-label for="copyright" value="{{ __('label.copyright.name') }}" wire:model="copyright" />
                                <x-jet-input id="copyright" type="text" class="mt-1 block w-full" wire:model="copyright" name="copyright" placeholder="{{ __('label.copyright.placeholder') }}" />
                                <x-jet-input-error for="copyright" class="mt-2" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4 shadow overflow-hidden sm:rounded-md">
            <div class="bg-white px-4 sm:pt-5 pb-4 sm:p-6 sm:pb-5">

                <div class="grid sm:grid-cols-12 gap-4">
                    <div class="col-span-12 sm:col-span-4">
                        <div class="col-span-12 sm:col-span-6">
                            <div class="mb-4">
                                <x-backend.image wire:model.defer="image" :id="'image-'.$this->metaId" 
                                    width="{{ $width }}"
                                    height="{{ $height }}"
                                    module="{{ $this->module }}" 
                                    name="image" 
                                    value="{{ $this->image }}" 
                                    label="{{ __('label.image.name') }}" 
                                    placeholder="{{ __('label.image.placeholder') }}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-8">
                        <div class="mb-4">
                            <x-jet-label for="description" value="{{ __('label.description.name') }}" wire:model="description" />
                            <x:backend.textarea wire:model="description" name="description"/>
                            <x-jet-input-error for="description" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-jet-label for="keywords" value="{{ __('label.keywords.name') }}" wire:model="keywords" />
                            <x:backend.textarea wire:model="keywords" name="keywords"/>
                            <x-jet-input-error for="keywords" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-jet-label for="analytic" value="{{ __('label.analytics.name') }}" wire:model="analytic" />
                            <x:backend.textarea wire:model="analytic" name="analytic"/>
                            <x-jet-input-error for="analytic" class="mt-2" />
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

