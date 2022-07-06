@extends('layout.commonlayout')
@section('content')
<form action="" method="POst">
    @csrf
    {{-- row --}}
    <div class="row">
        {{-- Customer NAme --}}
        <div class="col-md-4 col-lg-3">
            <div class="form-group">
                <label for="">Customer</label>
                <select name="" id="customer" class="form-control" onchange="getcreditinfoofcustomer()">
                    <option value="">Select Customer</option>
                    @foreach($customers as $customer)
                    <option value="{{$customer->customerid}}">{{$customer->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        {{-- /Customer NAme --}}
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
        <h5 class="panel-title">Credit Details And Tax Paid</h5>
        <h1>From  &nbsp;  &nbsp;  <i><span id='fromspan'></span></i>  &nbsp; To  &nbsp;  &nbsp; <i><span id="tospan"></span></i></h1>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
    <div class="panel-body">
    </div>

    <div class="table-responsive">
        <table class="table" id="result">
       
        </table>
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
let customerid=$('#customer').val();
let from=$('#from').val();
let to=$('#to').val();
$('#fromspan').html(from);
$('#tospan').html(to);
var _token = $('input[name="_token"]').val();
$.ajax({
    url: "{{ route('customercedit.report')}}",
    method:'POST',
    data:{ _token:_token, customerid:customerid,from:from,to:to},
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