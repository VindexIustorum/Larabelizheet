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
                            <h3 class="card-title">Roles</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div>
                                <form action="{{ route('roles.index') }}" method="get">
                                    <div class="input-group">
                                        <input name="texto" type="text" class="form-control" value=""
                                            placeholder="Ingrese texto a buscar">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-search"></i>
                                                Buscar</button>
                                                @can('role-create')
                                            <a href="{{ route('roles.create') }}" class="btn btn-primary">Nuevo</a>
                                            @endcan
                                        </div>
                                    </div>
                                </form>
                            </div>
                            @if (Session::has('mensaje'))
                                <div class="">
                                    {{ Session::get('mensaje') }}
                                </div>
                            @endif
                            <div class="table-responsive mt-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 130px">Opciones</th>
                                            <th style="width: 20px">ID</th>
                                            <th>Nombre</th>
                                            <th>Permisos</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($registros) <= 0)
                                            <tr>
                                                <td colspan="4">No hay registros que coincidan con la busqueda</td>
                                            </tr>
                                        @else
                                            @foreach ($registros as $reg)
                                                <tr class="aling-middle">
                                                    <td>
                                                        @can('rol-edit')
                                                        <a href="{{ route('roles.edit', $reg->id) }}"
                                                            class="btn btn-info btn-sm">
                                                            <i class="bi bi-pencil-fill"></i>
                                                        </a>
                                                        @endcan

                                                        @can('rol-delete')
                                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                            data-bs-target="#modal-eliminar-{{ $reg->id }}">
                                                            <i class="bi bi-trash-fill"></i>
                                                        </button>
                                                        @endcan
                                                    </td>
                                                    <td>{{ $reg->id }}</td>
                                                    <td>{{ $reg->name }}</td>
                                                    <td>
                                                        @if ($reg->permissions->isNotEmpty())
                                                            {!! $reg->permissions->pluck('name')->map(function ($name) {
                                                                    return "<span class='badge bg-primary me-1'>$name</span>";
                                                                })->implode(' ') !!}
                                                        @else
                                                            <span class="badge bg-secondary">Sin permisos</span>
                                                        @endif
                                                    </td>

                                                </tr>
                                                @can('rol-delete')
                                                @include('role.delete')
                                                @endcan
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {{ $registros->appends(['texto' => $texto]) }}
                        </div>
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->

            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    
@endsection

@push('scripts')
        <script>
            document.getElementById('menuSeguridad').classList.add('menu-open');
            document.getElementById('itemRole').classList.add('active');
        </script>
    @endpush