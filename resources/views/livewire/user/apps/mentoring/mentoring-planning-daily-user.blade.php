<div>
    @livewire('user.apps.mentoring.mentoring-contest-user-bar', ['title' => 'Meu planejamento','subTitle'=>$contestPlanningUser->dayWeek()])
    <div class="bg-white  dark:bg-gray-900 pt-3 ">
        <div class="flex flex-col items-center justify-between px-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
            <div
                class="flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
                <div class="group flex ">
                    <a  href="{{ route('apps.contestPlanningUser.user') }}"
                            class="flex items-center justify-center w-1/2 px-5
                            py-2 text-sm tracking-wide text-white transition-colors
                            duration-200 bg-gray-500 rounded-lg sm:w-auto gap-x-2
                            hover:bg-gray-600 dark:hover:bg-gray-500 dark:bg-gray-600">
                            <svg class="h-4 w-4 mr-2" fill="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 10L3.29289 10.7071L2.58579 10L3.29289 9.29289L4 10ZM21 18C21 18.5523 20.5523 19 20 19C19.4477 19 19 18.5523 19 18L21 18ZM8.29289 15.7071L3.29289 10.7071L4.70711 9.29289L9.70711 14.2929L8.29289 15.7071ZM3.29289 9.29289L8.29289 4.29289L9.70711 5.70711L4.70711 10.7071L3.29289 9.29289ZM4 9L14 9L14 11L4 11L4 9ZM21 16L21 18L19 18L19 16L21 16ZM14 9C17.866 9 21 12.134 21 16L19 16C19 13.2386 16.7614 11 14 11L14 9Z" />
                                </svg>
                            <span>Voltar</span>
                    </a>
                    @if ($time_left > 0)
                        <button wire:click="showModalCreate()"
                            class="flex items-center justify-center w-1/2 px-5 mx-3
                            py-2 text-sm tracking-wide text-white transition-colors
                            duration-200 bg-blue-500 rounded-lg sm:w-auto gap-x-2
                            hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
                            <svg class="h-4 w-4 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            <span>Inserir nova tarefa</span>
                        </button>
                        <span  class="flex items-center justify-center w-1/2 px-5
                            py-2 text-sm tracking-wide text-white transition-colors
                            duration-200 bg-red-500 rounded-lg sm:w-auto gap-x-2
                            hover:bg-red-600 dark:hover:bg-red-500 dark:bg-red-600">
                            <svg class="h-4 w-4 " fill="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.41763 18.5409C10.1913 17.3978 11.2839 16 12 16C12.7161 16 13.8087 17.3978 14.5824 18.5409C15.0129 19.1769 14.5438 20 13.7757 20H10.2243C9.45619 20 8.9871 19.1769 9.41763 18.5409Z" />
                                <path d="M12 9C12.3511 9 12.9855 8.23437 13.5273 7.47668C13.9798 6.84397 13.5091 6 12.7313 6L11.2687 6C10.4909 6 10.0202 6.84397 10.4727 7.47668C11.0145 8.23437 11.6489 9 12 9Z" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4 2C4 1.44772 4.44772 1 5 1H19C19.5523 1 20 1.44772 20 2C20 2.55228 19.5523 3 19 3H17.9726C17.8373 5.41131 17.21 7.23887 16.2903 8.7409C15.4882 10.0511 14.4804 11.0808 13.4874 12C14.4804 12.9192 15.4882 13.9489 16.2903 15.2591C17.21 16.7611 17.8373 18.5887 17.9726 21H19C19.5523 21 20 21.4477 20 22C20 22.5523 19.5523 23 19 23H5C4.44772 23 4 22.5523 4 22C4 21.4477 4.44772 21 5 21H6.02739C6.16267 18.5887 6.79004 16.7611 7.70965 15.2591C8.51183 13.9489 9.51962 12.9192 10.5126 12C9.51962 11.0808 8.51183 10.0511 7.70965 8.7409C6.79004 7.23887 6.16267 5.41131 6.02739 3H5C4.44772 3 4 2.55228 4 2ZM15.9691 21C15.8384 18.9511 15.3049 17.4797 14.5846 16.3034C13.8874 15.1645 12.9954 14.2641 12 13.3497C11.0046 14.2641 10.1126 15.1645 9.41535 16.3034C8.69515 17.4797 8.1616 18.9511 8.03092 21H15.9691ZM8.03092 3H15.9691C15.8384 5.04891 15.3049 6.52026 14.5846 7.6966C13.8874 8.83549 12.9954 9.73587 12 10.6503C11.0046 9.73587 10.1126 8.83549 9.41535 7.6966C8.69515 6.52026 8.1616 5.04891 8.03092 3Z" />
                                </svg>
                            <span>Tempo restante {{ minutesToHours($time_left) }}</span>
                    </span>
                    @else
                        <span
                            class="flex items-center justify-center w-1/2 px-5 ml-3
                            py-2 text-sm tracking-wide text-white transition-colors
                            duration-200 bg-red-500 rounded-lg sm:w-auto gap-x-2
                            hover:bg-red-600 dark:hover:bg-red-500 dark:bg-red-600">
                            <span>Tempo programado já foi esgotado</span>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        {{-- <x-message-session></x-message-session> --}}

        <div class=" bg-white dark:bg-gray-800 my-6 px-4">
            <div class="-mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                @if ($contestPlanningDailyUser->count() > 0)
                    <div class="grid grid-cols-4 gap-1 mx-5 px-2 pb-48" wire:model="{{ $contestPlanningDailyUser }}">
                        @foreach ($contestPlanningDailyUser->sortBy('order') as $item)
                            <div
                                class="card card-side {{$item->type()['color']}} text-gray-700
                                dark:text-gray-200 dark:bg-base-100
                                shadow-xl col-span-2 mx-3 my-1 p-0 h-40">
                                <div class="hidden bg-yellow-400 "></div>
                                <div class="hidden bg-blue-400 "></div>
                                <div class="hidden bg-green-400 "></div>
                                <svg fill="currentColor" class="w-24 h-24 p-2 my-auto text-white" viewBox="0 0 56 56"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M 48.7597 4.7814 L 17.1631 4.7814 C 12.3288 4.7814 9.9000 7.1639 9.9000 11.9520 L 9.9000 25.1597 C 10.5245 25.0903 11.1491 25.0441 11.7505 25.0441 C 12.3750 25.0441 12.9995 25.0903 13.6241 25.1597 L 13.6241 18.5906 C 13.6241 16.4625 14.7806 15.3523 16.8162 15.3523 L 49.0605 15.3523 C 51.1193 15.3523 52.2756 16.4625 52.2756 18.5906 L 52.2756 40.4030 C 52.2756 42.5542 51.1193 43.6413 49.0605 43.6413 L 26.1610 43.6413 C 25.8603 44.9598 25.3514 46.2088 24.6806 47.3654 L 48.7597 47.3654 C 53.5940 47.3654 56 44.9598 56 40.1948 L 56 11.9520 C 56 7.1871 53.5940 4.7814 48.7597 4.7814 Z M 30.6715 23.6562 L 32.0363 23.6562 C 32.8458 23.6562 33.1003 23.4249 33.1003 22.6153 L 33.1003 21.2506 C 33.1003 20.4411 32.8458 20.1866 32.0363 20.1866 L 30.6715 20.1866 C 29.8619 20.1866 29.5844 20.4411 29.5844 21.2506 L 29.5844 22.6153 C 29.5844 23.4249 29.8619 23.6562 30.6715 23.6562 Z M 37.2407 23.6562 L 38.6054 23.6562 C 39.4150 23.6562 39.6694 23.4249 39.6694 22.6153 L 39.6694 21.2506 C 39.6694 20.4411 39.4150 20.1866 38.6054 20.1866 L 37.2407 20.1866 C 36.4311 20.1866 36.1535 20.4411 36.1535 21.2506 L 36.1535 22.6153 C 36.1535 23.4249 36.4311 23.6562 37.2407 23.6562 Z M 43.8099 23.6562 L 45.1746 23.6562 C 45.9841 23.6562 46.2385 23.4249 46.2385 22.6153 L 46.2385 21.2506 C 46.2385 20.4411 45.9841 20.1866 45.1746 20.1866 L 43.8099 20.1866 C 43.0003 20.1866 42.7227 20.4411 42.7227 21.2506 L 42.7227 22.6153 C 42.7227 23.4249 43.0003 23.6562 43.8099 23.6562 Z M 24.1024 31.2200 L 25.4671 31.2200 C 26.2767 31.2200 26.5311 30.9887 26.5311 30.1791 L 26.5311 28.8144 C 26.5311 28.0048 26.2767 27.7735 25.4671 27.7735 L 24.1024 27.7735 C 23.2928 27.7735 23.0152 28.0048 23.0152 28.8144 L 23.0152 30.1791 C 23.0152 30.9887 23.2928 31.2200 24.1024 31.2200 Z M 30.6715 31.2200 L 32.0363 31.2200 C 32.8458 31.2200 33.1003 30.9887 33.1003 30.1791 L 33.1003 28.8144 C 33.1003 28.0048 32.8458 27.7735 32.0363 27.7735 L 30.6715 27.7735 C 29.8619 27.7735 29.5844 28.0048 29.5844 28.8144 L 29.5844 30.1791 C 29.5844 30.9887 29.8619 31.2200 30.6715 31.2200 Z M 37.2407 31.2200 L 38.6054 31.2200 C 39.4150 31.2200 39.6694 30.9887 39.6694 30.1791 L 39.6694 28.8144 C 39.6694 28.0048 39.4150 27.7735 38.6054 27.7735 L 37.2407 27.7735 C 36.4311 27.7735 36.1535 28.0048 36.1535 28.8144 L 36.1535 30.1791 C 36.1535 30.9887 36.4311 31.2200 37.2407 31.2200 Z M 43.8099 31.2200 L 45.1746 31.2200 C 45.9841 31.2200 46.2385 30.9887 46.2385 30.1791 L 46.2385 28.8144 C 46.2385 28.0048 45.9841 27.7735 45.1746 27.7735 L 43.8099 27.7735 C 43.0003 27.7735 42.7227 28.0048 42.7227 28.8144 L 42.7227 30.1791 C 42.7227 30.9887 43.0003 31.2200 43.8099 31.2200 Z M 11.7505 51.7140 C 18.1346 51.7140 23.5010 46.3939 23.5010 39.9635 C 23.5010 33.5331 18.2040 28.2130 11.7505 28.2130 C 5.3201 28.2130 0 33.5331 0 39.9635 C 0 46.4401 5.3201 51.7140 11.7505 51.7140 Z M 11.7736 47.5967 C 10.9640 47.5967 10.2470 47.0415 10.2470 46.1857 L 10.2470 41.3745 L 5.8290 41.3745 C 5.0425 41.3745 4.3948 40.7268 4.3948 39.9635 C 4.3948 39.2002 5.0425 38.5525 5.8290 38.5525 L 10.2470 38.5525 L 10.2470 33.7644 C 10.2470 32.8854 10.9640 32.3303 11.7736 32.3303 C 12.5601 32.3303 13.2771 32.8854 13.2771 33.7644 L 13.2771 38.5525 L 17.6951 38.5525 C 18.4816 38.5525 19.1061 39.2002 19.1061 39.9635 C 19.1061 40.7268 18.4816 41.3745 17.6951 41.3745 L 13.2771 41.3745 L 13.2771 46.1857 C 13.2771 47.0415 12.5601 47.5967 11.7736 47.5967 Z M 30.6715 38.8070 L 32.0363 38.8070 C 32.8458 38.8070 33.1003 38.5525 33.1003 37.7429 L 33.1003 36.3782 C 33.1003 35.5686 32.8458 35.3373 32.0363 35.3373 L 30.6715 35.3373 C 29.8619 35.3373 29.5844 35.5686 29.5844 36.3782 L 29.5844 37.7429 C 29.5844 38.5525 29.8619 38.8070 30.6715 38.8070 Z M 37.2407 38.8070 L 38.6054 38.8070 C 39.4150 38.8070 39.6694 38.5525 39.6694 37.7429 L 39.6694 36.3782 C 39.6694 35.5686 39.4150 35.3373 38.6054 35.3373 L 37.2407 35.3373 C 36.4311 35.3373 36.1535 35.5686 36.1535 36.3782 L 36.1535 37.7429 C 36.1535 38.5525 36.4311 38.8070 37.2407 38.8070 Z" />
                                </svg>
                                <div class="card-body gap-0 bg-gray-200 mx-5 py-2">
                                    <h2 class="card-title text-sm sm:text-lg">{{ $item->discipline->title }} </h2>
                                    <p class="py-0">Hora(s): {{ $item->hours() }}</p>
                                    <p class="py-0">Tipo: {{ $item->type()['type'] }}</p>
                                    <p class="py-0">Ordem: {{ $item->order }}</p>

                                    <div class="card-actions justify-end ">
                                        <div class="flex">
                                            <div class="tooltip tooltip-top p-0" data-tip="Editar">
                                                <button wire:click="showModalEdit({{ $item->id }})" title="Editar"
                                                    class="py-2 px-3 rounded-l font-medium transition-colors
                                                    text-gray-700 dark:text-gray-300 dark:hover:bg-blue-500 hover:bg-blue-500 hover:shadow-lg
                                                    duration-200 hover:text-white whitespace-nowrap">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 "
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                        stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                                        </path>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="tooltip tooltip-top p-0" data-tip="Excluir">
                                                <button title="Apagar" wire:click="showModal({{ $item->id }})"
                                                    class="py-2 px-3 rounded-r  font-medium transition-colors
                                                    text-gray-700 dark:text-gray-300
                                                    dark:hover:bg-red-500 hover:bg-red-500 hover:shadow-lg
                                                    duration-200 hover:text-white -ml-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
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
                @endif
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
                            @foreach ($contestDiscipline as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
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
                                <option value="{{$min}}">
                                    {{ minutesToHours($min) }}</option>
                            @endfor
                        </select>
                        @error('minutes')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-span-4 sm:col-span-2">
                        <label for="type" class="block text-sm font-medium text-gray-900 dark:text-white">
                            Tipo
                        </label>
                        <select wire:model="type" required="" name="type" id="type"
                            placeholder="Matéria"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5
                                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                                dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="">Selecione...</option>
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
                            @foreach ($contestDiscipline as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
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
                                <option value="{{$min}}">
                                    {{ minutesToHours($min) }}</option>
                            @endfor
                        </select>
                        @error('minutes')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-span-4 sm:col-span-2">
                        <label for="type" class="block text-sm font-medium text-gray-900 dark:text-white">
                            Tipo
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
