@if($query!='')
    <span>Search Results for <b>{{$query}}: </b></span>
    <hr>
@else
@endif

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