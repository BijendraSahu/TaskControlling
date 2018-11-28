
    @if($query!='')
<span>Search Results for <b>{{$query}} :</b></span>
<hr>
@else
        @endif

<table class="table table-striped table-hover" style="box-shadow: 1px 0px 9px #ccc ">
    <thead  style="background-color: #e3f2fd;">
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

    @foreach($Result as $index=> $searchcustomer)
        <tr>
            <th scope="row">{{$index +1}}</th>
            <td>{{$searchcustomer->CustomerFirstname}} {{$searchcustomer->CustomerLastname}}</td>
            <td>{{$searchcustomer->CustomerEmail}}</td>
            <td>{{$searchcustomer->CustomerMobile}}</td>
            <td>{{$searchcustomer->CustomerAddress}}</td>
            <td>{{$searchcustomer->CustomerLandmark}}</td>
            <td>{{$searchcustomer->CustomerCity}}</td>
            <td>
                <div class="btn-group dropup">
                    <button type="button" class="btn btn-outline-danger btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#openmodal" onclick="editDetail(this,'{{$searchcustomer->id}}')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                        <a class="dropdown-item" href="#" onclick="delsingle(this,'{{$searchcustomer->id}}')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#openmodal" onclick="showOldrecords(this,'{{$searchcustomer->id}}')"><i class="fa fa-database" aria-hidden="true"></i> Old Record</a>
                    </div>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>

</table>
    <div style="float: right;">
        {{ $Result->links() }}
    </div>
{{--<div style="float: right;">--}}
    {{--{{ $Result->links() }}--}}
{{--</div>--}}
