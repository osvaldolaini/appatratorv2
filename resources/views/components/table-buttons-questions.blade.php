@props(['id', 'active'])
<div class="w-full">
    <div class="flex justify-between font-medium duration-200 ">
        @if (isset($active))
            <x-table-toggle-active :active="$active" :id="$id">
            </x-table-toggle-active>
        @endif

        <div class="tooltip tooltip-top p-0" data-tip="Alternativas">
            <button wire:click="alternative({{ $id }})"
                class="py-2 px-3
                    hover:text-white dark:hover:bg-gray-300 transition-colors hover:hover:bg-gray-300
                    duration-200 whitespace-nowrap">
                <svg class="h-6 w-6" viewBox="0 -1.5 20.412 20.412" xmlns="http://www.w3.org/2000/svg">
                    <g id="check-lists" transform="translate(-1.588 -2.588)">
                        <path id="primary" d="M7,4,4.33,7,3,5.5" fill="none" stroke="currentColor"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                        <path id="primary-2" data-name="primary" d="M3,11.5,4.33,13,7,10" fill="none"
                            stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                        <path id="primary-3" data-name="primary" d="M3,17.5,4.33,19,7,16" fill="none"
                            stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                        <path id="primary-4" data-name="primary" d="M11,6H21M11,12H21M11,18H21" fill="none"
                            stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                    </g>
                </svg>
            </button>
        </div>
        <div class="tooltip tooltip-top p-0" data-tip="Filtros">
            <button wire:click="config({{ $id }})"
                class="py-2 px-3
                    hover:text-white dark:hover:bg-gray-300 transition-colors hover:hover:bg-gray-300
                    duration-200 whitespace-nowrap">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 20 20"
                    stroke="currentColor" stroke-width="2">
                    <path
                        d="M10 13a3 3 0 110-6 3 3 0 010 6zm7.476-1.246c-1.394-.754-1.394-2.754 0-3.508a1 1 0 00.376-1.404l-1.067-1.733a1 1 0 00-1.327-.355l-.447.243c-1.329.719-2.945-.244-2.945-1.755V3a1 1 0 00-1-1H8.934a1 1 0 00-1 1v.242c0 1.511-1.616 2.474-2.945 1.755l-.447-.243a1 1 0 00-1.327.355L2.148 6.842a1 1 0 00.376 1.404c1.394.754 1.394 2.754 0 3.508a1 1 0 00-.376 1.404l1.067 1.733a1 1 0 001.327.355l.447-.243c1.329-.719 2.945.244 2.945 1.755V17a1 1 0 001 1h2.132a1 1 0 001-1v-.242c0-1.511 1.616-2.474 2.945-1.755l.447.243a1 1 0 001.327-.355l1.067-1.733a1 1 0 00-.376-1.404z" />
                </svg>
            </button>
        </div>
        <div class="tooltip tooltip-top p-0" data-tip="Resposta correta">
            <button wire:click="correct({{ $id }})"
                class="py-2 px-3
                    hover:text-white dark:hover:bg-gray-300 transition-colors hover:hover:bg-gray-300
                    duration-200 whitespace-nowrap">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " viewBox="0 0 48 48" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0)">
                        <path
                            d="M42 20V39C42 40.6569 40.6569 42 39 42H9C7.34315 42 6 40.6569 6 39V9C6 7.34315 7.34315 6 9 6H30"
                            stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M16 20L26 28L41 7" stroke="currentColor" stroke-width="4" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </g>
                    <defs>
                        <clipPath id="clip0">
                            <rect width="48" height="48" fill="white" />
                        </clipPath>
                    </defs>
                </svg>
            </button>
        </div>

        <div class="tooltip tooltip-top p-0" data-tip="Editar">
            <button wire:click="showModalUpdate({{ $id }})"
                class="py-2 px-3
                        hover:text-white dark:hover:bg-blue-500 transition-colors hover:hover:bg-blue-500
                        duration-200 whitespace-nowrap">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                    </path>
                </svg>
            </button>
        </div>
        <div class="tooltip tooltip-top p-0" data-tip="Apagar">
            <button wire:click="showModalDelete({{ $id }})"
                class="py-2 px-3
                transition-colors dark:hover:bg-red-500 hover:hover:bg-red-500
                duration-200 hover:text-white -ml-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                    </path>
                </svg>
            </button>
        </div>
        <div class="tooltip tooltip-top p-0" data-tip="Ver">
            <button wire:click="showModalRead({{ $id }})"
                class="py-2 px-3 transition-colors
            dark:hover:bg-teal-500 hover:hover:bg-teal-500
            duration-200 hover:text-white -ml-1">
                <svg stroke="currentColor" class="w-5 h-5 sm:w-6 sm:h-6" viewBox="0 0 24 24" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M6.30147 15.5771C4.77832 14.2684 3.6904 12.7726 3.18002 12C3.6904 11.2274 4.77832 9.73158 6.30147 8.42294C7.87402 7.07185 9.81574 6 12 6C14.1843 6 16.1261 7.07185 17.6986 8.42294C19.2218 9.73158 20.3097 11.2274 20.8201 12C20.3097 12.7726 19.2218 14.2684 17.6986 15.5771C16.1261 16.9282 14.1843 18 12 18C9.81574 18 7.87402 16.9282 6.30147 15.5771ZM12 4C9.14754 4 6.75717 5.39462 4.99812 6.90595C3.23268 8.42276 2.00757 10.1376 1.46387 10.9698C1.05306 11.5985 1.05306 12.4015 1.46387 13.0302C2.00757 13.8624 3.23268 15.5772 4.99812 17.0941C6.75717 18.6054 9.14754 20 12 20C14.8525 20 17.2429 18.6054 19.002 17.0941C20.7674 15.5772 21.9925 13.8624 22.5362 13.0302C22.947 12.4015 22.947 11.5985 22.5362 10.9698C21.9925 10.1376 20.7674 8.42276 19.002 6.90595C17.2429 5.39462 14.8525 4 12 4ZM10 12C10 10.8954 10.8955 10 12 10C13.1046 10 14 10.8954 14 12C14 13.1046 13.1046 14 12 14C10.8955 14 10 13.1046 10 12ZM12 8C9.7909 8 8.00004 9.79086 8.00004 12C8.00004 14.2091 9.7909 16 12 16C14.2092 16 16 14.2091 16 12C16 9.79086 14.2092 8 12 8Z" />
                </svg>
            </button>
        </div>
    </div>
</div>
