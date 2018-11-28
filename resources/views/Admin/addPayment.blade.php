{{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">--}}
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>--}}
{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>--}}
{{--@include('layouts.plugin')--}}

<div class="container">
    <span class="text-center"><h3>Add Payment</h3></span>
    <hr>
    <form id="form1">
        <div class="input-group  input-group-sm col-sm-12">
            <div class="input-group-prepend">
                <label class="input-group-text" for="PackageName"><i id=icondn class="fas fa-chevron-down" aria-hidden="true"></i></label>
            </div>
            <select class ="custom-select-sm" style="border-bottom-right-radius: 3px; border-top-right-radius:3px" id="PackageName">
                <option >Select Package Name...</option>
                @foreach($service_package as $package)
                    <option value="{{$package->id}}">{{$package->PackageName}}
                    </option>
                @endforeach
            </select>
            <input type="hidden" id="custid" value="{{$obj->id}}">
        </div>
        <small class="input-group col-sm-12" style="color: #a8a8a8;">*Package Name</small>
        <br>
        <div class="input-group  input-group-sm col-sm-12">
            <div class="input-group-prepend">
                <label class="input-group-text" for="packageduration"><i class="fas fa-clock" aria-hidden="true"></i></label>
            </div>
            <input type="text" class="form-control" id="packageduration" value="Duration" disabled/>
        </div>

        <small class="input-group col-sm-12" style="color: #a8a8a8;">*Duration In Month</small>
        <br>
        <div class="input-group  input-group-sm col-sm-12">
            <div class="input-group-prepend">
                <label class="input-group-text" for="paymentAmmount"><i class="fas fa-rupee-sign" aria-hidden="true"></i></label>
            </div>
            <input type="text" class="form-control" id="paymentAmmount" value="Amount"
                   placeholder="Payment To Be Paid" disabled/>


            <input type="hidden" id="payment">


        </div>

        <div class="row col-sm-12">
            <small class="input-group col-sm-6" id="currentamt" style="color: #a8a8a8;">*Last Due Ammount :{{$obj->lastdueamt}}</small>
            <input type="hidden" id="l_d_a" value="{{$obj->lastdueamt}}">
            <small class="input-group col-sm-6"  style="color: #a8a8a8;">*Total Amount : <span id="dueamt"></span></small>
        </div>
        <br>

        <div class="input-group  input-group-sm col-sm-12">
            <button type="button" class=" form-control btn btn-outline-danger"  id="paymentdone">Make Payment</button>
        </div>
        <br>
        <div class="input-group col-sm-12 checkbox">
            <label><input type="checkbox" id="optcheckbox" disabled> Or Pay Next Time</label>
        </div>
        <div class="input-group  input-group-sm col-sm-12">
            <button type="button" class=" form-control btn btn-outline-danger" id="payNextMonth" disabled>Save Derail</button>

        </div>
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<script type="text/javascript">
    //        -------------------addpayment function--------------------
    $(document).ready(function () {
        loader_function("hide");
        $('#PackageName').focusout(function () {
            $('#icondn').removeClass('fa-chevron-up');
            $('#icondn').addClass('fa-chevron-down');

        });
        $('#PackageName').change(function () {
//            debugger;
            $('#icondn').removeClass('fa-chevron-up');
            $('#icondn').addClass('fa-chevron-down');
            $('#packageduration').html('');
            $('#paymentAmmount').html('');
            var Packagetype = $('#PackageName').val();
            var id=$('#custid').val();
            $.get("{{url('getpayment')}}", {Packagetype: Packagetype,id:id}, function (Data) {
//                debugger;
                console.log('%c Data', 'font-weight:bold;color:orange;');
                $('#optcheckbox').prop('disabled',false);
                $('#packageduration').val(Data.packageDuration);
                $('#paymentAmmount').val(Data.PackageAmmount);
                $('#payment').val(Data.PackageAmmount);

                var payment = $('#payment').val();
                var due_amt = $('#l_d_a').val();
                var total =0;
                total = parseInt(payment) + parseInt(due_amt);
                $('#dueamt').html(total);
            });
        });

        $("#optcheckbox").change(function (){
//            debugger;
            if($("#optcheckbox").prop("checked")==true){
                $("#payNextMonth").removeAttr('disabled');
                $("#paymentdone").prop("disabled",true);
            } else if($("#optcheckbox").prop("checked")==false) {
                $("#paymentdone").prop("disabled",false);
                $("#payNextMonth").prop("disabled",true);
            }

        });
        $('#payNextMonth').click(function () {
//            debugger;
//        confirm('Accept Payment');
//        var Packagetype = $('#PackageName').val();
            var packageduration=$('#packageduration').val();
            var paymentAmmount = $('#paymentAmmount').val();

            $.ajax({
                url: "{{url('paynexttime')}}",
                type: 'GET',
                data: {
//                Packagetype: Packagetype,
                    packageduration:packageduration,
                    paymentAmmount: paymentAmmount
                },
                success: function (result) {
                    if(result=='done')
                    {
                        alert('Reord Updated');
                    }
                }
            });
        });
        $('#paymentdone').click(function () {
//            debugger;
            confirm('Accept Payment');
            var Packagetype = $('#PackageName').val();
            var packageduration=$('#packageduration').val();
            var dueamt= $('#dueamt').val();
            var paymentAmmount;
            if(dueamt == 0){
                paymentAmmount = $('#paymentAmmount').val();
            }else{
                paymentAmmount =dueamt;
            }
            $.ajax({
                url: "{{url('addpayment')}}",
                type: 'GET',
                data: {
                    Packagetype: Packagetype,
                    packageduration:packageduration,
                    paymentAmmount: paymentAmmount
                },
                success: function (result) {
//                    debugger;
                    if (result == 'done') {
                        sessionStorage.setItem("Done",result);
                        {{--window.location.href='{{url('formakepaymentlist')}}';--}}
                        window.location.reload();
                    } else {
                        console.log(result);
                    }
                }
            });
        });
        });

    //    function makepayment() {
//        debugger;
//        alert('click');
////        onclick="makepayment();"
//    }function mouseUp() {
////            $('#icondn').addClass('fa-chevron-down');
////            $('#icondn').removeClass('fa-minus');
//
//        $('#icondn').removeClass('fa-chevron-down');
//        $('#icondn').addClass('fa-chevron-up');
//    }

</script>