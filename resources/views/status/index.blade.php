@extends('layouts.app')

@section('title', 'Thank You Page')

@section('content')
@if(session('success'))
	<li class="alert alert-success">{{ session('success') }}</li>
@endif
@if(session('error'))
	<li class="alert alert-danger">{{ session('error') }}</li>
@endif
@endsection