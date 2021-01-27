<div {{ $attributes->only('class') }}>
    <textarea class="form-input rounded-md shadow-sm mt-1 block w-full" 
    id="{{ $id }}" 
    name="{{ $name }}"
    rows={{ $row }}
    {{ $disabled ? 'disabled' : '' }}
    {!! $attributes->merge(['class' => 'form-input rounded-md shadow-sm']) !!}
    >{{ old($name, $value ?? '') }}</textarea>
</div>