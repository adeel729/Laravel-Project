@extends('layout.commonlayout')
@section('content')
{{-- Form --}}
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title text-center">Item Detail</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

    <div class="panel-body">

            <fieldset class="content-group">
                

            <!-- row 1 start -->
<div class="row ">
    {{--  --}}
<div class="col-md-3">
    <div class="form-group">
        <label for="">Supplier Name</label>
        <input type="text" class="form-control" value="{{$itemdetails[0]->suppliername}}"readonly>
    </div>
</div>
{{--  --}}
    {{--  --}}
    <div class="col-md-3">
        <div class="form-group">
            <label for="">Category Name</label>
            <input type="text" class="form-control" value="{{$itemdetails[0]->categoryname}}" readonly>
        </div>
    </div>
    {{--  --}}
        {{--  --}}
<div class="col-md-3">
    <div class="form-group">
        <label for="">Item Name</label>
        <input type="text" class="form-control" value="{{$itemdetails[0]->itemname}}" readonly>
    </div>
</div>
{{--  --}}
                    {{--  --}}
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="">Catalog Number</label>
                            <input type="text" class="form-control" value="{{$itemdetails[0]->catalognumber}}" readonly>
                        </div>
                    </div>
                    {{--  --}}
</div>
<!-- row 1 end -->
            <!-- row 2 start -->
            <div class="row ">
                {{--  --}}
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Unit Price</label>
                    <input type="text" class="form-control" value="{{$itemdetails[0]->unitprice}}" readonly>
                </div>
            </div>
            {{--  --}}
                {{--  --}}
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Quantity</label>
                        <input type="text" class="form-control" value="{{$itemdetails[0]->quantity}}" readonly>
                    </div>
                </div>
                {{--  --}}
                    {{--  --}}
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Purchase Date</label>
                    <input type="text" class="form-control" value="{{$itemdetails[0]->purchasedate}}" readonly>
                </div>
            </div>
            {{--  --}}
                                {{--  --}}
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Expiry Date</label>
                                        <input type="text" class="form-control" value="{{$itemdetails[0]->expirydate}}" readonly>
                                    </div>
                                </div>
                                {{--  --}}
            
            </div>
            <!-- row 2 end -->
            

</div>
{{-- / Form --}}
@endsection