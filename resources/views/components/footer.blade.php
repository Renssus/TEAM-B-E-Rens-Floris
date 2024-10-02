<footer class="bg-dark text-white p-6">
    <!-- Main Container -->
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-4 text-center md:text-left">


        <div class="d-flex">
            <div class="mb-4">
                <h3 class="text-lg font-semibold ">Contactgegevens</h3>
                <ul class="mt-2 list-unstyled">
                    <li>Email: info@bedrijf.nl</li>
                    <li>Telefoon: 123-456-7890</li>
                    <li>Adres: Straatnaam 1, 1234 AB Stad</li>
                </ul>
            </div>

            <div class="mb-4">
              <h3 class="text-lg font-semibold">Over ons</h3>
              <p class="mt-2">
                  Wij zijn een team van gepassioneerde webontwikkelaars die zich richten op het leveren van hoogwaardige
                  en moderne weboplossingen.
              </p>
          </div>

          <div class="mb-4">
            <h3 class="text-lg font-semibold">Snelle links</h3>
            <ul class="mt-2 space-y-1 list-unstyled">
                <li><a href="#">Home</a></li>
                <li><a href="#">Diensten</a></li>
                <li><a href="#">Portfolio</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>

        </div>


        
        <!-- About Us Section -->

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
