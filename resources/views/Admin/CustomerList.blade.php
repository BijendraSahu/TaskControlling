@include('layouts.headder')
@include('layouts.plugin')
<style>

    .focusclr:focus {
        box-shadow: 1px 0px 8px #5bc0de
    }

    input[type=text]:focus {
        box-shadow: 1px 0px 8px #dc3545
    }

    input[type=email]:focus {
        box-shadow: 1px 0px 8px #dc3545
    }

    .input-group-text {
        background-color: #dc3545;
        border-color: #dc3545;
        color: white;
    }

    .form-control[type=text] {
        border-color: #dc3545;
    }

    .form-control[type=email] {
        border-color: #dc3545;
    }

    /*.dropdown-menu{*/
    /*z-index: 10;*/
    /*display: none;*/
    /*position: absolute;*/

    /*}*/
    .dropright:hover .dropdown-menu {
        display: block;
    }

</style>
<div></div>
<br>
<div class="container">

    <div class="row">
        <div class="col-sm-3">
            <h2>Customer List</h2>
        </div>
        <div class="col-sm-7">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search" aria-hidden="true"></i></span>
                </div>
                <input type="text" id="filtername" class="form-control"
                       placeholder="Search With Name, Number and Email..." autofocus>
            </div>
        </div>
        <div class="col-sm-2">
            <button type="button" class="btn btn-outline-danger float-right"
                    data-toggle="modal" data-target="#AddModal" id="addnewcustomer">Add New
            </button>
        </div>

    </div>
    <hr>
    <br>
    <div id="search"></div>
    <div id="customertable">
        <table id="empTable" class="table table-striped table-hover table-responsive-sm"
               style="box-shadow: 1px 0px 9px #ccc ">
            <thead style="background-color: #e3f2fd;">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Number</th>
                <th scope="col">Address</th>
                <th scope="col">Landmark</th>
                <th scope="col">City</th>
                <th scope="col">Option</th>
            </tr>
            </thead>
            <tbody>
            @foreach($result as $index=> $customer)
                <tr>
                    <th scope="row">{{$index +1}}</th>
                    <td>{{$customer->CustomerFirstname}} {{$customer->CustomerLastname}}</td>
                    <td>@if($customer->CustomerEmail=='')
                            No Email Available

                        @else{{$customer->CustomerEmail}}
                        @endif
                    </td>
                    <td>{{$customer->CustomerMobile}}</td>
                    <td>{{$customer->CustomerAddress}}</td>
                    <td>{{$customer->CustomerLandmark}}</td>
                    <td>{{$customer->CustomerCity}}</td>
                    <td>
                        <div class="btn-group dropright">
                            {{--<button type="button" class="btn btn-outline-danger btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                            <button class="btn btn-outline-danger btn-sm dropdown-toggle"> Action
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#openmodal"
                                   onclick="editDetail(this,'{{$customer->id}}')"><i style="color: #dc3545 "
                                                                                     class="fas fa-edit"
                                                                                     aria-hidden="true"></i> Edit</a>
                                <a class="dropdown-item" href="#" onclick="delsingle(this,'{{$customer->id}}')"><i
                                            style="color: #dc3545 " class="fas fa-trash-alt" aria-hidden="true"></i>
                                    Delete</a>
                                {{-- <a class="dropdown-item" href="#" onclick="opennewwindow(this,'{{$customer->id}}')" ><i style="color: #dc3545 " class="fas fa-database" aria-hidden="true"></i> Old Record</a> --}}
                                <a class="dropdown-item" href="#" onclick="opensearch(this,'{{$customer->id}}')"><i
                                            style="color: #dc3545 " class="fas fa-database" aria-hidden="true"></i> Old
                                    Record</a>
                                {{--onclick="showOldrecords(this,'{{$customer->id}}')--}}
                                {{--data-toggle="modal" data-target="#openmodal"--}}
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
        {{--<div class="pagination-container">--}}
        {{--<nav>--}}
        {{--<ul class="pagination"></ul>--}}
        {{--</nav>--}}
        {{--</div>--}}

        <div style="float: right;">
            {{ $result->links() }}
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e3f2fd;">
                <h5 class="modal-title" id="exampleModalLabel">Add New Customer</h5>
                <button type="button" class="close" data-dismiss="modal" onclick="clearall()" aria-label="Close">
                    <i style="color:#dc3545;" class="fa fa-window-close" aria-hidden="true"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form>
                        <div class="row">
                            <div class="input-group col-sm-6">
                                <div class="input-group-prepend">
                                    <label class="input-group-text " for="firstname"><i
                                                class="fas fa-user-edit"></i></label>
                                </div>
                                <input type="text" class="form-control mytext uppercase" id="firstname" placeholder="First Name"
                                       autofocus>
                            </div>
                            <div class="input-group col-sm-6">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="lastname"><i class="fas fa-user-edit"></i>
                                    </label>
                                </div>
                                <input type="text" class="form-control mytext uppercase" id="lastname" placeholder="Last Name">
                            </div>
                        </div>
                        <br>
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
                                <input type="text" class="form-control mynumber" id="number"
                                       placeholder="Mobile Number">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="input-group col-md-12">
                                <div class="input-group-prepend">
                                    <label for="address" class="input-group-text"><i class="fas fa-map-marked-alt"></i></label>
                                </div>
                                <input type="text" class="form-control" id="address" placeholder="Full Address">
                            </div>
                        </div>
                        <br>
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
                    </form>
                </div>
                <br>
                <div class="modal-footer" style="background-color: #e3f2fd;">
                    <button type="button" class="btn btn-outline-danger" onclick="clearall()" data-dismiss="modal">
                        Close
                    </button>
                    <button type="button" id="Addbtnmodel" class="btn btn-outline-success col-sm-3">Add</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="openmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div class="modal-header" id="hm" style="background-color: #e3f2fd;">
                <span><strong><i>Search Record</i></strong></span>
                <button type="button" class="close" data-dismiss="modal" onclick="clearthis()" aria-label="Close">
                    <i style="color:#dc3545;" class="fa fa-window-close" aria-hidden="true"></i>
                </button>
            </div>
            <div class="modal-body" id="msg">
                <hr>
                <div class=" col-md-12" style="
    margin-left: 2px;" >
                    <div class=" col-md-12">
                        <span><b>From: </b></span>
                        <input type="date" id="from" class="form-control focusclr"
                               style="border-color:#5bc0de;">
                    </div>
                    <div class=" col-md-12">
                        <span><b>T0: </b></span>
                        <input type="date" id="to" class="form-control focusclr" style="border-color:#5bc0de;">
                    </div>
                    <div class=" col-sm-12" style="margin-top: 10px">
                        <button type="button"  class="btn btn-outline-info col-sm-12" onclick="filterrecord(this,'{{$customer->id}}')" id="searchrecord">Search
                        </button>
                    </div>
                </div>
                <br>


                <div class="modal-footer" id="cm" style="background-color: #e3f2fd;">

                </div>
            </div>
        </div>
    </div>
    {{-----------Ajax----------------}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        //    ---------------for add new customer------------------


        $(document).keypress(function (e) {
            if (e.which == 13) {
                $('#Addbtnmodel').click();//Trigger search button click event
            }
        });
        //  $('#UpdateCustomer').click(function () {
        $(document).ready(function () {
            loader_function('hide');
            $('.uppercase').on('keydown', function(event) {
                var str = $(this).val();
                str=str.toLowerCase().replace(/\b[a-z]/g, function(letter) {
                    return letter.toUpperCase();

                });
                $(this).val(str);
            });
            $('#Addbtnmodel').click(function () {
                debugger;
                var firstname, lastname, email, number, address, landmark, city;
                firstname = $('#firstname').val();
                lastname = $('#lastname').val();
                email = $('#email').val();
                number = $('#number').val();
                address = $('#address').val();
                landmark = $('#landmark').val();
                city = $('#city').val();
                if ($('#firstname').val() == "") {
                    $('#firstname').attr('placeholder', 'You Forget to Give your First Name');
                    return false;
                }
                else if ($('#lastname').val() == "") {
                    $('#lastname').attr('placeholder', 'You Forget to Give your Last Name');
                    return false;
                }

                else if ($('#number').val() == "") {

                    $('#number').attr('placeholder', 'You Forget to Give your Number');

                    return false;
                }
                else if ($('#address').val() == "") {
                    $('#address').attr('placeholder', 'You Forget to Give your Address');

                    return false;
                }
                else if ($('#landmark').val() == "") {

                    $('#landmark').attr('placeholder', 'You Forget to Give your Landmark');

                    return false;
                }
                else if ($('#city').val() == "") {

                    $('#city').attr('placeholder', 'You Forget to Give your City');
//            alert('Fill Required Field');
                    return false;


                } else {
                    $.get('{{url('addnewcustomer')}}', {
                        firstname: firstname, lastname: lastname, email: email, number: number, address: address,
                        landmark: landmark, city: city
                    }, function (result) {
                        debugger;
                        if (result == 'done') {
                            alert('Customer Added');
                            $('#firstname').val('');
                            $('#lastname').val('');
                            $('#email').val('');
                            $('#number').val('');
                            $('#address').val('');
                            $('#landmark').val('');
                            $('#city').val('');
                            $('#firstname').attr('placeholder', 'First Name');
                            $('#lastname').attr('placeholder', 'Last Name');
                            $('#email').attr('placeholder', 'Email If You Have');
                            $('#number').attr('placeholder', 'Mobile Number');
                            $('#address').attr('placeholder', 'Full Address');
                            $('#landmark').attr('placeholder', 'Landmark');
                            $('#city').attr('placeholder', 'City');
                        }
                        else {
                            console.log(result);
                            alert('Not added');
                        }

                    });
                }
            });
            $(".mytext").keypress(function () {
                if (event.keyCode == 8 || event.keyCode == 32) {
                    return true;
                } else if (!((event.keyCode >= 65 && event.keyCode <= 90) || (event.keyCode >= 97 && event.keyCode <= 122))) {
                    alert('Type Only Alphabet');
                    return false;

                }
            });

            $(".mynumber").keypress(function () {
                if (event.keyCode == 8) return true;
                if ($(this).val().length >= 10) {
                    $(this).val($(this).val().slice(0, 10));
                    return false
                }
                if (!(event.keyCode >= 48 && event.keyCode <= 57)) {
                    alert("Type only number");
                    return false;
                }
            });
            $("#filtername").on("keyup", function () {

                var value = $(this).val();
                $.ajax({
                    type: "GET",
                    cache: false,
                    url: '{{url('searchforcustomer')}}',
                    data: {value: value},    // multiple data sent using ajax
                    success: function (data) {
//                document.write(value)
                        $('#customertable').html('');
                        $('#customertable').html(data);
                    }
                });

            });

//        $('#empTable').dataTable();
        });
        function opensearch(dis, id) {
            $.get('{{url('openmodalwithsession')}}', {ID: id}, function (data) {
                debugger;
                if(data='done'){
                    $('#openmodal').modal('show');

                }
                else{
                    console.log(data);
                }
            });


        }
        $('#searchrecord').click(function () {

            var from=$('#from').val();
            var to=$('#to').val();
            if(from==""){
                alert('Fill Required Field');
                return 'false';
            }else if(to=="")
                {
                    alert('Fill Required Field');
                    return 'false';
            }
            else{
                var url = "{{url('/')}}" + "/getOldRecords/"+from+"/"+ to+ "/getOldRecords";
                window.open(url);
                $('#openmodal').modal('hide');

            }

            {{--$.get('{{url('getOldRecords')}}', {from:from, to:to, id: id}, function (data) {--}}

        });

        //        ------- for deleting customer------------


        function delsingle(dis, id) {
            debugger;
            $.get('{{url('deletesingle')}}', {ID: id}, function (data) {
                debugger;
                console.log(data);
                if (data == 'done') {
                    $(dis).closest("tr").remove(); // You can remove row like this
                    $('#alertdel').show();
                    $('#alertdel').html('<span style="color: #5cb85c;" class="fas fa-check-double fa-2x"> Deleted</spane>');
                    $("#alertdel").fadeIn("slow").delay(2000).fadeToggle("slow");
                } else {
                    console.log(data);
                }
            });
        }
        function editDetail(dis, id) {
            $('#msg').html('');
            $.ajax({
                type: "GET",
                cache: false,
                url: '{{url('detailsforedit_')}}',
                data: {id: id},    // multiple data sent using ajax
                success: function (data) {
                    $('#msg').html('');
                    $('#hm').html('<h5 class="modal-title">Edit Customer Detail</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"> <i style="color:#dc3545;" class="fa fa-window-close" aria-hidden="true"></i></button>');
                    $('#msg').html(data);
//            $('#cm').html('');
                    $('#cm').html('<button type="button" class="btn btn-outline-danger  "data-dismiss="modal">Close</button><button type="button" id="UpdateCustomer" onclick="UpdateCustomer()" class="btn btn-outline-success col-sm-3">Update</button>');
                }
            });
        }
        function UpdateCustomer() {
            debugger;
            var firstname1, lastname1, email1, number1, address1, landmark1, city1, id;
            firstname1 = $('#firstname1').val();
            lastname1 = $('#lastname1').val();
            email1 = $('#email1').val();
            number1 = $('#number1').val();
            address1 = $('#address1').val();
            landmark1 = $('#landmark1').val();
            city1 = $('#city1').val();
            id = $('#id').val();
            $.get('{{url('updateCustomerDetail')}}', {
                firstname1: firstname1, lastname1: lastname1, email1: email1, number1: number1, address1: address1,
                landmark1: landmark1, city1: city1, id: id
            }, function (result) {
                debugger;
                if (result == 'done') {
                    $('#alertmsg').show();
                    $('#alertmsg').html('<span style="color: #d9534f;" class="fas fa-trash fa-2x"> Updated</spane>');
                    $("#alertmsg").fadeIn("slow").delay(2000).fadeToggle("slow");
                }
                else {
                    console.log(result);
                    alert('Not added');
                }

            });
        }
        function showOldrecords(dis, id) {
//        $('#msg').html('');
            $.ajax({
                type: "GET",
                cache: false,

                url: '{{url('getOldRecords')}}',
                data: {id: id},    // multiple data sent using ajax
                success: function (data) {

                    window.open('{{url('getOldRecords')}}');
//            $('#msg').html('');
////            $('#hm').html('');
//                $('#hm').html('<h5 class="modal-title">Old Record</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"> <i style="color:#dc3545;" class="fa fa-window-close" aria-hidden="true"></i></button>');
//                $('#msg').html(data);
////            $('#cm').html('');
//                $('#cm').html('<button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button><button type="button" id="Print" onclick="myFunction()" class="btn btn-outline-success col-sm-2">Print</button>');
                }
            });
        }


        //    -------------------------------validation------------------------

        function clearall() {
            $('#firstname').val('');
            $('#lastname').val('');
            $('#email').val('');
            $('#number').val('');
            $('#address').val('');
            $('#landmark').val('');
            $('#city').val('');
            $('#firstname').attr('placeholder', 'First Name');
            $('#lastname').attr('placeholder', 'Last Name');
            $('#email').attr('placeholder', 'Email If You Have');
            $('#number').attr('placeholder', 'Mobile Number');
            $('#address').attr('placeholder', 'Full Address');
            $('#landmark').attr('placeholder', 'Landmark');
            $('#city').attr('placeholder', 'City');

        }
        function  clearthis() {
            $('#from').val('');
            $('#to').val('');

        }
        function opennewwindow(dis, id) {
            var url = "{{url('/')}}" + "/getOldRecords/" + id + "/getOldRecords";
            window.open(url);
        }

        //    $('#msgText').keypress(function (e) {
        //        if (e.which == 13) {//Enter key pressed
        //
        //        }
        //    });

    </script>
@include('layouts.footer')
