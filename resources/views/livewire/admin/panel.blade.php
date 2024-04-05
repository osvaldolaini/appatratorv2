<div class="bg-white dark:bg-gray-800 pt-3 sm:rounded-lg">
    <div class="grid grid-cols-4 gap-2 w-full h-full">

        @if ($essays)
            <div
                class="row-span-2 col-span-full sm:col-span-2 h-full relative
            overflow-hidden bg-blue-500 text-white rounded-lg shadow-md w-full">
                <div class="flex items-center justify-between p-3">
                    <div class="flex items-center space-x-1">
                        <div class="-space-y-1">
                            <h2 class="text-sm font-semibold leadi">Redações para avaliar</h2>
                        </div>
                    </div>
                    <span title="Open options">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 1920 1920"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M480 106.667c-117.82 0-213.333 95.512-213.333 213.333v1280c0 117.82 95.512 213.333 213.333 213.333h960c117.82 0 213.333-95.512 213.333-213.333V320c0-117.82-95.512-213.333-213.333-213.333H480ZM480 0h960c176.731 0 320 143.269 320 320v1280c0 176.731-143.269 320-320 320H480c-176.731 0-320-143.269-320-320V320C160 143.269 303.269 0 480 0Zm106.667 320C527.757 320 480 367.756 480 426.667v106.666C480 592.243 527.756 640 586.667 640h746.666c58.91 0 106.667-47.756 106.667-106.667V426.667c0-58.91-47.756-106.667-106.667-106.667H586.667Zm0-106.667h746.666c117.821 0 213.334 95.513 213.334 213.334v106.666c0 117.821-95.513 213.334-213.334 213.334H586.667c-117.821 0-213.334-95.513-213.334-213.334V426.667c0-117.821 95.513-213.334 213.334-213.334ZM480 853.333h106.667c58.91 0 106.666 47.757 106.666 106.667 0 58.91-47.756 106.667-106.666 106.667H480c-58.91 0-106.667-47.757-106.667-106.667 0-58.91 47.757-106.667 106.667-106.667Zm426.667 0h106.666C1072.243 853.333 1120 901.09 1120 960c0 58.91-47.756 106.667-106.667 106.667H906.667C847.757 1066.667 800 1018.91 800 960c0-58.91 47.756-106.667 106.667-106.667Zm426.666 0H1440c58.91 0 106.667 47.757 106.667 106.667 0 58.91-47.757 106.667-106.667 106.667h-106.667c-58.91 0-106.666-47.757-106.666-106.667 0-58.91 47.756-106.667 106.666-106.667Zm-853.333 320h106.667c58.91 0 106.666 47.757 106.666 106.667 0 58.91-47.756 106.667-106.666 106.667H480c-58.91 0-106.667-47.757-106.667-106.667 0-58.91 47.757-106.667 106.667-106.667Zm426.667 0h106.666c58.91 0 106.667 47.757 106.667 106.667 0 58.91-47.756 106.667-106.667 106.667H906.667C847.757 1386.667 800 1338.91 800 1280c0-58.91 47.756-106.667 106.667-106.667Zm426.666 0H1440c58.91 0 106.667 47.757 106.667 106.667 0 58.91-47.757 106.667-106.667 106.667h-106.667c-58.91 0-106.666-47.757-106.666-106.667 0-58.91 47.756-106.667 106.666-106.667Zm-853.333 320h106.667c58.91 0 106.666 47.757 106.666 106.667 0 58.91-47.756 106.667-106.666 106.667H480c-58.91 0-106.667-47.757-106.667-106.667 0-58.91 47.757-106.667 106.667-106.667Zm426.667 0h106.666c58.91 0 106.667 47.757 106.667 106.667 0 58.91-47.756 106.667-106.667 106.667H906.667C847.757 1706.667 800 1658.91 800 1600c0-58.91 47.756-106.667 106.667-106.667Zm426.666 0H1440c58.91 0 106.667 47.757 106.667 106.667 0 58.91-47.757 106.667-106.667 106.667h-106.667c-58.91 0-106.666-47.757-106.666-106.667 0-58.91 47.756-106.667 106.666-106.667Z" />
                        </svg>
                    </span>
                </div>
                <div class="p-0 m-0 bg-white text-gray-900 w-full h-full rounded-b-md ">
                    <div class="w-full px-1 h-full">
                        <div class="overflow-x-auto">
                            <table class="w-full text-xs">
                                <thead>
                                    <tr class="text-left">
                                        <th class="py-3 px-2">Aluno</th>
                                        <th class="py-3 px-2">Redações</th>
                                        <th class="py-3 px-2">Avaliar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($essays as $item)
                                        <tr class="border-b border-opacity-20 ">
                                            <td class="py-3 px-2">
                                                <div class="flex items-center space-x-3">
                                                    <div class="avatar">
                                                        <div class="mask mask-squircle w-12 h-12">
                                                            <!-- Current Profile Photo -->
                                                            <div class="mt-2">
                                                                <img src="{{ $item->user->profile_photo_url }}"
                                                                    alt="{{ $item->user->name }}"
                                                                    class="rounded-full h-15 w-15
                                                                    object-cover">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-xs flex flex-row items-center">
                                                <div class="flex tooltip tooltip-bottom p-0 items-center"
                                                    data-tip="Baixar">
                                                    <button class="flex flex-row items-center"
                                                        wire:click="export({{ $item->id }})">
                                                        {{ $item->essay->title }}
                                                        <svg class="w-8 h-8" viewBox="0 0 400 400"
                                                            xmlns="http://www.w3.org/2000/svg">

                                                            <g id="xxx-word">
                                                                <path class="cls-1" fill="currentColor"
                                                                    d="M325,105H250a5,5,0,0,1-5-5V25a5,5,0,0,1,10,0V95h70a5,5,0,0,1,0,10Z" />
                                                                <path class="cls-1"
                                                                    d="M325,154.83a5,5,0,0,1-5-5V102.07L247.93,30H100A20,20,0,0,0,80,50v98.17a5,5,0,0,1-10,0V50a30,30,0,0,1,30-30H250a5,5,0,0,1,3.54,1.46l75,75A5,5,0,0,1,330,100v49.83A5,5,0,0,1,325,154.83Z" />
                                                                <path class="cls-1"
                                                                    d="M300,380H100a30,30,0,0,1-30-30V275a5,5,0,0,1,10,0v75a20,20,0,0,0,20,20H300a20,20,0,0,0,20-20V275a5,5,0,0,1,10,0v75A30,30,0,0,1,300,380Z" />
                                                                <path class="cls-1"
                                                                    d="M275,280H125a5,5,0,0,1,0-10H275a5,5,0,0,1,0,10Z" />
                                                                <path class="cls-1"
                                                                    d="M200,330H125a5,5,0,0,1,0-10h75a5,5,0,0,1,0,10Z" />
                                                                <path class="cls-1"
                                                                    d="M325,280H75a30,30,0,0,1-30-30V173.17a30,30,0,0,1,30-30h.2l250,1.66a30.09,30.09,0,0,1,29.81,30V250A30,30,0,0,1,325,280ZM75,153.17a20,20,0,0,0-20,20V250a20,20,0,0,0,20,20H325a20,20,0,0,0,20-20V174.83a20.06,20.06,0,0,0-19.88-20l-250-1.66Z" />
                                                                <path class="cls-1"
                                                                    d="M145,236h-9.61V182.68h21.84q9.34,0,13.85,4.71a16.37,16.37,0,0,1-.37,22.95,17.49,17.49,0,0,1-12.38,4.53H145Zm0-29.37h11.37q4.45,0,6.8-2.19a7.58,7.58,0,0,0,2.34-5.82,8,8,0,0,0-2.17-5.62q-2.17-2.34-7.83-2.34H145Z" />
                                                                <path class="cls-1"
                                                                    d="M183,236V182.68H202.7q10.9,0,17.5,7.71t6.6,19q0,11.33-6.8,18.95T200.55,236Zm9.88-7.85h8a14.36,14.36,0,0,0,10.94-4.84q4.49-4.84,4.49-14.41a21.91,21.91,0,0,0-3.93-13.22,12.22,12.22,0,0,0-10.37-5.41h-9.14Z" />
                                                                <path class="cls-1"
                                                                    d="M245.59,236H235.7V182.68h33.71v8.24H245.59v14.57h18.75v8H245.59Z" />
                                                            </g>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                            <td class="py-3 px-2">
                                                @switch($item->status)
                                                    @case(1)
                                                        <div class="py-2 px-3 badge badge-error badge-lg" class="">
                                                            {{ $item->status_admin }}
                                                        </div>
                                                    @break

                                                    @case(2)
                                                        <div class="tooltip tooltip-bottom p-0 " data-tip="Avaliar">
                                                            <a href="{{ route('essays.rating', $item->id) }}"
                                                                class="flex py-2 px-3
                                                                    hover:text-white rounded dark:hover:bg-blue-300 transition-colors
                                                                    hover:hover:bg-blue-300
                                                                    duration-200 ">
                                                                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill="currentColor" fill-rule="evenodd"
                                                                        clip-rule="evenodd"
                                                                        d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V7C19 7.55228 19.4477 8 20 8C20.5523 8 21 7.55228 21 7V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM22.1213 10.7071C20.9497 9.53553 19.0503 9.53553 17.8787 10.7071L16.1989 12.3869L11.2929 17.2929C11.1647 17.4211 11.0738 17.5816 11.0299 17.7575L10.0299 21.7575C9.94466 22.0982 10.0445 22.4587 10.2929 22.7071C10.5413 22.9555 10.9018 23.0553 11.2425 22.9701L15.2425 21.9701C15.4184 21.9262 15.5789 21.8353 15.7071 21.7071L20.5556 16.8586L22.2929 15.1213C23.4645 13.9497 23.4645 12.0503 22.2929 10.8787L22.1213 10.7071ZM18.3068 13.1074L19.2929 12.1213C19.6834 11.7308 20.3166 11.7308 20.7071 12.1213L20.8787 12.2929C21.2692 12.6834 21.2692 13.3166 20.8787 13.7071L19.8622 14.7236L18.3068 13.1074ZM16.8923 14.5219L18.4477 16.1381L14.4888 20.097L12.3744 20.6256L12.903 18.5112L16.8923 14.5219Z" />
                                                                </svg>
                                                            </a>
                                                        </div>
                                                    @break

                                                    @case(3)
                                                        <div class="py-2 px-3 badge badge-success badge-lg">
                                                            {{ statusEssayAdmin($item->status) }}</div>
                                                    @break

                                                    @default
                                                        <div class="py-2 px-3 badge badge-error badge-lg">
                                                            {{ statusEssayAdmin($item->status) }}</div>
                                                @endswitch
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        {{-- @foreach (json_decode($data) as $course)
            <div class="col-span-1 ">
                <div class="card card-compact image-full shadow-xl bg-cover">
                    <figure ><img class="w-full "
                            src="{{ 'https://atratorconcursos.com.br/storage/images/courses/' . $course->id . '/thumb.jpg' }}"
                            alt="{{ $course->slug }}">
                    </figure>
                    <div class="card-body">
                        <p class="font-extrabold">{{ $course->title }}</p>
                        <div class="card-actions justify-end">
                            <a href="{{ $course->slug }}" class="btn btn-primary">Editar</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach --}}

    </div>


</div>
