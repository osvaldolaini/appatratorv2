@props(['active'])
<div class="mx-3 sm:mx-4 sm:p-3 bg-gray-200 rounded-2xl dark:bg-gray-700 ">
    <div class="grid grid-cols-8 gap-4 text-gray-600 ">
        <div class="col-span-full justify-items-center ">
            <div role="tablist" class="tabs tabs-boxed tabs-xs  bg-gray-200">
                <a role="tab" href={{ route('occupationArea') }} class="tab {{ $active == 'áreas-de-atuação' ? 'tab-active' : '' }}">Área de atuação</a>
                <a role="tab" href={{ route('educationArea') }} class="tab {{ $active == 'áreas-de-formação' ? 'tab-active' : '' }}">Área de formação</a>
                <a role="tab" href={{ route('examiningBoard') }} class="tab {{ $active == 'bancas' ? 'tab-active' : '' }}">Bancas</a>
                <a role="tab" href={{ route('office') }} class="tab {{ $active == 'cargos' ? 'tab-active' : '' }}">Cargos</a>
                <a role="tab" href={{ route('discipline') }} class="tab {{ $active == 'disciplinas' ? 'tab-active' : '' }}">Disciplinas</a>
            </div>
            <div role="tablist" class="tabs tabs-boxed tabs-xs  bg-gray-200">
                <a role="tab" href={{ route('institution') }} class="tab {{ $active == 'instituições' ? 'tab-active' : '' }}">Instituições</a>
                <a role="tab" href={{ route('level') }} class="tab {{ $active == 'níveis-de-formação' ? 'tab-active' : '' }}">Níveis de formação</a>
                <a role="tab" href={{ route('matter') }} class="tab {{ $active == 'matérias' ? 'tab-active' : '' }}">Matérias</a>
                <a role="tab" href={{ route('modality') }} class="tab {{ $active == 'modalidades' ? 'tab-active' : '' }}">Modalidades</a>
                <a role="tab" href={{ route('subMatter') }} class="tab {{ $active == 'sub-topicos-das-matérias' ? 'tab-active' : '' }}">Sub topicos das matérias</a>
            </div>
        </div>
    </div>
</div>
