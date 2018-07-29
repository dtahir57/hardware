@extends('admin.app')

@section('admin-title', 'Edit')

@section('admin-content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default card-view">
			<div class="pannel-wrapper collapse in">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<h3>Shipping Rules</h3>
						<ol class="breadcrumb pull-left">
							<li><a href="{{ route('home') }}">Dashboard</a></li>
							<li><a href="{{ route('shipping_rule.index') }}">Shipping Rules</a></li>
							<li class="active"><span>Edit</span></li>
						</ol>
					</div>
					<div class="col-md-6 col-sm-6">
						@if(auth::user()->can('View_Shipping_Rule'))
						<a href="{{ route('shipping_rule.index') }}" type="button" class="btn btn-danger btn-rounded pull-right"><i class="ti ti-list"></i>&nbsp;&nbsp;&nbsp;View All</a>
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
						<h6 class="panel-title txt-dark">Edit Shipping Rule</h6>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="form-wrap">
							<form action="{{ route('shipping_rule.update', $shipping_rule->id) }}" method="POST" enctype="multipart/form-data">
								@csrf 
								<input type="hidden" name="_method" value="PATCH">
								<div class="row">
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Name</label>
										<input type="text" name="name" class="form-control" placeholder="Name" value="{{ $shipping_rule->name }}" />
									</div>
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Priority</label>
										<input type="number" name="priority" class="form-control" placeholder="Priority" value="{{ $shipping_rule->priority }}" required />
									</div>
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Country</label>
										<select class="form-control" name="country" required>
										    <option selected disabled>Select a country…</option>
										    <option value="All Countries">All Countries</option>
										    <option value="AX">Åland Islands</option>
										    <option value="AF">Afghanistan</option>
										    <option value="AL">Albania</option>
										    <option value="DZ">Algeria</option>
										    <option value="AS">American Samoa</option>
										    <option value="AD">Andorra</option>
										    <option value="AO">Angola</option>
										    <option value="AI">Anguilla</option>
										    <option value="AQ">Antarctica</option>
										    <option value="AG">Antigua and Barbuda</option>
										    <option value="AR">Argentina</option>
										    <option value="AM">Armenia</option>
										    <option value="AW">Aruba</option>
										    <option value="AU">Australia</option>
										    <option value="AT">Austria</option>
										    <option value="AZ">Azerbaijan</option>
										    <option value="BS">Bahamas</option>
										    <option value="BH">Bahrain</option>
										    <option value="BD">Bangladesh</option>
										    <option value="BB">Barbados</option>
										    <option value="BY">Belarus</option>
										    <option value="PW">Belau</option>
										    <option value="BE">Belgium</option>
										    <option value="BZ">Belize</option>
										    <option value="BJ">Benin</option>
										    <option value="BM">Bermuda</option>
										    <option value="BT">Bhutan</option>
										    <option value="BO">Bolivia</option>
										    <option value="BQ">Bonaire, Saint Eustatius and Saba</option>
										    <option value="BA">Bosnia and Herzegovina</option>
										    <option value="BW">Botswana</option>
										    <option value="BV">Bouvet Island</option>
										    <option value="BR">Brazil</option>
										    <option value="IO">British Indian Ocean Territory</option>
										    <option value="VG">British Virgin Islands</option>
										    <option value="BN">Brunei</option>
										    <option value="BG">Bulgaria</option>
										    <option value="BF">Burkina Faso</option>
										    <option value="BI">Burundi</option>
										    <option value="KH">Cambodia</option>
										    <option value="CM">Cameroon</option>
										    <option value="CA">Canada</option>
										    <option value="CV">Cape Verde</option>
										    <option value="KY">Cayman Islands</option>
										    <option value="CF">Central African Republic</option>
										    <option value="TD">Chad</option>
										    <option value="CL">Chile</option>
										    <option value="CN">China</option>
										    <option value="CX">Christmas Island</option>
										    <option value="CC">Cocos (Keeling) Islands</option>
										    <option value="CO">Colombia</option>
										    <option value="KM">Comoros</option>
										    <option value="CG">Congo (Brazzaville)</option>
										    <option value="CD">Congo (Kinshasa)</option>
										    <option value="CK">Cook Islands</option>
										    <option value="CR">Costa Rica</option>
										    <option value="HR">Croatia</option>
										    <option value="CU">Cuba</option>
										    <option value="CW">Curaçao</option>
										    <option value="CY">Cyprus</option>
										    <option value="CZ">Czech Republic</option>
										    <option value="DK">Denmark</option>
										    <option value="DJ">Djibouti</option>
										    <option value="DM">Dominica</option>
										    <option value="DO">Dominican Republic</option>
										    <option value="EC">Ecuador</option>
										    <option value="EG">Egypt</option>
										    <option value="SV">El Salvador</option>
										    <option value="GQ">Equatorial Guinea</option>
										    <option value="ER">Eritrea</option>
										    <option value="EE">Estonia</option>
										    <option value="ET">Ethiopia</option>
										    <option value="FK">Falkland Islands</option>
										    <option value="FO">Faroe Islands</option>
										    <option value="FJ">Fiji</option>
										    <option value="FI">Finland</option>
										    <option value="FR">France</option>
										    <option value="GF">French Guiana</option>
										    <option value="PF">French Polynesia</option>
										    <option value="TF">French Southern Territories</option>
										    <option value="GA">Gabon</option>
										    <option value="GM">Gambia</option>
										    <option value="GE">Georgia</option>
										    <option value="DE">Germany</option>
										    <option value="GH">Ghana</option>
										    <option value="GI">Gibraltar</option>
										    <option value="GR">Greece</option>
										    <option value="GL">Greenland</option>
										    <option value="GD">Grenada</option>
										    <option value="GP">Guadeloupe</option>
										    <option value="GU">Guam</option>
										    <option value="GT">Guatemala</option>
										    <option value="GG">Guernsey</option>
										    <option value="GN">Guinea</option>
										    <option value="GW">Guinea-Bissau</option>
										    <option value="GY">Guyana</option>
										    <option value="HT">Haiti</option>
										    <option value="HM">Heard Island and McDonald Islands</option>
										    <option value="HN">Honduras</option>
										    <option value="HK">Hong Kong</option>
										    <option value="HU">Hungary</option>
										    <option value="IS">Iceland</option>
										    <option value="IN">India</option>
										    <option value="ID">Indonesia</option>
										    <option value="IR">Iran</option>
										    <option value="IQ">Iraq</option>
										    <option value="IE">Ireland</option>
										    <option value="IM">Isle of Man</option>
										    <option value="IL">Israel</option>
										    <option value="IT">Italy</option>
										    <option value="CI">Ivory Coast</option>
										    <option value="JM">Jamaica</option>
										    <option value="JP">Japan</option>
										    <option value="JE">Jersey</option>
										    <option value="JO">Jordan</option>
										    <option value="KZ">Kazakhstan</option>
										    <option value="KE">Kenya</option>
										    <option value="KI">Kiribati</option>
										    <option value="KW">Kuwait</option>
										    <option value="KG">Kyrgyzstan</option>
										    <option value="LA">Laos</option>
										    <option value="LV">Latvia</option>
										    <option value="LB">Lebanon</option>
										    <option value="LS">Lesotho</option>
										    <option value="LR">Liberia</option>
										    <option value="LY">Libya</option>
										    <option value="LI">Liechtenstein</option>
										    <option value="LT">Lithuania</option>
										    <option value="LU">Luxembourg</option>
										    <option value="MO">Macao S.A.R., China</option>
										    <option value="MK">Macedonia</option>
										    <option value="MG">Madagascar</option>
										    <option value="MW">Malawi</option>
										    <option value="MY">Malaysia</option>
										    <option value="MV">Maldives</option>
										    <option value="ML">Mali</option>
										    <option value="MT">Malta</option>
										    <option value="MH">Marshall Islands</option>
										    <option value="MQ">Martinique</option>
										    <option value="MR">Mauritania</option>
										    <option value="MU">Mauritius</option>
										    <option value="YT">Mayotte</option>
										    <option value="MX">Mexico</option>
										    <option value="FM">Micronesia</option>
										    <option value="MD">Moldova</option>
										    <option value="MC">Monaco</option>
										    <option value="MN">Mongolia</option>
										    <option value="ME">Montenegro</option>
										    <option value="MS">Montserrat</option>
										    <option value="MA">Morocco</option>
										    <option value="MZ">Mozambique</option>
										    <option value="MM">Myanmar</option>
										    <option value="NA">Namibia</option>
										    <option value="NR">Nauru</option>
										    <option value="NP">Nepal</option>
										    <option value="NL">Netherlands</option>
										    <option value="NC">New Caledonia</option>
										    <option value="NZ">New Zealand</option>
										    <option value="NI">Nicaragua</option>
										    <option value="NE">Niger</option>
										    <option value="NG">Nigeria</option>
										    <option value="NU">Niue</option>
										    <option value="NF">Norfolk Island</option>
										    <option value="KP">North Korea</option>
										    <option value="MP">Northern Mariana Islands</option>
										    <option value="NO">Norway</option>
										    <option value="OM">Oman</option>
										    <option value="PK">Pakistan</option>
										    <option value="PS">Palestinian Territory</option>
										    <option value="PA">Panama</option>
										    <option value="PG">Papua New Guinea</option>
										    <option value="PY">Paraguay</option>
										    <option value="PE">Peru</option>
										    <option value="PH">Philippines</option>
										    <option value="PN">Pitcairn</option>
										    <option value="PL">Poland</option>
										    <option value="PT">Portugal</option>
										    <option value="PR">Puerto Rico</option>
										    <option value="QA">Qatar</option>
										    <option value="RE">Reunion</option>
										    <option value="RO">Romania</option>
										    <option value="RU">Russia</option>
										    <option value="RW">Rwanda</option>
										    <option value="ST">São Tomé and Príncipe</option>
										    <option value="BL">Saint Barthélemy</option>
										    <option value="SH">Saint Helena</option>
										    <option value="KN">Saint Kitts and Nevis</option>
										    <option value="LC">Saint Lucia</option>
										    <option value="SX">Saint Martin (Dutch part)</option>
										    <option value="MF">Saint Martin (French part)</option>
										    <option value="PM">Saint Pierre and Miquelon</option>
										    <option value="VC">Saint Vincent and the Grenadines</option>
										    <option value="WS">Samoa</option>
										    <option value="SM">San Marino</option>
										    <option value="SA">Saudi Arabia</option>
										    <option value="SN">Senegal</option>
										    <option value="RS">Serbia</option>
										    <option value="SC">Seychelles</option>
										    <option value="SL">Sierra Leone</option>
										    <option value="SG">Singapore</option>
										    <option value="SK">Slovakia</option>
										    <option value="SI">Slovenia</option>
										    <option value="SB">Solomon Islands</option>
										    <option value="SO">Somalia</option>
										    <option value="ZA">South Africa</option>
										    <option value="GS">South Georgia/Sandwich Islands</option>
										    <option value="KR">South Korea</option>
										    <option value="SS">South Sudan</option>
										    <option value="ES">Spain</option>
										    <option value="LK">Sri Lanka</option>
										    <option value="SD">Sudan</option>
										    <option value="SR">Suriname</option>
										    <option value="SJ">Svalbard and Jan Mayen</option>
										    <option value="SZ">Swaziland</option>
										    <option value="SE">Sweden</option>
										    <option value="CH">Switzerland</option>
										    <option value="SY">Syria</option>
										    <option value="TW">Taiwan</option>
										    <option value="TJ">Tajikistan</option>
										    <option value="TZ">Tanzania</option>
										    <option value="TH">Thailand</option>
										    <option value="TL">Timor-Leste</option>
										    <option value="TG">Togo</option>
										    <option value="TK">Tokelau</option>
										    <option value="TO">Tonga</option>
										    <option value="TT">Trinidad and Tobago</option>
										    <option value="TN">Tunisia</option>
										    <option value="TR">Turkey</option>
										    <option value="TM">Turkmenistan</option>
										    <option value="TC">Turks and Caicos Islands</option>
										    <option value="TV">Tuvalu</option>
										    <option value="UG">Uganda</option>
										    <option value="UA">Ukraine</option>
										    <option value="AE">United Arab Emirates</option>
										    <option value="GB">United Kingdom (UK)</option>
										    <option value="US">United States (US)</option>
										    <option value="UM">United States (US) Minor Outlying Islands</option>
										    <option value="VI">United States (US) Virgin Islands</option>
										    <option value="UY">Uruguay</option>
										    <option value="UZ">Uzbekistan</option>
										    <option value="VU">Vanuatu</option>
										    <option value="VA">Vatican</option>
										    <option value="VE">Venezuela</option>
										    <option value="VN">Vietnam</option>
										    <option value="WF">Wallis and Futuna</option>
										    <option value="EH">Western Sahara</option>
										    <option value="YE">Yemen</option>
										    <option value="ZM">Zambia</option>
										    <option value="ZW">Zimbabwe</option>
										</select>
									</div>
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Shipping Provider</label>
										<select class="form-control" name="shipping_provider" required>
											<option selected disabled>Select Shipping Provider</option>
											<option value="Flat Rate">Flat Rate</option>
											<option value="Shippo">Shippo</option>
											<option value="Free Shipping">Free Shipping</option>
										</select>
									</div>
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Shipping Features</label>
										<input type="text" name="shipping_features" value="{{ $shipping_rule->shipping_features }}" class="form-control" placeholder="Shipping Features" />
									</div>
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Minimum Order Total</label>
										<input type="number" name="minimum_order_total" min="0" class="form-control" placeholder="Minimum Order Total" value="{{ $shipping_rule->minimum_order_total }}" required />
									</div>
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Description</label>
										<textarea name="description" class="form-control" rows="6" placeholder="Description">{{ $shipping_rule->description }}</textarea>
									</div>
									<div class="form-group col-md-6">
										<div class="checkbox checkbox-success">
											<input id="checkbox4" type="checkbox" name="is_exclusive" value="1" @if($shipping_rule->is_exclusive) checked @endif />
											<label for="checkbox4"> Exclusive</label>
										</div>
									</div>
									<div class="form-group col-md-6">
										<label>Thumbnail</label>
										<input type="file" name="thumbnail" />
										<img src="{{ Storage::url($shipping_rule->thumbnail) }}" style="width: 75px; height: 75px;">
										<pre>Leave it as it is if you do not want to upload the new image</pre>
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