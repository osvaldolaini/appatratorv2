<div class="py-10 px-2 sm:p-10 dark:bg-violet-400 dark:text-gray-900">
    <div class="container mx-auto">
        <div class="flex flex-col lg:flex-row items-center justify-between">
            <h2 class="text-center text-6xl tracki font-bold">Nosso cursos
            </h2>

        </div>
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 w-full max-h-screen py-2">
        @foreach ($courses as $course)
            <div class="col-span-1">
                <div class="h-48 sm:w-56 sm:h-56 card card-compact image-full shadow-xl bg-cover">
                    <figure><img class="w-full mx-auto"
                            src="{{ url('storage/courses/' . $course->id . '/'.$course->image.'.webp') }}"
                            alt="{{ $course->slug }}">
                    </figure>
                    <div class="card-body">
                        <p class="font-extrabold text-[#F3FB04]">{{ $course->title }}</p>
                        <div class="card-actions justify-end">
                            <a href="{{ route('course-pack',$course->price_asaas_id) }}" rel="noreferrer noopener"
                                class="px-5 mt-4 lg:mt-0 py-3 font-bold rounded-md border block bg-[#F3FB04] text-gray-900 border-gray-400">Comprar</a>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>
