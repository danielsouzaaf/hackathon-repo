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
					<a class="btn btn-block btn-primary pull-right" href="{{ url('ordens/cadastro') }}">Cadastrar nova ordem</a>
				</div>
				<div class="clearfix"></div>
				<div class="panel panel-default clearfix">
					<div class="panel-heading clearfix">Listagem das ordens</div>

					<div class="panel-body">
						<table class="table table-hover">
							<tr>
								<th>Descrição do insumo</th>
								<th>Quantidade</th>
								<th>Situação</th>
								<th>Ações</th>
							</tr>
							@foreach ($ordens as $ord)
								<tr>

									<td>{{$ord->insumo->descricao}}</td>
									<td>{{$ord->quantidade}}</td>
									<td>{{$ord->status->descricao}}</td>
									<td><a class="btn btn-block btn-info" href="{{ url('ordens/') }}/{{$ord->id}}">Visualizar ordem</a> </td>
								</tr>
							@endforeach

						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
