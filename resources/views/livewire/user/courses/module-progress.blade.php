<div>
    @php
        $percent = 0;
        if ($module->progress['value'] > 0 && $module->progress['max'] > 0) {
            $percent = ($module->progress['value'] * 100) / $module->progress['max'];
        }
    @endphp
    @if ($module->progress['max'] > 0 && $module->type == 1)
        <progress class="progress progress-info w-full" value="{{ $module->progress['value'] }}"
            max="{{ $module->progress['max'] }}"></progress>
        {{ number_format($percent, 2) }}%
    @endif
</div>
