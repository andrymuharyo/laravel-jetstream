<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('menu.'.mb_strtolower($pageName).'.name') }}
    </h2>
</x-slot>
<div class="max-w-5xl mx-auto py-10 sm:px-6 lg:px-8 mb-10">  
    <form enctype="multipart/form-data" wire:submit.prevent="store()">
    @csrf
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="bg-white"> 
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h5 class="font-semibold text-md text-indigo-500 leading-tight pb-4">
                        {{ __('label.method.'.mb_strtolower($this->method)) }} 
                    </h5>
                    <div class="grid sm:grid-flow-col gap-4">
                        <div class="col-span-12 sm:col-span-6">
                            <div class="mb-4">
                                <x-jet-label for="description" value="{{ __('label.description.name') }} {{ (config('app.bilingual') == true) ? '('.__('language.en.alias').')' : '' }}" wire:model="description" />
                                <x:backend.wysiwyg wire:model="description" name="description" type="simple"/>
                                <x-jet-input-error for="description" class="mt-2" />
                            </div>
                            @if (config('app.bilingual') == true)
                                <div class="mb-4">
                                    <x-jet-label for="description_id" value="{{ __('label.description.name') }} {{ (config('app.bilingual') == true) ? '('.__('language.id.alias').')' : '' }}" wire:model="description_id" />
                                    <x:backend.wysiwyg wire:model="description_id" name="description_id" type="simple"/>
                                    <x-jet-input-error for="description_id" class="mt-2" />
                                </div>
                            @endif
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <div class="mb-4">
                                <x-jet-label for="address" value="{{ __('label.address.name') }}" wire:model="address" />
                                <x:backend.wysiwyg wire:model="address" name="address" type="simple"/>
                                <x-jet-input-error for="address" class="mt-2" />
                            </div>
                            <div class="grid sm:grid-flow-col gap-4">
                                <div class="col-span-12 sm:col-span-12">
                                    <div class="mb-4">
                                        <x-jet-label for="phone" value="{{ __('label.phone.name') }}" wire:model="phone" />
                                        <x-jet-input id="phone" type="text" class="mt-1 block w-full" wire:model="phone" name="phone" placeholder="{{ __('label.phone.placeholder') }}" />
                                        <x-jet-input-error for="phone" class="mt-2" />
                                    </div>
                                </div>
                                <div class="col-span-12 sm:col-span-6">
                                    <div class="mb-4">
                                        <x-jet-label for="email" value="{{ __('label.email.name') }}" wire:model="email" />
                                        <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model="email" name="email" placeholder="{{ __('label.email.placeholder') }}" />
                                        <x-jet-input-error for="email" class="mt-2" />
                                    </div>
                                </div>
                                <div class="col-span-12 sm:col-span-6">
                                    <div class="mb-4">
                                        <x-jet-label for="email_inquiry" value="{{ __('label.email.name') }} {{ __('label.email.inquiry') }}" wire:model="email" />
                                        <x-jet-input id="email_inquiry" type="email" class="mt-1 block w-full" wire:model="email_inquiry" name="email_inquiry" placeholder="{{ __('label.email.placeholder') }}" />
                                        <x-jet-input-error for="email_inquiry" class="mt-2" />
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <x-jet-label for="embed" value="{{ __('label.embed.name') }}" wire:model="embed" />
                                <x:backend.textarea wire:model="embed" name="embed" type="simple"/>
                                <x-jet-input-error for="embed" class="mt-2" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        @if($embed)
            <div class="my-5 shadow overflow-hidden sm:rounded-md">
                <div class="bg-white px-4 py-5 sm:px-6 grid sm:grid-flow-col gap-4 text-left">
                    <div class="relative overflow-hidden border shadow rounded-sm">{!! $embed !!}</div>
                </div>
            </div>
        @endif

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

