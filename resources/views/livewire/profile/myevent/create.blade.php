<div wire:ignore.self class="modal fade" id="createEvent" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="createClassModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="createClassModal">AGREGAR EVENTO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label class="text-muted" for="title">Título:</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                wire:model="title" wire:dirty.class="bg-primary">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    {{-- <div class="form-group">
                        <label class="text-muted" for="title">Título:</label>
                        <div class="input-group mb-3">
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                    wire:model="title" wire:dirty.class="bg-primary">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-bars"></span>
                                </div>
                            </div>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> --}}
                    <div class="form-group">
                        <label class="text-muted" for="description">Descripción:</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" wire:model="description" wire:dirty.class="bg-primary" rows="3"></textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-muted" for="start">Inicio:</label>
                                <input type="date" name="start" class="form-control @error('start') is-invalid @enderror"
                                        wire:model="start" wire:dirty.class="bg-primary">
                                @error('start')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-muted" for="end">Termino:</label>
                                <input type="date" name="end" class="form-control @error('end') is-invalid @enderror"
                                        wire:model="end" wire:dirty.class="bg-primary">
                                @error('end')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-muted" for="color">Color de fondo:</label>
                                <select wire:model="color" class="form-control @error('color') is-invalid @enderror" name="color" wire:dirty.class="bg-primary" id="color">
                                    <option value="">--Seleccione el color de fondo--</option>
                                    <option class="alert-primary" value="alert-primary">Azul</option>
                                    <option class="alert-secondary" value="alert-secondary">Gris</option>
                                    <option class="alert-success" value="alert-success">Verde</option>
                                    <option class="alert-danger" value="alert-danger">Rojo</option>
                                    <option class="alert-warning" value="alert-warning">Amarillo</option>
                                    <option class="alert-info" value="alert-info">Celeste</option>
                                    <option class="alert-white" value="alert-white">Blanco</option>
                                    <option class="alert-dark" value="alert-dark">Negro</option>
                                </select>
                                @error('color')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-muted" for="textColor">Color de texto:</label>
                                <select wire:model="textColor" class="form-control @error('textColor') is-invalid @enderror" name="color" wire:dirty.class="bg-primary" id="textColor">
                                    <option value="">--Seleccione el color de texto--</option>
                                    <option class="text-primary" value="text-primary">Azul</option>
                                    <option class="text-secondary" value="text-secondary">Gris</option>
                                    <option class="text-success" value="text-success">Verde</option>
                                    <option class="text-danger" value="text-danger">Rojo</option>
                                    <option class="text-warning" value="text-warning">Amarillo</option>
                                    <option class="text-info" value="text-info">Celeste</option>
                                    <option class="text-white" value="text-white">Blanco</option>
                                    <option class="text-dark" value="text-dark">Negro</option>
                                </select>
                                @error('textColor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="form-group justify-content-start">
                    <div wire:loading wire:loading.class="bg-white">Procesando datos...</div>
                </div>
                <div class="justify-content-end">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click.prevent="clean()">Cancelar</button>
                    <button type="button" class="btn btn-primary" wire:click.prevent="store()">Agregar Evento</button>
                </div>
            </div>
        </div>
    </div>
</div>
