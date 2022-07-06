<option value="">Select Item</option>
@foreach($items as $itemrow):
<option value="{{$itemrow->itemid}}">{{$itemrow->itemname}}</option> 
@endforeach