<div class="w-100 pt-3 sm:rounded-lg">
    <div class="flex flex-wrap sm:justify-around">
        <div class="max-w-full">
            <div class="py-4 space-x-4 ">
                <h1 class="grid grid-cols-3 sm:grid-cols-6  text-5xl font-extrabold dark:text-white text-center">
                    <small class="col-span-full ml-2 font-semibold text-gray-500 dark:text-gray-400">
                        Meus Cursos
                    </small>
                    @foreach ($vouchers as $voucher)
                        <div wire:click="goCourse('{{ $voucher->course->code }}')"
                            class="w-48 h-48 sm:w-56 sm:h-56  col-span-1
                            bg-white drop-shadow-xl rounded-box mr-4 cursor-pointer card card-compact shadow-xl">
                            <figure>
                                <img class="w-full mx-auto"
                                    src="{{ 'https://atratorconcursos.com.br/storage/images/courses/' . $voucher->course->api_course_id . '/thumb.jpg' }}"
                                    alt="{{ $voucher->course->code }}">
                            </figure>
                            <div class="card-body">
                                <p class="font-extrabold">{{ $voucher->course->title }}</p>

                            </div>
                        </div>
                    @endforeach

                </h1>
            </div>
        </div>
    </div>

    {{-- <div>
        @livewire('user.courses.api-courses')
    </div> --}}
</div>
