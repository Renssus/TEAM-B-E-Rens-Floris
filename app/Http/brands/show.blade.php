<x-layouts.app>
    <h1>{{ $brand->name }}</h1>

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
        <ul>
            @foreach($brand->manuals as $manual)
                <li>{{ $manual->type }}</li>
            @endforeach
        </ul>
    </div>
</x-layouts.app>