@extends('layout.commonlayout')
@section('content')
{{-- invoices view --}}
	<!-- Multi column ordering -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title text-center">Last 100 invoices</h5>
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
                    <th>Customer Name</th>
                    <th>Invoice Number</th>
                    <th>Invoice Date</th>
                    <th>Status</th>
                    <th>View Invoice</th>
                    <th>View Bill</th>
                    <th>Add Installment</th>
                    <th>Recieving</th>
                
                </tr>
            </thead>
            <tbody>
                @foreach($invoices as $Invoice)
                <tr>
                    <td>{{$Invoice->name}}</td>
                    <td>{{$Invoice->invoicennumber}}</td>
                    <td>{{$Invoice->invoicedate}}</td>
                    @if($Invoice->remaining<=0)
                    
                    <td><a class="label label-success" href="#">{{$Invoice->status}}</a></td>
                    <td><a class="btn btn-primary" href="{{url('/invoice/'.$Invoice->imasterid.'/edit')}}">View invoice</a></td>
                    <td><a class="btn btn-primary" href="{{url('/invoicebill/'.$Invoice->imasterid)}}">View Bill</a></td>
                    <td><a class="label label-success" href="#">Completed</a></td>
                    {{-- <td><button type="button" class="btn btn-danger btn-rounded btn-sm" data-toggle="modal"  onclick="getlastbalacne({{$Invoice->imasterid}})" data-target="#addinstallment"><i class="icon-plus3 position-left"></i></button></td> --}}
                    <td><a href="{{url('/getreceving/'.$Invoice->imasterid)}}" class="btn btn-success">Reciving</a></td>
                    
                    @else
                    <td><a class="label label-success" href="#">{{$Invoice->status}}</a></td>
                    <td><a class="btn btn-primary" href="{{url('/invoice/'.$Invoice->imasterid.'/edit')}}">View invoice</a></td>
                    <td><a class="btn btn-primary" href="{{url('/invoicebill/'.$Invoice->imasterid)}}">View Bill</a></td>
                    <td><button type="button" class="btn btn-danger btn-rounded btn-sm" data-toggle="modal"  onclick="getlastbalacne({{$Invoice->imasterid}})" data-target="#addinstallment"><i class="icon-plus3 position-left"></i></button></td>
                    <td><a href="{{url('/getreceving/'.$Invoice->imasterid)}}" class="btn btn-success">Reciving</a></td>
                    @endif
                </tr>
             @endforeach
            </tbody>
        </table>
    </div>
    <!-- /multi column ordering -->
{{--  --}}

{{-- model cateogary--}}
<div id="addinstallment" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content text-center">
            <div class="modal-header">
                <h5 class="modal-title">Add Payment</h5>
            </div>

            <form action="{{url('/addinstallment')}}" class="form-inline" method="POST" id="categoryform">
                @csrf
                <div class="modal-body">
                        {{-- @foreach($invoices as $Invoice) --}}
                        <input type="hidden"  id="imasteridm" name="imasterid" class="form-control" value="">
                        {{-- @endforeach --}}
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Previous Balance</label>
                                    <input type="text" placeholder="Previous Balance" id="previousbalance" name="previousbalance" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">GST Tax amount</label>
                                    <input type="text" placeholder="GST Tax amount" id="gsttaxamount" name="gsttaxamount" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">GST Tax Deduction(%)</label>
                                    <input type="text" placeholder="GST Tax Deduction(%)" id="gstTaxPercentage" name="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Income Tax(%)</label>
                                    <input type="Number"min="0.00" step="0.001"   name="" class="form-control" onkeyup="calculateincometax(this.value)" id="incometaxpercent" placeholder="Income Tax(%)">
                                </div>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Income Tax Amount</label>
                                    <input type="Number" min="0.00" step="0.001"  name="incometaxamount" class="form-control" id="incometaxamount" placeholder="Income Tax Amount">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Amount After Tax</label>
                                    <input type="Number" min="0.00" step="0.001"  name="amountAfterTax" class="form-control" id="amountAfterTax" placeholder="Amount After Tax">
                                </div>
                            </div>
                        
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Current Payment</label>
                                    <input type="text" placeholder="Current Payment" id="installmentamount"  name="installmentamount" onkeyup="calculateremaining()" oninput="calculateremaining()" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Remainig</label>
                                    <input type="text" placeholder="Remainig" id="currentremainig" name="currentremainig" onkeyup="calculateremaining()" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Cheque no</label>
                                    <input type="text" placeholder="cheque no" id="chequenumber" name="chequenumber" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Date</label>
                                    <input type="date"  id="installmentdate" name="installmentdate" class="form-control">
                                </div>
                            </div>
                        </div>
                </div>

                <div class="modal-footer text-center">
                    <button type="submit" class="btn btn-primary">Insert</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- /model cateogary --}}
{{-- script --}}
<script>
// seeting previous balance
function getlastbalacne(imasterid)
{
    var _token = $('input[name="_token"]').val();
            $.ajax({
    url: "{{ route('getpreviousbalance')}}",
    method:'POST',
    dataType:'json',
    data:{ _token:_token, imasterid:imasterid},
    success:function(result)
    {
        $("#previousbalance").val(result.remainig);      
        $("#imasteridm").val(result.imasterid);      
        $("#gsttaxamount").val(result.gsttaxamount);      
    }
   });
}
// subtracting paid value 
function calculateremaining()
{
  let amountAfterTax= $('#amountAfterTax').val();
 let installmentamount=  $('#installmentamount').val();
 if(Number(installmentamount)>Number(amountAfterTax))
 {
   $('#installmentamount').val(0);
 }
 else
 {
    $('#currentremainig').val(Number(amountAfterTax)-Number(installmentamount));
 }

}

function calculateincometax(incometaxpercentage)
{
  if(incometaxpercentage>100)
  {  
    $('#incometaxpercent').val(0);
  }
  let previousbalance=$('#previousbalance').val();
  let gsttax=$('#gsttaxamount').val();
  let gstTaxPercentage=$('#gstTaxPercentage').val();
  
  let onepercent=Number(previousbalance)/100;
  let incometaxamount=Number(onepercent)*incometaxpercentage;

  let percent=Number(gsttax)/100;
  let gsttaxaxamount=Number(percent)*gstTaxPercentage;

  $('#incometaxamount').val(incometaxamount);
  let amountAfterTax= previousbalance - gsttaxaxamount - incometaxamount;
  $('#amountAfterTax').val(amountAfterTax);
}
</script>
{{-- /script --}}
@endsection