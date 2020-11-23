@extends('layout/header')
<body class="antialiased">
    <form action="{{ route('autorizacion')}}" method="POST" >
        {{ csrf_field() }}
        <div class="containeralign-items-center">
            <div class="row mt-5 ">
                <div class="col-sm-12 text-center d-flex justify-content-center">
                    <div class="card shadow p-3 mb-5 bg-white rounded" style="width: 18rem;">
                        <div class="card-header">
                            <i class="fas fa-unlock-alt fa-2x"></i> &nbsp;&nbsp; Ingreso al Sistema
                        </div>
                        <div class="card-body">
                            <label for="email"></label>
                            <input class="form-control" type="email" name="email" id="email" placeholder="Ingrese su Correo">
                            <label for="email"></label>
                            <input class="form-control" type="password" name="password" id="password" placeholder="Ingrese su Contraseña">
                        </div>
                        <div class="card-footer">
                            <button  type="submit" class="btn btn-success btn-block"><i class="fas fa-key"></i> &nbsp;&nbsp; Entrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
