@extends('layout.commonlayout')
@section('content')
{{-- form --}}
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title text-center">General  Voucher</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

    <div class="panel-body">
        {{-- @if(Session::has('SupplierAdded'))
        <script>
          swal("Great Job!","{!! Session::get('SupplierAdded') !!}","success",{
            button:"Cool",
          });
        </script>
        @endif --}}
        <form class="form-horizontal form-validate-jquery" action="{{url('/storegeneral')}}" method="post">
            @csrf
            <fieldset class="content-group">
                

            <div class="row">
            <div class="col-md-3">
<!--  -->
             <div class="form-group">
                    
<label>Date</label>
<input type="date" class="form-control" id="date_id" placeholder="Name" name="t_date" >

            </div>
<!--  -->
<!--  -->


</div>

<div class="form-group col-lg-3 ml-10">
    <label for="exampleInputEmail1">Select Project</label>
    <select  class="form-control" id="p_id" name="p_id" required>
        <option value="">None</option>
        
            <option >122 </option>
                                              
    </select>
</div>



<button type="Button" class="btn btn-primary" style=" margin:30px 10px 0px 30px" onclick="addItem();" name="newbooking">Add Entry</button>


 <hr>
 <form  method="post">	
    <div class="card-body table-responsive p-0" style="height: 300px;">
            <table class="table table-head-fixed text-nowrap">
              <thead>
                
              </thead>
              <tbody id="tbody">
                  <tr>
                  <th>Account Name</th>
                  <th>Description</th>
                  <th>Debit Amount</th>
                  <th>Credit Amount</th>
                  <th>Remove</th>
                </tr>
              </tbody>
            </table>
    </div>

  <div class="row">

    <div class="col-md-3"> 
    <div class="form-group">
            <label>Total Debit</label>
            <input type="number" readonly class="form-control" id="total_debit_id" value="0"  >
      </div> 
          <!-- /.col -->
    </div>
    <div class="col-md-3"> 
    <div class="form-group">
            <label>Total Credit</label>
            <input type="number" readonly class="form-control" id="total_credit_id" placeholder="0 Rupees" >
      </div> 
          <!-- /.col -->
    </div>
</div> <!-- *Row ends here** -->



<div class="col-lg-3">
    <button type="submit" class="btn btn-primary" style="" name="newentry">Save Entry</button>
</div>

</div>
    </div>
    </form>
    <div class="card-footer">
        <div class="row">
        
        </div>
        
                
      </div>

</div>
 




<!--  -->
{{-- <div class="col-md-4 ml-20"> --}}
<!--  -->
{{-- <div class="form-group"> --}}
                    
{{-- <label>Address</label>
<input type="text"   name="address" class="form-control" required="">                         
                     
</div> --}}
<!--  -->
<!--  -->


{{-- </div> --}}
<!--  -->
<!--  -->
{{-- <div class="col-md-4 ml-20"> --}}
<!--  -->
{{-- <div class="form-group"> --}}
                    
{{-- <label>Province</label>
<input type="text"   name="province" class="form-control" required="">                         
                     
</div> --}}
<!--  -->
<!--  -->


{{-- </div> --}}
<!--  -->

{{-- </div> --}}
<!-- row 1 end -->

<!-- row 2 start -->
{{-- <div class="row"> --}}

{{-- <div class="col-md-3"> --}}
<!--  -->
{{-- <div class="form-group"> --}}
                    
{{-- <label>City</label>
<input type="text"   name="city" class="form-control" required="">                         
                     
</div> --}}
<!--  -->
<!--  -->


{{-- </div> --}}
<!--  -->
{{-- <div class="col-md-4 ml-20"> --}}
<!--  -->
{{-- <div class="form-group"> --}}
                    
{{-- <label>Country</label>
<input type="text"   name="country" class="form-control" required="">                         
                     
</div> --}}
<!--  -->
<!--  -->


{{-- </div> --}}
<!--  -->
{{-- <div class="col-md-4 ml-20"> --}}
    <!--  -->
    {{-- <div class="form-group"> --}}
                        
    {{-- <label>Email</label>
    <input type="email"   name="email" class="form-control" required="">                         
                         
    </div> --}}
    <!--  -->
    <!--  -->
    
    
    {{-- </div> --}}

{{-- </div> --}}
<!-- row 2 end -->

<!-- row 3 start -->
{{-- <div class="row">


<!--  -->
<div class="col-md-3">
<!--  -->
<div class="form-group">
                    
<label>Contact Number</label>
<input type="text"   name="contact" class="form-control" required="">                         
                     
</div>
<!--  -->
<!--  -->


</div>
<!--  -->
<!--  -->
<div class="col-md-4 ml-20">
    <!--  -->
    <div class="form-group">
                        
    <label>Company Landline</label>
    <input type="text"   name="companylandline" class="form-control" required="">                         
                         
    </div>
    <!--  -->
    <!--  -->
    
    
    </div>
    <!-- NTN -->
<div class="col-md-4 ml-20">
    <!--  -->
    <div class="form-group">
                        
    <label>NTN</label>
    <input type="text" name="ntn" class="form-control">                         
                         
    </div>
    <!--  -->
    <!--  -->
    
    
    </div>
    <!-- /NTN -->

</div> --}}
<!-- row 3 end -->

<!-- row 4 start -->
{{-- <div class="row">



<!-- STN -->
<div class="col-md-3 ">
<!--  -->
<div class="form-group">
                    
<label>STN</label>
<input type="text" name="stn" class="form-control">                         
                     
</div>
<!--  -->
<!--  -->


</div>
<!-- /STN -->
<!-- Previous Balance -->
<div class="col-md-4 ml-20">
<!--  -->
<div class="form-group">
                    
<label>Previous Balance</label>
<input type="text" name="previousbalance" class="form-control">                         
                     
</div>
<!--  -->
</div>
</div> --}}
<!-- row 4 end -->


            {{-- </fieldset> --}}

            {{-- <div class="text-right"> --}}
                
                {{-- <button type="submit" name="vendor_insert" class="btn btn-primary">Submit</button> --}}
            {{-- </div> --}}
        </form>
<div class="modal fade" id="MyModal" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:750px;">
        <div class="modal-content" >
        <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel" style="display:inline; text-align:left;">Add New Account</h4>
            <span style="display:inline; text-align:right;" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">&times;</span>
        </div>
        <div class="modal-body" id="modal-form" >
            <form method="POST" action="ajax/accounts/ajax_create_account.php">
                <div class ="row" >
                    <div class="form-group col-lg-6">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" name="acc_name" id="acc_name"  placeholder="Account name" required>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="exampleInputEmail1">Description</label>
                        <input type="text" class="form-control" name="acc_description" id="acc_description"  placeholder="Account description" required >
                    </div>
                </div>

                <div class ="row" >
                    <div class="form-group col-lg-6">
                        <label for="exampleInputEmail1">Group</label>
                        <select  class="form-control" id="debit_account_group" onchange="fill_sub_group();" name="account_group">
                           
                                <option >1 </option>
                                                                
                        </select>
                    </div>

                   
                    <div class="form-group col-lg-6" >
                        <label for="exampleInputEmail1">Sub Group</label>
                        <div id="debit_account_sub_group-2">
                        <input type="text" class="form-control" name="acc_description"   placeholder="Select Main Account" required >
                        </div>
                    </div>
                    <div class="form-group col-lg-6">
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary add_account_button">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
                
            </form>
           
        </div> 

        
        </div>
    
    </div>
</div>

<script>
var total_rows=0;
var items=0;
function addItem()
{

          total_rows++;
            items++;
            var date_id=  document.getElementById("date_id").value;
            var p_id=  document.getElementById("p_id").value;
            // var debit=  document.getElementById("debit_id_"+temp).value;

                html = '<td > <select  name="a_id[]" id="a_id_'+items+'" onchange="nameDropDownFunc('+items+')" class="form-control select2 consignment_id" > <option value="">Select Cat</option>@foreach ($account as $act)<option value="{{$act->a_id}}">{{$act->name}} | {{$act->account_group_name}} | {{$act->account_sub_group_name}}</option>@endforeach</td>';         
                html +=  "<td visibility: hidden> <input type='hidden' id='date_id_"+items+"' name='t_date[]' ></td>";
                html +=  "<td visibility: hidden> <input  type='hidden' id='p_id"+items+"' name='p_id[]' ></td>";
                html +=  "<td > <input  type='text' class='form-control' placeholder='write description' id='description_id_"+items+"' name='descrip[]' ></td>";
                html +=  "<td> <input  type='text' class='form-control' onblur='calDebit("+items+");' placeholder='debit amont'  id='debit_id_"+items+"' name='debit[]' ></td>";
                html +=  "<td> <input  type='text' class='form-control' onblur='calCredit("+items+");' placeholder='Enter credit amount' id='credit_id_"+items+"' name='credit[]' ></td>";
                html += '<td> <button name="remove" class="btn btn-danger btn-sm remove"> X </button></td>';
                html += "</tr>";
                
                document.getElementById("tbody").insertRow().innerHTML =html;
              //  $("#total_count").val(total_rows);

                     $("#date_id_"+items).val(date_id);
                    // $("#vouchernumber_id_"+items).val(vouchernumber);
                     $("#p_id"+items).val(p_id);
                    
                

       
          
            // End of ajax file
            
        
               
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

function addItem2()
        {
          var id=  $(document).getElementById("test").val;
          alert(id);

            total_rows++;
            items++;
            
                html = '<td > <select  name="consigment_no[]" id="consigment_no'+items+'" onchange="nameDropDownFunc('+items+')" class="form-control select2 consignment_id" > <option value="">Select Cat</option></td>';
                html += "<td> <input id='origin_"+items+"'   name='TotalStock[]' ></td>";
                html += "<td> <input id='destination_"+items+"' ></td>";
                html += "<td> <input id='date_"+items+"'  onkeyup='getPrice("+items+")'></td>";
                html += '<td> <button name="remove" class="btn btn-danger btn-sm remove"> X </button></td>';
                html += "</tr>";
                
                document.getElementById("tbody").insertRow().innerHTML =html;
                $("#total_count").val(total_rows);
               
        }


</script>
{{-- form --}}
@endsection