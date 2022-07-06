@extends('layout.commonlayout')
@section('content')
@php($totaloutstanding=0)
<button type="button" onclick="printDivSection('print_setion')" class="btn btn-default btn-xs heading-btn"><i class="icon-printer position-left"></i> Print</button>
<div class="col-sm-12" id="print_setion">
    <h5 class="text-center"><b>Customers Outstanding</b></h5>
    <h5 class="text-center"><b style="font-size:30px;"><u><?php echo date('Y-m-d')?></u></b></h5>
    <table class="table table-borered">
    <thead>
        <tr>
            <th><b>Sr.No</b></th>
            <th><b>Customer Name</b></th>
            <th><b>Total Remaining</b></th>
        </tr>
    </thead>
    <tbody>
        @php($srno=0)
        @foreach($customerresults as $customer)
        @php($srno++)
        <tr>
            <td>{{$srno}}</td>
            <td>{{$customer->name}}</td>
            <td>{{$customer->customerdues}}</td>
            <?php $totaloutstanding+=$customer->customerdues?>
        </tr>
        @endforeach
        <tr>
            <td><b></b></td>
            <td><b>Total Outstanding</b></td>
            <td><b>{{$totaloutstanding}}</b></td>
        </tr>
    </tbody>
    </table>
   
</div>
{{-- script --}}
<script>
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