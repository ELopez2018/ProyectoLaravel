<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Helpers;

use Firebase\JWT\JWT;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class JwtAuth
{

    public $seed;

    public function __construct()
    {
        $this->seed = 'pruebaTecnicaItus';
    }

    public function signup($email, $password, $getToken = null)
    {
        // dd($email, $password);
        // die();
        // Buscar Si existe el usuario con sus credenciales
        $usuario = User::where([
            'email' => $email,
            'password' => $password
        ])->first();

        // dd($usuario);
        // die();
        $logeado = false;

        // Comprobar si son correctos
        if (is_object($usuario)) {
            $logeado = true;
        }

        // Generar el Token
        if ($logeado) {
            $token = array(
                'sub'       => $usuario->id,
                'email'     => $usuario->email,
                'surname'   => $usuario->surname,
                'iat'       => time(),
                'exp'       => time() + (4 * 60 * 60)
            );
            $jwt = JWT::encode($token, $this->seed, 'HS256');

            // Devolver los datos decodificados o el Token en base a un parametro
            if (is_null($getToken) || $getToken) {
                $repuesta = array(
                    'code' => 200,
                    'status' => 'success',
                    'message' => 'Bienvenido al Sistema',
                    'token' => $jwt
                );
            } else {
                $repuesta = array(
                    'code' => 200,
                    'status' => 'success',
                    'message' => 'Bienvenido al Sistema',
                    'datos' => $token
                );
            }
        } else {
            $repuesta = array(
                'code' => 401,
                'status' => 'error',
                'message' => 'Login Incorrecto'
            );
        }
        return response()->json($repuesta, $repuesta['code']);
    }

    // public function checkToken($jwt, $getIndentity = false) {
    //     $auth = false;
    //     try {
    //         $jwt = str_replace('"', '', $jwt);
    //         $tokenDecode = JWT::decode($jwt, $this->seed, ['HS256']);
    //     } catch (\UnexpectedValueException $ex) {
    //         $auth = false;
    //     } catch (\DomainException $ex) {
    //         $auth = false;
    //     }

    //     if (!empty($tokenDecode) && is_object($tokenDecode) && isset($tokenDecode->sub)) {
    //         $auth = true;
    //     } else {
    //         $auth = false;
    //     }

    //     if ($getIndentity) {
    //       return   $tokenDecode;
    //     }

    //     return $auth;
    // }

}
