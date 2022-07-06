@extends('layout.commonlayout')
@section('content')
<table class="table">
    <thead>
        <tr>
            <th>DC Number</th>
            <th>Dc Date</th>
            <th>Customer Name </th>
            {{-- <th>Invoice</th> --}}
            <th>Status</th>
            <th>View</th>
            <th>Update</th>
        </tr>
    </thead>
    <tbody>
        @foreach($DcParentData as $dcrow)
        <tr>
          <td>{{ $dcrow->dcnumber}}</td>
          <td>{{ $dcrow->dcdate}}</td>
          <td>{{ $dcrow->name}}</td>

          @if($dcrow->status=='open')
          {{-- <td><a href="{{url('/invoice/'.$dcrow->dcparentid.'')}}" class="label label-info" >Invoice</a></td> --}}
          <td><a href="#" class="label label-danger" >{{ $dcrow->status}}</a></td>
          <td><a href="{{url('/Delivery/'.$dcrow->dcparentid)}}" class="label label-info" >View</a></td>
          @else
          <td></td>
          <td><a href="#" class="label label-info" >{{ $dcrow->status}}</a></td>
          <td><a href="{{url('/Delivery/'.$dcrow->dcparentid)}}" class="label label-info" >View</a></td>
          @endif

          @if($dcrow->status=='open')
          <td><a href="editDC?id={{$dcrow->dcparentid}}" class="label label-info" >Update</a></td>
          @else
          <td></td>
          @endif
        </tr>
      @endforeach
    </tbody>
</table>
@endsection