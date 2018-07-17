@extends('admin.app')

@section('admin-title', 'Edit Role')

@section('admin-content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default card-view">
			<div class="pannel-wrapper collapse in">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<h3>Roles</h3>
						<ol class="breadcrumb pull-left">
							<li><a href="{{ route('home') }}">Dashboard</a></li>
							<li><a href="{{ route('role.index') }}">Roles</a></li>
							<li class="active"><span>Edit</span></li>
						</ol>
					</div>
					<div class="col-md-6 col-sm-6">
						@if(auth::user()->can('View_Role'))
						<a href="{{ route('role.index') }}" type="button" class="btn btn-danger btn-rounded pull-right"><i class="ti ti-list"></i>&nbsp;&nbsp;&nbsp;View All</a>
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
						<h6 class="panel-title txt-dark">Edit Role</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="form-wrap">
							<form action="{{ route('role.update', $role->id) }}" method="POST">
								@csrf
								<input type="hidden" name="_method" value="PATCH">
								<div class="row">
									<div class="form-group col-md-12">
										<label class="control-label mb-10 text-left">Role Name</label>
										<input type="text" name="name" class="form-control" placeholder="Role Name" value="{{ $role->name }}" required />
									</div>
								</div>
								<br>
								<h4>Assigned Permissions to {{ $role->name }}</h4>
								<br>
								@foreach($permissions as $permission)
								<div class="col-md-3">
									<div class="checkbox checkbox-success">
										<input id="checkbox4" type="checkbox" name="permissions[]" value="{{ $permission->name }}" @if ($role->hasPermissionTo($permission)) checked @endif>
										<label for="checkbox4"> {{ $permission->name }}</label>
									</div>
								</div>
								@endforeach
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