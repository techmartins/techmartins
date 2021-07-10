@extends('layouts.app')

@section('content')


<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-bottom:24px;">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">                                
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Relatório de Profissionais</h4>
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
                                            <th style="text-align: left">Parceiro</th>
                                            <th style="text-align: left">CPF</th>
                                            <th style="text-align: left">E-mail</th>
                                            <th style="text-align: left">Nascimento</th>
                                            <th style="text-align: left">telefone</th>
                                            <th style="text-align: left">Área de Atuação</th>
                                            <th style="text-align: left">Chave Pix</th>
                                            <th style="text-align: left">CEP</th>
                                            <th style="text-align: left">Endereço</th>
                                            <th style="text-align: left">Bairro</th>
                                            <th style="text-align: left">UF</th>
                                            <th style="text-align: left">Cidade</th>
                                            <th style="text-align: left">Pontos Acumulados/Restantes</th>
                                            <th style="text-align: left">Criado em</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($profissionais as $rank)
                                        <tr>
                                            <td style="text-align: left">{{ $rank['parceiro'] }}</td>
                                            <td style="text-align: left">{{ $rank['cpf'] }}</td>
                                            <td style="text-align: left">{{ $rank['email'] }}</td>
                                            <td style="text-align: left">{{ $rank['nascimento'] }}</td>
                                            <td style="text-align: left">{{ $rank['telefone'] }}</td>
                                            <td style="text-align: left">{{ $rank['area_atuacao'] }}</td>
                                            <td style="text-align: left">{{ $rank['chave_pix'] }}</td>
                                            <td style="text-align: left">{{ $rank['cep'] }}</td>
                                            <td style="text-align: left">{{ $rank['endereco'] }}</td>
                                            <td style="text-align: left">{{ $rank['bairro'] }}</td>
                                            <td style="text-align: left">{{ $rank['uf'] }}</td>
                                            <td style="text-align: left">{{ $rank['cidade'] }}</td>
                                            <td style="text-align: left">{{ $rank['pontuacao'] }}</td>
                                            <td style="text-align: left">{{ $rank['created_at'] }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th style="text-align: left">Parceiro</th>
                                            <th style="text-align: left">CPF</th>
                                            <th style="text-align: left">E-mail</th>
                                            <th style="text-align: left">Nascimento</th>
                                            <th style="text-align: left">telefone</th>
                                            <th style="text-align: left">Área de Atuação</th>
                                            <th style="text-align: left">Chave Pix</th>
                                            <th style="text-align: left">CEP</th>
                                            <th style="text-align: left">Endereço</th>
                                            <th style="text-align: left">Bairro</th>
                                            <th style="text-align: left">UF</th>
                                            <th style="text-align: left">Cidade</th>
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