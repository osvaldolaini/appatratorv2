<div class="w-100 pt-3 sm:rounded-lg">
    @if ($vouchers)
        <div class="flex flex-wrap sm:justify-around">
            <div class="w-full ">
                <div class="py-4 space-x-4 ">
                    <h1
                        class="grid grid-cols-1 sm:grid-cols-4 space-x-1 text-5xl font-extrabold dark:text-white text-center">
                        <small class="col-span-full ml-2 font-semibold text-gray-500 dark:text-gray-400">
                            Meus Cursos
                        </small>
                        @foreach ($vouchers as $voucher)
                            @if ($voucher->course)
                                <div class="col-span-1 mt-5 flex items-center justify-center">
                                    <div wire:click="goCourse('{{ $voucher->course->code }}')"
                                        class="w-56 h-60
                                            bg-white drop-shadow-xl rounded-box mr-4
                                            cursor-pointer card card-compact shadow-xl">

                                        <figure>
                                            <img class="w-full mx-auto"
                                                src="{{ 'https://atratorconcursos.com.br/storage/images/courses/' . $voucher->course->id . '/thumb.jpg' }}"
                                                alt="{{ $voucher->course->code }}">
                                        </figure>
                                        <div class="card-body">
                                            <p class="font-extrabold">{{ $voucher->course->title }}</p>

                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </h1>
                </div>
            </div>
        </div>
    @endif


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
        {{-- @livewire('user.courses.all-courses') --}}
    </div>
</div>
