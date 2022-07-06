@extends('layout.commonlayout')
@section('content')
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title text-center">Update Employee</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

    <div class="panel-body">
    
        @foreach($employeedata as $data)

        <form class="form-horizontal form-validate-jquery" action="{{url('/employee/'.$data->employeeid)}}" method="POST">
            @csrf
            @method('PUT')
            <fieldset class="content-group">
            <!-- row 1 -->
            <div class="row">
            <!-- First name -->
            <div class="col-md-2 ml-10">
            <div class="form-group">
            <label for="first_name"> Name</label>
            <input input="text" class="form-control" id="name" required name="name" value="{{$data->name}}">
            </div>
            <!-- /first name -->
            </div>
                <!-- ******************************** -->
                <!-- Last name -->
            <div class="col-md-2 ml-10">
            <div class="form-group">
            <label for="last_name"> Father Name</label>
            <input type="text" class="form-control" id="fathername" required value="{{$data->fathername}}" name="fathername">
            </div>
            </div>
           <!-- /Last name -->
                <!-- ************************************* -->
                <!-- ******************************** -->
                <!-- Email -->
            <div class="col-md-2 ml-10">
            <div class="form-group">
            <label for="email"> Email</label>
            <input type="email" class="form-control" id="email" name="email" required value="{{$data->email}}">
            </div>
            </div>
           <!-- /EMail -->
                <!-- ************************************* -->
          
                <!-- ************************************* -->
                   <!-- Date of Birth -->
            <div class="col-md-2 ml-10">
            <div class="form-group">
            <label for="date_of_birth"> Date Of Birth</label>
            <input type="date" class="form-control" id="dateofbirth" required name="dateofbirth" value="{{$data->dateofbirth}}">
            </div>
            </div>
           <!-- /date of birth -->
                    <!-- Cnic -->
                    <div class="col-md-2 ml-10">
                        <div class="form-group">
                      <label for="salary">CNIC </label>
                      <input type="text" class="form-control" id="" required name="cnic" value="{{$data->cnic}}">
                        </div>
                          </div>
                     <!-- /end Cnic  -->
                <!-- ************************************* -->
                <!-- ************************************* -->
                   <!-- Grade -->
         
                <!-- ************************************* -->
                <!-- /row 1 -->
            </div>
            <!-- row 2 start -->
            <div class="row">
                 <!-- Date of Birth -->
                 <div class="col-md-2 ml-10">
            <div class="form-group">
            <label for=" mobile_number"> Mobile Number</label>
            <input type="text" class="form-control " id="mobile_number" required name="mobilenumber" value="{{$data->mobilenumber}}">
            </div>
            </div>
           <!-- /date of birth -->
         
              <!-- Salary -->
           <div class="col-md-2 ml-10">
              <div class="form-group">
            <label for="salary">Salary </label>
            <input type="text" class="form-control " id="salary" required name="salary" value="{{$data->salary}}">
              </div>
                </div>
           <!-- /end salary  -->


   
              <!-- Employee Department -->
              <div class="col-md-2 ml-10">
              <div class="form-group">
            <label for="department">Employee Department</label>
             <select type="text" class="form-control" name="departmentid" id="" value="{{$data->departmentid}}">
                   <option value="">Select Depatment</option>
                                                          <option value="1">sales</option>
                                                          <option value="3">manager</option>
                                                          <option value="4">Engineer</option>
                                                   </select>

              </div>
                </div>
           <!-- /end Employee Department -->
              <!-- Gender -->
              <div class="col-md-2 ml-10">
              <div class="form-group">
            <label for="gender">Gender</label>
             <select type="text" class="form-control" name="gender" id="gender" value="{{$data->gender}}">
                   <option value="">Select Gender</option>
                   <option value="Male">Male</option>
                   <option value="Female">Female</option>
                   <option value="other">other</option>
            </select>

              </div>
                </div>
           <!-- /end Gender -->

            </div>
           <!-- row 2 end -->

            <!-- row 3 start -->
            <div class="row">
          
      

                <!-- Address -->
                <div class="col-md-3 ml-10">
            <div class="form-group">
            <label for=" address"> Address</label>
            <input type="text" class="form-control " id="address" required name="address" value="{{$data->address}}">
            </div>
            </div>
           <!-- /Address -->
           
          @endforeach
            </div>
                <!-- row 3 end -->
            </fieldset>
            
            <div class="text-right">
                <button type="submit" id="submit"  class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection