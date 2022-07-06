<option value="">Select Main Group</option>
@foreach ($accounts_sub_groups as $sub_group )
      <option value="{{$sub_group->account_sub_group_id}}">{{$sub_group->account_sub_group_name}}</option>
@endforeach