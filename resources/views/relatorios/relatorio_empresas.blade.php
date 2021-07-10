@extends('layouts.app')

@section('content')


<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-bottom:24px;">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">                                
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Relatório de Empresas</h4>
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
                                            <th style="text-align: left">Razão Social</th>
                                            <th style="text-align: left">CNPJ</th>
                                            <th style="text-align: left">E-mail</th>
                                            <th style="text-align: left">Segmento</th>
                                            <th style="text-align: left">CEP</th>
                                            <th style="text-align: left">Endereço</th>
                                            <th style="text-align: left">Bairro</th>
                                            <th style="text-align: left">UF</th>
                                            <th style="text-align: left">Cidade</th>
                                            <th style="text-align: left">Contato</th>
                                            <th style="text-align: left">Contato Adm</th>
                                            <th style="text-align: left">Referência</th>
                                            <th style="text-align: left">Pontos Acumulados/Restantes</th>
                                            <th style="text-align: left">Criado em</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($empresas as $rank)
                                        <tr>
                                            <td style="text-align: left">{{ $rank['razao_social'] }}</td>
                                            <td style="text-align: left">{{ $rank['cnpj'] }}</td>
                                            <td style="text-align: left">{{ $rank['email'] }}</td>
                                            <td style="text-align: left">{{ $rank['ramo_atividade'] }}</td>
                                            <td style="text-align: left">{{ $rank['cep'] }}</td>
                                            <td style="text-align: left">{{ $rank['endereco'] }}</td>
                                            <td style="text-align: left">{{ $rank['bairro'] }}</td>
                                            <td style="text-align: left">{{ $rank['uf'] }}</td>
                                            <td style="text-align: left">{{ $rank['cidade'] }}</td>
                                            <td style="text-align: left">{{ $rank['contato'] }}</td>
                                            <td style="text-align: left">{{ $rank['contato_admin'] }}</td>
                                            <td style="text-align: left">{{ $rank['referencia'] }}</td>
                                            <td style="text-align: left">{{ $rank['pontuacao'] }}</td>
                                            <td style="text-align: left">{{ $rank['created_at'] }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th style="text-align: left">Razão Social</th>
                                            <th style="text-align: left">CNPJ</th>
                                            <th style="text-align: left">E-mail</th>
                                            <th style="text-align: left">Segmento</th>
                                            <th style="text-align: left">CEP</th>
                                            <th style="text-align: left">Endereço</th>
                                            <th style="text-align: left">Bairro</th>
                                            <th style="text-align: left">UF</th>
                                            <th style="text-align: left">Cidade</th>
                                            <th style="text-align: left">Contato</th>
                                            <th style="text-align: left">Contato Adm</th>
                                            <th style="text-align: left">Referência</th>
                                            <th style="text-align: left">Pontos Acumulados/Restantes</th>
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