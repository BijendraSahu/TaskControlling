@include('layouts.headder')
{{--@include('layouts.plugin')--}}

<style>
    .input-group-text {
        background-color: #dc3545;
        border-color: #dc3545;
        color: white;
    }

    input[type=text]:focus {
        box-shadow: 1px 0px 8px #dc3545
    }

    input[type=text] {
        border-color: #dc3545;
    }

    .custom-select {
        border-color: #dc3545;

    }

    .custom-select:focus {
        box-shadow: 1px 1px 8px #dc3545;
    }

    .form-control {
        border-color: #dc3545;
    }

    @media only screen and (max-width: 800px) {
        .custom-select-sm{
            width: 403px;
        }

    }

</style>
<h2 align="center">Cutomer List For Make Payment</h2>
<hr>
<div class="row col-sm-12">
    <div class="col-sm-6" align="center" style="margin-left: 15px; box-shadow: 0px 5px 8px #ccc">
        <br>
        <div class="col-sm-11">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search" aria-hidden="true"></i></span>
                </div>
                <input type="text" style="border-color:#dc3545;" id="filtername" class="form-control"
                       placeholder="Search Name..." autofocus>
            </div>
            <hr>
            <div id="customermakepaymenttable">
            <table class="table table-hover table-striped ">
                <thead class="sticky-top" style="background-color: #e3f2fd;">
                <tr>
                    <th>#</th>
                    <th>Customer Name</th>
                    <th>Action</th>
                </tr>
                <tbody>
                @foreach($result as $index=> $paymentlist)
                    <?php $daysDiff = Illuminate\Support\Carbon::parse($currentdate)->diffInDays(Illuminate\Support\Carbon::parse($paymentlist->nextPaymentDate));?>
                    <tr>
                        <th scope="row">{{$index +1}}</th>
                        <td>{{$paymentlist->CustomerFirstname." ".$paymentlist->CustomerLastname}}</td>
                        {{--<td>@if($currentdate > $paymentlist->nextPaymentDate)--}}
                        {{--<td> {{$daysDiff}}</td>--}}
                        <td>   @if($daysDiff==0)
                                <button class="btn btn-outline-danger col-sm-5"
                                        onclick="show_details(this,{{$paymentlist->id}})"><i class="fas fa-rupee-sign"
                                                                                             aria-hidden="true"></i>
                                </button>
                                {{--data-toggle="modal" data-target="#modalLarge"--}}


                            @else
                                Next Payment in <b>{{$daysDiff}}</b> Days
                            @endif
                        </td>


                    </tr>
                @endforeach
                </tbody>
            </table>
            <hr>
            <div style="float: right;">
                {{$result->links()}}
            </div>
        </div>
        </div>
    </div>
    <div class="sticky-top col-sm-5" style="margin-left:15px;height: 500px; box-shadow: 0px 5px 8px #ccc">
        <div id="makePaymentcustomer" class=" paymentForm">
            <div class="container" id="fakeaddpayment">
                <span class="text-center"><h3>Add Payment</h3></span>
                <hr>
                <form>
                    <div class="input-group  input-group-sm col-sm-12">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="packageduration"><i
                                        class="fas fa-chevron-down"></i></label>
                        </div>
                        <select class=" custom-select-sm"
                                style="border-bottom-right-radius: 3px; border-top-right-radius:3px " id="PackageType">
                            <option><b>Select a Customer...</b>
                            </option>
                        </select>

                    </div>
                    <small class="input-group col-sm-12" style="color: #a8a8a8;">*Package Name</small>
                    <br>
                    <div class="input-group  input-group-sm col-sm-12">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="packageduration"><i class="fas fa-clock"
                                                                                     aria-hidden="true"></i></label>
                        </div>
                        <input type="text" class="form-control" id="packageduration" value="Duration" disabled/>
                    </div>
                    <small class="input-group col-sm-12" style="color: #a8a8a8;">*Duration In Month</small>
                    <br>
                    <div class="input-group  input-group-sm col-sm-12">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="paymentAmmount"><i class="fas fa-rupee-sign"
                                                                                    aria-hidden="true"></i></label>
                        </div>
                        <input type="text" class="form-control" id="paymentAmmount" value="Amount"
                               placeholder="Payment To Be Paid" disabled/>
                    </div>
                    <div class="row col-sm-12">
                        <small class="input-group col-sm-6" id="currentamt" style="color: #a8a8a8;"><b>*Last Due Ammount
                                :</b></small>
                        <small class="input-group col-sm-6" id="dueamt" style="color: #a8a8a8;"><b>*Total Amount :</b>
                        </small>
                    </div>
                    <br>

                    <div class="input-group input-group-sm col-sm-12">
                        <button type="button" class=" form-control btn btn-outline-danger" disabled>Make Payment
                        </button>

                    </div>
                    <br>
                    <div class="input-group col-sm-12 checkbox">
                        <label><input type="checkbox" id="checkbox" disabled> Or Pay Next Time</label>
                    </div>
                    <div class="input-group input-group-sm col-sm-12">
                        <button class=" form-control btn btn-outline-danger" id="payNextMonth" disabled>Save Detail
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        loader_function("hide");
        $("#filtername").on("keyup", function () {
debugger;
            var value = $(this).val();
            $.ajax({
                type: "GET",
                cache: false,
                url: '{{url('serachnameformakepayment')}}',
                data: {value: value},    // multiple data sent using ajax
                success: function (data) {
//                document.write(value)
                    $('#customermakepaymenttable').html('');
                    $('#customermakepaymenttable').html(data);
                }
            });

        });

//        $('#empTable').dataTable();
    });

    function show_details(dis, id) {
//        debugger;
//            $(window).resize(function () {
//                debugger;
        if ($(window).width() <= 800) {
//            $('#mbody').html('');
//            $('#makePaymentcustomer').hide();
            $('html,body').animate({
                    scrollTop: $("#makePaymentcustomer").offset().top},
                'slow');
                $.get('{{url('AddPaymentForm')}}', {id: id}, function (Data) {
//                    debugger;
                    console.log(Data);
                    $('#makePaymentcustomer').html(Data);
                });
//            });
            }
        else  {
            $.get('{{url('AddPaymentForm')}}', {id: id}, function (Data) {
//                debugger;
                console.log(Data);
//                $('#makePaymentcustomer').html('');
                $('#makePaymentcustomer').html(Data);
            });
        }

    }
    function scrollTo(position) {
        $('body').animate({scrollTop: position}, 500);

    }
    //        ------------------filter search--------------

</script>
@include('layouts.footer')