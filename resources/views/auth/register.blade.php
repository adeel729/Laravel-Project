@extends('layout.commonlayout')
@section('content')
@if(Session::has('UserAdded'))
<div class="alert alert-info alert-bordered alert-rounded">
      <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
      <span class="text-semibold">Done!</span> {{Session::get('UserAdded')}}
</div> 
@elseif(Session::has('UserAdditionFailed'))
<div class="alert alert-danger alert-bordered alert-rounded">
      <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
      <span class="text-semibold">Error!</span> {{Session::get('UserAdditionFailed')}}
</div>
@endif
<!-- Content area -->
<div class="content">

      <!-- Registration form -->
      <form action="{{route('storeuser.todb')}}" method="post">
            @csrf
            <div class="row">
                  <div class="col-sm-12">
                        <div class="panel registration-form">
                              <div class="panel-body">
                                    <div class="text-center">
                                          <div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
                                          <h5 class="content-group-lg">Create account <small class="display-block">All fields are required</small></h5>
                                    </div>
                                          <div class="row">
                                                <div class="col-sm-6">
                                                      <div class="form-group has-feedback">
                                                            <input type="text" name="username" class="form-control" placeholder="Choose username" value="{{old('username')}}">
                                                            <div class="form-control-feedback">
                                                                  <i class="icon-user-plus text-muted"></i>
                                                            </div>
                                                            <div class="text-danger">
                                                                  @error('username')
                                                                        {{$message}}
                                                                  @enderror
                                                            </div>
                                                      </div>
                                                </div>
                                                <div class="col-sm-6">
                                                      <div class="form-group has-feedback">
                                                            <input type="email" class="form-control" name="useremail" placeholder="Choose Email" value="{{old('useremail')}}">
                                                            <div class="form-control-feedback">
                                                                  <i class="icon-user-plus text-muted"></i>
                                                            </div>
                                                            <div class="text-danger">
                                                                  @error('useremail')
                                                                        {{$message}}
                                                                  @enderror
                                                            </div>
                                                      </div>
                                                </div>
                                          </div>

                                    {{-- <div class="row">
                                          <div class="col-md-5">
                                                <div class="form-group has-feedback">
                                                      <input type="text" class="form-control" placeholder="First name">
                                                      <div class="form-control-feedback">
                                                            <i class="icon-user-check text-muted"></i>
                                                      </div>
                                                </div>
                                          </div>

                                          <div class="col-md-5">
                                                <div class="form-group has-feedback">
                                                      <input type="text" class="form-control" placeholder="Second name">
                                                      <div class="form-control-feedback">
                                                            <i class="icon-user-check text-muted"></i>
                                                      </div>
                                                </div>
                                          </div>
                                    </div> --}}

                                    <div class="row">
                                          {{-- <div class="col-md-6">
                                                <div class="form-group has-feedback">


                                                      <select name="roleid" class="form-control" value="{{old('roleid')}}">
                                                            <option value="" >Select Role</option>
                                                            @foreach ($roles as $role)
                                                            <option  value="{{$role->roleid}}">{{$role->rolename}}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="text-danger">
                                                            @error('roleid')
                                                                  {{$message}}
                                                            @enderror
                                                      </div>
                                                </div>
                                          </div> --}}

                                          <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                      <input type="password" name="userpassword" class="form-control" placeholder="Choose password" value="{{old('userpassword')}}">
                                                      <div class="form-control-feedback">
                                                            <i class="icon-user-lock text-muted"></i>
                                                      </div>
                                                      <div class="text-danger">
                                                            @error('userpassword')
                                                                  {{$message}}
                                                            @enderror
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
{{-- 
                                    <div class="row">
                                          <div class="col-md-5">
                                                <div class="form-group has-feedback">
                                                      <input type="email" class="form-control" placeholder="Your email">
                                                      <div class="form-control-feedback">
                                                            <i class="icon-mention text-muted"></i>
                                                      </div>
                                                </div>
                                          </div>

                                          <div class="col-md-5">
                                                <div class="form-group has-feedback">
                                                      <input type="email" class="form-control" placeholder="Repeat email">
                                                      <div class="form-control-feedback">
                                                            <i class="icon-mention text-muted"></i>
                                                      </div>
                                                </div>
                                          </div>
                                    </div> --}}


                                    <div class="text-right">
                                          <button type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right ml-10"><b><i class="icon-plus3"></i></b> Create account</button>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </form>
      <!-- /registration form -->


      <!-- Footer -->
      {{-- <div class="footer text-muted">
            &copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
      </div> --}}
      <!-- /footer -->

</div>
<!-- /content area -->

@endsection