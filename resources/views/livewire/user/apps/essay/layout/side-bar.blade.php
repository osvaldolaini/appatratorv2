<div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:flex">
    <div class="flex flex-col  mt-0 sm:mt-4 sm:ml-3">
        <!-- Navigation Rail -->
        <div class="relative min-h-80 lg:block w-64 mb-20 ">
            <div class="min-h-80 bg-white rounded-2xl dark:bg-gray-700 py-2">
                <nav class="mt-3">
                    <div>

                        <span
                            class="text-gray-600
                                flex items-center justify-start w-full px-4 py-0 my-0 mb-1
                                text-sm transition-colors duration-200 font-bold">
                            App de Redações
                        </span>
                        <div class="flex mx-2 items-center pt-1 flex-nowrap border-t border-gray-200"></div>
                        <div class="py-1">
                            <x-link-simple url="dashboard" active="*lobby*">
                                <span class="text-left">
                                    <svg class="w-6 h-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.5 2A1.5 1.5 0 004 3.5V4h12v-.5A1.5 1.5 0 0014.5 2h-9zM2 7.5A1.5 1.5 0 013.5 6h13A1.5 1.5 0 0118 7.5V8H2v-.5zm-1 4A1.5 1.5 0 012.5 10h15a1.5 1.5 0 011.5 1.5v7a1.5 1.5 0 01-1.5 1.5h-15A1.5 1.5 0 011 18.5v-7z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                <span class="mx-4 text-sm font-normal">
                                    Lobby
                                </span>
                            </x-link-simple>
                        </div>
                        <div class="py-1">
                            <x-link-simple url="vouchers" active="*vouchers*">
                                <span class="text-left">
                                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12 16H12.01M12 12H12.01M12 8H12.01M21 14V17C21 18.1046 20.1046 19 19 19H5C3.89543 19 3 18.1046 3 17V14C4.10457 14 5 13.1046 5 12C5 10.8954 4.10457 10 3 10V7C3 5.89543 3.89543 5 5 5H19C20.1046 5 21 5.89543 21 7V10C19.8954 10 19 10.8954 19 12C19 13.1046 19.8954 14 21 14Z"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </span>
                                <span class="mx-4 text-sm font-normal">
                                    Meus Vouchers
                                </span>
                            </x-link-simple>
                        </div>
                        <div class="py-1">
                            <x-link-simple url="apps.user-essay" active="*minhas-redações*">
                                <span class="text-left">
                                    <svg class="w-6 h-6" viewBox="0 0 60 60" enable-background="new 0 0 60 60"
                                        xml:space="preserve">
                                        <g>

                                            <rect x="5.667" y="1.333" fill="#CCCCCC" stroke="#555555" stroke-width="3"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                width="36.481" height="47.854" />

                                            <rect x="15.967" y="10.689" fill="#FFFFFF" stroke="#555555" stroke-width="3"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                width="36.481" height="47.854" />
                                            <g>

                                                <line fill="#555555" stroke="#CCCCCC" stroke-width="3"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-miterlimit="10" x1="25.839" y1="21.764" x2="42.577"
                                                    y2="21.764" />

                                                <line fill="#555555" stroke="#CCCCCC" stroke-width="3"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-miterlimit="10" x1="25.839" y1="30.332" x2="42.577"
                                                    y2="30.332" />

                                                <line fill="#555555" stroke="#CCCCCC" stroke-width="3"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-miterlimit="10" x1="25.839" y1="38.901" x2="42.577"
                                                    y2="38.901" />

                                                <line fill="#555555" stroke="#CCCCCC" stroke-width="3"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-miterlimit="10" x1="25.839" y1="47.469" x2="42.577"
                                                    y2="47.469" />
                                            </g>
                                        </g>
                                    </svg>
                                </span>
                                <span class="mx-4 text-sm font-normal">
                                    Minhas redações
                                </span>
                            </x-link-simple>
                        </div>
                        <div class="py-1">
                            <x-link-simple url="apps.proposal-topics" active="*temas-propostos*">
                                <span class="text-left">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"
                                        enable-background="new 0 0 24 24" xml:space="preserve">
                                        <g id="news-aggregation">
                                            <rect x="9" y="4" width="11" height="2" />
                                            <rect x="9" y="8" width="7" height="2" />
                                            <path
                                                d="M4,19h6v-2H6.662C6.878,16.545,7,16.037,7,15.5V2h15v13.5c0,0.827-0.673,1.5-1.5,1.5H18v2h2.5c1.93,0,3.5-1.57,3.5-3.5V0H5
                                                    v4H0v11.5C0,17.43,1.57,19,3.5,19 M5,15.5C5,16.327,4.327,17,3.5,17S2,16.327,2,15.5V6h3V15.5z" />
                                            <path d="M15,16h2.5L14,11l-3.5,5H13c0,2.479-2.586,6-5,6H6v2h2c2.416,0,4.731-2.025,6-4.411C15.269,21.975,17.584,24,20,24h2v-2h-2
                                                    C17.586,22,15,18.479,15,16z" />
                                        </g>
                                    </svg>
                                </span>
                                <span class="mx-4 text-sm font-normal">
                                    Temas propostos
                                </span>
                            </x-link-simple>

                        </div>
                        <a href="{{ url('/user/profile') }}"
                            class="flex items-center justify-start w-full px-4 py-2 my-1
                            font-thin uppercase transition-colors duration-200
                            {{ Request::is('*profile*')
                                ? 'bg-gradient-to-r from-white to-blue-100
                                                                                                                                                                                                                                                                                                                                                                                dark:from-gray-700 dark:to-gray-800 text-blue-500 border-r-4 border-blue-500'
                                : 'dark:text-gray-200 hover:text-blue-500 text-gray-500' }} sm:hidden">
                            <span class="text-left">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M1 3.5A1.5 1.5 0 012.5 2h15A1.5 1.5 0 0119 3.5v2A1.5 1.5 0 0117.5 7h-15A1.5 1.5 0 011 5.5v-2zm3.5 1a1 1 0 11-2 0 1 1 0 012 0zM1 9.5A1.5 1.5 0 012.5 8h6.073a1.5 1.5 0 011.342 2.17l-1 2a1.5 1.5 0 01-1.342.83H2.5A1.5 1.5 0 011 11.5v-2zm3.5 1a1 1 0 11-2 0 1 1 0 012 0zM1 15.5A1.5 1.5 0 012.5 14h5.27a1.5 1.5 0 011.471 1.206l.4 2A1.5 1.5 0 018.171 19H2.5A1.5 1.5 0 011 17.5v-2zm3.5 1a1 1 0 11-2 0 1 1 0 012 0zM12.159 13.059l-.682-.429a.987.987 0 01-.452-.611.946.946 0 01.134-.742.983.983 0 01.639-.425 1.023 1.023 0 01.758.15l.682.427c.369-.31.8-.54 1.267-.676V9.97c0-.258.104-.504.291-.686.187-.182.44-.284.704-.284.264 0 .517.102.704.284a.957.957 0 01.291.686v.783c.472.138.903.37 1.267.676l.682-.429a1.02 1.02 0 01.735-.107c.25.058.467.208.606.419.14.21.19.465.141.71a.97.97 0 01-.403.608l-.682.429a3.296 3.296 0 010 1.882l.682.43a.987.987 0 01.452.611.946.946 0 01-.134.742.982.982 0 01-.639.425 1.02 1.02 0 01-.758-.15l-.682-.428c-.369.31-.8.54-1.267.676v.783a.957.957 0 01-.291.686A1.01 1.01 0 0115.5 19a1.01 1.01 0 01-.704-.284.957.957 0 01-.291-.686v-.783a3.503 3.503 0 01-1.267-.676l-.682.429a1.02 1.02 0 01-.75.132.999.999 0 01-.627-.421.949.949 0 01-.135-.73.97.97 0 01.434-.61l.68-.43a3.296 3.296 0 010-1.882zm3.341-.507c-.82 0-1.487.65-1.487 1.449s.667 1.448 1.487 1.448c.82 0 1.487-.65 1.487-1.448 0-.8-.667-1.45-1.487-1.45z" />
                                </svg>
                            </span>
                            <span class="mx-4 text-sm font-normal">
                                Perfil
                            </span>
                        </a>

                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <a href="{{ route('logout') }}"
                                class="flex items-center justify-start w-full px-4 py-2 my-1
                            font-thin uppercase transition-colors duration-200
                            {{ Request::is('profile*')
                                ? 'bg-gradient-to-r from-white to-blue-100
                                                                                                                                                                                                                                                                                                                                                                                                                                    dark:from-gray-700 dark:to-gray-800 text-blue-500 border-r-4 border-blue-500'
                                : 'dark:text-gray-200 hover:text-blue-500 text-gray-500' }}
                            sm:hidden">
                                <span class="text-left">
                                    <svg class="w-6 h-6 " viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M14 7.63636L14 4.5C14 4.22386 13.7761 4 13.5 4L4.5 4C4.22386 4 4 4.22386 4 4.5L4 19.5C4 19.7761 4.22386 20 4.5 20L13.5 20C13.7761 20 14 19.7761 14 19.5L14 16.3636"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M10 12L21 12M21 12L18.0004 8.5M21 12L18 15.5" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                                <span class="mx-4 text-sm font-normal">
                                    {{ __('Log Out') }}
                                </span>
                            </a>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </div>

</div>
