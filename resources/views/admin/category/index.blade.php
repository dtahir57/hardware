@extends('admin.app')

@section('admin-title', 'Categories')

@section('admin-content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default card-view">
			<div class="pannel-wrapper collapse in">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<h3>Categories</h3>
						<ol class="breadcrumb pull-left">
							<li><a href="{{ route('home') }}">Dashboard</a></li>
							<li class="active"><span>Categories</span></li>
						</ol>
					</div>
					<div class="col-md-6 col-sm-6">
						@if(auth::user()->can('Add_Category'))
						<a href="{{ route('category.create') }}" type="button" class="btn btn-danger btn-rounded pull-right"><i class="ti ti-plus"></i>&nbsp;&nbsp;&nbsp;Category</a>
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
			@if(session('feature'))
				<li class="alert alert-success">{{ session('feature') }}</li>
			@endif
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="table-wrap">
						<div class="table-responsive">
							<table id="datable_1" class="table table-hover display  pb-30" >
								<thead>
									<tr>
										<th style="width: 10px;">#</th>
										<th style="width: 120px; height: 150px;">Thumbnail</th>
										<th>Title</th>
										<th>Description</th>
										<th style="width: 60px;">Active</th>
										<th style="width: 60px;">Feature</th>
										@if(auth::user()->can('Edit_Category') || auth::user()->can('Delete_Category'))
										<th style="width: 300px;">Action</th>
										@endif
										@if(auth::user()->can('Feature_Category'))
										<th style="width: 100px;">Feature</th>
										@endif
									</tr>
								</thead>
								<tbody>
									@foreach($categories as $category)
									<tr>
										<td>{{ $loop->index + 1 }}</td>
										<td><img src="{{ Storage::url($category->thumbnail) }}" class="img-responsive"></td>
										<td>{{ $category->title }}</td>
										<td>{{ $category->description }}</td>
										<td>
											@if($category->is_active)
											<span class="badge badge-success">YES</span>
											@else
											<span class="badge badge-danger">NO</span>
											@endif
										</td>
										<td>
											@if($category->is_featured)
											<span class="badge badge-success">YES</span>
											@else
											<span class="badge badge-danger">NO</span>
											@endif
										</td>
										@if(auth::user()->can('Edit_Category') || auth::user()->can('Delete_Category'))
										<td>
											@if(auth::user()->can('Edit_Category'))
											<a href="{{ route('category.edit', $category->id) }}" type="button" class="btn btn-primary btn-outline btn-sm btn-rounded"><i class="ti-pencil"></i>&nbsp;&nbsp;&nbsp;Edit</a>
											@endif
											@if(auth::user()->can('Delete_Category'))
											<a href="{{ route('category.destroy', $category->id) }}" type="button" class="btn btn-danger btn-outline btn-sm btn-rounded"><i class="ti-trash"></i>&nbsp;&nbsp;&nbsp;Delete</a>
											@endif
										</td>
										@endif
										<td>
											@if(auth::user()->can('Feature_Category'))
											<form action="{{ route('category.feature') }}" method="POST">
												@csrf
												<input type="hidden" name="category_id" value="{{ $category->id }}">
												<button type="submit" class="btn btn-warning btn-outline"><i class="ti-star"></i></button>
											</form>
											@endif
										</td>
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