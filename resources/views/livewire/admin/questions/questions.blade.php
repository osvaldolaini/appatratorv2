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
            <x-table-search></x-table-search>

            <div class=" bg-white dark:bg-gray-800 sm:rounded-lg my-6 px-4">
                <div class="-mx-4  overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden border border-gray-200 dark:border-gray-700 sm:rounded-lg">
                            <table style="width:100%" class='min-w-full divide-y divide-gray-200 dark:divide-gray-700'>
                                <thead class="bg-gray-50 dark:bg-gray-800">
                                    <tr scope="col"
                                        class="py-3.5 px-4 text-sm font-normal text-left text-gray-500
                                        dark:text-gray-400">

                                        <th scope="col"
                                            class="py-3.5 px-4 text-sm font-normal
                                                    text-left text-gray-500
                                                    dark:text-gray-400">
                                            Nº
                                        </th>
                                        <th scope="col"
                                            class="py-3.5 px-4 text-sm font-normal
                                                    text-center text-gray-500
                                                    dark:text-gray-400">
                                            Dados
                                        </th>
                                        <th scope="col"
                                            class="py-3.5 px-4 text-sm font-normal
                                                    text-center text-gray-500
                                                    dark:text-gray-400">
                                            Ações
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                    @if ($dataTable->isEmpty())
                                        <tr>
                                            <td colspan="5"
                                                class="py-1.5 px-4 text-sm font-normal  text-center text-gray-500 dark:text-gray-400">
                                                Nenhum resultado encontrado.
                                            </td>
                                        </tr>
                                    @else
                                        @foreach ($dataTable as $data)
                                            <tr>
                                                <td
                                                    class="py-1.5 px-4 text-sm font-normal  text-left text-gray-500 dark:text-gray-400">
                                                    {{ str_pad($data->id, 5, '0', STR_PAD_LEFT) }}
                                                    @if ($data->active == 2)
                                                        <div class="badge badge-error gap-2 mx-1">
                                                            Excluido
                                                        </div>
                                                    @endif
                                                </td>

                                                <td
                                                    class="py-1.5 px-4 text-sm font-normal text-center itens-center text-gray-500 dark:text-gray-400">
{{--
                                                    @if($data->dificult_init)
                                                        <div class="badge badge-outline my-1">
                                                            {{ $data->dificult_init }}</div>
                                                    @endif --}}
                                                    @if($data->institution_id)
                                                        <div class="badge badge-outline my-1">
                                                            {{ $data->intitution->title }}
                                                        </div>
                                                    @endif
                                                    @if($data->examining_board_id)
                                                        <div class="badge badge-outline my-1">
                                                            {{ $data->examining_boards->title }}
                                                        </div>
                                                    @endif
                                                    @if($data->occupation_area_indice_id)
                                                        <div class="badge badge-outline my-1">
                                                            {{ $data->occupation_areas->title }}
                                                        </div>
                                                    @endif
                                                    @if($data->education_area_indice_id)
                                                        <div class="badge badge-outline my-1">
                                                            {{ $data->education_areas->title }}
                                                        </div>
                                                    @endif
                                                    @if($data->office_id)
                                                        <div class="badge badge-outline my-1">
                                                            {{ $data->offices->title }}
                                                        </div>
                                                    @endif
                                                    @if($data->level_id)
                                                        <div class="badge badge-outline my-1">
                                                            {{ $data->levels->title }}
                                                        </div>
                                                    @endif
                                                    @if($data->modality_id)
                                                        <div class="badge badge-outline my-1">
                                                            {{ $data->modalities->title }}
                                                        </div>
                                                    @endif
                                                    @if($data->discipline_id)
                                                        <div class="badge badge-outline my-1">
                                                            {{ $data->disciplines->title }}
                                                        </div>
                                                    @endif
                                                    @if($data->matter_id)
                                                        <div class="badge badge-outline my-1">
                                                            {{ $data->matters->title }}
                                                        </div>
                                                    @endif
                                                    @if($data->sub_matter_id)
                                                        <div class="badge badge-outline my-1">
                                                            {{ $data->sub_matters->title }}
                                                        </div>
                                                    @endif
                                                    @if($data->year)
                                                        <div class="badge badge-outline my-1">
                                                            {{ $data->year }}
                                                        </div>
                                                    @endif
                                                </td>
                                                <td
                                                    class="w-1/6 py-1.5 px-4 text-sm font-normal text-center text-gray-500 dark:text-gray-400">
                                                    <x-table-buttons-questions id="{{ $data->id }}"
                                                        :active="$data->active">
                                                    </x-table-buttons-questions>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="items-center justify-between  py-4">
                    {{ $dataTable->links() }}
                </div>
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

    {{-- MODAL READ --}}
    <x-dialog-modal wire:model="showModalView">
        <x-slot name="title">Detalhes</x-slot>
        <x-slot name="content">
            <dl class="max-w text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                @if ($detail)
                    @foreach ($detail as $item => $value)
                        @if ($value)
                            @if ($item == 'Foto')
                                <figure class="w-48">
                                    <img class="photo" src="{{ $value }}" alt="Movie" />
                                </figure>
                            @else
                                <div class="flex flex-col pb-1">
                                    <dt class="text-gray-500 md:text-lg dark:text-gray-400">{{ $item }}:</dt>
                                    <dd class="text-lg font-semibold">
                                        {{ $value }}
                                    </dd>
                                </div>
                            @endif
                        @endif
                    @endforeach
                @endif
                @if ($logs)
                    {!! $logs !!}
                @endif
            </dl>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('showModalView')" class="mx-2">
                Fechar
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
</div>
