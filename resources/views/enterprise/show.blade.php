@extends('layouts/app')

@section('content')

	<div class="container">
		<div class="panel panel-default">
            <div class="panel-heading">
                <div>
                    <h4>{{ $enterprise->nombre }} - {{ $enterprise->nit }}</h4>
                </div>
                <p>{{ $enterprise->descripcion }}</p>                    
            </div>
            <div class="panel-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <span class="feature-list-item"><strong>Direccion:&nbsp;</strong></span>
                        {{ $enterprise->direccion }}
                    </li>
                    <li class="list-group-item"><strong class="feature-list-item">
                        Ultima auditoria:&nbsp;</strong>{{ $enterprise->updated_at->diffForHumans() }}
                    </li>
                    <li class="list-group-item"><strong class="feature-list-item">
                        Auditor:&nbsp;</strong>Diana Mendez
                    </li>
                </ul>
            </div>
        </div>
	</div>

@endsection

@section('scripts')
    
@endsection