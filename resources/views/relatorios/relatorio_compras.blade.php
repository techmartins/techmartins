@extends('layouts.app')

@section('content')


<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-bottom:24px;">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">                                
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Relatório Geral de Vendas</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area" style="height: auto;">
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="example" class="display nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th style="text-align: left">Profissional</th>
                                            <th style="text-align: left">Empresa</th>
                                            <th style="text-align: left">Cliente</th>
                                            <th style="text-align: left">Valor</th>
                                            <th style="text-align: left">data da Compra</th>
                                            <th style="text-align: left">Anotação</th>
                                            <th style="text-align: left">Criado em</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($compras as $rank)
                                        <tr>
                                            <td style="text-align: left">{{ $rank['id_profissional'] }}</td>
                                            <td style="text-align: left">{{ $rank['empresa'] }}</td>
                                            <td style="text-align: left">{{ $rank['cliente'] }}</td>
                                            <td style="text-align: left">{{ $rank['valor'] }}</td>
                                            <td style="text-align: left">{{ $rank['data_compra'] }}</td>
                                            <td style="text-align: left">{{ $rank['anotacao'] }}</td>
                                            <td style="text-align: left">{{ $rank['created_at'] }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th style="text-align: left">Profissional</th>
                                            <th style="text-align: left">Empresa</th>
                                            <th style="text-align: left">Cliente</th>
                                            <th style="text-align: left">Valor</th>
                                            <th style="text-align: left">Data da Compra</th>
                                            <th style="text-align: left">Anotação</th>
                                            <th style="text-align: left">Criado em</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection