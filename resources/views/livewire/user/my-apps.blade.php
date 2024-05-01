<div class="w-100 pt-3 sm:rounded-lg px-10">

    @if ($vouchers->count() > 0)
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
    @else
    <div class="flex flex-wrap sm:justify-around">
        <div class="w-full ">
            <div class="py-4 space-x-4 ">
                <div class="w-full flex justify-center py-5">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-40 h-40 dark:text-white">

                        <path fill="currentColor"
                            d="M15.6579 14.3242C15.8127 13.94 15.6267 13.5031 15.2424 13.3483C14.8582 13.1936 14.4213 13.3796 14.2665 13.7638L15.6579 14.3242ZM14.0782 15.25L14.552 15.8314L14.5548 15.8291L14.0782 15.25ZM9.82624 15.219L9.3407 15.7906L9.34406 15.7935L9.82624 15.219ZM9.66243 13.7312C9.51398 13.3445 9.08015 13.1514 8.69346 13.2998C8.30676 13.4483 8.11362 13.8821 8.26206 14.2688L9.66243 13.7312ZM14.2761 11.3027C14.4433 11.6817 14.886 11.8534 15.265 11.6862C15.644 11.519 15.8156 11.0762 15.6484 10.6973L14.2761 11.3027ZM12.2761 10.6973C12.1089 11.0762 12.2805 11.519 12.6595 11.6862C13.0385 11.8534 13.4812 11.6817 13.6484 11.3027L12.2761 10.6973ZM10.2761 11.3027C10.4433 11.6817 10.886 11.8534 11.265 11.6862C11.644 11.519 11.8156 11.0762 11.6484 10.6973L10.2761 11.3027ZM8.27606 10.6973C8.10886 11.0762 8.28054 11.519 8.65951 11.6862C9.03848 11.8534 9.48123 11.6817 9.64843 11.3027L8.27606 10.6973ZM15.946 7.18459C16.2656 7.44815 16.7383 7.40278 17.0018 7.08324C17.2654 6.7637 17.22 6.291 16.9005 6.02743L15.946 7.18459ZM7.28618 6.82506L7.79059 7.38011L7.28618 6.82506ZM6.19669 15.8996L6.81814 15.4797L6.19669 15.8996ZM15.0222 18.2752L14.6955 17.6001L15.0222 18.2752ZM19.3501 9.65317C19.2248 9.25836 18.8032 9.03986 18.4084 9.16514C18.0136 9.29042 17.7951 9.71203 17.9204 10.1068L19.3501 9.65317ZM14.2665 13.7638C14.1243 14.117 13.8957 14.4289 13.6017 14.6709L14.5548 15.8291C15.0426 15.4277 15.4219 14.9102 15.6579 14.3242L14.2665 13.7638ZM13.6045 14.6686C12.6424 15.4525 11.259 15.4424 10.3084 14.6446L9.34406 15.7935C10.846 17.0542 13.0318 17.0701 14.552 15.8314L13.6045 14.6686ZM10.3118 14.6474C10.022 14.4012 9.79869 14.0862 9.66243 13.7312L8.26206 14.2688C8.48842 14.8584 8.85933 15.3817 9.34071 15.7906L10.3118 14.6474ZM15.6484 10.6973C15.3537 10.0292 14.6924 9.5982 13.9622 9.5982V11.0982C14.0981 11.0982 14.2212 11.1784 14.2761 11.3027L15.6484 10.6973ZM13.9622 9.5982C13.2321 9.5982 12.5708 10.0292 12.2761 10.6973L13.6484 11.3027C13.7033 11.1784 13.8264 11.0982 13.9622 11.0982V9.5982ZM11.6484 10.6973C11.3537 10.0292 10.6924 9.5982 9.96224 9.5982V11.0982C10.0981 11.0982 10.2212 11.1784 10.2761 11.3027L11.6484 10.6973ZM9.96224 9.5982C9.23209 9.5982 8.57079 10.0292 8.27606 10.6973L9.64843 11.3027C9.70328 11.1784 9.82636 11.0982 9.96224 11.0982V9.5982ZM16.9005 6.02743C13.936 3.58227 9.62564 3.68561 6.78178 6.27002L7.79059 7.38011C10.0827 5.29713 13.5567 5.21385 15.946 7.18459L16.9005 6.02743ZM6.78178 6.27002C3.93791 8.85443 3.42395 13.1353 5.57523 16.3195L6.81814 15.4797C5.08426 12.9134 5.4985 9.46308 7.79059 7.38011L6.78178 6.27002ZM5.57523 16.3195C7.72651 19.5036 11.8899 20.6243 15.3489 18.9503L14.6955 17.6001C11.9077 18.9493 8.55203 18.046 6.81814 15.4797L5.57523 16.3195ZM15.3489 18.9503C18.8079 17.2764 20.5124 13.3159 19.3501 9.65317L17.9204 10.1068C18.8571 13.059 17.4834 16.251 14.6955 17.6001L15.3489 18.9503Z" />
                        <path fill="#F3FB04" class="stroke-[] fill-[]" fill-rule="evenodd" clip-rule="evenodd"
                            d="M19.3762 9.393C19.169 9.60879 18.9157 9.77494 18.6352 9.879C17.9049 10.1477 17.0847 9.95673 16.5482 9.393C15.8174 8.62465 15.7645 7.4352 16.4242 6.605C16.4636 6.55633 16.5049 6.50933 16.5482 6.464L17.9622 5L19.3762 6.464C20.1576 7.28401 20.1576 8.57299 19.3762 9.393V9.393Z"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>

                <h1 class="grid grid-cols-1 space-x-1 text-5xl font-extrabold dark:text-white text-center">
                    <small class="col-span-full ml-2 font-semibold text-gray-500 dark:text-gray-400">
                        Infelizmente você ainda não possui nenhum
                        <span class="text-black">aplicativo</span>
                    </small>

                </h1>
                <h1 class="grid grid-cols-1 space-x-1 text-2xl font-extrabold dark:text-white text-center">
                    <small class="col-span-full ml-2 font-semibold text-gray-500 dark:text-gray-400">
                        Clique no botão abaixo para adiquirir um dos nossos aplicativos
                    </small>

                </h1>
            </div>
        </div>
    </div>

    @endif
    <div class="w-full flex justify-center py-5">
        <a href="{{ route('shopping') }}" rel="noreferrer noopener"
            class="mx-auto flex px-5 mt-4 lg:mt-0 py-3 rounded-md border
            bg-[#F3FB04] text-black">
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
