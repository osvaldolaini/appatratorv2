<div class="w-100">
    <div class="bg-white  dark:bg-gray-800 sm:rounded-lg">
        <div class="grid grid-cols-2 md:grid-cols-6 gap-2 px-4 py-1 ">
            <div class="col-span-full lg:col-span-4 mx-1 sm:pb-5 " wire:model="questions">
                {{ print_r($selectedFiltersMask) }}
                <div class="col-span-full mx-1 pb-8 sm:pb-2">
                    <label for="filters" class="block text-sm font-medium " wire:model="filters">
                        Filtros: {{ $filters }}
                    </label>
                    <div wire:model="selectedFiltersMask" class="flex flex-wrap">
                        @if (isset($selectedFiltersMask))
                            @foreach ($selectedFiltersMask as $item)
                                <div
                                    class="flex flex-col m-1 p-0 pr-1 dark:bg-white dark:text-white shadow-sm rounded bg-gray-100 border">
                                    <div data-id="{{ $item['table'] }}_{{ $item['id'] }}"
                                        onclick="removeFilter('{{ $item['table'] }}_{{ $item['id'] }}')"
                                        class=" flex flex-nowarp flex-row-reverse text-xs"
                                        wire:click="updateSelectedFilters('{{ $item['id'] }}','{{ $item['title'] }}','{{ $item['table'] }}')">
                                        {{ $item['title'] }}
                                        <svg class="fill-current h-4 w-4" role="button" viewBox="0 0 20 20">
                                            <path
                                                d="M14.348,14.849c-0.469,0.469-1.229,0.469-1.697,0L10,11.819l-2.651,3.029c-0.469,0.469-1.229,0.469-1.697,0 c-0.469-0.469-0.469-1.229,0-1.697l2.758-3.15L5.651,6.849c-0.469-0.469-0.469-1.228,0-1.697s1.228-0.469,1.697,0L10,8.183 l2.651-3.031c0.469-0.469,1.228-0.469,1.697,0s0.469,1.229,0,1.697l-2.758,3.152l2.758,3.15 C14.817,13.62,14.817,14.38,14.348,14.849z" />
                                        </svg>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                @if (empty($questions))
                    <h3 class="w-full inline-block text-center sm:text-2xl">
                        <svg class="h-10 w-10 mx-auto" viewBox="0 -0.5 24 24"
                            id="meteor-icon-kit__solid-exclamation-triangle" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M13.7744 1.41218L23.4802 20.0771C23.9898 21.0571 23.6085 22.2646 22.6285 22.7742C22.3435 22.9224 22.027 22.9998 21.7058 22.9998H2.29425C1.18968 22.9998 0.29425 22.1044 0.29425 20.9998C0.29425 20.6786 0.371621 20.3621 0.519817 20.0771L10.2256 1.41218C10.7352 0.432187 11.9427 0.0508554 12.9227 0.560452C13.2874 0.75009 13.5848 1.04749 13.7744 1.41218ZM10.5 9.49981V13.9998C10.5 14.8282 11.1716 15.4998 12 15.4998C12.8284 15.4998 13.5 14.8282 13.5 13.9998V9.49981C13.5 8.67138 12.8284 7.99981 12 7.99981C11.1716 7.99981 10.5 8.67138 10.5 9.49981ZM12 19.9998C12.8284 19.9998 13.5 19.3282 13.5 18.4998C13.5 17.6714 12.8284 16.9998 12 16.9998C11.1716 16.9998 10.5 17.6714 10.5 18.4998C10.5 19.3282 11.1716 19.9998 12 19.9998Z"
                                fill="currentColor" />
                        </svg>
                        Ops! Nenhum resultado encontrado.
                    </h3>
                @else
                    @foreach ($questions as $question)
                        @if ($question->alternatives->count() > 0)
                            @livewire('user.apps.questions.response', ['question' => $question], key($question->id))
                        @endif
                    @endforeach
                @endif
            </div>
            <div class="drawer drawer-end lg:drawer-open col-span-full sm:col-span-2">
                <input id="my-drawer-right" type="checkbox" class="drawer-toggle" />
                <div class="drawer-side">
                    <label for="my-drawer-right" aria-label="close sidebar" class="drawer-overlay"></label>
                    <ul class="menu px-4 w-80 min-h-full bg-base-200 text-base-content">
                        <h1 class="text-5xl font-extrabold dark:text-white text-center">
                            <small class="ml-2 font-semibold text-gray-500 dark:text-gray-400">
                                Filtros</small>
                        </h1>
                        <div class="grid grid-cols-1 px-2 sm:mb-3">
                            <div>
                                <div class="flex-none p-1">
                                    <button onclick="showDropdownOptions('year')"
                                        class="flex flex-row justify-between w-full px-1 py-2 text-gray-700
                                bg-white border-2 border-white rounded-md shadow-md focus:outline-none
                                focus:border-blue-600">
                                        <span class="select-none">Ano do concurso</span>
                                        <svg id="arrow-down-year" class="w-5 h-5 stroke-current"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <svg id="arrow-up-year" class="hidden w-5 h-5 stroke-current"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    <div id="options_year"
                                        class="overflow-y-auto h-48 absolute hidden w-48 py-2 mt-1 bg-white rounded-lg shadow-xl max-h-63">
                                        <ul class="dropdown-content menu px-2 rounded-lg">
                                            @for ($i = 1998; $i < date('Y'); $i++)
                                                <li>
                                                    <label>
                                                        <input type="checkbox" id="year_{{ $i }}"
                                                            wire:click="updateSelectedFilters(
                                                                '{{ $i }}',
                                                                '{{ $i }}',
                                                                'year'
                                                            )" />
                                                        {{ $i }}
                                                    </label>
                                                </li>
                                            @endfor
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="flex-none p-1 ">
                                    <button onclick="showDropdownOptions('dificult_init')"
                                        class="flex flex-row justify-between w-full px-1 py-2 text-gray-700
                                bg-white border-2 border-white rounded-md shadow-md focus:outline-none
                                focus:border-blue-600">
                                        <span class="select-none">Nível inicial de dificuldade</span>
                                        <svg id="arrow-down-dificult_init" class="w-5 h-5 stroke-current"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <svg id="arrow-up-dificult_init" class="hidden w-5 h-5 stroke-current"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    <div id="options_dificult_init"
                                        class="overflow-y-auto h-48 absolute hidden w-48 py-2 mt-1 bg-white rounded-lg shadow-xl max-h-63">
                                        <ul class="dropdown-content menu p-2 rounded-lg">
                                            <li>
                                                <label>
                                                    <input type="checkbox" id="dificult_init_10"
                                                        wire:click="updateSelectedFilters(
                                                            '10',
                                                            'Muito Fácil',
                                                            'dificult_init'
                                                        )">
                                                    Muito Fácil
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" id="dificult_init_25"
                                                        wire:click="updateSelectedFilters(
                                                            '25',
                                                            'Fácil',
                                                            'dificult_init'
                                                        )">
                                                    Fácil
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" id="dificult_init_50"
                                                        wire:click="updateSelectedFilters(
                                                            '50',
                                                            'Média',
                                                            'dificult_init'
                                                        )">
                                                    Média
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" id="dificult_init_75"
                                                        wire:click="updateSelectedFilters(
                                                            '75',
                                                            'Difícil',
                                                            'dificult_init'
                                                        )">
                                                    Difícil
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" id="dificult_init_90"
                                                        wire:click="updateSelectedFilters(
                                                            '90',
                                                            'Muito Difícil',
                                                            'dificult_init'
                                                        )">
                                                    Muito Difícil
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <x-app-select-filter :data="$institution" table="intitution" placeholder="Instituição" />
                            </div>
                            <div>
                                <x-app-select-filter :data="$educationArea" table="education_areas"
                                    placeholder="Área de formação" />
                            </div>
                            <div>
                                <x-app-select-filter :data="$examiningBoard" table="examining_boards" placeholder="Banca" />
                            </div>
                            <div>
                                <x-app-select-filter :data="$level" table="levels"
                                    placeholder="Nível de formação" />
                            </div>
                            <div>
                                <x-app-select-filter :data="$modality" table="modalities" placeholder="Modalidade" />
                            </div>
                            <div>
                                <x-app-select-filter :data="$occupationArea" table="occupation_areas"
                                    placeholder="Área de atuação" />
                            </div>
                            <div>
                                <x-app-select-filter :data="$office" table="offices" placeholder="Cargo" />
                            </div>
                            <div>
                                <x-app-select-filter :data="$discipline" table="disciplines" placeholder="Disciplina" />
                            </div>
                            @if ($filtermatters)
                                <div>
                                    <x-app-select-filter :data="$filtermatters" table="matters" placeholder="Matéria" />
                                </div>
                            @endif
                            @if ($filtersubMatters)
                                <div>
                                    <x-app-select-filter :data="$filtersubMatters" table="sub_matters"
                                        placeholder="Sub matéria" />
                                </div>
                            @endif
                        </div>
                        <div class="grid grid-cols-1 px-2 sm:mb-3 lg:hidden">
                            <div class="px-1 pt-5 flex justify-end col-span-2 ">
                                <label for="my-drawer-right"
                                    class="drawer-button bg-white flex items-center text-gray-700 dark:text-gray-300
                                justify-center gap-x-3 text-sm sm:text-base dark:bg-gray-900
                                dark:border-gray-700 dark:hover:bg-gray-800 rounded-lg hover:bg-gray-100
                                duration-300 transition-colors border px-8 py-2.5 shadow-md">
                                    <svg id="Layer_1" class="w-5 h-5 sm:h-6 sm:w-6" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg" data-name="Layer 1">
                                        <path
                                            d="m15 24-6-4.5v-5.12l-8-9v-2.38a3 3 0 0 1 3-3h16a3 3 0 0 1 3 3v2.38l-8 9zm-4-5.5 2 1.5v-6.38l8-9v-1.62a1 1 0 0 0 -1-1h-16a1 1 0 0 0 -1 1v1.62l8 9z" />
                                    </svg>
                                    <span>Fechar</span>
                                </label>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 px-2 sm:mb-3  sm:hidden">
                            <div class="m-5 pb-8 sm:pb-2 col-span-2">
                                <label for="filters" class="block text-sm font-medium " wire:model="filters">
                                    Filtros: {{ $filters }}
                                </label>
                                <div wire:model="selectedFiltersMask" class="flex flex-wrap">
                                    @if (isset($selectedFiltersMask))
                                        @foreach ($selectedFiltersMask as $item)
                                            <div
                                                class="flex flex-col m-1 p-0 pr-1 dark:bg-white dark:text-white shadow-sm rounded bg-gray-100 border">
                                                <div data-id="{{ $item['table'] }}_{{ $item['id'] }}"
                                                    onclick="removeFilter('{{ $item['table'] }}_{{ $item['id'] }}')"
                                                    class=" flex flex-nowarp flex-row-reverse text-xs"
                                                    wire:click="updateSelectedFilters('{{ $item['id'] }}','{{ $item['title'] }}','{{ $item['table'] }}')">
                                                    {{ $item['title'] }}
                                                    <svg class="fill-current h-4 w-4" role="button"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M14.348,14.849c-0.469,0.469-1.229,0.469-1.697,0L10,11.819l-2.651,3.029c-0.469,0.469-1.229,0.469-1.697,0 c-0.469-0.469-0.469-1.229,0-1.697l2.758-3.15L5.651,6.849c-0.469-0.469-0.469-1.228,0-1.697s1.228-0.469,1.697,0L10,8.183 l2.651-3.031c0.469-0.469,1.228-0.469,1.697,0s0.469,1.229,0,1.697l-2.758,3.152l2.758,3.15 C14.817,13.62,14.817,14.38,14.348,14.849z" />
                                                    </svg>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        function removeFilter(id) {
            document.getElementById(id).checked = false;
        }

        function showDropdownOptions(id) {
            document.getElementById("options_" + id).classList.toggle("hidden");
            document.getElementById("arrow-up-" + id).classList.toggle("hidden");
            document.getElementById("arrow-down-" + id).classList.toggle("hidden");
        }
    </script>

</div>
