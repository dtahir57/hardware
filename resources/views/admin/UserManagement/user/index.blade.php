@extends('admin.app')

@section('admin-title', 'Users')

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
							<li class="active"><span>Users</span></li>
						</ol>
					</div>
					<div class="col-md-6 col-sm-6">
						@if(auth::user()->can('Add_User'))
						<a href="{{ route('user.create') }}" type="button" class="btn btn-danger btn-rounded pull-right"><i class="ti ti-plus"></i>&nbsp;&nbsp;&nbsp;User</a>
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
										<th>#</th>
										<th>Name</th>
										<th>Email</th>
										@if(auth::user()->can('Edit_User') || auth::user()->can('Delete_User'))
										<th>Action</th>
										@endif
									</tr>
								</thead>
								<tbody>
									@foreach($users as $user)
									<tr>
										<td>{{ $loop->index + 1 }}</td>
										<td>{{ $user->name }}</td>
										<td>{{ $user->email }}</td>
										@if(auth::user()->can('Edit_User') || auth::user()->can('Delete_User'))
										<td>
											@if(auth::user()->can('Edit_User'))
											<a href="{{ route('user.edit', $user->id) }}" type="button" class="btn btn-primary btn-outline btn-sm btn-rounded"><i class="ti-pencil"></i>&nbsp;&nbsp;&nbsp;Edit</a>
											@endif
											@if(auth::user()->can('Delete_User'))
											<a href="{{ route('user.destroy', $user->id) }}" type="button" class="btn btn-danger btn-outline btn-sm btn-rounded"><i class="ti-trash"></i>&nbsp;&nbsp;&nbsp;Delete</a>
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