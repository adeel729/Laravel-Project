@extends('layout.commonlayout')
@section('content')
<div class="panel panel-flat">
    <div class="panel-heading text-center">
        <h5 class="panel-title">Employees Details</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
    @if(Session::has('EmployeeUpdated'))
        <script>
          swal("Great Job!","{!! Session::get('EmployeeUpdated') !!}","success",{
            button:"Cool",
          });
        </script>
        @endif
    <div class="panel-body">
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th style="width:20px;">Sr.No</th>
                    <th>Name</th>
                    <th>Cnic</th>
                    <th>Salary</th>
                    <th>Mobile Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php($sr=0)
                @foreach($employees as $record)
                @php($sr++)
                <tr>
                  <td>{{$sr}}</td>
                  <td>{{$record->name}}</td>
                  <td>{{$record->cnic}}</td>
                  <td>{{$record->salary}}</td>
                  <td>{{$record->mobilenumber}}</td>
                  <td><a href="{{url('/employee/'.$record->employeeid)}}" class="label label-info">View</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection