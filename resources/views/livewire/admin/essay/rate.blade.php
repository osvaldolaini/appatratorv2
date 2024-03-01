<div class="col-span-1">
    <label for="repeat" class="block text-sm font-medium text-gray-900 dark:text-white">{{ $rate->skills->title }}
        (Max: {{ $rate->points }})</label>
    <input wire:model='points' wire:change="updatePoints()" maxlength="4" type="number" max="{{ $rate->points }}"
        placeholder="{{ $rate->skills->title }} (Pontos)"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
    @error('points')
        <span class="error">{{ $message }}</span>
    @enderror
</div>
