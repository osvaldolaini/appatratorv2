<div class="w-100 pb-52 sm:mb-3">
    <div class="bg-white shadow-md dark:bg-gray-800 pt-3 sm:rounded-lg">
        <div class=" bg-white shadow-md dark:bg-gray-800 sm:rounded-lg my-6 px-4 mb-4">
            <div class=" overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full align-middle md:px-6 lg:px-8">

                    <div
                        class="overflow-hidden border border-gray-200 dark:border-gray-700
                            sm:rounded-lg mb-5">
                        <div class="grid grid-cols-2 gap-4 px-4 py-2">
                            <div class="col-span-2 flex justify-center">
                                <h3 class="text-2xl font-bold tracki  dark:text-gray-50">
                                    {{ mb_strtoupper($breadcrumb) }}
                                </h3>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4 px-4 py-5 ">
                            @foreach ($topics as $item)
                                <div class="col-span-full sm:col-span-1 card shadow-xl bg-gray-100 text-gray-600">
                                    <div class="card bg-gray-100 shadow-xl">
                                        <figure>
                                            {!! $item->base !!}
                                        </figure>
                                        <div class="card-body">
                                            <h2 class="card-title">{{ $item->title }}</h2>
                                            <p>{{ $item->essay->title }}</p>
                                            <div class="card-actions justify-end">
                                                @if ($access == true)
                                                    <button class="btn btn-primary"
                                                        wire:click="showModalCreate({{ $item->id }})">Escrever</button>
                                                @else
                                                    <button
                                                        class="flex flex-row float-right p-2 bg-primary rounded-box text-primary-content ">
                                                        <h2 class="card-title mx-2">Sem pacote</h2>
                                                    </button>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <x-confirmation-modal wire:model="modalCreate">
        <x-slot name="title">Excluir registro</x-slot>
        <x-slot name="content">
            <h2 class="h2">O tema escolhido foi {{ $this->topicTitle }}?</h2>
            <p>Não será possível reverter esta ação!</p>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('modalCreate')" class="mx-2">
                Cancelar
            </x-secondary-button>
            <x-danger-button wire:click="store()" wire.loading.attr='disable'>
                Iniciar
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>
</div>
