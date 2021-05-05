<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('menu.'.mb_strtolower($pageName).'.name') }}
    </h2>
</x-slot>
<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 mb-10">  
    <form enctype="multipart/form-data" wire:submit.prevent="store()">
    @csrf
    <div class="shadow overflow-hidden sm:rounded-md">

        <div class="mt-4 shadow overflow-hidden sm:rounded-md">
            <div class="bg-white px-4 sm:pt-5 pb-4 sm:p-6 sm:pb-5">

                <div class="grid sm:grid-cols-12 gap-4">
                    <div class="col-span-12 sm:col-span-4">
                        <div class="mb-4">
                            <x-jet-label for="service_account_credentials_json" value="{{ __('label.analytic.service_account_credentials_json.name') }}" wire:model="service_account_credentials_json" />
                            <x-backend.file wire:model.defer="service_account_credentials_json" :id="'service_account_credentials_json-'.$this->analyticId" 
                                module="{{ $this->module }}" 
                                name="service_account_credentials_json" 
                                value="{{ $this->service_account_credentials_json }}" 
                                label="{{ __('label.file.name') }}" 
                                placeholder="{{ __('label.file.placeholder') }}" />
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-4">
                        <div class="mb-4">
                            <x-jet-label for="analytics_view_id" value="{{ __('label.analytic.analytics_view_id.name') }}" wire:model="analytics_view_id" />
                            <x-jet-input id="analytics_view_id" type="text" class="mt-1 block w-full" wire:model="analytics_view_id" name="analytics_view_id" placeholder="{{ __('label.analytic.analytics_view_id.placeholder') }}" />
                            <x-jet-input-error for="analytics_view_id" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-4">
                        <div class="mb-4">
                            <x-jet-label for="cache_lifetime_in_minutes" value="{{ __('label.analytic.cache_lifetime_in_minutes.name') }}" wire:model="cache_lifetime_in_minutes" />
                            <x-jet-input id="cache_lifetime_in_minutes" type="text" class="mt-1 block w-full" wire:model="cache_lifetime_in_minutes" name="cache_lifetime_in_minutes" placeholder="{{ __('label.analytic.cache_lifetime_in_minutes.placeholder') }}" />
                            <x-jet-input-error for="cache_lifetime_in_minutes" class="mt-2" />
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
                        <x-backend.toggle wire:model.defer="active" :id="'active-'.$this->analyticId" name="active" value="active" label="{{ __('label.active.name') }}" />
                    </span>
                </div>
                <div class="mt-1 grid-flow-col sm:text-right">
                    <span class="inline w-full rounded-md shadow-sm sm:ml-3 w-50 sm:w-auto">
                        <x-jet-secondary-button wire:click="closeForm()" class="mr-2">
                            <div wire:loading.remove wire:target="closeForm()">{{ __('action.cancel.name') }}</div>
                            <div wire:loading wire:target="closeForm()">{{ __('action.cancel.loading') }} </div>
                        </x-jet-secondary-button>
                        @if($this->method == 'PUT')
                            <x-jet-button type="submit" class="mr-2 bg-yellow-300 hover:bg-yellow-500 focus:bg-yellow-500 active:bg-yellow-500" wire:click="onSave('stay')">
                                <div wire:loading.remove wire:target="store"><x-heroicon-o-save class="h-4 text-white inline-flex align-top"/> {{ __('action.save.name') }}</div>
                                <div wire:loading wire:target="store">{{ __('action.save.loading') }} </div>
                            </x-jet-button>
                        @endif
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

