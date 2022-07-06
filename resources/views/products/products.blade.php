@extends('layout.commonlayout')
@section('content')

<p>
    {{-- Button For Cateogary  --}}
<button type="button" class="btn btn-danger btn-rounded btn-lg" data-toggle="modal" data-target="#cateogarymodal"><i class="icon-plus3 position-left"></i> Add Cateogary</button>
    {{-- End Button For Cateogary  --}}
    {{-- button item --}}
    <button type="button" class="btn btn-danger btn-rounded btn-lg" data-toggle="modal" data-target="#unitsmodal"><i class="icon-plus3 position-left"></i> Add Units</button>
    {{--End Item Button--}}
    {{-- button item --}}
    <button type="button" class="btn btn-danger btn-rounded btn-lg" data-toggle="modal" data-target="#subunitsmodal"><i class="icon-plus3 position-left"></i> Add Sub Units</button>
    {{--End Item Button--}}
    {{-- button item --}}
<button type="button" class="btn btn-danger btn-rounded btn-lg" data-toggle="modal" data-target="#itemmodal"><i class="icon-plus3 position-left"></i> Add Items</button>
    {{--End Item Button--}}
    
</p>
{{-- sweet Alert for category--}}
@if(Session::has('CateogaryAdded'))
<script>
  swal("{!! Session::get('CateogaryAdded') !!}",{
    button:"OK",
  });
</script>
@endif
{{-- /sweet Alert for category --}}
{{-- sweet Alert for item--}}
@if(Session::has('ItemAdded'))
<script>
  swal("{!! Session::get('ItemAdded') !!}",{
    button:"OK",
  });
</script>
@endif
{{-- /sweet Alert for item --}}
{{-- sweet Alert for unit--}}
@if(Session::has('UnitsAdded'))
<script>
  swal("{!! Session::get('UnitsAdded') !!}",{
    button:"OK",
  });
</script>
@endif
{{-- /sweet Alert for unit --}}
{{-- model cateogary--}}
					<div id="cateogarymodal" class="modal fade">
						<div class="modal-dialog">
							<div class="modal-content text-center">
								<div class="modal-header">
									<h5 class="modal-title">Add Cateogary</h5>
								</div>

								<form action="{{url('/category')}}" class="form-inline" method="POST" id="categoryform">
                                    @csrf
									<div class="modal-body">
										<div class="form-group has-feedback">
											{{-- <label>Cateogary Name </label> --}}
											<input type="text" placeholder="Cateogary Name" id="categoryname" name="categoryname" class="form-control">
										</div>
									</div>

									<div class="modal-footer text-center">
										<button type="submit" class="btn btn-primary">Insert</button>
									</div>
								</form>
							</div>
						</div>
					</div>
{{-- /model cateogary --}}
{{-- model item--}}
<div id="itemmodal" class="modal fade">
    <div class="modal-dialog modal-full">
        <div class="modal-content text-center">
            <div class="modal-header">
                <h5 class="modal-title">Add Item</h5>
            </div>

            <form action="{{url('/item')}}" class="form-inline" method="POST" id="itemform">
                @csrf
                <div class="modal-body">
                    {{-- category --}}
                    <div class="row">
                        <div class="col-lg-2 ">
                            <div class="form-group">
                                <select class="form-control" name="categoryid" id="categoryiditemmodal" >
                                <option value=""> &nbsp; &nbsp; &nbsp;  &nbsp;  &nbsp; &nbsp;Select Cat &nbsp; &nbsp; &nbsp;  &nbsp;  &nbsp; &nbsp;</option>
                                @foreach($cateogaries as $cat)
                                <option value="{{$cat->categoryid}}">{{$cat->categoryname}}</option>
                                @endforeach
                                </select>
                              </div>
                        </div> 
                        <div class="col-lg-2   ">
                            <div class="form-group" >
                                <input type="text" name="itemname" id="itemname" class="form-control" placeholder="Item Name">
                             </div>
                        </div>
                        <div class="col-lg-2   ">
                            <div class="form-group"  >
                                <input type="text" name="make" id="itemname" class="form-control" placeholder="Make">
                             </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input type="text" name="catalognumber" id="catalognumber" class="form-control" placeholder="Catalog Numbers">
                             </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input type="text" name="minimumlevel" id="minimumlevel" class="form-control" placeholder="Minimum Level">
                             </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group"  >
                                <input type="text" name="certification" id="certification" class="form-control" placeholder="Certifications Held">
                             </div>
                        </div>
                        
                    </div>
              
                    <div class="row mt-10">
                        
                        <div class="col-lg-2">
                            <div class="form-group" >
                                <select class="form-control" name="unitid" id="unitid2" onchange="getUnitChild(this.value)" required> 
                                <option value="">&nbsp; &nbsp; &nbsp;  &nbsp;  &nbsp; &nbsp; Select Unit &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; </option>
                                @foreach($unit as $unit1)
                                <option value="{{$unit1->unitid}}">  {{$unit1->unitname}}  </option>
                                @endforeach
                                </select>
                              </div>
                        </div>
                        
                        <div class="col-lg-2">
                            <div class="form-group" >
                                <select class="form-control" name="unit_Child" id="unit_Child" required> 
                                <option value=""> &nbsp;   &nbsp; &nbsp; &nbsp; Select Sub Unit   &nbsp;   &nbsp; &nbsp;</option>
                                
                                </select>
                              </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <textarea name="discription" class="form-control" id="discription" cols="22" rows="2" placeholder="Discription"></textarea>
                              </div>
                        </div>
                    
                    </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-20">Insert</button> <br/><br/>
                </div>

                <div class="modal-footer text-center">
                </div>
            </form>
        </div>
    </div>
</div>
{{-- /model item --}}
{{-- model units--}}
<div id="unitsmodal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content text-center">
            <div class="modal-header">
                <h5 class="modal-title">Add Unit</h5>
            </div>

            <form action="{{url('/unit')}}" class="form-inline" method="POST" id="unitsform">
                @csrf
                <div class="modal-body">
                    <div class="form-group has-feedback">
                        {{-- <label>Cateogary Name </label> --}}
                        <input type="text" placeholder="Unit Name" id="unitname" name="unitname" class="form-control">
                    </div>
                </div>

                <div class="modal-footer text-center">
                    <button type="submit" class="btn btn-primary">Insert</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- /model item --}}
{{-- model units--}}
<div id="subunitsmodal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content text-center">
            <div class="modal-header">
                <h5 class="modal-title">Add Sub Unit</h5>
            </div>

            <form action="{{url('/addSubUnit')}}" class="form-inline" method="POST" id="unitsform">
                @csrf
                <div class="modal-body">
                    <div class="form-group has-feedback">
                        <select class="form-control" name="unitid" id="unitid" > 
                            <option value=""> Select Unit  </option>
                            @foreach($unit as $unit2)
                            <option value="{{$unit2->unitid}}">&nbsp; &nbsp; &nbsp; &nbsp;   {{$unit2->unitname}}   &nbsp; &nbsp; </option>
                            @endforeach
                            </select>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="number" placeholder="Sub Unit Name" id="" name="name" class="form-control">
                    </div>
                </div>

                <div class="modal-footer text-center">
                    <button type="submit" class="btn btn-primary">Insert</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- /model units --}}
{{-- Script --}}
<script>
 function getUnitChild(unitID){
    debugger;
    $.ajax({
    url: "{{route('getUnitChildren')}}",
    method:'get',
    data:{ unitID:unitID},
    success:function(result)
    {
        let id = 0;
        let name = 0;
        $.each(result, function(index) {
            name = result[index].name;
           $('#unit_Child').append('<option value="'+name+'">'+name+'</option>');
        
        });
    }
    
   });
 }
</script>
{{-- /Script --}}
@endsection