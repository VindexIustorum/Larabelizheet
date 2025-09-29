<div class="modal" id="modal-eliminar-{{ $reg->id }}" role="dialog" aria_labelledby="exampleModalLabel">

<div class="modal-dialog">
<div class="modal-content bg-danger" >

    <form action="{{  route('roles.destroy', $reg->id) }}" method="post" >
        @csrf
        @method('DELETE')
        <div class="modal-header">

        <h1> Eliminar Registro</h1>

        </div>
        
        <div class="modal-body">
            ¿Usted desea eliminar el registro {{ $reg->name }}?
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-outline-light" > Eliminar </button>
            <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal"> Cerrar</button>
        </div>
    </form>
</div>
</div>
</div>