@extends('layouts/app')

@section('styles')
    {!! Html::style('assets/css/pages/enterprise.css') !!}
@endsection

@section('content')
    <header>
        <form method="GET" action="{{ route('find_enterprise') }}" id="formSearch">
            <div class="input-group">
                <label for="inpEmpresa" class="input-group-addon"></label>
                <input id="search" name="search" type="text" class="form-control" placeholder="Digite el nit o nombre de empresa">
                <div class="input-group-btn">
                    <a href="#" onclick="document.getElementById('formSearch').submit()"  class="btn btn-success btn-cabadelpa-confirm">Buscar</a>
                </div>
            </div>
        </form>
    </header>
    <hr>
    @foreach($enterprises as $enterprise)
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-sm-8">
                    <h4>{{ $enterprise->name }}</h4>
                    <span>
                        <small>{{ $enterprise->identification }}</small>            
                    </span>
                </div>
                <div class="col-sm-4">
                    <div class="button-group pull-right">
                    @if(Auth::user() != null)
                        @if($enterprise->user_id == Auth::user()->id)
                        <a href="{{ route('edit_enterprise', $enterprise->id) }}" class="btn btn-xs btn-primary btn-block">
                            <i class="fa fa-pencil"></i>
                            Editar
                        </a>
                        {!! Form::open(['route' => ['delete_enterprise', $enterprise->id], 'method' => 'DELETE']) !!}
                        <button class="btn btn-xs btn-danger btn-block">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                            Eliminar
                        </button>
                        {!! Form::close() !!}
                        @endif
                    @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <form action="" class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Direccion</label>
                    <div class="col-sm-10">
                        <p class="form-control-static">{{ $enterprise->address }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Ultima auditoria</label>
                    <div class="col-sm-10">
                        <p class="form-control-static">{{ $enterprise->updated_at->diffForHumans() }}</p>
                    </div>
                </div>
            </form>            
        </div>
    </div>
    @endforeach

    {{ $enterprises->render() }}
@endsection

@section('scripts')
    {!! Html::script('assets/js/jquery-ui/1.12.1/jquery-ui.js') !!}
    {!! Html::script('assets/js/bootstrap/complement/typeahead.js') !!}
    {!! Html::script('assets/js/pages/enterprise.js') !!}
@endsection