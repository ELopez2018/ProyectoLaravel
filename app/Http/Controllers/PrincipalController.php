<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Arr;

class PrincipalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        return view('principal', compact('data'));
    }
    public function consulta(Request $request)
    {
        $resp = Http::get('https://reqres.in/api/users?page=1');
        $datos = $resp->json();
        $data =  $datos['data'];
        $orden = $request->input('orden');
        $filtro = $request->input('buscar');
        $filtrado = '';

        if ($filtro !== '' && !is_null($filtro)) {
            foreach ($data as  $valor) {
                if ($valor['email'] === $filtro) {
                    $filtrado = Arr::add([$valor], null, null);
                }
            }
            $data = $filtrado;
        }
        if ($orden == 'asc') {
            sort($data);
        } else {
            rsort($data);
        }
        return view('principal', compact('data'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
