@extends('layouts.app')

@section('content')


<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-bottom:24px;">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">                                
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Registrar Venda</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area" style="height: auto;">
                    <form action="{{ route('vendas.store') }}" method="POST">

                        <input type="hidden" value="{{ Request::url() }}" id="url_cadastro_venda">
                        <input type="hidden" value="{{ Auth::user()->name }}" id="indicador">
                        <input type="hidden" value="{{ Auth::user()->perfil }}" id="perfil">
                        
                        <input type="hidden" id="pontuacao_indicador">
                        <input type="hidden" id="id_indicado">
                        <div class="form-row mb-1">
                            <div class="form-group col-md-2">
                                <label for="chk_empresa">Quem deseja pontuar? </label>
                                <select name="chk_empresa" id="chk_empresa" class="form-control">
                                    <option selected="selected" value="profissional">Profissional</option>
                                    <option value="empresa">Empresa</option>
                                </select>
                            </div>
                            @if( Auth::user()->perfil == "admin" )
                            <div class="form-group col-md-2">
                            @endif
                            @if( Auth::user()->perfil == "empresa" )
                            <div class="form-group col-md-4">
                            @endif
                                <label for="indicado_profissional">Profissional a ser pontuado</label>
                                <select name="indicado_profissional" id="indicado_profissional" class="form-control">
                                    <option selected="selected" value="0">Selecione o Profissional</option>
                                    @foreach ($profissionais as $prof)
                                    <option value="{{$prof->id."/".$prof->parceiro}}">{{$prof->parceiro}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if( Auth::user()->perfil == "admin" )
                            <div class="form-group col-md-2">
                            @endif
                            @if( Auth::user()->perfil == "empresa" )
                            <div class="form-group col-md-4">
                            @endif
                                <label for="indicado_empresa">Empresa a ser pontuada</label>
                                <select disabled name="indicado_empresa" id="indicado_empresa" class="form-control">
                                    <option selected="selected" value="0">Selecione</option>
                                    @foreach ($empresas as $emp)
                                    <option value="{{$emp->id."/".$emp->razao_social}}">{{$emp->razao_social}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="data_venda">Data da Venda</label>
                                <input name="data_venda" type="date" class="form-control" id="data_venda">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="valor">Valor</label>
                                <input name="valor" type="text" class="form-control" id="valor">
                            </div>
                            @if(Auth::user()->perfil == 'admin')
                            <div class="form-group col-md-2">
                                <label for="contato">Contato</label>
                                <input name="contato" type="text" class="form-control" id="contato">
                            </div>
                            @endif
                            @if(Auth::user()->perfil == 'admin')
                            <div class="form-group col-md-6">
                                <label for="empresa_indicadora">Pontuado por:</label>
                                <select name="empresa_indicadora" id="empresa_indicadora" class="form-control">
                                    <option selected="selected" value="0">Selecione</option>
                                    @foreach ($empresas as $emp)
                                    <option value="{{$emp->id."/".$emp->razao_social}}">{{$emp->razao_social}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endif
                            @if(Auth::user()->perfil == 'admin')
                            <div class="form-group col-md-4">
                                <label for="cliente">Cliente</label>
                                <input name="cliente" type="text" class="form-control" id="cliente">
                            </div>
                            @endif
                            @if(Auth::user()->perfil == 'empresa')
                            <div class="form-group col-md-2">
                                <label for="contato">Contato</label>
                                <input name="contato" type="text" class="form-control" id="contato">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cliente">Cliente</label>
                                <input name="cliente" type="text" class="form-control" id="cliente">
                            </div>
                            @endif
                            <div class="form-group col-md-12">
                                <label for="descricao_servico">Descrição do Serviço</label>
                                <textarea name="descricao_servico" id="descricao_servico" class="form-control" cols="50" placeholder="Descrição do serviço vendido" rows="10"></textarea>
                                {{-- <input name="descricao_servico" type="text" class="form-control" id="descricao_servico" placeholder="Descrição do serviço vendido"> --}}
                            </div>
                            <div class="form-group col-md-3">
                                <button type="button" class="btn btn-primary mt-3" id="enviar-dados-venda">Confirmar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- LOADING --}}
    ​    <div class="modal fade" id="modal-loading" role="dialog">
            <div class="modal-dialog" style="max-width: 20%;">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row layout-top-spacing">
                            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="max-width: 20%;">
                                <div class="widget-content widget-content-area br-6">
                                    <div class="col-md-12">
                                        <div class="loader dual-loader mx-auto"></div>
                                        <h2 style="text-align: center">Processando...</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
