@extends('admin.app')

@section('admin-title', 'New Product')
<style type="text/css">
	.shippable {
		display: none;
	}
</style>
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
							<li><a href="{{ route('product.index') }}">Products</a></li>
							<li class="active"><span>Create</span></li>
						</ol>
					</div>
					<div class="col-md-6 col-sm-6">
						@if(auth::user()->can('View_Product'))
						<a href="{{ route('product.index') }}" type="button" class="btn btn-danger btn-rounded pull-right"><i class="ti ti-list"></i>&nbsp;&nbsp;&nbsp;View All</a>
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
						<h6 class="panel-title txt-dark">New Product</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="form-wrap">
							<form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
								@csrf
								<div class="row">
									<div class="col-md-8">
										<div class="form-group col-md-6">
											<label class="control-label mb-10 text-left">Product Name</label>
											<input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Product Name" required />
										</div>
										<div class="form-group col-md-6">
											<label class="control-label mb-10 text-left">Manufacturers</label>
											<select class="selectpicker" data-style="form-control btn-default btn-outline" required name="manufacturer_id">
												<option selected disabled>Please Select Manufacturer</option>
												@foreach($manufacturers as $manufacturer)
												<option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
												@endforeach
											</select>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label mb-10 text-left">Product Conditions</label>
											<select class="selectpicker" data-style="form-control btn-default btn-outline" required name="product_condition_id">
												<option selected disabled>Please Select Product Condition</option>
												@foreach($product_conditions as $product_condition)
												<option value="{{ $product_condition->id }}">{{ $product_condition->short_description }}</option>
												@endforeach
											</select>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label mb-10 text-left">Categories</label>
											<select class="selectpicker" multiple data-style="form-control btn-default btn-outline" name="categories[]" required>
												@foreach($categories as $category)
												<option value="{{ $category->id }}">{{ $category->title }}</option>
												@endforeach
											</select>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label mb-10 text-left">Attributes</label>
											<select class="selectpicker" multiple data-style="form-control btn-default btn-outline" name="attributes[]" required>
												@foreach($attributes as $attribute)
												<option value="{{ $attribute->id }}" style="text-transform: capitalize;">{{ $attribute->type }} | {{ $attribute->label }}</option>
												@endforeach
											</select>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label mb-10 text-left">Badges</label>
											<select class="selectpicker" data-style="form-control btn-default btn-outline" required name="badge_id">
												<option selected disabled>Please Select Badge</option>
												@foreach($badges as $badge)
												<option value="{{ $badge->id }}">{{ $badge->name }}</option>
												@endforeach
											</select>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label mb-10 text-left">Tags</label>
											<select class="selectpicker" multiple data-style="form-control btn-default btn-outline" name="tags[]" required>
												@foreach($tags as $tag)
												<option value="{{ $tag->id }}">{{ $tag->name }}</option>
												@endforeach
											</select>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label mb-10 text-left">Units</label>
											<select class="selectpicker" data-style="form-control btn-default btn-outline" required name="unit_id">
												<option selected disabled>Please Select Unit</option>
												@foreach($units as $unit)
												<option value="{{ $unit->id }}">{{ $unit->name }}</option>
												@endforeach
											</select>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label mb-10 text-left">Quantity</label>
											<input type="number" name="quantity" min="1" placeholder="Quantity" class="form-control" required />
										</div>
										<div class="form-group col-md-6">
											<label class="control-label mb-10 text-left">Minimum Quantity For Sale</label>
											<input type="number" name="min_quantity_for_sale" min="1" placeholder="Minimum Quantity For Sale" class="form-control" required />
										</div>
										<div class="form-group col-md-6">
											<label class="control-label mb-10 text-left">Retail Price</label>
											<input type="number" name="retail_price" min="1" placeholder="Retail Price" class="form-control" required />
										</div>
										<div class="form-group col-md-6">
											<label class="control-label mb-10 text-left">Supplier Price</label>
											<input type="number" name="supplier_price" min="1" placeholder="Supplier Price" class="form-control" required />
										</div>
										<div class="form-group col-md-6">
											<label class="control-label md-10 text-left">Product Images</label>
											<input type="file" name="product_img[]" class="form-control" required accept="image/*" multiple />
										</div>
										<div class="form-group col-md-6">
											<label class="control-label md-10 text-left">Series</label>
											<input type="text" name="series" value="{{ old('series') }}" placeholder="Series" class="form-control" required />
										</div>
										<div class="col-md-6">
											<div class="checkbox checkbox-success">
												<input id="checkbox4" type="checkbox" name="shippable" value="1" onclick="toggle('.shippable', this)" />
												<label for="checkbox4"> Shippable</label>
												<br>
												<br>
												<div class="shippable">
													<div class="form-group">
														<input type="number" name="width" class="form-control" min="0" placeholder="Width" required />
														@if (isset($setting))
														<pre class="pull-right text-muted">{{ $setting->dimensions }}</pre>
														@endif
													</div>
													<div class="form-group">
														<input type="number" name="height" class="form-control" min="0" placeholder="Height" required />
														@if (isset($setting))
														<pre class="pull-right text-muted">{{ $setting->dimensions }}</pre>
														@endif
													</div>
													<div class="form-group">
														<input type="number" name="length" class="form-control" min="0" placeholder="Length" required />
														@if (isset($setting))
														<pre class="pull-right text-muted">{{ $setting->dimensions }}</pre>
														@endif
													</div>
													<div class="form-group">
														<input type="number" name="weight" class="form-control" min="0" placeholder="Weight" required />
														@if (isset($setting))
														<pre class="pull-right text-muted">{{ $setting->weight }}</pre>
														@endif
													</div>
												</div>
											</div>
										</div>
										<div class="form-group col-md-6">
											<div class="checkbox checkbox-success">
												<input id="checkbox4" type="checkbox" name="is_featured" value="1" />
												<label for="checkbox4"> Featured</label>
											</div>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label mb-10 text-left">Notes</label>
											<input type="text" name="notes" placeholder="Notes" class="form-control" required value="{{ old('notes') }}" />
										</div>
										<div class="form-group col-md-6">
											<label class="control-label mb-10 text-left">Document</label>
											<input type="file" name="document" class="form-control" required />
										</div>
										<div class="form-group col-md-6">
											<label class="control-label mb-10 text-left">SEO Tools</label>
											<select class="selectpicker" data-style="form-control btn-default btn-outline" required name="seo_tool">
												<option selected disabled>Please Select SEO Tool</option>
												<option value="meta-title">Meta Title</option>
												<option value="meta-description">Meta Description</option>
											</select>
										</div>
										<div class="form-group col-md-12">
											<label class="control-label mb-10 text-left">Description</label>
											<textarea rows="10" class="form-control" name="long_description" placeholder="Product Description">{{ old('description') }}</textarea>
										</div>
									</div>
									<div class="col-md-4">
										<h3>Price Fields</h3>
										<div class="form-group">
											<label class="control-label mb-10 text-left">Discount</label>
											<input type="number" name="discount" class="form-control" min="0" placeholder="Discount" required />
										</div>
										<div class="form-group">
											<label class="control-label mb-10 text-left">Import Cost</label>
											<input type="number" name="import_cost" class="form-control" min="0" placeholder="Import Cost" required />
										</div>
										<div class="form-group">
											<label class="control-label mb-10 text-left">Sales</label>
											<input type="number" name="sales" class="form-control" min="0" placeholder="Sales" required />
										</div>
										<div class="form-group">
											<label class="control-label mb-10 text-left">Utility</label>
											<input type="number" name="utility" class="form-control" min="0" placeholder="Utility" required />
										</div>
										<div class="form-group">
											<label class="control-label mb-10 text-left">Packing Cost</label>
											<input type="number" name="packing_cost" class="form-control" min="0" placeholder="Packing Cost ($)" required />
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

@section('script')
<script type="text/javascript">
	function toggle(className, obj) {
	    var $input = $(obj);
	    if ($input.prop('checked')) $(className).show();
	    else $(className).hide();
	}
</script>
@endsection