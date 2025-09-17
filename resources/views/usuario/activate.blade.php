<div class="modal" id="modal-toggle-{{ $reg->id }}" role="dialog" aria_labelledby="exampleModalLabel">

<div class="modal-dialog">
<div class="modal-content {{ $reg->activo ? 'bg-success' : 'bg-warning' }}" >

    <form action="{{  route('usuarios.toggle', $reg->id) }}" method="post" >
        @csrf
        @method('PATCH')
        <div class="modal-header">

        <h1> {{ $reg->activo ? 'Desactivar' : "Activar" }} Registro</h1>

        </div>
        
        <div class="modal-body">
            ¿Usted desea {{ $reg->activo ? 'desactivar ' : 'activar ' }} el registro de {{ $reg->name }}?
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-outline-light" >  {{ $reg->activo ? 'Desactivar' : "Activar" }} </button>
            <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal"> Cerrar</button>
        </div>
    </form>
</div>
</div>
</div>