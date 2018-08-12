@extends('admin.app')

@section('admin-title', 'Orders')

@section('admin-content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default card-view">
			<div class="pannel-wrapper collapse in">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<h3>Orders</h3>
						<ol class="breadcrumb pull-left">
							<li><a href="{{ route('home') }}">Dashboard</a></li>
							<li class="active"><span>Orders</span></li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<section>
	<div class="row">
		<div class="col-md-12">
			@if(session('order_updated'))
			<li class="alert alert-success">{{ session('order_updated') }}</li>
			@endif
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="table-wrap">
						<div class="table-responsive">
							<table id="datable_1" class="table table-hover display  pb-30" >
								<thead>
									<tr>
										<th>Order No</th>
										<th>Amount</th>
										<th>Status</th>
										<th>User</th>
										<th>Created At</th>
										@if(auth::user()->can('Get_Order') || auth::user()->can('Update_Order'))
										<th style="width: 300px;">Action</th>
										@endif
									</tr>
								</thead>
								<tbody>
									@foreach($orders as $order)
									<tr>
										<td>
											{{ $order->order_no }}
											<pre style="color: blue;">{{$order->created_at->diffForHumans()}}</pre>
										</td>
										<td>{{ $order->amount }}</td>
										<td><span class="badge badge-info">{{ $order->order_status }}</span></td>
										<th><a href="#">{{ $order->user->name }}</a></th>
										<td>{{ $order->created_at }}</td>
										@if(auth::user()->can('Get_Order') || auth::user()->can('Update_Order'))
										<td>
											@if(auth::user()->can('Get_Order'))
											<a href="{{ route('order.show', $order->order_no) }}" type="button" class="btn btn-primary btn-outline btn-sm btn-rounded"><i class="ti-eye"></i>&nbsp;&nbsp;&nbsp;View</a>
											@endif
											@if(auth::user()->can('Update_Order'))
											<a href="{{ route('order.edit', $order->order_no) }}" type="button" class="btn btn-success btn-outline btn-sm btn-rounded"><i class="ti-pencil"></i>&nbsp;&nbsp;&nbsp;Update Order</a>
											@endif
										</td>
										@endif
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
</section>
@endsection