<div class="flex flex-col mt-0 sm:mt-4 sm:ml-3">
    <!-- Navigation Rail -->

    <div class="relative min-h-80 lg:block w-96 mb-20 ">
        <div class="min-h-80 border border-white rounded-2xl bg-gray-900 py-2">
            <nav class="mt-3">
                <div class="mx-4 text-sm font-normal">
                    <x-mentoring-app-status-bar :progress="$module->progress" type="{{ $module->type }}"></x-mentoring-app-status-bar>
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
                                data-accordion-target="#accordion-collapse-body-{{ $content->id }}" aria-expanded="true"
                                aria-controls="accordion-collapse-body-{{ $content->id }}">
                                <span class="flex items-center">
                                    @livewire('user.courses.my-content-checks', [$content])
                                    {{ $content->title }}
                                </span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 5 5 1 1 5" />
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-collapse-body-{{ $content->id }}" class="hidden"
                            aria-labelledby="accordion-collapse-heading-{{ $content->id }}">
                            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is an
                                    open-source library of interactive components built on top
                                    of Tailwind CSS including buttons, dropdowns, modals,
                                    navbars, and more.</p>
                                <p class="text-gray-500 dark:text-gray-400"></p>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>

            </nav>
        </div>
    </div>
</div>
