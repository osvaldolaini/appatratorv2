<div class="w-100">
    <h1 class="text-5xl font-extrabold dark:text-white text-center">
        <small class="ml-2 font-semibold text-gray-500 dark:text-gray-400">
            Evolução
        </small>
    </h1>
    <div class="bg-white dark:bg-gray-800 pt-3 sm:rounded-lg">
        <div class="w-full px-4 py-2 ">
            @foreach ($seasons as $item)
                <div class="px-8 bg-gray-800 text-gray-200">
                    <div class="flex items-center mx-auto container
                        justify-center  py-2">
                        <div class="font-semibold text-3xl">
                            {{ $item->title }}
                        </div>
                    </div>
                </div>
                @livewire('user.apps.treinaments.stats-treinaments', ['season' => $item], key($item->id))
            @endforeach
        </div>
    </div>
</div>
