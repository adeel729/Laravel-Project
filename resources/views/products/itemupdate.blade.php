@extends('layout.commonlayout')
@section('content')




<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title text-center">Update Item</h5>
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
        <form action="{{url('/item/'.$itemdetails[0]->itemid)}}" class="form-horizontal" method="POST" id="itemform">
            @csrf
            @method('PUT')
            <div class="modal-body">
                {{-- category --}}
        
          <div class="row">
              <div class="col-sm-6 col-md-6-lg-6">
                  <div class="form-group">
                    <label for="">Select Category</label>
                    <select name="cat_id" id="" class="form-control">
                      <option value="{{$itemdetails[0]->categoryid}}">{{$categoryname['categoryname']}}</option>
                      @foreach($cateogaries as $cat)
                      <option value="{{$cat->categoryid}}">{{$cat->categoryname}}</option>
                      @endforeach
                    </select>
                  </div>
              </div>
              <div class="col-sm-6 col-md-6-lg-6">
                  <div class="form-group">
                    <label for="">Item Name</label>
                    <input type="text" name="itemname" id="itemname" class="form-control" value="{{$itemdetails[0]->itemname}}" placeholder="Item Name">
                  </div>
              </div>

              <div class="col-sm-6 col-md-6-lg-6">
                <div class="form-group">
                    <label for="">Make</label>
                    <input type="text" name="make" id="itemname" class="form-control" value="{{$itemdetails[0]->make}}" placeholder="Make">
                </div>
            </div>

            <div class="col-sm-6 col-md-6-lg-6">
                <div class="form-group">
                    <label for="">Catalog Number</label>
                    <input type="text" name="catalognumber" id="catalognumber" value="{{$itemdetails[0]->catalognumber}}" class="form-control" placeholder="Catalog Numbers">
                </div>
            </div>
            <div class="col-sm-6 col-md-6-lg-6">
                <div class="form-group">
                    <label for="">Mnimum Level</label>
                    <input type="text" name="minimumlevel" id="minimumlevel" value="{{$itemdetails[0]->minimumlevel}}" class="form-control" placeholder="Minimum level">
                </div>
            </div>

            <div class="col-sm-6 col-md-6-lg-6">
              <div class="form-group">
                <label for="">Select Unit</label>
                <select name="unit_id" id="" class="form-control">
                  <option value="{{$itemdetails[0]->unitid}}">{{$unitname['unitname']}}</option>
                  @foreach($unit as $unit)
                  <option value="{{$unit->unitid}}">{{$unit->unitname}}</option>
                  @endforeach
                </select>
              </div>
          </div>
          </div>

          <div class="row">
           

            <div class="col-sm-12 col-md-6-lg-4">
              <div class="form-group">
                <label class="">Discription</label>
                <textarea name="discription" class="form-control" id="discription" cols="20" rows="4">{{$itemdetails[0]->discription}}</textarea>
              </div>
          </div>

        
          
        </div>
                 {{-- end category --}}
               
                   
          
                </div>
                <button type="submit" class="btn btn-primary mt-20">Update</button> <br/><br/>
            </div>
        
            <div class="modal-footer text-center">
            </div>
        </form>
   
    </div>
</div>





@endsection