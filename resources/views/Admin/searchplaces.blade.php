<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> --}}
    {{-- @include('layouts.plugin') --}}
    <title>Document</title>
</head>
<body>
<br>
<div class="container">
    <div id="pac-container">
        <input id="pac-input" class="form-control" type="text"
               placeholder="Enter a location">
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#pac-input').keyup(function(){

                console.log("%c Data","font-size:18px;color:blue");

                console.log($('#pac-input').val());


            });

        });
        function activatPlaceSearch(){
            var input=document.getElementById('pac-input');
            var autocomplete=new google.maps.places.Autocomplete(input);
        }</script>
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjTLwOh9QO1yD2K9PWqYOrZ-Tt47OLHdQ&libraries=places&callback=activatPlaceSearch"></script>
</div>
</body>
</html>
