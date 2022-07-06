@extends('layout.commonlayout')
@section('content')
{{-- sweet alert --}}
@if(Session::has('invoicegenerated'))
<script>
  swal("Great Job!","{!! Session::get('invoicegenerated') !!}","success",{
    button:"Cool",
  });
</script>
@endif
{{-- /sweet alert --}}
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title text-center">Generate DC</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

    <div class="panel-body">
  
        <form class="form-horizontal form-validate-jquery" action="{{url('/Delivery')}}" method="post">
            @csrf
            <fieldset class="content-group">
            <!-- row 1 -->
            <div class="row">
            <!-- First name -->
            <div class="col-md-2 ml-10">
            <div class="form-group">
            <label for="first_name">Warehouse</label>
            <select name="warehouseid" id="warehouseid" class="form-control">
                <option value="">Select Warehouse</option>
                @foreach($warehouse as $ware): 
                <option value="{{$ware->warehouseid}}">{{$ware->warehousename}}</option>
                @endforeach;
            </select>
            </div>
              </div>
        <!-- /first name -->
                <!-- ******************************** -->
            <!-- First name -->
            <div class="col-md-2 ml-10">
                <div class="form-group">
                <label for="first_name">Customer</label>
                <select name="customerid" id="customerid" class="form-control">
                    <option value="">Select Customer</option>
                    @foreach($customer as $cust): 
                    <option value="{{$cust->customerid}}">{{$cust->name}}</option>
                    @endforeach;
                </select>
                </div>
                  </div>
            <!-- /first name -->

                   <!-- Dilievry Date -->
            <div class="col-md-2 ml-10">
            <div class="form-group">
            <label for="date_of_birth">DC Date</label>
            <input type="date" class="form-control" id="dcdate" required name="dcdate">
            </div>
            </div>
           <!-- /dilevry Date -->
                    <!--Total Without Tax  -->
                    {{-- <div class="col-md-2 ml-10">
                        <div class="form-group">
                      <label for="totalwithouttax">Total Without Tax</label>
                      <input type="text" class="form-control totalbeforetax" id="totalwithouttax" name="totalwithouttax" >
                        </div>
                          </div> --}}
                     <!-- /end Total Without Tax  -->
                        {{-- Discount --}}
        {{-- <div class="col-md-2 ml-10">
            <div class="form-group">
          <label for="">Discount</label>
          <input type="text" class="form-control" id="discount" onkeyup="totalafterdiscount();" name="discount" >
            </div>
              </div> --}}
        {{--  /Discount--}}
                <!-- ************************************* -->
                <!-- ************************************* -->
                   <!-- Grade -->
         
                <!-- ************************************* -->
                <!-- /row 1 -->
            </div>
{{-- row 2 --}}
<div class="row">
        {{-- Discount --}}
        {{-- <div class="col-md-2 ml-10">
            <div class="form-group">
          <label for="">After Discount</label>
          <input type="text" class="form-control" id="afterdiscount" name="afterdiscount" >
            </div>
              </div> --}}
        {{--  /Discount--}}
    {{-- Tax amount --}}
    {{-- <div class="col-md-2 ml-10">
        <div class="form-group">
      <label for="">Tax Amount</label>
      <input type="text" class="form-control" id="taxamount" name="taxamount" >
        </div>
          </div> --}}
    {{--  /tax amount--}}
        <!--Total Without Tax  -->
        {{-- <div class="col-md-2 ml-10">
            <div class="form-group">
          <label for="totalwithouttax">Total With Tax</label>
          <input type="text" class="form-control totalaftertax" id="totalaftertax" name="totalaftertax" >
            </div>
              </div> --}}
         <!-- /end Total Without Tax  -->
                 <!--Total net payable  -->
        {{-- <div class="col-md-2 ml-10">
            <div class="form-group">
          <label for="nettotal">Net Total</label>
          <input type="text" class="form-control" id="nettotal" name="nettotal" >
            </div>
              </div> --}}
         <!-- /end net payable  -->
                 <!-- net paid  -->
        {{-- <div class="col-md-2 ml-10">
            <div class="form-group">
          <label for="nettotal">Cash Paid</label>
          <input type="text" class="form-control" id="paid" name="paid" onkeyup="calculateRemaining()" >
            </div>
              </div> --}}
         <!-- /end net paid  -->
</div>
{{-- /row 2 --}}
{{-- row 3  --}}
<div class="row">
    {{-- <div class="col-md-2 ml-10">
        <div class="form-group">
      <label for="nettotal">Remaining</label>
      <input type="text" class="form-control" id="remaining" name="remaining" >
        </div>
          </div> --}}
</div>
{{-- / row 3 --}}
            <!-- row 4 start -->
            <div class="row">
                <table class="table table-togglable table-bordered table-hover">
                        <tbody id="tbody">
                           
                        
                        </tbody>
                    </table>
          
            </div>
                <!-- row 4 end -->
            </fieldset>
            
            <div class="text-right">
                <button type="submit" id="submit"  class="btn btn-primary">Submit </button>
            </div>
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
            var html = "<tr>" +items+ "</tr>";
            html += '<td class="col-md-2 "><select  required name="categoryid[]" style="width:150px;" onchange="ChangeCatChangeItem(this.value,'+items+')" id="cat_id'+items+'"  class="item_cat" > <option value="">Select Cat</option>@foreach($cateogary as $cat):<option value="{{$cat->categoryid}}">{{$cat->categoryname}}</option>@endforeach</select></td>';
            html += '<td class="col-md-2 "><select required name="itemid[]" style="margin-left:-20px; width:190px; " id="item_list_'+items+'"     onchange="get_stock_unitprice(this.value,'+items+')"   class=" item_names"  > <option value="">Select item</option></select></td>';
                html += "<td><input required style='width:160px;  margin-left:8px; height:20px;' id='TotalStock_"+items+"'    readonly  name='totalstock[]' placeholder='Total stock' oninput='stockcheck("+items+")' onkeyup='stockcheck("+items+")'></td>";
                // html += "<td> <input required style='width:80px; margin-left:-60px; height:20px;' type='float' onkeyup='changeprice(this.value,"+items+")' id='unit_price_"+items+"'     name='unitprice[]' placeholder='price'></td>";
               
              

                html += "<td> <input required type='number' min='0' style='width:160px; margin-left:50px; height:20px;'  id='quantity_"+items+"' oninput='stockcheck("+items+")' onkeyup='stockcheck("+items+")' name='quantity[]' placeholder='quantity'></td>";
                // html += "<td> <input  required style='width:80px; margin-left:-45px; height:20px;'  class='before_tax' id='total_price_"+items+"' name='totalprice[]' placeholder='before tax'></td>";
            //     html += '<td> <select required style="width:50px; margin-left:-55px; height:20px;" name="tax[]" onchange="total_with_tax(this.value,'+items+')"  id="tax_'+items+'" > <option value="">Tax</option><option value="0">0%</option> <option value="17">17%</option></td>';
                // html += "<td> <input required style='width:60px; margin-left:-50px; height:20px;' readonly  id='total_after_tax"+items+"' class='after_tax' name='aftertax[]' placeholder='after tax'></td>";
                html += '<td> <button style=" margin-left:-40px;"  name="remove" name="remove" class="btn btn-danger btn-sm remove"> X </button></td></div>';
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
        var warehouseid=$('#warehouseid').val();
        var _token = $('input[name="_token"]').val();
      
    $.ajax({
    url: "{{route('quotationgetitems.oncat')}}",
    method:'POST',
    data:{ _token:_token, categoryid:categoryid,warehouseid:warehouseid},
    success:function(result)
    {
        // alert(result);
     $('#item_list_'+td_id+'').html(result);
     $('#TotalStock_'+td_id+'').val(0);
     $('#unit_price_'+td_id+'').val(0);
     $('#quantity_'+td_id+'').val(0);
     $('#total_price_'+td_id+'').val(0);
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
    url: "{{route('getstockondc.price')}}",
    method:'POST',
    dataType:'json',
    data:{ _token:_token,cat_id:cat_id,item_id:item_id,warehouseid:warehouseid},
    success:function(result)
    {
    
      
        if(result.itemquantity)
        {
            $('#TotalStock_'+td_id+'').val(result.itemquantity);
            $('#unit_price_'+td_id+'').val(result.itemprice);
        }
        else
        {
            $('#TotalStock_'+td_id+'').val("");
            $('#unit_price_'+td_id+'').val("");
        }
    }
    
   }); 
}
// calculating total price before tax
function total_without_tax(quantity,row)
{
    var unit_price=$('#unit_price_'+row+'').val();
    var quantity=quantity;
    var total=Number(unit_price)*Number(quantity);
    $('#total_price_'+row+'').val(total);
    calculate_before_tax()
}

// on price change
function changeprice(unitprice,row)
{
    var quantity=$('#quantity_'+row+'').val();
    var unitprice=unitprice;
    var total=Number(unitprice)*Number(quantity);
    $('#total_price_'+row+'').val(total);
    calculate_before_tax()
} 
//function for calculating total without tax
function calculate_before_tax()
{
var sum = 0; 
$(".before_tax").each(function(){ sum += +$(this).val() });
 $('.totalbeforetax').val(sum);
 grand_total_after_tax();
    
    calculate_tax_amount();
}
// add tax amount
function total_with_tax(tax,row)
{
  var total_before_tax=$('#total_price_'+row+'').val();  
  var tax_amount=$('#tax_'+row+'').val();  
  var one_percent_of_amount=Number(total_before_tax)/100;
  var after_tax=Number(total_before_tax)+(Number(tax_amount)*Number(one_percent_of_amount));
    //value for after aplling tax
    $('#total_after_tax'+row+'').val(after_tax);
    grand_total_after_tax();
    calculate_tax_amount();
    netbill();
    stockcheck(row);
}
// calculate total afer tax
function grand_total_after_tax()
{
    var sum = 0;
 $(".after_tax").each(function(){ sum += +$(this).val() });
 $(".totalaftertax").val(sum);
 calculate_tax_amount();
 netbill();
}
// calculating tax amount
function calculate_tax_amount()
{
let beforetax=$('.totalbeforetax').val();
let aftertax=$(".totalaftertax").val();
let taxamount=Number(aftertax)-Number(beforetax);
$('#taxamount').val(taxamount);
}
// calculating after discount
function totalafterdiscount()
{
    let discount=$('#discount').val();
    let totalwithouttax=$('#totalwithouttax').val();
    let afterdicount=Number(totalwithouttax)-Number(discount);
    $('#afterdiscount').val(afterdicount);
    netbill();
}
// calculating net bill 
function netbill()
{
    let totalaftertax=$('#totalaftertax').val();
    let discount=$('#discount').val();
    let netbill=Number(totalaftertax)-Number(discount);
    $('#nettotal').val(netbill);
    calculateRemaining();
}
// calculating remainig
function calculateRemaining()
{
    let nettotal=$('#nettotal').val();
    let paid=$('#paid').val();
    let remaining=Number(nettotal)-Number(paid);
    $('#remaining').val(remaining);
}
// Checking Alloted Quantity is less than stock or not 
function stockcheck(row)
{
   let stock= $('#TotalStock_'+row+'').val();
  let quantity=$('#quantity_'+row+'').val();
if(Number(quantity)>Number(stock))
{
    $('#quantity_'+row+'').val(0);
}  
else
{
    $('#quantity_'+row+'').val(quantity);
}  
}
</script>
{{-- /script --}}
@endsection