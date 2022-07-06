
<h4 class="text-center"><b>Inventory Transaction</b></h4>
<table class="table datatable-multi-sorting">
    <thead>
<tr>
    <th>Customer Name</th>
    <th>Invoice Number</th>
    <th>Invoice Date</th>
    <th>Category Name</th>
    <th>Item Name</th>
    <th>Unit Price</th>
    <th>Stock out Quantity</th>
    <th>Tax</th>
    <th>Total Price</th>
</tr>
    </thead>
    <tbody>
        @foreach ($stockoutdetails as $record)
            <tr>
            <td>{{$record->customername}}</td>
            <td>{{$record->invoicennumber}}</td>
            <td>{{$record->invoicedate}}</td>
            <td>{{$record->categoryname}}</td>
            <td>{{$record->itemname}}</td>
            <td>{{$record->unitprice}}</td>
            <td>{{$record->quantity}}</td>
            <td>{{$record->tax}}%</td>
            <td>{{$record->totalprice}}</td>
            </tr>
        @endforeach

    </tbody>
</table>