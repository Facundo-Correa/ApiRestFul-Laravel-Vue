<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>{{ $cliente->id }}</b> - {{ $cliente->name }}</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <h4>Nombre:</h4>
                            <input type="text" placeholder="{{ $cliente->nombre }}" disabled>
                        </div>
                        <div class="form-group">
                            <h4>Apellido:</h4>
                            <input type="text" placeholder="{{ $cliente->apellido }}" disabled>
                        </div>
                        <div class="form-group">
                            <h4>Empresa:</h4>
                            <input type="text" placeholder="{{ $cliente->empresa }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <h4>Email:</h4>
                            <input type="text" placeholder="{{ $cliente->email }}" disabled>
                        </div>
                        <div class="form-group">
                            <h4>Status:</h4>
                            @if($cliente->status_id == 1)
                            <input type="text" placeholder="Habilitado" disabled>
                            @elseif($cliente->status_id == 2)
                            <input type="text" placeholder="Inhabilitado" disabled>
                            @else($cliente->status_id == 4)
                            <input type="text" placeholder="Moroso" disabled>
                            @endif
                        </div>
                        <div class="form-group">
                            <h4>N° Plataforma:</h4>
                            <input type="number" placeholder="{{ $cliente->n_plataforma }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Grabar</button>
            </div>
        </div>
    </div>
</div>