@extends('layout.commonlayout')
@section('content')
<form action="" method="POst">
    @csrf
    {{-- row --}}
    <div class="row">
                {{-- date from--}}
                <div class="col-md-4 col-lg-3">
                    <div class="form-group">
                        <label for="">From</label>
                        <input type="date" class="form-control" id="from" onchange="getcreditinfoofcustomer()">
                    </div>
                </div>
                {{-- /date from --}}
                                {{-- date to--}}
                                <div class="col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <label for="">TO</label>
                                        <input type="date" class="form-control" id="to" onchange="getcreditinfoofcustomer()">
                                    </div>
                                </div>
                                {{-- /date to --}}
    </div>
    {{-- /row --}}
</form>
<button type="button" onclick="printDivSection('print_setion')" class="btn btn-default btn-xs heading-btn"><i class="icon-printer position-left"></i> Print</button>

{{--  --}}
<div class="panel panel-flat"  id="print_setion">
    <div class="panel-heading text-center">
        <h5 class="panel-title">Ledger Credit</h5>
        <h1>From  &nbsp;  &nbsp;  <i><span id='fromspan'></span></i>  &nbsp; To  &nbsp;  &nbsp; <i><span id="tospan"></span></i></h1>
      

    <div id="result">

    </div>
</div>
{{--  --}}

{{-- script --}}
<script>
//    search on select Customer
     $('#customername').selectize({
          sortField: 'text'
});
// on change of customer or date from and to get details
function getcreditinfoofcustomer()
{
let from=$('#from').val();
let to=$('#to').val();
$('#fromspan').html(from);
$('#tospan').html(to);
var _token = $('input[name="_token"]').val();
$.ajax({
    url: "{{ route('ceditdateshitory.report')}}",
    method:'POST',
    data:{ _token:_token,from:from,to:to},
    success:function(result)
    {
     
       $('#result').html(result);
    
    }
    
   }); 
}

function printDivSection(setion_id) {
     var Contents_Section = document.getElementById(setion_id).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = Contents_Section;

     window.print();

     document.body.innerHTML = originalContents;
}

</script>
{{-- /script --}}
@endsection