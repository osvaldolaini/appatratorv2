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


                    </div>
                </div>
            </div>
        </div>
    </x-breadcrumb>
    <section class="px-4 dark:bg-gray-800 dark:text-gray-50 container flex flex-col mx-auto space-y-12">
        <form wire:submit="update">
            <fieldset class="grid grid-cols-12 gap-2 pb-6 rounded-md dark:bg-gray-900 items-start">
                <label for="text" class="block text-sm font-medium text-gray-900 dark:text-white">Questão</label>

                <div class="col-span-full" wire:ignore>
                    <textarea wire:model.defer="text" id="editor">{{ old('text', $text ?? '') }}</textarea>
                </div>
                @error('text') <span class="error">{{ $message }}</span> @enderror
        </form>
        <div class="flex col-span-full items-center space-x-4 mt-10 justify-end">
            <button class="btn btn-success">Atualizar</button>
        </div>
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
                    @this.set('text',editor.getData())
                });
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
