
@extends('layout.commonlayout')
@section('content')


   <!-- Registration -->
   <div class="col-md-12">

    <!-- Standard Fields -->
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title">Create Account</span>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" action="{{url('/createaccount')}}" method="post">
                @csrf
                {{-- Row --}}
                <div class="row">

{{--  Name--}}
<div class="col-md-3 ml-20">
    <div class="form-group">
        <label for="">Name</label>
        <input type="text" name="username" id="username" class="form-control" value="{{old('username')}}">        
        <span class="text-danger">@error('username'){{$message}}@enderror</span>
    </div>
</div>
{{-- / Name --}}
{{-- Email --}}
<div class="col-md-3 ml-20">
    <div class="form-group">
        <label for="">Email</label>
        <input type="email" name="email" class="form-control" value="{{old('email')}}">
        <span class="text-danger">@error('email'){{$message}}@enderror</span>

    </div>
</div>

{{-- /Email--}}
{{-- ROLE --}}
 

</div>
{{-- /Row 1 --}}
{{-- Row 2--}}
<div class="row">
    {{-- Unit Code--}}


    {{-- Password --}}
    <div class="col-md-3 ml-20">
        <div class="form-group">
            <label for="">Password</label> 
            <input type="password"  name="password" class="form-control" value="{{old('password')}}">
            <span class="text-danger">@error('password'){{$message}}@enderror</span>
        </div>
    </div>
    {{-- /Password --}}

   
                    </div>
    {{-- Row 2 --}}

    <div class="section">
        <div class="pull-right">
            <button type="submit" class="btn btn-bordered btn-primary">Store
            </button>
        </div>
    </div>
            </form>
        </div>
    </div>

</div>
<!-- /Spec Form -->
{{-- script --}}
<script>
   $( "#roleid" ).change(function() {
  if(this.value ==2)
  {
    $("#shopid").attr("disabled", true);
  }
  else{
    $("#shopid").attr("disabled", false);
  }
}); 
</script>
{{-- /script --}}
@endsection