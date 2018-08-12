@extends('admin.app')

@section('admin-title', 'Orders')

@section('admin-content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default card-view">
			<div class="pannel-wrapper collapse in">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<h3>Order No. {{ $order->order_no }}</h3>
						<h4>Payment Status: <span class="badge badge-primary">{{ $order->payment_status }}</span></h4>
						<ol class="breadcrumb pull-left">
							<li><a href="{{ route('home') }}">Dashboard</a></li>
							<li><a href="{{ route('order.index') }}">Orders</a></li>
							<li class="active"><span>View</span></li>
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
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<h4>Order Details</h4>
					<div class="table-wrap">
						<div class="table-responsive">
							<table id="datable_1" class="table table-hover display  pb-30" >
								<thead>
									<tr>
										<th>ID</th>
										<th>Amount</th>
										<th>Status</th>
										<th>User</th>
										<th>Created At</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>{{ $order->id }}</td>
										<td>${{ $order->amount }}</td>
										<td><span class="badge badge-info">{{ $order->order_status }}</span></td>
										<th><a href="#">{{ $order->user->name }}</a></th>
										<td>{{ $order->created_at }}</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br>
		<div class="col-md-12">
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<h4>Items</h4>
					<div class="table-wrap">
						<div class="table-responsive">
							<table id="datable_1" class="table table-hover display  pb-30" >
								<thead>
									<tr>
										<th>Item</th>
										<th>Quantity</th>
										<th>Price</th>
									</tr>
								</thead>
								<tbody>
									@foreach($order->items as $item)
									<tr>
										<td>{{ $item->product_name }}</td>
										<td>{{ $item->qty }}</td>
										<td>${{ $item->price }}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<h4>Shipping Address</h4>
					<div class="table-wrap">
						<div class="table-responsive">
							<table id="datable_1" class="table table-hover display  pb-30" >
								<thead>
									<tr>
										<th>Name</th>
										<th>Email</th>
										<th>Phone Number</th>
										<th>Country</th>
										<th>City</th>
										<th>Zip Code</th>
										<th>Address 1</th>
										<th>Address 2</th>
										<th>Payment Method</th>
										<th>Order Status</th>
										<th>Shipping Status</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>{{ $order->fname }}</td>
										<td>{{ $order->email }}</td>
										<td>{{ $order->phone_number }}</td>
										<th>{{ $order->country }}</th>
										<th>{{ $order->city }}</th>
										<th>{{ $order->zip }}</th>
										<th>{{ $order->address1 }}</th>
										<th>{{ $order->address2 }}</th>
										<th><span class="badge badge-success">{{ $order->payment_method }}</span></th>
										<th><span class="badge badge-primary">{{ $order->order_status }}</span></th>
										<th><span class="badge badge-primary">{{ $order->shipping_status }}</span></th>
									</tr>
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