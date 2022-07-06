<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>QUOTAION</title>
	<style>
	
		@page { margin: 100px 25px; }

			  header { position: fixed; top: -85px; left: 0px; right: 0px;     }
			  footer { position: fixed; bottom: 40px; left: 0px; right: 0px; }
			  .terms { position: fixed; bottom: 130px; left: 0px; right: 0px; }
			  .content { page-break-after: never; }
			  .items { page-break-after: always; margin-top:5px; margin-bottom:15px;}
			  table{ border-collapse: collapse; margin-bottom: 20px;}
			  td{ border:1px solid #000;
				padding:5px;
			  }
			</style>
		
</head>
<body>
<header>
    {{-- <img src="{{asset('image/header.png')}}" style="width:100%;" alt="">   --}}
</header>
<footer>
    {{-- <img  src="{{asset('image/Untitled-1-02.png')}}" style="width:100%;" alt=""> --}}
</footer>
<h5 class="mn" style="margin-top:150px"> Created: {{$poparentdetail[0]->purchase_order_date}} </h5>
<h5 class="mn"> Status:
    <b class="text-success">{{$poparentdetail[0]->postatus}}</b>
</h5>
   <!-- Content -->
   <section id="content" class="">

    <div class="panel invoice-panel text-center">
        <div class="panel-heading">
            <span class="panel-title" style="font-size:13px">PURCHASE  ORDER</span>

            <div class="panel-header-menu pull-right mr10">
                {{-- <button type="button" class="btn btn-xs btn-default btn-gradient mr5">
                    <i class="fa fa-plus-square pr5"></i> New Invoice
                </button> --}}
                <a href="javascript:window.print()" class="btn btn-xs btn-default btn-gradient mr5">
                    <i class="fa fa-print fs13"></i>
                </a>

            </div>
        </div>
        <div class="panel-body p20" id="invoice-item">

            <div class="row mb30">
                <div class="col-md-4">
                    <div class="pull-left">
                     
                    </div>
                </div>
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <div class="pull-right text-right">
                        {{-- <h2 class="invoice-logo-text hidden lh10">ThemeREX</h2>
                        <h6> Sales Rep:
                            <b class="text-primary">John Doe</b>
                        </h6> --}}
                    </div>
                </div>
            </div>
            <div class="row" id="invoice-info">
                <div class="col-md-6">
                    <div class="panel panel-alt br-r">
                        <div class="panel-heading">
                            <span class="panel-title" style="font-size:13px;"> PO TO : </span>

                            {{-- <div class="panel-btns pull-right ml10">
                                <span class="panel-title-sm"> Edit</span>
                            </div> --}}
                        </div>
                        <div class="panel-body">
                            <div class="fw700"  style="font-size:13px;">{{$poparentdetail[0]->name}}</div>
                            <div style="font-size:13px;">PHONE: &nbsp; {{$poparentdetail[0]->contact}}</div>
                            <div style="font-size:13px;">EMAIL: &nbsp; {{$poparentdetail[0]->address}}</div>
                        </div>
                    </div>
                </div>
             
                <div class="col-md-6">
                    <div class="panel panel-alt br-r">
                        <div class="panel-heading" style="font-size:11px;">
                            <span class="panel-title" style="font-size:13px;"> PO FROM: </span>

                            <div class="panel-btns pull-right ml10"></div>
                        </div>
                        <div class="panel-body">
                            <div style="font-size:13px;">Hashir Enterprises:  &nbsp;</div>
                            <div style="font-size:13px;">RESEARCH AND DIAGNOSTIC:  &nbsp;</div>
                            <div style="font-size:13px;">PO NUMBER #: &nbsp; {{$poparentdetail[0]->purchase_order_id}}</div>
                            <div style="font-size:13px;">DATE: &nbsp; {{$poparentdetail[0]->purchase_order_date}}</div>
                            <div style="font-size:13px;">REFRENCE: &nbsp; {{$poparentdetail[0]->refrence}}</div>
                            {{-- <div><b>Due Date:</b> Nov 07 2015</div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="row" id="invoice-table">
                <div class="col-md-13">
                    <table class="table table-striped btn-gradient-grey" style="width:650px">
                        <thead style="background:gray;color:white;">
                        <tr>
                            {{-- <th class="hidden-xs">Sr.no</th> --}}
                            {{-- <th style="width: 15px;" class="text-center">Category</th> --}}
                         
                            <th style="width: 65px;" class="text-center"><b>ITEM</b></th>
                            <th style="width: 10px;" class="text-center"><b>UNIT  PRICE</b></th>
                            <th style="width: 10px;" class="text-center"><b>QUANTITY</b></th>
                            <th style="width: 10px;" class="text-center"><b>TOTAL PRICE</b></th>
                        </tr>
                        </thead>
                        <tbody style="font-size:13px;">
                        @foreach($childdata as $data)
                        <tr style="border:1px solid">
                            {{-- <td>{{$data->categoryname}}</td> --}}
                            <td style="">{{$data->itemname}}</td>
                            <td style="text-align:center; font-size:13px;">{{$data->unit_price}}</td>
                            <td style="text-align:center ;font-size:13px;">{{$data->quantity}}</td>
                            <td style="text-align:center ;font-size:13px;">{{$data->total}}</td>
                           
                        </tr>
                        @endforeach
                     
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row" style="margin-left:500px;margin-top:100px;">
                <div class="col-sm-4 col-sm-offset-8">
                  <div class="row">
                      <div class="col-sm-6" style="font-size:13px">
                     SIGNATURE
                      </div>
                    <div class="col-sm-6"style="margin-top:20px" >
                    ----------------------
                    </div>
                </div>
                </div>
            </div>
            {{-- <div class="row" id="invoice-footer">
                <div class="col-md-13">
                    <div class="pull-right table-responsive">
                        <table class="table btn-gradient-grey" id="basic-invoice-result">
                            <thead>
                            <tr>
                                <th>
                                    <b>Sub Total:</b>
                                </th>
                                <th>$1355.00</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <b>Taxes</b>
                                </td>
                                <td>$45.99</td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Total</b>
                                </td>
                                <td>$1300.99</td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Balance Due:</b>
                                </td>
                                <td>$1300.99</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="clearfix"></div>
                    <div class="basic-invoice-buttons">
                        <a href="javascript:window.print()" class="btn btn-default btn-info mr10 mb5">
                            <i class="fa fa-print pr5"></i> Print Invoice</a>
                        <button class="btn btn-primary mb5" type="button">
                            <i class="fa fa-floppy-o pr5"></i> Save Invoice
                        </button>
                    </div>
                </div>
            </div> --}}

        </div>
    </div>
    <div style ="font-size: 10px;margin-top:20%;"><p>Powered Koncept Solution : 03353654321</p></div>

</section>

<!-- /Content -->
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
{{-- @endsection --}}
</body>
</html>