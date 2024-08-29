<!-- Spinner Start -->

<div id="spinner"

        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">

        <div class="spinner-grow text-primary" role="status"></div>

    </div>

    <!-- Spinner End -->





    <!-- Navbar Start -->

    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 px-4 px-lg-5">

        <a href="{{ URL('/') }}" class="navbar-brand d-flex align-items-center">

            <h2 class="m-0 text-primary"><img class="img-fluid me-2" src="{{ URL::asset('public/assets/img/icon-1.png') }}" alt=""

                    style="width: 45px;">Trade Zone</h2>

        </a>

        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">

            <div class="navbar-nav ms-auto py-4 py-lg-0">

                <a href="{{ URL('/') }}" class="nav-item nav-link active">Home</a>

                <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a>

                <a href="{{ route('register') }}" class="nav-item nav-link">Registration</a>

                <a href="{{ route('login') }}" class="nav-item nav-link">Log In</a>

            </div>

            <div class="h-100 d-lg-inline-flex align-items-center d-none">

                <a class="btn btn-square rounded-circle bg-light text-primary me-2" href=""><i

                        class="fab fa-facebook-f"></i></a>

                <a class="btn btn-square rounded-circle bg-light text-primary me-2" href=""><i

                        class="fab fa-twitter"></i></a>

                <a class="btn btn-square rounded-circle bg-light text-primary me-0" href=""><i

                        class="fab fa-linkedin-in"></i></a>

            </div>

        </div>

    </nav>

    <!-- Navbar End -->