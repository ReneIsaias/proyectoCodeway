<div wire:ignore.self class="modal fade" id="updatePreuser" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="updateClassModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="updateClassModal">MODIFICAR ASPIRANTE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label class="text-muted" for="name">Nombre:</label>
                        <input type="text" name="name" wire:dirty.class="bg-success"
                            class="form-control @error('name') is-invalid @enderror" wire:model="name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="text-muted" for="lastname">Apellidos:</label>
                        <input type="text" name="lastname" wire:dirty.class="bg-success"
                            class="form-control @error('lastname') is-invalid @enderror" wire:model="lastname">
                        @error('lastname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="text-muted" for="phone">Teléfono:</label>
                        <input type="number" name="phone" wire:dirty.class="bg-success"
                            class="form-control @error('phone') is-invalid @enderror" wire:model="phone">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="text-muted" for="email">Email:</label>
                        <input type="email" name="email" wire:dirty.class="bg-success"
                            class="form-control @error('email') is-invalid @enderror" wire:model="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="text-muted" for="color">Estado:</label><br>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="statusType1" wire:model="status" name="status" class="custom-control-input" value="1"
                                @if ( $status == "1" )
                                    checked
                                @endif
                            >
                            <label class="custom-control-label" for="statusType1">Activo</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="statusType0" wire:model="status" name="status" class="custom-control-input" value="0"
                                @if ( $status == "0" )
                                    checked
                                @endif
                            >
                            <label class="custom-control-label" for="statusType0">Inactivo</label>
                            <hr>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="form-group justify-content-start">
                    <div wire:loading wire:loading.class="bg-white">Procesando datos...</div>
                </div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click.prevent="clean()">Cancelar</button>
                <button type="button" class="btn btn-success" wire:click.prevent="update()">Actualizar Aspirante</button>
            </div>
        </div>
    </div>
</div>
