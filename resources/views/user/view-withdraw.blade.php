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

            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>

                    <li class="breadcrumb-item active"><a href="#">View List</a></li>


                </ol>

            </div>

        </div>
        <!-- <div class="maindtacomb">
            <div class="mainbtndata">
              <button class="rebtnmng" id="btn-show-all-children" type="button">Expand All</button>
              <button class="rebtnmng" id="btn-hide-all-children" type="button">Collapse All</button>
              <a href="{{ URL('/admin/view-lead') }}"><button class="rebtnmng1 activereb" id="pendingbtnh" type="button">Pending</button></a>
              <a href="{{ URL('/admin/lead-repeat') }}"><button class="rebtnmng1" id="repeatbtnh" type="button">Repeat</button></a>
            </div> -->
            <hr>
            @if(\Session::has('success'))

            <h4 href="javascript:void(0)" class="text-success text-center ft">{{\Session::get('success')}}</h4>

            @else

            <h4 class="text-danger text-center ft">{{\Session::get('success')}}</h4>

            @endif
            <table id="example" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Withdraw Amount</th>
                        <th>Date</th>
                        <th>Status</th>
                        
                    </tr>
                </thead>

                <tbody>
                  @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->withdraw_amount }}</td>
                        <td>{{ date('d M Y',strtotime(substr($user->created_at,0,11))) }}</td>
                        
                        @php 
                            if ($user->status == '0') { @endphp
                                <td><button class="btn btn-danger">Pending</button></td>
                           @php } else if($user->status == '1') { @endphp
                            <td><button class="btn btn-primary">Approved</button></td>
                           @php } else { @endphp
                           <td><button class="btn btn-danger">Cancel</button></td>
                           @php }
                        @endphp
                        
                       
                        
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
