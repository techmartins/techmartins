<?php

namespace App\Http\Controllers;

use App\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::latest()->paginate(5);
        $page_name = 'cadastrar-empresa';
        $category_name = 'empresas';
        $has_scrollspy = 0;
        $scrollspy_offset = '';

        return view('empresas.cadastrar_empresa',compact('empresas', 'page_name', 'category_name', 'has_scrollspy', 'scrollspy_offset'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresa.create');
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
            'razao_social' => 'required',
            'cnpj' => 'required',
            'email' => 'required',
            'ramo_atividade' => 'required',
            'cep',
            'endereco',
            'bairro',
            'uf',
            'cidade',
            'percentual' => 'required',
            'contato' => 'required',
            'referencia' => 'required',
            'login' => 'required',
            'password' => 'required'
        ]);
        
        Empresa::create($request->all());

        return redirect()->route('empresa')
                        ->with('success','Empresa registrada com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $empresa = Empresa::where('id', '=', $request->id)->get();
        $retorno = response()->json($empresa);

        return $retorno;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        return view('empresa.edit',compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
        $request->validate([
            'razao_social' => 'required',
            'cnpj' => 'required',
            'email' => 'required',
            'ramo_atividade' => 'required',
            'cep',
            'endereco',
            'bairro',
            'uf',
            'cidade',
            'percentual' => 'required',
            'contato' => 'required',
            'referencia' => 'required',
            'login' => 'required',
            'password' => 'required'
        ]);

        $empresa->update($request->all());

        return redirect()->route('empresa.index')
                        ->with('success','Empresa atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        $empresa->delete();

        return redirect()->route('empresa.index')
                        ->with('success','Empresa removida com sucesso.');
    }

    public function busca_cep($cep){
        $resultado = @file_get_contents('http://republicavirtual.com.br/web_cep.php?cep='.urlencode($cep).'&formato=query_string');  
        if(!$resultado){  
            $resultado = "&resultado=0&resultado_txt=erro+ao+buscar+cep";  
        }  
        parse_str($resultado, $retorno);   
        return $retorno;
    }
}