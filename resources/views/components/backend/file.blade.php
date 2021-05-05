<div {{ $attributes->only('class') }} x-data="{fileName: null, filePreview: null}" class="col-span-6 sm:col-span-4">
    <!-- Profile File File Input -->
    <input type="file" class="hidden"
                wire:model="{{ $attributes->wire('model')->value() }}"
                x-ref="file"
                x-on:change="
                        fileName = $refs.file.files[0].name;
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            filePreview = e.target.result;
                        };
                        reader.readAsDataURL($refs.file.files[0]);
                " />
    <div class="mt-2" x-show="!filePreview">
        @if($value && \Storage::disk('public')->exists($module.'/'.$value))
            <div>
                <a href="{{ \Storage::disk('public')->url($module.'/'.$value) }}" target="_blank" class="inline-flex items-center px-4 py-2 border-0 bg-green-500 hover:bg-green-600 focus:bg-green-600 active:border-green-600 text-white rounded-md font-semibold text-xs uppercase tracking-widest shadow-sm focus:outline-none">
                    <x-heroicon-o-eye class="h-4 text-dark pr-3"/> {{ __('action.view.name') }}
                </a>
           </div>
        @endif
    </div>

    <!-- New File Preview -->
    @if($value)
        <div class="mt-2" x-show="filePreview">
            <div class="text-sm text-white bg-green-500 box-border p-1 px-4 rounded">
                {{ __('action.upload.set') }}
            </div>
        </div>
    @endif
    <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.file.click()">
        <div wire:loading.remove wire:target="file">{{ __('label.file.button') }} </div>
        <div wire:loading wire:target="file">{{ __('action.upload.loading') }} </div>
    </x-jet-secondary-button>
    @if($value)
        <x-jet-secondary-button type="button" class="mt-2" wire:click="clearFile()">
            {{ __('action.cancel.name') }}
        </x-jet-secondary-button>
    @endif
    <x-jet-input-error for="file" class="mt-2" />
</div>