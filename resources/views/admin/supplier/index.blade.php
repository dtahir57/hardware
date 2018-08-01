@extends('admin.app')

@section('admin-title', 'Suppliers')

@section('admin-content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default card-view">
			<div class="pannel-wrapper collapse in">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<h3>Suppliers</h3>
						<ol class="breadcrumb pull-left">
							<li><a href="{{ route('home') }}">Dashboard</a></li>
							<li class="active"><span>Suppliers</span></li>
						</ol>
					</div>
					<div class="col-md-6 col-sm-6">
						@if(auth::user()->can('Add_Supplier'))
						<a href="{{ route('supplier.create') }}" type="button" class="btn btn-danger btn-rounded pull-right"><i class="ti ti-plus"></i>&nbsp;&nbsp;&nbsp;Supplier</a>
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
										<th>Supplier Code</th>
										<th>Company Name</th>
										<th>Company Address</th>
										<th>Company Webpage</th>
										<th>First Name</th>
										<th>Last Name</th>
										<th>Phone Number</th>
										<th>Email</th>
										<th>Skype</th>
										<th>Whatsapp</th>
										<th>Notes</th>
										@if(auth::user()->can('Edit_Supplier') || auth::user()->can('Delete_Supplier'))
										<th style="width: 250px;">Action</th>
										@endif
									</tr>
								</thead>
								<tbody>
									@foreach($suppliers as $supplier)
									<tr>
										<td>{{ $loop->index + 1 }}</td>
										<td style="text-transform: capitalize;">{{ $supplier->supplier_code }}</td>
										<td>{{ $supplier->company_name }}</td>
										<td>{{ $supplier->company_address }}</td>
										<td>{{ $supplier->company_webpage }}</td>
										<td>{{ $supplier->first_name }}</td>
										<td>{{ $supplier->last_name }}</td>
										<td>{{ $supplier->phone_number }}</td>
										<td>{{ $supplier->email }}</td>
										<td>{{ $supplier->skype }}</td>
										<td>{{ $supplier->whatsapp }}</td>
										<td>{{ $supplier->notes }}</td>
										@if(auth::user()->can('Edit_Supplier') || auth::user()->can('Delete_Supplier'))
										<td>
											@if(auth::user()->can('Edit_Supplier'))
											<a href="{{ route('supplier.edit', $supplier->id) }}" type="button" class="btn btn-primary btn-outline btn-sm btn-rounded"><i class="ti-pencil"></i></a>
											@endif
											@if(auth::user()->can('Delete_Supplier'))
											<a href="{{ route('supplier.destroy', $supplier->id) }}" type="button" class="btn btn-danger btn-outline btn-sm btn-rounded"><i class="ti-trash"></i></a>
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