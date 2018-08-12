@extends('admin.app')

@section('admin-title', 'Update Order')

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
							<li><a href="{{ route('order.index') }}">Orders</a></li>
							<li class="active"><span>Update Order</span></li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<section>
	<div class="row">
		<div class="col-sm-12">
			@foreach($errors->all() as $error)
				<li class="alert alert-danger">{{ $error }}</li>
			@endforeach
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">Edit Manufacturer</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					@foreach($errors->all() as $error)
					<li class="alert alert-danger">{{ $error }}</li>
					@endforeach
					<div class="panel-body">
						<div class="form-wrap">
							<form action="{{ route('order.update', $order->order_no) }}" method="POST">
								@csrf
								<input type="hidden" name="_method" value="PATCH">
								<div class="row">
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Order Status</label>
										<select class="form-control" name="order_status" required>
											<option disabled selected>Please Select an Option</option>
											<option value="Pending" @if($order->order_status == 'Pending') selected @endif>Pending</option>
											<option value="Processing" @if($order->order_status == 'Processing') selected @endif>Processing</option>
											<option value="Canceled" @if($order->order_status == 'Canceled') selected @endif>Canceled</option>
											<option value="Completed" @if($order->order_status == 'Completed') selected @endif>Completed</option>
										</select>
									</div>
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Shipping Status</label>
										<select class="form-control" name="shipping_status" required>
											<option disabled selected>Please Select an Option</option>
											<option value="Pending" @if($order->shipping_status == 'Pending') selected @endif>Pending</option>
											<option value="Processing" @if($order->shipping_status == 'Processing') selected @endif>Processing</option>
											<option value="Canceled" @if($order->shipping_status == 'Canceled') selected @endif>Canceled</option>
											<option value="Completed" @if($order->shipping_status == 'Completed') selected @endif>Completed</option>
										</select>
									</div>
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Shipping Tracking Number</label>
										<input type="text" name="shipping_tracking_number" class="form-control" value="{{ $order->shipping_tracking_number }}" placeholder="Shipping Tracking Number" />
									</div>
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Shipping Label URL</label>
										<input type="text" name="shipping_label_url" class="form-control" value="{{ $order->shipping_label_url }}" placeholder="Shipping Label URL" />
									</div>
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left" required>Payment Status</label>
										<select class="form-control" name="payment_status">
											<option disabled selected>Please Select an Option</option>
											<option value="paid" @if($order->payment_status == 'paid') selected @endif>Paid</option>
											<option value="pending" @if($order->payment_status == 'pending') selected @endif>Pending</option>
											<option value="canceled" @if($order->payment_status == 'canceled') selected @endif>Canceled</option>
											<option value="refunded" @if($order->payment_status == 'refunded') selected @endif>Refunded</option>
										</select>
									</div>
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Payment Reference</label>
										<input type="text" name="payment_reference" class="form-control" value="{{ $order->payment_reference }}" placeholder="Payment Reference" />
									</div>
								</div>
								<input type="submit" value="Save" class="btn btn-success pull-right">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
</section>
@endsection