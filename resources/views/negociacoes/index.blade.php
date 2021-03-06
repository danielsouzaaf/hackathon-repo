@extends('layouts.app')

@section('contentheader_title')
    Listagem das suas negociações
@endsection

@section('htmlheader_title')
    Home
@endsection


@section('main-content')
    <div class="container spark-screen">

            <div class="col-xs-10 col-md-offset-1">
                <div class="clearfix"></div>
            @foreach ($ordens as $order)
                <div class="col-xs-5">
                <div class="box box-solid box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{$order->insumo->descricao}}</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <p>Empresa: {{$order->insumo->user->nome_empresa}}</p>
                        <p>Quantidade: {{$order->quantidade}}</p>
                        <p>Data limite: {{$order->data_limite}}</p>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
                </div>


            @endforeach

        </div>
    </div>
@endsection
