@extends('layout.commonlayout')
@section('content')
















	<!-- Multi column ordering -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title text-center">Quotations List</h5>
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
                    <th>Quotation Number</th>
                    <th>Total Without Tax</th>
                    <th>Total With Tax</th>
                    <th>Net Total</th>
                    <th>Quotation Date</th>
                    <th>View</th>
                
                </tr>
            </thead>
            <tbody>
                
                @foreach($quotations as $row)
                <tr>
                    <td>{{$row->quotationnumber}}</td>
                    <td>{{$row->totalwithouttax}}</td>
                    <td>{{$row->totalaftertax}}</td>
                    <td>{{$row->nettotal}}</td>
                    <td>{{$row->quotationdate}}</td>
                    <td><a href="{{url('/quotation/'.$row->qmasterid.'/edit')}}" type="button" class="btn btn-success">View</a></td>
                </tr>
                @endforeach  

            </tbody>
        </table>
    </div>
    <!-- /multi column ordering -->
@endsection