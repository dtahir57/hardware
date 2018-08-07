@extends('layouts.app')

@section('title', 'My Account')

@section('content')
<div class="page-title">
  <div class="container">
    <div class="column">
      <h1>My Profile</h1>
    </div>
    <div class="column">
      <ul class="breadcrumbs">
        <li><a href="{{ url('/') }}">Home</a>
        </li>
        <li class="separator">&nbsp;</li>
        <li><a href="">Account</a>
        </li>
        <li class="separator">&nbsp;</li>
        <li>My Profile</li>
      </ul>
    </div>
  </div>
</div>
<div class="container padding-bottom-3x mb-2">
  <div class="row">
    @include('partials.sidebar')
    <div class="col-lg-8">
      <div class="padding-top-2x mt-2 hidden-lg-up"></div>
      <form class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="account-fn">Name</label>
            <input class="form-control" type="text" id="account-fn" value="{{ Auth::user()->name }}" required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="account-email">E-mail Address</label>
            <input class="form-control" type="email" id="account-email" value="{{ Auth::user()->email }}" disabled>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="account-pass">New Password</label>
            <input class="form-control" type="password" id="account-pass">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="account-confirm-pass">Confirm Password</label>
            <input class="form-control" type="password" id="account-confirm-pass">
          </div>
        </div>
        <div class="col-12">
          <hr class="mt-2 mb-3">
          <div class="d-flex flex-wrap justify-content-between align-items-center">
            <div class="custom-control custom-checkbox d-block">
              <input class="custom-control-input" type="checkbox" id="subscribe_me" checked>
              <label class="custom-control-label" for="subscribe_me">Subscribe me to Newsletter</label>
            </div>
            <button class="btn btn-primary margin-right-none" type="button" data-toast data-toast-position="topRight" data-toast-type="success" data-toast-icon="icon-check-circle" data-toast-title="Success!" data-toast-message="Your profile updated successfuly.">Update Profile</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection