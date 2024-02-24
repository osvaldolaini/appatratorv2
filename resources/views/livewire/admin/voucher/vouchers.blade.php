<div class="w-100">
    <x-breadcrumb>
        <div class="grid grid-cols-8 gap-4 text-gray-600 ">
            <div class="col-span-6 justify-items-start">
                <h3 class="text-2xl font-bold tracki  dark:text-gray-50">
                    {{ mb_strtoupper($breadcrumb) }}
                </h3>
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
                                            Usuário
                                        </th>

                                        <th scope="col"
                                            class="py-3.5 px-4 text-sm font-normal
                                                    text-center text-gray-500
                                                    dark:text-gray-400">
                                            Email
                                        </th>
                                        <th scope="col"
                                            class="py-3.5 px-4 text-sm font-normal
                                                    text-center text-gray-500
                                                    dark:text-gray-400">
                                            Aplicativo
                                        </th>
                                        <th scope="col"
                                            class="py-3.5 px-4 text-sm font-normal
                                                    text-center text-gray-500
                                                    dark:text-gray-400">
                                            Validade
                                        </th>
                                        <th scope="col"
                                            class="py-3.5 px-4 text-sm font-normal
                                                    text-center text-gray-500
                                                    dark:text-gray-400">
                                            Status
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
                                                    {{ ($data->user_id ? $data->user->name : 'Não selecionado') }}
                                                    @if ($data->active == 2)
                                                        <div class="badge badge-error gap-2 mx-1">
                                                            Excluido
                                                        </div>
                                                    @endif
                                                </td>
                                                <td
                                                    class="py-1.5 px-4 text-sm font-normal text-center itens-center text-gray-500 dark:text-gray-400">
                                                    {{ ($data->user_id ? $data->user->email : 'Não selecionado') }}
                                                </td>
                                                <td
                                                    class="py-1.5 px-4 text-sm font-normal text-center itens-center text-gray-500 dark:text-gray-400">
                                                    {{ $data->app }}
                                                </td>
                                                <td
                                                    class="py-1.5 px-4 text-sm font-normal text-center itens-center text-gray-500 dark:text-gray-400">
                                                    {{ $data->vality }}
                                                </td>
                                                <td
                                                    class="py-1.5 px-4 text-sm font-normal text-center itens-center text-gray-500 dark:text-gray-400">
                                                    <x-status-badge status="{{ $data->active }}"></x-status-badge>
                                                </td>
                                                <td
                                                    class="w-1/6 py-1.5 px-4 text-sm font-normal text-center text-gray-500 dark:text-gray-400">
                                                    @if ($data->active == 0)
                                                        <x-table-buttons id="{{ $data->id }}" :update="true"
                                                            :delete="true" :view="true" :active="$data->active">
                                                        </x-table-buttons>
                                                    @else
                                                        <x-table-buttons id="{{ $data->id }}" :update="true"
                                                            :delete="true" :view="true">
                                                        </x-table-buttons>
                                                    @endif

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
                            @if ($item == 'Voucher')
                            <div class="flex flex-col pb-1">
                                <dt class="text-gray-500 md:text-lg dark:text-gray-400">{{ $item }}:</dt>
                                <dd class="text-lg font-semibold flex ">
                                    <input type="text" readonly
                                    style="
                                    border-color: transparent;
                                    border-color: inherit;
                                    width:60%;
                                    "
                                    id="code" value="{{ $value }}">
                                    <button class="flex rounded-full bg-gray-200 p-2 ml-5"
                                    onclick="copyToClipboard('code')">Copiar
                                    <svg fill="#000000" class="h-8 w-8" viewBox="0 0 32 32" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"><title/><path d="M24.89,6.61H22.31V4.47A2.47,2.47,0,0,0,19.84,2H6.78A2.47,2.47,0,0,0,4.31,4.47V22.92a2.47,2.47,0,0,0,2.47,2.47H9.69V27.2a2.8,2.8,0,0,0,2.8,2.8h12.4a2.8,2.8,0,0,0,2.8-2.8V9.41A2.8,2.8,0,0,0,24.89,6.61ZM6.78,23.52a.61.61,0,0,1-.61-.6V4.47a.61.61,0,0,1,.61-.6H19.84a.61.61,0,0,1,.61.6V6.61h-8a2.8,2.8,0,0,0-2.8,2.8V23.52Zm19,3.68a.94.94,0,0,1-.94.93H12.49a.94.94,0,0,1-.94-.93V9.41a.94.94,0,0,1,.94-.93h12.4a.94.94,0,0,1,.94.93Z"/><path d="M23.49,13.53h-9.6a.94.94,0,1,0,0,1.87h9.6a.94.94,0,1,0,0-1.87Z"/><path d="M23.49,17.37h-9.6a.94.94,0,1,0,0,1.87h9.6a.94.94,0,1,0,0-1.87Z"/><path d="M23.49,21.22h-9.6a.93.93,0,1,0,0,1.86h9.6a.93.93,0,1,0,0-1.86Z"/></svg>
                                    </button>
                                </dd>
                            </div>
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
            <form wire:submit="store">
                <div class="grid gap-4 mb-1 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                    <div class="col-span-2 ">
                        <label for="title" class="block text-sm font-medium text-gray-900 dark:text-white">
                            *Título</label>
                            <div class="grid gap-4 mb-1 grid-cols-1">
                                <fieldset class="col-span-1 w-full space-y-1 dark:text-gray-100"
                                    wire:click="openModalSearch('user')" wire:ignore>
                                    <label for="Search" class="hidden">Pesquisar </label>
                                    <div class="relative w-full">
                                        <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                                            <button type="button" title="search" class="p-1 focus:outline-none focus:ring">
                                                <svg fill="currentColor" viewBox="0 0 512 512"
                                                    class="w-4 h-4 dark:text-gray-100">
                                                    <path
                                                        d="M479.6,399.716l-81.084-81.084-62.368-25.767A175.014,175.014,0,0,0,368,192c0-97.047-78.953-176-176-176S16,94.953,16,192,94.953,368,192,368a175.034,175.034,0,0,0,101.619-32.377l25.7,62.2L400.4,478.911a56,56,0,1,0,79.2-79.195ZM48,192c0-79.4,64.6-144,144-144s144,64.6,144,144S271.4,336,192,336,48,271.4,48,192ZM456.971,456.284a24.028,24.028,0,0,1-33.942,0l-76.572-76.572-23.894-57.835L380.4,345.771l76.573,76.572A24.028,24.028,0,0,1,456.971,456.284Z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </span>
                                        <input type="text" readonly placeholder="Pesquisar" wire:model.live="user"
                                            class="w-full border-blue-500 py-3 pl-10 text-sm text-gray-900
                                            rounded-2xl  focus:ring-primary-500 dark:bg-gray-700
                                            dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500"
                                            autofocus />
                                    </div>
                                    @error('user_id')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </fieldset>
                            </div>
                        @error('title')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-span-2 ">
                        <label for="plan_id" class="block text-sm font-medium text-gray-900 dark:text-white">
                            *Plano</label>
                        <select wire:model="plan_id" required="" name="plan_id" id="plan_id" placeholder="Plano"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="">Selecione uma opção</option>
                            @foreach ($plans as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                        @error('plan_id')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-span-2 ">
                        <label for="unity" class="block text-sm font-medium text-gray-900 dark:text-white">
                            *Aplicativos</label>
                            <div id="tabs" class="flex justify-between">
                                <label class="w-full justify-center inline-block text-center pt-2 pb-1">
                                    <input type="checkbox" value="questions" wire:model="applications"
                                        name="applications[]"  class="checkbox checkbox-primary" />
                                    <span class="tab tab-explore block text-xs">Questões</span>
                                </label>
                                <label class="w-full justify-center inline-block text-center pt-2 pb-1">
                                    <input type="checkbox" value="treinament" wire:model="applications"
                                        name="applications[]"  class="checkbox checkbox-primary" />
                                    <span class="tab tab-explore block text-xs">Treinamento</span>
                                </label>
                                <label class="w-full justify-center inline-block text-center pt-2 pb-1">
                                    <input type="checkbox" value="essay" wire:model="applications"
                                        name="applications[]"  class="checkbox checkbox-primary" />
                                    <span class="tab tab-explore block text-xs">Redação</span>
                                </label>
                                <label class="w-full justify-center inline-block text-center pt-2 pb-1">
                                    <input type="checkbox" value="mentoring" wire:model="applications"
                                        name="applications[]"  class="checkbox checkbox-primary" />
                                    <span class="tab tab-explore block text-xs">Mentoria</span>
                                </label>
                            </div>

                            @error('applications')
                                <span class="error">{{ $message }}</span>
                            @enderror
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
            <form wire:submit="update">
                <div class="grid gap-4 mb-1 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                    @if (!$this->user_id)
                        <div class="col-span-2 ">
                            <label for="title" class="block text-sm font-medium text-gray-900 dark:text-white">
                                *Título</label>
                                <div class="grid gap-4 mb-1 grid-cols-1">
                                    <fieldset class="col-span-1 w-full space-y-1 dark:text-gray-100"
                                        wire:click="openModalSearch('user')" wire:ignore>
                                        <label for="Search" class="hidden">Pesquisar </label>
                                        <div class="relative w-full">
                                            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                                                <button type="button" title="search" class="p-1 focus:outline-none focus:ring">
                                                    <svg fill="currentColor" viewBox="0 0 512 512"
                                                        class="w-4 h-4 dark:text-gray-100">
                                                        <path
                                                            d="M479.6,399.716l-81.084-81.084-62.368-25.767A175.014,175.014,0,0,0,368,192c0-97.047-78.953-176-176-176S16,94.953,16,192,94.953,368,192,368a175.034,175.034,0,0,0,101.619-32.377l25.7,62.2L400.4,478.911a56,56,0,1,0,79.2-79.195ZM48,192c0-79.4,64.6-144,144-144s144,64.6,144,144S271.4,336,192,336,48,271.4,48,192ZM456.971,456.284a24.028,24.028,0,0,1-33.942,0l-76.572-76.572-23.894-57.835L380.4,345.771l76.573,76.572A24.028,24.028,0,0,1,456.971,456.284Z">
                                                        </path>
                                                    </svg>
                                                </button>
                                            </span>
                                            <input type="text" readonly placeholder="Pesquisar" wire:model.live="user"
                                                class="w-full border-blue-500 py-3 pl-10 text-sm text-gray-900
                                                rounded-2xl  focus:ring-primary-500 dark:bg-gray-700
                                                dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500"
                                                autofocus />
                                        </div>
                                        @error('user_id')
                                            <span class="error">{{ $message }}</span>
                                        @enderror
                                    </fieldset>
                                </div>
                            @error('title')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    @else
                        <div class="col-span-2 ">
                            @if (!empty($user))
                                <div>
                                    Usuário : {{ $user }} <br>
                                </div>
                            @endif
                        </div>
                    @endif

                    <div class="col-span-2 ">
                        <label for="plan_id" class="block text-sm font-medium text-gray-900 dark:text-white">
                            *Plano</label>
                        <select wire:model="plan_id" required="" name="plan_id" id="plan_id" placeholder="Plano"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="">Selecione uma opção</option>
                            @foreach ($plans as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                        @error('plan_id')
                            <span class="error">{{ $message }}</span>
                        @enderror
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
    <x-dialog-modal wire:model="modalSearch" class="mt-0">
        <x-slot name="title">Pesquisar</x-slot>
        <x-slot name="content">
            <div class="grid gap-4 mb-1 grid-cols-1">
                <fieldset class="col-span-1 w-full space-y-1 dark:text-gray-100">
                    <label for="Search" class="hidden">Pesquisar </label>
                    <div class="relative w-full">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                            <button type="button" title="search" class="p-1 focus:outline-none focus:ring">
                                <svg fill="currentColor" viewBox="0 0 512 512" class="w-4 h-4 dark:text-gray-100">
                                    <path
                                        d="M479.6,399.716l-81.084-81.084-62.368-25.767A175.014,175.014,0,0,0,368,192c0-97.047-78.953-176-176-176S16,94.953,16,192,94.953,368,192,368a175.034,175.034,0,0,0,101.619-32.377l25.7,62.2L400.4,478.911a56,56,0,1,0,79.2-79.195ZM48,192c0-79.4,64.6-144,144-144s144,64.6,144,144S271.4,336,192,336,48,271.4,48,192ZM456.971,456.284a24.028,24.028,0,0,1-33.942,0l-76.572-76.572-23.894-57.835L380.4,345.771l76.573,76.572A24.028,24.028,0,0,1,456.971,456.284Z">
                                    </path>
                                </svg>
                            </button>
                        </span>
                        <input type="text" placeholder="Pesquisar" wire:model.live="inputSearch"
                            class="w-full border-blue-500 py-3 pl-10 text-sm text-gray-900
                            rounded-2xl  focus:ring-primary-500 dark:bg-gray-700
                            dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500"
                            autofocus />
                    </div>
                </fieldset>
                @isset($results)
                    <div class="overflow-x-auto">
                        <table class="table">
                            <tbody>
                                @if ($results)
                                    @foreach ($results as $item)
                                        <tr class="hover:bg-gray-200">
                                            <td>
                                                <div class="flex items-center gap-3 cursor-pointer "
                                                    wire:click="selectUser({{ $item->id }})">
                                                    {{-- <div class="avatar">
                                                        <div class="mask mask-squircle w-12 h-12">
                                                            @if ($item->imageTitle)
                                                            <picture>
                                                                <source
                                                                srcset="{{ url('storage/partners/' . $item->imageTitle . '.jpg') }}" />
                                                                <source
                                                                    srcset="{{ url('storage/partners/' . $item->imageTitle . '.webp') }}" />
                                                                <source
                                                                    srcset="{{ url('storage/partners/' . $item->imageTitle . '.png') }}" />
                                                                <img src="{{ url('storage/partners/' . $item->imageTitle . '.jpg') }}"
                                                                    alt="{{ $item->name }}">
                                                            </picture>
                                                            @endif

                                                        </div>
                                                    </div> --}}
                                                    <div>
                                                        <div class="font-bold">{{ $item->name }} </div>
                                                        <div class="text-sm opacity-50">{{ $item->email }} </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>

                @endisset

            </div>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('modalSearch')" class="mx-2">
                Fechar
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
    <script>
        function copyToClipboard(voucher) {
            var texto = document.getElementById(voucher);
            texto.select();
            document.execCommand("copy");
        }
    </script>
</div>
