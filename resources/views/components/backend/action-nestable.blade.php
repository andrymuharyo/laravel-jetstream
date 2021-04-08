@if($tab == 'index')
    @if($create == true)
        {{-- Create --}}
        <x-jet-button wire:click="create({{ $id }})" class="mb-3" class="mb-3 bg-green-500 hover:bg-green-700 focus:bg-green-700 active:bg-green-700 border-0 hover:border-0 focus:border-0 active:border-0" title="{{ __('action.create.name') }}">
            <x-heroicon-o-plus class="h-4 text-white"/>
        </x-jet-button>
    @endif
    {{-- Edit --}}
    <x-jet-button wire:click="edit({{ $id }})" class="mb-3" title="{{ __('action.edit.name') }}">
        <x-heroicon-o-pencil class="h-4 text-white"/>
    </x-jet-button>
    {{-- Archive --}}
    <span class="mb-3">
        @if($confirmArchive === $id)
            <x-jet-danger-button class="animate-pulse mb-3 button-small text-xs px-2 mt-0 bg-gray-300 hover:bg-gray-400 focus:bg-gray-400 active:bg-gray-400 border-0 hover:border-0 focus:border-0 active:border-0" 
            wire:click="cancelArchive()">
                <x-heroicon-o-x-circle class="h-4 text-white"/>
            </x-jet-danger-button>
            <x-jet-danger-button class="animate-pulse button-small text-xs px-2 mt-0 bg-green-500 hover:bg-green-700 focus:bg-green-700 active:bg-green-700 border-0 hover:border-0 focus:border-0 active:border-0" 
            wire:click="archive({{ $id }})" >
                <x-heroicon-o-check class="h-4 text-white"/>
            </x-jet-danger-button>
        @else
            {{-- Archive --}}
            <x-jet-danger-button class="mb-3 button-small bg-yellow-300 hover:bg-yellow-500 focus:bg-yellow-500 active:bg-yellow-500 border-yellow-300 hover:border-yellow-400 focus:border-yellow-400 active:border-yellow-400"
            wire:click="confirmArchive({{ $id }})" title="{{ __('action.archive.name') }}">
                <x-heroicon-o-trash class="h-4 text-white"/>
            </x-jet-danger-button>
            {{-- Duplicate --}}
            <x-jet-button wire:click="duplicate({{ $id }})" class="hidden sm:inline-flex mb-3 bg-indigo-500 hover:bg-indigo-600 focus:bg-indigo-600 active:bg-indigo-600" title="{{ __('action.duplicate.name') }}">
                <x-heroicon-o-document-duplicate class="h-4 text-white"/>
            </x-jet-button>
        @endif
    </span>
@else
    <span class="mb-3">
        @if($confirmDestroy === $id)
            <x-jet-danger-button class="animate-pulse mb-3 button-small text-xs px-2 mt-0 bg-gray-300 hover:bg-gray-400 focus:bg-gray-400 active:bg-gray-400 border-gray-400 border-0 hover:border-0 focus:border-0 active:border-0" 
            wire:click="cancelDestroy()">
                <x-heroicon-o-x-circle class="h-4 text-white"/>
            </x-jet-danger-button>
            <x-jet-danger-button class="animate-pulse button-small text-xs px-2 mt-0 bg-green-500 hover:bg-green-700 focus:bg-green-700 active:bg-green-700 border-0 hover:border-0 focus:border-0 active:border-0" 
            wire:click="destroy({{ $id }})">
                <x-heroicon-o-check class="h-4 text-white"/>
            </x-jet-danger-button>
        @else
            {{-- Delete --}}
            <x-jet-danger-button class="mb-3 button-small" wire:click="confirmDestroy({{ $id }})" title="{{ __('action.delete.name') }}">
                <x-heroicon-o-trash class="h-4 text-white"/>
            </x-jet-danger-button>
            {{-- Restore --}}
            <x-jet-button wire:click="restore({{ $id }})" class="mb-3 button-small bg-blue-500 hover:bg-blue-600 focus:bg-blue-600 active:bg-blue-600" title="{{ __('action.restore.name') }}">
                <x-heroicon-o-refresh class="h-4 text-white"/>
            </x-jet-button>
        @endif
    </span>
@endif