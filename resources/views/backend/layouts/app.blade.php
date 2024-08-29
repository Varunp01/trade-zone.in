<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>Trade Zone - @yield('title') </title>

    <!-- Favicon icon -->

    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('public/backend/images/favicon.png')}}">

    <link href="{{asset('public/backend/vendor/pg-calendar/css/pignose.calendar.min.css')}}" rel="stylesheet">

    <link href="{{asset('public/backend/vendor/chartist/css/chartist.min.css')}}" rel="stylesheet">

    <link href="{{asset('public/backend/css/style.css')}}" rel="stylesheet">

    <!-- ------------------- fontawosome -------------------  -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    @section('file')

    @show

</head>

<body>

    @section('loader')



    @show

    <div id="main-wrapper">

        @section('header')

            

        @show

        @yield('content')

        @section('footer')

        @show

    </div>

    <script src="{{asset('public/backend/vendor/global/global.min.js')}}"></script>

    <script src="{{asset('public/backend/js/quixnav-init.js')}}"></script>

    <script src="{{asset('public/backend/js/custom.min.js')}}"></script>

    <script src="{{asset('public/backend/vendor/chartist/js/chartist.min.js')}}"></script>

    <script src="{{asset('public/backend/vendor/moment/moment.min.js')}}"></script>

    <script src="{{asset('public/backend/vendor/pg-calendar/js/pignose.calendar.min.js')}}"></script>

    <script src="{{asset('public/backend/js/dashboard/dashboard-2.js')}}"></script>

    @section('script')

    @show

</body>

</html>