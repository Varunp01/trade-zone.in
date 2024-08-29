@extends('backend.layouts.app')



@section('title', 'View List')



@section('loader')



@include('backend.layouts.preloader')



@stop



@section('header')



@include('backend.layouts.top-header')



@include('backend.layouts.sidebar')



@stop



@section('file')



<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet" />

<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />





<style>

    td.details-control {

        background: url('https://cdn.rawgit.com/DataTables/DataTables/6c7ada53ebc228ea9bc28b1b216e793b1825d188/examples/resources/details_open.png') no-repeat center center;

        cursor: pointer;

    }



    tr.shown td.details-control {

        background: url('https://cdn.rawgit.com/DataTables/DataTables/6c7ada53ebc228ea9bc28b1b216e793b1825d188/examples/resources/details_close.png') no-repeat center center;

    }



    .rebtnmng {

        background: aquamarine;

        border: none;

        padding: 7px 16px;

        border-radius: 5px;

    }

    .rebtnmng1 {

    background: blueviolet;

    border: none;

    color: #fff;

    padding: 7px 16px;

    border-radius: 5px;

}



    .maindtacomb {

        background-color: #fff;

    }

    .mainbtndata{

        margin: 20px;

    }

    .activereb{

        background-color: #6dc169 !important;

        color: #fff !important;

    }

    tr td {

        color: #000;

    }

</style>

@stop



<!-- main contend -->



@section('content')



<div class="content-body">



    <div class="container-fluid">



        <div class="row page-titles mx-0">



            <div class="col-sm-6 p-md-0">



                <div class="welcome-text">



                    <h4>View List</h4>



                    <span class="ml-1">list</span>



                </div>



            </div>

            

            





            <!--<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">-->



            <!--    <ol class="breadcrumb">-->

            <!--        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>-->



            <!--        <li class="breadcrumb-item active"><a href="{{url('/moredetails')}}">View List</a></li>-->





            <!--    </ol>-->



            <!--</div>-->



        </div>

            <hr>

            @if(\Session::has('success'))



            <h4 href="javascript:void(0)" class="text-success text-center ft">{{\Session::get('success')}}</h4>



            @else



            <h4 class="text-danger text-center ft">{{\Session::get('success')}}</h4>



            @endif

            <table id="example" class="display" cellspacing="0" width="100%">

                <thead>

                    <tr>

                        <th>Name</th>

                        <th>Phone</th>

                        <th>Email</th>

                        <th>Referal Code</th>

                        <th>Request Amount</th>

                        @if ($status == '0')

                        <th>Approve</th>

                        <th>Cancel</th>

                        @endif

                    </tr>

                </thead>



                <tbody>

                  @foreach ($payments as $payment)

                  @php 

                    $user = \App\Models\User::where('id',$payment->user_id)->first();

                @endphp

                    <tr>

                        <td>{{ $user->name }}</td>

                        <td>{{ $user->phone }}</td>

                        <td>{{ $user->email }}</td>

                        <td>{{ $user->referal_code }}</td>

                        <td>{{ $payment->amount }}</td>
                            @if ($status == '0') 

                                <td><a href="{{ URL('/admin/approve-cancel-payment/').'/'.$payment->id.'/approve' }}" onclick="return confirm('Are you sure to Approve')"><button class="btn btn-primary">Approve</button></a></td>

                                <td><a href="{{ URL('/admin/approve-cancel-payment').'/'.$payment->id.'/cancel' }}" onclick="return confirm('Are you sure to Cancel')"><button class="btn btn-danger">Cancel</button></a></td>

                          

                        @endif

                       

                        

                        

                    </tr>

                    @endforeach



                </tbody>

            </table>



        </div>



    </div>







</div>



@section('footer')



@include('backend.layouts.footer')



@stop



@stop



@section('script')



<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>



<script>

    $(document).ready(function() {

        var table = $('#example').DataTable({

            'responsive': true

        });



        // Handle click on "Expand All" button

        $('#btn-show-all-children').on('click', function() {

            // Expand row details

            table.rows(':not(.parent)').nodes().to$().find('td:first-child').trigger('click');

        });



        // Handle click on "Collapse All" button

        $('#btn-hide-all-children').on('click', function() {

            // Collapse row details

            table.rows('.parent').nodes().to$().find('td:first-child').trigger('click');

        });

    });



    $('.comp').click(function() {

      var hidid = $(this).attr('id');

      $('input[name="hiddenid"]').val(hidid);

    });

</script>







@stop

