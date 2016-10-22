@extends('layouts.app')

@section('contentheader_title')
	Cadastro de insumos
@endsection

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Outro nome aqui</div>
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
								<input type="text" class="form-control" placeholder="Digite o nome do insumo" name="descricao" value="{{ old('descricao') }}"/>
								<span class="glyphicon glyphicon-pencil form-control-feedback"></span>
							</div>


							<div class="row">
									<div class="col-xs-6">
										<div class="radio">
											<label>
												<input type="radio" name="gnpp" value="sim" data-toggle="radio-collapse" data-target="#organico">O insumo é gerado no processo produtivo
											</label>
										</div>
									</div>
							</div>
							<div class="row">
								<div class="col-xs-6">
									<div class="radio">
										<label>
											<input type="radio" name="gnpp" value="nao">O insumo não é gerado no processo produtivo
										</label>
									</div>
								</div>
							</div><!-- /.row -->
							<div id="organico" class="panel-group panel-collapse collapse">
								<div class="row">
									<div class="col-xs-6">
										<div class="radio">
											<label>
												<input type="radio" name="organico" value="sim">O produto possui compostos orgânicos
											</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-6">
										<div class="radio">
											<label>
												<input type="radio" name="organico" value="nao">O produto não possui compostos orgânicos
											</label>
										</div>
									</div>
								</div><!-- /.row -->
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
