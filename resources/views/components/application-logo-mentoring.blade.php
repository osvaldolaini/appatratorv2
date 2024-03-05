<div {{ $attributes->merge(['class' => 'flex justify-between sm:justify-start']) }}>
    <picture {{ $attributes->merge(['class' => 'px-2 pt-2']) }}>
        <source srcset="{{url('storage/logos/atrator-apps-logo-mentoring.png')}}" />
        <source srcset="{{url('storage/logos/atrator-apps-logo-mentoring.webp')}}"/>
        <img class="h-12 sm:h-12" src="{{ url('storage/logos/atrator-apps-logo-mentoring.png') }}"
        alt="atrator-apps-logo-mentoring">
    </picture>
</div>
