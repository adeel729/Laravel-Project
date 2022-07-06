@extends('layout.commonlayout')
@section('content')
{{-- Daily Report --}}
<div class="row">
    <h1 class="ml-10">Daily Report</h1>
    {{--  --}}


    <div class="col-lg-12">

        <!-- Progress counters -->
        <div class="row">
            <div class="col-md-3">

                <!-- Available hours -->
                <div class="panel text-center">
                    <div class="panel-body">
                     

                        <!-- Progress counter -->
                        <div class="content-group-sm svg-center position-relative" id="hours-available-progress"><svg width="76" height="76"><g transform="translate(38,38)"><path class="d3-progress-background" d="M0,38A38,38 0 1,1 0,-38A38,38 0 1,1 0,38M0,36A36,36 0 1,0 0,-36A36,36 0 1,0 0,36Z" style="fill: rgb(238, 238, 238);"></path><path class="d3-progress-foreground" filter="url(#blur)" d="M2.326828918379971e-15,-38A38,38 0 1,1 -34.38342799370878,16.179613079472677L-32.57377388877674,15.328054496342538A36,36 0 1,0 2.204364238465236e-15,-36Z" style="fill: rgb(240, 98, 146); stroke: rgb(240, 98, 146);"></path><path class="d3-progress-front" d="M2.326828918379971e-15,-38A38,38 0 1,1 -34.38342799370878,16.179613079472677L-32.57377388877674,15.328054496342538A36,36 0 1,0 2.204364238465236e-15,-36Z" style="fill: rgb(240, 98, 146); fill-opacity: 1;"></path></g></svg><h2 class="mt-15 mb-5">{{$NumOfCashInvoices}}</h2><i class="icon-cash3  counter-icon" style="top: 22px"></i><div>Cash Invoices</div><div class="text-size-small text-muted">Cash &nbsp; {{$PaidInvoicesCash}}</div></div>
                        <!-- /progress counter -->


                        <!-- Bars -->
                        {{-- <div id="hours-available-bars"><svg width="144.52500915527344" height="40"><g width="144.52500915527344"><rect class="d3-random-bars" width="4.163271868670428" x="1.7842593722873263" height="26" y="14" style="fill: rgb(236, 64, 122);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="7.7317906132450815" height="28" y="12" style="fill: rgb(236, 64, 122);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="13.679321854202836" height="22" y="18" style="fill: rgb(236, 64, 122);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="19.62685309516059" height="20" y="20" style="fill: rgb(236, 64, 122);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="25.574384336118346" height="32" y="8" style="fill: rgb(236, 64, 122);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="31.5219155770761" height="20" y="20" style="fill: rgb(236, 64, 122);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="37.46944681803385" height="30" y="10" style="fill: rgb(236, 64, 122);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="43.4169780589916" height="32" y="8" style="fill: rgb(236, 64, 122);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="49.36450929994936" height="36" y="4" style="fill: rgb(236, 64, 122);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="55.31204054090712" height="34" y="6" style="fill: rgb(236, 64, 122);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="61.25957178186487" height="30" y="10" style="fill: rgb(236, 64, 122);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="67.20710302282262" height="24" y="16" style="fill: rgb(236, 64, 122);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="73.15463426378038" height="30" y="10" style="fill: rgb(236, 64, 122);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="79.10216550473814" height="26" y="14" style="fill: rgb(236, 64, 122);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="85.04969674569588" height="26" y="14" style="fill: rgb(236, 64, 122);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="90.99722798665364" height="28" y="12" style="fill: rgb(236, 64, 122);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="96.9447592276114" height="40" y="0" style="fill: rgb(236, 64, 122);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="102.89229046856916" height="34" y="6" style="fill: rgb(236, 64, 122);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="108.83982170952692" height="28" y="12" style="fill: rgb(236, 64, 122);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="114.78735295048466" height="28" y="12" style="fill: rgb(236, 64, 122);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="120.73488419144242" height="32" y="8" style="fill: rgb(236, 64, 122);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="126.68241543240018" height="38" y="2" style="fill: rgb(236, 64, 122);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="132.62994667335792" height="32" y="8" style="fill: rgb(236, 64, 122);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="138.5774779143157" height="36" y="4" style="fill: rgb(236, 64, 122);"></rect></g></svg></div> --}}
                        <!-- /bars -->

                    <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
                </div>
                <!-- /available hours -->

            </div>

            <div class="col-md-3">

                <!-- Productivity goal -->
                <div class="panel text-center">
                    <div class="panel-body">
                     

                        <!-- Progress counter -->
                        <div class="content-group-sm svg-center position-relative" id="goal-progress"><svg width="76" height="76"><g transform="translate(38,38)"><path class="d3-progress-background" d="M0,38A38,38 0 1,1 0,-38A38,38 0 1,1 0,38M0,36A36,36 0 1,0 0,-36A36,36 0 1,0 0,36Z" style="fill: rgb(238, 238, 238);"></path><path class="d3-progress-foreground" filter="url(#blur)" d="M2.326828918379971e-15,-38A38,38 0 1,1 -34.3834279937087,-16.179613079472855L-32.573773888776664,-15.328054496342704A36,36 0 1,0 2.204364238465236e-15,-36Z" style="fill: rgb(92, 107, 192); stroke: rgb(92, 107, 192);"></path><path class="d3-progress-front" d="M2.326828918379971e-15,-38A38,38 0 1,1 -34.3834279937087,-16.179613079472855L-32.573773888776664,-15.328054496342704A36,36 0 1,0 2.204364238465236e-15,-36Z" style="fill: rgb(92, 107, 192); fill-opacity: 1;"></path></g></svg><h2 class="mt-15 mb-5">{{$NumOfCreditInvoices}}</h2><i class="icon-trophy3 text-indigo-400 counter-icon" style="top: 22px"></i><div>Credit Invoices</div><div class="text-size-small text-muted">Total Bill &nbsp;  {{$creditnettoal}}</div></div>
                        <!-- /progress counter -->

                        <!-- Bars -->
                        {{-- <div id="goal-bars"><svg width="144.52500915527344" height="40"><g width="144.52500915527344"><rect class="d3-random-bars" width="4.163271868670428" x="1.7842593722873263" height="32" y="8" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="7.7317906132450815" height="36" y="4" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="13.679321854202836" height="38" y="2" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="19.62685309516059" height="36" y="4" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="25.574384336118346" height="26" y="14" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="31.5219155770761" height="24" y="16" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="37.46944681803385" height="36" y="4" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="43.4169780589916" height="40" y="0" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="49.36450929994936" height="40" y="0" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="55.31204054090712" height="24" y="16" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="61.25957178186487" height="36" y="4" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="67.20710302282262" height="38" y="2" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="73.15463426378038" height="32" y="8" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="79.10216550473814" height="40" y="0" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="85.04969674569588" height="40" y="0" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="90.99722798665364" height="26" y="14" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="96.9447592276114" height="20" y="20" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="102.89229046856916" height="38" y="2" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="108.83982170952692" height="32" y="8" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="114.78735295048466" height="40" y="0" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="120.73488419144242" height="24" y="16" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="126.68241543240018" height="34" y="6" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="132.62994667335792" height="22" y="18" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="138.5774779143157" height="32" y="8" style="fill: rgb(92, 107, 192);"></rect></g></svg></div> --}}
                        <!-- /bars -->

                    <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
                </div>
                <!-- /productivity goal -->

            </div>
            <div class="col-md-3">

                <!-- Productivity goal -->
                <div class="panel text-center">
                    <div class="panel-body">
                     

                        <!-- Progress counter -->
                        <div class="content-group-sm svg-center position-relative" id="goal-progress"><svg width="76" height="76"><g transform="translate(38,38)"><path class="d3-progress-background" d="M0,38A38,38 0 1,1 0,-38A38,38 0 1,1 0,38M0,36A36,36 0 1,0 0,-36A36,36 0 1,0 0,36Z" style="fill: rgb(238, 238, 238);"></path><path class="d3-progress-foreground" filter="url(#blur)" d="M2.326828918379971e-15,-38A38,38 0 1,1 -34.3834279937087,-16.179613079472855L-32.573773888776664,-15.328054496342704A36,36 0 1,0 2.204364238465236e-15,-36Z" style="fill: rgb(92, 107, 192); stroke: rgb(92, 107, 192);"></path><path class="d3-progress-front" d="M2.326828918379971e-15,-38A38,38 0 1,1 -34.3834279937087,-16.179613079472855L-32.573773888776664,-15.328054496342704A36,36 0 1,0 2.204364238465236e-15,-36Z" style="fill: rgb(92, 107, 192); fill-opacity: 1;"></path></g></svg><h2 class="mt-15 mb-5">{{$creditpaid}}</h2><i class="icon-trophy3 text-indigo-400 counter-icon" style="top: 22px"></i><div>Cash Recieved</div><div class="text-size-small text-muted">Credit Invoices</div></div>
                        <!-- /progress counter -->

                        <!-- Bars -->
                        {{-- <div id="goal-bars"><svg width="144.52500915527344" height="40"><g width="144.52500915527344"><rect class="d3-random-bars" width="4.163271868670428" x="1.7842593722873263" height="32" y="8" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="7.7317906132450815" height="36" y="4" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="13.679321854202836" height="38" y="2" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="19.62685309516059" height="36" y="4" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="25.574384336118346" height="26" y="14" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="31.5219155770761" height="24" y="16" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="37.46944681803385" height="36" y="4" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="43.4169780589916" height="40" y="0" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="49.36450929994936" height="40" y="0" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="55.31204054090712" height="24" y="16" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="61.25957178186487" height="36" y="4" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="67.20710302282262" height="38" y="2" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="73.15463426378038" height="32" y="8" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="79.10216550473814" height="40" y="0" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="85.04969674569588" height="40" y="0" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="90.99722798665364" height="26" y="14" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="96.9447592276114" height="20" y="20" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="102.89229046856916" height="38" y="2" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="108.83982170952692" height="32" y="8" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="114.78735295048466" height="40" y="0" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="120.73488419144242" height="24" y="16" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="126.68241543240018" height="34" y="6" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="132.62994667335792" height="22" y="18" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="138.5774779143157" height="32" y="8" style="fill: rgb(92, 107, 192);"></rect></g></svg></div> --}}
                        <!-- /bars -->

                    <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
                </div>
                <!-- /productivity goal -->

            </div>
            <div class="col-md-3">

                <!-- Productivity goal -->
                <div class="panel text-center">
                    <div class="panel-body">
                     

                        <!-- Progress counter -->
                        <div class="content-group-sm svg-center position-relative" id="goal-progress"><svg width="76" height="76"><g transform="translate(38,38)"><path class="d3-progress-background" d="M0,38A38,38 0 1,1 0,-38A38,38 0 1,1 0,38M0,36A36,36 0 1,0 0,-36A36,36 0 1,0 0,36Z" style="fill: rgb(238, 238, 238);"></path><path class="d3-progress-foreground" filter="url(#blur)" d="M2.326828918379971e-15,-38A38,38 0 1,1 -34.3834279937087,-16.179613079472855L-32.573773888776664,-15.328054496342704A36,36 0 1,0 2.204364238465236e-15,-36Z" style="fill: rgb(92, 107, 192); stroke: rgb(92, 107, 192);"></path><path class="d3-progress-front" d="M2.326828918379971e-15,-38A38,38 0 1,1 -34.3834279937087,-16.179613079472855L-32.573773888776664,-15.328054496342704A36,36 0 1,0 2.204364238465236e-15,-36Z" style="fill: rgb(92, 107, 192); fill-opacity: 1;"></path></g></svg><h2 class="mt-15 mb-5">{{$creditremaining}}</h2><i class="icon-trophy3 text-indigo-400 counter-icon" style="top: 22px"></i><div>Remaining</div><div class="text-size-small text-muted">Credit Invoices</div></div>
                        <!-- /progress counter -->

                        <!-- Bars -->
                        {{-- <div id="goal-bars"><svg width="144.52500915527344" height="40"><g width="144.52500915527344"><rect class="d3-random-bars" width="4.163271868670428" x="1.7842593722873263" height="32" y="8" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="7.7317906132450815" height="36" y="4" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="13.679321854202836" height="38" y="2" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="19.62685309516059" height="36" y="4" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="25.574384336118346" height="26" y="14" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="31.5219155770761" height="24" y="16" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="37.46944681803385" height="36" y="4" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="43.4169780589916" height="40" y="0" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="49.36450929994936" height="40" y="0" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="55.31204054090712" height="24" y="16" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="61.25957178186487" height="36" y="4" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="67.20710302282262" height="38" y="2" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="73.15463426378038" height="32" y="8" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="79.10216550473814" height="40" y="0" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="85.04969674569588" height="40" y="0" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="90.99722798665364" height="26" y="14" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="96.9447592276114" height="20" y="20" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="102.89229046856916" height="38" y="2" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="108.83982170952692" height="32" y="8" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="114.78735295048466" height="40" y="0" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="120.73488419144242" height="24" y="16" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="126.68241543240018" height="34" y="6" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="132.62994667335792" height="22" y="18" style="fill: rgb(92, 107, 192);"></rect><rect class="d3-random-bars" width="4.163271868670428" x="138.5774779143157" height="32" y="8" style="fill: rgb(92, 107, 192);"></rect></g></svg></div> --}}
                        <!-- /bars -->

                    <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
                </div>
                <!-- /productivity goal -->

            </div>
        </div>
        <!-- /progress counters -->


    

    </div>


    {{--  --}}
 

   

</div>
{{-- Dialy report --}}
{{-- Daily Report --}}
<div class="row">


{{--  --}}
<div class="panel panel-flat">
    <div class="panel-heading">
        <h6 class="panel-title">Weekly Report</h6>
        {{-- <div class="heading-elements">
            <span class="heading-text"><i class="icon-history text-warning position-left"></i> Jul 7, 10:30</span>
            <span class="label bg-success heading-text">Online</span>
        </div> --}}
    <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

    <!-- Numbers -->
    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-md-3">
                <div class="content-group">
                    <h6 class="text-semibold no-margin"><i class=""></i> {{$CashInvoicesInWeek}}</h6>
                    <span class="text-muted text-size-small">Cash Invoices</span>
                    <h6 class="text-semibold no-margin"><i class=""></i> {{$weeklyPaidInvoicesCash}}</h6>
                    <span class="text-muted text-size-small">Total Cash</span>
                </div>
            </div>

            <div class="col-md-3">
                <div class="content-group">
                    <h6 class="text-semibold no-margin"><i class=""></i>{{$weeklyNumOfCreditInvoices}}</h6>
                    <span class="text-muted text-size-small">Credit Invoices</span>
                    <h6 class="text-semibold no-margin"><i class=""></i> {{$weeklycreditnettoal}}</h6>
                    <span class="text-muted text-size-small">Total Bill</span>
                </div>
            </div>

            <div class="col-md-3">
                <div class="content-group">
                    <h6 class="text-semibold no-margin"><i class=""></i> {{$weeklycreditpaid}}</h6>
                    <span class="text-muted text-size-small">Cash Recieved</span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="content-group">
                    <h6 class="text-semibold no-margin"><i class=""></i> {{$weeklycreditremaining}}</h6>
                    <span class="text-muted text-size-small">Remaining</span>
                </div>
            </div>
        </div>
    </div>
    <!-- /numbers -->


    <!-- Area chart -->
    <div id="messages-stats"><svg width="391.0625" height="40"><g transform="translate(0,0)"></g></svg></div>
    <!-- /area chart -->


 




</div>
{{--  --}}

</div>
{{-- Dialy report --}}
{{-- Market Outstanding --}}
<div class="row">
    <h1 class="ml-10">Market Report</h1>
    <div class="col-lg-6">

        <!-- CAsh Invoices-->
        <div class="panel bg-blue-400"> 
            <div class="panel-body">
                <div class="heading-elements">
                    {{-- <span class="heading-text badge bg-teal-800">+53,6%</span> --}}
                </div>


        Market Receiveable
                <h3 class="no-margin">{{$marketreceiveable}}</h3>
        </div>
        <!-- /CAsh Invoices -->

    </div>
</div>
<div class="col-lg-6">

    <!-- CAsh Invoices-->
    <div class="panel bg-blue-800"> 
        <div class="panel-body">
            <div class="heading-elements">
                {{-- <span class="heading-text badge bg-teal-800">+53,6%</span> --}}
            </div>


    Market Payable
            <h3 class="no-margin">{{$CashPayable}}</h3>
    </div>
    <!-- /CAsh Invoices -->

</div>
</div>
</div>
{{-- /Market Outstanding --}}
@endsection