<div>
    <div class="static text-cyan-600 dark:text-cyan-100">
        <div class="grid sm:grid-cols-2  px-2 sm:mb-3">
            <div>
                <div class="flex-none p-1">
                    <button onclick="showDropdownOptions('year')"
                        class="flex flex-row justify-between w-full px-1 py-2
                        text-gray-700 bg-white border-2 border-white rounded-md
                        shadow focus:outline-none focus:border-blue-600">
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
                                <li >
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
                <div class="flex-none p-1">
                    <button onclick="showDropdownOptions('dificult_init')"
                        class="flex flex-row justify-between w-full px-1 py-2 text-gray-700 bg-white border-2 border-white rounded-md shadow focus:outline-none focus:border-blue-600">
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
                            <li >
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
                            <li >
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
                            <li >
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
                            <li >
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
                            <li >
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
                <x-app-select-filter
                :data="$institution"
                table="intitution"
                placeholder="Instituição"/>
            </div>
            <div>
                <x-app-select-filter
                :data="$educationArea"
                table="education_areas"
                placeholder="Área de formação"/>
            </div>
            <div>
                <x-app-select-filter
                :data="$examiningBoard"
                table="examining_boards"
                placeholder="Banca"/>
            </div>
            <div>
                <x-app-select-filter
                :data="$level"
                table="levels"
                placeholder="Nível de formação"/>
            </div>
            <div>
                <x-app-select-filter
                :data="$modality"
                table="modalities"
                placeholder="Modalidade"/>
            </div>
            <div>
                <x-app-select-filter
                :data="$occupationArea"
                table="occupation_areas"
                placeholder="Área de atuação"/>
            </div>
            <div>
                <x-app-select-filter
                :data="$office"
                table="offices"
                placeholder="Cargo"/>
            </div>
            <div>
                <x-app-select-filter
                :data="$discipline"
                table="disciplines"
                placeholder="Disciplina"/>
            </div>
            @if ($filtermatters)
                <div>
                    <x-app-select-filter
                    :data="$filtermatters"
                    table="matters"
                    placeholder="Matéria"/>
                </div>
            @endif
            @if ($filtersubMatters)
                <div>
                    <x-app-select-filter
                    :data="$filtersubMatters"
                    table="sub_matters"
                    placeholder="Sub matéria"/>
                </div>
            @endif
        </div>
        <div class="grid gap-2 sm:grid-cols-2 sm:gap-1 px-4 sm:mb-3 ">
            <div>
                <button wire:click="search"
                    class="bg-white flex items-center text-gray-700 dark:text-gray-300
                    justify-center gap-x-3  text-sm sm:text-base  dark:bg-gray-900
                    dark:border-gray-700 dark:hover:bg-gray-800 rounded-lg hover:bg-gray-100
                    duration-300 transition-colors border px-8 py-2.5">
                    <svg id="Layer_1" class="w-5 h-5 sm:h-6 sm:w-6" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg" data-name="Layer 1">
                        <path
                            d="m15 24-6-4.5v-5.12l-8-9v-2.38a3 3 0 0 1 3-3h16a3 3 0 0 1 3 3v2.38l-8 9zm-4-5.5 2 1.5v-6.38l8-9v-1.62a1 1 0 0 0 -1-1h-16a1 1 0 0 0 -1 1v1.62l8 9z" />
                    </svg>
                    <span>Filtrar</span>
                </button>
            </div>
        </div>
    </div>

    <script>
        function removeFilter(id) {
            document.getElementById(id).checked = false;
            console.log(id)
        }

        function showDropdownOptions(id) {
            document.getElementById("options_" + id).classList.toggle("hidden");
            document.getElementById("arrow-up-" + id).classList.toggle("hidden");
            document.getElementById("arrow-down-" + id).classList.toggle("hidden");
        }
    </script>
</div>

