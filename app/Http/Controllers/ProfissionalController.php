<?php

namespace App\Http\Controllers;

use App\Profissionais;
use App\User;
use Illuminate\Http\Request;

class ProfissionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profissionais = Profissionais::where('deleted_at', '=', null)->latest()->paginate(5);
        $page_name = 'cadastrar-profissional';
        $category_name = 'profissional';
        $has_scrollspy = 0;
        $scrollspy_offset = '';

        return view('profissional.cadastrar_profissional',compact('profissionais', 'page_name', 'category_name', 'has_scrollspy', 'scrollspy_offset'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profissional.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $request->validate([
            'parceiro' => 'required',
            'cpf' => 'required',
            'email' => 'required',
            'area_atuacao' => 'required',
            'nascimento',
            'telefone',
            'chave_pix',
            'cep',
            'endereco',
            'bairro',
            'uf',
            'cidade',
            'banco',
            'agencia',
            'conta',
            'login' => 'required',
            'password' => 'required',
            'perfil' => 'required',
        ]);

        $user["name"] = $request->parceiro;
        $user["email"] = $request->email;
        $user["login"] = $request->login;
        $user["password"] = $request->password;
        $user["perfil"] = $request->perfil;
        
        Profissionais::create($request->all());
        User::create($user);

        return redirect()->route('profissional')
                        ->with('success','Profissional registrada com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $profissional = Profissionais::where('id', '=', $request->id)->get();
        $retorno = response()->json($profissional);

        return $retorno;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Profissionais $profissional)
    {
        return view('profissional.edit',compact('profissional'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profissionais $profissional)
    {
        $request->validate([
            'parceiro' => 'required',
            'cpf' => 'required',
            'email' => 'required',
            'area_atuacao' => 'required',
            'nascimento',
            'telefone',
            'chave_pix',
            'cep',
            'endereco',
            'bairro',
            'uf',
            'cidade',
            'banco',
            'agencia',
            'conta',
            'login' => 'required',
            'password' => 'required'
        ]);

        $profissional->where('id', '=', $request->id)->update($request->toArray());

        $retorno = response()->json($profissional);

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
        $profissional = Profissionais::where('id', '=', $request->id)->update(['deleted_at' => now()]);

        return response()->json($profissional, 200);
    }

}