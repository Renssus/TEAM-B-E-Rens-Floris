<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron ">
    <div class="container">
        <a href="/" title="{{ __('misc.home_alt') }}" alt="{{ __('misc.home_alt') }}">
            <h1 class="font-weight-bold">{{ __('misc.homepage_title') }}</h1>
        </a>
        {{ $introduction_text ?? '' }}
    </div>
</div>
