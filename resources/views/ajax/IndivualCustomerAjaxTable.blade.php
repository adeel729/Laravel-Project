<h1 class="text-center"><b>General Ledger Of &nbsp; <u>{{$Customername}}</u> </b></h1>
<h3 class="text-center"><b><?php echo date('Y-m-d')?></b></h3>
<table style="border:2px solid black;" class="table table-bordered">
<thead>
    <tr style="border:2px solid black;">
        <th style="border:2px solid black;"><b>Sr.No</b></th>
        <th style="border:2px solid black;"><b>Cheque No</b></th>
        <th style="border:2px solid black;"><b>Invoice No</b></th>
        <th style="border:2px solid black;"><b>Inv/install Date</b></th>
        <th style="border:2px solid black;"><b>Total</b></th>
        <th style="border:2px solid black;"><b>Previous balance</b></th>
        <th style="border:2px solid black;"><b>Paid </b></th>
        <th style="border:2px solid black;"><b>Remaining</b></th>
       
    </tr>
</thead>
<tbody>
    @php($srno=0)
    @foreach($customerledger as $data)
    @php($srno++)
    <tr style="border:2px solid black;">
        <td style="border:2px solid black;">{{$srno}}</td>
        <td style="border:2px solid black;">{{$data->chequenumber}}</td>
        <td style="border:2px solid black;">{{$data->invoicenumber}}</td>
        <td style="border:2px solid black;">{{$data->installmentdate}}</td>
        <td style="border:2px solid black;">{{$data->totalbill}}</td>
        <td style="border:2px solid black;">{{$data->previousbalance}}</td>
        <td style="border:2px solid black;">{{$data->installmentamount}}</td>
        <td style="border:2px solid black;">{{$data->currentremainig}}</td>
    </tr>
    @endforeach
</tbody>
</table>