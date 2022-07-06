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
                <select name="" id="customer" class="form-control" onchange="GetUnpaidPo(this.value)">
                    <option value="">Select Supplier</option>
                    @foreach($Suppliers as $Supplier)
                    <option value="{{$Supplier->supplierid}}">{{$Supplier->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        {{-- /Supplier NAme --}}
             {{-- Po Number --}}
             {{-- <div class="col-md-4 col-lg-3">
                  <div class="form-group">
                      <label for="">PO Number</label>
                      <select name="" id="customer" class="form-control" onchange="getcreditinfoofcustomer()">
                          <option value="">Select PO Number</option>
                          @foreach($Suppliers as $Supplier)
                          <option value="{{$Supplier->supplierid}}">{{$Supplier->name}}</option>
                          @endforeach
                      </select>
                  </div>
              </div> --}}
             {{-- /Po Number --}}
    </div>
    {{-- /row --}}
</form>
<button type="button" onclick="printDivSection('print_setion')" class="btn btn-default btn-xs heading-btn"><i class="icon-printer position-left"></i> Print</button>
<div id="PoDetails">

</div>
{{--  --}}
{{-- <div class="panel panel-flat"  id="print_setion">
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
</div> --}}
{{--  --}}
{{-- model item--}}
<div id="itemmodal" class="modal fade">
      <div class="modal-dialog modal-full">
          <div class="modal-content text-center">
              <div class="modal-header">
                  <h5 class="modal-title">Payment Detail</h5>
              </div>
  
              <form action="{{url('/PayBillPo')}}" class="form-inline" method="POST" id="itemform">
                  @csrf
                  <div class="modal-body">
                      {{-- category --}}
            
                      {{-- <div class="col-lg-2">
                          <div class="form-group">
                              <select class="form-control" name="categoryid" id="categoryiditemmodal" >
                              <option value="">Select Cat</option>
                              @foreach($cateogaries as $cat)
                              <option value="{{$cat->categoryid}}">{{$cat->categoryname}}</option>
                              @endforeach
                              </select>
                            </div>
                      </div> --}}
                      <input type="hidden" name="purchase_order_id" id="purchase_order_id" class="form-control" placeholder="purchase_order_id">
                      <input type="hidden" name="supplierid" id="supplierid" class="form-control" placeholder="supplierid">
                
                       {{--remaining--}}
                       <div class="form-group" style="margin-left: 5px;">
                          <input type="text" name="remaining" id="remaining" class="form-control" placeholder="remaining">
                       </div>
                       {{--remaining-}}
                            {{--payment--}}
                           <div class="form-group"  >
                              <input type="text" name="payment" id="payment" class="form-control" placeholder="payment" onkeyup="CalculateRemaining(this.value);" oninput="CalculateRemaining(this.value);">
                           </div>
                           {{--payment-}}
                            {{--	remainig--}}
                           <div class="form-group"  >
                              <input type="text" name="current_remainig" id="current_remainig" class="form-control" placeholder="Current Remainig">
                           </div>
                           {{--	remainig-}}
                            {{--payment_date--}}
                           <div class="form-group">
                              <input type="date" name="payment_date" id="payment_date" class="form-control" placeholder="Payment Date">
                           </div>
                           {{--payment_date--}}
                            {{--payment_date--}}
                           <div class="form-group" >
                                 <select class="form-control" name="payment_type" id="payment_type" style="width:200px;">
                                    <option value="">Select Payment Type</option>
                                    <option value="Cash">Cash</option>
                                    <option value="Bank">Bank</option>
                                 </select>
                           </div>
                           {{--payment_date--}}
                 
                      </div>
                      <div class="row">
  
                                {{-- category --}}
                  {{-- <div class="form-group" >
                      <select class="form-control" name="unitid" id="unitid" > 
                      <option value="">Select Unit</option>
                      @foreach($unit as $unit)
                      <option value="{{$unit->unitid}}">{{$unit->unitname}}</option>
                      @endforeach
                </select>
                    </div> --}}
                     {{-- end category --}}
                     {{-- discription --}}
                     <div class="form-group">
                         <label class="">Discription</label>
                         <textarea name="discription" class="form-control" id="discription" cols="20" rows="4"></textarea>
                       </div>
                     {{-- /discription --}}
                      </div>
                      <button type="submit" class="btn btn-primary mt-20">Insert</button> <br/><br/>
                  </div>
  
                  <div class="modal-footer text-center">
                  </div>
              </form>
          </div>
      </div>
  </div>
  {{-- /model item --}}
{{-- script --}}
<script>
//    search on select Customer
     $('select').selectize({
          sortField: 'text'
});


//Get Unpaid Po
function GetUnpaidPo(Supplierid){
   
var _token = $('input[name="_token"]').val();
$.ajax({
    url: "{{ route('GetUnpaidPo.get')}}",
    method:'POST',
    data:{ _token:_token, Supplierid:Supplierid},
    success:function(result)
    {
      //     alert(result);
       $('#PoDetails').html(result);
    
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


// 
function FetchDEtialsPo(purchase_order_id)
{
      var _token = $('input[name="_token"]').val();
$.ajax({
    url: "{{ route('GetPoDetailStatus.get')}}",
    method:'POST',
    dataType: 'json',
    data:{ _token:_token, purchase_order_id:purchase_order_id},
    success:function(result)
    {
      $('#remaining').val(result.remaining);
      $('#purchase_order_id').val(result.purchase_order_id);
      $('#supplierid').val(result.supplierid);
     
    }
    
   }); 
}
function CalculateRemaining(paid)
{
let remaining=$('#remaining').val();
if(Number(paid)>Number(remaining))
{
      $('#payment').val(0);
}
else
{
      let current_remainig=Number(remaining)-Number(paid);
      $('#current_remainig').val(current_remainig);
}
}
</script>
{{-- /script --}}
@endsection