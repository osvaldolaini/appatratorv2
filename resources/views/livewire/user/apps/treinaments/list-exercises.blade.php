<div class="w-100 min-h-screen">
    <h1 class="text-5xl font-extrabold dark:text-white text-center">
        <small class="ml-2 font-semibold text-gray-500 dark:text-gray-400">
            Lista de exercícios</small>
    </h1>
    <div class="bg-white  dark:bg-gray-800 pt-3 sm:rounded-lg">
        <nav class="mb-5 overflow-hidden flex dark:bg-gray-800 ">
            <ol role="list"
                class="max-w-screen-xl w-full mx-auto flex space-x-2 sm:space-x-4 sm:px-6
                            lg:px-8 ">
                <li class="flex flex-row w-full">

                    <button wire:click="showModalCreate()"
                        class="flex flex-row float-right p-2 bg-primary
                                    rounded-box text-primary-content ">
                        <h2 class="card-title mx-2">Inserir exercício</h2>
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
                @foreach ($userExercises as $item)
                    <div
                        class="flex-col sm:flex-row sm:col-span-1 col-span-2 hover:bg-gray-200 my-1 mx-2 p-1 sm:p-2 text-xs sm:text-sm bg-gray-100 text-gray-500 dark:text-gray-50 border overflow-hidden rounded-lg
                                                 flex dark:bg-gray-800 dark:border-gray-700  ">
                        <div class="card-title flex-auto">
                            {{ $item->title }}
                            (@switch($item->unity)
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
                            @endswitch)
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
<x-dialog-modal wire:model="modalCreate">
    <x-slot name="title">Inserir novo</x-slot>
    <x-slot name="content">
        <form wire:submit="store">
            <div class="grid gap-4 mb-1 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                <div class="col-span-2 ">
                    <label for="title" class="block text-sm font-medium text-gray-900 dark:text-white">
                        *Título</label>
                    <input type="text" wire:model="title" placeholder="Título" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    @error('title')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-span-2 ">
                    <label for="unity" class="block text-sm font-medium text-gray-900 dark:text-white">
                        *Unidade</label>
                        <select wire:model="unity" required
                       id="unity" placeholder="Unidade" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                           <option value="">Selecione uma opção</option>
                                <option value="cm">Centimetro</option>
                                <option value="m">Metros</option>
                                <option value="km">Kilometro</option>
                                <option value="repeticao">Repetições</option>
                                <option value="min">Minutos</option>
                                <option value="h">Horas</option>
                       </select>
                    @error('unity')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
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
        <x-secondary-button wire:click="$toggle('modalCreate')" class="mx-2">
            Fechar
        </x-secondary-button>
    </x-slot>
</x-dialog-modal>
{{-- MODAL UPDATE --}}
<x-dialog-modal wire:model="modalEdit">
    <x-slot name="title">Editar</x-slot>
    <x-slot name="content">
        <form wire:submit="update">
            <div class="grid gap-4 mb-1 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                <div class="col-span-2 ">
                    <label for="title" class="block text-sm font-medium text-gray-900 dark:text-white">
                        *Título</label>
                    <input type="text" wire:model="title" placeholder="Título" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    @error('title')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-span-2 ">
                    <label for="unity" class="block text-sm font-medium text-gray-900 dark:text-white">
                        *Unidade</label>
                        <select wire:model="unity" required
                       id="unity" placeholder="Unidade" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                           <option value="">Selecione uma opção</option>
                                <option value="cm">Centimetro</option>
                                <option value="m">Metros</option>
                                <option value="km">Kilometro</option>
                                <option value="repeticao">Repetições</option>
                                <option value="min">Minutos</option>
                                <option value="h">Horas</option>
                       </select>
                    @error('unity')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </form>
    </x-slot>
    <x-slot name="footer">
        <button type="submit" wire:click="update"
            class="text-white
                    bg-blue-700 hover:bg-blue-800
                    focus:ring-4 focus:outline-none focus:ring-blue-300
                    font-medium rounded-lg text-sm px-5 py-2.5
                    text-center dark:bg-blue-600 dark:hover:bg-blue-700
                    dark:focus:ring-blue-800">
            Atualizar
        </button>
        <x-secondary-button wire:click="$toggle('modalEdit')" class="mx-2">
            Fechar
        </x-secondary-button>
    </x-slot>
</x-dialog-modal>

</div>
