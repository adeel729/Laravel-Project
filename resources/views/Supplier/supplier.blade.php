@extends('layout.commonlayout')
@section('content')
{{-- form --}}
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title text-center">Add Supplier</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

    <div class="panel-body">
        @if(Session::has('SupplierAdded'))
        <script>
          swal("Great Job!","{!! Session::get('SupplierAdded') !!}","success",{
            button:"Cool",
          });
        </script>
        @endif
        <form class="form-horizontal form-validate-jquery" action="{{url('/supplier')}}" method="post">
            @csrf
            <fieldset class="content-group">
                

            <div class="row">
<div class="col-md-3">
<!--  -->
<div class="form-group">
                    
<label>Supplier Name</label>
<input type="text" name="name" class="form-control" required>                         
                     
</div>
<!--  -->
<!--  -->


</div>
<!--  -->
<div class="col-md-4 ml-20">
<!--  -->
<div class="form-group">
                    
<label>Address</label>
<input type="text"   name="address" class="form-control" required="">                         
                     
</div>
<!--  -->
<!--  -->


</div>
<!--  -->
<!--  -->
<div class="col-md-4 ml-20">
<!--  -->
<div class="form-group">
                    
<label>Province</label>
<input type="text"   name="province" class="form-control" required="">                         
                     
</div>
<!--  -->
<!--  -->


</div>
<!--  -->

</div>
<!-- row 1 end -->

<!-- row 2 start -->
<div class="row">

<div class="col-md-3">
<!--  -->
<div class="form-group">
                    
<label>City</label>
<input type="text"   name="city" class="form-control" required="">                         
                     
</div>
<!--  -->
<!--  -->


</div>
<!--  -->
<div class="col-md-4 ml-20">
<!--  -->
<div class="form-group">
                    
<label>Country</label>
<input type="text"   name="country" class="form-control" required="">                         
                     
</div>
<!--  -->
<!--  -->


</div>
<!--  -->
<div class="col-md-4 ml-20">
    <!--  -->
    <div class="form-group">
                        
    <label>Email</label>
    <input type="email"   name="email" class="form-control" required="">                         
                         
    </div>
    <!--  -->
    <!--  -->
    
    
    </div>

</div>
<!-- row 2 end -->

<!-- row 3 start -->
<div class="row">


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

</div>
<!-- row 3 end -->

<!-- row 4 start -->
<div class="row">



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
</div>
<!-- row 4 end -->


            </fieldset>

            <div class="text-right">
                
                <button type="submit" name="vendor_insert" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
{{-- form --}}
@endsection