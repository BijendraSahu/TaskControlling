@include('layouts.headder')
@include('layouts.plugin')
{{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">--}}
<style>
    .input-group-text{
        background-color: #dc3545;
        border-color:#dc3545 ;
        color: white;
    }
    input[type=text]:focus{
        box-shadow: 1px 0px 8px #dc3545
    }
    input[type=email]:focus{
        box-shadow: 1px 0px 8px #dc3545
    }
    .form-control[type=text]{
        border-color:#dc3545;
    } .form-control[type=email]{
        border-color:#dc3545;
    }


</style>
<br>
{{--<div class="alert alert-success" id="alertmsg"></div>--}}

<h2 align="center">Add New Customer</h2>
<hr>
<div class="container">
    <form>
        <div class="row">
            <div class="input-group col-sm-6">
                <div class="input-group-prepend">
                <label class="input-group-text " for="firstname"><i class="fas fa-user-edit"></i></label>
                </div>
                <input type="text" class="form-control uppercase mytext" id="firstname" placeholder="First Name" autofocus>
            </div>
            <div class="input-group col-sm-6">
                <div class="input-group-prepend">
                <label class="input-group-text " for="lastname"><i class="fas fa-user-edit"></i> </label>
                </div>
                    <input type="text" class="form-control uppercase mytext" id="lastname" placeholder="Last Name">
            </div>
        </div><br>
        <div class="row">
            <div class="input-group col-sm-6">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="email"><i class="fas fa-envelope"></i></label>
                </div>
                <input type="email" class="form-control" id="email" placeholder="Email If You Have">

            </div>
            <div class="input-group col-sm-6">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="number"><i class="fas fa-phone"></i></label>
                </div>
                <input type="text" class="form-control mynumber" id="number" placeholder="Mobile Number">

            </div>

        </div><br>
        <div class="row">
        <div class="input-group col-md-12">
            <div class="input-group-prepend">
                <label for="address" class="input-group-text"><i class="fas fa-map-marked-alt"></i></label>
            </div>
            <input type="text" class="form-control" id="address" placeholder="Full Address">
        </div>
        </div><br>
        <div class="row">
            <div class="input-group col-sm-6">
                <div class="input-group-prepend">
                    <label for="landmark" class="input-group-text"><i class="fas fa-map-marker-alt"></i></label>
                </div>
                <input type="text" class="form-control uppercase" id="landmark" placeholder="Landmark">
            </div>
            <div class="input-group col-sm-6">
                <div class="input-group-prepend">
                    <label for="city" class="input-group-text"><i class="fas fa-city"></i></label>
                </div>
                <input type="text" class="form-control uppercase" id="city" placeholder="City">
            </div>
        </div>
        <br>
        <button type="button" class="btn btn-outline-danger col-sm-2 " id="addcustomer">Add</button>
    </form>
</div>

{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>--}}
{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>--}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        loader_function('hide');
        $('.uppercase').on('keydown', function(event) {
            var str = $(this).val();
            str=str.toLowerCase().replace(/\b[a-z]/g, function(letter) {
                return letter.toUpperCase();

            });
            $(this).val(str);
        });
    $('input').keydown(function(e) {
        if (e.keyCode == 13) {
            $('#addcustomer').click();
        }
    });
    $('#addcustomer').click(function () {
        debugger;
        var firstname, lastname, email, number, address, landmark, city;
        firstname = $('#firstname').val();
        lastname = $('#lastname').val();
        email = $('#email').val();
        number = $('#number').val();
        address = $('#address').val();
        landmark = $('#landmark').val();
        city = $('#city').val();
        if ($('#firstname').val() ==""){
            $('#firstname').attr('placeholder','You Forget to Give your First Name');
            return false;
        }
        else if($('#lastname').val()==""){
            $('#lastname').attr('placeholder','You Forget to Give your Last Name');
            return false;
        }

        else if($('#number').val()=="" ){

            $('#number').attr('placeholder','You Forget to Give your Number');

            return false;
        }
        else if( $('#address').val()==""){
            $('#address').attr('placeholder','You Forget to Give your Address');

            return false;
        }
        else if($('#landmark').val()==""){

            $('#landmark').attr('placeholder','You Forget to Give your Landmark');

            return false;
        }
        else if($('#city').val() == "")
        {

            $('#city').attr('placeholder','You Forget to Give your City');
//            alert('Fill Required Field');
            return false;


        }else {
            $.get('{{url('addnewcustomer')}}', {
                firstname: firstname, lastname: lastname, email: email, number: number, address: address,
                landmark: landmark, city: city
            }, function (result) {
                debugger;
                if (result == 'done') {
                    $('#alertmsg').show();
                    $('#alertmsg').html('<span style="color: #3b7348;" class="far fa-check-circle fa-2x"> Added</spane>');
                    $("#alertmsg").fadeIn("slow").delay(2000).fadeToggle("slow");
//                    sessionStorage.setItem("Added",result);
                    $('#firstname').val('');
                    $('#lastname').val('');
                    $('#email').val('');
                    $('#number').val('');
                    $('#address').val('');
                    $('#landmark').val('');
                    $('#city').val('');
                }
                else if (result == 'notdone') {
                    $('#alertwarning').show();
                    $('#alertwarning').html('<span style="color: #3b7348;" class="far fa-check-circle fa-2x"> Number Already Exist</spane>');
                    $("#alertwarning").fadeIn("slow").delay(2000).fadeToggle("slow");
                }
                else {
                    console.log(result);
                    alert('Not added');
                }

            });
        }
        });
    //    ------------------------validatione-----------------------
    $("#number").on("keyup", function() {
        debugger;

        var value=$(this).val();
        $.ajax({
            type: "GET",
            cache: false,
            url: '{{url('numberExist')}}',
            data: {value: value},    // multiple data sent using ajax
            success: function (data) {
                debugger;
                if (data == 'done') {
//                    $('#alertExist').html('Number Already Exist ').css('color', '#dc3545');
                    $('#alertwarning').show();
                    $('#alertwarning').html('<span style="color: #f0ad4e;" class="fas fa-exclamation-triangle fa-2x"> Number Already Exist</spane>');
                    $("#alertwarning").fadeIn("slow").delay(2000).fadeToggle("slow");
                    return false;
                }

            }
        });

    });
    $(".mytext").keypress(function () {
        if (event.keyCode == 8 || event.keyCode == 32) return true;
        if (!((event.keyCode >= 65 && event.keyCode <= 90) || (event.keyCode >= 97 && event.keyCode <= 122))) return false;
    });

    $(".mynumber").keypress(function () {
        if (event.keyCode == 8) return true;
        if ($(this).val().length >= 10) {
            $(this).val($(this).val().slice(0, 10));
            return false
        }
        if (!(event.keyCode >= 48 && event.keyCode <= 57)) return false;
    });

    $('.dnumber').keypress(function (event) {
        if (event.which < 46 || event.which >= 58 || event.which == 47) {
            event.preventDefault();
        }

        if (event.which == 46 && $(this).val().indexOf('.') != -1) {
            this.value = '';
        }
    });
    });
</script>