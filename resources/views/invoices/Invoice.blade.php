@extends('layout.commonlayout')
@section('content')
<div class="panel panel-flat">
  <div class="panel-heading">
      <h5 class="panel-title text-center">Create Invoice</h5>
      <div class="heading-elements">
          <ul class="icons-list">
              <li><a data-action="collapse"></a></li>
              <li><a data-action="reload"></a></li>
              <li><a data-action="close"></a></li>
          </ul>
      </div>
  <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

  <div class="panel-body">
      <form class="form-horizontal form-validate-jquery" action="{{url('/storeInvoice')}}" method="post">
          @csrf
          <div class="row">
              <div class="col-md-2 ml-10">
                <div class="form-group">
                  <label for="first_name">Warehouse</label>
                  <select name="warehouseid" id="warehouseid" class="form-control" required>
                      <option value="">Select Warehouse</option>
                      @foreach($warehouse as $ware): 
                      <option value="{{$ware->warehouseid}}">{{$ware->warehousename}}</option>
                      @endforeach;
                  </select>
                </div>
              </div>

              <div class="col-md-2 ml-10">
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
              
              <div class="col-md-2 ml-10">
                <div class="form-group">
                  <label for="date_of_birth">Invoice Date</label>
                  @php($date=date("Y-m-d"))
                  <input type="date" class="form-control" id="dcdate" required name="dcdate" value="{{$date}}">
                </div>
              </div>

              <div class="col-md-2 ml-10">
                <div class="form-group">
                  <label for="date_of_birth">Total Amount</label>
                  <input type="number" class="form-control" id="total" required name="total" placeholder="Total Amount" readonly>
                </div>
              </div>
              
              <div class="col-md-2 ml-10">
                <div class="form-group">
                  <label for="date_of_birth">Paid Amount</label>
                  <input type="number" class="form-control" id="paid" required name="paid" placeholder="Paid Amount" readonly onkeyup="CalculateRemaining()" required>
                </div>
              </div>

              <div class="col-md-2 ml-10">
                <div class="form-group">
                  <label for="date_of_birth">Remaining Amount</label>
                  <input type="number" class="form-control" id="remaining" required name="remaining" placeholder="Remaining Amount" readonly>
                </div>
              </div>
          </div>
          <div class="row" >
            <div class="col-lg-12" style="overflow-x:auto; margin-bottom:20px;">
              <table class="table table-togglable table-bordered">
                <thead>
                  <tr >
                    <th>Sr#</th>
                    
                    <th>Batch Number</th>
                    <th>Stock</th>
                    <th>item Name</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Tax(%)</th>
                    <th>After Tax</th>
                    <th>Discount</th>
                    <th>After Discount</th>
                    <th>Remove</th>
                  </tr>
                </thead>
                <tbody id="tbody">

                </tbody>
              </table>
            </div>
            <div class="text-right">
              <input type="hidden" id="totalbeforetax" name="totalbeforetax">
              <input type="hidden" id="totalaftertax" name="totalaftertax">
              <input type="hidden" id="totalafterdiscount" name="totalafterdiscount">
              <button type="submit" id="submit"  class="btn btn-primary" disabled>Submit </button>
            </div>
          </div>  
      </form>
      <button type="submit" class="btn btn-default" onclick="addItem()">Add New Item</button>
    </div>
</div>

<script>
    var items=0 ;
    var total_rows = 0;
    function addItem()
    {
        total_rows++;
        items++;
        var html = "<tr>" ;
        html += '<td >'+items+'</td>';
       
                           
        html += '<td><input name="batchnumber[]" id="batchnumber_'+items+'" style="width:80px;  height:20px;"  onchange="get_stock(this.value,'+items+')" placeholder="Batch Number" required ></td> ';
         html += '<td><input name="TotalStock_[]" id="TotalStock_'+items+'" style="width:80px;  height:20px;"   placeholder="Stock" required readonly></td> ';
         html += '<td class="col-md-2 "><input required name="itemid[]" style=" width:190px; " id="item_list_'+items+'"     onchange="get_stock(this.value,'+items+')"   placeholder="item name" class=" item_names"></td>';
        html += '<td><input name="unitprice[]" id="unitprice_'+items+'" style="width:80px;  height:20px;"   placeholder="Unit Price" required></td> ';
       
        html += '<td><input name="quantity[]" id="quantity_'+items+'" onkeyup="CalculateItemTotalPrice(this.value,'+items+')" style="width:80px;  height:20px;"   placeholder="Quantity" required></td> ';

        html += '<td><input class="before_tax" name="totalprice[]" id="totalprice_'+items+'" style="width:100px;  height:20px;"   placeholder="Total Price" required readonly></td> ';

        html += '<td><input name="tax[]" id="tax_'+items+'" style="width:80px;  height:20px;"   placeholder="Tax" onkeyup="CalculateAfterTax(this.value,'+items+')" required></td> ';

        html += "<td> <input class='after_tax' required style='width:100px;  height:20px;' type='float' id='aftertax_"+items+"'  name='aftertax[]' placeholder='After Tax' required readonly></td>";

        html += "<td> <input  required style='width:80px;  height:20px;' type='float' id='discount_"+items+"'  name='discount[]' placeholder='Discount' required  oninput='CalculateAfterDiscount(this.value,"+items+")'></td>";

        html += "<td> <input class='afterDisc' required style='width:100px;  height:20px;' type='float' id='afterDiscount_"+items+"'  name='afterDiscount[]' placeholder='After Discount' required readonly></td>";

        
        html += '<td> <button style=" "  name="remove" class="btn btn-danger btn-sm remove" value="'+items+'" type="button"> X </button></td></div>';
        html += '<td class="col-md-2 "><input type="hidden" required name="categoryid[]" style="width:150px;" onchange="ChangeCatChangeItem(this.value,'+items+')" id="cat_id'+items+'"  class="item_cat" ></td>';


        html += "</tr>";
        
        
        document.getElementById("tbody").insertRow().innerHTML =html;
        $("#total_count").val(total_rows);
    }


    $(document).on('click','.remove',function()
    {
      debugger;
      var val = $(this).val();
      let afterDiscount = $("#afterDiscount_"+val).val();
      let total = $("#total").val();
      let newTotal = Number(total)-Number(afterDiscount);
      $("#total").val(newTotal);

      $(this).closest('tr').remove();
      total_rows=total_rows-1;
      $("#total_count").val(total_rows);
    });
  
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
                $('#item_list_'+td_id+'').html(result);
                $('#unit_price_'+td_id+'').val(0);
                $('#total_price_'+td_id+'').val(0);
                $('#rate_per_pack'+td_id+'').val(0);
            }
        
        }); 
    }

    function  CalculateItemTotalPrice(quantity,rowno)
    {
      let stock = Number($('#TotalStock_'+rowno+'').val());
      if (quantity > stock) {
        $('#quantity_'+rowno+'').val("")
        $('#totalprice_'+rowno+'').val("");
      }
      else{
        let unitprice=$('#unitprice_'+rowno+'').val();
        let totalprice=Number(unitprice)*Number(quantity);
        $('#totalprice_'+rowno+'').val(totalprice);
      }
    }

    function CalculateAfterTax(tax,rowno)
    {
      if(tax>100)
      {
        $('#tax_'+rowno+'').val(0);
      }
      else
      {
        let totalprice=$('#totalprice_'+rowno+'').val();
        let onepercent=Number(totalprice)/100;
        let taxamount=Number(onepercent)*Number(tax);
        let totalaftertax=Number(totalprice)+Number(taxamount);
        $('#aftertax_'+rowno+'').val(totalaftertax);
        calculate_before_tax();
      }
    }

    function CalculateAfterDiscount(discount,rowno)
    { 
      let totalprice=Number($('#aftertax_'+rowno+'').val());
      if(discount>totalprice)
      {
        $('#discount_'+rowno+'').val(0);
      }
      else
      {
        let totalafterDiscount=Number(totalprice)-Number(discount);
        $('#afterDiscount_'+rowno+'').val(totalafterDiscount);
        calculate_after_discount();
        CalculateGrandTotal();
      }
    }

    function CalculateGrandTotal(discount,rowno)
    { 
      let sum = 0;
      $(".afterDisc").each(function(){ 
        sum += +$(this).val() 
      });
      $('#total').val(sum);
      $('#paid').prop('readonly', false);
      $('#submit').prop('disabled', false);
    }


    function CalculateRemaining (discount,rowno)
    { 
      let total = $("#total").val();
      let paid = $("#paid").val();
      if(Number(paid) > Number(total)){
        $("#paid").val(0);
      }
      let remaining = Number(total) - Number(paid);
      $("#remaining").val(remaining);
    }

    function calculate_before_tax()
    {
      var sum = 0; 
      $(".before_tax").each(function(){ sum += +$(this).val() });
      $('#totalbeforetax').val(sum);
      calculate_after_tax();
    }
    function calculate_after_tax()
    {
      var sum = 0; 
      $(".after_tax").each(function(){ sum += +$(this).val() });
      $('#totalaftertax').val(sum);
    }

    function calculate_after_discount()
    {
      var sum = 0;
      let sum2 = 0; 
      $(".afterDisc").each(function(){ sum2 += +$(this).val() });
      $('#totalafterdiscount').val(sum2);
    }


    function get_stock(batchnumber,td_id)
    {
      //alert('hello');
        
        var warehouseid=$('#warehouseid').val();
        var _token = $('input[name="_token"]').val();
        debugger;
        $.ajax({
        url: "{{route('getstockondc.price')}}",
        method:'POST',
       // dataType:json,
        data:{ _token:_token,batchnumber:batchnumber,warehouseid:warehouseid},
        success:function(result)
        {
          debugger;
      //  alert(result);
            if(result.itemquantity)
            {
                $('#TotalStock_'+td_id+'').val(result.itemquantity);
                $('#TotalStock_'+td_id+'').val(result.itemname);
                $('#TotalStock_'+td_id+'').val(result.itemname1);
                $('#TotalStock_'+td_id+'').val(result.itemname2);
              
            }
            else
           {
               $('#TotalStock_'+td_id+'').val(0);
             }
        }
        
      }); 
    }
</script>

@endsection