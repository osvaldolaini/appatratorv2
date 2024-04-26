<div class="w-100 min-h-screen">
    <h1 class="text-5xl font-extrabold dark:text-white text-center">
        <small class="ml-2 font-semibold text-gray-500 dark:text-gray-400">
            Treino para {{ $season_title }} </small>
    </h1>
    <div class="bg-white  dark:bg-gray-800 pt-3 sm:rounded-lg">
        <nav class="mb-5 overflow-hidden flex dark:bg-gray-800 ">
            <ol role="list"
                class="max-w-screen-xl w-full mx-auto flex space-x-2 sm:space-x-4 sm:px-6
                            lg:px-8 ">
                <li class="flex flex-row w-full">
                    <a href="{{ url('app-de-treinamento/concursos') }}"
                        class="flex flex-row p-2 bg-success rounded-box text-white mr-5">
                        <h2 class="card-title mx-2">Voltar</h2>
                        <svg class="h-8 w-8 " fill="currentColor" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true">
                            <g id="icomoon-ignore"></g>
                            <path
                                d="M14.389 7.956v4.374l1.056 0.010c7.335 0.071 11.466 3.333 12.543 9.944-4.029-4.661-8.675-4.663-12.532-4.664h-1.067v4.337l-9.884-7.001 9.884-7zM15.456 5.893l-12.795 9.063 12.795 9.063v-5.332c5.121 0.002 9.869 0.26 13.884 7.42 0-4.547-0.751-14.706-13.884-14.833v-5.381z">
                            </path>
                        </svg>
                    </a>
                    <button wire:click="showModalCreate()"
                        class="flex flex-row float-right p-2 bg-primary
                                    rounded-box text-primary-content ">
                        <h2 class="card-title mx-2">Inserir atividade</h2>
                        <svg class="h-8 w-8 " fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                    </button>
                </li>
            </ol>
        </nav>
        <div class="overflow-hidden sm:rounded-lg mb-5">
            <div class="grid grid-cols-2 gap-4 px-4 py-2">
                <div class="col-span-2 flex justify-center">
                    <h2>Lista de exercícios</h2>
                </div>
                @foreach ($seasonExercises as $item)
                    <div
                        class="flex-col sm:flex-row sm:col-span-1 col-span-2 hover:bg-gray-200 my-1 mx-2 p-1 sm:p-2 text-xs sm:text-sm bg-gray-100 text-gray-500 dark:text-gray-50 border overflow-hidden rounded-lg
                                                 flex dark:bg-gray-800 dark:border-gray-700  ">
                        <div class="card-title flex-auto">
                            {{ $item->exercise->title }}
                            @switch($item->exercise->unity)
                                @case('repeticao')
                                    {{ $item->repeat }} Repetições
                                @break

                                @case('cm')
                                    {{ $item->distance }} cm
                                @break

                                @case('m')
                                    {{ $item->distance }} m
                                @break

                                @case('km')
                                    {{ $item->distance }} km
                                @break

                                @case('min')
                                    {{ $item->time, 'min' }} min
                                @break

                                @case('h')
                                    {{ $item->time, 'h' }} h
                                @break

                                @default
                            @endswitch
                        </div>
                        <div class="card-actions justify-end flex-nowarp">
                            <button wire:click="showModalEdit({{ $item->id }})"
                                class="py-2 px-3
                                                    hover:text-white dark:hover:bg-blue-500 transition-colors hover:hover:bg-blue-500
                                                    duration-200 whitespace-nowrap">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                    </path>
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

    {{-- MODAL CREATE --}}
    <x-dialog-modal wire:model="modalCreate">
        <x-slot name="title">Criar novo</x-slot>
        <x-slot name="content">
            <span>
                *Se não existir a atividade <button class="badge" wire:click="showModalExercise()">clique aqui</button>
                para criar
            </span>
            <form action="#" wire:submit.prevent="store()" wire.loading.attr='disable'>
                <div class="grid gap-4 mb-1 sm:grid-cols-2 sm:gap-6 sm:mb-5">

                    <div class="sm:col-span-2">
                        <label for="exercise_id"
                            class="block text-sm font-medium text-gray-900
                            dark:text-white">Atividade

                        </label>
                        <select wire:model="exercise_id" wire:change="getUnity" required="" name="exercise_id"
                            id="exercise_id" placeholder="Atividade"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="">Selecione uma opção</option>
                            @foreach ($exercises as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                        @error('exercise_id')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    @if ($unity == 'repeticao')
                        <div class="sm:col-span-2">
                            <label for="repeat"
                                class="block text-sm font-medium text-gray-900 dark:text-white">Repetições</label>
                            <input type="text" wire:model="repeat" name="repeat" id="repeat"
                                placeholder="Repetições" required=""
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            @error('repeat')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    @elseif ($unity == 'cm' or $unity == 'm' or $unity == 'km')
                        <div class="sm:col-span-2">
                            <label for="distance"
                                class="block text-sm font-medium text-gray-900 dark:text-white">Distância
                                ({{ $unity }})</label>
                            <input type="text" wire:model="distance" name="distance" id="distance"
                                placeholder="Distância ({{ $unity }})" required=""
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            @error('distance')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    @elseif ($unity == 'min')
                        <div class="sm:col-span-2" x-data x-init="Inputmask({
                            'mask': '99:99'
                        }).mask($refs.time)">
                            <label for="time"
                                class="block text-sm font-medium text-gray-900 dark:text-white">Tempo
                                ({{ $unity }})</label>
                            <input type="text" x-ref="time" wire:model="time" name="time" id="time"
                                placeholder="Tempo ({{ $unity }})" required=""
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            @error('time')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    @endif

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
            <form action="#" wire:submit.prevent="update()" wire.loading.attr='disable'>
                <div class="grid gap-4 mb-1 sm:grid-cols-2 sm:gap-6 sm:mb-5">

                    @if ($unity == 'repeticao')
                        <div class="sm:col-span-2">
                            <label for="repeat"
                                class="block text-sm font-medium text-gray-900 dark:text-white">Repetições</label>
                            <input type="text" wire:model="repeat" name="repeat" id="repeat"
                                placeholder="Repetições" required=""
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            @error('repeat')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    @elseif ($unity == 'cm' or $unity == 'm' or $unity == 'km')
                        <div class="sm:col-span-2">
                            <label for="distance"
                                class="block text-sm font-medium text-gray-900 dark:text-white">Distância
                                ({{ $unity }})</label>
                            <input type="text" wire:model="distance" name="distance" id="distance"
                                placeholder="Distância ({{ $unity }})" required=""
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            @error('distance')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    @elseif ($unity == 'min')
                        <div class="sm:col-span-2" x-data x-init="Inputmask({
                            'mask': '99:99'
                        }).mask($refs.time)">
                            <label for="time"
                                class="block text-sm font-medium text-gray-900 dark:text-white">Tempo
                                ({{ $unity }})</label>
                            <input type="text" x-ref="time" wire:model="time" name="time" id="time"
                                placeholder="Tempo ({{ $unity }})" required=""
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            @error('time')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    @endif

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
            <x-primary-button wire:click="$toggle('modalEdit')" class="mx-2">
                Fechar
                </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
    {{-- MODAL CREATE EXERCISE USER --}}
    <x-dialog-modal wire:model="modalExercise">
        <x-slot name="title">Criar novo exercício</x-slot>
        <x-slot name="content">
            <form action="#" wire:submit.prevent="storeExercise()" wire.loading.attr='disable'>
                <div class="grid gap-4 mb-1 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                    <div class="sm:col-span-2">
                        <label for="titleExercise"
                            class="block text-sm font-medium text-gray-900 dark:text-white">Título</label>
                        <input type="text" wire:model="titleExercise" placeholder="Título" required=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @error('titleExercise')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="unityExercise"
                            class="block text-sm font-medium text-gray-900 dark:text-white">Unidade de medida</label>
                        <select wire:model="unityExercise" placeholder="Disciplina"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="">Selecione uma opção</option>
                            <option value="cm">Centimetro</option>
                            <option value="m">Metros</option>
                            <option value="km">Kilometro</option>
                            <option value="repeticao">Repetições</option>
                            <option value="min">Minutos</option>
                            <option value="h">Horas</option>
                        </select>
                        @error('unityExercise')
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
            <x-secondary-button wire:click="$toggle('modalExercise')" class="mx-2">
                Fechar
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>

</div>
