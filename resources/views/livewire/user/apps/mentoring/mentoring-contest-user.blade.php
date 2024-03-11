<div >

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="mt-10 sm:mt-0">
            <div class='md:grid md:grid-cols-3 md:gap-6'>
                <div class="md:col-span-1 flex justify-between">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">Meu curso</h3>

                        @if (empty($allContests))
                        <p>@livewire('user.apps.mentoring.mentoring-kind-study-user')</p>
                        @endif
                        @if (!empty($allContests))
                            <p class="mt-1 text-sm text-gray-600 dark:text-white">
                                Escolha um curso para dar início a mentoria.
                            </p>
                        @endif
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div
                        class="w-full px-4 py-5 sm:p-6 {{ $allContests != '' ? 'bg-white' : 'bg-[#210c75]' }} dark:text-white shadow sm:rounded-lg">
                        <div class="md:col-span-1 flex justify-between ">
                            <div class="px-4 sm:px-0 w-full">
                                @if (empty($allContests))
                                    <h3 class="text-xl font-extrabold text-[#fddb11] dark:text-white">
                                        {{ mb_strtoupper($mentoringContestUser->contest->title) }}
                                        ({{ mb_strtoupper($mentoringContestUser->contest->nick) }})
                                    </h3>
                                @else
                                    <p class="mt-1 text-sm text-gray-600 dark:text-white">
                                        Selecione um curso.
                                    </p>
                                    <form action="#" wire:submit.prevent="store()" wire.loading.attr='disable'>
                                        <div class="w-full grid gap-4 mb-1 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                                            <div class="sm:col-span-2">
                                                <select wire:model="contest_id" placeholder="Concurso"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                                        focus:ring-primary-600 focus:border-primary-600 block w-full py-2.5 pl-5 pr-8
                                                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white                                                        dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                    <option value="">Selecione uma opção</option>
                                                    @foreach ($allContests as $contest)
                                                        <option value="{{ $contest->id }}">{{ $contest->title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="flex items-end space-x-4">
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
                                    </form>

                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (empty($allContests))

        <div class="max-w-7xl mx-auto pb-10 pt-5 sm:px-6 lg:px-8 rounded-md" wire:model="{{ $mentoringContestUser }}">
            <div class="mt-10 sm:mt-0 rounded-md">

                <span>Progresso total</span>
                <x-mentoring-app-status-bar :progress="$mentoringContestUser->progress()"></x-mentoring-app-status-bar>

                <x-disciplines :mentoringContestUser="$mentoringContestUser"></x-disciplines>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>
        {{-- MODAL INVOLVED --}}
        <x-dialog-modal wire:model="showQuestionsModal" maxWidth='5xl'>
            <x-slot name="title">{{ $contentMatter ? $contentMatter->order . ') ' . $contentMatter->title : '' }}
            </x-slot>
            <x-slot name="content">
                @if ($contentMatter)
                    @livewire('app.mentoring.mentoring-questions-user', ['matter' => $contentMatter, 'user' => $user_id, key($contentMatter->id)])
                @endif
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click.prevent="$toggle('showQuestionsModal')" class="mx-2">
                    Fechar
                </x-secondary-button>
            </x-slot>
        </x-dialog-modal>

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
    @endif
</div>
