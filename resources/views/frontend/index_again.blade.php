<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Trade Zone</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    @include('frontend.common-css')
   
</head>

<body>

    <!-- ----------- header ---------  -->

    @include('frontend.header')


    <!-- --------- end header ---------  -->

    <!-- Header Start -->
    <div class="container-fluid hero-header bg-light py-5 mb-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 mb-3 animated slideInDown">MAKE BETTER LIFE WITH Trade Zone PVT
                        LTD.
                    </h1>
                </div>
                <div class="col-lg-6 animated fadeIn">
                    <img class="img-fluid animated pulse infinite" style="animation-duration: 3s;" src="{{ URL::asset('public/assets/img/hero-1.png') }}"
                        alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid" src="{{ URL::asset('public/assets/img/about.png') }}" alt="">
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <h1 class="display-6">About Us</h1>
                        <p class="text-primary fs-5 mb-4">The Most Trusted Investment Company</p>
                        <p class="about_company">We are an investment company dedicated to helping
                            our clients achieve their financial goals through
                            personalized attention and a range of investment
                            solutions. We believe in transparency and our team of
                            professionals is committed to providing exceptional
                            service and delivering results that exceed our clients'
                            expectations.
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Vision Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <h1 class="display-6">Our Vision</h1>
                        <p class="about_company">We strive to provide exceptional
                            investment management services to our
                            clients, with a focus on delivering
                            consistent, long-term returns while
                            managing risk effectively.Our ultimate
                            goal is to build enduring relationships
                            with our clients and help them achieve
                            their financial objectives.
                        </p>

                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid" src="{{ URL::asset('public/assets/img/our-vision.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Vision End -->


    <!-- Facts Start -->
    <!-- <div class="container-xxl bg-light py-5 my-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6 text-center wow fadeIn" data-wow-delay="0.1s">
                    <img class="img-fluid mb-4" src="img/icon-9.png" alt="">
                    <h1 class="display-4" data-toggle="counter-up">123456</h1>
                    <p class="fs-5 text-primary mb-0">Today Transactions</p>
                </div>
                <div class="col-lg-4 col-md-6 text-center wow fadeIn" data-wow-delay="0.3s">
                    <img class="img-fluid mb-4" src="img/icon-10.png" alt="">
                    <h1 class="display-4" data-toggle="counter-up">123456</h1>
                    <p class="fs-5 text-primary mb-0">Monthly Transactions</p>
                </div>
                <div class="col-lg-4 col-md-6 text-center wow fadeIn" data-wow-delay="0.5s">
                    <img class="img-fluid mb-4" src="img/icon-2.png" alt="">
                    <h1 class="display-4" data-toggle="counter-up">123456</h1>
                    <p class="fs-5 text-primary mb-0">Total Transactions</p>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Facts End -->


    <!-- Features Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6">Our Current Plan</h1>
                <p class="text-primary fs-5 mb-5">The Best In The Investment Industry</p>
            </div>
            <div class="row g-5">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="d-flex our_plans">
                        <h5>RYG Real Estate</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="d-flex our_plans">
                        <h5>Hotel business</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="d-flex our_plans">
                        <h5>Mall business</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="d-flex our_plans">
                        <h5>Education, Medical , Fashion</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="d-flex our_plans">
                        <h5>Online Shopping</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="d-flex our_plans">
                        <h5>Digital Gaming</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->


    <!-- business plan Start -->
    <div class="container-xxl bg-light py-3 my-3">
        <div class="container py-3">
            <div class="text-center business_plan mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6">Our Business Plan</h1>
                <p class="text-primary fs-5 mb-5">Party plan</p>
            </div>
            <div class="row g-4 wow fadeInUp" data-wow-delay="0.5s">

                <table class="rwd-table">
                    <tbody>
                        <tr>
                            <th>AMOUNT</th>
                            <th>HOLDING TIME</th>
                            <th>PARTY ROY</th>
                            <th>TOTAL AMOUNT</th>
                            <th>ONE TIME AMOUNT</th>
                        </tr>
                        <tr>
                            <td data-th="Supplier Code">
                                5000 TO 100000
                            </td>
                            <td data-th="Supplier Name">
                                25 MONTHS
                            </td>
                            <td data-th="Invoice Number">
                                0.4%
                            </td>
                            <td data-th="Invoice Date">
                                2X
                            </td>
                            <td data-th="Due Date">
                                2.5X
                            </td>
                        </tr>
                        <tr>
                            <td data-th="Supplier Code">
                                100001 TO 1500000
                            </td>
                            <td data-th="Supplier Name">
                                20 MONTHS
                            </td>
                            <td data-th="Invoice Number">
                                0.5%
                            </td>
                            <td data-th="Invoice Date">
                                2X
                            </td>
                            <td data-th="Due Date">
                                2.5X
                            </td>
                        </tr>
                        <tr>
                            <td data-th="Supplier Code">
                                ABOVE 1500000
                            </td>
                            <td data-th="Supplier Name">
                                20 MONTHS
                            </td>
                            <td data-th="Invoice Number">
                                0.75%
                            </td>
                            <td data-th="Invoice Date">
                                3X
                            </td>
                            <td data-th="Due Date">
                                3X
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- End -->

    <!-- network Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6">NETWORK PLAN AND PROFIT</h1>
                <p class="text-primary fs-5 mb-5">The Best In The Investment Industry</p>
            </div>
            <div class="row g-5">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="profit_plan">
                        <div class="profit_im">
                            <img src="{{ URL::asset('public/assets/img/income-1.png') }}" alt="imga">
                        </div>
                        <h5>Direct Income</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="profit_plan">
                        <div class="profit_im">
                            <img src="{{ URL::asset('public/assets/img/income-2.png') }}" alt="imga">
                        </div>
                        <h5>Special Income</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="profit_plan">
                        <div class="profit_im">
                            <img src="{{ URL::asset('public/assets/img/income-3.png') }}" alt="imga">
                        </div>
                        <h5>Level Direct Income</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="profit_plan">
                        <div class="profit_im">
                            <img src="{{ URL::asset('public/assets/img/income-4.png') }}" alt="imga">
                        </div>
                        <h5>Royalty Income</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End -->

    <!-- ------------ income table --------  -->

    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
            <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                   
                    
                <table class="rwd-table1">
                    <tbody>
                        <tr>
                            <td rowspan="5" >DIRECT INCOME</td>
                            <td>RANK</td>
                            <td>POSITION</td>
                            <td>INCOME</td>
                        </tr>
                        <tr>
                            <td>RANK 1</td>
                            <td>BDO</td>
                            <td>8% on 1500000</td>
                        </tr>
                        <tr>
                            <td data-th="Supplier Code">
                            RANK 2
                            </td>
                            <td data-th="Supplier Name">
                            CMO
                            </td>
                            <td data-th="Invoice Number">
                            9% on 1500001 to 3000000
                            </td>
                        </tr>
                        <tr>
                            <td data-th="Supplier Code">
                            RANK 3
                            </td>
                            <td data-th="Supplier Name">
                            COMPANY PRESIDENT
                            </td>
                            <td data-th="Invoice Number">
                            10% on 3000001 to 6000000
                            </td>
                        </tr>
                        <tr>
                            <td>RANK 4</td>
                            <td>ROYAL COMPANY PRESIDENT</td>
                            <td>12% on 6000001 to 10000000</td>
                        </tr>
                    </tbody>
                </table>
                </div>
           
            <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                   
                    
                   <table class="rwd-table2">
                       <tbody>
                           <tr>
                               <td>SPECIAL INCOME</td>
                               <td colspan="2" style="background-color: #D8E7F3; color:#333333;">10% ROY INCOME OF TOTAL DIRECT ROY</td>
                           </tr>
                           <tr>
                               <td rowspan="6">LEVEL DIRECT INCOME</td>
                               <td>LEVEL</td>
                               <td>INCOME</td>
                               
                           </tr>
                           <tr>
                               <td data-th="Supplier Code">
                               1ST LEVEL
                               </td>
                               <td data-th="Supplier Name">
                               DIRECT INCOME RANK WISE
                               </td>
                               
                           </tr>
                           <tr>
                               <td data-th="Supplier Code">
                               2ND LEVEL
                               </td>
                               <td data-th="Supplier Name">
                               2%
                               </td>
                               
                           </tr>
                           <tr>
                               <td>3RD LEVEL</td>
                               <td>1%</td> 
                           </tr>

                           <tr>
                               <td>4TH LEVEL</td>
                               <td>0.5%</td> 
                           </tr>

                           <tr>
                               <td>5TH LEVEL</td>
                               <td>0.5%</td> 
                           </tr>

                           <tr>
                               <td>ROYALTY INCOME</td>
                               <td colspan="2" style="background-color: #D8E7F3; color:#333333;">ON COMPLETION OF A BUSINESS OF 1 CRORE ; 4% OF THE TOTAL PROFIT WILL BE DISTRIBUTED TO ROYAL LEADERS</td>
                           </tr>

                       </tbody>
                   </table>
                   </div>
               </div>
        </div>

        <!-- Footer Start -->
       
        @include('frontend.footer')

        <!-- Footer End -->

</body>

</html>