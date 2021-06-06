<?php

namespace App\Http\Controllers;

use App\Vendas;
use App\Profissionais;
use App\Empresa;
use App\Ranking;
use App\LogRanking;
use Illuminate\Http\Request;

class VendasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profissionais = Profissionais::where('deleted_at', '=', null)->latest()->get();
        $profissionais = $profissionais->sortBy('parceiro');
        $empresas = Empresa::where('deleted_at', '=', null)->latest()->get();
        $empresas = $empresas->sortBy('razao_social');
        $page_name = 'vendas';
        $category_name = 'vendas';
        $has_scrollspy = 0;
        $scrollspy_offset = '';

        return view('vendas.registrar_venda',compact('profissionais', 'empresas', 'page_name', 'category_name', 'has_scrollspy', 'scrollspy_offset'));
    }

    public function getallvendas(Vendas $vendas)
    {
        $vendas = Vendas::all();
        $page_name = 'vendas';
        $category_name = 'vendas';
        $has_scrollspy = 0;
        $scrollspy_offset = '';
        
        return view('vendas.visualizar_vendas',compact('vendas', 'page_name', 'category_name', 'has_scrollspy', 'scrollspy_offset'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Profissionais $profissionais, Empresa $empresa)
    {
        $request->validate([
            'valor' => 'required',
            'cliente' => 'required',
            'rt',
            'contato',
            'indicador',
            'indicado' => 'required',
            'pontuacao_indicador',
            'id_indicado',
            'data_venda',
            'descricao_servico',
            'perfil',
            'caed'
        ]);

        // valor = pontuacao do usuario
        $valor = $request->valor;
        $request['pontuacao_indicador'] = $valor;

        // indicado -> Nome e ID
        $separador = explode("/",$request->indicado);

        //pegar a data da venda
        if($request->data_venda == null){
            $request->data_venda = date('d-m-Y H:i');
        }
        
        // calculo do CAED%
        if($request->perfil == "profissional-empresa"){
            $request['caed'] = $valor*0.025;
            $request['indicado'] = $separador[1];
            $request['id_indicado'] = $separador[0];

            $pontos = Profissionais::select('pontuacao')->where('id', $request['id_indicado'])->get();
            $request_profissional['pontuacao'] = $request['pontuacao_indicador'] + $pontos[0]->pontuacao;
            $profissionais->where('id', '=', $request['id_indicado'])->update($request_profissional);
        }else{
            $request['caed'] = $valor*0.05;
            $request['indicado'] = $separador[1];
            $request['id_indicado'] = $separador[0];

            $pontos = Empresa::select('pontuacao')->where('id', $request['id_indicado'])->get();
            $request_empresa['pontuacao'] = $request['pontuacao_indicador'] + $pontos[0]->pontuacao;
            $empresa->where('id', '=', $request['id_indicado'])->update($request_empresa);
        }

        Vendas::create($request->all());
        
        return redirect()->action('VendasController@index')->with('success','Empresa registrada com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $vendas = Vendas::where('id', '=', $request->id)->get();
        $retorno = response()->json($vendas);

        return $retorno;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendas $vendas)
    {
        return view('vendas.edit',compact('vendas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendas $vendas)
    {
        $request->validate([
            'valor' => 'required',
            'cliente' => 'required',
            'contato' => 'required',
            'indicador' => 'required',
            'indicado' => 'required',
            'pontuacao_indicador' => 'required',
            'descricao_servico' => 'required',
            'caed' => 'required'
        ]);

        $vendas->where('id', '=', $request->id)->update($request->toArray());

        $retorno = response()->json($vendas);

        return $retorno;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // $vendas = Vendas::where('id', '=', $request->id)->update(['deleted_at' => now()]);

        // return response()->json($vendas, 200);
    }

}