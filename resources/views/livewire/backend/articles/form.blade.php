<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $pageName }}
        </h2>
</x-slot>
<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <div class="shadow overflow-hidden sm:rounded-md">
        <div class="bg-white">        
            <form enctype="multipart/form-data" wire:submit.prevent="store()">
                @csrf
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h5 class="font-semibold text-xl text-gray-800 leading-tight pb-4">
                        {{ $pageName }}
                    </h5>
                    <div class="grid sm:grid-flow-col gap-4">
                        <div class="col">
                            <div class="mb-4">
                                <x-jet-label for="submitted_at" value="{{ __('label.submitted.name') }}" wire:model="submitted_at" />
                                <x-backend.datepicker wire:model.defer="submitted_at" :id="'submitted-at-'.$this->articleId" name="submitted_at" value="{{ $this->submitted_at }}" ></x-backend-datepicker>
                            </div>
                            <div class="mb-4">
                                <x-backend.file wire:model.defer="image" :id="'image-'.$this->articleId" 
                                    type="image" 
                                    module="{{ $this->module }}" 
                                    name="image" 
                                    value="{{ $this->image }}" 
                                    label="{{ __('label.image.name') }}" 
                                    placeholder="{{ __('label.image.placeholder') }}" />
                            </div>
                            <div class="mb-4">
                                <x-jet-label for="caption" value="{{ __('label.caption.name') }}" wire:model="caption" />
                                <x-jet-input id="caption" type="text" class="mt-1 block w-full" wire:model="caption" name="caption" placeholder="{{ __('label.caption.placeholder') }}" />
                                <x-jet-input-error for="caption" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-span-5">
                            <div class="mb-4">
                                <x-jet-label for="title" value="{{ __('label.title.name') }}" wire:model="title" />
                                <x-jet-input id="title" type="text" class="mt-1 block w-full" wire:model="title" name="title" placeholder="{{ __('label.title.placeholder') }}" />
                                <x-jet-input-error for="title" class="mt-2" />
                            </div>
                            <div class="mb-4">
                                <x-jet-label for="intro" value="{{ __('label.intro.name') }}" wire:model="intro" />
                                <x:backend.textarea wire:model="intro" name="intro"/>
                                <x-jet-input-error for="intro" class="mt-2" />
                            </div>
                            <div class="mb-4">
                                <x-jet-label for="description" value="{{ __('label.description.name') }}" wire:model="description" />
                                <x:backend.wysiwyg wire:model="description" name="description" type="advanced"/>
                                <x-jet-input-error for="description" class="mt-2" />
                            </div>
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
                            <x-backend.toggle wire:model.defer="active" :id="'active-'.$this->articleId" name="active" value="active" label="{{ __('label.active.name') }}" />
                        </span>
                    </div>
                    <div class="mt-1 grid-flow-col sm:text-right">
                        <span class="inline w-full rounded-md shadow-sm sm:mt-0 w-50 sm:w-auto">
                            <x-jet-secondary-button wire:click="closeForm()">
                                <div wire:loading.remove wire:target="closeForm()">{{ __('label.action.cancel') }}</div>
                                <div wire:loading wire:target="closeForm()">{{ __('Exit...') }} </div>
                            </x-jet-secondary-button>
                        </span>
                        <span class="inline w-full rounded-md shadow-sm sm:ml-3 w-50 sm:w-auto">
                            <x-jet-button type="submit">
                                <div wire:loading.remove wire:target="store">{{ __('label.action.save') }}</div>
                                <div wire:loading wire:target="store">{{ __('Saving...') }} </div>
                            </x-jet-button>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

