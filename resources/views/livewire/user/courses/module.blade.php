<div>
    <x-courses.main :content="$module">
        <x-slot name="drawerContent">
            <section class="bg-gray-900 text-gray-100">
                @if ($view == 'defult')
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
                            <h1 class="text-5xl font-bold leadi">
                                {{ $content->title }}
                                <span class="text-right">
                                    @livewire('user.courses.my-content-checks', [$content])
                                </span>
                            </h1>
                            <div
                                class="flex items-center justify-center p-6 mt-8 lg:mt-0 h-72 sm:h-80 lg:h-96 xl:h-112 2xl:h-128">
                                <figure><img class="object-contain h-72 sm:h-80 lg:h-96 xl:h-112 2xl:h-128"
                                        src="{{ url('storage/modules/' . $content->id . '/thumb/' . $content->code . '.webp') }}"
                                        alt="{{ $content->code }}">
                                </figure>
                            </div>
                            <p class="mt-6 mb-8 text-lg sm:mb-12">
                                {!! $content->description !!}
                            </p>
                        </div>

                    </div>
                @endif

            </section>
        </x-slot>
    </x-courses.main>
</div>
