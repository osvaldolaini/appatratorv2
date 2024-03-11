<div class="w-100 pt-3 sm:rounded-lg">

    <div class="flex flex-wrap sm:justify-around">
        <div class="max-w-full">
            <h1 class="text-5xl font-extrabold dark:text-white text-center">
                <small class="ml-2 font-semibold text-gray-500 dark:text-gray-400">
                    Plataformas </small>
            </h1>
            <x-app-carousel-cards qtd="{{ $vouchers->count() }}">
                {{-- <x-app-carousel-cards qtd="4"> --}}
                @foreach ($vouchers as $voucher)
                    @if ($voucher->application == 'questions')
                        <x-app-card-questions item="1" href="{{ route('apps.questions') }}">
                        </x-app-card-questions>
                    @elseif ($voucher->application == 'treinament')
                        <x-app-card-tfm item="2" href="{{ route('apps.treinaments') }}">
                        </x-app-card-tfm>
                    @elseif ($voucher->application == 'essay')
                        <x-app-card-essay item="3" href="{{ route('apps.essays') }}">
                        </x-app-card-essay>
                    @elseif ($voucher->application == 'mentoring')
                        <x-app-card-mentoring item="4" href="{{ route('apps.mentorings') }}">
                        </x-app-card-mentoring>
                    @endif
                @endforeach
            </x-app-carousel-cards>
        </div>
    </div>
    <div class="flex flex-wrap sm:justify-around">
        <div class="max-w-full">
            <h1 class="text-5xl font-extrabold dark:text-white text-center">
                <small class="ml-2 font-semibold text-gray-500 dark:text-gray-400">
                    Cursos</small>
            </h1>
            <x-app-carousel-cards qtd="1">
                <x-app-card-comming item="1"></x-app-card-comming>
            </x-app-carousel-cards>
        </div>
    </div>

</div>
