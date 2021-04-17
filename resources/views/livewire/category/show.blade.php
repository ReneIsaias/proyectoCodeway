<div wire:ignore.self class="modal fade" id="showCategory" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="showCategoryModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="showCategoryModal">MOSTRAR CATEGORÍA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label class="text-muted" for="description">Descripción:</label>
                        <h5>{{ $description }}</h5>
                    </div>
                    <div class="form-group">
                        <label class="text-muted" for="estado">Estado:</label>
                        @if ($status == "1")
                            <h5>Activa</h5>
                        @else
                            <h5>Inactiva</h5>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="text-muted" for="created_at">Creado:</label>
                        <h5>{{ $created_at }}</h5>
                    </div>
                    <div class="form-group">
                        <label class="text-muted" for="updated_at">Actualizado:</label>
                        <h5>{{ $updated_at }}</h5>
                    </div>
                    <div class="form-group ">
                        <label class="text-muted text-uppercase" for="updated_at">Proyectos relacionados con esta categoría</label>
                        <div class="table-responsive">
                            <table class="table table-white table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Clave</th>
                                        <th scope="col">Proyecto</th>
                                        <th scope="col">Descripción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proyectos as $proyecto)
                                        @if ($category_id == $proyecto->category_id)
                                            <tr>
                                                <td>{{ $proyecto->key }}</td>
                                                <td>{{ $proyecto->name }}</td>
                                                <td>{{ $proyecto->description }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="form-group justify-content-start">
                    <div wire:loading wire:loading.class="bg-white">Procesando datos...</div>
                </div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click.prevent="clean()">Cancelar</button>
                <button type="button" class="btn btn-info" wire:click.prevent="close()">Aceptar</button>
            </div>
        </div>
    </div>
</div>
