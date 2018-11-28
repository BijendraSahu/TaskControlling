
@include('layouts.plugin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<script type="text/javascript">
    //        -------------------addpayment function--------------------
    $(document).ready(function () {
        loader_function("hide");
//        $('#PackageName').focusout(function () {
//            $('#icondn').removeClass('fa-chevron-up');
//            $('#icondn').addClass('fa-chevron-down');
//
//        });
        $('#PackageName').change(function () {
//            debugger;
//            $('#icondn').removeClass('fa-chevron-up');
//            $('#icondn').addClass('fa-chevron-down');
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
                        alert('Payment accepted');
                        {{--window.location.href='{{url('formakepaymentlist')}}';--}}
                        window.location.reload();
                    } else {
                        console.log(result);
                    }
                }
            });
        });
    });
    </script>
<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Select Package
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton"  id="PackageName">
        @foreach($service_package as $package)
            <li ><a value="{{$package->id}}" href="#">{{$package->PackageName}}</a></li>
        @endforeach
    </ul>
    <input type="hidden" id="custid" value="{{$obj->id}}">
</div>
<br>
<h4>Package Name : <span id="packageduration" class="label label-default" value=""></span></h4>

<br>
<h4>Ammount Name : <span id="paymentAmmount" class="label label-default" value=""></span></h4>

<input type="hidden" id="payment">
<h4>Last Due Ammout : <span id="currentamt" class="label label-default">{{$obj->lastdueamt}}</span></h4>
<input type="hidden" id="l_d_a" value="{{$obj->lastdueamt}}">

<h4>Total Ammount : <span id="paymentAmmount" class="label label-default" value=""><span id="dueamt"></span></span></h4>
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
@include('layouts.footer')