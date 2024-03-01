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
                <div class="col-span-full sm:col-span-6">
                    <label for="institution_id" class="block text-sm
                    font-medium text-gray-900 dark:text-white">
                        *Instituição
                    </label>
                    <select wire:model="institution_id"  name="institution_id" id="institution_id"
                    placeholder="Disciplina" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                        <option value="">Selecione uma opção</option>
                        @foreach ($institution as $item)
                            <option value="{{ $item->id }}" >{{ $item->title }}</option>
                        @endforeach
                    </select>
                    @error('institution_id') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="col-span-full sm:col-span-6">
                    <label for="year" class="block text-sm font-medium text-gray-900 dark:text-white">
                        *Ano do concurso</label>
                    <input type="text" wire:model="year" name="year" id="year"  placeholder="Ano do concurso"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    @error('year') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="col-span-full sm:col-span-6">
                    <label for="dificult_init"
                    class="block text-sm font-medium text-gray-900 dark:text-white">
                        Nível de dificuldade
                    </label>
                    <select wire:model="dificult_init" name="dificult_init" id="dificult_init" placeholder="Disciplina"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                        <option value="">Selecione uma opção</option>
                            <option value="10">Muito Fácil</option>
                            <option value="25">Fácil</option>
                            <option value="50">Médio</option>
                            <option value="75">Difícil</option>
                            <option value="90">Muito difícil</option>
                    </select>
                    @error('dificult_init') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="col-span-full sm:col-span-6">
                    <label for="modality_id" class="block text-sm font-medium text-gray-900 dark:text-white">
                        *Modalidade
                    </label>
                    <select wire:model="modality_id"  name="modality_id" id="modality_id" placeholder="Disciplina" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                        <option value="">Selecione uma opção</option>
                        @foreach ($modality as $item)
                            <option value="{{ $item->id }}" >{{ $item->title }}</option>
                        @endforeach
                    </select>
                    @error('modality_id') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="col-span-full" wire:ignore>
                    <label for="text" class="block text-sm font-medium text-gray-900 dark:text-white">
                        Questão</label>
                    <textarea wire:model.defer="text" id="editor">{{ old('text', $text ?? '') }}</textarea>
                    @error('text') <span class="error">{{ $message }}</span> @enderror
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
