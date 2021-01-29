<div class="w-100" wire:ignore>
    <select
        {{ $attributes->only('class')->merge(['class' => 'w-100']) }}
        name="{{ $name }}"
        id="{{ $id }}"
        {{ $attributes->except(['label', 'class']) }}
        x-data=""
        x-ref="{{ $id }}"
        x-init="
                $('#{{ $id }}').select2({
                    {{ $withSearch ? '' : 'minimumResultsForSearch: -1,' }}
                    {{ $attributes->get('multiple') ? 'tags: true,' : '' }}
                }).on('select2:select', (event) => {
                    @if ($attributes->wire('model')->value())
                        @this.set('{{ $attributes->wire('model')->value() }}', $('#{{ $id }}').val());
                    @endif
                });
            "
        >
        {{ $slot }}
        @foreach($options as $key => $option)
            <option value="{{ $key }}">{{ $option }}</option>
        @endforeach
    </select>
</div>