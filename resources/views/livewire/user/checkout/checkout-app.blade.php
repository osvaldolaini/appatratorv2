<div class="relative mx-auto w-full bg-white text-[#F3FB04]">
    <div class="grid min-h-screen grid-cols-10 ">
        <div
            class="relative col-span-full flex flex-col py-6 px-10
            sm:pt-10 lg:col-span-5 lg:pt-10 bg-black ">
            <div class="px-8 pt-0 dark:bg-gray-50 dark:text-gray-800">
                <div class="flex items-center mx-auto container justify-center md:justify-between py-2">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}" aria-label="Ir para homepage">
                            <div class="">
                                {{-- @livewire('admin.logos') --}}
                                <x-application-logo></x-application-logo>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="p-6 pt-2 w-full">
                <div class="mx-auto">
                    <div class="flex flex-col justify-between">
                        <h2 class="text-center text-3xl tracking-tighter font-bold ">
                            {{ $packPivotApp->title }}
                        </h2>
                        <h2 class="text-left text-md tracking-tighter font-bold ">
                            {{ $packPivotApp->description }}
                        </h2>
                    </div>
                </div>
            </div>
            <div class="relative">
                <ul class="space-y-5">
                    @if ($packPivotApp->packageApp)
                        @foreach ($packPivotApp->packageApp as $item)
                            <li class="flex justify-between ">
                                <div class="inline-flex">
                                    <div class="bg-white">
                                        @if ($item->application == 'questions')
                                            <x-application-logo-questions
                                                class="m-auto h-10 sm:h-16"></x-application-logo-questions>
                                        @elseif ($item->application == 'treinament')
                                            <x-application-logo-tfm
                                                class="m-auto h-10 sm:h-16"></x-application-logo-tfm>
                                        @elseif ($item->application == 'essay')
                                            <x-application-logo-essay
                                                class="m-auto h-10 sm:h-16"></x-application-logo-essay>
                                        @elseif ($item->application == 'mentoring')
                                            <x-application-logo-mentoring
                                                class="m-auto h-10 sm:h-16"></x-application-logo-mentoring>
                                        @endif
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-base font-semibold ">
                                            {{ $item->app }}
                                        </p>
                                        <p class="text-sm font-medium  text-opacity-80">
                                            {{ $item->plan->qtdUnity }}
                                        </p>
                                    </div>
                                </div>
                                <p class="text-sm font-semibold ">
                                    @if ($loop->first)
                                        R$ {{ $packPivotApp->value }}
                                    @else
                                        Grátis no pacote
                                    @endif
                                </p>
                            </li>
                        @endforeach
                    @endif


                </ul>
                <div class="my-5 h-0.5 w-full bg-white bg-opacity-30"></div>
                <div class="space-y-2">
                    <p class="flex justify-between text-lg font-bold ">
                        <span>Total:</span>
                        <span>R$ {{ $packPivotApp->value }}</span>
                    </p>
                </div>
            </div>
        </div>
        <div
            class="relative col-span-full flex flex-col py-6 px-10
                sm:pt-10 lg:col-span-5 lg:pt-10 text-black">
            <div class="mx-auto w-full max-w-lg">
                <h1 class="relative text-2xl font-medium text-gray-700 sm:text-3xl">
                    Checkout Seguro
                    <span class="mt-2 block h-1 w-10 bg-gray-600 sm:w-20"></span>
                </h1>
                <form wire:submit="checkout" class="mt-10 flex flex-col space-y-4">
                    <div>
                        <label for="user_name" class="text-xs font-semibold text-gray-500">Cliente</label><input
                            type="text" wire:model="user_name" readonly
                            class="mt-1 block w-full rounded border-gray-300 bg-gray-50 py-3 px-4 text-sm placeholder-gray-300 shadow-sm outline-none transition focus:ring-2 focus:ring-gray-500" />
                    </div>
                    <div class="relative"><label for="card-number" class="text-xs font-semibold text-gray-500">Card
                        Dados do cartão</label><input type="text" id="card-number" name="card-number"
                            placeholder="1234-5678-XXXX-XXXX"
                            class="block w-full rounded border-gray-300 bg-gray-50 py-3 px-4 pr-10 text-sm placeholder-gray-300 shadow-sm outline-none transition focus:ring-2 focus:ring-gray-500" /><img
                            src="/images/uQUFIfCYVYcLK0qVJF5Yw.png" alt=""
                            class="absolute bottom-3 right-3 max-h-4" /></div>
                    <div>
                        <p class="text-xs font-semibold text-gray-500">Expiration date</p>
                        <div class="mr-6 flex flex-wrap">
                            <div class="my-1">
                                <label for="month" class="sr-only">Select expiration month</label><select
                                    name="month" id="month"
                                    class="cursor-pointer rounded border-gray-300 bg-gray-50 py-3 px-2 text-sm shadow-sm outline-none transition focus:ring-2 focus:ring-gray-500">
                                    <option value="">Month</option>
                                </select>
                            </div>
                            <div class="my-1 ml-3 mr-6">
                                <label for="year" class="sr-only">Select expiration year</label><select
                                    name="year" id="year"
                                    class="cursor-pointer rounded border-gray-300 bg-gray-50 py-3 px-2 text-sm shadow-sm outline-none transition focus:ring-2 focus:ring-gray-500">
                                    <option value="">Year</option>
                                </select>
                            </div>
                            <div class="relative my-1"><label for="security-code" class="sr-only">Security
                                    code</label><input type="text" id="security-code" name="security-code"
                                    placeholder="Security code"
                                    class="block w-36 rounded border-gray-300 bg-gray-50 py-3 px-4 text-sm placeholder-gray-300 shadow-sm outline-none transition focus:ring-2 focus:ring-gray-500" />
                            </div>
                        </div>
                    </div>
                    <div><label for="card-name" class="sr-only">Nome do titular do cartão</label><input type="text" id="card-name"
                            name="card-name" placeholder="Name on the card"
                            class="mt-1 block w-full rounded border-gray-300 bg-gray-50 py-3 px-4 text-sm placeholder-gray-300 shadow-sm outline-none transition focus:ring-2 focus:ring-gray-500" />
                    </div>
                </form>

                <div
                    class="flex flex-col items-center justify-center
                            flex-1 pb-8 px-8 sm:px-0 py-4 mx-auto">

                    <a href="#" type="button"
                        class="flex
                            items-center justify-center w-full
                         text-black bg-[#F3FB04] h-14 rounded-xl">
                        <div class="mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 1a1 1 0 10-2 0v3.586L8.707 3.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L12 4.586V1z"
                                    fill="currentColor" />
                                <path fill-rule="evenodd"
                                    d="M1 1a1 1 0 011-1h1.5A1.5 1.5 0 015 1.5V10h11.133l.877-6.141a1 1 0 111.98.282l-.939 6.571A1.5 1.5 0 0116.566 12H5v2h10a3 3 0 11-2.83 2H6.83A3 3 0 113 14.17V2H2a1 1 0 01-1-1zm13 16a1 1 0 112 0 1 1 0 01-2 0zM3 17a1 1 0 112 0 1 1 0 01-2 0z"
                                    fill="currentColor" />
                            </svg>
                        </div>
                        <div>
                            <div class="-mt-1  text-xl font-semibold tracking-wide">
                                Comprar
                            </div>
                        </div>
                    </a>
                </div>
                <p class="mt-2 text-center text-sm font-semibold text-gray-500">Ao fazer este pedido você concorda com os
                    <a href="https://atratorconcursos.com.br/termo-de-uso" class="whitespace-nowrap text-gray-400 underline hover:text-gray-600">Termos de uso</a>
                </p>
                {{-- <button type="submit"
                    class="mt-4 inline-flex w-full items-center justify-center rounded bg-gray-600 py-2.5 px-4 text-base font-semibold tracking-wide  text-opacity-80 outline-none ring-offset-2 transition hover:text-opacity-100 focus:ring-2 focus:ring-gray-500 sm:text-lg">Place
                    Order</button> --}}
            </div>
        </div>

    </div>
</div>
