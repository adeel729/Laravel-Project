@extends('layout.commonlayout')
@section('content')
{{-- form --}}
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title text-center">Create New Sub Account</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

    <div class="panel-body">
        {{-- @if(Session::has('SupplierAdded'))
        <script>
          swal("Great Job!","{!! Session::get('SupplierAdded') !!}","success",{
            button:"Cool",
          });
        </script>
        @endif --}}
        <form class="form-horizontal form-validate-jquery" action="{{url('/StoreNewSubGroupAccount')}}" method="post">
            @csrf
            <fieldset class="content-group">
                

            <div class="row">
<div class="col-md-3">
<!--  -->
<div class="form-group">
                    
    <label>Account Name</label>
    <input type="text" class="form-control" id="name" placeholder="Name" name="name" >
    <input type="hidden" class="form-control" id="account_sub_group_id" placeholder="Name" name="account_sub_group_id" >
                        
</div>
<!--  -->
<!--  -->


</div>
<div class="col-md-3">
    <label for="exampleInputEmail1">Select Account Group</label>
    <select  class="form-control" id="a_id_dd" name="account_group_id" onchange="get_sub_account(this.value)">
<option value="">Select Account Group</option>
         @foreach ($account_group as $acg)
        <option value="{{$acg->account_group_id}}">{{$acg->account_group_name}} | {{$acg->account_group_type}} </option>
         @endforeach    
         </select>
</div>

<div class="form-group col-lg-3" >
    <label>Select Account</label>
   <select class="form-control" id="code" name="code" onchange="select_code(this.value)">
    <option value="">Select account</option>
   </select>
    {{-- <input type="Text" class="form-control" id="code" placeholder="Select Account" name="code" > --}}
    </div>



    <div class="col-md-3">
        <div class="form-group">
            <label>Account Description</label>
            <input type="text" class="form-control" id="description" placeholder="Description" name="description" style="color:blue;" >
            </div>
        </div>
    



 



<div class="card-footer">
    <button type="submit" class="btn btn-primary" name="create_account" >Submit</button>
</div>

        </form>
    </div>
 <div style="margin-top:150px;">
</div>
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title text-center">Account List</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>
    
        <div class="panel-body">
        </div>
    
        <table class="table datatable-multi-sorting">
            <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>ID</th>
                    <th>Account Name</th>
                    <th>Description</th>
                    <th>Code</th>
                    <th>date</th>
                </tr>
            </thead>
            <tbody>
                @php($srno=0)
                @foreach($maccount as $account)
                @php($srno++)
                <tr>
                    <td>{{$srno}}</td>
                    <td>{{$account->a_id}}</td>
                    <td>{{$account->name}}</td>
                    <td>{{$account->description}}</td>
                    <td>{{$account->code}}</td>
                    <td>{{$account->date}}</td>
                    
                </tr>
                @endforeach  
    
            </tbody>
        </table>
    </div>
</div>
<script>
function get_sub_account(account_group_id)
{
    var _token = $('input[name="_token"]').val();
                    $.ajax({
                    url: "{{ route('GetSubGroup_on_new_sub_account.get')}}",
                    method:'POST',
                    data:{ _token:_token,account_group_id:account_group_id},
                    success:function(result)
                    {
                    $('#code').html(result);
                    }
                    
                }); 
}
function select_code(account_sub_group_id)
{
$('#account_sub_group_id').val(account_sub_group_id);
}
</script>
{{-- form --}}
@endsection