<div class="p-10 dark:bg-violet-400 dark:text-gray-900">
    <div class="container mx-auto">
        <div class="flex flex-col lg:flex-row items-center justify-between">
            <h2 class="text-center text-6xl tracki font-bold">Nosso cursos
            </h2>
            <a href="https://atratorconcursos.com.br/nossos-cursos" rel="noreferrer noopener"
                class="px-5 mt-4 lg:mt-0 py-3 rounded-md border block dark:bg-gray-50 dark:text-gray-900 dark:border-gray-400">Comprar</a>
        </div>
    </div>

    <div class="grid grid-cols-4 gap-2 w-full h-full py-2">
        @foreach (json_decode($data) as $course)
            <div class="col-span-1 ">
                <div class="card card-compact image-full shadow-xl bg-cover">
                    <figure><img class="w-full "
                            src="{{ 'https://atratorconcursos.com.br/storage/images/courses/' . $course->id . '/thumb.jpg' }}"
                            alt="{{ $course->slug }}">
                    </figure>
                    <div class="card-body">
                        <p class="font-extrabold">{{ $course->title }}</p>
                        <div class="card-actions justify-end">
                            <a href="{{ $course->slug }}" class="btn btn-primary">Editar</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>
