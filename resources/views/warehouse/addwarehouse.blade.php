@extends('layout.commonlayout')
@section('content')
{{-- form --}}
{{-- form --}}
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title text-center">Add Warehouse</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
    @if(Session::has('WareHouseAdded'))
    <script>
      swal("Great Job!","{!! Session::get('WareHouseAdded') !!}","success",{
        button:"Cool",
      });
    </script>
    @endif
    <div class="panel-body">
        
        <form class="form-horizontal form-validate-jquery" action="{{url('/warehouse')}}" method="post">
           @csrf
            <fieldset class="content-group">
                <!-- row initial -->
                <div class="row">
                    <!--  Ware House -->
<div class="col-md-2 ml-20">
<div class="form-group">
<label>WareHouse Name</label>
<input type="text" name="warehousename" id="warehousename" class="form-control">
</div>

</div>
<!-- end ware house -->

<!--Catalog number -->
<div class="col-md-2 ml-20">
    <div class="form-group">
    <label>Warehouse City</label>
    <input type="text"  name="warehousecity" id="warehousecity" class="form-control" required>
                            
    </div>
    </div>
    <!-- /catalog number-->
    <!-- Serial number div start -->
<div class="col-md-2 ml-20">
    <div class="form-group">
    <label>WareHouse Area</label>
    <input type="text"  name="warehousearea" id="warehousearea" class="form-control" required>
                            
    </div>
    </div>
    <!-- serial number div end -->
    <!-- Serial number div start -->
<div class="col-md-4 ml-20">
    <div class="form-group">
    <label>WareHouse Address</label>
    <input type="text"  name="warehouseaddress" id="warehouseaddress" class="form-control" required>               
    </div>
    </div>
    <!-- serial number div end -->
                </div>
            

            

            </fieldset>

            <div class="text-right">
                <button type="submit"  class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
{{-- /form --}}
@endsection