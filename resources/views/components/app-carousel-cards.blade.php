@props(['qtd' => null])
<div>
    {{-- <div class="carousel max-w-md py-4 space-x-4 "> --}}
    <div class="py-4 space-x-4 grid grid-cols-1 sm:grid-cols-4">
        {{ $slot }}
    </div>
    {{-- <div class="hidden justify-center w-full py-2 gap-2 sm:flex">
        @for ($i = 0; $i < $qtd; $i++)
            <a href="#item{{ $i + 1 }}" class="btn btn-xs">{{ $i + 1 }}</a>
        @endfor
    </div> --}}
</div>
