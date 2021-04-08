
<div>
    <x-jet-section-border />
    <div class="grid sm:grid-cols-12 gap-4">
        <div class="col-span-12 sm:col-span-6">
            <x-jet-button type="button" wire:click.prevent="addItem({{ $i }})" class="button-large py-2.5 px-4 mb-4">
                <x-heroicon-o-plus class="h-4 text-white"/> {{ __('action.add.name',array('attribute'=> __('menu.'.mb_strtolower($pageName).'.name'))) }}
            </x-jet-button>
        </div>
        @if(count($this->savedItems) <> 0)
            <div class="col-span-12 sm:col-span-6 text-right">
                @if($this->isCollapse)
                    <x-jet-button type="button" class="button-large bg-pink-400 hover:bg-pink-500 focus:bg-pink-500 active:bg-pink-500 border-pink-400 hover:border-pink-500 focus:border-pink-500 active:border-pink-500 py-2.5 px-4 mb-4" wire:click="expand()">{{ __('label.open.name') }}</x-jet-button>
                @else
                    <x-jet-button type="button" class="button-large bg-pink-400 hover:bg-pink-500 focus:bg-pink-500 active:bg-pink-500 border-pink-400 hover:border-pink-500 focus:border-pink-500 active:border-pink-500 py-2.5 px-4 mb-4" wire:click="collapse()">{{ __('label.close.name') }}</x-jet-button>
                @endif
            </div>
        @endif
    </div>
        @foreach($this->items as $key => $item)
            <div class="my-2 mb-4 bg-indigo-200 shadow-md rounded-md p-5">
                <div class="grid sm:grid-cols-12 gap-4">
                    <div class="col-span-12 sm:col-span-4">
                        <div class="mb-4">
                            <x-backend.image wire:model="imageItem.{{ $item }}" :id="'imageItem.{{ $key }}'" 
                                module="{{ $this->module }}" 
                                name="imageItem" 
                                value="imageItem.{{ $key }}" 
                                label="{{ __('label.image.name') }}" 
                                items="true"
                                required="required"
                                placeholder="{{ __('label.image.placeholder') }}" />
                        </div>
                    </div>
                    <div class="col-span-10 sm:col-span-4">
                        <div class="mb-4">
                            <x-jet-label for="titleItem.{{ $key }}" value="{{ __('label.title.name') }} {{ (config('app.bilingual') == true) ? '('.__('language.en.alias').')' : '' }}" wire:model="titleItem.{{ $key }}" />
                            <x-jet-input id="titleItem.{{ $key }}" type="text" class="mt-1 block w-full" wire:model="titleItem.{{ $key }}" name="titleItem.{{ $key }}" placeholder="{{ __('label.title.placeholder') }}" required="required"/>
                            <x-jet-input-error for="titleItem.{{ $key }}" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-jet-label for="captionItem.{{ $key }}" value="{{ __('label.caption.name') }} {{ (config('app.bilingual') == true) ? '('.__('language.en.alias').')' : '' }}" wire:model="captionItem.{{ $key }}" />
                            <x-jet-input id="captionItem.{{ $key }}" type="text" class="mt-1 block w-full" wire:model="captionItem.{{ $key }}" name="captionItem.{{ $key }}" placeholder="{{ __('label.caption.placeholder') }}" required="required"/>
                            <x-jet-input-error for="captionItem.{{ $key }}" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-span-10 sm:col-span-3">
                        <div class="mb-4">
                            <x-jet-label for="titleIdItem.{{ $key }}" value="{{ __('label.title.name') }} {{ (config('app.bilingual') == true) ? '('.__('language.id.alias').')' : '' }}" wire:model="titleIdItem.{{ $key }}" />
                            <x-jet-input id="titleIdItem.{{ $key }}" type="text" class="mt-1 block w-full" wire:model="titleIdItem.{{ $key }}" name="titleIdItem.{{ $key }}" placeholder="{{ __('label.title.placeholder') }}" required="required"/>
                            <x-jet-input-error for="titleIdItem.{{ $key }}" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-jet-label for="captionIdItem.{{ $key }}" value="{{ __('label.caption.name') }} {{ (config('app.bilingual') == true) ? '('.__('language.id.alias').')' : '' }}" wire:model="captionIdItem.{{ $key }}" />
                            <x-jet-input id="captionIdItem.{{ $key }}" type="text" class="mt-1 block w-full" wire:model="captionIdItem.{{ $key }}" name="captionIdItem.{{ $key }}" placeholder="{{ __('label.caption.placeholder') }}" required="required"/>
                            <x-jet-input-error for="captionIdItem.{{ $key }}" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <div class="mb-4 pt-6">
                            <x-jet-danger-button type="button" wire:click.prevent="removeItem({{ $key }})" class="button-large py-3.5 px-4 mb-0"><x-heroicon-o-x class="h-4 text-white"/></x-jet-danger-button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @if(count($this->savedItems) <> 0)
            <div wire:sortable="reOrder" class="overflow-hidden">
                @foreach($this->savedItems as $key => $savedItem)
                    <section class="mb-4 draggable-section" wire:key="{{ $this->itemId[$key] }}" wire:sortable.item="{{ $this->itemId[$key] }}">
                        <div class="draggable-item grid sm:grid-cols-12 gap-4 bg-gray-200 shadow-md rounded-md relative {{ $this->isCollapse ? 'p-5' : 'p-8' }}">
                            @if($this->isCollapse)
                                <div wire:sortable.handle class="absolute top-2 left-2 text-gray-800 cursor-move">
                                    <x-heroicon-o-selector class="h-5 inline"/> {{ $this->savedTitleItem[$key] }}
                                </div>
                            @endif
                            <div class="col-span-12 sm:col-span-3 {{ $this->isCollapse ? 'hidden' : '' }}">
                                <div class="mb-4">
                                    <x-jet-label for="savedItem.image" value="{{ __('label.image.name') }}" wire:model="savedItem.image" />
                                    @if($this->savedImageItem[$key]) 
                                        <div class="bg-cover bg-center bg-auto border-solid border-white border-2 shadow-md h-60 w-full" style="background-image:url({{ url('storage/'.$this->module.'/'.$this->savedImageItem[$key]) }});"></div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-span-10 sm:col-span-1 {{ $this->isCollapse ? 'hidden' : '' }}">
                                <div class="mb-4">
                                    <x-jet-label for="savedOrderItem.{{ $key }}" value="#" wire:model="savedOrderItem.{{ $key }}" />
                                    <x-jet-input id="savedOrderItem.{{ $key }}" type="text" class="mt-1 block w-full" wire:model="savedOrderItem.{{ $key }}" name="savedOrderItem.{{ $key }}" placeholder="{{ __('#') }}" />
                                    <x-jet-input-error for="savedOrderItem.{{ $key }}" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-span-10 sm:col-span-4 {{ $this->isCollapse ? 'hidden' : '' }}">
                                <div class="mb-4">
                                    <x-jet-label for="savedTitleItem.{{ $key }}" value="{{ __('label.title.name') }} {{ (config('app.bilingual') == true) ? '('.__('language.en.alias').')' : '' }}" wire:model="savedTitleItem.{{ $key }}" />
                                    <x-jet-input id="savedTitleItem.{{ $key }}" type="text" class="mt-1 block w-full" wire:model="savedTitleItem.{{ $key }}" name="savedTitleItem.{{ $key }}" placeholder="{{ __('label.title.placeholder') }}" />
                                    <x-jet-input-error for="savedTitleItem.{{ $key }}" class="mt-2" />
                                </div>
                                <div class="mb-4">
                                    <x-jet-label for="savedCaptionItem.{{ $key }}" value="{{ __('label.caption.name') }} {{ (config('app.bilingual') == true) ? '('.__('language.en.alias').')' : '' }}" wire:model="savedCaptionItem.{{ $key }}" />
                                    <x-jet-input id="savedCaptionItem.{{ $key }}" type="text" class="mt-1 block w-full" wire:model="savedCaptionItem.{{ $key }}" name="savedCaptionItem.{{ $key }}" placeholder="{{ __('label.caption.placeholder') }}" />
                                    <x-jet-input-error for="savedCaptionItem.{{ $key }}" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-span-10 sm:col-span-3 {{ $this->isCollapse ? 'hidden' : '' }}">
                                <div class="mb-4">
                                    <x-jet-label for="savedTitleIdItem.{{ $key }}" value="{{ __('label.title.name') }} {{ (config('app.bilingual') == true) ? '('.__('language.id.alias').')' : '' }}" wire:model="savedTitleIdItem.{{ $key }}" />
                                    <x-jet-input id="savedTitleIdItem.{{ $key }}" type="text" class="mt-1 block w-full" wire:model="savedTitleIdItem.{{ $key }}" name="savedTitleIdItem.{{ $key }}" placeholder="{{ __('label.title.placeholder') }}" />
                                    <x-jet-input-error for="savedTitleIdItem.{{ $key }}" class="mt-2" />
                                </div>
                                <div class="mb-4">
                                    <x-jet-label for="savedCaptionIdItem.{{ $key }}" value="{{ __('label.caption.name') }} {{ (config('app.bilingual') == true) ? '('.__('language.id.alias').')' : '' }}" wire:model="savedCaptionIdItem.{{ $key }}" />
                                    <x-jet-input id="savedCaptionIdItem.{{ $key }}" type="text" class="mt-1 block w-full" wire:model="savedCaptionIdItem.{{ $key }}" name="savedCaptionIdItem.{{ $key }}" placeholder="{{ __('label.caption.placeholder') }}" />
                                    <x-jet-input-error for="savedCaptionIdItem.{{ $key }}" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-span-2 sm:col-span-1 {{ $this->isCollapse ? 'hidden' : '' }}">
                                <div class="mb-4 pt-6">
                                    <x-jet-danger-button class="button-large py-3.5 px-4 mb-0" wire:click="destroyItem({{ $this->itemId[$key] }},{{ $key }})" title="{{ __('action.delete.name') }}">
                                        <x-heroicon-o-trash class="h-4 text-white"/>
                                    </x-jet-danger-button>
                                </div>
                            </div>
                        </div>
                    </section>
                @endforeach
            </div>
        @endif
</div>