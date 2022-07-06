<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Invoice</title>
	<style>

		@page {margin: 190px 25px 30px 25px;  }
			  header { position: fixed; top: -60px; left: 0px; right: 0px;      }
			  footer { position: fixed; bottom: 90px; left: 0px; right: 0px; }
			  .content { page-break-after: never; }
			  .items { page-break-after: auto; margin-top:5px;}
			  table{ border-collapse: collapse; margin-bottom: 20px;}
			  td{ border:1px solid #000;
				padding:5px;
			  }
              .clientinfo{ 
                  padding:2px;margin:2px;            }
			</style>
		
</head>
<body>
	<header>
            <img src="{{asset('image/header.png')}}" style="width:200px; height:200px; margin-top:-25px" alt="">  
       
        <div class="content" style="margin-top:-260px; margin-left:250px;  padding:5px; width:500px;">
            <table>
                <tr>
                    <td colspan="3" align="center"><h2  style="padding:0px;margin :0px;">Invoice Bill</h2></td>
                    
                </tr>
                <tr>
                    <td colspan="3"><h5  style="padding:0px;margin :0px;">OFFICE # 6, 205B, CHANDANI CHOWK RWP</h5>
                        <h5  style="padding:0px;margin :0px;">PK 46000</h5>
                        <h5  style="padding:0px;margin :0px;">Ph# 03458242608</h5></td>
                    
                </tr>
                <tr>
                    <td>
                        
                    </td>
                    <td>
                        <h5 style="padding:0px;margin:0px;" >Date</h5>
                    </td>
                    <td>
                        <h5  style="padding:0px;margin:0px;">Invoice# </h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        E-mail: hashirenterprises608@gmail.com
                    </td>
                    <td>
                        <h5 style="padding:0px;margin:0px;" >{{date('d-m-Y', strtotime($invoicemater[0]->invoicedate))}}</h5>
                    </td>
                    <td>
                        <h5  style="padding:0px;margin:0px;">{{$invoicemater[0]->imasterid}} </h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        Faysal Bank Acc #0135007000002656
                    </td>
                     
                    <td colspan="2" align="center">
                        NTN#4053676-9
                    </td>
                </tr>
            </table>
            
            
           
            </div>
    </header>
	<footer>
        <div style="display: flex; flex-wrap: nowrap; ">
            <div style =" border:1px solid; width: 150px; text-align:center">
                <h6  style="padding:50px 10px 0px 10px;margin:0px;">Receiver Signature </h6>
            </div>
            <div style =" border:1px solid; width: 150px; text-align:center; margin-left:580px">
                <h6  style="padding:50px 10px 0px 10px;margin:0px;">Authorized Signature </h6>
            </div>
        </div>
	</footer>

	
	
<div class="content" style="margin-top:35px;">

<div class="content" style="margin-top:60;">
    

    <div class="content" style="margin:0px 20px 10px 500px;">
        <table>
            <tr>
                <td>
                    <h5  style="padding:0px;margin:0px;"> P.O No.</h5>
                </td>
                <td>
                    <h5  style="padding:0px;margin:0px;"> D.C No.</h5>
                </td>
                <td>
                    <h5  style="padding:0px;margin:0px;"> Vendor No</h5>
                </td>
            </tr>
            <tr>
                <td>
                    <h5  style="padding:0px;margin:0px;"> </h5>
                </td>
                <td style="text-align:center">
                    <h5  style="padding:0px;margin:0px;">DC# {{$invoicemater[0]->dcparentid}} </h5>
                </td>
                <td>
                    <h5  style="padding:0px;margin:0px;"> </h5>
                </td>
            </tr>
        </table>
    </div>
    <div class="content" style="margin-top:-84px; margin-left:15px;  width:450px;">
        <table  style="width:450px;">
            <tr>
                <td>
                    <h5  style="padding:0px;margin:0px;"> Bill To:</h5>
                </td>
            </tr>
            <tr>
                <td>
                    <h5  style="padding:0px;margin :0px;">{{$invoicemater[0]->name}}</h5>
                </td>
            </tr>
        </table>
    
    </div>



<div class="items">
	
    <table class="table table-bordered"  style="margin-left:15px;margin-top:20px; width:100%;">
        <thead STYLE="font-size: 13px;border:1px solid black;background:rgb(226, 223, 223); color:black;">
            <tr style="font-sze:11px; border-top:1px solid;">
                <th >Sr#</th>
                <th >Item Name</th>
                <th >Uom.</th>
                <th >Cat/Ser #</th>
                <th >QT</th>
                <th >Unit Price</th>
                <th >Total Price</th>
                <th > GST</th>
                <th > Discount</th>
                <th > Net Total</th>
            </tr>
        </thead>
        <tbody style="border:1px solid black;">
            @php($sr=0)
            @foreach($invoicechild as $childrow)
            <tr style="font-size:12px;font-weight:normal;;">
                @php($sr++)
                <td style="border-right:1px solid black; text-align:center;padding:3px;">{{$sr}}</td>
                <td style="border-right:1px solid black; text-align:center;padding:3px;">{{$childrow->itemname}}</td>
                <td style="border-right:1px solid black; text-align:center;padding:3px;">{{$childrow->unitname}}</td>
                <td style="border-right:1px solid black; text-align:center;padding:3px;">{{$childrow->catalognumber}}</td>
                <td style="border-right:1px solid black; text-align:center;padding:3px;">{{$childrow->quantity}}</td>
                <td style="border-right:1px solid black; text-align:center;padding:3px;">{{$childrow->unitprice}}</td>
                <td style="border-right:1px solid black; text-align:center;padding:3px;">{{$childrow->totalprice}}</td>
                <td style="border-right:1px solid black; text-align:center;padding:3px;">{{$childrow->tax}}</td>
                <td style="border-right:1px solid black; text-align:center;padding:3px;">{{$childrow->discount}}</td>
                <td style=" text-align:center;padding:3px;">{{$childrow->afterdiscount}}</td>
                @endforeach
                
            </tr>
        </tbody>
</table>
@foreach($invoicemater as $mastercash)
{{-- <h5 style="margin:5px 2px 2px 510px ; border:1px solid;font-weight:normal;font-size:12px; margin-top:5%;">TOTAL WITHOUT TAX:{{number_format($mastercash->totalbeforetax)}}/-</h5> --}}
@if($mastercash->incometaxamount>0)
{{-- <h5 style="margin:5px 2px 2px 510px ; border:1px solid;font-weight:normal;font-size:12px;">ICOME TAX:{{$mastercash->incometaxamount}}/-</h5> --}}
@endif
@if($mastercash->saletaxgovernmentamount>0)
{{-- <h5 style="margin:5px 2px 2px 510px ; border:1px solid; font-weight:normal;font-size:12px;">GOVERNMENT SALE TAX:{{$mastercash->saletaxgovernmentamount}}/-</h5> --}}
@endif
@if($mastercash->gsttaxamount>0)
{{-- <h5 style="margin:5px 2px 2px 510px ; border:1px solid; font-weight:normal;font-size:12px;">GST TAX :{{$mastercash->gsttaxamount}}/-</h5> --}}
@endif
{{-- <h5 style="margin:5px 2px 2px 510px ; border:1px solid;font-weight:normal;font-size:12px;" >AFTER  TAX:{{$mastercash->totalaftertax}}/-</h5> --}}
<h5 style="margin:5px 2px 2px 510px ; border:1px solid;font-weight:normal;font-size:12px;">NET TOTAL:{{$mastercash->nettotal}}/-</h5>
<h5 style="margin:5px 2px 2px 510px ; border:1px solid; font-weight:normal;font-size:12px;">Paid:{{$mastercash->paid}}/-</h5>
@if($mastercash->remaining>0)
<h5 style="margin:5px 2px 2px 510px ; border:1px solid; font-weight:normal;font-size:12px;">Remaining:{{$mastercash->remaining}}/-</h5>
@endif
<h5 ><p style="margin:5px 2px 2px 510px ;font-weight:normal;font-size:12px;">Signature &nbsp;&nbsp;--------------------</p></h5>
@endforeach


            {{-- <div class="row" style="margin-left:500px; ">
                <div class="col-sm-4 col-sm-offset-8">
                  <div class="row">
                      <div class="col-sm-6" style="font-size:12px">
                    TOTAL WITHOUT TAX:
                      </div>
                    <div class="col-sm-6">
                     {{$mastercash->totalbeforetax}}
                    </div>
                </div>
                </div>
            </div>
            @if($mastercash->incometaxamount>0)
            <div class="row" style="margin-left:500px>
                <div class="col-sm-4 col-sm-offset-8">
                  <div class="row">
                      <div class="col-sm-6" style="font-size:12px">
                     ICOME TAX:
                      </div>
                    <div class="col-sm-6">
                     {{$mastercash->incometaxamount}}
                    </div>
                </div>
                </div>
            </div>
            @endif
            @if($mastercash->saletaxgovernmentamount>0)
            <div class="row" style="margin-left:500px>
                <div class="col-sm-4 col-sm-offset-8">
                  <div class="row">
                      <div class="col-sm-6" style="font-size:12px">
                     GOVERNMENT SALE TAX:
                      </div>
                    <div class="col-sm-6">
                     {{$mastercash->saletaxgovernmentamount}}
                    </div>
                </div>
                </div>
            </div>
            @endif
            <div class="row" style="margin-left:500px">
                <div class="col-sm-4 col-sm-offset-8">
                  <div class="row">
                      <div class="col-sm-6" style="font-size:12px">
                     GST TAX :
                      </div>
                    <div class="col-sm-6">
                     {{$mastercash->gsttaxamount}}
                    </div>
                </div>
                </div>
            </div>
            <div class="row" style="margin-left:500px">
                <div class="col-sm-4 col-sm-offset-8">
                  <div class="row">
                      <div class="col-sm-6" style="font-size:12px">
                     AFTER  TAX:
                      </div>
                    <div class="col-sm-6">
                     {{$mastercash->totalaftertax}}
                    </div>
                </div>
                </div>
            </div>
            <div class="row" style="margin-left:500px">
                <div class="col-sm-4 col-sm-offset-8">
                  <div class="row">
                      <div class="col-sm-6" style="font-size:12px">
                     NET TOTAL:
                      </div>
                    <div class="col-sm-6">
                     {{$mastercash->nettotal}}
                    </div>
                </div>
                </div>
            </div>
            <div class="row" style="margin-left:500px">
                <div class="col-sm-4 col-sm-offset-8">
                  <div class="row">
                      <div class="col-sm-6" style="font-size:12px">
                     Paid:
                      </div>
                    <div class="col-sm-6" >
                     {{$mastercash->paid}}
                    </div>
                </div>
                </div>
            </div>
            <div class="row" style="margin-left:500px">
                <div class="col-sm-4 col-sm-offset-8">
                  <div class="row">
                      <div class="col-sm-6" style="font-size:12px">
                     Remaining:
                      </div>
                    <div class="col-sm-6" >
                     {{$mastercash->remaining}}
                    </div>
                </div>
                </div>
            </div>
            <div class="row" style="margin-left:500px;">
                <div class="col-sm-4 col-sm-offset-8">
                  <div class="row">
                      <div class="col-sm-6" style="font-size:12px">
                     SIGNATURE
                      </div>
                    <div class="col-sm-6"style="margin-top:20px" >
                    ----------------------
                    </div>
                </div>
                </div>
            </div>
            @endforeach --}}

</div>
	{{-- <main>
		<p></p>
		<p>page2</p>
	</main> --}}

</body>
</html>