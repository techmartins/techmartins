@extends('layouts.app')

@section('content')


  <div class="layout-px-spacing">

    <div class="row layout-top-spacing">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-bottom:24px;">
        <div class="statbox widget box box-shadow">
          <div class="widget-header">                                
            <div class="row">
              <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4>Nova Empresa</h4>
              </div>
            </div>
          </div>
          <div class="widget-content widget-content-area" style="height: auto;">
            @if ($errors->any())
              <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
              
            <form action="{{ route('empresa.store') }}" method="POST">
              <input type="hidden" value="{{ route('empresa.store') }}" id="url_cadastro">
              <div class="form-row mb-1">
                <div class="form-group col-md-6">
                  <label for="razao_social">Razão Social</label>
                  <input name="razao_social" type="text" class="form-control" id="razao_social" placeholder="Razão Social da Empresa">
                </div>
                <div class="form-group col-md-6">
                  <label for="cnpj">CNPJ</label>
                  <input name="cnpj" type="text" class="form-control" id="cnpj" placeholder="CNPJ da Empresa">
                </div>
                <div class="form-group col-md-3">
                  <label for="email">Email</label>
                  <input name="email" type="email" class="form-control" id="email" placeholder="Email da empresa">
                </div>
                <div class="form-group col-md-3">
                  <label for="ramo">Ramo de Atividade</label>
                  <select name="ramo" id="ramo" class="form-control">
                    <option selected="">Selecione</option>
                    <option value="Ar Condicionado">Ar Condicionado</option>
                    <option value="Automacao Residencial">Automação Residencial</option>
                    <option value="Coifas e Calhas">Coifas, Calhas</option>
                    <option value="Cortinas e Persianas">Cortinas e Persianas</option>
                    <option value="Drywall e Gesso">Drywall e Gesso</option>
                    <option value="Energia Fotovoltaica">Energia Fotovoltaica</option>
                    <option value="Esquadrias e PVC">Esquadrias e PVC</option>
                    <option value="Lajes e Artefatos Cimento">Lajes e Artefatos Cimento</option>
                    <option value="Marcenaria">Marcenaria</option>
                    <option value="Materiais de Construcao">Materiais de Construção</option>
                    <option value="Moveis e Decoracao">Móveis e Decoração</option>
                    <option value="Moveis Planejados">Móveis Planejados</option>
                    <option value="Moveis Prontos">Móveis Prontos</option>
                    <option value="Pergolado Madeira">Pergolado Madeira</option>
                    <option value="Vidracaria">Vidraçaria</option>
                    <option value="Vidros Box e Guarda Corpo">Vidros Box e Guarda Corpo</option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="cep">CEP</label>
                  <input name="cep" type="text" class="form-control" id="cep">
                  <span id="mensagem"></span>
                </div>
                <div class="form-group col-md-3">
                  <label for="endereco">Endereço</label>
                  <input name="endereco" type="text" class="form-control" id="endereco" placeholder="Endereço">
                </div>
                <div class="form-group col-md-3">
                  <label for="bairro">Bairro</label>
                  <input name="bairro" type="text" class="form-control" id="bairro" placeholder="Bairro">
                </div>
                <div class="form-group col-md-3">
                  <label for="uf">UF</label>
                  <input name="uf" type="text" class="form-control" id="uf" placeholder="Estado">
                </div>
                <div class="form-group col-md-3">
                  <label for="cidade">Cidade</label>
                  <input name="cidade" type="text" class="form-control" id="cidade" placeholder="Cidade">
                </div>
                <div class="form-group col-md-3">
                  <label for="percentual">Percentual de Comissão (%)</label>
                  <select name="percentual" id="percentual" class="form-control">
                    <option selected="" value="0">Percentual</option>
                    <option value="2">2.0%</option>
                    <option value="2.5">2.5%</option>
                    <option value="3.0">3.0%</option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="contato">Contato</label>
                  <input type="tel" class="form-control" id="contato">
                </div>
                <div class="form-group col-md-3">
                  <label for="referencia">Referência do Contato</label>
                  <input type="text" class="form-control" id="referencia">
                </div>
                <div class="form-group col-md-3">
                  <label for="login">Login</label>
                  <input type="text" class="form-control" id="login">
                </div>
                <div class="form-group col-md-3">
                  <label for="password">Senha</label>
                  <input type="password" class="form-control" id="password" placeholder="Password">
                </div>
                <button type="button" class="btn btn-primary mt-3" id="enviar-dados">Confirmar</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      {{-- @if ($message = Session::get('success'))
        <div class="alert alert-success">
          <p>{{ $message }}</p>
        </div>
      @endif --}}

      {{-- TABELA DE EMPRESAS --}}
      <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
          <div class="table-responsive mb-4 mt-4">
            <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Razao Social</th>
                  <th>CNPJ</th>
                  <th>E-mail</th>
                  <th>Atividade</th>
                  <th>Contato</th>
                  <th>Referência</th>
                  <th>Percentual</th>
                  <th>Criado em</th>
                  <th>Ação</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($empresas as $emp)
                <tr>
                  <td>{{ $emp->id }}</td>
                  <td>{{ $emp->razao_social }}</td>
                  <td>{{ $emp->cnpj }}</td>
                  <td>{{ $emp->email }}</td>
                  <td>{{ $emp->ramo_atividade }}</td>
                  <td>{{ $emp->contato }}</td>
                  <td>{{ $emp->referencia }}</td>
                  <td>{{ $emp->percentual }}</td>
                  <td>{{ $emp->created_at }}</td>
                  <td class="text-center">
                    <ul class="table-controls">
                      <li>
                        <a href="javascript:void(0);"  data-toggle="tooltip" data-placement="top" title="Edit">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2">
                            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                          </svg>
                        </a>
                      </li>
                      <li>
                        <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Delete">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                            <polyline points="3 6 5 6 21 6"></polyline>
                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            <line x1="10" y1="11" x2="10" y2="17"></line>
                            <line x1="14" y1="11" x2="14" y2="17"></line>
                          </svg>
                        </a>
                      </li>
                    </ul>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            {!! $empresas->links() !!}
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection