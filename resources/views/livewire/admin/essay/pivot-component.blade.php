<div>
    <form action="#" wire:submit.prevent="updatePoints" wire.loading.attr='disable'>
        <div class="col-span-2 sm:col-span-1">
            Pontos</label>
            <input type="text" wire:model='points' wire:change="updatePoints"
             placeholder="Pontos"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
            @error('points')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
    </form>
</div>
