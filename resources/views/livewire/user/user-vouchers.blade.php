<x-action-section>
    <x-slot name="title">
        Suas aplicações
    </x-slot>

    <x-slot name="description">
        Gerencie suas aplicações, inclua novos vouchers clicando no botão.
        <div class="flex items-center mt-5">
            <x-button wire:click="showModalInsert" wire:loading.attr="disabled">
                Inserir voucher
            </x-button>
        </div>
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600 dark:text-gray-400">
            Nessa área você irá incluir seus vouchers adiquiridos. Os acessos as aplicações compradas nos pacotes de
            cursos serão adicionados automaticamente. Para utilizar você deve ativa-los.
        </div>
        @if (count($this->vouchers) > 0)
            <div class="mt-5 space-y-6">
                <!-- Other Browser Sessions -->
                <div class="overflow-x-auto">
                    <table class="table w-full text-sm ">
                        <thead>
                            <tr>
                                <th>Aplicativo / Curso</th>
                                <th>Voucher</th>
                                <th>Validade</th>
                                <th>Exluir / Ativar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($this->vouchers as $voucher)
                                <div class="flex items-center">
                                    <!-- row 1 -->
                                    <tr>
                                        <th>{{ $voucher->app }}</th>
                                        <td>
                                            <div class="tooltip tooltip-right" data-tip="{{ $voucher->code }}">
                                                <button>{{ mb_strimwidth($voucher->code, 0, 10, '...') }}</button>
                                            </div>
                                        </td>
                                        <td>
                                            @if ($voucher->plan->unity == 'Unidade')
                                                {{ $voucher->limit_access ? $voucher->limit_access . ' ou ' . $voucher->qtd . ' Un' : 'Não ativado' }}
                                            @else
                                                {{ $voucher->limit_access ? $voucher->limit_access : 'Não ativado' }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($voucher->limit_access < date('Y-m-d h:i:s') && $voucher->limit_access != null or $voucher->active == 4)
                                                <span
                                                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                    <svg class="w-5 h-5 mx-1" fill="currentColor"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor">
                                                        <path
                                                            d="M20,3a1,1,0,0,0,0-2H4A1,1,0,0,0,4,3H5.049c.146,1.836.743,5.75,3.194,8-2.585,2.511-3.111,7.734-3.216,10H4a1,1,0,0,0,0,2H20a1,1,0,0,0,0-2H18.973c-.105-2.264-.631-7.487-3.216-10,2.451-2.252,3.048-6.166,3.194-8Zm-6.42,7.126a1,1,0,0,0,.035,1.767c2.437,1.228,3.2,6.311,3.355,9.107H7.03c.151-2.8.918-7.879,3.355-9.107a1,1,0,0,0,.035-1.767C7.881,8.717,7.227,4.844,7.058,3h9.884C16.773,4.844,16.119,8.717,13.58,10.126ZM12,13s3,2.4,3,3.6V20H9V16.6C9,15.4,12,13,12,13Z" />
                                                    </svg>
                                                    <span
                                                        class="mx-1">{{ $voucher->active == 4 ? 'UTILIZADO' : 'EXPIRADO' }}</span>
                                                </span>
                                            @else
                                                @if ($voucher->active == 0)
                                                    <button wire:click="showModalActive({{ $voucher->id }})"
                                                        class="inline-flex items-center justify-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                        <svg class="w-5 h-5 mx-1" fill="currentColor"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                            fill="none">
                                                            <path opacity="0.1"
                                                                d="M4 5.49683V18.5032C4 20.05 5.68077 21.0113 7.01404 20.227L18.0694 13.7239C19.384 12.9506 19.384 11.0494 18.0694 10.2761L7.01404 3.77296C5.68077 2.98869 4 3.95 4 5.49683Z"
                                                                fill="currentColor" />
                                                            <path
                                                                d="M4 5.49683V18.5032C4 20.05 5.68077 21.0113 7.01404 20.227L18.0694 13.7239C19.384 12.9506 19.384 11.0494 18.0694 10.2761L7.01404 3.77296C5.68077 2.98869 4 3.95 4 5.49683Z"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                        <span class="mx-1">INICIAR</span>
                                                    </button>
                                                @elseif($voucher->active == 3)
                                                    <span
                                                        class="inline-flex items-center justify-center px-4 py-2 bg-yellow-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-500 active:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                        <svg class="w-5 h-5 mx-1" viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.1"
                                                                d="M3 12C3 4.5885 4.5885 3 12 3C19.4115 3 21 4.5885 21 12C21 19.4115 19.4115 21 12 21C4.5885 21 3 19.4115 3 12Z"
                                                                fill="#ffffff" />
                                                            <path d="M12 8L12 13" stroke="#ffffff" stroke-width="2"
                                                                stroke-linecap="round" />
                                                            <path d="M12 16V15.9888" stroke="#ffffff" stroke-width="2"
                                                                stroke-linecap="round" />
                                                            <path
                                                                d="M3 12C3 4.5885 4.5885 3 12 3C19.4115 3 21 4.5885 21 12C21 19.4115 19.4115 21 12 21C4.5885 21 3 19.4115 3 12Z"
                                                                stroke="#ffffff" stroke-width="2" />
                                                        </svg>
                                                        <span class="mx-1">EXCLUÍDO</span>
                                                    </span>
                                                @else
                                                    <button title="Apagar" wire:click="showModal({{ $voucher->id }})"
                                                        class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                        <svg class="w-5 h-5 mx-1" fill="currentColor"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M10 12V17" stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M14 12V17" stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M4 7H20" stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path
                                                                d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path
                                                                d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                        <span class="mx-1">EXCLUIR</span>
                                                    </button>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif


        {{-- MODAL CREATE --}}
        <x-dialog-modal wire:model="showJetModal">
            <x-slot name="title">Excluir registro</x-slot>
            <x-slot name="content">
                <h2 class="h2">Deseja realmente excluir o registro?</h2>
                <p>Não será possível reverter esta ação!</p>
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('showJetModal')" class="mx-2">
                    Cancelar
                </x-secondary-button>
                <x-danger-button wire:click.prevent="delete({{ $voucher_id }})" wire.loading.attr='disable'>
                    Apagar registro
                </x-danger-button>
            </x-slot>
        </x-dialog-modal>
        {{-- MODAL ACTIVE VOUCHER --}}
        <x-dialog-modal wire:model="showActiveModal">
            <x-slot name="title">Ativar o voucher</x-slot>
            <x-slot name="content">
                <h2 class="h2">Deseja realmente ativar o registro?</h2>
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('showActiveModal')" class="mx-2">
                    Cancelar
                </x-secondary-button>
                <x-danger-button wire:click.prevent="activate({{ $voucher_id }})" wire.loading.attr='disable'>
                    Ativar
                </x-danger-button>
            </x-slot>
        </x-cdialog-modal>
        {{-- MODAL INSERT VOUCHER --}}
        <x-dialog-modal wire:model="showInsertModal">
            <x-slot name="title">Inserir voucher</x-slot>
            <x-slot name="content">
                <form wire:submit.prevent="insertVoucher">
                    <div class="grid gap-4 mb-1 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                        <div class="sm:col-span-2">
                            <label for="code"
                                class="block text-sm font-medium text-gray-900 dark:text-white">Voucher</label>
                            <input type="text" wire:model="code" name="code" id="code"
                                placeholder="Voucher" required=""
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            @error('code')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit"
                        class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        Inserir
                    </button>
                </form>
            </x-slot>
            <x-slot name="footer">
                <x-primary-button wire:click="$toggle('showInsertModal')" class="mx-2">
                    Fechar
                    </x-secondary-button>
            </x-slot>
        </x-dialog-modal>
    </x-slot>
</x-action-section>
