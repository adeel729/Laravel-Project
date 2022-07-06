@extends('layout.commonlayout')
@section('content')
<form action="" method="post">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="">From</label>
                <input type="date" id="from" class="form-control" onchange="getdebitdetails()">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="">To</label>
                <input type="date" id="to"  class="form-control" onchange="getdebitdetails()">
            </div>
        </div>
    </div>
</form>
{{--  --}}
<button type="button" onclick="printDivSection('print_setion')" class="btn btn-default btn-xs heading-btn"><i class="icon-printer position-left"></i> Print</button>
<!--  -->
<div class="panel panel-flat"  id="print_setion">
    <div class="panel-heading text-center">
        <h5 class="panel-title">Stock In Ledger Report</h5>
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
                    <th>Item Name</th>
                    <th>Purchase Date</th>
                    <th>Debit</th>
                    <th>credit</th>
                    <th>Balance</th>
                </tr>
            </thead>
            <tbody id="result">
           
            </tbody>
        </table>
    </div>
</div>
{{--  --}}
{{-- Script --}}
<script>
function  getdebitdetails(){
    let from=$('#from').val();
    let to=$('#to').val();
    var _token = $('input[name="_token"]').val();
       $.ajax({
        url: "{{ route('getdebitdetail.date')}}",
        method:'POST',
        data:{_token:_token,from:from,to:to},
        success:function(result)
            {
               
                $('#result').html(result);
              
          }
       });
}
// print
function printDivSection(setion_id) {
     var Contents_Section = document.getElementById(setion_id).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = Contents_Section;

     window.print();

     document.body.innerHTML = originalContents;
}



</script>
{{-- /Script --}}
@endsection