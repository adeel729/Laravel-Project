@extends('layout.commonlayout')
@section('content')
{{-- form --}}
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title text-center">General Entries List</h5>
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
        <form class="form-horizontal form-validate-jquery" action="{{url('/storepaymentvoucher')}}" method="post">
            @csrf
            <fieldset class="content-group">
                

            <div class="row">
<div class="col-md-3">
<!--  -->
<div class="form-group">
                    
    <label>Start Date</label>
    <input type="date" class="form-control" id="start_date_id" placeholder="Start Date" name="branchName" >
                    
</div>
<!--  -->
<!--  -->


</div>
<div class="col-md-3 ml-20">
    <!--  -->
    <div class="form-group">
                        
        <label>End Date</label>
        <input type="date" class="form-control" id="end_date_id" placeholder="End Date" name="branchName" >
                    
    </div>
    
    </div>


    <div class="col-lg-4 col-md-4 ml-20`    "  >
        <div class="form-group" style="margin-top:26px; ">
            <button type="button" class="btn btn-primary" style="width:50%;"  onclick="manifestList();"  >Filter Record</button>
        </div>
        </div>

        <div class="col-lg-12 col-md-12">
            <div class="form-group">
                <input type="text" class="form-control" id="voucher_id" onblur="search_by_voucher()" style="color:red" placeholder="Enter Voucher Number To Search And Press TAB Key" name="branchName" >
              </div>
            </div>






    
    



 



<div class="card-footer">
    <button type="button" class="btn btn-primary" style="width:50%;"  onclick="searchAllRec();"  >View All Record</button>
</div>

        </form>
    </div>
</div>
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title text-center">General Entries List</h5>
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
                <th>ID</th>
                <th>Origin</th>
                <th>Destination</th>
                <th>Driver</th>
                <th>Van</th>
                <th>Date</th>
                <th>Status</th>
                <th>View</th>
            
            </tr>
        </thead>
        <tbody>
            
            {{-- @foreach($quotations as $row) --}}
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            {{-- @endforeach   --}}

        </tbody>
    </table>
</div>
<div class="modal fade" id="MyModal" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:750px;">
      <div class="modal-content" >
        <div class="modal-header bg-danger">
          <h4 class="modal-title" id="exampleModalLabel" style="display:inline; text-align:left;">Update General Entry</h4>
          <span style="display:inline; text-align:right;" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">&times;</span>
        </div>
        <div class="modal-body" id="modal-form" >
        <div class="col-md-12">
            <div class="form-group">
                 
                 <input type="text" class="form-control" id="row_id" placeholder="" name="id" >
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Amount Paid</label>
                <input type="text" class="form-control" id="paid_id" placeholder="RS" name="max" >
            </div>
  
        </div>
  
        </div> 
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary update_button" name="" id='update_button' onclick="updatepayment();">Save changes</button>
        </div>
      </div>
    
    </div>
  </div> 

  <script>
    function manifestList()
{
    
    var start_date = document.getElementById("start_date_id").value;
    var end_date = document.getElementById("end_date_id").value;
    
    
    $.ajax({
        url: "ajax/accounts/view_gl_entries_ajax.php",
        type: "POST",
        data: {start_date:start_date,end_date:end_date},
        success: function(result){
         console.log(result);
        $("#dtBasicExample").html(result);
        
    }});
}
function delete_entry(entry){
  $.ajax({
        url: "ajax/accounts/del_general_entry_ajax.php",
        type: "POST",
        data: {id:entry},
        success: function(result){
         console.log(result);
         alert(result);
         location.reload();
        
    }});

}

function search_by_voucher()
{
  
    var voucher_no = document.getElementById("voucher_id").value;
  //  alert(voucher_no);
    
    $.ajax({
        url: "ajax/accounts/voucher_no_gl_search_ajax.php",
        type: "POST",
        data: {voucher_no:voucher_no},
        success: function(result){
         console.log(result);
        $("#dtBasicExample").html(result);
        
    }});
}

function searchAllRec()
{
  var id=1;
  $.ajax({
        url: "ajax/accounts/all_voucher_gl_search_ajax.php",
        type: "POST",
        data: {id:id},
        success: function(result){
         console.log(result);
        $("#dtBasicExample").html(result);
        
    }});
}

</script>
{{-- form --}}
@endsection