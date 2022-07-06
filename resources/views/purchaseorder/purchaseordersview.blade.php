@extends('layout.commonlayout')
@section('content')



	<!-- Multi column ordering -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title text-center">Purchase Order List</h5>
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

                   
                  
                    <th class="va-m">Supplier Name</th>
                    <th class="va-m">PO Date</th>
                    <th class="va-m">PO Number</th>
                    <th class="va-m">Total Bill</th>

                    <th class="hidden-xs va-m">Status</th>
                    <th class="hidden-xs va-m">Action</th>
                    <th class="hidden-xs va-m">Edit</th>
                    <th class="va-m">View</th>
                    <th class="va-m">Delete</th>                
                </tr>
            </thead>
            <tbody>
                


                @foreach($purchaseorderdetails as $record)
                <tr>
                <td>{{$record->name}}</td>
                <td>{{date('j-F-Y', strtotime($record->purchase_order_date))}}</td>
                <td>{{$record->po_number}}</td>
                <td>{{$record->totalbill}}</td>
                @if($record->postatus=='inprogress')
                <td><span class="label label-danger">{{$record->postatus}}</span></td>
                <td><a href="{{url('/comletepoorder/'.$record->purchase_order_id)}}" class="label label-info">Recieved</a></td>
                <td><a href="{{url('/purchaseorder/'.$record->purchase_order_id.'/edit')}}" class="label label-primary">Edit</a></td>
                <td><a href="{{url('/viewpoorder/'.$record->purchase_order_id)}}" class="label label-success">View</a></td>
                <td><a href="{{url('/deletepoorder/'.$record->purchase_order_id)}}" class="label label-danger">Delete</a></td>
                @else
                <td><span class="label label-success">{{$record->postatus}}</span></td>
                <td></td>
                <td></td>
                <td><a href="{{url('/viewpoorder/'.$record->purchase_order_id)}}" class="label label-success">View</a></td>
                <td></td>
                @endif
              
            </tr>
            @endforeach


            </tbody>
        </table>
    </div>
    <!-- /multi column ordering -->




























@endsection