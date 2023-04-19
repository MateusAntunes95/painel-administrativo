<?php

namespace App\Http\Controllers;

use App\Models\TipoAcesso;
use Illuminate\Http\Request;

class TipoAcessoController extends Controller
{
    public function index()
    {
        return view('tipo_acesso.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoAcesso  $tipoAcesso
     * @return \Illuminate\Http\Response
     */
    public function show(TipoAcesso $tipoAcesso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoAcesso  $tipoAcesso
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoAcesso $tipoAcesso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoAcesso  $tipoAcesso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoAcesso $tipoAcesso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoAcesso  $tipoAcesso
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoAcesso $tipoAcesso)
    {
        //
    }
}
