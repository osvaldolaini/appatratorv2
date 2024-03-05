<div >
    <x-message-session></x-message-session>
    @livewire('app.mentoring.mentoring-contest-user-bar', ['title' => 'Revisões'])
    @if (empty($allContests))
        <div class="max-w-7xl mx-auto pb-10 pt-5 sm:px-6 lg:px-8 rounded-md" wire:model="{{ $mentoringContestUser }}">
            <div class="mt-10 sm:mt-0 rounded-md">
                <div >
                    <table style="width:100%"
                     class='min-w-full divide-y divide-gray-200 dark:divide-gray-700'>
                        @foreach ($mentoringContestUser->contest->discipline as $discipline)
                        {{-- Table head --}}
                        <thead
                            class="text-left bg-gray-200 dark:bg-gray-800 text-gray-500 dark:text-gray-400 ">
                                <tr >
                                    <th colspan="2" class="p-2.5">{{ $discipline->title }}</th>
                                </tr>
                            </thead>
                            <thead class="text-bold bg-gray-300 text-gray-900 dark:bg-gray-900 dark:text-gray-300" >
                                <tr >
                                    <th class="p-2.5">Assuntos</th>
                                    <th class="text-center">Revisões</th>
                                </tr>
                                <tbody
                                class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700 ">
                                @if ($discipline->contestMatter)
                                    @foreach ($discipline->contestMatter as $matter)
                                        <tr class="py-4">
                                            <td scope="col" class="text-xs text-gray-700 text-left w-2/6 py-1.5">
                                                @for ($i = 1; $i < $matter->order_level; $i++)
                                                <span>&nbsp;</span>
                                                @endfor
                                                <span class="font-bold">
                                                </span>
                                                @if ($matter->order_level == 1)
                                                    <span class="font-bold">{{ $matter->order_title}}.
                                                        {{ $matter->title }}
                                                    </span>
                                                @else
                                                <span >{{ $matter->order_title}}.
                                                    {{ $matter->title }}
                                                </span>
                                                @endif

                                            </td>
                                            <td class="text-sm text-gray-700 text-center w-4/6">
                                                <div class="flex flex-row ml-2">
                                                    @foreach ($mentoringContestUser->reviews($matter->id,$mentoringContestUser->id) as $item)
                                                        <div class="badge badge-outline badge-error gap-1" >
                                                            {{ $item->dayMonth() }}
                                                            <svg wire:click="showModal({{ $item->id }})" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-4 h-4 stroke-current cursor-pointer"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
           {{-- MODAL DELETE --}}
        <x-confirmation-modal wire:model="showJetModal">
            <x-slot name="title">Excluir registro</x-slot>
            <x-slot name="content">
                <h2 class="h2">Deseja realmente excluir o registro?</h2>
                <p>Não será possível reverter esta ação!</p>
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('showJetModal')" class="mx-2">
                    Cancelar
                </x-secondary-button>
                <x-danger-button wire:click.prevent="delete({{ $model_id }})" wire.loading.attr='disable'>
                    Apagar registro
                </x-danger-button>
            </x-slot>
        </x-confirmation-modal>
    @endif
</div>
