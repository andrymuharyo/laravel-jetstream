<div {{ $attributes->merge(['class' => 'datepicker-container']) }}>
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
    </svg>
    <input class="form-input rounded-md shadow-sm mt-1 block w-full bg-gray-100" readonly autocomplete="off"
    id="{{ $id }}" 
    type="text" 
    name="{{ $name }}"
    x-data
    x-ref="{{ $name }}"
    x-init="new Pikaday({ 
        field: $refs.{{ $name }}, 
        format:'DD/MM/YYYY',
        onSelect: function(event) {
            @if ($attributes->wire('model')->value())
                var newDate = moment(event).format('MM/DD/YYYY');
                console.log(newDate);
                @this.set('{{ $attributes->wire('model')->value() }}', newDate);
            @endif
        }
    })
    "
    {{ $disabled ? 'disabled' : '' }}
    {!! $attributes->merge(['class' => 'form-input rounded-md shadow-sm']) !!}
    value="{{ old($name, $value ?? '') }}"
    ></input>
</div>