@extends('layouts.app')

@section('content')


<div class="layout-px-spacing">
    <div class="layout-px-spacing">
                
        <div class="row layout-top-spacing" id="cancel-row">
        
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Razão Social</th>
                                <th>Segmento</th>
                                <th>Cidade</th>
                                <th>UF</th>
                                <th>Contatos</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($empresas as $emp)
                              <tr>
                                <td>{{ $emp->razao_social }}</td>
                                <td>{{ $emp->ramo_atividade }}</td>
                                <td>{{ $emp->cidade }}</td>
                                <td>{{ $emp->uf }}</td>
                                <td>{{ $emp->contato }}</td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</div>

@endsection