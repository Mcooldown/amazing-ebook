<div class="c-bg-blue py-4">
    <div class="container text-white text-center">
        <h1 class="fw-bold">Amazing E-Book</h1>
        <p class="mt-3">@lang('custom.navbar.by') Vincent Hadinata - 2301850430 - LJ01</p>
    </div>
</div>
<div class="c-bg-yellow">
    <div class="container">
        <div class="row justify-content-center">
            @auth
            <div class="col-md-3 col-6 p-0">
                <a href="{{ route('view-home', $locale) }}" class="text-reset text-decoration-none">
                    <div class="c-nav-item py-3">
                        <h5 class="text-center m-0 text-dark">@lang('custom.navbar.home')</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-6 p-0">
                <a href="{{ route('view-cart', $locale) }}" class="text-reset text-decoration-none">
                    <div class="c-nav-item py-3">
                        <h5 class="text-center m-0 text-dark">@lang('custom.navbar.cart')</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-6 p-0">
                <a href="{{ route('view-order', $locale) }}" class="text-reset text-decoration-none">
                    <div class="c-nav-item py-3">
                        <h5 class="text-center m-0 text-dark">@lang('custom.navbar.order')</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-6 p-0">
                <a href="{{ route('view-profile', $locale) }}" class="text-reset text-decoration-none">
                    <div class="c-nav-item py-3">
                        <h5 class="text-center m-0 text-dark">@lang('custom.navbar.profile')</h5>
                    </div>
                </a>
            </div>
            @if (Auth::user()->role->role_desc == 'Admin')
            <div class="col-md-3 col-6 p-0">
                <a href="{{ route('view-account-maintenance', $locale) }}" class="text-reset text-decoration-none">
                    <div class="c-nav-item py-3">
                        <h5 class="text-center m-0 text-dark">@lang('custom.navbar.accountMaintenance')</h5>
                    </div>
                </a>
            </div>
            @endif
            <div class="col-md-3 col-6 p-0">
                <a href="{{ route('logout', $locale) }}" class="text-reset text-decoration-none">
                    <div class="c-nav-item py-3">
                        <h5 class="text-center m-0 text-dark">@lang('custom.navbar.logout')</h5>
                    </div>
                </a>
            </div>
            @else
            <div class="col-md-3 col-6 p-0">
                <a href="{{ route('view-index', $locale) }}" class="text-reset text-decoration-none">
                    <div class="c-nav-item py-3">
                        <h5 class="text-center m-0 text-dark">@lang('custom.navbar.index')</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-6 p-0">
                <a href="{{ route('view-sign-up', $locale) }}" class="text-reset text-decoration-none">
                    <div class="c-nav-item py-3">
                        <h5 class="text-center m-0 text-dark">@lang('custom.navbar.signup')</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-6 p-0">
                <a href="{{ route('view-login', $locale) }}" class="text-reset text-decoration-none">
                    <div class="c-nav-item py-3">
                        <h5 class="text-center m-0 text-dark">@lang('custom.navbar.login')</h5>
                    </div>
                </a>
            </div>
            @endauth
        </div>
    </div>
</div>
