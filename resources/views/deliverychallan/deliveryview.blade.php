<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Delivery Chalan</title>
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
                    <td colspan="3" align="center"><h2  style="padding:0px;margin :0px;">Delivery Chalan</h2></td>
                    
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
                        <h5 style="padding:0px;margin:0px;" >{{date('d-m-Y', strtotime($dcmaster[0]->dcdate))}}</h5>
                    </td>
                    <td>
                        <h5  style="padding:0px;margin:0px;">{{$dcmaster[0]->imasterid}} </h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        
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
                <h5  style="padding:0px;margin:0px;">DC# {{$dcmaster[0]->dcparentid}} </h5>
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
                <h5  style="padding:0px;margin:0px;"> Bill To</h5>
            </td>
        </tr>
        <tr>
            <td>
                <h5  style="padding:0px;margin :0px;">{{$dcmaster[0]->name}}</h5>
            </td>
        </tr>
    </table>

</div>



<div class="items">
	
    <table class="table table-bordered"  style="margin-left:15px;margin-top:0px; width:100%;">
        <thead STYLE="font-size: 13px;border:1px solid black;background:rgb(226, 223, 223); color:black;">
            <tr style="font-sze:11px; border-top:1px solid;">
                <th >SR#</th>
                <th >ITEM NAME</th>
                <th >DESCRIPTION </th>
                <th >Quantity</th>
               
            </tr>
        </thead>
        <tbody style="border:1px solid black;">
            @php($sr=0)
            @foreach($dcchild as $childrow)
            <tr style="font-size:12px;font-weight:normal;;">
                @php($sr++)
                <td style="border-right:1px solid black; text-align:center;padding:3px;">{{$sr}}</td>
                <td style="border-right:1px solid black; text-align:center;padding:3px;">{{$childrow->itemname}}</td>
                <td style="border-right:1px solid black; text-align:center;padding:3px;">{{$childrow->discription}}</td>
                <td style="border-right:1px solid black; text-align:center;padding:3px;">{{$childrow->quantity}}</td>
                
            </tr>
                @endforeach
                
                
        </tbody>
</table>


</body>
</html>