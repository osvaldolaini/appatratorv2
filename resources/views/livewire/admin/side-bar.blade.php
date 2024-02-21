<div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:flex">
    <div class="flex flex-col h-full mt-0 sm:mt-4 sm:ml-3">
        <!-- Navigation Rail -->
        <div class="relative h-screen lg:block w-64 pb-3 ">
            <div class="h-full bg-white rounded-2xl dark:bg-gray-700 py-2">
                <nav class="mt-3">
                    <div>
                        <x-link-simple url="dashboard" active="*painel*" role='1' :pages="$pages">
                            <span class="text-left">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 2048 1792"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1070 1178l306-564h-654l-306 564h654zm722-282q0 182-71 348t-191 286-286 191-348 71-348-71-286-191-191-286-71-348 71-348 191-286 286-191 348-71 348 71 286 191 191 286 71 348z">
                                    </path>
                                </svg>
                            </span>
                            <span class="mx-4 text-sm font-normal">
                                Dashboard
                            </span>
                        </x-link-simple>
                        <x-link-simple url="list-users" active="*usuários*" role='2' :pages="$pages">
                            <span class="text-left">
                                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13 20V18C13 15.2386 10.7614 13 8 13C5.23858 13 3 15.2386 3 18V20H13ZM13 20H21V19C21 16.0545 18.7614 14 16 14C14.5867 14 13.3103 14.6255 12.4009 15.6311M11 7C11 8.65685 9.65685 10 8 10C6.34315 10 5 8.65685 5 7C5 5.34315 6.34315 4 8 4C9.65685 4 11 5.34315 11 7ZM18 9C18 10.1046 17.1046 11 16 11C14.8954 11 14 10.1046 14 9C14 7.89543 14.8954 7 16 7C17.1046 7 18 7.89543 18 9Z"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </span>
                            <span class="mx-4 text-sm font-normal">
                                Usuários
                            </span>
                        </x-link-simple>
                        @if (in_array(3, $pages) == true)
                        <div class="flex mx-2 items-center py-0.5 flex-nowrap border-t border-gray-200"></div>
                            <!-- Dropdown Cadastros -->
                            <button id="dropdownRegister" data-dropdown-toggle="register"
                            class="flex items-center justify-start w-full px-4 py-1
                            font-thin uppercase transition-colors duration-200 mb-0
                            {{ Request::is('*cadastros*')
                                ? ' bg-gradient-to-r from-white to-blue-100                                                                                                  dark:from-gray-700 dark:to-gray-200 text-blue-500 border-r-4 border-blue-500'
                            : 'dark:text-gray-200 hover:text-blue-500 text-gray-500' }}"
                            type="button">
                            <span class="text-left">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 487 487" xml:space="preserve">
                                    <g>
                                        <g>
                                            <path  d="M171.984,255.096c26.698,11.924,68.619,14.04,68.619,14.04c0.937,0.021,1.854,0.025,2.774,0.03
                                                v0.003c0.041,0,0.082-0.001,0.123-0.001s0.084,0.001,0.125,0.001v-0.003c0.92-0.005,1.842-0.012,2.774-0.03
                                                c0,0,41.92-2.116,68.617-14.041c0,0,3.815-0.896,3.938-9.646c0,0-1.373-38.339-12.982-55.576c0,0-2.909-4.467-11.15-7.54
                                                c0,0-26.882-8.191-28.693-15.15c0,0-8.905,23.057-22.627,22.798c-13.721,0.259-22.628-22.797-22.628-22.797
                                                c-1.812,6.959-28.692,15.15-28.692,15.15c-8.181,2.947-11.152,7.54-11.152,7.54c-11.609,17.236-12.982,55.575-12.982,55.575
                                                C168.17,254.199,171.984,255.096,171.984,255.096z"/>
                                            <path  d="M213.896,139.823c1.975,16.585,16.229,33.761,29.152,33.761c14.865,0,28.969-18.091,31.187-33.76
                                                c0.813-0.58,2.22-2.025,2.688-5.291c0,0,3.154-11.335-1.06-10.124c1.507-4.355,6.351-21.408-3.032-31.99
                                                c0,0-4.375-6.044-15.119-9.249c-0.428-0.295-0.771-0.61-1.221-0.926c0,0,0.243,0.295,0.527,0.753
                                                c-0.568-0.143-1.2-0.285-1.832-0.438c-0.59-0.641-1.28-1.272-1.993-1.933c0,0,0.673,0.661,1.425,1.811
                                                c-0.324-0.082-0.55-0.193-0.834-0.214c-0.471-0.763-1.078-1.496-1.854-2.249c0,0,0.326,0.57,0.773,1.485
                                                c-2.035-1.445-5.976-4.792-5.976-8.526c0,0-2.515,1.15-3.918,3.256c-0.603-0.939-0.082-2.045-0.082-2.045
                                                c-1.14,0.641-4.104,3.032-5.041,6.278l-0.85-1.15c-1.729-1.984-4.772-0.458-4.772-0.458s-15.688,6.787-20.236,20.859
                                                c0,0-2.625,6.329,0.875,24.959c-4.996-2.351-1.588,9.9-1.588,9.9C211.646,137.819,213.001,139.264,213.896,139.823z"/>
                                            <path  d="M351.355,19.76V0h-31.581v19.76H167.23V0h-31.563v19.76H69.732V487h347.535V19.76H351.355z
                                                 M87.867,468.93V37.841h47.802v25.274h31.563V37.841h152.584v25.274h31.541V37.841h47.82l0.002,431.089H87.867z"/>
                                            <rect x="129.797" y="407.922"  width="184.038" height="18.314"/>
                                            <rect x="129.768" y="300.658"  width="238.194" height="18.231"/>
                                            <rect x="129.769" y="337.309"  width="220.165" height="18.334"/>
                                            <rect x="129.769" y="372.92"  width="202.096" height="18.213"/>
                                        </g>
                                    </g>
                                    </svg>
                            </span>
                            <span class="mx-4 text-sm font-normal">
                                Cadastros
                            </span>
                            <svg class="w-2.5 h-2.5 ml-5 justify-end" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <div id="register"
                            class="justify-start w-full z-10 hidden bg-white
                        divide-gray-100 rounded-es-lg shadow dark:bg-gray-700 ">
                            <ul class="text-sm ml-5 mt-0 rounded-ee-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownRegister">
                                <x-link-dropdown url="general" active="*cadastros-geral*">
                                    <svg class="w-6 h-6 mr-2" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4"
                                            d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                                            fill="currentColor" />
                                        <path fill="#292D32"
                                            d="M10.7397 16.2802C10.5497 16.2802 10.3597 16.2102 10.2097 16.0602C9.91969 15.7702 9.91969 15.2902 10.2097 15.0002L13.2097 12.0002L10.2097 9.00016C9.91969 8.71016 9.91969 8.23016 10.2097 7.94016C10.4997 7.65016 10.9797 7.65016 11.2697 7.94016L14.7997 11.4702C15.0897 11.7602 15.0897 12.2402 14.7997 12.5302L11.2697 16.0602C11.1197 16.2102 10.9297 16.2802 10.7397 16.2802Z" />
                                    </svg>
                                    Geral
                                </x-link-dropdown>
                                <x-link-dropdown url="type" active="*cadastros-clientes*">
                                    <svg class="w-6 h-6 mr-2" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4"
                                            d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                                            fill="currentColor" />
                                        <path fill="#292D32"
                                            d="M10.7397 16.2802C10.5497 16.2802 10.3597 16.2102 10.2097 16.0602C9.91969 15.7702 9.91969 15.2902 10.2097 15.0002L13.2097 12.0002L10.2097 9.00016C9.91969 8.71016 9.91969 8.23016 10.2097 7.94016C10.4997 7.65016 10.9797 7.65016 11.2697 7.94016L14.7997 11.4702C15.0897 11.7602 15.0897 12.2402 14.7997 12.5302L11.2697 16.0602C11.1197 16.2102 10.9297 16.2802 10.7397 16.2802Z" />
                                    </svg>
                                    Clientes
                                </x-link-dropdown>
                                <x-link-dropdown url="features" active="*cadastros-proprietários*">
                                    <svg class="w-6 h-6 mr-2" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4"
                                            d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                                            fill="currentColor" />
                                        <path fill="#292D32"
                                            d="M10.7397 16.2802C10.5497 16.2802 10.3597 16.2102 10.2097 16.0602C9.91969 15.7702 9.91969 15.2902 10.2097 15.0002L13.2097 12.0002L10.2097 9.00016C9.91969 8.71016 9.91969 8.23016 10.2097 7.94016C10.4997 7.65016 10.9797 7.65016 11.2697 7.94016L14.7997 11.4702C15.0897 11.7602 15.0897 12.2402 14.7997 12.5302L11.2697 16.0602C11.1197 16.2102 10.9297 16.2802 10.7397 16.2802Z" />
                                    </svg>
                                    Proprietários
                                </x-link-dropdown>
                                <x-link-dropdown url="features" active="*cadastros-locatários*">
                                    <svg class="w-6 h-6 mr-2" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4"
                                            d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                                            fill="currentColor" />
                                        <path fill="#292D32"
                                            d="M10.7397 16.2802C10.5497 16.2802 10.3597 16.2102 10.2097 16.0602C9.91969 15.7702 9.91969 15.2902 10.2097 15.0002L13.2097 12.0002L10.2097 9.00016C9.91969 8.71016 9.91969 8.23016 10.2097 7.94016C10.4997 7.65016 10.9797 7.65016 11.2697 7.94016L14.7997 11.4702C15.0897 11.7602 15.0897 12.2402 14.7997 12.5302L11.2697 16.0602C11.1197 16.2102 10.9297 16.2802 10.7397 16.2802Z" />
                                    </svg>
                                    Locatários
                                </x-link-dropdown>
                                <x-link-dropdown url="features" active="*cadastros-corretores*">
                                    <svg class="w-6 h-6 mr-2" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4"
                                            d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                                            fill="currentColor" />
                                        <path fill="#292D32"
                                            d="M10.7397 16.2802C10.5497 16.2802 10.3597 16.2102 10.2097 16.0602C9.91969 15.7702 9.91969 15.2902 10.2097 15.0002L13.2097 12.0002L10.2097 9.00016C9.91969 8.71016 9.91969 8.23016 10.2097 7.94016C10.4997 7.65016 10.9797 7.65016 11.2697 7.94016L14.7997 11.4702C15.0897 11.7602 15.0897 12.2402 14.7997 12.5302L11.2697 16.0602C11.1197 16.2102 10.9297 16.2802 10.7397 16.2802Z" />
                                    </svg>
                                    Corretores
                                </x-link-dropdown>
                            </ul>
                        </div>
                    <!-- End Dropdown Cadastros -->
                        @endif
                        @if (in_array(4, $pages) == true)
                        <div class="flex mx-2 items-center py-0.5 flex-nowrap border-t border-gray-200"></div>
                            <x-link-simple url="property" active="*imoveis*" role='1'
                                :pages="$pages">
                                <span class="text-left">
                                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 7.5V6.2C10 5.0799 10 4.51984 10.218 4.09202C10.4097 3.71569 10.7157 3.40973 11.092 3.21799C11.5198 3 12.0799 3 13.2 3H17.8C18.9201 3 19.4802 3 19.908 3.21799C20.2843 3.40973 20.5903 3.71569 20.782 4.09202C21 4.51984 21 5.0799 21 6.2V17.8C21 18.9201 21 19.4802 20.782 19.908C20.5903 20.2843 20.2843 20.5903 19.908 20.782C19.4802 21 18.9201 21 17.8 21H16M14 7H17M14 11H17M3 16L7.42372 11.9784C7.8038 11.6329 7.99384 11.4601 8.20914 11.3947C8.39876 11.337 8.60124 11.337 8.79086 11.3947C9.00616 11.4601 9.1962 11.6329 9.57628 11.9784L14 16M5 14.1818V19.4C5 19.9601 5 20.2401 5.10899 20.454C5.20487 20.6422 5.35785 20.7951 5.54601 20.891C5.75992 21 6.03995 21 6.6 21H10.4C10.9601 21 11.2401 21 11.454 20.891C11.6422 20.7951 11.7951 20.6422 11.891 20.454C12 20.2401 12 19.9601 12 19.4L12 14.1818" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                </span>
                                <span class="mx-4 text-sm font-normal">
                                    Imóveis
                                </span>
                            </x-link-simple>
                        @endif

                        @if (in_array(6, $pages) == true)
                            <div class="flex mx-2 items-center py-0.5 flex-nowrap border-t border-gray-200"></div>
                            <x-link-simple url="social-media" active="*mídias-sociais*" role='1'
                                :pages="$pages">
                                <span class="text-left">
                                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 4L7 20M17 4L14 20M5 8H20M4 16H19" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                        </svg>
                                </span>
                                <span class="mx-4 text-sm font-normal">
                                    Mídias sociais
                                </span>
                            </x-link-simple>
                            <x-link-simple url="subscribers" active="*inscritos*" role='1'
                                :pages="$pages">
                                <span class="text-left">
                                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 -11.31 63.822 63.822" xmlns="http://www.w3.org/2000/svg">
                                        <g id="Group_34" data-name="Group 34" transform="translate(-804.191 -223.96)">
                                          <g id="Group_27" data-name="Group 27">
                                            <g id="Group_26" data-name="Group 26">
                                              <path id="Path_4" data-name="Path 4" d="M867.086,223.963H817.821a.87.87,0,0,0-.869.87v5.079H805.061a.87.87,0,0,0-.87.87v27.252a1,1,0,0,0,.009.123,7.278,7.278,0,0,0,7.237,7.01c.128,0,.253-.012.38-.019s.249.019.376.019h48.472c4.807,0,7.348-2.146,7.348-6.2V224.831A.883.883,0,0,0,867.086,223.963Zm-61.156,7.688h11.014v26.281a.828.828,0,0,0-.006.086,5.5,5.5,0,0,1-11,0,.8.8,0,0,0-.006-.086Zm60.344,27.311c0,1.917-.581,4.467-5.609,4.467H816.112a7.24,7.24,0,0,0,2.562-5.272.988.988,0,0,0,.009-.123V251.81c0-.014.008-.027.008-.041V225.7h47.583Z" />
                                            </g>
                                          </g>
                                          <g id="Group_28" data-name="Group 28">
                                            <rect id="Rectangle_33" data-name="Rectangle 33" width="12.897" height="12.897" rx="2" transform="translate(821.842 229.188)" />
                                          </g>
                                          <g id="Group_29" data-name="Group 29">
                                            <path id="Path_5" data-name="Path 5" d="M861.258,237.143H838.217a.869.869,0,0,1,0-1.739h23.041a.869.869,0,0,1,0,1.739Z" />
                                          </g>
                                          <g id="Group_30" data-name="Group 30">
                                            <path id="Path_6" data-name="Path 6" d="M861.258,242.545H838.217a.869.869,0,0,1,0-1.739h23.041a.869.869,0,0,1,0,1.739Z" />
                                          </g>
                                          <g id="Group_31" data-name="Group 31">
                                            <path id="Path_7" data-name="Path 7" d="M861.258,247.946H822.277a.869.869,0,0,1,0-1.739h38.981a.869.869,0,0,1,0,1.739Z" />
                                          </g>
                                          <g id="Group_32" data-name="Group 32">
                                            <path id="Path_8" data-name="Path 8" d="M861.258,253.348H822.277a.87.87,0,0,1,0-1.739h38.981a.87.87,0,0,1,0,1.739Z" />
                                          </g>
                                          <g id="Group_33" data-name="Group 33">
                                            <path id="Path_9" data-name="Path 9" d="M861.258,258.749H822.277a.869.869,0,0,1,0-1.739h38.981a.869.869,0,0,1,0,1.739Z" />
                                          </g>
                                        </g>
                                      </svg>
                                </span>
                                <span class="mx-4 text-sm font-normal">
                                    Inscritos
                                </span>
                            </x-link-simple>
                            <x-link-simple url="emails" active="*emails-recebidos*" role='1'
                                :pages="$pages">
                                <span class="text-left">
                                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M13.025 17H3.707l5.963-5.963L12 12.83l2.33-1.794 1.603 1.603a5.463 5.463 0 0 1 1.004-.41l-1.808-1.808L21 5.9v6.72a5.514 5.514 0 0 1 1 .64V5.5A1.504 1.504 0 0 0 20.5 4h-17A1.504 1.504 0 0 0 2 5.5v11A1.5 1.5 0 0 0 3.5 18h9.525c-.015-.165-.025-.331-.025-.5s.01-.335.025-.5zM3 16.293V5.901l5.871 4.52zM20.5 5c.009 0 .016.005.025.005L12 11.57 3.475 5.005c.009 0 .016-.005.025-.005zm-2 8a4.505 4.505 0 0 0-4.5 4.5 4.403 4.403 0 0 0 .05.5 4.49 4.49 0 0 0 4.45 4h.5v-1h-.5a3.495 3.495 0 0 1-3.45-3 3.455 3.455 0 0 1-.05-.5 3.498 3.498 0 0 1 5.947-2.5H20v.513A2.476 2.476 0 0 0 18.5 15a2.5 2.5 0 1 0 1.733 4.295A1.497 1.497 0 0 0 23 18.5v-1a4.555 4.555 0 0 0-4.5-4.5zm0 6a1.498 1.498 0 0 1-1.408-1 1.483 1.483 0 0 1-.092-.5 1.5 1.5 0 0 1 3 0 1.483 1.483 0 0 1-.092.5 1.498 1.498 0 0 1-1.408 1zm3.5-.5a.5.5 0 0 1-1 0v-3.447a3.639 3.639 0 0 1 1 2.447z"/><path fill="none" d="M0 0h24v24H0z"/></svg>
                                </span>
                                <span class="mx-4 text-sm font-normal">
                                    Emails
                                </span>
                            </x-link-simple>
                        @endif


                        @if (in_array(1, $pages) == true)
                        <div class="flex mx-2 items-center py-0.5 flex-nowrap border-t border-gray-200"></div>
                           <!-- Dropdown Opções -->
                           <button id="dropdownOptions" data-dropdown-toggle="options"
                           class="flex items-center justify-start w-full px-4 py-1
                           font-thin uppercase transition-colors duration-200 mb-0
                           {{ Request::is('*opções*')
                               ? ' bg-gradient-to-r from-white to-blue-100                                                                                                  dark:from-gray-700 dark:to-gray-200 text-blue-500 border-r-4 border-blue-500'
                           : 'dark:text-gray-200 hover:text-blue-500 text-gray-500' }}"
                           type="button">
                           <span class="text-left">
                               <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                       xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd"
                                           d="M1 3.5A1.5 1.5 0 012.5 2h15A1.5 1.5 0 0119 3.5v2A1.5 1.5 0 0117.5 7h-15A1.5 1.5 0 011 5.5v-2zm3.5 1a1 1 0 11-2 0 1 1 0 012 0zM1 9.5A1.5 1.5 0 012.5 8h6.073a1.5 1.5 0 011.342 2.17l-1 2a1.5 1.5 0 01-1.342.83H2.5A1.5 1.5 0 011 11.5v-2zm3.5 1a1 1 0 11-2 0 1 1 0 012 0zM1 15.5A1.5 1.5 0 012.5 14h5.27a1.5 1.5 0 011.471 1.206l.4 2A1.5 1.5 0 018.171 19H2.5A1.5 1.5 0 011 17.5v-2zm3.5 1a1 1 0 11-2 0 1 1 0 012 0zM12.159 13.059l-.682-.429a.987.987 0 01-.452-.611.946.946 0 01.134-.742.983.983 0 01.639-.425 1.023 1.023 0 01.758.15l.682.427c.369-.31.8-.54 1.267-.676V9.97c0-.258.104-.504.291-.686.187-.182.44-.284.704-.284.264 0 .517.102.704.284a.957.957 0 01.291.686v.783c.472.138.903.37 1.267.676l.682-.429a1.02 1.02 0 01.735-.107c.25.058.467.208.606.419.14.21.19.465.141.71a.97.97 0 01-.403.608l-.682.429a3.296 3.296 0 010 1.882l.682.43a.987.987 0 01.452.611.946.946 0 01-.134.742.982.982 0 01-.639.425 1.02 1.02 0 01-.758-.15l-.682-.428c-.369.31-.8.54-1.267.676v.783a.957.957 0 01-.291.686A1.01 1.01 0 0115.5 19a1.01 1.01 0 01-.704-.284.957.957 0 01-.291-.686v-.783a3.503 3.503 0 01-1.267-.676l-.682.429a1.02 1.02 0 01-.75.132.999.999 0 01-.627-.421.949.949 0 01-.135-.73.97.97 0 01.434-.61l.68-.43a3.296 3.296 0 010-1.882zm3.341-.507c-.82 0-1.487.65-1.487 1.449s.667 1.448 1.487 1.448c.82 0 1.487-.65 1.487-1.448 0-.8-.667-1.45-1.487-1.45z" />
                                   </svg>
                           </span>
                           <span class="mx-4 text-sm font-normal">
                               Opções
                           </span>
                           <svg class="w-2.5 h-2.5 ml-5 justify-end" aria-hidden="true"
                               xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                   stroke-width="2" d="m1 1 4 4 4-4" />
                           </svg>
                       </button>
                       <div id="options"
                           class="justify-start w-full z-10 hidden bg-white
                       divide-gray-100 rounded-es-lg shadow dark:bg-gray-700 ">
                           <ul class="text-sm ml-5 mt-0 rounded-ee-sm text-gray-700 dark:text-gray-200"
                               aria-labelledby="dropdownOptions">
                               <x-link-dropdown url="finality" active="*opções-finalidade*">
                                   <svg class="w-6 h-6 mr-2" viewBox="0 0 24 24"
                                       xmlns="http://www.w3.org/2000/svg">
                                       <path opacity="0.4"
                                           d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                                           fill="currentColor" />
                                       <path fill="#292D32"
                                           d="M10.7397 16.2802C10.5497 16.2802 10.3597 16.2102 10.2097 16.0602C9.91969 15.7702 9.91969 15.2902 10.2097 15.0002L13.2097 12.0002L10.2097 9.00016C9.91969 8.71016 9.91969 8.23016 10.2097 7.94016C10.4997 7.65016 10.9797 7.65016 11.2697 7.94016L14.7997 11.4702C15.0897 11.7602 15.0897 12.2402 14.7997 12.5302L11.2697 16.0602C11.1197 16.2102 10.9297 16.2802 10.7397 16.2802Z" />
                                   </svg>
                                   Finalidade
                               </x-link-dropdown>
                               <x-link-dropdown url="type" active="*opções-tipo-do-imóvel*">
                                   <svg class="w-6 h-6 mr-2" viewBox="0 0 24 24"
                                       xmlns="http://www.w3.org/2000/svg">
                                       <path opacity="0.4"
                                           d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                                           fill="currentColor" />
                                       <path fill="#292D32"
                                           d="M10.7397 16.2802C10.5497 16.2802 10.3597 16.2102 10.2097 16.0602C9.91969 15.7702 9.91969 15.2902 10.2097 15.0002L13.2097 12.0002L10.2097 9.00016C9.91969 8.71016 9.91969 8.23016 10.2097 7.94016C10.4997 7.65016 10.9797 7.65016 11.2697 7.94016L14.7997 11.4702C15.0897 11.7602 15.0897 12.2402 14.7997 12.5302L11.2697 16.0602C11.1197 16.2102 10.9297 16.2802 10.7397 16.2802Z" />
                                   </svg>
                                   Tipo de imóvel
                               </x-link-dropdown>
                               <x-link-dropdown url="features" active="*opções-características-extras*">
                                   <svg class="w-6 h-6 mr-2" viewBox="0 0 24 24"
                                       xmlns="http://www.w3.org/2000/svg">
                                       <path opacity="0.4"
                                           d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                                           fill="currentColor" />
                                       <path fill="#292D32"
                                           d="M10.7397 16.2802C10.5497 16.2802 10.3597 16.2102 10.2097 16.0602C9.91969 15.7702 9.91969 15.2902 10.2097 15.0002L13.2097 12.0002L10.2097 9.00016C9.91969 8.71016 9.91969 8.23016 10.2097 7.94016C10.4997 7.65016 10.9797 7.65016 11.2697 7.94016L14.7997 11.4702C15.0897 11.7602 15.0897 12.2402 14.7997 12.5302L11.2697 16.0602C11.1197 16.2102 10.9297 16.2802 10.7397 16.2802Z" />
                                   </svg>
                                   Características extras
                               </x-link-dropdown>
                           </ul>
                       </div>
                   <!-- End Dropdown Opções -->
                        <!-- Dropdown Configurações -->
                                <button id="dropdownConfigs" data-dropdown-toggle="configs"
                                    class="flex items-center justify-start w-full px-4 py-1
                                        font-thin uppercase transition-colors duration-200
                                        {{ Request::is('*configurações*')
                                            ? ' bg-gradient-to-r from-white to-blue-100                                                                                                  dark:from-gray-700 dark:to-gray-200 text-blue-500 border-r-4 border-blue-500'
                                            : 'dark:text-gray-200 hover:text-blue-500 text-gray-500' }}"
                                    type="button">
                                    <span class="text-left">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M1 3.5A1.5 1.5 0 012.5 2h15A1.5 1.5 0 0119 3.5v2A1.5 1.5 0 0117.5 7h-15A1.5 1.5 0 011 5.5v-2zm3.5 1a1 1 0 11-2 0 1 1 0 012 0zM1 9.5A1.5 1.5 0 012.5 8h6.073a1.5 1.5 0 011.342 2.17l-1 2a1.5 1.5 0 01-1.342.83H2.5A1.5 1.5 0 011 11.5v-2zm3.5 1a1 1 0 11-2 0 1 1 0 012 0zM1 15.5A1.5 1.5 0 012.5 14h5.27a1.5 1.5 0 011.471 1.206l.4 2A1.5 1.5 0 018.171 19H2.5A1.5 1.5 0 011 17.5v-2zm3.5 1a1 1 0 11-2 0 1 1 0 012 0zM12.159 13.059l-.682-.429a.987.987 0 01-.452-.611.946.946 0 01.134-.742.983.983 0 01.639-.425 1.023 1.023 0 01.758.15l.682.427c.369-.31.8-.54 1.267-.676V9.97c0-.258.104-.504.291-.686.187-.182.44-.284.704-.284.264 0 .517.102.704.284a.957.957 0 01.291.686v.783c.472.138.903.37 1.267.676l.682-.429a1.02 1.02 0 01.735-.107c.25.058.467.208.606.419.14.21.19.465.141.71a.97.97 0 01-.403.608l-.682.429a3.296 3.296 0 010 1.882l.682.43a.987.987 0 01.452.611.946.946 0 01-.134.742.982.982 0 01-.639.425 1.02 1.02 0 01-.758-.15l-.682-.428c-.369.31-.8.54-1.267.676v.783a.957.957 0 01-.291.686A1.01 1.01 0 0115.5 19a1.01 1.01 0 01-.704-.284.957.957 0 01-.291-.686v-.783a3.503 3.503 0 01-1.267-.676l-.682.429a1.02 1.02 0 01-.75.132.999.999 0 01-.627-.421.949.949 0 01-.135-.73.97.97 0 01.434-.61l.68-.43a3.296 3.296 0 010-1.882zm3.341-.507c-.82 0-1.487.65-1.487 1.449s.667 1.448 1.487 1.448c.82 0 1.487-.65 1.487-1.448 0-.8-.667-1.45-1.487-1.45z" />
                                        </svg>
                                    </span>
                                    <span class="mx-4 text-sm font-normal">
                                        Configurações
                                    </span>
                                    <svg class="w-2.5 h-2.5 ml-5 justify-end" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </button>
                                <div id="configs"
                                    class="justify-start w-full z-10 hidden bg-white
                                            divide-gray-100 rounded-es-lg shadow dark:bg-gray-700 ">
                                    <ul class="text-sm ml-5 mt-0 rounded-ee-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="dropdownConfigs">
                                        <x-link-dropdown url="configuration" active="*conf">
                                            <svg class="w-6 h-6 mr-2" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.4"
                                                    d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                                                    fill="currentColor" />
                                                <path fill="#292D32"
                                                    d="M10.7397 16.2802C10.5497 16.2802 10.3597 16.2102 10.2097 16.0602C9.91969 15.7702 9.91969 15.2902 10.2097 15.0002L13.2097 12.0002L10.2097 9.00016C9.91969 8.71016 9.91969 8.23016 10.2097 7.94016C10.4997 7.65016 10.9797 7.65016 11.2697 7.94016L14.7997 11.4702C15.0897 11.7602 15.0897 12.2402 14.7997 12.5302L11.2697 16.0602C11.1197 16.2102 10.9297 16.2802 10.7397 16.2802Z" />
                                            </svg>
                                            Gerais
                                        </x-link-dropdown>

                                    </ul>
                                </div>
                            <!-- End Dropdown Configurações -->

                        @endif
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
