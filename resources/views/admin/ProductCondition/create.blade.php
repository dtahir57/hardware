@extends('admin.app')

@section('admin-title', 'New Product Condition')

@section('admin-content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default card-view">
			<div class="pannel-wrapper collapse in">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<h3>Product Conditions</h3>
						<ol class="breadcrumb pull-left">
							<li><a href="{{ route('home') }}">Dashboard</a></li>
							<li><a href="{{ route('product_condition.index') }}">Product Conditions</a></li>
							<li class="active"><span>Create</span></li>
						</ol>
					</div>
					<div class="col-md-6 col-sm-6">
						@if(auth::user()->can('View_Product_Condition'))
						<a href="{{ route('product_condition.index') }}" type="button" class="btn btn-danger btn-rounded pull-right"><i class="ti ti-list"></i>&nbsp;&nbsp;&nbsp;View All</a>
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
						<h6 class="panel-title txt-dark">New Product Condition</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="form-wrap">
							<form action="{{ route('product_condition.store') }}" method="POST">
								@csrf
								<div class="row">
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Initials</label>
										<input type="text" name="initials" class="form-control" placeholder="Initials" value="{{ old('initials') }}" />
									</div>
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Short Description</label>
										<input type="text" name="short_description" class="form-control" placeholder="Short Description" value="{{ old('short_description') }}" required />
									</div>
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Long Description</label>
										<textarea name="long_description" class="form-control" placeholder="Long Description" rows="6">{{ old('long_description') }}</textarea>
									</div>
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Warranty</label>
										<input type="text" name="warranty" class="form-control" placeholder="Warranty" value="{{ old('warranty') }}" required />
									</div>
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Warranty Description</label>
										<textarea name="warranty_description" class="form-control" placeholder="Warranty Description" rows="6">{{ old('warranty_description') }}</textarea>
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