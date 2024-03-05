<div>
    <x-message-session></x-message-session>
    @livewire('app.mentoring.mentoring-contest-user-bar', ['title' => 'Meu planejamento'])
    <div class="bg-white dark:bg-gray-800 pt-3 ">
        <div class="flex flex-col items-center justify-between px-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
            <div
                class="flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
                <div class="group flex ">
                    <button wire:click="showModalCreate()"
                        class="flex items-center justify-center w-1/2 px-5
                    py-2 text-sm tracking-wide text-white transition-colors
                    duration-200 bg-blue-500 rounded-lg sm:w-auto gap-x-2
                    hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
                        <svg class="h-4 w-4 mr-2" fill="currentColor" viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                        <span>Inserir dia de estudo</span>
                    </button>
                </div>
            </div>
        </div>

        <div class=" bg-white dark:bg-gray-800 my-6 px-4">
            <div class="-mx-4  overflow-x-auto sm:-mx-6 lg:-mx-8">
                @if ($planningUser->count() > 0)
                    <div class="grid grid-cols-6 gap-4 mx-5 px-2 pb-48" wire:model="{{ $planningUser }}">
                        @foreach ($planningUser->sortBy('day') as $item)
                            <div
                                class="card  card-side p-4
                                text-[#fddb11] dark:text-gray-200 dark:bg-gray-900
                                shadow-xl col-span-6 sm:col-span-2
                                bg-gradient-to-r from-[#210c75] from-30% via-blue-500 via-80% to-sky-600 to-90%
                                ">

                                <div class="card-body p-1.5 gap-0">
                                    <h2 class="card-title">
                                        <svg fill="currentColor" class="w-6 h-6 mr-1" viewBox="0 0 56 56"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M 48.7597 4.7814 L 17.1631 4.7814 C 12.3288 4.7814 9.9000 7.1639 9.9000 11.9520 L 9.9000 25.1597 C 10.5245 25.0903 11.1491 25.0441 11.7505 25.0441 C 12.3750 25.0441 12.9995 25.0903 13.6241 25.1597 L 13.6241 18.5906 C 13.6241 16.4625 14.7806 15.3523 16.8162 15.3523 L 49.0605 15.3523 C 51.1193 15.3523 52.2756 16.4625 52.2756 18.5906 L 52.2756 40.4030 C 52.2756 42.5542 51.1193 43.6413 49.0605 43.6413 L 26.1610 43.6413 C 25.8603 44.9598 25.3514 46.2088 24.6806 47.3654 L 48.7597 47.3654 C 53.5940 47.3654 56 44.9598 56 40.1948 L 56 11.9520 C 56 7.1871 53.5940 4.7814 48.7597 4.7814 Z M 30.6715 23.6562 L 32.0363 23.6562 C 32.8458 23.6562 33.1003 23.4249 33.1003 22.6153 L 33.1003 21.2506 C 33.1003 20.4411 32.8458 20.1866 32.0363 20.1866 L 30.6715 20.1866 C 29.8619 20.1866 29.5844 20.4411 29.5844 21.2506 L 29.5844 22.6153 C 29.5844 23.4249 29.8619 23.6562 30.6715 23.6562 Z M 37.2407 23.6562 L 38.6054 23.6562 C 39.4150 23.6562 39.6694 23.4249 39.6694 22.6153 L 39.6694 21.2506 C 39.6694 20.4411 39.4150 20.1866 38.6054 20.1866 L 37.2407 20.1866 C 36.4311 20.1866 36.1535 20.4411 36.1535 21.2506 L 36.1535 22.6153 C 36.1535 23.4249 36.4311 23.6562 37.2407 23.6562 Z M 43.8099 23.6562 L 45.1746 23.6562 C 45.9841 23.6562 46.2385 23.4249 46.2385 22.6153 L 46.2385 21.2506 C 46.2385 20.4411 45.9841 20.1866 45.1746 20.1866 L 43.8099 20.1866 C 43.0003 20.1866 42.7227 20.4411 42.7227 21.2506 L 42.7227 22.6153 C 42.7227 23.4249 43.0003 23.6562 43.8099 23.6562 Z M 24.1024 31.2200 L 25.4671 31.2200 C 26.2767 31.2200 26.5311 30.9887 26.5311 30.1791 L 26.5311 28.8144 C 26.5311 28.0048 26.2767 27.7735 25.4671 27.7735 L 24.1024 27.7735 C 23.2928 27.7735 23.0152 28.0048 23.0152 28.8144 L 23.0152 30.1791 C 23.0152 30.9887 23.2928 31.2200 24.1024 31.2200 Z M 30.6715 31.2200 L 32.0363 31.2200 C 32.8458 31.2200 33.1003 30.9887 33.1003 30.1791 L 33.1003 28.8144 C 33.1003 28.0048 32.8458 27.7735 32.0363 27.7735 L 30.6715 27.7735 C 29.8619 27.7735 29.5844 28.0048 29.5844 28.8144 L 29.5844 30.1791 C 29.5844 30.9887 29.8619 31.2200 30.6715 31.2200 Z M 37.2407 31.2200 L 38.6054 31.2200 C 39.4150 31.2200 39.6694 30.9887 39.6694 30.1791 L 39.6694 28.8144 C 39.6694 28.0048 39.4150 27.7735 38.6054 27.7735 L 37.2407 27.7735 C 36.4311 27.7735 36.1535 28.0048 36.1535 28.8144 L 36.1535 30.1791 C 36.1535 30.9887 36.4311 31.2200 37.2407 31.2200 Z M 43.8099 31.2200 L 45.1746 31.2200 C 45.9841 31.2200 46.2385 30.9887 46.2385 30.1791 L 46.2385 28.8144 C 46.2385 28.0048 45.9841 27.7735 45.1746 27.7735 L 43.8099 27.7735 C 43.0003 27.7735 42.7227 28.0048 42.7227 28.8144 L 42.7227 30.1791 C 42.7227 30.9887 43.0003 31.2200 43.8099 31.2200 Z M 11.7505 51.7140 C 18.1346 51.7140 23.5010 46.3939 23.5010 39.9635 C 23.5010 33.5331 18.2040 28.2130 11.7505 28.2130 C 5.3201 28.2130 0 33.5331 0 39.9635 C 0 46.4401 5.3201 51.7140 11.7505 51.7140 Z M 11.7736 47.5967 C 10.9640 47.5967 10.2470 47.0415 10.2470 46.1857 L 10.2470 41.3745 L 5.8290 41.3745 C 5.0425 41.3745 4.3948 40.7268 4.3948 39.9635 C 4.3948 39.2002 5.0425 38.5525 5.8290 38.5525 L 10.2470 38.5525 L 10.2470 33.7644 C 10.2470 32.8854 10.9640 32.3303 11.7736 32.3303 C 12.5601 32.3303 13.2771 32.8854 13.2771 33.7644 L 13.2771 38.5525 L 17.6951 38.5525 C 18.4816 38.5525 19.1061 39.2002 19.1061 39.9635 C 19.1061 40.7268 18.4816 41.3745 17.6951 41.3745 L 13.2771 41.3745 L 13.2771 46.1857 C 13.2771 47.0415 12.5601 47.5967 11.7736 47.5967 Z M 30.6715 38.8070 L 32.0363 38.8070 C 32.8458 38.8070 33.1003 38.5525 33.1003 37.7429 L 33.1003 36.3782 C 33.1003 35.5686 32.8458 35.3373 32.0363 35.3373 L 30.6715 35.3373 C 29.8619 35.3373 29.5844 35.5686 29.5844 36.3782 L 29.5844 37.7429 C 29.5844 38.5525 29.8619 38.8070 30.6715 38.8070 Z M 37.2407 38.8070 L 38.6054 38.8070 C 39.4150 38.8070 39.6694 38.5525 39.6694 37.7429 L 39.6694 36.3782 C 39.6694 35.5686 39.4150 35.3373 38.6054 35.3373 L 37.2407 35.3373 C 36.4311 35.3373 36.1535 35.5686 36.1535 36.3782 L 36.1535 37.7429 C 36.1535 38.5525 36.4311 38.8070 37.2407 38.8070 Z" />
                                        </svg>
                                        {{ $item->dayWeek() }}
                                    </h2>
                                    <p class="py-0 flex">
                                        <svg class="h-6 w-6 mr-1" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill="currentColor" fill-rule="evenodd"
                                                d="M10 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8zm2.293-4.707a.997.997 0 01-.707-.293l-2.293-2.293A.997.997 0 019 10V6a1 1 0 112 0v3.586l2 2a.999.999 0 01-.707 1.707z" />
                                        </svg>
                                        {{ $item->hours() }}
                                    </p>
                                    @if ($item->questions != '' or $item->questions > 0)
                                        <p class="py-0 flex">
                                            <svg class="h-6 w-6 mr-1" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M8 5H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2M8 5v0a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v0M8 5v0a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2v0" />
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="m9 14 2 2 4-5" />
                                            </svg> {{ $item->questions }}
                                        </p>
                                    @endif
                                    <div class="card-actions justify-end">
                                        <div class="flex">
                                            <div class="tooltip tooltip-top p-0" data-tip="Organizar dia">
                                                <a href="{{ route('apps.contestPlanningDailyUser.user', $item->code) }}"
                                                    class="flex py-2 px-3 rounded-l font-medium transition-colors
                                                     dark:text-gray-300 dark:hover:bg-green-500 hover:bg-green-500 hover:shadow-lg
                                                    duration-200 hover:text-white whitespace-nowrap">
                                                    <svg class="h-6 w-6" viewBox="0 -1.5 20.412 20.412"
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
                                                <button wire:click="showModalEdit({{ $item->id }})" title="Editar"
                                                    class="py-2 px-3 font-medium transition-colors
                                                     dark:text-gray-300 dark:hover:bg-blue-500 hover:bg-blue-500 hover:shadow-lg
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
                                                     dark:text-gray-300
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
                    <div class="col-span-4 sm:col-span-2">
                        <label for="day" class="block text-sm font-medium text-gray-900 dark:text-white">
                            Dia da semana
                        </label>
                        <select wire:model="day" required=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="">Selecione</option>
                            @for ($i = 1; $i < 8; $i++)
                                @if (!$week->contains($i))
                                    <option value="{{ $i }}">{{ dayWeek($i) }}</option>
                                @endif
                            @endfor
                        </select>
                        @error('day')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-span-4 sm:col-span-1">
                        <label for="minutes" class="block text-sm font-medium text-gray-900 dark:text-white">
                            Tempo de estudo
                        </label>
                        <select wire:model="minutes" required=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            @for ($hora = 0; $hora < 24; $hora++)
                                @for ($minuto = 0; $minuto < 60; $minuto += 30)
                                    <option value="{{ hoursToMinutes($hora . ':' . $minuto) }}">
                                        {{ sprintf('%02d:%02d', $hora, $minuto) }}</option>
                                @endfor
                            @endfor
                        </select>
                        @error('minutes')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-span-4 sm:col-span-1">
                        <label for="questions" class="block text-sm font-medium text-gray-900 dark:text-white">
                            Questões do dia
                        </label>
                        <input type="number" wire:model="questions" name="questions" id="questions"
                            placeholder=" Questões do dia"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @error('questions')
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
                    <div class="col-span-4 sm:col-span-2">
                        <label for="day" class="block text-sm font-medium text-gray-900 dark:text-white">
                            Dia da semana
                        </label>
                        <select wire:model="day" required=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="">Selecione</option>
                            @for ($i = 1; $i < 8; $i++)
                                @if (!$week->contains($i) OR $i == $day)
                                    <option value="{{ $i }}">{{ dayWeek($i) }}</option>
                                @endif
                            @endfor
                        </select>
                        @error('day')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-span-4 sm:col-span-1">
                        <label for="minutes" class="block text-sm font-medium text-gray-900 dark:text-white">
                            Tempo de estudo
                        </label>
                        <select wire:model="minutes" required=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            @for ($hora = 0; $hora < 24; $hora++)
                                @for ($minuto = 0; $minuto < 60; $minuto += 30)
                                    <option value="{{ hoursToMinutes($hora . ':' . $minuto) }}">
                                        {{ sprintf('%02d:%02d', $hora, $minuto) }}</option>
                                @endfor
                            @endfor
                        </select>
                        @error('minutes')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-span-4 sm:col-span-1">
                        <label for="questions" class="block text-sm font-medium text-gray-900 dark:text-white">
                            Questões do dia
                        </label>
                        <input type="number" wire:model="questions" name="questions" id="questions"
                            placeholder=" Questões do dia"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @error('questions')
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
