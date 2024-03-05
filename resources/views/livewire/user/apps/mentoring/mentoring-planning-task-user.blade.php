<div >
    <x-message-session></x-message-session>
    @livewire('app.mentoring.mentoring-contest-user-bar', ['title' => $title, 'subTitle' => $day])

    <div class="bg-white dark:bg-gray-800 pt-3 ">
        <div class="flex flex-col items-center justify-between px-2 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
            <div class="w-full grid grid-cols-1 gap-2 px-4">
                @foreach ($planningUser->sortBy('day') as $planning)
                    <div tabindex="0"
                        class="
                            rounded-md col-span-1 shadow-md pb-0 mb-0
                            bg-gray-50">
                        <div class="rounded-t-md text-xl font-medium p-4 text-[#fddb11] dark:text-gray-200 dark:bg-gray-900
                        bg-gradient-to-r from-[#210c75] from-30% via-blue-500 via-80% to-sky-600 to-90%
                        ">
                            <div class="flex flex-col">
                                <h2 class="card-title justify-start">
                                    <svg fill="currentColor" class="w-6 h-6 mr-1" viewBox="0 0 56 56"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M 48.7597 4.7814 L 17.1631 4.7814 C 12.3288 4.7814 9.9000 7.1639 9.9000 11.9520 L 9.9000 25.1597 C 10.5245 25.0903 11.1491 25.0441 11.7505 25.0441 C 12.3750 25.0441 12.9995 25.0903 13.6241 25.1597 L 13.6241 18.5906 C 13.6241 16.4625 14.7806 15.3523 16.8162 15.3523 L 49.0605 15.3523 C 51.1193 15.3523 52.2756 16.4625 52.2756 18.5906 L 52.2756 40.4030 C 52.2756 42.5542 51.1193 43.6413 49.0605 43.6413 L 26.1610 43.6413 C 25.8603 44.9598 25.3514 46.2088 24.6806 47.3654 L 48.7597 47.3654 C 53.5940 47.3654 56 44.9598 56 40.1948 L 56 11.9520 C 56 7.1871 53.5940 4.7814 48.7597 4.7814 Z M 30.6715 23.6562 L 32.0363 23.6562 C 32.8458 23.6562 33.1003 23.4249 33.1003 22.6153 L 33.1003 21.2506 C 33.1003 20.4411 32.8458 20.1866 32.0363 20.1866 L 30.6715 20.1866 C 29.8619 20.1866 29.5844 20.4411 29.5844 21.2506 L 29.5844 22.6153 C 29.5844 23.4249 29.8619 23.6562 30.6715 23.6562 Z M 37.2407 23.6562 L 38.6054 23.6562 C 39.4150 23.6562 39.6694 23.4249 39.6694 22.6153 L 39.6694 21.2506 C 39.6694 20.4411 39.4150 20.1866 38.6054 20.1866 L 37.2407 20.1866 C 36.4311 20.1866 36.1535 20.4411 36.1535 21.2506 L 36.1535 22.6153 C 36.1535 23.4249 36.4311 23.6562 37.2407 23.6562 Z M 43.8099 23.6562 L 45.1746 23.6562 C 45.9841 23.6562 46.2385 23.4249 46.2385 22.6153 L 46.2385 21.2506 C 46.2385 20.4411 45.9841 20.1866 45.1746 20.1866 L 43.8099 20.1866 C 43.0003 20.1866 42.7227 20.4411 42.7227 21.2506 L 42.7227 22.6153 C 42.7227 23.4249 43.0003 23.6562 43.8099 23.6562 Z M 24.1024 31.2200 L 25.4671 31.2200 C 26.2767 31.2200 26.5311 30.9887 26.5311 30.1791 L 26.5311 28.8144 C 26.5311 28.0048 26.2767 27.7735 25.4671 27.7735 L 24.1024 27.7735 C 23.2928 27.7735 23.0152 28.0048 23.0152 28.8144 L 23.0152 30.1791 C 23.0152 30.9887 23.2928 31.2200 24.1024 31.2200 Z M 30.6715 31.2200 L 32.0363 31.2200 C 32.8458 31.2200 33.1003 30.9887 33.1003 30.1791 L 33.1003 28.8144 C 33.1003 28.0048 32.8458 27.7735 32.0363 27.7735 L 30.6715 27.7735 C 29.8619 27.7735 29.5844 28.0048 29.5844 28.8144 L 29.5844 30.1791 C 29.5844 30.9887 29.8619 31.2200 30.6715 31.2200 Z M 37.2407 31.2200 L 38.6054 31.2200 C 39.4150 31.2200 39.6694 30.9887 39.6694 30.1791 L 39.6694 28.8144 C 39.6694 28.0048 39.4150 27.7735 38.6054 27.7735 L 37.2407 27.7735 C 36.4311 27.7735 36.1535 28.0048 36.1535 28.8144 L 36.1535 30.1791 C 36.1535 30.9887 36.4311 31.2200 37.2407 31.2200 Z M 43.8099 31.2200 L 45.1746 31.2200 C 45.9841 31.2200 46.2385 30.9887 46.2385 30.1791 L 46.2385 28.8144 C 46.2385 28.0048 45.9841 27.7735 45.1746 27.7735 L 43.8099 27.7735 C 43.0003 27.7735 42.7227 28.0048 42.7227 28.8144 L 42.7227 30.1791 C 42.7227 30.9887 43.0003 31.2200 43.8099 31.2200 Z M 11.7505 51.7140 C 18.1346 51.7140 23.5010 46.3939 23.5010 39.9635 C 23.5010 33.5331 18.2040 28.2130 11.7505 28.2130 C 5.3201 28.2130 0 33.5331 0 39.9635 C 0 46.4401 5.3201 51.7140 11.7505 51.7140 Z M 11.7736 47.5967 C 10.9640 47.5967 10.2470 47.0415 10.2470 46.1857 L 10.2470 41.3745 L 5.8290 41.3745 C 5.0425 41.3745 4.3948 40.7268 4.3948 39.9635 C 4.3948 39.2002 5.0425 38.5525 5.8290 38.5525 L 10.2470 38.5525 L 10.2470 33.7644 C 10.2470 32.8854 10.9640 32.3303 11.7736 32.3303 C 12.5601 32.3303 13.2771 32.8854 13.2771 33.7644 L 13.2771 38.5525 L 17.6951 38.5525 C 18.4816 38.5525 19.1061 39.2002 19.1061 39.9635 C 19.1061 40.7268 18.4816 41.3745 17.6951 41.3745 L 13.2771 41.3745 L 13.2771 46.1857 C 13.2771 47.0415 12.5601 47.5967 11.7736 47.5967 Z M 30.6715 38.8070 L 32.0363 38.8070 C 32.8458 38.8070 33.1003 38.5525 33.1003 37.7429 L 33.1003 36.3782 C 33.1003 35.5686 32.8458 35.3373 32.0363 35.3373 L 30.6715 35.3373 C 29.8619 35.3373 29.5844 35.5686 29.5844 36.3782 L 29.5844 37.7429 C 29.5844 38.5525 29.8619 38.8070 30.6715 38.8070 Z M 37.2407 38.8070 L 38.6054 38.8070 C 39.4150 38.8070 39.6694 38.5525 39.6694 37.7429 L 39.6694 36.3782 C 39.6694 35.5686 39.4150 35.3373 38.6054 35.3373 L 37.2407 35.3373 C 36.4311 35.3373 36.1535 35.5686 36.1535 36.3782 L 36.1535 37.7429 C 36.1535 38.5525 36.4311 38.8070 37.2407 38.8070 Z" />
                                        </svg>
                                    {{ $planning->dayWeek() }}
                                </h2>
                            </div>
                        </div>
                        <div class=" p-0">
                            @foreach ($planning->daily->sortBy('order') as $daily)
                                <div
                                    class="card card-side {{ $daily->type()['color'] }}
                                    text-gray-700 mx-0 mt-2
                                    dark:text-gray-200 dark:bg-base-100
                                    shadow-md p-0 text-xs rounded-md  ">
                                    <div class="hidden bg-yellow-400 dark:bg-yellow-400"></div>
                                    <div class="hidden bg-blue-400 dark:bg-blue-400"></div>
                                    <div class="hidden bg-green-400 dark:bg-green-400"></div>

                                    <div class="card-body p-2 pl-3 gap-0 text-xs rounded-md
                                    bg-white ml-1 mb-1">
                                        <h2 class="card-title text-md ">{{ $daily->discipline->title }} </h2>
                                        <p class="py-0 flex text-md items-center">
                                            <svg class="h-6 w-6 mr-1" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill="currentColor" fill-rule="evenodd"
                                                    d="M10 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8zm2.293-4.707a.997.997 0 01-.707-.293l-2.293-2.293A.997.997 0 019 10V6a1 1 0 112 0v3.586l2 2a.999.999 0 01-.707 1.707z" />
                                            </svg>
                                            <span class="text-md font-bold">
                                                {{ $daily->hours() }}
                                            </span>
                                        </p>
                                        <p class="py-0 flex text-md items-center">
                                            <svg class="h-6 w-6 mr-1" viewBox="0 0 32 32" version="1.1"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill="currentColor"
                                                    d="M30.639 26.361l-6.211-23.183c-0.384-1.398-1.644-2.408-3.139-2.408-0.299 0-0.589 0.040-0.864 0.116l0.023-0.005-2.896 0.776c-0.23 0.065-0.429 0.145-0.618 0.243l0.018-0.008c-0.594-0.698-1.472-1.14-2.453-1.143h-2.999c-0.76 0.003-1.457 0.27-2.006 0.713l0.006-0.005c-0.543-0.438-1.24-0.705-1.999-0.708h-3.001c-1.794 0.002-3.248 1.456-3.25 3.25v24c0.002 1.794 1.456 3.248 3.25 3.25h3c0.76-0.003 1.457-0.269 2.006-0.712l-0.006 0.005c0.543 0.438 1.24 0.704 1.999 0.708h2.999c1.794-0.002 3.248-1.456 3.25-3.25v-13.053l3.717 13.873c0.382 1.398 1.641 2.408 3.136 2.408 0.3 0 0.59-0.041 0.866-0.117l-0.023 0.005 2.898-0.775c1.398-0.386 2.407-1.646 2.407-3.141 0-0.298-0.040-0.587-0.115-0.862l0.005 0.023zM19.026 10.061l4.346-1.165 3.494 13.042-4.345 1.164zM18.199 4.072l2.895-0.775c0.056-0.015 0.121-0.023 0.188-0.023 0.346 0 0.639 0.231 0.731 0.547l0.001 0.005 0.712 2.656-4.346 1.165-0.632-2.357v-0.848c0.094-0.179 0.254-0.312 0.446-0.37l0.005-0.001zM11.5 3.25h2.998c0.412 0.006 0.744 0.338 0.75 0.749v2.75l-4.498 0.001v-2.75c0.006-0.412 0.338-0.744 0.749-0.75h0.001zM8.25 22.75h-4.5v-13.5l4.5-0.001zM10.75 9.25l4.498-0.001v13.501h-4.498zM4.5 3.25h3c0.412 0.006 0.744 0.338 0.75 0.749v2.75l-4.5 0.001v-2.75c0.006-0.412 0.338-0.744 0.749-0.75h0.001zM7.5 28.75h-3c-0.412-0.006-0.744-0.338-0.75-0.749v-2.751h4.5v2.75c-0.006 0.412-0.338 0.744-0.749 0.75h-0.001zM14.498 28.75h-2.998c-0.412-0.006-0.744-0.338-0.75-0.749v-2.751h4.498v2.75c-0.006 0.412-0.338 0.744-0.749 0.75h-0.001zM27.693 27.928l-2.896 0.775c-0.057 0.015-0.122 0.024-0.189 0.024-0.139 0-0.269-0.037-0.381-0.102l0.004 0.002c-0.171-0.099-0.298-0.259-0.35-0.45l-0.001-0.005-0.711-2.655 4.345-1.164 0.712 2.657c0.015 0.056 0.023 0.12 0.023 0.186 0 0.347-0.232 0.639-0.549 0.73l-0.005 0.001z">
                                                </path>
                                            </svg>
                                            <span class="text-md font-bold">
                                                {{ $daily->type()['type'] }}
                                            </span>
                                        </p>

                                        <div class="card-actions justify-end ">
                                            <div class="flex">
                                                <div class="tooltip tooltip-top p-0" data-tip="Inserir tarefas">
                                                    <button wire:click="showModalCreate({{$daily->discipline->id}},{{$daily->id}})"
                                                        title="Inserir tarefas"
                                                        class="flex py-1 px-2 rounded font-medium transition-colors
                                                    text-gray-700 dark:text-gray-300 dark:hover:bg-green-500 hover:bg-green-500 hover:shadow-lg
                                                    duration-200 hover:text-white whitespace-nowrap"> Inserir tarefas
                                                        <svg class="h-4 w-4 ml-2" viewBox="0 -1.5 20.412 20.412"
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
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            @if ($daily->tasks->count() > 0)
                                            <div class="py-3 px-1 dark:bg-gray-900">
                                                <div class="-mx-4  overflow-x-auto sm:-mx-6 lg:-mx-8">
                                                    <div class="inline-block min-w-full align-middle md:px-6 lg:px-8">
                                                        <div class="overflow-hidden dark:border-gray-700 ">
                                                            <table style="width:100%"
                                                                class='min-w-full divide-y divide-gray-200 dark:divide-gray-700'>
                                                                {{-- Table head --}}
                                                                <thead
                                                                    class="bg-gray-200 dark:bg-gray-800 text-gray-500 dark:text-gray-400 ">
                                                                    <tr>
                                                                        <th class="p-2.5">
                                                                            Assunto
                                                                        </th>
                                                                        <th>
                                                                            Incidência
                                                                        </th>
                                                                        <th>
                                                                            Rendimento (%)
                                                                        </th>
                                                                        <th>
                                                                            Status
                                                                        </th>
                                                                        <th>
                                                                            Ações
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                {{-- Table body --}}
                                                                <tbody
                                                                    class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700 ">
                                                                    @foreach ($daily->tasks as $task)
                                                                        <tr class=" py-4">
                                                                            <td scope="col"
                                                                                class="text-sm text-gray-700 text-justify w-4/12">
                                                                                @for ($i = 1; $i < $task->matter->order_level; $i++)
                                                                                    <span>&nbsp;</span>
                                                                                @endfor
                                                                                <span class="font-bold">
                                                                                </span>
                                                                                @if ($task->matter->order_level == 1)
                                                                                    <span class="font-bold">{{ $task->matter->order_title}}.
                                                                                        {{ $task->matter->title }}
                                                                                    </span>
                                                                                @else
                                                                                <span >{{ $task->matter->order_title}}.
                                                                                    {{ $task->matter->title }}
                                                                                </span>
                                                                                @endif

                                                                            </td>
                                                                            <td class="text-sm
                                                                                text-gray-700 text-center w-1/12">
                                                                                @if ($task->matter->level != '')
                                                                                <div class="hidden badge badge-info"></div>
                                                                                <div class="hidden badge badge-secondary"></div>
                                                                                <div class="hidden badge badge-warning"></div>
                                                                                <div class="hidden badge  badge-error"></div>
                                                                                <div class="hidden badge  badge-success"></div>
                                                                                    <div class="badge {{ $task->matter->level() }}">Nível {{ $task->matter->level }}</div>
                                                                                @endif
                                                                            </td>
                                                                            <td
                                                                                class="text-sm
                                                                            text-gray-700 text-center w-1/12">
                                                                                {{ $task->matter->performance }}
                                                                            </td>
                                                                            <td scope="col"
                                                                                class="text-xs text-gray-700 text-center w-4/12">
                                                                                @switch($daily->type()['type'])
                                                                                    @case('Teoria')
                                                                                    @if ($mentoringContestUser->statusMatter($task->matter->id,$mentoringContestUser->id))
                                                                                        <div class="tooltip tooltip-top p-0" data-tip="Clique para excluir">
                                                                                            <button
                                                                                                wire:click.prevent="deleteStatusMatter({{ $mentoringContestUser->statusMatter($task->matter->id,$mentoringContestUser->id) }})"
                                                                                                class="btn btn-success btn-xs">
                                                                                                Concluído
                                                                                            </button>
                                                                                        </div>
                                                                                        <button
                                                                                            wire:click.prevent="showReviews({{ $task->matter->id }})"
                                                                                            class="btn btn-outline {{ ($mentoringContestUser->reviews($task->matter->id, $mentoringContestUser->id)->count() > 0 ? 'btn-accent' : 'btn-error') }} btn-xs">
                                                                                            Revisões
                                                                                            <div class="badge {{ ($mentoringContestUser->reviews($task->matter->id, $mentoringContestUser->id)->count() > 0 ? 'badge-accent' : 'badge-error') }} text-white">
                                                                                                {{ $mentoringContestUser->reviews($task->matter->id, $mentoringContestUser->id)->count() }}
                                                                                            </div>
                                                                                        </button>
                                                                                    @else
                                                                                        <div class="tooltip tooltip-top p-0 " data-tip="Clique para concluir">
                                                                                            <button
                                                                                                wire:click.prevent="storeStatus({{ $task->matter->id}})"
                                                                                                class="btn btn-outline btn-error btn-xs">
                                                                                                Em andamento </span>
                                                                                            </button>
                                                                                        </div>
                                                                                    @endif
                                                                                        @break
                                                                                    @case('Questões')
                                                                                        <button
                                                                                            wire:click.prevent="showQuestions({{ $task->matter->id }})"
                                                                                            class="btn btn-outline btn-accent btn-xs">Questões
                                                                                        </button>
                                                                                        @break
                                                                                    @case('Revisão')
                                                                                        <button
                                                                                            wire:click.prevent="showReviews({{ $task->matter->id }})"
                                                                                            class="btn btn-outline {{ ($mentoringContestUser->reviews($task->matter->id, $mentoringContestUser->id)->count() > 0 ? 'btn-accent' : 'btn-error') }} btn-xs">
                                                                                            Revisões
                                                                                            <div class="badge {{ ($mentoringContestUser->reviews($task->matter->id, $mentoringContestUser->id)->count() > 0 ? 'badge-accent' : 'badge-error') }} text-white">
                                                                                                {{ $mentoringContestUser->reviews($task->matter->id, $mentoringContestUser->id)->count() }}
                                                                                            </div>
                                                                                        </button>
                                                                                        @break
                                                                                    @default

                                                                                @endswitch
                                                                            </td>
                                                                            <td scope="col"
                                                                            class="text-sm text-gray-700 text-center w-1/12">
                                                                                <div class="tooltip tooltip-top p-0" data-tip="Excluir">
                                                                                    <button title="Apagar" wire:click="showModal({{ $task->id }})"
                                                                                        class="py-2 px-3 rounded  font-medium transition-colors
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
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                            @endif

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
                            <label for="contest_matter_id"
                                class="block text-sm font-medium text-gray-900 dark:text-white">
                                Matéria
                            </label>
                            <select wire:model="contest_matter_id" required="" name="contest_matter_id"
                                id="contest_matter_id" placeholder="Matéria"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                    focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5
                                    dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                                    dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="">Selecione...</option>
                                @foreach ($matters as $item)
                                    <option title="{{ $item->title }}" value="{{ $item->id }}">
                                        {{ mb_strimwidth($item->order_title.'. '.$item->title, 0, 80, "...") }}
                                    </option>
                                @endforeach
                            </select>
                            @error('contest_matter_id')
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

         {{-- MODAL INVOLVED --}}
     <x-dialog-modal wire:model="showQuestionsModal" maxWidth='5xl'>
        <x-slot name="title">{{ $contentMatter ? $contentMatter->order_title . '. ' . $contentMatter->title : '' }}
        </x-slot>
        <x-slot name="content">
            @if ($contentMatter)
                @livewire('app.mentoring.mentoring-questions-user', ['matter' => $contentMatter, 'user' => $user_id, key($contentMatter->id)])
            @endif
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click.prevent="$toggle('showQuestionsModal')" class="mx-2">
                Fechar
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>

    {{-- MODAL CREATE --}}
    <x-dialog-modal wire:model="showReviewsModal" class="mt-0">
        <x-slot name="title">Inserir revisão</x-slot>
        <x-slot name="content">
            <form action="#" wire:submit.prevent="storeReview()" wire.loading.attr='disable'>
                <div class="grid gap-4 mb-1 sm:grid-cols-3 sm:gap-6 sm:mb-5">
                    <div class="col-span-2 " x-data x-init="Inputmask({
                        'mask': '99/99/9999'
                    }).mask($refs.day)">
                        <label for="day" class="block text-sm font-medium text-gray-900 dark:text-white">Data
                        </label>
                        <input type="text" x-ref="day" wire:model="day" name="day" id="day"
                            placeholder="Data" required=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @error('day')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-span-1 ">
                        <label for="day" class="block text-sm font-medium text-gray-900 dark:text-white">
                            &nbsp;
                        </label>
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
                </div>
            </form>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click.prevent="$toggle('showReviewsModal')" class="mx-2">
                Fechar
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
</div>
