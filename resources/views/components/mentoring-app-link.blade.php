@props(['href' => null,'active' => null])
<div class="py-1 {{ Request::is($active) ? 'bg-gray-700' : '' }}">
    <a href="{{ $href }}" class="group relative flex flex-row justify-left px-1">
        <div class="{{ Request::is($active) ? 'opacity-0' : 'opacity-100 group-hover:opacity-0' }}">
            {{ $svg }}
        </div>
        <span
            class="{{ Request::is($active) ? 'opacity-0' : 'opacity-100 group-hover:opacity-0' }}
            flex justify-left px-1 py-1.5
            text-sm font-medium text-white"
        >
            {{ $title }}
        </span>
        <span class="{{ Request::is($active) ? 'opacity-100 text-yellow-300' : 'opacity-0 group-hover:opacity-100' }}
                    absolute flex justify-end px-2 py-1.5 text-md
                    font-medium text-white mx-auto"
        >
        {{ $title_hover }}
        </span>
    </a>
</div>
