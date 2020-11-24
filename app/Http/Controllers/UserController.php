<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $datos =  $request->input();
        $JwtAuth = new \JwtAuth();
        $email = $datos['email'];
        $password = hash('sha256',  $datos['password']);
        $token = $JwtAuth->signup($email, $password, null);
        $param_Arr = $token->getData();
        if ($param_Arr->code == '200') {
            $repuesta = [
                "icon" => "success",
                "text" => "Bienvenido, Se ha logueado con éxito a la plataforma",
                "title" => "Login Correcto",
                "ruta" => "/principal"
            ];
            // $request->session()->put(['estarlin'=>'admin']);
            session()->start();
        } else {
            $repuesta = [
                "icon" => "warning",
                "text" => "Alerta, credenciales no válidas",
                "title" => "Login Incorrecto",
                "ruta" => "/login"
            ];
        }
        return view('/aviso', compact('repuesta'));
        // return  redirect('/principal');
    }
    /*
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function logout(Request $request)
    {
        $login = $request->session->user;
        $InicioSesion =$request->session->iat;
        $HoraInicio=  date("H:i:s",$InicioSesion);
        $Horafin = date("H:i:s", time());

        $interval = (new DateTime($HoraInicio))->diff(new DateTime($Horafin));
        $hour = $interval->format("%h horas ");
        $min = $interval->format("%i min ");
        $sec = $interval->format("%s seg ");
        $tiempoSesion =  $hour .  $min .   $sec ;
        $repuesta = [
            "icon" => "success",
            "text" => "Gracias ". $login .", su sesión con una duración de ". $tiempoSesion ." ha terminado. Hora de inicio: ". $HoraInicio ." - Hora de fin " . $Horafin .".",
            "title" => "Adios",
            "ruta" => "/login"
        ];
        return view('/aviso', compact('repuesta'));
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
