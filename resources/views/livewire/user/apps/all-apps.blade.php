<div class="p-10 dark:bg-violet-400 dark:text-gray-900">
    <div class="container mx-auto">
        <div class="flex flex-col lg:flex-row items-center justify-between">
            <h2 class="text-center text-6xl tracki font-bold">Nosso aplicativos
            </h2>
        </div>
    </div>

    <div class="w-full h-full py-2">
        <x-app-carousel-cards qtd="{{ count(json_decode($this->apps)) }}">
            @foreach (json_decode($this->apps) as $app)
                @if ($app->nick == 'questions')
                <div id="item{{ $app->nick }}" class="carousel-item col-span-1 flex justify-center mt-4">
                    <div class="w-48 h-48 sm:w-56 sm:h-56 p-2 bg-white drop-shadow-xl rounded-box">
                        <x-application-logo-questions class="m-auto h-16 sm:h-20"></x-application-logo-questions>
                        <div class="p-2 sm:p-3 bg-slate-200 rounded-lg">
                            <p class="text-xl font-bold text-slate-500 ">
                                Plataforma de questões
                            </p>
                            <div class="flex items-center justify-between ">
                                <p class="text-white">
                                    &nbsp;
                                </p>
                                <a href="{{ route('app-pack',$app->nick) }}" rel="noreferrer noopener"
                                    class="px-5 mt-4 lg:mt-0 py-3 font-bold rounded-full border block bg-[#F3FB04] text-gray-900 border-gray-400">
                                    Comprar
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
                @elseif ($app->nick == 'treinament')
                <div id="item{{ $app->nick }}" class="carousel-item col-span-1 flex justify-center mt-4">
                    <div class="w-48 h-48 sm:w-56 sm:h-56 p-2 bg-white drop-shadow-xl rounded-box ">
                        <x-application-logo-tfm class="m-auto h-16 sm:h-20"></x-application-logo-tfm>
                        <div class="p-2 sm:p-3 bg-slate-200 rounded-lg">
                            <p class="text-xl font-bold text-slate-500 ">
                                Plataforma de Treinamento
                            </p>
                            <div class="flex items-center justify-between ">
                                <p class="text-white">
                                    &nbsp;
                                </p>
                                <a href="{{ route('app-pack',$app->nick) }}" rel="noreferrer noopener"
                                    class="px-5 mt-4 lg:mt-0 py-3 font-bold rounded-full border block bg-[#F3FB04] text-gray-900 border-gray-400">
                                    Comprar
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
                @elseif ($app->nick == 'essay')
                <div id="item{{ $app->nick }}" class="carousel-item col-span-1 flex justify-center mt-4">
                    <div class="w-48 h-48 sm:w-56 sm:h-56 p-2 bg-white drop-shadow-xl rounded-box">
                        <x-application-logo-essay class="m-auto h-16 sm:h-20"></x-application-logo-essay>
                        <div class="p-2 sm:p-3 bg-slate-200 rounded-lg">
                            <p class="text-xl font-bold text-slate-500 ">
                                Plataforma de Redações
                            </p>
                            <div class="flex items-center justify-between ">
                                <p class="text-white">
                                    &nbsp;
                                </p>
                                <a href="{{ route('app-pack',$app->nick) }}" rel="noreferrer noopener"
                                    class="px-5 mt-4 lg:mt-0 py-3 font-bold rounded-full
                                     border block bg-[#F3FB04] text-gray-900 border-gray-400">
                                    Comprar
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
                @elseif ($app->nick == 'mentoring')
                <div id="item{{ $app->nick }}" class="carousel-item col-span-1 flex justify-center mt-4">
                    <div class="w-48 h-48 sm:w-56 sm:h-56 p-2 bg-white drop-shadow-xl rounded-box">
                        <x-application-logo-mentoring class="m-auto h-16 sm:h-20"></x-application-logo-mentoring>
                        <div class="p-2 sm:p-3 bg-slate-200 rounded-lg">
                            <p class="text-md font-bold text-slate-500 ">
                                Plataforma de Mentoria
                            </p>
                            <div class="flex items-center justify-between ">
                                <p class="text-white">
                                    &nbsp;
                                </p>
                                <a href="{{ route('app-pack',$app->nick) }}" rel="noreferrer noopener"
                                    class="px-5 mt-4 lg:mt-0 py-3 font-bold rounded-full
                                     border block bg-[#F3FB04] text-gray-900 border-gray-400">
                                    Comprar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </x-app-carousel-cards>

    </div>
</div>
