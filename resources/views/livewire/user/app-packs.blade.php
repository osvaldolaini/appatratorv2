<div class="w-100 pt-3  sm:rounded-lg">
    <div class="flex flex-wrap sm:justify-around px-10">
        <div class="w-full">
            <div class="py-4 space-x-4 ">
                <h1
                    class="grid grid-cols-1 sm:grid-cols-4 space-x-1 text-5xl font-extrabold dark:text-white text-center">
                    <small class="col-span-full ml-2 font-semibold text-gray-500 dark:text-gray-400">
                        {{ $breadcrumb }}
                    </small>
                    @if ($packs)
                        @foreach ($packs as $pack)
                            <div class="col-span-1">
                                <div id="item{{ $pack->application }}" class="carousel-item col-span-1 flex justify-center mt-4">
                                    <div class="w-48 h-48 sm:w-56 sm:h-56 p-2 bg-white drop-shadow-xl rounded-box">
                                        @switch($pack->application)
                                            @case('mentoring')
                                                <x-application-logo-mentoring class="m-auto h-16 sm:h-20">
                                                </x-application-logo-mentoring>
                                            @break
                                            @case('essay')
                                                <x-application-logo-essay class="m-auto h-16 sm:h-20">
                                                </x-application-logo-essay>
                                            @break
                                            @case('questions')
                                                <x-application-logo-questions class="m-auto h-16 sm:h-20">
                                                </x-application-logo-questions>
                                            @break
                                            @case('treinament')
                                                <x-application-logo-tfm class="m-auto h-16 sm:h-20">
                                                </x-application-logo-tfm>
                                            @break
                                        @endswitch


                                        <div class="p-2 sm:p-3 bg-black rounded-lg">
                                            <p class="text-md font-bold text-[#F3FB04] ">
                                                {{ $pack->title }}
                                            </p>
                                            <div class="flex items-center justify-between ">
                                                <p class="text-white">
                                                    &nbsp;
                                                </p>
                                                <a href="{{ route('checkout-prod', $pack->id) }}" rel="noreferrer noopener"
                                                    class="text-sm px-5 mt-4 lg:mt-0 py-3 font-bold rounded-full
                                                     border block bg-[#F3FB04] text-gray-900 border-gray-400">
                                                    Comprar
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    @endif
                </h1>
            </div>
        </div>
    </div>
    <div>
        @livewire('user.apps.all-apps')
    </div>
    <div>
        @livewire('user.courses.all-courses')
    </div>
</div>
