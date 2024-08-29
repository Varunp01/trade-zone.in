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
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6">Registration</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-12 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="DETAILS_abyour">
                            <h4>FILL IN THE DETAILS</h4>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if(session()->has('success'))
                            <div class="alert alert-success"><ul><li>{{ session()->get('success') }}<li></ul></div>
                            @endif
                            @if(session()->has('error'))
                            <div class="alert alert-danger"><ul><li>{{ session()->get('error') }}<li></ul></div>
                            @endif
                            <form action="{{ route('register') }}" method="post">
                                @csrf
                                <div class="formmer">
                                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                                    <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
                                    <input type="number" name="phone" class="form-control" placeholder="Phone Number" required>
                                    
                                    <!--<input type="number" name="adharno" class="form-control" placeholder="Aadhar Number" required>-->
                                    <!--<input type="text" name="address" class="form-control" placeholder="Address" required>-->
                                    <input type="number" name="amount" class="form-control" placeholder="Amount" required>
                                    <input type="text" name="referral_code" class="form-control" placeholder="Referral Code">
                                    <!--<select name="plan" id="" class="form-control" required>-->
                                    <!--<option value="">Select Plan</option>-->
                                    <!--<option value="1">New</option>-->
                                    <!--<option value="0">Old</option>-->
                                    <!--</select>-->
                                    <div class="btnn_for">
                                        <button type="submit">Register</button>
                                        <p>Already have an account? <a href="{{ route('login') }}">Log in</a></p>
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