@extends('admin.app')

@section('admin-title', 'New Product')

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
							<li><a href="{{ route('product.index') }}">Products</a></li>
							<li class="active"><span>Create</span></li>
						</ol>
					</div>
					<div class="col-md-6 col-sm-6">
						@if(auth::user()->can('View_Product'))
						<a href="{{ route('product.index') }}" type="button" class="btn btn-danger btn-rounded pull-right"><i class="ti ti-list"></i>&nbsp;&nbsp;&nbsp;View All</a>
						@endif
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
						<h6 class="panel-title txt-dark">New Product</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="form-wrap">
							<form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
								@csrf
								<div class="row">
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Product Name</label>
										<input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="Title" required />
									</div>
									<div class="form-group col-md-6">
										<label class="control-label md-10 text-left">Product Images</label>
										<input type="file" name="product_img" class="form-control" required accept="image/*" multiple />
									</div>
									<div class="form-group col-md-6">
										<label class="control-label md-10 text-left">Series</label>
										<input type="text" name="series" value="{{ old('series') }}" placeholder="Series" class="form-control" required />
									</div>
									<div class="form-group col-md-12">
										<label class="control-label mb-10 text-left">Description</label>
										<textarea rows="10" class="form-control" name="description" placeholder="Category Description">{{ old('description') }}</textarea>
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