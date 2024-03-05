<div>
    <div class="bg-white shadow-md dark:bg-gray-800 pt-3 sm:rounded-lg">
        <div class=" bg-white shadow-md dark:bg-gray-800 sm:rounded-lg my-6 px-4">
            <div class="-mx-4  overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full align-middle md:px-6 lg:px-8">
                    <nav class="mb-5 overflow-hidden
                    border-gray-200 flex dark:bg-gray-800 ">
                    <ol role="list"
                        class="max-w-screen-xl w-full mx-auto flex space-x-2 sm:space-x-4 sm:px-6
                        lg:px-8 ">
                        <li class="flex flex-row w-full">
                            <a href="{{ url('/app-de-treinamento/concursos/treino/'.$season_id) }}"
                                class="flex flex-row p-2 bg-success rounded-box text-white mr-5">
                                <h2 class="card-title mx-2">Voltar</h2>
                                <svg class="h-8 w-8 " fill="currentColor" viewBox="0 0 32 32"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <g id="icomoon-ignore"></g>
                                    <path d="M14.389 7.956v4.374l1.056 0.010c7.335 0.071 11.466 3.333 12.543 9.944-4.029-4.661-8.675-4.663-12.532-4.664h-1.067v4.337l-9.884-7.001 9.884-7zM15.456 5.893l-12.795 9.063 12.795 9.063v-5.332c5.121 0.002 9.869 0.26 13.884 7.42 0-4.547-0.751-14.706-13.884-14.833v-5.381z" >
                                    </path>
                                </svg>
                            </a>
                        </li>
                    </ol>
                </nav>
                    <div class="overflow-hidden border border-gray-200 dark:border-gray-700 sm:rounded-lg">
                        <x-message-session ></x-message-session>
                        <div class="grid gap-4 mb-1 sm:grid-cols-2 sm:gap-6 sm:mb-5 px-4 pb-4" >
                            <form action="#" wire:submit.prevent="update" >
                                <div class="w-full " x-data x-init="Inputmask({
                                        'mask': '99/99/9999'
                                    }).mask($refs.day)">
                                        <label for="day" class="block text-sm font-medium text-gray-900 dark:text-white">Data</label>
                                        <input type="text" x-ref="day" wire:model="day" wire:change="update"
                                            placeholder="Data" required=""
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        @error('day')
                                            <span class="error">{{ $message }}</span>
                                        @enderror
                                </div>
                            </form>
                            @isset($trainings)
                                @foreach ($trainings as $training)
                                @livewire('app.treinaments.trainings-component', [
                                    'training' => $training]
                                )
                                @endforeach
                            @endisset
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
