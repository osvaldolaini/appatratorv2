<div class="w-100">
    <x-breadcrumb>
        <div class="grid grid-cols-8 gap-4 text-gray-600 ">
            <div class="col-span-6 justify-items-start">
                <h3 class="text-2xl font-bold tracki  dark:text-gray-50">
                    {{ mb_strtoupper($breadcrumb_title) }}
                </h3>
            </div>

            <div class="col-span-2 justify-items-end text-right">
                <div class="tooltip tooltip-top p-0" data-tip="Voltar">
                    <button wire:click="back()"
                        class="py-2 px-3 flex
                            hover:text-white dark:hover:bg-gray-300 transition-colors hover:hover:bg-gray-300
                            duration-200 whitespace-nowrap">
                            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M9.00002 15.3802H13.92C15.62 15.3802 17 14.0002 17 12.3002C17 10.6002 15.62 9.22021 13.92 9.22021H7.15002"
                                    stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M8.57 10.7701L7 9.19012L8.57 7.62012" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                    </button>
                </div>
            </div>
        </div>
    </x-breadcrumb>
    <div class="bg-white dark:bg-gray-800 pt-3 sm:rounded-lg">
        <div>
            <x-table-search></x-table-search>

            <div class=" bg-white dark:bg-gray-800 sm:rounded-lg my-6 px-4">
                <div class="-mx-4  overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden border border-gray-200 dark:border-gray-700 sm:rounded-lg">
                            <table style="width:100%" class='min-w-full divide-y divide-gray-200 dark:divide-gray-700'>
                                <thead class="bg-gray-50 dark:bg-gray-800">
                                    <tr scope="col"
                                        class="py-3.5 px-4 text-sm font-normal text-left text-gray-500
                                        dark:text-gray-400">
                                        <th scope="col"
                                            class="py-3.5 px-4 text-sm font-normal
                                                text-left text-gray-500
                                                dark:text-gray-400">
                                            Nome
                                        </th>
                                        <th scope="col"
                                            class="py-3.5 px-4 text-sm font-normal
                                                    text-left text-gray-500
                                                    dark:text-gray-400">
                                            Valores
                                        </th>
                                        <th scope="col"
                                            class="py-3.5 px-4 text-sm font-normal
                                                text-center text-gray-500
                                                dark:text-gray-400">
                                            Qtd parcelas
                                        </th>
                                        <th scope="col"
                                            class="py-3.5 px-4 text-sm font-normal
                                                text-center text-gray-500
                                                dark:text-gray-400">
                                            Parcela
                                        </th>
                                        <th scope="col"
                                            class="py-3.5 px-4 text-sm font-normal
                                                text-center text-gray-500
                                                dark:text-gray-400">
                                            Descrição
                                        </th>
                                        <th scope="col"
                                            class="py-3.5 px-4 text-sm font-normal
                                                text-center text-gray-500
                                                dark:text-gray-400">
                                            Pacote
                                        </th>

                                        <th scope="col"
                                            class="py-3.5 px-4 text-sm font-normal
                                                    text-center text-gray-500
                                                    dark:text-gray-400">
                                            Ações
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                    @if ($dataTable->isEmpty())
                                        <tr>
                                            <td colspan="5"
                                                class="py-1.5 px-4 text-sm font-normal  text-center text-gray-500 dark:text-gray-400">
                                                Nenhum resultado encontrado.
                                            </td>
                                        </tr>
                                    @else
                                        @foreach ($dataTable as $data)
                                            <tr>
                                                <td
                                                    class="py-1.5 px-4 text-sm font-normal  text-left text-gray-500 dark:text-gray-400">
                                                    {{ $data->title }}
                                                    @if ($data->active == 2)
                                                        <div class="badge badge-error gap-2 mx-1">
                                                            Excluido
                                                        </div>
                                                    @endif
                                                </td>
                                                <td
                                                    class="py-1.5 px-4 text-sm font-normal  text-center text-gray-500 dark:text-gray-400">
                                                    {{ $data->value }}
                                                </td>
                                                <td
                                                    class="w-1/6 py-1.5 px-4 text-sm font-normal text-center text-gray-500 dark:text-gray-400">
                                                    {{ $data->qtd_parcel }}
                                                </td>
                                                <td
                                                    class="w-1/6 py-1.5 px-4 text-sm font-normal text-center text-gray-500 dark:text-gray-400">
                                                    {{ $data->value_parcel }}
                                                </td>
                                                <td
                                                    class="w-1/6 py-1.5 px-4 text-sm font-normal text-center text-gray-500 dark:text-gray-400">
                                                    <div class="tooltip tooltip-top p-0" data-tip="Descrição">
                                                        <a href="{{ route('app-pack-description', $data->id) }}"
                                                            class="py-2 px-3 flex
                                                            hover:text-white dark:hover:bg-gray-300 transition-colors hover:hover:bg-gray-300
                                                            duration-200 whitespace-nowrap">
                                                            <svg class="h-6 w-6" viewBox="0 -1.5 20.412 20.412"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <g id="check-lists"
                                                                    transform="translate(-1.588 -2.588)">
                                                                    <path id="primary" d="M7,4,4.33,7,3,5.5"
                                                                        fill="none" stroke="currentColor"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2" />
                                                                    <path id="primary-2" data-name="primary"
                                                                        d="M3,11.5,4.33,13,7,10" fill="none"
                                                                        stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2" />
                                                                    <path id="primary-3" data-name="primary"
                                                                        d="M3,17.5,4.33,19,7,16" fill="none"
                                                                        stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2" />
                                                                    <path id="primary-4" data-name="primary"
                                                                        d="M11,6H21M11,12H21M11,18H21" fill="none"
                                                                        stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2" />
                                                                </g>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td
                                                    class="w-1/6 py-1.5 px-4 text-sm font-normal text-center text-gray-500 dark:text-gray-400">
                                                    <div class="tooltip tooltip-top p-0" data-tip="Items">
                                                        <a href="{{ route('app-pack-package', $data->id) }}"
                                                            class="py-2 px-3 flex
                                                            hover:text-white dark:hover:bg-gray-300 transition-colors hover:hover:bg-gray-300
                                                            duration-200 whitespace-nowrap">
                                                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M20.5 7.27783L12 12.0001M12 12.0001L3.49997 7.27783M12 12.0001L12 21.5001M14 20.889L12.777 21.5684C12.4934 21.726 12.3516 21.8047 12.2015 21.8356C12.0685 21.863 11.9315 21.863 11.7986 21.8356C11.6484 21.8047 11.5066 21.726 11.223 21.5684L3.82297 17.4573C3.52346 17.2909 3.37368 17.2077 3.26463 17.0893C3.16816 16.9847 3.09515 16.8606 3.05048 16.7254C3 16.5726 3 16.4013 3 16.0586V7.94153C3 7.59889 3 7.42757 3.05048 7.27477C3.09515 7.13959 3.16816 7.01551 3.26463 6.91082C3.37368 6.79248 3.52345 6.70928 3.82297 6.54288L11.223 2.43177C11.5066 2.27421 11.6484 2.19543 11.7986 2.16454C11.9315 2.13721 12.0685 2.13721 12.2015 2.16454C12.3516 2.19543 12.4934 2.27421 12.777 2.43177L20.177 6.54288C20.4766 6.70928 20.6263 6.79248 20.7354 6.91082C20.8318 7.01551 20.9049 7.13959 20.9495 7.27477C21 7.42757 21 7.59889 21 7.94153L21 12.5001M7.5 4.50008L16.5 9.50008M16 18.0001L18 20.0001L22 16.0001"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td
                                                    class="w-1/6 py-1.5 px-4 text-sm font-normal text-center text-gray-500 dark:text-gray-400">
                                                    <x-table-buttons id="{{ $data->id }}" :update="true"
                                                        :delete="true" :view="true" :active="$data->active">
                                                    </x-table-buttons>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="items-center justify-between  py-4">
                    {{ $dataTable->links() }}
                </div>
            </div>
        </div>
    </div>
    {{-- MODAL DELETE --}}
    <x-confirmation-modal wire:model="showJetModal">
        <x-slot name="title">
            Excluir registro
        </x-slot>

        <x-slot name="content">
            <h2 class="h2">Deseja realmente excluir o registro?</h2>
            <p>Não será possível reverter esta ação!</p>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('showJetModal')" wire:loading.attr="disabled">
                Cancelar
            </x-secondary-button>

            <x-danger-button class="ml-2" wire:click="delete({{ $registerId }})" wire:loading.attr="disabled">
                Apagar registro
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>

    {{-- MODAL READ --}}
    <x-dialog-modal wire:model="showModalView">
        <x-slot name="title">Detalhes</x-slot>
        <x-slot name="content">
            <dl class="max-w text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                @if ($detail)
                    @foreach ($detail as $item => $value)
                        @if ($value)
                            @if ($item == 'Foto')
                                <figure class="w-48">
                                    <img class="photo" src="{{ $value }}" alt="Movie" />
                                </figure>
                            @else
                                <div class="flex flex-col pb-1">
                                    <dt class="text-gray-500 md:text-lg dark:text-gray-400">{{ $item }}:</dt>
                                    <dd class="text-lg font-semibold">
                                        {{ $value }}
                                    </dd>
                                </div>
                            @endif
                        @endif
                    @endforeach
                @endif
                @if ($logs)
                    {!! $logs !!}
                @endif
            </dl>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('showModalView')" class="mx-2">
                Fechar
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
    {{-- MODAL CREATE --}}
    <x-dialog-modal wire:model="showModalCreate">
        <x-slot name="title">Inserir novo</x-slot>
        <x-slot name="content">
            <form>
                <div class="grid gap-2 mb-1 grid-cols-6 sm:mb-5">

                    <div class="col-span-6">
                        <label class="block text-sm font-medium text-gray-900 dark:text-white"
                            for="title">*Título</label>
                        <input
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Título" wire:model="title" required="">
                    </div>
                    <div class="col-span-4">
                        <label class="block text-sm font-medium text-gray-900 dark:text-white" for="link_hotmart">Link
                            hotmart</label>
                        <input
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Link hotmart" wire:model="link_hotmart" maxlength="100">
                    </div>
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-900 dark:text-white" for="link_hotmart">Link
                            ID preço STRIPE</label>
                        <input
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="ID preço STRIPE" wire:model="price_id" maxlength="100">
                    </div>

                    <div class="col-span-3">
                        <label for="value"
                            class="block text-sm font-medium text-gray-900 dark:text-white">*Valor</label>
                        <input
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Valor" wire:model="value" id="value" required>
                        @error('value')
                            <span class="error">{{ $message }}</span>
                        @enderror
                        <script>
                            // Receber o seletor do campo valor
                            let inputValorUpdate = document.getElementById('value');

                            // Aguardar o usuário digitar valor no campo
                            inputValorUpdate.addEventListener('input', function() {
                                // Obter o valor atual removendo qualquer caractere que não seja número
                                let valueValor = this.value.replace(/[^\d]/g, '');

                                // Adicionar os separadores de milhares
                                var formattedValor = (valueValor.slice(0, -2).replace(/\B(?=(\d{3})+(?!\d))/g, '.')) + '' + valueValor
                                    .slice(-2);

                                // Adicionar a vírgula e até dois dígitos se houver centavos
                                formattedValor = formattedValor.slice(0, -2) + ',' + formattedValor.slice(-2);

                                // Atualizar o valor do campo
                                this.value = formattedValor;

                            });
                        </script>
                    </div>
                    <div class="col-span-3">
                        <label class="block text-sm font-medium text-gray-900 dark:text-white"
                            for="qtd_parcel">Parcelas</label>
                        <input
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            data-wire:model="Parcelas " placeholder="Parcelas" wire:model="qtd_parcel">
                    </div>
                    <div class="col-span-3">
                        <label for="value_parcel"
                            class="block text-sm font-medium text-gray-900 dark:text-white">Valor da parcela</label>
                        <input
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Valor da parcela" wire:model="value_parcel" id="value_parcel" required>
                        @error('value_parcel')
                            <span class="error">{{ $message }}</span>
                        @enderror
                        <script>
                            // Receber o seletor do campo valor
                            let inputValorUpdate2 = document.getElementById('value_parcel');

                            // Aguardar o usuário digitar valor no campo
                            inputValorUpdate2.addEventListener('input', function() {
                                // Obter o valor atual removendo qualquer caractere que não seja número
                                let valueValor = this.value.replace(/[^\d]/g, '');

                                // Adicionar os separadores de milhares
                                var formattedValor = (valueValor.slice(0, -2).replace(/\B(?=(\d{3})+(?!\d))/g, '.')) + '' + valueValor
                                    .slice(-2);

                                // Adicionar a vírgula e até dois dígitos se houver centavos
                                formattedValor = formattedValor.slice(0, -2) + ',' + formattedValor.slice(-2);

                                // Atualizar o valor do campo
                                this.value = formattedValor;

                            });
                        </script>
                    </div>

                    <div class="col-span-3">
                        <label class="block text-sm font-medium text-gray-900 dark:text-white" for="see_value">Mostrar
                            valor? </label>
                        <select wire:model="see_value"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </select>
                    </div>

                </div>
            </form>
        </x-slot>
        <x-slot name="footer">
            <button type="submit" wire:click="store"
                class="text-white
                        bg-blue-700 hover:bg-blue-800
                        focus:ring-4 focus:outline-none focus:ring-blue-300
                        font-medium rounded-lg text-sm px-5 py-2.5
                        text-center dark:bg-blue-600 dark:hover:bg-blue-700
                        dark:focus:ring-blue-800">
                Salvar
            </button>
            <x-secondary-button wire:click="$toggle('showModalCreate')" class="mx-2">
                Fechar
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
    {{-- MODAL UPDATE --}}
    <x-dialog-modal wire:model="showModalEdit">
        <x-slot name="title">Editar</x-slot>
        <x-slot name="content">
            <form>
                <div class="grid gap-2 mb-1 grid-cols-6 sm:mb-5">

                    <div class="col-span-6">
                        <label class="block text-sm font-medium text-gray-900 dark:text-white"
                            for="title">*Título</label>
                        <input
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Título" wire:model="title" required="">
                    </div>
                    <div class="col-span-4">
                        <label class="block text-sm font-medium text-gray-900 dark:text-white" for="link_hotmart">Link
                            hotmart</label>
                        <input
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Link hotmart" wire:model="link_hotmart" maxlength="100">
                    </div>
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-900 dark:text-white" for="link_hotmart">Link
                            ID preço STRIPE</label>
                        <input
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="ID preço STRIPE" wire:model="price_id" maxlength="100">
                    </div>

                    <div class="col-span-3">
                        <label for="value"
                            class="block text-sm font-medium text-gray-900 dark:text-white">*Valor</label>
                        <input
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Valor" wire:model="value" id="value" required>
                        @error('value')
                            <span class="error">{{ $message }}</span>
                        @enderror
                        <script>
                            // Receber o seletor do campo valor
                            let inputValor = document.getElementById('value');

                            // Aguardar o usuário digitar valor no campo
                            inputValor.addEventListener('input', function() {
                                // Obter o valor atual removendo qualquer caractere que não seja número
                                let valueValor = this.value.replace(/[^\d]/g, '');

                                // Adicionar os separadores de milhares
                                var formattedValor = (valueValor.slice(0, -2).replace(/\B(?=(\d{3})+(?!\d))/g, '.')) + '' + valueValor
                                    .slice(-2);

                                // Adicionar a vírgula e até dois dígitos se houver centavos
                                formattedValor = formattedValor.slice(0, -2) + ',' + formattedValor.slice(-2);

                                // Atualizar o valor do campo
                                this.value = formattedValor;

                            });
                        </script>
                    </div>
                    <div class="col-span-3">
                        <label class="block text-sm font-medium text-gray-900 dark:text-white"
                            for="qtd_parcel">Parcelas</label>
                        <input
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            data-wire:model="Parcelas " placeholder="Parcelas" wire:model="qtd_parcel">
                    </div>
                    <div class="col-span-3">
                        <label for="value_parcel"
                            class="block text-sm font-medium text-gray-900 dark:text-white">Valor da parcela</label>
                        <input
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Valor da parcela" wire:model="value_parcel" id="value_parcel" required>
                        @error('value_parcel')
                            <span class="error">{{ $message }}</span>
                        @enderror
                        <script>
                            // Receber o seletor do campo valor
                            let inputValor2 = document.getElementById('value_parcel');

                            // Aguardar o usuário digitar valor no campo
                            inputValor2.addEventListener('input', function() {
                                // Obter o valor atual removendo qualquer caractere que não seja número
                                let valueValor = this.value.replace(/[^\d]/g, '');

                                // Adicionar os separadores de milhares
                                var formattedValor = (valueValor.slice(0, -2).replace(/\B(?=(\d{3})+(?!\d))/g, '.')) + '' + valueValor
                                    .slice(-2);

                                // Adicionar a vírgula e até dois dígitos se houver centavos
                                formattedValor = formattedValor.slice(0, -2) + ',' + formattedValor.slice(-2);

                                // Atualizar o valor do campo
                                this.value = formattedValor;

                            });
                        </script>
                    </div>

                    <div class="col-span-3">
                        <label class="block text-sm font-medium text-gray-900 dark:text-white" for="see_value">Mostrar
                            valor? </label>
                        <select wire:model="see_value"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </select>
                    </div>

                </div>
            </form>
        </x-slot>
        <x-slot name="footer">
            <button type="submit" wire:click="update"
                class="text-white
                        bg-blue-700 hover:bg-blue-800
                        focus:ring-4 focus:outline-none focus:ring-blue-300
                        font-medium rounded-lg text-sm px-5 py-2.5
                        text-center dark:bg-blue-600 dark:hover:bg-blue-700
                        dark:focus:ring-blue-800">
                Atualizar
            </button>
            <x-secondary-button wire:click="$toggle('showModalEdit')" class="mx-2">
                Fechar
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>

</div>
