@extends('layout.commonlayout')
@section('content')
	<!-- Multi column ordering -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Supplier List</h5>
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
                    <th>Name</th>
                    <th>Previous Balance</th>
                    <th>Address</th>
                    <th>Ntn</th>
                    <th>Contact Number</th>
                    <th>City</th>
                    <th>View</th>
                
                </tr>
            </thead>
            <tbody>
                @php($totalreamaining=0)
            @foreach ($supplierdetails as $supplier)
            <tr>
                @php($totalreamaining+=$supplier->previousbalance)
             <td>{{$supplier->name}}</td>   
             <td>{{$supplier->previousbalance}}</td>   
             <td>{{$supplier->address}}</td>   
             <td>{{$supplier->ntn}}</td>   
             <td>{{$supplier->contact}}</td>   
             <td>{{$supplier->city}}</td>   
             <td><a href="{{url('/supplier/'.$supplier->supplierid.'/edit')}}" class="label label-info">View   </a></td>   
            </tr>
            @endforeach     
            
            </tbody>
            <tr class="text-bold">
                <td>Total Payable</td>
                <td>{{$totalreamaining}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>
    <!-- /multi column ordering -->
@endsection