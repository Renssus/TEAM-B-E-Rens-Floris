<x-layouts.app>

    <x-slot:introduction_text>
        <p><img src="img/afbl_logo.png" align="right" width="100" height="100">{{ __('introduction_texts.homepage_line_1') }}</p>
        <p>{{ __('introduction_texts.homepage_line_2') }}</p>
        <p>{{ __('introduction_texts.homepage_line_3') }}</p>
    </x-slot:introduction_text>

    <h1 class="">
        <x-slot:title>
            {{ __('misc.all_brands') }}
        </x-slot:title>
    </h1>

    <div class="popular-manuals">
        <h2>Popular Manuals</h2>
        <ul>
            @foreach($popularManuals as $manual)
                @if($manual->brand)
                    <li>{{ $manual->brand->name }} {{ $manual->type }}</li>
                @else
                    <li class="text-danger">Brand not found for manual: {{ $manual->type }}</li>
                @endif
            @endforeach
        </ul>
    </div>

    @php
        $allLetters = range('A', 'Z');
    @endphp

    <div class="alphabet-links">
        @foreach($allLetters as $letter)
            <a href="#{{ $letter }}" class="scroll-link">{{ $letter }}</a>
        @endforeach
    </div>

    <div class="container">
        <div class="brand-list">
            @php
                $groupedBrands = $brands->groupBy(function($brand) {
                    return strtoupper(substr($brand->name, 0, 1));
                });
            @endphp

            @foreach($groupedBrands as $letter => $brands)
                <div id="{{ $letter }}">
                    <div class="border-brand">
                        <h2>{{ $letter }}</h2>
                        <ul>
                            @foreach($brands as $brand)
                                @if($brand)
                                    <li class="my-4">
                                        <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/" class="text-dark">{{ $brand->name }}</a>
                                    </li>
                                @else
                                    <li class="my-4 text-danger">Brand not found</li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        document.querySelectorAll('.scroll-link').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);
                if (targetElement) {
                    targetElement.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });
    </script>
</x-layouts.app>