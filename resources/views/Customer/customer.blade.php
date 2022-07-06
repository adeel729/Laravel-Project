@extends('layout.commonlayout')
@section('content')
{{-- Form --}}
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title text-center">Add Customer</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

    <div class="panel-body">
        @if(Session::has('CustomerAdded'))
        <script>
          swal("Great Job!","{!! Session::get('CustomerAdded') !!}","success",{
            button:"Cool",
          });
        </script>
        @endif
        <form class="form-horizontal form-validate-jquery" action="{{url('/customer')}}" method="post">
            <fieldset class="content-group">
                
@csrf
            <!-- row 1 start -->
<div class="row ">

<div class="col-md-2 ml-20">
<!--  -->
<div class="form-group">
                    
<label>Customer Name</label>
<input type="text" name="name"  class="form-control" required="">                         
                     
</div>
<!--  -->
<!--  -->


</div>
<!--  -->
<div class="col-md-2 ml-20">
<!--  -->
<div class="form-group">
                    
<label>Address</label>
<input type="text"   name="address" class="form-control" required="">                         
                     
</div>
<!--  -->
<!--  -->
</div>
<!--  -->
<div class="col-md-2 ml-20">
<!--  -->
<div class="form-group">
                    
<label>Province</label>
<input type="text"   name="province" class="form-control" required="">                         
                     
</div>
<!--  -->
</div>
<!--  -->
<div class="col-md-2 ml-20">
<!--  -->
<div class="form-group">
                    
<label>City</label>
<input type="text"   name="city" class="form-control" required="">                         
                     
</div>
<!--  -->
<!--  -->
</div>
<!--  -->
<div class="col-md-2 ml-20">
<!--  -->
<div class="form-group">
                    
<label>Contact Person Name</label>
<input type="text"   name="contactperson" class="form-control" required="">                         
                     
</div>
<!--  -->
<!--  -->
</div>
<!--  -->
</div>
<!-- row 1 end -->

<!-- row 2 start -->
<div class="row">

<div class="col-md-2 ml-20">
<!--  -->
<div class="form-group">
                    
<label>Contact Person Cell</label>
<input type="text"   name="contactperson" class="form-control" required="">                         
                     
</div>
<!--  -->
<!--  -->


</div>

<div class="col-md-2 ml-20">
<!--  -->
<div class="form-group">
                    
<label>Email</label>
<input type="email"   name="contactpersonemail" class="form-control" required="">                         
                     
</div>
<!--  -->
<!--  -->


</div>
<!--  -->
<!-- ntn -->
<!--  -->
<div class="col-md-2 ml-20">
<!--  -->
<div class="form-group">
                    
<label>NTN</label>
<input type="text"   name="ntn" class="form-control" required="">                         
                     
</div>
<!--  -->
<!--  -->


</div>
<!--  -->
<!-- end ntn -->
<!-- stn -->
<!--  -->
<div class="col-md-2 ml-20">
<!--  -->
<div class="form-group">
                    
<label>STN</label>
<input type="text"   name="stn" class="form-control" required="">                         
                     
</div>
<!--  -->
<!--  -->


</div>
<!--  -->
<!--  -->
<div class="col-md-2 ml-20">
<!--  -->
<div class="form-group">
                    
<label>Customer Landline</label>
<input type="text"   name="landlinecustomer" class="form-control" required>                         
                     
</div>
<!--  -->
<!--  -->


</div>
<!--  -->
<!-- end stn -->

    <!--  -->
    <!-- end Credit Time -->
</div>
<!-- row 2 end -->

<!-- row 3 start -->


<!-- row 4 start -->
<div class="row">

<!--  -->
<div class="col-md-2 ml-20">

    <div class="form-group">
                    
        <label>Previous Balance</label>
        <input type="text"   name="prevoius_balance" class="form-control" required>                         
                             
        </div>

</div>
<!-- row 4 end -->
</div>


            

            </fieldset>

            <div class="text-right">
                
                <button type="submit"  class="btn btn-primary">Submit </button>
            </div>
        </form>
    </div>
</div>
{{-- / Form --}}
@endsection