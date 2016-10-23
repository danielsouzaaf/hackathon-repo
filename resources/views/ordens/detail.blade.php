@extends('layouts.app')

@section('contentheader_title')
	Ordem de pedido de {{$order->insumo->descricao}}
@endsection

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Ordem de pedido de {{$order->insumo->descricao}}</div>
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
						<form method="post" action="{{ url('/ordens/') }}/{{ $order->id }}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="form-group has-feedback">
								<select name="status" id="statusselect">
									<option value="" selected>Selecione uma opção</option>
									@foreach ($statuses as $stat)
										<option value="{{$stat->id}}" @if ($stat->id == $order->status->id) selected @endif>{{$stat->descricao}}</option>
									@endforeach
								</select>
							</div>
							<div class="collapse">
								<div class="form-group has-feedback">
									<input type="text" name="preco" placeholder="Digite o preço" />
									<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
								</div>
								<div class="form-group has-feedback">
									<input type="text" name="datalimite" placeholder="Digite a quantidade máxima, em dias, da submissáo de propostas" />
									<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
								</div>
							</div>
							<div class="form-group has-feedback">
								<input type="text" class="form-control" value="{{$order->quantidade}}" name="quantidade"/>
								<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
							</div>

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

@section ('my_scripts')
	<script type="text/javascript">
		$('#statusselect').change(function() {
			opt = $(this).val();
			if (opt == 2) $('.collapse').collapse('show');
			else $('.collapse').collapse('hide');
		});
	</script>

@endsection
