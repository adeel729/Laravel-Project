<div class="panel panel-flat">
      <div class="panel-heading">
            <h5 class="panel-title">Pay Against Po</h5>
            <div class="heading-elements">
                  <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
          </ul>
    </div>
      </div>

      <div class="panel-body">
      </div>

      <table class="table datatable-multi-sorting">
            <thead>
                  <tr>
                        <td>PO Number</td>
                        <td>Date</td>
                        <td>Total</td>
                        <td>Paid</td>
                        <td>Remainig</td>
                        <td>Pay</td>
                  </tr>
            </thead>
            <tbody>
                  
                  @foreach ($SupplierPoDetails as $PoDetails )
                  <tr>
                        <td>{{$PoDetails->po_number}}</td>
                        <td>{{$PoDetails->purchase_order_date}}</td>
                        <td>{{$PoDetails->totalbill}}</td>
                        <td>{{$PoDetails->current_payment}}</td>
                        <td>{{$PoDetails->remaining}}</td>
                         <td><button type="button" class="label label-danger label-rounded label-lg" data-toggle="modal" data-target="#itemmodal" onclick="FetchDEtialsPo({{$PoDetails->purchase_order_id}})">Pay</button></td>  

                        {{-- <td><a href="{{url('/PayBill/'.$PoDetails->" class="label label-info">Pay   </a></td>    --}}
                  </tr>
                  @endforeach
            </tbody>
      </table>
</div>
<!-- /multi column ordering -->