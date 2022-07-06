@extends('layout.commonlayout')
@section('content')
	<!-- Multi column ordering -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title text-center"><b>Inventory Report</b></h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">
        </div>

        <table class="table datatable-multi-sorting">
            <thead>
                <tr>
                    <th><b>Sr.No</b></th>
                    <th><b>Item Name</b></th>
                    <th><b>Catalog</b></th>
                    <th><b>Make</b></th>
                    <th><b>Quantity</b></th>
                    <th><b>Action</b></th>
                </tr>
            </thead>
            <tbody>
                @php($sr=0)
                @foreach($items as $item)
                @php($sr++)
                <tr>
                    <td>{{$sr}}</td>
                    <td>{{$item->itemname}}</td>
                    <td>{{$item->catalognumber}}</td>
                    <td>{{$item->make}}</td>
                    <td>{{$item->quantity}}</td>
                    <td><a href="{{url('/inventory/'.$item->inventoryid.'/edit')}}" class="label label-info"> View</a> </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /multi column ordering -->
@endsection