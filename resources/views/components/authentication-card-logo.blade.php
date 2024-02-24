{{-- @livewire('admin.logos') --}}
<picture class="h-16 " {{ $attributes }}>
    <source srcset="{{ url('storage/atrator/atrator-apps-logo-principal-light.png') }}" />
    <source srcset="{{ url('storage/atrator/atrator-apps-logo-principal-light.webp') }}" />
    <img class="h-16 " src="{{ url('storage/atrator/atrator-apps-logo-principal-light.png') }}" alt="atrator">
</picture>

