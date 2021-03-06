@extends('admin.app')

@section('admin-title', 'New Category')

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
							<li><a href="{{ route('category.index') }}">Categories</a></li>
							<li class="active"><span>Create</span></li>
						</ol>
					</div>
					<div class="col-md-6 col-sm-6">
						@if(auth::user()->can('View_Category'))
						<a href="{{ route('category.index') }}" type="button" class="btn btn-danger btn-rounded pull-right"><i class="ti ti-list"></i>&nbsp;&nbsp;&nbsp;View All</a>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<section>
	<div class="row">
		<div class="col-lg-12">
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
							<form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
								@csrf
								<div class="row">
									<div class="col-md-8">
										<div class="form-group col-sm-6">
											<label class="control-label mb-10 text-left">Title</label>
											<input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="Title" required />
										</div>
										<div class="form-group col-sm-6">
											<label class="control-label md-10 text-left">Thumbnail</label>
											<input type="file" name="thumbnail" class="form-control" required accept="image/*" />
										</div>
										<div class="form-group col-sm-12">
											<label class="control-label mb-10 text-left">Description</label>
											<textarea rows="10" class="form-control" name="description" placeholder="Category Description">{{ old('description') }}</textarea>
										</div>
									</div>
									<div class="col-md-4">
										<h4>Chose Parent Category</h4>
										<br>
										@foreach($categories as $_category)
										<div class="radio radio-success">
											<input type="radio" name="parent_category" id="radio3" value="{{ $_category->id }}" />
											<label for="radio3"> {{ $_category->title }} </label>
										</div>
										@endforeach
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