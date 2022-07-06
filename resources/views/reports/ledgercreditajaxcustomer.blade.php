@php($total=0)
@php($paid=0)
@php($tax=0)
@php($Remaining=0)
@php($Incometax=0)
@php($saletaxgovernmentamount=0)
<table>
    <tr>
        <th><b>Customer Name</b></th>
        <th><b>Invoice Number</b></th>
        <th><b>Invoice Date</b></th>
        <th><b>Debit</b></th>
        <th><b>Credit</b></th>
        <th><b>Balance</b></th>
    </tr>
    @foreach ($creditdetails as $row)
    <tr>
    <td>{{$row->name}}</td>
    <td>{{$row->invoicennumber}}</td>
    <td>{{$row->paymentdate}}</td>
    <td>{{$row->debit}}</td>
    <td>{{$row->credit}}</td>
    <td>{{$row->balance}}</td>
    </tr>        
    @endforeach
    
   
    <tr>
      <th><b>Invoice Number</b></th>
      <th><b>Gst Tax </b></th>
      <th><b>Income Tax </b></th>
      <th><b>Sale Tax(gvt) </b></th>
      <th><b>Net Total</b></th>
      <th><b>Paid</b></th>
      <th><b>Remaining</b></th>
  </tr>
    @foreach($invoicesdetails as $row)
    <tr>
        <td>{{$row->invoicennumber}}</td>
        <td>{{$row->gsttaxamount}}</td>
        <td>{{$row->incometaxamount}}</td>
        <td>{{$row->saletaxgovernmentamount}}</td>
        <td>{{$row->nettotal}}</td>
        <td>{{$row->paid}}</td>
        <td>{{$row->remaining}}</td>
        @php($total+=$row->nettotal)
        @php($paid+=$row->paid)
        @php($tax+=$row->gsttaxamount)
        @php($Remaining+=$row->remaining)
        @php($Incometax+=$row->incometaxamount)
        @php($saletaxgovernmentamount+=$row->saletaxgovernmentamount)
    </tr>
    @endforeach
    <tr>
        <td></td>
        <td><b>{{$tax}}</b></td>
        <td><b>{{$Incometax}}</b></td>
        <td><b>{{$saletaxgovernmentamount}}</b></td>
        <td><b>{{$total}}</b></td>
        <td><b>{{$paid}}</b></td>
        <td><b>{{$Remaining}}</b></td>
    </tr>
</table>



