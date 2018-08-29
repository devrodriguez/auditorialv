@extends('layouts/app')

@section('content')

	<div class="container">
		<div class="panel panel-default">
            <div class="panel-heading">
                <div>
                    <h4>{{ $enterprise->name }} - {{ $enterprise->identification }}</h4>
                </div>
                <!--<p>{{ $enterprise->descripcion }}</p>-->
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
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Ultima auditoria</label>
                        <div class="col-sm-10">
                            <p class="form-control-static">[Auditor Name]</p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
	</div>

@endsection

@section('scripts')
    
@endsection