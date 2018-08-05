@extends('admin.app')

@section('admin-title', 'E-Commerce Settings')

@section('admin-content')
<div class="row">
	<div class="col-lg-12">
		@if(session('created'))
			<li class="alert alert-success">{{ session('created') }}</li>
		@endif
		@if(session('updated'))
			<li class="alert alert-success">{{ session('updated') }}</li>
		@endif
		@if(session('search_created'))
			<li class="alert alert-success">{{ session('search_created') }}</li>
		@endif
		@if(session('search_updated'))
			<li class="alert alert-success">{{ session('search_updated') }}</li>
		@endif
		<div class="panel panel-default card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h4 class="panel-title txt-dark">E-Commerce Settings</h4>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div  class="pills-struct mt-40">
						<ul role="tablist" class="nav nav-pills" id="myTabs_6">
							<li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_6" href="#shipping">Shipping</a></li>
							<li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_6" role="tab" href="#search" aria-expanded="false">Search</a></li>
						</ul>
						<div class="tab-content" id="myTabContent_6">
							<div id="shipping" class="tab-pane fade active in col-md-6" role="tabpanel">
								<form method="POST" action="{{ route('setting.shipping.store') }}">
									@csrf
									<div class="form-group">
										<label for="control-label">Weight Unit</label>
										<select class="form-control" name="weight" required>
											<option disabled selected>Please Select an Option</option>
											<option value="kg" @if (isset($shipping) AND $shipping->weight == 'kg') selected @endif>Kg</option>
											<option value="lbs" @if (isset($shipping) AND $shipping->weight == 'lbs') selected @endif>Lbs</option>
											<option value="oz" @if (isset($shipping) AND $shipping->weight == 'oz') selected @endif>Oz</option>
										</select>
									</div>
									<div class="form-group">
										<label for="control-label">Dimension Unit</label>
										<select class="form-control" name="dimensions" required>
											<option disabled selected>Please Select an Option</option>
											<option value="m" @if (isset($shipping) AND $shipping->dimensions == 'm') selected @endif>m</option>
											<option value="cm" @if (isset($shipping) AND $shipping->dimensions == 'cm') selected @endif>cm</option>
											<option value="mm" @if (isset($shipping) AND $shipping->dimensions == 'mm') selected @endif>mm</option>
											<option value="in" @if (isset($shipping) AND $shipping->dimensions == 'in') selected @endif>in</option>
											<option value="yd" @if (isset($shipping) AND $shipping->dimensions == 'yd') selected @endif>yd</option>
										</select>
									</div>
									<div class="form-group">
										<div class="checkbox checkbox-success">
											<input id="checkbox4" type="checkbox" name="tax" value="1" @if (isset($shipping) AND $shipping->tax) checked @endif />
											<label for="checkbox4"> Enable Tax</label>
										</div>
									</div>
									<div class="form-group">
										<div class="checkbox checkbox-success">
											<input id="checkbox4" type="checkbox" name="wishlist" value="1" @if (isset($shipping) AND $shipping->wishlist) checked @endif />
											<label for="checkbox4"> Enable Wishlist</label>
										</div>
									</div>
									<input type="submit" class="btn btn-success" value="Save" />
								</form>
							</div>
							<div  id="search" class="tab-pane fade col-md-6" role="tabpanel">
								<form action="{{ route('setting.search.store') }}" method="POST">
									@csrf
									<div class="form-group">
										<label>Title Weight</label>
										<input type="number" name="title_weight" min="1" class="form-control" @if(isset($search)) value="{{ $search->title_weight }}" @else value="{{ old('title_weight') }}" @endif placeholder="Title Weight" />
									</div>
									<div class="form-group">
										<label>Content Weight</label>
										<input type="number" name="content_weight" step="any" @if(isset($search)) value="{{ $search->content_weight }}" @else value="{{ old('content_weight') }}" @endif class="form-control" placeholder="Content Weight" />
									</div>
									<div class="form-group">
										<div class="checkbox checkbox-success">
											<input id="checkbox4" type="checkbox" name="is_wildcard_search" value="1" @if(isset($search) AND $search->is_wildcard_search) checked @endif />
											<label for="checkbox4"> Enable Wild Card Search</label>
										</div>
									</div>
									<input type="submit" class="btn btn-success" value="Save" />
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection