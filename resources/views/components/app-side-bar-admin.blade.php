<div class="">
    <div class="fixed drawer drawer-mobile lg:drawer-open">
        <input id="my-drawer-left" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content bg-white mx-4 sm:mx-0 max-h-screen overflow-auto">
            {{-- @livewire('menu.breadcrumb') --}}
            {{ $slot }}
        </div>
        <div class="drawer-side shadow-md bg-gray-200">
          <label for="my-drawer-left" class="drawer-overlay bg-white"></label>
          <ul class="menu h-full px-4 py-2 pt-24 sm:pt-2 bg-gray-200 dark:bg-gray-900 dark:text-gray-100 w-56 ">
            <nav class="text-sm font-medium text-gray-600 dark:bg-gray-900 dark:text-gray-100 pt-5" aria-label="Main Navigation">
                <x-new-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-new-nav-link>
                <div class="divider my-1 ">Usuários</div>
                <x-new-nav-link href="{{ route('users.list') }}" :active="request()->routeIs('users.list')">
                    {{ __('Listar') }}
                </x-new-nav-link>
                <div class="divider my-1">Voucher</div>
                <x-new-nav-link href="{{ route('voucher.list') }}" :active="request()->routeIs('voucher.list')">
                    {{ __('Vouchers') }}
                </x-new-nav-link>
                <x-new-nav-link href="{{ route('plan.list') }}" :active="request()->routeIs('plan.list')">
                    {{ __('Planos') }}
                </x-new-nav-link>
                <div class="divider my-1">Questões</div>
                <x-new-nav-link href="{{ route('questions.list') }}" :active="request()->routeIs('questions.*')">
                    {{ __('Questões') }}
                </x-new-nav-link>
                <details class="group [&_summary::-webkit-details-marker]:hidden">
                    <summary
                        class="{{ request()->routeIs(['*.index'])
                            ? 'flex items-center gap-2 border-l-[3px] border-blue-500
                                bg-blue-50 px-4 py-1 text-blue-700 dark:bg-blue-500/20 dark:text-blue-50'
                            : 'flex items-center gap-2 border-l-[3px]
                                border-transparent px-4 py-1 text-gray-500 hover:border-gray-100
                                hover:bg-gray-50 hover:text-gray-700 dark:text-gray-400 dark:hover:border-gray-700
                                dark:hover:bg-gray-800 dark:hover:text-gray-200' }} ">
                        <span class="text-sm font-medium"> Filtros </span>
                        <span class="shrink-0 transition duration-300 group-open:-rotate-180">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    </summary>

                    <nav aria-label="Users Nav" class="mt-1 flex flex-col pl-4 ">
                        <x-new-nav-link href="{{ route('occupationArea.index') }}" :active="request()->routeIs('occupationArea.index')">
                            {{ __('Áreas de atuação') }}
                        </x-new-nav-link>
                        <x-new-nav-link href="{{ route('educationArea.index') }}" :active="request()->routeIs('educationArea.index')">
                            {{ __('Áreas de formação') }}
                        </x-new-nav-link>
                        <x-new-nav-link href="{{ route('examiningBoard.index') }}" :active="request()->routeIs('examiningBoard.index')">
                            {{ __('Bancas') }}
                        </x-new-nav-link>
                        <x-new-nav-link href="{{ route('office.index') }}" :active="request()->routeIs('office.index')">
                            {{ __('Cargos') }}
                        </x-new-nav-link>
                        <x-new-nav-link href="{{ route('discipline.index') }}" :active="request()->routeIs('discipline.index')">
                            {{ __('Disciplinas') }}
                        </x-new-nav-link>
                        <x-new-nav-link href="{{ route('institution.index') }}" :active="request()->routeIs('institution.index')">
                            {{ __('Instituições') }}
                        </x-new-nav-link>
                        <x-new-nav-link href="{{ route('level.index') }}" :active="request()->routeIs('level.index')">
                            {{ __('Níveis de formação') }}
                        </x-new-nav-link>
                        <x-new-nav-link href="{{ route('matter.index') }}" :active="request()->routeIs('matter.index')">
                            {{ __('Matérias') }}
                        </x-new-nav-link>

                        <x-new-nav-link href="{{ route('modality.index') }}" :active="request()->routeIs('modality.index')">
                            {{ __('Modalidades') }}
                        </x-new-nav-link>
                        <x-new-nav-link href="{{ route('subMatter.index') }}" :active="request()->routeIs('subMatter.index')">
                            {{ __('Sub itens das matérias') }}
                        </x-new-nav-link>
                    </nav>
                </details>
                <div class="divider my-1">Mentoria</div>
                {{-- <x-new-nav-link href="{{ route('mentorings.list') }}" :active="request()->routeIs('mentorings.*')">
                    {{ __('Mentoria') }}
                </x-new-nav-link> --}}
                <x-new-nav-link href="{{ route('contests.list') }}" :active="request()->routeIs('contests.*')">
                    {{ __('Concursos') }}
                </x-new-nav-link>
                <div class="divider my-1">Redação</div>
                <x-new-nav-link href="{{ route('skills.list') }}" :active="request()->routeIs('skills.*')">
                    {{ __('Competências') }}
                </x-new-nav-link>
                <x-new-nav-link href="{{ route('essays.list') }}" :active="request()->routeIs('essays.*')">
                    {{ __('Concursos') }}
                </x-new-nav-link>
                <x-new-nav-link href="{{ route('topics.list') }}" :active="request()->routeIs('topics.*')">
                    {{ __('Temas') }}
                </x-new-nav-link>
                <div class="divider my-1 py-0">Treinamento</div>
                <x-new-nav-link href="{{ route('exercises.list') }}" :active="request()->routeIs('exercises.*')">
                    {{ __('Exercícios') }}
                </x-new-nav-link>
            </nav>
          </ul>
        </div>
    </div>
</div>

