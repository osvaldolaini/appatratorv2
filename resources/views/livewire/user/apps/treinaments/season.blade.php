<div class="w-100 min-h-screen">
    <h1 class="text-5xl font-extrabold dark:text-white text-center">
        <small class="ml-2 font-semibold text-gray-500 dark:text-gray-400">
            Meus treinos </small>
        </h1>
        <nav class="mb-5 overflow-hidden
                         flex dark:bg-gray-800 ">
            <ol role="list"
                class="max-w-screen-xl w-full mx-auto flex space-x-2 sm:space-x-4 sm:px-6
                           lg:px-8 ">
                @if ($access == true)
                    <li class="flex flex-row cursor-pointer rounded-box text-primary-content  bg-primary "
                     wire:click="showModalCreate()">

                        <h2 class="card-title mx-2">Novo treino</h2>
                        <button
                            class="p-2">
                            <svg class="h-10 w-10 " fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                        </button>
                    </li>
                @else
                    <li class="flex flex-row w-full">
                        <button class="flex flex-row float-right p-2 bg-primary rounded-box text-primary-content ">
                            <h2 class="card-title mx-2">Sem pacote</h2>
                        </button>
                    </li>
                @endif
            </ol>
        </nav>

    <div class="bg-white  dark:bg-gray-800 pt-3 sm:rounded-lg">
        <div class="grid grid-cols-2 gap-4 px-4 py-5" id="season" wire:model="season">
            @foreach ($season as $item)
                <div
                    class="col-span-full sm:col-span-1 card {{ $item->limit_date < date('Y-m-d') ? 'bg-red-300' : 'bg-gray-100' }} shadow-xl">
                    <div class="card-body">
                        <h2 class="card-title">{{ $item->title }} ({{ $item->year }})</h2>
                        <p class="card-title">Data do teste: {{ $item->limit_date }}
                        </p>
                        {!! $item->limit < date('Y-m-d') ? '<p class="card-title">Vencido</p>' : '' !!}
                        <div class="card-actions justify-end">
                            <div class="w-full">
                                <div
                                    class="flex justify-between font-medium
                                        {{ $item->limit_date < date('Y-m-d') ? 'text-white' : 'text-gray-400 dark:text-gray-300 ' }}
                                        duration-200 ">
                                    <div class="tooltip tooltip-bottom p-0 " data-tip="Treinos">
                                        <a href="{{ route('apps.season.treinaments', $item->id) }}"
                                            class="flex py-2 px-3 rounded-l hover:text-white dark:hover:bg-gray-500 hover:bg-gray-500 whitespace-nowrap">
                                            <svg class="h-6 w-6" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor">
                                                <circle cx="17" cy="4" r="2" stroke="currentColor" />
                                                <path stroke="currentColor"
                                                    d="M15.777 10.969a2.007 2.007 0 0 0 2.148.83l3.316-.829-.483-1.94-3.316.829-1.379-2.067a2.01 2.01 0 0 0-1.272-.854l-3.846-.77a1.998 1.998 0 0 0-2.181 1.067l-1.658 3.316 1.789.895 1.658-3.317 1.967.394L7.434 17H3v2h4.434c.698 0 1.355-.372 1.715-.971l1.918-3.196 5.169 1.034 1.816 5.449 1.896-.633-1.815-5.448a2.007 2.007 0 0 0-1.506-1.33l-3.039-.607 1.772-2.954.417.625z" />
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="tooltip tooltip-bottom p-0" data-tip="Evolução">
                                        <a href="{{ route('apps.season.stats', $item->id) }}"
                                            class="flex py-2 px-3 hover:text-white dark:hover:bg-gray-500 hover:bg-gray-500 whitespace-nowrap">
                                            <svg class="h-6 w-6" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor">
                                                <path d="M12 19L12 11" stroke="currentColor" stroke-width="4"
                                                    stroke-linecap="round" />
                                                <path d="M7 19L7 15" stroke="currentColor" stroke-width="4"
                                                    stroke-linecap="round" />
                                                <path d="M17 19V6" stroke="currentColor" stroke-width="4"
                                                    stroke-linecap="round" />
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="tooltip tooltip-bottom p-0" data-tip="Lista de exercícios">
                                        <a href="{{ route('apps.season.exercises', $item->id) }}"
                                            class="flex py-2 px-3  transition-colors
                                            dark:hover:bg-gray-500 hover:bg-gray-500
                                            duration-200 hover:text-white whitespace-nowrap">
                                            <svg class="h-6 w-6" viewBox="0 -1.5 20.412 20.412"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="check-lists" transform="translate(-1.588 -2.588)">
                                                    <path id="primary" d="M7,4,4.33,7,3,5.5" fill="none"
                                                        stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" />
                                                    <path id="primary-2" data-name="primary" d="M3,11.5,4.33,13,7,10"
                                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" />
                                                    <path id="primary-3" data-name="primary" d="M3,17.5,4.33,19,7,16"
                                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" />
                                                    <path id="primary-4" data-name="primary"
                                                        d="M11,6H21M11,12H21M11,18H21" fill="none"
                                                        stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" />
                                                </g>
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="tooltip tooltip-bottom p-0" data-tip="Editar">
                                        <button wire:click="showModalEdit({{ $item->id }})"
                                            class="py-2 px-3
                                    hover:text-white dark:hover:bg-blue-500 transition-colors hover:bg-blue-500
                                    duration-200 whitespace-nowrap">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="tooltip tooltip-bottom p-0" data-tip="Apagar">
                                        <button wire:click="showModal({{ $item->id }})"
                                            class="py-2 px-3
                                        transition-colors dark:hover:bg-red-500 hover:bg-red-500
                                        duration-200 hover:text-white -ml-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="tooltip tooltip-bottom p-0" data-tip="Ver">
                                        <button wire:click="showView({{ $item->id }})"
                                            class="py-2 px-3 rounded-r transition-colors
                                    dark:hover:bg-teal-500 hover:bg-teal-500
                                    duration-200 hover:text-white -ml-1">
                                            <svg stroke="currentColor" class="w-5 h-5 sm:w-6 sm:h-6"
                                                viewBox="0 0 24 24" fill="currentColor"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M6.30147 15.5771C4.77832 14.2684 3.6904 12.7726 3.18002 12C3.6904 11.2274 4.77832 9.73158 6.30147 8.42294C7.87402 7.07185 9.81574 6 12 6C14.1843 6 16.1261 7.07185 17.6986 8.42294C19.2218 9.73158 20.3097 11.2274 20.8201 12C20.3097 12.7726 19.2218 14.2684 17.6986 15.5771C16.1261 16.9282 14.1843 18 12 18C9.81574 18 7.87402 16.9282 6.30147 15.5771ZM12 4C9.14754 4 6.75717 5.39462 4.99812 6.90595C3.23268 8.42276 2.00757 10.1376 1.46387 10.9698C1.05306 11.5985 1.05306 12.4015 1.46387 13.0302C2.00757 13.8624 3.23268 15.5772 4.99812 17.0941C6.75717 18.6054 9.14754 20 12 20C14.8525 20 17.2429 18.6054 19.002 17.0941C20.7674 15.5772 21.9925 13.8624 22.5362 13.0302C22.947 12.4015 22.947 11.5985 22.5362 10.9698C21.9925 10.1376 20.7674 8.42276 19.002 6.90595C17.2429 5.39462 14.8525 4 12 4ZM10 12C10 10.8954 10.8955 10 12 10C13.1046 10 14 10.8954 14 12C14 13.1046 13.1046 14 12 14C10.8955 14 10 13.1046 10 12ZM12 8C9.7909 8 8.00004 9.79086 8.00004 12C8.00004 14.2091 9.7909 16 12 16C14.2092 16 16 14.2091 16 12C16 9.79086 14.2092 8 12 8Z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    {{-- MODAL DELETE --}}
    <x-confirmation-modal wire:model="showJetModal">
        <x-slot name="title">Excluir registro</x-slot>
        <x-slot name="content">
            <h2 class="h2">Deseja realmente excluir o registro?</h2>
            <p>Não será possível reverter esta ação!</p>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('showJetModal')" class="mx-2">
                Cancelar
            </x-secondary-button>
            <x-danger-button wire:click.prevent="delete({{ $registerId }})" wire.loading.attr='disable'>
                Apagar registro
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>
    {{-- MODAL READ --}}
    <x-dialog-modal wire:model="showModalView">
        <x-slot name="title">Detalhes</x-slot>
        <x-slot name="content">
            <dl class="max-w text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                @if ($detail)
                    @foreach ($detail as $item => $value)
                        @if ($value)
                            <div class="flex flex-col pb-1">
                                <dt class="text-gray-500 md:text-lg dark:text-gray-400">{{ $item }}:</dt>
                                <dd class="text-lg font-semibold">
                                    {{ $value }}
                                </dd>
                            </div>
                        @endif
                    @endforeach
                @endif
            </dl>

            @if ($exercises)
                <dl class="max-w text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                    <div class="flex flex-col pb-1 mx-auto ">
                        <h1 class="text-lg font-semibold">Melhores resultados</h1>
                    </div>
                    @foreach ($exercises as $excercise => $value)
                        @if ($value)
                            <div class="flex flex-col pb-1">
                                <dt class="text-gray-500 md:text-lg dark:text-gray-400">{{ $excercise }}:</dt>
                                <dd class="text-lg font-semibold">
                                    {{ $value }}
                                </dd>
                            </div>
                        @endif
                    @endforeach
                </dl>
            @endif
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('showModalView')" class="mx-2">
                Fechar
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
    {{-- MODAL CREATE --}}
    <x-dialog-modal wire:model="modalCreate">
        <x-slot name="title">Criar novo</x-slot>
        <x-slot name="content">
            <form action="#" wire:submit.prevent="store()" wire.loading.attr='disable'>
                <div class="grid gap-4 mb-1 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                    <div class="sm:col-span-2">
                        <label for="title"
                            class="block text-sm font-medium text-gray-900 dark:text-white">Concurso</label>
                        <input type="text" wire:model="title" name="title" id="title"
                            placeholder="Concurso" required=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @error('title')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-span-2 sm:w-full">
                        <label for="year"
                            class="block text-sm font-medium text-gray-900 dark:text-white">Ano</label>
                        <input type="text" wire:model="year" name="year" id="year" placeholder="Ano"
                            required=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @error('year')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full sm:col-span-2" x-data x-init="Inputmask({
                        'mask': '99/99/9999'
                    }).mask($refs.input_date)">
                        <label for="limit_date" class="block text-sm font-medium text-gray-900 dark:text-white">
                            Data do teste
                        </label>
                        <input type="text" x-ref="input_date" wire:model="limit_date" name="limit_date"
                            id="limit_date" placeholder="Data do teste" required=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @error('limit_date')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="flex items-end space-x-4">
                    <button type="submit"
                        class="text-white
                        bg-blue-700 hover:bg-blue-800
                        focus:ring-4 focus:outline-none focus:ring-blue-300
                        font-medium rounded-lg text-sm px-5 py-2.5
                        text-center dark:bg-blue-600 dark:hover:bg-blue-700
                        dark:focus:ring-blue-800">
                        Salvar
                    </button>
                </div>
            </form>

        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('modalCreate')" class="mx-2">
                Fechar
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
    {{-- MODAL UPDATE --}}
    <x-dialog-modal wire:model="modalEdit">
        <x-slot name="title">Editar</x-slot>
        <x-slot name="content">
            <form wire:submit.prevent="update">
                <div class="grid gap-4 mb-1 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                    <div class="sm:col-span-2">
                        <label for="title"
                            class="block text-sm font-medium text-gray-900 dark:text-white">Concurso</label>
                        <input type="text" wire:model="title" name="title" id="title"
                            placeholder="Concurso" required=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @error('title')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-span-2 sm:w-full">
                        <label for="year"
                            class="block text-sm font-medium text-gray-900 dark:text-white">Ano</label>
                        <input type="text" wire:model="year" name="year" id="year" placeholder="Ano"
                            required=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @error('year')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full sm:col-span-2" x-data x-init="Inputmask({
                        'mask': '99/99/9999'
                    }).mask($refs.input_date)">
                        <label for="limit_date" class="block text-sm font-medium text-gray-900 dark:text-white">Data
                            do teste</label>
                        <input type="text" x-ref="input_date" wire:model="limit_date" name="limit_date"
                            id="limit_date" placeholder="Data do teste" required=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @error('limit_date')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="flex items-end space-x-4">
                    <button type="submit"
                        class="text-white
                        bg-blue-700 hover:bg-blue-800
                        focus:ring-4 focus:outline-none focus:ring-blue-300
                        font-medium rounded-lg text-sm px-5 py-2.5
                        text-center dark:bg-blue-600 dark:hover:bg-blue-700
                        dark:focus:ring-blue-800">
                        Atualizar
                    </button>
                </div>
            </form>
        </x-slot>
        <x-slot name="footer">
            <x-primary-button wire:click="$toggle('modalEdit')" class="mx-2">
                Fechar
                </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
</div>
