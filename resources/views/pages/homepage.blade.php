<x-layouts.app>

    <x-slot:introduction_text>
        <p><img src="img/afbl_logo.png" align="right" width="100" height="100">{{ __('introduction_texts.homepage_line_1') }}</p>
        <p>{{ __('introduction_texts.homepage_line_2') }}</p>
        <p>{{ __('introduction_texts.homepage_line_3') }}</p>
    </x-slot:introduction_text>

    <h1>
        <x-slot:title>
            {{ __('misc.all_brands') }}
        </x-slot:title>
    </h1>

    <div class="container">
        <div class="brand-list">
            @php
                $groupedBrands = $brands->groupBy(function($brand) {
                    return strtoupper(substr($brand->name, 0, 1));
                });
            @endphp

            @foreach($groupedBrands as $letter => $brands)
                <div>
                    <h2>{{ $letter }}</h2>
                    <ul>
                        @foreach($brands as $brand)
                            <li>
                                <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/">{{ $brand->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
</x-layouts.app>