@extends('plantilla.app')
@section('contenido')

<div class="app-content">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Usuarios</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div>

                        <form action="" method="get">
                                <div class="input-group">
                                    <input name="texto" type="text" class="form-control" value="" placeholder="Ingrese texto a buscar">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-search"></i>
                                            Buscar</button>
                                        <a href="{{ route('usuarios.create') }}" class="btn btn-primary">Nuevo</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @if(Session::has('mensaje'))
                            <div class="alert alert-info alert-dismissible fade show mt-2"> 
                                {{ Session::get('mensaje') }}
                            </div>
                        @endif
                        <div class="table-responsive mt-3">
    <table class="table table-bordered">
        <thead>

        <tr>
            <th style="width: 100px"> Opciones </th>
            <th style="width: 20px"> ID </th>
            <th> Nombre </th>
            <th> Correo </th>
            <th> Activo </th>
        </tr>
        </thead>
        <tbody>
            @if (count($registros)<=0)
                <tr>
                    <td colspan="5">No hay registros que coincidan con la búsqueda</td>
                </tr>
            <tr>
        @else
            @foreach ($registros as $reg)
            <tr>
                <td> 
                    <a href="{{ route('usuarios.edit', $reg->id) }}" class="btn btn-warning btn-sm">
                        <i class="bi bi-pencil-fill"></i>
                    </a>
                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-eliminar-{{ $reg->id }}">
                        <i class="bi bi-trash-fill"></i>
                    </button>
                </td>
                <td> {{ $reg->id }} </td>
                <td> {{ $reg->name}}</td>
                <td> {{ $reg->email }}</td>
                <td> {{ $reg->activo }}</td>
            </tr>
            @include('usuario.delete')
            @endforeach
        @endif
        </tbody>
    </table>
</div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                      {{ $registros->appends(["texto"=>$texto]) }}
                    </div>
                </div>
                <!-- /.card -->

                <!-- /.card -->
            </div>
            <!-- /.col -->

            <!-- /.col -->
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>



@endsection