<div>
    @livewire('user.apps.mentoring.mentoring-contest-user-bar', ['title' => 'Meu ciclo'])
    <div class=" bg-white dark:bg-gray-800 my-6 px-4">
        <div class="-mx-4  overflow-x-auto sm:-mx-6 lg:-mx-8">
            @if ($planningCycleUser->count() > 0)
                <div class="grid grid-cols-2 lg:grid-cols-6 gap-4 mx-5 px-2 pb-48" wire:model="{{ $planningCycleUser }}">
                    @foreach ($planningCycleUser->sortBy('order') as $item)
                        <div class="col-span-1 ">
                            <div class="w-full border-inherit bg-neutral-100
                            text-base-100 dark:text-gray-300 dark:bg-base-100 text-sm rounded-md pb-0.5">
                                <div class="card-body p-1.5 gap-0 w-full">
                                    <h2 class="card-title text-gray-900 ">{{ $item->discipline->title }}</h2>
                                    <div class="flex">
                                        <p class="py-0 flex text-gray-900 ">
                                            <svg class="h-4 w-4 mr-1" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill="currentColor" fill-rule="evenodd"
                                                    d="M10 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8zm2.293-4.707a.997.997 0 01-.707-.293l-2.293-2.293A.997.997 0 019 10V6a1 1 0 112 0v3.586l2 2a.999.999 0 01-.707 1.707z" />
                                            </svg>
                                            {{ $item->hours() }}
                                        </p>
                                        <div class="tooltip tooltip-top p-0" data-tip="Inserir">
                                            <button wire:click="createCycle({{ $item->id }})"
                                                class="flex items-center justify-center w-1/2
                                            py-1 px-2 text-sm tracking-wide text-white transition-colors
                                            duration-200 bg-blue-500 rounded-lg sm:w-auto gap-x-2
                                            hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
                                                <svg class="h-4 w-4" fill="currentColor" viewbox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                @foreach ($item->itemCycle as $cycle)
                                    <div
                                        class="card card-side bg-white text-gray-900
                                    dark:text-white
                                    shadow-md p-0 text-xs rounded-md m-1 ">
                                        <div class="hidden bg-red-400 "></div>
                                        <div class="hidden bg-green-400 "></div>
                                        <div
                                            class="card-body p-0.5 pl-1 gap-0 text-xs rounded-md {{ $cycle->status() }} ml-1">
                                            <div class="card-actions flex justify-between">
                                                <div class="w-full flex justify-between">
                                                    <div class="tooltip tooltip-top p-0" data-tip="{{ ($cycle->status == 0 ? 'Concluir' : 'Concluído') }}">
                                                        @if ($cycle->status == 0)
                                                            <button  wire:click="statusModel({{ $cycle->id }},'1')"
                                                                class="py-1 px-2 rounded-r font-medium transition-colors
                                                                    text-gray-700 dark:text-gray-300 shadow-lg
                                                                    {{ $cycle->status() }} hover:shadow-lg
                                                                    duration-200 hover:text-white -ml-1">
                                                                    {{ ($cycle->status == 0 ? 'Concluir' : 'Concluído') }}
                                                            </button>
                                                        @else
                                                            <button  wire:click="statusModel({{ $cycle->id }},'0')"
                                                                class="py-1 px-2 rounded-r font-medium transition-colors
                                                                    text-gray-700 dark:text-gray-300 shadow-lg
                                                                    {{ $cycle->status() }} hover:shadow-lg
                                                                    duration-200 hover:text-white -ml-1">
                                                                    {{ ($cycle->status == 0 ? 'Concluir' : 'Concluído') }}
                                                            </button>
                                                        @endif

                                                    </div>

                                                    <div class="tooltip tooltip-top p-0" data-tip="Excluir">
                                                        <button title="Apagar"
                                                            wire:click="showModal({{ $cycle->id }})"
                                                            class="py-1 px-2 rounded-r  font-medium transition-colors
                                                                text-gray-700 dark:text-gray-300
                                                                dark:hover:bg-red-500 hover:bg-red-500 hover:shadow-lg
                                                                duration-200 hover:text-white -ml-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                                stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                                </path>
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
                    @endforeach
                </div>
            @endif
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
</div>
