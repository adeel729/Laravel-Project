@extends('layout.commonlayout')
@section('content')
{{-- sweet alert --}}
@if(Session::has('InventoryAdded'))
<script>
  swal("Great Job!","{!! Session::get('InventoryAdded') !!}","success",{
    button:"Cool",
  });
</script>
@endif
{{-- /sweet alert --}}
{{-- form --}}
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title text-center">Add Inventory</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

    <div class="panel-body">
        
        <form class="form-horizontal form-validate-jquery" action="{{url('/inventory')}}" method="post">
           @csrf
            <fieldset class="content-group">
                
                <!-- row initial -->
                <div class="row">
                                        <!--  Supplier -->
<div class="col-md-2 ml-20">
    <div class="form-group">
    <label>Select Supplier</label>
    <select class="form-control" id="supplierid"  name="supplierid" required>
    <option value="">Select Supplier</option>    
    @foreach($suppliers as $supplier): 
    <option value="{{$supplier->supplierid}}">{{$supplier->name}}</option>
    @endforeach                 
    </select>
    </div>
    
    </div>
    <!-- end Supplier -->
    
                    <!--  Ware House -->
<div class="col-md-2 ml-20">
<div class="form-group">
<label>Ware House</label>
<select class="form-control" id="warehouseid"  name="warehouseid" required>
<option value="">Select Warehouse</option>        
@foreach($warehouses as $warehouse): 
<option value="{{$warehouse->warehouseid}}">{{$warehouse->warehousename}}</option>
@endforeach              
</select>
</div>

</div>
<!-- end ware house -->

<!-- item cateogary -->
<div class="col-md-2 ml-20">
<div class="form-group">
<label>Item Category</label>
<select class="form-control" id="categoryid"  name="categoryid" required>
<option value="">Select Category</option>   
@foreach($categories as $category): 
<option value="{{$category->categoryid}}">{{$category->categoryname}}</option>
@endforeach                                       
</select>
</div>
</div>
<!-- end item cateogary -->
<!-- item start -->
<div class="col-md-2 ml-20">
    <div class="form-group">
    <label>Item </label>
<select class="form-control" name="itemid" id="itemid">
<option value="">Select Item</option>
</select>                                       
</div>
</div>
<!-- item end -->
<!--Catalog number -->

    <!-- /catalog number-->
<!--purchase price -->
<div class="col-md-2 ml-20">
    <div class="form-group">
    <label>Purchase Unit Price</label>
    <input type="text" name="unitprice" id="unitprice" class="form-control" onkeyup="CalculateTotalPrice()" required>                     
    </div>
    </div>
    <!-- end purchase price -->
    
                </div>
               <!-- **************************************************** -->

                <div class="row">

    <!-- Serial number div start -->
    {{-- <div class="col-md-2 ml-20">
        <div class="form-group">
        <label>Serial Number</label>
        <input type="text"  name="serialnumber" id="serialnumber" class="form-control" required>
                                
        </div>
        </div> --}}
        <!-- serial number div end -->

<!--Quantity -->
<div class="col-md-2 ml-20">
<div class="form-group">
<label>Quantity </label>
<input type="text" name="quantity" id="quantity" onkeyup="CalculateTotalPrice()"  class="form-control" required>
                        
</div>
</div>
<!-- Quantity-->

<!-- total price div start -->
<div class="col-md-2 ml-20">
<div class="form-group">
<label>Total Price</label>
<input type="text"  name="totalprice" id="totalprice" class="form-control" required>                            
</div>
</div>
<!-- total price div end -->
<!-- sale price -->
<div class="col-md-2 ml-20">
<div class="form-group">
<label>Sale Price</label>
<input type="text" value="" name="saleprice" id="saleprice" class="form-control" required>              
</div>
</div>
<!-- end sale price -->
<!-- batch_num div start -->
<div class="col-md-2 ml-20">
    <div class="form-group">
    <label>Batch Number</label>
    <input type="text" name="batchnumber" id="batchnumber" class="form-control" required>
                            
    </div>
    </div>
    <!-- tax id1 div start -->

<!-- Purchase Bill Number -->
<div class="col-md-2 ml-20">
    <div class="form-group">
    <label>Purchase Bill Number</label>
    <input type="text" name="bill_number" value="" id="maximum_level" class="form-control" required="">
                            
    </div>
    </div>
    <!-- end Purchase Bill Number-->


</div>
<!-- row 1 end -->
<!-- row 2 start -->
<div class="row">


    

<!--Manufactured date div start -->
<div class="col-md-2 ml-20">
    <div class="form-group">
    <label>Manufactured Date</label>
    <input type="date"  name="manufactureddate" id="manufactureddate" class="form-control" required>
                            
    </div>
    </div>
    
    <!-- tax id1 div end -->
<!--purchase Date -->
<div class="col-md-2 ml-20">
    <div class="form-group">
    <label>Purchase Date</label>
    <input type="date" value="" name="purchasedate" class="form-control" required="">
                            
    </div>
    </div>
    <!-- end purchase Date -->
<!-- Expirty date div start -->
<div class="col-md-2 ml-20">
<div class="form-group">
<label>Expiry Date</label>
<input type="date" name="expirydate" class="form-control" required>
                        
</div>
</div>
<!-- Expirty date div end -->


</div>
<!-- row 2 end -->
<!-- row 3 start -->
<div class="row">





<!-- Expirty date div end -->
<!-- form_id div start -->

<div>
<!-- form id -->
<input type="hidden" value="001" name="form_id" class="form-control">
                        
</div>

<!-- form_id div end -->




</div>
<!-- row 3 end -->


            

            </fieldset>

            <div class="text-right">
                <button type="submit" id="inventory_insert" name="inventory_insert" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
{{-- /form --}}
<script>
//  search on supplier
 $('#supplierid').selectize({
          sortField: 'text'
});
// end  search on supplier
//  search on warehouse
 $('#warehouseid').selectize({
          sortField: 'text'
});
// end  search on warehouse
//  search on cateogary
 $('#categoryid').selectize({
          sortField: 'text'
});
// end  search on category


// on cateogary change select items
$("#categoryid").change(function() {
   
    if($(this).val() != '')
      {
        var categoryid = $('#categoryid').val();
        var _token = $('input[name="_token"]').val();
      }
    $.ajax({
    url: "{{ route('getitems.oncat')}}",
    method:'POST',
    data:{ _token:_token, categoryid:categoryid},
    success:function(result)
    {
      $('#itemid').html(result);
    }
    
   }); 
    });
// end on cateogary change select items
// calculating total price on basis of auantity and unit price
function CalculateTotalPrice()
{
    let unitprice=$('#unitprice').val();
    let quantity=$('#quantity').val();
    let total_Price=Number(unitprice)*Number(quantity);
    $('#totalprice').val(total_Price);
}
</script>
@endsection