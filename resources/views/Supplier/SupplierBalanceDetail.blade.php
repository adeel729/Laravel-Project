@extends('layout.commonlayout')
@section('content')
<form action="" method="POst">
    @csrf
    {{-- row --}}
    <div class="row">
        {{-- Supplier NAme --}}
        <div class="col-md-4 col-lg-3">
            <div class="form-group">
                <label for="">Supplier</label>
                <select name="supplierid" id="supplierid" class="form-control" onchange="GetUnpaidPo(this.value)">
                    <option value="">Select Supplier</option>
                    @foreach($Suppliers as $Supplier)
                    <option value="{{$Supplier->supplierid}}">{{$Supplier->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        {{-- Supplier NAme --}}
        {{-- Supplier NAme --}}
        <div class="col-md-4 col-lg-3">
            <div class="form-group">
                <label for="">From</label>
              <input type="date" name="from" id="from" class="form-control">
            </div>
        </div>
        {{-- Supplier NAme --}}
        {{-- Supplier NAme --}}
        <div class="col-md-4 col-lg-3">
            <div class="form-group">
                  <label for="">To</label>
                  <input type="date" name="to" id="to" class="form-control">
            </div>
        </div>
        {{-- Supplier NAme --}}

    </div>
  
    {{-- /row --}}
</form>
<div class="row text-right" style="margin-right:310px;">
      <button class="btn btn-primary type="button" btn-sm" onclick="GetSupplierDetails()">Get Details</button>
</div>
<br>
<br>
<hr>
<div  class="col-sm-12" >
<div id="BalanceDetails">

</div>
</div>
<script>
      //    search on select Customer
     $('select').selectize({
          sortField: 'text'
});


// getting supplier Details
function GetSupplierDetails()
{
      let supplierid=$('#supplierid').val();
      let from=$('#from').val();
      let to=$('#to').val();
      
      var _token = $('input[name="_token"]').val();
$.ajax({
    url: "{{ route('GetBalacneDetailSupplier.get')}}",
    method:'POST',
    data:{ _token:_token,supplierid:supplierid,from:from,to:to},
    success:function(result)
    {
        
       $('#BalanceDetails').html(result);
    
    }
    
   }); 
}
</script>
@endsection