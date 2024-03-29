<div>
    @if (isset($mentoringContestUser))
        <div class=" mx-auto py-8 px-6">
            <div class="mt-8 sm:mt-0">
                <div class='md:grid md:grid-cols-3 md:gap-6'>
                    <div class="md:col-span-1 flex justify-between">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                              {{$title}}
                            </h3>
                            @if ($mentoringContestUser->cycles == 1 AND $mentoringContestUser->qtd_cycles > 0)
                            <h2 class="flex text-lg font-bold py-1">
                                {{-- <button wire:click="cycleStudy" class="btn btn-outline btn-accent"> --}}
                                <button class="btn btn-outline btn-accent">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 opacity-75  group-hover:opacity-0"
                                        fill="currentColor" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
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
                                    {{$mentoringContestUser->qtd_cycles}} ciclo{{ ($mentoringContestUser->qtd_cycles > 1 ?'s concluídos':' concluído') }}
                                </button>
                                <span class="my-auto"></span>
                            </h2>
                            @endif
                            @if ($subTitle != '')
                                <h2 class="flex text-lg font-bold text-gray-900 dark:text-gray-100 py-1">
                                    <svg fill="currentColor" class="w-10 h-10 p-1" viewBox="0 0 56 56"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M 48.7597 4.7814 L 17.1631 4.7814 C 12.3288 4.7814 9.9000 7.1639 9.9000 11.9520 L 9.9000 25.1597 C 10.5245 25.0903 11.1491 25.0441 11.7505 25.0441 C 12.3750 25.0441 12.9995 25.0903 13.6241 25.1597 L 13.6241 18.5906 C 13.6241 16.4625 14.7806 15.3523 16.8162 15.3523 L 49.0605 15.3523 C 51.1193 15.3523 52.2756 16.4625 52.2756 18.5906 L 52.2756 40.4030 C 52.2756 42.5542 51.1193 43.6413 49.0605 43.6413 L 26.1610 43.6413 C 25.8603 44.9598 25.3514 46.2088 24.6806 47.3654 L 48.7597 47.3654 C 53.5940 47.3654 56 44.9598 56 40.1948 L 56 11.9520 C 56 7.1871 53.5940 4.7814 48.7597 4.7814 Z M 30.6715 23.6562 L 32.0363 23.6562 C 32.8458 23.6562 33.1003 23.4249 33.1003 22.6153 L 33.1003 21.2506 C 33.1003 20.4411 32.8458 20.1866 32.0363 20.1866 L 30.6715 20.1866 C 29.8619 20.1866 29.5844 20.4411 29.5844 21.2506 L 29.5844 22.6153 C 29.5844 23.4249 29.8619 23.6562 30.6715 23.6562 Z M 37.2407 23.6562 L 38.6054 23.6562 C 39.4150 23.6562 39.6694 23.4249 39.6694 22.6153 L 39.6694 21.2506 C 39.6694 20.4411 39.4150 20.1866 38.6054 20.1866 L 37.2407 20.1866 C 36.4311 20.1866 36.1535 20.4411 36.1535 21.2506 L 36.1535 22.6153 C 36.1535 23.4249 36.4311 23.6562 37.2407 23.6562 Z M 43.8099 23.6562 L 45.1746 23.6562 C 45.9841 23.6562 46.2385 23.4249 46.2385 22.6153 L 46.2385 21.2506 C 46.2385 20.4411 45.9841 20.1866 45.1746 20.1866 L 43.8099 20.1866 C 43.0003 20.1866 42.7227 20.4411 42.7227 21.2506 L 42.7227 22.6153 C 42.7227 23.4249 43.0003 23.6562 43.8099 23.6562 Z M 24.1024 31.2200 L 25.4671 31.2200 C 26.2767 31.2200 26.5311 30.9887 26.5311 30.1791 L 26.5311 28.8144 C 26.5311 28.0048 26.2767 27.7735 25.4671 27.7735 L 24.1024 27.7735 C 23.2928 27.7735 23.0152 28.0048 23.0152 28.8144 L 23.0152 30.1791 C 23.0152 30.9887 23.2928 31.2200 24.1024 31.2200 Z M 30.6715 31.2200 L 32.0363 31.2200 C 32.8458 31.2200 33.1003 30.9887 33.1003 30.1791 L 33.1003 28.8144 C 33.1003 28.0048 32.8458 27.7735 32.0363 27.7735 L 30.6715 27.7735 C 29.8619 27.7735 29.5844 28.0048 29.5844 28.8144 L 29.5844 30.1791 C 29.5844 30.9887 29.8619 31.2200 30.6715 31.2200 Z M 37.2407 31.2200 L 38.6054 31.2200 C 39.4150 31.2200 39.6694 30.9887 39.6694 30.1791 L 39.6694 28.8144 C 39.6694 28.0048 39.4150 27.7735 38.6054 27.7735 L 37.2407 27.7735 C 36.4311 27.7735 36.1535 28.0048 36.1535 28.8144 L 36.1535 30.1791 C 36.1535 30.9887 36.4311 31.2200 37.2407 31.2200 Z M 43.8099 31.2200 L 45.1746 31.2200 C 45.9841 31.2200 46.2385 30.9887 46.2385 30.1791 L 46.2385 28.8144 C 46.2385 28.0048 45.9841 27.7735 45.1746 27.7735 L 43.8099 27.7735 C 43.0003 27.7735 42.7227 28.0048 42.7227 28.8144 L 42.7227 30.1791 C 42.7227 30.9887 43.0003 31.2200 43.8099 31.2200 Z M 11.7505 51.7140 C 18.1346 51.7140 23.5010 46.3939 23.5010 39.9635 C 23.5010 33.5331 18.2040 28.2130 11.7505 28.2130 C 5.3201 28.2130 0 33.5331 0 39.9635 C 0 46.4401 5.3201 51.7140 11.7505 51.7140 Z M 11.7736 47.5967 C 10.9640 47.5967 10.2470 47.0415 10.2470 46.1857 L 10.2470 41.3745 L 5.8290 41.3745 C 5.0425 41.3745 4.3948 40.7268 4.3948 39.9635 C 4.3948 39.2002 5.0425 38.5525 5.8290 38.5525 L 10.2470 38.5525 L 10.2470 33.7644 C 10.2470 32.8854 10.9640 32.3303 11.7736 32.3303 C 12.5601 32.3303 13.2771 32.8854 13.2771 33.7644 L 13.2771 38.5525 L 17.6951 38.5525 C 18.4816 38.5525 19.1061 39.2002 19.1061 39.9635 C 19.1061 40.7268 18.4816 41.3745 17.6951 41.3745 L 13.2771 41.3745 L 13.2771 46.1857 C 13.2771 47.0415 12.5601 47.5967 11.7736 47.5967 Z M 30.6715 38.8070 L 32.0363 38.8070 C 32.8458 38.8070 33.1003 38.5525 33.1003 37.7429 L 33.1003 36.3782 C 33.1003 35.5686 32.8458 35.3373 32.0363 35.3373 L 30.6715 35.3373 C 29.8619 35.3373 29.5844 35.5686 29.5844 36.3782 L 29.5844 37.7429 C 29.5844 38.5525 29.8619 38.8070 30.6715 38.8070 Z M 37.2407 38.8070 L 38.6054 38.8070 C 39.4150 38.8070 39.6694 38.5525 39.6694 37.7429 L 39.6694 36.3782 C 39.6694 35.5686 39.4150 35.3373 38.6054 35.3373 L 37.2407 35.3373 C 36.4311 35.3373 36.1535 35.5686 36.1535 36.3782 L 36.1535 37.7429 C 36.1535 38.5525 36.4311 38.8070 37.2407 38.8070 Z" />
                                    </svg>
                                    <span class="my-auto">{{$subTitle}}</span>
                                </h2>
                            @endif
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 col-span-2 mx-2 sm:mx-0 w-full">
                        <div
                            class="w-full px-4 py-2.5 shadow-xl sm:p-6 bg-[#210c75] rounded-lg">
                            <div class="col-span-1 flex justify-between ">
                                <div class="px-4 sm:px-0 w-full">

                                        <h3 class="text-xl font-extrabold text-[#fddb11] ">
                                            {{ mb_strtoupper($mentoringContestUser->contest->title) }}
                                            ({{ mb_strtoupper($mentoringContestUser->contest->nick) }})
                                        </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
