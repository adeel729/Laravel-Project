@extends('layout.commonlayout')
@section('title')
Detail Report Item
@endsection
@section('content')
<form action="{{url('/getstockindetails')}}">
    @csrf
<div class="row">
      <div class="col-md-4">
            <div class="form-group">
                <label for="">Item</label>
                <select name="itemid" id="itemid" class="form-control">
               <option value="">Select Item</option>
               @foreach ($Items as $item )
                     <option value="{{$item->itemid}}">{{$item->itemname}}</option>
               @endforeach
            </select>
            </div>
        </div>
    {{-- from --}}
    <div class="col-md-3">
        <div class="form-group">
            <label for="">From</label>
            <input type="date" class="form-control" name="from" id="from" >
        </div>
    </div>
    {{-- to --}}
        {{-- from --}}
        <div class="col-md-3">
            <div class="form-group">
                <label for="">To</label>
                <input type="date" class="form-control" name="to" id="to" >
            </div>
        </div>
        {{-- to --}}
       <input type="button" value="Get Result" onclick="ItemDetailedInfo()" class="btn btn-primary form-control">
</div>

</form>
<button type="button" onclick="printDivSection('table-result-report')" class="btn btn-default btn-xs heading-btn"><i class="icon-printer position-left"></i> Print</button>
				
                	<!-- table -->
					<div class="col-sm-12">
                        <div id="Records_Item">

                        </div>
                    </div>
					<!-- /table -->
                    {{-- script --}}
                    <script>
                        function ItemDetailedInfo()
                        {
                              let from=$('#from').val();
                              let to=$('#to').val();
                              let itemid=$('#itemid').val();
                              var _token = $('input[name="_token"]').val();
                              $.ajax({
                              url: "{{ route('itemDetail.get')}}",
                              method:'POST',
                              data:{_token:_token,from:from,to:to,itemid:itemid},
                              success:function(result)
                              {
                                  
                              $('#Records_Item').html(result);

                                     }
                                });
                        }


                        // print 
                        function printDivSection(setion_id) {
     var Contents_Section = document.getElementById(setion_id).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = Contents_Section;

     window.print();

     document.body.innerHTML = originalContents;
}
                    </script>
                    {{-- /script --}}
@endsection