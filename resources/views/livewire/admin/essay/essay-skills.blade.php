<div class="w-100">
    <x-breadcrumb>
        <div class="grid grid-cols-8 gap-4 text-gray-600 ">
            <div class="col-span-6 justify-items-start">
                <h3 class="text-2xl font-bold tracki  dark:text-gray-50">
                    {{ mb_strtoupper($breadcrumb) }}
                </h3>
            </div>
        </div>
    </x-breadcrumb>

    <div class="bg-white dark:bg-gray-800 pt-3 sm:rounded-lg">
        <div>
            <div class="bg-white shadow-md dark:bg-gray-800 py-3 sm:rounded-lg">
                <div class="max-w-5xl mx-auto flex flex-row mb-5 ">
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white mr-2">Adicionar competências</h2>
                    <select wire:model="skill_id" wire:change="insertSkill" placeholder="Disciplina"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                    focus:ring-primary-600 focus:border-primary-600 block py-1.5 pl-5 pr-8
                    dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                    dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option value="">Selecione uma opção</option>
                        @foreach ($skills as $item)
                            @if (!in_array($item->id, $pivotSkills))
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('skill_id')
                        <span class="error">{{ $message }}</span>
                    @enderror

                </div>
                <div
                    class="m-5 overflow-hidden border
                            border-gray-200 dark:border-gray-700
                            sm:rounded-lg ">
                    <div class="grid grid-cols-2 gap-4 px-4 py-2" wire:model="pivot">
                        <div class="col-span-2 flex justify-center">
                            <h2>Lista de Competências</h2>
                        </div>
                        @foreach ($pivot as $item)
                            <div
                                class="flex flex-col sm:flex-row sm:col-span-1 col-span-2
                                 my-1 mx-2 p-1 sm:p-2 text-xs sm:text-sm
                                {{ ($modalEdit == false ? 'bg-gray-100 text-gray-500 hover:bg-gray-200' : 'bg-blue-500 text-white') }} dark:text-gray-50 border
                                overflow-hidden rounded-lg border-gray-200
                                dark:bg-gray-800 dark:border-gray-700 shadow-md ">
                                <div class="card-title flex-auto">
                                    {{ $item->skills->title }}
                                    @if (!$modalEdit)
                                        ({{ $item->points }} pontos)
                                    @endif
                                </div>
                            <div class="card-actions justify-end flex-nowarp">
                                @if ($modalEdit)
                                    <div>
                                        @livewire('admin.essay.pivot-component', [
                                            'pivotSkillsEssays' => $item,
                                        ])
                                    </div>
                                @endif
                                <button wire:click="showModalEdit({{ $item->id }})" title="Editar"
                                    class="py-2 px-3 font-medium transition-colors
                                             dark:hover:bg-blue-500 hover:hover:bg-blue-500
                                            duration-200 hover:text-white whitespace-nowrap">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                        </path>
                                    </svg>
                                </button>
                                <button wire:click="showModal({{ $item->id }})"
                                    class="py-2 px-3
                                                transition-colors dark:hover:bg-red-500
                                                hover:hover:bg-red-500
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
        {{-- MODAL UPDATE --}}
        {{-- <x-dialog-modal wire:model="modalEdit">
                <x-slot name="title">Pontos</x-slot>
                <x-slot name="content">
                        <div class="grid gap-4 mb-1 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                            @if (isset($pivot_item))
                                @livewire('admin.essay.pivot-component', [
                                    'pivotSkillsEssays' => $pivot_item,
                                ])
                            @endif
                        </div>
                </x-slot>
                <x-slot name="footer">
                    <x-primary-button wire:click="$toggle('modalEdit')" class="mx-2">
                        Fechar
                        </x-secondary-button>
                </x-slot>
            </x-dialog-modal> --}}
    </div>
</div>

</div>
