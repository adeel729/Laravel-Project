@extends('layout.commonlayout')
@section('content')
					<!-- Multi column ordering -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Customers List</h5>
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
									<th>Name</th>
									<th>Address</th>
									<th>Ntn</th>
									<th>Contact Number</th>
									<th>City</th>
									<th>View</th>
								
								</tr>
							</thead>
							<tbody>
								
							@foreach ($customers as $customer)
                            <tr>
                             <td>{{$customer->name}}</td>   
                             <td>{{$customer->address}}</td>   
                             <td>{{$customer->ntn}}</td>   
                             <td>{{$customer->contactperson}}</td>   
                             <td>{{$customer->city}}</td>   
                             <td><a href="{{url('/customer/'.$customer->customerid.'/edit')}}" class="label label-info">View   </a></td>   
                            </tr>
                            @endforeach     
				
							</tbody>
						</table>
					</div>
					<!-- /multi column ordering -->
@endsection