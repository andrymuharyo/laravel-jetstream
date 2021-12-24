<div class="col-span-12 sm:col-span-6 mb-2">
    <x-backend.photo wire:model.defer="profile_photo_path" :id="'profile_photo_path-'.$this->userId" 
        module="{{ $this->module }}" 
        name="profile_photo_path" 
        value="{!! $this->profile_photo_path !!}" 
        label="{{ __('label.photo.name') }}" 
        placeholder="{{ __('label.photo.placeholder') }}" />
</div>
<div class="col-span-12 sm:col-span-3">
    <x-jet-label for="name" value="{{ __('label.name.name') }}" wire:model="name" />
    <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model="name" name="name" placeholder="{{ __('label.name.placeholder') }}" />
    <x-jet-input-error for="name" class="mt-2" />
</div>
<div class="col-span-12 sm:col-span-3">
    <x-jet-label for="username" value="{{ __('label.username.name') }}" wire:model="username" />
    <x-jet-input id="username" type="text" class="mt-1 block w-full" wire:model="username" username="username" placeholder="{{ __('label.username.placeholder') }}" />
    <x-jet-input-error for="username" class="mt-2" />
</div>
<div class="col-span-12 sm:col-span-6">
    <x-jet-label for="email" value="{{ __('label.email.name') }}" wire:model="email" />
    <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model="email" email="email" placeholder="{{ __('label.email.placeholder') }}" />
    <x-jet-input-error for="email" class="mt-2" />
</div>
@if($this->method == 'POST')
    <div class="col-span-12 sm:col-span-6">
        <x-jet-section-border />
    </div>
    <div class="col-span-12 sm:col-span-6">
        <x-jet-label for="password" value="{{ __('label.password.name') }}" />
        <x-jet-input id="password" type="password" class="mt-1 block w-full" wire:model.defer="password" placeholder="{{ __('label.password.placeholder') }}" autocomplete="off" />
        <x-jet-input-error for="password" class="mt-2" />
    </div>
    <div class="col-span-12 sm:col-span-6">
        <x-jet-label for="password_confirmation" value="{{ __('label.password_confirmation.name') }}" />
        <x-jet-input id="password_confirmation" type="password" class="mt-1 block w-full" wire:model.defer="password_confirmation" placeholder="{{ __('label.password_confirmation.placeholder') }}" autocomplete="off" />
        <x-jet-input-error for="password_confirmation" class="mt-2" />
    </div>
    <div class="col-span-12 sm:col-span-6">
        <x-jet-section-border />
    </div>
@endif
<div class="col-span-12 sm:col-span-3">
    <span class="inline w-full sm:mt-0 sm:w-auto">
        <x-backend.toggle wire:model.defer="active" :id="'active-'.$this->userId" name="active" value="active" label="{{ __('label.active.name') }}" />
    </span>
</div>
<div class="col-span-12 sm:col-span-3 text-right">
    <x-heroicon-o-calendar class="inline h-4 text-dark"/>
    @if($this->updated_at) 
        <span class="text-xs">{{ __('label.updated.name') }} : {{ $this->updated_at->toFormattedDateString() }}</span>
    @else
        <span class="text-xs">{{ __('label.created.name') }} : {{ now()->toFormattedDateString() }}</span>
    @endif
</div>

<x-slot name="actions">
    <x-jet-secondary-button wire:click="closeForm()" class="mr-2 inline-flex">
        <div wire:loading.remove wire:target="closeForm()">{{ __('action.cancel.name') }}</div>
        <div wire:loading wire:target="closeForm()">{{ __('action.cancel.loading') }} </div>
    </x-jet-secondary-button>
    @if($this->method == 'PUT')
        <x-jet-button type="submit" class="mr-2 inline-flex bg-yellow-300 hover:bg-yellow-500 focus:bg-yellow-500 active:bg-yellow-500" wire:click="onSave('stay')">
            <div wire:loading.remove wire:target="store"><x-heroicon-o-save class="h-4 text-white inline-flex align-top"/> {{ __('action.save.name') }}</div>
            <div wire:loading wire:target="store">{{ __('action.save.loading') }} </div>
        </x-jet-button>
    @endif
    <x-jet-button type="submit" class="inline-flex bg-indigo-500 hover:bg-indigo-600 focus:bg-indigo-600 active:bg-indigo-600" wire:click="onSave('exit')">
        <div wire:loading.remove wire:target="store"><x-heroicon-o-save class="h-4 text-white inline-flex align-top"/> {{ __('action.save.exit') }}</div>
        <div wire:loading wire:target="store">{{ __('action.save.loading') }} </div>
    </x-jet-button>
</x-slot>