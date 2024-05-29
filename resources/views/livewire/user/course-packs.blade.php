<div class="w-100 pt-3  sm:rounded-lg">
    <div class="flex flex-wrap sm:justify-around px-10">
        <div class="w-full">
            <div class="py-4 space-x-4 ">
                <h1
                    class="grid grid-cols-1 sm:grid-cols-4 space-x-1 text-5xl font-extrabold dark:text-white text-center">
                    <small class="col-span-full ml-2 font-semibold text-gray-500 dark:text-gray-400">
                        Pacotes do curso
                    </small>
                    @if ($packs)
                        @foreach ($packs as $pack)
                            <div class="col-span-1">
                                <div class="w-56 h-60 card card-compact image-full shadow-xl bg-cover">
                                    <figure><img class="w-full mx-auto"
                                        src="{{ url('storage/courses/' . $pack->course->id . '/'.$pack->course->image.'.webp') }}"
                                        alt="{{ $pack->course->slug }}">
                                </figure>
                                    <div class="card-body">
                                        <p class="font-extrabold text-[#F3FB04]">{{ $pack->title }}</p>
                                        <div class="card-actions justify-end">
                                            <a href="{{ route('checkout-course', $pack->price_asaas_id) }}" rel="noreferrer noopener"
                                                class="px-5 mt-4 lg:mt-0 py-3 font-bold rounded-md border block bg-[#F3FB04] text-gray-900 border-gray-400">Comprar</a>

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
        @livewire('user.courses.all-courses')
    </div>
    <div>
        @livewire('user.apps.all-apps')
    </div>
</div>
