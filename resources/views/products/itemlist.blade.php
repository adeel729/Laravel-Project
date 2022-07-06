@extends('layout.commonlayout')
@section('content')
{{-- tabe --}}
	<!-- Multi column ordering -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Items List</h5>
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
                    <th>SR.no</th>
                    <th>Name</th>
                    <th>Make</th>
                    <th>catalognumber</th>
                    <th>discription</th>
                    <th>View</th>
                
                </tr>
            </thead>
            <tbody>
                @php($srno=0)
            @foreach ($itemsdetails as $item)
            @php($srno++)
            <tr>
             <td>{{$srno}}</td>   
             <td>{{$item->itemname}}</td>   
             <td>{{$item->make}}</td>   
             <td>{{$item->catalognumber}}</td>   
             <td>{{$item->discription}}</td>   
             <td><a href="{{url('/item/'.$item->itemid.'/edit')}}" class="label label-info">View   </a></td>   
            </tr>
            @endforeach     

            </tbody>
        </table>
    </div>
    <!-- /multi column ordering -->
{{-- /tabe --}}
@endsection