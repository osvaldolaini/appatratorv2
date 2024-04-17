<div>
    <section class="text-gray-900">
        <div class="container flex flex-col justify-center mx-auto lg:flex-row lg:justify-between">
            <div class="flex flex-col justify-center px-6 text-center rounded-sm lg:max-w-md xl:max-w-lg lg:text-left">
                <h1 class="text-5xl font-bold leadi">
                    {{ $course->title }}
                </h1>
                <div class="w-full rounded-md border my-10">
                    <div class="items-center justify-between p-3 border-b-1">
                        <h1 class="w-full flex text-3xl justify-between font-bold leadi border-b-2">
                            <span class="text-gray-500">Dados do curso</span>
                            <div class="flex justify-end items-center">
                                <svg class="h-6 w-6 justify-end" viewBox="0 -0.5 25 25" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M9.918 10.0005H7.082C6.66587 9.99708 6.26541 10.1591 5.96873 10.4509C5.67204 10.7427 5.50343 11.1404 5.5 11.5565V17.4455C5.5077 18.3117 6.21584 19.0078 7.082 19.0005H9.918C10.3341 19.004 10.7346 18.842 11.0313 18.5502C11.328 18.2584 11.4966 17.8607 11.5 17.4445V11.5565C11.4966 11.1404 11.328 10.7427 11.0313 10.4509C10.7346 10.1591 10.3341 9.99708 9.918 10.0005Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M9.918 4.0006H7.082C6.23326 3.97706 5.52559 4.64492 5.5 5.4936V6.5076C5.52559 7.35629 6.23326 8.02415 7.082 8.0006H9.918C10.7667 8.02415 11.4744 7.35629 11.5 6.5076V5.4936C11.4744 4.64492 10.7667 3.97706 9.918 4.0006Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M15.082 13.0007H17.917C18.3333 13.0044 18.734 12.8425 19.0309 12.5507C19.3278 12.2588 19.4966 11.861 19.5 11.4447V5.55666C19.4966 5.14054 19.328 4.74282 19.0313 4.45101C18.7346 4.1592 18.3341 3.9972 17.918 4.00066H15.082C14.6659 3.9972 14.2654 4.1592 13.9687 4.45101C13.672 4.74282 13.5034 5.14054 13.5 5.55666V11.4447C13.5034 11.8608 13.672 12.2585 13.9687 12.5503C14.2654 12.8421 14.6659 13.0041 15.082 13.0007Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M15.082 19.0006H17.917C18.7661 19.0247 19.4744 18.3567 19.5 17.5076V16.4936C19.4744 15.6449 18.7667 14.9771 17.918 15.0006H15.082C14.2333 14.9771 13.5256 15.6449 13.5 16.4936V17.5066C13.525 18.3557 14.2329 19.0241 15.082 19.0006Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            </div>
                        </h1>

                    </div>
                    <div class="p-3 grid grid-cols-2 ">
                        <div class="col-span-1">
                            <span class="text-wrap font-bold leadi text-gray-500">Alunos</span>
                            <p class="text-3xl font-bold leadi">{{ $course->vouchers->count() }}</p>
                        </div>
                        <div class="col-span-1">
                            <span class="text-wrap font-bold leadi text-gray-500">Módulos concluídos</span>
                            <p class="text-3xl font-bold leadi">{{ $course->concludedModule->count() }}</p>
                        </div>
                        <div class="col-span-1">
                            <span class="text-wrap font-bold leadi text-gray-500">Conteúdos concluídos</span>
                            <p class="text-3xl font-bold leadi">{{ $course->concludedContent->count() }}</p>
                        </div>
                        <div class="col-span-1">
                            <span class="text-wrap font-bold leadi text-gray-500">Donwloads</span>
                            <p class="text-3xl font-bold leadi">{{ $course->downloads->count() }}</p>
                        </div>

                    </div>
                </div>

            </div>
            <div class="flex items-center justify-center p-6 mt-8 lg:mt-0 sm:h-80 lg:h-96 xl:h-112 2xl:h-128">
                <figure><img class="object-contain sm:h-80 lg:h-96 xl:h-112 2xl:h-128"
                        src="{{ 'https://atratorconcursos.com.br/storage/images/courses/' . $course->api_course_id . '/thumb.jpg' }}"
                        alt="{{ $course->code }}">
                </figure>
            </div>
        </div>


    </section>

</div>
