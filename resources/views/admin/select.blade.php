<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Cameron-Jordon Eugene">

    <title>Saint Lucia Tourism Levy</title>
    <link rel="icon" href="{{asset('img/icon.png')}}">
    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.css')}}" rel="stylesheet">
</head>

<body class="select-grey">
    <h1 class="select-title">Select a Property</h1>

    <div class="center mt-5">
        @foreach ($properties as $property)
        <a href="{{ url($property->id.'/select')}}" class="box center">
            <p>{{$property->prefix.$property->id.$property->suffix}}</p>
            <h2>{{$property->name}}</h2>
        </a>
        @endforeach
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>

</body>

</html>