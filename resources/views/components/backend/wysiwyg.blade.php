<div {{ $attributes->only('class')->merge(['class' => 'form-group wysiwyg']) }} wire:ignore>
    <textarea
        id="{{ $id }}"
        name="{{ $name ?? ''}}"
        {{ $attributes }}
        class="form-control"
        wire:key="{{ $id }}"
        x-data=""
        x-ref="{{ $id }}"
        x-init="
                function initCkEditor() {
                    if (!CKEDITOR.instances['{{ $id }}']) {
                        CKEDITOR.replace('{{ $id }}', {
                            allowedContent: true,
                            customConfig: '{{ $configUrl }}',
                            filebrowserImageBrowseUrl: '/filemanager?type=Images',
                            filebrowserImageUploadUrl: '/filemanager/upload?type=Images&_token=',
                            filebrowserBrowseUrl: '/filemanager?type=Files',
                            filebrowserUploadUrl: '/filemanager/upload?type=Files&_token='
                        }).on('change', function (e) {
                            @if ($attributes->wire('model')->value())
                                @this.set('{{ $attributes->wire('model')->value() }}', e.editor.getData());
                            @endif
                        });
                    }
                }
               "
        >{!! old($name, $value ?? '') !!}</textarea>
</div>
