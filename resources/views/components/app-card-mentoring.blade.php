@props(['item','href'=>null])
@if ($item)
    <div id="item{{ $item }}" class="carousel-item ">
        <div class="w-48 h-48 sm:w-56 sm:h-56 p-2 bg-white drop-shadow-xl rounded-2xl rounded-box mr-4">
            <x-application-logo-mentoring class="m-auto h-16 sm:h-20"></x-application-logo-mentoring>
            <div class="p-2 sm:p-3 bg-slate-200 rounded-lg">
                <p class="text-xl font-bold text-slate-500 ">
                    Plataforma de Mentoria
                </p>
                <div class="flex items-center justify-between ">
                    <p class="text-white">
                        &nbsp;
                    </p>
                    <a href="{{ route('apps.mentorings') }}" class="w-20 h-10 py-2 font-medium
                    text-white bg-slate-500 rounded-full hover:bg-slate-700 text-center">
                        Entrar
                    </a>
                </div>
            </div>
        </div>
    </div>
@endif
