@extends('admin.app')

@section('admin-title', 'Attributes')

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
							<li class="active"><span>Attributes</span></li>
						</ol>
					</div>
					<div class="col-md-6 col-sm-6">
						@if(auth::user()->can('Add_Attribute'))
						<a href="{{ route('attribute.create') }}" type="button" class="btn btn-danger btn-rounded pull-right"><i class="ti ti-plus"></i>&nbsp;&nbsp;&nbsp;Attribute</a>
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
										<th>Type</th>
										<th>Label</th>
										<th>Order</th>
										<th style="width: 60px;">Use As Filter</th>
										<th style="width: 60px;">Required</th>
										@if(auth::user()->can('Edit_Attribute') || auth::user()->can('Delete_Attribute'))
										<th style="width: 300px;">Action</th>
										@endif
									</tr>
								</thead>
								<tbody>
									@foreach($attributes as $attribute)
									<tr>
										<td>{{ $loop->index + 1 }}</td>
										<td style="text-transform: capitalize;">{{ $attribute->type }}</td>
										<td>{{ $attribute->label }}</td>
										<td>{{ $attribute->order }}</td>
										<td>
											@if($attribute->use_as_filter)
											<span class="badge badge-success">YES</span>
											@else
											<span class="badge badge-danger">NO</span>
											@endif
										</td>
										<td>
											@if($attribute->is_required)
											<span class="badge badge-success">YES</span>
											@else
											<span class="badge badge-danger">NO</span>
											@endif
										</td>
										@if(auth::user()->can('Edit_Attribute') || auth::user()->can('Delete_Attribute'))
										<td>
											@if(auth::user()->can('Edit_Attribute'))
											<a href="{{ route('attribute.edit', $attribute->id) }}" type="button" class="btn btn-primary btn-outline btn-sm btn-rounded"><i class="ti-pencil"></i>&nbsp;&nbsp;&nbsp;Edit</a>
											@endif
											@if(auth::user()->can('Delete_Attribute'))
											<a href="{{ route('attribute.destroy', $attribute->id) }}" type="button" class="btn btn-danger btn-outline btn-sm btn-rounded"><i class="ti-trash"></i>&nbsp;&nbsp;&nbsp;Delete</a>
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