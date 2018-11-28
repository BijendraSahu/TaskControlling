<table class="table table-hover table-striped ">
    <thead class="sticky-top" style="background-color: #e3f2fd;">
    <tr>
        <th>#</th>
        <th>Customer Name</th>
        <th>Status</th>
        <th>Next Payment</th>
    </tr>
    <tbody>
    @foreach($Result as $index=> $paidcustomer)
        <?php $different=Illuminate\Support\Carbon::parse($todaysdate)->diffInDays(Illuminate\Support\Carbon::parse($paidcustomer->nextPaymentDate));?>
        <tr>
            <th scope="row">{{$index +1}}</th>
            <td>{{$paidcustomer->CustomerFirstname." ".$paidcustomer->CustomerLastname}}</td>
            <td> Paid</td>
            <td>Next Payment in <b>{{$different}}</b> Days</td>

        </tr>
    @endforeach
    </tbody>
</table>
<hr>
<div style="float: right;">
    {{ $Result->links() }}
</div>