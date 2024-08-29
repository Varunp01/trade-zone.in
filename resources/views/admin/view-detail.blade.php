@extends('backend.layouts.app')



@section('title', 'Admin Dashboard')



@section('loader')



    @include('backend.layouts.preloader')



@stop



@section('header')



    @include('backend.layouts.top-header')



    @include('backend.layouts.sidebar')



@stop



<!-- main contend -->



@section('content')



    <div class="content-body">



        <div class="container-fluid">



            <div class="row page-titles mx-0">



                <div class="col-sm-6 p-md-0">



                    <div class="welcome-text">

                    @if(\Session::has('success'))



                    <h4 href="javascript:void(0)" class="text-success text-center ft">{{\Session::get('success')}}</h4>



                    @else



                    <h4 class="text-danger text-center ft">{{\Session::get('error')}}</h4>



                    @endif

                        <!-- <h4>Hi, welcome back!</h4> -->



                        <!-- <p class="mb-0">Your business dashboard template</p> -->



                    </div>



                </div>



                <!-- <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">



                    <ol class="breadcrumb">



                        <li class="breadcrumb-item"><a href="javascript:void(0)">Layout</a></li>



                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Blank</a></li>



                    </ol>



                </div> -->



            </div>







             <div class="row">

                <div class="col-lg-3 col-sm-6">



                    <div class="card" style="background-color:green">



                        <div class="stat-widget-one card-body">



                            <div class="stat-icon d-inline-block">



                                <!-- <i class="ti-money text-success border-success"></i> -->



                            </div>

                          

                            <div class="stat-content d-inline-block">



                                <div class="stat-text" style="color:white"><b>Investment</b></div>



                                <div class="stat-digit" style="color:white">{{ $user->amount }}</div>



                            </div>



                        </div>



                    </div>



                </div>

                

                

                 <div class="col-lg-3 col-sm-6">



                    <div class="card" style="background-color:#e27373">



                        <div class="stat-widget-one card-body">



                            <div class="stat-icon d-inline-block">



                                <!-- <i class="ti-user text-primary border-primary"></i> -->



                            </div>

                             <a href="#">

                            <div class="stat-content d-inline-block">



                                <div class="stat-text" style="color:white"><b>Wallet</b></div>



                                <div class="stat-digit" style="color:white">{{ $user->total_roi-$user->total_withdraw }}</div>



                            </div>

                            </a>



                        </div>



                    </div>



                </div>



                <div class="col-lg-3 col-sm-6">



                    <div class="card" style="background-color:#728FCE">



                        <div class="stat-widget-one card-body">



                            <div class="stat-icon d-inline-block">



                                <!-- <i class="ti-user text-primary border-primary"></i> -->



                            </div>



                            <div class="stat-content d-inline-block">



                                <div class="stat-text" style="color:white"><b>Total Roi</b></div>



                                <div class="stat-digit" style="color:white">{{ $user->total_roi }}</div>



                            </div>



                        </div>



                    </div>



                </div>



                <div class="col-lg-3 col-sm-6">



                    <div class="card" style="background-color:#123456">



                        <div class="stat-widget-one card-body">



                            <div class="stat-icon d-inline-block">



                                <!-- <i class="ti-layout-grid2 text-pink border-pink"></i> -->



                            </div>

                            <a href="#">

                            <div class="stat-content d-inline-block">



                                <div class="stat-text"style="color:white"><b>Total Withdraw</b></div>



                                <div class="stat-digit" style="color:white">{{ $user->total_withdraw }}</div>



                            </div>

                            </a>

                        </div>



                    </div>



                </div>



                <div class="col-lg-3 col-sm-6">



                    <div class="card" style="background-color:#045F5F">



                        <div class="stat-widget-one card-body">



                            <div class="stat-icon d-inline-block">



                                <!-- <i class="ti-link text-danger border-danger"></i> -->



                            </div>

                            <a href="#">

                            <div class="stat-content d-inline-block">



                                <div class="stat-text" style="color:white"><b>Referral</b></div>



                                <div class="stat-digit" style="color:white">{{ $refcount }}</div>



                            </div>

                            </a>



                        </div>



                    </div>



                </div>

                

                <div class="col-lg-3 col-sm-6">



                    <div class="card" style="background-color:green">



                        <div class="stat-widget-one card-body">



                            <div class="stat-icon d-inline-block">



                                <!-- <i class="ti-money text-success border-success"></i> -->



                            </div>

                          

                            <div class="stat-content d-inline-block">



                                <div class="stat-text" style="color:white"><b>Direct Income</b></div>



                                <div class="stat-digit" style="color:white">0</div>



                            </div>



                        </div>



                    </div>



                </div>

                

                

                 <div class="col-lg-3 col-sm-6">



                    <div class="card" style="background-color:#e27373">



                        <div class="stat-widget-one card-body">



                            <div class="stat-icon d-inline-block">



                                <!-- <i class="ti-user text-primary border-primary"></i> -->



                            </div>

                             <a href="#">

                            <div class="stat-content d-inline-block">



                                <div class="stat-text" style="color:white"><b>Level Income</b></div>



                                <div class="stat-digit" style="color:white">0</div>



                            </div>

                            </a>



                        </div>



                    </div>



                </div>



            </div>





             <div class="row">



                <div class="col-lg-12">



                    <div class="card">



                        <div class="card-header">



                            <h4 class="card-title">User Basic Info</h4>



                        </div>



                        <div class="card-body">



                            <div class="table-responsive">



                                <table class="table student-data-table m-t-20">



                                    <thead>



                                        <tr>



                                            <th>Name</th>



                                            <th>Email</th>



                                            <th>Phone</th>



                                            <th>Referal Code</th>



                                            <th>Sponsor</th>

                                            <th>Address</th>



                                        </tr>



                                    </thead>



                                    <tbody>



                                        <tr>



                                            <td>{{ $user->name }}</td>



                                            <td>{{ $user->email }}</td>



                                            <td>



                                                {{ $user->phone }}



                                            </td>



                                            <td>



                                                {{ $user->referal_code }}



                                            </td>



                                            <td>



                                                {{ $user->Sponsor }}



                                            </td>



                                            <td>{{ $user->address }}</td>



                                        </tr>



                                    </tbody>



                                </table>



                            </div>



                        </div>



                    </div>



                </div>





            </div> 

            

             <div class="row">



                <div class="col-lg-12">



                    <div class="card">



                        <div class="card-header">



                            <h4 class="card-title">User Kyc Info</h4>



                        </div>

                        @if ($kyc)

                        <div class="card-body">



                            <div class="table-responsive">



                                <table class="table student-data-table m-t-20">



                                    <thead>



                                        <tr>



                                            <th>Aadhar Number</th>



                                            <th>Pan Number</th>
                                            <th>Account Number</th>
                                            <th>Ifsc Code</th>
                                            <th>Passbook</th>



                                            <th>Aadhar Front</th>



                                            <th>Aadhar Back</th>



                                            <th>Pan</th>



                                        </tr>



                                    </thead>



                                    <tbody>



                                        <tr>



                                            <td>{{ $kyc->adhar_no }}</td>



                                            <td>{{ $kyc->pan_no }}</td>
                                            <td>{{ $kyc->account_no }}</td>
                                            <td>{{ $kyc->ifsc_code }}</td>

                                            <td>



                                            <a href="{{ URL::asset('public/kyc').'/'.$kyc->passbook }}" target="_blank"> <img src="{{ URL::asset('public/kyc').'/'.$kyc->passbook }}" height="50" width="50"></a>



                                            </td>

                                            <td>



                                               <a href="{{ URL::asset('public/kyc').'/'.$kyc->adhar_front }}" target="_blank"> <img src="{{ URL::asset('public/kyc').'/'.$kyc->adhar_front }}" height="50" width="50"></a>



                                            </td>



                                            <td>



                                               <a href=" {{ URL::asset('public/kyc').'/'.$kyc->adhar_back }}" target="_blank"><img src="{{ URL::asset('public/kyc').'/'.$kyc->adhar_back }}" height="50" width="50"></a>



                                            </td>



                                            <td>



                                               <a href="{{ URL::asset('public/kyc').'/'.$kyc->pan_pic }}" target="_blank"><img src="{{ URL::asset('public/kyc').'/'.$kyc->pan_pic }}" height="50" width="50"></a>



                                            </td>



                                            



                                        </tr>



                                    </tbody>



                                </table>



                            </div>



                        </div>

                        @else

                        

                        <div class="card-body">



                            <div class="table-responsive">



                                <table class="table student-data-table m-t-20">



                                    <thead>



                                        <tr>



                                            <th>Aadhar Number</th>



                                            <th>Pan Number</th>



                                            <th>Aadhar Front</th>



                                            <th>Aadhar Back</th>



                                            <th>Pan</th>



                                        </tr>



                                    </thead>



                                    <tbody>



                                        <tr>



                                            <td colspan="5" align="center">Kyc not completed yet</td>





                                            



                                        </tr>



                                    </tbody>



                                </table>

                                



                            </div>



                        </div>

                        

                        @endif

                         <!-- Add Roi -->
                         <div class="row">



                            <div class="col-md-6 offset-md-3" style="background-color: #333; padding:35px;">

                         
                                <form action="{{ route('add.roi') }}" method="post">

                                    @csrf

                                
                                    <input type="hidden" name="hidden_id_roi" value="{{ $user->id }}">
                                    <div class="form-group">

                                        <label for="formGroupExampleInput2">Monthly Roi</label>

                                        <input type="text" name="roi"  class="form-control" value="{{ $user->monthly_roi }}">

                                    </div>

                                    <div class="form-group">

                                    <label for="formGroupExampleInput2">First Level Roi</label>

                                    <input type="text" name="first_roi"  class="form-control"  value="{{ $user->first_level }}">

                                    </div>

                                

                                    

                                    <div class="text-center">

                                        <button type="submit" class="btn btn-success">Submit</button>

                                    </div>

                                </form>

                            </div>

                        </div>
                         <!-- End Roi -->

                         <!-- Change Password -->
                         <br/>
                         <div class="row">

                             

                        <div class="col-md-6 offset-md-3" style="background-color: #333; padding:35px;">

                      

                            <form action="{{ route('change.password') }}" method="post">

                                @csrf
                                <input type="hidden" name="hidden_id_pass" value="{{ $user->id }}">
                            

                                <div class="form-group">

                                    <label for="formGroupExampleInput2">New Password</label>

                                    <input type="password" name="password"  class="form-control" placeholder="New Password">

                                </div>
                                <div class="form-group">

                                <label for="formGroupExampleInput2">Confirm Password</label>

                                <input type="password" name="con_password"  class="form-control" placeholder="Confirm Password">

                                </div>

                            

                                

                                <div class="text-center">

                                    <button type="submit" class="btn btn-success">Submit</button>

                                </div>

                            </form>


                        </div>

                    </div>
                         <!-- End  -->

                    </div>



                </div>





            </div> 



        </div>



    </div>



    <!-- footer part -->



    @section('footer')



        @include('backend.layouts.footer')



    @stop



@stop



