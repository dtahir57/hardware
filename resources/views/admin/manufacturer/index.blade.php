@extends('admin.app')

@section('admin-title', 'Manufacturer')

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
							<li class="active"><span>Manufacturers</span></li>
						</ol>
					</div>
					<div class="col-md-6 col-sm-6">
						@if(auth::user()->can('Add_Manufacturer'))
						<a href="{{ route('manufacturer.create') }}" type="button" class="btn btn-danger btn-rounded pull-right"><i class="ti ti-plus"></i>&nbsp;&nbsp;&nbsp;Manufacturer</a>
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
										<th style="width: 120px; height: 150px;">Image</th>
										<th>Name</th>
										<th>Slug</th>
										<th style="width: 60px;">Active</th>
										@if(auth::user()->can('Edit_Manufacturer') || auth::user()->can('Delete_Manufacturer'))
										<th style="width: 300px;">Action</th>
										@endif
									</tr>
								</thead>
								<tbody>
									@foreach($manufacturers as $manufacturer)
									<tr>
										<td>{{ $loop->index + 1 }}</td>
										<td><img src="{{ Storage::url($manufacturer->image) }}" class="img-responsive"></td>
										<td>{{ $manufacturer->name }}</td>
										<td><span class="badge badge-info">{{ $manufacturer->slug }}</span></td>
										<td>
											@if($manufacturer->is_active)
											<span class="badge badge-success">YES</span>
											@else
											<span class="badge badge-danger">NO</span>
											@endif
										</td>
										@if(auth::user()->can('Edit_Manufacturer') || auth::user()->can('Delete_Manufacturer'))
										<td>
											@if(auth::user()->can('Edit_Manufacturer'))
											<a href="{{ route('manufacturer.edit', $manufacturer->id) }}" type="button" class="btn btn-primary btn-outline btn-sm btn-rounded"><i class="ti-pencil"></i>&nbsp;&nbsp;&nbsp;Edit</a>
											@endif
											@if(auth::user()->can('Delete_Manufacturer'))
											<a href="{{ route('manufacturer.destroy', $manufacturer->id) }}" type="button" class="btn btn-danger btn-outline btn-sm btn-rounded"><i class="ti-trash"></i>&nbsp;&nbsp;&nbsp;Delete</a>
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