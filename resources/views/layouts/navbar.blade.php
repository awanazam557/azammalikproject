<nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <div class="container-fluid">

        <img src="{{ asset('images/img.png') }}" class="" alt="Cinque Terre" width="70px" height="70px">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto  mb-2 mb-lg-0">
                <li class="nav-item ">
                    <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Items</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('/brands') }}">Brands</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('/modals') }}">Models</a>
                </li>
            </ul>
            <form class="d-flex">
                <span></span>
            </form>
        </div>
    </div>
</nav>
