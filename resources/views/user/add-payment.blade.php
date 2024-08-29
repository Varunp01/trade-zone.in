@extends('backend.layouts.app')

@section('title', 'Payment Request')

@section('loader')

@include('backend.layouts.preloader')

@stop

@section('header')

@include('backend.layouts.top-header')

@include('backend.layouts.sidebar')

@stop

@section('file')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<link href="{{asset('public/backend/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">

@stop

<!-- main contend -->

@section('content')

<div class="content-body">

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-6 offset-md-3" style="background-color: #333; padding:35px;">
            @if(\Session::has('success'))

                <h4 href="javascript:void(0)" class="text-success text-center ft">{{\Session::get('success')}}</h4>

                @else

                <h4 class="text-danger text-center ft">{{\Session::get('error')}}</h4>

                @endif
                <form action="{{ route('add.payment') }}" method="post">
                    @csrf
                   
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Add Amount</label>
                        <input type="number" name="amount"  class="form-control" placeholder="Add Amount">
                    </div>
                  
                    
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
                

            </div>

            

        </div>

    </div>

</div>

@section('footer')

@include('backend.layouts.footer')

@stop

@stop

@section('script')

  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

<script src="{{asset('public/backend/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>

<script src="{{asset('public/backend/js/plugins-init/datatables.init.js')}}"></script>

<script>
  $( function() {
    $( ".datepicker" ).datepicker();
  } );
  </script>


<!-- Jquery Validation -->

<script src="{{asset('public/backend/vendor/jquery-validation/jquery.validate.min.js')}}"></script>

<!-- Form validate init -->

<script src="{{asset('public/backend/js/plugins-init/jquery.validate-init.js')}}"></script>
 <script type="text/javascript" src="//js.nicedit.com/nicEdit-latest.js"></script> 
  <script type="text/javascript">
 
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  </script>
<script type="text/javascript">
$(document).ready(function(){
    var maxField =5;
    var addButton = $('.add_button');
    var x = 1;
    var wrapper = $('.field_wrapper');
    //Once add button is clicked
    $(addButton).click(function(){
        if(x < maxField){ 
        var fieldHTML = '<div class="form-group tr_'+x+'"><label for="formGroupExampleInput2">Product</label><input type="text" class="form-control" name="product_name[]" id="formGroupExampleInput2" placeholder="Product Name"></div><div class="form-group tr_'+x+'"><label for="formGroupExampleInput2">Quantity</label><input type="text" name="qnt[]" class="form-control" id="formGroupExampleInput2" placeholder="Quantity"></div><div class="form-group tr_'+x+' field_wrapper"><label for="formGroupExampleInput2">Amount</label><div class="mnginputgrop" style="display: flex;"><input type="text" name="amount[]" required class="form-control" id="formGroupExampleInput2" placeholder="Enter Your Amount" style="width: 95%;"><a href="javascript:void(0);" data-tr="tr_'+x+'" class="remove_button" style="margin: auto; font-size:20px; color:red;" title="Remove"><i class="fa fa-trash"></i></a></div></div>'; //New input field html 
            x++;
            $(wrapper).append(fieldHTML);
        }
    });
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        var tr=$(this).attr('data-tr');
        $('.'+tr).remove();
        x--;
    });
});
</script>


@stop