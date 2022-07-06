@extends('layout.commonlayout')
@section('content')

	<!-- Multi column ordering -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title text-center">Financial Offers List</h5>
            
        </div>

        <div class="panel-body">
        </div>

        <table class="table datatable-multi-sorting">
            <thead>
                <tr>
                    <th>Refrence Number</th>
                    <th>Custmer Name</th>
                    <th>Total Amount</th>
                    <th>Date</th>
                    <th>View</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($Financial_offer as $row)
                @php($id = $row->id)
                <tr>
                    <td>{{$row->ref_no}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->total_amount}}</td>
                    <td>{{$row->date}}</td>
                    <td><a href="financialOfferPdf?id={{$id}}" type="button" class="btn btn-success">View</a></td>
                </tr>
                @endforeach  

            </tbody>
        </table>
    </div>
    <!-- /multi column ordering -->
@endsection