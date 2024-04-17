<div>
    <div class="drawer lg:drawer-open drawer-end">
        <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content">
            <!-- Page content here -->
            <div class="m-3">
                <section class="bg-gray-900 text-gray-100">
                    @if ($view == 'default')
                        <div class="container flex flex-col justify-center mx-auto lg:flex-row lg:justify-between">
                            <div
                                class="flex flex-col justify-center px-6 text-center rounded-sm lg:max-w-md xl:max-w-lg lg:text-left">
                                <h1 class="text-5xl font-bold leadi">
                                    {{ $module->title }}
                                </h1>
                                <p class="mt-6 mb-8 text-lg sm:mb-12">
                                    {!! $module->description !!}
                                </p>
                            </div>
                            <div
                                class="flex items-center justify-center p-6 mt-8 lg:mt-0 h-72 sm:h-80 lg:h-96 xl:h-112 2xl:h-128">
                                <figure><img class="object-contain h-72 sm:h-80 lg:h-96 xl:h-112 2xl:h-128"
                                        src="{{ url('storage/modules/' . $module->id . '/thumb/' . $module->code . '.webp') }}"
                                        alt="{{ $module->code }}">
                                </figure>
                            </div>
                        </div>
                    @else
                        <div class="container flex flex-col justify-center mx-auto">
                            <div
                                class="flex flex-col justify-center px-6 rounded-sm
                                w-full text-left">
                                <h1 class="w-full flex text-5xl justify-between font-bold leadi">
                                    <span>{{ $myContent->title }}</span>
                                    <div class="flex justify-end items-center">
                                        @if ($myContent->type == 1)
                                            @livewire('user.courses.my-content-checks', [$myContent->id])
                                        @endif
                                    </div>
                                </h1>
                                @if ($myContent->image)
                                    <div
                                        class="flex items-center justify-center p-6 mt-8 lg:mt-0 h-72 sm:h-80 lg:h-96 xl:h-112 2xl:h-128">
                                        <figure><img class="object-contain h-72 sm:h-80 lg:h-96 xl:h-112 2xl:h-128"
                                                src="{{ url('storage/modules/' . $myContent->module_id . '/content/' . $myContent->id . '/thumb/' . $myContent->code . '.webp') }}"
                                                alt="{{ $myContent->code }}">
                                        </figure>
                                    </div>
                                @endif
                                @if ($myContent->description)
                                    <p class="mt-6 text-lg">Descrição:</p>
                                    <p >
                                        {!! $myContent->description !!}
                                    </p>
                                @endif

                                @switch($myContent->type_content)
                                    @case('video')
                                        <div class="mt-6 mb-8 text-lg sm:mb-12">
                                            <div class="embed-responsive embed-responsive-16by9 ">
                                                <iframe class="w-full" height="600" src="{{ $myContent->youtube_link }}"
                                                    title="{{ $myContent->title }}" frameborder="0"
                                                    allow="accelerometer;
                                                        autoplay;
                                                        clipboard-write;
                                                        encrypted-media;
                                                        gyroscope;
                                                        picture-in-picture;
                                                        web-share"
                                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                                                </iframe>
                                            </div>
                                        </div>
                                    @break

                                    @case('download')
                                        <div class="grid grid-cols-2 space-x-2 my-2">
                                            <div class="col-span-full">
                                                <h2>Arquivo(s) para download</h2>
                                            </div>
                                            @if ($myContent->documents)
                                                @foreach (json_decode($myContent->documents) as $document)
                                                    @livewire('user.courses.download-documents', [$document])
                                                @endforeach
                                            @endif

                                        </div>
                                    @break

                                    @default
                                @endswitch
                            </div>
                        </div>
                    @endif
                </section>
            </div>
        </div>
        <div class="drawer-side">
            <label for="my-drawer-3" class="drawer-overlay"></label>
            <div class="flex flex-col mt-4 mr-3">
                <!-- Navigation Rail -->
                <button wire:click="back()"
                    class="flex py-2 px-3 hover:text-white dark:hover:bg-gray-300
                    transition-colors hover:bg-gray-700 rounded-sm
                        duration-200 whitespace-nowrap">Voltar
                    para o lobby do curso
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
                <div class="relative min-h-80 lg:block w-96 mb-20 ">
                    <div class="min-h-80 border border-white rounded-2xl bg-gray-900 py-2">
                        <nav class="mt-3">
                            <div class="mx-4 text-sm font-normal">
                                @livewire('user.courses.module-progress', [$module])
                            </div>
                            <span class="mx-4 text-sm font-normal">
                                Lista de conteúdos
                            </span>
                            <div class="w-full my-10">
                                @foreach ($module->contents as $content)
                                    <div id="accordion-collapse" data-accordion="collapse">
                                        <h2 id="accordion-collapse-heading-{{ $content->id }}">
                                            <button type="button"
                                                class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray{{ $content->id }}00 dark:hover:bg-gray-800 gap-3"
                                                data-accordion-target="#accordion-collapse-body-{{ $content->id }}"
                                                @if ($view == $content->code) aria-expanded="true"
                                                @else
                                                    aria-expanded="false" @endif
                                                aria-controls="accordion-collapse-body-{{ $content->id }}">
                                                <span class="flex items-center">
                                                    @if ($content->type == 1)
                                                        @if ($content->check())
                                                            <svg class="me-2 shrink-0 w-7 h-7 text-green-500"
                                                                fill="currentColor" viewBox="0 0 18 18"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path fill="currentColor"
                                                                    d="M9 0a9 9 0 1 0 9 9 9 9 0 0 0-9-9zm4.49 6.924l-5.02 5.51a.983.983 0 0 1-1.442 0l-2.48-2.482a.983.983 0 0 1 .008-1.417 1.027 1.027 0 0 1 1.4.02L7.712 10.3l4.3-4.73a1.018 1.018 0 0 1 1.4-.075 1.006 1.006 0 0 1 .078 1.43z" />
                                                            </svg>
                                                        @else
                                                            <svg class="me-2 shrink-0 w-7 h-7 " fill="currentColor"
                                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill="#494c4e"
                                                                    d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10S2 17.514 2 12 6.486 2 12 2m0-2C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0z" />
                                                                <path fill="#494c4e"
                                                                    d="M10.5 16.5c-.42 0-.82-.176-1.094-.484l-2.963-2.97c-.274-.26-.443-.653-.443-1.06 0-.405.17-.798.462-1.078.482-.513 1.557-.55 2.113.037l1.925 1.93 4.943-4.958c.52-.55 1.575-.57 2.132.02.256.242.425.634.425 1.04 0 .402-.164.79-.45 1.068l-5.993 6.012c-.238.267-.637.443-1.057.443z" />
                                                            </svg>
                                                        @endif
                                                    @endif

                                                    {{ $content->title }}
                                                </span>
                                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 10 6">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                                </svg>
                                            </button>
                                        </h2>
                                        <div id="accordion-collapse-body-{{ $content->id }}" class="hidden"
                                            aria-labelledby="accordion-collapse-heading-{{ $content->id }}">
                                            <div
                                                class="p-2 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                                <div class="w-full text-white ">
                                                    <div class="w-full flex justify-end">
                                                        @if ($content->type == 1)
                                                            @livewire('user.courses.my-content-checks', [$content->id])
                                                        @endif
                                                    </div>
                                                    <p>Resumo:</p>
                                                    <p class="mb-3 font-normal ">
                                                        {{ substr(strip_tags($content->description), 0, 50) }}...
                                                    </p>
                                                    <p wire:click="changeContent({{ $content->id }})"
                                                        class="cursor-pointer inline-flex font-medium items-center text-blue-600 hover:underline">
                                                        Ver conteúdo
                                                        <svg class="ml-2 w-3 h-3 ms-2.5 rtl:rotate-[270deg]"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 18 18">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                                                        </svg>
                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
