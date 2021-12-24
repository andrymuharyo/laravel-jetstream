<div {{ $attributes->only('class') }}>
    <label class="inline-flex items-center cursor-pointer">
        <input type="radio" name="{{ $name }}" id="{{ $id }}"  @if($value) checked @endif value="{{ $value }}"
        class="form-radio h-5 w-5 text-indigo-500"
        {{ $attributes->except(['class']) }}/>
        <span class="ml-2 text-gray-700">{{ $label }}</span>
    </label>
</div>