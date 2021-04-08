
@if($isForm)
    @include('livewire.backend.'.mb_strtolower($pageName).'.form')
@else
@push('bottom.script')
<script type="text/javascript">
    $(document).ready(function() {
            var updateOutput = function(e) {
                e.preventDefault();
                var list = e.length ? e : $(e.target),
                    output = list.data('output');
                    if(window.JSON) {
                        var posts = window.JSON.stringify(list.nestable('serialize'));
                        $.ajax({
                            method:'POST',
                            url: '{{ route('backend.links.nestable','applyNestable') }}',
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "nestable": posts
                            },
                            success: function(msg) {
                                console.log(msg);
                                toastr['success']('{{ __('validation.action.ordered',array('attribute' => $pageName)) }}');
                            }
                        });     
                    }
            };

            $('#nestable').nestable().on('change', updateOutput);

            $('.expand-nestable').on('click',function() {
                $(this).addClass('hidden');
                $('.collapse-nestable').removeClass('hidden');
                $('#nestable').nestable('expandAll');
            });
            $('.collapse-nestable').on('click',function() {
                $(this).addClass('hidden');
                $('.expand-nestable').removeClass('hidden');
                $('#nestable').nestable('collapseAll');
            });
    });
</script>
@endpush
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('menu.'.mb_strtolower($pageName).'.name') }}
        </h2>
    </x-slot>
    <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="bg-gray-50 pt-3 pb-0 px-4">
                <div class="flex justify-between">
                    <div class="justify-self-start">
                        <x-jet-button wire:click="create()" class="button-large py-2.5 px-4 mb-4"><x-heroicon-o-plus class="h-4 pr-3 text-white"/> {{ __('action.new.name',array('attribute'=> __('menu.'.mb_strtolower($pageName).'.name'))) }}</x-jet-button>
                    </div>
                    <div class="justify-self-end">
                        <x-jet-button class="hidden button-large bg-pink-400 hover:bg-pink-500 focus:bg-pink-500 active:bg-pink-500 border-pink-400 hover:border-pink-500 focus:border-pink-500 active:border-pink-500 py-2.5 px-4 mb-4 expand-nestable">{{ __('label.open.name') }}</x-jet-button>
                        <x-jet-button class="button-large bg-pink-400 hover:bg-pink-500 focus:bg-pink-500 active:bg-pink-500 border-pink-400 hover:border-pink-500 focus:border-pink-500 active:border-pink-500 py-2.5 px-4 mb-4 collapse-nestable">{{ __('label.close.name') }}</x-jet-button>
                    </div>
                </div>
            </div>
            <div class="bg-white">
                <div class="flex justify-between">
                    <div>
                        <nav class="flex sm:grid-flow-col">
                            <div class="col-span-12 sm:col-span-6" wire:click="gotoPage(1)">
                                <button wire:click="$set('tab', 'index')" class="inline sm:flex py-4 px-6 text-gray-700 hover:text-indigo-600 {{ $tab == 'index' ? 'border-b-2 border-indigo-400' : '' }} focus:outline-none">
                                    <span class="inline-flex sm:hidden"><x-heroicon-o-collection class="text-gray-500 h-4" /></span>
                                    <span class="hidden sm:inline-flex">{{ __('label.index.name') }}</span>
                                </button>
                            </div>
                            <div class="col-span-12 sm:col-span-6" wire:click="gotoPage(1)">
                                <button wire:click="$set('tab', 'archive')" class="inline sm:flex py-4 px-6 text-gray-700 hover:text-indigo-600 {{ $tab == 'archive' ? 'border-b-2 border-indigo-400' : '' }} focus:outline-none">
                                    <span class="inline-flex sm:hidden"><x-heroicon-o-archive class="text-gray-500 h-4" /></span> 
                                    <span class="hidden sm:inline-flex">{{ __('label.archive.name') }}</span>               
                                </button>
                            </div>
                        </nav>
                    </div>
                    <div class="py-3 px-6 inline-flex">
                        <div class="relative">
                            <x-jet-input id="search" type="text" class="flex pr-10 w-full" wire:model="search" placeholder="{{ __('label.search.placeholder',array('attribute'=> __('menu.'.mb_strtolower($pageName).'.name'))) }}" />
                            @if($search)
                                <span class="absolute top-0 right-0 py-3 px-3 cursor-pointer z-10 " wire:click="searchClear()">
                                    <x-heroicon-o-x class="text-gray-500 h-4 bg-white" />
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-2 py-4 bg-white sm:px-6">
                @if(count($links) > 0)
                    <div id="nestable" class="dd">
                        <ol class="dd-list">
                            @foreach($links as $link)
                                <li class="dd-item mb-3" data-id="{{ $link->id }}" data-title="{{  $link->title }}">
                                    <section class="bg-gray-200 hover:bg-gray-300 focus:bg-gray-300 active:bg-gray-300">
                                        @if($this->search == null)
                                            <span class="dd-handle"><x-heroicon-o-dots-vertical class="h-4 text-gray-900 hover:text-gray-900"/></span>
                                        @endif
                                        <span class="dd-content @if($this->search <> null) searched @endif">
                                            {{ $link->title }} 
                                        </span>
                                        @if($link->active == 0)
                                            <span class="dd-draft ml-3 rounded flex-inline px-2 py-1 text-xs bg-gray-500 text-white">{{ __('label.status.draft') }}</span> 
                                        @endif
                                        <span class="dd-action">
                                            @include('components.backend.action',array('id' => $link->id))
                                        </span>
                                    </section>
                                </li>
                            @endforeach
                        </ol>
                    </div>
                @else
                    <div class="bg-gray-100 p-3 rounded-lg">
                        @if($this->tab == 'index')
                            <h3 class="text-center">{{ __('pagination.no_data',array('attribute'=> __('menu.'.mb_strtolower($pageName).'.name'))) }}</h3>
                        @else
                            <h3 class="text-center">{{ __('pagination.no_data',array('attribute'=> __('action.archive.name'))) }}</h3>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
@endif