<x-layouts.app>

    <x-slot:head>
        <meta name="robots" content="index, nofollow">
    </x-slot:head>

    <x-slot:breadcrumb>
        <li><a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/" alt="Manuals for '{{ $brand->name }}'" title="Manuals for '{{ $brand->name }}'">{{ $brand->name }}</a></li>
    </x-slot:breadcrumb>

    <h1>{{ $brand->name }}</h1>

    <p>{{ __('introduction_texts.type_list', ['brand' => $brand->name]) }}</p>

    <div class="popular-manuals">
        <h2>Popular Manuals</h2>
        <ul>
            @foreach($popularManuals as $manual)
                <li>{{ $manual->type }}</li>
            @endforeach
        </ul>
    </div>

    <div class="manuals">
        <h2>All Manuals</h2>
        @foreach ($manuals as $manual)
            @if ($manual->locally_available)
                <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/{{ $manual->id }}/" alt="{{ $manual->name }}" title="{{ $manual->name }}">{{ $manual->name }}</a>
                ({{ $manual->filesize_human_readable }})
            @else
                <a href="{{ $manual->url }}" target="new" alt="{{ $manual->name }}" title="{{ $manual->name }}">{{ $manual->name }}</a>
            @endif
            <br />
        @endforeach
    </div>

</x-layouts.app>