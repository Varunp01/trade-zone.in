<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <title>Trade Zone Pvt Ltd.</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    @include('frontend.common-css')
</head>

<body>

    <!-- ----------- header ---------  -->

    @include ("frontend.header")

    <!-- --------- end header ---------  -->

    <!-- Header Start -->
    <div class="container-fluid hero-header bg-light py-5 mb-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 mb-3 animated slideInDown">TERMS & CONDITIONS</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">TERMS & CONDITIONS</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 animated fadeIn">
                    <img class="img-fluid animated pulse infinite" style="animation-duration: 3s;" src="{{ URL::asset('public/assets/img/hero-2.png') }}"
                        alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- terms Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6">TERMS & CONDITIONS</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-12 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item bg-light p-5">
                        <p>Any investment will get 2.5X return on
                            takin payment after full time</p>

                        <p>For daily withdrawal minimum 100 Rs and 5 direct
                            is required</p>

                        <p>Monthly party withrawal</p>

                        <p>If investment is withrawed out in before full time
                            then 10% TDS and Admin charge will be deducted</p>

                        <p>The capping of the amount will be
                            the capping of daily</p>

                        <p>For 5 level Direct Income you have to be Direct 5</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Footer Start -->

    @include('frontend.footer')

    <!-- Footer End -->

</body>

</html>