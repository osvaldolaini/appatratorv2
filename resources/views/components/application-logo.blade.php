<div>
    @if (request()->routeIs('login'))
        <picture class="h-24 sm:h-16">
            <source srcset="{{url('storage/logos/atrator-apps-logo-principal-light.png')}}" />
            <source srcset="{{url('storage/logos/atrator-apps-logo-principal-light.webp')}}"/>
            <img class="h-24 sm:h-16" src="{{ url('storage/logos/atrator-apps-logo-principal-light.png') }}"
            alt="atrator-apps-logo">
        </picture>
    @else
        <picture >
            <source srcset="{{url('storage/logos/atrator-apps-logo-principal-dark.png')}}" />
            <source srcset="{{url('storage/logos/atrator-apps-logo-principal-dark.webp')}}"/>
            <img class="h-12 sm:h-12" src="{{ url('storage/logos/atrator-apps-logo-principal-dark.png') }}"
            alt="atrator-apps-logo">
        </picture>
    @endif
</div>
