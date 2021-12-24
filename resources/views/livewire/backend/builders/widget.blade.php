<div>
    <x-jet-section-border />
    <div>
        <x-jet-button type="button" wire:click.prevent="openWidget()" class="button-large py-2.5 px-4 mb-4">
            <x-heroicon-o-plus class="h-4 text-white"/> {{ __('action.add.name',array('attribute'=> __('label.widget.name'))) }}
        </x-jet-button>
    </div>
    @if($this->showWidgetMenu)
        <div class="bg-black opacity-50 fixed z-20 w-screen h-screen top-0 left-0"></div>
        <div class="bg-white p-5 shadow fixed z-30 top-0 right-0 w-screen max-w-xl h-screen border-l-1 border-gray-500 transform transition-opacity duration-500 ease-in-out ">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('label.widget.name') }}
            </h2>
            <x-jet-section-border />
            <div class="flex justify-items-stretch gap-6">
                <div>
                    <button type="button" class="w-100 bg-gray-300 text-dark hover:text-white focus:text-white checked:text-white hover:bg-indigo-600 focus:bg-indigo-600 checked:bg-indigo-600 inline-flex items-center px-4 py-2 border-0 rounded-md font-semibold text-xs uppercase tracking-widest focus:outline-none focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" wire:click="selectWidget('{{ __('label.widget.type.0.label') }}')" wire:change="setWidgetSelected($event.target.value)">
                        <x-heroicon-o-menu-alt-2 class="h-4 text-dark hover:text-white focus:text-white inline-flex align-top mr-3"/> {{ __('label.widget.type.0.name') }}
                    </button>
                </div>
                <div>
                    <button type="button" class="w-100 bg-gray-300 text-dark hover:text-white focus:text-white checked:text-white hover:bg-indigo-600 focus:bg-indigo-600 checked:bg-indigo-600 inline-flex items-center px-4 py-2 border-0 rounded-md font-semibold text-xs uppercase tracking-widest focus:outline-none focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" wire:click="selectWidget('{{ __('label.widget.type.1.label') }}')" wire:change="setWidgetSelected($event.target.value)">
                        <x-heroicon-o-photograph class="h-4 text-dark hover:text-white focus:text-white inline-flex align-top mr-3"/> {{ __('label.widget.type.1.name') }}
                    </button>
                </div>
                <div>
                    <button type="button" class="w-100 bg-gray-300 text-dark hover:text-white focus:text-white checked:text-white hover:bg-indigo-600 focus:bg-indigo-600 checked:bg-indigo-600 inline-flex items-center px-4 py-2 border-0 rounded-md font-semibold text-xs uppercase tracking-widest focus:outline-none focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" wire:click="selectWidget('{{ __('label.widget.type.2.label') }}')" wire:change="setWidgetSelected($event.target.value)">
                        <x-heroicon-o-template class="h-4 text-dark hover:text-white focus:text-white inline-flex align-top mr-3"/> {{ __('label.widget.type.2.name') }}
                    </button>
                </div>
            </div>
            <div class="shadow absolute bottom-0 left-0 right-0">
                <div class="bg-indigo-100 px-4 py-3.5 sm:px-6">
                    <div class="flex justify-between">
                        <div>
                            <x-jet-danger-button type="button" wire:click.prevent="closeWidget()" class="button-large py-2.5 px-4">
                                {{ __('action.close.name',array('attribute'=> __('menu.'.mb_strtolower($pageName).'.name'))) }}
                            </x-jet-danger-button>
                        </div>
                        <div>
                            @if($this->widgetSelected <> null)
                                <x-jet-button type="button" class="bg-green-500 hover:bg-green-600 focus:bg-green-600 active:bg-green-600" wire:click="addWidget({{ $this->i }})">
                                    <x-heroicon-o-plus class="h-4 text-white inline-flex align-top"/> {{ __('action.add.name',array('attribute'=> __('label.widget.name'))) }}
                                </x-jet-button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="grid sm:grid-cols-12 gap-4 mb-7">
        @if(count($this->savedWidgets) <> 0)
            <div class="col-span-12 sm:col-span-6 text-right">
                @if($this->isCollapse)
                    <x-jet-button type="button" class="button-large bg-pink-400 hover:bg-pink-500 focus:bg-pink-500 active:bg-pink-500 border-pink-400 hover:border-pink-500 focus:border-pink-500 active:border-pink-500 py-2.5 px-4 mb-4" wire:click="expand()">{{ __('label.open.name') }}</x-jet-button>
                @else
                    <x-jet-button type="button" class="button-large bg-pink-400 hover:bg-pink-500 focus:bg-pink-500 active:bg-pink-500 border-pink-400 hover:border-pink-500 focus:border-pink-500 active:border-pink-500 py-2.5 px-4 mb-4" wire:click="collapse()">{{ __('label.close.name') }}</x-jet-button>
                @endif
            </div>
        @endif
    </div>
    @foreach($this->widgets as $key => $widget)
        @if($this->typeWidget[$widget] == __('label.widget.type.0.label'))
            <div class="my-2 mb-4 bg-indigo-200 shadow-md rounded-md p-5">
                <div class="grid sm:grid-cols-12 gap-4">
                    <div class="col-span-12 sm:col-span-6">
                        <h3 class="text-xl">#{{ $key }} - {{ $widget }}</h3>
                    </div>
                    <div class="col-span-12 sm:col-span-6 text-right">
                        <x-jet-danger-button type="button" wire:click.prevent="removeWidget({{ $key }})" class="button-small mb-0"><x-heroicon-o-x class="h-4 text-white"/></x-jet-danger-button>
                    </div>
                </div>
                <div class="grid sm:grid-cols-12 gap-4">
                    <div class="col-span-10 sm:col-span-6">
                        <div class="mb-4">
                            <x-jet-label for="descriptionWidget{{ $key }}" value="{{ __('label.description.name') }} {{ (config('app.bilingual') == true) ? '('.__('language.en.alias').')' : '' }}" wire:model="descriptionWidget{{ $key }}" />
                            <x:backend.wysiwyg id="descriptionWidget{{ $key }}" wire:model="descriptionWidget.{{ $key }}" name="descriptionWidget.{{ $key }}" placeholder="{{ __('label.description.placeholder') }}" type="simple"/>
                            <x-jet-input-error for="descriptionWidget{{ $key }}" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-span-10 sm:col-span-6">
                        <div class="mb-4">
                            <x-jet-label for="descriptionIdWidget{{ $key }}" value="{{ __('label.description.name') }} {{ (config('app.bilingual') == true) ? '('.__('language.id.alias').')' : '' }}" wire:model="descriptionIdWidget{{ $key }}" />
                            <x:backend.wysiwyg id="descriptionIdWidget{{ $key }}" wire:model="descriptionIdWidget.{{ $key }}" name="descriptionIdWidget.{{ $key }}" placeholder="{{ __('label.description.placeholder') }}" type="simple"/>
                            <x-jet-input-error for="descriptionIdWidget{{ $key }}" class="mt-2" />
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
    @if(count($this->savedWidgets) <> 0)
        
    @endif
</div>