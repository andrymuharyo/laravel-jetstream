@props(['on'])

<div x-data="{ shown: false, timeout: null }"
    x-init="@this.on('{{ $on }}', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 3000);  })"
    x-show.transition.opacity.out.duration.1500ms="shown"
    style="display: none;"
    {{ $attributes->merge(['class' => 'text-sm text-white bg-green-500 box-border p-1 px-4 rounded']) }}>
    {{ $slot->isEmpty() ? 'Saved.' : $slot }}
</div>
