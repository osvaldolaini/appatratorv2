{{-- @livewire('admin.logos') --}}
<picture class="h-16 " {{ $attributes }}>
    <source srcset="{{ url('storage/crm/logo_small_text.png') }}" />
    <source srcset="{{ url('storage/crm/logo_small_text.webp') }}" />
    <img class="h-16 " src="{{ url('storage/crm/logo_small_text.png') }}" alt="crm-imoveis">
</picture>

