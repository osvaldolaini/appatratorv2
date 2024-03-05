<div class="w-100">
    {{-- @livewire('admin.filters.institution.institution-table') --}}
    <div class="bg-white shadow-md dark:bg-gray-800 pt-3 sm:rounded-lg">
        <div class=" bg-white shadow-md dark:bg-gray-800 sm:rounded-lg my-6 px-4">
            <div class="-mx-4  overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden border border-gray-200 dark:border-gray-700 sm:rounded-lg">
                        <x-message-session ></x-message-session>
                        <nav class="mb-5 overflow-hidden
                        border-gray-200 flex dark:bg-gray-800 ">
                       <ol role="list"
                           class="max-w-screen-xl w-full mx-auto flex space-x-2 sm:space-x-4 sm:px-6
                           lg:px-8 ">
                           <li class="flex flex-row w-full">
                            <div
                            class="flex flex-row float-right p-2
                            bg-primary rounded-box text-primary-content ">
                               @if ($access == true)

                                        <h2 class="card-title mx-2">Novo</h2>
                                        <button wire:click="showModalCreate()" class="p-2
                                            bg-primary rounded-box text-primary-content">
                                                <svg class="h-10 w-10 " fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                                </svg>
                                        </button>
                                @else
                                    <button
                                        class="flex flex-row float-right p-2 bg-primary rounded-box text-primary-content ">
                                        <h2 class="card-title mx-2">Sem pacote</h2>
                                    </button>
                                @endif

                               </div>
                           </li>
                       </ol>
                   </nav>
                        <div class="grid grid-cols-2 md:grid-cols-6 gap-4 px-4 py-5 " id="season" wire:model="season">
                            {{-- <div class="col-span-2 sm:col-span-1 card bg-gray-200 shadow-xl">
                                <div class="card-body flex flex-row">
                                    <h2 class="card-title">Novo</h2>
                                        <button wire:click="showModalCreate()" class="p-2 bg-primary rounded-box text-primary-content">
                                            <svg class="h-14  w-14  " fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                            </svg>
                                        </button>
                                </div>
                            </div> --}}
                            @foreach ($season as $item)
                            <div class="col-span-2 card {{ ($item->limit_date < date('Y-m-d')? 'bg-red-300': 'bg-gray-100') }} shadow-xl"  >
                                <div class="card-body">
                                    <h2 class="card-title">{{ $item->title }} ({{ $item->year }})</h2>
                                    <p class="card-title">Data do teste: {{ convertOnlyDate($item->limit_date) }}</p>
                                    {!! ($item->limit_date < date('Y-m-d') ? '<p class="card-title">Vencido</p>': '') !!}
                                    <div class="card-actions justify-end">
                                        <x-table-buttons-modals-treinament id="{{ $item->id }}" limit="{{ $item->limit_date }}"></x-table-buttons-modals-treinament>
                                    </div>
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
            <x-slot name="title">Detalhes</x-slot>
            <x-slot name="content">
                <dl class="max-w text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                    @if($detail)
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

                    @if($exercises)
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
        <x-dialog-modal wire:model="showModalCreate">
            <x-slot name="title">Criar novo</x-slot>
            <x-slot name="content">
                <form action="#" wire:submit.prevent="store()" wire.loading.attr='disable'>
                    <div class="grid gap-4 mb-1 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                        <div class="sm:col-span-2">
                            <label for="title" class="block text-sm font-medium text-gray-900 dark:text-white">Concurso</label>
                            <input type="text" wire:model="title" name="title" id="title"  placeholder="Concurso" required="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            @error('title') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-span-2 sm:w-full">
                            <label for="year" class="block text-sm font-medium text-gray-900 dark:text-white">Ano</label>
                            <input type="text" wire:model="year" name="year" id="year"  placeholder="Ano" required="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            @error('year') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full sm:col-span-2" x-data
                        x-init="Inputmask({
                            'mask':'99/99/9999'
                        }).mask($refs.input_date)">
                            <label for="limit_date" class="block text-sm font-medium text-gray-900 dark:text-white">
                                Data do teste
                            </label>
                            <input type="text" x-ref="input_date" wire:model="limit_date" name="limit_date" id="limit_date"
                            placeholder="Data do teste" required="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            @error('limit_date') <span class="error">{{ $message }}</span> @enderror
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
                <x-secondary-button wire:click="$toggle('showModalCreate')" class="mx-2">
                    Fechar
                </x-secondary-button>
            </x-slot>
        </x-dialog-modal>
        {{-- MODAL UPDATE --}}
        <x-dialog-modal wire:model="showModalEdit">
            <x-slot name="title">Editar</x-slot>
            <x-slot name="content">
                <form wire:submit.prevent="update">
                    <div class="grid gap-4 mb-1 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                        <div class="sm:col-span-2">
                            <label for="title" class="block text-sm font-medium text-gray-900 dark:text-white">Concurso</label>
                            <input type="text" wire:model="title" name="title" id="title"  placeholder="Concurso" required="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            @error('title') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-span-2 sm:w-full">
                            <label for="year" class="block text-sm font-medium text-gray-900 dark:text-white">Ano</label>
                            <input type="text" wire:model="year" name="year" id="year"  placeholder="Ano" required="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            @error('year') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full sm:col-span-2" x-data
                        x-init="Inputmask({
                            'mask':'99/99/9999'
                        }).mask($refs.input_date)">
                            <label for="limit_date" class="block text-sm font-medium text-gray-900 dark:text-white">Data do teste</label>
                            <input type="text" x-ref="input_date" wire:model="limit_date" name="limit_date" id="limit_date"  placeholder="Data do teste" required="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            @error('limit_date') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="flex items-end space-x-4">
                        <button type="submit" class="text-white
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
                <x-primary-button wire:click="$toggle('showModalEdit')" class="mx-2">
                    Fechar
                </x-secondary-button>
            </x-slot>
        </x-dialog-modal>
</div>
