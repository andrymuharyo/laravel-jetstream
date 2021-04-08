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
                        @if(!$attributes->get('multiple'))
                            @this.set('{{ $attributes->wire('model')->value() }}', $('#{{ $id }}').val());
                        @else
                            var values = [];
                            $('#{{ $id }}').find('option:selected').each(function(i, selected){ 
                                values[i] = $(selected).val();
                                @this.set('{{ $attributes->wire('model')->value() }}', ''+values+'');
                            });
                        @endif
                    @endif
                });
            "
        >
        {{ $slot }}
        @foreach($options as $key => $option)
            <option 
            @if(!$attributes->get('multiple'))
                @if ($attributes->wire('selected')->value())
                    @if($key == $attributes->wire('selected')->value()) selected @endif
                @endif
            @endif
            value="{{ $key }}">{{ $option }}</option>
        @endforeach
    </select>
</div>