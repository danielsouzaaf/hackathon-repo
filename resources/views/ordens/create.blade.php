@extends('layouts.app')

@section('contentheader_title')
	Cadastro de ordens de pedido
@endsection

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Cadastro de ordens de pedido</div>
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					<div class="panel-body">
						<form method="post" action="{{ url('/insumos/cadastro') }}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="form-group has-feedback">
								<select name="insumos">
									<option value="" selected>Selecione uma opção</option>
									@foreach ($insumos as $ins)
										<option value="{{$ins->id}}">{{$ins->descricao}}</option>
									@endforeach

								</select>
							</div>
							<div class="form-group has-feedback">
								<input type="text" class="form-control" placeholder="Digite a quantidade" name="quantidade"/>
								<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
							</div>

							<select name="status">
								@if ()
								@elseif
								@endif
							</select>


								<div class="col-xs-4 col-xs-push-1">
									<button type="submit" class="btn btn-primary btn-block btn-flat">Cadastrar</button>
								</div><!-- /.col -->
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
