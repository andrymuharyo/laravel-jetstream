<div {{ $attributes->only('class') }} x-data="{imageName: null, imagePreview: null}" class="col-span-6 sm:col-span-4">
    <!-- Profile Image File Input -->
    <input type="file" class="hidden"
                wire:model="image"
                x-ref="image"
                x-on:change="
                        imageName = $refs.image.files[0].name;
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            imagePreview = e.target.result;
                        };
                        reader.readAsDataURL($refs.image.files[0]);
                " />

    <x-jet-label for="image" value="{{ __('Image') }}" />
    
    @if($value)
        <div class="mt-2" x-show="! imagePreview">
            <img src="{{ url('storage/'.$module.'/'.$value) }}" class="h-36 w-max object-cover">
        </div>
    @else
        <div class="mt-2" x-show="! imagePreview">
            <img src="{{ url('img/placeholder.jpg') }}" class="h-36 w-max object-cover">
        </div>
    @endif

    <!-- New Image Preview -->
    <div class="mt-2" x-show="imagePreview">
        <span class="block h-40 w-40" x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + imagePreview + '\');'"></span>
    </div>
    <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.image.click()">
        <div wire:loading.remove wire:target="image">{{ __('Select A New Image') }} </div>
        <div wire:loading wire:target="image">{{ __('Uploading...') }} </div>
    </x-jet-secondary-button>
    @if($value)
        <x-jet-secondary-button type="button" class="mt-2" wire:click="clearImage()">
            {{ __('Clear Image') }}
        </x-jet-secondary-button>
    @endif
    <x-jet-input-error for="image" class="mt-2" />
</div>