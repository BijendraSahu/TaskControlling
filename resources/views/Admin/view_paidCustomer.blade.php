@include('layouts.headder')
<script src="{!! url('fonts/Font awesome 5.4 js.js') !!}"></script>

<link rel="stylesheet" href="{{url('/css/sweetalert2.css')}}">
<script src="{{url('/js/sweetalert2.js')}}"></script>
<style>
    .input-group-text{
        background-color: #dc3545;
        border-color:#dc3545;
        color: white;
    }
    input[type=text]:focus{
        box-shadow: 1px 0px 8px #dc3545
    }
    input[type=text]{
        border-color:#dc3545;
    }
    .custom-select{
        border-color:#dc3545;

    }
    .custom-select:focus{
        box-shadow: 1px 1px 8px #dc3545;
    }
</style>

<h2 align="center">Paid/Due Ammount Customer</h2>
<hr>
{{--<div class=" col-md-12">--}}
    <div class=" container col-sm-12" align="center" style=" box-shadow: 0px 5px 8px #ccc" >
        <br>
        <div class="col-sm-11">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-search" aria-hidden="true"></i></span>
                </div>
                <input type="text" id="filtername" style="border-color:#dc3545;" class="form-control" placeholder="Search Name..." autofocus>
            </div>
            <hr>
            <div id="customerpaidtable">
            <table class="table table-hover table-striped ">
                <thead class="sticky-top" style="background-color: #e3f2fd;">
                <tr>
                    <th>#</th>
                    <th>Customer Name</th>
                    <th>Status</th>
                    <th>Next Payment</th>
                </tr>

                <tbody>
                @foreach($result as $index=> $paymentlist)
                    <?php $daysDiff=Illuminate\Support\Carbon::parse($currentdate)->diffInDays(Illuminate\Support\Carbon::parse($paymentlist->nextPaymentDate));?>
                    <tr>
                        <th scope="row">{{$index +1}}</th>
                        <td>{{$paymentlist->CustomerFirstname." ".$paymentlist->CustomerLastname}}</td>
                        <td> @if($paymentlist->lastdueamt!=0)
                                Last Due Ammount <b>{{$paymentlist->lastdueamt}}</b>
                        @else
                        No Ammount Due
                        @endif</td>

                         <td>Next Payment in <b>{{$daysDiff}}</b> Days</td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            <hr>
            <div style="float: right;">
                {{ $result->links() }}
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        loader_function("hide") ;
    });
    $("#filtername").on("keyup", function() {

        var value=$(this).val();
        $.ajax({
            type: "GET",
            cache: false,
            url: '{{url('searchforpaidcustomer')}}',
            data: {value: value},    // multiple data sent using ajax
            success: function (data) {
                debugger;
//                console.log(data[0]);
//                document.write(value)
                var Data=data;
                $('#customerpaidtable').html('');

                if(Data==0){
                    $('#customerpaidtable').html('Not Record found');
                }else{
                    $('#customerpaidtable').html(data);
                }
            }
        });

    });
</script>



@include('layouts.footer')