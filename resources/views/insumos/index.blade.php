@extends('layouts.app')

@section('contentheader_title')
	Listagem dos insumos
@endsection

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
	<div class="container spark-screen">

		<div class="row">

			<div class="col-md-10 col-md-offset-1">
				<div class="pull-right">
					<a class="btn btn-block btn-primary pull-right" href="{{ url('insumos/cadastro') }}">Cadastrar novo insumo</a>
				</div>
				<div class="clearfix"></div>
				<div class="panel panel-default clearfix">
					<div class="panel-heading clearfix">Listagem dos insumos</div>

					<div class="panel-body">
						<table class="table table-hover">
							<tr>
								<th>Descrição</th>
								<th>Gerado no processo produtivo</th>
								<th>É orgânico</th>
							</tr>
								@foreach ($insumos as $ins)
								<tr>
									<td>{{$ins->descricao}}</td>
									<td>@if ($ins->eh_processo_produtivo == 0)  <span class="label label-danger">Não</span>
										@else <span class="label label-success">Sim</span>
										@endif
									</td>
									<td>@if ($ins->eh_organico == 0) <span class="label label-danger">Não</span>
										@elseif ($ins->eh_organico == 1) <span class="label label-success">Sim</span>
										@else Não se aplica
										@endif
									</td>
								</tr>
								@endforeach

						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
