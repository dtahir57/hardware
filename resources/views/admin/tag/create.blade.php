@extends('admin.app')

@section('admin-title', 'New Tag')

@section('admin-content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default card-view">
			<div class="pannel-wrapper collapse in">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<h3>Tags</h3>
						<ol class="breadcrumb pull-left">
							<li><a href="{{ route('home') }}">Dashboard</a></li>
							<li><a href="{{ route('tag.index') }}">Tags</a></li>
							<li class="active"><span>Create</span></li>
						</ol>
					</div>
					<div class="col-md-6 col-sm-6">
						@if(auth::user()->can('View_Tag'))
						<a href="{{ route('tag.index') }}" type="button" class="btn btn-danger btn-rounded pull-right"><i class="ti ti-list"></i>&nbsp;&nbsp;&nbsp;View All</a>
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
						<h6 class="panel-title txt-dark">New Tag</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="form-wrap">
							<form action="{{ route('tag.store') }}" method="POST">
								@csrf
								<div class="row">
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Tag Name</label>
										<input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}" required />
									</div>
									<div class="form-group col-md-6">
										<label>Status</label>
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