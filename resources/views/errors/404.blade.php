@extends('plantilla.app')
@section('contenido')

    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header bg-danger text-white">
                            <h3 class="card-title"> Acceso No Autorizado </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            
                            
                            
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            
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

@push('scripts')
    <script>
        document.getElementById('menuSeguridad').classList.add('menu-open');
        
    </script>
@endpush
