<div class="w-100">
    <style>
        input:checked+label span.alternative {
            background-color: #fff;
            border: solid 2px rgb(7, 175, 226);
            color: rgb(7, 175, 226);
        }

        input:checked+label span.alternative-text {
            color: rgb(7, 175, 226);
        }

        input:checked+label {
            box-shadow: 1px 1px 1px 1px rgba(0, 0, 0, 0.281);
        }
    </style>
    <div class="bg-white  dark:bg-gray-800 sm:rounded-lg">
        <div class="grid grid-cols-2 md:grid-cols-6 gap-2 px-4 py-1 ">
            <div class="col-span-full lg:col-span-4 mx-1 sm:pb-5 " wire:model="questions">

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

                        <div class="mt-5 shadow-md" wire:key="question-{{ $question->id }}">
                            <div class="bg-cyan-200 dark:bg-cyan-800 flex justify-start text-xs shadow-md">
                                <div class="p-2 font-extrabold flex items-center text-sm">
                                    <a href="#" class="text-cyan-800 dark:text-slate-200  font-extrabold hover:underline">
                                        AQ{{ str_pad($question->id, 4, '0', STR_PAD_LEFT) }}
                                    </a>
                                </div>
                                <div
                                    class="flex shrink px-1 py-2 overflow-x-auto
                                    bg-slate-200 dark:bg-slate-800 w-full">

                                    @if ($question->discipline_id)
                                        <a href="#" class="text-cyan-600 dark:text-slate-200 hover:underline">
                                            {{ $question->disciplines->title }}
                                        </a>

                                        <span class="mx-3 text-slate-500 dark:text-slate-300 rtl:-scale-x-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    @else
                                    <a href="#" class="text-cyan-600 dark:text-slate-200 hover:underline">
                                       Disciplina não cadastrada
                                    </a>
                                    @endif

                                    @if ($question->matter_id)
                                    <a href="#" class="text-cyan-600 dark:text-slate-200 hover:underline">
                                        {{ $question->matters->title }}
                                    </a>
                                    @endif
                                </div>
                            </div>
                            <div class="flex flex-col sm:flex-row justify-start text-xs mx-0 px-0">
                                <div class="px-3 pt-1 sm:py-2 flex flex-nowrap">
                                    <span class="font-semibold  pr-1">
                                        Cargo:
                                    </span>
                                    @if ($question->office)
                                    {{ $question->offices->title }}
                                    @endif

                                    <span class="hidden lg:block pl-2">/</span>
                                </div>
                                <div class="px-3 pt-1 sm:py-2 flex flex-nowrap">
                                    <span class="font-semibold  pr-1">
                                        Instituição:
                                    </span>
                                    @if ($question->intitution)
                                    {{ $question->intitution->title }}
                                    @endif
                                    <span class="hidden lg:block pl-2">/</span>
                                </div>
                                <div class="px-3 pt-1 sm:py-2 flex flex-nowrap">
                                    <span class="font-semibold pr-1">
                                        Ano:
                                    </span>
                                    {{ $question->year }}
                                    <span class="hidden lg:block pl-2">/</span>
                                </div>
                                <div class="px-3 pt-1 sm:py-2 flex flex-nowrap">
                                    <span class="font-semibold pr-1">
                                        Banca:
                                    </span>
                                    @if ($question->examining_boards)
                                    {{ $question->examining_boards->title }}
                                    @endif
                                </div>
                            </div>
                            <form wire:submit.prevent="submit">
                                <div class="bg-white py-3 sm:py-3 lg:py-2">
                                    <div class="px-4 md:px-8 mx-auto border-y-2 border-cyan-500 text-sm">
                                        {!! $question->text !!}

                                            <ul class="space-y-2 mt-3">
                                                @php
                                                    $alternativas = range('a', chr(ord('a') + $question->alternatives->count()));
                                                    $i = 0;
                                                @endphp
                                                @foreach ($question->alternatives as $alternative)
                                                    <li>
                                                        <div>
                                                            <input  id="radio-{{ $alternative->id }}" type="radio"
                                                                class="hidden" value="{{ $alternative->id }}"
                                                                wire:model="alternative_id" name="alternative_id">
                                                            <label class="flex flex-row px-2 py-2 cursor-pointer rounded-md"
                                                                for="radio-{{ $alternative->id }}">
                                                                <span
                                                                    class="alternative items-center text-xl text-center w-8 h-8 font-bold
                                                                        text-cyan-800 dark:text-cyan-100 dark:bg-cyan-200
                                                                        hover:text-cyan-100 hover:bg-cyan-500
                                                                        hover:outline hover:outline-cyan-500 hover:outline-offset-2
                                                                        uppercase rounded-2xl bg-cyan-400 mr-2" >{{ $alternativas[$i] }} </span>
                                                                <span
                                                                    class="alternative-text items-center text-xl font-bold">{!! $alternative->text !!} </span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                    @php
                                                        $i += 1;
                                                    @endphp
                                                @endforeach
                                                @error('alternative_id') <span class="error text-red-500">{{ $message }}</span> @enderror
                                            </form>
                                            <li></li>
                                            </ul>
                                    </div>
                                        <div class="mx-auto mb-5 text-sm">
                                            <div>
                                                <!-- component -->
                                                <div class="w-full text-gray-600 dark:text-gray-100 text-gray-500bg-gray-100 dark:bg-gray-700">
                                                    <!-- <section id="bottom-navigation" class="md:hidden block fixed inset-x-0 bottom-0 z-10 bg-white shadow"> // if shown only tablet/mobile-->
                                                    <section class="block inset-x-0 ">
                                                        <div id="tabs" class="flex justify-between">
                                                            @if ($access == true)
                                                                <div class="w-full justify-center inline-block text-center pt-2 pb-1">
                                                                    <button type="submit" class="text-white
                                                                    bg-blue-700 hover:bg-blue-800
                                                                    focus:ring-4 focus:outline-none focus:ring-blue-300
                                                                    font-medium rounded-lg text-sm px-5 py-2.5
                                                                    text-center dark:bg-blue-600 dark:hover:bg-blue-700
                                                                    dark:focus:ring-blue-800">
                                                                        Responder
                                                                    </button>
                                                                </div>

                                                            @else
                                                                <span class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                                    <svg class="w-5 h-5 mx-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                                        <path d="M20,3a1,1,0,0,0,0-2H4A1,1,0,0,0,4,3H5.049c.146,1.836.743,5.75,3.194,8-2.585,2.511-3.111,7.734-3.216,10H4a1,1,0,0,0,0,2H20a1,1,0,0,0,0-2H18.973c-.105-2.264-.631-7.487-3.216-10,2.451-2.252,3.048-6.166,3.194-8Zm-6.42,7.126a1,1,0,0,0,.035,1.767c2.437,1.228,3.2,6.311,3.355,9.107H7.03c.151-2.8.918-7.879,3.355-9.107a1,1,0,0,0,.035-1.767C7.881,8.717,7.227,4.844,7.058,3h9.884C16.773,4.844,16.119,8.717,13.58,10.126ZM12,13s3,2.4,3,3.6V20H9V16.6C9,15.4,12,13,12,13Z"/>
                                                                    </svg>
                                                                    <span class="mx-1">Sem plano</span>
                                                                </span>
                                                            @endif
                                                            <label
                                                                class="w-full justify-center inline-block text-center pt-2 pb-1 ">
                                                                <svg  width="25" height="25" viewBox="0 0 24 24" class="inline-block mb-1 stroke-green-500 fill-green-500" xmlns="http://www.w3.org/2000/svg">
                                                                    <path stroke="#currentColor" fill="#currentColor" fill-rule="evenodd" clip-rule="evenodd" d="M10 5C8.34315 5 7 6.34315 7 8C7 9.65685 8.34315 11 10 11C11.6569 11 13 9.65685 13 8C13 6.34315 11.6569 5 10 5ZM13.5058 11.565C14.4281 10.6579 15 9.39576 15 8C15 5.23858 12.7614 3 10 3C7.23858 3 5 5.23858 5 8C5 9.39827 5.57396 10.6625 6.49914 11.5699C3.74942 12.5366 2 14.6259 2 17C2 17.5523 2.44772 18 3 18C3.55228 18 4 17.5523 4 17C4 15.2701 5.93073 13 10 13C12.6152 13 14.4051 13.9719 15.2988 15.1157C15.6389 15.5509 16.2673 15.628 16.7025 15.288C17.1377 14.9479 17.2148 14.3195 16.8748 13.8843C16.0904 12.8804 14.9401 12.0686 13.5058 11.565ZM22.6139 15.2106C23.0499 15.5497 23.1284 16.178 22.7894 16.6139L18.1227 22.6139C17.9485 22.8379 17.6875 22.9773 17.4045 22.9975C17.1216 23.0177 16.8434 22.9167 16.6392 22.7198L14.3059 20.4698C13.9083 20.0865 13.8968 19.4534 14.2802 19.0559C14.6635 18.6583 15.2966 18.6468 15.6941 19.0302L17.2268 20.5081L21.2106 15.3861C21.5497 14.9501 22.178 14.8716 22.6139 15.2106Z" />
                                                                </svg>
                                                                <span class="block text-xs sm:text-sm text-green-500" >Meus</span>
                                                                <span class="block text-xs sm:text-sm text-green-500" wire:model="myHit">Acertos {{ $question->myHit }}</span>
                                                            </label>

                                                            <label
                                                                class="w-full justify-center inline-block text-center pt-2 pb-1">
                                                                <svg width="25" height="25" viewBox="0 0 24 24" class="inline-block mb-1 stroke-red-500 fill-red-500" xmlns="http://www.w3.org/2000/svg">
                                                                    <path stroke="#currentColor" fill="#currentColor" fill-rule="evenodd" clip-rule="evenodd" d="M10 5C8.34315 5 7 6.34315 7 8C7 9.65685 8.34315 11 10 11C11.6569 11 13 9.65685 13 8C13 6.34315 11.6569 5 10 5ZM13.506 11.5648C14.4282 10.6578 15 9.39566 15 8C15 5.23858 12.7614 3 10 3C7.23858 3 5 5.23858 5 8C5 9.39827 5.57396 10.6625 6.49914 11.5699C3.74942 12.5366 2 14.6259 2 17C2 17.5523 2.44772 18 3 18C3.55228 18 4 17.5523 4 17C4 15.2701 5.93073 13 10 13C11.5647 13 12.8409 13.3499 13.8011 13.8767C14.2853 14.1424 14.8932 13.9652 15.1588 13.481C15.4245 12.9968 15.2473 12.3889 14.7631 12.1233C14.3732 11.9094 13.9535 11.7221 13.506 11.5648ZM15.2929 15.2929C15.6834 14.9024 16.3166 14.9024 16.7071 15.2929L19 17.5858L21.2929 15.2929C21.6834 14.9024 22.3166 14.9024 22.7071 15.2929C23.0976 15.6834 23.0976 16.3166 22.7071 16.7071L20.4142 19L22.7071 21.2929C23.0976 21.6834 23.0976 22.3166 22.7071 22.7071C22.3166 23.0976 21.6834 23.0976 21.2929 22.7071L19 20.4142L16.7071 22.7071C16.3166 23.0976 15.6834 23.0976 15.2929 22.7071C14.9024 22.3166 14.9024 21.6834 15.2929 21.2929L17.5858 19L15.2929 16.7071C14.9024 16.3166 14.9024 15.6834 15.2929 15.2929Z" />
                                                                </svg>
                                                                <span class="block text-xs sm:text-sm text-red-500" >Meus</span>
                                                                <span class="block text-xs sm:text-sm text-red-500" wire:model="myFault">Erros {{ $question->myFault }}</span>
                                                            </label>
                                                            <label
                                                                class="w-full justify-center inline-block text-center pt-2 pb-1 ">
                                                                <svg  width="25" height="25" viewBox="0 0 24 24" class="inline-block mb-1 stroke-green-500 fill-green-500" xmlns="http://www.w3.org/2000/svg">
                                                                    <path  stroke="#currentColor" fill="#currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M16 18L18 20L22 16M12 15H8C6.13623 15 5.20435 15 4.46927 15.3045C3.48915 15.7105 2.71046 16.4892 2.30448 17.4693C2 18.2044 2 19.1362 2 21M15.5 3.29076C16.9659 3.88415 18 5.32131 18 7C18 8.67869 16.9659 10.1159 15.5 10.7092M13.5 7C13.5 9.20914 11.7091 11 9.5 11C7.29086 11 5.5 9.20914 5.5 7C5.5 4.79086 7.29086 3 9.5 3C11.7091 3 13.5 4.79086 13.5 7Z"/>

                                                                </svg>
                                                                <span class="block text-xs sm:text-sm text-green-500" wire:model="allFault">Acertos {{ $question->allHit }}</span>
                                                            </label>

                                                            <label
                                                                class="w-full justify-center inline-block text-center pt-2 pb-1">
                                                                <svg width="25" height="25" viewBox="0 0 24 24"
                                                                class="inline-block mb-1 stroke-red-500 fill-red-500" xmlns="http://www.w3.org/2000/svg">
                                                                    <path stroke="#currentColor" fill="#currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M16.5 16L21.5 21M21.5 16L16.5 21M15.5 3.29076C16.9659 3.88415 18 5.32131 18 7C18 8.67869 16.9659 10.1159 15.5 10.7092M12 15H8C6.13623 15 5.20435 15 4.46927 15.3045C3.48915 15.7105 2.71046 16.4892 2.30448 17.4693C2 18.2044 2 19.1362 2 21M13.5 7C13.5 9.20914 11.7091 11 9.5 11C7.29086 11 5.5 9.20914 5.5 7C5.5 4.79086 7.29086 3 9.5 3C11.7091 3 13.5 4.79086 13.5 7Z" />
                                                                </svg>
                                                                <span class="block text-xs sm:text-sm text-red-500" wire:model="allHit">Erros {{ $question->allFault }}</span>
                                                            </label>
                                                        </div>
                                                    </section>
                                                </div>
                                            </div>

                                        </div>

                                </div>
                            </form>
                        </div>
                            {{-- @livewire('user.apps.questions.response', ['question' => $question], key($question->id)) --}}
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
     {{-- MODAL READ --}}
     <x-dialog-modal wire:model="showCorrectResponse">
        <x-slot name="title">Resposta correta</x-slot>
        <x-slot name="content">
                {!! $right_answer !!}
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('showCorrectResponse')" class="mx-2">
                Fechar
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>

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
