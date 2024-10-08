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
            <option value="technology">Box</option>
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
<footer>
    <footer class="bg-dark text-white">

        <div class="d-flex container text-center justify-content-around">
            <div class="mb-4">
                <h3 class="text-lg font-semibold ">Contactgegevens</h3>
                <ul class="mt-2 list-unstyled">
                    <li>Email: info@bedrijf.nl</li>
                    <li>Telefoon: 123-456-7890</li>
                    <li>Adres: Straatnaam 1, 1234 AB Stad</li>
                </ul>
            </div>
    
            <div class="mb-4 ">
                <h3 class="text-lg font-semibold">Over ons</h3>
                <p class="mt-2">
                    Wij zijn Avarix
                </p>
            </div>
    
            <div class="mb-4">
                <h3 class="text-lg font-semibold">Snelle links</h3>
                <ul class="mt-2 space-y-1 list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Diensten</a></li>
                    <li><a href="#">Portfolio</a></li>
                    <li><a href="/contact">Contact</a></li>
                </ul>
            </div>
    
        </div>
    
        <!-- Copyright -->
        <div class="text-center mt-4">
            &copy; {{ __('misc.copyright') }}
        </div>
    </footer>
    
    <!-- Analytics Code -->
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-30506707-1']);
        _gaq.push(['_trackPageview']);
    
        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') +
                '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
    </script>
    <!-- End Analytics Code -->
    
    <!-- Frame Busting Script -->
    <script language="Javascript" type="text/javascript">
        if (top.location != self.location) {
            top.location = self.location.href
        }
    </script>
    
</footer>