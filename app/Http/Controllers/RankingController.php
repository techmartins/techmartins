<?php

namespace App\Http\Controllers;

use App\Ranking;
use App\Profissionais;
use App\Empresa;
use App\Pontuacao;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ranking = Ranking::all();
        $page_name = 'ranking';
        $category_name = 'ranking';
        $has_scrollspy = 0;
        $scrollspy_offset = '';

        return view('ranking.visualizar_ranking',compact('ranking', 'page_name', 'category_name', 'has_scrollspy', 'scrollspy_offset'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ranking.create');
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
            'pontuacao' => 'required',
            'beneficiario' => 'required'
        ]);
        
        Ranking::create($request->all());

        return redirect()->route('ranking')
                        ->with('success',' Gerado Ranking com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $ranking = Ranking::where('id', '=', $request->id)->get();
        $retorno = response()->json($ranking);

        return $retorno;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Ranking $ranking)
    {
        return view('ranking.edit',compact('ranking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ranking $ranking)
    {
        $request->validate([
            'pontuacao' => 'required',
            'beneficiario' => 'required'
        ]);

        $ranking->where('id', '=', $request->id)->update($request->toArray());

        $retorno = response()->json($ranking);

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