@extends('admin.app')

@section('admin-title', 'Products')

@section('admin-content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default card-view">
			<div class="pannel-wrapper collapse in">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<h3>Products</h3>
						<ol class="breadcrumb pull-left">
							<li><a href="{{ route('home') }}">Dashboard</a></li>
							<li class="active"><span>Products</span></li>
						</ol>
					</div>
					<div class="col-md-6 col-sm-6">
						@if(auth::user()->can('Add_Product'))
						<a href="{{ route('product.create') }}" type="button" class="btn btn-danger btn-rounded pull-right"><i class="ti ti-plus"></i>&nbsp;&nbsp;&nbsp;Product</a>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection