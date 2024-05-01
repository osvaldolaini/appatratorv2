<div class="w-100 pt-3 sm:rounded-lg px-10">
    <div class="flex flex-wrap sm:justify-around">
        <div class="w-full">
            <h1 class="text-5xl font-extrabold dark:text-white text-center">
                <small class="ml-2 font-semibold text-gray-500 dark:text-gray-400">
                    Meus aplicativos
                </small>
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
    <div>
        <a href="{{ route('shopping') }}" rel="noreferrer noopener"
            class="px-5 mt-4 lg:mt-0 py-3 rounded-md border block dark:bg-gray-50 dark:text-gray-900 dark:border-gray-400">
            Conheça nossa loja
            <svg class="w-6 h-6 ml-3" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M9 11V6C9 4.34315 10.3431 3 12 3C13.6569 3 15 4.34315 15 6V10.9673M10.4 21H13.6C15.8402 21 16.9603 21 17.816 20.564C18.5686 20.1805 19.1805 19.5686 19.564 18.816C20 17.9603 20 16.8402 20 14.6V12.2C20 11.0799 20 10.5198 19.782 10.092C19.5903 9.71569 19.2843 9.40973 18.908 9.21799C18.4802 9 17.9201 9 16.8 9H7.2C6.0799 9 5.51984 9 5.09202 9.21799C4.71569 9.40973 4.40973 9.71569 4.21799 10.092C4 10.5198 4 11.0799 4 12.2V14.6C4 16.8402 4 17.9603 4.43597 18.816C4.81947 19.5686 5.43139 20.1805 6.18404 20.564C7.03968 21 8.15979 21 10.4 21Z"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </a>
        {{-- @livewire('user.apps.all-apps') --}}
    </div>
</div>
