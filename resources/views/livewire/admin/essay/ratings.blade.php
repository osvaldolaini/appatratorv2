<div class="w-100">
    <x-breadcrumb>
        <div class="grid grid-cols-8 gap-4 text-gray-600 ">
            <div class="col-span-6 justify-items-start">
                <h3 class="text-2xl font-bold tracki  dark:text-gray-50">
                    {{ mb_strtoupper($breadcrumb) }}
                </h3>
            </div>
        </div>
    </x-breadcrumb>
    <div class="bg-white dark:bg-gray-800 pt-3 sm:rounded-lg">
        <div>
            <div class="flex justify-between mx-auto gap-4 mb-1 sm:gap-6 sm:mb-5 p-4 ">
                <div class="flex flex-col sm:flex-row items-center space-x-3">
                    <div class="avatar">
                        <div class="mask mask-squircle w-12 h-12">
                            <!-- Current Profile Photo -->
                            <div class="mt-2">
                                <img src="{{ $essayUser->user->profile_photo_url }}"
                                    alt="{{ $essayUser->user->name }}"
                                    class="rounded-full h-15 w-15 object-cover">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col pb-1">
                    <h2 class="text-gray-500 md:text-lg dark:text-gray-400">Redação para:</h2>
                    <p class="text-lg font-semibold">
                        {{ $essayUser->essay->title }}
                    </p>
                    <h2 class="text-gray-500 md:text-lg dark:text-gray-400">Realizada em:</h2>
                    <p class="text-lg font-semibold">
                        {{ $essayUser->performed_at }}
                    </p>
                </div>
                <div class="flex flex-col pb-1">
                    <h2 class="text-gray-500 md:text-lg dark:text-gray-400">Enviada em:</h2>
                    <p class="text-lg font-semibold">
                        {{ $essayUser->send_at }}
                    </p>
                    @livewire('admin.essay.rating.rating-upload-pdf', ['essayUser' => $essayUser], key($essayUser->id))
                </div>
            </div>
            <div class="grid gap-4 mb-1 sm:grid-cols-3 sm:gap-6 sm:mb-5 p-4 ">
                @isset($rate)
                    @foreach ($rate as $item)
                        @if (!in_array($item->id, $pivotSkills))
                            @livewire('admin.essay.rating.rate', [
                                'rate' => $item,
                                'essay_user_id' => $model_id,
                            ])
                        @endif
                    @endforeach
                @endisset
                @isset($ratings)
                    @foreach ($ratings as $item)
                        @livewire('admin.essay.rating.rate-update', [
                            'rating' => $item,
                        ])
                    @endforeach
                @endisset
            </div>
        </div>
    </div>
</div>
