<x-layouts.app>

    <x-slot:introduction_text>
        <p><img src="img/afbl_logo.png" align="right" width="100" height="100">{{ __('introduction_texts.homepage_line_1') }}</p>
        <p>{{ __('introduction_texts.homepage_line_2') }}</p>
        <p>{{ __('introduction_texts.homepage_line_3') }}</p>
    </x-slot:introduction_text>

    <p>Kies jou categorie</p>
    <div class="category-filter">
        <select id="category-select" class="form-control">
            <option value="all">Alle categorieën</option>
            <option value="technology">Technology</option>
            <option value="telefoon">Telefoon</option>
            <option value="box">Box</option>
            <!-- Add more categories as needed -->
        </select>
    </div>

    <div class="popular-manuals">
        <h2>Popular Manuals</h2>
        <ul>
            @foreach($popularManuals as $manual)
                @if($manual->brand)
                    <li class="manual-item" data-category="{{ $manual->brand->category }}">{{ $manual->brand->name }} {{ $manual->type }}</li>
                @else
                    <li class="manual-item text-danger" data-category="unknown">Brand not found for manual: {{ $manual->type }}</li>
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
            <div id="{{ $letter }}" class="letter-section">
                <div class="border-brand">
                    <h2>{{ $letter }}</h2>
                    <ul>
                        @foreach($brands as $brand)
                            @if($brand)
                                <li class="my-4 brand-item" data-category="{{ $brand->category }}">
                                    <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/" class="text-dark">{{ $brand->name }}</a>
                                </li>
                            @else
                                <li class="my-4 text-danger brand-item" data-category="unknown">Brand not found</li>
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

        document.addEventListener('DOMContentLoaded', function () {
            const categorySelect = document.getElementById('category-select');
            categorySelect.addEventListener('change', function () {
                const selectedCategory = this.value;
                const manuals = document.querySelectorAll('.manual-item');
                const brands = document.querySelectorAll('.brand-item');
                const letterSections = document.querySelectorAll('.letter-section');
                
                manuals.forEach(manual => {
                    if (selectedCategory === 'all' || manual.dataset.category === selectedCategory) {
                        manual.style.display = '';
                    } else {
                        manual.style.display = 'none';
                    }
                });

                brands.forEach(brand => {
                    if (selectedCategory === 'all' || brand.dataset.category === selectedCategory) {
                        brand.style.display = 'block';
                    } else {
                        brand.style.display = 'none';
                    }
                });

                letterSections.forEach(section => {
                    const visibleBrands = section.querySelectorAll('.brand-item:not([style*="display: none"])');
                    if (visibleBrands.length === 0) {
                        section.style.display = 'none';
                    } else {
                        section.style.display = 'block';
                    }
                });
            });
        });
    </script>
</x-layouts.app>