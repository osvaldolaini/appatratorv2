<div>
    <x-breadcrumb>
        <div class="grid grid-cols-8 gap-4 text-gray-600 ">
            <div class="col-span-6 justify-items-start">
                <h3 class="text-2xl font-bold tracki  dark:text-gray-50">
                    {{ $breadcrumb_title }}

                </h3>
            </div>
            <div class="col-span-2 justify-items-end">
                <div class="w-full">
                    <div class="flex justify-between font-medium duration-200 ">
                        <div class="tooltip tooltip-top p-0" data-tip="Alternativas">
                            <a href="{{ route('alternative-question',$id) }}"
                                class="py-2 px-3 flex
                                    hover:text-white dark:hover:bg-gray-300 transition-colors hover:hover:bg-gray-300
                                    duration-200 whitespace-nowrap">
                                <svg class="h-6 w-6" viewBox="0 -1.5 20.412 20.412" xmlns="http://www.w3.org/2000/svg">
                                    <g id="check-lists" transform="translate(-1.588 -2.588)">
                                        <path id="primary" d="M7,4,4.33,7,3,5.5" fill="none" stroke="currentColor"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                        <path id="primary-2" data-name="primary" d="M3,11.5,4.33,13,7,10" fill="none"
                                            stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                        <path id="primary-3" data-name="primary" d="M3,17.5,4.33,19,7,16" fill="none"
                                            stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                        <path id="primary-4" data-name="primary" d="M11,6H21M11,12H21M11,18H21" fill="none"
                                            stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    </g>
                                </svg>
                            </a>
                        </div>
                        <div class="tooltip tooltip-top p-0" data-tip="Resposta correta">
                            <a href="{{ route('correct-question',$id) }}"
                                class="py-2 px-3 flex
                                    hover:text-white dark:hover:bg-gray-300 transition-colors hover:hover:bg-gray-300
                                    duration-200 whitespace-nowrap">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " viewBox="0 0 48 48" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0)">
                                        <path
                                            d="M42 20V39C42 40.6569 40.6569 42 39 42H9C7.34315 42 6 40.6569 6 39V9C6 7.34315 7.34315 6 9 6H30"
                                            stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M16 20L26 28L41 7" stroke="currentColor" stroke-width="4" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0">
                                            <rect width="48" height="48" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        </div>

                        <div class="tooltip tooltip-top p-0" data-tip="Editar">
                            <a href="{{ route('edit-question',$id) }}"
                                class="py-2 px-3 flex
                                        hover:text-white dark:hover:bg-blue-500 transition-colors hover:hover:bg-blue-500
                                        duration-200 whitespace-nowrap">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-breadcrumb>
    <section class="px-4 dark:bg-gray-800 dark:text-gray-50 container flex flex-col mx-auto space-y-12">
        <form wire:submit="submit">
            <fieldset class="grid grid-cols-12 gap-2 pb-6 rounded-md dark:bg-gray-900 items-start">
                    <div class="col-span-full sm:col-span-6">
                        <label for="year" class="block text-sm font-medium text-gray-900 dark:text-white">
                            *Ano </label>
                        <input type="text" wire:model="year" name="year" id="year"  placeholder="Ano " required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @error('year') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-span-full sm:col-span-6">
                        <label for="dificult_init"
                        class="block text-sm font-medium text-gray-900 dark:text-white">
                        Nível inicial de dificuldade</label>
                        <select wire:model="dificult_init"  name="dificult_init" id="dificult_init" placeholder="Disciplina"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                            <option value="">Selecione uma opção</option>
                                <option value="10">Muito Fácil</option>
                                <option value="25">Fácil</option>
                                <option value="50">Médio</option>
                                <option value="75">Difícil</option>
                                <option value="90">Muito difícil</option>
                        </select>
                        @error('dificult_init') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-span-full sm:col-span-6">
                        <label for="institution_id" class="block text-sm
                        font-medium text-gray-900 dark:text-white">
                            *Instituição
                        </label>
                        <select wire:model="institution_id" required  name="institution_id" id="institution_id" placeholder="Disciplina" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                            <option value="">Selecione uma opção</option>
                            @foreach ($institution as $item)
                                <option value="{{ $item->id }}" >{{ $item->title }}</option>
                            @endforeach
                        </select>
                        @error('institution_id') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-span-full sm:col-span-6">
                        <label for="education_area_indice_id" class="block text-sm font-medium text-gray-900 dark:text-white">
                            Área de formação
                        </label>
                        <select wire:model="education_area_indice_id"  name="education_area_indice_id" id="education_area_indice_id" placeholder="Disciplina" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                            <option value="">Selecione uma opção</option>
                            @foreach ($educationArea as $item)
                                <option value="{{ $item->id }}" >{{ $item->title }}</option>
                            @endforeach
                        </select>
                        @error('education_area_indice_id') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-span-full sm:col-span-6">
                        <label for="examining_board_id" class="block text-sm font-medium text-gray-900 dark:text-white">

                            Banca
                        </label>
                        <select wire:model="examining_board_id"  name="examining_board_id" id="examining_board_id" placeholder="Disciplina" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                            <option value="">Selecione uma opção</option>
                            @foreach ($examiningBoard as $item)
                                <option value="{{ $item->id }}" >{{ $item->title }}</option>
                            @endforeach
                        </select>
                        @error('examining_board_id') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-span-full sm:col-span-6">
                        <label for="level_id" class="block text-sm font-medium text-gray-900 dark:text-white">

                            Nível de formação
                        </label>
                        <select wire:model="level_id"  name="level_id" id="level_id" placeholder="Disciplina" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                            <option value="">Selecione uma opção</option>
                            @foreach ($level as $item)
                                <option value="{{ $item->id }}" >{{ $item->title }}</option>
                            @endforeach
                        </select>
                        @error('level_id') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-span-full sm:col-span-6">
                        <label for="modality_id" class="block text-sm font-medium text-gray-900 dark:text-white">

                            *Modalidade
                        </label>
                        <select wire:model="modality_id"  required name="modality_id" id="modality_id" placeholder="Disciplina" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                            <option value="">Selecione uma opção</option>
                            @foreach ($modality as $item)
                                <option value="{{ $item->id }}" >{{ $item->title }}</option>
                            @endforeach
                        </select>
                        @error('modality_id') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-span-full sm:col-span-6">
                        <label for="occupation_area_indice_id" class="block text-sm font-medium text-gray-900 dark:text-white">

                            Área de atuação
                        </label>
                        <select wire:model="occupation_area_indice_id"  name="occupation_area_indice_id" id="occupation_area_indice_id" placeholder="Disciplina" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                            <option value="">Selecione uma opção</option>
                            @foreach ($occupationArea as $item)
                                <option value="{{ $item->id }}" >{{ $item->title }}</option>
                            @endforeach
                        </select>
                        @error('occupation_area_indice_id') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-span-full sm:col-span-6">
                        <label for="office_id" class="block text-sm font-medium text-gray-900 dark:text-white">

                            Cargo
                        </label>
                        <select wire:model="office_id"  name="office_id" id="office_id" placeholder="Disciplina" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                            <option value="">Selecione uma opção</option>
                            @foreach ($office as $item)
                                <option value="{{ $item->id }}" >{{ $item->title }}</option>
                            @endforeach
                        </select>
                        @error('office_id') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-span-full sm:col-span-6">
                        <label for="discipline_id" class="block text-sm font-medium text-gray-900 dark:text-white">

                            Disciplina
                        </label>
                        <select wire:model="discipline_id"
                         name="discipline_id"
                        wire:change="filterDiscipline"
                        id="discipline_id" placeholder="Disciplina" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                            <option value="">Selecione uma opção</option>
                            @foreach ($discipline as $item)
                                <option value="{{ $item->id }}" >{{ $item->title }}</option>
                            @endforeach
                        </select>
                        @error('discipline_id') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    @if ($matters)
                        <div class="col-span-full sm:col-span-6">
                            <label for="matter_id" class="block text-sm font-medium text-gray-900 dark:text-white">

                                Matéria
                            </label>
                            <select wire:model="matter_id"
                             name="matter_id"
                            wire:change="filterMatter"
                            id="matter_id" placeholder="Disciplina" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                                <option value="">Selecione uma opção</option>
                                @foreach ($matters as $item)
                                    <option value="{{ $item->id }}" >{{ $item->title }}</option>
                                @endforeach
                            </select>
                            @error('matter_id') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    @endif
                    @if ($subMatters)
                        <div class="col-span-full sm:col-span-6">
                            <label for="sub_matter_id" class="block text-sm font-medium text-gray-900 dark:text-white">

                                Sub item
                            </label>
                            <select wire:model="sub_matter_id"
                            name="sub_matter_id"
                            id="sub_matter_id" placeholder="Sub item"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                                <option >Selecione uma opção</option>
                                @foreach ($subMatters as $item)
                                    <option value="{{ $item->id }}" >{{ $item->title }}</option>
                                @endforeach
                            </select>

                        </div>
                    @endif
        </form>
        <div class="flex col-span-full items-center space-x-4 mt-10 justify-end">
            <button class="btn btn-success">Salvar</button>
        </div>
        </fieldset>

    </section>
    <x-dialog-modal wire:model="modalSearch" class="mt-0">
        <x-slot name="title">Pesquisar</x-slot>
        <x-slot name="content">
            <div class="grid gap-4 mb-1 grid-cols-1">
                <fieldset class="col-span-1 w-full space-y-1 dark:text-gray-100">
                    <label for="Search" class="hidden">Pesquisar </label>
                    <div class="relative w-full">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                            <button type="button" title="search" class="p-1 focus:outline-none focus:ring">
                                <svg fill="currentColor" viewBox="0 0 512 512" class="w-4 h-4 dark:text-gray-100">
                                    <path
                                        d="M479.6,399.716l-81.084-81.084-62.368-25.767A175.014,175.014,0,0,0,368,192c0-97.047-78.953-176-176-176S16,94.953,16,192,94.953,368,192,368a175.034,175.034,0,0,0,101.619-32.377l25.7,62.2L400.4,478.911a56,56,0,1,0,79.2-79.195ZM48,192c0-79.4,64.6-144,144-144s144,64.6,144,144S271.4,336,192,336,48,271.4,48,192ZM456.971,456.284a24.028,24.028,0,0,1-33.942,0l-76.572-76.572-23.894-57.835L380.4,345.771l76.573,76.572A24.028,24.028,0,0,1,456.971,456.284Z">
                                    </path>
                                </svg>
                            </button>
                        </span>
                        <input type="text" placeholder="Pesquisar" wire:model.live="inputSearch"
                            class="w-full border-blue-500 py-3 pl-10 text-sm text-gray-900
                            rounded-2xl  focus:ring-primary-500 dark:bg-gray-700
                            dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500"
                            autofocus />
                    </div>
                </fieldset>
                @isset($results)
                    <div class="overflow-x-auto">
                        <table class="table">
                            <tbody>
                                @if ($results)
                                    @foreach ($results as $item)
                                        <tr class="hover:bg-gray-200">
                                            <td>
                                                <div class="flex items-center gap-3 cursor-pointer "
                                                    wire:click="selectPartner({{ $item->id }})">
                                                    <div class="avatar">
                                                        <div class="mask mask-squircle w-12 h-12">
                                                            @if ($item->imageTitle)
                                                            <picture>
                                                                <source
                                                                srcset="{{ url('storage/partners/' . $item->imageTitle . '.jpg') }}" />
                                                                <source
                                                                    srcset="{{ url('storage/partners/' . $item->imageTitle . '.webp') }}" />
                                                                <source
                                                                    srcset="{{ url('storage/partners/' . $item->imageTitle . '.png') }}" />
                                                                <img src="{{ url('storage/partners/' . $item->imageTitle . '.jpg') }}"
                                                                    alt="{{ $item->name }}">
                                                            </picture>
                                                            @endif

                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="font-bold">{{ $item->name }} -
                                                            {{ $item->partner_category_master }}</div>
                                                        <div class="text-sm opacity-50">{{ $item->cpf }} </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>

                @endisset

            </div>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('modalSearch')" class="mx-2">
                Fechar
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>



</div>
