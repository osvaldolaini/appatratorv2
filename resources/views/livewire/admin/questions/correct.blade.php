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
                        <div class="tooltip tooltip-top p-0" data-tip="Alternativas">
                            <a href="{{ route('alternative-question',$id) }}"
                                class="py-2 px-3 flex
                                    hover:text-white dark:hover:bg-gray-300 transition-colors hover:hover:bg-gray-300
                                    duration-200 whitespace-nowrap">
                                <svg class="h-6 w-6" viewBox="0 -1.5 20.412 20.412" xmlns="http://www.w3.org/2000/svg">
                                    <g id="check-lists" transform="translate(-1.588 -2.588)">
                                        <path id="primary" d="M7,4,4.33,7,3,5.5" fill="none" stroke="currentColor"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                        <path id="primary-2" data-name="primary" d="M3,11.5,4.33,13,7,10" fill="none"
                                            stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                        <path id="primary-3" data-name="primary" d="M3,17.5,4.33,19,7,16" fill="none"
                                            stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                        <path id="primary-4" data-name="primary" d="M11,6H21M11,12H21M11,18H21" fill="none"
                                            stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    </g>
                                </svg>
                            </a>
                        </div>
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
                <form wire:submit="update" class="col-span-full bg-white shadow-md dark:bg-gray-800 px-5 py-1 sm:rounded-lg mb-3">
                    <label for="right_answer" class="block text-sm font-medium text-gray-900 dark:text-white">Explicação</label>

                        <div class="col-span-full" wire:ignore>
                            <textarea wire:model.defer="right_answer" id="editor">{{ old('right_answer', $right_answer ?? '') }}</textarea>
                        </div>
                        @error('right_answer') <span class="error">{{ $message }}</span> @enderror

                <div class="flex col-span-full items-center space-x-4 mt-10 justify-end">
                    <button class="btn btn-success">Atualizar</button>
                </div>
            </form>
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
                            <a href="{{ url('questões/' . $id) }}"
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
</div>
@section('scripts')

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
    <script>
        function MypluginUpload(editor) {
            editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
                return {
                    upload() {
                        return loader.file.then(file => new Promise((resolve, reject) => {
                            let form_data = new FormData();
                            form_data.append('file',file);
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
                    @this.set('right_answer',editor.getData())
                });
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
