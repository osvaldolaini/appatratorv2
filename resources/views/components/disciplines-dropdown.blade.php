@props(['mentoringContestUser'])
<div>
    @foreach ($mentoringContestUser->contest->discipline as $discipline)
    <button id="dropdownDelayButton" data-dropdown-toggle="dropdown"
        class="flex items-center justify-between w-full p-5
        font-medium text-left text-gray-500 border border-gray-200
        focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800
        dark:border-gray-700 dark:text-white hover:bg-gray-100
        dark:hover:bg-gray-800" type="button">
        <span >{{ $discipline->title }}
            <div class="hidden badge badge-md"></div>
            {!! $discipline->performances !!}
            <x-mentoring-app-status-bar :progress="$mentoringContestUser->progress($discipline)"></x-mentoring-app-status-bar>
        </span>
        <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="none" stroke="currentColor"
            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 13l-3 3m0 0l-3-3m3 3V8m0 13a9 9 0 110-18 9 9 0 010 18z"></path>
        </svg>
    </button>
    <!-- Dropdown menu -->
    <div id="dropdown" class="hidden bg-white divide-y divide-gray-100
       rounded-lg dark:bg-gray-700 w-100 ">
       <div >
        {{-- <x-mentoring-app-status-bar :progress="$mentoringContestUser->progress($discipline)"></x-mentoring-app-status-bar> --}}
        <div class="py-3 px-1 border border-gray-200 dark:border-gray-700 dark:bg-gray-900">
            @if ($discipline->contestMatter)
                <div class="-mx-4  overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden dark:border-gray-700 ">
                            <table style="width:100%"
                                class='min-w-full divide-y divide-gray-200 dark:divide-gray-700'>
                                {{-- Table head --}}
                                <thead
                                    class="bg-gray-200 dark:bg-gray-800 text-gray-500 dark:text-white ">
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
                                    @foreach ($discipline->contestMatter->sortBy('order') as $matter)
                                        <tr class=" py-4">
                                            <td scope="col"
                                                class="text-sm text-gray-700 text-left w-4/12">
                                                @for ($i = 1; $i < $matter->order_level; $i++)
                                                    <span>&nbsp;</span>
                                                @endfor
                                                <span class="font-bold">
                                                </span>
                                                @if ($matter->order_level == 1)
                                                    <span class="font-bold">{{ $matter->order_title}}.
                                                        {{ $matter->title }}
                                                    </span>
                                                @else
                                                <span >{{ $matter->order_title}}.
                                                    {{ $matter->title }}
                                                </span>
                                                @endif

                                            </td>
                                            <td class="text-sm
                                            text-gray-700 text-center w-1/12">
                                            @if ($matter->level != 0)
                                            <div class="hidden badge badge-info"></div>
                                            <div class="hidden badge badge-secondary"></div>
                                            <div class="hidden badge badge-warning"></div>
                                            <div class="hidden badge  badge-error"></div>
                                            <div class="hidden badge  badge-success"></div>
                                                <div class="badge {{ $matter->level() }}">Nível {{ $matter->level }}</div>
                                            @endif
                                        </td>
                                            <td
                                                class="text-sm
                                            text-gray-700 text-center w-2/12">
                                                {{ $matter->performance }}
                                            </td>
                                            <td scope="col"
                                                class="text-sm text-gray-700 text-center w-2/12">
                                                @if ($mentoringContestUser->statusMatter($matter->id,$mentoringContestUser->id))
                                                <div class="tooltip tooltip-top p-0" data-tip="Clique para excluir">
                                                    <button
                                                        wire:click.prevent="deleteStatusMatter({{ $mentoringContestUser->statusMatter($matter->id,$mentoringContestUser->id) }})"
                                                        class="btn btn-success btn-sm">
                                                        Concluído
                                                    </button>
                                                </div>
                                                @else
                                                    <div class="tooltip tooltip-top p-0 " data-tip="Clique para concluir">
                                                        <button
                                                            wire:click.prevent="storeStatus({{ $matter->id}})"
                                                            class="btn btn-outline btn-error btn-sm">
                                                            Em andamento <span class="loading loading-dots loading-sm"></span>
                                                        </button>
                                                    </div>
                                                @endif
                                            </td>
                                            <td class="text-sm p-2.5 text-center w-3/12">
                                                <button
                                                    wire:click.prevent="showReviews({{ $matter->id }})"
                                                    class="btn btn-outline {{ ($mentoringContestUser->reviews($matter->id, $mentoringContestUser->id)->count() > 0 ? 'btn-accent' : 'btn-error') }} btn-sm">
                                                    Revisões
                                                    <div class="badge {{ ($mentoringContestUser->reviews($matter->id, $mentoringContestUser->id)->count() > 0 ? 'badge-accent' : 'badge-error') }} text-white">
                                                        {{ $mentoringContestUser->reviews($matter->id, $mentoringContestUser->id)->count() }}
                                                    </div>
                                                </button>
                                                <button
                                                    wire:click.prevent="showQuestions({{ $matter->id }})"
                                                    class="btn btn-outline btn-accent btn-sm">Questões
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    </div>

    @endforeach

</div>
