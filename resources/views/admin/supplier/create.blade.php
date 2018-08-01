@extends('admin.app')

@section('admin-title', 'New Supplier')

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
							<li><a href="{{ route('supplier.index') }}">Suppliers</a></li>
							<li class="active"><span>Create</span></li>
						</ol>
					</div>
					<div class="col-md-6 col-sm-6">
						@if(auth::user()->can('View_Supplier'))
						<a href="{{ route('supplier.index') }}" type="button" class="btn btn-danger btn-rounded pull-right"><i class="ti ti-list"></i>&nbsp;&nbsp;&nbsp;View All</a>
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
						<h6 class="panel-title txt-dark">New Supplier</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="form-wrap">
							<form action="{{ route('supplier.store') }}" method="POST">
								@csrf
								<div class="row">
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Company Name</label>
										<input type="text" name="company_name" placeholder="Company Name" class="form-control" value="{{ old('company_name') }}" />
									</div>
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Company Address</label>
										<input type="text" name="company_address" class="form-control" placeholder="Company Address" value="{{ old('company_address') }}" required />
									</div>
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Company Webpage</label>
										<input type="text" name="company_webpage" class="form-control" placeholder="Company Webpage" value="{{ old('company_webpage') }}" required />
									</div>
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">First Name</label>
										<input type="text" name="first_name" class="form-control" placeholder="First Name" value="{{ old('first_name') }}" required />
									</div>
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Last Name</label>
										<input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{ old('last_name') }}" required />
									</div>
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Phone Number</label>
										<input type="text" name="phone_number" class="form-control" placeholder="Phone Number" value="{{ old('phone_number') }}" required />
									</div>
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Email</label>
										<input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required />
									</div>
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Skype</label>
										<input type="text" name="skype" class="form-control" placeholder="Skype (Optional)" value="{{ old('skype') }}" />
									</div>
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Whatsapp</label>
										<input type="text" name="whatsapp" class="form-control" placeholder="Whatsapp (Optional)" value="{{ old('whatsapp') }}" />
									</div>
									<div class="form-group col-md-12">
										<label class="control-label md-10 text-left">Notes</label>
										<textarea class="form-control" rows="8" placeholder="Notes" name="notes">{{ old('notes') }}</textarea>
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