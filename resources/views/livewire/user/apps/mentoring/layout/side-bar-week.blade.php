<div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:flex">
    <div class="h-screen">
    <ul class="menu h-full pt-12 sm:pt-2 px-1 bg-black
                    text-gray-200 w-80 sm:w-56">
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
                        <x-mentoring-app-link active="app-de-mentoria/planejamento-da-semana"
                            href="{{ route('apps.contestPlanningWeekUser.user') }}">
                            <x-slot name="svg">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-8 w-8 opacity-100 group-hover:opacity-0" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M21 10H3M16 2V6M8 2V6M10.5 14L12 13V18M10.75 18H13.25M7.8 22H16.2C17.8802 22 18.7202 22 19.362 21.673C19.9265 21.3854 20.3854 20.9265 20.673 20.362C21 19.7202 21 18.8802 21 17.2V8.8C21 7.11984 21 6.27976 20.673 5.63803C20.3854 5.07354 19.9265 4.6146 19.362 4.32698C18.7202 4 17.8802 4 16.2 4H7.8C6.11984 4 5.27976 4 4.63803 4.32698C4.07354 4.6146 3.6146 5.07354 3.32698 5.63803C3 6.27976 3 7.11984 3 8.8V17.2C3 18.8802 3 19.7202 3.32698 20.362C3.6146 20.9265 4.07354 21.3854 4.63803 21.673C5.27976 22 6.11984 22 7.8 22Z" />
                                </svg>
                            </x-slot>
                            <x-slot name="title">Planejamento Semanal</x-slot>
                            <x-slot name="title_hover">Planejamento Semanal</x-slot>
                        </x-mentoring-app-link>
                    </li>
                    <li>
                        <x-mentoring-app-link active="app-de-mentoria/tarefas-diárias*"
                            href="{{ route('apps.contestPlanningTasksUser.user') }}">
                            <x-slot name="svg">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-8 w-8 opacity-100 group-hover:opacity-0" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M21 11.5V8.8C21 7.11984 21 6.27976 20.673 5.63803C20.3854 5.07354 19.9265 4.6146 19.362 4.32698C18.7202 4 17.8802 4 16.2 4H7.8C6.11984 4 5.27976 4 4.63803 4.32698C4.07354 4.6146 3.6146 5.07354 3.32698 5.63803C3 6.27976 3 7.11984 3 8.8V17.2C3 18.8802 3 19.7202 3.32698 20.362C3.6146 20.9265 4.07354 21.3854 4.63803 21.673C5.27976 22 6.11984 22 7.8 22H12.5M21 10H3M16 2V6M8 2V6M18 21V15M15 18H21"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </x-slot>
                            <x-slot name="title">Tarefas Diárias</x-slot>
                            <x-slot name="title_hover">Tarefas Diárias</x-slot>
                        </x-mentoring-app-link>
                    </li>
                    <li>
                        <x-mentoring-app-link active="app-de-mentoria/meu-planejamento*"
                            href="{{ route('apps.contestPlanningUser.user') }}">
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
                                    class="h-8 w-8 opacity-100 group-hover:opacity-0" viewBox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
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
