<div class="w-100 pb-52 sm:mb-3">
    <div class="bg-white shadow-md dark:bg-gray-800 pt-3 sm:rounded-lg">
        <div class=" bg-white shadow-md dark:bg-gray-800 sm:rounded-lg my-6 px-4 mb-4">
            <div class=" overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full align-middle md:px-6 lg:px-8">

                    <nav class="mb-5 overflow-hidden
                         border-gray-200 flex dark:bg-gray-800 ">
                        <ol role="list"
                            class="max-w-screen-xl w-full mx-auto flex space-x-2 sm:space-x-4 sm:px-6
                            lg:px-8 ">
                            <li class="flex flex-row w-full">
                                <a href="{{ url('app-de-treinamento/concursos') }}"
                                    class="flex flex-row p-2 bg-success rounded-box text-white mr-5">
                                    <h2 class="card-title mx-2">Voltar</h2>
                                    <svg class="h-8 w-8 " fill="currentColor" viewBox="0 0 32 32"
                                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <g id="icomoon-ignore"></g>
                                        <path
                                            d="M14.389 7.956v4.374l1.056 0.010c7.335 0.071 11.466 3.333 12.543 9.944-4.029-4.661-8.675-4.663-12.532-4.664h-1.067v4.337l-9.884-7.001 9.884-7zM15.456 5.893l-12.795 9.063 12.795 9.063v-5.332c5.121 0.002 9.869 0.26 13.884 7.42 0-4.547-0.751-14.706-13.884-14.833v-5.381z">
                                        </path>
                                    </svg>
                                </a>
                                @if ($access == true)
                                    <a href="{{ route('apps.season.treining', $season_id) }}"
                                        class="flex flex-row float-right p-2 bg-primary rounded-box text-primary-content ">
                                        <h2 class="card-title mx-2">Inserir treino</h2>
                                        <svg class="h-8 w-8 " fill="currentColor" viewbox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path clip-rule="evenodd" fill-rule="evenodd"
                                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                        </svg>
                                    </a>
                                @else
                                    <button
                                        class="flex flex-row float-right p-2 bg-primary rounded-box text-primary-content ">
                                        <h2 class="card-title mx-2">Sem pacote</h2>
                                    </button>
                                @endif
                            </li>
                        </ol>
                    </nav>
                    <div
                        class="overflow-hidden border border-gray-200 dark:border-gray-700
                    sm:rounded-lg mb-5">
                        <x-message-session></x-message-session>
                        <div class="grid grid-cols-2 gap-4 px-4 py-2" id="season" wire:model="season">
                            <div class="col-span-2 flex justify-center">
                                <h2>Lista de treinos</h2>
                            </div>
                            @foreach ($seasonTreinaments as $item)
                                <div
                                    class="flex flex-col sm:flex-row sm:col-span-1 col-span-2 hover:bg-gray-200 flex my-1 mx-2 p-1 sm:p-2 text-xs sm:text-sm bg-gray-100 text-gray-500 dark:text-gray-50 border overflow-hidden rounded-lg
                                                border-gray-200 flex dark:bg-gray-800 dark:border-gray-700 shadow-md ">
                                    <div class="card-title flex-auto">
                                        {{ convertOnlyDate($item->day) }}
                                    </div>
                                    <div class="card-actions justify-end flex-nowarp">

                                        <a href="{{ route('apps.season.treiningUpdate', $item->id) }}"
                                            class="py-2 px-3
                                                    hover:text-white dark:hover:bg-blue-500 transition-colors hover:hover:bg-blue-500
                                                    duration-200 whitespace-nowrap">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                                </path>
                                            </svg>
                                        </a>

                                        <button wire:click="showView({{ $item->id }})"
                                            class="py-2 px-3
                                            transition-colors
                                            dark:hover:bg-teal-500 hover:hover:bg-teal-500
                                            duration-200 hover:text-white -ml-1">
                                            <svg stroke="currentColor" class="w-5 h-5 sm:w-6 sm:h-6" viewBox="0 0 24 24"
                                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M6.30147 15.5771C4.77832 14.2684 3.6904 12.7726 3.18002 12C3.6904 11.2274 4.77832 9.73158 6.30147 8.42294C7.87402 7.07185 9.81574 6 12 6C14.1843 6 16.1261 7.07185 17.6986 8.42294C19.2218 9.73158 20.3097 11.2274 20.8201 12C20.3097 12.7726 19.2218 14.2684 17.6986 15.5771C16.1261 16.9282 14.1843 18 12 18C9.81574 18 7.87402 16.9282 6.30147 15.5771ZM12 4C9.14754 4 6.75717 5.39462 4.99812 6.90595C3.23268 8.42276 2.00757 10.1376 1.46387 10.9698C1.05306 11.5985 1.05306 12.4015 1.46387 13.0302C2.00757 13.8624 3.23268 15.5772 4.99812 17.0941C6.75717 18.6054 9.14754 20 12 20C14.8525 20 17.2429 18.6054 19.002 17.0941C20.7674 15.5772 21.9925 13.8624 22.5362 13.0302C22.947 12.4015 22.947 11.5985 22.5362 10.9698C21.9925 10.1376 20.7674 8.42276 19.002 6.90595C17.2429 5.39462 14.8525 4 12 4ZM10 12C10 10.8954 10.8955 10 12 10C13.1046 10 14 10.8954 14 12C14 13.1046 13.1046 14 12 14C10.8955 14 10 13.1046 10 12ZM12 8C9.7909 8 8.00004 9.79086 8.00004 12C8.00004 14.2091 9.7909 16 12 16C14.2092 16 16 14.2091 16 12C16 9.79086 14.2092 8 12 8Z" />
                                            </svg>
                                        </button>
                                        <button wire:click="showModal({{ $item->id }})"
                                            class="py-2 px-3
                                                        transition-colors dark:hover:bg-red-500 hover:hover:bg-red-500
                                                        duration-200 hover:text-white -ml-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>

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
        <x-slot name="title">Resultados</x-slot>
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
</div>
