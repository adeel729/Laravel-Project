@extends('layout.commonlayout')
@section('content')
<button type="button" onclick="printDivSection('print_setion')" class="btn btn-default btn-xs heading-btn"><i class="icon-printer position-left"></i> Print</button>

<div class="panel panel-flat"  id="print_setion">
    <div class="panel-heading text-center">
        <h5 class="panel-title">Inventory List</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
    <!-- @if(Session::has('EmployeeUpdated'))
        <script>
          swal("Great Job!","{!! Session::get('EmployeeUpdated') !!}","success",{
            button:"Cool",
          });
        </script>
        @endif -->
    <div class="panel-body">
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th style="width:20px;">Sr.No</th>
                    <th>Supplier NAme</th>
                    <th>Category</th>
                    <th>Item</th>
                    <th>Catalog/Serial</th>
                    <th>Quantity</th>
                    <th>unit Price</th>
                    <th>Purchase Date</th>
                    <th>Expiry Date</th>
                </tr>
            </thead>
            <tbody>
                @php($sr=0)
                @foreach($inventorydata as $inventory)
                @php($sr++)
                <tr>
                  <td>{{$sr}}</td>
                  <td>{{$inventory->name}}</td>
                  <td>{{$inventory->categoryname}}</td>
                  <td>{{$inventory->itemname}}</td>
                  <td>{{$inventory->catalognumber}}</td>
                  <td>{{$inventory->quantity}}</td>
                  <td>{{$inventory->unitprice}}</td>
                  <td>{{$inventory->purchasedate}}</td>
                  <td>{{$inventory->expirydate}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{-- script    --}}
                      <script>
                        function printDivSection(setion_id) {
     var Contents_Section = document.getElementById(setion_id).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = Contents_Section;

     window.print();

     document.body.innerHTML = originalContents;
}
                    </script>
                      {{-- /script    --}}
@endsection