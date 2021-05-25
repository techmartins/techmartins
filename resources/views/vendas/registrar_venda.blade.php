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

                    <input type="hidden" value="{{ route('vendas.store') }}" id="url_cadastro">
                    <input type="hidden" value="{{ Request::url() }}" id="url_visualizar">
                    <input type="hidden" value="{{ Auth::user()->name }}" id="indicador">
                    <input type="hidden" id="pontuacao_indicador">
                    <div class="form-row mb-1">
                        <div class="form-group col-md-3">
                            <label for="cliente">Cliente</label>
                            <input name="cliente" type="text" class="form-control" id="cliente">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="valor">Valor</label>
                            <input name="valor" type="text" class="form-control" id="valor">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="descricao_servico">Descrição do Serviço</label>
                            <input name="descricao_servico" type="text" class="form-control" id="descricao_servico" placeholder="Descrição do serviço vendido">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="contato">Contato</label>
                            <input name="contato" type="text" class="form-control" id="contato">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="indicado_profissional">Indicação de Profissional</label>
                            <select name="indicado_profissional" id="indicado_profissional" class="form-control">
                                <option selected="0">Selecione o Profissional</option>
                                @foreach ($profissionais as $prof)
                                <option value="{{$prof->parceiro}}">{{$prof->parceiro}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="indicado_empresa">Indicação de Empresa</label>
                            <select name="indicado_empresa" id="indicado_empresa" class="form-control">
                                <option selected="0">Selecione</option>
                                @foreach ($empresas as $emp)
                                <option value="{{$emp->razao_social}}">{{$emp->razao_social}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group col-md-3">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option selected="em_aberto">Em Aberto</option>
                                <option value="finalizado">Finalizado</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <button type="button" class="btn btn-primary mt-3" id="enviar-dados">Confirmar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
      </div>

      {{-- MODAL DE EDITAR VENDA --}}

      ​<div class="modal fade" id="modal-editar-venda" role="dialog">
        <div class="modal-dialog" style="max-width: 65%;">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-body">
              <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-bottom:24px;">
                  <div class="statbox widget box box-shadow">
                    <div class="widget-header">                                
                      <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                          <h4>Editar Venda</h4>
                        </div>
                      </div>
                    </div>
                    <div class="widget-content widget-content-area" style="height: auto;">
                        
                      <form action="" method="PUT">
                        @csrf
                        <input type="hidden" value="{{ Request::url() }}" id="url_visualizar">
                        <input type="hidden" value="{{ Auth::user()->name }}" id="indicador_edit">
                        <input type="hidden" id="pontuacao_indicador_edit">
                        <input type="hidden" id="status_edit" value="EM ABERTO">
                        <div class="form-row mb-1">
                            <div class="form-group col-md-6">
                                <label for="cliente_edit">Cliente</label>
                                <input name="cliente_edit" type="text" class="form-control" id="cliente_edit">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="valor_edit">Valor</label>
                                <input name="valor_edit" type="text" class="form-control" id="valor_edit">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="contato_edit">Contato</label>
                                <input name="contato_edit" type="text" class="form-control" id="contato_edit">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="indicado_profissional_edit">Indicação de Profissional</label>
                                <select name="indicado_profissional_edit" id="indicado_profissional_edit" class="form-control">
                                    <option selected="0">Selecione o Profissional</option>
                                    @foreach ($profissionais as $prof)
                                    <option value="{{$prof->parceiro}}">{{$prof->parceiro}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="indicado_empresa_edit">Indicação de Empresa</label>
                                <select name="indicado_empresa_edit" id="indicado_empresa_edit" class="form-control">
                                    <option selected="0">Selecione</option>
                                    @foreach ($empresas as $emp)
                                    <option value="{{$emp->razao_social}}">{{$emp->razao_social}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="descricao_servico_edit">Descrição do Serviço</label>
                                <input name="descricao_servico_edit" type="text" class="form-control" id="descricao_servico_edit" placeholder="Descrição do serviço vendido">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="status_edit">Status</label>
                                <select name="status_edit" id="status_edit" class="form-control">
                                    <option selected="em_aberto">Em Aberto</option>
                                    <option value="finalizado">Finalizado</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <button type="button" class="btn btn-primary mt-3" id="editar-dados">Confirmar</button>
                            </div>
                        </div>
                      </form>
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