@extends('layouts/app')

@section('content')

	@include('layouts/_form', ['enterprise' => $enterprise])

@endsection