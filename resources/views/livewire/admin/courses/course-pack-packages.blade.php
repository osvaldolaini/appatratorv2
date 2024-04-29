<div class="w-100">
    <x-breadcrumb>
        <div class="grid grid-cols-8 gap-4 text-gray-600 ">
            <div class="col-span-6 justify-items-start">
                <h3 class="text-2xl font-bold tracki  dark:text-gray-50">
                    {{ $breadcrumb }}
                </h3>
            </div>
            <div class="col-span-2 justify-items-end w-full">

                <div class="flex justify-end font-medium duration-200 ">
                    <div class="tooltip tooltip-top p-0" data-tip="Descrição">
                        <a href="{{ route('course-pack-description', $pack_id) }}"
                            class="py-2 px-3 flex
                            hover:text-white dark:hover:bg-gray-300 transition-colors hover:hover:bg-gray-300
                            duration-200 whitespace-nowrap">
                            <svg class="h-6 w-6" viewBox="0 -1.5 20.412 20.412"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="check-lists"
                                    transform="translate(-1.588 -2.588)">
                                    <path id="primary" d="M7,4,4.33,7,3,5.5"
                                        fill="none" stroke="currentColor"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" />
                                    <path id="primary-2" data-name="primary"
                                        d="M3,11.5,4.33,13,7,10" fill="none"
                                        stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" />
                                    <path id="primary-3" data-name="primary"
                                        d="M3,17.5,4.33,19,7,16" fill="none"
                                        stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" />
                                    <path id="primary-4" data-name="primary"
                                        d="M11,6H21M11,12H21M11,18H21" fill="none"
                                        stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" />
                                </g>
                            </svg>
                        </a>
                    </div>
                    <div class="tooltip tooltip-top p-0" data-tip="Voltar">
                        <button wire:click="back()"
                            class="py-2 px-3 flex
                                hover:text-white dark:hover:bg-gray-300 transition-colors hover:hover:bg-gray-300
                                duration-200 whitespace-nowrap">
                                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                    </div>


                </div>
            </div>
        </div>
    </x-breadcrumb>
    <div class=" bg-white dark:bg-gray-800 sm:rounded-lg my-6 px-4">
        <div class="-mx-4  overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full align-middle md:px-6 lg:px-8">
                <div class="flex col-span-full items-center mt-0 justify-center">
                    <button class="btn btn-success w-full" wire:click="modalInsert()">
                        Inserir item
                        <svg class="h-4 w-4 mr-2" fill="currentColor" viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                    </button>
                </div>
                @if ($pack_apps->count() > 0)
                    <div class="w-100 pt-3 sm:rounded-lg">
                        <div class="flex flex-wrap sm:justify-around">
                            <div class="w-full">
                                <h1 class="text-5xl font-extrabold dark:text-white text-center">
                                    <small class="ml-2 font-semibold text-gray-500 dark:text-gray-400">
                                        Aplicativos do pacote
                                    </small>
                                </h1>
                                {{-- <x-app-carousel-cards qtd="4"> --}}
                                <div class="py-4 space-x-4 grid grid-cols-1 sm:grid-cols-4">
                                    @foreach ($pack_apps as $pack)
                                        @if ($pack->application == 'questions')
                                            <div id="item"
                                                class="carousel-item col-span-1 flex justify-center mt-4">
                                                <div class="w-56 h-60 p-2 bg-white drop-shadow-xl rounded-box">
                                                    <x-application-logo-questions
                                                        class="m-auto h-16 sm:h-20"></x-application-logo-questions>
                                                    <div class="p-2 sm:p-3 bg-slate-200 rounded-lg">
                                                        <p class="text-xl font-bold text-slate-500 ">
                                                            Plataforma de questões
                                                        </p>
                                                        <div class="flex items-center justify-between ">
                                                            <div
                                                                class="w-3/5 shadow-md rounded-md p-2 my-0 bg-black text-[#F3FB04]">
                                                                <div class="text-lg font-bold py-0 ">
                                                                    {{ $pack->plan->title }}
                                                                </div>
                                                                <div class="text-md font-bold">
                                                                    {{ $pack->plan->qtdUnity }}
                                                                </div>
                                                            </div>
                                                            <div class="tooltip tooltip-top p-0" data-tip="Excluir">
                                                                <button
                                                                    wire:click="showModalDelete({{ $pack->id }})"
                                                                    class="py-2 px-2 mt-4 lg:mt-0  font-bold items-center justify-center
                                                    rounded-md border flex bg-red-500 text-white">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="h-6 w-6 text-white" viewBox="0 0 24 24"
                                                                        fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M10 10V13M4 6H20M16 6L15.7294 5.18807C15.4671 4.40125 15.3359 4.00784 15.0927 3.71698C14.8779 3.46013 14.6021 3.26132 14.2905 3.13878C13.9376 3 13.523 3 12.6936 3H11.3064C10.477 3 10.0624 3 9.70951 3.13878C9.39792 3.26132 9.12208 3.46013 8.90729 3.71698C8.66405 4.00784 8.53292 4.40125 8.27064 5.18807L8 6M10 21H9C7.34315 21 6 19.6569 6 18V6M18 6V9M14 10V10.5M17 15.5V17H18.5M21 17C21 19.2091 19.2091 21 17 21C14.7909 21 13 19.2091 13 17C13 14.7909 14.7909 13 17 13C19.2091 13 21 14.7909 21 17Z"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif ($pack->application == 'treinament')
                                            <div id="item"
                                                class="carousel-item col-span-1 flex justify-center mt-4">
                                                <div class="w-56 h-60 p-2 bg-white drop-shadow-xl rounded-box ">
                                                    <x-application-logo-tfm
                                                        class="m-auto h-16 sm:h-20"></x-application-logo-tfm>
                                                    <div class="p-2 sm:p-3 bg-slate-200 rounded-lg">
                                                        <p class="text-xl font-bold text-slate-500 ">
                                                            Plataforma de Treinamento
                                                        </p>
                                                        <div class="flex items-center justify-between ">
                                                            <div
                                                                class="w-3/5 shadow-md rounded-md p-2 my-0 bg-black text-[#F3FB04]">
                                                                <div class="text-lg font-bold py-0 ">
                                                                    {{ $pack->plan->title }}
                                                                </div>
                                                                <div class="text-md font-bold">
                                                                    {{ $pack->plan->qtdUnity }}
                                                                </div>
                                                            </div>
                                                            <div class="tooltip tooltip-top p-0" data-tip="Excluir">
                                                                <button
                                                                    wire:click="showModalDelete({{ $pack->id }})"
                                                                    class="py-2 px-2 mt-4 lg:mt-0  font-bold items-center justify-center
                                                    rounded-md border flex bg-red-500 text-white">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="h-6 w-6 text-white" viewBox="0 0 24 24"
                                                                        fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M10 10V13M4 6H20M16 6L15.7294 5.18807C15.4671 4.40125 15.3359 4.00784 15.0927 3.71698C14.8779 3.46013 14.6021 3.26132 14.2905 3.13878C13.9376 3 13.523 3 12.6936 3H11.3064C10.477 3 10.0624 3 9.70951 3.13878C9.39792 3.26132 9.12208 3.46013 8.90729 3.71698C8.66405 4.00784 8.53292 4.40125 8.27064 5.18807L8 6M10 21H9C7.34315 21 6 19.6569 6 18V6M18 6V9M14 10V10.5M17 15.5V17H18.5M21 17C21 19.2091 19.2091 21 17 21C14.7909 21 13 19.2091 13 17C13 14.7909 14.7909 13 17 13C19.2091 13 21 14.7909 21 17Z"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif ($pack->application == 'essay')
                                            <div id="item"
                                                class="carousel-item col-span-1 flex justify-center mt-4">
                                                <div class="w-56 h-60 p-2 bg-white drop-shadow-xl rounded-box">
                                                    <x-application-logo-essay
                                                        class="m-auto h-16 sm:h-20"></x-application-logo-essay>
                                                    <div class="p-2 sm:p-3 bg-slate-200 rounded-lg">
                                                        <p class="text-xl font-bold text-slate-500 ">
                                                            Plataforma de Redações
                                                        </p>
                                                        <div class="flex items-center justify-between ">
                                                            <div
                                                                class="w-3/5 shadow-md rounded-md p-2 my-0 bg-black text-[#F3FB04]">
                                                                <div class="text-lg font-bold py-0 ">
                                                                    {{ $pack->plan->title }}
                                                                </div>
                                                                <div class="text-md font-bold">
                                                                    {{ $pack->plan->qtdUnity }}
                                                                </div>
                                                            </div>
                                                            <div class="tooltip tooltip-top p-0" data-tip="Excluir">
                                                                <button
                                                                    wire:click="showModalDelete({{ $pack->id }})"
                                                                    class="py-2 px-2 mt-4 lg:mt-0  font-bold items-center justify-center
                                                                        rounded-md border flex bg-red-500 text-white">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="h-6 w-6 text-white" viewBox="0 0 24 24"
                                                                        fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M10 10V13M4 6H20M16 6L15.7294 5.18807C15.4671 4.40125 15.3359 4.00784 15.0927 3.71698C14.8779 3.46013 14.6021 3.26132 14.2905 3.13878C13.9376 3 13.523 3 12.6936 3H11.3064C10.477 3 10.0624 3 9.70951 3.13878C9.39792 3.26132 9.12208 3.46013 8.90729 3.71698C8.66405 4.00784 8.53292 4.40125 8.27064 5.18807L8 6M10 21H9C7.34315 21 6 19.6569 6 18V6M18 6V9M14 10V10.5M17 15.5V17H18.5M21 17C21 19.2091 19.2091 21 17 21C14.7909 21 13 19.2091 13 17C13 14.7909 14.7909 13 17 13C19.2091 13 21 14.7909 21 17Z"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif ($pack->application == 'mentoring')
                                            <div id="item"
                                                class="carousel-item col-span-1 flex justify-center mt-4">
                                                <div class="w-56 h-60 p-2 bg-white drop-shadow-xl rounded-box">
                                                    <x-application-logo-mentoring
                                                        class="m-auto h-16 sm:h-20"></x-application-logo-mentoring>
                                                    <div class="p-2 sm:p-3 bg-slate-200 rounded-lg">
                                                        <p class="text-xl font-bold text-slate-500 ">
                                                            Plataforma de Mentoria
                                                        </p>
                                                        <div class="flex items-center justify-between">
                                                            <div
                                                                class="w-3/5 shadow-md rounded-md p-2 my-0 bg-black text-[#F3FB04]">
                                                                <div class="text-lg font-bold py-0 ">
                                                                    {{ $pack->plan->title }}
                                                                </div>
                                                                <div class="text-md font-bold">
                                                                    {{ $pack->plan->qtdUnity }}
                                                                </div>
                                                            </div>
                                                            <div class="tooltip tooltip-top p-0" data-tip="Excluir">
                                                                <button
                                                                    wire:click="showModalDelete({{ $pack->id }})"
                                                                    class="py-2 px-2 mt-4 lg:mt-0  font-bold items-center justify-center
                                                                        rounded-md border flex bg-red-500 text-white">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="h-6 w-6 text-white" viewBox="0 0 24 24"
                                                                        fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M10 10V13M4 6H20M16 6L15.7294 5.18807C15.4671 4.40125 15.3359 4.00784 15.0927 3.71698C14.8779 3.46013 14.6021 3.26132 14.2905 3.13878C13.9376 3 13.523 3 12.6936 3H11.3064C10.477 3 10.0624 3 9.70951 3.13878C9.39792 3.26132 9.12208 3.46013 8.90729 3.71698C8.66405 4.00784 8.53292 4.40125 8.27064 5.18807L8 6M10 21H9C7.34315 21 6 19.6569 6 18V6M18 6V9M14 10V10.5M17 15.5V17H18.5M21 17C21 19.2091 19.2091 21 17 21C14.7909 21 13 19.2091 13 17C13 14.7909 14.7909 13 17 13C19.2091 13 21 14.7909 21 17Z"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        {{-- <div>
                        @livewire('user.courses.api-courses')
                    </div> --}}
                    </div>
                @endif
                @if ($pack_courses->count() > 0)
                    <div class=" dark:bg-[#F3FB04] dark:text-gray-900 ">
                        <h1 class="text-5xl font-extrabold dark:text-white text-center">
                            <small class="ml-2 font-semibold text-gray-500 dark:text-gray-400">
                                Cursos do pacote
                            </small>
                        </h1>

                        <div class="py-4 space-x-4 grid grid-cols-1 sm:grid-cols-4">
                            @foreach ($pack_courses as $pack)
                                <div class="col-span-1">
                                    <div class="w-56 h-60 card card-compact image-full shadow-xl bg-cover">
                                        <figure><img class="w-full mx-auto"
                                                src="{{ url('storage/courses/' . $pack->course->id . '/' . $pack->course->image . '.webp') }}"
                                                alt="{{ $pack->course->slug }}">
                                        </figure>
                                        <div class="card-body">
                                            <p class="font-extrabold text-[#F3FB04]">{{ $pack->course->title }}</p>
                                            <div class="card-actions justify-between flex items-center ">
                                                <div
                                                    class="w-3/5 shadow-md rounded-md p-2 my-0 bg-black text-[#F3FB04]">
                                                    <div class="text-lg font-bold py-0 ">
                                                        {{ $pack->plan->title }}
                                                    </div>
                                                    <div class="text-md font-bold">
                                                        {{ $pack->plan->qtdUnity }}
                                                    </div>
                                                </div>
                                                <div class="tooltip tooltip-top p-0" data-tip="Excluir">
                                                    <button wire:click="showModalDelete({{ $pack->id }})"
                                                        class="py-2 px-2 mt-4 lg:mt-0  font-bold items-center justify-center
                                                    rounded-md border flex bg-red-500 text-white">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-6 w-6 text-white" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M10 10V13M4 6H20M16 6L15.7294 5.18807C15.4671 4.40125 15.3359 4.00784 15.0927 3.71698C14.8779 3.46013 14.6021 3.26132 14.2905 3.13878C13.9376 3 13.523 3 12.6936 3H11.3064C10.477 3 10.0624 3 9.70951 3.13878C9.39792 3.26132 9.12208 3.46013 8.90729 3.71698C8.66405 4.00784 8.53292 4.40125 8.27064 5.18807L8 6M10 21H9C7.34315 21 6 19.6569 6 18V6M18 6V9M14 10V10.5M17 15.5V17H18.5M21 17C21 19.2091 19.2091 21 17 21C14.7909 21 13 19.2091 13 17C13 14.7909 14.7909 13 17 13C19.2091 13 21 14.7909 21 17Z"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                @endif
            </div>
        </div>
    </div>
    {{-- MODAL DELETE --}}
    <x-confirmation-modal wire:model="showJetModal">
        <x-slot name="title">
            Excluir registro
        </x-slot>
        <x-slot name="content">
            <h2 class="h2">Deseja realmente excluir o registro?</h2>
            <p>Não será possível reverter esta ação!</p>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('showJetModal')" wire:loading.attr="disabled">
                Cancelar
            </x-secondary-button>

            <x-danger-button class="ml-2" wire:click="delete({{ $registerId }})" wire:loading.attr="disabled">
                Apagar registro
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>

    {{-- MODAL CREATE --}}
    <x-dialog-modal wire:model="showModalCreate">
        <x-slot name="title">Inserir novo</x-slot>
        <x-slot name="content">
            <form wire:submit="store">
                <div class="grid gap-4 mb-1 grid-cols-2 sm:gap-6 sm:mb-5">
                    <div class="col-span-2">
                        <label for="plan_id" class="block text-sm font-medium text-gray-900 dark:text-white">
                            *Plano</label>
                        <select wire:model="plan_id" required="" name="plan_id" id="plan_id"
                            placeholder="Plano"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="">Selecione uma opção</option>
                            @foreach ($plans as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                        @error('plan_id')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <label for="type" class="block text-sm font-medium text-gray-900 dark:text-white">
                            Tipo</label>
                        <select wire:model.live="type" name="type" id="type" placeholder="Tipo"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="">Selecione uma opção</option>
                            <option value="app">Aplicativo</option>
                            <option value="course">Curso</option>
                        </select>
                    </div>
                    @if ($type == 'app')
                        <div class="col-span-2">
                            <label for="unity"
                                class="w-full flex text-sm
                        font-medium text-gray-900 dark:text-white">
                                *Aplicativos / Cursos</label>
                            <div id="tabs" class="grid grid-flow-row-dense grid-cols-2 grid-rows-2">
                                @if (!in_array('questions', $removeApp))
                                    <label class="col-span justify-center inline-block text-center py-2">
                                        <input type="radio" value="questions" wire:model.live="application"
                                            name="application" class="radio" />
                                        <span class="tab tab-explore block text-xs">Questões</span>
                                    </label>
                                @endif
                                @if (!in_array('treinament', $removeApp))
                                    <label class="col-span justify-center inline-block text-center py-2">
                                        <input type="radio" value="treinament" wire:model.live="application"
                                            name="application" class="radio" />
                                        <span class="tab tab-explore block text-xs">Treinamento</span>
                                    </label>
                                @endif
                                @if (!in_array('essay', $removeApp))
                                    <label class="col-span justify-center inline-block text-center py-2">
                                        <input type="radio" value="essay" wire:model.live="application"
                                            name="application" class="radio" />
                                        <span class="tab tab-explore block text-xs">Redação</span>
                                    </label>
                                @endif
                                @if (!in_array('mentoring', $removeApp))
                                    <label class="col-span justify-center inline-block text-center py-2">
                                        <input type="radio" value="mentoring" wire:model.live="application"
                                            name="application" class="radio" />
                                        <span class="tab tab-explore block text-xs">Mentoria</span>
                                    </label>
                                @endif
                            </div>
                            @error('applications')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    @elseif ($type == 'course')
                        <div class="col-span-2">
                            <label for="course_id" class="block text-sm font-medium text-gray-900 dark:text-white">
                                *Curso</label>
                            <div id="tabs" class="grid grid-flow-row-dense grid-cols-1 grid-rows-1">
                                @foreach ($courses as $course)
                                    @if (!in_array($course->id, $removeCourse))
                                        <label class="w-full justify-left inline-flex text-left py-2">
                                            <input type="radio" value="{{ $course->id }}"
                                                wire:model.live="course_id" class="radio" />
                                            <span class="tab tab-explore block text-xs">{{ $course->title }}</span>
                                        </label>
                                    @endif
                                @endforeach
                            </div>
                            </select>
                            @error('course_id')
                                <span class="error">{{ $message }}</span>
                            @enderror

                        </div>
                    @endif


                </div>
            </form>
        </x-slot>
        <x-slot name="footer">
            <button type="submit" wire:click="store"
                class="text-white
                        bg-blue-700 hover:bg-blue-800
                        focus:ring-4 focus:outline-none focus:ring-blue-300
                        font-medium rounded-lg text-sm px-5 py-2.5
                        text-center dark:bg-blue-600 dark:hover:bg-blue-700
                        dark:focus:ring-blue-800">
                Salvar
            </button>
            <x-secondary-button wire:click="$toggle('showModalCreate')" class="mx-2">
                Fechar
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>

</div>
