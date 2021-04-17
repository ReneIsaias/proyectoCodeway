<div wire:ignore.self class="modal fade" id="createPreuser" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="createClassModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="createClassModal">AGREGAR ASPIRANTE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label class="text-muted" for="name">Nombre:</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                wire:model="name" wire:dirty.class="bg-primary">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="text-muted" for="lastname">Apellidos:</label>
                        <input type="text" name="lastname" class="form-control @error('lastname') is-invalid @enderror"
                                wire:model="lastname" wire:dirty.class="bg-primary">
                        @error('lastname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="text-muted" for="phone">Teléfono:</label>
                        <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                wire:model="phone" wire:dirty.class="bg-primary">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="text-muted" for="email">Email:</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                wire:model="email" wire:dirty.class="bg-primary">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="form-group justify-content-start">
                    <div wire:loading wire:loading.class="bg-white">Procesando datos...</div>
                </div>
                <div class="justify-content-end">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click.prevent="clean()">Cancelar</button>
                    <button type="button" class="btn btn-primary" wire:click.prevent="store()">Agregar Aspirante</button>
                </div>
            </div>
        </div>
    </div>
</div>
