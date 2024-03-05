<div >
    <form action="#" wire:submit.prevent="update" wire.loading.attr='disable'>
        @if ($training->exercise->unity == 'repeticao')
            <div class="col-span-2 sm:col-span-1">
                <label for="repeat"
                    class="block text-sm font-medium text-gray-900 dark:text-white">{{ $training->exercise->title }} (Repetições)</label>
                <input type="text" wire:model='repeat' wire:change="update" wire:debounce.500ms
                    placeholder="{{ $training->exercise->title }} (Repetições)"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                @error('repeat')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        @elseif ($training->exercise->unity == 'cm' or $training->exercise->unity == 'm' or $training->exercise->unity == 'km')
            <div class="col-span-2 sm:col-span-1">
                <label for="distance"
                    class="block text-sm font-medium text-gray-900 dark:text-white">
                    {{ $training->exercise->title }}
                    ({{ $training->exercise->unity }})</label>
                <input type="text" wire:model='distance' wire:change="update" wire:debounce.500ms
                    placeholder="{{ $training->exercise->title }} ({{ $training->exercise->unity }})"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                @error('distance')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        @elseif ($training->exercise->unity == 'min')
            <div class="col-span-2 sm:col-span-1" x-data x-init="Inputmask({
                'mask': '99:99'
            }).mask($refs.time)">
                <label for="time"
                    class="block text-sm font-medium text-gray-900 dark:text-white">{{ $training->exercise->title }}
                    ({{ $training->exercise->unity }})</label>
                <input type="text" x-ref="time"  wire:model='time' wire:change="update" wire:debounce.500ms
                    placeholder="{{ $training->exercise->title }} ({{ $training->exercise->unity }})"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                @error('time')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        @endif
    </form>
</div>
