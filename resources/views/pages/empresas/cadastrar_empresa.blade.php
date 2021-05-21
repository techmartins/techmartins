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
            <form>
              <div class="form-row mb-1">
                <div class="form-group col-md-6">
                  <label for="razao_social_empresa">Razão Social</label>
                  <input type="text" class="form-control" id="razao_social_empresa" placeholder="Razão Social da Empresa">
                </div>
                <div class="form-group col-md-6">
                  <label for="cnpj_empresa">CNPJ</label>
                  <input type="text" class="form-control" id="cnpj_empresa" placeholder="CNPJ da Empresa">
                </div>
                <div class="form-group col-md-3">
                  <label for="email_empresa">Email</label>
                  <input type="email" class="form-control" id="email_empresa" placeholder="Email da empresa">
                </div>
                <div class="form-group col-md-3">
                  <label for="ramo_empresa">Ramo de Atividade</label>
                  <select id="ramo_empresa" class="form-control">
                    <option selected="">Selecione</option>
                    <option>Opção 1</option>
                    <option>Opção 2</option>
                    <option>Opção 3</option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="cep_empresa">CEP</label>
                  <input type="text" class="form-control" id="cep_empresa">
                </div>
                <div class="form-group col-md-3">
                  <label for="endereco_empresa">Endereço</label>
                  <input type="text" class="form-control" id="endereco_empresa" placeholder="Endereço">
                </div>
                <div class="form-group col-md-3">
                  <label for="bairro_empresa">Bairro</label>
                  <input type="text" class="form-control" id="bairro_empresa" placeholder="Bairro">
                </div>
                <div class="form-group col-md-3">
                  <label for="uf_empresa">UF</label>
                  <select id="uf_empresa" class="form-control">
                    <option selected="">Estados</option>
                    <option>Opção 1</option>
                    <option>Opção 2</option>
                    <option>Opção 3</option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="cidade_empresa">Cidade</label>
                  <select id="cidade_empresa" class="form-control">
                    <option selected="">Cidades</option>
                    <option>Opção 1</option>
                    <option>Opção 2</option>
                    <option>Opção 3</option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="percentual_empresa">Percentual de Comissão (%)</label>
                  <select id="percentual_empresa" class="form-control">
                    <option selected="" value="0">Percentual</option>
                    <option value="2">2.0%</option>
                    <option value="2.5">2.5%</option>
                    <option value="3.0">3.0%</option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="contato_empresa">Contato</label>
                  <input type="tel" class="form-control" id="contato_empresa">
                </div>
                <div class="form-group col-md-3">
                  <label for="refcontato_empresa">Referência do Contato</label>
                  <input type="text" class="form-control" id="refcontato_empresa">
                </div>
                <div class="form-group col-md-3">
                  <label for="login_empresa">Login</label>
                  <input type="text" class="form-control" id="refcontato_empresa">
                </div>
                <div class="form-group col-md-3">
                  <label for="password">Senha</label>
                  <input type="password" class="form-control" id="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Confirmar</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      {{-- TABELA DE EMPRESAS --}}
      {{-- <div class="col-lg-12 col-md-12 layout-spacing">
        <div class="statbox widget box box-shadow">
          <div class="widget-header">
            <div class="row">
              <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4>Table with Footer</h4>
              </div>          
            </div>
          </div>
          <div class="widget-content widget-content-area">
            <div class="table-responsive">
              <table class="table table-bordered mb-4">
                <thead>
                  <tr>
                    <th>Name</th>
                      <th>Date</th>
                      <th>Sale</th>
                      <th class="text-center">Status</th>
                      <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Shaun</td>
                    <td>10/08/2018</td>
                    <td>320</td>
                    <td class="text-center"><span class="badge badge-success">Approved</span></td>
                    <td class="text-center">
                      <div class="dropdown custom-dropdown">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                          <a class="dropdown-item" href="javascript:void(0);">Download</a>
                          <a class="dropdown-item" href="javascript:void(0);">Share</a>
                          <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                          <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                        </div>
                      </div>

                    </td>
                  </tr>
                  <tr>
                    <td>Alma</td>
                    <td>11/08/2018</td>
                    <td>420</td>
                    <td class="text-center"><span class="badge badge-primary">In Progress</span></td>
                    <td class="text-center">
                        
                      <div class="dropdown custom-dropdown">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink2">
                          <a class="dropdown-item" href="javascript:void(0);">Download</a>
                          <a class="dropdown-item" href="javascript:void(0);">Share</a>
                          <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                          <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                        <tr>
                            <td>Kelly</td>
                            <td>12/08/2018</td>
                            <td>130</td>
                            <td class="text-center"><span class="badge badge-warning">Suspended</span></td>
                            <td class="text-center">
                                
                                <div class="dropdown custom-dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink3">
                                        <a class="dropdown-item" href="javascript:void(0);">Download</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Share</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Xavier</td>
                            <td>13/08/2018</td>
                            <td>260</td>
                            <td class="text-center"><span class="badge badge-danger">Blocked</span></td>
                            <td class="text-center">
                                
                                <div class="dropdown custom-dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink4">
                                        <a class="dropdown-item" href="javascript:void(0);">Download</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Share</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Andy</td>
                            <td>14/08/2018</td>
                            <td>99</td>
                            <td class="text-center"><span class="badge badge-secondary">On leave</span></td>
                            <td class="text-center">                                                    
                                <div class="dropdown custom-dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink5">
                                        <a class="dropdown-item" href="javascript:void(0);">Download</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Share</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Justin</td>
                            <td>15/08/2018</td>
                            <td>555</td>
                            <td class="text-center"><span class="badge badge-info">Pending</span></td>
                            <td class="text-center">                                                    
                                <div class="dropdown custom-dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink6">
                                        <a class="dropdown-item" href="javascript:void(0);">Download</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Share</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Amy</td>
                            <td>16/08/2018</td>
                            <td>300</td>
                            <td class="text-center"><span class="badge badge-dark">Deleted</span></td>
                            <td class="text-center">
                                
                                <div class="dropdown custom-dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink7">
                                        <a class="dropdown-item" href="javascript:void(0);">Download</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Share</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Sale</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
          </div>
        </div>
      </div> --}}
    </div>
  </div>

@endsection