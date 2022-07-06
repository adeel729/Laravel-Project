@extends('layout.commonlayout')
@section('content')
@php($totaloutstanding=0)
<form action="" method="post">
    @csrf 
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label for="">Customer Name</label>
            <select class="form-control" name="customerid" id="customerid">
            <option value="">Select Customer</option>
            @foreach($customers as $customer)
            <option value="{{$customer->customerid}}">{{$customer->name}}</option>
            @endforeach
           </select>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
           <label for="">From</label>
            <input type="date" name="from" id="from" class="form-control">
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
           <label for="">To</label>
            <input type="date" name="to" id="to" class="form-control">
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group">
           <label for="" style="margin-top:40px;"></label>
            <input type="button" class="btn btn-primary" id="CustomerLedgerId" onclick="getIndividualDetails()" value="Get Result">
        </div>
    </div>
</div>
</form>

<button type="button" onclick="printDivSection('print_setion')" class="btn btn-default btn-xs heading-btn "><i class="icon-printer position-left"></i> Print</button>
<div class="col-sm-12" id="print_setion">
  
 <div class="row"  id="idiviualsresult">

 </div>
   
</div>

{{-- script --}}
<script>

$('select').selectize({
    sortField: 'text'
});

    function printDivSection(setion_id) {
     var Contents_Section = document.getElementById(setion_id).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = Contents_Section;

     window.print();

     document.body.innerHTML = originalContents;
}

function getIndividualDetails()
{
    var _token = $('input[name="_token"]').val();
    let customerid=$('#customerid').val();
    let Customername=$('#customerid option:selected').html();
    let from=$('#from').val();
    let to=$('#to').val();
       $.ajax({
        url: "{{ route('IndiviualCustomerLedger.get')}}",
        method:'POST',
        data:{_token:_token,customerid:customerid,Customername:Customername,from:from,to:to},
        success:function(result)
            {
             
                 $('#idiviualsresult').html(result);
              
          }
       });
}
</script>
{{-- /script --}}
@endsection