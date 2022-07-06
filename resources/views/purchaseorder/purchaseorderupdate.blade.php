@extends('layout.commonlayout')
@section('content')
<div class="col-md-12">

    <!-- Standard Fields -->
    <div class="panel">
        <div class="panel-heading text-center">
            <span class="panel-title">Purchase Order View</span>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" action="{{url('/purchaseorderparentupdate')}}" method="post">
                @csrf
                {{-- Row --}}
                <div class="row">
                    <input type="hidden" name="purchase_order_id" value="{{$suppliers[0]->purchase_order_id}}">
                    
{{-- Category Name --}}
<div class="col-md-3 ml-20">
    <div class="form-group">
        <label for="">Supplier Name</label>
        <select class="select2-single form-control" name="supplierid" id="supplierid" readonly>
          
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
    <div class="col-md-4 ml-20">
        <div class="form-group">
            <label for="">Bill NUmber</label>
            <input type="text" name="billnumber" autocomplete="off" class="form-control" value="{{$suppliers[0]->billnumber}}">
            <div class="error">
                <div class="text-danger">
                    <span class="text-danger">@error('billnumber'){{$message}}@enderror</span>
                </div>
            </div>
        </div>
    </div>
    {{-- /Bill Number --}}
  
   {{-- Bill Number --}}
   <div class="col-md-4 ml-20">
    <div class="form-group">
        <label for="">Order Date</label>
        <input type="date" name="purchase_order_date" class="form-control" autocomplete="off" value="{{$suppliers[0]->purchase_order_date}}">
        <div class="error">
            <div class="text-danger">
                <span class="text-danger">@error('purchase_order_date'){{$message}}@enderror</span>
            </div>
        </div>
    </div>
</div>
{{-- /Bill Number --}}
                </div>
{{-- /Row 1 --}}
      

    <div class="row">
        {{-- Total Bill --}}
<div class="col-md-3 ml-20">
    <div class="form-group">
        <label for="">Total Bill</label>
        <input type="number" name="totalbill" min="0.00" step="0.01" id="totalbill" class="form-control total" autocomplete="off" value="{{$suppliers[0]->totalbill}}" readonly >
        <div class="error">
            <div class="text-danger">
                <span class="text"> @error('totalbill') {{$message}} @enderror</span>
            </div>
        </div>
    </div>
</div>
{{-- /Total Bill --}}
        {{-- Total Bill --}}
        <div class="col-md-4 ml-20">
            <div class="form-group">
                <label for="">Current Payment</label>
                <input type="number" name="current_payment" id="current_payment" min="0.00" step="0.01" class="form-control total" autocomplete="off" oninput="remainig()" onkeyup="remainig()" value="{{$suppliers[0]->current_payment}}">
                <div class="error">
                    <div class="text-danger">
                        <span class="text"> @error('current_payment') {{$message}} @enderror</span>
                    </div>
                </div>
            </div>
        </div>
        {{-- /Total Bill --}}
          {{-- Remainig --}}
          <div class="col-md-4 ml-20">
            <div class="form-group">
                <label for="">Remainig</label>
                <input type="number" name="remaining" min="0.00" id="remaining" step="0.01" class="form-control total" autocomplete="off" value="{{$suppliers[0]->remaining}}" readonly>
                <div class="error">
                    <div class="text-danger">
                        <span class="text"> @error('remaining') {{$message}} @enderror</span>
                    </div>
                </div>
            </div>
        </div>
        {{-- /Remainig --}}
    </div>
    <div class="row">
               {{-- Payment type --}}
               <div class="col-md-3 ml-20">
                <div class="form-group">
                    <label for="">Payment Type</label>
                    <select class="form-control" name="payment_type" >
                        @if($suppliers[0]->payment_type)
                        
                            <option value="{{$suppliers[0]->payment_type}}"> 
                                {{$suppliers[0]->payment_type}}
                            </option>
                        
                        @else
                     
<option value="">Select Type</option>
<option value="Cash">Cash</option>
<option value="Bank">Bank Account</option>
                        @endif
                        
                    </select>
                    <div class="error">
                        <div class="text-danger">
                            <span class="text"> @error('payment_type') {{$message}} @enderror</span>
                        </div>
                    </div>
                </div>
            </div>
            {{-- /Remainig --}}
              {{-- Payment type --}}
              <div class="col-md-4 ml-20">
                <div class="form-group">
                    <label for="">Discription</label>
                    <textarea name="discription" id="" cols="10" rows="3"  class="form-control" autocomplete="off"  >{{$suppliers[0]->discription}}</textarea>
                    <div class="error">
                        <div class="text-danger">
                            <span class="text"> @error('discription') {{$message}} @enderror</span>
                        </div>
                    </div>
                </div>
            </div>
            {{-- /Remainig --}}
    </div>
    <div class="section">
        <div class="pull-right">
            <button type="submit" class="btn btn-bordered btn-primary">Store
            </button>
        </div>
    </div>
    </form>
        {{-- <button type="submit" class="btn btn-bordered btn-primary" onclick="addItem()">Add New Item</button> --}}
         {{--table row --}}
       <div class="row">
        <table class="table table-togglable table-hover">
            <thead class="bg-dark text-white">
            <tr>
            {{-- <th scope="col"></th> --}}
            <th scope="col">Cateogary</th>
            <th scope="col">Item</th>
            <th scope="col">Unit Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Total Price</th>
            <th scope="col">Sale Price</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
            </tr>
        </thead> 
                <tbody >
                    @foreach($childdata as $record)
                   <tr>
                    <td><input type="text" name="" id="" style="width:120px; margin-left:10px;" value="{{$record->categoryname}}"/></td> 
                    <td><input type="text" name="" id="" style="width:120px; margin-left:10px;" value="{{$record->itemname}}"/></td>
                    <td><input type="text" name="" id="" style="width:80px; margin-left:10px;" value="{{$record->unit_price}}"/></td>
                    <td><input type="text" name="" id="" style="width:50px;  margin-left:10px;" value="{{$record->quantity}}"/></td>
                    <td><input type="text" name="" id="" style="width:70px;  margin-left:10px;" value="{{$record->total}}"/></td>
                    <td><input type="text" name="" id="" style="width:70px;  margin-left:10px;" value="{{$record->sale_price}}"/></td>
                    <td><a href="{{url('/purchaseorder/'.$record->purchase_oredr_child_id)}}"  class="btn btn-info" style="width:60px;  margin-left:10px;">Edit</a></td>
                    <td>
                        <form action={{url("/purchaseorder/".$record->purchase_oredr_child_id)}}" method="post">
                        @method('DELETE')
                        @csrf
                        <input class="btn btn-danger" type="submit" value="delete" />
                        </form>
                    </td>
                   </tr>
                   @endforeach
                </tbody>
            </table>

    </div>
    {{--/table row --}}
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
            html += '<td><select required name="categoryid[]" style="margin-left:-20px; width:190px;" id="category_list_'+items+'"     onchange="select_subcategory(this.value,'+items+')"   class=""  > <option value="">Select Category</option>@foreach($categories as $cat)<option value="{{$cat->categoryid}}">{{$cat->categoryname}}</option>@endforeach</select></td>';
            html += '<td><select  required name="itemid[]" style="margin-left:-12px; width:190px; " id="item_list_'+items+'" > <option value="">Select Item</option></select></td>';
                html += "<td><input required type='number' min='0.00' step='0.01' autocomplete='off' style='width:80px;  margin-left:-8px; height:20px;' id='unitprice_"+items+"'    onchange='calculatetotal("+items+")' onkeyup='calculatetotal("+items+")' name='unit_price[]' placeholder='Unit Price'></td>";
                html += "<td> <input required type='number' min='0' autocomplete='off' style='width:80px; margin-left:20px; height:20px;'   id='quantity_"+items+"' onchange='calculatetotal("+items+")' onkeyup='calculatetotal("+items+")' name='quantity[]' placeholder='Quantity'></td>";
                html += "<td> <input required type='number' min='0.00' step='0.01' autocomplete='off' style='width:80px; margin-left:20px; height:20px;'  class='total_price' id='total_price_"+items+"' name='total[]' placeholder='Total'></td>";
                html += '<td> <button  style=" margin-left:10px;"  name="remove"  class="btn btn-danger btn-sm remove"> X </button></td></div>';
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

                        // on change category select category
                 
                    //  on change of category and subcateogary select item
                function select_item(subcategoryid,rowno)
                {
                    var _token = $('input[name="_token"]').val();
                    var categoryid=$('#category_list_'+rowno+'').val();
                    $.ajax({
                    url: "{{ route('quotationgetitems.oncat')}}",
                    method:'POST',
                    data:{ _token:_token,categoryid:categoryid,subcategoryid:subcategoryid},
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

                        // calculating remaining on basis of paid amount
                        function remainig(){
                        let totalbill=$('#totalbill').val();
                        let current_payment=$('#current_payment').val();
                        let remaining=Number(totalbill)-Number(current_payment);
                        $('#remaining').val(remaining);
                        }
</script>
{{-- /script --}}
@endsection