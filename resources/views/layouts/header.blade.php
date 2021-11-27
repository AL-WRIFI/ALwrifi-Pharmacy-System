<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('assets/images/pharmacy-logo.png') }}" alt="{{ __('Logo') }}" class="logo">
            {{ __('Pharmacy System') }}
        </a>
        <form class="d-flex search-box" method="GET" action="{{ route('products.index') }}">
            <input type="hidden" name="forAjax" value="0">
            <div class="search-results">
                <input class="form-control" id="search-keyword" name="keyword" type="text" 
                    placeholder="{{ __('Type something ...') }}" aria-label="Search" value="{{ isset($keyword)? $keyword : '' }}" 
                    autocomplete="off">
                    
                <ul>
                    <!-- [Search Results] -->
                </ul>
            </div>
            <button class="btn btn-light text-primary" type="submit"><i class="fa fa-search"></i></button>
        </form>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 float-right">
                <li class="nav-item dropdown dropstart">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-star"></i> {{ __('Add New') }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('pharmacies.create') }}">
                                <i class="fa fa-mortar-pestle"></i>
                                {{ __('Pharmacy') }}
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('products.create') }}">
                                <i class="fa fa-pills"></i>
                                {{ __('Product') }}
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>