<div>
    <span >
        *Se não existir a atividade <button class="badge" wire:click="showModalExercise()" >clique aqui</button>  para criar
    </span>
    {{-- MODAL CREATE --}}
    <x-dialog-modal wire:model="showModalExercise">
        <x-slot name="title">Criar novo</x-slot>
        <x-slot name="content">
            <form action="#" wire:submit.prevent="store()" wire.loading.attr='disable'>
                <div class="grid gap-4 mb-1 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                    <div class="sm:col-span-2">
                        <label for="title" class="block text-sm font-medium text-gray-900 dark:text-white">Título</label>
                        <input type="text" wire:model="title" name="title" id="title"  placeholder="Título" required="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @error('title') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="unity"
                        class="block text-sm font-medium text-gray-900 dark:text-white">Unidade de medida</label>
                        <select wire:model="unity"  name="unity" id="unity" placeholder="Disciplina"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                                <option value="">Selecione uma opção</option>
                                <option value="cm">Centimetro</option>
                                <option value="m">Metros</option>
                                <option value="km">Kilometro</option>
                                <option value="repeticao">Repetições</option>
                                <option value="min">Minutos</option>
                                <option value="h">Horas</option>
                        </select>
                        @error('unity') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="flex items-end space-x-4">
                    <button type="submit" class="text-white
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
            <x-secondary-button wire:click="$toggle('showModalExercise')" class="mx-2">
                Fechar
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
</div>
