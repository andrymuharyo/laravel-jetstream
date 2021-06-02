<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-top sm:pt-0">


        <div class="max-w-7xl mt-10 sm:justify-between">  
            <div class="col-span-12">
               <h3 class="text-3xl">{{ $content->title }}</h3>
                <small class="font-bold mb-3">{{ $content->submitted_at->toFormattedDateString() }}</small>
                <div class="block">
                    {!! $content->description !!}
                </div>
            </div>
        </div>
    </div>
</div>