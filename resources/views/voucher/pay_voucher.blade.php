@extends('layout.commonlayout')
@section('content')
{{-- form --}}
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title text-center">Payment Voucher</h5>
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
        <form class="form-horizontal form-validate-jquery" action="{{url('/CreateAccountAccReceipt')}}" method="post">
            @csrf
            <fieldset class="content-group">
                

            <div class="row">
<div class="col-md-3">
<!--  -->
<div class="form-group">
                    
<label>Date</label>
<input type="date" class="form-control" id="date_selected" placeholder="Name" name="t_date" required >
                     
</div>
<!--  -->
<!--  -->


</div>
<div class="col-md-3">
    <label for="exampleInputEmail1">Select Credit account</label>
    <select  class="form-control" id="a_id" name="credit_a_id" >
        < @foreach ($data as $act)
        <option value="{{$act->a_id}}">{{$act->name}} | {{$act->account_group_name}} | {{$act->account_sub_group_name}}</option>
    @endforeach     </select>
</div>



<div class=" col-md-4">
    <label for="exampleInputEmail1">Select Debit account</label>
    <select  class="form-control" id="a_id" name="debit_a_id" required>
        <option>none</option>
        @foreach ($account as $act)
        <option value="{{$act->a_id}}">{{$act->name}} | {{$act->account_group_name}} | {{$act->account_sub_group_name}}</option>
        @endforeach                                      
    </select>
</div>
<div class="form-group col-lg-2" style="margin-top:32px;">
    <button type="button" class="btn btn-primary" style="color:white;"  data-target="#MyModal" data-toggle="modal" >+ New Account</button>
</div>

<div class="col-md-5">
    <div class="form-group">
    <label>Description</label>  
    <input type="Text" class="form-control" id="contact" placeholder="Description" name="description" style="color:blue" >
</div>
 </div>

 <div class="col-md-3 ml-20">
    <div class="form-group">
    <label>Amount</label>
    <input type="number" class="form-control" id="" placeholder="" name="amount" required>
    </div>

</div>



<div class="card-footer">
    <button type="submit" style="margin-top:90px;" class="btn btn-primary" name="" >Add payment</button>
    </div>
<!--  -->
<!--  -->
<!--  -->
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


          
        </form>
    </div>
</div>



{{-- modal --}}
<div class="modal fade" id="MyModal" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:750px;">
        <div class="modal-content" >
        <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel" style="display:inline; text-align:left;">Add New Account</h4>
            <span style="display:inline; text-align:right;" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">&times;</span>
        </div>
        <div class="modal-body" id="modal-form" >
            <form method="POST" action="{{url('/CreateAccountAccReceipt')}}">
                @csrf
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
                        <select  class="form-control" id="debit_account_group" name="account_group" onchange="fill_sub_group(this.value)">
                            
                                <option value="">Select Group</option>
                                @foreach ($account_group as $account_gr )
                                    <option value="{{$account_gr->account_group_id}}">{{$account_gr->account_group_name}}</option>
                                @endforeach
                                                                 
                        </select>
                    </div>

                    <div class="form-group col-lg-6" >
                        <label for="exampleInputEmail1">Sub Group</label>
                        <select  class="form-control" name="account_sub_group" id="account_sub_group">
                            <option value="">Select Main Group</option>
                        </select>
                        {{-- <div id="debit_account_sub_group-2">
                        <input type="text" class="form-control" name="acc_description"   placeholder="Select Main Account" required >
                        </div> --}}
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
{{-- /modal --}}

<script>
    function fill_sub_group(account_group_id)
    {
        var _token = $('input[name="_token"]').val();
                    $.ajax({
                    url: "{{ route('getSubGroupAccounts.get')}}",
                    method:'POST',
                    data:{ _token:_token,account_group_id:account_group_id},
                    success:function(result)
                    {
                       $('#account_sub_group').html(result);

                    }
                    
                }); 
    }
    </script>

{{-- form --}}
@endsection