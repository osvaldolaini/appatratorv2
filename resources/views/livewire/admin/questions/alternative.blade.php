<div>
    <x-breadcrumb>
        <div class="grid grid-cols-8 gap-4 text-gray-600 ">
            <div class="col-span-6 justify-items-start">
                <h3 class="text-2xl font-bold tracki  dark:text-gray-50">
                    {{ $breadcrumb_title }}

                </h3>
            </div>
            <div class="col-span-2 justify-items-end">
                <div class="w-full">
                    <div class="flex justify-between font-medium duration-200 ">
                        <div class="tooltip tooltip-top p-0" data-tip="Filtros">
                            <a href="{{ route('config-question',$id) }}"
                                class="py-2 px-3 flex
                                    hover:text-white dark:hover:bg-gray-300 transition-colors hover:hover:bg-gray-300
                                    duration-200 whitespace-nowrap">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 20 20"
                                    stroke="currentColor" stroke-width="2">
                                    <path
                                        d="M10 13a3 3 0 110-6 3 3 0 010 6zm7.476-1.246c-1.394-.754-1.394-2.754 0-3.508a1 1 0 00.376-1.404l-1.067-1.733a1 1 0 00-1.327-.355l-.447.243c-1.329.719-2.945-.244-2.945-1.755V3a1 1 0 00-1-1H8.934a1 1 0 00-1 1v.242c0 1.511-1.616 2.474-2.945 1.755l-.447-.243a1 1 0 00-1.327.355L2.148 6.842a1 1 0 00.376 1.404c1.394.754 1.394 2.754 0 3.508a1 1 0 00-.376 1.404l1.067 1.733a1 1 0 001.327.355l.447-.243c1.329-.719 2.945.244 2.945 1.755V17a1 1 0 001 1h2.132a1 1 0 001-1v-.242c0-1.511 1.616-2.474 2.945-1.755l.447.243a1 1 0 001.327-.355l1.067-1.733a1 1 0 00-.376-1.404z" />
                                </svg>
                            </a>
                        </div>
                        <div class="tooltip tooltip-top p-0" data-tip="Resposta correta">
                            <a href="{{ route('correct-question',$id) }}"
                                class="py-2 px-3 flex
                                    hover:text-white dark:hover:bg-gray-300 transition-colors hover:hover:bg-gray-300
                                    duration-200 whitespace-nowrap">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " viewBox="0 0 48 48" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0)">
                                        <path
                                            d="M42 20V39C42 40.6569 40.6569 42 39 42H9C7.34315 42 6 40.6569 6 39V9C6 7.34315 7.34315 6 9 6H30"
                                            stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M16 20L26 28L41 7" stroke="currentColor" stroke-width="4" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0">
                                            <rect width="48" height="48" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        </div>

                        <div class="tooltip tooltip-top p-0" data-tip="Editar">
                            <a href="{{ route('edit-question',$id) }}"
                                class="py-2 px-3 flex
                                        hover:text-white dark:hover:bg-blue-500 transition-colors hover:hover:bg-blue-500
                                        duration-200 whitespace-nowrap">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-breadcrumb>
    <section class="px-4 dark:bg-gray-800 dark:text-gray-50 container flex flex-col mx-auto space-y-12">
        <fieldset class="grid grid-cols-12 gap-2 pb-6 rounded-md dark:bg-gray-900 items-start">
            @if (!empty($question->text))
                <div class="col-span-full bg-white shadow-md dark:bg-gray-800 p-5 sm:rounded-lg mb-3">
                    <nav class="flex px-5 py-1 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700"
                        aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 md:space-x-3">

                            @if ($question->institution_id)
                                <li>
                                    <div class="flex items-center">
                                        <span
                                            class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                                            {{ $question->intitution->title }}
                                        </span>
                                    </div>
                                </li>
                            @endif
                            @if ($question->occupation_area_indice_id)
                                <li>
                                    <div class="flex items-center">
                                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span
                                            class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                                            {{ $question->occupation_areas->title }}
                                        </span>
                                    </div>
                                </li>
                            @endif
                            @if ($question->examining_board_id)
                                <li>
                                    <div class="flex items-center">
                                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span
                                            class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                                            {{ $question->examining_boards->title }}
                                        </span>
                                    </div>
                                </li>
                            @endif
                            @if ($question->office_id)
                                <li>
                                    <div class="flex items-center">
                                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span
                                            class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                                            {{ $question->offices->title }}
                                        </span>
                                    </div>
                                </li>
                            @endif
                            @if ($question->discipline_id)
                                <li>
                                    <div class="flex items-center">
                                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span
                                            class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                                            {{ $question->disciplines->title }}
                                        </span>
                                    </div>
                                </li>
                            @endif
                        </ol>
                    </nav>
                    <nav class="flex px-5 py-1 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700"
                        aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 md:space-x-3">
                            @if ($question->education_area_indice_id)
                                <li class="inline-flex items-center">
                                    <span
                                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                        {{ $question->education_areas->title }}
                                    </span>
                                </li>
                            @endif
                            @if ($question->level_id)
                                <li>
                                    <div class="flex items-center">
                                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span
                                            class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                                            {{ $question->levels->title }}
                                        </span>
                                    </div>
                                </li>
                            @endif
                            @if ($question->matter_id)
                                <li>
                                    <div class="flex items-center">
                                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span
                                            class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                                            {{ $question->matters->title }}
                                        </span>
                                    </div>
                                </li>
                            @endif
                            @if ($question->modality_id)
                                <li>
                                    <div class="flex items-center">
                                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span
                                            class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                                            {{ $question->modalities->title }}
                                        </span>
                                    </div>
                                </li>
                            @endif
                            @if ($question->sub_matter_id)
                                <li>
                                    <div class="flex items-center">
                                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span
                                            class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                                            {{ $question->sub_matters->title }}
                                        </span>
                                    </div>
                                </li>
                            @endif
                        </ol>
                    </nav>
                </div>
                <div class="col-span-full bg-white shadow-md dark:bg-gray-800 px-5 py-1 sm:rounded-lg mb-3">
                    <div>
                        {!! $question->text !!}
                    </div>
                </div>
                <div class="bg-white shadow-md dark:bg-gray-800 pt-3 sm:rounded-lg">
                    <div class="flex flex-col items-center justify-between px-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                        <div class="flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
                            @if ($question->modalities->qtd > $qtd_alternative)
                                <div class="group flex ">
                                    <button wire:click="modalCreate()" class="flex items-center justify-center w-1/2 px-5
                                    py-2 text-sm tracking-wide text-white transition-colors
                                    duration-200 bg-blue-500 rounded-lg sm:w-auto gap-x-2
                                    hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
                                        <svg class="h-4 w-4 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                        </svg>
                                        <span> Nova alternativa</span>
                                    </button>
                                </div>
                            @else
                            <div class="group flex ">
                                <button class="flex items-center justify-center w-1/2 px-5
                                py-2 text-sm tracking-wide text-white transition-colors
                                duration-200 bg-gray-500 rounded-lg sm:w-auto gap-x-2
                                hover:bg-gray-600 dark:hover:bg-gray-500 dark:bg-gray-600">
                                    <span>A quantidade de alternativa já foi atingida para a modalidade
                                        {{ $question->modalities->title }}
                                    </span>

                                </button>
                            </div>
                            @endif
                        </div>
                    </div>

                </div>
                <div class="col-span-full bg-white dark:bg-gray-800 sm:rounded-lg my-6 px-4">
                    <div class="-mx-4  overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden border border-gray-200 dark:border-gray-700 sm:rounded-lg">
                                <table style="width:100%"
                                    class='min-w-full divide-y divide-gray-200 dark:divide-gray-700'>
                                    <thead class="bg-gray-50 dark:bg-gray-800">
                                        <tr scope="col"
                                            class="py-3.5 px-4 text-sm font-normal text-left text-gray-500
                                                dark:text-gray-400">

                                            <th scope="col"
                                                class="py-3.5 px-4 text-sm font-normal
                                                            text-left text-gray-500
                                                            dark:text-gray-400">
                                                Id
                                            </th>

                                            <th scope="col"
                                                class="py-3.5 px-4 text-sm font-normal
                                                            text-center text-gray-500
                                                            dark:text-gray-400">
                                                Correta
                                            </th>
                                            <th scope="col"
                                                class="py-3.5 px-4 text-sm font-normal
                                                            text-center text-gray-500
                                                            dark:text-gray-400">
                                                Status
                                            </th>
                                            <th scope="col"
                                                class="py-3.5 px-4 text-sm font-normal
                                                            text-center text-gray-500
                                                            dark:text-gray-400">
                                                Ações
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody
                                        class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
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
                                                        {{ $data->code }}
                                                        @if ($data->active == 2)
                                                            <div class="badge badge-error gap-2 mx-1">
                                                                Excluido
                                                            </div>
                                                        @endif
                                                    </td>
                                                    <td
                                                        class="py-1.5 px-4 text-sm font-normal text-center itens-center text-gray-500 dark:text-gray-400">
                                                        <x-alternative-table-toggle :correct="$data->correct" id="{{ $data->id }}">
                                                        </x-alternative-table-toggle>
                                                    </td>
                                                    <td
                                                        class="py-1.5 px-4 text-sm font-normal text-center itens-center text-gray-500 dark:text-gray-400">
                                                        <x-alternative-badge
                                                            correct="{{ $data->correct }}"></x-alternative-badge>
                                                    </td>
                                                    <td
                                                        class="w-1/6 py-1.5 px-4 text-sm font-normal text-center text-gray-500 dark:text-gray-400">
                                                        @if ($data->active == 0)
                                                            <x-table-buttons id="{{ $data->id }}"
                                                                :update="true" :delete="true" :view="true"
                                                                >
                                                            </x-table-buttons>
                                                        @else
                                                            <x-table-buttons id="{{ $data->id }}"
                                                                :update="true" :delete="true" :view="true"
                                                                >
                                                            </x-table-buttons>
                                                        @endif

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
            @else
                <div class="col-span-full bg-white shadow-md dark:bg-gray-800 p-5 sm:rounded-lg mb-3">

                    <div id="alert-additional-content-2"
                        class="p-4 mb-4 text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-400 dark:border-yellow-800"
                        role="alert">
                        <div class="flex items-center">
                            <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Info</span>
                            <h3 class="text-lg font-medium">Você não criou o texto da pergunta!</h3>
                        </div>
                        <div class="mt-2 mb-4 text-sm">
                            Por favor volte na lista de questões ou clique no botão abaixo.
                        </div>
                        <div class="flex">
                            <a href="{{ url('questões/' . $question_id) }}"
                                class="text-white bg-yellow-800 hover:bg-yellow-900 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                                <svg aria-hidden="true" class="-ml-0.5 mr-2 h-4 w-4" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                    <path fill-rule="evenodd"
                                        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Clique aqui
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </fieldset>
    </section>
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
                            @if ($item == 'Alternativa')
                                {!! $value !!}
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
    {{-- MODAL CREATE --}}
    <x-dialog-modal wire:model="showModalCreate">
        <x-slot name="title">Inserir novo</x-slot>
        <x-slot name="content">
            <form wire:submit="store">
                <div class="grid gap-4 mb-1 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                    <div class="col-span-full" wire:ignore>
                        <label for="text" class="block text-sm font-medium text-gray-900 dark:text-white">
                            Alternativa</label>
                        <textarea wire:model.defer="text" id="editor">{{ old('text', $text ?? '') }}</textarea>
                        @error('text')
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
            <x-secondary-button wire:click="$toggle('showModalCreate')" class="mx-2">
                Fechar
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
    {{-- MODAL UPDATE --}}
    <x-dialog-modal wire:model="showModalEdit">
        <x-slot name="title">Editar</x-slot>
        <x-slot name="content">
            <form wire:submit="update">
                <div class="grid gap-4 mb-1 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                    <div class="col-span-full" wire:ignore>
                        <label for="text" class="block text-sm font-medium text-gray-900 dark:text-white">
                            Alternativa</label>
                        <textarea wire:model.defer="text" id="editor">{{ old('text', $text ?? '') }}</textarea>
                        @error('text')
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
            <x-secondary-button wire:click="$toggle('showModalEdit')" class="mx-2">
                Fechar
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
</div>
@section('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
    <script>
        function MypluginUpload(editor) {
            editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                return {
                    upload() {
                        return loader.file.then(file => new Promise((resolve, reject) => {
                            let form_data = new FormData();
                            form_data.append('file', file);
                            axios.post(
                                '{{ route('upload-editor') }}', form_data, {
                                    headers: {
                                        'Content-Type': 'multipart/form-data'
                                    }
                                }).then(response => {
                                resolve({
                                    default: response.data
                                })
                            })
                        }))
                    }
                }
            };
        }
        ClassicEditor
            .create(document.querySelector('#editor'), {
                extraPlugins: [MypluginUpload],
                // toolbar: [
                //     itens:['...']
                // ],
                heading: {
                    options: [{
                            model: 'paragraph',
                            title: 'Paragraph',
                            class: 'ck-heading_paragraph'
                        },
                        {
                            model: 'heading1',
                            view: 'h1',
                            title: 'Heading 1',
                            class: 'ck-heading_heading1'
                        },
                        {
                            model: 'heading2',
                            view: 'h2',
                            title: 'Heading 2',
                            class: 'ck-heading_heading2'
                        }
                    ]
                }
            })
            .then(editor => {
                editor.model.document.on('change:data', () => {
                    @this.set('text', editor.getData())
                });
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
