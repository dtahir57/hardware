@extends('admin.app')

@section('admin-title', 'Shipping Rules')

@section('admin-content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default card-view">
			<div class="pannel-wrapper collapse in">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<h3>Shipping Rules</h3>
						<ol class="breadcrumb pull-left">
							<li><a href="{{ route('home') }}">Dashboard</a></li>
							<li class="active"><span>Shipping Rules</span></li>
						</ol>
					</div>
					<div class="col-md-6 col-sm-6">
						@if(auth::user()->can('Add_Shipping_Rule'))
						<a href="{{ route('shipping_rule.create') }}" type="button" class="btn btn-danger btn-rounded pull-right"><i class="ti ti-plus"></i>&nbsp;&nbsp;&nbsp;Shipping Rule</a>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<section>
	<div class="row">
		<div class="col-md-12">
			@if(session('created'))
				<li class="alert alert-success">{{ session('created') }}</li>
			@endif
			@if(session('updated'))
				<li class="alert alert-success">{{ session('updated') }}</li>
			@endif
			@if(session('deleted'))
				<li class="alert alert-success">{{ session('deleted') }}</li>
			@endif
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="table-wrap">
						<div class="table-responsive">
							<table id="datable_1" class="table table-hover display  pb-30" >
								<thead>
									<tr>
										<th style="width: 10px;">#</th>
										<th>Thumbnail</th>
										<th>Name</th>
										<th>Priority</th>
										<th>Country</th>
										<th>Shipping Provider</th>
										<th>Shipping Features</th>
										<th>Minimum Order Total</th>
										<th>Description</th>
										<th style="width: 60px;">Exclusive</th>
										@if(auth::user()->can('Edit_Shipping_Rule') || auth::user()->can('Delete_Shipping_Rule'))
										<th style="width: 250px;">Action</th>
										@endif
									</tr>
								</thead>
								<tbody>
									@foreach($shipping_rules as $shipping_rule)
									<tr>
										<td>{{ $loop->index + 1 }}</td>
										<td><img src="{{ Storage::url($shipping_rule->thumbnail) }}" style="width: 75px; height: 80px;"></td>
										<td style="text-transform: capitalize;">{{ $shipping_rule->name }}</td>
										<td>{{ $shipping_rule->priority }}</td>
										<td>{{ $shipping_rule->country }}</td>
										<td>{{ $shipping_rule->shipping_provider }}</td>
										<td>{{ $shipping_rule->shipping_features }}</td>
										<td>{{ $shipping_rule->minimum_order_total }}</td>
										<td>{{ $shipping_rule->description }}</td>
										<td>
											@if($shipping_rule->is_exclusive)
											<span class="badge badge-success">YES</span>
											@else
											<span class="badge badge-danger">NO</span>
											@endif
										</td>
										@if(auth::user()->can('Edit_Shipping_Rule') || auth::user()->can('Delete_Shipping_Rule'))
										<td>
											@if(auth::user()->can('Edit_Shipping_Rule'))
											<a href="{{ route('shipping_rule.edit', $shipping_rule->id) }}" type="button" class="btn btn-primary btn-outline btn-sm btn-rounded"><i class="ti-pencil"></i></a>
											@endif
											@if(auth::user()->can('Delete_Shipping_Rule'))
											<a href="{{ route('shipping_rule.destroy', $shipping_rule->id) }}" type="button" class="btn btn-danger btn-outline btn-sm btn-rounded"><i class="ti-trash"></i></a>
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