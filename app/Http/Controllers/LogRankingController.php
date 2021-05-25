<?php

namespace App\Http\Controllers;

use App\LogRanking;
use Illuminate\Http\Request;

class LogRankingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logranking = LogRanking::all();
        $page_name = 'logranking';
        $category_name = 'logranking';
        $has_scrollspy = 0;
        $scrollspy_offset = '';

        return view('logranking.visualizar_log',compact('logranking', 'page_name', 'category_name', 'has_scrollspy', 'scrollspy_offset'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('logranking.create');
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
            'beneficiario',
            'pontuacao',
            'acao'
        ]);
        
        LogRanking::create($request->all());

        return redirect()->route('logranking')
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
        // $vendas = Vendas::where('id', '=', $request->id)->get();
        // $retorno = response()->json($vendas);

        // return $retorno;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(LogRanking $logranking)
    {
        // return view('vendas.edit',compact('vendas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LogRanking $vendas)
    {
        // $request->validate([
        //     'valor' => 'required',
        //     'cliente' => 'required',
        //     'contato' => 'required',
        //     'indicador' => 'required',
        //     'indicado' => 'required',
        //     'pontuacao_indicador' => 'required',
        //     'descricao_servico' => 'required',
        //     'status' => 'required',
        //     'cca' => 'required'
        // ]);

        // $vendas->where('id', '=', $request->id)->update($request->toArray());

        // $retorno = response()->json($vendas);

        // return $retorno;
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