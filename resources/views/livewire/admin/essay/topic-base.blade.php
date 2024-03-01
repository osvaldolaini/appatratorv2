<div>
    <x-breadcrumb>
        <div class="grid grid-cols-8 gap-4 text-gray-600 ">
            <div class="col-span-6 justify-items-start">
                <h3 class="text-2xl font-bold tracki  dark:text-gray-50">
                    {{ $breadcrumb}}

                </h3>
            </div>
            <div class="col-span-2 justify-items-end">
                <div class="w-full">
                    <div class="flex justify-end font-medium duration-200 ">

                        <div class="tooltip tooltip-top p-0" data-tip="Proposta">
                            <a href="{{ route('topics-proposal',$id) }} }}"
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


                    </div>
                </div>
            </div>
        </div>
    </x-breadcrumb>
    <section class="px-4 dark:bg-gray-800 dark:text-gray-50 container flex flex-col mx-auto space-y-12">
        <fieldset class="grid grid-cols-12 gap-2 pb-6 rounded-md dark:bg-gray-900 items-start">
                <form wire:submit="update" class="col-span-full bg-white shadow-md dark:bg-gray-800 px-5 py-1 sm:rounded-lg mb-3">
                    <label for="base" class="block text-sm font-medium text-gray-900 dark:text-white">
                        Texto
                    </label>
                        <div class="col-span-full" wire:ignore>
                            <textarea wire:model.defer="base" id="editor">{{ old('base', $base ?? '') }}</textarea>
                        </div>
                        @error('base') <span class="error">{{ $message }}</span> @enderror

                <div class="flex col-span-full items-center space-x-4 mt-10 justify-end">
                    <button class="btn btn-success">Atualizar</button>
                </div>
            </form>
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
                    @this.set('base',editor.getData())
                });
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
