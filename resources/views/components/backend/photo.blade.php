<div {{ $attributes->only('class') }} x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
    <!-- Profile Image File Input -->
    <input type="file" class="hidden"
                wire:model="{{ $attributes->wire('model')->value() }}"
                x-ref="photo"
                x-on:change="
                        photoName = $refs.photo.files[0].name;
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            photoPreview = e.target.result;
                        };
                        reader.readAsDataURL($refs.photo.files[0]);
                " />

    <x-jet-label for="{{ $attributes->wire('model')->value() }}" value="{{ __('label.photo.name') }}" />
    
        <div class="mt-2" x-show="! photoPreview">
            @if($value)
                <img src="{{ Storage::disk('public')->url($value) }}" class="rounded-full h-20 w-20 object-cover">
            @else
                <img src="{{ url('img/placeholder.jpg') }}" class="rounded-full h-20 w-20 object-cover">
            @endif
        </div>

    <!-- New Image Preview -->
    <div class="mt-2" x-show="photoPreview">
        <span class="rounded-full h-20 w-20 object-cover" x-bind:style="'display:block;background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'"></span>
    </div>
    <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
        <div wire:loading.remove wire:target="{{ $attributes->wire('model')->value() }}">{{ __('label.photo.button') }} </div>
        <div wire:loading wire:target="{{ $attributes->wire('model')->value() }}">{{ __('label.photo.upload') }} </div>
    </x-jet-secondary-button>
    @if($value)
        <x-jet-secondary-button type="button" class="mt-2" wire:click="clearPhoto()">
            {{ __('action.cancel.name') }}
        </x-jet-secondary-button>
    @endif
    <x-jet-input-error for="{{ $attributes->wire('model')->value() }}" class="mt-2" />
</div>