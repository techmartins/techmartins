@extends('layouts.app')

@section('content')



    <div class="layout-px-spacing">
        
        @if(Auth::user()->perfil == 'profissional' || Auth::user()->perfil == 'empresa')
        <div class="row layout-top-spacing">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing"></div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-three" style="text-align: center; padding: 5px 5px;">
                    <input type="hidden" value="{{ Request::url() }}" id="url_base_dashboard">
                    <input type="hidden" id="perfil" value="{{ Auth::user()->perfil }}">
                    <input type="hidden" id="email" value="{{ Auth::user()->email }}">
                    <input type="hidden" id="nome_usuario" value="{{ Auth::user()->name }}">
                    <h4 class="mt-3 mb-4">Sua pontuação atual é:</h4>
                    <h1 id="pontuacao_atual_usuario"></h1>
                    <p id="realizar-resgate"></p>
                    <div id="btn-resgate"></div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing"></div>
        </div>

        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    @if(Auth::user()->perfil == 'profissional')
                    <h3>Meu Histórico</h3>
                    @else
                    <h3>Minhas Vendas</h3>
                    @endif
                    <div class="table-responsive mb-4 mt-4">
                        <table id="tabela-vendas" class="table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Cliente</th>
                                    @if( Auth::user()->perfil == "profissional" )
                                    <th>Empresa que Indicou</th>
                                    @endif
                                    @if( Auth::user()->perfil == "empresa" )
                                    <th>Profissional</th>
                                    @endif
                                    <th>Valor</th>
                                    <!-- @if( Auth::user()->perfil == "empresa" )
                                    <th>RT</RT>
                                    @endif -->
                                    <th>Data da Venda</th>
                                </tr>
                                <tr>
                                    <th><input type="text" id="cliente" placeholder="Pesquisar..."/></th>
                                    @if( Auth::user()->perfil == "profissional" )
                                    <th><input type="text" id="empresa" placeholder="Pesquisar..."/></th>
                                    @endif
                                    @if( Auth::user()->perfil == "empresa" )
                                    <th><input type="text" id="profissional" placeholder="Pesquisar..."/></th>
                                    @endif
                                    <th><input type="text" id="valor" placeholder="Pesquisar..."/></th>
                                    <!-- @if( Auth::user()->perfil == "empresa" )
                                    <th><input type="text" id="rt" placeholder="Pesquisar..."/></th>
                                    @endif -->
                                    <th><input type="text" id="data_venda" placeholder="Pesquisar..."/></th>
                                </tr>  
                            </thead>
                            <tbody class="vendas">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
        
@endsection
