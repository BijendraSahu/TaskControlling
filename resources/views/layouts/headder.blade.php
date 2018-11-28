<!doctype html>
<html lang="en">
<head>
    @include('layouts.plugin')
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cable Operator</title>
    <link rel="icon" href="{!! url('/images/icons/HP-TV-Dock-256x256.png') !!}"/>

    <style>
        .fade-scale {
            transform: scale(0);
            opacity: 0;
            -webkit-transition: all .25s linear;
            -o-transition: all .25s linear;
            transition: all .25s linear;
        }

        .fade-scale.in {
            opacity: 1;
            transform: scale(1);
        }
        #alertmsg,#alertwarning,#alertdel {
              display: none;
              padding: 5px;
              left: 75%;
              position: absolute;
              z-index: 10;
              width: 20%;
              /*opacity: 0.8;*/
              bottom: 74%;
              height: auto;
              text-align: center;
              /*color: #171a1d;*/
              font-size: medium;
              font-style: italic;
              font-variant: stacked-fractions;

          }
        #flashmsg {
            padding: 10px;
            left: 58%;
            position: fixed;
            z-index: 10;
            width: 40%;
            opacity: 0.8;
            bottom: 70%;
            height: 10%;
            text-align: center;
            color: #171a1d;
            font-size: large;

        }

        .loader {
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #3498db;
            width: 120px;
            height: 120px;
            position: fixed;
            top: spin 2s linear infinite;
            animation: spin 2s linear infinite;
            top: 18%;
            /* z-index: 1; */
            /* padding-top: 71px; */
            margin-top: 12%;
            left: 44%;
        }

        .loader_div {
            width: 100%;
            height: 1009px;
            overflow: hidden;
            background: #0d0d0ea6;
            z-index: 1041;
            position: absolute;
        }

        /* Safari */
        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        .dropdown-menu {
            z-index: 10;
            display: none;
            position: absolute;
            box-shadow: 1px 8px 16px 1px rgba(0, 0, 0, 0.2);
        }

        /*.dropdown:hover .dropdown-menu {*/
            /*display: block;*/
        /*}*/

        div.dropdown-menu > a:hover {
            color: #000000;
            text-decoration: none;
            background-color: #e3f2fd;
        }
        /*#rightnav{*/
            /*margin-right: 20px;*/
        /*}*/
        @media only screen and (max-width:800px) {
            .dropdown:hover .dropdown-menu {
                display: block;
            }
           #leftnav{
                margin-left: 15px;
            }
            .dropdown:hover .dropdown-menu {
                padding: 3px 10px;
                width: 140px;
            }
#rightnav{
    float: left;
}
        }
    </style>
</head>
<body>
<div class="alert alert-success" id="alertmsg"></div>
<div class="alert alert-warning" id="alertwarning"></div>
<div class="alert alert-danger" id="alertdel"></div>
<?php
$id = session()->get('admin')->id;
$data = \App\Admin::find($id);
?>
<!------ Include the above in your HEAD tag ---------->

<nav class=" topnav navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;box-shadow: 0px 5px 8px #ccc">
    <a class="navbar-brand" href="#"><img src="{{url('images/Admin image.jpg')}}" style="width:50px; height:50px; margin-left: 10px;
     border-radius: 50%;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto" id="leftnav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" style="color:black" id="navbardrop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Customer
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" id="list" href="{{url('customerList')}}">View List</a>
                    <a class="dropdown-item" id="addnew" href="{{url('add-customer')}}">Add New</a>
                    <a class="dropdown-item" id="makepayment" href="{{url('formakepaymentlist')}}">Make Payment</a>
                    <a class="dropdown-item" id="alreadypaid" href="{{url('forwhopaidlist')}}">Paid/Unpaid</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" id="package" href="{{url('package')}}">Package</a>
            </li>
        </ul>
        {{--<ul class="nav justify-content-center">--}}
        {{--<li class="nav-item">--}}
        {{--<form class="form-inline my-2 my-lg-0">--}}
        {{--<input class="form-control mr-sm-2" style="border-color:#c82333 " type="search" placeholder="Search" aria-label="Search">--}}
        {{--<button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Search</button>--}}
        {{--</form>--}}
        {{--</li>--}}
        {{--</ul>--}}
        <ul class="nav justify-content-end" id="rightnav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" style="color:black" id="navbardrop"
                   data-toggle="dropdown">{{$data->name}}
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{url('adminlogout')}}">Logout</a>
                    <a class="dropdown-item" id="adduser" href="{{url('userlist')}}">Add User</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<input type="hidden" id="isAdmin" value="{{$data->isAdmin}}">
<br>
@if (session('status'))
    <div class="alert alert-info" id="flashmsg">
        {{ session('status') }}
    </div>
    {{--<div id="snackbar"> {{ session('status') }}</div>--}}
@endif
<script type="text/javascript">
    $(document).ready(function () {

        var isAdmin= $('#isAdmin').val();
        if(isAdmin == 0){
            $('#list').hide();
            $('#addnew').hide();
            $('#package').hide();
            $('#adduser').hide();

        }
//        $("#flashmsg").delay(5000).slideUp(300);
        $("#flashmsg").fadeIn("slow").delay(5000).fadeToggle("slow");
//        setTimeout(function(){$("#flashmsg")}, 3000);
    });


    function loader_function(type) {
        if (type == "hide") {
            $('#loader-div').css('display', 'none');


        } else if (type == "show") {

            $('#loader-div').css('display', 'block');
        }
    }

</script>
<div class="loader_div" id="loader-div">
    <div class="loader" id="loader"></div>
</div>
<div id="iner_content">


