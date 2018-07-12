@extends('layouts/app')

@section('content')
<form action="{{ route('criteria.store') }}" method="POST">
    @include('criteria.partials.form')
</form>
@endsection