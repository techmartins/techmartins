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
                    <h1 class="mt-3 mb-4">Sua pontuação atual é:</h1>
                    <h2 id="pontuacao_atual_usuario"></h2>
                    <h4 id="realizar-resgate"></h4>
                    <div id="btn-resgate"></div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing"></div>
        </div>

        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-three" style="text-align: center">
                    <h3>Minhas Vendas</h3>
                    <div class="table-responsive mb-4 mt-4">
                        <table id="tabela-vendas" class="table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Valor</th>
                                    <th>Data da Venda</th>
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