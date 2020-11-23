<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PrincipalDbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::where('email', '=', 'maito')
            ->orderBy('id', 'asc')
            ->paginate(5);
        return view('principalDb', compact('data'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Funcion para ejecutar querys a la Tablas
    public function query(Request $request)
    {
        $consulta = $request->input();

        if (array_key_exists('buscar', $consulta)) {
            if ($consulta['buscar'] == '' || is_null($consulta['buscar'])) {
                if ($consulta['orden'] == 'asc') {
                    $data = User::where('email', '<>', null)
                        ->orderBy('id', 'asc')
                        ->paginate(5);
                } else {
                    $data = User::where('email', '<>', null)
                        ->orderBy('id', 'desc')
                        ->paginate(5);
                }
            } else {
                if ($consulta['orden'] == 'asc') {
                    $data = User::where('email', 'like', '%' . $consulta['buscar'] . '%')
                        ->orderBy('id', 'asc')
                        ->paginate(5);
                } else {
                    $data = User::where('email', 'like', '%' . $consulta['buscar'] . '%')
                        ->orderBy('id', 'desc')
                        ->paginate(5);
                }
            }
        } else {
            $data = User::where('email', '<>', null)
                ->orderBy('id', 'desc')
                ->paginate(5);
        }

        return view('principaldb', compact('data'));
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
