@props(['id'=>null,'table'=>null,'placeholder'=>null,'data'])
<div>
    <div class="flex-none p-1">
        <button onclick="showDropdownOptions('{{ $table }}')"
            class="flex flex-row justify-between w-full px-1 py-2 text-gray-700
            bg-white border-2 border-white rounded-md shadow-md focus:outline-none
            focus:border-blue-600">
            <span class="select-none">{{ $placeholder }}</span>
            <svg id="arrow-down-{{ $table }}" class="w-5 h-5 stroke-current"
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
            </svg>
            <svg id="arrow-up-{{ $table }}" class="hidden w-5 h-5 stroke-current"
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                    clip-rule="evenodd" />
            </svg>
        </button>
        <div id="options_{{ $table }}"
            class="overflow-y-auto max-h-48 absolute hidden max-w-full py-2 mt-1 bg-white rounded-lg shadow-xl max-h-63">
            <ul class="dropdown-content menu p-2 rounded-lg overflow-y-auto">
                @foreach ($data as $item)
                    <li >
                        <label>
                            <input type="checkbox" id="{{ $table }}_{{ $item->id }}"
                                wire:click="updateSelectedFilters(
                                    '{{ $item->id }}',
                                    '{{ $item->title }}',
                                    '{{ $table }}'
                                )" />
                            {{ $item->title }}
                        </label>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <script>
        function showDropdownOptions(id) {
            document.getElementById("options_" + id).classList.toggle("hidden");
            document.getElementById("arrow-up-" + id).classList.toggle("hidden");
            document.getElementById("arrow-down-" + id).classList.toggle("hidden");
        }
    </script>
</div>

