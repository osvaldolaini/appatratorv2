<div>
    <div class="fixed drawer drawer-mobile lg:drawer-open">
        <input id="my-drawer-left" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content bg-white mb-54 max-h-screen overflow-auto">

            {{$slot}}
        </div>
        <div class="drawer-side">
          <label for="my-drawer-left" class="drawer-overlay"></label>
          <ul class="menu h-full  p-4 bg-fuchsia-400 dark:bg-fuchsia-900 w-36 sm:w-24">
            <li class="text-white dark:text-white sm:my-2" >
                <a href="{{ route('apps.essays') }}" class="mx-auto p-0">
                    <div class="tooltip tooltip-bottom p-0" data-tip="Estatísticas">
                        <svg class="h-16 w-16 sm:h-14 sm:w-14 mx-auto py-2 " viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 19L12 11" stroke="currentColor" stroke-width="4" stroke-linecap="round"/>
                            <path d="M7 19L7 15" stroke="currentColor" stroke-width="4" stroke-linecap="round"/>
                            <path d="M17 19V6" stroke="currentColor" stroke-width="4" stroke-linecap="round"/>
                        </svg>
                        <span class="block sm:hidden mx-auto mt-0 pt-0">Estatísticas</span>
                    </div>
                </a>
            </li>
            <li class="text-white dark:text-white sm:my-2" >
                <a href="{{ route('apps.essays.essay') }}" class="mx-auto p-0">
                    <div class="tooltip tooltip-bottom p-0" data-tip="Redações">
                        <svg class="h-16 w-16 sm:h-14 sm:w-14 mx-auto py-2 " viewBox="0 0 24 24" fill="currentColor"
                         id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"><defs>
                            <style>.cls-1{fill:none;stroke:#fff;stroke-miterlimit:10;stroke-width:1.91px;}
                                </style>
                            </defs><path class="cls-1" d="M5.32,14.86,3.41,17.73,1.5,14.86V3.41A1.9,1.9,0,0,1,3.41,1.5h0A1.91,1.91,0,0,1,5.32,3.41Z"/>
                            <path class="cls-1" d="M20.59,22.5H8.18a1.92,1.92,0,0,1-1.91-1.91V18.68H18.68v1.91A1.92,1.92,0,0,0,20.59,22.5Z"/>
                            <path class="cls-1" d="M22.5,1.5V20.59a1.91,1.91,0,0,1-3.82,0V18.68H10.09V1.5Z"/>
                            <line class="cls-1" x1="12.95" y1="6.27" x2="19.64" y2="6.27"/>
                            <line class="cls-1" x1="12.95" y1="10.09" x2="19.64" y2="10.09"/>
                            <line class="cls-1" x1="12.95" y1="13.91" x2="19.64" y2="13.91"/></svg>
                        <span class="block sm:hidden mx-auto mt-0 pt-0">Redações</span>
                    </div>
                </a>
            </li>
            <li class="text-white dark:text-white sm:my-2">
                <a href="{{ route('apps.dashboard') }}" class="mx-auto p-0">
                    <div class="tooltip tooltip-bottom p-0" data-tip="Aplicações">
                        <svg class="h-16 w-16 sm:h-14 sm:w-14 mx-auto py-2" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                            <rect x="3" y="3" width="7" height="7" rx="1" stroke="currentColor" stroke-width="2"/>
                            <rect x="3" y="14" width="7" height="7" rx="1" stroke="currentColor" stroke-width="2"/>
                            <rect x="14" y="3" width="7" height="7" rx="1" stroke="currentColor" stroke-width="2"/>
                            <rect x="13" y="13" width="3" height="3" rx="0.5" fill="currentColor"/>
                            <rect x="16" y="16" width="3" height="3" rx="0.5" fill="currentColor"/>
                            <rect x="19" y="13" width="3" height="3" rx="0.5" fill="currentColor"/>
                            <rect x="19" y="19" width="3" height="3" rx="0.5" fill="currentColor"/>
                            <rect x="13" y="19" width="3" height="3" rx="0.5" fill="currentColor"/>
                        </svg>
                        <span class="block sm:hidden mx-auto mt-0 pt-0">Aplicações</span>
                    </div>
                </a>
            </li>
            <li class="text-white dark:text-white sm:my-2">
                <div class="tooltip tooltip-bottom p-0" data-tip="Loja">
                    <svg class="h-16 w-16 sm:h-14 sm:w-14 mx-auto py-2" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 10.5V18.5M9 10.5H15M9 10.5H6M9 18.5H7.15402C6.75672 18.5 6.3971 18.2648 6.23786 17.9008L3.61286 11.9008C3.32381 11.2401 3.80786 10.5 4.52902 10.5H6M9 18.5H15M15 10.5V18.5M15 10.5H18M15 18.5H17.307C17.7238 18.5 18.097 18.2414 18.2433 17.8511L20.4933 11.8511C20.7385 11.1974 20.2552 10.5 19.557 10.5H18M6 10.5L11.3243 5.61941C11.7066 5.26895 12.2934 5.26895 12.6757 5.61941L18 10.5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    <span class="block sm:hidden mx-auto mt-0 pt-0">Loja</span>
                </div>
            </li>
            <li class="text-white dark:text-white sm:my-2">
                <a href="{{ url('/logout') }}" class="mx-auto p-0">
                    <div class="tooltip tooltip-bottom p-0" data-tip="Sair" >
                        <svg class="h-16 w-16 sm:h-14 sm:w-14 mx-auto py-2 " viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                            <path d="M14 7.63636L14 4.5C14 4.22386 13.7761 4 13.5 4L4.5 4C4.22386 4 4 4.22386 4 4.5L4 19.5C4 19.7761 4.22386 20 4.5 20L13.5 20C13.7761 20 14 19.7761 14 19.5L14 16.3636" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M10 12L21 12M21 12L18.0004 8.5M21 12L18 15.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span class="block sm:hidden mx-auto mt-0 pt-0">Sair</span>
                    </div>
                </a>
            </li>
          </ul>
        </div>
    </div>
</div>

