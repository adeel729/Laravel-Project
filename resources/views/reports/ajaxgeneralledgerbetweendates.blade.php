<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width:35%">Customer Name</th>
            <th style="width:15%">Invoice Number</th>
            <th style="width:15%">Payment Date</th>
            <th style="width:10%">Debit</th>
            <th style="width:10%">Credit</th>
            <th style="width:15%">Balance</th>
        </tr>
    </thead>
    <tbody>
        
            @foreach($legerdetails as $row)
            <tr>
                <td>{{$row->name}}</td>
                <td>{{$row->invoicennumber}}</td>
                <td>{{$row->paymentdate}}</td>
                <td>{{$row->debit}}</td>
                <td>{{$row->credit}}</td>
                <td>{{$row->balance}}</td>
            </tr>
            @endforeach
    </tbody>
</table>
