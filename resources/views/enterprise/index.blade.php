@extends('layouts/app')

@section('styles')
    {!! Html::style('assets/css/pages/enterprise.css') !!}
@endsection

@section('content')
    <header>
        <form method="GET" action="{{ route('find_entp_path') }}" id="formSearch">
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
            
            @if(Auth::user() != null)
                @if($enterprise->user_id == Auth::user()->id)
                <div class="pull-right">
                    <form action="{{ route('audit_path', ['enterprise' => $enterprise]) }}" method="GET">
                        <button type="submit" class="btn btn-primary">
                            Auditoria
                        </button>
                    </form>
                </div>
                @endif
            @endif
            <div class="pull-right" role="navigation">
                <ul class="nav">
                    <li>
                        <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                            <i class="fa fa-bars"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li>
                                <a href="{{ route('edit_entp_path', ['entp' => $enterprise->id]) }}" >
                                    <i class="fa fa-edit"></i>
                                    Editar
                                </a>
                            </li>
                            <li>
                                <a href="#" onclick="ValidateDelete();">
                                    <i class="fa fa-trash-o"></i>
                                    Eliminar
                                </a>
                                <form name="formDelete" id="formDelete" action="{{ route('delete_entp_path', ['entp' => $enterprise->id]) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <h4>{{ $enterprise->nombre }} - {{ $enterprise->nit }}</h4>
            
        </div>
        <div class="panel-body">
            <form class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Direccion</label>
                    <div class="col-sm-10">
                        <p class="form-control-static">
                            {{ $enterprise->direccion }}
                        </p>
                    </div> 
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Actividad</label>
                    <div class="col-sm-10">
                        <p class="form-control-static">
                            {{ $enterprise->descripcion }}
                        </p>
                    </div> 
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Ultima auditoria</label>
                    <div class="col-sm-10">
                        <p class="form-control-static">
                            {{ $enterprise->updated_at->diffForHumans() }}
                        </p>
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