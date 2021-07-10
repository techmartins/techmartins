@extends('layouts.app')

@section('content')


<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-bottom:24px;">
            <div class="statbox widget box box-shadow" style="height: 600px; border: none;">
                <div class="widget-header">                                
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Lista das Vendas</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area" style="height: auto;">
                    
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="zero-config" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">ID</th>
                                            <th style="text-align: center">Cliente</th>
                                            <th style="text-align: center">Contato</th>
                                            <th style="text-align: center">Empresa</th>
                                            <th style="text-align: center">Indicado</th>
                                            <th style="text-align: center">Valor</th>
                                            <th style="text-align: center">CAED</th>
                                            <th style="text-align: center">Data da Venda</th>
                                            <th style="text-align: center">Criado em</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($vendas as $v)
                                        <tr>
                                            <td style="text-align: center">{{ $v->id }}</td>
                                            <td style="text-align: center">{{ $v->cliente }}</td>
                                            <td style="text-align: center">{{ $v->contato }}</td>
                                            <td style="text-align: center">{{ $v->indicador }}</td>
                                            <td style="text-align: center">{{ $v->indicado }}</td>
                                            <td style="text-align: center">{{ $v->valor }}</td>
                                            <td style="text-align: center">{{ $v->caed }}</td>
                                            <td style="text-align: center">{{ $v->data_venda }}</td>
                                            <td style="text-align: center">{{ $v->created_at }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- EDITAR OU DELETAR REGISTROS --}}
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" style="max-width: 45%">
            <div class="widget-content widget-content-area br-6">
                <div class="table-responsive mb-4 mt-4">
                    <div class="form-row mb-1" style="margin-right: 0px;">
                        <div class="col-md-4">
                            <label for="id-label">Insira aqui o ID da Venda:</label>
                        </div>
                        <div class="col-md-4">
                            <input name="id_input" type="text" class="form-control" id="id_input">
                        </div>
                        <div class="col-md-4" style="padding-top: 3px">
                            <button class="btn btn-warning btn-editar-venda"><i data-feather="edit-3"></i></button>
                            <!--<button class="btn btn-danger btn-excluir-venda"><i data-feather="trash-2"></i></button> -->
                        </div>
                    </div>
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
                                                <input type="hidden" value="{{Request::url()}}" id="url_visualizar">
                                                <input type="hidden" id="id_indicado">
                                                <input type="hidden" id="id_edit">
                                                <input type="hidden" id="valor_original">
                                                <input type="hidden" value="{{ Auth::user()->perfil }}" id="perfil_usuario">
                                                <input type="hidden" id="perfil">
                                                <input type="hidden" value="{{ Auth::user()->name }}" id="indicador">
                                                <div class="form-row mb-1">
                                                    <div class="form-group col-md-2">
                                                        <label for="data_venda_edit">Indicado</label>
                                                        <input name="indicado_edit" type="text" class="form-control" id="indicado_edit" disabled="disabled">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="chk_empresa">Quem deseja pontuar? </label>
                                                        <select name="chk_empresa" id="chk2_empresa" class="form-control">
                                                            <option selected="selected" value="profissional">Profissional</option>
                                                            <option value="empresa">Empresa</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="indicado_profissional_edit">Profissional a ser pontuado</label>
                                                        <select name="indicado_profissional_edit" id="indicado_profissional_edit" class="form-control">
                                                            <option selected="selected" value="0">Selecione o Profissional</option>
                                                            @foreach ($profissionais as $prof)
                                                            <option value="{{$prof->id.'/'.$prof->parceiro}}">{{$prof->parceiro}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="indicado_empresa_edit">Empresa a ser pontuada</label>
                                                        <select disabled name="indicado_empresa_edit" id="indicado_empresa_edit" class="form-control">
                                                            <option selected="selected" value="0">Selecione</option>
                                                            @foreach ($empresas as $emp)
                                                            <option value="{{$emp->id.'/'.$emp->razao_social}}">{{$emp->razao_social}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="data_venda_edit">Data da Venda</label>
                                                        <input name="data_venda_edit" type="date" class="form-control" id="data_venda_edit">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="valor_edit">Valor</label>
                                                        <input name="valor_edit" type="text" class="form-control" id="valor_edit">
                                                    </div>
                                                    @if(Auth::user()->perfil == 'admin')
                                                    <div class="form-group col-md-5">
                                                        <label for="empresa_indicadora_edit">Pontuado por:</label>
                                                        <select name="empresa_indicadora_edit" id="empresa_indicadora_edit" class="form-control">
                                                            <option selected="selected" value="0">Selecione</option>
                                                            @foreach ($empresas as $emp)
                                                            <option value="{{$emp->id."/".$emp->razao_social}}">{{$emp->razao_social}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @endif
                                                    <div class="form-group col-md-5">
                                                        <label for="cliente_edit">Cliente</label>
                                                        <input name="cliente_edit" type="text" class="form-control" id="cliente_edit">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="contato_edit">Contato</label>
                                                        <input name="contato_edit" type="text" class="form-control" id="contato_edit">
                                                    </div>
                                                    <div class="form-group col-md-10">
                                                        <label for="motivo">Motivo da Edição</label>
                                                        <input name="motivo" type="text" class="form-control" id="motivo">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="descricao_servico_edit">Descrição do Serviço</label>
                                                        <textarea name="descricao_servico_edit" id="descricao_servico_edit" class="form-control" cols="50" placeholder="Descrição do serviço vendido" rows="10"></textarea>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <button type="button" class="btn btn-primary mt-3" id="editar-dados-venda">Confirmar</button>
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