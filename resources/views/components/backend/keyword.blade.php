
<div class="w-100" wire:ignore>
    @if ($attributes->wire('selected')->value())
        @php
            $values = explode(';',$attributes->wire('selected')->value())
        @endphp
    @else
        @php
            $values = [];
        @endphp
    @endif
    <div class="mb-4">
        <select multiple
            {{ $attributes->only('class')->merge(['class' => 'w-100']) }}
            name="{{ $name }}"
            id="{{ $id }}"
            {{ $attributes->except(['label', 'class']) }}
            x-data=""
            x-ref="{{ $id }}"
            x-init="
                    $('#{{ $id }}').select2({
                        {{ $withSearch ? '' : 'minimumResultsForSearch: -1,' }}
                        tags: true,
                    }).on('select2:select', (event) => {
                        @if ($attributes->wire('model')->value())
                            var values = [];
                            $('#{{ $id }}').find('option:selected').each(function(i, selected){ 
                                values[i] = $(selected).val();
                                @dd($attributes->wire('model')->value())
                                @this.set('{{ $attributes->wire('model')->value() }}', ''+values+'');
                            });
                            $('.selected-{{ $id }}').hide();
                        @endif
                    });
                "
            >
            {{ $slot }}
            @foreach($options as $key => $option)
                <option
                @foreach($values as $value)
                    @if($key == $value) selected @endif
                @endforeach
                value="{{ $key }}">{{ $option }}</option>
            @endforeach
        </select>
    </div>
    @if($values)
        <div class="selected-{{ $id }}">
            @foreach($options as $key => $option)
                @foreach($values as $value)
                    @if($key == $value)
                        <span class="py-1 px-2 text-xs rounded-md shadow bg-gray-200">{{ $option }}</span>
                    @endif
                @endforeach
            @endforeach
        </div>
    @endif
</div>