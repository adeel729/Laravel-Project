@extends('layout.commonlayout')
@section('content')
<div class="col-md-12">

    <!-- Standard Fields -->
    <div class="panel">
        <div class="panel-heading text-center">
            <span class="panel-title">Purchase Order Item Update</span>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" action="{{url('/purchaseorder/'.$childdetails[0]->purchase_oredr_child_id)}}" method="post">
                @csrf
                @method('put')
                {{-- Row --}}
                <div class="row">
    {{-- Category --}}
    <div class="col-md-3 ml-20">
        <div class="form-group">
            <label for="">Category</label>
            <input type="text" name="" autocomplete="off" class="form-control" readonly value="{{$childdetails[0]->categoryname}}">
        </div>
    </div>
    {{-- /Category --}}
  

   {{-- Subcategory--}}
   <div class="col-md-3 ml-20">
    <div class="form-group">
        <label for="">Item</label>
        <input type="text" name="" class="form-control" autocomplete="off"  readonly value="{{$childdetails[0]->itemname}}">
    </div>
</div>
{{-- /Subcategory--}}
   {{-- Batch Numner--}}
   <div class="col-md-4 ml-20">
    <div class="form-group">
        <label for="">Batch Number</label>
        <input type="text" name="batchnumber" class="form-control" autocomplete="off"   value="{{$childdetails[0]->batchnumber}}" required>
    </div>
</div>
{{-- /Batch Number--}}
                </div>
                {{-- row 2 --}}
                <div class="row">
                    {{-- Category --}}
                    <div class="col-md-3 ml-20">
                        <div class="form-group">
                            <label for="">Unit Price</label>
                            <input type="number" name="unitprice" id="unitprice" min="0.00" step="0.01" oninput="calculatetotal()" onkeyup="calculatetotal()" autocomplete="off" class="form-control" value="{{$childdetails[0]->unit_price}}">
                            <div class="error">
                                <div class="text-danger">
                                    <span class="text-danger">@error('unitprice'){{$message}}@enderror</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- /Category --}}
                  
                   {{-- Subcategory--}}
                   <div class="col-md-3 ml-20">
                    <div class="form-group">
                        <label for="">Quantity</label>
                        <input type="number" name="quantity" id="quantity" min="0"  class="form-control" oninput="calculatetotal()" onkeyup="calculatetotal()" autocomplete="off" value="{{$childdetails[0]->quantity}}">
                        <div class="error">
                            <div class="text-danger">
                                <span class="text-danger">@error('quantity'){{$message}}@enderror</span>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- /Subcategory--}}
                   {{-- Subcategory--}}
                   <div class="col-md-4 ml-20">
                    <div class="form-group">
                        <label for="">Total</label>
                        <input type="number" name="total" id="total" class="form-control" min="0.00" step="0.01" autocomplete="off" value="{{$childdetails[0]->total}}">
                        <div class="error">
                            <div class="text-danger">
                                <span class="text-danger">@error('total'){{$message}}@enderror</span>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- /Subcategory--}}
                                </div>
                {{-- /row 2 --}}
{{-- row 3 --}}
<div class="row">
         {{-- Subcategory--}}
         <div class="col-md-3 ml-20">
            <div class="form-group">
                <label for="">Sale Price</label>
                <input type="number" name="sale_price" id="sale_price" class="form-control" min="0.00" step="0.01" autocomplete="off" value="{{$childdetails[0]->sale_price}}">
                <div class="error">
                    <div class="text-danger">
                        <span class="text-danger">@error('sale_price'){{$message}}@enderror</span>
                    </div>
                </div>
            </div>
        </div>
        {{-- /Subcategory--}}
         {{-- Subcategory--}}
         <div class="col-md-4 ml-20">
            <div class="form-group">
                <label for="">Manufactured Date</label>
                <input type="date" name="manufactureddate" id="manufactureddate" class="form-control" autocomplete="off" value="{{$childdetails[0]->manufactureddate}}" required>
                <div class="error">
                    <div class="text-danger">
                        <span class="text-danger">@error('manufactureddate'){{$message}}@enderror</span>
                    </div>
                </div>
            </div>
        </div>
        {{-- /Subcategory--}}
         {{-- Subcategory--}}
         <div class="col-md-4 ml-20">
            <div class="form-group">
                <label for="">Expiry Date</label>
                <input type="date" name="expirydate" id="expirydate" class="form-control"  autocomplete="off" value="{{$childdetails[0]->expirydate}}" required>
                <div class="error">
                    <div class="text-danger">
                        <span class="text-danger">@error('expirydate'){{$message}}@enderror</span>
                    </div>
                </div>
            </div>
        </div>
        {{-- /Subcategory--}}
</div>
{{-- /row 3 --}}
    <div class="section">
        <div class="pull-right">
            <button type="submit" class="btn btn-bordered btn-primary">Update
            </button>
        </div>
    </div>
            </form>
        </div>
    </div>

</div>
<script>
function calculatetotal()
{
    let unitprice=$('#unitprice').val();
    let quantity=$('#quantity').val();
    let total=Number(unitprice)*Number(quantity);
    $('#total').val(total);
    
 
}
</script>
@endsection