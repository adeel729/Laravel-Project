<div class="panel panel-flat">
      <div class="panel-heading">
            <h5 class="panel-title">Balance Details</h5>
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
                        <td>Date</td>
                        <td>PO_Number</td>
                        <td>Vocher_Number</td>
                        <td>Debit</td>
                        <td>Credit</td>
                        <td>Balance</td>
                  </tr>
            </thead>
            <tbody>
                  
                  @foreach ($SupplieBalnceDetails as $Supplier )
                  <tr>
                        <td>{{$Supplier->payment_date}}</td>
                        <td>{{$Supplier->po_number}}</td>
                        <td>{{$Supplier->vocher_no}}</td>
                        <td>{{$Supplier->debit}}</td>
                        <td>{{$Supplier->credit}}</td>
                        <td>{{$Supplier->balance}}</td>
                  </tr>
                  @endforeach
            </tbody>
      </table>
</div>
<!-- /multi column ordering -->