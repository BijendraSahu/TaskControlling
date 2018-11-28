@include('layouts.headder')
@include('layouts.plugin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
{{--<script src="{!! url('fonts/Font awesome 5.4 js.js') !!}"></script>--}}
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>


<span><h3 align="center">Add User</h3></span>
<hr>
<div class="container">
    <div class="col-md-12">
        <form>
            <div class="row">
                <div class="input-group input-group-sm col-sm-4">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="name"><i class="fas fa-user-edit" aria-hidden="true"></i></label>
                    </div>
                    <input type="text" class="form-control mytext uppercase"  id="name" placeholder="Full Name" autofocus>
                </div>
                <div class="input-group input-group-sm col-sm-4">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="username"><i class="far fa-user"></i></label>
                    </div>
                    <input type="text" class="form-control" id="username" placeholder="Username">
                </div>
                <div class="input-group input-group-sm col-sm-4">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="password"><i class="fas fa-key" aria-hidden="true"></i></label>
                    </div>
                    <input type="password" class="form-control " id="password" placeholder="Password">
                </div>
            </div>
                <br>
                    <div class="row">
                        <div class="input-group input-group-sm col-sm-2">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="number"><i class="fas fa-phone" aria-hidden="true"></i></label>
                            </div>
                            <input type="text" class="form-control mynumber" id="number" placeholder="Number">
                        </div>
                        <div class="input-group input-group-sm col-sm-2">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="city"><i class="fas fa-city"></i></label>
                            </div>
                            <input type="text" class="form-control uppercase" id="city" placeholder="City">
                        </div>
                        <div class="input-group input-group-sm col-sm-7">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="address"><i class="fas fa-map-marked-alt" aria-hidden="true"></i></label>
                            </div>
                            <input type="text" class="form-control " id="address" placeholder="Address">
                        </div>
                        <div class="input-group col-md-1">
                            <button type="button"  style="margin-left: 20px;" class="btn btn-outline-danger btn-sm"  id="useradd">Add</button>
                        </div>
                </div>
        </form>
    </div>
    <hr>
    <br>
    <span class="text-center"><h3>View User</h3></span>
    <div class="container">
        <table class="table table-hover table-striped ">
            <thead class="sticky-top" style="background-color: #e3f2fd;">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Username</th>
                <th>Number</th>
                <th>City</th>
                <th>Addrres</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($user as $index => $obj)
                <tr>
                    <th scope="row">{{$index +1}}</th>
                    <td>{{$obj->name}}</td>
                    <td>{{$obj->username}}</td>
                    <td>{{$obj->phoneNumber}}</td>
                    <td>{{$obj->city}}</td>
                    <td>{{$obj->Address}}</td>
                    <td><div class="btn-group dropup">
                            <button type="button" class="btn btn-outline-danger btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#openmodal" onclick="editDetail(this,'{{$obj->id}}')"><i style="color:#dc3545" class="fas fa-edit" aria-hidden="true"></i> Edit</a>
                                <a class="dropdown-item" href="#" onclick="delsingle(this,'{{$obj->id}}')"><i style="color:#dc3545" class="fas fa-trash" aria-hidden="true"></i> Delete</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#openmodal" onclick="showOldrecords(this,'{{$obj->id}}')"><i style="color:#dc3545" class="fas fa-database" aria-hidden="true"></i> Old Record</a>
                            </div>
                        </div></td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#useradd').click(function () {
            debugger;
            if ($('#name').val() == "") {
                $('#name').attr('placeholder', 'You Forget to Give Name');
                return false;
            }
            else if ($('#username').val() == "") {
                $('#username').attr('placeholder', 'You Forget to Give Username');
                return false;
            }

            else if ($('#number').val() == "") {

                $('#number').attr('placeholder', 'You Forget to Give Number');

                return false;
            }
            else if ($('#address').val() == "") {
                $('#address').attr('placeholder', 'You Forget to Give Address');

                return false;
            }
            else if ($('#password').val() == "") {

                $('#password').attr('placeholder', 'You Forget to Give password');

                return false;
            }
            else if ($('#city').val() == "") {

                $('#city').attr('placeholder', 'You Forget to Give City');
//            alert('Fill Required Field');
                return false;
            }
            else {
                var name, username, password, number, address, city;
                name = $('#name').val();
                username = $('#username').val();
                password = $('#password').val();
                number = $('#number').val();
                address = $('#address').val();
                city = $('#city').val();

                $.get('{{url('adminaddusers')}}', {
                    name: name, username: username, number: number, address: address,
                    password: password, city: city
                }, function (result) {
                    debugger;
                    if (result == 'done') {
//                        alert('Customer Added');
                        sessionStorage.setItem("Added",result);
                        window.location.reload();
                        $('#name').val('');
                        $('#username').val('');
                        $('#number').val('');
                        $('#address').val('');
                        $('#password').val('');
                        $('#city').val('');
                    }
                    else {
                        console.log(result);
                        alert('Not added');
                    }

                });
            }
        });
//---------------------------------For Only numbe type function---------------------------------------------------
        $(".mynumber").keypress(function () {
            if (event.keyCode == 8) return true;
            if ($(this).val().length >= 10) {
                $(this).val($(this).val().slice(0, 10));
                return false
            }
            if (!(event.keyCode >= 48 && event.keyCode <= 57)) return false;
        });
//----------------------------------for only text---------------------------------------------------------------------
        $(".mytext").keypress(function () {

            if (event.keyCode == 8 || event.keyCode == 32) return true;
            if (!((event.keyCode >= 65 && event.keyCode <= 90) || (event.keyCode >= 97 && event.keyCode <= 122))) return false;
        });
        $('.uppercase').on('keydown', function(event) {
            var str = $(this).val();
            str=str.toLowerCase().replace(/\b[a-z]/g, function(letter) {
                return letter.toUpperCase();

            });
            $(this).val(str);
        });
    });
</script>
@include('layouts.footer')