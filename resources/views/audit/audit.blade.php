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
			<form action="{{route('audit_checklist', ['enterprise' => $enterprise])}}" method="POST" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="modal-header">
					<h4 class="modal-title">Validar Procedimiento</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="comment">Evidencia escrita</label>
						<textarea name="comment" id="comment" cols="30" rows="5" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<label for="archivo">Archivo</label>
						<input type="file" name="archivo" id="archivo" class="form-control">
					</div>					
				</div>
				<div class="modal-footer">
			    	<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-success btn-cabadelpa-confirm">
						<i class="fa fa-save" aria-hidden="true"></i>
						Guardar
					</button>
			    </div>
				</form>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	
@endsection