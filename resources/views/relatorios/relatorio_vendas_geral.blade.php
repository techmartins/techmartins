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
                                            <th style="text-align: left">Cliente</th>
                                            <th style="text-align: left">Contato</th>
                                            <th style="text-align: left">Valor</th>
                                            <th style="text-align: left">Empresa que Indicou</th>
                                            <th style="text-align: left">Profissional/Empresa Pontuado</th>
                                            <th style="text-align: left">Pontos Acrescentados</th>
                                            <th style="text-align: left">Descrição do Serviço</th>
                                            <th style="text-align: left">CAED</th>
                                            <th style="text-align: left">Data da Venda</th>
                                            <th style="text-align: left">Criado em</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($vendas as $rank)
                                        <tr>
                                            <td style="text-align: left">{{ $rank['cliente'] }}</td>
                                            <td style="text-align: left">{{ $rank['contato'] }}</td>
                                            <td style="text-align: left">{{ $rank['valor'] }}</td>
                                            <td style="text-align: left">{{ $rank['indicador'] }}</td>
                                            <td style="text-align: left">{{ $rank['indicado'] }}</td>
                                            <td style="text-align: left">{{ $rank['pontuacao_indicador'] }}</td>
                                            <td style="text-align: left">{{ $rank['descricao_servico'] }}</td>
                                            <td style="text-align: left">{{ $rank['caed'] }}</td>
                                            <td style="text-align: left">{{ $rank['data_venda'] }}</td>
                                            <td style="text-align: left">{{ $rank['created_at'] }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th style="text-align: left">Cliente</th>
                                            <th style="text-align: left">Contato</th>
                                            <th style="text-align: left">Valor</th>
                                            <th style="text-align: left">Empresa que Indicou</th>
                                            <th style="text-align: left">Profissional/Empresa Pontuado</th>
                                            <th style="text-align: left">Pontos Acrescentados</th>
                                            <th style="text-align: left">Descrição do Serviço</th>
                                            <th style="text-align: left">CAED</th>
                                            <th style="text-align: left">Data da Venda</th>
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