@props(['item','href'=>null])
@if ($item)
    <div id="item{{ $item }}" class="carousel-item col-span-1 flex justify-center mt-4">
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
                    <a href="{{ $href }}" class="w-20 h-10 py-2 font-medium
                    text-white bg-slate-500 rounded-full hover:bg-slate-700 text-center">
                        Entrar
                    </a>
                </div>
            </div>
        </div>
    </div>
@endif
