<div class="form-input w-100" wire:ignore>
    <select
        class="select2"
        name="{{ $name }}"
        id="{{ $id }}"
        {{ $attributes->except(['label', 'class']) }}
        x-data=""
        x-ref="{{ $id }}"
        >
        {{ $slot }}
        @foreach($options as $key => $option)
            <option value="{{ $key }}">{{ $option }}</option>
        @endforeach
    </select>
</div>
@section('js')
<script>
    $(document).ready(function() {
        $('.select2').select2();
        $('.select2').on('change', function (e) {
            @this.set('selectedModel', e.target.value);
        });
    });
</script>
@endsection