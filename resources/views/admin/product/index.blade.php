@extends('admin.app')

@section('admin-title', 'Products')

@section('admin-content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default card-view">
			<div class="pannel-wrapper collapse in">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<h3>Products</h3>
						<ol class="breadcrumb pull-left">
							<li><a href="{{ route('home') }}">Dashboard</a></li>
							<li class="active"><span>Products</span></li>
						</ol>
					</div>
					<div class="col-md-6 col-sm-6">
						@if(auth::user()->can('Add_Product'))
						<a href="{{ route('product.create') }}" type="button" class="btn btn-danger btn-rounded pull-right"><i class="ti ti-plus"></i>&nbsp;&nbsp;&nbsp;Product</a>
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
										<th>Price</th>
										<th>Shippable</th>
										<th>Brand</th>
										<th>Categories</th>
										<th style="width: 70px;">Status</th>
										@if(auth::user()->can('Edit_Product') || auth::user()->can('Delete_Product'))
										<th style="width: 250px;">Action</th>
										@endif
									</tr>
								</thead>
								<tbody>
									@foreach($products as $product)
									<tr>
										<td>{{ $loop->index + 1 }}</td>
										<td><img src="{{ Storage::url($product->product_has_images{0}->img_url) }}" style="width: 50px; height: 50px;"></td>
										<td style="text-transform: capitalize;">{{ $product->name }}</td>
										<td>{{ $product->product_has_price->plc_hardware_price }}</td>
										<td>
										@if($product->is_shippable)
										<i class="ti-truck" style="color: green;"></i>
										@else
										<i class="ti-close"></i>
										@endif
										</td>
										<td>{{ $product->manufacturer->name }}</td>
										<td>
											@foreach($product->categories as $category)
											<span class="badge badge-success"><i class="ti-folder"></i> {{ $category->title }}</span>
											@endforeach
										</td>
										<td>
											@if($product->is_active)
											<span class="badge badge-success">YES</span>
											@else
											<span class="badge badge-danger">NO</span>
											@endif
										</td>
										@if(auth::user()->can('Edit_Product') || auth::user()->can('Delete_Product'))
										<td>
											@if(auth::user()->can('Edit_Product'))
											<a href="{{ route('product.edit', $product->id) }}" type="button" class="btn btn-primary btn-outline btn-sm btn-rounded"><i class="ti-pencil"></i></a>
											@endif
											@if(auth::user()->can('Delete_Product'))
											<a href="{{ route('product.destroy', $product->id) }}" type="button" class="btn btn-danger btn-outline btn-sm btn-rounded"><i class="ti-trash"></i></a>
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