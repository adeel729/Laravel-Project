@extends('layout.commonlayout')
@section('content')
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title text-center">Create Financial Offer</h5>
        <div class="heading-elements">
            
        </div>
    <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

    <div class="panel-body">
  
        <form class="form-horizontal form-validate-jquery" action="{{url('/storeFinancialOffer')}}" method="post">
            @csrf
            <!-- row 1 -->
            <div class="row">
            
                <!-- ******************************** -->
            <!-- First name -->
            <div class="col-md-2 ml-10 ">
                <div class="form-group">
                <label for="first_name">Customer</label>
                <select name="customerid" id="customerid" class="form-control" required>
                    <option value="">Select Customer</option>
                    @foreach($customer as $cust): 
                    <option value="{{$cust->customerid}}">{{$cust->name}}</option>
                    @endforeach;
                </select>
                </div>
                  </div>
            <!-- /first name -->

                   <!-- Quotation Date -->
            <div class="col-md-2 ml-10 ">
            <div class="form-group">
            <label for="date_of_birth"> Date</label>
            @php($date = date("Y-m-d"))
            <input required type="date" class="form-control" id="date" required name="date" value="{{$date}}">
            </div>
            </div>
           <!-- /Quotation Date -->
                    <!--Total Without Tax  -->
                    <div class="col-md-2 ml-10 ">
                        <div class="form-group">
                      <label for="totalwithouttax">Reference No</label>
                      <input type="text" class="form-control " id="ref_no" name="ref_no" placeholder="Enter Reference No" required>
                        </div>
                          </div>
                     <!-- /end Total Without Tax  -->
                        {{-- Discount --}}
        <div class="col-md-2 ml-10 ">
            <div class="form-group">
          <label for="">Total Amount</label>
          <input required type="text" class="form-control" id="total_bill"  name="total_bill" readonly placeholder="Total Bill">
            </div>
        </div>

        <div class="col-md-2 ml-10 ">
            <div class="form-group">
            <label for="first_name">Header and Footer</label>
            <select name="header" id="header" class="form-control" required>
                <option value="1">With header and footer</option>
                <option value="0">Without header and footer</option>
               
            </select>
            </div>
        </div>
        {{--  /Discount--}}
                
    </div>
    <div class="row">
        <div class="col-md-2 ml-10 ">
            <div class="form-group">
            <label for="first_name">Certifiacation</label>
            <select name="certification" id="certification" class="form-control" required>
                <option value="1">With Certifiacation</option>
                <option value="0">Without Certifiacation</option>
               
            </select>
            </div>
        </div>
    </div>


{{-- /row 3 start --}}
            <!-- row 3 start -->
            <div class="row">
                <table class="table table-togglable table-bordered table-hover">
                        <tbody id="tbody">
                           
                        
                        </tbody>
                    </table>
          
            </div>
                <!-- row 3 end -->
                
           
            <div class="text-right">
                <button type="submit" id="submit"  class="btn btn-primary" >Submit </button>
            </div>
            <input type="hidden" name="temp" id="temp" value='0'>
        </form>
        <button type="submit" class="btn btn-default" onclick="addItem()">Add New Item</button>
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
            var html = "<tr>" ;
            html += '<td >'+items+'</td>';
            html += '<td class="col-md-2 "><select  required name="categoryid[]" style="width:150px;" onchange="ChangeCatChangeItem(this.value,'+items+')" id="cat_id'+items+'"  class="item_cat" > <option value="">Select Cat</option>@foreach($cateogary as $cat):<option value="{{$cat->categoryid}}">{{$cat->categoryname}}</option>@endforeach</select></td>';
            html += '<td class="col-md-2 "><select required name="itemid[]" style=" width:190px; " id="item_list_'+items+'"     onchange="get_stock_unitprice(this.value,'+items+')"   class=" item_names"  > <option value="">Select item</option></select></td>';
                                
                html += "<td><h7>Sub Unit</h7><input required style='width:80px;  height:20px;' id='quantity_"+items+"'    readonly  name='quantity[]' placeholder='Sub Unit'></td>";

                html += "<td><td><h7>Rate Per Pack</h7> <input required style='width:100px;  height:20px;' type='float' id='total_price_"+items+"'     name='rate_per_pack[]' placeholder='Rate per pack' onkeyup='total_without_tax(this.value,"+items+")' class='total_price'></td>";
                // html += "<td> <input required type='float' style='width:60px;  height:20px;'  id='quantity_"+items+"' onkeyup='total_without_tax(this.value,"+items+")' name='quantity[]' placeholder='quantity' ></td>";

                html += "<td><td><h7>Rate Per Price</h7> <input required style='width:100px;  height:20px;' type='float' id='unit_price_"+items+"'     name='rate_per_peice[]' placeholder='Rate per piece' readonly></td>";
                // html += "<td> <input  required style='width:80px;  height:20px;'  class='total_price' id='total_price_"+items+"' name='totalprice[]' placeholder='Total'></td>";
                
                html += '<td> <button style=" "  name="remove" name="remove" class="btn btn-danger btn-sm remove"> X </button></td></div>';
                // html += "</tr>";
                
                
                document.getElementById("tbody").insertRow().innerHTML =html;
                $("#total_count").val(total_rows);
             
           
        }


        $(document).on('click','.remove',function(){
            let rowVal = Number($(this).parent().prev().children().val());
            let total_bill  = Number($('#total_bill').val());
            $('#total_bill').val(total_bill - rowVal);
            $(this).closest('tr').remove();
                    total_rows=total_rows-1;
                    $("#total_count").val(total_rows);
                    });
                    $("#total_count").val(total_rows);
                    // end of row add function
                    //  search on cateogary
 $('select').selectize({
          sortField: 'text'
});
// end  search on category
// Change Of Category Change Item
function ChangeCatChangeItem(cat_id,td_id)
    {

        var categoryid = cat_id;
        var _token = $('input[name="_token"]').val();
      
    $.ajax({
    url: "{{route('quotationgetitems.oncat')}}",
    method:'POST',
    data:{ _token:_token, categoryid:categoryid},
    success:function(result)
    {
        // alert(result);
     $('#item_list_'+td_id+'').html(result);
     $('#unit_price_'+td_id+'').val(0);
     $('#total_price_'+td_id+'').val(0);
     $('#rate_per_pack'+td_id+'').val(0);
    }
    
   }); 
    }
//change of item select total quantity and unit price
function get_stock_unitprice(item_id,td_id)
{
        var item_id = $('#item_list_'+td_id+'').val();
        var cat_id = $('#cat_id'+td_id+'').val();
        var warehouseid=$('#warehouseid').val();
        var _token = $('input[name="_token"]').val();
    $.ajax({
    url: "{{route('getstock.price')}}",
    method:'POST',
    dataType:'json',
    data:{ _token:_token,cat_id:cat_id,item_id:item_id,warehouseid:warehouseid},
    success:function(result)
    {
        if(result.itemquantity)
        {
            
            $('#quantity_'+td_id+'').val(result.subUnit);
            
        }
        else
        {
            $('#unit_price_'+td_id+'').val("");
        }
    }
    
   }); 
}
// calculating total price before tax
function total_without_tax(price,row)
{
    var quantity=$('#quantity_'+row+'').val();
    var price=price;
    var unit_price=Number(price)/Number(quantity);
    $('#unit_price_'+row+'').val(unit_price);
    var sum = 0;
    $(".total_price").each(function(){ sum += +$(this).val() });
    $('#total_bill').val(sum);
}

// on price change
function changeprice(unitprice,row)
{
    var quantity=$('#quantity_'+row+'').val();
    var unitprice=unitprice;
    var total=Number(unitprice)*Number(quantity);
    $('#total_price_'+row+'').val(total);
    var sum = 0;
    $(".total_price").each(function(){ sum += +$(this).val() });
    $('#total_bill').val(sum);

    } 


$( "#submit" ).click(function( event ) {
    let total_bill = $('#total_bill').val();
    if(total_bill > 0){
    }
    else{
        event.preventDefault();
    }
  
});

</script>
{{-- /script --}}
@endsection