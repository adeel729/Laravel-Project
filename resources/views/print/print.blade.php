@extends('layout.commonlayout')
@section('content')
<br/>
<br/>
<br/>
<button type="button" onclick="printDivSection('print_envelope')" class="btn btn-default btn-xs heading-btn"><i class="icon-printer position-left"></i> Print Envolope</button>
<br/>
<br/>
<br/> 
<div>
    <div id="print_envelope">
        {{-- <img src="{{asset('image/envelope.png')}}" style="width: 1050px; Height:400px;" alt="">     --}}
    </div> 
</div>   
{{-- Sticker --}}
<br/>
<br/>
<br/>
<button type="button" onclick="printDivSection('print_sticker')" class="btn btn-default btn-xs heading-btn"><i class="icon-printer position-left"></i> Print Sticker</button>
<br/>
<br/>
<br/> 
<div>
    <div id="print_sticker">
        {{-- <img src="{{asset('image/sticker-01.png')}}" style="width: 200px; Height:100px;" alt="">     --}}
    </div> 
</div>   


                        <script>
                        function printDivSection(setion_id) {
     var Contents_Section = document.getElementById(setion_id).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = Contents_Section;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
@endsection