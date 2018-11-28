<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin User Records</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <style>
        .invoice {
            position: relative;
            background: #fff;
            border: 1px solid #f4f4f4;
            padding: 20px;
            margin: 10px 25px;
        }

        .page-header {
            margin: 10px 0 20px 0;
            font-size: 22px;
        }
        .page-footer{
            font-size: 22px;
        }
        .text-center{

        }
    </style>
</head>

<body>
<div class="text-center">
    Admin User Reports
    <hr>
</div>
<div class="container-fluid" id="printer">

    <section class="content content_content" style="width: 70%; margin: auto;">
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">

                        <?php
                        $count = 1;
                        ?>
                        @foreach($records as $cust)
                            @if($count == 1)
                                <b>Admin User Name:</b> {{$cust->name}}
                                <small class="pull-right">
                                    {{--<span>Next Payment Date: <b>{{\Carbon\Carbon::parse($cust->nextPaymentDate)->format('d-M-y')}}</b></span>--}}
                                    <span>Total Ammount Collaction: <b>{{$cust->totalCollection}} Rs</b></span>
                                </small>
                            @endif
                            <?php
                            $count++;
                            ?>
                        @endforeach
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-xs-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Date Of Payment</th>
                            <th scope="col">Ammount</th>
                            <th scope="col">Customer Name</th>
                            {{--<th scope="col">Payment Accept By</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($records as $obj)
                            <tr>
                                <td>{{\Carbon\Carbon::parse($obj->paymentDate)->format('d-M-y')}}</td>
                                <td>{{$obj->Ammount}}</td>
                                {{--<td>{{$obj->PackageName}}--}}

                                {{--</td>--}}
                                <td>{{$obj->CustomerFirstname}} {{$obj->CustomerLastname}}
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <hr>

                </div>
                <!-- /.col -->
            </div>

            <!-- /.row -->

            <!-- this row will not appear when printing -->
            {{--<div class="row">--}}
                {{--<div class="col-xs-12">--}}
                    {{--<h2 class="page-footer">--}}
                        {{--@foreach($records as $due)--}}
                            {{--<small class="pull-right">--}}
                                {{--<span>Due Ammount: <b>{{$due->lastdueamt}} Rs</b></span>--}}
                            {{--</small>--}}
                        {{--@endforeach--}}
                    {{--</h2>--}}
                {{--</div>--}}
            {{--</div>--}}
        </section>
    </section>

</div>
<div class="row no-print col-md-12">
    <div class="text-center">
        <a href="" onclick="myFunction(this)" class="btn btn-danger btn-lg"><i class="fa fa-print"></i>Print</a>
    </div>
</div>
<script>
    function myFunction(dis) {
        $(dis).css('display', 'none');
        $('.text-center').css('display','none');
        window.print();
    }

</script>
</body>

</html>
