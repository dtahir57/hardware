@extends('admin.app')

@section('admin-title', 'Edit Attribute')

@section('admin-content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default card-view">
			<div class="pannel-wrapper collapse in">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<h3>Attributes</h3>
						<ol class="breadcrumb pull-left">
							<li><a href="{{ route('home') }}">Dashboard</a></li>
							<li><a href="{{ route('attribute.index') }}">Attributes</a></li>
							<li class="active"><span>Edit</span></li>
						</ol>
					</div>
					<div class="col-md-6 col-sm-6">
						@if(auth::user()->can('View_Attribute'))
						<a href="{{ route('attribute.index') }}" type="button" class="btn btn-danger btn-rounded pull-right"><i class="ti ti-list"></i>&nbsp;&nbsp;&nbsp;View All</a>
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
						<h6 class="panel-title txt-dark">Edit Attribute</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="form-wrap">
							<form action="{{ route('attribute.update', $attribute->id) }}" method="POST">
								<input type="hidden" name="_method" value="PATCH">
								@csrf
								<div class="row">
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Type</label>
										<select class="form-control" name="type" required>
											<option selected disabled>Please Select an Option</option>
											<option value="text" @if($attribute->type == 'text') selected @endif>Text</option>
											<option value="textarea" @if($attribute->type == 'textarea') selected @endif>TextArea</option>
											<option value="date" @if($attribute->type == 'date') selected @endif>Date</option>
											<option value="number" @if($attribute->type == 'number') selected @endif>Number</option>
											<option value="select" @if($attribute->type == 'select') selected @endif>Select</option>
											<option value="checkbox" @if($attribute->type == 'checkbox') selected @endif>CheckBox</option>
											<option value="radio" @if($attribute->type == 'radio') selected @endif>Radio</option>
											<option value="MultiValues" @if($attribute->type == 'MultiValues') selected @endif>Multi Values</option>
											<option value="label" @if($attribute->type == 'label') selected @endif>Label</option>
										</select>
									</div>
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Label</label>
										<input type="text" name="label" class="form-control" placeholder="Label" value="{{ $attribute->label }}" required />
									</div>
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Order</label>
										<input type="number" name="order" class="form-control" placeholder="Order" value="{{ $attribute->order }}" required />
									</div>
									<div class="form-group col-md-6">
										<div class="checkbox checkbox-success">
											<input id="checkbox4" type="checkbox" name="use_as_filter" value="1" @if($attribute->use_as_filter) checked @endif />
											<label for="checkbox4"> Use As Filter</label>
										</div>
										<div class="checkbox checkbox-success">
											<input id="checkbox4" type="checkbox" name="is_required" value="1" @if($attribute->is_required) checked @endif />
											<label for="checkbox4"> Required</label>
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