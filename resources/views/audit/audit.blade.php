@extends('layouts/app')

@section('head')
	{!! Html::style('assets/css/pages/audit.css') !!}
@endsection

@section('content')
	<header>
		<div class="row">
			<div class="col-sm-6">
				<div class="well well-sm">
					<form class="form-horizontal">
						<div class="form-group">
							<label class="col-sm-2 control-label">Cliente:</label>
							<div class="col-sm-10">
								<p class="form-control-static">{{ $enterprise->nombre }}</p>
							</div>	
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Nit:</label>
							<div class="col-sm-10">
								<p class="form-control-static">{{ $enterprise->nit }}</p>
							</div>	
						</div>
					</form>					
				</div>
			</div>
		</div>
	</header>

	<div class="panel-heading title-cabadelpa text-center" style="margin-bottom: 10px;">Procedimientos</div>
	@foreach($items as $item)
	<blockquote>
		<div class="pull-right">
			<button class="btn btn-success" data-toggle="modal" data-target="#mdValid">
			<i class="fa fa-check" aria-hidden="true"></i>
			Validar
			</button>
		</div>
		<p>{{ $item->name }}</p>
		<footer>{{ $item->description }}</footer>				
	</blockquote>
	@endforeach

	<div id="mdValid" class="modal fade" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Validar Procedimiento</h4>
				</div>
				<div class="modal-body">
					Valida el procedimiento de auditoria...
				</div>
				<div class="modal-footer">
			    	<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			        <button type="button" class="btn btn-primary btn-cabadelpa-confirm">Guardar</button>
			    </div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	
@endsection