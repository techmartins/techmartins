<?php

namespace App\Http\Controllers;

use App\Vendas;
use App\Profissionais;
use App\Empresa;
use App\Ranking;
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
        $profissionais = Profissionais::all();
        $empresas = Empresa::all();
        $page_name = 'vendas';
        $category_name = 'vendas';
        $has_scrollspy = 0;
        $scrollspy_offset = '';

        return view('vendas.registrar_venda',compact('profissionais', 'empresas', 'page_name', 'category_name', 'has_scrollspy', 'scrollspy_offset'))->with('i', (request()->input('page', 1) - 1) * 5);
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
    public function store(Request $request)
    {
        $request->validate([
            'valor' => 'required',
            'cliente' => 'required',
            'contato' => 'required',
            'indicador' => 'required',
            'indicado' => 'required',
            'pontuacao_indicador' => 'required',
            'descricao_servico' => 'required',
            'status' => 'required',
            'cca' => 'required'
        ]);
        $valor = $request->valor;
        $request->pontuacao_indicador = $valor;
        $request->cca = $valor*0.025;
        
        $request_ranking["pontuacao"] = $request->pontuacao_indicador;
        $request_ranking["beneficiario"] = $request->indicador;
        
        Vendas::create($request->all());
        Ranking::create($request_ranking);

        return redirect()->route('vendas')
                        ->with('success','Venda registrada com sucesso.');
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
            'status' => 'required',
            'cca' => 'required'
        ]);

        $vendas->where('id', '=', $request->id)->update($request->toArray());

        $retorno = response()->json($vendas);

        return $retorno;
        // return redirect()->route('empresa')
        //                 ->with('success','Empresa atualizada com sucesso');
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