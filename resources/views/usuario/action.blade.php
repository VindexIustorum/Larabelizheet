@extends('plantilla.app')

@section('contenido')

    <div class="app-content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12"> 

                    <div class="card mb-4">  

                        <div class="card-header ">

                            <h3 class="card-title"> Usuarios </h3>

                               

                                

                        </div>

                         <div class="card-body">

                                <form action="{{ route('usuarios.store') }}" method="POST" id="formRegistroUsuario">
                                    @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required>
                                        @error('name')
                                            <small class="text-danger"> {{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required>
                                        @error('email')
                                            <small class="text-danger"> {{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="text" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                                        @error('password')
                                            <small class="text-danger"> {{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="estado" class="form-label">Estado</label>
                                        <select class="form-select" name="activo" id="activo">
                                            <option value="1">Activo</option>
                                            <option value="0">Inactivo</option>
                                        </select>
                                        @error('activo')
                                            <small class="text-danger"> {{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button type="button" class="btn btn-secondary me-md-2"
                                            onclick="window.location.href='{{ route('usuarios.index') }}'">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
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