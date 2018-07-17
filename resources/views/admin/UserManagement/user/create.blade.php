@extends('admin.app')

@section('admin-title', 'Add new User')

@section('admin-content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default card-view">
			<div class="pannel-wrapper collapse in">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<h3>Users</h3>
						<ol class="breadcrumb pull-left">
							<li><a href="{{ route('home') }}">Dashboard</a></li>
							<li><a href="{{ route('user.index') }}">Users</a></li>
							<li class="active"><span>Create</span></li>
						</ol>
					</div>
					<div class="col-md-6 col-sm-6">
						@if(auth::user()->can('View_User'))
						<a href="{{ route('user.index') }}" type="button" class="btn btn-danger btn-rounded pull-right"><i class="ti ti-list"></i>&nbsp;&nbsp;&nbsp;View All</a>
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
			@foreach($errors->all() as $error)
			<li class="alert alert-danger">{{ $error }}</li>	
			@endforeach
			<div class="panel panel-default card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">New User</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="form-wrap">
							<form action="{{ route('user.store') }}" method="POST">
								@csrf
								<div class="row">
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Name</label>
										<input type="text" name="name" class="form-control" placeholder="Username" value="{{ old('name') }}" required />
									</div>
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Email</label>
										<input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required />
									</div>
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Password</label>
										<input type="password" name="password" class="form-control" placeholder="Password" required />
									</div>
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Password Confirmation</label>
										<input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required />
									</div>
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Role</label>
										<select class="form-control select2" name="role">
											<option selected disabled>Please Select an Option</option>
											@foreach($roles as $role)
											<option value="{{$role->name}}">{{ $role->name }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<input type="submit" value="Save" class="btn btn-success pull-right">
							</form>
						</div>
					</div>
				</div>
			</div><!-- /.panel -->
		</div>
	</div>
</section>
@endsection