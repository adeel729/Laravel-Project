{{-- items.,inventories.,inventories.,
      (inventories.*inventories.) as ,inventories. --}}
    
      <h1 class="text-center"><b><u>Item Detail Report </u></b></h1>
      <h3 class="text-center">From: <b><u>{{$from}}</u></b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TO:<u><b>{{$to}}</b></u></h3>
      <h1 class="text-center"><b><u>Current Stock</u></b></h1>
<table style="border:2px solid black;" class="table table-bordered">
<thead>
    <tr style="border:2px solid black;">
        <th style="border:2px solid black;"><b>Sr.No</b></th>
        <th style="border:2px solid black;"><b>Item Name</b></th>
        <th style="border:2px solid black;"><b>Purchase Date</b></th>
        <th style="border:2px solid black;"><b>Quantity</b></th>
        <th style="border:2px solid black;"><b>Unit Price</b></th>
        <th style="border:2px solid black;"><b>Tota Cost</b></th>   
    </tr>
</thead>
<tbody>
    @php($srno=0)
    @foreach($CurrentSTock as $Cstock)
    @php($srno++)
    <tr style="border:2px solid black;">
        <td style="border:2px solid black;">{{$srno}}</td>
        <td style="border:2px solid black;">{{$Cstock->itemname}}</td>
        <td style="border:2px solid black;">{{$Cstock->purchasedate}}</td>
        <td style="border:2px solid black;">{{$Cstock->quantity}}</td>
        <td style="border:2px solid black;">{{$Cstock->unitprice}}</td>
        <td style="border:2px solid black;">{{$Cstock->total_cost_of_goods}}</td>
    </tr>
    @endforeach
    
</tbody>
</table>


{{-- table 2 --}}
    
{{-- items.,inventories.,stocktransactions.,
      (inventories.unitprice*stocktransactions.stockinquantity) as 
    purchase_price,stocktransactions.   --}}
<h1 class="text-center"><b><u>Inventory In</u></b></h1>
<table style="border:2px solid black;" class="table table-bordered">
<thead>
<tr style="border:2px solid black;">
  <th style="border:2px solid black;"><b>Sr.No</b></th>
  <th style="border:2px solid black;"><b>Item Name</b></th>
  <th style="border:2px solid black;"><b>STock In Date</b></th>
  <th style="border:2px solid black;"><b>Stock In</b></th>
  <th style="border:2px solid black;"><b>Unit Price</b></th>
  <th style="border:2px solid black;"><b>Total Pric</b></th>   
</tr>
</thead>
<tbody>
@php($srno=0)
@foreach($Inventory_In as $Iin)
@php($srno++)
<tr style="border:2px solid black;">
  <td style="border:2px solid black;">{{$srno}}</td>
  <td style="border:2px solid black;">{{$Iin->itemname}}</td>
  <td style="border:2px solid black;">{{$Iin->sotckindate}}</td>
  <td style="border:2px solid black;">{{$Iin->stockinquantity}}</td>
  <td style="border:2px solid black;">{{$Iin->unitprice}}</td>
  <td style="border:2px solid black;">{{$Iin->purchase_price}}</td>
</tr>
@endforeach

</tbody>
</table>
{{-- /table 2 --}}
{{-- invoicemasters.,invoicemasters.,items.,
      invoicechildren.,invoicechildren.,invoicechildren. --}}
{{-- table 3 --}}
<h1 class="text-center"><b><u>Inventory Out</u></b></h1>
<table style="border:2px solid black;" class="table table-bordered">
<thead>
<tr style="border:2px solid black;">
  <th style="border:2px solid black;"><b>Sr.No</b></th>
  <th style="border:2px solid black;"><b>Invoice Number</b></th>
  <th style="border:2px solid black;"><b>Invoice Date</b></th>
  <th style="border:2px solid black;"><b>Item Name</b></th>
  <th style="border:2px solid black;"><b>Unit Price</b></th>
  <th style="border:2px solid black;"><b>Quantity</b></th>
  <th style="border:2px solid black;"><b>Total Price</b></th>   
</tr>
</thead>
<tbody>
@php($srno=0)
@php($quantity)
@foreach($Inventory_out as $Iout)
@php($srno++)
<tr style="border:2px solid black;">
  <td style="border:2px solid black;">{{$srno}}</td>
  <td style="border:2px solid black;">{{$Iout->invoicennumber}}</td>
  <td style="border:2px solid black;">{{$Iout->invoicedate}}</td>
  <td style="border:2px solid black;">{{$Iout->itemname}}</td>
  <td style="border:2px solid black;">{{$Iout->unitprice}}</td>
  <td style="border:2px solid black;">{{$Iout->quantity}}</td>
  <td style="border:2px solid black;">{{$Iout->totalprice}}</td>
</tr>
@endforeach

</tbody>
</table>
{{-- /table 3 --}}