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
                                            <th style="text-align: center">Data da Venda</th>
                                            <th style="text-align: center">Cliente</th>
                                            <th style="text-align: center">Indicado</th>
                                            <th style="text-align: center">Valor</th>
                                            <th style="text-align: center">CAED</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($vendas as $v)
                                        @if(Auth::user()->email == $v->email_indicado || Auth::user()->name == $v->indicador || Auth::user()->name == $v->indicado)
                                        <tr>
                                            <td style="text-align: center">{{ $v->data_venda }}</td>
                                            <td style="text-align: center">{{ $v->cliente }}</td>
                                            <td style="text-align: center">{{ $v->indicado }}</td>
                                            <td style="text-align: center">{{ $v->valor }}</td>
                                            <td style="text-align: center">{{ $v->caed }}</td>
                                        </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
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