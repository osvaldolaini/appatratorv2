<div>
    <div class="p-6 py-8 dark:bg-violet-400 dark:text-gray-900">
        <div class="container mx-auto">
            <div class="flex flex-col lg:flex-row items-center justify-between">
                <h2 class="text-left text-3xl tracki font-bold">
                    {{ mb_strtoupper($breadcrumb) }}
                    <p class="text-2xl tracki font-semibold">
                        {{ $subTitle }}
                    </p>
                </h2>
                <button wire:click="back()"
                    class="flex px-5 items-center lg:mt-0 py-3 rounded-md
                    border dark:bg-gray-50 dark:text-gray-900 dark:border-gray-400">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M9.00002 15.3802H13.92C15.62 15.3802 17 14.0002 17 12.3002C17 10.6002 15.62 9.22021 13.92 9.22021H7.15002"
                            stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M8.57 10.7701L7 9.19012L8.57 7.62012" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span>Voltar </span>
                </button>

            </div>
        </div>
    </div>
    <section class="px-4 dark:bg-gray-800 dark:text-gray-50 container flex flex-col mx-auto space-y-12">
        <form wire:submit="create">
            <fieldset class="grid grid-cols-12 gap-2 pb-6 rounded-md dark:bg-gray-900 items-start">
                <div class="col-span-full ">
                    <label for="title" class="block text-sm font-medium text-gray-900 dark:text-white">
                        *Título</label>
                    <input type="text" wire:model="title" placeholder="Título" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    @error('title')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-span-full grid grid-cols-2 gap-2">
                    <label for="title"
                        class=" col-span-full block text-sm font-medium text-gray-900 dark:text-white">
                        Tipo de módulo</label>
                    <div class="col-span-full sm:col-span-1">
                        <label for="type"
                            class="inline-flex items-center justify-between w-full p-5
                         bg-white border  rounded-lg cursor-pointer
                        dark:hover:text-gray-300 dark:border-gray-700 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700
                        {{ $type == 1 ? 'dark:text-blue-500 border-blue-600 text-blue-600' : 'border-gray-200 text-gray-500' }}">
                            <div class="block">
                                <div class="w-full text-lg font-semibold">
                                    <input type="radio" @if ($type == '1') checked @endif
                                        value="1" wire:model.live="type" class="radio checked:bg-red-500" />
                                    Principal
                                </div>
                                <div class="w-full">Faz parte do conteúdo do curso</div>
                            </div>
                        </label>
                    </div>

                    <div class="col-span-full sm:col-span-1">
                        <label for="type"
                            class="inline-flex items-center justify-between w-full p-5
                            bg-white border rounded-lg cursor-pointer
                            dark:hover:text-gray-300 dark:border-gray-700 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700
                            {{ $type == 0 ? 'dark:text-blue-500 border-blue-600 text-blue-600' : 'border-gray-200 text-gray-500' }}">
                            <div class="block">
                                <div class="w-full text-lg font-semibold">
                                    <input type="radio" @if ($type == 0) checked @endif
                                        value="0" wire:model.live="type" class="radio checked:bg-red-500" />
                                    Adicional
                                </div>
                                <div class="w-full">Conteúdo adicional que não afeta a progressão do aluno</div>
                            </div>
                        </label>
                    </div>
                </div>
                @if ($type_content == 'video')
                        <div class="col-span-full ">
                            <label for="youtube_link" class="block text-sm font-medium text-gray-900 dark:text-white">
                                *Link do vídeo do youtube</label>
                            <input type="text" wire:model="youtube_link" placeholder="Link youtube" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            @error('youtube_link')
                                <span class="error">{{ $message }}</span>
                            @enderror

                        </div>
                    @endif
                    @if ($type_content == 'download')
                        <div class="col-span-full ">
                            <label for="downloads" class="block text-sm font-medium text-gray-900 dark:text-white">
                                *Documentos para download</label>
                            @livewire('admin.course.contents.upload-document', [$id])
                        </div>
                    @endif
                <div class="col-span-full" wire:ignore>
                    <label for="description" class="block text-sm font-medium text-gray-900 dark:text-white">
                        Descrição</label>
                    <textarea wire:model.defer="description" id="editor">{{ old('description', $description ?? '') }}</textarea>
                    @error('description')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

        </form>
        <div class="flex col-span-full items-center space-x-4 mt-10 justify-end">
            <button class="btn btn-success">Salvar</button>
        </div>
        </fieldset>
    </section>

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
                    @this.set('description', editor.getData())
                });
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
