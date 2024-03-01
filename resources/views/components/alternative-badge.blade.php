@props(['correct'])
<div>
    @switch($correct)
        @case(1)
        <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">
            Correta
            </span>
            @break
        @case(0)

                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-yellow-300 border border-yellow-300">
                    Errada
            </span>
            @break
        @default
    @endswitch
</div>
