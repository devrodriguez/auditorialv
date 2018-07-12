@extends('layouts/app')

@section('content')
    {!! Form::open(['route' => ['criteria.update', $criteria->id], 'method' => 'PUT']) !!}

        @include('criteria.partials.form')
        
    {!! Form::close() !!}
@endsection