
<div class="col-span-12 sm:col-span-3">
    <x-jet-label for="password" value="{{ __('label.password_change.name') }}" />
    <x-jet-input id="password" type="password" class="mt-1 block w-full" wire:model.defer="password" placeholder="{{ __('label.password_change.placeholder') }}"  autocomplete="off" />
    <x-jet-input-error for="password" class="mt-2" />
</div>
<div class="col-span-12 sm:col-span-3">
    <x-jet-label for="password_confirmation" value="{{ __('label.password_change_confirmation.name') }}" />
    <x-jet-input id="password_confirmation" type="password" class="mt-1 block w-full" wire:model.defer="password_confirmation" placeholder="{{ __('label.password_change_confirmation.placeholder') }}"  autocomplete="off" />
    <x-jet-input-error for="password_confirmation" class="mt-2" />
</div>
<x-slot name="actions">
    <x-jet-button type="submit" class="bg-green-500 hover:bg-green-600 focus:bg-green-600 active:bg-green-600" wire:click="onSave('stay')">
        <div wire:loading.remove wire:target="updatePassword"><x-heroicon-o-key class="h-4 text-white inline-flex align-top"/> {{ __('label.password_change.name') }}</div>
        <div wire:loading wire:target="updatePassword">{{ __('action.save.loading') }} </div>
    </x-jet-button>
</x-slot>