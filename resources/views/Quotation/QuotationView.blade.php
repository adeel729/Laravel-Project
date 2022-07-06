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
		<img src="{{asset('image/header-01.png')}}" style="width:100%;" alt="">  
	</header>
	<footer>
		
	
		<img  src="{{asset('image/Untitled-1-02.png')}}" style="width:100%;" alt="">
	</footer>

	<h3  style="padding:0px;margin:30px 200px 10px 310px;">Quotation </h3>
	
	<div class="content" style="margin:20px 20px 10px 500px; border:1px solid black; padding:5px;">
		<h5  style="padding:0px;margin:0px;">QUOT DATE: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{date('j-F-Y', strtotime($MasterData[0]->quotationdate))}}</h5>
	</div>
<div class="content" style="margin-top:-40px; border:1px solid black; padding:5px; width:450px;">
@foreach($MasterData as $clientdata)
<h5   style="padding:0px;margin:0px;">ADDRESS: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$clientdata->address}}</h5>
<h5  style="padding:0px;margin :0px;">CLINET: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$clientdata->name}}</h5>
<h5 style="padding:0px;margin:0px;" >QUOTAION#: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$clientdata->quotationnumber}}</h5>
<h5  style="padding:0px;margin:0px;">ATTENTION: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
<h5  style="padding:0px;margin:0px;">DEPARTMENT: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
@endforeach
</div>
<h5 style="margin:30px 10px 30px 10px ;">Respected (Sir/Madam) Refrence To your enquiries.We are pleased to quote you our best discounted prices as below </h5>

<div class="items">
	<table class="table table-hover" style="width:100%;">
		<thead class="bg-indigo-400" style="background:black; font-family:sens-sarif; color:white; font-weight:normal; font-size:12px;">
			<tr>
				<th><b>SR#</b></th>
				<th><b>NAME OF ITEM</b></th>
				<th><b>CATALOG #</b></th>
				<th><b>UOM</b></th>
				<th><b>MAKE</b></th>
				<th><b>UNIT PRICE</b></th>
				<th><b>QTY</b></th>
				<th><b>PRICE</b></th>
				<th><b>GST</b></th>
				<th><b>PRICE+GST</b></th>
			</tr>
		</thead>
		<tbody>
			@php($count=0)
			@foreach ($childata as $item)
			
			<tr style="font-size:12px; font-weight:normal; text-align:center;">
				@php($count++)
				<td>{{$count}}</td>
				<td>{{$item->itemname}}</td>
				<td>{{$item->catalognumber}}</td>
				<td>{{$item->unitname}}</td>
				<td>{{$item->make}}</td>
				<td>{{$item->unitprice}}</td>
				<td>{{$item->quantity}}</td>
				<td>{{$item->totalprice}}</td>
				<td>{{$item->aftertax - $item->totalprice}}</td>
				<td>{{$item->aftertax}}</td>
			</tr>
			
			@endforeach

		</tbody>
	</table>

<footer class="terms" style="margin-bottom: ;">	
@foreach($MasterData as $record)
		
<h6 style="margin:0px; width:700px;"><b>Price Validity:&nbsp;&nbsp;</b>{{$record->pricevalidity}} &nbsp; &nbsp; <br><b>Deliver:&nbsp;&nbsp;</b>{{$record->deliver}}
<h6 style="margin:0px;"><b>Payment Term:&nbsp;</b>{{$record->paymentterm}}</h6>
<h6 style="margin:0px;"><b>Remarks:</b>We have quoted the items to the best of our knoweledge.However please check the suitability of items at your end and before placing the order. </h6>
<h6 style="margin:0px;">* Please Mention our catalog no and pack size on your purchase order. </h6>
<h6 style="margin:0px;">We Hope you find our prices competitive and look forward to recieve your valued order</h6>
<p style="margin-left:550px; font-size:8px; line-height:1px;">Software By:Koncept Solution (0335-3564321) </p>
@endforeach
</footer>
</div>
	{{-- <main>
		<p></p>
		<p>page2</p>
	</main> --}}

	
</body>
</html>