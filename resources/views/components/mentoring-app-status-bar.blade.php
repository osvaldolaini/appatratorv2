<div class="w-100">
    @props(['progress' => null,'type'=>null])
    @php
        $percent = 0;
        if ($progress['value'] > 0 && $progress['max'] > 0) {
            $percent = ($progress['value'] * 100) / $progress['max'];
        }
    @endphp
    @if ($progress['max'] > 0 && $type == 1)
        <progress class="progress progress-info w-full" value="{{ $progress['value'] }}"
            max="{{ $progress['max'] }}"></progress>
        {{ $percent }}%
    @endif

</div>
