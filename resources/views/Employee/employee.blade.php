@extends('layout.commonlayout')
@section('content')
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title text-center">Add Employee</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

    <div class="panel-body">
        @if(Session::has('EmployeeAdded'))
        <script>
          swal("Great Job!","{!! Session::get('EmployeeAdded') !!}","success",{
            button:"Cool",
          });
        </script>
        @endif
        <form class="form-horizontal form-validate-jquery" action="{{url('/employee')}}" method="post">
            @csrf
            <fieldset class="content-group">
            <!-- row 1 -->
            <div class="row">
            <!-- First name -->
            <div class="col-md-2 ml-10">
            <div class="form-group">
            <label for="first_name"> Name</label>
            <input input="text" class="form-control" id="name" required="" name="name">
            </div>
            <!-- /first name -->
            </div>
                <!-- ******************************** -->
                <!-- Last name -->
            <div class="col-md-2 ml-10">
            <div class="form-group">
            <label for="last_name"> Father Name</label>
            <input type="text" class="form-control" id="fathername" required="" name="fathername">
            </div>
            </div>
           <!-- /Last name -->
                <!-- ************************************* -->
                <!-- ******************************** -->
                <!-- Email -->
            <div class="col-md-2 ml-10">
            <div class="form-group">
            <label for="email"> Email</label>
            <input type="email" class="form-control" id="email" name="email" required="">
            </div>
            </div>
           <!-- /EMail -->
                <!-- ************************************* -->
          
                <!-- ************************************* -->
                   <!-- Date of Birth -->
            <div class="col-md-2 ml-10">
            <div class="form-group">
            <label for="date_of_birth"> Date Of Birth</label>
            <input type="date" class="form-control" id="dateofbirth" required="" name="dateofbirth">
            </div>
            </div>
           <!-- /date of birth -->
                    <!-- Cnic -->
                    <div class="col-md-2 ml-10">
                        <div class="form-group">
                      <label for="salary">CNIC </label>
                      <input type="text" class="form-control" id="" required name="cnic">
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
            <input type="text" class="form-control " id="mobile_number" required="" name="mobilenumber">
            </div>
            </div>
           <!-- /date of birth -->
         
              <!-- Salary -->
           <div class="col-md-2 ml-10">
              <div class="form-group">
            <label for="salary">Salary </label>
            <input type="text" class="form-control " id="salary" required="" name="salary">
              </div>
                </div>
           <!-- /end salary  -->



              <!-- Employee Department -->
              <div class="col-md-2 ml-10">
              <div class="form-group">
            <label for="department">Employee Department</label>
             <select type="text" class="form-control" name="departmentid" id="">
                   <option value="">Select Depatment</option>
                                                          <option value="1">sales</option>
                                                          <option value="3">manager</option>
                                                          <option value="4">Engineer</option>
                                                          <option value="5">HR</option>
                                                          <option value="6">Office Boy</option>
                                                          <option value="7">Supply Chain</option>
                                                   </select>

              </div>
                </div>
           <!-- /end Employee Department -->
              <!-- Gender -->
              <div class="col-md-2 ml-10">
              <div class="form-group">
            <label for="gender">Gender</label>
             <select type="text" class="form-control" name="gender" id="gender">
                   <option value="">Select Gender</option>
                   <option value="Male">Male</option>
                   <option value="Female">Female</option>
                   <option value="other">other</option>
            </select>

              </div>
                </div>
           <!-- /end Gender -->
                <!-- Address -->
                <div class="col-md-3 ml-10">
                  <div class="form-group">
                  <label for=" address"> Address</label>
                  <input type="text" class="form-control " id="address" required name="address">
                  </div>
                  </div>
                 <!-- /Address -->
            </div>
           <!-- row 2 end -->

            <!-- row 3 start -->
            <div class="row">
          



           
          
            </div>
                <!-- row 3 end -->
            </fieldset>
            
            <div class="text-right">
                <button type="submit" id="submit"  class="btn btn-primary">Submit </button>
            </div>
        </form>
    </div>
</div>
@endsection