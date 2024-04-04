<div>
    <x-breadcrumb>
        <div class="grid grid-cols-8 gap-4 text-gray-600 ">
            <div class="col-span-6 justify-items-start">
                <h3 class="text-2xl font-bold tracki  dark:text-gray-50">
                    {{ $breadcrumb_title }}
                </h3>
            </div>
            <div class="col-span-2 justify-items-end">

            </div>
        </div>
    </x-breadcrumb>
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
                    <label for="title" class=" col-span-full block text-sm font-medium text-gray-900 dark:text-white">
                        Tipo de módulo</label>
                    <div class="col-span-full sm:col-span-1">

                        <label for="type"
                        class="inline-flex items-center justify-between w-full p-5
                         bg-white border  rounded-lg cursor-pointer
                        dark:hover:text-gray-300 dark:border-gray-700 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700
                        {{ ($type == 1 ? 'dark:text-blue-500 border-blue-600 text-blue-600' : 'border-gray-200 text-gray-500') }}">
                            <div class="block">
                                <div class="w-full text-lg font-semibold">
                                    <input type="radio" @if ($type == '1')
                                    checked
                                @endif value="1" wire:model.live="type" class="radio checked:bg-red-500"  />
                                    Principal </div>
                                <div class="w-full"></div>
                            </div>
                        </label>
                    </div>
                    <div class="col-span-full sm:col-span-1">
                        <label for="type"
                            class="inline-flex items-center justify-between w-full p-5
                            bg-white border rounded-lg cursor-pointer
                            dark:hover:text-gray-300 dark:border-gray-700 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700
                            {{ ($type == 0 ? 'dark:text-blue-500 border-blue-600 text-blue-600' : 'border-gray-200 text-gray-500') }}">
                            <div class="block">
                                <div class="w-full text-lg font-semibold">
                                    <input type="radio"
                                    @if ($type == 0)
                                    checked
                                @endif value="0" wire:model.live="type" class="radio checked:bg-red-500" />
                                    Adicional </div>
                                <div class="w-full"></div>
                            </div>
                        </label>
                    </div>

                </div>
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
                    @this.set('text', editor.getData())
                });
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
