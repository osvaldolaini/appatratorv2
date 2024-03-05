<div >
    <x-message-session></x-message-session>
    @livewire('app.mentoring.mentoring-contest-user-bar', ['title' => 'Planejamento semanal'])
    <div class="bg-white dark:bg-gray-900 pt-3 ">
        <div class="flex flex-col items-center justify-between px-2 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
            <div class="w-full grid grid-cols-2 sm:grid-cols-7 gap-0.5 px-4">
                @foreach ($planningUser->sortBy('order') as $planning)
                    <div class="col-span-1">
                        <div
                            class="w-full border-inherit bg-neutral-100
                            text-base-100 dark:text-gray-300 dark:bg-base-100 text-sm rounded-md pb-0.5">
                            <div class="card-body p-1.5 gap-0 w-full">
                                <h2 class="card-title ">{{ $planning->dayWeek() }}</h2>
                                <div class="flex">
                                    <p class="py-0 flex">
                                        <svg class="h-4 w-4 mr-1" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill="currentColor" fill-rule="evenodd"
                                                d="M10 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8zm2.293-4.707a.997.997 0 01-.707-.293l-2.293-2.293A.997.997 0 019 10V6a1 1 0 112 0v3.586l2 2a.999.999 0 01-.707 1.707z" />
                                        </svg>
                                        {{ $planning->hours() }}
                                    </p>
                                    <p class="py-0 flex">
                                        <svg class="h-4 w-4 mr-0" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M8 5H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2M8 5v0a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v0M8 5v0a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2v0" />
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m9 14 2 2 4-5" />
                                        </svg> {{ $planning->questions }}
                                    </p>
                                </div>
                                <div class="flex w-full">
                                    @if ($planning->timeLeft() > 0)
                                        <button wire:click="showModalCreate({{ $planning->id }},{{ $planning->timeLeft() }})"
                                            class="flex w-full items-center justify-start px-1
                                            text-sm tracking-wide text-white transition-colors
                                            duration-200 bg-blue-500 rounded-lg sm:w-auto gap-x-2
                                            hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
                                            <svg class="h-4 w-4 mr-0" fill="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.41763 18.5409C10.1913 17.3978 11.2839 16 12 16C12.7161 16 13.8087 17.3978 14.5824 18.5409C15.0129 19.1769 14.5438 20 13.7757 20H10.2243C9.45619 20 8.9871 19.1769 9.41763 18.5409Z" />
                                                <path d="M12 9C12.3511 9 12.9855 8.23437 13.5273 7.47668C13.9798 6.84397 13.5091 6 12.7313 6L11.2687 6C10.4909 6 10.0202 6.84397 10.4727 7.47668C11.0145 8.23437 11.6489 9 12 9Z" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4 2C4 1.44772 4.44772 1 5 1H19C19.5523 1 20 1.44772 20 2C20 2.55228 19.5523 3 19 3H17.9726C17.8373 5.41131 17.21 7.23887 16.2903 8.7409C15.4882 10.0511 14.4804 11.0808 13.4874 12C14.4804 12.9192 15.4882 13.9489 16.2903 15.2591C17.21 16.7611 17.8373 18.5887 17.9726 21H19C19.5523 21 20 21.4477 20 22C20 22.5523 19.5523 23 19 23H5C4.44772 23 4 22.5523 4 22C4 21.4477 4.44772 21 5 21H6.02739C6.16267 18.5887 6.79004 16.7611 7.70965 15.2591C8.51183 13.9489 9.51962 12.9192 10.5126 12C9.51962 11.0808 8.51183 10.0511 7.70965 8.7409C6.79004 7.23887 6.16267 5.41131 6.02739 3H5C4.44772 3 4 2.55228 4 2ZM15.9691 21C15.8384 18.9511 15.3049 17.4797 14.5846 16.3034C13.8874 15.1645 12.9954 14.2641 12 13.3497C11.0046 14.2641 10.1126 15.1645 9.41535 16.3034C8.69515 17.4797 8.1616 18.9511 8.03092 21H15.9691ZM8.03092 3H15.9691C15.8384 5.04891 15.3049 6.52026 14.5846 7.6966C13.8874 8.83549 12.9954 9.73587 12 10.6503C11.0046 9.73587 10.1126 8.83549 9.41535 7.6966C8.69515 6.52026 8.1616 5.04891 8.03092 3Z" />
                                            </svg>
                                            <span>{{ minutesToHours($planning->timeLeft()) }} Inserir</span>
                                        </button>
                                    @else
                                    <span
                                        class="flex w-full items-center justify-start px-1
                                        text-sm tracking-wide text-white transition-colors
                                        duration-200 bg-green-500 rounded-lg sm:w-auto gap-x-2
                                        hover:bg-green-600 dark:hover:bg-green-500 dark:bg-green-600">
                                        <svg class="h-4 w-4 mr-0" fill="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.41763 18.5409C10.1913 17.3978 11.2839 16 12 16C12.7161 16 13.8087 17.3978 14.5824 18.5409C15.0129 19.1769 14.5438 20 13.7757 20H10.2243C9.45619 20 8.9871 19.1769 9.41763 18.5409Z" />
                                            <path d="M12 9C12.3511 9 12.9855 8.23437 13.5273 7.47668C13.9798 6.84397 13.5091 6 12.7313 6L11.2687 6C10.4909 6 10.0202 6.84397 10.4727 7.47668C11.0145 8.23437 11.6489 9 12 9Z" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4 2C4 1.44772 4.44772 1 5 1H19C19.5523 1 20 1.44772 20 2C20 2.55228 19.5523 3 19 3H17.9726C17.8373 5.41131 17.21 7.23887 16.2903 8.7409C15.4882 10.0511 14.4804 11.0808 13.4874 12C14.4804 12.9192 15.4882 13.9489 16.2903 15.2591C17.21 16.7611 17.8373 18.5887 17.9726 21H19C19.5523 21 20 21.4477 20 22C20 22.5523 19.5523 23 19 23H5C4.44772 23 4 22.5523 4 22C4 21.4477 4.44772 21 5 21H6.02739C6.16267 18.5887 6.79004 16.7611 7.70965 15.2591C8.51183 13.9489 9.51962 12.9192 10.5126 12C9.51962 11.0808 8.51183 10.0511 7.70965 8.7409C6.79004 7.23887 6.16267 5.41131 6.02739 3H5C4.44772 3 4 2.55228 4 2ZM15.9691 21C15.8384 18.9511 15.3049 17.4797 14.5846 16.3034C13.8874 15.1645 12.9954 14.2641 12 13.3497C11.0046 14.2641 10.1126 15.1645 9.41535 16.3034C8.69515 17.4797 8.1616 18.9511 8.03092 21H15.9691ZM8.03092 3H15.9691C15.8384 5.04891 15.3049 6.52026 14.5846 7.6966C13.8874 8.83549 12.9954 9.73587 12 10.6503C11.0046 9.73587 10.1126 8.83549 9.41535 7.6966C8.69515 6.52026 8.1616 5.04891 8.03092 3Z" />
                                        </svg>
                                        <span>Completo</span>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            @foreach ($planning->daily->sortBy('order') as $task)
                                <div
                                    class="card card-side {{ $task->type()['color'] }} text-gray-700
                                    dark:text-gray-200 dark:bg-base-100
                                    shadow-md p-0 text-xs rounded-md m-1 ">
                                    <div class="hidden bg-yellow-400 dark:bg-yellow-400"></div>
                                    <div class="hidden bg-blue-400 dark:bg-blue-400"></div>
                                    <div class="hidden bg-green-400 dark:bg-green-400"></div>

                                    <div class="card-body p-0.5 pl-1 gap-0 text-xs rounded-md bg-white ml-1">
                                        <h2 class="card-title text-xs ">{{ $task->discipline->title }} </h2>
                                        <p class="py-0 flex">
                                            <svg class="h-4 w-4 mr-1" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill="currentColor" fill-rule="evenodd"
                                                    d="M10 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8zm2.293-4.707a.997.997 0 01-.707-.293l-2.293-2.293A.997.997 0 019 10V6a1 1 0 112 0v3.586l2 2a.999.999 0 01-.707 1.707z" />
                                            </svg> {{ $task->hours() }}
                                        </p>
                                        <p class="py-0 flex">
                                            <svg class="h-4 w-4 mr-1" viewBox="0 0 32 32" version="1.1"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill="currentColor"
                                                    d="M30.639 26.361l-6.211-23.183c-0.384-1.398-1.644-2.408-3.139-2.408-0.299 0-0.589 0.040-0.864 0.116l0.023-0.005-2.896 0.776c-0.23 0.065-0.429 0.145-0.618 0.243l0.018-0.008c-0.594-0.698-1.472-1.14-2.453-1.143h-2.999c-0.76 0.003-1.457 0.27-2.006 0.713l0.006-0.005c-0.543-0.438-1.24-0.705-1.999-0.708h-3.001c-1.794 0.002-3.248 1.456-3.25 3.25v24c0.002 1.794 1.456 3.248 3.25 3.25h3c0.76-0.003 1.457-0.269 2.006-0.712l-0.006 0.005c0.543 0.438 1.24 0.704 1.999 0.708h2.999c1.794-0.002 3.248-1.456 3.25-3.25v-13.053l3.717 13.873c0.382 1.398 1.641 2.408 3.136 2.408 0.3 0 0.59-0.041 0.866-0.117l-0.023 0.005 2.898-0.775c1.398-0.386 2.407-1.646 2.407-3.141 0-0.298-0.040-0.587-0.115-0.862l0.005 0.023zM19.026 10.061l4.346-1.165 3.494 13.042-4.345 1.164zM18.199 4.072l2.895-0.775c0.056-0.015 0.121-0.023 0.188-0.023 0.346 0 0.639 0.231 0.731 0.547l0.001 0.005 0.712 2.656-4.346 1.165-0.632-2.357v-0.848c0.094-0.179 0.254-0.312 0.446-0.37l0.005-0.001zM11.5 3.25h2.998c0.412 0.006 0.744 0.338 0.75 0.749v2.75l-4.498 0.001v-2.75c0.006-0.412 0.338-0.744 0.749-0.75h0.001zM8.25 22.75h-4.5v-13.5l4.5-0.001zM10.75 9.25l4.498-0.001v13.501h-4.498zM4.5 3.25h3c0.412 0.006 0.744 0.338 0.75 0.749v2.75l-4.5 0.001v-2.75c0.006-0.412 0.338-0.744 0.749-0.75h0.001zM7.5 28.75h-3c-0.412-0.006-0.744-0.338-0.75-0.749v-2.751h4.5v2.75c-0.006 0.412-0.338 0.744-0.749 0.75h-0.001zM14.498 28.75h-2.998c-0.412-0.006-0.744-0.338-0.75-0.749v-2.751h4.498v2.75c-0.006 0.412-0.338 0.744-0.749 0.75h-0.001zM27.693 27.928l-2.896 0.775c-0.057 0.015-0.122 0.024-0.189 0.024-0.139 0-0.269-0.037-0.381-0.102l0.004 0.002c-0.171-0.099-0.298-0.259-0.35-0.45l-0.001-0.005-0.711-2.655 4.345-1.164 0.712 2.657c0.015 0.056 0.023 0.12 0.023 0.186 0 0.347-0.232 0.639-0.549 0.73l-0.005 0.001z">
                                                </path>
                                            </svg> {{ $task->type()['type'] }}
                                        </p>

                                        <div class="card-actions justify-end ">
                                            <div class="flex">
                                                <div class="tooltip tooltip-top p-0" data-tip="Tarefas">
                                                    <a href="{{ route('apps.contestPlanningTaskUser.user',[$planning->code]) }}"
                                                        title="Tarefas"
                                                        class="flex py-1 px-2 rounded-l font-medium transition-colors
                                                    text-gray-700 dark:text-gray-300 dark:hover:bg-green-500 hover:bg-green-500 hover:shadow-lg
                                                    duration-200 hover:text-white whitespace-nowrap">
                                                        <svg class="h-4 w-4 " viewBox="0 -1.5 20.412 20.412"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <g id="check-lists" transform="translate(-1.588 -2.588)">
                                                                <path id="primary" d="M7,4,4.33,7,3,5.5" fill="none"
                                                                    stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2" />
                                                                <path id="primary-2" data-name="primary"
                                                                    d="M3,11.5,4.33,13,7,10" fill="none"
                                                                    stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2" />
                                                                <path id="primary-3" data-name="primary"
                                                                    d="M3,17.5,4.33,19,7,16" fill="none"
                                                                    stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2" />
                                                                <path id="primary-4" data-name="primary"
                                                                    d="M11,6H21M11,12H21M11,18H21" fill="none"
                                                                    stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2" />
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div>
                                                <div class="tooltip tooltip-top p-0" data-tip="Editar">
                                                    <button wire:click="showModalEdit({{ $task->id }},{{ $planning->timeLeft() }})"
                                                        title="Editar"
                                                        class="py-1 px-2 font-medium transition-colors
                                                    text-gray-700 dark:text-gray-300 dark:hover:bg-blue-500 hover:bg-blue-500 hover:shadow-lg
                                                    duration-200 hover:text-white whitespace-nowrap">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 "
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                </div>
                                                <div class="tooltip tooltip-top p-0" data-tip="Excluir">
                                                    <button title="Apagar" wire:click="showModal({{ $task->id }})"
                                                        class="py-1 px-2 rounded-r  font-medium transition-colors
                                                    text-gray-700 dark:text-gray-300
                                                    dark:hover:bg-red-500 hover:bg-red-500 hover:shadow-lg
                                                    duration-200 hover:text-white -ml-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
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
            <x-danger-button wire:click.prevent="delete({{ $model_id }})" wire.loading.attr='disable'>
                Apagar registro
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>

    {{-- MODAL CREATE --}}
    <x-dialog-modal wire:model="showModalCreate" class="mt-0">
        <x-slot name="title">Criar novo</x-slot>
        <x-slot name="content">
            <form action="#" wire:submit.prevent="store()" wire.loading.attr='disable'>
                <div class="grid gap-4 mb-1 sm:grid-cols-4 sm:gap-6 sm:mb-5">
                    <div class="col-span-4 sm:col-span-4">
                        <label for="contest_discipline_id"
                            class="block text-sm font-medium text-gray-900 dark:text-white">
                            Matéria
                        </label>
                        <select wire:model="contest_discipline_id" required="" name="contest_discipline_id"
                            id="contest_discipline_id" placeholder="Matéria"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5
                                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                                dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="">Selecione...</option>
                                @isset($contestDiscipline)
                                @foreach ($contestDiscipline as $item)
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            @endisset
                        </select>
                        @error('contest_discipline_id')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-span-4 sm:col-span-1">
                        <label for="minutes" class="block text-sm font-medium text-gray-900 dark:text-white">
                            Tempo de estudo
                        </label>
                        <select wire:model="minutes" required="" name="minutes" id="minutes"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="">Selecione</option>
                            @for ($min = 15; $min <= $time_left; $min += 15)
                                <option value="{{ $min }}">
                                    {{ minutesToHours($min) }}</option>
                            @endfor
                        </select>
                        @error('minutes')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-span-4 sm:col-span-2">
                        <label for="type" class="block text-sm font-medium text-gray-900 dark:text-white">
                            Ordem
                        </label>
                        <select wire:model="type" required="" name="type" id="type"
                            placeholder="Matéria"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5
                                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                                dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="T">Teoria</option>
                            <option value="Q">Questões</option>
                            <option value="R">Revisão</option>
                        </select>
                        @error('type')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-span-4 sm:col-span-1">
                        <label for="order" class="block text-sm font-medium text-gray-900 dark:text-white">
                            Ordem
                        </label>
                        <input type="number" wire:model="order" name="order" id="order" placeholder="Ordem"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @error('order')
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
    <x-dialog-modal wire:model="showModalEdit">
        <x-slot name="title">Editar</x-slot>
        <x-slot name="content">
            <form wire:submit.prevent="update">
                <div class="grid gap-4 mb-1 sm:grid-cols-4 sm:gap-6 sm:mb-5">
                    <div class="col-span-4 sm:col-span-4">
                        <label for="contest_discipline_id"
                            class="block text-sm font-medium text-gray-900 dark:text-white">
                            Matéria
                        </label>
                        <select wire:model="contest_discipline_id" required="" name="contest_discipline_id"
                            id="contest_discipline_id" placeholder="Matéria"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5
                                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                                dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            @isset($contestDiscipline)

                                @foreach ($contestDiscipline as $item)
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            @endisset
                        </select>
                        @error('contest_discipline_id')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-span-4 sm:col-span-1">
                        <label for="minutes" class="block text-sm font-medium text-gray-900 dark:text-white">
                            Tempo de estudo
                        </label>
                        <select wire:model="minutes" required="" name="minutes" id="minutes"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="">Selecione</option>
                            @for ($min = 15; $min <= $time_left; $min += 15)
                                <option value="{{ $min }}">
                                    {{ minutesToHours($min) }}</option>
                            @endfor
                        </select>
                        @error('minutes')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-span-4 sm:col-span-2">
                        <label for="type" class="block text-sm font-medium text-gray-900 dark:text-white">
                            Ordem
                        </label>
                        <select wire:model="type" required="" name="type" id="type"
                            placeholder="Matéria"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5
                                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                                dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="T">Teoria</option>
                            <option value="Q">Questões</option>
                            <option value="R">Revisão</option>
                        </select>
                        @error('type')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-span-4 sm:col-span-1">
                        <label for="order" class="block text-sm font-medium text-gray-900 dark:text-white">
                            Ordem
                        </label>
                        <input type="number" wire:model="order" name="order" id="order" placeholder="Ordem"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @error('order')
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
                        Atualizar
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
</div>
