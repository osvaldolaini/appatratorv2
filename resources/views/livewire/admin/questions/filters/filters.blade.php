<div class="w-100">
    <x-breadcrumb>
        <div class="grid grid-cols-8 gap-4 text-gray-600 ">
            <div class="col-span-6 justify-items-start">
                <h3 class="text-2xl font-bold tracki  dark:text-gray-50">
                    {{ mb_strtoupper($breadcrumb) }}
                </h3>
            </div>
        </div>
    </x-breadcrumb>
    <div class="bg-white dark:bg-gray-800 pt-3 sm:rounded-lg mx-3 ">
        <div class="grid grid-cols-3 gap-1 text-gray-600 ">
            <div class="stats bg-gray-300 text-blue-500 col-span-full sm:col-span-1 cursor-pointer">
                <a href="{{ route('occupationArea') }}">
                    <div class="stat ">
                        <div class="stat-figure ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                class="inline-block w-6 h-6 stroke-current">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                                </path>
                            </svg>
                        </div>
                        <div class="stat-title text-blue-500">Áreas de atuação</div>
                        <div class="stat-value text-blue-500">{{ $occupationArea }}</div>
                    </div>
                </a>
            </div>
            <div class="stats bg-gray-300 text-blue-500 col-span-full sm:col-span-1 cursor-pointer">
                <a href="{{ route('educationArea') }}">
                    <div class="stat ">
                        <div class="stat-figure ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                class="inline-block w-6 h-6 stroke-current">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                                </path>
                            </svg>
                        </div>
                        <div class="stat-title text-blue-500">Áreas de formação</div>
                        <div class="stat-value text-blue-500">{{ $educationArea }}</div>
                    </div>
                </a>
            </div>
            <div class="stats bg-gray-300 text-blue-500 col-span-full sm:col-span-1 cursor-pointer">
                <a href="{{ route('examiningBoard') }}">
                    <div class="stat ">
                        <div class="stat-figure ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                class="inline-block w-6 h-6 stroke-current">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                                </path>
                            </svg>
                        </div>
                        <div class="stat-title text-blue-500">Bancas</div>
                        <div class="stat-value text-blue-500">{{ $examiningBoard }}</div>
                    </div>
                </a>
            </div>
            <div class="stats bg-gray-300 text-blue-500 col-span-full sm:col-span-1 cursor-pointer">
                <a href="{{ route('office') }}">
                    <div class="stat ">
                        <div class="stat-figure ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                class="inline-block w-6 h-6 stroke-current">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                                </path>
                            </svg>
                        </div>
                        <div class="stat-title text-blue-500">Cargos</div>
                        <div class="stat-value text-blue-500">{{ $office }}</div>
                    </div>
                </a>
            </div>
            <div class="stats bg-gray-300 text-blue-500 col-span-full sm:col-span-1 cursor-pointer">
                <a href="{{ route('discipline') }}">
                    <div class="stat ">
                        <div class="stat-figure ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                class="inline-block w-6 h-6 stroke-current">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                                </path>
                            </svg>
                        </div>
                        <div class="stat-title text-blue-500">Disciplinas</div>
                        <div class="stat-value text-blue-500">{{ $discipline }}</div>
                    </div>
                </a>
            </div>
            <div class="stats bg-gray-300 text-blue-500 col-span-full sm:col-span-1 cursor-pointer">
                <a href="{{ route('institution') }}">
                    <div class="stat ">
                        <div class="stat-figure ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                class="inline-block w-6 h-6 stroke-current">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                                </path>
                            </svg>
                        </div>
                        <div class="stat-title text-blue-500">Instituições</div>
                        <div class="stat-value text-blue-500">{{ $institution }}</div>
                    </div>
                </a>
            </div>
            <div class="stats bg-gray-300 text-blue-500 col-span-full sm:col-span-1 cursor-pointer">
                <a href="{{ route('level') }}">
                    <div class="stat ">
                        <div class="stat-figure ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                class="inline-block w-6 h-6 stroke-current">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                                </path>
                            </svg>
                        </div>
                        <div class="stat-title text-blue-500">Níveis de formação</div>
                        <div class="stat-value text-blue-500">{{ $level }}</div>
                    </div>
                </a>
            </div>
            <div class="stats bg-gray-300 text-blue-500 col-span-full sm:col-span-1 cursor-pointer">
                <a href="{{ route('matter') }}">
                    <div class="stat ">
                        <div class="stat-figure ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                class="inline-block w-6 h-6 stroke-current">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                                </path>
                            </svg>
                        </div>
                        <div class="stat-title text-blue-500">Matérias</div>
                        <div class="stat-value text-blue-500">{{ $matter }}</div>
                    </div>
                </a>
            </div>
            <div class="stats bg-gray-300 text-blue-500 col-span-full sm:col-span-1 cursor-pointer">
                <a href="{{ route('modality') }}">
                    <div class="stat ">
                        <div class="stat-figure ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                class="inline-block w-6 h-6 stroke-current">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                                </path>
                            </svg>
                        </div>
                        <div class="stat-title text-blue-500">Modalidades</div>
                        <div class="stat-value text-blue-500">{{ $modality }}</div>
                    </div>
                </a>
            </div>
            <div class="stats bg-gray-300 text-blue-500 col-span-full sm:col-span-1 cursor-pointer">
                <a href="{{ route('subMatter') }}">
                    <div class="stat ">
                        <div class="stat-figure ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                class="inline-block w-6 h-6 stroke-current">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                                </path>
                            </svg>
                        </div>
                        <div class="stat-title text-blue-500">Sub itens das matérias</div>
                        <div class="stat-value text-blue-500">{{ $subMatter }}</div>
                    </div>
                </a>
            </div>

        </div>
    </div>

</div>
