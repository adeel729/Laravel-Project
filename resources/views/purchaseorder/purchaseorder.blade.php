@extends('layout.commonlayout')
@section('content')
<div class="col-md-12">

    <!-- Standard Fields -->
    <div class="panel">
        <div class="panel-heading text-center">
            <span class="panel-title">Purchase Order</span>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" action="{{url('/purchaseorder')}}" method="post">
                @csrf
                {{-- Row --}}
                <div class="row">

{{-- Category Name --}}
<div class="col-md-3 ml-10">
    <div class="form-group">
        <label for="">Supplier Name</label>
        <select class="select2-single form-control" required name="supplierid" id="supplierid">
            <option value="" class="custom-select" >Select Supplier</option>
            @foreach($suppliers as $supplier)
            <option value="{{$supplier->supplierid}}">{{$supplier->name}}</option>
            @endforeach
        </select>
            <div class="error">
                <div class="text-danger">
                    <span class="text-danger">@error('supplierid'){{$message}}@enderror</span>
                </div>
            </div>
       
    </div>
</div>
{{-- Category Name --}}
    {{-- Bill Number --}}
    <div class="col-md-3 ml-10">
        <div class="form-group">
            <label for="">Bill Number</label>
            <input type="text" name="billnumber"  autocomplete="off" class="form-control">
            <div class="error">
                <div class="text-danger">
                    <span class="text-danger">@error('billnumber'){{$message}}@enderror</span>
                </div>
            </div>
        </div>
    </div>
    {{-- /Bill Number --}}
    <div class="col-md-3 ml-10">
        <div class="form-group">
            <label for="">Refrence</label>
            <input type="text" name="refrence"  autocomplete="off" class="form-control" >
            
        </div>
    </div>

                </div>
{{-- /Row 1 --}}
       {{--table row --}}
       <div class="row">
        <table class="">
            <thead style="background-color: black; color:white;">
            <tr>
            <th scope="col"></th>
            <th scope="col" class="text-center" style="width:300px;">Cateogary</th>
            <th scope="col" class="text-center" style="width:200px;">Item</th>
            <th scope="col" class="text-center" style="width:100px;">Unit Price</th>
            <th scope="col" class="text-center" style="width:100px;">Qty</th>
            <th scope="col" class="text-center" style="width:130px;">Total Price</th>
            <th scope="col" style="width:100px;">Remove</th>
            </tr>
            </thead> 
                <tbody id="tbody">
                   
                
                </tbody>
         </table>

    </div>
    {{--/table row --}}

    <div class="row">
          {{-- Order Date--}}
   <div class="col-md-4 ml-10">
    <div class="form-group">
        <label for="">Order Date</label>
        <input type="date" name="purchase_order_date" required class="form-control" autocomplete="off">
        <div class="error">
            <div class="text-danger">
                <span class="text-danger">@error('purchase_order_date'){{$message}}@enderror</span>
            </div>
        </div>
    </div>
</div>
{{-- /Order Date --}}
        {{-- Address --}}
<div class="col-md-4 ml-10">
    <div class="form-group">
        <label for="">Total Bill</label>
        <input type="number" required name="totalbill" min="0.00" step="0.01" class="form-control total" autocomplete="off">
        <div class="error">
            <div class="text-danger">
                <span class="text-danger">@error('totalbill'){{$message}}@enderror</span>
            </div>
        </div>
    </div>
</div>
{{-- /Address --}}
    </div>

    <div class="section">
        <div class="pull-right">
            <button type="submit" class="btn btn-bordered btn-primary">Store
            </button>
        </div>
    </div>
 
            </form>
        <button type="submit" class="btn btn-bordered btn-primary" onclick="addItem()">Add New Item</button>
        </div>
    </div>

</div>
{{-- script --}}
<script>
    //for item button click
var items=0 ;

var total_rows = 0;
        function addItem()
        {

            total_rows++;
            items++;
            var html = "<tr>" +items+ "</tr>";
            html += '<td><select required name="categoryid[]" style="margin-left:20px; width:200px;" id="category_list_'+items+'"     onchange="select_item(this.value,'+items+')"   class=""  > <option value="">Select Category</option>@foreach($categories as $cat)<option value="{{$cat->categoryid}}">{{$cat->categoryname}}</option>@endforeach</select></td>';
            html += '<td><select  required name="itemid[]" style="margin-left:40px; width:200px; " id="item_list_'+items+'" > <option value="">Select Item</option></select></td>';
                html += "<td><input required type='number' min='0.00' step='0.01' autocomplete='off' style='width:100px;  margin-left:20px; height:20px;' id='unitprice_"+items+"'    onchange='calculatetotal("+items+")' onkeyup='calculatetotal("+items+")' name='unit_price[]' placeholder='Unit Price'></td>";
                html += "<td> <input required type='number' min='0' autocomplete='off' style='width:100px; margin-left:20px; height:20px;'   id='quantity_"+items+"' onchange='calculatetotal("+items+")' onkeyup='calculatetotal("+items+")' name='quantity[]' placeholder='Quantity'></td>";
                html += "<td> <input required type='number' min='0.00' step='0.01' autocomplete='off' style='width:100px; margin-left:20px; height:20px;'  class='total_price' id='total_price_"+items+"' name='total[]' placeholder='Total'></td>";
                html += '<td> <button  style=" margin-left:30px; margin-bottom:10px;"  name="remove"  class="btn btn-danger btn-sm remove"> X </button></td></div>';
                html += "</tr>";
                
                
                document.getElementById("tbody").insertRow().innerHTML =html;
                $("#total_count").val(total_rows);
             
           
        }


        $(document).on('click','.remove',function(){
                    $(this).closest('tr').remove();
                    total_rows=total_rows-1;
                    $("#total_count").val(total_rows);
                    });
                    $("#total_count").val(total_rows);

                        // on change category select sub-category 
                      
                    //  on change of category and subcateogary select item
                function select_item(subcategoryid,rowno)
                {
                    var _token = $('input[name="_token"]').val();
                    var categoryid=$('#category_list_'+rowno+'').val();
                    $.ajax({
                    url: "{{ route('quotationgetitems.oncat')}}",
                    method:'POST',
                    data:{ _token:_token,categoryid:categoryid},
                    success:function(result)
                    {
                        $('#item_list_'+rowno+'').html(result);
                        $('#unitprice_'+rowno+'').val(0);
                        $('#quantity_'+rowno+'').val(0);
                        $('#total_price_'+items+'').val(0);

                    }
                    
                }); 
                    }
                    // on change of unit price and quantity
                   function calculatetotal(rowno){
                       let unitprice=$('#unitprice_'+rowno+'').val();
                       let quantity=$('#quantity_'+rowno+'').val();
                       let total=Number(unitprice)*Number(quantity);
                       $('#total_price_'+rowno+'').val(total);
                       final_amount();
                   } 
                //    calculate total price 
                function final_amount()
                        {
                        var sum =0; 
                        $(".total_price").each(function(){ sum += +$(this).val(); });
                        $(".total").val(sum);
                        }
</script>
{{-- /script --}}
@endsection