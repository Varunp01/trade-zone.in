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


    <!-- terms Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-12 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="DETAILS_abyour">
                            <h4>Log In</h4>
                            @if(session()->has('error'))
                            <div class="alert alert-danger"><ul><li>{{ session()->get('error') }}<li></ul></div>
                            @endif
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="formmer">
                                    <input type="text" name="email" class="form-control" placeholder="Username, Email Or Phone">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                    <div class="btnn_for">
                                        <button type="submit">Log In</button>
                                        <p>Don't have an account?  <a href="{{ route('register') }}">Register</a></p>
                                    </div>

                                </div>
                            </form>
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