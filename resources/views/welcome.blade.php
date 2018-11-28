<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
          crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Welcome</title>
</head>
<body>
<div class=" container">
    <div class="row justify-content-center">
        <div class="col-4">
            <button type="button" class="btn btn-outline-info btn-lg float-left" data-toggle="modal" data-target="#ModalSignIn">Login</button>
            <button type="button" class="btn btn-outline-success btn-lg float-right" data-toggle="modal" data-target="#SignUpModal">SignUp</button>
        </div>
</div>
    <!-- Modal -->
    <div class="modal fade" id="ModalSignIn" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-center" id="Modal_header">
                <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="md-form ">
                    <i class="fa fa-envelope prefix grey-text"></i>
                    <input type="email" id="email" class="form-control validate">
                    <span>Your email</span>
                </div>

                <div class="md-form">
                    <i class="fa fa-lock prefix grey-text"></i>
                    <input type="password" id="password" class="form-control validate">
                    <span>Your password</span>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-success" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-primary">Save changes</button>
            </div>
        </div>
        </div>
    </div>
</div>
<div class="modal fade" id="SignUpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="border: 2px; border: #43ffb1">
        <div class="modal-content">
            <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Sign up</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data">
                    <div class="md-form mb-1">
                        <i class="fa fa-user prefix grey-text"></i>
                        <input type="text" id="Uname" class="form-control validate">
                        <span>Your name</span>
                    </div>
                    <div class="md-form mb-1">
                        <i class="fa fa-envelope prefix grey-text"></i>
                        <input type="email" id="Uemail" class="form-control validate">
                        <span>Your email</span>
                    </div>

                    <div class="md-form mb-1">
                        <i class="fa fa-lock prefix grey-text"></i>
                        <input type="password" id="Upassword" class="form-control validate">
                        <span>Your password</span>
                    </div>

                    <div class="md-form mb-1">
                        <i class="fa fa-lock prefix grey-text"></i> <span id="message"></span>
                        <input type="password" id="confirmpassword" class="form-control validate">
                        <span>Confirm password</span>
                    </div>
                    <div class="md-form mb-4">
                        <i class="fa fa-id-badge prefix grey-text"></i>
                        <input type="file" id="profile" class="form-control validate">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <span>Upload Profile</span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-success" onclick="signUp()">Sign up</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
//            toastr.options.timeOut = 1500;
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-full-width",
            "preventDuplicates": false,
//                "showDuration": "300",
//                "hideDuration": "1000",
//                "timeOut": "5000",
//                "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    });
    $('#confirmpassword').on('keyup', function () {
        if ($('#Upassword').val() == $('#confirmpassword').val()) {
            $('#confirmpassword').css('border-color', 'green','box-shadow','1px 2px 5px green');
            $('#Upassword').css('border-color', 'green','box-shadow','1px 2px 5px green');
            $('#message').html('Matching').css('color', 'green');
//            $('#Upassword').css('border-color', 'green','box-shadow:1px 2px 5px');
        } else{
            $('#Upassword').css('border-color', 'red','box-shadow','1px 2px 5px green');

            $('#message').html('Not Matching').css('color', 'red');
            $('#confirmpassword').css('border-color', 'red','box-shadow','1px 2px 5px green');
        }



    });
    function signUp() {
        debugger;
        var name = $('#Uname').val();
        var email = $('#Uemail').val();
        var password = $('#Upassword').val();
        var confirmpassword = $('#confirmpassword').val();
        var profile = $('#profile')[0].files[0];
        var data = new FormData();
        data.append('name', name);
        data.append('email', email);
        data.append('password', password);
//            data.append('confirmpassword', confirmpassword);
        data.append('profile', profile);

        $.ajax({

            url: '{{url('signup')}}',
            type: 'POST',
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            success: function (result) {
                debugger;
                if (result == 'done') {
                    toastr.success("Succecfully Register", "Success");
//                        window.location.reload();

                    setTimeout(window.location.reload(), 10000);
                } else {
                    console.log(result);
                }
            }
        });

    }
    function login() {
        debugger;
        var email= $('#email').val();
        var password=$('#password').val();
        $.get('{{url('logingin')}}',{email:email, password:password}, function(result){
            debugger;
            if(result=='done'){
//                        toastr.success('Success');
                window.location.href="{{url('dashboard')}}"
            } else{
                console.log(result);
            }
        });

    }


</script>
</body>
</html>