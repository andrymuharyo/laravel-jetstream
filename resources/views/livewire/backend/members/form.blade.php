<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $pageName }}
        </h2>
</x-slot>
<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

    <x-jet-form-section submit="store">

        <x-slot name="title">
            {{ __('account.label.profile.name') }}
        </x-slot>

        <x-slot name="description">
            {{ __('account.label.profile.info') }}
            @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                <div class="col-span-12 sm:col-span-6 mt-4">
                    <x-jet-label for="current_team_id" value="{{ __('team.label.team.name') }}" wire:model="current_team_id" />
                    <x:backend.dropdown :withSearch="true" wire:model.defer="current_team_id" name="current_team_id" :options="$modelTeam" wire:selected="{{ $this->current_team_id }}" wire:change="setModelTeam($event.target.value)">
                        <option value="">{{ __('team.label.team.placeholder') }}</option>
                    </x:backend.dropdown>
                    <x-jet-input-error for="current_team_id" class="mt-2" />
                </div>
            @endif
        </x-slot>

        <x-slot name="form">
            @include('livewire.backend.users.update-profile-information-form')
        </x-slot>

    </x-jet-form-section>
    
    @if($this->method == 'PUT')
        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
            <div class="mt-10 sm:mt-0">
                <x-jet-section-border />
                <x-jet-form-section submit="updatePassword">

                    <x-slot name="title">
                        {{ __('account.label.password.name') }}
                    </x-slot>
                
                    <x-slot name="description">
                        {{ __('account.label.password.info') }}
                    </x-slot>

                    <x-slot name="form">
                        @include('livewire.backend.users.update-password-form')
                    </x-slot>

                </x-jet-form-section>
            </div>
        @endif
    @endif
</div>

