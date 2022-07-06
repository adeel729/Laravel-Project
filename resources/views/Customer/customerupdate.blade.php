@extends('layout.commonlayout')
@section('content')
@foreach($customers as $customer)
<form action="{{url('/customer/'.$customer->customerid)}}" method="POST">
    @csrf
    @method('PATCH')
    {{-- row 1 --}}
    <div class="row">
        {{-- name --}}
        <div class="col-md-5 col-lg-3">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" value="{{$customer->name}}">
            </div>
        </div>
        {{-- /name --}}
                {{-- address --}}
                <div class="col-md-5 col-lg-3">
                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" class="form-control" name="address" value="{{$customer->address}}">
                    </div>
                </div>
                {{-- /address --}}
                {{-- province --}}
                <div class="col-md-5 col-lg-3">
                    <div class="form-group">
                        <label for="">Province</label>
                        <input type="text" class="form-control" name="province" value="{{$customer->province}}">
                    </div>
                </div>
                {{-- /province --}}
    </div>
    {{-- /row 1 --}}
    {{-- row 2 --}}
    <div class="row">
        {{-- City --}}
        <div class="col-md-5 col-lg-3">
            <div class="form-group">
                <label for="">City</label>
                <input type="text" class="form-control" name="city" value="{{$customer->city}}">
            </div>
        </div>
        {{-- /City --}}
                {{-- Mobile Number --}}
                <div class="col-md-5 col-lg-3">
                    <div class="form-group">
                        <label for="">Mobile Number</label>
                        <input type="text" class="form-control" name="contactperson" value="{{$customer->contactperson}}">
                    </div>
                </div>
                {{-- /Mobile Number --}}
                  {{-- Email --}}
                  <div class="col-md-5 col-lg-3">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="contactpersonemail" value="{{$customer->contactpersonemail}}">
                    </div>
                </div>
                {{-- /Email --}}
     
    </div>
    {{-- /row 2 --}}
        {{-- row 3 --}}
        <div class="row">
            {{-- ntn --}}
            <div class="col-md-5 col-lg-3">
                <div class="form-group">
                    <label for="">Ntn</label>
                    <input type="text" class="form-control" name="ntn" value="{{$customer->ntn}}">
                </div>
            </div>
            {{-- /City --}}
                    {{-- Stn --}}
                    <div class="col-md-5 col-lg-3">
                        <div class="form-group">
                            <label for="">Stn</label>
                            <input type="text" class="form-control" name="stn" value="{{$customer->stn}}">
                        </div>
                    </div>
                    {{-- /Stn--}}
                    {{-- Stn --}}
                    <div class="col-md-5 col-lg-3">
                        <div class="form-group">
                            <label for="">Customer Land line</label>
                            <input type="text" class="form-control" name="landlinecustomer" value="{{$customer->landlinecustomer}}">
                        </div>
                    </div>
                    {{-- /Stn--}}
                    
                    
                </div>
                <div class="row">
                    <div class="col-md-5 col-lg-3">
                        <div class="form-group">
                            <label for="">Previous Balance</label>
                            <input type="text" class="form-control" name="prevoius_balance" value="{{$customer->prevoius_balance}}">
                        </div>
                    </div>
                </div>
        {{-- /row 3 --}}
        <div class="text-right">
            <button type="submit"  class="btn btn-primary">Update</button>
        </div>
        @endforeach
</form>
@endsection