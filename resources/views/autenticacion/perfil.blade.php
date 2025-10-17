@extends('plantilla.app')

@section('contenido')

    <div class="app-content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12"> 

                    <div class="card mb-4">  

                        <div class="card-header ">

                            <h3 class="card-title"> Perfil del Usuario </h3>

                               

                                

                        </div>

                         <div class="card-body">

                                <form action="{{ isset($registro)?route('perfil.update', $registro->id) : route('usuarios.store') }}" method="POST" id="formRegistroUsuario">
                                    @csrf
                                        @method('PUT')
                                    
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $registro->name ?? '') }}" required>
                                        @error('name')
                                            <small class="text-danger"> {{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $registro->email ?? '') }}" required>
                                        @error('email')
                                            <small class="text-danger"> {{ $message }}</small>
                                        @enderror
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="text" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                        @error('password')
                                            <small class="text-danger"> {{ $message }}</small>
                                        @enderror
                                    </div>

                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="password_confirmation" class="form-label">Confirmar password</label>
                                        <input type="text" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" value="{{ old( 'password_confirmation') }}">
                                        @error('password_confirmation')
                                            <small class="text-danger"> {{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button type="button" class="btn btn-secondary me-md-2"
                                            onclick="window.location.href='{{ route('dashboard') }}'">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Actualizar Datos</button>
                                </div>
                            </form>

                                </div>

                            <div class="card-footer clear-fix"></div>
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection