<div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:flex">
<div class="h-screen">
    <ul class="menu w-80 h-full pt-2 px-1 bg-black
                    text-gray-200 sm:w-56">
        <div class="flex h-100 w-100 flex-col justify-start ">
            <div class="w-full mx-auto mb-2">
                <picture class="h-10 sm:h-10 mx-auto">
                    <source srcset="{{ url('storage/logos/controle-mestre.png') }}" />
                    <source srcset="{{ url('storage/logos/controle-mestre.webp') }}" />
                    <img class="h-10 sm:h-10 mr-3" src="{{ url('storage/logos/controle-mestre.png') }}"
                        alt="atrator-apps-logo-controle-mestre ">
                </picture>
            </div>
            <div class="pr-3">
                <ul>
                    <li>
                        <x-mentoring-app-link active="app-de-mentoria" href="{{ route('apps.mentorings') }}">
                            <x-slot name="svg">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-8 w-8 opacity-100 group-hover:opacity-0" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </x-slot>
                            <x-slot name="title">Quadro Geral</x-slot>
                            <x-slot name="title_hover">Quadro Geral</x-slot>
                        </x-mentoring-app-link>
                    </li>
                    <li class="pt-2 border-t border-gray-100">
                        <x-mentoring-app-link active="app-de-mentoria/ciclo"
                            href="{{ route('apps.contestControllerCycleUser.user') }}">
                            <x-slot name="svg">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-8 w-8 opacity-100 group-hover:opacity-0" fill="currentColor"
                                    viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g id="Layer_1" />
                                    <g id="Layer_2">
                                        <g>
                                            <g>
                                                <path
                                                    d="M433.64,257.72c0-63.46-34.22-122.53-89.31-154.15c-7.66-4.4-17.44-1.76-21.84,5.91     c-4.4,7.66-1.75,17.44,5.91,21.84c45.18,25.94,73.24,74.37,73.24,126.4c0,76.89-59.9,140.05-135.48,145.28l26.54-26.54     c6.25-6.25,6.25-16.38,0-22.63c-6.25-6.25-16.38-6.25-22.63,0l-50.77,50.77c-3,3-4.69,7.07-4.69,11.31s1.69,8.31,4.69,11.31     L270.07,478c3.12,3.12,7.22,4.69,11.31,4.69s8.19-1.56,11.31-4.69c6.25-6.25,6.25-16.38,0-22.63l-20.74-20.74     C362.46,426.54,433.64,350.29,433.64,257.72z" />
                                            </g>
                                            <g>
                                                <path
                                                    d="M219.3,158.16c3.12,3.12,7.22,4.69,11.31,4.69c4.09,0,8.19-1.56,11.31-4.69l50.77-50.77     c3-3,4.69-7.07,4.69-11.31s-1.69-8.31-4.69-11.31L241.93,34c-6.25-6.25-16.38-6.25-22.63,0c-6.25,6.25-6.25,16.38,0,22.63     l23.92,23.92c-92.01,6.57-164.86,83.52-164.86,177.18c0,63.5,34.25,122.59,89.4,154.21c2.51,1.44,5.25,2.12,7.94,2.12     c5.55,0,10.94-2.89,13.89-8.04c4.4-7.67,1.74-17.44-5.92-21.84c-45.22-25.93-73.31-74.38-73.31-126.45     c0-75.61,57.92-137.95,131.73-144.97l-22.79,22.79C213.05,141.78,213.05,151.91,219.3,158.16z" />
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </x-slot>
                            <x-slot name="title">Ciclo</x-slot>
                            <x-slot name="title_hover">Ciclo</x-slot>
                        </x-mentoring-app-link>
                    </li>
                    <li>
                        <x-mentoring-app-link active="app-de-mentoria/planejamento-por-ciclo"
                            href="{{ route('apps.contestPlanningCyclesUser.user') }}">
                            <x-slot name="svg">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-8 w-8 opacity-100 group-hover:opacity-0" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M21 12a9 9 0 1 0-9 9m0-14v3.764a2 2 0 0 0 1.106 1.789L16 14m3 2v3m0 3v-3m0 0h-3m3 0h3" />
                                </svg>
                            </x-slot>
                            <x-slot name="title">Meu planejamento</x-slot>
                            <x-slot name="title_hover">Meu planejamento</x-slot>
                        </x-mentoring-app-link>
                    </li>
                    <li>
                        <x-mentoring-app-link active="meu-concurso" href="{{ route('apps.contest.user') }}">
                            <x-slot name="svg">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-8 w-8 opacity-100 group-hover:opacity-0" viewBox="0 0 24 24"
                                    fill='none'>
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M7 8h5m3 0h2m0 4h-6m-3 0H7m0 4h5m3 0h2M3 8V6a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8z" />
                                </svg>
                            </x-slot>
                            <x-slot name="title">Plano de Estudo</x-slot>
                            <x-slot name="title_hover">Plano de Estudo</x-slot>
                        </x-mentoring-app-link>
                    </li>
                    <li>
                        <x-mentoring-app-link active="app-de-mentoria/questões"
                            href="{{ route('apps.contestQuestionsChart.user') }}">
                            <x-slot name="svg">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-8 w-8 opacity-100 group-hover:opacity-0" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 8h2m-2 4h2m-5 4H7m14-4V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h7M7 8v4h4V8H7z" />
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M19.268 19.268a2.5 2.5 0 1 0-3.536-3.536 2.5 2.5 0 0 0 3.536 3.536zm0 0L21 21" />
                                </svg>
                            </x-slot>
                            <x-slot name="title">Questões</x-slot>
                            <x-slot name="title_hover">Questões</x-slot>
                        </x-mentoring-app-link>
                    </li>
                    <li>
                        <x-mentoring-app-link active="app-de-mentoria/revisões"
                            href="{{ route('apps.contestReviews.user') }}">
                            <x-slot name="svg">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-8 w-8 opacity-100 group-hover:opacity-0" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M8 5H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2M8 5v0a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v0M8 5v0a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2v0" />
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m9 14 2 2 4-5" />
                                </svg>
                            </x-slot>
                            <x-slot name="title">Revisões</x-slot>
                            <x-slot name="title_hover">Revisões</x-slot>
                        </x-mentoring-app-link>
                    </li>
                    <li>
                        <x-mentoring-app-link active="app-de-mentoria/simulados"
                            href="{{ route('apps.contestSimulateds.user') }}">
                            <x-slot name="svg">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-8 w-8 opacity-100 group-hover:opacity-0" viewBox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M8 5H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2M8 5v0a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v0M8 5v0a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2v0" />
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m9 14 2 2 4-5" />
                                </svg>
                            </x-slot>
                            <x-slot name="title">Simulados</x-slot>
                            <x-slot name="title_hover">Simulados</x-slot>
                        </x-mentoring-app-link>
                    </li>
                    <li>
                        <x-mentoring-app-link active="app-de-mentoria/redações"
                            href="{{ route('apps.contestEssays.user') }}">
                            <x-slot name="svg">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-8 w-8 opacity-100 group-hover:opacity-0" viewBox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M8 5H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2M8 5v0a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v0M8 5v0a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2v0" />
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m9 14 2 2 4-5" />
                                </svg>
                            </x-slot>
                            <x-slot name="title">Redações</x-slot>
                            <x-slot name="title_hover">Redações</x-slot>
                        </x-mentoring-app-link>
                    </li>
                </ul>
            </div>
        </div>
    </ul>
</div>
</div>
