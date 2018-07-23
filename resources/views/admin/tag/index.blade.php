@extends('admin.app')

@section('admin-title', 'Tags')

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
							<li class="active"><span>Tags</span></li>
						</ol>
					</div>
					<div class="col-md-6 col-sm-6">
						@if(auth::user()->can('Add_Tag'))
						<a href="{{ route('tag.create') }}" type="button" class="btn btn-danger btn-rounded pull-right"><i class="ti ti-plus"></i>&nbsp;&nbsp;&nbsp;Tag</a>
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
										<th style="width: 20px;">#</th>
										<th>Name</th>
										<th>Slug</th>
										<th style="width: 60px;">Active</th>
										@if(auth::user()->can('Edit_Tag') || auth::user()->can('Delete_Tag'))
										<th style="width: 300px;">Action</th>
										@endif
									</tr>
								</thead>
								<tbody>
									@foreach($tags as $tag)
									<tr>
										<td>{{ $loop->index + 1 }}</td>
										<td>{{ $tag->name }}</td>
										<td><span class="badge badge-info">{{ $tag->slug }}</span></td>
										<td>
											@if($tag->is_active)
											<span class="badge badge-success">YES</span>
											@else
											<span class="badge badge-danger">NO</span>
											@endif
										</td>
										@if(auth::user()->can('Edit_Tag') || auth::user()->can('Delete_Tag'))
										<td>
											@if(auth::user()->can('Edit_Tag'))
											<a href="{{ route('tag.edit', $tag->id) }}" type="button" class="btn btn-primary btn-outline btn-sm btn-rounded"><i class="ti-pencil"></i>&nbsp;&nbsp;&nbsp;Edit</a>
											@endif
											@if(auth::user()->can('Delete_Tag'))
											<a href="{{ route('tag.destroy', $tag->id) }}" type="button" class="btn btn-danger btn-outline btn-sm btn-rounded"><i class="ti-trash"></i>&nbsp;&nbsp;&nbsp;Delete</a>
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