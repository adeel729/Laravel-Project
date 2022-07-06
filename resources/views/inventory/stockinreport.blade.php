@extends('layout.commonlayout')
@section('title')
Stock In Details
@endsection
@section('content')
<form action="{{url('/getstockindetails')}}">
    @csrf
<div class="row">
    {{-- from --}}
    <div class="col-md-4">
        <div class="form-group">
            <label for="">From</label>
            <input type="date" class="form-control" name="from" id="from" onchange="selectstockindetails()">
        </div>
    </div>
    {{-- to --}}
        {{-- from --}}
        <div class="col-md-4">
            <div class="form-group">
                <label for="">To</label>
                <input type="date" class="form-control" name="to" id="to" onchange="selectstockindetails()">
            </div>
        </div>
        {{-- to --}}
       
</div>

</form>
<button type="button" onclick="printDivSection('table-result-report')" class="btn btn-default btn-xs heading-btn"><i class="icon-printer position-left"></i> Print</button>
				
                	<!-- Multi column ordering -->
					<div class="panel panel-flat" id="table-result-report">
						<div class="panel-heading text-center">
							<h5 class="panel-title">Stock in Details</h5>
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

						<table class="table">
							<thead>
								<tr>
									{{-- <th class="text-center"><b>Warehouse Name</b></th> --}}
									<th class="text-center"><b>Category Name</b></th>
									<th class="text-center"><b>Item Name</b></th>
									<th class="text-center"><b>Batch Number</b></th>
									<th class="text-center"><b>Bill Number</b></th>
									<th class="text-center"><b>Unit Price</b></th>
									<th class="text-center"><b>Quantity</b></th>
									<th class="text-center"><b>Total Price</b></th>
									<th class="text-center"><b>Sale Price</b></th>
									<th class="text-center"><b>Date</b> </th>
								</tr>
							</thead>
							<tbody id="table-result">
							
								
							</tbody>
						</table>
					</div>
					<!-- /multi column ordering -->
                    {{-- script --}}
                    <script>
                        function selectstockindetails()
                        {
                            let from=$('#from').val();
                            let to=$('#to').val();
                            var _token = $('input[name="_token"]').val();
                     $.ajax({
        url: "{{ route('stockin.date')}}",
        method:'POST',
        data:{_token:_token,from:from,to:to},
        success:function(result)
            {
             
                $('#table-result').html(result);
              
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