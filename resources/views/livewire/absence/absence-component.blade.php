<div>
    <div class="card">
        <div class="card-header bg-secondary">
            <div class="row">
                <div class="col-8">
                    <h4 class="text-uppercase">Lista de Ausencias</h4>
                </div>
                <div class="col-4">
                    @can('haveaccess', 'absence.create')
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#createAbsence">Agregar Ausencia</button>
                    @endcan
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="form-group">
                    <div class="row">
                        <div class="col-8">
                            <input type="text" class="form-control" placeholder="Buscar" wire:model="search" wire:dirty.class="bg-secondary">
                        </div>
                        <div class="col-3 justify-content-end">
                            <select class="form-control" wire:model="perPage">
                                <option value="10">10 por página</option>
                                <option value="25">25 por página</option>
                                <option value="50">50 por página</option>
                                <option value="100">100 por página</option>
                            </select>
                        </div>
                        @if ($search !== '')
                            <div wire:click="clear" class="col-1">
                                <button class="btn btn-light">X</button>
                            </div>
                        @endif
                    </div>
                </div>
                <table wire:poll.10000ms id="absenceTable" class="table table-white table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Ausencia</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Creado</th>
                            <th scope="col">Actualizado</th>
                            <th scope="colgroup">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($absences as $absence)
                            <tr>
                                <td>{{ $absence->description }}</td>
                                <td>
                                    @if ($absence->status == "1")
                                        Activa
                                    @else
                                        Inactiva
                                    @endif
                                </td>
                                <td>{{ $absence->created_at->diffForHumans() }}</td>
                                <td>{{ $absence->updated_at->diffForHumans() }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        @can('haveaccess', 'absence.show')
                                            <button type="button" wire:click.prevent="show({{ $absence->id }})" class="btn btn-info" data-toggle="modal" data-target="#showAbsence">Mostrar</button>
                                        @endcan
                                        @can('haveaccess', 'absence.edit')
                                            <button type="button" wire:click.prevent="edit({{ $absence->id }})" class="btn btn-success" data-toggle="modal" data-target="#updateAbsence">Editar</button>
                                        @endcan
                                        @can('haveaccess', 'absence.destroy')
                                            <button type="button" wire:click.prevent="delete({{ $absence->id }})" class="btn btn-danger" data-toggle="modal" data-target="#deleteAbsence">Borrar</button>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between">
            @if ($absences->count())
                <nav class="col col-lg-6 justify-content-start" aria-label="Page navigation example">
                    <ul class="pagination justify-content">
                        <h6>Mostrando {{ $absences->count() }} registros de {{ $total }} registros totales en la página {{ $page }}</h6>
                    </ul>
                </nav>
                <nav class="col col-lg-6 justify-content-end" aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                        {{ $absences->links() }}
                    </ul>
                </nav>
            @else
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content">
                        <h6>No hay resultados para la búsqueda "{{ $search}}" en la página {{ $page }} al mostrar {{ $perPage }} por página</h6>
                    </ul>
                </nav>
            @endif
        </div>
    </div>
    @include('custom.message')
    @include('livewire.absence.create')
    @include('livewire.absence.show')
    @include('livewire.absence.update')
    @include('livewire.absence.delete')
</div>
