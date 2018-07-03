@extends('admin.app')

@section('admin-title', 'Edit Permission')

@section('admin-content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default card-view">
			<div class="pannel-wrapper collapse in">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<h3>Permissions</h3>
						<ol class="breadcrumb pull-left">
							<li><a href="{{ route('home') }}">Dashboard</a></li>
							<li><a href="{{ route('permission.index') }}">Permissions</a></li>
							<li class="active"><span>Edit</span></li>
						</ol>
					</div>
					<div class="col-md-6 col-sm-6">
						@if(auth::user()->can('View_Permission'))
						<a href="{{ route('permission.index') }}" type="button" class="btn btn-danger btn-rounded pull-right"><i class="ti ti-list"></i>&nbsp;&nbsp;&nbsp;View All</a>
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
						<h6 class="panel-title txt-dark">Edit Permission</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="form-wrap">
							<form action="{{ route('permission.update', $permission->id) }}" method="POST">
								@csrf
								<input type="hidden" name="_method" value="PATCH">
								<div class="row">
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Module</label>
										<input type="text" name="module" value="{{ $permission->module }}" class="form-control" placeholder="Module" required />
									</div>
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Permission Name</label>
										<input type="text" name="name" class="form-control" placeholder="Permission Name" value="{{ $permission->name }}" required />
									</div>
								</div>
								<input type="submit" value="Save" class="btn btn-success pull-right" />
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection