<div>
    @if ($reviews > 0)
        <button wire:click="showReviews()" class="flex flex-nowrap mr-2 btn btn-outline btn-accent btn-sm">
            Revisões
            <div class="badge badge-accent text-white">
                {{ $reviews }}
            </div>
        </button>
    @else
        <button wire:click="showReviews()" class="flex flex-nowrap mr-2 btn btn-outline btn-error btn-sm">
            Revisões
            <div class="badge badge-error text-white">
                {{ $reviews }}
            </div>
        </button>
    @endif


    {{-- MODAL CREATE --}}
    <x-dialog-modal wire:model="showReviewsModal" class="mt-0">
        <x-slot name="title">Inserir revisão</x-slot>
        <x-slot name="content">
            <form action="#" wire:submit.prevent="storeReview()" wire.loading.attr='disable'>
                <div class="grid gap-4 mb-1 sm:grid-cols-3 sm:gap-6 sm:mb-5">
                    <div class="col-span-2 " x-data x-init="Inputmask({
                        'mask': '99/99/9999'
                    }).mask($refs.day)">
                        <label for="day" class="block text-sm font-medium text-gray-900 dark:text-white">Data
                        </label>
                        <input type="text" x-ref="day" wire:model="day" name="day" id="day"
                            placeholder="Data" required=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white1dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @error('day')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-span-1 ">
                        <label for="day" class="block text-sm font-medium text-gray-900 dark:text-white">
                            &nbsp;
                        </label>
                        <button type="submit"
                            class="text-white
                bg-blue-700 hover:bg-blue-800
                focus:ring-4 focus:outline-none focus:ring-blue-300
                font-medium rounded-lg text-sm px-5 py-2.5
                text-center dark:bg-blue-600 dark:hover:bg-blue-700
                dark:focus:ring-blue-800">
                            Salvar
                        </button>
                    </div>
                </div>
            </form>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click.prevent="$toggle('showReviewsModal')" class="mx-2">
                Fechar
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
</div>
