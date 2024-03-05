<div class="w-100 pb-52 sm:mb-3">
    <div class="bg-white shadow-md dark:bg-gray-800 pt-3 sm:rounded-lg">
        <div class=" bg-white shadow-md dark:bg-gray-800 sm:rounded-lg my-6 px-4 mb-4">
            <div class=" overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full align-middle md:px-6 lg:px-8">
                    <nav
                        class="mb-5 overflow-hidden
                         border-gray-200 flex justify-between dark:bg-gray-800 ">
                        @if ($access == true)
                            <button wire:click="showModalCreate()"
                                class="flex items-center justify-center w-1/2 px-5
                                    py-2 text-sm tracking-wide text-white transition-colors
                                    duration-200 bg-blue-500 rounded-lg sm:w-auto gap-x-2
                                    hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
                                <h2 class="card-title mx-2">Inserir Redação
                                    <svg class="h-8 w-8 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path clip-rule="evenodd" fill-rule="evenodd"
                                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                    </svg>
                                </h2>
                            </button>
                        @else
                            <button class="flex flex-row float-right p-2 bg-primary rounded-box text-primary-content ">
                                <h2 class="card-title mx-2">Sem pacote</h2>
                            </button>
                        @endif
                    </nav>
                    <div
                        class="overflow-hidden border border-gray-200 dark:border-gray-700
                            sm:rounded-lg mb-5">
                        <div class="grid grid-cols-2 gap-4 px-4 py-2">
                            <div class="col-span-2 flex justify-center">
                                <h3 class="text-2xl font-bold tracki  dark:text-gray-50">
                                    {{ mb_strtoupper($breadcrumb) }}
                                </h3>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4 px-4 py-5 ">
                            @foreach ($essayUser as $item)
                                <div class="col-span-full sm:col-span-1 card shadow-xl bg-gray-100 text-gray-600">
                                    <div class="card-body">
                                        <h2 class="card-title">{{ $item->essay->title }}</h2>
                                        <h2 class="card-title text-sm">Tema: {{ $item->topics->title }}</h2>
                                        <p class="card-title text-sm">Realizada em:
                                            {{ $item->performed_at }}
                                        </p>
                                        <p class="card-title text-sm">Pontuação:
                                            {{ $item->points }}
                                        </p>
                                        <div class="card-actions justify-end ">
                                            <div class="w-full">
                                                <div class="flex justify-between font-medium duration-200 w-full">
                                                    <button>
                                                        @switch($item->status)
                                                            @case(1)
                                                                <div class="py-2 px-3 badge badge-error badge-lg"
                                                                class="">{{ $item->statuUser }}</div>
                                                                @break
                                                            @case(2)
                                                                <div class="py-2 px-3 badge badge-warning badge-lg">{{ $item->statuUser }}</div>
                                                                @break
                                                            @case(3)
                                                                <div class="py-2 px-3 badge badge-success badge-lg">{{ $item->status }}</div>
                                                                @break
                                                            @default
                                                                <div class="py-2 px-3 badge badge-error badge-lg">{{ $item->statuUser }}</div>
                                                        @endswitch
                                                    </button>

                                                        @if ($item->status < 3)
                                                        <div class="tooltip tooltip-bottom p-0 " data-tip="Tema">
                                                            <button wire:click="showViewTopic({{ $item->id }})"
                                                                class="py-2 px-3
                                                                        hover:text-white dark:hover:bg-blue-300 transition-colors hover:hover:bg-blue-300
                                                                        duration-200 whitespace-nowrap">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M8 8H16M8 12H16M12 16H16M3.5 12C3.5 5.5 5.5 3.5 12 3.5C18.5 3.5 20.5 5.5 20.5 12C20.5 18.5 18.5 20.5 12 20.5C5.5 20.5 3.5 18.5 3.5 12Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                        <div class="tooltip tooltip-bottom p-0 " data-tip="Upload">
                                                            <button wire:click="showModalUpload({{ $item->id }})"
                                                                class="py-2 px-3
                                                                        hover:text-white dark:hover:bg-blue-300 transition-colors hover:hover:bg-blue-300
                                                                        duration-200 whitespace-nowrap">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M13.5 3H12H7C5.89543 3 5 3.89543 5 5V19C5 20.1046 5.89543 21 7 21H7.5M13.5 3L19 8.625M13.5 3V7.625C13.5 8.17728 13.9477 8.625 14.5 8.625H19M19 8.625V9.75V12V19C19 20.1046 18.1046 21 17 21H16.5"  stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                        <path d="M12 21L12 13M12 13L14.5 15.5M12 13L9.5 15.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                        @elseif($item->status == 3)
                                                        <div class="tooltip tooltip-bottom p-0 " data-tip="Download">
                                                            <button class="py-2 px-3 text-gray-300
                                                            hover:text-white dark:hover:bg-blue-300 transition-colors hover:hover:bg-blue-300
                                                            duration-200 whitespace-nowrap"
                                                                    wire:click="export({{ $item->id }})">
                                                                    <svg class="w-8 h-8 text-gray-600" viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg">

                                                                        <defs>

                                                                        </defs>

                                                                        <title/>

                                                                        <g id="xxx-word">

                                                                        <path fill="currentColor" stroke="currentColor" d="M325,105H250a5,5,0,0,1-5-5V25a5,5,0,0,1,10,0V95h70a5,5,0,0,1,0,10Z"/>

                                                                        <path fill="currentColor" stroke="currentColor" d="M325,154.83a5,5,0,0,1-5-5V102.07L247.93,30H100A20,20,0,0,0,80,50v98.17a5,5,0,0,1-10,0V50a30,30,0,0,1,30-30H250a5,5,0,0,1,3.54,1.46l75,75A5,5,0,0,1,330,100v49.83A5,5,0,0,1,325,154.83Z"/>

                                                                        <path fill="currentColor" stroke="currentColor" d="M300,380H100a30,30,0,0,1-30-30V275a5,5,0,0,1,10,0v75a20,20,0,0,0,20,20H300a20,20,0,0,0,20-20V275a5,5,0,0,1,10,0v75A30,30,0,0,1,300,380Z"/>

                                                                        <path fill="currentColor" stroke="currentColor" d="M275,280H125a5,5,0,0,1,0-10H275a5,5,0,0,1,0,10Z"/>

                                                                        <path fill="currentColor" stroke="currentColor" d="M200,330H125a5,5,0,0,1,0-10h75a5,5,0,0,1,0,10Z"/>

                                                                        <path fill="currentColor" stroke="currentColor" d="M325,280H75a30,30,0,0,1-30-30V173.17a30,30,0,0,1,30-30h.2l250,1.66a30.09,30.09,0,0,1,29.81,30V250A30,30,0,0,1,325,280ZM75,153.17a20,20,0,0,0-20,20V250a20,20,0,0,0,20,20H325a20,20,0,0,0,20-20V174.83a20.06,20.06,0,0,0-19.88-20l-250-1.66Z"/>

                                                                        <path fill="currentColor" stroke="currentColor" d="M145,236h-9.61V182.68h21.84q9.34,0,13.85,4.71a16.37,16.37,0,0,1-.37,22.95,17.49,17.49,0,0,1-12.38,4.53H145Zm0-29.37h11.37q4.45,0,6.8-2.19a7.58,7.58,0,0,0,2.34-5.82,8,8,0,0,0-2.17-5.62q-2.17-2.34-7.83-2.34H145Z"/>

                                                                        <path fill="currentColor" stroke="currentColor" d="M183,236V182.68H202.7q10.9,0,17.5,7.71t6.6,19q0,11.33-6.8,18.95T200.55,236Zm9.88-7.85h8a14.36,14.36,0,0,0,10.94-4.84q4.49-4.84,4.49-14.41a21.91,21.91,0,0,0-3.93-13.22,12.22,12.22,0,0,0-10.37-5.41h-9.14Z"/>

                                                                        <path fill="currentColor" stroke="currentColor" d="M245.59,236H235.7V182.68h33.71v8.24H245.59v14.57h18.75v8H245.59Z"/>

                                                                        </g>

                                                                        </svg>
                                                            </button>
                                                        </div>
                                                        @endif
                                                        @if ($item->status < 3)
                                                            <div class="tooltip tooltip-bottom p-0 " data-tip="Editar">
                                                                <button wire:click="showModalEdit({{ $item->id }})"
                                                                    class="py-2 px-3
                                                                            hover:text-white dark:hover:bg-blue-500 transition-colors hover:hover:bg-blue-500
                                                                            duration-200 whitespace-nowrap">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="none"
                                                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                                                        </path>
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        @endif
                                                    <div class="tooltip tooltip-bottom p-0 " data-tip="Detalhes">
                                                        <button wire:click="showView({{ $item->id }})"
                                                            class="py-2 px-3
                                                            transition-colors
                                                            dark:hover:bg-teal-500 hover:hover:bg-teal-500
                                                            duration-200 hover:text-white -ml-1">
                                                            <svg stroke="currentColor" class="w-5 h-5 sm:w-6 sm:h-6" viewBox="0 0 24 24"
                                                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M6.30147 15.5771C4.77832 14.2684 3.6904 12.7726 3.18002 12C3.6904 11.2274 4.77832 9.73158 6.30147 8.42294C7.87402 7.07185 9.81574 6 12 6C14.1843 6 16.1261 7.07185 17.6986 8.42294C19.2218 9.73158 20.3097 11.2274 20.8201 12C20.3097 12.7726 19.2218 14.2684 17.6986 15.5771C16.1261 16.9282 14.1843 18 12 18C9.81574 18 7.87402 16.9282 6.30147 15.5771ZM12 4C9.14754 4 6.75717 5.39462 4.99812 6.90595C3.23268 8.42276 2.00757 10.1376 1.46387 10.9698C1.05306 11.5985 1.05306 12.4015 1.46387 13.0302C2.00757 13.8624 3.23268 15.5772 4.99812 17.0941C6.75717 18.6054 9.14754 20 12 20C14.8525 20 17.2429 18.6054 19.002 17.0941C20.7674 15.5772 21.9925 13.8624 22.5362 13.0302C22.947 12.4015 22.947 11.5985 22.5362 10.9698C21.9925 10.1376 20.7674 8.42276 19.002 6.90595C17.2429 5.39462 14.8525 4 12 4ZM10 12C10 10.8954 10.8955 10 12 10C13.1046 10 14 10.8954 14 12C14 13.1046 13.1046 14 12 14C10.8955 14 10 13.1046 10 12ZM12 8C9.7909 8 8.00004 9.79086 8.00004 12C8.00004 14.2091 9.7909 16 12 16C14.2092 16 16 14.2091 16 12C16 9.79086 14.2092 8 12 8Z" />
                                                            </svg>
                                                        </button>
                                                    </div>

                                                        @if ($item->status < 2)
                                                        <div class="tooltip tooltip-bottom p-0 " data-tip="Apagar">
                                                            <button wire:click="showModal({{ $item->id }})"
                                                                class="py-2 px-3
                                                                            transition-colors dark:hover:bg-red-500 hover:hover:bg-red-500
                                                                            duration-200 hover:text-white -ml-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                                    </path>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                        @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    {{-- MODAL UPDATE --}}
    <x-dialog-modal wire:model="modalUpload">
        <x-slot name="title">Upload da redação (PDF)</x-slot>
        <x-slot name="content">
            <form action="#" wire:submit.prevent="storagePdf()" wire.loading.attr='disable'>
                <div class="grid gap-4 mb-1 grid-cols-2 sm:gap-6 sm:mb-5">
                    <div class="col-span-2">
                        <div class="col-span-2" x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                            x-on:livewire-upload-finish="isUploading = false"
                            x-on:livewire-upload-error="isUploading = false"
                            x-on:livewire-upload-progress="progress = $event.detail.progress">
                            <!-- File Input -->
                            <input type="file" wire:model="document"
                                class="file-input file-input-secondary w-full " />
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">PDF (MAX. 2Mb).</p>

                            @error('document')
                                <span class="error">{{ $message }}</span>
                            @enderror

                            <!-- Progress Bar -->
                            <div x-show="isUploading">
                                <progress x-bind:value="progress" class="progress progress-secondary w-56"
                                    value="0" max="100"></progress>
                            </div>
                            <div wire:loading wire:target="document">Enviando...</div>
                        </div>
                    </div>
                </div>
                <div class="flex items-end space-x-4">
                    <button type="submit"
                        class="text-white
                    bg-blue-700 hover:bg-blue-800
                    focus:ring-4 focus:outline-none focus:ring-blue-300
                    font-medium rounded-lg text-sm px-5 py-2.5
                    text-center dark:bg-blue-600 dark:hover:bg-blue-700
                    dark:focus:ring-blue-800">
                        Enviar
                    </button>
                </div>
            </form>
        </x-slot>
        <x-slot name="footer">
            <x-primary-button wire:click="$toggle('showModalEdit')" class="mx-2">
                Fechar
                </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
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
    {{-- MODAL CREATE --}}
    <x-dialog-modal wire:model="modalCreate">
        <x-slot name="title">Nova redação</x-slot>
        <x-slot name="content">
            <form action="#" wire:submit.prevent="store()" wire.loading.attr='disable'>
                <div class="grid gap-4 mb-1 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                    <div class="sm:col-span-2">
                        <select wire:model="essay_id" placeholder="Concurso" wire:change="getTopics()"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                focus:ring-primary-600 focus:border-primary-600 block w-full py-2.5 pl-5 pr-8
                                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="">Selecione uma opção</option>
                            @foreach ($essays as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    @if ($topics)
                        <div class="sm:col-span-2">
                            <label for="topic_id" class="block text-sm font-medium text-gray-900 dark:text-white">
                                Tema
                            </label>
                            <select wire:model="topic_id" name="topic_id" id="topic_id" placeholder="Sub item"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                focus:ring-primary-600 focus:border-primary-600 block w-full py-2.5 pl-5 pr-8
                                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option>Selecione uma opção</option>
                                @foreach ($topics as $topic)
                                    <option value="{{ $topic->id }}">{{ $topic->title }}</option>
                                @endforeach
                            </select>

                        </div>
                    @endif
                    <div class="sm:col-span-2" x-data x-init="Inputmask({
                        'mask': '99/99/9999'
                    }).mask($refs.performed_at)">
                        <label for="performed_at"
                            class="block text-sm font-medium text-gray-900 dark:text-white">Data</label>
                        <input type="text" x-ref="performed_at" wire:model="performed_at" placeholder="Data"
                            required=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                            rounded-lg focus:ring-primary-600 focus:border-primary-600
                            block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @error('performed_at')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="flex items-end space-x-4">
                    <button type="submit"
                        class="text-white
                    bg-blue-700 hover:bg-blue-800
                    focus:ring-4 focus:outline-none focus:ring-blue-300
                    font-medium rounded-lg text-sm px-5 py-2.5
                    text-center dark:bg-blue-600 dark:hover:bg-blue-700
                    dark:focus:ring-blue-800">
                        Salvar
                    </button>
                </div>
            </form>

        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('showModalCreate')" class="mx-2">
                Fechar
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
    {{-- MODAL UPDATE --}}
    <x-dialog-modal wire:model="modalEdit">
        <x-slot name="title">Editar</x-slot>
        <x-slot name="content">
            <form action="#" wire:submit.prevent="update()" wire.loading.attr='disable'>
                <div class="grid gap-4 mb-1 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                    <div class="sm:col-span-2">
                        <select wire:model="essay_id" placeholder="Concurso" wire:change="getTopics()"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                focus:ring-primary-600 focus:border-primary-600 block w-full py-2.5 pl-5 pr-8
                                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="">Selecione uma opção</option>
                            @foreach ($essays as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    @if ($topics)
                        <div class="sm:col-span-2">
                            <label for="topic_id" class="block text-sm font-medium text-gray-900 dark:text-white">
                                Tema
                            </label>
                            <select wire:model="topic_id" name="topic_id" id="topic_id" placeholder="Sub item"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                focus:ring-primary-600 focus:border-primary-600 block w-full py-2.5 pl-5 pr-8
                                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option>Selecione uma opção</option>
                                @foreach ($topics as $topic)
                                    <option value="{{ $topic->id }}">{{ $topic->title }}</option>
                                @endforeach
                            </select>

                        </div>
                    @endif
                    <div class="sm:col-span-2" x-data x-init="Inputmask({
                        'mask': '99/99/9999'
                    }).mask($refs.performed_at)">
                        <label for="performed_at"
                            class="block text-sm font-medium text-gray-900 dark:text-white">Data</label>
                        <input type="text" x-ref="performed_at" wire:model="performed_at" placeholder="Data"
                            required=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                            rounded-lg focus:ring-primary-600 focus:border-primary-600
                            block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @error('performed_at')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="flex items-end space-x-4">
                    <button type="submit"
                        class="text-white
                    bg-blue-700 hover:bg-blue-800
                    focus:ring-4 focus:outline-none focus:ring-blue-300
                    font-medium rounded-lg text-sm px-5 py-2.5
                    text-center dark:bg-blue-600 dark:hover:bg-blue-700
                    dark:focus:ring-blue-800">
                        Salvar
                    </button>
                </div>
            </form>
        </x-slot>
        <x-slot name="footer">
            <x-primary-button wire:click="$toggle('showModalEdit')" class="mx-2">
                Fechar
                </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
    {{-- MODAL READ --}}
    <x-dialog-modal wire:model="showModalView">
        <x-slot name="title">Resultados</x-slot>
        <x-slot name="content">
            <dl class="max-w text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                @if ($detail)
                    @foreach ($detail as $item => $value)
                        @if ($value)
                            <div class="flex flex-col pb-1">
                                <dt class="text-gray-500 md:text-lg dark:text-gray-400">{{ $item }}:</dt>
                                <dd class="text-lg font-semibold">
                                    {{ $value }}
                                </dd>
                            </div>
                        @endif
                    @endforeach
                @endif
            </dl>

            @if ($ratings)
                <dl class="max-w text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                    @foreach ($ratings as $rating => $value)
                        @if ($value)
                            <div class="flex flex-col pb-1">
                                <dt class="text-gray-500 md:text-lg dark:text-gray-400">{{ $rating }}:</dt>
                                <dd class="text-lg font-semibold">
                                    {{ $value }}
                                </dd>
                            </div>
                        @endif
                    @endforeach
                </dl>
            @endif
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('showModalView')" class="mx-2">
                Fechar
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
    {{-- MODAL READ --}}
    <x-dialog-modal wire:model="showModalViewTopic">
        <x-slot name="title">Tema</x-slot>
        <x-slot name="content">
            <dl class="max-w text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                @if ($viewTopic)
                    <div class="flex flex-col pb-1">
                        <dt class="text-gray-500 md:text-lg dark:text-gray-400">
                            <strong>Título:</strong> {{ $viewTopic->title }}
                        </dt>
                        <dt class="text-gray-500 md:text-lg dark:text-gray-400">
                            <strong>Texto:</strong> {!! $viewTopic->base !!}
                        </dt>
                        <dt class="text-gray-500 md:text-lg dark:text-gray-400 text-justify">
                            <strong>Poposta:</strong> {!! $viewTopic->proposal !!}
                        </dt>
                    </div>
                @endif
            </dl>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('showModalViewTopic')" class="mx-2">
                Fechar
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>

</div>
