
<div {{ $attributes->only('class') }}>
    <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
        <input type="checkbox" name="{{ $name }}" id="{{ $id }}"  @if($value) checked @endif value="1"
        class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none focus:outline-none cursor-pointer"
        {{ $attributes->except(['class']) }}/>
        <label for="{{ $name }}" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
    </div>
    <label for="{{ $name }}" class="text-xs text-gray-700">{{ $label }}</label>
</div>