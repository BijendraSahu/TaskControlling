@include("layouts.headder")
<style>
    #alertmsg {
        display: none;
        padding: 5px;
        left: 75%;
        position: absolute;
        z-index: 10;
        width: 20%;
        /*opacity: 0.8;*/
        bottom: 74%;
        height: 10%;
        text-align: center;
        /*color: #171a1d;*/
        font-size: large;
        font-style: italic;
        font-variant: stacked-fractions;

    }
    .input-group-text{
        background-color: #dc3545;
        border-color:#dc3545 ;
        color: white;
    }
    input[type=text]:focus{
        box-shadow: 1px 0px 8px #dc3545
    }
    .form-control{
        border-color:#dc3545;
    }
    @media screen and (max-width: 700px){
        #AddPackage{
            margin-top: 28px;
            width: 100%;
        }
        #ammoutdiv{
            margin-top: 4px;
        }
        #packagedurationdiv{
            margin-top: 28px;
        }
#modalbtn{
    width:40%;
    margin-right: 9px;
}#modalcancel{
     margin-right: 41px;
     width: 40%;
 }
 .table{

 }
    }
</style>
<div class="alert alert-success" id="alertmsg">

</div>
<div class="container">
    <div class="col-md-12">
        <form>
            <div class="row">
            <div class="input-group col-sm-6">
                <div class="input-group-prepend">
                    <label class="input-group-text " for="packageName"><i class="fas fa-box-open" aria-hidden="true"></i></label>
                </div>
                <input type="text" class="form-control uppercase" id="packageName" placeholder="Enter Package Name" autofocus>
            </div>
            <div class="input-group col-sm-6" id="packagedurationdiv">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="packageduration"><i class="fas fa-clock" aria-hidden="true"></i></label>
                </div>
                <input type="text" class="form-control mynumber" id="packageduration" placeholder="Enter Package Duration(In Month)">
            </div>
            </div>
            <br>
            <div class="row">
            <div class="input-group col-sm-6" id="ammoutdiv">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="ammount"><i class="fas fa-rupee-sign" aria-hidden="true"></i></label>
                </div>
                <input type="text" class="form-control mynumber" id="ammount" placeholder="Enter Ammount">
            </div>
            <div class="input-group col-sm-6 ">
                <button type="button" class="btn btn-outline-danger"  id="AddPackage">Add Package</button>
            </div>
            </div>
        </form>
    </div>
    <hr>
    <span class="text-center"><h3>View Packages</h3></span>
    <div class="container">
        <table class="table table-hover table-striped ">
            <thead class="sticky-top" style="background-color: #e3f2fd;">
            <tr>
                <th>#</th>
                <th>Package Name</th>
                <th>Package Duration</th>
                <th>Package Ammount</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($Package as $index => $obj)
            <tr>
                <th scope="row">{{$index +1}}</th>
                <td>{{$obj->PackageName}}</td>
                <td>{{$obj->packageDuration}} Month</td>
                <td>{{$obj->PackageAmmount}}</td>
                <td><div class="btn-group dropup">
                        <button type="button" class="btn btn-outline-danger btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#openmodal" onclick="editDetail(this,'{{$obj->id}}')"><i style="color:#dc3545" class="fas fa-pencil-alt" aria-hidden="true"></i> Edit</a>
                            <a class="dropdown-item" href="#" onclick="delsingle(this,'{{$obj->id}}')"><i style="color:#dc3545" class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                            {{--<a class="dropdown-item" href="#" data-toggle="modal" data-target="#openmodal" onclick="showOldrecords(this,'{{$obj->id}}')"><i style="color:#dc3545" class="fa fa-database" aria-hidden="true"></i> Old Record</a>--}}
                        </div>
                    </div></td>
            </tr>
            @endforeach
            </tbody>
        </table>

    </div>

</div>
<div class="modal fade-scale" id="openmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" id="hm" style="background-color: #e3f2fd;">

            </div>
            <div class="modal-body" id="msg">

            </div>
            <div class="modal-footer" id="cm" style="background-color: #e3f2fd;">

            </div>
        </div>
    </div>
</div>
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
        if(sessionStorage.getItem("PackageAdded"))
        { $('#alertmsg').show();
            $('#alertmsg').html('<span style="color: #3b7348;" class="far fa-check-circle fa-2x"> Added</spane>');
            $("#alertmsg").fadeIn("slow").delay(2000).fadeToggle("slow");
            sessionStorage.clear();
        }else if(sessionStorage.getItem("Updated")){
            $('#alertmsg').show();
            $('#alertmsg').html('<span style="color: #3b7348;" class="far fa-check-circle fa-2x"> Updated</spane>');
            $("#alertmsg").fadeIn("slow").delay(2000).fadeToggle("slow");
            sessionStorage.clear();
        }

    });
    $('#AddPackage').click(function () {
        debugger;
        if ($('#packageName').val() == "") {
            $('#packageName').attr('placeholder','Name Required');
            return false;

        } else if ($('#ammount').val() == "") {
            $('#ammount').attr('placeholder','Ammount Required');
            return false;
        } else if ($('#packageduration').val() == "") {
            $('#packageduration').attr('placeholder','Duration Required');
            return false;
        } else {
            var packageName = $('#packageName').val();
            var ammount = $('#ammount').val();
            var packageduration = $('#packageduration').val();

            $.ajax({
                url: "{{url('addnewpackage')}}",
                type: 'GET',
                data: {
                    packageName: packageName,
                    ammount: ammount,
                    packageduration: packageduration
                },
                success: function (result) {
                    debugger;
                    if (result == 'done') {
                        sessionStorage.setItem("PackageAdded",result);
//                        alert('New Package Added');
                        window.location.reload();
                    } else {
                        console.log(result);
                    }
                }
            });
        }
    });
//    --------------------editDetails---------------------
    function editDetail(dis,id) {
        debugger;
        $.ajax({
            type: "GET",
            cache: false,
            url: '{{url('package_edit_')}}',
            data: {id: id},    // multiple data sent using ajax
            success: function (data) {
                $('#msg').html('');
                $('#hm').html('<h5 class="modal-title">Edit Package</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
                $('#msg').html(data);
//            $('#cm').html('');
                $('#cm').html('<button type="button" id="modalcancel" class="btn btn-outline-danger  "data-dismiss="modal">Close</button><button type="button" onclick="UpdatePackage()" class="btn btn-outline-success col-sm-3" data-dismiss="modal" id="modalbtn">Update</button>');
            }
        });
    }
//    ---------------------------Update---------------------------------
        function UpdatePackage() {
            debugger;
            $('#alertmsg').html("");
                var packageName1 = $('#packageName1').val();
                var ammount1 = $('#ammount1').val();
                var packageduration1 = $('#packageduration1').val();
                var id = $('#id').val();
                $.get('{{url('updatepackage')}}', {
                    packageName1: packageName1, ammount1: ammount1, packageduration1: packageduration1, id: id
                }, function (result) {
                    debugger;
                    if (result == 'done') {
                        sessionStorage.setItem("Updated",result);
                        window.location.reload();
                    }
                    else {
                        console.log(result);
                        alert('Not added');
                    }

                });
        }
    function delsingle(dis, id) {
        debugger;
        $.get('{{url('deletesinglepackage')}}',{ID: id},function (data) {
            debugger;
            console.log(data);
            if (data == 'done') {
                $(dis).closest("tr").remove(); // You can remove row like this
                $('#alertmsg').show();
                $('#alertmsg').html('<span style="color: #3b7348;" class="far fa-check-circle fa-2x">Deleted </spane>');
                $("#alertmsg").fadeIn("slow").delay(5000).fadeToggle("slow");
            } else {
                console.log(data);
            }
        });
    }
//        --------------------------validation---------------------------
    $(".mytext").keypress(function () {
        if (event.keyCode == 8 || event.keyCode == 32) return true;
        if (!((event.keyCode >= 65 && event.keyCode <= 90) || (event.keyCode >= 97 && event.keyCode <= 122))) return false;
    });
$('#packageduration').keypress(function () {
    if($(this).val().length >=2) {
        $(this).val($(this).val().slice(0,2 ));
        return false
    }

});
    $(".mynumber").keypress(function () {
        if (event.keyCode == 8) return true;

        if (!(event.keyCode >= 48 && event.keyCode <= 57)) return false;
    });

</script>

