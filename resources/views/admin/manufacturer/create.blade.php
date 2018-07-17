@extends('admin.app')

@section('admin-title', 'New Manufacturer')

@section('admin-content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default card-view">
			<div class="pannel-wrapper collapse in">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<h3>Manufacturers</h3>
						<ol class="breadcrumb pull-left">
							<li><a href="{{ route('home') }}">Dashboard</a></li>
							<li><a href="{{ route('manufacturer.index') }}">Manufacturers</a></li>
							<li class="active"><span>Create</span></li>
						</ol>
					</div>
					<div class="col-md-6 col-sm-6">
						@if(auth::user()->can('View_Manufacturer'))
						<a href="{{ route('manufacturer.index') }}" type="button" class="btn btn-danger btn-rounded pull-right"><i class="ti ti-list"></i>&nbsp;&nbsp;&nbsp;View All</a>
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
						<h6 class="panel-title txt-dark">New Category</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="form-wrap">
							<form action="{{ route('manufacturer.store') }}" method="POST" enctype="multipart/form-data">
								@csrf
								<div class="row">
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Manufacturer Name</label>
										<input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Manufacturer Name" required />
									</div>
									<div class="form-group col-md-6">
										<label class="control-label md-10 text-left">Image</label>
										<input type="file" name="image" class="form-control" required accept="image/*" />
									</div>
									<div class="form-group col-md-6">
										<div class="checkbox checkbox-success">
											<input id="checkbox4" type="checkbox" name="is_active" value="1" />
											<label for="checkbox4"> Active</label>
										</div>
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