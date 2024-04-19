<div>
    @if ($status)
        <div class="tooltip tooltip-top p-0" data-tip="Clique para excluir">
            <button wire:click.prevent="deleteStatusMatter()" class="btn btn-success btn-sm">
                Concluído
            </button>
        </div>
    @else
        <div class="tooltip tooltip-top p-0 " data-tip="Clique para concluir">
            <button wire:click.prevent="storeStatus()" class="btn btn-outline btn-error btn-sm">
                Em andamento
                {{-- <span class="loading loading-dots loading-sm"></span> --}}
            </button>
        </div>
    @endif
</div>
