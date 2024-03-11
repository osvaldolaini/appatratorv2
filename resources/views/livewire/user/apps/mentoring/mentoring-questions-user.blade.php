<div class="w-100">
    <div class="bg-white dark:bg-gray-800 pt-3 ">
        <div class="flex flex-col items-center justify-between px-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
            <div
                class="flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
                <div class="group flex ">
                    <button wire:click="showModalCreate()"
                        class="flex items-center justify-center w-1/2 px-5
                    py-2 text-sm tracking-wide text-white transition-colors
                    duration-200 bg-blue-500 rounded-lg sm:w-auto gap-x-2
                    hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
                        <svg class="h-4 w-4 mr-2" fill="currentColor" viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                        <span>Lançar questões </span>
                    </button>
                </div>
            </div>
        </div>
        <div class=" bg-white dark:bg-gray-800  my-6 px-4">
            <div class="-mx-4  overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden border border-gray-200 dark:border-gray-700 ">
                        <table style="width:100%" class='min-w-full divide-y divide-gray-200
                        dark:divide-gray-700'>
                            {{-- Table head --}}
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 px-4 text-sm font-normal
                                        text-center
                                        text-gray-500 dark:text-gray-400">
                                        Dia
                                    </th>
                                    <th scope="col"
                                        class="py-3.5 px-4 text-sm font-normal
                                        text-center
                                        text-gray-500 dark:text-gray-400">
                                        Questões
                                    </th>
                                    <th scope="col"
                                        class="py-3.5 px-4 text-sm font-normal
                                        text-center
                                        text-gray-500 dark:text-gray-400">
                                        Acertos
                                    </th>
                                    <th
                                        class="py-3.5 px-4 text-sm font-normal
                                    text-right
                                    text-gray-500 dark:text-gray-400">
                                        Excluir
                                    </th>
                                </tr>
                            </thead>
                            {{-- Table body --}}
                            <tbody class="bg-white divide-y divide-gray-200
                            dark:divide-gray-700 dark:bg-gray-900" >

                                @foreach ($questions as $item)
                                    <tr class="hover:bg-gray-100">
                                        <td scope="col"
                                            class="py-0 pl-5 text-sm
                                                    font-normal text-gray-700 text-left">
                                                    {{ convertOnlyDate($item->day) }}
                                        </td>

                                        <td scope="col"
                                            class="px-3 py-0 text-center
                                                    text-sm font-normal text-gray-700 whitespace-nowrap">
                                            {{ $item->qtd }}

                                        </td>
                                        <td scope="col"
                                            class="px-3 py-0 text-center
                                                text-sm font-normal text-gray-700 whitespace-nowrap">
                                            {{ $item->hits }}

                                        </td>
                                        <td scope="col"
                                            class="py-0 text-sm font-normal
                                                text-gray-700 flex justify-end">
                                            <div class="flex">
                                                <button title="Apagar" wire:click="showModal({{ $item->id }})"
                                                    class="py-2 px-3 font-medium transition-colors
                                                            text-gray-300 dark:text-gray-300 dark:hover:bg-red-500 hover:hover:bg-red-500
                                                            duration-200 hover:text-white -ml-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                        stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                        </path>
                                                    </svg>
                                                </button>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="items-center justify-between  py-4">
                        {{ $questions->links() }}
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
            <x-danger-button wire:click.prevent="delete({{ $model_id }})" wire.loading.attr='disable'>
                Apagar registro
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>

    {{-- MODAL CREATE --}}
    <x-dialog-modal wire:model="showModalCreate" class="mt-0" mt="mt-0">
        <x-slot name="title">Criar novo</x-slot>
        <x-slot name="content">
            <form action="#" wire:submit.prevent="store()" wire.loading.attr='disable'>
                <div class="grid gap-4 mb-1 sm:grid-cols-3 sm:gap-6 sm:mb-5">
                    <div class="col-span-3 sm:col-span-1" x-data x-init="Inputmask({
                        'mask': '99/99/9999'
                    }).mask($refs.day)">
                        <label for="day" class="block text-sm font-medium text-gray-900 dark:text-white">Data
                        </label>
                        <input type="text" x-ref="day" wire:model="day" name="day" id="day"
                            placeholder="Data" required=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @error('day')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-span-3 sm:col-span-1">
                        <label for="qtd"
                            class="block text-sm font-medium text-gray-900 dark:text-white">Quantidade</label>
                        <input type="text" wire:model="qtd" name="qtd" id="qtd" placeholder="Quantidade"
                            required=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @error('qtd')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-span-3 sm:col-span-1">
                        <label for="hits" class="block text-sm font-medium text-gray-900 dark:text-white">Acertos
                        </label>
                        <input type="text" wire:model="hits" name="hits" id="hits" placeholder="Acertos "
                            required=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @error('hits')
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
            <x-secondary-button wire:click="$toggle('showModalCreate')" class="mx-2">
                Fechar
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
</div>
