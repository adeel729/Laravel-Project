@extends('layout.commonlayout')
@section('content')

<button type="button" onclick="printDivSection('print_setion')" class="btn btn-default btn-xs heading-btn"><i class="icon-printer position-left"></i> Print</button>

<div class="col-sm-12" id="print_setion">
    {{-- header --}}
     <img src="{{asset('image/header-01.png')}}" style="width:1205px; Height:200px;" alt="">    
    {{--/ header --}}
{{-- table header --}}
    <div class="row">
        <div class="row col-sm-11 ml-20 mt-10">
                    <div class="grid-demo">
                        @foreach($invoicemater as $materrow)
                        <div class="row">
                            <div class="col-xs-3 col-sm-2"><div>Invoice No:</div></div>
                            <div class="col-xs-3 col-sm-2"><div>{{$materrow->invoicennumber}}</div></div>
                            <div class="col-xs-3 col-sm-2"></div>

                            <div class="clearfix visible-xs-block"></div>

                            <div class="col-xs-3 col-sm-2"><div>Invoice Date:</div></div>
                            <div class="col-xs-3 col-sm-2"><div>{{$materrow->invoicedate}}</div></div>
                        </div>
                        <div class="row">
                            <div class="col-xs-3 col-sm-2"><div>Client:</div></div>
                            <div class="col-xs-3 col-sm-10"><div>{{$materrow->name}}</div></div>
                            <div class="col-xs-3 col-sm-2"></div>
                        </div>
                        @endforeach
                    </div>
{{-- invoice type --}}
<div class="grid-demo">
    <div class="row">
        <div class="col-xs-3 col-sm-12"><div><b>Invoice Recieving</b></div></div>
    </div>
</div>
{{-- invoice type --}}
{{-- invoice data --}}
<div class="grid-demo">
    <div class="row">
        <div class="col-xs-3 col-sm-12">
            <table class="table table-bordered">
                    <thead>
                        <tr style="background-color: black;color:white;">
                            <th style="width:15px;">SR#</th>
                            <th>Payment Date</th>
                            <th>Cheque Number</th>
                            <th style="width:15px;">Total</th>
                            <th style="width:15px;">Paid</th>
                            <th style="width:15px;">Remaining</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($sr=0)
                        @foreach($installmentdetails as $record)
                        <tr>
                            @php($sr++)
                            <td>{{$sr}}</td>
                            <td>{{$record->installmentdate}}</td>
                            <td>{{$record->chequenumber}}</td>
                            <td>{{$record->previousbalance}}</td>
                            <td>{{$record->installmentamount}}</td>
                            <td>{{$record->currentremainig}}</td>
                            @endforeach
                        </tr>
                    </tbody>
            </table>
        
        </div>
    </div>
    <br>
   {{-- Details --}}
   @foreach($invoicemater as $mastercash)

   <div class="row">
       <div class="col-sm-4 col-sm-offset-8">
         <div class="row">
             <div class="col-sm-6">
           <b>Total Without Tax:</b>
             </div>
           <div class="col-sm-6">
            {{$mastercash->totalbeforetax}}
           </div>
       </div>
       </div>
   </div>
   @if($mastercash->incometaxamount>0)
   <div class="row">
       <div class="col-sm-4 col-sm-offset-8">
         <div class="row">
             <div class="col-sm-6">
            <b>Icome Tax:</b>
             </div>
           <div class="col-sm-6">
            {{$mastercash->incometaxamount}}
           </div>
       </div>
       </div>
   </div>
   @endif
   @if($mastercash->saletaxgovernmentamount>0)
   <div class="row">
       <div class="col-sm-4 col-sm-offset-8">
         <div class="row">
             <div class="col-sm-6">
            <b>Government Sale Tax:</b>
             </div>
           <div class="col-sm-6">
            {{$mastercash->saletaxgovernmentamount}}
           </div>
       </div>
       </div>
   </div>
   @endif
   <div class="row">
       <div class="col-sm-4 col-sm-offset-8">
         <div class="row">
             <div class="col-sm-6">
            <b>Gst Tax :</b>
             </div>
           <div class="col-sm-6">
            {{$mastercash->gsttaxamount}}
           </div>
       </div>
       </div>
   </div>
   <div class="row">
       <div class="col-sm-4 col-sm-offset-8">
         <div class="row">
             <div class="col-sm-6">
            <b>After Tax:</b>
             </div>
           <div class="col-sm-6">
            {{$mastercash->totalaftertax}}
           </div>
       </div>
       </div>
   </div>
   <div class="row">
       <div class="col-sm-4 col-sm-offset-8">
         <div class="row">
             <div class="col-sm-6">
            <b>Net Total:</b>
             </div>
           <div class="col-sm-6">
            {{$mastercash->nettotal}}
           </div>
       </div>
       </div>
   </div>
   <div class="row">
       <div class="col-sm-4 col-sm-offset-8">
         <div class="row">
             <div class="col-sm-6">
            <b>Paid:</b>
             </div>
           <div class="col-sm-6">
            {{$mastercash->paid}}
           </div>
       </div>
       </div>
   </div>
   <div class="row">
       <div class="col-sm-4 col-sm-offset-8">
         <div class="row">
             <div class="col-sm-6">
            <b>Remainig:</b>
             </div>
           <div class="col-sm-6">
            {{$mastercash->remaining}}
           </div>
       </div>
       </div>
   </div>

@endforeach
{{-- /Details --}}
</div>
{{-- invoice data --}}

        </div>
    </div>
{{-- /table header --}}

</div>
                      {{-- script    --}}
                      <script>
                        function printDivSection(setion_id) {
     var Contents_Section = document.getElementById(setion_id).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = Contents_Section;

     window.print();

     document.body.innerHTML = originalContents;
}
                    </script>
                      {{-- /script    --}}
@endsection