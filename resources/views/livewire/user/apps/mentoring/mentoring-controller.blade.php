<div class="grid grid-cols-12 gap-2 mx-5 px-4 mt-2">
    <div class="col-span-12 sm:col-span-4">
        <div class="rounded-2xl dark:bg-gray-900 shadow-xl h-30 min-h-full">
            <div class="rounded-2xl p-4">
                <p class="mb-3">Olá, <span class="font-bold">{{ $name }}</span></p>
                <p class="mb-5 text-sm">Você concluíu <span class="font-bold text-xl">{{ $tconcluded }}%</span> do
                    edital.</p>
                <x-mentoring-app-status-bar :progress="$contestUser->progress()"></x-mentoring-app-status-bar>
            </div>
        </div>
    </div>
    <div class="col-span-12 sm:col-span-3 ">
        <div class="relative rounded-2xl dark:bg-gray-900 shadow-xl h-30 min-h-full">
            <div class="rounded-2xl p-4 flex flex-col">
                <p class="font-bold mb-3 text-center">Contagem Regressiva</p>
                <p class="text-sm">Faltam <span class="font-bold text-xl"> {{ $counter }} </span> dias.</p>
            </div>
            <div class="absolute bottom-8 right-10 h-10 w-10 flex items-center justify-center">
                <p class="text-center">
                    <svg class="h-16 w-16" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M12 2.75C6.89137 2.75 2.75 6.89137 2.75 12C2.75 17.1086 6.89137 21.25 12 21.25C17.1086 21.25 21.25 17.1086 21.25 12C21.25 6.89137 17.1086 2.75 12 2.75ZM1.25 12C1.25 6.06294 6.06294 1.25 12 1.25C17.9371 1.25 22.75 6.06294 22.75 12C22.75 17.9371 17.9371 22.75 12 22.75C6.06294 22.75 1.25 17.9371 1.25 12ZM12 7.25C12.4142 7.25 12.75 7.58579 12.75 8V11.6893L15.0303 13.9697C15.3232 14.2626 15.3232 14.7374 15.0303 15.0303C14.7374 15.3232 14.2626 15.3232 13.9697 15.0303L11.4697 12.5303C11.329 12.3897 11.25 12.1989 11.25 12V8C11.25 7.58579 11.5858 7.25 12 7.25Z" />
                    </svg>
                </p>
            </div>
        </div>
    </div>
    <div class="col-span-12 sm:col-span-2 ">
        <div class="rounded-2xl dark:bg-gray-900 shadow-xl h-30 min-h-full">
            <div class="rounded-2xl p-4 flex flex-col">
                <p class="font-bold text-center">Média (Nota)</p>
                <p class="text-sm text-center">Últimos 3</p>
                <p class="text-sm">Simulados: <span class="font-bold  text-xl"> {{ $simulateds }} </span></p>
                <p class="text-sm">Redações: <span class="font-bold  text-xl"> {{ $essays }} </span></p>
            </div>
        </div>
    </div>
    <div class="col-span-12 sm:col-span-3 ">
        <div class="relative rounded-2xl dark:bg-gray-900 shadow-xl h-30 min-h-full">
            <div class="rounded-2xl p-4 flex flex-col">
                <p class="font-bold text-center">Questões</p>
                <p class="text-xs"> Resolvidas: <span class="font-bold  text-lg"> {{ $questions['qtds'] }} </span></p>
                <p class="text-xs"> Acertos: <span class="font-bold  text-lg"> {{ $questions['hits'] }}</span></p>
                <p class="text-xs"> Erros: <span class="font-bold  text-lg"> {{ $questions['errors'] }}</span></p>
            </div>
            <div class="absolute bottom-8 right-10 h-10 w-10 flex items-center justify-center">
                <p class="text-center">
                    <svg class="h-16 w-16 mr-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 5H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2M8 5v0a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v0M8 5v0a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2v0" />
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m9 14 2 2 4-5" />
                    </svg>
                </p>
            </div>
        </div>
    </div>
    <div class="col-span-full ">
    @livewire('user.apps.mentoring.charts.controller.controller-score')
    </div>
</div>
