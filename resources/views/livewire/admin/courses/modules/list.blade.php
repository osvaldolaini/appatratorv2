<div class="w-100">
    <div class="p-6 py-8 dark:bg-violet-400 dark:text-gray-900">
        <div class="container mx-auto">
            <div class="flex flex-col lg:flex-row items-center justify-between">
                <h2 class="text-center text-3xl tracki font-bold">{{ mb_strtoupper($breadcrumb) }}
                </h2>
                <button wire:click="modalCreate()"
                    class="flex px-5 items-center lg:mt-0 py-3 rounded-md
                    border dark:bg-gray-50 dark:text-gray-900 dark:border-gray-400">
                    <svg class="h-4 w-4 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                    </svg>
                    <span>Novo módulo</span>
                </button>
            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 sm:rounded-lg">
        <div>
            <div class="bg-white dark:bg-gray-800 sm:rounded-lg my-6 px-4 text-center">
                <div class="-mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8 text-center">
                    @foreach ($modules->sortBy('order') as $module)
                        <div class="mb-10 mx-5">
                            <div id="accordion-collapse rounded-md " data-accordion="collapse">
                                <h2 id="accordion-collapse-heading-top w-full text-center items-center">
                                    <div type="button"
                                        class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                                        data-accordion-target="#accordion-collapse-body-top" aria-expanded="true"
                                        aria-controls="accordion-collapse-body-top">
                                        <div class="grid grid-cols-8 gap-2 mx-2 ">
                                            <div class="col-span-full sm:col-span-1" wire:ignore>
                                                @livewire('admin.course.modules.upload-image', [$module->id])
                                            </div>
                                            <div class="col-span-full sm:col-span-4 pl-2">
                                                <div>
                                                    <h1 class="text-3xl font-bold">{{ $module->title }}</h1>
                                                    <div class="max-w-xs" id="{{ $module->id }}-moduleDescription">
                                                        <p>
                                                            {{ substr(strip_tags($module->description), 0, 50) }}...
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-span-full sm:col-span-3">
                                                <div
                                                    class="block space-x-2 space-y-2 justify-start font-medium duration-200 ">
                                                    @if ($module->active == 1)
                                                        <button wire:click="buttonActive({{ $module->id }})"
                                                            class="btn btn-outline btn-sm
                                                                hover:text-white text-green-500 dark:hover:bg-green-500 transition-colors hover:bg-green-500
                                                                duration-200 whitespace-nowrap">
                                                            Ativo
                                                            <svg class="h-6 w-6 " viewBox="0 -6 32 32" version="1.1"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                                                                <g id="Page-1" stroke="none" stroke-width="1"
                                                                    fill="none" fill-rule="evenodd"
                                                                    sketch:type="MSPage">
                                                                    <g id="Icon-Set-Filled" sketch:type="MSLayerGroup"
                                                                        transform="translate(-258.000000, -367.000000)"
                                                                        fill="currentColor">
                                                                        <path
                                                                            d="M280,383 C276.687,383 274,380.313 274,377 C274,373.687 276.687,371 280,371 C283.313,371 286,373.687 286,377 C286,380.313 283.313,383 280,383 L280,383 Z M280,367 L268,367 C262.477,367 258,371.478 258,377 C258,382.522 262.477,387 268,387 L280,387 C285.523,387 290,382.522 290,377 C290,371.478 285.523,367 280,367 L280,367 Z M280,373 C277.791,373 276,374.791 276,377 C276,379.209 277.791,381 280,381 C282.209,381 284,379.209 284,377 C284,374.791 282.209,373 280,373 L280,373 Z"
                                                                            id="toggle-off" sketch:type="MSShapeGroup">

                                                                        </path>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                        @else
                                                            <button wire:click="buttonActive({{ $module->id }})"
                                                                class="btn btn-outline btn-sm hover:text-white text-red-500 dark:hover:bg-red-500 transition-colors hover:bg-red-500
                                                                duration-200 whitespace-nowrap">Desativo
                                                                <svg class="h-6 w-6 " viewBox="0 -6 32 32"
                                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                    xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">

                                                                    <g id="Page-1" stroke="none" stroke-width="1"
                                                                        fill="none" fill-rule="evenodd"
                                                                        sketch:type="MSPage">
                                                                        <g id="Icon-Set" sketch:type="MSLayerGroup"
                                                                            transform="translate(-204.000000, -365.000000)"
                                                                            fill="currentColor">
                                                                            <path
                                                                                d="M214,379 C211.791,379 210,377.209 210,375 C210,372.791 211.791,371 214,371 C216.209,371 218,372.791 218,375 C218,377.209 216.209,379 214,379 L214,379 Z M214,369 C210.687,369 208,371.687 208,375 C208,378.313 210.687,381 214,381 C217.314,381 220,378.313 220,375 C220,371.687 217.314,369 214,369 L214,369 Z M226,383 L214,383 C209.582,383 206,379.418 206,375 C206,370.582 209.582,367 214,367 L226,367 C230.418,367 234,370.582 234,375 C234,379.418 230.418,383 226,383 L226,383 Z M226,365 L214,365 C208.477,365 204,369.478 204,375 C204,380.522 208.477,385 214,385 L226,385 C231.523,385 236,380.522 236,375 C236,369.478 231.523,365 226,365 L226,365 Z"
                                                                                id="toggle-on"
                                                                                sketch:type="MSShapeGroup">

                                                                            </path>
                                                                        </g>
                                                                    </g>
                                                                </svg>
                                                            </button>
                                                    @endif
                                                    <button wire:click="showModalUpdate({{ $module->id }})"
                                                        class="btn btn-outline btn-sm">Editar
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 "
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                    <button wire:click="showModalDelete({{ $module->id }})"
                                                        class="btn btn-outline btn-sm">Apagar
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                    {{-- <button wire:click="showModalRead({{ $module->id }})"
                                                        class="btn btn-outline btn-sm">Ver
                                                        <svg stroke="currentColor" class="w-5 h-5 sm:w-6 sm:h-6"
                                                            viewBox="0 0 24 24" fill="currentColor"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M6.30147 15.5771C4.77832 14.2684 3.6904 12.7726 3.18002 12C3.6904 11.2274 4.77832 9.73158 6.30147 8.42294C7.87402 7.07185 9.81574 6 12 6C14.1843 6 16.1261 7.07185 17.6986 8.42294C19.2218 9.73158 20.3097 11.2274 20.8201 12C20.3097 12.7726 19.2218 14.2684 17.6986 15.5771C16.1261 16.9282 14.1843 18 12 18C9.81574 18 7.87402 16.9282 6.30147 15.5771ZM12 4C9.14754 4 6.75717 5.39462 4.99812 6.90595C3.23268 8.42276 2.00757 10.1376 1.46387 10.9698C1.05306 11.5985 1.05306 12.4015 1.46387 13.0302C2.00757 13.8624 3.23268 15.5772 4.99812 17.0941C6.75717 18.6054 9.14754 20 12 20C14.8525 20 17.2429 18.6054 19.002 17.0941C20.7674 15.5772 21.9925 13.8624 22.5362 13.0302C22.947 12.4015 22.947 11.5985 22.5362 10.9698C21.9925 10.1376 20.7674 8.42276 19.002 6.90595C17.2429 5.39462 14.8525 4 12 4ZM10 12C10 10.8954 10.8955 10 12 10C13.1046 10 14 10.8954 14 12C14 13.1046 13.1046 14 12 14C10.8955 14 10 13.1046 10 12ZM12 8C9.7909 8 8.00004 9.79086 8.00004 12C8.00004 14.2091 9.7909 16 12 16C14.2092 16 16 14.2091 16 12C16 9.79086 14.2092 8 12 8Z" />
                                                        </svg>
                                                    </button> --}}
                                                    <button wire:click="modalOrder({{ $module->id }})"
                                                        class="btn btn-outline btn-sm">Ordenar
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 "
                                                            viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M4 7L7 7M20 7L11 7" stroke="currentColor"
                                                                stroke-width="1.5" stroke-linecap="round" />
                                                            <path d="M20 17H17M4 17L13 17" stroke="currentColor"
                                                                stroke-width="1.5" stroke-linecap="round" />
                                                            <path d="M4 12H7L20 12" stroke="currentColor"
                                                                stroke-width="1.5" stroke-linecap="round" />
                                                        </svg>
                                                    </button>
                                                    <button wire:click="newContent({{ $module->id }})"
                                                        class="btn btn-outline btn-sm">Novo conteúdo
                                                        <svg class="h-6 w-6 mr-2" fill="currentColor"
                                                            viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                                                            aria-hidden="true">
                                                            <path clip-rule="evenodd" fill-rule="evenodd"
                                                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </h2>
                                <div id="accordion-collapse-body-top" class="hidden"
                                    aria-labelledby="accordion-collapse-heading-top">
                                </div>

                                <h2 class="items-center justify-between w-full text-center"
                                    id="accordion-collapse-heading-{{ $module->id }}">
                                    <button type="button"
                                        class="flex items-center justify-between w-full p-5 text-center
                                    font-medium  text-gray-500 border border-gray-200
                                    focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800
                                    dark:border-gray-700 dark:text-white hover:bg-gray-100
                                    dark:hover:bg-gray-800"
                                        data-accordion-target="#accordion-collapse-body-{{ $module->id }}"
                                        aria-expanded="true"
                                        aria-controls="accordion-collapse-body-{{ $module->id }}">
                                        <span>Conteúdos
                                            <div class="hidden badge badge-md"></div>
                                        </span>
                                        <svg data-accordion-icon class="w-8 h-8 shrink-0" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 13l-3 3m0 0l-3-3m3 3V8m0 13a9 9 0 110-18 9 9 0 010 18z"></path>
                                        </svg>
                                    </button>
                                </h2>
                                <div id="accordion-collapse-body-{{ $module->id }}" class="hidden"
                                    aria-labelledby="accordion-collapse-heading-{{ $module->id }}">
                                    @foreach ($module->contents->sortBy('order') as $content)
                                        @if (isset($content))
                                            @livewire('admin.course.contents.modules-content-list', [$content->id])
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    {{-- MODAL DELETE --}}
    <x-confirmation-modal wire:model="showJetModal">
        <x-slot name="title">
            Excluir registro
        </x-slot>

        <x-slot name="content">
            <h2 class="h2">Deseja realmente excluir o registro?</h2>
            <p>Não será possível reverter esta ação!</p>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('showJetModal')" wire:loading.attr="disabled">
                Cancelar
            </x-secondary-button>

            <x-danger-button class="ml-2" wire:click="delete({{ $registerId }})" wire:loading.attr="disabled">
                Apagar registro
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>

    {{-- MODAL READ --}}
    <x-dialog-modal wire:model="showModalView">
        <x-slot name="title">Detalhes</x-slot>
        <x-slot name="content">
            <dl class="max-w text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                @if ($detail)
                    @foreach ($detail as $item => $value)
                        @if ($value)
                            @if ($item == 'Foto')
                                <figure class="w-48">
                                    <img class="photo" src="{{ $value }}" alt="Movie" />
                                </figure>
                            @else
                                <div class="flex flex-col pb-1">
                                    <dt class="text-gray-500 md:text-lg dark:text-gray-400">{{ $item }}:</dt>
                                    <dd class="text-lg font-semibold">
                                        {{ $value }}
                                    </dd>
                                </div>
                            @endif
                        @endif
                    @endforeach
                @endif
                @if ($logs)
                    {!! $logs !!}
                @endif
            </dl>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('showModalView')" class="mx-2">
                Fechar
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
    {{-- MODAL ORDER --}}
    <x-dialog-modal wire:model="showModalOrder">
        <x-slot name="title">Ordenar</x-slot>
        <x-slot name="content">
            <form>
                <div class="grid gap-4 mb-1 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                    <div class="col-span-2 ">
                        <form id="positionForm">
                            <div class="grid grid-cols-6 space-x-1">
                                @foreach ($modules as $card)
                                    <div class="flex col-span-1">
                                        <label for="type"
                                            class="items-center justify-between p-5 bg-white border
                                            rounded-lg cursor-pointer dark:hover:text-gray-300
                                            dark:border-gray-700 hover:text-gray-600 hover:bg-gray-100
                                            dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700
                                            {{ $order == $card->order ? 'dark:text-blue-500 border-blue-600 text-blue-600' : 'border-gray-200 text-gray-500' }}">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">
                                                    <input type="radio"
                                                        @if ($order == $card->order) checked @endif
                                                        value="{{ $card->order }}" wire:click="rOrder()"
                                                        wire:model.live="order" class="radio checked:bg-blue-500" />
                                                    {{ $card->order }}°
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </form>
                        @error('order')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
            </form>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('showModalOrder')" class="mx-2">
                Fechar
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
    {{-- MODAL ORDER --}}
    <x-dialog-modal wire:model="showModalNewContent">
        <x-slot name="title">Tipo do conteúdo</x-slot>
        <x-slot name="content">
            <form>
                <div class="grid gap-4 mb-1 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                    <div class="col-span-2 ">
                        <div class="grid grid-cols-3 space-x-1">
                            <div class="col-span-1">
                                <div class="card w-full bg-neutral text-neutral-content cursor-pointer"
                                    wire:click="goContent('video')">
                                    <div class="card-body items-center text-center">
                                        <h2 class="card-title"><svg class="h-6 w-6 mr-2" viewBox="0 0 24 24"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.5 9V15M6.5 12H12.5M16 10L18.5768 8.45392C19.3699 7.97803 19.7665 7.74009 20.0928 7.77051C20.3773 7.79703 20.6369 7.944 20.806 8.17433C21 8.43848 21 8.90095 21 9.8259V14.1741C21 15.099 21 15.5615 20.806 15.8257C20.6369 16.056 20.3773 16.203 20.0928 16.2295C19.7665 16.2599 19.3699 16.022 18.5768 15.5461L16 14M6.2 18H12.8C13.9201 18 14.4802 18 14.908 17.782C15.2843 17.5903 15.5903 17.2843 15.782 16.908C16 16.4802 16 15.9201 16 14.8V9.2C16 8.0799 16 7.51984 15.782 7.09202C15.5903 6.71569 15.2843 6.40973 14.908 6.21799C14.4802 6 13.9201 6 12.8 6H6.2C5.0799 6 4.51984 6 4.09202 6.21799C3.71569 6.40973 3.40973 6.71569 3.21799 7.09202C3 7.51984 3 8.07989 3 9.2V14.8C3 15.9201 3 16.4802 3.21799 16.908C3.40973 17.2843 3.71569 17.5903 4.09202 17.782C4.51984 18 5.07989 18 6.2 18Z"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg></h2>
                                        <h2 class="card-title">Vídeo</h2>
                                        <p>Destinado à links de vídeo no youtube</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="card w-full bg-neutral text-neutral-content cursor-pointer"
                                    wire:click="goContent('download')">
                                    <div class="card-body items-center text-center">
                                        <h2 class="card-title"><svg class="h-6 w-6 mr-2" viewBox="0 0 24 24"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17 17H17.01M17.4 14H18C18.9319 14 19.3978 14 19.7654 14.1522C20.2554 14.3552 20.6448 14.7446 20.8478 15.2346C21 15.6022 21 16.0681 21 17C21 17.9319 21 18.3978 20.8478 18.7654C20.6448 19.2554 20.2554 19.6448 19.7654 19.8478C19.3978 20 18.9319 20 18 20H6C5.06812 20 4.60218 20 4.23463 19.8478C3.74458 19.6448 3.35523 19.2554 3.15224 18.7654C3 18.3978 3 17.9319 3 17C3 16.0681 3 15.6022 3.15224 15.2346C3.35523 14.7446 3.74458 14.3552 4.23463 14.1522C4.60218 14 5.06812 14 6 14H6.6M12 15V4M12 15L9 12M12 15L15 12"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg></h2>
                                        <h2 class="card-title">Download</h2>
                                        <p>Área para baixar conteúdo</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="card w-full bg-neutral text-neutral-content cursor-pointer"
                                    wire:click="goContent('text')">
                                    <div class="card-body items-center text-center">
                                        <h2 class="card-title"><svg class="h-6 w-6 mr-2" viewBox="0 0 24 24"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 3V21M9 21H15M19 6V3H5V6" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg></h2>
                                        <h2 class="card-title">Texto</h2>
                                        <p>área destinada a texto do autor na página</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @error('type')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
            </form>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('showModalNewContent')" class="mx-2">
                Fechar
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
</div>
