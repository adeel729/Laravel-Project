<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Financial Offer </title>
	<style>
	
		@page { margin: 100px 25px; }

			  header { position: fixed; top: -85px; left: 0px; right: 0px;     }
			  footer { position: fixed; bottom: 40px; left: 0px; right: 0px; }
			  .terms { position: fixed; bottom: 130px; left: 0px; right: 0px; }
			  .content { page-break-after: never; }
			  .items { page-break-after: auto; margin-top:5px; margin-bottom:15px;}
			  table{ border-collapse: collapse; margin-bottom: 20px;}
			  td{ border:1px solid #000;
				padding:5px;
			  }
			</style>
		
</head>
<body>
	<header>
		@if ($Financial_offer[0]->header == 1)	
		<img src="{{asset('image/header.png')}}" style="width:100px; height:100px;" alt="">  
		<div style="margin-top:-20px; margin-left:500px">
			<h5  style="padding:0px;margin:0; ">National Tax No: &nbsp;4053676-9</h5>

		</div>
		<div style="border-top: 1px solid grey; margin-top:-20px">

		</div>
		@endif
	</header>
	<footer>
		
	
		{{-- <img  src="{{asset('image/Untitled-1-02.png')}}" style="width:100%;" alt=""> --}}
	</footer>

	<h3  style="padding:0px;margin:30px 200px 10px 310px;">Finacial Offer </h3>
	
	<div class="content" style="margin:20px 20px 10px 500px; padding:5px;">
		<h5  style="padding:0px;margin:0px;">National Tax No: &nbsp;4053676-9</h5>
		<h5  style="padding:0px;margin:0px;">G.S.TNo: &nbsp;3277876142277</h5>
		<h5  style="padding:0px;margin:0px;">Ref No : &nbsp;{{$Financial_offer[0]->ref_no}}</h5>
		<h5  style="padding:0px;margin:0px;">DATE: &nbsp;{{date('j-F-Y', strtotime($Financial_offer[0]->date))}}</h5>
	</div>
	<div class="content" style="margin-top:-70px; padding:5px; width:450px;">
		@foreach($Financial_offer as $clientdata)
		<h5   style="padding:0px;margin:0px;">To, </h5>
		<h5  style="padding:0px;margin :0px;">{{ucwords($clientdata->name)}}</h5>
		<h5   style="padding:0px;margin:0px;">{{ucwords($clientdata->address)}}</h5>
		<h5   style="padding:0px;margin:0px;">&nbsp;</h5>
		@endforeach
	</div>
	<h3  style="padding:0px;margin:30px 200px 10px 310px;"><u>Items List</u></h3>
<h5 style="margin:30px 10px 0px 10px ;"><u>Dear Sir,</u></h5>
<h5 style="margin:10px 10px 10px 10px ;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; Hashir Enterprises as a distributer of different brands. We are pleased to quote our lowest possible rates of the folllowing items for you institute of against tender enquiry. </h5>

<div class="items">
	<table class="table table-hover" style="width:100%;">
		<thead class="bg-indigo-400" style="background:black; font-family:sens-sarif; color:white; font-weight:normal; font-size:14px;">
			<tr>
				<th><b>SR#</b></th>
				<th><b>Item Name</b></th>
				<th><b>Brand</b></th>
				<th><b>Specification</b></th>
				@if ($Financial_offer[0]->certification == 1)
				<th><b>Certifications Held</b></th>
				@endif
				<th><b>Rate Per Pack</b></th>
				<th><b>Rate Per Piece</b></th>
			</tr>
		</thead>
		<tbody>
			@php($count=0)
			@foreach ($Financial_offer_child as $item)
			
			<tr style="font-size:12px; font-weight:normal; text-align:center;">
				@php($count++)
				<td>{{$count}}</td>
				<td>{{$item->itemname}}</td>
				<td>{{$item->make}}</td>
				<td>{{$item->quantity." ".$item->unitname}}</td>
				@if ($Financial_offer[0]->certification == 1)
				<td>{{$item->certification}}</td>
				@endif
				<td>{{$item->rate_per_pack}}</td>
				<td>{{$item->rate_per_peice}}</td>
			</tr>
			
			@endforeach

		</tbody>
	</table>

</div>
	{{-- <main>
		<p></p>
		<p>page2</p>
	</main> --}}

	
</body>
</html>