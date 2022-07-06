@extends('layout.commonlayout')
@section('content')
<div class="row">
    
    <form action="" method="POST">

        @csrf
    {{--From  --}}
    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label for="">From</label>
            <input type="date" class="form-control" id="from" onchange="changedatesgetdetails()">
        </div>
    </div>
  {{-- /From --}}
      {{--To  --}}
      <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="form-group">
            <label for="">To</label>
            <input type="date" class="form-control" id="to" onchange="changedatesgetdetails()">
        </div>
    </div>
  {{--/To  --}}
</div>
</form>
<div>
<button type="button" onclick="printDivSection('table-result')" class="btn btn-default btn-xs heading-btn"><i class="icon-printer position-left"></i> Print</button>
</div>

<div id="table-result">


</div>
{{-- script --}}
<script>
    function changedatesgetdetails()
    {
        let from=$('#from').val();
        let to=$('#to').val();
        var _token = $('input[name="_token"]').val();
       $.ajax({
        url: "{{ route('getstockwith.date')}}",
        method:'POST',
        data:{_token:_token,from:from,to:to},
        success:function(result)
            {
                $('#table-result').html(result);
              
          }
       });
    }
    // for print the report
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