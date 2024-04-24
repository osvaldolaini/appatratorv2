<div>
    <section class="bg-gray-900 text-gray-100">
        <div class="container flex flex-col justify-center mx-auto lg:flex-row lg:justify-between">
            <div class="flex flex-col justify-center px-6 text-center rounded-sm lg:max-w-md xl:max-w-lg lg:text-left">
                <button wire:click="back()"
                    class="flex py-2 px-3 hover:text-white dark:hover:bg-gray-300
                    transition-colors hover:bg-gray-700 rounded-sm
                        duration-200 whitespace-nowrap">Voltar
                        para o lobby
                    <svg class="h-6 w-6 ml-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M9.00002 15.3802H13.92C15.62 15.3802 17 14.0002 17 12.3002C17 10.6002 15.62 9.22021 13.92 9.22021H7.15002"
                            stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M8.57 10.7701L7 9.19012L8.57 7.62012" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
                <h1 class="text-5xl font-bold leadi">
                    {{ $course->title }}
                </h1>
                <p class="mt-6">
                    <x-mentoring-app-status-bar :progress="$course->progress" type="1">
                    </x-mentoring-app-status-bar>
                </p>
                <p class="mt-6 mb-8 text-lg sm:mb-9">
                    {!! $course->description !!}
                </p>
            </div>
            <div class="flex items-center justify-center p-6 mt-8 lg:mt-0 h-72 sm:h-80 lg:h-96 xl:h-112 2xl:h-128">
                <figure><img class="object-contain h-72 sm:h-80 lg:h-96 xl:h-112 2xl:h-128"
                        src="{{ 'https://atratorconcursos.com.br/storage/images/courses/' . $course->id . '/thumb.jpg' }}"
                        alt="{{ $course->code }}">
                </figure>
            </div>
        </div>
        <div class="container flex justify-start mx-auto mt-5 w-full border-b border-white">
            <!-- lg -->
            <div role="tablist" class="tabs tabs-lifted tabs-lg">
                <a href="" role="tab" class="text-gray-900 tab tab-active">Conteúdo</a>
            </div>
        </div>
        <div class="mx-auto mt-5 w-full grid grid-col-1 sm:grid-cols-4 gap-2 h-full p-6">
            @foreach ($course->modules as $module)
                <div class="col-span-1">
                    @if ($module->type == 1)
                        <div class="absolute flex justify-end p-4 text-white">

                            @if ($module->full)
                                <svg class="me-2 shrink-0 w-7 h-7 text-green-500" fill="currentColor"
                                    viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                    <path fill="currentColor"
                                        d="M9 0a9 9 0 1 0 9 9 9 9 0 0 0-9-9zm4.49 6.924l-5.02 5.51a.983.983 0 0 1-1.442 0l-2.48-2.482a.983.983 0 0 1 .008-1.417 1.027 1.027 0 0 1 1.4.02L7.712 10.3l4.3-4.73a1.018 1.018 0 0 1 1.4-.075 1.006 1.006 0 0 1 .078 1.43z" />
                                </svg>
                            @else
                                <svg class="me-2 shrink-0 w-7 h-7 " fill="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill="#494c4e"
                                        d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10S2 17.514 2 12 6.486 2 12 2m0-2C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0z" />
                                    <path fill="#494c4e"
                                        d="M10.5 16.5c-.42 0-.82-.176-1.094-.484l-2.963-2.97c-.274-.26-.443-.653-.443-1.06 0-.405.17-.798.462-1.078.482-.513 1.557-.55 2.113.037l1.925 1.93 4.943-4.958c.52-.55 1.575-.57 2.132.02.256.242.425.634.425 1.04 0 .402-.164.79-.45 1.068l-5.993 6.012c-.238.267-.637.443-1.057.443z" />
                                </svg>
                            @endif
                        </div>
                    @endif

                    <a href="{{ route('dashboard-module', [$module->course->code, $module->code]) }}"
                        class="h-64 flex flex-col justify-center px-6 text-center card card-compact shadow-xl">
                        @if ($module->image)
                            <figure>
                                <img class="w-full mx-auto"
                                    src="{{ url('storage/modules/' . $module->id . '/thumb/' . $module->code . '.webp') }}"
                                    alt="{{ $module->code }}">
                            </figure>
                        @else
                            <div class="flex mx-auto mt-10">
                                <x-application-logo></x-application-logo>
                            </div>
                        @endif

                        <div class="card-body mt-6">
                            <p class="font-extrabold">{{ $module->title }}</p>
                            <x-mentoring-app-status-bar :progress="$module->progress"
                                type="{{ $module->type }}"></x-mentoring-app-status-bar>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    </section>

</div>
