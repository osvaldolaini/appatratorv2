<div>
    <!-- component -->
    <div class="w-full h-screen lg:hidden text-gray-600 dark:text-gray-100 text-gray-500bg-gray-100 dark:bg-gray-700">
        <!-- <section id="bottom-navigation" class="md:hidden block fixed inset-x-0 bottom-0 z-10 bg-white shadow"> // if shown only tablet/mobile-->
        <section id="bottom-navigation" class="block fixed inset-x-0 bottom-0 z-10 bg-white shadow">
            <div id="tabs" class="flex justify-between">
                <a href="{{ route('lobby') }}" class="w-full justify-center inline-block text-center pt-2 pb-1">
                    <svg width="25" height="25" viewBox="0 0 42 42" class="inline-block mb-1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <path
                                d="M21.0847458,3.38674884 C17.8305085,7.08474576 17.8305085,10.7827427 21.0847458,14.4807396 C24.3389831,18.1787365 24.3389831,22.5701079 21.0847458,27.6548536 L21.0847458,42 L8.06779661,41.3066256 L6,38.5331279 L6,26.2681048 L6,17.2542373 L8.88135593,12.4006163 L21.0847458,2 L21.0847458,3.38674884 Z"
                                fill="currentColor" fill-opacity="0.1"></path>
                            <path
                                d="M11,8 L33,8 L11,8 Z M39,17 L39,36 C39,39.3137085 36.3137085,42 33,42 L11,42 C7.6862915,42 5,39.3137085 5,36 L5,17 L7,17 L7,36 C7,38.209139 8.790861,40 11,40 L33,40 C35.209139,40 37,38.209139 37,36 L37,17 L39,17 Z"
                                fill="currentColor"></path>
                            <path
                                d="M22,27 C25.3137085,27 28,29.6862915 28,33 L28,41 L16,41 L16,33 C16,29.6862915 18.6862915,27 22,27 Z"
                                fill="currentColor" stroke-width="2" fill="currentColor" fill-opacity="0.1"></path>
                            <rect fill="currentColor"
                                transform="translate(32.000000, 11.313708) scale(-1, 1) rotate(-45.000000) translate(-32.000000, -11.313708) "
                                x="17" y="10.3137085" width="30" height="2" rx="1"></rect>
                            <rect fill="currentColor"
                                transform="translate(12.000000, 11.313708) rotate(-45.000000) translate(-12.000000, -11.313708) "
                                x="-3" y="10.3137085" width="30" height="2" rx="1"></rect>
                        </g>
                    </svg>
                    <span class="tab tab-home block text-xs">Home</span>
                </a>

                <label
                    class="w-full justify-center inline-block text-center pt-2 pb-1">
                    <svg width="25" height="25" viewBox="0 0 16 16" class="inline-block mb-1" xmlns="http://www.w3.org/2000/svg">
                        <path fill="currentColor"
                            d="m13.58 11.6-1.33-2.18V6.33A4.36 4.36 0 0 0 10 2.26a2.45 2.45 0 0 0 0-.38A1.94 1.94 0 0 0 8 0a1.94 1.94 0 0 0-2 1.88 1.64 1.64 0 0 0 0 .38 4.36 4.36 0 0 0-2.25 4.07v3.09L2.42 11.6a1.25 1.25 0 0 0 1.06 1.9h1.77A2.68 2.68 0 0 0 8 16a2.68 2.68 0 0 0 2.75-2.5h1.77a1.25 1.25 0 0 0 1.06-1.9zM7.25 1.88A.7.7 0 0 1 8 1.25a.7.7 0 0 1 .75.63 6 6 0 0 0-.75 0 5.9 5.9 0 0 0-.75 0zM8 14.75a1.44 1.44 0 0 1-1.5-1.25h3A1.44 1.44 0 0 1 8 14.75zm-4.52-2.5 1.34-2.17.18-.31V6.33a4 4 0 0 1 .6-2.12A2.68 2.68 0 0 1 8 3.12a2.68 2.68 0 0 1 2.4 1.09 4 4 0 0 1 .6 2.12v3.44l.18.31 1.34 2.17z" />
                    </svg>
                    <span class="tab tab-explore block text-xs">Notificações</span>
                </label>
                <label
                    class="w-full justify-center inline-block text-center pt-2 pb-1">
                    <a href="{{ route('lobby') }}" >
                        <svg width="25" height="25" viewBox="0 0 24 24" fill="none"  class="inline-block mb-1" xmlns="http://www.w3.org/2000/svg">
                            <rect x="3" y="3" width="7" height="7" rx="1"
                                fill="currentColor" stroke-width="2" />
                            <rect x="3" y="14" width="7" height="7" rx="1"
                                fill="currentColor" stroke-width="2" />
                            <rect x="14" y="3" width="7" height="7" rx="1"
                                fill="currentColor" stroke-width="2" />
                            <rect x="13" y="13" width="3" height="3" rx="0.5"
                                fill="currentColor" />
                            <rect x="16" y="16" width="3" height="3" rx="0.5"
                                fill="currentColor" />
                            <rect x="19" y="13" width="3" height="3" rx="0.5"
                                fill="currentColor" />
                            <rect x="19" y="19" width="3" height="3" rx="0.5"
                                fill="currentColor" />
                            <rect x="13" y="19" width="3" height="3" rx="0.5"
                                fill="currentColor" />
                        </svg>
                        <span class="tab tab-account block text-xs">Apps</span>
                    </a>
                </label>
            </div>
        </section>
    </div>
</div>
